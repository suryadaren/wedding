<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\user;
use App\admin;
use App\wedding_organizer;
use App\customer;
use App\pembayaran;
use App\pencairan_dana;
use Illuminate\Support\Facades\Mail;
use App\Mail\pembayaranDpBerhasilToCustomer;
use App\Mail\pelunasanPembayaranBerhasilToCustomer;
use App\Mail\pesananBaruToWo;
use App\Mail\pencairanDanaSelesaiToWo;

class AdminController extends Controller
{
    function index(){
        $user = auth()->guard('admin')->user();
        return view('admin.profil',compact('user'));
    }
    function edit_profil(Request $request){

        $validator = Validator::make($request->all(),[
                'alamat' => 'required',
                'nomor_telepon' => 'required',
                'nama_bank' => 'required',
                'nomor_rekening' => 'required',
                'nama_pemilik' => 'required',
            ],
            [
                'alamat.required' => 'alamat tidak boleh kosong',
                'nomor_telepon.required' => 'nomor telepon tidak boleh kosong',
                'nama_bank.required' => 'nama bank tidak boleh kosong',
                'nomor_rekening.required' => 'nomor rekening tidak boleh kosong',
                'nama_pemilik.required' => 'nama pemilik tidak boleh kosong'
            ]);
            
        if ($validator->fails()) {
            $notif = [
                "message" => "Gagal Mengupdate Data Karena ada data yang kosong",
                "alert-type" => "error"
            ];
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with($notif);
        }else{
            $user = user::find($request->id);
            $admin = $user->admin->first();
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            if ($request->foto_profil) {
                Storage::delete($admin->foto_profil);
                $pathFoto = $request->foto_profil->store('public/data/foto_profil');
                $admin->foto_profil = $pathFoto;
            }

            $admin->alamat = $request->alamat;
            $admin->nomor_telepon = $request->nomor_telepon;
            $admin->nama_bank = $request->nama_bank;
            $admin->nomor_rekening = $request->nomor_rekening;
            $admin->nama_pemilik = $request->nama_pemilik;

            $user->save();
            $admin->save();

            $notif = [
                'message' => "berhasil mengupdate data profil",
                'alert-type' => 'success'
            ];
            return back()->with($notif);
        }
    }
    function wo(){
        $wos = wedding_organizer::orderBy('created_at', 'desc')->get();
    	return view('admin.wo',compact('wos'));
    }
    function lihat_wo($id){
        $wo = wedding_organizer::find($id);
    	return view('admin.lihat_wo',compact('wo'));
    }
    function hapus_wo(Request $request){
        $wo = wedding_organizer::find($request->id);
        user::where('id',$wo->user_id)->delete();
        $notif = [
            "message" => "berhasil menghapus data",
            "alert-type" => "success"
        ];
        return back()->with($notif);
    }
    function customer(){
        $customers = customer::orderBy('created_at', 'desc')->get();
        return view('admin.customer',compact('customers'));
    }
    function lihat_customer($id){
        $customer = customer::find($id);
        return view('admin.lihat_customer',compact('customer'));
    }
    function hapus_customer(Request $request){
        $customer = customer::find($request->id);
        user::where('id',$customer->user_id)->delete();
        $notif = [
            "message" => "berhasil menghapus data",
            "alert-type" => "success"
        ];
        return back()->with($notif);
    }
    function pembayaran(){
        $pembayarans = pembayaran::orderBy('updated_at','desc')->get();
        return view('admin.pembayaran',compact('pembayarans'));
    }
    function lihat_pembayaran($id){
        $pembayaran = pembayaran::find($id);
        return view('admin.lihat_pembayaran',compact('pembayaran'));
    }
    function setujui_pembayaran(Request $request){
        $status = "menunggu penjadwalan meeting";
        $pembayaran = pembayaran::find($request->id);
        $pembayaran->status = $status;
        $pembayaran->save();

        $pemesanan = $pembayaran->pemesanan;
        $pemesanan->status = $status;
        $pemesanan->save();

        Mail::to($pembayaran->customer->user->email)->send(new pembayaranDpBerhasilToCustomer($pembayaran));
        Mail::to($pembayaran->pemesanan->paket->wedding_organizer->user->email)->send(new pesananBaruToWo($pembayaran));

        $notif = [
            "message" => "Berhasil mengkonfirmasi pembayaran DP oleh customer",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    function setujui_pelunasan(Request $request){
        $status = "menunggu konfirmasi pemesanan selesai";
        $pembayaran = pembayaran::find($request->id);
        $pembayaran->status = $status;
        $pembayaran->save();

        $pemesanan = $pembayaran->pemesanan;
        $pemesanan->status = $status;
        $pemesanan->save();

        Mail::to($pembayaran->customer->user->email)->send(new pelunasanPembayaranBerhasilToCustomer($pembayaran));

        $notif = [
            "message" => "Berhasil mengkonfirmasi pelunasan pembayaran oleh customer",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    function pencairan_dana(){
        $pencairan_dana = pencairan_dana::orderBy('created_at', 'desc')->get();
        return view('admin.pencairan_dana',compact('pencairan_dana'));
    }
    function lihat_pencairan_dana($id){
        $pencairan_dana = pencairan_dana::find($id);
        return view('admin.lihat_pencairan_dana',compact('pencairan_dana'));
    }
    function pencairan_dana_selesai(Request $request){
        $pencairan_dana = pencairan_dana::find($request->id);
        
        $path = $request->bukti_pembayaran->store('public/data/bukti_pencairan_dana');
        $pencairan_dana->status = "pencairan dana telah selesai";
        $pencairan_dana->bukti_pembayaran = $path;
        $pencairan_dana->save();

        Mail::to($pencairan_dana->pemesanan->wedding_organizer->user->email)->send(new pencairanDanaSelesaiToWo($pencairan_dana));

        $notif = [
            "message" => "Berhasil melakukan pencairan dana",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    function logout(){
        $notif = [
            "message" => "anda telah logout dari sistem!",
            "alert-type" => "success"
        ];
        auth()->guard('admin')->logout();
        return redirect(url('/login'))->with($notif);
    }
}

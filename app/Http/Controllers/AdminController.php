<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\user;
use App\admin;
use App\wedding_organizer;
use App\customer;

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
            return back()
                ->withErrors($validator)
                ->withInput();
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
    	return view('admin.pembayaran');
    }
    function lihat_pembayaran(){
        return view('admin.lihat_pembayaran');
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

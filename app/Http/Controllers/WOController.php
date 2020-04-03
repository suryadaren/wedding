<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\user;
use App\admin;
use App\wedding_organizer;
use App\customer;
use App\item_wedding_organizer;
use App\item_paket;
use App\paket_wedding_organizer;
use App\pemesanan;
use App\Mail\opsiTanggalMeetingToCustomer;
use App\Mail\meetingSelesaiToCustomer;
use App\Mail\reviewToCustomer;
use Illuminate\Support\Facades\Mail;

class WOController extends Controller
{
    function index(){
        $user = auth()->guard('wedding_organizer')->user();
    	return view('wo.profil',compact('user'));
    }
    function edit_profil(Request $request){

        $validator = Validator::make($request->all(),[
                'alamat' => 'required',
                'nomor_telepon' => 'required',
                'nama_perusahaan' => 'required',
                'instagram' => 'required',
                'nama_bank' => 'required',
                'nomor_rekening' => 'required',
                'nama_pemilik' => 'required',
            ],
            [
                'alamat.required' => 'alamat tidak boleh kosong',
                'nama_perusahaan.required' => 'nama perusahaan tidak boleh kosong',
                'instagram.required' => 'instagram tidak boleh kosong',
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
            $wedding_organizer = $user->wedding_organizer->first();
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            if ($request->foto_profil) {
                Storage::delete($wedding_organizer->foto_profil);
                $pathFoto = $request->foto_profil->store('public/data/foto_profil');
                $wedding_organizer->foto_profil = $pathFoto;
            }
            if ($request->foto_ijin_usaha) {
                Storage::delete($wedding_organizer->foto_ijin_usaha);
                $pathFoto = $request->foto_ijin_usaha->store('public/data/foto_ijin_usaha');
                $wedding_organizer->foto_ijin_usaha = $pathFoto;
            }

            $wedding_organizer->alamat = $request->alamat;
            $wedding_organizer->instagram = $request->instagram;
            $wedding_organizer->nama_perusahaan = $request->nama_perusahaan;
            $wedding_organizer->nomor_telepon = $request->nomor_telepon;
            $wedding_organizer->nama_bank = $request->nama_bank;
            $wedding_organizer->nomor_rekening = $request->nomor_rekening;
            $wedding_organizer->nama_pemilik = $request->nama_pemilik;

            $user->save();
            $wedding_organizer->save();

            $notif = [
                'message' => "berhasil mengupdate data profil",
                'alert-type' => 'success'
            ];
            return back()->with($notif);
        }
    }
    function pemesanan(){
        $pemesanans = pemesanan::where('wedding_organizer_id',auth()->guard('wedding_organizer')->user()->wedding_organizer->id)->get();
    	return view('wo.pemesanan',compact('pemesanans'));
    }
    function lihat_pemesanan($id){
        $pemesanan = pemesanan::find($id);
        return view('wo.lihat_pemesanan',compact('pemesanan'));
    }
    function opsi_tanggal_meeting(Request $request){
        $tanggal;
        foreach ($request->date as $date) {
            $tanggal[] = $date;
        }
        $tanggal = json_encode($tanggal);
        $pemesanan = pemesanan::find($request->id);
        $pemesanan->tanggal_meeting = $tanggal;
        $pemesanan->status = "wedding organizer telah memasukan opsi tanggal meeting";
        $pemesanan->save();

        $tanggal_meeting = json_decode($tanggal);

        Mail::to($pemesanan->customer->user->email)->send(new opsiTanggalMeetingToCustomer($pemesanan,$tanggal_meeting));

        $notif = [
            "message" => "Berhasil menginput opsi tanggal meeting, menunggu konfirmasi customer",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    public function meeting_selesai($id){
        $pemesanan = pemesanan::find($id);

        $pemesanan->status = "menunggu pelunasan pembayaran oleh Customer";
        $pemesanan->save();



        $data_rekening = admin::select('nama_bank','nomor_rekening','nama_pemilik')->first();
        $harga = $this->convert_to_angka($pemesanan->harga);
        $jumlah_dibayar = $harga/2;
        $jumlah_dibayar = $this->convert_to_rupiah($jumlah_dibayar);

        Mail::to($pemesanan->customer->user->email)->send(new meetingSelesaiToCustomer($pemesanan,$data_rekening,$jumlah_dibayar));

        $notif = [
            "message" => "Berhasil menetapkan tanggal meeting",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    public function pemesanan_selesai($id){
        $pemesanan = pemesanan::find($id);

        $pemesanan->status = "menunggu rating dan review dari customer";
        $pemesanan->save();

        Mail::to($pemesanan->customer->user->email)->send(new reviewToCustomer($pemesanan));

        $notif = [
            "message" => "Berhasil mengkonfirmasi pemesanan berhasil, silahkan menunggu review dan rating dari customer",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    function paket(){
        $pakets = paket_wedding_organizer::where('wedding_organizer_id', auth()->guard('wedding_organizer')->user()->wedding_organizer->id)->get();
    	return view('wo.paket',compact('pakets'));
    }
    function tambah_paket(){
        return view('wo.tambah_paket');
    }
    function simpan_paket(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_paket' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama_paket.required' => 'nama paket tidak boleh kosong',
            'foto.required' => 'foto tidak boleh kosong',
            'deskripsi.required' => 'deskripsi item tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $pathFoto = $request->foto->store('public/data/foto_paket');
            $data = [
                'wedding_organizer_id' => auth()->guard('wedding_organizer')->user()->wedding_organizer->id,
                'nama_paket' => $request->nama_paket,
                'foto' => $pathFoto,
                'deskripsi' => $request->deskripsi,
                'harga' => 0,
            ];
            paket_wedding_organizer::create($data);
            $notif = [
                'message' => 'berhasil menambah data item',
                'alert-type' => 'success'
            ];
            return redirect(url('/wo/paket'))->with($notif);

        }
    }
    function edit_paket($id){
        $paket = paket_wedding_organizer::find($id);
        return view('wo.edit_paket',compact('paket'));
    }
    function update_paket(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_paket' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama_paket.required' => 'nama paket tidak boleh kosong',
            'deskripsi.required' => 'deskripsi item tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $paket = paket_wedding_organizer::find($request->id);
            
            if ($request->foto) {
                Storage::delete($paket->foto);
                $pathFoto = $request->foto->store('public/data/foto_paket');
                $paket->foto = $pathFoto;
            }

            $data = [
                'nama_paket' => $request->nama_paket,
                'deskripsi' => $request->deskripsi
            ];
            $paket->nama_paket = $request->nama_paket;
            $paket->deskripsi = $request->deskripsi;
            $paket->save();

            $notif = [
                'message' => 'berhasil mengupdate data paket',
                'alert-type' => 'success'
            ];
            return redirect(url('/wo/paket'))->with($notif);
        }
    }
    function hapus_paket(Request $request){
        $paket = paket_wedding_organizer::find($request->id);
        Storage::delete($paket->foto);
        $paket->delete();
        $notif = [
            'message' => 'berhasil menghapus data paket',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }
    function tambah_item_paket($id){
        $paket = paket_wedding_organizer::find($id);
        $item_pakets = $paket->item_pakets;
        $semua_items = item_wedding_organizer::where('wedding_organizer_id', auth()->guard('wedding_organizer')->user()->wedding_organizer->id)->get();
        return view('wo.tambah_item_paket',compact('paket','semua_items','item_pakets'));
    }
    function simpan_item_paket(Request $request){
        $validator = Validator::make($request->all(),[
            'harga_akhir' => 'required',
        ], [
            'harga_akhir.required' => 'Harga Akhir tidak boleh kosong'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $data = [
                'paket_wedding_organizer_id' => $request->paket_id,
                'item_wedding_organizer_id' => $request->item_wedding_organizer_id,
                'harga_awal' => $request->harga_awal,
                'harga_akhir' => $request->harga_akhir
            ];
            item_paket::create($data);

            $paket = paket_wedding_organizer::find($request->paket_id);
            
            // perhitungan untuk menambah dan memperbarui harga paket karena item baru telah di tambahkan
            $harga_paket = $this->convert_to_angka($paket->harga);
            $harga_tambah = $this->convert_to_angka($request->harga_akhir);
            $harga_paket += $harga_tambah; 
            $harga_paket = $this->convert_to_rupiah($harga_paket);
            $paket->harga = $harga_paket;
            $paket->save();

            $notif = [
                'message' => 'Berhasil menambahkan item',
                'alert-type' => 'success'
            ];
            return back()->with($notif);
        }
    }
    function hapus_item_paket(Request $request){
        $item = item_paket::find($request->id);
        $paket = $item->paket;

        // perhitungan untuk menambah dan memperbarui harga paket karena item baru telah di tambahkan
            $harga_paket = $this->convert_to_angka($paket->harga);
            $harga_kurang = $this->convert_to_angka($item->harga_akhir);
            $harga_paket -= $harga_kurang; 
            $harga_paket = $this->convert_to_rupiah($harga_paket);
            $paket->harga = $harga_paket;
            $paket->save();

            $item->delete();

        $notif = [
            'message' => 'berhasil menghapus data item',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }
    function item(){
        $items = item_wedding_organizer::where('wedding_organizer_id', auth()->guard('wedding_organizer')->user()->wedding_organizer->id)->get();
    	return view('wo.item',compact('items'));
    }
    function data_item($id){
        $items = item_wedding_organizer::find($id);
        return response($items);
    }
    function tambah_item(){
        return view('wo.tambah_item');
    }
    function simpan_item(Request $request){
        $validator = Validator::make($request->all(),[
            'nama_item' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ], [
            'nama_item.required' => 'nama item tidak boleh kosong',
            'harga.required' => 'harga tidak boleh kosong',
            'deskripsi.required' => 'deskripsi item tidak boleh kosong',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $data = [
                'wedding_organizer_id' => auth()->guard('wedding_organizer')->user()->wedding_organizer->id,
                'nama_item' => $request->nama_item,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
            ];
            item_wedding_organizer::create($data);
            $notif = [
                'message' => 'berhasil menambah data item',
                'alert-type' => 'success'
            ];
            return redirect(url('/wo/item'))->with($notif);

        }
    }
    function edit_item($id){
        $item = item_wedding_organizer::find($id);
        return view('wo.edit_item',compact('item'));
    }
    function update_item(Request $request){
        $item = item_wedding_organizer::find($request->id);
        $item->nama_item = $request->nama_item;
        $item->harga = $request->harga;
        $item->deskripsi = $request->deskripsi;
        $item->save();
        $notif = [
            'message' => 'berhasil mengupdate data item',
            'alert-type' => 'success'
        ];
        return redirect(url('/wo/item'))->with($notif);
    }
    function hapus_item(Request $request){
        item_wedding_organizer::where('id',$request->id)->delete();
        $notif = [
            'message' => 'berhasil menghapus data item',
            'alert-type' => 'success'
        ];
        return back()->with($notif);
    }
    function logout(){
        $notif = [
            "message" => "anda telah logout dari sistem!",
            "alert-type" => "success"
        ];
        auth()->guard('wedding_organizer')->logout();
        return redirect(url('/login'))->with($notif);
    }

    function convert_to_rupiah($angka){
        $hasil_rupiah = number_format($angka,0,',','.');
        return $hasil_rupiah;
    }
    function convert_to_angka($nominal){
        $angka = str_replace(".", "", $nominal);
        return $angka;
    }
}

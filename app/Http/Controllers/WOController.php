<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\user;
use App\wedding_organizer;
use App\customer;

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
            return back()
                ->withErrors($validator)
                ->withInput();
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
    	return view('wo.pemesanan');
    }
    function paket(){
    	return view('wo.paket');
    }
    function item_tambahan(){
    	return view('wo.item_tambahan');
    }
    function logout(){
        $notif = [
            "message" => "anda telah logout dari sistem!",
            "alert-type" => "success"
        ];
        auth()->guard('wedding_organizer')->logout();
        return redirect(url('/login'))->with($notif);
    }
}

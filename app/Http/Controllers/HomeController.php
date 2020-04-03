<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerifyUserMail;
use Illuminate\Support\Facades\Mail;
use App\user;
use App\wedding_organizer;
use App\customer;

class HomeController extends Controller
{
    public function index(){
        $wedding_organizer = wedding_organizer::get();
        return view('home.index', compact('wedding_organizer'));
    }
    public function informasi_perusahaan($id){
        $wo = wedding_organizer::find($id);
        return view('home.informasi_perusahaan',compact('wo'));
    }
    public function fasilitas(){
        return view('home.fasilitas');
    }
    public function ringkasan_pemesanan(){
        return view('home.ringkasan_pemesanan');
    }
    public function pembayaran(){
        return view('home.pembayaran');
    }
    public function info_pemesanan(){
        return view('home.info_pemesanan');
    }

    public function register(){
    	return view('home.register');
    }
    public function form_register($type){
        return view('home.form_register',compact('type'));
    }
    public function simpan_register(Request $request){
        if ($request->role == "wedding organizer") {
            
             $validator = Validator::make($request->all(),[
                'username' => 'required|unique:user',
                'email' => 'required|unique:user',
                'password' => 'required',
                'nama_perusahaan' => 'required',
                'alamat' => 'required',
                'nomor_telepon' => 'required',
                'instagram' => 'required',
                'foto_profil' => 'required',
                'foto_ijin_usaha' => 'required',
                'tentang_perusahaan' => 'required',
                'nama_bank' => 'required',
                'nomor_rekening' => 'required',
                'nama_pemilik' => 'required',
            ],
            [
                'username.required' => 'username tidak boleh kosong',
                'username.unique' => 'username sudah digunakan',
                'email.unique' => 'email sudah digunakan',
                'email.required' => 'email tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
                'nama_perusahaan.required' => 'nama perusahaan tidak boleh kosong',
                'alamat.required' => 'alamat tidak boleh kosong',
                'nomor_telepon.required' => 'nomor telepon tidak boleh kosong',
                'instagram.required' => 'instagram tidak boleh kosong',
                'foto_profil.required' => 'foto profil tidak boleh kosong',
                'foto_ijin_usaha.required' => 'foto ijin usaha tidak boleh kosong',
                'tentang_perusahaan.required' => 'tentang perusahaan tidak boleh kosong',
                'nama_bank.required' => 'nama bank tidak boleh kosong',
                'nomor_rekening.required' => 'nomor rekening tidak boleh kosong',
                'nama_pemilik.required' => 'nama pemilik tidak boleh kosong'
            ]);
            
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }else{
                $pathFotoProfil = $request->foto_profil->store('public/data/foto_profil');
                $pathFotoIjinUsaha = $request->foto_ijin_usaha->store('public/data/foto_ijin_usaha');

                $dataUser = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role
                ];

                $user = user::create($dataUser);

                $dataWO = [
                    'user_id' => $user->id,
                    'nama_perusahaan' => $request->nama_perusahaan,
                    'alamat' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon,
                    'instagram' => $request->instagram,
                    'foto_profil' => $pathFotoProfil,
                    'foto_ijin_usaha' => $pathFotoIjinUsaha,
                    'tentang_perusahaan' => $request->tentang_perusahaan,
                    'nama_bank' => $request->nama_bank,
                    'nomor_rekening' => $request->nomor_rekening,
                    'nama_pemilik' => $request->nama_pemilik,
                ];

                $wo = wedding_organizer::create($dataWO);

                Mail::to($request->email)->send(new VerifyUserMail($user));

                return view('home.verifikasi_email');

            }
        }else{
            
             $validator = Validator::make($request->all(),[
                'username' => 'required|unique:user',
                'email' => 'required|unique:user',
                'password' => 'required',
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'nomor_telepon' => 'required',
                'foto_profil' => 'required',
            ],
            [
                'username.required' => 'username tidak boleh kosong',
                'username.unique' => 'username sudah digunakan',
                'email.unique' => 'email sudah digunakan',
                'email.required' => 'email tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong',
                'nama_lengkap.required' => 'nama lengap tidak boleh kosong',
                'alamat.required' => 'alamat tidak boleh kosong',
                'nomor_telepon.required' => 'nomor telepon tidak boleh kosong',
                'foto_profil.required' => 'foto profil tidak boleh kosong'
            ]);
            
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }else{
                $pathFotoProfil = $request->foto_profil->store('public/data/foto_profil');

                $dataUser = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role
                ];

                $user = user::create($dataUser);

                $dataCustomer = [
                    'user_id' => $user->id,
                    'nama_lengkap' => $request->nama_lengkap,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'nomor_telepon' => $request->nomor_telepon,
                    'foto_profil' => $pathFotoProfil
                ];

                $customer = customer::create($dataCustomer);

                Mail::to($request->email)->send(new VerifyUserMail($user));

                return view('home.verifikasi_email');
            }
        }
    }
    public function verifikasi_email(Request $request){
        $user = user::find($request->id);
        $user->verified = 1;
        $user->save();
        return view('home.verifikasi_sukses');
    }

    public function login(){
    	return view('home.login');
    }

    public function checkLogin(Request $request){
        
        if(auth()->guard('admin')->attempt(array('email' => $request, 'password' => $request->password, 'role' => 'admin'))){


            $notif = [
                "message" => "Selamat datang ". auth()->guard('admin')->user()->username ."!",
                "alert-type" => 'success'
            ];

            return redirect(url('/admin'))->with($notif);

        }elseif (auth()->guard('customer')->attempt(array('email' => $request, 'password' => $request->password, 'role' => 'customer'))) {
            
            if (auth()->guard('customer')->user()->verified == 1) {

                $notif = [
                    "message" => "Selamat datang ". auth()->guard('customer')->user()->username ."!",
                    "alert-type" => 'success'
                ];

                return redirect(url('/'))->with($notif);
            }else{
                auth()->guard('customer')->logout();

                $notif = [
                    "message" => "Silahkan verifikasi akun anda melalui email!",
                    "alert-type" => 'error'
                ];

                return back()->with($notif);
            }

        }elseif (auth()->guard('wedding_organizer')->attempt(array('email' => $request, 'password' => $request->password, 'role' => 'wedding organizer'))) {
            
            if (auth()->guard('wedding_organizer')->user()->verified == 1) {

                $notif = [
                    "message" => "Selamat datang ". auth()->guard('wedding_organizer')->user()->username ."!",
                    "alert-type" => 'success'
                ];

                
                return redirect(url('/wo'))->with($notif);
            }else{
                auth()->guard('wedding_organizer')->logout();

                $notif = [
                    "message" => "Silahkan verifikasi akun anda melalui email!",
                    "alert-type" => 'error'
                ];

                return back()->with($notif);
            }

        }else{
            $notif = [
                "message" => "Email/Password anda salah!",
                "alert-type" => 'error'
            ];
            return back()->with($notif);
        }

    }

}

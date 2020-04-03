<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\paket_wedding_organizer;
use App\item_wedding_organizer;
use App\item_paket;
use App\pemesanan;
use App\item_tambahan;
use App\admin;
use App\user;
use App\review;
use App\customer;
use App\pembayaran;
use App\pencairan_dana;
use App\wedding_organizer;
use App\Mail\pembayaranPesananCustomer;
use App\Mail\pembayaranDpKeAdmin;
use App\Mail\pelunasanPembayaranToAdmin;
use App\Mail\tanggalMeetingTelahDiTetapkanToWo;
use App\Mail\customerTelahMembayarDp;
use App\Mail\customerMemberiReviewToWo;
use App\Mail\menungguPencairanDanaToAdmin;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    function index(){
        $user = auth()->guard('customer')->user();
        return view('customer.profil',compact('user'));
    }
    function edit_profil(Request $request){

        $validator = Validator::make($request->all(),[
                'alamat' => 'required',
                'nama_lengkap' => 'required',
                'nomor_telepon' => 'required'
            ],
            [
                'alamat.required' => 'alamat tidak boleh kosong',
                'nomor_telepon.required' => 'nomor telepon tidak boleh kosong',
                'nama_lengkap.required' => 'nama lengkap tidak boleh kosong'
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
            $customer = $user->customer->first();
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            if ($request->foto_profil) {
                Storage::delete($customer->foto_profil);
                $pathFoto = $request->foto_profil->store('public/data/foto_profil');
                $customer->foto_profil = $pathFoto;
            }

            $customer->alamat = $request->alamat;
            $customer->jenis_kelamin = $request->jenis_kelamin;
            $customer->nomor_telepon = $request->nomor_telepon;
            $customer->nama_lengkap = $request->nama_lengkap;

            $user->save();
            $customer->save();

            $notif = [
                'message' => "berhasil mengupdate data profil",
                'alert-type' => 'success'
            ];
            return back()->with($notif);
        }
    }
    public function pemesanan(){
        $pemesanans = pemesanan::where("customer_id",auth()->guard('customer')->user()->customer->id)->get();

        return view('customer.pemesanan',compact('pemesanans'));
    }
    public function lihat_pemesanan($id){
        $pemesanan = pemesanan::find($id);
        $pemesanan->tanggal_meeting = json_decode($pemesanan->tanggal_meeting);
        
        $data_rekening = admin::select('nama_bank','nomor_rekening','nama_pemilik')->first();
        
        $harga = $this->convert_to_angka($pemesanan->harga);
        $dp = $harga/2;
        $dp = $this->convert_to_rupiah($dp);

        return view('customer.lihat_pemesanan',compact('pemesanan','data_rekening','dp'));
    }
    public function simpan_bukti_pembayaran(Request $request){
        $pemesanan = pemesanan::find($request->pemesanan_id);

        $status = "menunggu konfirmasi pembayaran DP oleh admin";

        $pathFoto = $request->bukti_pembayaran->store('public/data/bukti_pembayaran');

        $pembayaran = $pemesanan->pembayarans->first();

        $pembayaran->bukti_pembayaran = $pathFoto;
        $pembayaran->status = $status;
        $pembayaran->save();

        $pemesanan->status = $status;
        $pemesanan->save();

        $admin = admin::first();

        Mail::to($admin->user->email)->send(new pembayaranDpKeAdmin($pembayaran));
        Mail::to($pemesanan->customer->user->email)->send(new customerTelahMembayarDp($pembayaran));

        $notif = [
            "message" => "Berhasil mengupload bukti transfer, silahkan menunggu konfirmasi pembayaran oleh admin sistem",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    public function simpan_bukti_pelunasan(Request $request){
        $pemesanan = pemesanan::find($request->pemesanan_id);

        $status = "menunggu konfirmasi pelunasan pembayaran oleh admin";

        $pathFoto = $request->bukti_pembayaran->store('public/data/bukti_pembayaran');

        $pembayaran = pembayaran::create([
            "customer_id" => $pemesanan->customer->id,
            "pemesanan_id" => $request->pemesanan_id,
            "nama_bank" => $request->nama_bank,
            "nomor_rekening" => $request->nomor_rekening,
            "nama_pemilik" => $request->nama_pemilik,
            "bukti_pembayaran" => $pathFoto,
            "jumlah" => $request->jumlah_dibayar,
            "status" => $status
        ]);

        $pemesanan->status = $status;
        $pemesanan->save();

        $admin = admin::first();

        Mail::to($admin->user->email)->send(new pelunasanPembayaranToAdmin($pembayaran));

        $notif = [
            "message" => "Berhasil mengupload bukti transfer, silahkan menunggu konfirmasi pembayaran oleh admin sistem",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    public function konfirmasi_tanggal_meeting(Request $request){
        $pemesanan = pemesanan::find($request->id);

        $pemesanan->status = "menunggu konfirmasi meeting telah selesai";
        $pemesanan->tanggal_meeting = $request->tanggal_meeting;
        $pemesanan->save();

        Mail::to($pemesanan->wedding_organizer->user->email)->send(new tanggalMeetingTelahDiTetapkanToWo($pemesanan));

        $notif = [
            "message" => "Berhasil menetapkan tanggal meeting",
            "alert-type" => "success"
        ];

        return back()->with($notif);
    }
    public function simpan_rating(Request $request){
        $validator = Validator::make($request->all(),[
                'rating' => 'required',
                'komentar' => 'required',
            ],
            [
                'rating.required' => 'rating tidak boleh kosong',
                'komentar.required' => 'komentar tidak boleh kosong'
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
            $pemesanan = pemesanan::find($request->id);
            $wedding_organizer = $pemesanan->wedding_organizer;

            $rating = $request->rating;
            $komentar = $request->komentar;

            $rating_awal = $wedding_organizer->rating;
            $rating_akhir = $rating;

            $jumlah_review = count($wedding_organizer->reviews);
            $jumlah_review++;

            $rating_akhir = ($rating_awal+$rating_akhir)/$jumlah_review;
            
            $wedding_organizer->rating = $rating_akhir;

            $wedding_organizer->save();

            $pemesanan->status = "selesai";
            $pemesanan->save();

            review::create([
                "customer_id" => $pemesanan->customer->id,
                "pemesanan_id" => $pemesanan->id,
                "wedding_organizer_id" => $wedding_organizer->id,
                "bintang" => $request->rating,
                "komentar" => $request->komentar
            ]);

            pencairan_dana::create([
                "pemesanan_id" => $pemesanan->id,
                "nama_bank" => $pemesanan->wedding_organizer->nama_bank,
                "nomor_rekening" => $pemesanan->wedding_organizer->nomor_rekening,
                "nama_pemilik" => $pemesanan->wedding_organizer->nama_pemilik,
                "jumlah" => $pemesanan->harga,
                "status" => "menunggu pencairan dana oleh admin"
            ]);

            Mail::to($pemesanan->wedding_organizer->user->email)->send(new customerMemberiReviewToWo($pemesanan));

            $admin = admin::first();

            Mail::to($admin->user->email)->send(new menungguPencairanDanaToAdmin($pemesanan));


            $notif = [
                "message" => "Berhasil memberi Review",
                "alert-type" => "success"
            ];

            return back()->with($notif);
        }
    }
    public function logout(){
    	$notif = [
			"message" => "anda telah logout dari sistem!",
			"alert-type" => "success"
		];
		auth()->guard('customer')->logout();
		return redirect(url('/login'))->with($notif);
    }
    public function tanggal($id){
    	$paket = paket_wedding_organizer::find($id);
    	return view('home.tanggal',compact('paket'));
    }
    public function disableDay($id){
        $pemesanans = pemesanan::where('wedding_organizer_id',$id)
                                ->get();
        $tanggalDisable;
        foreach ($pemesanans as $pemesanan) {
            $tanggalDisable[] = $pemesanan->tanggal;
        }
        return json_encode($tanggalDisable, JSON_UNESCAPED_SLASHES);
    }
    public function additional(Request $request){
    	$paket = paket_wedding_organizer::find($request->paket_id);
    	
    	$id_item_paket;
    	foreach($paket->item_pakets as $it){
    		$id_item_paket[] = $it->item_wedding_organizer_id;
    	};
    	
    	$date = $request->date;
    	$item_tambahan = $paket->wedding_organizer->items->whereNotIn('id', $id_item_paket);
    	
    	return view('home.additional',compact('paket','date','item_tambahan'));
    }
    public function simpan_pemesanan(Request $request){
    	$paket = paket_wedding_organizer::find($request->paket_id);
    	$item_tambahan = $paket->wedding_organizer->items->whereIn('id',$request->item_tambahan);

    	// mencari total harga pemesanan
    	$harga_paket = $this->convert_to_angka($paket->harga);
    	$harga_item_tambahan = 0;
    	foreach ($item_tambahan as $item) {
    		$harga_item = $this->convert_to_angka($item->harga);
    		$harga_item_tambahan += $harga_item;
    	}

    	$total_harga = $harga_paket + $harga_item_tambahan;
    	$total_harga = $this->convert_to_rupiah($total_harga);
    	// end
    	

    	$data = [
    		"customer_id" => auth()->guard('customer')->user()->customer->id,
            "paket_wedding_organizer_id" => $request->paket_id,
    		"wedding_organizer_id" => $paket->wedding_organizer_id,
    		"tanggal" => $request->date,
    		"harga" => $total_harga,
    		"status" => "menunggu pembayaran DP"
    	];

    	$pemesanan = pemesanan::create($data);

    	foreach ($item_tambahan as $items) {
    		item_tambahan::create([
    			"item_wedding_organizer_id" => $items->id,
    			"pemesanan_id" => $pemesanan->id
    		]);
    	}

    	return redirect(url('customer/ringkasan_pemesanan/'.$pemesanan->id));
    }

    public function ringkasan_pemesanan($id){
    	$pemesanan = pemesanan::find($id);
    	$data_rekening = admin::select('nama_bank','nomor_rekening','nama_pemilik')->first();
    	$harga = $this->convert_to_angka($pemesanan->harga);
    	$dp = $harga/2;
    	$dp = $this->convert_to_rupiah($dp);
    	return view('home.ringkasan_pemesanan',compact('pemesanan','data_rekening','dp'));
    }

    public function proses_pesanan(Request $request){
    	$pemesanan = pemesanan::find($request->pemesanan_id);
    	$pemesanan->alamat = $request->alamat;
    	$pemesanan->nama_pengantin_pria = $request->nama_pengantin_pria;
    	$pemesanan->nama_pengantin_wanita = $request->nama_pengantin_wanita;
    	$pemesanan->save();



    	pembayaran::create([
    		"customer_id" => $pemesanan->customer->id,
    		"pemesanan_id" => $request->pemesanan_id,
    		"nama_bank" => $request->nama_bank,
    		"nomor_rekening" => $request->nomor_rekening,
    		"nama_pemilik" => $request->nama_pemilik,
    		"jumlah" => $request->jumlah,
    		"status" => "menunggu pembayaran DP"
    	]);

    	$data_rekening = admin::select('nama_bank','nomor_rekening','nama_pemilik')->first();
    	$harga = $this->convert_to_angka($pemesanan->harga);
    	$dp = $harga/2;
    	$dp = $this->convert_to_rupiah($dp);
    	
        Mail::to($pemesanan->customer->user->email)->send(new pembayaranPesananCustomer($pemesanan,$data_rekening,$dp));

    	$notif = [
    		"message" => "selamat anda telah berhasil melakukan pemesanan, silahkan lakukan pembayaran",
    		"alert-type" => "success"
    	];

    	return redirect(url('/customer/pemesanan'))->with($notif);
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

@extends('admin.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pencairan Dana</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="card-body">
                <strong></i> Status</strong>

                <p class="text-muted">
                  <span class="badge badge-success">{{$pencairan_dana->status}}</span>
                </p>

                <hr>
                <strong></i> Wedding Organizer</strong>

                <p class="text-muted">
                  {{$pencairan_dana->pemesanan->wedding_organizer->nama_perusahaan}}
                </p>

                <hr>
                <strong></i> Jumlah Pencairan Dana</strong>

                <p class="text-muted">
                  Rp. {{$pencairan_dana->pemesanan->harga}},-
                </p>

                <hr>
                <strong></i> Nama Bank</strong>

                <p class="text-muted">
                  {{$pencairan_dana->pemesanan->wedding_organizer->nama_bank}}
                </p>

                <hr>
                <strong></i> Nomor Rekening</strong>

                <p class="text-muted">
                  {{$pencairan_dana->pemesanan->wedding_organizer->nomor_rekening}}
                </p>

                <hr>
                <strong></i> Nama Pemilik Rekening</strong>

                <p class="text-muted">
                  {{$pencairan_dana->pemesanan->wedding_organizer->nama_pemilik}}
                </p>

                <hr>

                @if($pencairan_dana->status == "menunggu pencairan dana oleh admin")
                <p>Silahkan Melakukan Pengiriman dana kepada data rekening di atas. dan masukan bukti pembayaran dibawah ini</p>
                <hr>

                <form action="/admin/pencairan_dana_selesai" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <input type="hidden" name="id" value="{{$pencairan_dana->id}}">

                  <div class="form-group">
                    <label>Masukan Bukti Pembayaran</label>
                    <input required type="file" class="form-control" name="bukti_pembayaran">
                  </div>

                  <input type="submit" class="btn btn-primary btn-block" value="Konfirmasi Pencairan Dana">
                </form>


                @elseif($pencairan_dana->status == "pencairan dana telah selesai")
                
                <strong></i> Bukti Pembayaran</strong>

                <p class="text-muted">
                  <img src="{{Storage::url($pencairan_dana->bukti_pembayaran)}}" alt="img" style="width: 100%">
                </p>

                <hr>

                @endif

                <hr>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@stop
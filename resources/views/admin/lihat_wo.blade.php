@extends('admin.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Wedding Orginizer Data</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{Storage::url($wo->foto_profil)}}"
                       alt="User profile picture">
                     <p>{{$wo->tentang_perusahaan}}</p>
                     <br>
                </div>
                <strong></i> Username</strong>

                <p class="text-muted">
                  {{$wo->user->username}}
                </p>

                <hr>
                <strong></i> Email</strong>

                <p class="text-muted">
                  {{$wo->user->email}}
                </p>

                <hr>
                <strong></i> Nama Perusahaan</strong>

                <p class="text-muted">
                  {{$wo->nama_perusahaan}}
                </p>

                <hr>
                <strong></i> Alamat</strong>

                <p class="text-muted">
                  {{$wo->alamat}}
                </p>

                <hr>
                <strong></i> Nomor Telephone</strong>

                <p class="text-muted">
                  {{$wo->nomor_telepon}}
                </p>

                <hr>
                <strong></i> Instagram</strong>

                <p class="text-muted">
                  {{$wo->instagram}}
                </p>

                <hr>

                <h3>Data Bank</h3>

                <strong></i> Nama Bank</strong>

                <p class="text-muted">
                  {{$wo->nama_bank}}
                </p>

                <hr>
                <strong></i> Nomor Rekening</strong>

                <p class="text-muted">
                  {{$wo->nomor_rekening}}
                </p>

                <hr>
                <strong></i> Nama Pemilik Rekening</strong>

                <p class="text-muted">
                  {{$wo->nama_pemilik}}
                </p>

                <hr>
                <strong></i> Foto Izin Usaha</strong>

                
                <div class="text-center">
                  <img class="img-fluid"
                       src="{{Storage::url($wo->foto_ijin_usaha)}}"
                       alt="img">
                </div>

                <hr>
              </div>
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
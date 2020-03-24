@extends('admin.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Data</h1>
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
                       src="{{Storage::url($customer->foto_profil)}}"
                       alt="User profile picture">
                </div>
                <strong></i> Username</strong>

                <p class="text-muted">
                  {{$customer->user->username}}
                </p>

                <hr>
                <strong></i> Email</strong>

                <p class="text-muted">
                  {{$customer->user->email}}
                </p>

                <hr>
                <strong></i> Nama Lengkap</strong>

                <p class="text-muted">
                  {{$customer->nama_lengkap}}
                </p>

                <hr>
                <strong></i> Jenik Kelamin</strong>

                <p class="text-muted">
                  {{$customer->jenis_kelamin}}
                </p>

                <hr>
                <strong></i> Alamat</strong>

                <p class="text-muted">
                  {{$customer->alamat}}
                </p>

                <hr>
                <strong></i> Nomor Telephone</strong>

                <p class="text-muted">
                  {{$customer->nomor_telepon}}
                </p>

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
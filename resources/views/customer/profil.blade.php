@extends('customer.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profil</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                               src="{{Storage::url($user->customer->first()->foto_profil)}}"
                               alt="img">
                        </div>

                        <h3 class="profile-username text-center">{{$user->customer->first()->nama_lengkap}}</h3>
                        <br>

                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{$user->username}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Jeni Kelamin</b> <a class="float-right">{{$user->customer->first()->jenis_kelamin}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Nomor Telepon</b> <a class="float-right">{{$user->customer->first()->nomor_telepon}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{$user->customer->first()->alamat}}</a>
                          </li>
                        </ul>
                      </div>
                      <!-- /.card-body -->
                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="/customer/edit_profil" method="post" enctype="multipart/form-data"> {{csrf_field()}}
                      <input type="hidden" name="_method" value="put">
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputName">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama_lengkap" value="{{$user->customer->first()->nama_lengkap}}" class="form-control" id="inputName">
                        </div>
                      </div>
                        @if($errors->has('nama_lengkap'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('nama_lengkap')}} </div>
                        @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select name="jenis_kelamin" class="form-control">
                            @if($user->customer->first()->jenis_kelamin == "laki-laki")
                              <option value="laki-laki" active>Laki Laki</option>
                              <option value="wanita">Wanita</option>
                            @else
                              <option value="wanita" active>Wanita</option>
                              <option value="laki-laki">Laki Laki</option>
                            @endif
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                          <input type="text" name="nomor_telepon" value="{{$user->customer->first()->nomor_telepon}}" class="form-control" id="inputName">
                        </div>
                      </div>
                        @if($errors->has('nomor_telepon'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('nomor_telepon')}} </div>
                        @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" name="alamat" value="{{$user->customer->first()->alamat}}" class="form-control" id="inputName">
                        </div>
                      </div>
                        @if($errors->has('alamat'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('alamat')}} </div>
                        @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Foto Profil</label>
                        <div class="col-sm-10">
                          <input type="file" name="foto_profil" class="form-control" id="inputName">
                        </div>
                      </div>
                        @if($errors->has('foto_profil'))
                          <div class="alert alert-danger" role="alert"> {{$errors->first('foto_profil')}} </div>
                        @endif
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop
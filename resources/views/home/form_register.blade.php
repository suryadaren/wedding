@extends('home.layout')

@section('title', 'Register Form')

@section('content')

        <!-- content-->
    <div class="container">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">Register Form</h1>
        @if($type == "wedding_organizer")
        <div class="checkout-page">
            <form action="/simpan_register" method="post" enctype="multipart/form-data">{{csrf_field()}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <input type="hidden" name="role" value="wedding organizer">
                            <div class="row form-customer">
                                <div class="form-group col-md-12">
                                    <label for="inputfname_4" class="control-label">Username</label>
                                    <input value="{{old('username')}}" type="text" name="username" id="inputfname_4" class="form-control form-address">
                                    @if($errors->has('username'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('username')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Email</label>
                                    <input value="{{old('email')}}" type="email" name="email" id="inputcompany_2" class="form-control form-address">
                                    @if($errors->has('email'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Password</label>
                                    <input value="{{old('password')}}" type="password" name="password" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('password'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('password')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nama Perusahaan Wedding Organizer</label>
                                    <input value="{{old('nama_perusahaan')}}" type="text" name="nama_perusahaan" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nama_perusahaan'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nama_perusahaan')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Alamat</label>
                                    <input value="{{old('alamat')}}" type="text" name="alamat" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('alamat'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('alamat')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nomor Telepon</label>
                                    <input value="{{old('nomor_telepon')}}" type="text" name="nomor_telepon" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nomor_telepon'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nomor_telepon')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Akun Instagram</label>
                                    <input value="{{old('instagram')}}" type="text" name="instagram" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('instagram'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('instagram')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Foto Profil</label>
                                    <input value="{{old('foto_profil')}}" type="file" name="foto_profil" id="inputemail_2" class="form-control">
                                    @if($errors->has('foto_profil'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('foto_profil')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Foto Izin Usaha (<strong>Jika Ada</strong>)</label>
                                    <input value="{{old('foto_ijin_usaha')}}" type="file" name="foto_ijin_usaha" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('foto_ijin_usaha'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('foto_ijin_usaha')}} </div>
                                    @endif
                                </div>

                                <div style="margin-bottom: 50px" class="form-group col-md-12">
                                    <label for="inputfState" class=" control-label">Tentang Perusahaan</label>
                                    <textarea name="tentang_perusahaan" rows="5" id="message" class="form-control form-address"> {{old('tentang_perusahaan')}}</textarea>
                                    @if($errors->has('tentang_perusahaan'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('tentang_perusahaan')}} </div>
                                    @endif
                                </div>

                                <h5> <strong>Data Rekening</strong></h5><hr>

                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nama Bank</label>
                                    <input value="{{old('nama_bank')}}" type="text" name="nama_bank" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nama_bank'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nama_bank')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nomor Rekening</label>
                                    <input value="{{old('nomor_rekening')}}" type="text" name="nomor_rekening" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nomor_rekening'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nomor_rekening')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nama Pemilik Rekening</label>
                                    <input value="{{old('nama_pemilik')}}" type="text" name="nama_pemilik" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nama_pemilik'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nama_pemilik')}} </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
        @else
        <div class="checkout-page">
            <form action="/simpan_register" method="post" enctype="multipart/form-data">{{csrf_field()}}
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <input type="hidden" name="role" value="customer">
                            <div class="row form-customer">
                                <div class="form-group col-md-12">
                                    <label for="inputfname_4" class="control-label">Username</label>
                                    <input value="{{old('username')}}" type="text" name="username" id="inputfname_4" class="form-control form-address">
                                    @if($errors->has('username'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('username')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Email</label>
                                    <input value="{{old('email')}}" type="email" name="email" id="inputcompany_2" class="form-control form-address">
                                    @if($errors->has('email'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('email')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Password</label>
                                    <input value="{{old('password')}}" type="password" name="password" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('password'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('password')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nama Lengkap</label>
                                    <input value="{{old('nama_lengkap')}}" type="text" name="nama_lengkap" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nama_lengkap'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nama_lengkap')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Alamat</label>
                                    <input value="{{old('alamat')}}" type="text" name="alamat" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('alamat'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('alamat')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Nomor Telepon</label>
                                    <input value="{{old('nomor_telepon')}}" type="text" name="nomor_telepon" id="inputemail_2" class="form-control form-address">
                                    @if($errors->has('nomor_telepon'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('nomor_telepon')}} </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputemail_2" class="control-label">Foto Profil</label>
                                    <input value="{{old('foto_profil')}}" type="file" name="foto_profil" id="inputemail_2" class="form-control">
                                    @if($errors->has('foto_profil'))
                                      <div class="alert alert-danger" role="alert"> {{$errors->first('foto_profil')}} </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </div>
            </div>
            </form>
        </div>
        @endif
    </div>

@endsection
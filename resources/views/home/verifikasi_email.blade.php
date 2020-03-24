@extends('home.layout')

@section('title', 'Verifikasi Email')

@section('content')

    <div class="container text-center">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">Verfikasi Email</h1>
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <p>Terimakasih telah melakukan pendaftaran di {{config('app.name')}}, email verifikasi telah dikirim ke email anda. silahkan periksan dan lakukan verifikasi untuk dapat menggunakan email anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('home.layout')

@section('title','Register')

@section('content')

        <!-- content-->
    <div class="container">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">Register Form</h1>
        <div class="checkout-page text-center">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label"><strong>Anda ingin Mendaftar Sebagai :</strong> </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="margin: 10px 0">
                    <a style="width: 80%" href="/form_register/wedding_organizer" class="btn btn-primary">Wedding Organizer</a>
                </div>
                <div class="col-md-6" style="margin: 10px 0">
                    <a style="width: 80%" href="/form_register/customer" class="btn btn-warning">Customer</a>
                </div>
            </div>
        </div>
    </div>

@endsection
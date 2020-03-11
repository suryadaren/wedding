@extends('home.layout')

@section('title')
<title>Wedding Planner | Login</title>
@endsection

@section('content')

    <div class="container">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">Login</h1>
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Email</label>
                                    <input type="email" id="inputcompany_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Password</label>
                                    <input type="password" id="inputcompany_2" class="form-control form-address">
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="submit" class="btn btn-primary form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
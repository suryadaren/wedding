@extends('home.layout')

@section('title')
<title>Wedding Planner | Register</title>
@endsection

@section('content')

        <!-- content-->
    <div class="container">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">Register Form</h1>
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <div class="form-group col-md-6">
                                    <label for="inputfname_4" class="control-label">First Name *</label>
                                    <input type="text" id="inputfname_4" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputlname_5" class="control-label">Last Name *</label>
                                    <input type="text" id="inputlname_5" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Company Name</label>
                                    <input type="text" id="inputcompany_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputemail_2" class="control-label">Email Address *</label>
                                    <input type="text" id="inputemail_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputphone_3" class="control-label">Phone *</label>
                                    <input type="text" id="inputphone_3" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label  class="control-label">Country *</label>
                                    <select name="inputcountry1" class="country form-control form-address bg-color">
                                        <option selected="">Select Country</option>
                                        <option>United Kingdom (UK)</option>
                                        <option>COUNTRY 1</option>
                                        <option>COUNTRY 3</option>
                                        <option>COUNTRY 4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputstreet_3" class=" control-label">Address *</label>
                                    <input type="text" id="inputstreet_3" class="form-control form-address bg-color" placeholder="Street addres">
                                    <input type="text" id="inputstreet2_2" class="form-control form-address bg-color" placeholder="Apartment, suite, uni etc.( optional )">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputfState_2" class=" control-label">Town / City *</label>
                                    <input type="text" id="inputfState_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputfname_2_2" class=" control-label">County</label>
                                    <input type="text" id="inputfname_2_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputlname_2" class=" control-label">Postcode *</label>
                                    <input type="text" id="inputlname_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputfState" class=" control-label">Order Notes</label>
                                    <textarea name="message" rows="5" id="message" class="form-control form-note form-address" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>

@endsection
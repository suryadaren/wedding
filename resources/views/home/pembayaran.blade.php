@extends('home.layout')

@section('title', 'Pembayaran')

@section('content')

    

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Checkout</li>
        </ul>
        <h1 class="page-title text-center">Checkout</h1>
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div class="order">
                        <h3 class="checkout-title v2 js-drop">Information</h3>
                        <div class="filter-content">
                            <div class="table-responsive">
                                <table class="table checkout-table">
                                    <thead>
                                        <tr>
                                            <th class="checkouttb-title">PRODUCT</th>
                                            <th class="checkouttb-title">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="item_checkout">
                                            <td>Beaded Flower Headband</td>
                                            <td>$145.00</td>
                                        </tr>
                                        <tr class="item_checkout">
                                            <td>Brid in the Cage 299pln</td>
                                            <td>$170.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout-price">
                                
                                <div class="checkout-item color-all">
                                    <div>Subtotal</div>
                                    <div>315.00 USD</div>
                                </div>
                                <div class="checkout-item ">
                                    <div class="color-all">Banki</div>
                                    <div>MANDIRI</div>
                                </div>
                                <div class="checkout-item color-all">
                                    <div>No. Rekening</div>
                                    <div>144512515251</div>
                                </div>
                                <div class="checkout-item color-all">
                                    <div>Nama</div>
                                    <div>PT Wedding Orginizer</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h3 class="checkout-title v3 js-drop">Masukan Data Bank Anda</h3>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <div class="form-group col-md-12">
                                    <label for="inputcompany_2" class="control-label">Nama</label>
                                    <input type="text" id="inputcompany_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputemail_2" class="control-label">Bank </label>
                                    <input type="text" id="inputemail_2" class="form-control form-address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputphone_3" class="control-label">Nomor Rekening</label>
                                    <input type="text" id="inputphone_3" class="form-control form-address">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-button-group">
                        <a href="/info_pemesanan" class="cart-btn v2">Submit</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('home.layout')

@section('title', 'Pembayaran')

@section('content')

    

    <div class="container">
        <br>
        <h1 class="page-title text-center">Detail Pemesaan</h1>
        <div class="checkout-page">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 col-pd-v2">
                    <div class="order">
                        <h3 class="checkout-title v2 js-drop">Info pemesanan anda</h3>
                        <div class="filter-content">
                            <div class="table-responsive">
                                <table class="table checkout-table">
                                    <thead>
                                        <tr>
                                            <th class="checkouttb-title"><strong>{{$pemesanan->paket->nama_paket}}</strong></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th class="checkouttb-title">ITEM</th>
                                            <th class="checkouttb-title">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan->paket->item_pakets as $item)
                                        <tr class="item_checkout">
                                            <td>{{$item->item->nama_item}}</td>
                                            <td>Rp. {{$item->harga_akhir}},-</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th class="checkouttb-title"><strong>Item Tambahan</strong></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th class="checkouttb-title">ITEM</th>
                                            <th class="checkouttb-title">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan->item_tambahans as $item_t)
                                        <tr class="item_checkout">
                                            <td>{{$item_t->item->nama_item}}</td>
                                            <td>Rp. {{$item_t->item->harga}},-</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th><strong>TOTAL</strong></th>
                                            <th><strong>Rp. {{$pemesanan->harga}},-</strong></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="checkout-price">
                                
                                <div class="checkout-item color-all">
                                    <div>Tanggal</div>
                                    <div>{{$pemesanan->tanggal}}</div>
                                </div>
                                <div class="checkout-item ">
                                    <div class="color-all">Nama Pemesan</div>
                                    <div>{{$pemesanan->customer->nama_lengkap}}</div>
                                </div>
                                <div class="checkout-item ">
                                    <div class="color-all">Email</div>
                                    <div>{{$pemesanan->customer->user->email}}</div>
                                </div>
                                <div class="checkout-item ">
                                    <div class="color-all">Nomor Telepon</div>
                                    <div>{{$pemesanan->customer->nomor_telepon}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=""><br>
                        <h3 class="checkout-title v3 js-drop">Informasi Pengiriman dan Lengkapi Data Anda</h3>
                        <div class="filter-content">
                            <div class="row form-customer">
                                <div class="col-md-12">
                                    <h3>Data Pembayaran</h3>
                                    <br>
                                    <p style="color: red"><strong>Silahkan transfer DP(50%) ke rekening berikut : </strong></p>
                                    <br>

                                <div class="checkout-price" style="font-size: 15px">
                                    
                                    <div class="checkout-item color-all">
                                        <div style="width: 300px">Nama Bank</div>
                                        <div>: {{$data_rekening->nama_bank}}</div>
                                    </div>
                                    <div class="checkout-item ">
                                        <div class="color-all" style="width: 300px">Nomor Rekening</div>
                                        <div>: {{$data_rekening->nomor_rekening}}</div>
                                    </div>
                                    <div class="checkout-item ">
                                        <div class="color-all" style="width: 300px">Nama Pemilik Rekening</div>
                                        <div>: {{$data_rekening->nama_pemilik}}</div>
                                    </div>
                                    <div class="checkout-item ">
                                        <div class="color-all" style="width: 300px">jumlah DP pembayaran</div>
                                        <div>: Rp. {{$dp}},-</div>
                                    </div>
                                </div>
                                </div>
                                
                                <form action="/customer/proses_pesanan" method="post">
                                <input required type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
                                <input required type="hidden" name="jumlah" value="{{$dp}}">
                                {{csrf_field()}}
                                    <div class="col-md-12">
                                        <br>
                                        <h3>Lengkapi data bank yang anda gunakan untuk transfer</h3>
                                        <br>
                                        <div class="form-group col-md-12">
                                            <label for="inputcompany_2" class="control-label">Nama Bank</label>
                                            <input required type="text" name="nama_bank" id="inputcompany_2" class="form-control form-address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputemail_2" class="control-label">Nomor Rekening </label>
                                            <input required type="text" name="nomor_rekening" id="inputemail_2" class="form-control form-address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputphone_3" class="control-label">Nama Pemilik Rekening</label>
                                            <input required type="text" name="nama_pemilik" id="inputphone_3" class="form-control form-address">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <br>
                                        <h3>Lengkapi data pemesanan</h3>
                                        <br>
                                        <div class="form-group col-md-12">
                                            <label for="inputcompany_2" class="control-label">Alamat</label>
                                            <input required type="text" name="alamat" id="inputcompany_2" class="form-control form-address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputemail_2" class="control-label">Nama Pengantin Pria </label>
                                            <input required type="text" name="nama_pengantin_pria" id="inputemail_2" class="form-control form-address">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputphone_3" class="control-label">Nama Pengantin Wanita</label>
                                            <input required type="text" name="nama_pengantin_wanita" id="inputphone_3" class="form-control form-address">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart-button-group">
                        <input type="submit" class="cart-btn v2" value="Finish">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('home.layout')

@section('title', 'Item Tambahan')

@section('content')

    <div class="container">
        <br>
        <h3 class="page-title text-center">Item Tambahan</h3>
        <hr>
        <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12 col-pd-v2">
                    <div class="order">
                        <h3>Detail Pesanan</h3>
                        <br>
                        <div class="filter-content">
                            <div class="table-responsive">
                                <div class="checkout-item color-all">
                                    <div>Tanggal</div>
                                    <div>{{$date}}</div>
                                </div>
                                <div class="checkout-item color-all">
                                    <div>Paket</div>
                                    <div>{{$paket->nama_paket}}</div>
                                </div>
                                <div class="checkout-item color-all">
                                    <div>Harga</div>
                                    <div>Rp. {{$paket->harga}},-</div>
                                </div>
                                <div class="checkout-item color-all">
                                    <div><strong>Total</strong></div>
                                    <div>Rp. {{$paket->harga}},-</div>
                                </div>

                            </div>
                            <br>
                            <h3>Detail Harga Item</h3>
                            <br>
                            <div>

                                <table class="table checkout-table">
                                    <thead>
                                        <tr>
                                            <th class="checkouttb-title">Item</th>
                                            <th class="checkouttb-title">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paket->item_pakets as $item)
                                        <tr class="checkout-item">
                                            <td>{{$item->item->nama_item}}</td>
                                            <td>Rp. {{$item->harga_akhir}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <br>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 col-pd">
                    <form action="/customer/simpan_pemesanan" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="paket_id" value="{{$paket->id}}">
                        <input type="hidden" name="date" value="{{$date}}">
                        <div class="order">
                            <h3>Pemilihan Item Tambahan</h3>
                            <br>
                            <div class="filter-content">
                                <div class="form-group">
                                    <label for="date">Silahkan Ceklis jika membutuhkan item tambahan</label>
                                </div>
                                <br>
                            </div>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama Item</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($item_tambahan as $item)
                                    <tr>
                                        <td><input type="checkbox" name="item_tambahan[]" value="{{$item->id}}"></td>
                                        <td>{{$item->nama_item}}</td>
                                        <td>{{$item->deskripsi}}</td>
                                        <td>Rp. {{$item->harga}},-</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="footer">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>

@endsection


@section('js')

<script>
</script>
@endsection

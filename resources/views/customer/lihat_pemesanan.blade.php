@extends('customer.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pemesanan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">


            @if($pemesanan->status == "menunggu pembayaran DP")
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pembayaran Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong></i> Status Pemesanan</strong>

                <p class="text-muted" style="font-size: 20px">
                  <span class="badge badge-success">{{$pemesanan->status}}</span>
                </p>
                <hr>
                <strong></i> Silahkan Melakukan Pembayaran DP untuk pesanan anda ke rekening berikut : </strong>
                <table class="table">
                  <tr>
                    <td>Nama Bank</td>
                    <td>{{$data_rekening->nama_bank}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Rekening</td>
                    <td>{{$data_rekening->nomor_rekening}}</td>
                  </tr>
                  <tr>
                    <td>Nama Pemilik Rekening</td>
                    <td>{{$data_rekening->nama_pemilik}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah pembayaran (DP)</td>
                    <td>Rp. {{$dp}}</td>
                  </tr>
                </table>
                <br>

                <strong></i> Jika Telah Melakukan Pembayaran, Silahkan meingunputkan bukti pembayaran anda di bawah ini : </strong>
                <br>
                <br>
                <form action="/customer/simpan_bukti_pembayaran" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
                  {{csrf_field()}}
                  <div class="form-group">
                    <input required type="file" class="form-control" name="bukti_pembayaran">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                  </div>
                </form>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            @elseif($pemesanan->status == "menunggu pelunasan pembayaran oleh Customer")
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pembayaran Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong></i> Status Pemesanan</strong>

                <p class="text-muted" style="font-size: 20px">
                  <span class="badge badge-success">{{$pemesanan->status}}</span>
                </p>
                <hr>
                <strong></i> Silahkan Melakukan Pelunasan Pembayaran untuk pesanan anda ke rekening berikut : </strong>
                <table class="table">
                  <tr>
                    <td>Nama Bank</td>
                    <td>{{$data_rekening->nama_bank}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Rekening</td>
                    <td>{{$data_rekening->nomor_rekening}}</td>
                  </tr>
                  <tr>
                    <td>Nama Pemilik Rekening</td>
                    <td>{{$data_rekening->nama_pemilik}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah pembayaran (DP)</td>
                    <td>Rp. {{$dp}}</td>
                  </tr>
                </table>
                <br>

                <strong></i> Jika Telah Melakukan Pembayaran, Silahkan meingunputkan bukti pembayaran anda di bawah ini : </strong>
                <br>
                <br>
                <form action="/customer/simpan_bukti_pelunasan" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="pemesanan_id" value="{{$pemesanan->id}}">
                  <input type="hidden" name="jumlah_dibayar" value="{{$dp}}">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Nama Bank</label>
                    <input required type="text" class="form-control" name="nama_bank">
                  </div>
                  <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input required type="text" class="form-control" name="nomor_rekening">
                  </div>
                  <div class="form-group">
                    <label>Nama Pemilik Rekening</label>
                    <input required type="text" class="form-control" name="nama_pemilik">
                  </div>
                  <div class="form-group">
                    <input required type="file" class="form-control" name="bukti_pembayaran">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                  </div>
                </form>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            @endif

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pemesanan Anda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong></i> Status Pemesanan</strong>

                <p class="text-muted" style="font-size: 20px">
                  <span class="badge badge-success">{{$pemesanan->status}}</span>
                </p>

                <strong></i> Wedding Organizer</strong>

                <p class="text-muted">
                  {{$pemesanan->paket->wedding_organizer->nama_perusahaan}}
                </p>

                <hr>
                <strong></i> Paket</strong>

                <p class="text-muted">
                  {{$pemesanan->paket->nama_paket}}
                </p>

                <hr>
                <strong></i> Tanggal</strong>

                <p class="text-muted">
                  {{$pemesanan->tanggal}}
                </p>

                <hr>

                <hr>
                <strong></i> Alamat</strong>

                <p class="text-muted">
                  {{$pemesanan->alamat}}
                </p>

                <hr>

                <hr>
                <strong></i> Pengantin Pria</strong>

                <p class="text-muted">
                  {{$pemesanan->nama_pengantin_pria}}
                </p>

                <hr>

                <hr>
                <strong></i> Pengantin Wanita</strong>

                <p class="text-muted">
                  {{$pemesanan->nama_pengantin_wanita}}
                </p>

                <hr>

                @if($pemesanan->status == "wedding organizer telah memasukan opsi tanggal meeting")
                <form action="/customer/konfirmasi_tanggal_meeting" method="post">{{csrf_field()}}
                  <input type="hidden" name="id" value="{{$pemesanan->id}}">
                  <strong></i> Silahkan Pilih tanggal meeting</strong>

                  <p class="text-muted">
                    <select name="tanggal_meeting" class="form-control">
                    @if(is_array($pemesanan->tanggal_meeting) || is_object($pemesanan->tanggal_meeting))
                      @foreach($pemesanan->tanggal_meeting as $t)
                          <option value="{{$t}}">{{$t}}</option>
                      @endforeach
                    @endif
                    </select>
                  </p>
                  <hr>
                  <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                </form>
                @elseif($pemesanan->status == "menunggu rating dan review dari customer")
                <hr>
                <form action="/customer/simpan_rating" method="post">
                  {{csrf_field()}}
                  <strong></i> Silahkan Berikan Review dan rating untuk wedding organizer</strong>
                  <br>
                  <br>
                  <input type="hidden" name="id" value="{{$pemesanan->id}}">
                  <div class="form-group">
                    <label>Rating</label>
                    <p><i class="fa fa-star" id="star1"></i><i class="fa fa-star" id="star2"></i><i class="fa fa-star" id="star3"></i><i class="fa fa-star" id="star4"></i><i class="fa fa-star" id="star5"></i></p>
                    <input type="hidden" name="rating" id="rating">

                    @if($errors->has('rating'))
                      <div class="alert alert-danger" role="alert"> {{$errors->first('rating')}} </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Komentar</label>
                    <textarea name="komentar" cols="30" rows="10" class="form-control"></textarea>

                    @if($errors->has('komentar'))
                      <div class="alert alert-danger" role="alert"> {{$errors->first('komentar')}} </div>
                    @endif
                  </div>
                  <input type="submit" class="btn btn-primary btn-block" value="Simpan Review dan Rating">
                </form>
                @endif
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

@section('js')
<script>

$(document).ready(function(){
var star1 = $('#star1');
var star2 = $('#star2');
var star3 = $('#star3');
var star4 = $('#star4');
var star5 = $('#star5');
var rating = $('#rating');
star1.click(function(){
  star1.css('color','orange');
  star2.css('color','#212529');
  star3.css('color','#212529');
  star4.css('color','#212529');
  star5.css('color','#212529');
  rating.val(1);
});

star2.click(function(){
  star1.css('color','orange');
  star2.css('color','orange');
  star3.css('color','#212529');
  star4.css('color','#212529');
  star5.css('color','#212529');
  rating.val(2);
});

star3.click(function(){
  star1.css('color','orange');
  star2.css('color','orange');
  star3.css('color','orange');
  star4.css('color','#212529');
  star5.css('color','#212529');
  rating.val(3);
});

star4.click(function(){
  star1.css('color','orange');
  star2.css('color','orange');
  star3.css('color','orange');
  star4.css('color','orange');
  star5.css('color','#212529');
  rating.val(4);
});

star5.click(function(){
  star1.css('color','orange');
  star2.css('color','orange');
  star3.css('color','orange');
  star4.css('color','orange');
  star5.css('color','orange');
  rating.val(5);
});

});

</script>
@stop
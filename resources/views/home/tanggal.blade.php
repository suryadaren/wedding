@extends('home.layout')

@section('title', 'Tanggal')

@section('css')
<style>
    .disabled span{
        color:black !important;
        background:red !important;    
    }
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

@stop

@section('content')

    <div class="container">
        <br>
        <h3 class="page-title text-center">Tanggal Resepsi</h3>
        <hr>
        <br>
        <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12 col-pd-v2">
                    <div class="order">
                        <h3>Detail Pesanan</h3>
                        <br>
                        <div class="filter-content">
                            <div class="table-responsive">
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
                    <div class="order">
                        <h3>Pemilihan Tanggal Resepsi</h3>
                        <br>
                        <div class="filter-content">
                            <h6>Keterangan : 
                            <ul style="color: red">
                                <li>*Hanya dapat memesan sebulan setelah tanggal sekarang</li>
                                <li>*Dapat memesan pada tanggal selain berwarna merah</li>
                            </ul>
                            </h6>
                            <br>

                            <div class="form-group">
                                <label for="date">Klik Kolom dibawah untuk Pilih Tanggal</label>
                                <input id="date" class="date form-control" type="text">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
        </div>
    </div>


      <!-- modal hapus -->
      <div class="modal fade" id="verifikasi">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pilih Tanggal Reservasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin memsan tanggal ini ?</p>
              <br>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form" action="/customer/additional" method="get">
                <input type="hidden" name="paket_id" value="{{$paket->id}}">
                <input type="hidden" name="date">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input type="submit" value="Ya" class="btn btn-primary">
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection


@section('js')

<script>
$(document).ready(function (){

    var unavailableDates = ["1999/05/01"];

    function unavailable(date) {
        var month = new Date(
            new Date().getFullYear(),
            new Date().getMonth() + 1, 
            new Date().getDate()
        );

        ymd = date.getFullYear() + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + ("0"+date.getDate()).slice(-2);

        if (date > month && $.inArray(ymd, unavailableDates) < 0) {
            return [true, "enabled", "Book Now"];
        } else {
            return [false,"disabled","Booked Out"];
        }
    }

    $('#date').datepicker({
        dateFormat: 'yy-mm-dd', 
        beforeShowDay: unavailable,
        onSelect: function(dateText) {
            verifikasi(dateText);
        }

    });

    function verifikasi(date){
        document.forms['form']['date'].value=date;
        $('#verifikasi').modal();
    }

});
</script>
@endsection

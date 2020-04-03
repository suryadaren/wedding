@extends('wo.layout')

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

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemesanan Data</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="card-body">
                <strong></i> Status</strong>

                <p class="text-muted">
                  <span class="badge badge-success">{{$pemesanan->status}}</span>
                </p>

                <hr>
                <strong></i> Nama Customer</strong>

                <p class="text-muted">
                  {{$pemesanan->customer->nama_lengkap}}
                </p>

                <hr>
                <strong></i> Nomor Telepon</strong>

                <p class="text-muted">
                  {{$pemesanan->customer->nomor_telepon}}
                </p>

                <hr>
                <strong></i> Email</strong>

                <p class="text-muted">
                  {{$pemesanan->customer->user->email}}
                </p>

                <hr>
                <strong></i> Paket</strong>

                <p class="text-muted">
                  {{$pemesanan->paket->nama_paket}}
                </p>

                <hr>
                <strong></i> Harga Paket</strong>

                <p class="text-muted">
                  Rp. {{$pemesanan->paket->harga}},-
                </p>

                <hr>
                <strong></i> Tanggal</strong>

                <p class="text-muted">
                  {{$pemesanan->tanggal}}
                </p>

                <hr>
                <strong></i> Alamat</strong>

                <p class="text-muted">
                  {{$pemesanan->alamat}}
                </p>

                <hr>
                <strong></i> Pengantin Pria</strong>

                <p class="text-muted">
                  {{$pemesanan->nama_pengantin_pria}}
                </p>

                <hr>
                <strong></i> Pengantin Wanita</strong>

                <p class="text-muted">
                  {{$pemesanan->nama_pengantin_wanita}}
                </p>

                <hr>
                @if($pemesanan->status == "menunggu konfirmasi meeting telah selesai")
                <strong></i> Tanggal Meeting</strong>

                <p class="text-muted">
                  {{$pemesanan->tanggal_meeting}}
                </p>

                <hr>
                <a href="/wo/meeting_selesai/{{$pemesanan->id}}" class="btn btn-primary btn-block">Konfirmasi bahwa meeting telah selesai</a>
                @elseif($pemesanan->status == "menunggu konfirmasi pemesanan selesai")
                <strong></i> Tanggal Meeting</strong>

                <p class="text-muted">
                  {{$pemesanan->tanggal_meeting}}
                </p>

                <hr>
                <a href="/wo/pemesanan_selesai/{{$pemesanan->id}}" class="btn btn-primary btn-block">Konfirmasi bahwa pemesanan ini telah selesai</a>
                @endif
                <input type="hidden" name="tanggal" id="tanggal" value="{{$pemesanan->tanggal}}">
                @if($pemesanan->status == "menunggu penjadwalan meeting")
                <form action="/wo/opsi_tanggal_meeting" method="post">{{csrf_field()}}
                  <input type="hidden" name="id" value="{{$pemesanan->id}}">
                  <strong></i> Silahkan Pilih tanggal meeting</strong>
                  <p style="color: red">*pilih Maksimal 3 opsi tanggal available untuk meeting</p>

                  <p class="text-muted">
                    <label >Opsi Tanggal 1</label>
                    <input required type="text" name="date[]" id="dateA" class="date form-control">
                  </p>

                  <p class="text-muted">
                    <label >Opsi Tanggal 2</label>
                    <input type="text" id="dateB" name="date[]" class="date form-control">
                  </p>

                  <p class="text-muted">
                    <label >Opsi Tanggal 3</label>
                    <input type="text" id="dateC" name="date[]" class="date form-control">
                  </p>

                  <hr>
                  <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                </form>
                @endif
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
$(document).ready(function (){

    var unavailableDates = ["2020/05/01"];

    var tanggal = $('#tanggal').val();
    tanggal = new Date(tanggal);
    var now = new Date();
    function unavailable(date) {

        ymd = date.getFullYear() + "/" + ("0"+(date.getMonth()+1)).slice(-2) + "/" + ("0"+date.getDate()).slice(-2);

        if (date < tanggal && date > now && $.inArray(ymd, unavailableDates) < 0) {
            return [true, "enabled", "Book Now"];
        } else {
            return [false,"disabled","Booked Out"];
        }
    }

    $('#dateA').datepicker({
        dateFormat: 'yy-mm-dd',
        beforeShowDay: unavailable
    });
    $('#dateB').datepicker({
        dateFormat: 'yy-mm-dd',
        beforeShowDay: unavailable
    });
    $('#dateC').datepicker({
        dateFormat: 'yy-mm-dd',
        beforeShowDay: unavailable
    });

    function verifikasi(){
        $('#verifikasi').modal();
    }

});
</script>
@stop
@extends('admin.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pembayaran Data</h1>
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
                  <span class="badge badge-success">{{$pembayaran->status}}</span>
                </p>

                <hr>
                <strong></i> Nama Customer</strong>

                <p class="text-muted">
                  {{$pembayaran->customer->nama_lengkap}}
                </p>

                <hr>
                <strong></i> Wedding Organizer</strong>

                <p class="text-muted">
                  {{$pembayaran->pemesanan->paket->wedding_organizer->nama_perusahaan}}
                </p>

                <hr>
                <strong></i> Paket</strong>

                <p class="text-muted">
                  {{$pembayaran->pemesanan->paket->nama_paket}}
                </p>

                <hr>
                <strong></i> Harga Paket</strong>

                <p class="text-muted">
                  Rp. {{$pembayaran->pemesanan->paket->harga}},-
                </p>

                <hr>
                <h3>Data Rekening Pengirim</h3>
                <hr>
                <strong></i> Nama Bank</strong>

                <p class="text-muted">
                  {{$pembayaran->nama_bank}}
                </p>

                <hr>
                <strong></i> Nomor Rekening</strong>

                <p class="text-muted">
                  {{$pembayaran->nomor_rekening}}
                </p>

                <hr>
                <strong></i> Nama Pemilik Rekening</strong>

                <p class="text-muted">
                  {{$pembayaran->nama_pemilik}}
                </p>

                <hr>
                <strong></i> Jumlah dibayar</strong>

                <p class="text-muted">
                  Rp. {{$pembayaran->jumlah}},-
                </p>

                <hr>
                <strong></i> Bukti Pembayaran</strong>

                <p class="text-muted">
                  <img style="width: 100%" src="{{Storage::url($pembayaran->bukti_pembayaran)}}" class="img image" alt="img">
                </p>

                <hr>
                @if($pembayaran->status == "menunggu konfirmasi pembayaran DP oleh admin")
                <a href="#" onclick="konfirmasi('{{$pembayaran->id}}')" class="btn btn-primary btn-block"><b>Konfirmasi pembayaran</b></a>
                @elseif($pembayaran->status == "menunggu konfirmasi pelunasan pembayaran oleh admin")
                <a href="#" onclick="konfirmasi2('{{$pembayaran->id}}')" class="btn btn-primary btn-block"><b>Konfirmasi pembayaran</b></a>
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



      <!-- modal setujui -->
      <div class="modal fade" id="setujui">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Setujui Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menyetujui pembayaran ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form_setujui" action="/admin/setujui_pembayaran" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id">
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



      <!-- modal setujui -->
      <div class="modal fade" id="setujui2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Setujui Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menyetujui pembayaran ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form_setujui2" action="/admin/setujui_pelunasan" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id">
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

<script>
  function konfirmasi(id){
    document.forms['form_setujui']['id'].value=id;
    $('#setujui').modal();
  }
  function konfirmasi2(id){
    document.forms['form_setujui2']['id'].value=id;
    $('#setujui2').modal();
  }
</script>

@stop
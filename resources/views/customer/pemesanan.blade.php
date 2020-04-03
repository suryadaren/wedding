@extends('customer.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Wedding Orginizer</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Wedding Orginizer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"><table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Wedding Organizer</th>
                  <th>Paket</th>
                  <th>Harga</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pemesanans as $pemesanan)
                    <tr>
                      <td>{{$pemesanan->paket->wedding_organizer->nama_perusahaan}}</td>
                      <td>{{$pemesanan->paket->nama_paket}}</td>
                      <td>Rp. {{$pemesanan->harga}},-</td>
                      <td>{{$pemesanan->tanggal}}</td>
                      <td>
                      <span class="badge badge-success">{{$pemesanan->status}}</span></td>
                      <td>
                        <a href="/customer/lihat_pemesanan/{{$pemesanan->id}}" class="btn btn-primary"><abbr title="Lihat"><i class="fa fa-eye"></i> </abbr></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->




      <!-- modal hapus -->
      <div class="modal fade" id="hapus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah Anda yakin ingin menghapus data ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form_hapus" method="post" action="/admin/hapus_wo">
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
  
  function hapus(id){
    document.forms['form_hapus']['id'].value=id;
    $('#hapus').modal();
  }
</script>
@stop
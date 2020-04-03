@extends('wo.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Paket</h1>
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
              <h3 class="card-title">Daftar Paket</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="/wo/tambah_paket" class="btn btn-primary">Tambah Paket</a>
              <br>
              <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Foto</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pakets as $paket)
                    <tr>
                      <td><img src="{{Storage::url($paket->foto)}}" style="width: 100px" alt="img"></td>
                      <td>{{$paket->nama_paket}}</td>
                      <td>Rp. {{$paket->harga}},-</td>
                      <td>{{$paket->deskripsi}}</td>
                      <td>
                        <a href="/wo/tambah_item_paket/{{$paket->id}}" class="btn btn-primary"><abbr title="Tambah Item"><i class="fa fa-plus"></i> </abbr></a>
                        <a href="/wo/edit_paket/{{$paket->id}}" class="btn btn-warning"><abbr title="Edit"><i class="fa fa-edit"></i> </abbr></a>
                        <a onclick="hapus('{{$paket->id}}')" class="btn btn-danger"><abbr title="Hapus"><i class="fa fa-trash"></i> </abbr></a>
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
              <p>Apakah Anda yakin ingin menghapus paket ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form" action="/wo/hapus_paket" method="post">
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
    document.forms['form']['id'].value=id;
    $('#hapus').modal();
  }
</script>

@stop
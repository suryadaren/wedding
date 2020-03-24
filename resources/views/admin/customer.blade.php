@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Customer</h1>
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
              <h3 class="card-title">Daftar Customer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"><table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$customer->user->username}}</td>
                    <td>{{$customer->nama_lengkap}}</td>
                    <td>{{$customer->user->email}}</td>
                    <td>{{$customer->nomor_telepon}}</td>
                    <td>
                        @if($customer->user->verified)
                          <span class="badge badge-success">Sudah Verfikasi</span>
                        @else
                          <span class="badge badge-danger">Belum Verifikasi</span>
                        @endif
                    </td>
                    <td>
                      <a href="/admin/lihat_customer/{{$customer->id}}" class="btn btn-primary"><abbr title="Lihat"><i class="fa fa-eye"></i> </abbr></a>
                      @if($customer->user->verified)
                        <a class="btn btn-danger" onclick="hapus('{{$customer->id}}')"><abbr title="Hapus"><i class="fa fa-trash"></i> </abbr></a>
                      @endif
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
              <form name="form_hapus" method="post" action="/admin/hapus_customer">
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
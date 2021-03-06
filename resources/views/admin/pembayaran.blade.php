@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Pembayaran</h1>
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
              <h3 class="card-title">Daftar Pembayaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"><table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Customer</th>
                  <th>WO</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pembayarans as $pembayaran)
                  <tr>
                    <td>{{$pembayaran->customer->nama_lengkap}}</td>
                    <td>{{$pembayaran->pemesanan->paket->wedding_organizer->nama_perusahaan}}</td>
                    <td>Rp. {{$pembayaran->jumlah}},-</td>
                    <td>{{$pembayaran->updated_at}}</td>
                    <td>
                      <span class="badge badge-success">{{$pembayaran->status}}</span>
                    </td>
                    <td>
                      <a href="/admin/lihat_pembayaran/{{$pembayaran->id}}" class="btn btn-primary"><abbr title="Lihat"><i class="fa fa-eye"></i> </abbr></a>
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

@stop
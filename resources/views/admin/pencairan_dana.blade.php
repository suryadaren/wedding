@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Pencairan Dana</h1>
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
              <h3 class="card-title">Daftar Pencairan Dana</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body"><table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Wedding Organizer</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pencairan_dana as $pencairan)
                  <tr>
                    <td>{{$pencairan->pemesanan->wedding_organizer->nama_perusahaan}}</td>
                    <td>Rp. {{$pencairan->pemesanan->harga}},-</td>
                    <td>
                      <span class="badge badge-success">{{$pencairan->status}}</span>
                    </td>
                    <td>
                      <a href="/admin/lihat_pencairan_dana/{{$pencairan->id}}" class="btn btn-primary"><abbr title="Lihat"><i class="fa fa-eye"></i> </abbr></a>
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
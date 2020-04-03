@extends('wo.layout')

@section('content')

   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Item</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h5 class="title">Masukan Data Item Terbaru</h5>
                </div>
              <div class="card-body">
                <div class="tab-content">
                  <div id="settings">
                    <form class="form-horizontal" action="/wo/update_item" method="post"> {{csrf_field()}}
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <input type="hidden" name="_method" value="put">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama Item</label>
                        <div class="col-sm-10">
                          <input type="text" name="nama_item" value="{{$item->nama_item}}" class="form-control" id="inputName">
                        </div>
                      </div>
                      @if($errors->has('nama_item'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('nama_item')}} </div>
                      @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Harga (Rp)</label>
                        <div class="col-sm-10">
                          <input type="text" name="harga" id="harga" value="{{$item->harga}}" class="form-control" id="inputName">
                        </div>
                      </div>
                      @if($errors->has('harga'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('harga')}} </div>
                      @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Deksripsi</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="deskripsi" style="width: 100%">{{$item->deskripsi}}</textarea>
                        </div>
                      </div>
                      @if($errors->has('deskripsi'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('deskripsi')}} </div>
                      @endif
                      <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
        
      var rupiah = document.getElementById('harga');
      rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, '');
      });

      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
      }
    </script>
@stop
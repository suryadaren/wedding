@extends('wo.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Item Paket</h1>
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
              <h3 class="card-title">Info Harga Paket</h3>
            </div>
              <div class="card-body">
                <div class="tab-content">
                  <div id="settings">
                    <h3>Harga Paket : Rp. {{$paket->harga}},-</h3>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
            <!-- /.card-body -->
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Item Paket</h3>
            </div>
              <div class="card-body">
                <div class="tab-content">
                  <div id="settings">
                    <form class="form-horizontal" action="/wo/simpan_item_paket" method="post"> {{csrf_field()}}
                      <input type="hidden" name="paket_id" value="{{$paket->id}}">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Pilih Item</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="item_wedding_organizer_id" id="item_wedding_organizer_id">
                            @foreach($semua_items as $item)
                            <option value="{{$item->id}}">{{$item->nama_item}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      @if($errors->has('nama_item'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('nama_item')}} </div>
                      @endif
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Harga Awal (Rp)</label>
                        <div class="col-sm-10">
                          <input type="text" readonly name="harga_awal" id="harga_awal" value="{{old('harga_awal')}}" class="form-control" id="inputName">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Deksripsi</label>
                        <div class="col-sm-10">
                          <textarea readonly class="form-control" name="deskripsi" id="deskripsi" style="width: 100%"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Harga Akhir (Rp)</label>
                        <div class="col-sm-10">
                          <input type="text" name="harga_akhir" id="harga_akhir" value="{{old('harga_akhir')}}" class="form-control" id="inputName">
                        </div>
                      </div>
                      @if($errors->has('harga_akhir'))
                        <div class="alert alert-danger" role="alert"> {{$errors->first('harga_akhir')}} </div>
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
            <!-- /.card-header -->
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Item Tambahan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Item</th>
                  <th>Harga Awal</th>
                  <th>Harga Akhir</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="body_table">
                  @foreach($item_pakets as $item_pack)
                  <tr>
                    <td>{{$item_pack->item->nama_item}}</td>
                    <td>Rp. {{$item_pack->harga_awal}},-</td>
                    <td>Rp. {{$item_pack->harga_akhir}},-</td>
                    <td>
                    <a onclick="hapus('{{$item_pack->id}}')" class="btn btn-danger"><abbr title="Hapus"><i class="fa fa-trash"></i> </abbr></a>
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
              <p>Apakah Anda yakin ingin menghapus item ini ?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form name="form" action="/wo/hapus_item_paket" method="post">
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

@stop

@section('js')
<script>
  function hapus(id){
    document.forms['form']['id'].value=id;
    $('#hapus').modal();
  }
</script>
<script>
  $(document).ready(function(){
    $('#item_wedding_organizer_id').change(function(){
      id = $('#item_wedding_organizer_id').val();
      $.ajax({
        type : "GET",
        url : '/wo/data_item/'+id,
        success:function(data){
          $('#harga_awal').val(data['harga']);
          $('#deskripsi').val(data['deskripsi']);
        }
      });
    });

  });
</script>
<script type="text/javascript">
        
      var rupiah = document.getElementById('harga_akhir');
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
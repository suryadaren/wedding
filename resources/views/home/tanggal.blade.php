@extends('home.layout')

@section('title')
<title>Wedding Planner | Login</title>
@endsection

@section('content')

    <div class="container">
        <ul class="breadcrumb">
        </ul>
        <h1 class="page-title text-center">JADWAL</h1>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="container">

                            <h1>Tanggal Resepsi</h1>
                            <br>
                            <h5>Silahkan pilih tanggal untuk pemesanan di bawah ini</h5>
                            <br>

                            <input class="date form-control" type="text">
                            <br>
                            <a href="/additional" class="btn btn-primary">Submit</a>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  
@endsection

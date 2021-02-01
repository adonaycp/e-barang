@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Input Data Barang</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  {!! Form::open(['url' => 'barang', 'method' => 'POST']) !!}
    {!! csrf_field() !!}
    <div class="card-body">
      <div class="form-group col-sm-6">
        <label for="status">Nama Barang:</label><br/>
        <input type="text" name="nama_brg" id="nama_barang" class="form-control">
        
        <div id="penghitungan">
          <label for="status" class="sorting_asc" tabindex="0">Item:</label><br/>
          <input type="text" name="item" id="item" class="form-control" onkeyup="hitung()" value="">

          <label for="status">Harga Satuan:</label><br/>
          <input type="text" name="hrg_satuan" id="hrg_satuan" class="form-control" onkeyup="hitung()" value="">
          
          <label for="status">Harga Jumlah:</label><br/>
          <input type="text" name="hrg_jumlah" id="hrg_jumlah" class="form-control" value="" readonly="readonly">
        </div>

        <div class="tanggal">
          <label for="status">Tanggal Input:</label><br/>
          <input type="text" name="tgl_input" id="tgl_input" class="date form-control">

          <!-- <label for="status">Tanggal Update:</label><br/>
          <input type="text" name="tgl_update" id="tgl_update" class="date form-control"> -->
      
          <label for="status">Tanggal Pembelian:</label><br/>
          <input type="text" name="tgl_beli" id="tgl_beli" class="date form-control">
          
          <script type="text/javascript">
            $('.date').datepicker({  
            format: 'dd-mm-yyyy'
            }); 
          </script>
        </div>
      
        <!-- <label for="status">Operator Input:</label><br/>
        <input type="text" name="operatorinput" id="operatorinput" class="form-control" readonly="readonly" value="{{Auth::guard()->user()->id}}">
        -->
        <label for="status">Tahun:</label><br/>
        <input type="text" name="tahun" id="tahun" class="form-control">
      </div>
    </div>

    <div class="card-footer">
      {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
    </div>

    <script type="text/javascript">
      function hitung()
      {
        var item = document.getElementById('item').value;
        var hrg_satuan = document.getElementById('hrg_satuan').value;

        var  hrg_jumlah= (parseInt(item)) * (parseInt(hrg_satuan));
        if (!isNaN(hrg_jumlah)) {
           document.getElementById('hrg_jumlah').value = hrg_jumlah;
        }
      }
    </script>
  {!! Form::close() !!}
</div>
@endsection

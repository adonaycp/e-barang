@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Tambah Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/barang') }}">Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

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
            <input type="text" name="nama_brg" id="nama_barang" class="form-control" required>
            
            <label for="jenis">Jenis</label><br/> 
                <select name="id_category" class="form-control">
                <option value="">-Pilih-</option>
                @foreach($categories as $item)
                    <option value="{{$item->id_category}}">{{$item->nama_category}}</option>
                @endforeach
            </select>
            
            <div id="penghitungan">
                <label for="status" class="sorting_asc" tabindex="0">Item:</label><br/>
                <input type="number" name="item" id="item" class="form-control" onkeyup="hitung()" min="0" required>

                <label for="status">Harga Satuan:</label><br/>
                <input type="number" name="hrg_satuan" id="hrg_satuan" class="form-control" onkeyup="hitung()" min="0" required>
                
                <label for="status">Harga Jumlah:</label><br/>
                <input type="number" name="hrg_jumlah" id="hrg_jumlah" class="form-control" min="0" readonly="readonly">
            </div>

            <div class="tanggal">
                <label for="status">Tanggal Input:</label><br/>
                <input date-format="yyyy-mm-dd" name="tgl_input" id="tgl_input" class="date form-control"  required>
            
                <label for="status">Tanggal Pembelian:</label><br/>
                <input date-format="yyyy-mm-dd" name="tgl_pembelian" id="tgl_pembelian" class="date form-control" required>
            </div>

            <label for="status">Tahun:</label><br/>
            <input type="number" name="tahun" id="tahun" class="form-control" required>
        </div>
    </div>

    <div class="card-footer">
      {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
    </div>

    <script type="text/javascript">
        (function(){
            $('.date').datepicker({  
                weekStart: 1,
                autoclose:true,
                todayHighlight:true,
                format:'yyyy-mm-dd',
                language: 'id'
            });

            hitung();
        }());

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

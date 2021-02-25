@extends('layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Input Data Beli Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/beli-barang') }}">Data Beli Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data Beli Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Input Data Beli Barang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {!! Form::open(['url' => 'beli-barang', 'method' => 'POST']) !!}
        {!! csrf_field() !!}
        <div class="card-body">
            <div class="form-group col-sm-6">
                <label for="nama_brg">Nama Barang</label><br/> 
                <select name="id_barang" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($barangs as $item)
                        <option value="{{$item->id_barang}}">{{$item->nama_brg}}</option>
                    @endforeach
                </select>

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
                    <label for="status">Tanggal Beli:</label><br/>
                    <input date-format="yyyy-mm-dd" name="tgl_beli" id="tgl_beli" class="form-control" required>
                </div>

            </div>
        </div>

        <div class="card-footer">
        {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
        </div>

        <script type="text/javascript">
            (function(){
                $('#tgl_beli').datepicker({  
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

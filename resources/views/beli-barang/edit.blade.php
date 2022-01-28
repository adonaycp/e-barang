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
                <h1 class="m-0 text-dark ">Edit Data Beli Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/beli-barang') }}">Data Beli Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Beli Barang</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Beli Barang</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('beli-barang.update', $belibarang->id_belibarang)}}" method = POST>
        {!! csrf_field() !!}
        @method('patch')
        <div class="card-body">
            <div class="form-group col-sm-6">
                <label for="nama_brg">Nama Barang</label><br/> 
                <select name="id_barang" class="form-control">
                    @foreach($barangs as $item)
                    <option value="{{ $item->id_barang }}"
                        @if ($item->id_barang === $belibarang->id_barang)
                        selected="selected"
                        @endif
                    >
                    {{$item->nama_brg}}</option>
                    @endforeach
                </select>

                <label for="jenis">Jenis</label><br/> 
                <select name="id_category" class="form-control">
                    @foreach($categories as $item)
                    <option value="{{ $item->id_category }}"
                    @if ($item->id_category === $belibarang->id_category)
                        selected="selected"
                    @endif
                    >
                    {{$item->nama_category}}</option>
                    @endforeach
                </select>

                <div id="penghitungan">
                    <label for="status" class="sorting_asc" tabindex="0">Item:</label><br/>
                    <input type="number"  name="item" id="item" class="form-control" onkeyup="hitung()" value="{{ $belibarang->item }}">
                    @error('item')
                    <div>
                        <small class="text-danger">
                        {{ $message }}
                        </small>
                    </div>
                    @enderror
                    <label for="status">Harga Satuan:</label><br/>
                    <input type="number"  name="hrg_satuan" id="hrg_satuan" class="form-control" onkeyup="hitung()" value="{{ $belibarang->hrg_satuan }}">
                    @error('hrg_satuan')
                    <div>
                        <small class="text-danger">
                        {{ $message }}
                        </small>
                    </div>
                    @enderror
                    <label for="status">Harga Jumlah:</label><br/>
                    <input type="number" min="0" name="hrg_jumlah" id="hrg_jumlah" class="form-control" value="@currency($belibarang->hrg_jumlah)" readonly="readonly">
                </div>

                <div class="tanggal">
                    <label for="status">Tanggal Beli:</label><br/>
                    <input date-format="yyyy-mm-dd" name="tgl_beli" id="tgl_beli" class="form-control" value="{{ $belibarang->tgl_beli }}">
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

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
                <h1 class="m-0 text-dark ">Ambil Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/ambil-barang') }}">Data Ambil Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Data Ambil Barang</h3>
    </div>
  <!-- /.card-header -->
  <!-- form start -->
    <form action="{{ route('ambil-barang.update', $ambilbarang->id_ambilbarang)}}" method = POST>
        {!! csrf_field() !!}
        @method('patch')
        <div class="card-body">
            <div class="form-group col-sm-6">
            
                <label for="nama_brg">Nama Barang</label><br/> 
                    <select name="id_barang" class="form-control">
                        @foreach($barangs as $item)
                        <option value="{{ $item->id_barang }}"
                            @if ($item->id_barang === $ambilbarang->id_barang)
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
                        @if ($item->id_category === $ambilbarang->id_category)
                            selected="selected"
                        @endif
                        >
                        {{$item->nama_category}}</option>
                        @endforeach
                    </select>

                <label for="status" class="sorting_asc" tabindex="0">Total Ambil:</label><br/>
                <input type="number" name="total_ambil" id="total_ambil" class="form-control" value="{{ $ambilbarang->total_ambil }}" required>

                @error('total_ambil')
                <div>
                    <small class="text-danger">
                    {{ $message }}
                    </small>
                </div>
                @enderror

                    <label for="status">Tanggal Ambil:</label><br/>
                    <input date-format="yyyy-mm-dd" name="tgl_ambil" id="tgl_ambil" class="form-control" value="{{ $ambilbarang->tgl_ambil }}">
                    <script type="text/javascript">
                        $('#tgl_ambil').datepicker({  
                            weekStart: 1,
                            autoclose:true,
                            todayHighlight:true,
                            format:'yyyy-mm-dd',
                            language: 'id'
                        }); 
                    </script>

                <label>Nama Pengambil:</label><br/>
                <input type="text" name="nama_pengambil" value="{{ $ambilbarang->nama_pengambil }}" class="form-control">

                <label for="status">Bidang</label><br/>
                <select name="bidang" class="form-control">
                    <option value="{{ $ambilbarang->bidang }}">{{ $ambilbarang->bidang }}</option>
                    <option value="1">Bidang 1</option>
                    <option value="2">Bidang 2</option>
                    <option value="3">Bidang 3</option>
                    <option value="4">Bidang 4</option>
                </select>
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

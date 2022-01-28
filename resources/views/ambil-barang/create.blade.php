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
              <h1 class="m-0 text-dark ">Input Data Ambil Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/ambil-barang') }}">Data Ambil Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Data Ambil Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Input Data Ambil Barang</h3>
    </div>
  <!-- /.card-header -->
  <!-- form start -->
    {!! Form::open(['url' => 'ambil-barang', 'method' => 'POST']) !!}
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

                <label for="status" class="sorting_asc" tabindex="0">Total Ambil:</label><br/>
                <input type="number" name="total_ambil" id="total_ambil" class="form-control" value="" required>
                @error('total_ambil')
          <small class="text-danger">
          {{ $message }}
          </small>
        @enderror
                <div class="tanggal">
                    <label for="status">Tanggal Ambil:</label><br/>
                    <input date-format="yyyy-mm-dd" name="tgl_ambil" id="tgl_ambil" class="form-control" required>
                    
                    <script type="text/javascript">
                        $('#tgl_ambil').datepicker({  
                            weekStart: 1,
                            autoclose:true,
                            todayHighlight:true,
                            format:'yyyy-mm-dd',
                            language: 'id'
                        }); 
                    </script>

                </div>

                <label for="status" class="sorting_asc" tabindex="0">Nama Pengambil:</label><br/>
                <input type="text" name="nama_pengambil" id="nama_pengambil" class="form-control" value="" required>

                <label for="status">Bidang</label><br/>
                <select name="bidang" class="form-control">
                    <option value="">-Pilih-</option>
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
    {!! Form::close() !!}
</div>
@endsection

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
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Data Barang</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{ route('barang.update', $barangs->id_barang)}}" method = POST>
    {!! csrf_field() !!}
    @method('patch')
    <div class="card-body">
      <div class="form-group col-sm-6">
        <label for="status">Nama Barang:</label><br/>
        <input type="text" name="nama_brg" id="nama_brg" value="{{ $barangs->nama_brg }}" class="form-control" required>
        
        <label for="jenis">Jenis</label><br/> 
        <select name="id_category" class="form-control">
          @foreach($categories as $item)
            <option value="{{$item->id_category}}"
            @if ($item->id_category === $barangs->id_category)
                selected="selected"
            @endif
            >
            {{$item->nama_category}}</option>
          @endforeach
        </select>
        <div id="penghitungan">
          <label for="status" class="sorting_asc" tabindex="0">Item:</label><br/>
          <input type="text" name="item" id="item" value="{{ $barangs->item }}" class="form-control" onkeyup="hitung()" required>

          <label for="status">Harga Satuan:</label><br/>
          <input type="text" name="hrg_satuan" id="hrg_satuan" value="{{ $barangs->hrg_satuan }}" class="form-control" onkeyup="hitung()" required>
          
          <label for="status">Harga Jumlah:</label><br/>
          <input type="text" name="hrg_jumlah" id="hrg_jumlah" class="form-control" value="{{ $barangs->hrg_jumlah }}" readonly="readonly">
        </div>

        <div class="tanggal">
          <label for="status">Tanggal Input:</label><br/>
          <input type="text" name="tgl_input" id="tgl_input" class="date form-control" value="{{ $barangs->tgl_input }}" readonly="readonly" required>
      
          <label for="status">Tanggal Pembelian:</label><br/>
          <input type="text" name="tgl_pembelian" id="tgl_pembelian" class="date form-control" value="{{ $barangs->tgl_pembelian }}" required>
          
          <script type="text/javascript">
            $('.date').datepicker({  
            format: 'dd-mm-yyyy'
            }); 
          </script>
        </div>
        <label for="status">Tahun:</label><br/>
        <input type="text" name="tahun" id="tahun" class="form-control" value="{{ $barangs->tahun }}" required>
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

@extends('layouts.app')

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
        <input type="text" name="total_ambil" id="total_ambil" class="form-control" value="{{ $ambilbarang->total_ambil }}" required>

        <!-- <div id="penghitungan">
          <label for="status" class="sorting_asc" tabindex="0">Item:</label><br/>
          <input type="text" name="item" id="item" class="form-control" onkeyup="hitung()" value="" required>

          <label for="status">Harga Satuan:</label><br/>
          <input type="text" name="hrg_satuan" id="hrg_satuan" class="form-control" onkeyup="hitung()" value="" required>
          
          <label for="status">Harga Jumlah:</label><br/>
          <input type="text" name="hrg_jumlah" id="hrg_jumlah" class="form-control" value="" readonly="readonly">
        </div> -->

        <div class="tanggal">
          <label for="status">Tanggal Ambil:</label><br/>
          <input type="text" name="tgl_ambil" id="tgl_ambil" class="date form-control" value="{{ $ambilbarang->tgl_ambil }}">
          
          <script type="text/javascript">
            $('.date').datepicker({  
            format: 'dd-mm-yyyy'
            }); 
          </script>

        </div>

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

    <!-- <script type="text/javascript">
      function hitung()
      {
        var item = document.getElementById('item').value;
        var hrg_satuan = document.getElementById('hrg_satuan').value;

        var  hrg_jumlah= (parseInt(item)) * (parseInt(hrg_satuan));
        if (!isNaN(hrg_jumlah)) {
           document.getElementById('hrg_jumlah').value = hrg_jumlah;
        }
      }
    </script> -->
  {!! Form::close() !!}
</div>
@endsection
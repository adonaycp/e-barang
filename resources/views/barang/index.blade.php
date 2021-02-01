@extends('layouts.app')

@section('content')
<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->get('warning'))
        <div class="alert alert-danger">
            {{ session()->get('warning') }}
        </div>
    @endif

  <div class="card">
    <div class="card-header">
      <div class="row">
          <a href="{{ url('/barang/create') }}" class="btn bg-gradient-primary btn-md" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>&nbsp;&nbsp;
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="barang" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Item</th>
            <th>Harga Satuan </th>
            <th>Harga Jumlah</th>
            <th>Tanggal Input</th>
            <!-- <th>Tanggal Update</th> -->
            <th>Tanggal Pembelian</th>
            <!-- <th>Operator Input</th> -->
            <th>Tahun</th>
          </tr>
        @foreach($barang as $row)
        <tr>
          <td>{{$row['id']}}</td>
          <td>{{$row['nama_brg']}}</td>
          <td>{{$row['item']}}</td>
          <td>{{$row['hrg_satuan']}}</td>
          <td>{{$row['hrg_jumlah']}}</td>
          <td>{{$row['tgl_input']}}</td>
          <!-- <td>{{$row['tgl_update']}}</td> -->
          <td>{{$row['tgl_pembelian']}}</td>
          <!-- <td>{{$row['operatorinput']}}</td> -->
          <td>{{$row['tahun']}}</td>
        </tr>
        @endforeach
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
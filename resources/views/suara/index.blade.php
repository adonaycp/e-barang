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
          <a href="{{ url('/suara/create') }}" class="btn bg-gradient-primary btn-md" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>&nbsp;&nbsp;
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="datasuara" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Kecamatan</th>
          <th>Kelurahan</th>
          <th>No. TPS</th>
          <th>P1</th>
          <th>P2</th>
          <th>Tdk Sah</th>
          <th>Jmlh Pemilih</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

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
          <a href="{{ url('/category/create') }}" class="btn bg-gradient-primary btn-md" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>&nbsp;&nbsp;
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="category" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
          </tr>
        @foreach($category as $row)
        <tr>
          <td>{{$row['id_category']}}</td>
          <td>{{$row['nama_category']}}</td>
          <td>{{$row['status']}}</td>
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
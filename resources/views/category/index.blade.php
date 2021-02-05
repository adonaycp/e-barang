@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark ">Kategori</h1>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

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
        </thead>
        <tbody>
          @foreach($category as $row)
          <tr>
            <td>{{$row['id_category']}}</td>
            <td>{{$row['nama_category']}}</td>
            <td>{{$row['status']}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
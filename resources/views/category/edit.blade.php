@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark ">Tambah Kategori</h1>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/category') }}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Data Kategori</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="{{ route('category.update', $categories->id_category)}}" method = POST>
    {!! csrf_field() !!}
    @method('patch')
    
    <div class="card-body">
      <div class="form-group col-sm-6">
        <label for="status">Nama Kategori:</label><br/>
        <input type="text" name="nama_category" id="nama_category" class="form-control" value="{{ $categories->nama_category }}" required>
      
        <div class="status">
          <label for="status" >Status :</label><br/>
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="Digunakan" {{ $categories->status == 'Digunakan' ? 'checked' : ''}} required>
            <label class="form-check-label" for="flexRadioDefault1">Digunakan</label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Digunakan" {{ $categories->status == 'Tidak Digunakan' ? 'checked' : ''}} required>
            <label class="form-check-label" for="flexRadioDefault2">Tidak Digunakan</label>
          </div>
        </div>

      </div>
    </div>

    <div class="card-footer">
      {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
</div>
@endsection

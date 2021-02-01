@extends('layouts.app')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Input Data Kategori</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  {!! Form::open(['url' => 'category', 'method' => 'POST']) !!}
    {!! csrf_field() !!}
    
    <div class="card-body">
      <div class="form-group col-sm-6">
        <label for="status">Nama Kategori:</label><br/>
        <input type="text" name="nama_category" id="nama_category" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label for="status">Status :</label><br/>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status" value="Digunakan">
          <label class="form-check-label" for="flexRadioDefault1">
            Digunakan
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Digunakan">
          <label class="form-check-label" for="flexRadioDefault2">
          Tidak Digunakan
          </label>
        </div>

      </div>
    </div>
    <div class="card-footer">
      {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
</div>
@endsection

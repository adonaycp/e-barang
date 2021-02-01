@extends('layouts.app')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Input Data Pemilih</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  {!! Form::open(['url' => 'suara', 'method' => 'POST']) !!}
    {!! csrf_field() !!}
    <div class="card-body">
      <div class="form-group col-sm-6">
        <label for="kecamatan_id">Kecamatan :</label><br/>
        {!! Form::select('kecamatan_id', $kecamatans, null, ['class'=>'form-control select2', 'required'=>'required', 'id'=>'kecamatan_id']) !!}
      </div>
      <div class="form-group col-sm-6">
        <label for="kelurahan_id">Kelurahan :</label><br/>
        {!! Form::select('kelurahan_id', [], null, ['class'=>'form-control select2', 'required'=>'required', 'id'=>'kelurahan_id']) !!}
      </div>
      <div class="form-group col-sm-6">
        <label for="status">No. TPS :</label><br/>
        <input type="text" name="no_tps" id="no_tps" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label for="status">Paslon 1 :</label><br/>
        <input type="text" name="paslon_1" id="paslon_1" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label for="status">Paslon 2 :</label><br/>
        <input type="text" name="paslon_2" id="paslon_2" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label for="status">Suara tdk Sah :</label><br/>
        <input type="text" name="suara_tdk_sah" id="suara_tdk_sah" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label for="status">Jumlah pemilih per TPS :</label><br/>
        <input type="text" name="jmlh_suara" id="jmlh_suara" class="form-control">
      </div>
    </div>
    <div class="card-footer">
      {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
    </div>
  {!! Form::close() !!}
</div>
@endsection

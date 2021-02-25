@extends('layouts.app')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark ">Profile</h1>
      </div>
      <div class="col-sm-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
        {{ session('error') }}
        </div>
    @endif

    <div class="card card-primary">
        <div class="card-header">Hello {{Auth::user()->name}}!</div>
        
        <form action="{{ route('gantiPassword')}}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group col-md-6"> 
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->name }}">

                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ Auth::user()->username }}">

                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" value="">
                </div>
            </div>

            <div class="card-footer">
                {{ Form::submit('Simpan Data', ['class' => 'btn btn-primary']) }}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

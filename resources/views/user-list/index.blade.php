@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Daftar Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Pengguna</li>
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
                <a href="{{ url('/auth/register') }}" class="btn bg-gradient-primary btn-md" role="button"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pengguna</a>&nbsp;&nbsp;
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="user-list" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row['name']}}</td>
                        <td>{{$row['username']}}</td>
                        <td>{{$row['email']}}</td>
                        <td class="text-center">
                            <a href="{{ url('/user-list/'.$row->id.'/edit') }}" class="btn btn-primary btn-sm" role="button">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-danger btn-sm" role="button" data-id="{{$row->id}}" data-toggle="modal" onclick="deleteData({{ $row->id }})" data-target="#DeleteModal">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Delete Model-->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="POST">   
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Konfirmasi Hapus</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }} 
                    <p class="text-center">Apakah yakin hapus data ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("user-list.destroy", ":id") }}';
        url = url.replace(':id', id );
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
</script>

@endsection

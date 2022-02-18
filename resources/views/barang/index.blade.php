@extends('layouts.app')
@include('datepicker')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark ">Barang</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
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
            <form action="" method="POST" class="mb-0">
            <div class="form-row ">
                <div class="form-group col-md-2 mb-0">
                  <a href="{{ url('/barang/create') }}" class="form-control btn bg-gradient-primary btn-md" role="button">
                    <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a>
                </div>
                <div class="form-group col-md-2 mb-0">
                  <a 
                    @if ($tanggal_dari && $tanggal_sampai)
                        
                    href="/barang/cetak/{{ $tanggal_dari }}/{{ $tanggal_sampai }}"
                    @else
                    href="/barang/cetak/"
                    
                    @endif
                     id="tombol_cetak" target="_blank" class="form-control btn bg-gradient-secondary btn-md" role="button">
                    <i class="fa fa-print" aria-hidden="true"></i> Cetak</a>
                </div>
            

                <div class="form-group col-md-1 text-right mb-0">
                <label class="col-form-label">Dari :</label>
                </div>
                <div class="form-group col-md-2 mb-0 tanggal">
                    <input date-format="yyyy-mm-dd" id="tanggal_dari" value="{{ $tanggal_dari }}" name="tanggal_dari" class="date form-control"  required>
                </div>

                <div class="form-group col-md-1 text-right mb-0">
                    <label class="col-form-label">Sampai :</label>
                    </div>
                <div class="form-group col-md-2 mb-0 tanggal">
                    <input date-format="yyyy-mm-dd" id="tanggal_sampai" name="tanggal_sampai" value="{{ $tanggal_sampai }}" class="date form-control"  required>
                </div>
                <div class="form-group col-md-2 mb-0">
                    <a href="#" id="tombol_terapkan" onclick="terapkan()" class="form-control btn bg-gradient-warning btn-md" role="button">
                         Terapkan</a>
            

                </div>
              </div>
            </form>
        </div>
    <!-- /.card-header -->
        <div class="card-body">
            <table id="barang" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Item</th>
                        <th>Harga Satuan </th>
                        <th>Harga Jumlah</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Pembelian</th>
                        <th>Tahun</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $row) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$row['nama_brg']}}</td>
                        <td>{{ $row->namaKategori['nama_category'] }}</td>
                        <td>{{$row['item']}}</td>
                        <td>@currency($row['hrg_satuan'])</td>
                        <td>@currency($row['hrg_jumlah'])</td>
                        <td>{{\Carbon\Carbon::parse($row->tgl_input)->format('d/m/Y')}}</td>
                        <td>{{\Carbon\Carbon::parse($row->tgl_pembelian)->format('d/m/Y')}}</td>
                        <td>{{$row['tahun']}}</td>
                        <td class="text-center">
                        <a href="{{ url('/barang/'.$row->id_barang.'/edit') }}" class="btn btn-primary btn-sm" role="button">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-danger btn-sm" role="button" data-id="{{$row->id_barang}}" data-toggle="modal" onclick="deleteData({{ $row->id_barang }})" data-target="#DeleteModal">
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
<div class="data-halaman" data-halaman="barang"></div>

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
        var url = '{{ route("barang.destroy", ":id") }}';
        url = url.replace(':id', id );
        $("#deleteForm").attr('action', url);
    }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }

    

    
</script>

@include('script-table')
@include('notifikasi')
@endsection

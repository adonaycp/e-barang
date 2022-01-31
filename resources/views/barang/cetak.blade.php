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
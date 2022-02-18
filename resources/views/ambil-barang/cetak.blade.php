@php
    $bulan = date('m');
    
    switch($bulan){
 case"1":$bulan="Januari";break;
 case"2":$bulan="Februari";break;
 case"3":$bulan="Maret";break;
 case"4":$bulan="April";break;
 case"5":$bulan="Mei";break;
 case"6":$bulan="Juni";break;
 case"7":$bulan="Juli";break;
 case"8":$bulan="Agustus";break;
 case"9":$bulan="September";break;
 case"10":$bulan="Oktober"; break;
 case"11":$bulan="Nopember";break;
 case"12":$bulan="Desember";break;
 

}

$hari = date('d');
$tahun = date('Y');
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      
    </style>

    <title>E-Barang {{ $tanggal_dari .' - '. $tanggal_sampai }}</title>
  </head>
  <body>
    <h4 class="mb-4 text-center" style="font-family: inherit">BADAN PENDAPATAN KOTA SEMARANG</h4>

    <div>
    <table id="barang" class="table table-bordered table-striped">
        <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jenis</th>
              <th>Total Ambil</th>
              <th>Tanggal Ambil</th>
              <th>Nama Pengambil</th>
              <th>Bidang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ambilbarang as $row) 
            {{-- @php
                dd( (int) fmod( $loop->iteration,1));die;
            @endphp --}}
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$row->namaBarang['nama_brg'] }}</td>
              <td>{{$row->namaKategori['nama_category']}}</td>
              <td>{{$row['total_ambil']}}</td>
              <td>{{\Carbon\Carbon::parse($row->tgl_ambil)->format('d/m/Y') }}</td>
              <td>{{$row['nama_pengambil']}}</td>
              <td>{{$row['bidang']}}</td>
                
            </tr>
            {{-- @if ( (int) fmod( $loop->iteration,8) == 0 )
                <tr>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                  <td>ASiap</td>
                </tr>
            @endif --}}
            @endforeach


        </tbody>
    </table>
  </div>
    <div>

    {{-- <table class="text-center" border="solid black" style="width: 100%">
      <tr>
        <td>
          Ka. Sub. Bag Umum & Kepegawaian
        <br><br><br>
        <br><br>
        <input type="text" size="15" style="border:0;border-bottom: solid 1px black" value="YULIA ADITYORINI, S.IP">
        <br>
        
        NIP. 19830723 201001 2 024
        </td>
        <td>
          Kepala Badan Pendapatan Daerah
        <br>
        Kota Semarang<br><br>
        <br><br>
        <input type="text" size="20" style="border:0;border-bottom: solid 1px black" value="Drs. AGUS WURYANTO, M.Si">
        <br>
        
        NIP. 19660110 198702 1 002
        </td>
        <td>
          Kepala Badan Pendapatan Daerah
        <br>
        Kota Semarang<br><br>
        <br><br>
        <input type="text" size="20" style="border:0;border-bottom: solid 1px black" value="Drs. AGUS WURYANTO, M.Si">
        <br>
        
        NIP. 19660110 198702 1 002
        </td>
      </tr>
    </table> --}}

    <table class="text-center"  style="width: 100%">
    <tr>
      <td>
        Ka. Sub. Bag Umum & Kepegawaian
        <br>
        <br>
        <br>
        <br>
        <br>
        <ins>YULIA ADITYORINI, S.IP</ins>
        <br>
        NIP. 19830723 201001 2 024
      </td>
      <td>
        Kepala Badan Pendapatan Daerah
        <br>Kota Semarang
        <br>
        <br>
        <br>
        <br>
        <ins>Drs. AGUS WURYANTO, M.Si</ins>
        <br>
        NIP. 19660110 198702 1 002
      </td>
      <td>
        Semarang, {{ $hari ." ". $bulan ." ". $tahun }}
        <br>
        <br>
        <br>
        <br>
        <br>
        <ins>INDRA SULISTYO APRIYANTO</ins>
        <br>
        NIP. 19820401 200901 1 007
      </td>
      
    </tr>
    
    </table>
  </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
  </body>
</html>

<html>
    <head>
        <style type="text/css">
            td, tr {
                border: 1px solid black;
                vertical-align: top;
                font-size: 13px;
            }
            th {
                border: 1px solid black;
                vertical-align: top;
                text-align: center;
            }
            .border_atas {
                border-top: 1px solid black;
                border-collapse: collapse;
            }

            .border_kiri {
                border-left: 1px solid black;
                border-collapse: collapse;
            }

            .border_kanan {
                border-right: 1px solid black;
                border-collapse: collapse;
            }

            .border_bawah {
                border-bottom: 1px solid black;
                border-collapse: collapse;
            }

            .font_besar {
                font-size: 12pt;
            }

            .font_kecil {
                font-size: 10pt;
            }

            .font_lima {
                font-size: 7pt;
            }

            .font_tujuh {
                font-size: 7pt;
            }  

            .font_sepuluh {
                font-size: 10pt;
            }    

            .font_duabelas {
                font-size: 12pt;
            }    

            .font_sembilan {
                font-size: 9pt;
            }

            .font_delapan {
                font-size: 8pt;
            }

            .barcode {
                padding: 1.5mm;
                margin: 0;
                vertical-align: top;
                color: #000044;
            }

            .barcodecell {
                text-align: center;
                vertical-align: middle;
            }
        </style>
    </head>
    <center>
        <p>BAPENDA KOTA SEMARANG
        <br/>DAFTAR SALDO AWAL
        <br/>TAHUN 2021</p>
    </center><br/>
    <body>
        <span style="font-size: 13px;">Tanggal cetak : {{ date('d-m-Y') }}</span>
        <table style="border: 1px solid black;border-collapse: collapse;width: 100%;">
            @php 
                $i=1;
                $sum = 0;
            @endphp
            <tr>
                <th style="text-align: center;width: 15px;">No.</th>
                <th style="text-align: center;width: 240px;">Nama Barang</th>
                <th style="text-align: center;width: 100px;">Jenis</th>
                <th style="text-align: center;width: 100px;">Total Ambil</th>
                <th style="text-align: center;width: 100px;">Tanggal Ambil</th>
                <th style="text-align: center;width: 100px;">Tahun</th>
            </tr>
            @foreach($saldoawal as $val)
            <tr>
                <td style="text-align: center;">{{ $i++ }}</td>
                <td style="text-align: left;">{{ strtoupper($val->nama_brg) }}</td>
                <td style="text-align: left;">{{ $val->nama_category }}</td>
                <td style="text-align: left;">{{ $val->total_ambil }}</td>
                <td style="text-align: left;">{{ $val->tgl_ambil }}</td>
                <td style="text-align: left;">{{ $val->tahun }}</td>
            </tr>
            @endforeach

        </table>

    </body>
</html>

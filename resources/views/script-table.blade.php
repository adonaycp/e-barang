<script type="text/javascript">
    const halaman = $('.data-halaman').data('halaman');
    

    (function(){
            $('.date').datepicker({  
                weekStart: 1,
                autoclose:true,
                todayHighlight:true,
                format:'yyyy-mm-dd',
                language: 'id'
            });

            hitung();
        }());

    function terapkan()
    {
        let $dari = $('#tanggal_dari').val();
        let $sampai = $('#tanggal_sampai').val();

        if (!$dari && !$sampai)
        {
            $("#tombol_terapkan").attr("href", '/'+halaman+'/')
        }

        else if ($('#tombol_terapkan').attr('href') == '#')
        {
            Swal.fire({
          icon: 'warning',
          title: 'Error',
          text:  'Format tanggal periode tidak sesuai'
          })
        }
        
    }
</script>

<script>

    $('#tanggal_dari').change(function() {

        let $dari = $('#tanggal_dari').val();
        let $sampai = $('#tanggal_sampai').val();

        // console.log($dari <= $sampai);
        
        if ($dari && $sampai && ($dari <= $sampai))
        {

        $("#tombol_terapkan").attr("href", '/filter-'+halaman+'/'+$dari+'/'+$sampai);
        // $("#tombol_cetak").attr("href", 'barang/cetak/'+$dari+'/'+$sampai);
        }
        else{
            $("#tombol_terapkan").attr("href", '#')
        }
     });

    $('#tanggal_sampai').change(function() {

        let $dari = $('#tanggal_dari').val();
        let $sampai = $('#tanggal_sampai').val();
        
        if ($dari && $sampai && ($dari <= $sampai))
        {
        $("#tombol_terapkan").attr("href", '/filter-'+halaman+'/'+$dari+'/'+$sampai);
        // $("#tombol_cetak").attr("href", 'barang/cetak/'+$dari+'/'+$sampai);
        }
        else{
            $("#tombol_terapkan").attr("href", '#')
        }
     });
</script>
{{-- sweet alert --}}
<script src="{{ asset('template-dashboard') }}/js/sweetalert2/sweetalert2.all.min.js"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    const flashData = $('.flash-data').data('flashdata');
  console.log(flashData);
  
  if (flashData == "email atau password salah")
  {
      // Swal.fire({
      //     icon: 'success',
      //     title: 'Berhasil!',
      //     text: 'Data' . flashData
      // })
  
          Swal.fire({
          icon: 'warning',
          title: 'Tidak berhasil masuk',
          text:  flashData
          })
  
  }else if(flashData == "Selamat Datang!")
  {
      // Swal.fire({
      //     icon: 'success',
      //     title: 'Berhasil!',
      //     text: 'Data' . flashData
      // })
  
          Swal.fire({
          icon: 'success',
          title: 'Berhasil masuk',
          text:  flashData
          })
  
  }
  else if(flashData == "format email salah!")
  {
      // Swal.fire({
      //     icon: 'success',
      //     title: 'Berhasil!',
      //     text: 'Data' . flashData
      // })
  
            Swal.fire({
          icon: 'warning',
          title: 'Tidak berhasil masuk',
          text:  flashData
          })
  
  }
  else if(flashData == "minimal karakter password berjumlah 6")
  {
      // Swal.fire({
      //     icon: 'success',
      //     title: 'Berhasil!',
      //     text: 'Data' . flashData
      // })
  
            Swal.fire({
          icon: 'warning',
          title: 'Tidak berhasil masuk',
          text:  flashData
          })
  
  }
  </script>
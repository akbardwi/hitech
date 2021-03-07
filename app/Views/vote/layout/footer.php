    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.4/dist/sweetalert2.all.min.js"></script>
    <script>
        function sweetAlert(){
            (async () => {
          
            const { value: formValues } = await Swal.fire({
              title: 'Masukkan Pesan Kesan Acara HI-TECHNOLOGY 2021',
              html:
                'Pesan: <input id="swal-input1" class="swal2-input">' +
                'kesan: <input id="swal-input2" class="swal2-input">',
              focusConfirm: false,
              preConfirm: () => {
                return [
                  document.getElementById('swal-input1').value,
                  document.getElementById('swal-input2').value
                ]
              }
            })
            
            if (formValues) {
                Swal.fire('Terima Kasih', 
                'Pilihan anda telah tersimpan', 
                'success')
            }
          
            })()
        }
    </script>
</body>
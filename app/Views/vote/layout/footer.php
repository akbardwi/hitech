    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.4/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
    // get Edit Product
    $('.btn-vote').on('click',function(){
        const id = $(this).data('id');
        // const dev = $(this).data('dev');
        document.getElementById("id").value = id;
        // document.getElementById("dev").value = dev;
        // Call Modal Detail Pendaftar
        $('#voteModal').modal('show');
    });
    </script>
    <?php
    $sweetalert = session()->getFlashdata('sweetalert');
    $error_vote = session()->getFlashdata('error_vote');
    $errors_vote = session()->getFlashdata('errors_vote');
    $success_vote = session()->getFlashdata('success_vote');
    if($sweetalert and !empty($success_vote)){ ?>
    <script>
        Swal.fire('Sukses', 
        '<?= $success_vote; ?>', 
        'success')
    </script>
    <?php } if($sweetalert and !empty($error_vote)){ ?>
    <script>
        Swal.fire('Gagal', 
        '<?= $error_vote; ?>', 
        'error')
    </script>
    <?php } if($sweetalert and !empty($errors_vote)){ ?>
    <script>
        Swal.fire('Gagal', 
        'Silahkan isi kesan & pesan terlebih dahulu', 
        'error')
    </script>
    <?php } ?>
</body>
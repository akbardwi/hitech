    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.4/dist/sweetalert2.all.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/vote/js/main.js"></script>
    <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>
    <script type="text/javascript">
    // get Edit Product
    $('.btn-vote').on('click',function(){
        // Call Modal Detail Pendaftar
        $('#feedbackModal').modal('show');
    });

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
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
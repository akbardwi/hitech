    <script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/vote/js/main.js"></script>
    <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>
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

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    $(document).ready( function () {
        $('#ratingTabel').DataTable({
            "order": [[4,'desc']]
        });
    } );

    $('.btn-detail').on('click',function(){
        const data = "<img src='<?php echo base_url("/assets/vote/img/loading.gif"); ?>'/> Silahkan Tunggu";
        $('#dataPendaftar').html(data);
        // get data from button edit
        const id = $(this).data('id');
        const type = $(this).data('type');
        // Set data to Form Edit
        loadData(id, type);
        // Call Modal Detail Pendaftar
        $('#detailPendaftar').modal('show');
    });
    $('.btn-logo').on('click',function(){
        // get data from button edit
        const id = $(this).data('id');
        const type = $(this).data('type');
        $('.id_dev').val(id);
        // Call Modal Detail Pendaftar
        $('#uploadLogo').modal('show');
    });
    $('.btn-bayar').on('click',function(){
        // get data from button edit
        const id = $(this).data('id');
        const type = $(this).data('type');
        $('.id_dev').val(id);
        // Call Modal Detail Pendaftar
        $('#bayar').modal('show');
    });

    //Lihat Data
	function loadData(id, type) {
		// CSRF Hash
		var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
		var csrfHash = $('.txt_csrfname').val(); // CSRF hash
		$.ajax({
			url: '<?php echo base_url('admin/getData'); ?>',
			type: 'post',
			data: {
				id: id,
                type: type,
				[csrfName]: csrfHash
			},
			complete:function() {
				// Update CSRF hash
				refreshToken()							
			},
			success: function(data) {
				// Update CSRF hash
				// refreshToken()

				// Show Data
				$('#dataPendaftar').html(data);
			}
		});
	}

	//Refresh Token CSRF
	function refreshToken(){
		$.ajax({
			url: '<?php echo base_url('admin/refreshToken'); ?>',
			type: 'get',
			success: function(data) {
				// Update CSRF hash
				$('.txt_csrfname').val(data);
			}
		});
	}
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
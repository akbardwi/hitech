	<main>
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $inputs = session()->getFlashdata('inputs');
                    $error = session()->getFlashdata('error');
                    $errors = session()->getFlashdata('errors');
                    $success = session()->getFlashdata('success');
                    if(!empty($errors)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                        <?php foreach ($errors as $errors) : ?>
                            <li><?= esc($errors) ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <br />
                    <?php } if(!empty($error)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <li><?= esc($error) ?></li>
                        </ul>
                    </div>
                    <br />
                    <?php } if(!empty($success)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?= esc($success) ?><br />
                    </div>
                    <br />
                    <?php } ?>
                    <h1>Peserta Software Fair</h1>
					<table id="myTable" class="table table-striped table-bordered" style="width:100%; background: white">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>Kategori</th>
                                <th>Nama Aplikasi</th>
                                <th>Nama Ketua</th>
                                <th>HTM</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($peserta as $data){?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data['tim']; ?></td>
                                <td><?= $data['category']; ?></td>
                                <td><?= $data['nama_app']; ?></td>
                                <td><?= $data['nama_ketua']; ?></td>
                                <td>
                                    <?php if($data['bayar'] == 0){
                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                    } else {
                                        echo '<span class="badge badge-success">Sudah Bayar</span>';
                                    } ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-id="<?= $data['id']; ?>" data-type="sf" class="btn btn-primary btn-detail">Detail</a>
                                    <a href="javascript:void(0)" data-id="<?= $data['id']; ?>" data-type="sf" class="btn btn-primary btn-logo">Logo</a>
                                    <a href="javascript:void(0)" data-id="<?= $data['id']; ?>" data-type="sf" class="btn btn-primary btn-bayar">HTM</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama TIM</th>
                                <th>Kategori</th>
                                <th>Nama Aplikasi</th>
                                <th>Nama Ketua</th>
                                <th>HTM</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <!-- Modal Data Peserta -->
            <div class="modal fade" id="detailPendaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailPendaftarTitle" style="color: black">Data Peserta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="dataPendaftar"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Upload Logo -->
            <div class="modal fade" id="uploadLogo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadLogoTitle" style="color: black">Upload Logo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url("admin/uploadLogo"); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="hidden" name="id" class="id_dev" value="" class="form-control">
                                <input type="hidden" name="type" value="sf" class="form-control">
                                <div class="form-group">
                                    <label style="color: black;">Logo</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Bayar -->
            <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bayarTitle" style="color: black">Sudah Bayar HTM?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url("admin/bayar"); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                <input type="hidden" name="id" class="id_dev" value="" class="form-control">
                                <input type="hidden" name="type" value="sf" class="form-control">
                                <div class="form-group">
                                    <label style="color: black;">Sudah Bayar HTM?</label>
                                    <select name="bayar" class="form-control" required>
                                        <option value="0">Belum</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</main>
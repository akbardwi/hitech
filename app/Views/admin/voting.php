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
                    <h1>Daftar Voting</h1>
					<table id="ratingTabel" class="table table-striped table-bordered" style="width:100%; background: white">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Type</th>
                                <th>Nama Tim</th>
                                <th>Email Pengunjung</th>
                                <th>Bintang</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($vote as $data){?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?php if($data['dev'] == "sf"){ echo "Software Fair"; } else { echo "Hardware Fair"; } ?></td>
                                <?php 
                                $id_dev = $data['id_dev'];
                                $tim = "";
                                if($data['dev'] == "sf"){
                                    for($a=0; $a<count($sf); $a++){
                                        if($sf[$a]['id'] == $id_dev){
                                            $tim = $sf[$a]['tim'];
                                        }
                                    }
                                } else {
                                    for($a=0; $a<count($hf); $a++){
                                        if($hf[$a]['id'] == $id_dev){
                                            $tim = $hf[$a]['tim'];
                                        }
                                    }
                                }                             
                                ?>
                                <td><?= $tim; ?></td>
                                <td><?= $data['email_visitor']; ?></td>
                                <td><?= $data['star']; ?></td>
                                <td><?= $data['last_update']; ?></td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Type</th>
                                <th>Nama Tim</th>
                                <th>Email Pengunjung</th>
                                <th>Bintang</th>
                                <th>Waktu</th>
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
                                <input type="hidden" name="type" value="data" class="form-control">
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
                                <input type="hidden" name="type" value="data" class="form-control">
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
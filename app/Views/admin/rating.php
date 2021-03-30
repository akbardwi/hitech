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
                    <h1>Rating Developer</h1>
					<table id="ratingTabel" class="table table-striped table-bordered" style="width:100%; background: white">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>Kategori</th>
                                <th>Nama Aplikasi/Hardware</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($sf as $sf){?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $sf['tim']; ?></td>
                                <td>Software Fair</td>
                                <td><?= $sf['nama_app']; ?></td>
                                <?php
                                $voter = $star = 0;
                                foreach($vote as $vote_sf){
                                    if($sf['id'] == $vote_sf['id_dev'] and $vote_sf['dev'] == "sf"){
                                        $star = $star+$vote_sf['star'];
                                        $voter++;
                                    }
                                }
                                
                                if($star == 0 and $voter == 0){
                                    $rate = 0;
                                } else {
                                    $rate = $star/$voter;
                                }
                                ?>
                                <td><?= round($rate, 2); ?></td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                            <?php 
                            // $no = 1;
                            foreach($hf as $hf){?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $hf['tim']; ?></td>
                                <td>Hardware Fair</td>
                                <td><?= $hf['judul_alat']; ?></td>
                                <?php
                                $voter = $star = 0;
                                foreach($vote as $vote_hf){
                                    if($hf['id'] == $vote_hf['id_dev'] and $vote_hf['dev'] == "hf"){
                                        $star = $star+$vote_hf['star'];
                                        $voter++;
                                    }
                                }
                                
                                if($star == 0 and $voter == 0){
                                    $rate = 0;
                                } else {
                                    $rate = $star/$voter;
                                }
                                ?>
                                <td><?= round($rate, 2); ?></td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>Kategori</th>
                                <th>Nama Aplikasi/Hardware</th>
                                <th>Rating</th>
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
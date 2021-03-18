<main>
    <h1 style="text-align: center; color: #fff">SOFTWARE FAIR</h1>
    <div class="box">
        <?php foreach($developer as $dev){ ?>
        <div class="card">
            <div class="imgBox">
                <?php if (file_exists("assets/berkas/sf/".$dev['logo'])) { ?>
                <img src="<?= base_url("assets/berkas/sf/".$dev['logo']); ?>" alt="srt">
                <?php } else { ?>
                <img src="<?= base_url("assets/vote/img/comingsoon.png"); ?>" alt="srt">
                <?php } ?>
            </div>
            <div class="details">
                <h2><?= $dev['nama_app']; ?></h2><br>
                <button href="javascript:void(0)" class="btn-vote" id="button-a" data-id="<?= $dev['id']; ?>">VOTE</button>
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <br>
    <!-- Modal Vote -->
    <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModalLabel" aria-hidden="true"style="z-index: 9999999;">
        <div class="modal-dialog">
            <div class="modal-content cstm">
                <div class="modal-header cstmbg">
                    <h5 class="modal-title w-100 text-center position-absolute" id="voteModalLabel">Vote Developer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url("users/vote"); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control" value="" />
                            <input type="hidden" name="dev" id="dev" class="form-control" value="sf" />
                            <input type="hidden" name="email" class="form-control" value="<?= $user_login['email']; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="kesan">Kesan</label>
                            <input type="text" name="kesan" class="form-control" placeholder="Kesan Anda selama acara HI TECH 2021" required/>
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <input type="text" name="pesan" class="form-control" placeholder="Pesan Anda untuk acara HI TECH kedepannya" required/>
                        </div>
                    </div>
                    <div class="modal-footer cstmbg">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</main>
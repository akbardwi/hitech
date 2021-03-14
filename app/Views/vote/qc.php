    <main>
        <div class="sf">
            <h1 style="text-align: center; color: #fff">SOFTWARE FAIR</h1>
            <!-- <div class="box"> -->
            <br>
            <br>
            <br>
            <div class="carousel-wrapper">
                <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true,"autoPlay": true }'>
                    <?php foreach($sf as $sf){ ?>
                    <div class="carousel-cell">
                        <h3><?= $sf['nama_app']; ?></h3>
                        <h3>Total vote : <?= $sf['suara']; ?></h3>
                        <hr >
                        <?php if (file_exists("/assets/berkas/sf/".$sf['logo'])) { ?>
                        <img src="<?= base_url("assets/berkas/sf/".$sf['logo']); ?>" alt="srt">
                        <?php } else { ?>
                        <img src="<?= base_url("assets/vote/img/comingsoon.png"); ?>" alt="srt">
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="hf">
            <h1 style="text-align: center; color: #fff">HARDWARE FAIR</h1>
            <!-- <div class="box"> -->
            <br>
            <br>
            <br>
            <div class="carousel-wrapper">
                <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true,"autoPlay": true }'>
                    <?php foreach($hf as $hf){ ?>
                    <div class="carousel-cell">
                        <h3><?= $hf['judul_alat']; ?></h3>
                        <h3>Total vote : <?= $hf['suara']; ?></h3>
                        <hr>
                        <?php if (file_exists("/assets/berkas/hf/".$hf['logo'])) { ?>
                        <img src="<?= base_url("assets/berkas/hf/".$hf['logo']); ?>" alt="srt">
                        <?php } else { ?>
                        <img src="<?= base_url("assets/vote/img/comingsoon.png"); ?>" alt="srt">
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
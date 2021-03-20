<main>
    <h1 style="text-align: center; color: #fff">SOFTWARE FAIR</h1>
    <div class="box">
        <?php foreach($sf as $sf){ ?>
        <div class="card">
            <div class="imgBox">
                <?php if (file_exists("assets/berkas/sf/".$sf['logo'])) { ?>
                <img src="<?= base_url("assets/berkas/sf/".$sf['logo']); ?>" alt="srt">
                <?php } else { ?>
                <img src="<?= base_url("assets/vote/img/comingsoon.png"); ?>" alt="srt">
                <?php } ?>
            </div>
            <div class="details">
                <a href="<?= base_url("users/forum/software-fair/".$sf['id']); ?>"><h2><?= $sf['tim']; ?><br></h2></a>
            </div>
        </div>
        <?php } ?>
    </div>
    <br>
    <h1 style="text-align: center; color: #fff">HARDWARE FAIR</h1>

    <div class="box">
        <?php foreach($hf as $hf){ ?>
        <div class="card">
            <div class="imgBox">
                <?php if (file_exists("assets/berkas/hf/".$hf['logo'])) { ?>
                <img src="<?= base_url("assets/berkas/hf/".$hf['logo']); ?>" alt="srt">
                <?php } else { ?>
                <img src="<?= base_url("assets/vote/img/comingsoon.png"); ?>" alt="srt">
                <?php } ?>
            </div>
            <div class="details">
                <a href="forum1.html"><h2>TEAM 1<br></h2></a>
            </div>
        </div>
        <?php } ?>
    </div>  
</main>
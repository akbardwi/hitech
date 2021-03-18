<div class="form-group">
    <label style="color: black;">Nama Tim</label>
    <input type="text" class="form-control" value="<?php echo $data['tim']; ?>" readonly>
</div>
<div class="form-group">
    <label style="color: black;">Kategori</label>
    <input type="text" class="form-control" value="<?php echo $data['category']; ?>" readonly>
</div>
<div class="form-group">
    <label style="color: black;">Nama Aplikasi</label>
    <input type="text" class="form-control" value="<?php echo $data['nama_app']; ?>" readonly>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <label style="color: black;">Nama Ketua</label>
            <input type="text" class="form-control" value="<?php echo $data['nama_ketua']; ?>" readonly>
        </div>
        <div class="col-lg-6">
            <label style="color: black;">NIM Ketua</label>
            <input type="text" class="form-control" value="<?php echo $data['nim_ketua']; ?>" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <label style="color: black;">Nama Anggota 1</label>
            <input type="text" class="form-control" value="<?php echo $data['nama_anggota']; ?>" readonly>
        </div>
        <div class="col-lg-6">
            <label style="color: black;">NIM Anggota 1</label>
            <input type="text" class="form-control" value="<?php echo $data['nim_anggota']; ?>" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <label style="color: black;">Nama Anggota 2</label>
            <input type="text" class="form-control" value="<?php echo $data['nama_anggota2']; ?>" readonly>
        </div>
        <div class="col-lg-6">
            <label style="color: black;">NIM Anggota 2</label>
            <input type="text" class="form-control" value="<?php echo $data['nim_anggota2']; ?>" readonly>
        </div>
    </div>
</div>
<div class="form-group">
    <label style="color: black;">Universitas</label>
    <input type="text" class="form-control" value="<?php echo $data['kampus']; ?>" readonly>
</div>
<div class="form-group">
    <label style="color: black;">Berkas</label>
    <a href="<?= $data['link']; ?>" target="_blank" class="btn btn-primary form-control">Download</a>
</div>
<div class="form-group">
    <label style="color: black;">No. HP / WhatsApp</label>
    <input type="text" class="form-control" value="<?php echo $data['wa']; ?>" readonly>
</div>
<div class="form-group">
    <label style="color: black;">Email</label>
    <input type="text" class="form-control" value="<?php echo $data['email']; ?>" readonly>
</div>
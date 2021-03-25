<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HI TECHNOLOGY</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>/assets/img/logo1.png" rel="icon">
    <!-- <link href="<?= base_url(); ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link href="<?= base_url(); ?>/assets/css/user.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/custom-input.css">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">
            <a href="<?= base_url(); ?>" class="logo mr-auto"><img src="<?= base_url(); ?>/assets/img/fixpalingbaruu.png" alt="" class="img-fluid"></a>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="drop-down"><a href="#event">Event</a>
                    <ul>
                        <li><a href="#sf">Software Fair</a></li>
                        <li><a href="#hf">Hardware Fair</a></li>
                        <li><a href="#ot">Open Talk</a></li>
                    </ul>
                </li>
                <li><a href="#pembicara">Pembicara</a></li>
                <li><a href="#pengunjung">Pengunjung</a></li>
                <li><a href="#kontak">Hubungi kami</a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Hi-Technology</h1>
                    <h2>Festival Pameran IT tahunan yang diselenggarakan oleh Himpunan Mahasiswa Teknik Informatika Universitas Dian Nuswantoro dengan menghadirkan 3 rangkaian acara yaitu Software Fair, Hardware Fair, dan Open Talk.
                    Tahun ini kami kembali hadir dengan mengusung konsep virtual bertemakan <strong>"Keep Creative and Productive With Technology"</strong>.</h2>
                    <div class="d-lg-flex">
                        <a href="#event" class="btn-get-started scrollto">Get Started</a>
                        <button type="button" class="btn btn-watch-video" data-toggle="modal" data-target="#myModal"> Watch Video <i class="icofont-play-alt-2"></i>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url(); ?>/assets/img/ICON-HITECH-2021.png" class="img-fluid animated" alt="" />
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" >
        <path fill="#77D0EE" fill-opacity="1" d="M0,224L34.3,234.7C68.6,245,137,267,206,277.3C274.3,288,343,288,411,277.3C480,267,549,245,617,202.7C685.7,160,754,96,823,69.3C891.4,43,960,53,1029,85.3C1097.1,117,1166,171,1234,176C1302.9,181,1371,139,1406,117.3L1440,96L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z" style="border: none;"></path>
    </svg><!-- End Hero -->
    <!-- <br/> -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
                        
                            <!-- Modal content-->
            <div class="modal-content cstm1">
                <div class="embed-responsive embed-responsive-16by9">
                    <video controls="true" class="embed-responsive-item ">
                        <source src="<?= base_url(); ?>/assets/img/teaser.mp4" type="video/mp4" />
                    </video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Tutup </button>
                </div>
            </div>
                        
        </div>
    </div>
    <main id="main">
        <section id="event" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>EVENT</h2>
                </div>
            </div>
            <!-- envent -->
            <!-- ======= event lisi ======= -->
            <div class="menu">
                <?php
                $inputs_sf = session()->getFlashdata('inputs_sf');
                $error_sf = session()->getFlashdata('error_sf');
                $errors_sf = session()->getFlashdata('errors_sf');
                $success_sf = session()->getFlashdata('success_sf');
                if(!empty($errors_sf)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                    <?php foreach ($errors_sf as $errors_sf) : ?>
                        <li><?= esc($errors_sf) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($error_sf)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li><?= esc($error_sf) ?></li>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($success_sf)){ ?>
                <div class="alert alert-success" role="alert">
                    <?= esc($success_sf) ?><br />
                </div>
                <br />
                <?php } ?>
                <section class="card" data-aos="fade-left" id="sf">
                    <img src="<?= base_url(); ?>/assets/img/sf.png" alt="" data-aos="zoom-in" data-aos-delay="150" class="img-fluid animated">
                    <div>
                        <h3><strong>Software Fair</strong></h3>
                        <h6>
                        Pameran software karya mahasiswa berupa Web, Mobile, Game, serta Desktop.
                        </h6>
                        <div class="accordion">
                            <div class="accordion-item">
                            <div class="accordion-item-header">
                                Tata Cara Mendaftar
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h6><strong>Satu tim harus merupakan mahasiswa dalam satu universitas yang sama<strong></h6>
                                    <h6>1. Peserta mendaftar dengan cara menekan tombol Registrasi di bawah ini</h6>
                                    <h6>2. Isi form pendaftaran dengan baik</h6>
                                    <h6>3. Pada bagian link Drive,peserta dimohon untuk mengupload berkas-berkas kedalam satu folder dengan format penamaan :    
                                    </h6> <h6><strong>NAMATIM_NamaAplikasi(event yang diikuti) <br>contoh : TECH_Shopee(Software Fair)</strong> yang diperlukan ke drive perwakilan tim,</br>kemudian copy kan link drive tadi pada form tersebut dan jangan lupa untuk mengubah akses drive nya</h6>
                                    <h6>4. Untuk Berkas yang di Perlukan :</h6>
                                    <h6>• Video Penjelasan serta cara kerja Aplikasi </br>(format : 720p atau 1080p landscape durasi maksimal 5 menit) dikumpulkan dalam bentuk link youtube dan link disertakan pada form deskripsi software</h6>
                                    <h6>• Power Point Mengenai Software tersebut</h6>
                                    <h6>• Foto / screenshoot lengkap aplikasi </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Logo tim (jika ada) </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Logo instansi </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Banner </br>(format : png ukuran 595px X 1263px potrait)</h6>
                                    <h6>• Foto anggota tim </br>(format  : jpg/png/gif) </h6>
                                    <h6>• Scan Kartu Tanda Mahasiswa / KTM</h6>
                                    <h6>• Deskripsi software</br>berisi nama tim dan informasi anggota ,nama software /aplikasi,deskripsi software / aplikasi secara singkat, slogan produk, fitur, keunggulan</br>(format : word atau pdf)</h6>
                                    <h6>• Untuk contoh file pemberkasan bisa diakses pada drive  <a href= "https://drive.google.com/drive/folders/1GFMBxBqFtbmOn2heGuFgvX6fsw0sN2QJ?usp=sharing">berikut</a></h6>
                                    <h6>5. Setelah mendaftar diharapkan developer dapat membayar biaya pendaftaran agar email dapat diverifikasi dan dapat digunakan untuk login kedalam sistem penilaian.</h6>
                                    <h6>6. Untuk info selanjutnya akan dihubungi via email / Whatsapp</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                            <div class="accordion-item-header">
                                Tata Cara Pembayaran
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h6>1.Setelah melakukan pendaftaran/registrasi melalui web,</br>
                                    tim developer dapat melakukan pembayaran agar bisa login kedalam sistem melalui</h6>
                                    <h6><strong>No Rekening : 006801066219504 (A.n Raka Apritama)</strong></h6>
                                    <h6><strong>Bank              : BRI</strong></h6>
                                    <h6><strong>Biaya Pendaftaran : Rp.30.000,00</strong></h6>
                                    <h6>2.Untuk konfirmasi pembayaran sertakan bukti pembayaran dan silahkan menghubungi cp di bawah ini :</h6>
                                    <h6>• 085158799141 (Anam)</h6>
                                    <h6>• 085329683273 (Raka)</h6>
                                    <h6>3.Untuk info selanjutnya akan dihubungi via email / Whatsapp</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#sfModal">
                            Register
                        </button>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#logDevModal">
                            Login
                        </button>
                    </div>         
                </section>

                <?php
                $inputs_hf = session()->getFlashdata('inputs_hf');
                $error_hf = session()->getFlashdata('error_hf');
                $errors_hf = session()->getFlashdata('errors_hf');
                $success_hf = session()->getFlashdata('success_hf');
                if(!empty($errors_hf)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                    <?php foreach ($errors_hf as $errors_hf) : ?>
                        <li><?= esc($errors_hf) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($error_hf)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li><?= esc($error_hf) ?></li>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($success_hf)){ ?>
                <div class="alert alert-success" role="alert">
                    <?= esc($success_hf) ?><br />
                </div>
                <br />
                <?php } ?>
                <section class="card" data-aos="fade-left" id="hf">
                    <img src="<?= base_url(); ?>/assets/img/hf.png" alt="" data-aos="zoom-in" data-aos-delay="150" class="img-fluid animated"/>
                    <div>
                        <h3><strong>Hardware Fair</strong></h3>
                        <h6>
                        Pameran hardware karya mahasiswa yang menampilkan teknologi seperti IoT dan AI.
                        </h6>
                        <div class="accordion">
                            <div class="accordion-item">
                            <div class="accordion-item-header">
                                Tata Cara Mendaftar
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h6><strong>Satu tim harus merupakan mahasiswa dalam satu universitas yang sama<strong></h6>
                                    <h6>1.Peserta mendaftar dengan cara menekan tombol Registrasi di bawah ini</h6>
                                    <h6>2.Isi form pendaftaran dengan baik</h6>
                                    <h6>3.Pada bagian link Drive,peserta dimohon untuk mengupload berkas-berkas kedalam satu folder dengan format penamaan :</h6>
                                    <h6><strong>NAMATIM_NamaHardware(event yang diikuti)<br> Contoh : TECH_Smartlock(Hardware Fair)</strong> yang diperlukan ke drive perwakilan tim,</br>kemudian copy kan link drive tadi pada form tersebut dan jangan lupa untuk mengubah akses drive nya</h6>
                                    <h6>4.Untuk Berkas yang di Perlukan :</h6>
                                    <h6>• Video Penjelasan serta cara kerja Hardware itu sendiri </br>(format : 720p atau 1080p landscape durasi maksimal 5 menit) dikumpulkan dalam bentuk link youtube dan link disertakan pada form deskripsi hardware</h6>
                                    <h6>• Power Point mengenai Hardware tersebut </h6>
                                    <h6>• Foto / Screenshoot lengkap Hardware dari berbagai sisi </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Logo tim (jika ada) </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Logo instansi </br>(format : jpg/png/gif ukuran 1080px X 1080px)</h6>
                                    <h6>• Banner </br>(format : png ukuran 595px X 1263px potrait)</h6>
                                    <h6>• Foto anggota tim </br>(format  : jpg/png/gif) </h6>
                                    <h6>• Scan Kartu Tanda Mahasiswa / KTM</h6>
                                    <h6>• Deskripsi hardware </br>berisi nama tim dan informasi anggota ,nama Hardware /alat, deskripsi hardware / alat secara singkat, slogan produk, fitur, keunggulan</br>(format : word atau pdf)</h6>
                                    <h6>• Untuk contoh file pemberkasan bisa diakses pada drive  <a href= "https://drive.google.com/drive/folders/1GFMBxBqFtbmOn2heGuFgvX6fsw0sN2QJ?usp=sharing">berikut</a></h6>
                                    <h6>5.Setelah mendaftar diharapkan developer dapat membayar biaya pendaftaran agar email dapat diverifikasi dan dapat digunakan untuk login kedalam sistem penilaian.</h6>
                                    <h6>6.Untuk info selanjutnya akan dihubungi via email / Whatsapp</h6>        
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-item">
                            <div class="accordion-item-header">
                                Tata Cara Pembayaran
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    <h6>1.Setelah melakukan pendaftaran/registrasi melalui web,</br>
                                    tim developer dapat melakukan pembayaran agar bisa login kedalam sistem melalui</h6>
                                    <h6><strong>No Rekening : 006801066219504 (A.n Raka Apritama)</strong></h6>
                                    <h6><strong>Bank              : BRI</strong></h6>
                                    <h6><strong>Biaya Pendaftaran : Rp.30.000,00</strong></h6>
                                    <h6>2.Untuk konfirmasi pembayaran sertakan bukti pembayaran dan silahkan menghubungi cp di bawah ini :</h6>
                                    <h6>• 085158799141 (Anam)</h6>
                                    <h6>• 085329683273 (Raka)</h6>
                                    <h6>3.Untuk info selanjutnya akan dihubungi via email / Whatsapp</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#hfModal">
                            Register
                        </button>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#logDevModal">
                            Login
                        </button>
                    </div>
                </section>

                <?php
                $inputs_ot = session()->getFlashdata('inputs_ot');
                $error_ot = session()->getFlashdata('error_ot');
                $errors_ot = session()->getFlashdata('errors_ot');
                $success_ot = session()->getFlashdata('success_ot');
                if(!empty($errors_ot)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                    <?php foreach ($errors_ot as $errors_ot) : ?>
                        <li><?= esc($errors_ot) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($error_ot)){ ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <li><?= esc($error_ot) ?></li>
                    </ul>
                </div>
                <br />
                <?php } if(!empty($success_ot)){ ?>
                <div class="alert alert-success" role="alert">
                    <?= esc($success_ot) ?><br />
                </div>
                <br />
                <?php } ?>      
                <section class="card" data-aos="fade-right"id="ot">
                    <img src="<?= base_url(); ?>/assets/img/Opentalk.png" alt="" data-aos="zoom-in" data-aos-delay="150" class="img-fluid animated"/>
                    <div>
                        <h3><strong>Open Talk</strong></h3>
                        <h6>
                        Talkshow dengan menghadirkan dua pembicara keren yang akan membahas seputar "Software Development".
                        </h6>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#otModal">
                            Register
                        </button>
                        <button type="button" class="btn btn-primary btn-register" data-toggle="modal" data-target="#otLoginModal">
                            Login
                        </button>
                    </div>
                </section>

                <!-- Modal SF -->
                <div class="modal fade" id="sfModal" tabindex="-1" aria-labelledby="sfModalLabel" aria-hidden="true" style="z-index: 9999999;">
                    <div class="modal-dialog">
                        <div class="modal-content cstm">
                            <div class="modal-header cstmbg">
                                <h5 class="modal-title w-100 text-center position-absolute" id="sfModalLabel" >Software Fair Registration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url("auth/register_sf"); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row justify-content-between">
                                    <div class="col-4 mb-3">
                                        <p class="radio-label text-center">Kategori Aplikasi</p>
                                    </div>
                                    
                                    <br>
                                    <div class="col text-right">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="web" value="Web" name="category" class="custom-control-input" <?php if(isset($inputs_sf['category']) and $inputs_sf['category'] == "Web"){ echo "checked"; } ?>>
                                            <label class="custom-control-label" for="web">Web</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="mobile" value="Mobile" name="category" class="custom-control-input" <?php if(isset($inputs_sf['category']) and $inputs_sf['category'] == "Mobile"){ echo "checked"; } ?>>
                                            <label class="custom-control-label" for="mobile">Mobile</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="game" value="Game" name="category" class="custom-control-input" <?php if(isset($inputs_sf['category']) and $inputs_sf['category'] == "Game"){ echo "checked"; } ?>>
                                            <label class="custom-control-label" for="game">Game</label>
                                        </div>
                                    </div>
                                    <p style="padding-left:20px;"><b>*Note</b> : kekurangan berkas bisa di upload di Drive maksimal <br>tanggal 31 Maret 2021 pukul 12.00 WIB</p>
                                </div>
                                <div class="modal-body">
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="tim" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['tim']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Nama Tim</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">groups</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="nama_app" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nama_app']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Judul Aplikasi</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">layers</i>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_ketua" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nama_ketua']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">Nama Ketua</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">person</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_ketua" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nim_ketua']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">NIM Ketua</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_anggota" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nama_anggota']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">Nama Anggota 1</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">people</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_anggota" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nim_anggota']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">NIM Anggota 1</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_anggota2" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nama_anggota2']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">Nama Anggota 2</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">people</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_anggota2" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['nim_anggota2']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">NIM Anggota 2</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="kampus" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['kampus']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Asal Kampus</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">school</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="link" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['link']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Link Google Drive</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">insert_link</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="number" name="wa" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['wa']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Nomor Whatsapp</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">phone_android</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="email" name="email" <?php if(isset($inputs_sf)){ ?> value="<?= $inputs_sf['email']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Email</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">email</i>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer cstmbg">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 

                <!-- Modal HF -->
                <div class="modal fade" id="hfModal" tabindex="-1" aria-labelledby="hfModalLabel" aria-hidden="true"style="z-index: 9999999;">
                    <div class="modal-dialog">
                        <div class="modal-content cstm">
                            <div class="modal-header cstmbg">
                                <h5 class="modal-title w-100 text-center position-absolute" id="hfModalLabel">Hardware Fair Registration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                
                            </div>
                            <p style="padding-left:20px;"><b>*Note</b> : kekurangan berkas bisa di upload di Drive maksimal <br>tanggal 31 Maret 2021 pukul 12.00 WIB</p>
                            <form action="<?= base_url("auth/register_hf"); ?>" method="post">
                                <div class="modal-body">
                                    <?= csrf_field(); ?>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="tim_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['tim_hf']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Nama Tim</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">groups</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="judul_alat" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['judul_alat']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Judul Alat</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">layers</i>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_ketua_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nama_ketua_hf']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">Nama Ketua</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">person</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_ketua_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nim_ketua_hf']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">NIM Ketua</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_anggota_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nama_anggota_hf']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">Nama Anggota 1</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">people</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_anggota_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nim_anggota_hf']; ?>" <?php } ?> required>
                                                    <span class="omrs-input-label">NIM Anggota 1</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nama_anggota2_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nama_anggota2_hf']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">Nama Anggota 2</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">people</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_anggota2_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['nim_anggota2_hf']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">NIM Anggota 2</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="kampus_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['kampus_hf']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Asal Kampus</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">school</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="link_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['link_hf']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Link Google Drive</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">insert_link</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="number" name="wa_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['wa_hf']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Nomor Whatsapp</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">phone_android</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="email" name="email_hf" <?php if(isset($inputs_hf)){ ?> value="<?= $inputs_hf['email_hf']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Email</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">email</i>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer cstmbg">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 

                <!-- Modal OT -->
                <div class="modal fade" id="otModal" tabindex="-1" aria-labelledby="otModalLabel" aria-hidden="true"style="z-index: 9999999;">
                    <div class="modal-dialog">
                        <div class="modal-content cstm">
                            <div class="modal-header cstmbg">
                                <h5 class="modal-title w-100 text-center position-absolute" id="otModalLabel">Open Talk Registration</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('auth/register_ot'); ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row justify-content-between">
                                    <div class="col-4 mb-3">
                                        <p class="radio-label">Kategori Peserta</p>
                                    </div>
                                    <div class="col text-right">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioMhs" value="Mahasiswa" name="otCategory"
                                                class="custom-control-input" <?php if(isset($inputs_ot['otCategory']) and $inputs_ot['otCategory'] == "Mahasiswa"){ echo "checked"; } ?>>
                                            <label class="custom-control-label" for="radioMhs">Mahasiswa</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="radioUmum" value="Umum" name="otCategory"
                                                class="custom-control-input" <?php if(isset($inputs_ot['otCategory']) and $inputs_ot['otCategory'] == "Umum"){ echo "checked"; } ?>>
                                            <label class="custom-control-label" for="radioUmum">Umum</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="text" name="nama_ot" <?php if(isset($inputs_ot)){ ?> value="<?= $inputs_ot['nama_ot']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Masukkan Nama</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">person</i>
                                        </label>
                                    </div>
                                    <div class="row" id="mahasiswa">
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="kampus_ot" <?php if(isset($inputs_ot)){ ?> value="<?= $inputs_ot['kampus_ot']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">Asal Kampus</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">school</i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="omrs-input-group">
                                                <label class="omrs-input-underlined">
                                                    <input type="text" name="nim_ot" <?php if(isset($inputs_ot)){ ?> value="<?= $inputs_ot['nim_ot']; ?>" <?php } ?>>
                                                    <span class="omrs-input-label">NIM</span>
                                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                                    <i class="material-icons">image_aspect_ratio</i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="number" name="wa_ot" <?php if(isset($inputs_ot)){ ?> value="<?= $inputs_ot['wa_ot']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Nomor Whatsapp</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">phone_android</i>
                                        </label>
                                    </div>
                                    <div class="omrs-input-group">
                                        <label class="omrs-input-underlined">
                                            <input type="email" name="email_ot" <?php if(isset($inputs_ot)){ ?> value="<?= $inputs_ot['email_ot']; ?>" <?php } ?> required>
                                            <span class="omrs-input-label">Email</span>
                                            <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                            <i class="material-icons">email</i>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer cstmbg">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>        
            </div>
        </section>
        <!-- ======= end event list ======= -->
        <section id="pembicara" class="team-section">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Pembicara</h2>
                </div>
                <div class="row">
                    <div class="team-items">
                        <div class="item" data-aos="zoom-in" data-aos-delay="100">
                            <img src="<?= base_url(); ?>/assets/img/PEMBICARA1.png" class="img-fluid" alt="">
                            
                        </div>
                        <div class="item" data-aos="zoom-in" data-aos-delay="100">
                            <img src="<?= base_url(); ?>/assets/img/PEMBICARA2.png" class="img-fluid" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>

        <!-- Modal Login Developer -->
        <div class="modal fade" id="logDevModal" tabindex="-1" aria-labelledby="logDevModalLabel" aria-hidden="true"style="z-index: 9999999;">
            <div class="modal-dialog">
                <div class="modal-content cstm">
                    <div class="modal-header cstmbg">
                        <h5 class="modal-title w-100 text-center position-absolute" id="logDevModalLabel">Login Developer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url("auth/loginDev"); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="row justify-content-between">
                            <div class="col-4 mb-3">
                                <p class="radio-label text-center">Developer</p>
                            </div>
                            <br>
                            <div class="col text-right">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sfDev" value="sfDev" name="category" class="custom-control-input">
                                    <label class="custom-control-label" for="sfDev">Software Fair</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="hfDev" value="hfDev" name="category" class="custom-control-input">
                                    <label class="custom-control-label" for="hfDev">Hardware Fair</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="omrs-input-group">
                                <label class="omrs-input-underlined">
                                    <input type="email" name="emailDev" required>
                                    <span class="omrs-input-label">Email</span>
                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                    <i class="material-icons">email</i>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer cstmbg">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Login Open Talk -->
        <div class="modal fade" id="otLoginModal" tabindex="-1" aria-labelledby="logDevModalLabel" aria-hidden="true"style="z-index: 9999999;">
            <div class="modal-dialog">
                <div class="modal-content cstm">
                    <div class="modal-header cstmbg">
                        <h5 class="modal-title w-100 text-center position-absolute" id="logDevModalLabel">Login Open Talk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url("auth/otLogin"); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="omrs-input-group">
                                <label class="omrs-input-underlined">
                                    <input type="email" name="emailDev" required>
                                    <span class="omrs-input-label">Email</span>
                                    <!-- <span class="omrs-input-helper">Pesan Error</span> -->
                                    <i class="material-icons">email</i>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer cstmbg">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <section id="pengunjung">
            <div class="section-title cstm"data-aos="fade-up">
                <h2>Pengunjung</h2>
            </div>
            <div class="tab" data-aos="fade-up">
                <button class="tablinks" onclick="openCity(event, 'form')">Form</button>
                <button class="tablinks" onclick="openCity(event, 'guide')">Instructions</button>
            </div>
            <div id="form" class="tabcontent" style="display: block;">
                <div class="col-12 text-center align-self-center py-5" data-aos="zoom-in" data-aos-delay="100" >
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">
                        <h6 class="mb-0 pb-3">
                        <span>Log In </span>
                        <span>Sign Up</span>
                        </h6>
                        <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                        <label for="reg-log"></label>
                        <br>
                        <h5 style="color:white;">Silahkan dapat membaca instruksi pada menu "Instructions" untuk informasi pengunjung</h5>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <form action="<?= base_url("auth/login"); ?>" method="post">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <?php
                                                $inputs_visitors = session()->getFlashdata('inputs_visitors');
                                                $error_visitors = session()->getFlashdata('error_visitors');
                                                $errors_visitors = session()->getFlashdata('errors_visitors');
                                                $success_visitors = session()->getFlashdata('success_visitors');
                                                if(!empty($errors_visitors)){ ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                    <?php foreach ($errors_visitors as $errors_visitors) : ?>
                                                        <li><?= esc($errors_visitors) ?></li>
                                                    <?php endforeach ?>
                                                    </ul>
                                                </div>
                                                <br />
                                                <?php } if(!empty($error_visitors)){ ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                        <li><?= esc($error_visitors) ?></li>
                                                    </ul>
                                                </div>
                                                <br />
                                                <?php } if(!empty($success_visitors)){ ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?= esc($success_visitors) ?><br />
                                                </div>
                                                <br />
                                                <?php } ?>
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>  
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="buttn mt-4">Submit</button>
                                            </form>
                                            <p class="mb-0 mt-4 text-center">
                                            <!-- <a href="#0" class="link">Forgot your password?</a><br /> -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="card-back" id="signup">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <form action="<?= base_url("auth/register"); ?>" method="post">
                                                <h4 class="mb-4 pb-3">Sign Up</h4> 
                                                <?php
                                                $inputs_visitor = session()->getFlashdata('inputs_visitor');
                                                $error_visitor = session()->getFlashdata('error_visitor');
                                                $errors_visitor = session()->getFlashdata('errors_visitor');
                                                $success_visitor = session()->getFlashdata('success_visitor');
                                                if(!empty($errors_visitor)){ ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                    <?php foreach ($errors_visitor as $errors_visitor) : ?>
                                                        <li><?= esc($errors_visitor) ?></li>
                                                    <?php endforeach ?>
                                                    </ul>
                                                </div>
                                                <br />
                                                <?php } if(!empty($error_visitor)){ ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <ul>
                                                        <li><?= esc($error_visitor) ?></li>
                                                    </ul>
                                                </div>
                                                <br />
                                                <?php } if(!empty($success_visitor)){ ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?= esc($success_visitor) ?><br />
                                                </div>
                                                <br />
                                                <?php } ?> 
                                                <?= csrf_field(); ?>
                                                <div class="form-group">
                                                    <input type="text" name="reg_name" class="form-style" placeholder="Your Full Name" id="reg_name" autocomplete="off" required>
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>  
                                                <div class="form-group mt-2">
                                                    <input type="email" name="reg_email" class="form-style" placeholder="Your Email" id="reg_email" autocomplete="off" required>
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>  
                                                <div class="form-group mt-2">
                                                    <input type="password" name="reg_pass" class="form-style" placeholder="Your Password" id="reg_pass" autocomplete="off" required>
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
                                                <button type="submit" class="buttn mt-4">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="guide" class="tabcontent"  data-aos="zoom-in" data-aos-delay="100" >
                <h6 class="mb-0 pb-3">
                    <h1 style="text-align:center; color:#fff">Instruksi Pengunjung</h1>
                </h6>
                <div class="card-3d-wrap mx-auto">
                    <div class="card-3d-wrapper">
                        <div class="card-front">
                            <div class="center-wrap">
                                <div class="section text-center">
                                    <h6>Para Pengunjung akan diarahkan oleh pemandu untuk mengujungi semua stand dari software fair dan hardware fair menggunakan platform <strong>Artsteps</strong>.</h6> <br>
                                    <h6>Untuk melakukan voting terhadap tim developer, dapat dilakukan dengan cara login pada tombol form yang ada pada website <strong>Hi-Technology</strong> kemudian pengunjung akan diarahkan ke web sistem untuk voting.</h6></br>
                                    <h6> Didalam web tersebut, pengunjung juga dapat melakukan interaksi dengan tiap developer pada forum yang disediakan, serta dapat menyelesaikan challenge yang pastinya akan ada hadiah/reward bagi pemenang challenge.</h6> 
                                </div>
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </section>

        <section class="main-footer" id="kontak">
            <div class="footer-atas">
                <div class="footer-bg">
                    <h3>Contact Person</h3>
                    <!-- <div class="footer-email-phone">
                        <td><p><i class="fa fa-whatsapp" style="font-size:25px; padding: 5px;"></i>(Raka)</p></td>
                        <td><p><i class="fa fa-whatsapp" style="font-size:25px; padding: 5px;"></i>(Anam)</p></td>
                        
                    </div> -->
                    <div class="footer-email-phone">
                        <ul>
                            <li><a href="https://api.whatsapp.com/send?phone=6285329683273"><i class="fa fa-whatsapp" style="font-size: 25px; color: white;"></i>085329683273 (Raka)</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=6285158799141"><i class="fa fa-whatsapp" style="font-size: 25px; color: white;"></i>085158799141 (Anam)</a></li>
                        </ul>
                    </div>
                    <h3 style="padding-top: 2px;">Sponsorship</h3>
                    <div class="footer-email-phone">
                        <ul>
                            <li><a href="https://api.whatsapp.com/send?phone=628112917060"><i class="fa fa-whatsapp" style="font-size: 25px; color: white;"></i>08112917060 (Aci)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- ======= Footer ======= -->
    <div class="custom-shape-divider-top-1612437875">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z " class="shape-fill" style="fill:#77D0EE;"></path>
        </svg>
    </div>
    <footer id="footer">
        <div class="animate">
            <!-- SVG Code -->
            <svg version="1.1" id="thanos" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 800 300" enable-background="new 0 0 800 300" xml:space="preserve">
                <text transform="matrix(1 0 0 1 4.2921 210.0535)" font-size="104" class="tulisan">HI TECHNOLOGY</text>
            </svg>
        </div>
        <div class="footer-address">
            <h1>Visit <span>Our</span> Social Media</h1>
        </div>
        <div class="footer-social-icons">
            <ul>
                <li><a href="https://www.facebook.com/hmti.udinus/" target="_blank"> <i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/hmtiudinus?lang=id" target="_blank"> <i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"> <i class="fa fa-envelope"></i></a></li>
                <li><a href="https://instagram.com/hmtiudinus" target="_blank"> <i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="container footer-bottom clearfix">
        <hr style="width:50%;border-color:#fff;height:1px; margin:auto; align:center;"><br/>
            <div class="copyright">
                &copy; Copyright <?= date("Y"); ?> <a href="https://hmtiudinus.org/"><strong><span style="color:white;">HMTI</span></strong>.</a>
            </div>
        </div>
    </footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader">
    <img class="image" src="<?= base_url(); ?>/assets/img/logo1.png">
    <!--<img class="image2" src="<?= base_url(); ?>/assets/img/tulisant.png">-->
</div>
<script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/aos/aos.js"></script>



<script src="<?= base_url(); ?>/assets/js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init()
    $('#radioUmum').on('click', function () {
        $('#mahasiswa').hide()
    })

    $('#radioMhs').on('click', function () {
        $('#mahasiswa').show()
    })
</script>
</body>
</html>
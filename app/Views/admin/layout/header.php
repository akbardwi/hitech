<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $title; ?> - HI TECH 2021</title>
	<script defer src="<?= base_url(); ?>/assets/vote/js/theme.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style1.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style2.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style3.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/animate.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/prism.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/dist/superwheel.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/main.css">
	<link href="https://fonts.googleapis.com/cssfdf4.css?family=Lato:400,400i,700,700i" rel="stylesheet">
	<script src="<?= base_url(); ?>/assets/vote/js/jquery-3.3.1.js"></script>
	<script src="<?= base_url(); ?>/assets/vote/js/bootstrap.bundle.js"></script>
	<script src="<?= base_url(); ?>/assets/vote/dist/superwheel.js"></script>
	<script src="<?= base_url(); ?>/assets/vote/js/prism.js" data-manual></script>
	<script src="<?= base_url(); ?>/assets/vote/js/sweetalert2.min.js" data-manual></script>
	<script src="<?= base_url(); ?>/assets/vote/js/main1.js"></script>
	<script defer src="<?= base_url(); ?>/assets/vote/js/theme.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style.css" />
	<link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0.11/dist/flickity.min.css">
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo">
                <a href="#" class="nav-link">
                    <span class="link-text logo-text">Hi Technology</span>
                    <svg
                    aria-hidden="true"
                    focusable="false"
                    data-prefix="fad"
                    data-icon="angle-double-right"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x"
                    >
                        <g class="fa-group">
                            <path
                            fill="currentColor"
                            d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                            class="fa-secondary"
                            ></path>
                            <path
                            fill="currentColor"
                            d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                            class="fa-primary"
                            ></path>
                        </g>
                    </svg>
                </a>
            </li>
            <li class="nav-item active">
                <a href="<?= base_url('admin/dashboard'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Home</spam>
                </a>
            </li>
            <?php if(session()->get('user_type') == "visitor"){?>
            <li class="nav-item">
                <a href="<?= base_url('users/software-fair'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Software Fair</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('users/hardware-fair'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Hardware Fair</spam>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a href="<?= base_url('admin/peserta'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Daftar Peserta</spam>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?= base_url('admin/quickcount'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Quick Count</spam>
                </a>
            </li> -->
            <li class="nav-item">
                <a href="<?= base_url('admin/forum'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Forum</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/opentalk'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Forum OpenTalk</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/ranking'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Ranking Pengunjung</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/rating'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Rating Developer</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/voting'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Daftar Voting</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/logout'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Log Out</spam>    
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?> - Hi Tech 2021</title>
    <script defer src="<?= base_url(); ?>/assets/vote/js/theme.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/style.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/vote/css/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet" />
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
                <a href="<?= base_url('users/dashboard'); ?>" class="nav-link">
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
                <a href="<?= base_url('users/quick-count'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Quick Count</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('users/logout'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Log Out</spam>    
                </a>
            </li>
        </ul>
    </nav>
    <br>
    <br>
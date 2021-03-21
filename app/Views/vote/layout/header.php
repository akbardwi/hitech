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
	<script>
	jQuery(document).ready(function($){
		
		$('.wheel').superWheel({
			slices: [
				{
					text    : '20% OFF',
					message : 'You win 20% off',
					background   : '#364C62',
					value     : 1
				},{
					text    : 'No luck',
					message : 'You have No luck today',
					background   : '#9575CD',
					value     : 0
				},{
					text    : '30% OFF',
					message : 'You win 30% off',
					background   : '#E67E22',
					value     : 1
				},{
					value      : 'd',
					text    : 'Lose',
					message : 'You Lose :(',
					background   : '#E74C3C',
					win     : 0
				},{
					text    : '40% OFF',
					message : 'You win 40% off',
					background   : '#2196F3',
					color : '#fff',
					value     : 1
				},{
					text    : 'Nothing',
					message : 'You get Nothing :(',
					background   : '#95A5A6',
					value     : 0
				},{
					text    : 'No luck',
					message : 'You have No luck today',
					background   : '#9575CD',
					value     : 0
				}
			],
			
			
			//======================================
			//======================================
			//=======    Wheel Parameters    =======
			//======================================
			//======================================
			text : {
				color: '#fff',
				offset : 8,
				letterSpacing: 0,
				orientation: 'v',
				arc: true
			},
			
			slice : {
				background : "#333",
			},
			
			line:{
				width : 6,
				color : "#fefefe",
			},
			
			outer : {
				width : 10,
				color : "#fefefe",
			},
			
			inner : {
				width : 8,
				color : "#fefefe",
			},
			
			width: 500,
			duration: 8000,
			
		});
		
		var tick = new Audio('<?= base_url(); ?>/assets/vote/media/tick.mp3');
		
		
		$(document).on('click','.spin-to-win',function(e){
			e.preventDefault();
			$('.wheel').superWheel('start','value',Math.floor(Math.random() * 2));
			$(this).prop('disabled',true);
		});
		
		$('.wheel').superWheel('onStart',function(results){
			$('.spin-to-win').text('Spinning...');
		});
		
		
		$('.wheel').superWheel('onStep',function(results){
			if (typeof tick.currentTime !== 'undefined')
				tick.currentTime = 0;
			tick.play();
		});
		
		$('.wheel').superWheel('onComplete',function(results){
			
			if(results.value === 1){
				swal({
					type: 'success',
					title: "Congratulations!", 
					html: results.message+' <br><br><b>Discount : [ '+ results.discount+ ' ]</b>'
				});
			}else{
				swal("Oops!", results.message, "error");
			}
			$('.spin-to-win:disabled').prop('disabled',false).text('Spin to win');
		});
		
		
	});
	</script>
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
            <?php if(session()->get('user_type') == "visitor" and (strtotime(date("03-04-2020 08:00:00")) < strtotime(date("d-m-Y H:i:s")))){?>
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
                <a href="<?= base_url('users/forum'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Forum</spam>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?= base_url('users/quick-count'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Quick Count</spam>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('users/wheel-of-fortune'); ?>" class="nav-link">
                    <i class="ri-twitter-fill" style="color: #fff;"></i>
                    <spam>Wheel Of Fortune</spam>
                </a>
            </li> -->
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
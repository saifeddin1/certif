<!DOCTYPE html>
<html>

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- CSS styles -->
	    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
		<link rel="stylesheet" href="<?php echo base_url('assets/bs/css/bootstrap.min.css') ?>">
	    <!-- JS Libs -->

		
		<!--====== Favicon Icon ======-->
		<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png" type="image/png') ?>">

		<!--====== Slick CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/slick.css') ?>">

		<!--====== Font Awesome CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">

		<!--====== Line Icons CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/LineIcons.css') ?>">

		<!--====== Animate CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css') ?>">

		<!--====== Bootstrap CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">

		<!--====== Default CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/default.css') ?>">

		<!--====== Style CSS ======-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">

		
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
    	<script src="<?php echo base_url('assets/bs/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	</head>

	<style>
		.form-select,
		.form-control {
			border: none;
			border-bottom: 1px solid #ccc;
			border-radius: 0;
		}
	
		.form-select:focus,
		.form-control:focus {
			box-shadow: inset 0 -1px 0 #2196f3;
			border-bottom-color: #2196f3;
		}
	
	</style>
	<body>

	  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

	
	<div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo base_url('home'); ?>">
								<h1>DIGIXIS</h1>
							</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a href="<?php echo base_url('home'); ?>">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('home'); ?>#about">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('home'); ?>#contact">Contact</a>
                                    </li>
									<?php if(isset($_SESSION['user'])) { ?>
										<li class="nav-item">
											<a href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
                                    	</li>
										<li class="nav-item">
											<a>Bienvenue, <?php echo $_SESSION['user']['username'] ?></a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url('auth/logout') ?>">
												Deconnexion
											</a>
										</li>
									<?php } else {?>
										<li class="nav-item">
											<a href="<?php echo base_url('auth/register'); ?>">Créer Compte</a>
                                    	</li>
										<li class="nav-item">
											<a href="<?php echo base_url('auth/login'); ?>">Se connecter</a>
                                    	</li>
									<?php }; ?>
                                </ul>
                            </div> <!-- navbar collapse -->

                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> 
		<!-- navbar area -->

		 <div <?php if($this->router->fetch_class() != 'home'){echo 'style="padding:7rem;"';};  ?>>
 			<?php	if(isset($_view) && $_view)
			$this->load->view($_view);
			?>
		</div>


		<!--====== Jquery js ======-->
		<script src="<?php echo base_url('assets/js/vendor/jquery-1.12.4.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendor/modernizr-3.7.1.min.js'); ?>"></script>

		<!--====== Bootstrap js ======-->
		<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

		<!--====== Plugins js ======-->
		<script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>

		<!--====== Slick js ======-->
		<script src="<?php echo base_url('assets/js/slick.min.js'); ?>"></script>


		<!--====== Counter Up js ======-->
		<script src="<?php echo base_url('assets/js/waypoints.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.counterup.min.js'); ?>"></script>


		<!--====== Appear js ======-->
		<script src="<?php echo base_url('assets/js/jquery.appear.min.js'); ?>"></script>

		<!--====== WOW js ======-->
		<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>

		<!--====== Headroom js ======-->
		<script src="<?php echo base_url('assets/js/headroom.min.js'); ?>"></script>

		<!--====== Jquery Nav js ======-->
		<script src="<?php echo base_url('assets/js/jquery.nav.js'); ?>"></script>

		<!--====== Scroll It js ======-->
		<script src="<?php echo base_url('assets/js/scrollIt.min.js'); ?>"></script>

		<!--====== Main js ======-->
		<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>


	</body>
</html>

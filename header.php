<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Arbites - Just a thought</title>
	<meta name="description" content="Arbites - Just a thought">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

	<!-- STYLESHEETS -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/owl.theme.default.min.css">
    <?php wp_head(); ?>
</head>
<body>

	<!-- preloader -->
    <div id="loader-wrapper">
		<div class="loader-img"><img src="<?php echo get_stylesheet_directory_uri();?>/images/aRlogo.png" alt="preloader"></div>
		<div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
	</div>
	<!-- search wrapper -->
	<div class="section search-section">
		<a href="#" class="close-search"><img src="<?php echo get_stylesheet_directory_uri();?>/images/close.png" alt="close"></a>
		<div class="centered">
			<form action="#">
				<input type="text" placeholder="Search here..">
				<button>Search</button>
			</form>
		</div>
	</div>
	<!-- search wrapper -->
 
	<!-- header section -->
	<section class="header-wrapper style-two">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 col-md-12 site-logo">
					<a href="<?php echo site_url();?>" class="logo"><img src="<?php echo get_stylesheet_directory_uri();?>/images/aRlogo.png" alt="logo"></a>
					<a href="#" class="menu-click"><span></span><span></span><span></span></a>
				</div>
				<div class="col-lg-8 col-md-12">
					<nav id="main-menu" class="text-center">
						<?php wp_nav_menu(); ?>
					</nav>
				</div>
				<div class="col-lg-2 col-md-4 text-center">
					<a href="#" class="search-icon"><img src="<?php echo get_stylesheet_directory_uri();?>/images/search-icon.png" alt="search-icon"></a>
				</div>
			</div>
		</div>
	</section>
	<!-- header section -->


<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Clinica_da_Cidade
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,700" rel="stylesheet">
<!-- Favicon -->
<link rel="icon" href="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/favicon_16x16.png" size="16x16">
<link rel="icon" href="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/favicon_32x32.png" size="32x32">
<!-- Bootstrap -->
<link href="<?php bloginfo("stylesheet_directory"); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo("stylesheet_directory"); ?>/assets/css/ionicons.min.css" rel="stylesheet">
<link href="<?php bloginfo("stylesheet_directory"); ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php bloginfo("stylesheet_directory"); ?>/assets/css/jquery.bxslider.css" rel="stylesheet">
<link href="<?php bloginfo("stylesheet_directory"); ?>/assets/css/magnific-popup.css" rel="stylesheet">
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header class="header-wrapper">
		<div class="container">
			<nav class="main-nav">
				<div class="row">
					
					<div class="col-sm-4">
						<div class="logo-box">
							<a href="<?php echo esc_html(home_url("/"));?>" title="Clinica da Cidade" ><img src="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/logo-clinica-da-cidade.png" alt="Clinica da Cidade"></a>
						</div>
					</div>
					<div id="mobile_nav" class="col-sm-8">
						<?php 
							// Set de args for the main menu
							$main_menu_args = array(
								"theme_location"  => "header",
								"menu_class"      => "menu-links clearfix"
							);
							// Call main menu function
							wp_nav_menu($main_menu_args);
						?>
					</div>
					<div class="col-sm-12 mobile-btn-box">
						<div class="mobile-dropdown-btn">
							<i class="ion-ios-arrow-down"></i>
						</div>
					</div>
					
				</div>
			</nav>
		</div>
	</header>
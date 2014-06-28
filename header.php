<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="author" content="Marc Thoeni">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- style.css and favicon.ico -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">

<!-- jQuery Library -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery-1.7.1.min.js"></script>

<!-- jQuery UI ToTop -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ui.totop.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/easing.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.ui.totop.js"></script>

<!-- Fancybox -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/fancybox/jquery.fancybox.pack.js"></script>

<!-- Functions -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>

<!-- Standalone Javascript -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/standalone.js"></script>

<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_sidebar('sidebar'); ?>
<div id="buttons">
    <a class="open-sidebar">sidebar zeugs</a>
	<a class="close-sidebar">sidebar zeugs</a>
</div>
<div id="container">
	<a id="logo" href="<?php bloginfo('url'); ?>"><span class="hide">gschpunna.ch</span></a>
	<?php wp_nav_menu(); ?>
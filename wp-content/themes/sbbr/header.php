<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title( '|', true, 'right' );  bloginfo("name"); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <link href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <?php wp_head(); ?>
</head>
<body <?php sbbr_body_id();?> <?php body_class(); ?>>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="container">
    <div class="header-outer"><div class="header clearfix">
        <div class="logo"><a href='/'><h1>Sammy's Beach Bar Rum</h1></a></div>
	<div class="responsive_menu_container">
	  <div class="responsive_menu_icon">
	    <span class="responsive_icon_bar"></span>
	    <span class="responsive_icon_bar"></span>
	    <span class="responsive_icon_bar"></span>
	  </div>
	</div>
	<div class="nav_area">
	  <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'navbar-nav', 'container' => false, 'items_wrap' => '<ul class="nav navbar-nav clearfix">%3$s</ul>')); ?>
	</div>
    </div></div>


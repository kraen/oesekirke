<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head>
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="utf-8">
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title>
		<?php
		if (function_exists('is_tag') && is_tag()) :
			single_tag_title("Tag Archive for &quot;"); echo '&quot; - ';
		elseif (is_archive()) :
			wp_title(''); echo ' Archive - ';
		elseif (is_search()) :
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
		elseif (!(is_404()) && (is_single()) || (is_page())) :
			wp_title(''); echo ' - ';
		elseif (is_404()) :
			echo 'Not Found - ';
		endif;
		if (is_home()) :
			bloginfo('name'); echo ' - '; bloginfo('description');
		else :
			bloginfo('name');
		endif;
		if ($paged>1) echo ' - page '. $paged; ?>
	</title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>
	<link rel="shortcut icon" href="http://oesekirke.dk/favicon.ico">
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Delicious_500-Delicious_700.font.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.color.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.scrolling-parallax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr-2.7.2.min.js"></script>
	<!-- Parallax effect is created by Jon Raasch at http://jonraasch.com/blog/scrolling-parallax-jquery-plugin -->
	<script type="text/javascript">
		$(function (){
			$('#cloud1').scrollingParallax({staticSpeed:.3,staticScrollLimit:false});
			$('#cloud2').scrollingParallax({staticSpeed:.2,staticScrollLimit:false});
			$('#cloud3').scrollingParallax({staticSpeed:.5,staticScrollLimit:false});
		});
		</script>
	<!--[if lt IE 7]>
	<script defer type="text/javascript" src="http://oesekirke.dk/unitpngfix.js"></script>
	<![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="clouds"><div id="cloud1"></div><div id="cloud2"></div><div id="cloud3"></div></div><!-- background parallax clouds -->
	<div id="container"><!-- centers the content -->
	    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/header.png" /></a>  
		<div id="clear">&nbsp;</div>
		<div id="navigation">
			<?php wp_nav_menu( array( 'container_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
			<?php get_search_form(); ?>
		</div>
		<div id="clear">&nbsp;</div>
		<div id="wrapper">">
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
	<meta name="msapplication-TileColor" content="#76d6ff">
	<meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">
	<!-- Parallax effect is created by Jon Raasch at http://jonraasch.com/blog/scrolling-parallax-jquery-plugin -->
	<script type="text/javascript">
		$(function (){
			$('#cloud1').scrollingParallax({staticSpeed:.3,staticScrollLimit:false});
			$('#cloud2').scrollingParallax({staticSpeed:.2,staticScrollLimit:false});
			$('#cloud3').scrollingParallax({staticSpeed:.5,staticScrollLimit:false});
		});
		</script>
	<!--[if lt IE 7]>
	<script defer type="text/javascript" src="http://oesekirke.dk/unitpngfix.js"></script>
	<![endif]-->
</head>
<body>
<div class="wrapper">
	<div class="clouds"><div id="cloud1"></div><div id="cloud2"></div><div id="cloud3"></div></div><!-- background parallax clouds -->
	<div id="container"><!-- centers the content -->
	    <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/header.png" /></a>
		<div id="clear">&nbsp;</div>
		<div id="navigation">
			<?php wp_nav_menu( array( 'container_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
			<?php get_search_form(); ?>
		</div>
		<div id="clear">&nbsp;</div>
		<div id="wrapper">

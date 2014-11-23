<!doctype html>
<html>
<head>
  <title>Øse Kirke</title>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>"/>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <?php wp_head(); ?>
  <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <!-- START NAVIGATION -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Øse Kirke</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav pull-left">
        <?php wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s' ) ); ?>
      </ul>
      <?php get_search_form(); ?>
    </div>


    </div><!-- .container -->
  </nav>

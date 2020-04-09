<!DOCTYPE html>
<html lang="da" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php wp_title(' '); ?><?php if(wp_title(' ', false)) { echo ' &raquo; '; } ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  </head>
  <body id="pageTop">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-transparent" id="mainNav">
      <div class="container">
        <a href="<?php bloginfo('url'); ?>" class="navbar-brand"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php custom_menu( 'header-menu' ); ?>


      </div>
    </nav>
    <!-- end nav -->
    <div class="<?php echo is_front_page() ? 'index-page' : 'single-page'; ?>" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php bloginfo('template_url'); ?>/images/sydoest.jpg);" id="headerImage">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mr-auto ml-auto text-center">
            <div class="brand">
              <h1><?php bloginfo('name'); ?></h1>
              <h3><?php bloginfo('description'); ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php get_header(); ?>

<div class="container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="post" id="<?php the_ID(); ?>">
    <h2 class="page"><?php the_title(); ?></h2>
    <div class="entry">
      <?php the_content(); ?>
    </div>


  </div>
<?php endwhile; endif;?>
</div>
<?php get_footer(); ?>

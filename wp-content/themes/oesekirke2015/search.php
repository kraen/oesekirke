<?php get_header(); ?>
<div class="container">
  <div class="row">
    <?php if ( have_posts() ) : ?>
      <div class="col-md-8">
      <h2 class="page">Søgeresultater</h2>

      <?php while ( have_posts() ) : the_post(); ?>

          <div <?php post_class(); ?> id="<?php the_ID(); ?>">
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
            <div class="entry">
              <?php the_excerpt(); ?>
            </div>
          </div>


      <?php endwhile; ?>
      <nav>
        <ul class="pager">
          <li class="previous"><?php next_posts_link(__('&laquo; Ældre indlæg')) ?></li>
          <li class="next"><?php previous_posts_link(__('Nyere indlæg &raquo;')) ?></li>
        </ul>
      </nav>
    <?php else : ?>
      <h2 class="center">Søgningen gav ingen resultater.</h2>



    <?php endif;?>
  </div>
</div>
<?php get_footer(); ?>

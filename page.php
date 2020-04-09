<?php get_header(); ?>

    <!-- end .index-page -->
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="container" id="<?php the_ID(); ?>">
        <div class="row my-5 d-flex justify-content-md-center">
          <div class="col-md-8">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
      </div>

    <?php
      endwhile;
    else : ?>
    <div class="container" id="one">
      <div class="row my-5 d-flex justify-content-md-center">
        <div class="col-md-8">
          <?php _e ('Sorry no posts matched your criteria', 'oesekirke'); ?>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <!-- end main content area -->

<?php get_footer(); ?>

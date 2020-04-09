<?php
/*

Template Name: Om Kirken
*/

get_header();
 ?>
<div class="container">
  <div class="d-flex flex-column">
    <div class="order-2">
      <?php
      if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="mt-3" id="page-<?php the_ID(); ?>">

              <div class="page-header mb-4">
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="page-content">
                <?php the_content(); ?>
              </div>
          </div>

      <?php
        endwhile;
      else : ?>
        <div class="my-5">
            <div class="post-header">
              <h1>Til den søgende</h1>
            </div>
            <div class="post-content">
              <?php _e ('Sorry no posts matched your criteria', 'oesekirke'); ?>
            </div>
        </div>
      <?php endif;
      wp_reset_postdata();
      ?>

      <?php
      $currentID = get_the_ID();
      $about_items = array();
      $args = array(
        'post_type' => 'post',
        'category_name' => 'om-kirken',
        'order' => 'ASC',
        'orderby' => 'title'
      );
      $the_query = new WP_Query($args);
      if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
        $item = array('id' => $post->ID, 'title' => $post->post_title);
        array_push($about_items, $item);
      ?>
      <hr>
          <div class="my-5" id="post-<?php the_ID(); ?>">
              <div class="post-header my-4">
                <h3><?php the_title(); ?></h3>
              </div>
              <div class="post-content">
                <?php the_content(); ?>
              </div>
          </div>


      <?php
        endwhile;
      else : ?>
        <div class="">
            <div class="post-header">
              <h1>Til den søgende</h1>
            </div>
            <div class="post-content">
              <?php _e ('Sorry no posts matched your criteria', 'oesekirke'); ?>
            </div>
        </div>
      <?php endif;
      wp_reset_postdata();
      ?>

    </div>
    <div class="d-none d-md-block mt-1 order-1 about-toc sticky-top" id="about-navigation">
      <div class="nav nav-underline">

      <?php
      foreach ($about_items as $about_item) {
        echo '<a href="#post-' . $about_item['id'] .'" class="nav-link">' . $about_item['title'] . '</a>';
      }
      ?>
    </div>
    </div>
  </div>
  <a id="back-to-top" href="#" class="btn btn-secondary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fas fa-angle-up fa-2x"></i></a>
</div>


<?php get_footer(); ?>

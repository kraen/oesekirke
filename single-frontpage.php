<?php
/*
Template Name: Frontpage loop
*/

?>
<?php
$currentID = get_the_ID();
$args = array(
  'post_type' => 'frontpage',
  'order' => 'ASC',
  'orderby' => 'menu_order'
);
$the_query = new WP_Query($args);
if( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

  <div class="container" id="frontpage-<?php the_ID(); ?>">
    <div class="row my-5 d-flex justify-content-md-center">
      <div class="col-md-8">
        <div class="frontpage-header mb-4 text-black-50">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="frontpage-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

<?php
  endwhile;
else : ?>
<div class="container" id="one">
  <div class="row my-5 d-flex justify-content-md-center">
    <div class="col-md-8">
      <div class="post-header">
        <h1>Til den søgende</h1>
      </div>
      <div class="post-content">
        <?php _e ('Sorry no posts matched your criteria', 'oesekirke'); ?>
      </div>
    </div>
  </div>
</div>
<?php endif;
wp_reset_postdata();
?>

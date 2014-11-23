<?php get_header(); ?>
<div class="container">
  <div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php $images = get_post_custom_values('Image');

  if (isset($images)) { ?>
    <div class="col-md-8">
      <div class="post" id="<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="entry">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <?php foreach ($images as $image) {
        $image = explode(',',$image);
        echo "<div class=\"thumbnail\">";
        echo "<img src=\"" . get_bloginfo('url') . "/images/$image[0]\">";
        if (isset($image[1])) {
          echo "<div class=\"caption\"><p>";
          echo $image[1];
          echo "</p></div>";
        }
        echo "</div>";
      } ?>
    </div>
  <?php } else { ?>
    <div class="col-md-12">
      <div class="post" id="<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
        <div class="entry">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  <?php } ?>

<?php endwhile; endif;?>
</div>
</div>
<?php get_footer(); ?>

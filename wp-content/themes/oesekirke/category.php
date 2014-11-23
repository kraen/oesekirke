<?php get_header(); ?>

<div class="post">
	<h1><?php single_cat_title(); ?></h1>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div>
				<?php the_content(); ?>
			</div>
		</div>
	
	<?php endwhile; endif; ?>

	</div>


<?php get_footer(); ?>
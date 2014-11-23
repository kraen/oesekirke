<?php get_header(); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post" id="<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<div class="images">
					<?php
						$images = get_post_custom_values('Image', $post->ID);
						
						foreach ($images as $articleimg) :
							echo "<div class=\"image\"><div class=\"articleimg\">";
							echo "<a href=\"http://www.oesekirke.dk/images/$articleimg.jpg\"><img src=\"http://www.oesekirke.dk/images/$articleimg.jpg\" /></a>";
							echo "</div></div>";
						endforeach;
					?>
				</div>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				
			</div>
			<?php endwhile; endif;?>
		
<?php get_footer(); ?>
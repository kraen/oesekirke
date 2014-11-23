<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div class="post">

	<?php if (have_posts()) : ?>

		<h2 class="page">Søgeresultater</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Ældre indlæg')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Nyere indlæg &raquo;')) ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class(); ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
				<p class="postmetadata"><?php printf(__('Kategori: %s'), get_the_category_list(', ')); ?></p>
				<div class="entrysmall">
					<?php the_excerpt(); ?>
				</div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Ældre indlæg')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Nyere indlæg &raquo;')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e('Søgningen gav ingen resultater. Prøv en anden søgning?', 'kubrick'); ?></h2>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>

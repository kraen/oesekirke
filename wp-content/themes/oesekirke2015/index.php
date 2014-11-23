<?php get_header(); ?>

<!-- start MAIN CONTENT -->
<section class="content" id="main">
	<div class="jumbotron">
		<div class="container">
			<h1>Øse Kirke</h1>
		</div>
	</div><!-- end .jumbotron -->

	<div class="columns">
		<div class="container">

			<div class="row">
				<div class="col-md-4">
					<?php query_posts('page_id=20');
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="post" id="<?php the_ID(); ?>">
							<?php the_content(); ?>
						</div><?php endwhile; endif;?>
				</div>
				<div class="col-md-4">
					<?php rewind_posts(); query_posts('page_id=22'); if ( have_posts() ) : while ( have_posts() ) : the_post();
						$content = get_the_content();
						if(!empty($content)) : ?>
						<div class="post" id="<?php the_ID(); ?>">
							<div class="entry">
								<? the_content(); ?>
							</div>
						</div><?php endif; endwhile; endif; ?>
				</div>

				<div class="col-md-4">
					<?php rewind_posts();
					query_posts('category_name=Kirkeblad&showposts=1');
					if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<div class="embed-responsive embed-responsive-4by3">

						<div class="post" id="<?php the_ID(); ?>">
								<?php the_content(); ?>
								<p>For at læse kirkebladet fra 2010 og frem skal du have Adobe Flash Player installeret. Du kan hente det hos <a href="http://get.adobe.com/flashplayer/">Adobe</a>. For at læse tidligere kirkeblade skal du have Adobe Acrobat Reader installeret. Det kan også hentes hos <a href="http://get.adobe.com/dk/reader/">Adobe</a></p>
								<small>Se tidligere kirkeblade her: <?php the_category(" "); ?></small>
						</div><?php endwhile; endif;?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- end .columns -->
</section>
<?php get_footer(); ?>

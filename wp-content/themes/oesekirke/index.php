<?php get_header(); ?>
<div id="content">
	<?php query_posts('page_id=20');
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post" id="<?php the_ID(); ?>">
		<div class="entry">
			<?php the_content(); ?>
		</div>
	</div><?php endwhile; endif;?>
</div><!-- end #content -->
<div id="opslag">
	<?php rewind_posts(); query_posts('page_id=22'); if ( have_posts() ) : while ( have_posts() ) : the_post();
	$content = get_the_content();
	if(!empty($content)) : ?>
	<div class="post" id="<?php the_ID(); ?>">
		<div class="entry">
			<? the_content(); ?>
		</div>
	</div><?php endif; endwhile; endif;
	rewind_posts();
	query_posts('category_name=Kirkeblad&showposts=1');
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="post" id="<?php the_ID(); ?>">
			<div class="entry">
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<p>For at læse kirkebladet fra 2010 og frem skal du have Adobe Flash Player installeret. Du kan hente det hos <a href="http://get.adobe.com/flashplayer/">Adobe</a>. For at læse tidligere kirkeblade skal du have Adobe Acrobat Reader installeret. Det kan også hentes hos <a href="http://get.adobe.com/dk/reader/">Adobe</a></p>
				<small>Se tidligere kirkeblade her: <?php the_category(" "); ?></small>
			</div>		
		</div><?php endwhile; endif;?>
</div><!-- end #opslag -->
<div id="clear">&nbsp;</div>
<?php get_footer(); ?>
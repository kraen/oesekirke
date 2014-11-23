<?php
if ( function_exists('register_sidebar') )
    register_sidebar();

if ( !function_exists('core_mods') ) {
	function core_mods() {
		if ( !is_admin() ) {
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"), false);
			wp_enqueue_script('jquery');
		}
	}
	core_mods();
}

automatic_feed_links();
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head', 'wp_generator');
}
add_action('init', 'removeHeadLinks');

register_nav_menus( array(
	'primary' => __( 'Navigation', 'oesekirke' ),
) );

function list_category($atts) {

	$cat = $atts[cat];
	
	$query = "category_name=$cat&orderby=title&order=ASC";
	
	$wp_query = new WP_Query();
	
	$wp_query->query($query);
	ob_start();
	echo "<ul class=\"category\">";
	while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			
	<?php
	endwhile;
	echo "</ul>";
	$content = ob_get_contents();
	ob_end_clean();
	
	return $content;

}
add_shortcode('catlist', 'list_category');

function picture($atts) {
	$billede = "";
	
	$src = $atts['src'];
	$tekst = $atts['tekst'];
	$class = $atts['class'];
	
	if(isset($class)) : 
		$classy = " class=\"$class\"";
	endif;
	
	if (isset($src)) :
	
		$billede = "<div id=\"billede\"$classy>";
	
		if(!strstr($src,'http://')) : 
			$billede .= "<a href=\"http://www.oesekirke.dk/images/$src\">";
			$billede .= "<img src=\"http://www.oesekirke.dk/images/$src\">";
			$billede .= "</a>";
		else :
			$billede .= "<a href=\"$src\">";
			$billede .= "<img src=\"$src\">";
			$billede .= "</a>";
		endif;
	
		if (isset($tekst)) :
			$billede .= $tekst;
		endif;
	
		$billede .= "</div>";
	
	endif;
	
	return $billede;
	
}

add_shortcode('billede', 'picture');

// Liste funktion

function tabel($atts, $content = null) {
	$tabel = "";
	
	$content = strip_tags($content);
	
	$tabel = "<pre>";
	$tabel .= str_replace("/","\t",$content);
	$tabel .= "</pre>";
	
	return $tabel;
}

add_shortcode('tabel', 'tabel');

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'menighedsraad', 220, 180, false );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'menighedsraad' => __('Menighedsråd'),
    ) );
}

?>
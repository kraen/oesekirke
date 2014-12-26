<?php
if ( function_exists('register_sidebar') ) {
register_sidebar( array(
  'name'          => 'Footer middle',
  'id'            => 'sidebar-1',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget'  => '</aside>',
  'before_title'  => '<h3 class="widget-title">',
  'after_title'   => '</h3>',
  ) );
}
// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

$customHeader = array(
  'flex-width'    => true,
  'flex-height'   => true,
  'height'        => 500,
  'width'         => 1800,
  'default-image' => get_template_directory_uri() . '/img/header.jpg'
);

add_theme_support( 'custom-header', $customHeader );

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

function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'

  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );

register_nav_menus( array(
  'primary' => __( 'Navigation', 'oesekirke' ),
  ) );

  function list_category($atts) {

    $cat = $atts[cat];

    $query = "category_name=$cat&orderby=title&order=ASC";

    $wp_query = new WP_Query();

    $wp_query->query($query);
    ob_start();
    echo "<h3>Læs mere</h3>";
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

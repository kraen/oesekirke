<?php
function oesekirke_enqueue_style() {
	wp_enqueue_style( 'core', trailingslashit( get_template_directory_uri() ) . 'bootstrap/css/bootstrap.min.css', false );
  wp_enqueue_style( 'font', trailingslashit( get_template_directory_uri() ) . 'fontawesome-free-5.4.1-web/css/all.css', false );
}

function oesekirke_enqueue_script() {
  wp_deregister_script('jquery');
  wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), null, true);
	wp_enqueue_script( 'bootstrap', trailingslashit( get_template_directory_uri() ) . 'bootstrap/js/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), null, true );
  wp_enqueue_script( 'custom', trailingslashit( get_template_directory_uri() ) . 'js/master.js', array(), null, true );
}

add_action( 'wp_enqueue_scripts', 'oesekirke_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'oesekirke_enqueue_script' );

function frontpage_item()
{
  register_post_type('frontpage',
  array(
    'labels'      => array(
      'name'          => __('Forsideemner'),
      'singular_name' => __('Forsideemne'),
    ),
    'public'      => true,
    'has_archive' => true,
    'show_ui' => true,
    'query_var' => true,
    'hierarchical' => true,
    'supports' => array('title', 'editor', 'page-attributes'),
		'show_in_rest' => true
  )
);
}
add_action('init', 'frontpage_item');

function kirkeblad_item()
{
  register_post_type('Kirkeblad',
  array(
    'labels'      => array(
      'name'          => __('Kirkeblade'),
      'singular_name' => __('Kirkeblad'),
    ),
    'public'      => true,
		'supports' => array('title', 'editor', 'page-attributes'),
		'show_in_rest' => true
  )
);
}
add_action('init', 'kirkeblad_item');

function get_custom_post_IDs() {
  global $post;
  $args = array(
    'post_type' => 'frontpage',
    'order' => 'ASC',
    'orderby' => 'menu_order'
  );

  $query = new WP_Query($args);
  $frontpage_items = array();
  if( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    $item = array('id' => $post->ID, 'title' => $post->post_title);
    array_push($frontpage_items, $item);
  endwhile;
  endif;
  return $frontpage_items;
  wp_reset_postdata();
}


function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function custom_menu( $theme_location ) {
  if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {

    $menu = get_term( $locations[$theme_location], 'nav_menu' );
    $menu_items = wp_get_nav_menu_items($menu->term_id);


    $menu_list = '<div class="navbar-collapse offcanvas-collapse" id="navbarSupportedContent">';
    $menu_list .= '<ul class="navbar-nav ml-auto">';

    $menu_list .= '<li class="nav-item dropdown">' ."\n";
    $menu_list .= '<a class="nav-link" href="' . get_bloginfo('url') . '">Forside</a>' ."\n";
    $menu_list .= '</li>';

    foreach( $menu_items as $menu_item ) {
      if( $menu_item->menu_item_parent == 0 ) {

        $parent = $menu_item->ID;

        $menu_array = array();
        foreach( $menu_items as $submenu ) {
          if( $submenu->menu_item_parent == $parent ) {
            $bool = true;
            $menu_array[] = '<li class="nav-item"><a class="nav-link" href="' . $submenu->url . '">' . $submenu->title . '</a></li>' ."\n";
          }
        }
        if( $bool == true && count( $menu_array ) > 0 ) {

          $menu_list .= '<li class="dropdown">' ."\n";
          $menu_list .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";

          $menu_list .= '<ul class="dropdown-menu">' ."\n";
          $menu_list .= implode( "\n", $menu_array );
          $menu_list .= '</ul>' ."\n";

        } else {

          $menu_list .= '<li class="nav-item">' ."\n";
          $menu_list .= '<a class="nav-link" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
        }

      }

      // end <li>
      $menu_list .= '</li>' ."\n";
    }

    $menu_list .= '<li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Øse-og-Næsbjerg-kirker-106219799469101" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
    <li class="nav-item"><a href="https://www.google.dk/maps/place/Øse+Kirke/@55.645846,8.6518133,17z/data=!3m1!4b1!4m5!3m4!1s0x464b1a3b8a1f469d:0x515334ab6925482f!8m2!3d55.645846!4d8.654002?hl=da" class="nav-link" target="_blank"><i class="fas fa-map-marked-alt"></i></a></li>';

    $menu_list .= '</ul>';
    $menu_list .= '</div>';

  } else {
    $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
  }
  echo $menu_list;
}

function show_kirkeblad($atts) {
  extract(shortcode_atts(array(
      'posts' => 1,
   ), $atts));

  $args2 = array(
    'post_type' => 'kirkeblad',
    'showposts' => $posts
  );
  $the_query2 = new WP_Query($args2);
  if( have_posts() ) : while ( $the_query2->have_posts() ) : $the_query2->the_post();

   ?>
   <div id="kirkeblad-<?php the_ID(); ?>">
     <div class="post-header">
       <h3><?php the_title(); ?></h3>
     </div>
     <div class="post-content">
       <?php the_content(); ?>
     </div>
  </div>

  <?php
   endwhile;
  else :

  endif;
}

function register_shortcodes(){
   add_shortcode('kirkeblad', 'show_kirkeblad');
}

add_action( 'init', 'register_shortcodes');
?>

<?php

function gridly_theme_setup() {
// Add RSS links to <head> section
add_theme_support('automatic-feed-links');

// Gridly post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size('summary-image', 310, 9999);
add_image_size('detail-image', 770, 9999);

register_nav_menu( 'main_nav', __( 'Main Menu' ) );

}
add_action( 'after_setup_theme', 'gridly_theme_setup' );

// Load Scripts
function gridly_add_scripts() {
	wp_enqueue_script('jquery.masonry', (get_template_directory_uri()."/js/jquery.masonry.min.js"),array('jquery'),'02072014',true);
	wp_enqueue_script('gridly.functions', (get_template_directory_uri()."/js/functions.js"),array('jquery.masonry'),'02072014',true);
	if ( is_singular() ) { 
		wp_enqueue_script( 'comment-reply' );
	}

	$options = get_option('plugin_options');
	$gridly_color_scheme = $options['gridly_color_scheme'];
	$gridly_logo = $options['gridly_logo'];
	$gridly_responsive = $options['gridly_responsive'];

	wp_enqueue_style( 'gridly-reset', get_template_directory_uri() . '/css/reset.css', array(), '02072014' );
	wp_enqueue_style( 'gridly-fonts', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700', array(), '02072014' );
   
    if ($gridly_color_scheme == 'dark') {
    	wp_enqueue_style( 'gridly-dark', get_template_directory_uri() . '/css/dark.css', array(), '02072014' ); 
	} elseif ($gridly_color_scheme == 'custom') {
    	wp_enqueue_style( 'gridly-custom', get_template_directory_uri() . '/css/custom.css', array(), '02072014' );
    } else {
         wp_enqueue_style( 'gridly-light', get_template_directory_uri() . '/css/light.css', array(), '02072014' );
    }
    
    if ($gridly_responsive != 'no') {
    	wp_enqueue_style( 'gridly-mobile', get_template_directory_uri() . '/css/mobile.css', array(), '02072014', 'handheld, only screen and (max-width: 480px), only screen and (max-device-width: 480px)' );
    }
}
add_action( 'wp_enqueue_scripts', 'gridly_add_scripts' );

// content width
if ( !isset( $content_width ))  {
	$content_width = 710; 
}

 //setup footer widget area
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Footer',
		'id'   => 'gridly_footer',
		'description'   => 'Footer Widget Area',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-copy">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}


// hide blank excerpts 
function gridly_custom_excerpt_length( $length ) {
	return 0;
}
add_filter( 'excerpt_length', 'gridly_custom_excerpt_length', 999 );

function gridly_excerpt_more($more) {
   global $post;
	return '';
}
add_filter('excerpt_more', 'gridly_excerpt_more');



// Gridly theme options 
include_once 'options/admin-menu.php';

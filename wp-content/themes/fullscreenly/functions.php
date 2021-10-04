<?php 
add_action( 'wp_enqueue_scripts', 'fullscreenly_enqueue_styles' );
function fullscreenly_enqueue_styles() {
	wp_enqueue_style( 'fullscreenly-parent-style', get_template_directory_uri() . '/style.css' ); 
} 


require_once( get_stylesheet_directory() . '/inc/custom-header.php' );


function fullscreenly_load_google_fonts() {
	wp_enqueue_style( 'fullscreenly-google-fonts', '//fonts.googleapis.com/css?family=Roboto:900&display=swap' ); 
}
add_action( 'wp_enqueue_scripts', 'fullscreenly_load_google_fonts' ); 

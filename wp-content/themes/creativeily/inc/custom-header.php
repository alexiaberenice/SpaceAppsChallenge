<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package creativeily
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses creativeily_header_style()
 */
function creativeily_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'creativeily_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'flex-height'            => true,
		'default-image'			=> '%s/assets/img/header.jpeg',
		'wp-head-callback'       => 'creativeily_header_style',
		) ) );
	register_default_headers( array(
		'header-bg' => array(
			'url'           => '%s/assets/img/header.jpeg',
			'thumbnail_url' => '%s/assets/img/header.jpeg',
			'description'   => _x( 'Default', 'Default header image', 'creativeily' )
			),	
		) );

}
add_action( 'after_setup_theme', 'creativeily_custom_header_setup' );

if ( ! function_exists( 'creativeily_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see creativeily_custom_header_setup().
	 */
function creativeily_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
			return;
		}

	// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
.image-creativeily-header {
			background: #222 url(<?php header_image(); ?> ) center center no-repeat;
			}
		.header .info h1, .header .meta p {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		<?php if ( ! display_header_text() ) : ?>
		.header .info h1, .header .meta p {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px); 
			display:none;
		}
		<?php endif; ?>

		<?php header_image(); ?>"
		<?php
		if ( ! display_header_text() ) :
			?>
		.header .info h1, .header .meta p {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
			display:none;
		}
		<?php
		else :
			?>
		.header .info h1, .header .meta p {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	
		<?php endif; ?>
		</style>
		<?php
	}
	endif;

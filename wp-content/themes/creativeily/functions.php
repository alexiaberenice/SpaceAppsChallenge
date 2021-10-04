<?php
/**
 * Creativeily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Creativeily
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function creativeily_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/creativeily
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'creativeily' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'creativeily', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'creativeily-featured-image', 2000, 1200, true );

	add_image_size( 'creativeily-featured-image-blogfeed', 1024, 400, true );

	add_image_size( 'creativeily-thumbnail-avatar', 100, 100, true );

	// content width
	if ( ! isset( $content_width ) ) $content_width = 1099;

	$GLOBALS['content_width'] = $content_width;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'creativeily' ),
		) );
	function creativeily_excerpt_more( $more ) {
		return '...'; 
	}   
	add_filter('excerpt_more', 'creativeily_excerpt_more');
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 150,
		'flex-width'  => true,
		'flex-height'  => true,
		) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'style.css') );

}
add_action( 'after_setup_theme', 'creativeily_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creativeily_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'creativeily' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'creativeily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (1)', 'creativeily' ),
		'id'            => 'footerwidget-1',
		'description'   => esc_html__( 'Add widgets here.', 'creativeily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (2)', 'creativeily' ),
		'id'            => 'footerwidget-2',
		'description'   => esc_html__( 'Add widgets here.', 'creativeily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (3)', 'creativeily' ),
		'id'            => 'footerwidget-3',
		'description'   => esc_html__( 'Add widgets here.', 'creativeily' ),
		'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
		) );

}
add_action( 'widgets_init', 'creativeily_widgets_init' );


function creativeily_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'creativeily_pingback_header' );



/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );



/* ---------------------------------------------------------------------------------------------
Fonts
--------------------------------------------------------------------------------------------- */
function creativeily_load_google_fonts() {
	wp_enqueue_style( 'creativeily-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i,900' ); 
}
add_action( 'wp_enqueue_scripts', 'creativeily_load_google_fonts' ); 


/**
 * Implement the Custom Header feature.
 */ 
require get_template_directory() . '/inc/custom-header.php';


/**
 * Enqueue scripts and styles.
 */
function creativeily_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'creativeily-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script('creativeily-script', get_template_directory_uri().'/assets/js/creativeily.js', array( 'jquery' ));
	wp_enqueue_script('creativeily-accessibility-nav', get_template_directory_uri().'/assets/js/accessibility.js', array( 'jquery' ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creativeily_scripts' );




/* customize */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function creativeily_customize_preview_js() {
	wp_enqueue_script( 'creativeily-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'creativeily_customize_preview_js' );


function creativeily_customize_register( $wp_customize ) {
	$wp_customize->get_section('header_image')->title = __( 'Header Options', 'creativeily' );



	// Header options
	$wp_customize->add_setting( 'logo_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'logo_color', array(
		'label'       => __( 'Logo Color', 'creativeily' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'logo_color',
		) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label' => __( 'Header text color', 'creativeily' ),
		'section' => 'header_image',
		) ) ); 
	$wp_customize->add_setting( 'head_bg_color', array(
		'default' => '#222',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_bg_color', array(
		'label' => __( 'Header background color', 'creativeily' ),
		'section' => 'header_image',
		'mime_type' => 'color',
		) ) );

	$wp_customize->add_section( 'header', array(
		'title' => __( 'Header Options', 'creativeily' ),
		'description' => __( 'Header options', 'creativeily' ),
		'priority' => 0,
		'capability' => 'edit_theme_options',
		) );



	// General options
	$wp_customize->add_section( 'design', array(
		'title' => __( 'General Design', 'creativeily' ),
		'description' => __( 'Design options', 'creativeily' ),
		'priority' => 0,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'body_bg_color', array(
		'default' => '#f3f3f3',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg_color', array(
		'label' => __( 'General Background Color', 'creativeily' ),
		'section' => 'design',
		'mime_type' => 'color',
		) ) );

	// Footer
	$wp_customize->add_section( 'footer', array(
		'title' => __( 'Footer Options', 'creativeily' ),
		'priority' => 0,
		'capability' => 'edit_theme_options',
		) );

	$wp_customize->add_setting( 'footer_background', array(
		'default'           => '#171717',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background', array(
		'label'       => __( 'Background Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_background',
		) ) );
	$wp_customize->add_setting( 'footer_headline', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_headline', array(
		'label'       => __( 'Headline Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_headline',
		) ) );
	$wp_customize->add_setting( 'footer_text', array(
		'default'           => '#b9b9b9',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text', array(
		'label'       => __( 'Text Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_text',
		) ) );
	$wp_customize->add_setting( 'footer_link', array(
		'default'           => '#171717',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link', array(
		'label'       => __( 'Link Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_link',
		) ) );

	$wp_customize->add_setting( 'footer_border', array(
		'default'           => '#eee',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border', array(
		'label'       => __( 'Border Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_border',
		) ) );
	$wp_customize->add_setting( 'footer_button_bg', array(
		'default'           => '#00BC87',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_button_bg', array(
		'label'       => __( 'Button Background Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_button_bg',
		) ) );
	$wp_customize->add_setting( 'footer_button_text', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_button_text', array(
		'label'       => __( 'Button Text Color', 'creativeily' ),
		'section'     => 'footer',
		'priority'   => 1, 
		'settings'    => 'footer_button_text',
		) ) );

}
add_action('customize_register','creativeily_customize_register');

include("custom_css.php");





if(! function_exists('creativeily_css_from_customizer_php' ) ):
	function creativeily_css_from_customizer_php(){
		?>

		<style type="text/css">
		.header a.logo, .logo:hover { color: <?php echo esc_attr(get_theme_mod( 'logo_color')); ?>; }

		.has-sidebar #secondary{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_background_color')); ?>; }
		.has-sidebar #secondary h2, .has-sidebar #secondary h1, .has-sidebar #secondary h3, .has-sidebar #secondary h4, .has-sidebar #secondary h5, .has-sidebar #secondary h6, .has-sidebar #secondary th{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_title_color')); ?>; }
		.has-sidebar #secondary p, .has-sidebar #secondary .widget, .has-sidebar #secondary li, .has-sidebar #secondary ol, .has-sidebar #secondary ul,.has-sidebar #secondary dd, .has-sidebar #secondary span, .has-sidebar #secondary  div{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
		.has-sidebar #secondary button.search-submit{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_button_bg_color')); ?>; color:#fff; }
		.has-sidebar #secondary a{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		.has-sidebar #secondary *, .has-sidebar #secondary .widget h2{ border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }

		.blog .wrapmain article, .archive .wrapmain article, .search-results .wrapmain article{ background: <?php echo esc_attr(get_theme_mod( 'blogposts_background')); ?>; }
		.blog .wrapmain article h2, .archive .wrapmain article h2, .search-results .wrapmain article h2,.blog .wrapmain article h2 a, .archive .wrapmain article h2 a, .search-results .wrapmain article h2 a{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_headline')); ?>; }
		.postinfo, .postinfo *{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_meta')); ?>; }
		.blog .wrapmain article .entry-content p, .archive .wrapmain article .entry-content p, .search-results .wrapmain article .entry-content p{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_text')); ?>; }
		a.button.button-readmore{ background: <?php echo esc_attr(get_theme_mod( 'blogposts_button_bg')); ?>; }
		a.button.button-readmore{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_button_text')); ?>; }

		.error404 .content-area, .search-no-results .content-area,.single .wrapmain article, .page .wrapmain article, #commentform{ background: <?php echo esc_attr(get_theme_mod( 'postpages_background')); ?>; }
		#commentform label, h3#reply-title, h2.comments-title, .page .wrapmain article h1, .page .wrapmain article h2, .page .wrapmain article h3, .page .wrapmain article h4, .page .wrapmain article h5, .page .wrapmain article h6, .page .wrapmain article th,.single .wrapmain article h1, .single .wrapmain article h2, .single .wrapmain article h3, .single .wrapmain article h4, .single .wrapmain article h5, .single .wrapmain article h6, .single .wrapmain article th{ color: <?php echo esc_attr(get_theme_mod( 'postpages_headline')); ?>; }
		.error404 .content-area p, .search-no-results .content-area p, .single .wrapmain article, .single .wrapmain article p, .single .wrapmain article dd, .single .wrapmain article li, .single .wrapmain article ul, .single .wrapmain article ol, .single .wrapmain article address, .single .wrapmain article table, .single .wrapmain article th, .single .wrapmain article td, .single .wrapmain article blockquote, .single .wrapmain article span, .single .wrapmain article div .page .wrapmain article, .page .wrapmain article p, .page .wrapmain article dd, .page .wrapmain article li, .page .wrapmain article ul, .page .wrapmain article ol, .page .wrapmain article address, .page .wrapmain article table, .page .wrapmain article th, .page .wrapmain article td, .page .wrapmain article blockquote, .page .wrapmain article span, .page .wrapmain article div{ color: <?php echo esc_attr(get_theme_mod( 'postpages_text')); ?>; }
		.single .wrapmain article a, .page .wrapmain article a{ color: <?php echo esc_attr(get_theme_mod( 'postpages_link')); ?>; }
		.wrapmain .search-submit, .page .wrapmain article a.button, .single .wrapmain article a.button, .nav-links span.button, form#commentform input#submit{ background: <?php echo esc_attr(get_theme_mod( 'postpages_buttons_bg')); ?>; }
		.wrapmain .search-submit, .nav-links span.button, form#commentform input#submit{ color: <?php echo esc_attr(get_theme_mod( 'postpages_buttons_text')); ?>; }
		.page .wrapmain article td,.single .wrapmain article td,.page .wrapmain article th, .single .wrapmain article th,.single .wrapmain article *, .page .wrapmain article *{ border-color: <?php echo esc_attr(get_theme_mod( 'postpages_borders')); ?>; }

		.footer-column-three h3{ color: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
		footer{ background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
		.footer-column-wrapper .widget a{ color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
		.footer-column-wrapper .widget *{ border-color: <?php echo esc_attr(get_theme_mod( 'footer_border')); ?>; }
		.footer-column-wrapper .widget .search-submit{ background: <?php echo esc_attr(get_theme_mod( 'footer_button_bg')); ?>; }
		.footer-column-wrapper .widget .search-submit{ color: <?php echo esc_attr(get_theme_mod( 'footer_button_text')); ?>; }
		.site-info, .site-info *,.footer-column-wrapper .widget, .footer-column-wrapper .widget li, .footer-column-wrapper .widget p, .footer-column-wrapper abbr, .footer-column-wrapper cite, .footer-column-wrapper table caption, .footer-column-wrapper td, .footer-column-wrapper th{ color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }

		<?php if ( get_theme_mod( 'hide_logo' ) == '1' ) : ?>
		.logo, .logo:hover {
			display:none !important;
		}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'hide_navigation' ) == '1' ) : ?>
		.mobile-bar {
			display:none !important;
		}
		<?php endif; ?>

		</style>
		<?php }
		add_action( 'wp_head', 'creativeily_css_from_customizer_php' );
		endif;





if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} 


/**
 * Compare page CSS
 */

function creativeily_comparepage_css($hook) {
	if ( 'appearance_page_creativeily-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'creativeily-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'creativeily_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'creativeily_themepage');
function creativeily_themepage(){
	$theme_info = add_theme_page( __('Creativeily Info','creativeily'), __('Creativeily Info','creativeily'), 'manage_options', 'creativeily-info.php', 'creativeily_info_page' );
}

function creativeily_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap creativeily-add-css">
		<div>
			<h1>
				<?php echo __('Welcome to Creativeily!','creativeily'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("Contact Support", "creativeily"); ?></h3>
						<p><?php echo __("Getting started with a new theme can be difficult, if you have issues with Creativeily then throw us an email.", "creativeily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'creativeily'); ?>" class="button button-primary">
							<?php echo __("Contact Support", "creativeily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("Review Creativeily", "creativeily"); ?></h3>
						<p><?php echo __("Nothing motivates us more than feedback, are you are enjoying Creativeily? We would love to hear what you think!", "creativeily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://wordpress.org/support/theme/creativeily/reviews/', 'creativeily'); ?>" class="button button-primary">
							<?php echo __("Submit A Review", "creativeily"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("Premium Edition", "creativeily"); ?></h3>
						<p><?php echo __("If you enjoy Creativeily and want to take your website to the next step, then check out our premium edition here.", "creativeily"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/creativeily/', 'creativeily'); ?>" class="button button-primary">
							<?php echo __("Read More", "creativeily"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo __("Free Vs Premium","creativeily"); ?></h2>
		<div class="creativeily-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/creativeily/', 'creativeily'); ?>" class="button button-primary">
				<?php echo __("Read Full Description", "creativeily"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/creativeily/', 'creativeily'); ?>" class="button button-primary">
				<?php echo __("View Theme Demo", "creativeily"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo __("Theme Feature", "creativeily"); ?></strong></th>
					<th><strong><?php echo __("Basic Version", "creativeily"); ?></strong></th>
					<th><strong><?php echo __("Premium Version", "creativeily"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo __("Custom Header Color", "creativeily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Navigation Logo Or Text", "creativeily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Hide Header Image Text", "creativeily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Footer Colors", "creativeily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Change Background Color", "creativeily"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>

				<tr>
					<td><?php echo __("Premium Support", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Fully SEO Optimized", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Recent Posts Widget", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Easy Google Fonts", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Optimal Pagespeed", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Optimal SEO", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Footer Copyright Text	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Header Text", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Hide Header Text	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Hide Navigation	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Hide Logo	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom 404 Page Header Image	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Categories Page Header Image	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Default Posts Header Image	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Page Header Image	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Search Results Header Image	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Sidebar Colors	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Blog Feed Colors	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Page Colors	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Posts Colors	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Access All Child Themes	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Importable Demo Content	", "creativeily"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "creativeily"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "creativeily"); ?>" /></span></td>
				</tr>
			</tbody>
		</table>
		<div class="creativeily-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/creativeily/', 'creativeily'); ?>" class="button button-primary">
				<?php echo __("GO PREMIUM", "creativeily"); ?>
			</a>

		</div>

	</div>
	<?php
}



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Creativeily for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/tgmpa/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/tgmpa/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'creativeily_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function creativeily_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'creativeily',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}


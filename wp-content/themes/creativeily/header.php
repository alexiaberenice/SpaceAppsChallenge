<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creativeily
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head> 

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'creativeily' ); ?></a>


<div id="page" class="site<?php if(is_active_sidebar( 'sidebar-1' ) && !is_page()) echo ' has-sidebar'; ?><?php if(is_page()) echo ' creativeily-page'; ?>">
	
	<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

	<div class="site-content-contain" id="start">
		<div id="content" class="site-content">

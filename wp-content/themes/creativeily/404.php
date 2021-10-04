<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Creativeily
 */

get_header(); ?>

<div class="wrapmain">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'creativeily' ); ?></p>

				<?php get_search_form(); ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

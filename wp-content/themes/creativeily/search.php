<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Creativeily
 */

get_header(); ?>

<div class="wrapmain">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/post/content', 'excerpt' );
				get_template_part( 'template-parts/post/content');

			endwhile; // End of the loop.

			$nav = get_the_posts_pagination( array(
				'screen_reader_text' => __( 'A', 'creativeily'),
				'prev_text' => '<span class="button"><span class="dashicons dashicons-arrow-left-alt2"></span></span>',
				'next_text' => '<span class="button"><span class="dashicons dashicons-arrow-right-alt2"></span></span>',
				'before_page_number' => '<span class="button">',
				'afger_page_number' => '</span>',
			) );
			$nav = str_replace('<h2 class="screen-reader-text">A</h2>', '', $nav);
			echo wp_kses($nav, array(
			    'a' => array(
			        'href' => array(),
			        'class' =>array(),
			        'title' => array()
			    ),
			    'h2' => array(
			    		'class' =>array()
			    	),
			    'span' => array(
			    	'class' =>array(),
			    	'aria-current' => array()
			    	),
			    'div' => array(
			    	'class' =>array()
			    	)
			));

		else : ?>

			<div class="entry-header">
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'creativeily' ); ?></p>
			<?php
				get_search_form();

			?></div><?php
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

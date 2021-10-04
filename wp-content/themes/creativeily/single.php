<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Creativeily
 */

get_header(); ?>

<div class="wrapmain">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content');

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				$nav=get_the_post_navigation( array(
					'screen_reader_text' => __( 'A', 'creativeily'),
					'prev_text' => '<span class="button"><span class="dashicons dashicons-arrow-left-alt2"></span>%title</span>',
					'next_text' => '<span class="button">%title<span class="dashicons dashicons-arrow-right-alt2"></span></span>',
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

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

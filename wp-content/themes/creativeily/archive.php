<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Creativeily
 */

get_header(); ?>

<div class="wrapmain">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content');

			endwhile;

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



		else :

			get_template_part( 'template-parts/post/content');

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();

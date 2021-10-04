<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Creativeily
 */

get_header(); ?>

<div class="wrapmain">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php // Show the selected frontpage content.
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/post/content');
				endwhile;
				echo "<div class='post-nav-blog'>";
				echo the_posts_pagination();
				echo "</div>";
				
			else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
			get_template_part( 'template-parts/post/content');
		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
</div>

<?php get_footer();

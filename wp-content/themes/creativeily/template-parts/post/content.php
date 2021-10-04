<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Creativeily
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( !is_single() ) : ?>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-img-box">
		<a href="<?php the_permalink() ?>" class="featured-thumbnail" rel="bookmark">
			<?php esc_html(the_post_thumbnail('creativeily-featured-image-blogfeed')); ?>
		</a>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<header class="entry-header">
		<?php

		$format = get_post_format(get_the_ID());
		if ( false === $format ) {
			$format = '';
		}
		$icon_post="";
		if(is_sticky()) {
			$icon_post='<span class="dashicons dashicons-sticky"></span> ';
		}
		if($format!="") {
			if($format=="link") $format="links";
			$icon_post.='<span class="dashicons dashicons-format-'.$format.'"></span> ';
		}

		if ( !is_single() && !is_page() ) {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.$icon_post, '</a></h2>' );
		}


		if(!is_page()) {

		?>

			<div class="postinfo">

<?php 
		if(!is_single() && !is_page()) {

	//echo $icon_post;

    $time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time = sprintf( $time,
      get_the_date( DATE_W3C ),
      get_the_date(),
      get_the_modified_date( DATE_W3C ),
      get_the_modified_date()
    );

	echo '<span> '.$time.'</span>';
	
	echo '<span> '.get_the_author().'</span>';

	if(has_category()) {
		echo '<span> ';
		the_category(', ');
		echo '</span>';
	}
}

 ?>
</div>

<?php } ?>

	</header><!-- .entry-header -->

	<?php if ( '' !== get_the_post_thumbnail() && 5==4 && ! is_single() && !is_page() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'creativeily-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>


	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */

		if(!is_single() && !is_page())  the_excerpt();
		else the_content( sprintf(
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'creativeily' ),
			get_the_title()
		) );


		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Pages:', 'creativeily' ),
			'after'       => '</div>',
			'link_before' => '<span class="button">',
			'link_after'  => '</span>', 
		) );

		if ( !is_single() && !is_page() ) {

			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" class="button button-readmore"><?php echo esc_html__( 'Read more', 'creativeily' ); ?></a>
			<?php
		}

		?>

<?php 
		if ( is_single() ) {
echo "<div class='single-meta'>";
	//echo $icon_post;

    $time = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time = sprintf( $time,
      get_the_date( DATE_W3C ),
      get_the_date(),
      get_the_modified_date( DATE_W3C ),
      get_the_modified_date()
    );

	echo '<span> '.$time.'</span>';
	
	echo '<span> '.get_the_author().'</span>';

	if(has_category()) {
		echo '<span> ';
		the_category(', ');
		echo '</span>';
	}

	if(has_tag()) {
		echo '<span> ';
		the_tags('');
		echo '</span>';
	}
	echo "</div>";
}
 ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

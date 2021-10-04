<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Creativeily
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				printf( esc_html_e('One Comment', 'creativeily' ), get_the_title() );
			} else {
				printf(
					esc_html(_nx(
						'%1$s Reply',
						'%1$s Replies',
						$comments_number,
						'comments title',
						'creativeily')
					),
					esc_html( number_format_i18n( $comments_number ) ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 50,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => '<span class="dashicons dashicons-edit"></span>' . __( 'Reply', 'creativeily' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<' . '<span class="screen-reader-text">' . __( 'Previous', 'creativeily' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'creativeily' ) . '</span>' . '>',
		) );

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'creativeily' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->

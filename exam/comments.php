<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam
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
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'exam' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'exam' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'exam' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'exam' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'exam' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'exam' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'exam' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'exam' ); ?></p>
	<?php
	endif;

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
			'author' => '<input id="author" type="text" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . __('Name','exam') . '"/>',
			'email'  => '<input id="email" type="email" name="email" placeholder="' . __('Email adress','exam'). '"  value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/>',
			'phone' => '<input id="phone" type="text" name="phone"  placeholder="' . __('Phone number','exam') . '">',
	);
	$comments_args = array(
			'fields'                =>  apply_filters( 'comment_form_default_fields', $fields),
			'comment_field'         => '<textarea id="comment" name="comment" placeholder="' . __('Comment','exam'). '" aria-required="true"></textarea>',
			'title_reply'          =>  '',
			'comment_notes_before'  => '',
			'comment_notes_after'  => '',
			'submit_button'        => '<input data-text="Comment" type="submit" id="%2$s" value="'. __('Submit now','exam') .'"/>',
	);


	function reorder_comment_fields( $fields )
	{
		$new_fields = array();

		$myorder = array('author', 'email', 'phone', 'comment');

		foreach ($myorder as $key) {
			$new_fields[$key] = $fields[$key];
			unset($fields[$key]);
		}

		return $new_fields;
	}

	add_filter('comment_form_fields', 'reorder_comment_fields' );

	comment_form($comments_args);

	?>

</div><!-- #comments -->

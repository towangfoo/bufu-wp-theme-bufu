<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

// whether comment pagination nav should be schown above list of comments
$showCommentPageNavAbove = false;

?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on %1$s', 'bufu-theme' ),
					'<span>&ldquo;' . esc_html(get_the_title()) . '&rdquo;</span>'
				);
            } else {
                printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _n( '%1$s thought on %2$s', '%1$s thoughts on %2$s', $comments_number, 'bufu-theme' ) ),
					esc_html( number_format_i18n( $comments_number ) ),
					'<span>&ldquo;' . esc_html( get_the_title() ) . '&rdquo;</span>'
				);
            }
            ?>
        </h2><!-- .comments-title -->


        <?php if ( $showCommentPageNavAbove &&  get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bufu-theme' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bufu-theme' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bufu-theme' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-above -->
        <?php endif; // Check for comment navigation. ?>

        <ul class="comment-list">
            <?php
            wp_list_comments( array( 'callback' => 'bufu_theme_comment', 'avatar_size' => 50 ));
            ?>
        </ul><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bufu-theme' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bufu-theme' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bufu-theme' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bufu-theme' ); ?></p>
        <?php
    endif; ?>

    <?php comment_form( $args = array(
        'class_container'   => 'comment-respond front-box lightgrey',
        'class_submit'      => 'submit btn btn-primary btn-lg',
        'title_reply'       => __( 'Leave a Reply', 'bufu-theme' ),  // that's the wordpress default value! delete it or edit it ;)
		/* translators: 1: Reply Specific User */
        'title_reply_to'    => __( 'Leave a Reply to %s', 'bufu-theme' ),  // that's the wordpress default value! delete it or edit it ;)
        'cancel_reply_link' => __( 'Cancel Reply', 'bufu-theme' ),  // that's the wordpress default value! delete it or edit it ;)
        'label_submit'      => __( 'Post Comment', 'bufu-theme' ),  // that's the wordpress default value! delete it or edit it ;)

        'comment_field' =>  '<p><textarea placeholder="'. __("Start typing...", 'bufu-theme') .'" id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

        'comment_notes_after' => '<p class="form-allowed-tags">' .
            __( 'You may use some HTML tags and attributes.', 'bufu-theme' ) .
            '<button type="button" class="btn btn-link btn-sm" data-toggle="collapse" data-target="#collapseAllowedHtml" aria-expanded="false" aria-controls="collapseAllowedHtml">'. __('Show', 'bufu-theme') .'</button>' .
            '</p><div class="collapse" id="collapseAllowedHtml"><div class="card card-body card-allowed-tags"><code>' . allowed_tags() . '</code></div></div>'

        // So, that was the needed stuff to have bootstrap basic styles for the form elements and buttons

        // Basically you can edit everything here!
        // Checkout the docs for more: http://codex.wordpress.org/Function_Reference/comment_form
        // Another note: some classes are added in the bootstrap-wp.js - ckeck from line 1

    ));

	?>

</div><!-- #comments -->

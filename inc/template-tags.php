<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package BuschFunk
 */

if ( ! function_exists( 'bufu_theme_no_thumbnail' ) ) :
	/**
     * Returns a HTML snippet for a no-thumbnail placeholder
	 * @param string|null $label
     * @return string
	 */
    function bufu_theme_no_thumbnail( $label = null ) {
        if ( empty($label)) {
            $label = __("No image", 'bufu-theme');
        }
        return "<span class=\"no-thumbnail-available\"><span>{$label}</span></span>";
	}
endif;

if ( ! function_exists( 'bufu_theme_posted_on' ) ) :
	/**
     * Prints HTML with meta information for the current post-date/time and author.
	 * @param WP_Post|null $post
	 * @param bool $showByLine
     * @return void
	 */
	function bufu_theme_posted_on(WP_Post $post = null, $showByLine = false ) {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U', $post ) !== get_the_modified_time( 'U', $post ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c', $post ) ),
            esc_html( get_the_date( '', $post ) )
        );

        echo '<span class="posted-on">' . $time_string . '</span>';

        if ($showByLine) {
            $byline = sprintf(
                esc_html_x('by %s', 'post author', 'bufu-theme'),
                '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
            );
            echo '<span class="byline"> ' . $byline . '</span>';
        }

//      if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
//          echo ' | <span class="comments-link"><i class="fa fa-comments" aria-hidden="true"></i> ';
//          /* translators: %s: post title */
//          comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bufu-theme' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
//          echo '</span>';
//      }
    }
endif;


if ( ! function_exists( 'bufu_theme_edit_post_link' ) ) :
    /**
     * Renders edit link, for when the client is allowed to edit a post.
     * @param WP_Post|null $post
     * @param array $btnClasses
     * @param array $btnAttrs
     * @param string|null $btnText
     * @param bool $echo
     * @return string|void
     */
    function bufu_theme_edit_post_link(WP_Post $post = null, $btnClasses = [], $btnAttrs = [], $btnText = null, $echo = true) {
        if ( $post === null ) {
            $post = get_post();
        }

        if ( !$post ) {
            return; // silence
        }

        $editLink = get_edit_post_link( $post->ID );

        if (!$editLink) {
            return; // silence
        }

        $btnClasses = array_merge(['btn', 'btn-link'], $btnClasses);
        if ( !$btnText ) {
            $btnText = __("Edit", 'bufu-theme');
        }

        $attrs = join(' ', $btnAttrs);

        $html = '<a href="'. $editLink .'" class="'. join(' ', $btnClasses) .'" '. $attrs .'>'. $btnText .'</a>';

       if ($echo) {
           echo $html;
       }
       else {
           return $html;
       }
    }
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wp_bootstrap_starter_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wp_bootstrap_starter_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wp_bootstrap_starter_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wp_bootstrap_starter_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wp_bootstrap_starter_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wp_bootstrap_starter_categorized_blog.
 */
function wp_bootstrap_starter_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wp_bootstrap_starter_categories' );
}
add_action( 'edit_category', 'wp_bootstrap_starter_category_transient_flusher' );
add_action( 'save_post',     'wp_bootstrap_starter_category_transient_flusher' );


if ( ! function_exists( 'bufu_theme_comment' ) ) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function bufu_theme_comment( $comment, $args, $depth ) {
       // $GLOBALS['comment'] = $comment;

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
            <div class="comment-body">
                <?php _e( 'Pingback:', 'bufu-theme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'bufu-theme' ), '<span class="edit-link">', '</span>' ); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </a>

                <div class="media-body">
                    <div class="media-body-wrap card">

                        <div class="card-header">
                            <h5 class="mt-0"><?php printf( __( '%s <span class="says">says:</span>', 'bufu-theme' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'bufu-theme' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span>' . __( 'Edit', 'bufu-theme' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bufu-theme' ); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div><!-- .comment-content -->

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' 	=> $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' 	=> '<footer class="reply comment-reply card-footer">',
                                    'after' 	=> '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>

                    </div>
                </div><!-- .media-body -->

            </article><!-- .comment-body -->

            <?php
        endif;
    }
endif; // ends check for bufu_theme_comment()

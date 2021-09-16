<?php
/**
 * Template part for displaying a single review.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post
 */

/** @var $artist WP_Post */
$artist = $post->bufu_artist;

$thumbnailHtml = get_the_post_thumbnail( $artist, 'medium', ['class' => 'w-100'] );
$hasThumbnail = $thumbnailHtml !== '';

$source = get_post_meta( $post->ID, '_bufu_artist_review_source', true);
$author = get_post_meta( $post->ID, '_bufu_artist_review_author', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-md-4">
        <?php
            if ($hasThumbnail) :
                echo $thumbnailHtml;
            else :
                echo bufu_theme_no_thumbnail(__("No image", 'bufu-theme'));
            endif;
        ?>

            <div class="mt-3 mb-5">
                <a href="<?php echo get_permalink( $artist ) ?>" class="btn btn-default btn-pill btn-sm no-uppercase no-nowrap"><?php echo sprintf(__("Artist portrait of %s", 'bufu-theme'), esc_html($artist->post_title)) ?></a>
            </div>

        </div>
        <div class="col-md-8">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo get_the_title() ?></h1>
                <p class="album-meta"><?php if (!empty($author)) echo sprintf(__('by %s'), esc_html($author)) . ', ' ?><?php if (!empty($source)) echo esc_html($source) ?></p>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php the_content(); ?>

                <div class="mt-5 mb-5">
                    <a href="<?php echo get_permalink( $artist ) ?>" class="btn btn-default btn-pill">« <?php echo sprintf(__("Back to artist portrait of %s", 'bufu-theme'), esc_html($artist->post_title)) ?></a>
                </div>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bufu-theme' ),
                    'after'  => '</div>',
                ) );
                ?>

            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-## -->
<?php
/**
 * Template part for displaying a single album.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post
 */

$hasThumbnail = get_the_post_thumbnail( null, 'medium', ['class' => 'w-100'] ) !== '';

/** @var $artist WP_Post */
$artist = $post->bufu_artist;

$shopUrl      = get_post_meta( $post->ID, '_bufu_artist_shopUrl', true);
$label        = get_post_meta( $post->ID, '_bufu_artist_albumLabel', true);
$releaseDate  = get_post_meta( $post->ID, '_bufu_artist_albumRelease', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-md-4">
        <?php
            if ($hasThumbnail) :
                the_post_thumbnail( 'medium', ['class' => 'w-100'] );
            else :
                echo bufu_theme_no_thumbnail(__("No album cover", 'bufu-theme'));
            endif;
        ?>
			<?php if (!empty($shopUrl)) : ?>
                <div class="mt-3 mb-5">
                    <a href="<?php echo esc_url( $shopUrl ) ?>" target="_blank" class="btn btn-primary btn-pill" data-external><?php echo __("Visit in shop", 'bufu-theme') ?></a>
                </div>
			<?php endif; ?>
        </div>
        <div class="col-md-8">
            <header class="entry-header">
                <h1 class="entry-title"><?php echo $artist->post_title ?>: <?php echo get_the_title() ?></h1>
                <p class="album-meta"><?php if (!empty($label)) echo trim($label) . "," ?> <?php echo $releaseDate ?></p>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bufu-theme' ),
                    'after'  => '</div>',
                ) );
                ?>
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
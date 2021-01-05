<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */


$post = get_post();

$postType  = $post->post_type;
$postTitle = $post->post_title;
$permalink = get_permalink( $post );

/** @var $artist WP_Post */
$artist = $post->bufu_artist;

$hasThumbnail = get_the_post_thumbnail( null, 'thumbnail' ) !== '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
    <?php if ($hasThumbnail) : ?>
        <div class="col-md-3">
            <a href="<?php echo esc_url( $permalink ) ?>" rel="bookmark" title="<?php echo esc_attr( $postTitle ) ?>">
				<?php the_post_thumbnail( 'thumbnail', ['class' => 'w-100'] ); ?>
            </a>
        </div>
        <div class="col-md-9">
    <?php else : ?>
        <div class="col-md-12">
    <?php endif; ?>
            <header class="entry-header">
				<?php if ( 'post' === $postType ) : ?>
                    <div class="entry-meta">
						<?php bufu_theme_posted_on(); ?>
                    </div><!-- .entry-meta -->
				<?php endif; ?>

				<?php if ( 'bufu_album' === $postType ) : ?>
                    <div class="entry-meta">
                        <?php echo _n('Album', "Albums", 1, 'bufu-theme') ?>
                    </div>
				<?php endif; ?>

				<?php if ( 'bufu_artist' === $postType ) : ?>
                    <div class="entry-meta">
						<?php echo _n('Artist', "Artists", 1, 'bufu-theme') ?>
                    </div>
				<?php endif; ?>

                <h2 class="entry-title">
                    <a href="<?php echo esc_url( $permalink ) ?>" rel="bookmark">
						<?php echo $postTitle ?>
                    </a>
                </h2>
                <?php if ( 'bufu_album' === $postType && $artist ) : ?>
                    <h3><?php echo esc_html($artist->post_title) ?></h3>
                <?php endif; ?>
            </header>

            <div class="entry-content">
                <?php if ( 'bufu_album' === $postType ) :
					$label        = get_post_meta( $post->ID, '_bufu_artist_albumLabel', true);
					$releaseDate  = get_post_meta( $post->ID, '_bufu_artist_albumRelease', true);
                ?>
                    <p class="album-meta"><?php if (!empty($label)) echo trim($label) . "," ?> <?php echo $releaseDate ?></p>
                <?php else : ?>
				    <?php the_excerpt(); ?>
                <?php endif; ?>
            </div>
            <footer class="entry-footer">
                <a href="<?php echo esc_url( $permalink ) ?>" title="<?php echo esc_attr( $postTitle ) ?>" class="btn btn-default btn-pill"><?php echo __('Show', 'bufu-theme') ?></span></a>
				<?php if ( 'bufu_album' === $postType ) :
				    $shopUrl = get_post_meta( $post->ID, '_bufu_artist_shopUrl', true);
				    if ($shopUrl) {
				?>
                    <a href="<?php echo esc_url( $shopUrl ) ?>" target="_blank" class="btn btn-default btn-pill" data-external><?php echo __("Visit in shop", 'bufu-theme') ?></a>
				<?php } endif; ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article>

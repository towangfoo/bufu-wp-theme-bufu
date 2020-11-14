<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

$postTitle = get_the_title();
$permalink = get_permalink();

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
				<?php if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
						<?php bufu_theme_posted_on(); ?>
                    </div><!-- .entry-meta -->
				<?php endif; ?>

                <h2 class="entry-title">
                    <a href="<?php echo esc_url( $permalink ) ?>" rel="bookmark">
						<?php echo $postTitle ?>
                    </a>
                </h2>
            </header>

            <div class="entry-content">
				<?php the_excerpt(); ?>
            </div>
            <footer class="entry-footer">
                <a href="<?php echo esc_url( $permalink ) ?>" title="<?php echo esc_attr( $postTitle ) ?>" class="btn btn-icon-left"><span class="icon">&raquo;</span> <?php echo __('Show', 'bufu-theme') ?></span></a>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article>

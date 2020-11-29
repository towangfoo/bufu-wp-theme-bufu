<?php
/**
 * Template part for displaying artist list item
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

$artistName = get_the_title();
$permalink  = get_permalink();
$thumbnail  = get_the_post_thumbnail(null, 'thumbnail', ['class' => 'w-100'] );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-md-3">
            <?php if ($thumbnail) : ?>
            <a href="<?php echo esc_url( $permalink ) ?>" rel="bookmark" title="<?php echo sprintf(__("Show profile of %s", 'bufu-theme'), $artistName) ?>">
                <?php echo $thumbnail ?>
            </a>
            <?php else : ?>
                <?php echo bufu_theme_no_thumbnail(__("No image", 'bufu-theme')) ?>
            <?php endif;?>
        </div>
        <div class="col-md-9">
            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php echo esc_url( $permalink ) ?>" rel="bookmark" title="<?php echo sprintf(__("Show profile of %s", 'bufu-theme'), $artistName ) ?>">
                        <?php echo $artistName ?>
                    </a>
                </h2>
            </header>
            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div>
            <footer class="entry-footer">
                <a href="<?php echo esc_url( $permalink ) ?>" title="<?php echo sprintf(__("Show profile of %s", 'bufu-theme'), $artistName ) ?>" class="btn btn-icon-left"><span class="icon">&raquo;</span> <?php echo __('Go to artist profile', 'bufu-theme') ?></span></a>
                <?php bufu_theme_edit_post_link() ?>
            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-## -->

<?php
/**
 * Template part for displaying a single post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

$hasThumbnail = get_the_post_thumbnail( null, 'medium', ['class' => 'w-100'] ) !== '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
    <?php if ($hasThumbnail) : ?>
        <div class="col-md-4">
				<?php the_post_thumbnail( 'medium', ['class' => 'w-100'] ); ?>
        </div>
        <div class="col-md-8">
    <?php else : ?>
        <div class="col-md-12">
    <?php endif; ?>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
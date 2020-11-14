<?php
/**
 * Template part for displaying a single artist profile
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post
 */

$profileImg = get_post_meta( $post->ID, '_bufu_artist_stageImage', true);
$website    = get_post_meta( $post->ID, '_bufu_artist_website', true);

$profileImgHeight = 480;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'artist-profile' ); ?>>
	<header class="entry-header">
        <div class="img-centered-absolutely" style="height: <?php echo $profileImgHeight ?>px">
            <img class="d-block w-100" src="<?php echo $profileImg ?>" alt="<?php the_title() ?>">
        </div>
        <div class="overlay">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php if ($website) : ?>
                <div class="website">
                    <a href="<?php echo $website ?>" target="_blank" data-external><?php echo __('Go to artist website', 'bufu-theme') ?></a>
                </div>
            <?php endif; ?>
        </div>
	</header>

    <div class="row">
        <div class="col-lg-8">
            <h2 class="second-title"><?php echo sprintf(__("About %s", 'bufu-theme'), get_the_title()); ?></h2>
            <div class="entry-content">
				<?php the_content(); ?>
            </div>
            <footer class="entry-footer">
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pages-label">' . esc_html__( 'Pages:', 'bufu-theme' ) . '</span>',
					'after'  => '</div>',
				) );
				?>
            </footer>

            <div style="margin: 2rem 0; padding: 6rem 0; background-color: #b9d0f8; color: #0A246A; font-weight: 700; font-size: 2rem; text-align: center">
                @TODO: Infoboxen hier:<br />
                - Besetzung/Diskografie <br />
                - Interviews <br />
                - Featured Products
            </div>
        </div>
        <aside class="col-lg-4" role="complementary">
            <?php if ( is_active_sidebar( 'sidebar-3' ) )  : ?>
            <div class="widget-area sidebar" id="secondary">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>
            <?php endif; ?>
        </aside>
    </div>
</article>
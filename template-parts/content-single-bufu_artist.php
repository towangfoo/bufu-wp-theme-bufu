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

            <?php
                $albums = bufu_artists()->loadAlbumsOfArtist($post->ID, 'release');
                if (count($albums) > 0) :

            ?>
            <div class="discography mt-5 mb-5">
                <h2 class="second-title"><?php echo __("Discography", 'bufu-theme') ?></h2>
                <?php foreach ($albums as $album) :
					$albumUrl     = get_permalink($album);
                    $shopUrl      = get_post_meta( $album->ID, '_bufu_artist_shopUrl', true);
					$label        = get_post_meta( $album->ID, '_bufu_artist_albumLabel', true);
					$releaseDate  = get_post_meta( $album->ID, '_bufu_artist_albumRelease', true);
                    $thumbnail    = get_the_post_thumbnail($album, 'thumbnail', ['class' => 'w-100'] );
					?>
                    <article class="album" id="post-<?php $album->ID; ?>">
                        <div class="row">
                            <div class="col-3">
                                <a href="<?php echo esc_url( $albumUrl ) ?>" rel="bookmark">
                                <?php
                                    if ($thumbnail) :
                                        echo $thumbnail;
                                    else :
                                        echo bufu_theme_no_thumbnail();
                                    endif;
                                ?>
                                </a>
                            </div>
                            <div class="col-9">
                                <header class="album-header">
                                    <h3 class="album-title"><?php echo $album->post_title ?></h3>
                                    <p class="album-meta"><?php if (!empty($label)) echo trim($label) . "," ?> <?php echo $releaseDate ?></p>
                                    <a href="<?php echo esc_url( $albumUrl ) ?>" class="btn btn-default btn-pill"><?php echo __("Details", 'bufu-theme') ?></a>
                                <?php if (!empty($shopUrl)) : ?>
                                    <a href="<?php echo esc_url( $shopUrl ) ?>" target="_blank" class="btn btn-primary btn-pill" data-external><?php echo __("Visit in shop", 'bufu-theme') ?></a>
                                <?php endif; ?>
                                </header>
                            </div>
                        </div>
                    </article><!-- #post-## -->
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
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
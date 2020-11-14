<?php
/**
 * The template for displaying the front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post
 *
 */

$headline = get_theme_mod( 'header_banner_title_setting' );
$tagline  = get_theme_mod( 'header_banner_tagline_setting' );

$frontPageContent = get_the_content();

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

            <?php if ( !empty($headline) ) : ?>
            <div class="container visually-hidden">
                <h1 class="screen-reader-text"><?php echo $headline ?></h1>
	            <?php if ( !empty($headline) ) : ?>
                <p class="screen-reader-text"><?php echo $tagline ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php get_template_part( 'front-page/header-links' ); ?>

            <?php if ( $frontPageContent ) : ?>
            <div class="front-box front-page-text mt-5 mb-6">
				<?php echo $frontPageContent; ?>
				<?php bufu_theme_edit_post_link(); ?>
            </div>
            <?php endif;?>

			<?php get_template_part( 'front-page/shop-links' ); ?>

			<?php get_template_part( 'front-page/next-concerts' ); ?>

			<?php get_template_part( 'front-page/newsletter' ); ?>

			<?php get_template_part( 'front-page/featured-artists' ); ?>

            <?php get_template_part( 'front-page/last-posts' ); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

global $post;

// @FIXME hardcoded page slug
$postNameChronicles = 'kalenderblaetter';

$isChronicles = false;
if ( $post->post_name === $postNameChronicles ) {
    $isChronicles = true;
}
else if ( !empty( $post->post_parent ) && $post->post_parent !== $post->ID) {
    // check ancestors as well
    foreach (get_post_ancestors( $post ) as $aId ) {
        $aPost = get_post( $aId );
        if ($aPost->post_name === $postNameChronicles) {
            $isChronicles = true;
            break;
        }
    }
}

// determine which sidebar to load
$sidebarSlug = ($isChronicles) ? 'sidebar-chronicles' : '';

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar(null, [ 'slug' => $sidebarSlug ] );
get_footer();

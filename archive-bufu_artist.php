<?php
/**
 * The template for displaying list of artists
 *
 * @package BuschFunk
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
                <h1 class="page-title"><?php echo _n('Artist', 'Artists', 2, 'bufu-theme') ?></h1>
			</header><!-- .page-header -->

            <div class="list-posts">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

			    if ( is_single() ) {
					get_template_part( 'template-parts/content-single-bufu_artist' );
                }
                else {
					get_template_part( 'template-parts/content-list-bufu_artist' );
                }

			endwhile;

			?>
            </div>

            <?php

			get_template_part( 'pagination' );

		else :

			get_template_part( 'template-parts/content-none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar( 'artists' );
get_footer();

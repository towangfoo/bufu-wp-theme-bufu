<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title() ?></h1>
                </header><!-- .page-header -->

                <div class="list-posts">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						if ( is_single() ) {
							get_template_part( 'template-parts/content-single', get_post_format() );
						}
						else {
							get_template_part( 'template-parts/content-list', get_post_format() );
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
get_sidebar();
get_footer();

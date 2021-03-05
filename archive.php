<?php
/**
 * Display archive pages for default post types
 *
 * @package BuschFunk
 */

get_header(); ?>

    <section id="primary" class="content-area col-sm-12 col-md-12 col-lg-8">
        <main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
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

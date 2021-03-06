<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BuschFunk
 */

// check if the scope is artists or standard
$artistScope = (get_query_var('post_type') === 'bufu_artist');

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-8">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title page-title-sm">
                    <?php if ($artistScope) :?>
						<?php printf( esc_html__( 'Search Results for: "%s" in Artists', 'bufu-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
                    <?php else : ?>
                        <?php printf( esc_html__( 'Search Results for: "%s"', 'bufu-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
                    <?php endif; ?>
                </h1>
			</header><!-- .page-header -->

            <div class="list-posts search-results">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			?>

            </div>

            <?php
			get_template_part( 'pagination' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar( $artistScope ? 'artists' : null );
get_footer();

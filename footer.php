<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuschFunk
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer mt-2" role="contentinfo">
		<div class="container pt-3 pb-3">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
					<?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
					<?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
					<?php endif; ?>

                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footer-nav" aria-controls="" aria-expanded="false" aria-label="Toggle footer navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

				<?php
				wp_nav_menu(array(
					'theme_location'    => 'footer',
					'container'       => 'div',
					'container_id'    => 'footer-nav',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_id'         => false,
					'menu_class'      => 'navbar-nav',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
				));
				?>

            </nav>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
<?php
/**
 * The sidebar for the artists list page
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuschFunk
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside class="col-sm-12 col-lg-4" role="complementary">
    <div class="widget-area sidebar" id="secondary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div><!-- #secondary -->
</aside>

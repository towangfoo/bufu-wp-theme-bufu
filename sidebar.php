<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuschFunk
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="col-sm-12 col-lg-4" role="complementary">
    <div class="widget-area sidebar" id="secondary">
	    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div><!-- #secondary -->
</aside>

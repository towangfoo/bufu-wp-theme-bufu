<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuschFunk
 */

$slug = ( isset($args['slug']) && !empty($args['slug']) ) ? $args['slug'] : 'sidebar-1';

if ( ! is_active_sidebar( $slug ) ) {
	return;
}
?>

<aside class="col-sm-12 col-lg-4" role="complementary">
    <div class="widget-area sidebar" id="secondary">
	    <?php dynamic_sidebar( $slug ); ?>
    </div>
</aside>

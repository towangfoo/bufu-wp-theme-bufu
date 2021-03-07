<?php
/**
 * Show newsletter signup, with mailorder catalogue via shortcode.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

?>

<div class="front-newsletter mt-6 mb-6" id="newsletter-signup">
	<div class="row">
		<div class="col-lg-8 newsletter-container">
			<h2><?php echo __("Newsletter", 'bufu-theme') ?></h2>
			<p><?php echo __("Subscribe to our newsletter and stay up to date about upcoming concerts, new products and more information around the BuschFunk.", 'bufu-theme') ?></p>

			<?php echo do_shortcode('[bufu_newsletter_signup]') ?>
		</div>
		<div class="col-lg-4 text-center mailorder-container">
			<?php echo do_shortcode('[bufu_mailorder]') ?>
			<?php /*
			<img width="300" src="<?php echo get_theme_file_uri('inc/assets/img/buschfunk30_sticker.jpg') ?>" alt="<?php echo __("30 years of BuschFunk", 'bufu-theme') ?>">
            */ ?>
		</div>
	</div>
</div>
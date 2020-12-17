<?php
/**
 * Newsletter signup form.
 *
 * @package BuschFunk
 *
 */

?>

<div class="front-newsletter mt-6 mb-6" id="newsletter-signup">
	<div class="row">
		<div class="col-md-8 newsletter-container">
			<h2><?php echo __("Newsletter", 'bufu-theme') ?></h2>
			<p><?php echo __("Subscribe to our newsletter and stay up to date about upcoming concerts, new products and more information around the BuschFunk.", 'bufu-theme') ?></p>

			<div class="newsletter-signup-form">
				<?php bufu_rapidmail()->echoSignupForm([
					'submit_button_label' => __('Sign up', 'bufu-theme'),
					'container_id'        => 'newsletter-signup',
				]) ?>
			</div>
		</div>
		<div class="col-md-4 pt-4 pb-4 text-center">
			<img width="300" src="<?php echo get_theme_file_uri('inc/assets/img/buschfunk30_sticker.jpg') ?>" alt="<?php echo __("30 years of BuschFunk", 'bufu-theme') ?>">
		</div>
	</div>
</div>
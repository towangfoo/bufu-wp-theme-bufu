<?php
/**
 * Show newsletter signup.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

?>

<div class="front-newsletter mt-6 mb-6">
    <div class="row">
        <div class="col-md-8 newsletter-container">
            <h2><?php echo __("Newsletter", 'bufu-theme') ?></h2>
            <p><?php echo __("Subscribe to our newsletter and stay up to date about upcoming concerts, new products and more information around the BuschFunk.", 'bufu-theme') ?></p>

            <div style="padding: 2rem 0; background-color: #b9d0f8; color: #0A246A; font-weight: 700; font-size: 1.3rem; text-align: center">
                @TODO: Newsletter Signup Formular
            </div>
        </div>
        <div class="col-md-4 pt-4 pb-4 text-center">
            <img width="300" src="<?php echo get_theme_file_uri('inc/assets/img/buschfunk30_sticker.jpg') ?>" alt="<?php echo __("30 years of BuschFunk", 'bufu-theme') ?>">
        </div>
    </div>
</div>
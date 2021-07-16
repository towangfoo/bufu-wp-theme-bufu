<?php
/**
 * Newsletter sidebar element.
 * Show an image and link to signuo form
 *
 * @package BuschFunk
 *
 */

?>
 <div class="sc-newsletter-sidebar">
    <a href="/kontakt/#newsletter-bestellen">
        <img src="<?php echo get_theme_file_uri('inc/assets/img/newsletter.jpg') ?>" alt="<?php _e("Newsletter - BuschFunk posts", 'bufu-theme') ?>">
        <span class="ribbon"><?php _e("Subscribe to our newsletter", 'bufu-theme') ?></span>
    </a>
</div>
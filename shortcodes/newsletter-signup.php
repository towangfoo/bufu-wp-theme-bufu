<?php
/**
 * Newsletter signup form.
 * Also adds in the shortcode for the mailorder catalogue.
 *
 * @package BuschFunk
 *
 */

?>
 <div class="sc-newsletter-signup-form">
    <?php bufu_rapidmail()->echoSignupForm([
        'submit_button_label' => __('Sign up', 'bufu-theme'),
        'container_id'        => 'newsletter-signup',
    ]) ?>
</div>
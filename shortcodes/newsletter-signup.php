<?php
/**
 * Newsletter signup form.
 * Also adds in the shortcode for the mailorder catalogue.
 *
 * @package BuschFunk
 *
 * @var $args array
 */

?>
 <div class="sc-newsletter-signup-form">
    <?php bufu_rapidmail()->echoSignupForm([
        'submit_button_label' => __('Sign up', 'bufu-theme'),
        'container_id'        => 'newsletter-bestellen',
        'show_interest2'      => (is_array($args) && in_array('no-interest2', $args)) ? false : true
    ]) ?>
</div>
<?php
/**
 * View: List Single Event - Show links and social
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 4.9.9
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 */

/** @var $artist WP_Post */
$artist = $event->bufu_artist;

?>
<div class="tribe-events-c-small-cta tribe-events-calendar-list__event-links">
    <a href="<?php echo esc_url( $event->permalink ); ?>" class="btn btn-default btn-sm btn-pill"><?php echo __('Details', 'bufu-theme'); ?></a>
    <?php if ($artist) : ?>
	    <a href="<?php echo $artist->permalink ?>" class="btn btn-default btn-sm btn-pill"><?php echo __("More about the artist", 'bufu-theme') ?></a>
    <?php endif; ?>
	<?php bufu_theme_edit_post_link( $post ); ?>
</div>

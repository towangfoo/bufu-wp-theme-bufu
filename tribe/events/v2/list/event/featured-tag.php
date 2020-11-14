<?php
/**
 * View: List View - Single Event Featured Tag
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

if ( !$event->featured ) {
    return;
}
?>
<span class="badge badge-pill badge-secondary"><?php echo __("Recommended", 'bufu-theme') ?></span>

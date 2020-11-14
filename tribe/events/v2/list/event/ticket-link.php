<?php
/**
 * View: List Single Event - Show link to get ticket
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
$ticketUrl = tribe_get_event_website_url( $event );

if ( !$ticketUrl ) {
	return;
}
?>
<div class="tribe-events-c-small-cta tribe-events-calendar-list__event-tickets text-right">
	<a href="<?php echo $ticketUrl ?>" target="_blank"><?php echo __("Order tickets", 'bufu-theme') ?></a>
</div>

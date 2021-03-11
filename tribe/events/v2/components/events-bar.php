<?php
/**
 * View: Events Bar
 *
 * For some reason, the div must be there in order for the filter-bar to be added
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.2.0
 *
 * @var bool $display_events_bar   Boolean on whether to display the events bar.
 * @var bool $disable_event_search Boolean on whether to disable the event search.
 */

if ( empty( $display_events_bar ) ) {
	return;
}

$heading = __('Filter events', 'bufu-theme');

$classes = [ 'tribe-events-header__events-bar', 'tribe-events-c-events-bar' ];

?>

<div <?php tribe_classes( $classes ); ?> data-js="tribe-events-events-bar">
	<?php $this->template( 'list/top-bar/datepicker' ); ?>
</div>
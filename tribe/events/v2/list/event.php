<?php
/**
 * View: List Event
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event.php
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

$container_classes = [ 'row', 'tribe-events-calendar-list__event-row', 'mt-4', 'mb-4' ];
$container_classes['tribe-events-calendar-list__event-row--featured'] = $event->featured;

$event_classes = tribe_get_post_class( [ 'tribe-events-calendar-list__event' ], $event->ID );
?>
<div <?php tribe_classes( $container_classes ); ?>>

    <div class="col-12 col-sm-4 col-lg-3 tribe-events-calendar-list__event-date">
		<?php $this->template( 'list/event/date', [ 'event' => $event ] ); ?>
		<?php $this->template( 'list/event/ticket-link', [ 'event' => $event ] ); ?>
    </div>

    <div class="col-12 col-sm-8 col-lg-9 tribe-events-calendar-list__event-info">
		<article <?php tribe_classes( $event_classes ) ?>>
			<?php $this->template( 'list/event/featured-tag', [ 'event' => $event ] ); ?>
			<?php $this->template( 'list/event/venue-tag', [ 'event' => $event ] ); ?>

			<div class="tribe-events-calendar-list__event-details">
				<header class="tribe-events-calendar-list__event-header">
					<?php $this->template( 'list/event/title', [ 'event' => $event ] ); ?>
				</header>

				<?php $this->template( 'list/event/links', [ 'event' => $event ] ); ?>
			</div>
		</article>
	</div>
</div>

<?php
/**
 * View: List View - Single Event Title
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/title.php
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

/** @var $artist WP_Post */
$artist = $event->bufu_artist;

?>

<?php if ($artist) : ?>
<h2 class="tribe-events-calendar-list__event-artist"><?php echo $artist->post_title ?></h2>
<?php endif; ?>
<h3 class="tribe-events-calendar-list__event-title">
	<a
		href="<?php echo esc_url( $event->permalink ); ?>"
		title="<?php echo esc_attr( $event->title ); ?>"
		rel="bookmark"
		class="tribe-events-calendar-list__event-title-link tribe-common-anchor-thin"
	>
		<?php
		// phpcs:ignore
		echo $event->title;
		?>
	</a>
</h3>

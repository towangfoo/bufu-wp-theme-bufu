<?php
/**
 * Show next upcoming concerts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post
 */

// how many concerts should be shown
$numConcerts = 5;

/** @var $events WP_Post[] */
$events = bufu_artists()->loadNextConcerts(null, $numConcerts);

if (count($events) < 1) {
	return;
}
?>

<div class="row mt-6 mb-4">
	<div class="col-md-4">
		<h2 class="front-page section-title"><?php echo __('Concert dates', 'bufu-theme') ?></h2>
	</div>
	<div class="col-md-8 text-right">
		<div style="padding: 1rem 0; background-color: #b9d0f8; color: #0A246A; font-weight: 700; font-size: 1rem; text-align: center">
			@TODO: Filter
		</div>
	</div>
</div>

<div class="tribe-common tribe-events">
	<?php foreach ( $events as $event ) : ?>
		<?php get_template_part( 'tribe/events/v2/list/event-flat', null, ['event' => $event] ); ?>
	<?php endforeach; ?>
</div>

<div class="mt-4 mb-6 text-center">
    <a href="/events" class="btn btn-icon-left"><span class="icon">&raquo;</span> <?php echo __('All concerts', 'bufu-theme') ?></a>
</div>


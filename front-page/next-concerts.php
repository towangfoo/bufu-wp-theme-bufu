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

// only show concerts with this category
// @FIXME hardcoded
$categoryTagSlug = 'buschfunk-praesentiert';

/** @var $events WP_Post[] */
$events = bufu_artists()->loadNextConcerts(null, $numConcerts, null, $categoryTagSlug);

if (count($events) < 1) {
	return;
}
?>

<div class="mt-6 mb-4">
    <h2 class="front-page section-title"><?php echo __('Concert dates', 'bufu-theme') ?></h2>
</div>

<div class="tribe-common tribe-events">
	<?php foreach ( $events as $event ) : ?>
		<?php get_template_part( 'tribe/events/v2/list/event-flat', null, ['event' => $event] ); ?>
	<?php endforeach; ?>
</div>

<div class="mt-4 mb-6 text-center">
    <a href="/events/" class="btn btn-icon-left"><span class="icon">&raquo;</span> <?php echo __('All concerts', 'bufu-theme') ?></a>
</div>


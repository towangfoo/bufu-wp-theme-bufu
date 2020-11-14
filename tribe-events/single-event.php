<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

/** @var $event WP_Post */
$event = get_post();

$event_id = get_the_ID();

/** @var $artist WP_Post */
$artist = $event->bufu_artist;

$venueObject = tribe_get_venue_object();
$venueCity = $venueObject->city;

$image = tribe_event_featured_image( $event_id, 'full', false );
if ( !$image && $artist ) {
    $image = get_the_post_thumbnail( $artist, 'thumbnail', ['class' => 'w-100'] );
}

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a class="btn btn-default btn-pill" href="<?php echo esc_url( tribe_get_events_link() ); ?>">&laquo; <?php _e('Back to list', 'bufu-artists') ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

    <div class="row event-header">
        <?php if ($image) : ?>
        <div class="d-none d-md-block col-md-3 event-header-left">
            <div class="artist-thumbnail-container">
			    <?php echo $image ?>
            </div>
        </div>
        <div class="col-12 col-md-9 event-header-right">
        <?php else : ?>
        <div class="col-12 event-header-right">
        <?php endif; ?>
			<?php if ($artist) : ?>
                <h2 class="artist-name"><?php echo $artist->post_title ?></h2>
			<?php endif; ?>
			<?php the_title( '<h1 class="event-title">', '</h1>' ); ?>

            <div class="tribe-events-schedule">
				<?php echo tribe_events_event_schedule_details( $event_id, '<span class="date">', '</span>' ); ?>
                <span class="venue"><?php echo $venueCity ?>, <?php echo tribe_get_venue() ?></span>
            </div>
        </div>
    </div>

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
                <div class="col-md-7">
                    <!-- Event content -->
					<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                    <div class="tribe-events-single-event-description tribe-events-content">
						<?php the_content(); ?>
                    </div>
                    <!-- .tribe-events-single-event-description -->
					<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                </div>
                <div class="col-md-5">
                    <!-- Event meta -->
					<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
					<?php tribe_get_template_part( 'modules/meta' ); ?>
					<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                </div>
		</div> <!-- #post-x -->

        <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

            <?php /*
    <!-- Event header -->
    <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
        <!-- Navigation -->
        <nav class="tribe-events-nav-pagination" aria-label="<?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?>">
            <ul class="tribe-events-sub-nav">
                <li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
                <li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
            </ul>
            <!-- .tribe-events-sub-nav -->
        </nav>
    </div>
    <!-- #tribe-events-header -->
            */ ?>

</div><!-- #tribe-events-content -->
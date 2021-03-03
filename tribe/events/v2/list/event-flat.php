<?php
/**
 * Render a whole event. Does not use the tribe_events template system, so it can be included into other page contexts.
 *
 * @var array $args
 *
 * @see tribe_get_event() For the format of the event object.
 */

use Tribe__Date_Utils as Dates;
use Tribe\Utils\Date_I18n_Immutable as DateVO;

/** @var WP_Post $event */
$event = $args['event'];
$venue = $event->venues[0];

/** @var $artist WP_Post */
$artist = $event->bufu_artist;

if (!($artist instanceof WP_Post)) {
	$artist = bufu_artists()->loadArtistFromCustomMeta($event);
	$event->bufu_artist = $artist;
}

$container_classes = [ 'row', 'tribe-events-calendar-list__event-row' ];
if ($event->featured) {
	$container_classes[] = 'tribe-events-calendar-list__event-row--featured';
}
$event_classes = tribe_get_post_class( [ 'tribe-events-calendar-list__event' ], $event->ID );

/** @var $startDate DateVO */
$startDate = $event->dates->start;
$event_date_attr = $startDate->format( Dates::DBDATEFORMAT );

$ticketUrl = tribe_get_event_website_url( $event );

$adminEditUrl = get_edit_post_link( $event );

?>

<div <?php tribe_classes( $container_classes ); ?>>
    <div class="col-md-4 col-lg-3 tribe-events-calendar-list__event-date">
        <time datetime="<?php echo esc_attr( $event_date_attr ) ?>" aria-hidden="true"></time>
        <div class="row">
            <div class="col-sm-7 date-column-1 text-center">
                <span class="event-date date-day"><?php echo $startDate->format("d") ?></span>
                <span class="event-date date-month"><?php echo mb_substr(__($startDate->format("F")), 0, 3) ?></span>
                <span class="event-date date-year"><?php echo $startDate->format("Y") ?></span>
            </div>
            <div class="col-sm-5 date-column-2 text-center">
                <span class="event-date date-label"><?php echo __("Starts at", 'bufu-theme') ?></span>
                <span class="event-date date-time"><?php echo $startDate->format("H:i") ?></span>
            </div>
        </div>

		<?php if ($ticketUrl) : ?>
            <div class="tribe-events-c-small-cta tribe-events-calendar-list__event-tickets text-right">
                <a href="<?php echo $ticketUrl ?>" target="_blank"><?php echo __("Order tickets", 'bufu-theme') ?></a>
            </div>
		<?php endif; ?>
    </div>
	<div class="col-md-8 col-lg-9 tribe-events-calendar-list__event-info">
		<article <?php tribe_classes( $event_classes ); ?>>

			<?php if ($event->featured) : ?>
				<span class="badge badge-pill badge-secondary"><?php echo __("Recommended", 'bufu-theme') ?></span>
			<?php endif; ?>
			<span class="tribe-events-calendar-list__event-title-venue">
    			<?php echo esc_html( $venue->post_title ) ?>, <?php echo esc_html( $venue->city ) ?>
			</span>

			<div class="tribe-events-calendar-list__event-details">
				<header class="tribe-events-calendar-list__event-header">
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
				</header>

				<?php if ($artist || $adminEditUrl) : ?>
					<div class="tribe-events-c-small-cta tribe-events-calendar-list__event-links">
                        <?php if ( $artist ) : ?>
						    <a href="<?php echo get_the_permalink( $artist ) ?>" class="btn btn-default btn-pill"><?php echo __("More about the artist", 'bufu-theme') ?></a>
                        <?php endif; ?>

						<?php bufu_theme_edit_post_link( $post ); ?>
					</div>
				<?php endif; ?>

			</div>
		</article>
	</div>
</div>
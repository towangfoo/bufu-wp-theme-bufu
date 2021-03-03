<?php
/**
 * View: List View - Single Event Date
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list/event/date.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @since 4.9.9
 * @since 5.1.1 Move icons into separate templates.
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 *
 * @version 5.1.1
 */
use Tribe__Date_Utils as Dates;
use Tribe\Utils\Date_I18n_Immutable as DateVO;

/** @var $startDate DateVO */
$startDate = $event->dates->start;

?>
<time datetime="<?php echo esc_attr( $startDate->format( 'c' ) ) ?>" aria-hidden="true"></time>
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

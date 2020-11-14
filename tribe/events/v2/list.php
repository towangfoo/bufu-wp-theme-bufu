<?php
/**
 * View: List View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @version 5.0.2
 *
 * @var array    $events               The array containing the events.
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_nonce           The REST nonce.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 * 
 * @var Tribe\Events\Views\V2\Template $this
 */

$header_classes = [ 'tribe-events-header' ];
if ( empty( $disable_event_search ) ) {
	$header_classes[] = 'tribe-events-header--has-event-search';
}
?>
<div
	<?php tribe_classes( $container_classes ); ?>
	data-js="tribe-events-view"
	data-view-rest-nonce="<?php echo esc_attr( $rest_nonce ); ?>"
	data-view-rest-url="<?php echo esc_url( $rest_url ); ?>"
	data-view-manage-url="<?php echo esc_attr( $should_manage_url ); ?>"
	<?php foreach ( $container_data as $key => $value ) : ?>
		data-view-<?php echo esc_attr( $key ) ?>="<?php echo esc_attr( $value ) ?>"
	<?php endforeach; ?>
	<?php if ( ! empty( $breakpoint_pointer ) ) : ?>
		data-view-breakpoint-pointer="<?php echo esc_attr( $breakpoint_pointer ); ?>"
	<?php endif; ?>
>
    <h1 class="page-title"><?php echo __("Concert dates", 'bufu-theme') ?></h1>

	<div class="tribe-common-l-container tribe-events-l-container">
		<?php $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'the-events-calendar' ) ] ); ?>

		<?php $this->template( 'components/json-ld-data' ); ?>

		<?php $this->template( 'components/data' ); ?>

		<?php $this->template( 'components/before' ); ?>

		<?php /* @TODO!
		<header <?php tribe_classes( $header_classes ); ?>>
			<?php $this->template( 'components/messages' ); ?>

            <?php
            // NOTE: the filter-bar template is attached to the end of components/events-bar via a hook.
            // So in order to have them in separate columns, the second col is defined in the components/events-bar template!
            // @see https://theeventscalendar.com/knowledgebase/k/calendar-template-files-v2/
            // This seems to be the intended behavior, though it might change in the future
            ?>
            <div class="row">
                <?php  // $this->template( 'components/filter-bar' ); gets added in a separate column, defined in components/events-bar.php  ?>
                <div class="col-md-4 order-2">
					<?php $this->template( 'components/events-bar' ); ?>
                </div>
            </div>

		</header> */ ?>

        <div style="padding: 2rem 0; background-color: #b9d0f8; color: #0A246A; font-weight: 700; font-size: 1.3rem; text-align: center">
            @TODO: Filter und Suche
        </div>

		<div class="tribe-events-calendar-list">

			<?php foreach ( $events as $event ) : ?>
				<?php $this->setup_postdata( $event ); ?>

				<?php $this->template( 'list/event', [ 'event' => $event ] ); ?>

			<?php endforeach; ?>

		</div>

		<?php $this->template( 'list/nav' ); ?>

		<?php $this->template( 'components/ical-link' ); ?>

		<?php $this->template( 'components/after' ); ?>

	</div>
</div>

<?php $this->template( 'components/breakpoints' ); ?>

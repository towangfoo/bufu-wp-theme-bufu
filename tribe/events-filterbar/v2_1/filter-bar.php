<?php
/**
 * View: Filter Bar
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events-filterbar/v2_1/filter-bar.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @var string       $layout                       Layout of the filter bar, `vertical` or `horizontal`.
 * @var string       $filterbar_state              Current state of the entire Filter Bar, `open` or `closed`.
 * @var array<array> $selected_filters             Filters that have been selected.
 * @var array<array> $filters                      Filters available for filter bar.
 * @var string       $breakpoint_pointer           String we use as pointer to the current view we are setting up with breakpoints.
 * @var boolean      $mobile_initial_state_control Control the mobile initial state via JS if `true`, do not control if `false`.
 *
 * @version 5.0.0.1
 */

$classes = [ 'tribe-filter-bar', "tribe-filter-bar--$layout", 'tribe-filter-bar--open' ];
$aria_hidden = 'false';

if ( ! empty( $selected_filters ) ) {
	$classes[] = 'tribe-filter-bar--has-selected-filters';
}

$mobile_control = empty( $mobile_initial_state_control ) ? 'false' : 'true';
$heading_id     = "tribe-filter-bar__form-heading--$breakpoint_pointer";
?>

<div
	<?php tribe_classes( $classes ); ?>
	id="tribe-filter-bar--<?php echo esc_attr( $breakpoint_pointer ); ?>"
	data-js="tribe-filter-bar"
	data-mobile-initial-state-control="<?php echo esc_attr( $mobile_control ); ?>"
	aria-hidden="<?php echo esc_attr( $aria_hidden ); ?>"
>
	<form
		class="tribe-filter-bar__form"
		method="post"
		action=""
		aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
	>

		<h2
			class="tribe-filter-bar__form-heading tribe-common-h5 tribe-common-h--alt tribe-common-a11y-visual-hide"
			id="<?php echo esc_attr( $heading_id ); ?>"
		>
			<?php esc_html_e( 'Filter events', 'bufu-theme' ); ?>
		</h2>

		<?php $this->template( 'filter-bar/selections', [ 'selected_filters' => $selected_filters ] ); ?>

		<?php $this->template( 'filter-bar/actions' ); ?>

		<?php $this->template( 'filter-bar/filters', [ 'layout' => $layout, 'filters' => $filters ] ); ?>

		<?php $this->template( 'filter-bar/filters-slider', [ 'layout' => $layout, 'filters' => $filters ] ); ?>

	</form>
</div>

<?php $this->template( 'filter-bar/breakpoints' ); ?>

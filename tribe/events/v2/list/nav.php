<?php
/**
 * View: List View Nav Template
 *
 * See more documentation about our views templating system.
 *
 * @link http://m.tri.be/1aiy
 *
 * @var string $prev_url The URL to the previous page, if any, or an empty string.
 * @var string $next_url The URL to the next page, if any, or an empty string.
 * @var string $today_url The URL to the today page, if any, or an empty string.
 *
 * @version 4.9.10
 *
 */
?>
<nav class="tribe-events-calendar-list-nav tribe-events-c-nav">
	<ul class="tribe-events-c-nav__list">
		<?php
		if ( ! empty( $prev_url ) ) {
			$this->template( 'list/nav/prev', [ 'link' => $prev_url ] );
		} else {
			$this->template( 'list/nav/prev-disabled' );
		}
		?>

		<?php $this->template( 'list/nav/today' ); ?>

		<?php
		if ( ! empty( $next_url ) ) {
			$this->template( 'list/nav/next', [ 'link' => $next_url ] );
		} else {
			$this->template( 'list/nav/next-disabled' );
		}
		?>
	</ul>
</nav>

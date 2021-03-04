<?php
/**
 * Show a filterbox to select artists starting with a specific letter
 *
 * @var $args array
 */

$current = $args['current'];
$letters = bufu_artists()->getArtistLetterOptions();

?>

<div class="artist-filter-startswith">
    <a href="?"<?php if ($current === null) echo ' class="current"' ?>><?php _e( 'All', 'bufu-theme' ) ?></a>
    <?php /* important to leave this in one line, to not get spaces between the <a> tags */ ?>
	<?php foreach ($letters as $l) : ?><a href="?l=<?php echo $l ?>"<?php if ($current === $l) echo ' class="current"' ?> title="<?php printf(__('Artists starting with "%s"', 'bufu-theme'), ucfirst($l)) ?>"><?php echo ucfirst($l) ?></a><?php endforeach; ?>
</div>
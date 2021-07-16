<?php
/**
 * Show featured artists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

$artistSelection = get_post_meta( $post->ID, '_bufu_artist_selectArtist', true);
if ( !is_array($artistSelection) ) {
	$artistSelection = [];
}

/** @var $artists WP_Post[] */
$artists = bufu_artists()->loadArtistsById($artistSelection);
$numArtists = count($artists);

if ($numArtists < 1) {
    return;
}

// to compute slider width
$listItemWidth = 200;
$listItemMargin = 24;

$firstArtist = current($artists);
?>

<div class="mt-6 mb-6">
    <h2 class="front-page section-title"><?php echo _n('Artist portrait', 'Artist portraits', 2, 'bufu-theme') ?></h2>

    <div class="row front-featured-artists">
        <div class="col-md-5 pr-0">
            <div class="current-portrait" aria-hidden="true" aria-role="presentation">
                <div class="item">
                    <?php echo get_the_post_thumbnail( $firstArtist, 'medium' ); ?>
                    <div class="content">
                        <p class="artist-name"><?php echo get_the_title( $firstArtist) ?></p>
                        <p class="excpert"><?php echo get_the_excerpt( $firstArtist ) ?></p>
                        <a href="<?php echo get_permalink( $firstArtist ) . "#more-{$firstArtist->ID}" ?>" class="btn btn-icon-left btn-inverted"><span class="icon">&raquo;</span> <?php echo __("Read more", 'bufu-theme') ?></a>
						<?php bufu_theme_edit_post_link( $firstArtist, [ 'btn-inverted' ] ); ?>
                    </div>
                </div>
            </div>
            <div class="portrait-navigation text-right">
                <button type="button" class="btn btn-link btn-lg btn-inverted" data-action-id="front-featured-artists-next" data-direction="prev" title="<?php echo __('Previous artist', 'bufu-theme') ?>">&larr;</button>
                <button type="button" class="btn btn-link btn-lg btn-inverted" data-action-id="front-featured-artists-next" data-direction="next" title="<?php echo __('Next artist', 'bufu-theme') ?>">&rarr;</button>
            </div>
        </div>
        <div class="col-md-7 pl-0">
            <div class="list-featured">
                <div class="slider-horizontal">
                    <div class="slider-horizontal-inner" style="width: <?php echo ($numArtists * $listItemWidth) + ( ($numArtists - 1) * $listItemMargin) ?>px">
                        <?php foreach ($artists as $artist) :
                            $current = ($artist->ID === $firstArtist->ID);
                        ?>
                        <div class="item<?php if ($current) : ?> active<?php endif; ?>">
                            <?php echo get_the_post_thumbnail( $artist, 'medium' ); ?>
                            <div class="content">
                                <p class="artist-name"><?php echo get_the_title( $artist ) ?></p>
                                <p class="excerpt" hidden><?php echo get_the_excerpt( $artist ) ?></p>
                                <a href="<?php echo get_permalink( $artist ) . "#more-{$artist->ID}" ?>" class="btn btn-icon-left btn-inverted" hidden><span class="icon">&raquo;</span> <?php echo __("Read more", 'bufu-theme') ?></a>
								<?php bufu_theme_edit_post_link( $artist, [ 'btn-inverted' ], [ 'hidden' ] ); ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php if ($numArtists > 1) : ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            'use strict';

            // scroll slider to show from the second item
            $('.slider-horizontal').scrollLeft(<?php echo ($listItemWidth + $listItemMargin) ?>);

            // show item from the list as current profile
            $( '.front-featured-artists .list-featured .item' ).click(function(e) {
                e.preventDefault();

                var item = $( this ).clone();
                item.find('[hidden]').removeAttr('hidden');

                $ ( '.front-featured-artists .current-portrait' ).empty().append( item );

                $( this ).addClass( 'active' );
                $( this ).siblings().removeClass( 'active' );
            });

            // show prev/next artist
            $( '[data-action-id="front-featured-artists-next"]' ).click(function(e) {
                e.preventDefault();
                var idxActive = $( '.front-featured-artists .list-featured .item.active' ).index();
                var maxIdx  = $( '.front-featured-artists .list-featured .item').length - 1;
                var dir = $( this ).data('direction');

                var idxNext = (dir === 'prev') ? idxActive - 1 : idxActive + 1;

                // loop around at the ends
                if (idxNext < 0) {
                    idxNext = maxIdx;
                }
                else if (idxNext >= maxIdx) {
                    idxNext = 0;
                }

                // trigger click, nth-child is 1-based
                idxNext ++;
                $( '.front-featured-artists .list-featured .item:nth-child('+ idxNext +')' ).click();
            });
        });
    </script>
	<?php endif; ?>
</div>
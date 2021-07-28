<?php
/**
 * Header slider.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

$sliderImages = get_post_meta( $post->ID, '_bufu_artist_imgArtistsReel', true);
if (!is_array($sliderImages)) {
    $sliderImages = [];
}

$imgConcerts = get_post_meta( $post->ID, '_bufu_artist_imgConcerts', true);
$imgShop     = get_post_meta( $post->ID, '_bufu_artist_imgShop', true);

$numSlides = count($sliderImages);

// height of the slider in pixels (should be divisble by 2)
$sliderHeight = 480;

$artistsUrl = '/kuenstler/';
$eventsUrl  = '/veranstaltungen/liste';
$shopUrl    = 'https://konsum.buschfunk.com/';

?>
<div class="mb-5">
    <div class="row header-visual-links">
        <div class="col-md-8 p-0">
            <?php if ($numSlides > 0) : ?>
            <div id="slider-header-artists" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $numSlides; $i++) : ?>
                    <li data-target="#slider-header-artists" data-slide-to="<?php echo $i ?>"<?php if ($i === 0) : ?> class="active"><?php endif; ?></li>
                    <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($sliderImages as $i => $url) : ?>
                    <div class="carousel-item<?php if ($i === 0) : ?> active<?php endif; ?>">
                        <a href="<?php echo $artistsUrl ?>" class="img-centered-absolutely" style="height: <?php echo $sliderHeight ?>px">
                            <img src="<?php echo $url ?>" alt="">
                            <span class="slider-label"><?php echo _n('Artist', 'Artists', 2, 'bufu-theme') ?></span>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4 p-0">
            <div class="visual-link concerts">
                <a href="<?php echo $eventsUrl ?>" class="img-centered-absolutely" style="height: <?php echo $sliderHeight / 2 ?>px" title="<?php echo __('Show upcoming concerts and events', 'bufu-theme') ?>">
                    <img src="<?php echo $imgConcerts ?>" alt="">
                    <span class="slider-label"><?php echo _n('Concert', 'Concerts', 2, 'bufu-theme') ?></span>
                </a>
            </div>
            <div class="visual-link konsum">
                <a href="<?php echo $shopUrl ?>" class="img-centered-absolutely" style="height: <?php echo $sliderHeight / 2 ?>px" target="_blank" title="<?php echo __('Visit the Konsum', 'bufu-theme') ?>">
                    <img src="<?php echo $imgShop ?>" alt="">
                    <span class="slider-label"><?php echo __('Konsum', 'bufu-theme') ?></span>
                </a>
            </div>
        </div>
    </div>
</div>
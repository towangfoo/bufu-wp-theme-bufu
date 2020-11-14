<?php
/**
 * Show last posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

// how many posts to display
$numPosts = 5;

/** @var $posts WP_Post[] */
$posts = bufu_artists()->loadRecentPosts( $numPosts );

?>

<div class="front-box lightgrey front-last-posts">
    <h2 class="front-page section-title"><?php echo _n('Post', 'Posts', 2, 'bufu-theme') ?></h2>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#alle" id="tab-alle" data-toggle="tab" role="tab" aria-controls="alle" aria-selected="true">Alle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#buschfunk-meldet" id="tab-buschfunk-meldet" data-toggle="tab" role="tab" aria-controls="buschfunk-meldet" aria-selected="false">BuschFunk meldet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#in-planung" id="tab-in-planung" data-toggle="tab" role="tab" aria-controls="in-planung" aria-selected="false">In Planung</a>
        </li>
    </ul>
    <div class="tab-content mt-5" id="myTabContent">
        <div class="tab-pane fade show active" id="alle" role="tabpanel" aria-labelledby="tab-alle">
			<?php get_template_part( 'front-page/partials/posts', null, ['posts' => bufu_artists()->loadRecentPosts( $numPosts )] ); ?>
        </div>
        <div class="tab-pane fade" id="buschfunk-meldet" role="tabpanel" aria-labelledby="tab-buschfunk-meldet">
			<?php get_template_part( 'front-page/partials/posts', null, ['posts' => bufu_artists()->loadRecentPosts( $numPosts, 'buschfunk-meldet' )] ); ?>
        </div>
        <div class="tab-pane fade" id="in-planung" role="tabpanel" aria-labelledby="tab-in-planung">
			<?php get_template_part( 'front-page/partials/posts', null, ['posts' => bufu_artists()->loadRecentPosts( $numPosts, 'in-planung' )] ); ?>
        </div>
    </div>

</div>
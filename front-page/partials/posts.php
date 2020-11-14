<?php
/**
 * Partial to render posts within a category.
 *
 * @var array $args
 */

/** @var $posts WP_Post[] */
$posts = $args['posts'];

if (count($posts) < 1) {
    echo '<p class="empty">'. __('No posts available', 'bufu-theme') .'</p>';
	return;
}

/** @var $featuredPost WP_Post */
$featuredPost = array_shift($posts);

?>

<div class="row">
	<div class="col-md-6 featured-post">
		<?php
		$showPostUrl = get_permalink( $featuredPost );
		$categories  = get_the_category_list( ', ', '', $featuredPost );
		?>
		<a href="<?php echo $showPostUrl ?>">
			<?php echo get_the_post_thumbnail( $featuredPost, 'medium', ['class' => 'w-100'] ); ?>
		</a>
		<p class="meta"><?php echo $categories ?> - <?php bufu_theme_posted_on( $featuredPost ) ?></p>
		<h3 class="post-title"><a href="<?php echo $showPostUrl ?>"><?php echo get_the_title($featuredPost) ?></a></h3>
		<a href="<?php echo $showPostUrl ?>" class="btn btn-icon-left"><span class="icon">&raquo;</span> <?php echo __("Read", 'bufu-theme') ?></a>
		<?php bufu_theme_edit_post_link( $featuredPost ); ?>
	</div>
	<div class="col-md-6 list-posts">
		<?php foreach ($posts as $post) :
			$categories  = get_the_category_list( ', ', '', $post );
        ?>
			<div class="post-item">
				<p class="meta"><?php echo $categories ?> - <?php bufu_theme_posted_on( $post ) ?></p>
				<h3 class="post-title"><a href="<?php echo get_permalink( $post ) ?>"><?php echo get_the_title( $post ) ?></a></h3>
				<?php bufu_theme_edit_post_link( $post ); ?>
			</div>
		<?php endforeach; ?>

        <div class="mt-5 text-right">
            <a href="/meldungen/" class="btn btn-default btn-pill"><?php echo __('All posts', 'bufu-theme') ?></a>
        </div>
	</div>
</div>

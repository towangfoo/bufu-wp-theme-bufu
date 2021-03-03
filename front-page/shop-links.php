<?php
/**
 * Show featured products from the webshop.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BuschFunk
 *
 * @var $post WP_Post <-- the front page
 */

$productData = bufu_artists()->loadFeaturedStoreProducts();
if (!is_array($productData) || count($productData) < 1) {
    return;
}

$localImageBase = '/wp-content/mu-plugins/bufu-artists/';

?>

<div class="front-store-products">
    <h2 class="front-page section-title"><?php _e('Tips from our store', 'bufu-theme')  ?></h2>
    <div class="row">
        <?php foreach ($productData as $i => $product) :
            /** @var $product array */
            if ($i > 0 && $i % 3 === 0) {
                echo "</div><div class=\"row\">";
            }

            $fullName = $product['data']['artist'] . ": " . $product['data']['name'];
        ?>
        <div class="col-12 col-lg-4 store-product">
            <article>
                <a href="<?php echo esc_attr($product['url']) ?>" target="_blank">
                <?php if ($product['data']['image_local']) : ?>
                    <img src="<?php echo $localImageBase . esc_attr($product['data']['image_local']) ?>" alt="<?php echo esc_attr($product['data']['name']) ?>">
                <?php else : ?>
                    <?php echo bufu_theme_no_thumbnail(__("No image", 'bufu-theme')) ?>
                <?php endif; ?>
                </a>
                <div class="row">
                    <div class="col-8 meta">
                        <?php echo esc_html($product['data']['type']) ?>
                    </div>
                    <div class="col-4 price">
                        <?php echo ($product['data']['special_price']) ? esc_html($product['data']['special_price']) : esc_html($product['data']['regular_price']) ?>
                    </div>
                </div>
                <h3 class="name"><a href="<?php echo esc_attr($product['url']) ?>" title="<?php echo esc_attr($fullName) ?>"><?php echo esc_html($fullName) ?></a></h3>
                <p><a href="<?php echo esc_attr($product['url']) ?>" class="btn btn-icon-left"><span class="icon">»</span> <?php _e("To store", 'bufu-theme') ?></a></p>
            </article>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
/**
 * Mailorder catalogue
 *
 * @package BuschFunk
 *
 */

$path = '/wp-content/themes/bufu/var/mailorder/';

$pdfName   = 'BuschFunk_Katalog_2020_2021.pdf';
$imageName = 'katalog_2020_2021.jpg';
?>

<div class="sc-mailorder">
	<a href="<?php echo $path . $pdfName ?>">
        <img src="<?php echo $path . $imageName ?>" alt="<?php _e( "Mailorder catalogue", 'bufu-theme') ?>">
        <span class="ribbon"><?php _e("Download our mailorder catalogue", 'bufu-theme') ?></span>
    </a>
</div>
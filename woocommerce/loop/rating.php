<?php
/**
 * Loop Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

$rating_count = $product->get_rating_count();

if (!wc_review_ratings_enabled()) {
    return;
}
?>
<div class="flex justify-center items-center text-yellow-500">
    <div class="-mb-2">
        <?php
echo wc_get_rating_html($product->get_average_rating()); // WordPress.XSS.EscapeOutput.OutputNotEscaped.
?>
    </div>
    <?php
if (comments_open() && $rating_count != 0): ?>
    <a href="<?php echo get_permalink() ?>#reviews" class="woocommerce-review-link text-black ml-1" rel="nofollow">
        <?php echo $rating_count; ?>
    </a>
    <?php
endif
?>

</div>
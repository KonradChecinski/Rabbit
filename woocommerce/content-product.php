<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
if (!function_exists('woocommerce_template_loop_product_title_override')) {

    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
    add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_override', 10);

    function woocommerce_template_loop_product_title_override()
    {
        global $product;

        //echo '<h2 class="test ' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h2>';
        echo '
				<div class="flex justify-center items-center flex-col">
					<h2 class="text-xl text-rabbit1 text-center overflow-hidden max-h-16">' . get_the_title() . ' </h2>
				<p class=" text-xs text-center w-56 max-h-4 overflow-hidden my-4">' . wp_filter_nohtml_kses($product->short_description) . '</p>
				</div>
				';
    }
}

?>
<li <?php wc_product_class('test', $product);?>>
    <?php
/**
 * Hook: woocommerce_before_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_open - 10
 */
do_action('woocommerce_before_shop_loop_item');

/**
 * Hook: woocommerce_before_shop_loop_item_title.
 *
 * @hooked woocommerce_show_product_loop_sale_flash - 10
 * @hooked woocommerce_template_loop_product_thumbnail - 10
 */
do_action('woocommerce_before_shop_loop_item_title');

?>
    <div class="h-full flex flex-col justify-between min-h-[150px]">

        <?php
/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */
do_action('woocommerce_shop_loop_item_title');

/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 5);
do_action('woocommerce_after_shop_loop_item_title');
?>
    </div>
    <?php
/**
 * Hook: woocommerce_after_shop_loop_item.
 *
 * @hooked woocommerce_template_loop_product_link_close - 5
 * @hooked woocommerce_template_loop_add_to_cart - 10
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
do_action('woocommerce_after_shop_loop_item');

add_action('woocommerce_after_shop_loop_item_title2', 'woocommerce_template_loop_rating', 10);
do_action('woocommerce_after_shop_loop_item_title2');

?>
</li>
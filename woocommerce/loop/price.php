<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
// print_r($product);                                          promka        bez promki
//print_r("price" . wc_price($product->get_price()));        // 135,00       15,00
//print_r("sale" . wc_price($product->get_sale_price()));    // 135,00        0,00
//print_r("reg" . wc_price($product->get_regular_price()));  // 150,00       15,00
?>

<div class="flex justify-center items-center gap-4">
    <?php if ($product->is_on_sale()): ?>

    <del class="text-2xl text-gray-500"><?php echo wc_price($product->get_regular_price()); ?></del>
    <span class="text-2xl text-red-600"><?php echo wc_price($product->get_price()); ?></span>

    <?php else: ?>
    <span class="text-2xl"><?php echo wc_price($product->get_price()); ?></span>


    <?php endif;?>
</div>






<?php
// <?php if ($price_html = $product->get_price_html()): ?/>
// <span class=""><?php echo $price_html; ?/></span>
// <?php endif;?/>
?>
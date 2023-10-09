<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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

global $post, $product;

?>
<?php if ($product->is_on_sale()): ?>

<?php echo apply_filters('woocommerce_sale_flash', '<span class=" bg-orange-500 top-0 right-0 left-auto absolute rounded-lg p-1 text-white font-bold mt-2 mr-1">' . esc_html__('Sale!', 'woocommerce') . '</span>', $post, $product); ?>

<?php
endif;
// onsale
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
// top: 0;
// right: 0;
// left: auto;
// margin: -0.5em -0.5em 0 0;

// element.style {
// }
// .woocommerce ul.products li.product .onsale {
//     top: 0;
//     right: 0;
//     left: auto;
//     margin: -0.5em -0.5em 0 0;
// }
// .woocommerce span.onsale {
//     min-height: 3.236em;
//     min-width: 3.236em;
//     padding: 0.202em;
//     font-size: 1em;
//     font-weight: 700;
//     position: absolute;
//     text-align: center;
//     line-height: 3.236;
//     top: -0.5em;
//     left: -0.5em;
//     margin: 0;
//     border-radius: 100%;
//     background-color: #b3af54;
//     color: #fff;
//     font-size: .857em;
//     z-index: 9;
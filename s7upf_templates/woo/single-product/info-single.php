<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/09/2017
 * Time: 11:41 SA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;
$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
?>
    <h2 class="title-product-detail"><?php the_title(); ?></h2>
    <?php woocommerce_template_single_rating(); ?>
    <div class="product-price">
        <?php woocommerce_template_loop_price(); ?>
        <?php $discount_sale = s7upf_product_loop_discount_sale();
        if(!empty($discount_sale) and $product->is_on_sale()) {?>
            <span class="sale-label"><?php echo do_shortcode($discount_sale);?></span>
        <?php } ?>
    </div>
    <div class="product-more-info">
        <?php woocommerce_template_single_excerpt(); ?>
    </div>
    <div class="mb-product-single-add-to-cart">
        <?php
        /**
         * s7upf_template_single_add_to_cart hook.
         *
         * @hooked woocommerce_template_single_add_to_cart - 10
         * @hooked s7upf_catelog_custom_button - 1
         */
        do_action('s7upf_template_single_add_to_cart')?>
        <?php //woocommerce_template_single_add_to_cart();?>
    </div>
    <div class="product-extra-link">
        <?php echo s7up_wishlist_url(esc_html__('Wishlist','shb')); ?>
        <?php echo s7upf_compare_url(false,esc_html__('Compare','shb')); ?>
    </div>
    <div class="detail-extra">
        <?php woocommerce_template_single_meta(); ?>
    </div>
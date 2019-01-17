<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 17/10/2017
 * Time: 2:39 CH
 */
if(empty($icon)) $icon= 'fa-shopping-basket';
?>

<div class="mini-cart-box  <?php echo esc_attr($pull_cart); ?>">
    <a class="mini-cart-link" href="#">
        <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
        <div class="total-default hidden"><?php echo wc_price(0)?></div>
        <span class="mini-cart-icon color"><i class="fa <?php echo esc_attr($icon); ?>" aria-hidden="true"></i></span>
        <span class="mini-cart-number">
            <span class="color"><?php echo esc_attr($title);?></span>
            <strong> <span class="mb-count-ajax"><?php echo count( WC()->cart->get_cart() );?></span> <?php echo(count( WC()->cart->get_cart() )>1)? esc_html__('Items: ','shb'): esc_html__('Item: ','shb'); ?> <span class="mb-price"><?php echo WC()->cart->get_cart_total(); ?></span></strong>
        </span>
    </a>
    <div class="mini-cart-content">
        <?php s7upf_mini_cart(); ?>
    </div>
</div>
<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$itemscustom='3';
$sidebar_pos = s7upf_get_sidebar();
if($sidebar_pos['position'] == 'no') $itemscustom = '4';
$show_sells = s7upf_get_option('s7upf_show_up_sells_product_detail');
$title_sells = s7upf_get_option('s7upf_title_up_sells_product');
$default_image = get_template_directory_uri().'/assets/images/no-thumb/placeholder.png';
$image_size = s7upf_get_option('s7upf_custom_size_image_list');
$image_size  = s7upf_get_size_image('400x400',$image_size);
$enable_new = s7upf_get_option('s7upf_enable_new_product');
$day_new = s7upf_get_option('s7upf_number_day_new_product');
if ( $cross_sells ) : ?>

    <div class="related-product product-cross-sell-style">
        <h2 class="title14 text-center"><span><?php esc_html_e( 'You may be interested in&hellip;', 'shb' ) ?></span></h2>
        <div class="product-related-slider">
            <div class="wrap-item" data-navigation="true" data-pagination="false" data-itemscustom="[[0,1],[480,2],[768,3],[990,<?php echo esc_attr($itemscustom); ?>]]">
                <?php foreach ($cross_sells as $cross_sell ) :
                    $post_object = get_post( $cross_sell->get_id() );
                    $units_sold = get_post_meta( $cross_sell->get_id(), 'total_sales', true );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    ?>
                    <div class="item-product item-product-grid">
                        <div class="product-thumb box-hover-dir">
                            <?php
                            if ( has_post_thumbnail() ) {
                                echo get_the_post_thumbnail( $cross_sell->get_id(), $image_size);

                            }  else {
                                $dimensions = wc_get_image_size( $image_size ); ?>
                                <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','shb')?>" title="<?php esc_html_e('product','shb')?>" />
                                <?php
                            }
                            if('on' == $enable_new){
                                echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                            }

                            if ( $cross_sell->is_on_sale()) : ?>

                                <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="product-sale-label">' . esc_html__( 'Sale!', 'shb' ) . '</span>', $cross_sell, $cross_sell ); ?>

                            <?php endif;
                            ?>
                            <div class="info-product-hover-dir">
                                <div class="inner-product-hover-dir">
                                    <div class="content-product-hover-dir">
                                        <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><?php echo esc_html__('Quick view','shb'); ?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                        <span class="product-total-sale"><?php printf(_nx('( %s Sale )','( %s Sales )',$units_sold,'Product total sale','shb'), number_format_i18n($units_sold)); ?></span>
                                        <div class="product-extra-link">
                                            <?php woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart')); ?>
                                            <?php echo s7up_wishlist_url(esc_html__('Wishlist','shb')); ?>
                                            <?php echo s7upf_compare_url(false,esc_html__('Compare','shb')); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php echo s7upf_get_rating_html();?>
                            <div class="product-price">
                                <?php woocommerce_template_loop_price(); ?>
                                <?php $discount_sale = s7upf_product_loop_discount_sale();
                                if(!empty($discount_sale) and $cross_sell->is_on_sale()) {?>
                                    <span class="sale-label"><?php echo do_shortcode($discount_sale);?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php endif;

wp_reset_postdata();

<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 18/11/2017
 * Time: 4:01 CH
 */

if(!function_exists('s7upf_vc_product_id'))
{
    function s7upf_vc_product_id($attr,$content = false)
    {
        $html = '';
        extract(shortcode_atts(array(
            'id'      => '',
        ),$attr));

        $_pf = new WC_Product_Factory();
        if(!empty($id)){
            $_product = $_pf->get_product($id);
            $post_object = get_post( $_product->get_id() );
            setup_postdata( $GLOBALS['post'] =& $post_object );
            global $product;
            $discount_sale = s7upf_product_loop_discount_sale();
            ob_start();
            ?>
            <div class="product-info">
                <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <?php woocommerce_template_loop_rating(); ?>

                <div class="product-price">
                    <?php woocommerce_template_loop_price();
                    if(!empty($discount_sale) and $product->is_on_sale()) { ?>
                        <span class="sale-label"><?php echo do_shortcode($discount_sale); ?></span>
                    <?php }
                    ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="shop-button"><?php echo esc_html__('Shop Now','shb');?></a>
            </div>
            <?php
            $html .= @ob_get_clean();
            wp_reset_postdata();
        }
        return $html;
    }
}

stp_reg_shortcode('s7upf_product_by_id','s7upf_vc_product_id');
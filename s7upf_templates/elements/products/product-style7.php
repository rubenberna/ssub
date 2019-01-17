<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
$image_size  = s7upf_get_size_image('400x400',$image_size);
$data_button = vc_build_link($button_link);
if($pro_query->have_posts()){ ?>
    <div class="box-product-type woocommerce  mb-element-product-<?php echo esc_attr($style); ?> <?php echo esc_attr($extra_class)?>">
        <?php if(!empty($data_button['title'])){ ?>
            <h3 class="mont-font title18 underline-title">
                <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']):'#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_button['rel'])) echo'rel="' .esc_attr( $data_button['rel'] ) . '"'?>><?php echo esc_attr($data_button['title']); ?></a>
            </h3>
        <?php } ?>
        <div class="list-product-type">
        <?php  while ($pro_query->have_posts()) {
            $pro_query->the_post(); global $product; global $post; $discount_sale = s7upf_product_loop_discount_sale(); ?>
            <div class="item-product-type table">
                <div class="product-thumb">
                    <?php s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                    <a data-product-id="<?php echo get_the_id()?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
                <div class="product-info">
                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="product-rate">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>
                    <div class="product-price">
                        <?php woocommerce_template_loop_price();
                        if(!empty($discount_sale) and $product->is_on_sale() and 'on'==$label_sale) { ?>
                            <span class="sale-label"><?php echo do_shortcode($discount_sale); ?></span>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        <?php } wp_reset_postdata(); ?>
        </div>
    </div>
<?php }
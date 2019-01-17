<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 23/09/2017
 * Time: 2:14 CH
 */
if(empty($itemscustom)) $itemscustom='[0,1],[600,2],[980,3]'; else $itemscustom= s7upf_base64decode($itemscustom);
$image_size  = s7upf_get_size_image('370x370',$image_size);
if(empty($number_row)) $number_row = 1;
if(''==$type_add_to_cart) $type_add_to_cart='view_cart';
if(empty($number_row)) $number_row = 1;
?>
<div class="new-product-box mb-element-product-<?php echo esc_attr($style);?> <?php if(empty($title) and 'true'==$navigation) echo 'no-title-product'; ?> <?php echo esc_attr($extra_class)?>">
    <?php if(!empty($title)){ ?>
        <h2 class="title30 mont-font title-box3"><?php echo esc_attr($title); ?></h2>
    <?php } ?>
    <?php if($pro_query->have_posts()){   $i = 1; $count_product= $pro_query->post_count; ?>
        <div class="new-product-slider woocommerce">
            <div class="wrap-item" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-autoheight = false; data-navigation="<?php echo esc_attr($navigation)?>" data-pagination="<?php echo esc_attr($pagination_slider)?>" data-itemscustom="[<?php echo esc_attr($itemscustom)?>]">
                <?php while ($pro_query->have_posts()){
                    $pro_query->the_post(); global $post, $product; ?>
                    <?php if($i % (int)$number_row == 1  || $count_product == 1|| $number_row == 1) echo '<div class="item">'; ?>

                    <div class="item-new-product text-center product">
                        <div class="product-thumb">
                            <?php s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                            <?php
                            if('on' === $label_new){
                                echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                            }

                            if ( $product->is_on_sale() and 'on'==$label_sale) : ?>

                                <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="product-sale-label">' . esc_html__( 'Sale!', 'shb' ) . '</span>', $post, $product ); ?>

                            <?php endif;
                            ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                            <div class="product-price">
                                <?php woocommerce_template_loop_price(); ?>
                            </div>
                            <div class="<?php echo esc_attr($type_add_to_cart); ?>">
                                <?php woocommerce_template_loop_add_to_cart(); ?>
                            </div>
                        </div>
                    </div>

                    <?php if($i % (int)$number_row  == 0 || $i == $count_product  || $count_product == 1 || $number_row == 1) echo '</div>'; ?>
                    <?php $i=$i+1;
                } wp_reset_postdata();  ?>

            </div>
        </div>
    <?php  } ?>
</div>

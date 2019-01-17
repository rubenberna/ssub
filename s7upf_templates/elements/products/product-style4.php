<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 31/10/2017
 * Time: 8:22 SA
 */
$html_new_label =$html_sale_label= '';
$image_size  = s7upf_get_size_image('400x400',$image_size);
$array_product = array();
if($pro_query->have_posts()){
    while ($pro_query->have_posts()) {   $pro_query->the_post(); global $product;
        $discount_sale = s7upf_product_loop_discount_sale();
        ob_start(); ?>
        <div class="item-product4 product">
            <div class="product-thumb">
                <?php s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                <a data-product-id="<?php echo get_the_id()?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                <?php if('on' === $label_new){
                    echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                } ?>
                <div class="product-info-top">
                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="product-rate">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>
                </div>
                <div class="product-price">
                    <?php woocommerce_template_loop_price();
                    if(!empty($discount_sale) and $product->is_on_sale() and 'on'==$label_sale) { ?>
                        <span class="sale-label"><?php echo do_shortcode($discount_sale); ?></span>
                    <?php }
                    ?>
                </div>
                <div class="product-extra-link">
                    <?php
                    woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart'));
                    echo s7up_wishlist_url(esc_html__('Wishlist','shb'));
                    echo s7upf_compare_url(false,esc_html__('Compare','shb'));
                    ?>
                </div>
            </div>
        </div>
        <?php
        $array_product[]= @ob_get_clean();

    }

}
if(!empty($data_banner_4) and is_array($data_banner_4)){
    ob_start(); ?>
    <div class="item-product4">
        <div class="wrap-item" data-pagination="false" data-navigation="true" data-itemscustom="[[0,1]]">
        <?php
        foreach ($data_banner_4 as $key=>$value) {
            if(!empty($value['bg_link']))
                $data_link= vc_build_link($value['bg_link']); ?>
                <div class="banner-quangcao zoom-image overlay-image">
                    <?php if(!empty($value['bg_image'])) { ?>
                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" class="adv-thumb-link"><?php echo wp_get_attachment_image($value['bg_image'],$image_size)?></a>
                        <?php
                    } if (!empty($value['info'])) { ?>
                        <div class="banner-info white text-center">
                            <?php echo s7upf_base64decode($value['info']); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php
        } ?>
        </div>
    </div>
    <?php
    $banner_html = @ob_get_clean();

    array_splice($array_product, 2, 0, $banner_html);

}

$i = 1;
?>
<div class="product-box4 element-product-<?php echo esc_attr($style); ?> <?php echo esc_attr($extra_class)?>">
    <?php if(!empty($title)) { ?>
        <h2 class="title-box4 title18 mont-font text-center"><span class="white bg-color"><?php echo esc_attr($title); ?></span></h2>
        <?php
    } if(!empty($array_product) and is_array($array_product)){ ?>
        <div class="content-product-box4 woocommerce">
            <div class="row">
                <?php foreach ($array_product as $key=>$value){
                    if($key == 0 || $key == 3)  echo'<div class="col-md-3 col-sm-12 col-xs-12">';
                    if($key == 2)  echo'<div class="col-md-6 col-sm-12 col-xs-12">';
                    if($key > 4)  echo'<div class="col-md-3 col-sm-12 col-xs-12">';
                    echo do_shortcode($value);
                    if($key == 1|| $key == 2 || $key == 4 || $key > 4)  echo'</div>';
                    $i++;
                } ?>
            </div>
        </div>
    <?php }
    $data_button = vc_build_link($button_link);
    if(!empty($data_button['title'])){ ?>
        <div class="text-center">
            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']):'#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_button['rel'])) echo'rel="' .esc_attr( $data_button['rel'] ) . '"'?> class="viewall-button"><?php echo esc_attr($data_button['title']); ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        </div>
    <?php } ?>
</div>
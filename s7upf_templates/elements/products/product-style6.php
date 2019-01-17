<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 11/11/2017
 * Time: 10:29 SA
 */

$vip_args = array();

$image_size  = s7upf_get_size_image('400x400',$image_size);
$image_size_featured  = s7upf_get_size_image('600x600',$image_size_featured);
if(empty($position_tab_active)) $position_tab_active = 1;
$time = s7upf_get_deals_time();

//check class css navigation tab
switch($style_nav_tab){
    case "style1":
        $class_nav_tab = 'tab-title text-center text-uppercase';
        $class_nav_ul = 'list-none';
        $class_nav_li = 'inline-block';
        $class_nav_a = 'shop-button';
        break;
    case "style2":
        $class_nav_tab = 'title-tab2 title-lamp';
        $class_nav_ul = 'list-inline-block';
        $class_nav_li = '';
        $class_nav_a = '';
        break;
    case "style3":
        $class_nav_tab = 'tab-cat-box3';
        $class_nav_ul = 'list-title-tab3 list-inline-block';
        $class_nav_li = '';
        $class_nav_a = '';
        break;
    case "style4":
        $class_nav_tab = '';
        $class_nav_ul = 'list-inline-block text-center text-uppercase title-tab5';
        $class_nav_li = 'inline-block';
        $class_nav_a = '';
        break;
    case "style5":
        break;
    default:
        break;
}

//check class css  product content tab
switch($style_product_content){
    case "style1":
        $class_content_tab = 'product-slider';
        $class_item = 'item-product-gallery';
        if(empty($number_row)) $number_row = 2;
        if(empty($itemscustom)) $itemscustom='[0,1],[560,2]'; else $itemscustom= s7upf_base64decode($itemscustom);
        break;
    case "style2":
        $class_content_tab = 'content-product2 line-white';
        $class_item = 'item-product2';
        if(empty($number_row)) $number_row = 2;
        if(empty($itemscustom)) $itemscustom='[0,1],[560,2],[980,3]'; else $itemscustom= s7upf_base64decode($itemscustom);
        break;
    case "style3":
        $class_content_tab = 'tab-cat-slider3';
        $class_item = 'item';
        if(empty($number_row)) $number_row = 1;
        if(empty($itemscustom)) $itemscustom='[0,1]'; else $itemscustom= s7upf_base64decode($itemscustom);
        break;
    case "style4":
        $class_content_tab = 'product-slider5';
        $class_item = 'item';
        if(empty($number_row)) $number_row = 1;
        if(empty($itemscustom)) $itemscustom='[0,1],[600,2],[980,3]'; else $itemscustom= s7upf_base64decode($itemscustom);
        break;
    case "style5":
        break;
    default:
        break;
}

if(!empty($data_item_tab) and is_array($data_item_tab)){ ?>
    <div class="woocommerce element-product-<?php echo esc_attr($style); ?> e-p-content-<?php echo esc_attr($style_product_content); ?> e-p-navigation-<?php echo esc_attr($style_nav_tab); ?> <?php echo esc_attr($extra_class)?>">
        <?php if(!empty($title)) { ?>
            <h2 class="title30 title-underline"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
        <div class="<?php echo esc_attr($class_nav_tab); ?>">
            <ul class="<?php echo esc_attr($class_nav_ul); ?>">
                <?php foreach ($data_item_tab as $key => $value){
                    if($key +1 == (int)$position_tab_active) $class_active = 'active'; else $class_active =''; ?>
                    <li class="<?php echo esc_attr($class_nav_li); ?> <?php echo esc_attr($class_active); ?>"><a class="<?php echo esc_attr($class_nav_a); ?>" href="#tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" data-toggle="tab"><?php if(!empty($value['title'])) echo do_shortcode($value['title']); ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content">
            <?php
            foreach ($data_item_tab as $key => $value){
                $link ='';
                if($key +1 == $position_tab_active) $class_active = 'active'; else $class_active =''; ?>
                <div id="tab-vip<?php echo esc_attr($key); echo esc_attr($time); ?>" class="tab-pane fade in <?php echo esc_attr($class_active); ?>">
                    <div class="<?php echo esc_attr($class_content_tab); ?>">
                        <div class="wrap-item group-navi center-navi" data-pagination="<?php echo esc_attr($pagination_slider); ?>" data-navigation="<?php echo esc_attr($navigation)?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[<?php echo esc_attr($itemscustom)?>]">
                            <?php
                            if(empty($value['product_number'])) $value['product_number']=12;
                            if ($value['order_by'] == 'best_seller') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'meta_key' => 'total_sales',
                                    'orderby' => 'meta_value_num',
                                    'post_status'    => 'publish',
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number']
                                );
                            } elseif ($value['order_by'] == 'top_rating') {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key' => '_wc_average_rating',
                                    'orderby'        => 'meta_value_num',
                                    'order'          => $value['order'],
                                    'meta_query'     => WC()->query->get_meta_query(),
                                    'tax_query'      => WC()->query->get_tax_query(),
                                );
                                $vip_args['meta_query'] = WC()->query->get_meta_query();
                            } elseif ($value['order_by'] == 'mostview'){
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'posts_per_page' => $value['product_number'],
                                    'meta_key'           => 'post_views',
                                    'order'             => $value['order'],
                                    'orderby'             => 'meta_value_num',
                                );
                            } else {
                                $vip_args = array(
                                    'post_type' => 'product',
                                    'post_status'    => 'publish',
                                    'orderby' => $value['order_by'],
                                    'order' => $value['order'],
                                    'posts_per_page' => $value['product_number'],
                                );
                            }

                            // filter by category
                            if (!empty($value['product_category'])) {
                                $list_cat = explode(",", $value['product_category']);
                                if ($list_cat[0] != '') {
                                    $vip_args['tax_query'][] = array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'slug',
                                        'terms' => $list_cat,
                                    );
                                }
                            }

                            // filter product is trending now
                            if (!empty($value['trending_now']) and $value['trending_now'] == 'yes') {
                                $vip_args['meta_query'][] = array(
                                    'key' => 'trending_now',
                                    'value' => 'yes',
                                    'compare' => 'LIKE'
                                );
                            }

                            // Filter product by feature
                            if (!empty($value['pro_feature']) and $value['pro_feature'] == 'yes') {
                                $vip_args['tax_query'][] = array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                    'operator' => 'IN',
                                );
                            }
                            if (!empty($value['pro_sale']) and $value['pro_sale'] == 'yes') {
                                $vip_args['post__in'] = array_unique( wc_get_product_ids_on_sale());
                            }
                            $vip_query = new WP_Query($vip_args);
                            //end vip query

                            $count_post = $vip_query->post_count;
                            $i = 1;

                            if($vip_query->have_posts()) {
                                $count_product= $vip_query->post_count;
                                while($vip_query->have_posts()) {
                                    $vip_query->the_post(); global $product; global $post;
                                    $discount_sale = s7upf_product_loop_discount_sale();
                                    $units_sold = get_post_meta( get_the_ID(), 'total_sales', true );
                                    //check number row
                                    if(($i % (int)$number_row == 1  || $number_row == 1) and $style_product_content !='style3') echo '<div class="'.$class_item.'">';
                                    switch ($style_product_content){
                                        case 'style1': ?>
                                        <div class="item-product">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="product-thumb product-thumb-gallery">

                                                        <?php
                                                        if('on' == $label_new){
                                                            echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                                        }
                                                        s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                                                        <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                        <?php
                                                        $thumb_gallery =  array();
                                                        $thumb_gallery = array(get_post_thumbnail_id( $post->ID ));
                                                        $thumb_gallery = array_merge($thumb_gallery,$product->get_gallery_image_ids());
                                                        $gallery_image = $product->get_gallery_image_ids();
                                                        if ( $thumb_gallery && !empty($gallery_image)) { ?>
                                                            <div class="thumb-gallery">
                                                                <?php
                                                                foreach ( $thumb_gallery as $key=>$attachment_id ) {
                                                                    if($key == 0) $class= 'active'; else $class='';
                                                                    echo '<a href="#" class="'.$class.'">';
                                                                    echo wp_get_attachment_image($attachment_id,$image_size);
                                                                    echo '</a>';
                                                                } ?>
                                                            </div>

                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="product-info">
                                                        <h3 class="product-title"><a href="<?php the_permalink(); ?>" class="shop-button"><?php the_title(); ?></a></h3>
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
                                                        <?php  if( has_excerpt( get_the_ID()) and (int)$word_excerpt_6 != 0){ ?>
                                                            <p class="desc">
                                                                <?php
                                                                echo wp_trim_words( get_the_excerpt(), (int)$word_excerpt_6 , '...' );
                                                                ?></p>
                                                        <?php } ?>
                                                        <div class="product-extra-link">
                                                            <?php
                                                            woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart'));
                                                            echo s7up_wishlist_url(esc_html__('Wishlist','shb'));
                                                            echo s7upf_compare_url(false,esc_html__('Compare','shb'));
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            break;
                                        case 'style2': ?>
                                            <div class="item-product-grid">
                                                <div class="product-thumb box-hover-dir">
                                                    <?php
                                                    if('on' == $label_new){
                                                        echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                                    }
                                                    s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>

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
                                                    <h3 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
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
                                            <?php
                                            break;
                                        case 'style3':
                                            ob_start();
                                            ?>
                                            <div class="item-product-gallery">
                                                <div class="product-thumb product-thumb-gallery">
                                                    <?php
                                                    if('on' == $label_new){
                                                        echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                                    }
                                                    s7upf_get_image_product_element($image_size_featured,$animation_img,$hide_mask_img); ?>

                                                    <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                    <div class="thumb-gallery">
                                                        <?php
                                                        $thumb_gallery =  array();
                                                        $thumb_gallery = array(get_post_thumbnail_id( $post->ID ));
                                                        $thumb_gallery = array_merge($thumb_gallery,$product->get_gallery_image_ids());
                                                        $gallery_image = $product->get_gallery_image_ids();
                                                        if ( $thumb_gallery && !empty($gallery_image)) { ?>
                                                            <div class="thumb-gallery">
                                                                <?php
                                                                foreach ( $thumb_gallery as $key=>$attachment_id ) {
                                                                    if($key == 0) $class= 'active'; else $class='';
                                                                    echo '<a href="#" class="'.$class.'">';
                                                                    echo wp_get_attachment_image($attachment_id,$image_size_featured);
                                                                    echo '</a>';
                                                                } ?>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
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
                                                        <?php }?>
                                                    </div>
                                                    <div class="product-extra-link">
                                                        <?php woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart')); ?>
                                                        <?php echo s7up_wishlist_url(esc_html__('Wishlist','shb')); ?>
                                                        <?php echo s7upf_compare_url(false,esc_html__('Compare','shb')); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            $item_product_gallery = @ob_get_clean();
                                            ob_start();
                                            ?>
                                            <div class="item-product item-product-grid">
                                                <div class="product-thumb box-hover-dir">
                                                    <?php
                                                    if('on' == $label_new){
                                                        echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                                    }
                                                    s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                                                    <div class="info-product-hover-dir">
                                                        <div class="inner-product-hover-dir">
                                                            <div class="content-product-hover-dir">
                                                                <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><?php echo esc_html__('Quick view ','shb')?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

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
                                            <?php
                                            $item_product_grid = @ob_get_clean();
                                            if($number_row>1) { ?>
                                                <?php if ($i % (5 * $number_row) == 1 || $count_product == 1) echo '<div class="item"><div class="row">'; ?>
                                                <?php if($position_item_gallery=='left'){ ?>
                                                    <?php if ($i % 10 == 1) echo '<div class="col-md-6 col-sm-6 col-xs-12 clear-both">'; ?>
                                                    <?php if ($i % 10 == 2 || $i % 10 == 4 || $i % 10 == 8) echo '<div class="col-md-3 col-sm-3 col-xs-12">'; ?>
                                                    <?php if ($i % 10 == 6) echo '<div class="col-md-3 col-sm-3 col-xs-12 clear-both">'; ?>
                                                    <?php if ($i % 10 == 0) echo '<div class="col-md-6 col-sm-6 col-xs-12">'; ?>
                                                <?php } else{
                                                     if ($i % 10 == 1) echo '<div class="col-md-3 col-sm-3 col-xs-12 clear-both">';
                                                     if ($i % 10 == 3|| $i % 10 == 7|| $i % 10 == 9) echo '<div class="col-md-3 col-sm-3 col-xs-12">';
                                                     if ($i % 10 == 6) echo '<div class="col-md-6 col-sm-6 col-xs-12 clear-both">';
                                                     if ($i % 10 == 5) echo '<div class="col-md-6 col-sm-6 col-xs-12">';
                                                } ?>
                                                <?php if($position_item_gallery=='left'){
                                                     if ($i % 10 == 1 ||$i % 10 == 0) {
                                                         echo do_shortcode($item_product_gallery);
                                                     } else {
                                                         echo do_shortcode($item_product_grid);
                                                     }
                                                }else{
                                                    if ($i % 10 == 5 ||$i % 10 == 6) {
                                                        echo do_shortcode($item_product_gallery);
                                                    } else {
                                                        echo do_shortcode($item_product_grid);
                                                    }
                                                } ?>

                                                <?php if($position_item_gallery=='left'){ ?>
                                                    <?php if ($i % 10 == 0 || $i == $count_product || $i % 10 == 3 || $i % 10 == 1||$i % 10 == 7 || $i % 10 == 9 || $i % 10 == 5) echo '</div>'; ?>
                                                <?php } else  if ($i % 10 == 0 || $i == $count_product || $i % 10 == 2 || $i % 10 == 4||$i % 10 == 5 || $i % 10 == 6 || $i % 10 == 8) echo '</div>'; ?>
                                                <?php if ($i % (5 * $number_row) == 0 || $i == $count_product || $count_product == 1) echo '</div></div><!-- End Item -->'; ?>
                                                <?php
                                            }else{
                                                if ($i % (5 * $number_row) == 1 || $count_product == 1) echo '<div class="item"><div class="row">'; ?>
                                                <?php if($position_item_gallery=='left'){
                                                   if ($i % 5 == 1) echo '<div class="col-md-6 col-sm-6 col-xs-12">';
                                                   if ($i % 5 == 2 || $i % 5 == 4) echo '<div class="col-md-3 col-sm-3 col-xs-12">';
                                                   if ($i % 5 == 1) {
                                                       echo do_shortcode($item_product_gallery);
                                                   } else {
                                                       echo do_shortcode($item_product_grid);
                                                   }
                                                    if ($i % 5 == 0 || $i == $count_product || $i % 5 == 3 || $i % 5 == 1) echo '</div>';
                                                }else{
                                                    if ($i % 5 == 0) echo '<div class="col-md-6 col-sm-6 col-xs-12">';
                                                    if ($i % 5 == 1 || $i % 5 == 3) echo '<div class="col-md-3 col-sm-3 col-xs-12">';
                                                    if ($i % 5 == 0) {
                                                        echo do_shortcode($item_product_gallery);
                                                    } else {
                                                        echo do_shortcode($item_product_grid);
                                                    }
                                                    if ($i % 5 == 2 || $i == $count_product || $i % 5 == 4 || $i % 5 == 0) echo '</div>';
                                                }?>
                                                <?php if ($i % (5 * $number_row) == 0 || $i == $count_product || $count_product == 1) echo '</div></div><!--End Item-->';
                                            }
                                            break;
                                        case 'style4': ?>
                                            <div class="item-product5 bg-white">
                                                <div class="item-product-grid">
                                                    <div class="product-thumb box-hover-dir">
                                                        <?php
                                                        if('on' == $label_new){
                                                            echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                                        }
                                                        s7upf_get_image_product_element($image_size,$animation_img,$hide_mask_img); ?>
                                                        <div class="info-product-hover-dir">
                                                            <div class="inner-product-hover-dir">
                                                                <div class="content-product-hover-dir">
                                                                    <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><?php echo esc_html__('Quick view ','shb')?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
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
                                            </div>
                                            <!-- End Item -->
                                            <?php
                                            break;
                                        case 'style5':
                                            break;
                                        default:
                                            break;
                                    }
                                    //check number row
                                    if(($i % (int)$number_row == 0 || $i == $count_post  || $number_row == 1) and $style_product_content !='style3') echo '</div>';
                                    $i=$i+1; ?>

                                <?php } wp_reset_postdata();
                            } ?>
                        </div>
                    </div>
                </div>
                <!-- End Tab -->
            <?php } ?>
        </div><!--tab content-->
        <?php
        $data_button = vc_build_link($button_link_6);
        if(!empty($data_button['title'])){ ?>
            <div class="text-center">
                <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']):'#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_button['rel'])) echo'rel="' .esc_attr( $data_button['rel'] ) . '"'?> class="viewall-button"><?php echo esc_attr($data_button['title']); ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
        <?php } ?>
    </div><!--wrap-->
    <?php
}

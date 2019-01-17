<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 18/10/2017
 * Time: 3:25 CH
 */
switch ($style){
    case 'style1': ?>
        <div class="element-top-bar1 header-phone  <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($icon)){ ?>
                <span class="header-phone-icon color"><i class="fa <?php echo esc_attr($icon); ?>" aria-hidden="true"></i></span>
            <?php } ?>
            <div>
                <?php if(!empty($content)) echo wpb_js_remove_wpautop($content,true); ?>
            </div>
        </div>
        <?php
        break;
    case 'style2':
        $class_color_icon = S7upf_Assets::build_css('color:'.$color_icon.';');
        $class_color_icon_search = S7upf_Assets::build_css('color:'.$color_icon.';',' .submit-form::after');
        ?>

        <ul class="element-top-bar2 meta-link-ontop list-inline-block <?php echo esc_attr($position); ?> <?php echo esc_attr($el_class); ?>">
            <?php if('on'==$show_search){ ?>
                <li>
                    <div class="search-ontop live-search-<?php if(class_exists('WC_Product')) echo esc_attr($search_live);?>">
                        <form class="search-form <?php echo esc_attr($class_color_icon_search); ?>" action = "<?php echo esc_url(home_url('/')); ?>">
                            <input  name="s" autocomplete="off" type="text" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search...','shb')?>">
                            <?php if(!empty($search_order_by)){ ?>
                                <input name="post_type" type="hidden" value="<?php echo esc_attr($search_order_by); ?>">
                            <?php } ?>
                            <div class="submit-form">
                                <input value="" type="submit">
                            </div>
                            <?php if($search_live == 'true'){?>
                                <div class="list-product-search">
                                    <div class="content-product-search">
                                        <p class="text-center"><?php echo esc_html__('Please enter key search to display results','shb')?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </li>
            <?php }
            if(!empty($data_social) and is_array($data_social)) {
                foreach ($data_social as $value) {
                    if (!empty($value['link'])) $data_link = vc_build_link($value['link']);
                    if (!empty($value['icon'])) { ?>
                        <li>
                            <a class="user-link <?php echo esc_attr($class_color_icon); ?>" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" ><i class="fa <?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></a>
                        </li>
                    <?php }
                }
            }
            if('on' == $show_mini_cart and class_exists('WC_Product')){ ?>
                <li>
                    <div class="mini-cart-box mini-cart-ontop">
                        <a class="mini-cart-link" href="#">
                            <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
                            <div class="total-default hidden"><?php echo wc_price(0)?></div>
                            <span class="mini-cart-icon  <?php echo esc_attr($class_color_icon); ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
                            <span class="mini-cart-number">
                    <span class="mb-count-ajax"><?php echo count( WC()->cart->get_cart() );?> </span>
                </span>
                        </a>
                        <div class="mini-cart-content">
                            <?php s7upf_mini_cart(); ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <?php
        break;
    default: ?>

        <?php
        break;
}
?>
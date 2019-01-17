<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 18/10/2017
 * Time: 8:48 SA
 */
?>
<ul class="meta-link-ontop list-inline-block pull-right">
    <?php if('on'==$show_search_scroll){ ?>
    <li>
        <div class="search-ontop live-search-<?php echo esc_attr($search_live_scroll);?>">
            <form class="search-form" action = "<?php echo esc_url(home_url('/')); ?>">
                <input  name="s" autocomplete="off" type="text" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search...','shb')?>">
                <?php if(!empty($search_order_by_scroll)){ ?>
                <input name="post_type" type="hidden" value="<?php echo esc_attr($search_order_by_scroll); ?>">
                <?php } ?>
                <div class="submit-form">
                    <input value="" type="submit">
                </div>
                <?php if($search_live_scroll == 'true'){ ?>
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
    if(!empty($data_social_scroll) and is_array($data_social_scroll)) {
        foreach ($data_social_scroll as $value) {
            if (!empty($value['link'])) $data_link = vc_build_link($value['link']);
            if (!empty($value['icon'])) { ?>
                <li>
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" class="user-link"><i class="fa <?php echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></a>
                </li>
            <?php }
        }
    }
    if('on' == $show_mini_cart_scroll and class_exists('WC_Product')){ ?>
    <li>
        <div class="mini-cart-box mini-cart-ontop">
            <a class="mini-cart-link" href="#">
                <input class="num-decimal" type="hidden" value="<?php echo get_option("woocommerce_price_num_decimals"); ?>">
                <div class="total-default hidden"><?php echo wc_price(0)?></div>
                <span class="mini-cart-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i></span>
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
<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 13/08/15
 * Time: 10:20 AM
 */
$main_color = s7upf_get_value_by_id('main_color');
?>
<?php
$style = '';

/*****BEGIN MAIN COLOR*****/
if(!empty($main_color)){
    list($r, $g, $b) = sscanf($main_color, "#%02x%02x%02x");
	$style .= '.main-nav>ul>li.active>a, .main-nav>ul>li.current-menu-ancestor>a,.main-nav .menu-item-has-children .sub-menu > li.active > a,.main-nav .menu-item-has-children .sub-menu > li.current-menu-ancestor > a,.widget_calendar table tbody td a,.widget_calendar table tfoot a,.sidebar .widget_nav_menu ul li > a:hover, .sidebar .widget_recent_comments ul li > a:hover, .sidebar .widget_meta ul li > a:hover, .sidebar .widget_pages ul li > a:hover, .sidebar .widget_categories ul li > a:hover, .sidebar .widget_recent_entries ul li > a:hover, .sidebar .widget_archive ul li > a:hover,.df-category-list a:hover,.df-title-post a:hover,.list-meta-block li .df-silver:hover,.df-post-item-style .df-post-info .list-meta-block i, .woocommerce .wishlist_table td.product-add-to-cart a,.comment-edit-link, .comment-reply-link,.pagination-blog .pagination .page-numbers:hover,.pagination-blog .pagination .page-numbers.next, .pagination-blog .pagination .page-numbers.prev,.woocommerce-account .woocommerce-MyAccount-content .edit-account fieldset legend,.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,.woocommerce div.product .woocommerce-variation-price span.price,.style-variation-label .swatch.selected,.filter-default a.active::before,.widget_product_categories ul.children a:hover,.menu-fixed .btn-menu-fixed,.control-button-gallery a i,.product-box5 .title-tab5 a:hover,.meta-link6 .search-form:hover .submit-form::after, .title-tab5 li.active a, .week-countdown .countdown-section,.week-countdown .countdown-section,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.banner-button.bg-white, .control-post .next-post:hover, .control-post .prev-post:hover, .single-post-info .desc a:hover, .single-tags a:hover,.item-massage-service .service-info .readmore::before, .item-massage-service .service-info .readmore:hover,.content-product-hover-dir .quickview-link,.btn-dashed,.list-category-dropdown:hover .link-cat-dropdown, .search-ontop:hover .search-form .submit-form::after,.nav-footer li a:hover,.contact-footer>p .fa,.social-footer a,.submit-form::after,.post-comment-date i, .post-format>a:hover,.slick-arrow,.product-title .shop-button:hover,.product-extra-link>a.addcart-link, .product-extra-link>a:hover,.woocommerce a.button.style_icon_cart:hover,.product-price .amount,.owl-theme .owl-controls .owl-buttons div,.shop-button,.viewall-button,.main-nav>ul>li:hover>a,.color,a:focus, a:hover
    {color: '.$main_color.' }'."\n";
    
    $style .= '.widget .btn-submit:hover,.widget_calendar table tfoot a:hover,.product-title .shop-button:hover::before, .dm-button, .dm-button-color, .woocommerce .wishlist_table td.product-add-to-cart a:hover,.pagination-blog .pagination .page-numbers.next:hover, .pagination-blog .pagination .page-numbers.prev:hover,.widget_tag_cloud a:hover, .widget_product_tag_cloud a:hover,.blockquote::after,.woocommerce-account .woocommerce-MyAccount-content .button,.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,#add_payment_method .wc-proceed-to-checkout a.checkout-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce-checkout .wc-proceed-to-checkout a.checkout-button,.woocommerce table.shop_table td.actions input[type="submit"],.woocommerce .mb-product-single-add-to-cart a.button.alt:hover,.range-filter .slider-range .ui-slider-handle.ui-state-default.ui-corner-all, .range-filter .btn-filter,.widget_product_categories .cat-parent i,.week-countdown.day-countdown .countdown-section,.woocommerce #review_form #respond .form-submit input:hover,.woocommerce div.product .woocommerce-tabs ul.tabs > li.active a:after,.woocommerce div.product .mb-product-single-add-to-cart form.cart .button:hover,.mb-popup-product.woocommerce button.button.alt:hover,.item-service4:hover .sevice-icon,.tab-cat-slider3 .thumb-gallery a.active::before,.list-title-tab3 li.active a,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.content-product-hover-dir .quickview-link:hover,.ef-lamp,.owl-theme .owl-controls .owl-page.active span::after,.btn-dashed:hover, .social-footer a:hover, .widget-post-tags .list-inline-block a:hover,.service-icon, .service-icon::after,.service-icon,.post-format span,.latest-news-intro::after, .slick-arrow:hover,.latest-news-intro::after, .slick-arrow:hover,.item-client.slick-active,.mini-cart-ontop .mini-cart-number,.product-thumb>.quickview-link,.owl-theme .owl-controls .owl-buttons div:hover,.tab-title li.active .shop-button,.shop-button:hover,.scroll-top.round,.underline-title::after,.bg-color
    {background: '.$main_color.' }'."\n";

    $style .= '.widget .btn-submit:hover,.popcat-item:hover, .pagination-blog .pagination .current,.pagination-blog .pagination .page-numbers:hover,.blockquote,.woocommerce-account .woocommerce-MyAccount-navigation,.widget-content-filter-product .style-attribute-type-label li.active,.widget_product_categories .cat-parent i,.gallery-control .carousel li a.active,.gallery-control .carousel li a.active,.header-general.header-border,.item-service4:hover .sevice-icon,.item-service4:hover,.list-title-tab3 li.active a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.title-box3,.content-product-hover-dir .quickview-link,.btn-dashed,.list-product-search:after,.list-product-search:before,.item-client.slick-active .client-thumb,.social-footer a,.newsletter-form form,.item-client,.product-title .shop-button:hover,.thumb-gallery a,.shop-button,.category-dropdown::after, .category-dropdown::before, .main-nav .sub-menu::after, .main-nav .sub-menu::before, .mini-cart-content::after, .mini-cart-content::before
    {border-color: '.$main_color.' }'."\n";

    $style .= '.item-service.bottom-right:hover::after,.item-service.top-right:hover::after
    {border-right-color: '.$main_color.' }'."\n";

    $style .= '.item-service.top-left:hover::after,.item-service.bottom-left:hover::after
    {border-left-color: '.$main_color.' }'."\n";

    $style .= '.item-service.top-right::after,.item-service.bottom-right::after
    {border-right-color: rgba('.$r.', '.$g.', '.$b.', 0.3);}'."\n";

    $style .= '.item-service.top-left::after,.item-service.bottom-left::after
    {border-left-color: rgba( '.$r.', '.$g.', '.$b.' , 0.3);}'."\n";

    $style .= '.list-instagram a:hover img
    {box-shadow: 0 0 0 1px '.$main_color.' ;}'."\n";

    $style .= '.range-filter .slider-range .ui-widget-header
    {background: rgba( '.$r.', '.$g.', '.$b.' , 0.7);}'."\n";

    $style .= '.range-filter .slider-range
    {background: rgba( '.$r.', '.$g.', '.$b.' , 0.2);}'."\n";

}
/*****END MAIN COLOR*****/



/*****BEGIN MENU COLOR*****/
$menu_color = s7upf_get_option('sv_menu_color');
$menu_hover = s7upf_get_option('sv_menu_color_hover');
$menu_active = s7upf_get_option('sv_menu_color_active');
$menu_color2 = s7upf_get_option('sv_menu_color2');
$menu_hover2 = s7upf_get_option('sv_menu_color_hover2');
$menu_active2 = s7upf_get_option('sv_menu_color_active2');
if(is_array($menu_color) && !empty($menu_color)){
    $style .= '.main-nav>ul>li>a{';
    $style .= s7upf_fill_css_typography($menu_color,' !important');
    $style .= '}'."\n";
}
if(!empty($menu_hover)){
    $style .= '.main-nav>ul>li:hover>a,
    .main-nav>ul>li>a:focus,
    .main-nav>ul>li.current-menu-item>a,
    .main-nav>ul>li.current-menu-ancestor>a
    {color:'.$menu_hover.' !important}'."\n";
}
if(!empty($menu_active)){
    $style .= '.main-nav>ul>li.current-menu-item>a,
    .main-nav>ul>li.current-menu-ancestor>a,
    .main-nav>ul>li:hover>a
    {background-color:'.$menu_active.' !important}'."\n";
}
// Sub menu
if(is_array($menu_color2) && !empty($menu_color2)){
    $style .= '.sub-menu>li>a{';
    $style .= s7upf_fill_css_typography($menu_color2,' !important');
    $style .= '}'."\n";
}
if(!empty($menu_hover2)){
    $style .= '.main-nav li:not(.has-mega-menu) .sub-menu li:hover >a,
    .main-nav li:not(.has-mega-menu) .sub-menu li>a:focus,
    .main-nav .sub-menu li.current-menu-item >a,
    .main-nav .sub-menu li.current-menu-ancestor >a
    {color:'.$menu_hover2.' !important}'."\n";
}
if(!empty($menu_active2)){
    $style .= '.main-nav li:not(.has-mega-menu) .sub-menu li:hover,
    .main-nav .sub-menu li.current-menu-item,
    .main-nav .sub-menu li.current-menu-ancestor
    {background-color:'.$menu_active2.' !important}'."\n";
}
/*****END MENU COLOR*****/
/*****BEGIN TYPOGRAPHY*****/
$typo_data = s7upf_get_option('s7upf_custom_typography');
if(is_array($typo_data) && !empty($typo_data)){
    foreach ($typo_data as $value) {
        switch ($value['typo_area']) {
            case 'header':
                $style_class = '#header';
                break;

            case 'footer':
                $style_class = '#footer';
                break;

            case 'widget':
                $style_class = '.widget';
                break;

            case 'body':
                $style_class = 'body';
                break;
            
            default:
                $style_class = '#content';
                break;
        }
        $class_array = explode(',', $style_class);
        $new_class = '';
        if(is_array($class_array)){
            foreach ($class_array as $prefix) {
                $new_class .= $prefix.' '.$value['typo_heading'].',';
            }
        }
        if(!empty($new_class)) $style .= $new_class.' .nocss{';
        if(!empty($value['typography_style']['font-color'])) $style .= 'color:'.$value['typography_style']['font-color'].';';
        if(!empty($value['typography_style']['font-family'])) $style .= 'font-family:'.$value['typography_style']['font-family'].';';
        if(!empty($value['typography_style']['font-size'])) $style .= 'font-size:'.$value['typography_style']['font-size'].';';
        if(!empty($value['typography_style']['font-style'])) $style .= 'font-style:'.$value['typography_style']['font-style'].';';
        if(!empty($value['typography_style']['font-variant'])) $style .= 'font-variant:'.$value['typography_style']['font-variant'].';';
        if(!empty($value['typography_style']['font-weight'])) $style .= 'font-weight:'.$value['typography_style']['font-weight'].';';
        if(!empty($value['typography_style']['letter-spacing'])) $style .= 'letter-spacing:'.$value['typography_style']['letter-spacing'].';';
        if(!empty($value['typography_style']['line-height'])) $style .= 'line-height:'.$value['typography_style']['line-height'].';';
        if(!empty($value['typography_style']['text-decoration'])) $style .= 'text-decoration:'.$value['typography_style']['text-decoration'].';';
        if(!empty($value['typography_style']['text-transform'])) $style .= 'text-transform:'.$value['typography_style']['text-transform'].';';
        $style .= '}';
        $style .= "\n";
    }
}

/*****END TYPOGRAPHY*****/

if(!empty($style)) print $style;
?>
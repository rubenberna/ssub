<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 6/13/17
 * Time: 1:46 PM
 */
if ( !class_exists('WC_Product') ) {
    return;
}
if(!function_exists('s7upf_vc_products'))
{
    function s7upf_vc_products($attr,$content = false)
    {
        $html = $style =$trending_now=$data_banner_4= $auto_filter= $button_link=$data_banner_3=$select_filter_box =$word_excerpt =$number_row=$pagination_slider= $navigation=$class  = $orderby_shop = $order_by_show =$extra_class  = $add_item_tab = $data_item_tab = $position_tab_active = $pagination = $title = $animation_img  = $secondary_color = $class_secondary_color = $col_layout = $main_color = $class_main_color = $itemscustom = $autoplay = $product_number =$order = $image_size = $order_by =$product_category = $select_tab = $pro_sale=  $filter_type = $pro_feature = $max_price = $min_price = '';
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'product_number'     => '12',
            'order_by' => 'date',
            'product_category' => '',
            'order' => 'DESC',
            'min_price'    => '',
            'max_price'    => '',
            'filter_type'    => '',
            'pro_feature'    => '',
            'pro_sale'    => '',
            'select_tab'    => '',
            'image_size'     => '',
            'word_excerpt'     => '30',
            'autoplay'     => 'true',
            'navigation'     => 'true',
            'pagination_slider'     => 'false',
            'itemscustom'     => '',
            'col_layout'     => '',
            'animation_img'     => 'animation_default',
            'title'     => '',
            'pagination'     => '',
            'position_tab_active'     => 1,
            'add_item_tab'     => '',
            'extra_class'     => '',
            'order_by_show'     => 'off',
            'number_row'     => '',
            'hide_mask_img'     => '',
            'select_attributes'     => '',
            'sort_by_price_product'     => '',
            'trending_now'     => 'no',
            'image_size_featured'     => '',
            'navigation_center'     => '',
            'type_add_to_cart'     => '',
            'select_filter_box'     => '',
            'label_new'     => 'off',
            'label_sale'     => 'on',
            'day_new'     => '10',
            'add_item_banner3'     => '',
            'button_link'     => '',
            'auto_filter'     => 'on',
            'add_item_banner4'     => '',
            'style_nav_tab'     => 'style1',
            'style_product_content'     => 'style1',
            'word_excerpt_6'     => '30',
            'button_link_6'     => '',
            'position_item_gallery'     => 'left',

        ),$attr));
        if(isset($add_item_banner3))
            $data_banner_3 = vc_param_group_parse_atts($add_item_banner3);
        if(isset($add_item_banner4))
            $data_banner_4 = vc_param_group_parse_atts($add_item_banner4);
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        if(isset($_GET['number']) and $auto_filter=='on'){
            $product_number = $_GET['number'];
        }
        if(!empty($add_item_tab))
            $data_item_tab = vc_param_group_parse_atts($add_item_tab);
        if ($order_by == 'popularity') {
            $args = array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'post_status'    => 'publish',
                'paged'             => $paged,
                'order' => $order,
                'posts_per_page' => $product_number
            );
        } elseif ($order_by == 'rating') {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => $product_number,
                'meta_key' => '_wc_average_rating',
                'orderby'        => 'meta_value_num',
                'paged'             => $paged,
                'order'          => $order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
            $args['meta_query'] = WC()->query->get_meta_query();
        } elseif ($order_by == 'mostview'){
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => $product_number,
                'meta_key'           => 'post_views',
                'order'             => $order,
                'orderby'             => 'meta_value_num',
            );
        } elseif ($order_by == 'price'){
            $args['orderby']  = "meta_value_num ID";
            $args['order']    = $order;
            $args['meta_key'] = '_price';
        }  else {
            $args = array(
                'post_type' => 'product',
                'post_status'    => 'publish',
                'orderby' => $order_by,
                'order' => $order,
                'posts_per_page' => $product_number,
                'paged'             => $paged,
            );
        }
        if(isset($_GET['orderby']) and $auto_filter=='on'){
            $orderby_shop = $_GET['orderby'];
        }
        switch ($orderby_shop) {
            case 'price' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'ASC';
                $args['meta_key'] = '_price';
                break;

            case 'price-desc' :
                $args['orderby']  = "meta_value_num ID";
                $args['order']    = 'DESC';
                $args['meta_key'] = '_price';
                break;

            case 'popularity' :
                $args['meta_key'] = 'total_sales';
                $args['order']    = 'DESC';
                add_filter( 'posts_clauses', array( WC()->query, 'order_by_popularity_post_clauses' ) );
                break;

            case 'rating' :
                $args['meta_key'] = '_wc_average_rating';
                $args['orderby'] = 'meta_value_num';
                $args['order'] = 'DESC';
                $args['meta_query'] = WC()->query->get_meta_query();
                $args['tax_query'][] = WC()->query->get_tax_query();
                break;

            case 'date':
                $args['orderby'] = 'date';
                $args['order'] = 'DESC';
                break;

            case 'mostview':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => $product_number,
                    'meta_key'           => 'post_views',
                    'order'             => 'DESC',
                    'orderby'             => 'meta_value_num',
                );
                break;

            case 'rand':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'rand',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'author':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'author',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'comment_count':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'comment_count',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            case 'title':
                $args = array(
                    'post_type' => 'product',
                    'post_status'    => 'publish',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'posts_per_page' => $product_number,
                    'paged'             => $paged,
                );
                break;

            default:
                $args= $args;
                break;
        }

        $attributes = wc_get_attribute_taxonomies();
        if(!empty($attributes)) {
            foreach ($attributes as $attribute) {
                if(isset($_GET['filter_'.$attribute->attribute_name]) and $auto_filter=='on'){
                    $filter = $_GET['filter_'.$attribute->attribute_name];
                    if(!empty($filter)){
                        $args['tax_query'][] = array(
                            'taxonomy' => 'pa_'.$attribute->attribute_name,
                            'field' => 'slug',
                            'terms' => $filter,
                            'operator' 		=> 'IN'
                        );
                    }
                }
            }
        }
        $min_price=0; $max_price=999999999;

        if(isset($_GET['min_price']) && isset($_GET['max_price']) && $auto_filter=='on'){
            $min_price=$_GET['min_price'];  $max_price=$_GET['max_price'];
            if($max_price > $min_price){
                $args['meta_query'][]=array(
                    'key' => '_price',
                    'value' => array($min_price, $max_price),
                    'compare' => 'BETWEEN',
                    'type' => 'NUMERIC'
                );
            }
        }

// filter by category
        if(!empty($_GET['product_cat']) and $auto_filter=='on') $product_category= $_GET['product_cat'];
        if (!empty($product_category)) {
            $list_cat = explode(",", $product_category);
            if ($list_cat[0] != '') {
                $args['tax_query'][] = array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $list_cat,
                );
            }
        }

        // filter product is trending now
        if ($trending_now == 'yes') {
            $args['meta_query'][] = array(
                'key' => 'trending_now',
                'value' => 'yes',
                'compare' => 'LIKE'
            );
        }

        // Filter product by feature
        if ($pro_feature == 'yes') {
            $args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'name',
                'terms'    => 'featured',
                'operator' => 'IN',
            );
        }

        //filter by pride
        $arr_post_in = array();
        if ($filter_type == 'price') {
            $arr_price = s7upf_price_filter($min_price, $max_price);
            if(count($arr_price)>0)
                $arr_post_in = array_merge($arr_post_in, $arr_price);

        }
        if ($pro_sale == 'yes') {

            if(count($arr_post_in)>0  or $filter_type == 'price') {
                $arr_post_in = array_intersect($arr_post_in, wc_get_product_ids_on_sale());

            }else{
                $arr_post_in = array_merge($arr_post_in, wc_get_product_ids_on_sale());
            }
        }
        if ($filter_type == 'browse') {
            if (isset($_COOKIE['sv_pro_cookie'])) {
                $pro_cookie = explode(',', $_COOKIE['sv_pro_cookie']);
                if (count($pro_cookie) > 0 ) {
                    if(count($arr_post_in)>0 or $pro_sale == 'yes' )
                        $arr_post_in = array_intersect($arr_post_in, $pro_cookie);
                    else
                        $arr_post_in = array_merge($arr_post_in, $pro_cookie);
                } else {
                    $html .= esc_html__('You have not viewed any products.', 'shb');
                    wp_reset_postdata();
                    return $html;
                }
            } else {
                $html .= esc_html__('You have not viewed any products.', 'shb');
                wp_reset_postdata();
                return $html;
            }
        }

        if(($filter_type == 'price' or $pro_sale == 'yes' or $filter_type == 'browse') and count($arr_post_in) < 1 ){
            $arr_post_in[0] = '-1';
            $args['post__in'] = array_unique($arr_post_in);
        }else{
            $args['post__in'] = array_unique($arr_post_in);
        }

        $pro_query = new WP_Query($args);

        //check main color
        if(!empty($main_color)){
            $class .= ' '.S7upf_Assets::build_css('color:'.$main_color.';', ' div.product span.price');

        }
        $default_image = get_template_directory_uri().'/assets/images/no-thumb/placeholder.png';
        //Check style
        $html .= S7upf_Template::load_view('elements/products/product', $style, array(
            'style' => $style,
            'image_size' => $image_size,
            'pro_query' => $pro_query,
            'word_excerpt' => $word_excerpt,//style 1, 10
            'autoplay' => $autoplay,
            'itemscustom' => $itemscustom,
            'col_layout' => $col_layout,
            'class_main_color' => $class_main_color,
            'class_secondary_color' => $class_secondary_color,
            'animation_img' => $animation_img,
            'title' => $title,
            'pagination' => $pagination,
            'paged'        => $paged,
            'product_category'        => $product_category,
            'args'        => $args,
            'position_tab_active'        => $position_tab_active,
            'data_item_tab'        => $data_item_tab,
            'extra_class'        => $extra_class,
            'orderby_shop'        => $orderby_shop,
            'order_by_show'        => $order_by_show,
            'class'        => $class,
            'navigation'        => $navigation,
            'pagination_slider'        => $pagination_slider,
            'number_row'        => $number_row,
            'hide_mask_img'     => $hide_mask_img,
            'select_attributes'     => $select_attributes,
            'sort_by_price_product'     => $sort_by_price_product,
            'image_size_featured'     => $image_size_featured,
            'navigation_center'     => $navigation_center,
            'type_add_to_cart'     => $type_add_to_cart,
            'select_filter_box'     => $select_filter_box,
            'args'     => $args,
            'label_new'     => $label_new,
            'label_sale'     => $label_sale,
            'day_new'     => $day_new,
            'default_image'     => $default_image,
            'data_banner_3'     => $data_banner_3,
            'button_link'     => $button_link,
            'data_banner_4'     => $data_banner_4,
            'style_nav_tab'     => $style_nav_tab,
            'style_product_content'     => $style_product_content,
            'word_excerpt_6'     => $word_excerpt_6,
            'button_link_6'     => $button_link_6,
            'position_item_gallery'     => $position_item_gallery,
        ));
        wp_reset_postdata();
        return $html;
    }
}
stp_reg_shortcode('s7upf_products','s7upf_vc_products');
add_action( 'vc_before_init_base','s7upf_sv_add_category_product_element',10,100 );
if ( ! function_exists( 's7upf_sv_add_category_product_element' ) ) {
    function s7upf_sv_add_category_product_element()
    {
        vc_map(array(
            'name' => esc_html__('SV Products', 'shb'),
            'base' => 's7upf_products',
            'category' => '7Up-theme',
            'icon' => 'icon-st',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Style element', 'shb'),
                    'param_name' => 'style',
                    'description' => esc_html__('Select style', 'shb'),
                    'value' => array(
                        esc_html__('Style 1 (Grid default)', 'shb') => 'style1',
                        esc_html__('Style 2 (List default)', 'shb') => 'style2',
                        esc_html__('Style 3 (List)', 'shb') => 'style3',
                        esc_html__('Style 4 (list)', 'shb') => 'style4',
                        esc_html__('Style 5 (Slider)', 'shb') => 'style5',
                        esc_html__('Style 6 (Tab-slider)', 'shb') => 'style6',
                        esc_html__('Style 7 (list)', 'shb') => 'style7',

                    ),
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_product',
                    'heading' => '',
                    'element' => 'style',
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__(' Tab navigation style', 'shb'),
                    'param_name' => 'style_nav_tab',
                    'description' => esc_html__('Select style', 'shb'),
                    'value' => array(
                        esc_html__('Style 1', 'shb') => 'style1',
                        esc_html__('Style 2', 'shb') => 'style2',
                        esc_html__('Style 3', 'shb') => 'style3',
                        esc_html__('Style 4', 'shb') => 'style4',
                        esc_html__('Style 5', 'shb') => 'style5',
                        esc_html__('Style 6', 'shb') => 'style6',
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style6')
                    ),
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_product_nav_tab',
                    'heading' => '',
                    'element' => 'style_nav_tab',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style6')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'heading' => esc_html__('Product content style', 'shb'),
                    'param_name' => 'style_product_content',
                    'description' => esc_html__('Select style', 'shb'),
                    'value' => array(
                        esc_html__('Style 1', 'shb') => 'style1',
                        esc_html__('Style 2', 'shb') => 'style2',
                        esc_html__('Style 3', 'shb') => 'style3',
                        esc_html__('Style 4', 'shb') => 'style4',
                        esc_html__('Style 5', 'shb') => 'style5',
                        esc_html__('Style 6', 'shb') => 'style6',
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style6')
                    ),
                ),
                array(
                    'type' => 's7up_image_check',
                    'param_name' => 'style_product_content_tab',
                    'heading' => '',
                    'element' => 'style_product_content',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style6')
                    ),
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title element', 'shb'),
                    'param_name' => 'title',
                    'description' => esc_html__('Enter text', 'shb'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5')
                    ),
                ),

                array(
                    'type' => 'param_group',
                    'heading' => esc_html__('Add tab item', 'shb'),
                    'param_name' => 'add_item_tab',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__( 'Title tab', 'shb' ),
                            'param_name' => 'title',
                            'admin_label' => true,
                            'description' => esc_html__('Enter text.','shb'),
                        ),
                        array(
                            'type' => 's7up_number',
                            'heading' => esc_html__('Number products', 'shb'),
                            'param_name' => 'product_number',
                            'min' => 1,
                            'value'=> 12,
                            'suffix' => esc_html__('product', 'shb'),
                            'description' => esc_html__('Enter a number to show product in page', 'shb'),

                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Product featured', 'shb'),
                            'param_name' => 'pro_feature',
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'std' => '',
                            'description' => esc_html__('Check the box to filter products is feature', 'shb'),
                            'value' => array(
                                esc_html__("No", 'shb') => '',
                                esc_html__("Yes", 'shb') => 'yes'
                            ),
                        ),

                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Products on sale', 'shb'),
                            'param_name' => 'pro_sale',
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => array(
                                esc_html__("No", 'shb') => '',
                                esc_html__("Yes", 'shb') => 'yes'
                            ),
                            'std' => '',
                            'description' => esc_html__('Check the box to filter products is on sale', 'shb')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Products trending filter','shb'),
                            'param_name' => 'trending_now',
                            'edit_field_class' => 'vc_column vc_col-sm-4',
                            'value' => array(
                                esc_html__("No", 'shb') => '',
                                esc_html__("Yes", 'shb') => 'yes'
                            ),
                            'std' => '',
                            'description' => esc_html__('Check the box to filter products is trending','shb'),
                        ),


                        array(
                            'type' => 'checkbox',
                            'holder' => 'div',
                            'heading' => esc_html__('Select categories', 'shb'),
                            'param_name' => 'product_category',
                            'description' => esc_html__('Check the box to choose category', 'shb'),
                            'value' => s7upf_list_taxonomy('product_cat',false),
                            'edit_field_class' => 's7upf-category-option vc_col-sm-12',
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order by', 'shb'),
                            'param_name' => 'order_by',
                            'value' => s7upf_convert_array(s7upf_get_order_list_shop()),
                            'edit_field_class' => 'vc_col-sm-6',

                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order', 'shb'),
                            'param_name' => 'order',
                            'value' => array(
                                esc_html__("Descending", 'shb') => 'DESC',
                                esc_html__("Ascending", 'shb') => 'ASC'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),

                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style6')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number products', 'shb'),
                    'param_name' => 'product_number',
                    'min' => 1,
                    'value'=> 12,
                    'suffix' => esc_html__('product', 'shb'),
                    'description' => esc_html__('Enter a number to show product in page', 'shb'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),

                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Filter type', 'shb'),
                    'param_name' => 'filter_type',
                    'value' => array(
                        esc_html__('None', 'shb') => '',
                        esc_html__('Filter By Price', 'shb') => 'price',
                        esc_html__('Browse History', 'shb') => 'browse'
                    ),
                    'description' => esc_html__('Select a filter type', 'shb'),
                    'std' => '',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'min' => 0,
                    'max' => 999999999,
                    'heading' => esc_html__('Min price (*)', 'shb'),
                    'param_name' => 'min_price',
                    'suffix'    => get_woocommerce_currency_symbol(),
                    'description' => esc_html__('Enter a min price', 'shb'),
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'min' => 0,
                    'max' => 999999999,
                    'heading' => esc_html__('Max price (*)', 'shb'),
                    'param_name' => 'max_price',
                    'suffix'    => get_woocommerce_currency_symbol(),
                    'description' => esc_html__('Enter a max price', 'shb'),
                    'dependency' => array(
                        'element' => 'filter_type',
                        'value' => array('price')
                    ),
                    'edit_field_class' => 'vc_column vc_col-sm-6'
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Product featured', 'shb'),
                    'param_name' => 'pro_feature',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'std' => 'no',
                    'description' => esc_html__('Check the box to filter products is feature', 'shb'),
                    'value' => array(
                        esc_html__('Product featured', 'shb') => 'yes'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),

                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Products on sale', 'shb'),
                    'param_name' => 'pro_sale',
                    'value' => array(
                        esc_html__('Product On Sale', 'shb') => 'yes'
                    ),
                    'std' => 'no',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                    'description' => esc_html__('Check the box to filter products is on sale', 'shb')
                ),

                array(
                    'type' => 'checkbox',
                    'heading' => esc_html__('Products trending filter','shb'),
                    'param_name' => 'trending_now',
                    'edit_field_class' => 'vc_column vc_col-sm-4',
                    'value' => array(
                        esc_html__('Trending Now','shb') => 'yes'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                    'std' => 'no',
                    'description' => esc_html__('Check the box to filter products is trending','shb'),
                ),
                array(
                    'type' => 'checkbox',
                    'holder' => 'div',
                    'heading' => esc_html__('Select categories', 'shb'),
                    'param_name' => 'product_category',
                    'description' => esc_html__('Check the box to choose category', 'shb'),
                    'value' => s7upf_list_taxonomy('product_cat',false),
                    'edit_field_class' => 's7upf-category-option vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                ),


                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order by', 'shb'),
                    'param_name' => 'order_by',
                    'value' => s7upf_convert_array(s7upf_get_order_list_shop()),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order', 'shb'),
                    'param_name' => 'order',
                    'value' => array(
                        esc_html__("Descending", 'shb') => 'DESC',
                        esc_html__("Ascending", 'shb') => 'ASC'
                    ),
                    'edit_field_class' => 'vc_col-sm-6',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2','style3','style4','style5','style7')
                    ),
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Pagination bar', 'shb'),
                    'param_name' => 'pagination',
                    'description' => esc_html__( 'This allows you to hide or show the pagination bar.', 'shb' ),
                    'value' => array(
                        esc_html__("Off", 'shb') => '',
                        esc_html__("On", 'shb') => 'on'
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show bar order by', 'shb'),
                    'param_name' => 'order_by_show',
                    'value' => array(
                        esc_html__('Off', 'shb') => 'off',
                        esc_html__('On', 'shb') => 'on',
                    ),
                    'edit_field_class' => 'vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2')
                    )
                ),

                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'shb' ),
                    'param_name' => 'button_link',
                    'description' => esc_html__('Enter Link/URL', 'shb'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style3','style4','style7')
                    )
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Add button', 'shb' ),
                    'param_name' => 'button_link_6',
                    'description' => esc_html__('Enter Link/URL', 'shb'),
                    'dependency' => array(
                        'element' => 'style_product_content',
                        'value' => array('style1')
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Extra class name','shb'),
                    'param_name' => 'extra_class',
                    'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','shb'),
                ),
                //-------------------Design Option----------------

                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Position tab active', 'shb'),
                    'param_name' => 'position_tab_active',
                    'description' => esc_html__( 'Select the active tab position (From left to right)', 'shb' ),
                    'std' => 1,
                    'min' => 1,
                    'suffix' => esc_html__('Position', 'shb'),
                    'edit_field_class' => 'vc_col-sm-12',
                    'group' => esc_html__('Design Option','shb'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style6')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Column layout', 'shb'),
                    'param_name' => 'col_layout',
                    'group' => esc_html__('Design Option','shb'),
                    'description' => esc_html__( 'This allows you to change the number column of the product grid.', 'shb' ),
                    'value' => array(
                        esc_html__('Default','shb')=>'',
                        esc_html__('4 columns','shb')=>'3',
                        esc_html__('3 columns','shb')=>'4',
                        esc_html__('2 columns','shb')=>'6',
                        esc_html__('1 column','shb')=>'12',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style1','style2')
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Show select filter', 'shb' ),
                    'param_name' => 'select_filter_box',
                    'value' => array(
                        esc_html__('Off','shb')=>'',
                        esc_html__('On','shb')=>'on',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style8')
                    ),
                    'description' => esc_html__( 'Enable box filter.', 'shb' )
                ),

                array(
                    'type' => 'textarea_raw_html',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Custom number item by device (Structure: ["Width of device (unit: px)","Number item"])', 'shb' ),
                    'param_name' => 'itemscustom',
                    'edit_field_class'=>'vc_col-sm-12 vc_column mb-style-itemscustom',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style5','style6')
                    ),
                    'description' => esc_html__( 'EX: [0,2],[480,3],[768,4],[990,5],[1200,6]', 'shb' )
                ),

                array(
                    'type' => 'dropdown',
                    'admin_label' => true,
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Custom row Slider', 'shb' ),
                    'param_name' => 'number_row',
                    'value' => array(
                        esc_html__('Default','shb')=>'',
                        esc_html__('1 Row','shb')=>1,
                        esc_html__('2 Rows','shb')=>2,
                        esc_html__('3 Rows','shb')=>3,
                        esc_html__('4 Rows','shb')=>4,
                        esc_html__('5 Rows','shb')=>5,
                        esc_html__('6 Rows','shb')=>6,
                        esc_html__('7 Rows','shb')=>7,
                        esc_html__('8 Rows','shb')=>8,
                        esc_html__('9 Rows','shb')=>9,
                        esc_html__('10 Rows','shb')=>10,
                        esc_html__('15 Rows','shb')=>15,
                        esc_html__('20 Rows','shb')=>20,
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style5','style6')
                    ),
                    'description' => esc_html__( 'Select number row of slides.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Auto play silder', 'shb' ),
                    'param_name' => 'autoplay',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style5','style6')
                    ),
                    'value' => array(
                        esc_html__('On','shb') => 'true',
                        esc_html__('Off','shb') => 'false',

                    ),
                    'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Navigation silder', 'shb' ),
                    'param_name' => 'navigation',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style5','style6')
                    ),
                    'value' => array(
                        esc_html__('On','shb') => 'true',
                        esc_html__('Off','shb') => 'false',

                    ),
                    'description' => esc_html__( 'This allows you to enable or disable navigation of slider.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Pagination silder', 'shb' ),
                    'param_name' => 'pagination_slider',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style5','style6')
                    ),
                    'value' => array(
                        esc_html__('Off','shb') => 'false',
                        esc_html__('On','shb') => 'true',

                    ),
                    'description' => esc_html__( 'This allows you to enable or disable pagination of slider.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Animation image', 'shb' ),
                    'param_name' => 'animation_img',
                    'value' => array(
                        esc_html__('None','shb') => 'animation_default',
                        esc_html__('Zoom','shb') => 'zoom-thumb',
                        esc_html__('Zoom out','shb') => 'zoom-out',
                        esc_html__('Zoom rotate','shb') => 'zoom-rotate',
                        esc_html__('Fade out in','shb') => 'fade-out-in',
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7')
                    ),
                    'description' => esc_html__( 'This allows you to change animation image product.', 'shb' )
                ),
                array(
                    'type' => 'checkbox',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Hide over mask of image', 'shb' ),
                    'param_name' => 'hide_mask_img',
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value' => array('style1','style2','style3','style4','style5','style6','style7')
                    ),
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number word excerpt', 'shb'),
                    'param_name' => 'word_excerpt',
                    'group' => esc_html__('Design Option','shb'),
                    'min' => 1,
                    'value'=>30,
                    'suffix' => esc_html__('word', 'shb'),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style1','style2')
                    ),
                    'description' => esc_html__('Custom number word excerpt (default 30 word)', 'shb')
                ),
                array(
                    'type' => 's7up_number',
                    'heading' => esc_html__('Number word excerpt', 'shb'),
                    'param_name' => 'word_excerpt_6',
                    'group' => esc_html__('Design Option','shb'),
                    'min' => 1,
                    'value'=>30,
                    'suffix' => esc_html__('word', 'shb'),
                    'dependency' => array(
                        'element' => 'style_product_content',
                        'value' => array('style1')
                    ),
                    'description' => esc_html__('Custom number word excerpt (default 30 word)', 'shb')
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Add to cart types', 'shb' ),
                    'param_name' => 'type_add_to_cart',
                    'value' => array(
                        esc_html__('Default','shb') => '',
                        esc_html__('Add to cart button','shb') => 'add_cart',
                        esc_html__('Add to cart button and view cart button','shb') => 'add_view_cart',
                        esc_html__('view cart button','shb') => 'view_cart',
                    ),
                    'dependency' => array(
                        'element' => 'style',
                        'value' => array('style5')
                    ),
                    'description' => esc_html__( 'Types the add to cart action.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Label sale', 'shb' ),
                    'param_name' => 'label_sale',
                    'value' => array(
                        esc_html__('On','shb') => 'on',
                        esc_html__('Off','shb') => 'off',
                    ),
                    'description' => esc_html__( 'This allows you to control sticker display for products which are marked as Sale off in wooCommerce.', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Label new', 'shb' ),
                    'param_name' => 'label_new',
                    'value' => array(
                        esc_html__('Off','shb') => 'off',
                        esc_html__('On','shb') => 'on',
                    ),
                    'description' => esc_html__( 'This allows you to control sticker display for products which are marked as NEW in wooCommerce.', 'shb' )
                ),
                array(
                    'type' => 's7up_number',
                    'group' => esc_html__('Design Option','shb'),
                    'heading' => esc_html__( 'Number of days for new product', 'shb' ),
                    'param_name' => 'day_new',
                    'min' => 1,
                    'value'=>10,
                    'dependency' => array(
                        'element' => 'label_new',
                        'value' => array('on')
                    ),
                    'suffix' => esc_html__('Day', 'shb'),
                    'description' => esc_html__( 'Specify the No of days before to be disaplay product as New (Default 10 days).', 'shb' )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Automated filtering by link','shb'),
                    'group' => esc_html__('Design Option','shb'),
                    'param_name' => 'auto_filter',
                    'value' => array(
                        esc_html__('On','shb')=>'on',
                        esc_html__('Off','shb')=>'off',
                    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Position item product gallery','shb'),
                    'group' => esc_html__('Design Option','shb'),
                    'param_name' => 'position_item_gallery',
                    'value' => array(
                        esc_html__('Left','shb')=>'left',
                        esc_html__('Right','shb')=>'right',
                    ),
                    'dependency' => array(
                        'element' => 'style_product_content',
                        'value' => array('style3')
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image Size', 'shb'),
                    'param_name' => 'image_size',
                    'group' => esc_html__('Design Option','shb'),
                    'edit_field_class' => 'vc_column vc_col-sm-12',
                    'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Image size featured', 'shb'),
                    'param_name' => 'image_size_featured',
                    'group' => esc_html__('Design Option','shb'),
                    'edit_field_class' => 'vc_column vc_col-sm-12',
                    'dependency' => array(
                        'element' => 'style_product_content',
                        'value' => array('style3')
                    ),
                    'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
                ),
                // param group banner style 3
                array(
                    'type' => 'param_group',
                    'group' => esc_html__('Banner Option','shb'),
                    'heading' => esc_html__('Add banner item', 'shb'),
                    'param_name' => 'add_item_banner3',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Background image', 'shb' ),
                            'param_name' => 'bg_image',
                            'description' => esc_html__('Select image from library.','shb'),
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__( 'Link background image', 'shb' ),
                            'param_name' => 'bg_link',
                        ),
                        array(
                            'type' => 's7up_number',
                            'heading' => esc_html__( 'Custom position banner', 'shb' ),
                            'param_name' => 'position',
                            'min'=>1,
                        ),
                        array(
                            'type' => 'textarea_raw_html',
                            'heading' => esc_html__( 'Info banner', 'shb' ),
                            'param_name' => 'info',
                            'description' => esc_html__('Enter text.','shb'),
                        ),

                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style3')
                    ),
                ),
                // param group banner style 4
                array(
                    'type' => 'param_group',
                    'group' => esc_html__('Banner Option','shb'),
                    'heading' => esc_html__('Add banner item', 'shb'),
                    'param_name' => 'add_item_banner4',
                    'value' =>'',
                    'params' => array(
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__( 'Background image', 'shb' ),
                            'param_name' => 'bg_image',
                            'description' => esc_html__('Select image from library.','shb'),
                        ),
                        array(
                            'type' => 'vc_link',
                            'heading' => esc_html__( 'Link background image', 'shb' ),
                            'param_name' => 'bg_link',
                        ),
                        array(
                            'type' => 'textarea_raw_html',
                            'heading' => esc_html__( 'Info banner', 'shb' ),
                            'param_name' => 'info',
                            'description' => esc_html__('Enter text.','shb'),
                        ),

                    ),
                    'callbacks' => array(
                        'after_add' => 'vcChartParamAfterAddCallback'
                    ),
                    'dependency'    =>array(
                        'element'   =>'style',
                        'value'     =>array('style4')
                    ),
                ),

            )
        ));
    }
}

add_action( 'wp_ajax_load_select_filter_product', 's7upf_load_select_filter_product' );
add_action( 'wp_ajax_nopriv_load_select_filter_product', 's7upf_load_select_filter_product' );
if(!function_exists('s7upf_load_select_filter_product')){
    function s7upf_load_select_filter_product() {
        $select_filter = $_POST['select_filter'];
        $bg_img_even = $_POST['bg_img_even'];
        $bg_img_odd = $_POST['bg_img_odd'];
        $number_row = $_POST['number_row'];
        $image_size = $_POST['image_size'];
        $animation_img = $_POST['animation_img'];
        $hide_mask_img = $_POST['hide_mask_img'];
        $data_load = $_POST['data_load1'];
        $data_load = str_replace('\"', '"', $data_load);
        $data_load = json_decode($data_load,true);
        $args = $data_load['args'];
        $html = '';

        if($select_filter == 'price_asc'){
            $args['orderby']  = "meta_value_num ID";
            $args['order']    = 'ASC';
            $args['meta_key'] = '_price';
        }else if($select_filter == 'price_desc'){
            $args['orderby']  = "meta_value_num ID";
            $args['order']    = 'DESC';
            $args['meta_key'] = '_price';
        }else if($select_filter == 'title_asc'){
            $args['orderby']  = "title";
            $args['order']    = 'ASC';
        }else if($select_filter == 'title_desc'){
            $args['orderby']  = "title";
            $args['order']    = 'DESC';
        }
        $query = new WP_Query($args);

        $class_bg_even = 'bg_even '.S7upf_Assets::build_css('background:'.$bg_img_even.';');
        $class_bg_odd = 'bg_odd '.S7upf_Assets::build_css('background:'.$bg_img_odd.';');
        if($query->have_posts()) {
            $i = 1;
            $j = 1;
            $k = 1;
            $count_product = $query->post_count;
            while ($query->have_posts()) {
                $query->the_post();
                if ($j % 2 == 1) {
                    if ($i % 2 == 0) {
                        $class_bg_img = $class_bg_even;
                    } else {
                        $class_bg_img = $class_bg_odd;
                    }
                } else {
                    if ($k % 2 == 1) {
                        $class_bg_img = $class_bg_even;
                    } else {
                        $class_bg_img = $class_bg_odd;
                    }
                    if ($k >= (int)$number_row) $k = 1;
                    else $k++;

                }
                if ($i % (int)$number_row == 1 || $count_product == 1 || $number_row == 1) $html .= '<div class="item">';

                $html .= S7upf_Template::load_view('elements/products/data-load-ajax', false, array(
                    'class_bg_img' => $class_bg_img,
                    'image_size' => $image_size,
                    'animation_img' => $animation_img,
                    'hide_mask_img' => $hide_mask_img,
                    'hide_mask_img' => $hide_mask_img,
                ));
                if ($i % (int)$number_row == 0 || $i == $count_product || $count_product == 1 || $number_row == 1) $html .= '</div>';
                $i = $i + 1;
                if ($i % (int)$number_row == 1) $j++;
            }
        }
        echo do_shortcode($html);
        wp_reset_postdata();
        die();
    }
}
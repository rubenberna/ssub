<?php
/**
 * Created by PhpStorm
 * User: up7theme
 * Date: 29/02/16
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_blog'))
{
    function s7upf_vc_blog($attr)
    {
        $html = $itemscustom =$button_view=$load_more=$posi_navigation=$number_row=$hide_date=$hide_author=$hide_category=$hide_tags=$autoplay = $extra_class = $navigation = $title=$date_format = $main_color = $user_id = $col_layout = $style = $post_id = $word_excerpt = $image_size = $pagination = $number = $order_by = $order = '';
        extract(shortcode_atts(array(
            'number'     => '8',
            'word_excerpt'    => '30',
            'cats'      => '',
            'order'      => '',
            'order_by'   => '',
            'style'   => 'style1',
            'image_size'   => '',
            'pagination'   => 'off',
            'post_id'   => '',
            'user_id'   => 'off',
            'col_layout'   => '4',
            'date_format'   => '',
            'video_height'   => '',
            'title'   => '',
            'navigation'   => 'true',
            'autoplay'   => 'true',
            'itemscustom'   => '',
            'extra_class'   => '',
            'number_row'   => '',
            'posi_navigation'   => 'center-navi',
            'load_more'   => 'off',
            'button_view'   => '',
        ),$attr));
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged,
            'post_status' => 'publish',
        );
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if($order_by == 'time_update'){
            $args['orderby'] = 'meta_value';
            $args['meta_key'] = 'time_update';
        }
        if($order_by == '_post_like_count'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_post_like_count';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query'][]=array(
                'taxonomy'=>'category',
                'field'=>'slug',
                'terms'=> $custom_list
            );
        }
        $query = new WP_Query($args);
        if($user_id == 'on' and !empty($post_id)){
            $ids_arr = explode(',', $post_id);
            $ids_arr = array_unique($ids_arr);
            $args2 = array(
                'post_type' => 'post',
                'post__in'=>$ids_arr,
                'posts_per_page'    => $number,
                'paged'             => $paged,
                'post_status' => 'publish',
                'order'             => $order,
                'orderby'           => $order_by,
            );
            $query = new WP_Query($args2);
        }
        $max_page = $query->max_num_pages;
        if('style3' == $style ) {
            $html .= '<div class="element-blog-style3 list-blog-full '. esc_attr($extra_class).'">
        <div class="row blog-content-ajax">';
        }
        $html .= S7upf_Template::load_view('elements/blog/blog',$style,array(
            'query' => $query,
            'word_excerpt' => $word_excerpt,
            'image_size' => $image_size,
            'pagination' => $pagination,
            'paged' => $paged,
            'col_layout' => $col_layout,
            'main_color' => $main_color,
            'date_format' => $date_format,
            'style' => $style,
            'title' => $title,
            'navigation' => $navigation,
            'autoplay' => $autoplay,
            'itemscustom' => $itemscustom,
            'extra_class' => $extra_class,
            'number_row' => $number_row,
            'posi_navigation' => $posi_navigation,
            'load_more' => $load_more,
            'button_view' => $button_view,
        ));
        if('style3' == $style ){
            $html .='</div>';
            if($max_page>1 and 'on' == $load_more){
                $html .='  <div class="loadmore text-center"><a href="#" class="shop-button blog-button-ajax" data-postid = "'.$post_id.'"  data-imgsize = "'.$image_size.'" data-collayout = "'.$col_layout.'" data-wordexcerpt = "'.$word_excerpt.'" data-cat="'.$cats.'" data-userid="'.$user_id.'" data-number="'.$number.'"  data-order="'.$order.'" data-orderby="'.$order_by.'" data-paged="1"  data-maxpage="'.$max_page.'" data-formatdate="'.$date_format.'">'. esc_html__('Load more','shb').'</a></div>';
            }

            $html .='</div>';

            if('on' === $pagination and 'off'==$load_more){
                $html .='<div class="pagination-blog navigation paging-navigation"><div class="pagination loop-pagination">';

                        $big = 999999999;
                $html .= paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format' => '&page=%#%',
                            'current' => max(1, $paged),
                            'total' => $query->max_num_pages,
                            'mid_size' => 1,
                            'type' => 'plain',
                            'prev_text' => '<i class="fa fa-arrow-circle-left"></i>',
                            'next_text' => '<i class="fa fa-arrow-circle-right"></i>',
                        ));
                $html .='</div> </div>';
            }
        }

        wp_reset_postdata();
        return $html;
    }
}

stp_reg_shortcode('s7upf_blog','s7upf_vc_blog');

vc_map( array(
    "name"      => esc_html__("SV Blog", 'shb'),
    "base"      => "s7upf_blog",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style blog",'shb'),
            "param_name" => "style",
            'admin_label' => true,
            'description'   => esc_html__( 'Select style blog.', 'shb' ),
            "value"         => array(
                esc_html__('Style 1 (Default)','shb') => 'style1',
                esc_html__('Style 2 (Classic)','shb') => 'style2',
                esc_html__('Style 3 (Classic)','shb') => 'style3',
                esc_html__('Style 4 (Classic)','shb') => 'style4',
                esc_html__('Style 5 (Slider)','shb') => 'style5',
                esc_html__('Style 6 (slider)','shb') => 'style6',
                esc_html__('Style 7 (list)','shb') => 'style7',
            ),
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_blog',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            "heading" => esc_html__("Title element",'shb'),
            'description' => esc_html__( 'Enter text', 'shb' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style6')
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Use ID post",'shb'),
            "param_name" => "user_id",
            'admin_label' => true,
            "value"         => array(
                esc_html__('Off','shb') => 'off',
                esc_html__('On','shb') => 'on',
            ),
        ),
        array(
            'type' => 'autocomplete',
            'heading' => esc_html__( 'Posts', 'shb' ),
            'param_name' => 'post_id',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'unique_values' => true,
                // In UI show results except selected. NB! You should manually check values in backend
            ),
            'save_always' => true,
            'description' => esc_html__( 'Enter List of Posts', 'shb' ),
            'dependency'    =>array(
                'element'   =>'user_id',
                'value'     =>array('on')
            ),
        ),
        array(
            "type" => "s7up_number",
            "heading" => esc_html__("Number post",'shb'),
            "param_name" => "number",
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'admin_label' => true,
            'std' => 8,
            "min" => 0,
            'suffix' => esc_html__('Post','shb'),
        ),
        array(
            'holder'     => 'div',
            'heading'     => esc_html__( 'Categories', 'shb' ),
            'type'        => 'checkbox',
            'param_name'  => 'cats',
            'value'       => s7upf_list_taxonomy('category',false),
            'edit_field_class'=>'vc_col-sm-12 vc_column s7upf-category-option',
            'dependency'    =>array(
                'element'   =>'user_id',
                'value'     =>array('off')
            ),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order",'shb'),
            "param_name"    => "order",
            "value"         => array(
                esc_html__('Desc','shb') => 'DESC',
                esc_html__('Asc','shb')  => 'ASC',
            ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',

        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Order By",'shb'),
            "param_name"    => "order_by",
            "value"         => s7upf_get_order_list(),
            'edit_field_class'=>'vc_col-sm-6 vc_column',

        ),

        array(
            "type" => "s7up_number",
            "heading" => esc_html__("Number word excerpt",'shb'),
            "param_name" => "word_excerpt",
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            "min" => 0,
            'suffix' => esc_html__('word','shb'),
            'std'=>30
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Enable Pagination', 'shb'),
            'param_name' => 'pagination',
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'value' => array(
                esc_html__("Off", 'shb') => 'off',
                esc_html__("On", 'shb') => 'on'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style3')
            ),

        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class Name','shb'),
            'param_name' => 'extra_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','shb'),
        ),

        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__('Column layout', 'shb'),
            'param_name' => 'col_layout',
            'value' => array(
                esc_html__("Columns 1", 'shb') => '12',
                esc_html__("Columns 2", 'shb') => '6',
                esc_html__("Columns 3", 'shb') => '4',
                esc_html__("Columns 4", 'shb') => '3',
            ),
            'std'=> '4',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style3','style7')
            ),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__('Pagination, using Loadmore Ajax button.', 'shb'),
            'param_name' => 'load_more',
            'value' => array(
                esc_html__("Off", 'shb') => 'off',
                esc_html__("On", 'shb') => 'on',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            'type' => 'vc_link',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__('Add button view all .', 'shb'),
            'param_name' => 'button_view',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style7')
            ),
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__( 'Custom number item by device (Structure: ["Width of device (unit: px)","Number item"])', 'shb' ),
            'param_name' => 'itemscustom',
            'edit_field_class'=>'vc_col-sm-12 vc_column mb-style-itemscustom',
            'group' => esc_html__('Design Option','shb'),
            'description' => esc_html__( 'EX: [0,2],[480,3],[768,4],[990,5],[1200,6]', 'shb' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5','style6')
            ),
        ),
    
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__( 'Autoplay slider', 'shb' ),
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('On','shb') => 'true',
                esc_html__('Off','shb') => 'false',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5','style6')
            ),

        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__( 'Navigation slider', 'shb' ),
            'param_name' => 'navigation',
            'value' => array(
                esc_html__('Show','shb') => 'true',
                esc_html__('Hide','shb') => 'false',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style5','style6')
            ),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__( 'Custom Date Format (Default get in Settings/General)', 'shb' ),
            'param_name' => 'date_format',
            'description' => wp_kses(__('Eg: d/m/Y <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Documentation on date and time formatting</a>','shb'),array('a' => array('href' => array(),'target'=>array()))),
        ),
        array(
            'type' => 'textfield',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__('Custom image size', 'shb'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
        ),

    )
));

add_action( 'wp_ajax_blog_button_load_ajax', 's7upf_blog_button_load_ajax' );
add_action( 'wp_ajax_nopriv_blog_button_load_ajax', 's7upf_blog_button_load_ajax' );
if(!function_exists('s7upf_blog_button_load_ajax')){
    function s7upf_blog_button_load_ajax(){
        $number         = $_POST['number'];
        $order_by       = $_POST['orderby'];
        $order          = $_POST['order'];
        $cats           = $_POST['cats'];
        $paged          = $_POST['paged'];
        $user_id          = $_POST['userid'];
        $post_id          = $_POST['postid'];
        $word_excerpt          = $_POST['wordexcerpt'];
        $image_size          = $_POST['imgsize'];
        $formatdate          = $_POST['formatdate'];
        $collayout          = $_POST['collayout'];
        $html = '';
        $args   =   array(
            'post_type'         => 'post',
            'posts_per_page'    => $number,
            'orderby'           => $order_by,
            'order'             => $order,
            'paged'             => $paged + 1,
            'post_status' => 'publish',
        );
        if($order_by == 'post_views'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = 'post_views';
        }
        if($order_by == 'time_update'){
            $args['orderby'] = 'meta_value';
            $args['meta_key'] = 'time_update';
        }
        if($order_by == '_post_like_count'){
            $args['orderby'] = 'meta_value_num';
            $args['meta_key'] = '_post_like_count';
        }
        if(!empty($cats)) {
            $custom_list = explode(",",$cats);
            $args['tax_query']['relation'] = 'AND';
            $args['tax_query'][]=array(
                'taxonomy'  => 'category',
                'field'     => 'slug',
                'terms'     => $custom_list
            );
        }
        $query = new WP_Query($args);
        if($user_id == 'on' and !empty($post_id)){
            $ids_arr = explode(',', $post_id);
            $ids_arr = array_unique($ids_arr);
            $args2 = array(
                'post_type' => 'post',
                'post__in'=>$ids_arr,
                'posts_per_page'    => $number,
                'post_status' => 'publish',
                'paged'             => $paged+1,
            );
            $query = new WP_Query($args2);
        }

        $html .= S7upf_Template::load_view('elements/blog/blog-style3',false,array(
            'word_excerpt' => $word_excerpt,
            'image_size' => $image_size,
            'query' => $query,
            'date_format' => $formatdate,
            'col_layout' => $collayout,
        ));

        echo do_shortcode($html);
        wp_reset_postdata();
    }
}
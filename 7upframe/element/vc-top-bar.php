<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_top_bar'))
{
    function s7upf_vc_top_bar($attr,$content = false)
    {
        $html=$icon= $el_class=$color_icon=$position=$data_social=$search_order_by= $show_mini_cart = $search_live=$show_search= $style = $data_social= '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'show_search'      => 'on',
            'search_live'      => 'on',
            'show_mini_cart'      => 'on',
            'add_item_social'      => '',
            'el_class'      => '',
            'search_order_by'      => '',
            'icon'      => '',
            'position'      => 'pull-right',
            'color_icon'      => '',

        ),$attr));

        if(isset($add_item_social))
            $data_social = vc_param_group_parse_atts($add_item_social);
        $html .= S7upf_Template::load_view('elements/top-bar',false,array(
            'style'  => $style,
            'show_search'  => $show_search,
            'search_live'  => $search_live,
            'show_mini_cart'  => $show_mini_cart,
            'data_social'  => $data_social,
            'el_class'  => $el_class,
            'search_order_by'  => $search_order_by,
            'icon'  => $icon,
            'content'  =>$content,
            'position'  =>$position,
            'color_icon'  =>$color_icon,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_top_bar','s7upf_vc_top_bar');

vc_map( array(
    "name"      => esc_html__("SV Top Bar", 'shb'),
    "base"      => "s7upf_top_bar",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style menu', 'shb' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1 (Default)','shb')=>'style1',
                esc_html__('Style 2','shb')=>'style2',
                esc_html__('Style 3','shb')=>'style3',
                esc_html__('Style 4','shb')=>'style4',
            ),
            'description' => esc_html__( 'Select style', 'shb' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_topbar',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Change the icon cart ', 'shb' ),
            'param_name'    => 'icon',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'shb' ),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style1')
            ),
        ),
        // Begin option style 2

        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show box search', 'shb' ),
            'param_name'  => 'show_search',
            'admin_label' => true,
            'value' => array(
                esc_html__('On','shb') => 'on',
                esc_html__('Off','shb') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Search order by', 'shb' ),
            'param_name'  => 'search_order_by',
            'admin_label' => true,
            'value' => array(
                esc_html__('All','shb') => '',
                esc_html__('Posts','shb') => 'post',
                esc_html__('Products','shb') => 'product',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Search live', 'shb' ),
            'param_name'  => 'search_live',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show mini cart', 'shb' ),
            'param_name'  => 'show_mini_cart',
            'value' => array(
                esc_html__('On','shb') => 'on',
                esc_html__('Off','shb') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Text content', 'shb' ),
            'param_name' => 'content',
            'description' => esc_html__( 'Enter text', 'shb' ),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style1')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add social item', 'shb'),
            'param_name' => 'add_item_social',
            'value' =>'',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
            'params' => array(
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Select icon', 'shb' ),
                    'param_name'    => 'icon',
                    'value'         => '',
                    'settings'      => array(
                        'emptyIcon'     => true,
                        'iconsPerPage'  => 4000,
                    ),
                    'description'   => esc_html__( 'Select icon from library.', 'shb' ),
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link item', 'shb' ),
                    'param_name' => 'link',
                ),

            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),

        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Position', 'shb' ),
            'param_name'  => 'position',
            'value' => array(
                esc_html__('Right','shb') => 'pull-right',
                esc_html__('Left','shb') => 'pull-left',
                esc_html__('Center','shb') => 'text-center',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),
        array(
            'type'        => 'colorpicker',
            'heading'     => esc_html__( 'Change color icon', 'shb' ),
            'param_name'  => 'color_icon',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),

    )
));
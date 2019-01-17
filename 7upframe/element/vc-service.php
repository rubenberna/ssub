<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/04/2017
 * Time: 17:37
 */
if(!function_exists('s7upf_vc_service'))
{
    function s7upf_vc_service($attr,$content = false)
    {
        $html = $style =$iconpicker=$bg_color=$image_size= $image= $image_link=$position_corner=$icon_link =$el_class  = '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'el_class'      => '',
            'iconpicker'      => '',
            'position_corner'  => 'bottom-right',
            'icon_link'  => '',
            'image'  => '',
            'image_link'  => '',
            'image_size'  => '',
            'bg_color'  => '',

        ),$attr));

        $html .= S7upf_Template::load_view('elements/service',false,array(
            'style' => $style,
            'el_class' => $el_class,
            'iconpicker' => $iconpicker,
            'position_corner' => $position_corner,
            'content' => $content,
            'icon_link' => $icon_link,
            'image' => $image,
            'image_link' => $image_link,
            'image_size' => $image_size,
            'bg_color' => $bg_color,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_service','s7upf_vc_service');

vc_map( array(
    "name"      => esc_html__("SV Service", 'shb'),
    "base"      => "s7upf_service",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style', 'shb' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1','shb')=>'style1',
                esc_html__('Style 2','shb')=>'style2',
                esc_html__('Style 3','shb')=>'style3',
                esc_html__('Style 4','shb')=>'style4',
            ),
            'description' => esc_html__( 'Select style', 'shb' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_service',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type'          => 'iconpicker',
            'heading'       => esc_html__( 'Select icon', 'shb' ),
            'param_name'    => 'iconpicker',
            'value'         => '',
            'settings'      => array(
                'emptyIcon'     => true,
                'iconsPerPage'  => 4000,
            ),
            'description'   => esc_html__( 'Select icon from library.', 'shb' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link icon', 'shb' ),
            'param_name' => 'icon_link',
            'description' => esc_html__('Enter Link/URL','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4')
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'shb' ),
            'param_name' => 'image',
            'description' => esc_html__('Select image from library.','shb'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link image', 'shb' ),
            'param_name' => 'image_link',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Content service', 'shb' ),
            'param_name' => 'content',
            'description' => esc_html__('Enter text.','shb'),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Triangle corner position",'shb'),
            'group' => esc_html__('Design Option','shb'),
            "param_name" => "position_corner",
            'value' => array(
                esc_html__('Bottom right','shb') => 'bottom-right',
                esc_html__('Bottom left','shb') => 'bottom-left',
                esc_html__('Top left','shb') => 'top-left',
                esc_html__('Top right','shb') => 'top-right',
                esc_html__('None','shb') => '',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1')
            ),
        ),
        array(
            'type' => 'colorpicker',
            'group' => esc_html__('Design Option','shb'),
            'heading' => esc_html__('Background color', 'shb'),
            'param_name' => 'bg_color',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
            'description' => esc_html__('Select color', 'shb'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Size', 'shb'),
            'param_name' => 'image_size',
            'group' => esc_html__('Design Option','shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2')
            ),
        ),
    )
));
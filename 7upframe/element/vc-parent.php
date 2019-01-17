<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/10/2017
 * Time: 2:45 CH
 */
if(!function_exists('s7upf_vc_parent'))
{
    function s7upf_vc_parent($attr, $content = false)
    {
        $html = $css_class =$custom_css= $el_class = '';
        extract(shortcode_atts(array(
            'el_class' => '',
            'custom_css' => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/parent',false,array(
            'el_class' => $el_class,
            'content' => $content,
            'custom_css' => $custom_css,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_parent','s7upf_vc_parent');
vc_map(
    array(
        'name'     => esc_html__( 'SV Parent', 'shb' ),
        'base'     => 's7upf_parent',
        'category' => esc_html__( '7Up-theme', 'shb' ),
        'icon'     => 'icon-st',
        'as_parent' => array( 'only' => 's7upf_countdown,s7upf_info_box,s7upf_logo_header,s7upf_top_bar,s7upf_mini_cart ,vc_column_text,vc_single_image,vc_row,s7upf_banner,s7upf_testimonials,s7upf_info_box' ),
        'content_element' => true,
        'js_view' => 'VcColumnView',
        'params'   => array(

            array(
                "type" => "textfield",
                "heading" => esc_html__("Extra class name",'shb'),
                "param_name" => "el_class",
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
            ),
            array(
                "type"          => "css_editor",
                "heading"       => esc_html__("CSS box",'shb'),
                "param_name"    => "custom_css",
                'group'         => esc_html__('Design Option','shb')
            ),
        )
    )
);

/*******************************************END MAIN*****************************************/



//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_S7upf_Parent extends WPBakeryShortCodesContainer {}
}
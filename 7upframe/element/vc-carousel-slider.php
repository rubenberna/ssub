<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 09/09/2017
 * Time: 2:45 CH
 */
if(!function_exists('s7upf_vc_slide_carousel'))
{
    function s7upf_vc_slide_carousel($attr, $content = false)
    {
        $html = $css_class = $el_class=$animation=$pagination=$navigation=$autoplay=$itemscustom='';
        extract(shortcode_atts(array(
            'itemscustom' => '',
            'autoplay' => 'true',
            'navigation' => 'true',
            'pagination'=> 'false',
            'animation'=> '',
            'custom_css' => '',
            'el_class' => '',
        ),$attr));
        if(!empty($custom_css)) $css_class = vc_shortcode_custom_css_class( $custom_css );
        $html .= S7upf_Template::load_view('elements/carousel-slider',false,array(
            'itemscustom' => $itemscustom,
            'autoplay' => $autoplay,
            'navigation' => $navigation,
            'pagination' => $pagination,
            'animation' => $animation,
            'css_class' => $css_class,
            'el_class' => $el_class,
            'content' => $content,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_slide_carousel','s7upf_vc_slide_carousel');
vc_map(
    array(
        'name'     => esc_html__( 'SV Carousel Slider', 'shb' ),
        'base'     => 's7upf_slide_carousel',
        'category' => esc_html__( '7Up-theme', 'shb' ),
        'icon'     => 'icon-st',
        'as_parent' => array( 'only' => 'vc_column_text,vc_single_image,vc_row,s7upf_item_banner,s7upf_info_box,s7upf_products' ),
        'content_element' => true,
        'js_view' => 'VcColumnView',
        'params'   => array(
            array(
                'type' => 'textarea_raw_html',
                'heading' => esc_html__( 'Custom number item by device (Structure: ["Width of device (unit: px)","Number item"])', 'shb' ),
                'param_name' => 'itemscustom',
                'edit_field_class'=>'vc_col-sm-12 vc_column mb-style-itemscustom',
                'std' => '[0,1],[480,1],[768,1],[990,1],[1200,1]',
                'description' => esc_html__( 'EX: [0,2],[480,3],[768,4],[990,5],[1200,6]', 'shb' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Auto play silder', 'shb' ),
                'param_name' => 'autoplay',
                'value' => array(
                    esc_html__('On','shb') => 'true',
                    esc_html__('Off','shb') => 'false',

                ),
                'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'shb' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Navigation silder', 'shb' ),
                'param_name' => 'navigation',
                'value' => array(
                    esc_html__('On','shb') => 'true',
                    esc_html__('Off','shb') => 'false',

                ),
                'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'shb' )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Pagination silder', 'shb' ),
                'param_name' => 'pagination',
                'value' => array(
                    esc_html__('Off','shb') => 'false',
                    esc_html__('On','shb') => 'true',

                ),
                'description' => esc_html__( 'This allows you to enable or disable autoplay of slider.', 'shb' )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Slider Animation', 'shb' ),
                'param_name'  => 'animation',
                'value'       => array(
                    esc_html__( 'None', 'shb' )        => '',
                    esc_html__( 'Fade', 'shb' )        => 'fade',
                    esc_html__( 'BackSlide', 'shb' )   => 'backSlide',
                    esc_html__( 'GoDown', 'shb' )      => 'goDown',
                    esc_html__( 'FadeUp', 'shb' )      => 'fadeUp',
                )
            ),
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
    class WPBakeryShortCode_S7upf_Slide_Carousel extends WPBakeryShortCodesContainer {}
}
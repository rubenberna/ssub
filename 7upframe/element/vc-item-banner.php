<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/10/17
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_item_banner'))
{
    function s7upf_vc_item_banner($attr,$content = false)
    {
        $html =$image_link=$iframe=$el_class=$bg_image=$image_size='' ;
        extract(shortcode_atts(array(
            'transition'      => 'fade',
            'bg_image'      => '',
            'el_class'      => '',
            'image_link'      => '',
            'image_size'      => '',
            'iframe'      => '',

        ),$attr));

        $html .= S7upf_Template::load_view('elements/item-banner',false,array(
            'el_class' => $el_class,
            'bg_image' => $bg_image,
            'image_size' => $image_size,
            'image_link' => $image_link,
            'content' => $content,
            'iframe' => $iframe,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_item_banner','s7upf_vc_item_banner');

vc_map( array(
    "name"      => esc_html__("SV Banner Slider", 'shb'),
    "base"      => "s7upf_item_banner",
    'as_child' => array('only' => 's7upf_slide_carousel'),
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Background Image', 'shb' ),
            'param_name' => 'bg_image',
            'edit_field_class' => 'vc_column vc_col-sm-6',
            'description' => esc_html__('Select image from library.','shb'),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link image', 'shb' ),
            'param_name' => 'image_link',
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'textarea_raw_html',
            'heading' => esc_html__( 'Add frame video', 'shb' ),
            'param_name' => 'iframe',
            'edit_field_class' => 'vc_column vc_col-sm-12 custom-frame-video',
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Text content', 'shb' ),
            'param_name' => 'content',
            'description' => esc_html__( 'Enter text', 'shb' ),

        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Custom background image size', 'shb'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
        ),

    )
));
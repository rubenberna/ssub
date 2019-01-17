<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 04/04/2017
 * Time: 14:17
 */

if(!function_exists('s7upf_vc_testimonials'))
{
    function s7upf_vc_testimonials($attr,$content = false)
    {
        $html =$style= $image_size =$el_class= '' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'add_item_testimonial'      => '',
            'number_item'      => '',
            'image_size'      => '',
            'el_class'      => '',

        ),$attr));
        if(isset($add_item_testimonial))
            $data_testimonial= vc_param_group_parse_atts($add_item_testimonial);

        $html .= S7upf_Template::load_view('elements/testimonials',false,array(
            'style' => $style,
            'data_testimonial' => $data_testimonial,
            'image_size' => $image_size,
            'el_class' => $el_class,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_testimonials','s7upf_vc_testimonials');

vc_map( array(
    "name"      => esc_html__("SV Testimonials", 'shb'),
    "base"      => "s7upf_testimonials",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add testimonial item', 'shb'),
            'param_name' => 'add_item_testimonial',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'shb' ),
                    'param_name' => 'image',
                    'description' => esc_html__('Select image from library.','shb'),
                    'edit_field_class' => 'vc_column vc_col-sm-6',

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
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Content', 'shb' ),
                    'param_name' => 'desc',
                    'description' => esc_html__('Enter text.','shb'),
                ),
                array(
                    'type' => 'vc_link',
                    'admin_label' => true,
                    'heading' => esc_html__( 'Title/Name', 'shb' ),
                    'param_name' => 'link_name',
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
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
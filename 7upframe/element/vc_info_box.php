<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/04/2017
 * Time: 17:37
 */
if(!function_exists('s7upf_vc_info_box'))
{
    function s7upf_vc_info_box($attr,$content = false)
    {
        $html =$data_item_info= $style =$button_link=$title_7= $price_label=$overlay_image= $title= $image_link= $link=$animation_image =$image =$image_size=$el_class=$index_box='' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'index_box' => '',
            'title' => '',
            'el_class' => '',
            'image_size' => '',
            'link' => '',
            'image' => '',
            'animation_image' => '',
            'image_link' => '',
            'overlay_image' => '',
            'price_label' => '',
            'button_link' => '',
            'title_7' => '',
            'shortcode' => '',
            'placeholder' => '',
            'add_item_info11' => '',
            'iconpicker' => '',
        ),$attr));
        if(isset($add_item_info11))
            $data_item_info = vc_param_group_parse_atts($add_item_info11);
        $html .= S7upf_Template::load_view('elements/info-box',false,array(
            'style' => $style,
            'index_box' => $index_box,
            'title' => $title,
            'el_class' => $el_class,
            'image_size' => $image_size,
            'content' => $content,
            'link' => $link,
            'image' => $image,
            'animation_image' => $animation_image,
            'image_link' => $image_link,
            'overlay_image' => $overlay_image,
            'price_label' => $price_label,
            'button_link' => $button_link,
            'title_7' => $title_7,
            'shortcode' => $shortcode,
            'placeholder' => $placeholder,
            'data_item_info' => $data_item_info,
            'iconpicker' => $iconpicker,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_info_box','s7upf_vc_info_box');

vc_map( array(
    "name"      => esc_html__("SV Info Box", 'shb'),
    "base"      => "s7upf_info_box",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style', 'shb' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1 (Title box)','shb')=>'style1',
                esc_html__('Style 2 (Category)','shb')=>'style2',
                esc_html__('Style 3 (banner)','shb')=>'style3',
                esc_html__('Style 4 (Table price)','shb')=>'style4',
                esc_html__('Style 5 (Title box)','shb')=>'style5',
                esc_html__('Style 6 (Slider box)','shb')=>'style6',
                esc_html__('Style 7 (Testimonial)','shb')=>'style7',
                esc_html__('Style 8 (Testimonial)','shb')=>'style8',
                esc_html__('Style 9 (Testimonial)','shb')=>'style9',
                esc_html__('Style 10 (MailChimp)','shb')=>'style10',
                esc_html__('Style 11 (Accordion)','shb')=>'style11',
                esc_html__('Style 12 (Contact box)','shb')=>'style12'
            ),
            'description' => esc_html__( 'Select style', 'shb' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_info_box',
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
                'value'     =>array('style12')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Get ID shortcode Mailchimp', 'shb' ),
            'param_name' => 'shortcode',
            'admin_label' => true,
            'description' => esc_html__('Enter shortcode.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style10')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Placeholder input', 'shb' ),
            'param_name' => 'placeholder',
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style10')
            ),
        ), 
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Index box', 'shb' ),
            'param_name' => 'index_box',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Price label', 'shb' ),
            'param_name' => 'price_label',
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Title', 'shb' ),
            'param_name' => 'title',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style2','style4','style11')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Title/Name', 'shb' ),
            'param_name' => 'title_7',
            'admin_label' => true,
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style7','style8')
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
                'value'     =>array('style2','style3','style5','style7','style8','style9')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link image', 'shb' ),
            'param_name' => 'image_link',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3','style7','style8','style9')
            ),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add Link', 'shb' ),
            'param_name' => 'link',
            'description' => esc_html__('Enter Link/URL','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style2','style4')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add info item', 'shb'),
            'param_name' => 'add_item_info11',
            'value' =>'',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Title', 'shb' ),
                    'param_name' => 'title',
                    'admin_label' => true,
                    'description' => esc_html__('Enter text.','shb'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Icon title', 'shb' ),
                    'param_name' => 'icon',
                    'edit_field_class'=>'vc_col-sm-12 vc_column sv_iconpicker',
                    'description' => esc_html__('Enter text.','shb'),
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__( 'Description', 'shb' ),
                    'param_name' => 'desc',
                    'description' => esc_html__('Enter text.','shb'),
                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style11')
            ),
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Content banner', 'shb' ),
            'param_name' => 'content',
            'description' => esc_html__('Enter text.','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style1','style3','style4','style5','style7','style8','style9','style12')
            ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add button', 'shb' ),
            'param_name' => 'button_link',
            'description' => esc_html__('Enter Link/URL','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4')
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Image animation",'shb'),
            'group' => esc_html__('Design Option','shb'),
            "param_name" => "animation_image",
            'description' => esc_html__( 'Select animation.', 'shb' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
            'value' => array(
                esc_html__('None','shb') => '',
                esc_html__('Zoom image','shb') => 'zoom-image',
                esc_html__('Fade out in','shb') => 'fade-out-in',
                esc_html__('Zoom rotate','shb') => 'zoom-rotate',
                esc_html__('Zoom and Fade out in','shb') => 'zoom-image fade-out-in',
            ),
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__("Overlay image",'shb'),
            'group' => esc_html__('Design Option','shb'),
            "param_name" => "overlay_image",
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
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
                'value'     =>array('style2','style3','style5','style7','style8','style9')
            ),
        ),

    )
));
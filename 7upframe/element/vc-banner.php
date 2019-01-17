<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 04/04/2017
 * Time: 14:17
 */

if(!function_exists('s7upf_vc_banner'))
{
    function s7upf_vc_banner($attr,$content = false)
    {
        $html = $style=$bottom =$top=$left=$height=$right =$show_info=$box_diameter=$info3=$icon3=$image=$image_link=$overlay_image=$animation_css= $animation_image=$image_size = $el_class  ='' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'el_class'      => '',
            'image_size'      => '',
            'image_link'      => '',
            'image'      => '',
            'animation_css'      => '',
            'animation_image'      => '',
            'overlay_image'      => '',
            'show_info'      => '',
            'icon3'      => '',
            'info3'      => '',
            'box_diameter'      => '',
            'bottom'      => '',
            'top'      => '',
            'left'      => '',
            'right'      => '',
            'height'      => '',
            'link_video'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/banner',false,array(
            'style' => $style,
            'image' => $image,
            'image_link' => $image_link,
            'image_size' => $image_size,
            'el_class' => $el_class,
            'animation_css' => $animation_css,
            'animation_image' => $animation_image,
            'overlay_image' => $overlay_image,
            'content' => $content,
            'show_info' => $show_info,
            'icon3' => $icon3,
            'info3' => $info3,
            'box_diameter' => $box_diameter,
            'bottom' => $bottom,
            'top' => $top,
            'left' => $left,
            'right' => $right,
            'height' => $height,
            'link_video' => $link_video,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_banner','s7upf_vc_banner');

vc_map( array(
    "name"      => esc_html__("SV Banner", 'shb'),
    "base"      => "s7upf_banner",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style', 'shb' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1 (Default)','shb')=>'style1',
                esc_html__('Style 2','shb')=>'style2',
                esc_html__('Style 3','shb')=>'style3',
                esc_html__('Style 4','shb')=>'style4',
                esc_html__('Style 5','shb')=>'style5',
                esc_html__('Style 6 (video)','shb')=>'style6',

            ),
            'description' => esc_html__( 'Select style', 'shb' )
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_banner',
            'heading' => '',
            'element' => 'style',
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image* (Required)', 'shb' ),
            'param_name' => 'image',
            'description' => esc_html__('Select image from library.','shb'),
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Add link image', 'shb' ),
            'param_name' => 'image_link',
            'edit_field_class' => 'vc_column vc_col-sm-6',
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Link/URL video",'shb'),
            "param_name" => "link_video",
            'description' => esc_html__( 'Get Link/URL video in youtube or Link/URL share host,... then input a link media. Note: Share host: there are 3 supported video formats mp4, ogg, webm.', 'shb' ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style6')
            ),
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Content banner', 'shb' ),
            'param_name' => 'content',
            'admin_label' => true,
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
            "heading" => esc_html__("Image animation",'shb'),
            'group' => esc_html__('Design Option','shb'),
            "param_name" => "animation_image",
            'description' => esc_html__( 'Select animation.', 'shb' ),
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
                'value'     =>array('style1','style3')
            ),
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Banner animation', 'shb' ),
            'param_name' => 'animation_css',
            'group' => esc_html__('Design Option','shb'),
            'value' => '',
            'settings' => array(
                'type' => 'in',
                'custom' => array(
                    array(
                        'label' => esc_html__( 'Default', 'shb' ),
                        'values' => array(
                            esc_html__( 'Top to bottom', 'shb' ) => 'top-to-bottom',
                            esc_html__( 'Bottom to top', 'shb' ) => 'bottom-to-top',
                            esc_html__( 'Left to right', 'shb' ) => 'left-to-right',
                            esc_html__( 'Right to left', 'shb' ) => 'right-to-left',
                            esc_html__( 'Appear from center', 'shb' ) => 'appear',
                        ),
                    ),
                ),
            ),
            'description' => esc_html__( 'Select type of animation for element to be animated when it (enters) the browsers viewport (Note: works only in modern browsers).', 'shb' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image size banner', 'shb'),
            'group' => esc_html__('Design Option','shb'),
            'param_name' => 'image_size',
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
        ),
        array(
            'type' => 'dropdown',
            'group' => esc_html__('Box info','shb'),
            'heading' => esc_html__( 'Show box info banner', 'shb' ),
            'param_name' => 'show_info',
            'value' => array(
                esc_html__('Hide','shb')=>'',
                esc_html__('Show','shb')=>'show',
            ),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style3')
            ),
        ),
        array(
            "type" => "textfield",
            'group' => esc_html__('Box info','shb'),
            "heading" => esc_html__("Add icon",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12 sv_iconpicker',
            "param_name" => "icon3",
            'description' => esc_html__( 'Select icon', 'shb' ),
            'dependency'    =>array(
                'element'   =>'show_info',
                'value'     =>array('show')
            ),
        ),
        array(
            "type" => "textarea_raw_html",
            'group' => esc_html__('Box info','shb'),
            "heading" => esc_html__("Info",'shb'),
            "param_name" => "info3",
            'description' => esc_html__( 'Enter text', 'shb' ),
            'dependency'    =>array(
                'element'   =>'show_info',
                'value'     =>array('show')
            ),
        ),
        array(
            "type" => "s7up_number",
            'group' => esc_html__('Box info','shb'),
            "heading" => esc_html__("Change the box diameter",'shb'),
            "param_name" => "box_diameter",
            'description' => esc_html__( 'Default: 200px', 'shb' ),
            "min" => 0,
            'suffix' => esc_html__('px','shb'),
            'dependency'    =>array(
                'element'   =>'show_info',
                'value'     =>array('show')
            ),
        ),
        array(
            "type" => "textfield",
            'group' => esc_html__('Change the info position','shb'),
            "heading" => esc_html__("Right",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "param_name" => "right",
            'description' =>'<a href="'.esc_url('w3schools.com/cssref/pr_class_position.asp').'" title="Click here" target="_blank">'.esc_html__('Documentation on position in CSS','shb').'</a>',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style5')
            ),
        ),
        array(
            "type" => "textfield",
            'group' => esc_html__('Change the info position','shb'),
            "heading" => esc_html__("Left",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "param_name" => "left",
            'description' =>'<a href="'.esc_url('w3schools.com/cssref/pr_class_position.asp').'" title="Click here" target="_blank">'.esc_html__('Documentation on position in CSS','shb').'</a>',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style5')
            ),
        ),
        array(
            "type" => "textfield",
            'group' => esc_html__('Change the info position','shb'),
            "heading" => esc_html__("Top",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "param_name" => "top",
            'description' =>'<a href="'.esc_url('w3schools.com/cssref/pr_class_position.asp').'" title="Click here" target="_blank">'.esc_html__('Documentation on position in CSS','shb').'</a>',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style5')
            ),
        ),
        array(
            "type" => "textfield",
            'group' => esc_html__('Change the info position','shb'),
            "heading" => esc_html__("Bottom",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "param_name" => "bottom",
            'description' =>'<a href="'.esc_url('w3schools.com/cssref/pr_class_position.asp').'" title="Click here" target="_blank">'.esc_html__('Documentation on position in CSS','shb').'</a>',
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style5')
            ),
        ),
        array(
            "type" => "s7up_number",
            'group' => esc_html__('Change the info position','shb'),
            "heading" => esc_html__("Height info",'shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            "param_name" => "height",
            "min" => 0,
            'suffix' => esc_html__('px','shb'),
            'dependency'    =>array(
                'element'   =>'style',
                'value'     =>array('style4','style5')
            ),
        ),
    )
));
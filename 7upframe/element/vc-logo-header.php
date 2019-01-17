<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 12/08/15
 * Time: 10:00 AM
 */
if(!function_exists('s7upf_vc_logo_header'))
{
    function s7upf_vc_logo_header($attr)
    {
        $html = $logo_img = $alignment= $color_logo=$logo_text=$logo_text_format= $image_size= $el_class= '';
        extract(shortcode_atts(array(
            'logo_img'      => '',
            'alignment'      => 'text-center',
            'el_class'      => '',
            'image_size'      => '',
            'logo_text'      => '',
            'logo_text_format'      => 'h1',
            'color_logo'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/logo-header',false,array(
            'logo_img'  => $logo_img,
            'alignment'  => $alignment,
            'el_class'  => $el_class,
            'image_size'  => $image_size,
            'logo_text'  => $logo_text,
            'logo_text_format'  => $logo_text_format,
            'color_logo'  => $color_logo,
        ));
        return $html;
    }
}

stp_reg_shortcode('s7upf_logo_header','s7upf_vc_logo_header');
$check_add = '';
if(isset($_GET['return'])) $check_add = $_GET['return'];
if(empty($check_add)) add_action( 'vc_before_init_base','s7upf_add_admin_logo_header',10,100 );
if ( ! function_exists( 's7upf_add_admin_logo_header' ) ) {
    function s7upf_add_admin_logo_header(){
        vc_map( array(
            "name"      => esc_html__("SV Logo", 'shb'),
            "base"      => "s7upf_logo_header",
            "icon"      => "icon-st",
            "category"  => '7Up-theme',
            "params"    => array(
                array(
                    "type" => "attach_image",
                    'admin_label' => true,
                    "heading" => esc_html__("Logo image",'shb'),
                    "param_name" => "logo_img",
                    'description' => esc_html__( 'Select image from library', 'shb' )
                ),
                array(
                    "type" => "textarea_raw_html",
                    "heading" => esc_html__("Logo text",'shb'),
                    'edit_field_class'=>'vc_col-sm-12 vc_column mb-style-itemscustom',
                    "param_name" => "logo_text",
                    'description' => esc_html__( 'Enter text (Appears when the logo image is not available)', 'shb' ),

                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Logo text format",'shb'),
                    "param_name" => "logo_text_format",
                    'description' => esc_html__( 'Select format', 'shb' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                    'value' => array(
                        esc_html__('H1','shb') => 'h1',
                        esc_html__('H2','shb') => 'h2',
                        esc_html__('H3','shb') => 'h3',
                        esc_html__('H4','shb') => 'h4',
                        esc_html__('H5','shb') => 'h5',
                        esc_html__('H6','shb') => 'h6',
                        esc_html__('P','shb') => 'p',
                        esc_html__('DIV','shb') => 'div',
                    ),
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => esc_html__("Color logo text",'shb'),
                    "param_name" => "color_logo",
                    'description' => esc_html__( 'Select color.', 'shb' ),
                    'edit_field_class'=>'vc_col-sm-6 vc_column',
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Logo alignment",'shb'),
                    "param_name" => "alignment",
                    'admin_label' => true,
                    'description' => esc_html__( 'Select image alignment.', 'shb' ),
                    'value' => array(
                        esc_html__('Center','shb') => 'text-center',
                        esc_html__('Left','shb') => 'text-left',
                        esc_html__('Right','shb') => 'text-right',
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
                    'heading' => esc_html__('Image Size', 'shb'),
                    'param_name' => 'image_size',
                    'edit_field_class' => 'vc_column vc_col-sm-12',
                    'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
                ),
            )
        ));
    }
}

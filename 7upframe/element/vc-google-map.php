<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 12/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_map'))
{
    function s7upf_vc_map($attr)
    {
        $html = $style = $width = $height =$el_class= $html_mask =  $market = $zoom = $location = $control = $scrollwheel = $disable_ui = $draggable = '';
        extract(shortcode_atts(array(
            'style'         =>'',
            'market'        =>'',
            'zoom'          =>'16',
            'location'      =>'',
            'control'       =>'yes',
            'scrollwheel'   =>'yes',
            'disable_ui'    =>'no',
            'draggable'     =>'yes',
            'width'     =>'100%',
            'height'     =>'500px',
            'el_class'     =>''
        ),$attr));
        $location = vc_param_group_parse_atts($attr['location']);
        $location_text = '';
        if(is_array($location) && count($location) > 0 ) {
            foreach ($location as $value) {
                if(!empty($value)) {
                    if(isset($value['image_location'])){
                        $img_src1 = wp_get_attachment_image_src($value['image_location'], "full");
                        if(is_array($img_src1) and count($img_src1)>0)
                            $img_src = $img_src1[0];
                    }
                    $location_text .= '|' . s7upf_get_data_isset($value,'st_lat') . '&&' . s7upf_get_data_isset($value,'st_long') . '&&' . s7upf_get_data_isset($value,'marker_title') . '&&' . s7upf_get_data_isset($value,'info_box') . '&&' . (!empty($img_src)?$img_src:'');
                }
            }
        }
        $img = array();$img[0]='';
        if($market != '') {
            $img = wp_get_attachment_image_src($market,"full");
        }
        $id = 'sv-map-'.uniqid();
        $map_css = S7upf_Assets::build_css('width:' . $width . ';height:' . $height . ';max-width-100%;');
        if($location_text !== '')
            $html .= '<div class="mb-google-map '.$el_class.'">'.$html_mask.'<div id = "'.$id.'" class="' . $map_css. ' sv-ggmaps" data-location="' . $location_text . '" data-market="' . $img[0] . '" data-zoom="' . $zoom . '" data-style="' . $style . '" data-control="' . $control . '" data-scrollwheel="' . $scrollwheel . '" data-disable_ui="' . $disable_ui . '" data-draggable="' . $draggable . '"></div></div>';
        return $html;
    }
}

stp_reg_shortcode('sv_map','s7upf_vc_map');

vc_map( array(
    "name"      => esc_html__("SV GoogleMap", 'shb'),
    "base"      => "sv_map",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params" => array(
        array(
            'type' => 'param_group',
            "heading" => esc_html__("Add Map Location", 'shb'),
            "param_name" => "location",
            'value' =>'',
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Latitude", 'shb' ),
                    "param_name" => "st_lat",
                    "value" => "",
                    "description" => esc_html__("Enter Latitude of location",'shb'),

                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Longitude", 'shb' ),
                    "param_name" => "st_long",
                    "value" => "",
                    "description" => esc_html__("Enter Longitude of location",'shb'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Marker Title", 'shb' ),
                    "param_name" => "marker_title",
                    "value" => "",
                    "admin_label" => true,
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__( "Info Box", 'shb' ),
                    "param_name" => "info_box",
                    "value" => "",
                    "description" => esc_html__("Enter info of location",'shb'),

                ),
                array(
                    "type" => "attach_image",
                    "heading" => esc_html__( "Image Location", 'shb' ),
                    "param_name" => "image_location",
                    "description" => esc_html__("Upload image",'shb'),

                ),
            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),
            "group"=> esc_html__("Location",'shb'),

        ),
        array(
            "group"=> esc_html__("Location",'shb'),
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "heading" => esc_html__("Map Style", 'shb'),
            "param_name" => "style",
            'value' => array(
                esc_html__('Default', 'shb') => 'style1',
                esc_html__('Grayscale', 'shb') => 'grayscale',
                esc_html__('Blue', 'shb') => 'blue',
                esc_html__('Dark', 'shb') => 'dark',
                esc_html__('Pink', 'shb') => 'pink',
                esc_html__('Light', 'shb') => 'light',
                esc_html__('Blueessence', 'shb') => 'blueessence',
                esc_html__('Bentley', 'shb') => 'bentley',
                esc_html__('Retro', 'shb') => 'retro',
                esc_html__('Cobalt', 'shb') => 'cobalt',
                esc_html__('Brownie', 'shb') => 'brownie',
                esc_html__('Snazzy', 'shb') => 'snazzy'
            ),
            "group"=> esc_html__("Map Settings",'shb'),
        ),
        array(
            'type' => 's7up_image_check',
            'param_name' => 'style_map',
            'heading' => '',
            'element' => 'style',
            "group"=> esc_html__("Map Settings",'shb'),
        ),
        array(
            "type" => "s7up_number",
            "holder" => "div",
            "heading" => esc_html__("Map Zoom", 'shb'),
            "param_name" => "zoom",
            "description" => esc_html__("Enter zoom for map (Default is 16 level).", 'shb'),
            'min' => '1',
            'max' => '20',
            'suffix' => esc_html__('Level','shb'),
            "group"=> esc_html__("Map Settings",'shb'),
            'value' => '16'
        ),
        array(
            'type' => 'attach_image',
            "holder" => "div",
            'heading' => esc_html__('Marker Image', 'shb'),
            'param_name' => 'market',
            "group"=> esc_html__("Map Settings",'shb'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Map Width', 'shb'),
            'param_name' => 'width',
            "description" => esc_html__("This is value to set width and height for map. Unit % , px or em. ", 'shb'),
            "group"=> esc_html__("Map Settings",'shb'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Map Height', 'shb'),
            'param_name' => 'height',
            "group"=> esc_html__("Map Settings",'shb'),
            "description" => esc_html__("This is value to set height for map. Unit % or px. Example: 100%,500px. Default is 500px", 'shb')
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type Control", 'shb'),
            "param_name" => "control",
            'value' => array(
                esc_html__('Yes', 'shb') => 'yes',
                esc_html__('No', 'shb') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'shb'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Scroll wheel", 'shb'),
            "param_name" => "scrollwheel",
            'value' => array(
                esc_html__('Yes', 'shb') => 'yes',
                esc_html__('No', 'shb') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'shb'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Disable Default UI", 'shb'),
            "param_name" => "disable_ui",
            'value' => array(
                esc_html__('No', 'shb') => 'no',
                esc_html__('Yes', 'shb') => 'yes',
            ),
            "group"=> esc_html__("Map Settings",'shb'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Draggable", 'shb'),
            "param_name" => "draggable",
            'value' => array(
                esc_html__('Yes', 'shb') => 'yes',
                esc_html__('No', 'shb') => 'no',
            ),
            "group"=> esc_html__("Map Settings",'shb'),
            'edit_field_class' => 'vc_col-sm-6 vc_column'
        ),

    )
));
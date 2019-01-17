<?php
/**
 * Created by PhpStorm.
 * User: up7theme
 * Date: 12/04/2017
 * Time: 08:16
 */
if(!function_exists('s7upf_vc_social'))
{
    function s7upf_vc_social($attr,$content = false)
    {
        $html = $el_class = $add_item_social = '' ;
        extract(shortcode_atts(array(
            'el_class'      => '',
            'add_item_social'      => '',
        ),$attr));

        if(isset($add_item_social))
            $data_social = vc_param_group_parse_atts($add_item_social);

        $html .= S7upf_Template::load_view('elements/social',false,array(
            'el_class' => $el_class,
            'data_social' => $data_social
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_social','s7upf_vc_social');

vc_map(
    array(
        "name"      => esc_html__("SV Social", 'shb'),
        "base"      => "s7upf_social",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(

            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add social item', 'shb'),
                'param_name' => 'add_item_social',
                'value' =>'',
                'params' => array(

                    array(
                        'type'          => 'iconpicker',
                        'heading'       => esc_html__( 'Icon', 'shb' ),
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
                        'heading' => esc_html__( 'Add link', 'shb' ),
                        'param_name' => 'link',
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
        )
    )
);
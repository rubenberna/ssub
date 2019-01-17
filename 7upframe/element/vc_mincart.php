<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 17/10/2017
 * Time: 2:15 CH
 */
if ( !class_exists('WC_Product') ) {
    return;
}
if(!function_exists('s7upf_vc_mini_cart'))
{
    function s7upf_vc_mini_cart($attr,$content = false)
    {
        $html = $title = $pull_cart = $icon='' ;
        extract(shortcode_atts(array(
            'style'      => 'style1',
            'pull_cart'      => 'pull-right',
            'icon'      => '',
            'title'      => '',
        ),$attr));
        $html .= S7upf_Template::load_view('elements/mini-cart',false,array(

            'pull_cart' => $pull_cart,
            'icon' => $icon,
            'title' => $title,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_mini_cart','s7upf_vc_mini_cart');

vc_map(
    array(
        "name"      => esc_html__("SV Mini Cart", 'shb'),
        "base"      => "s7upf_mini_cart",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Title', 'shb' ),
                'param_name' => 'title',
                'admin_label' => true,
                'description' => esc_html__('Enter text.','shb'),
            ),
            array(
                'type'          => 'iconpicker',
                'heading'       => esc_html__( 'Change the icon cart ', 'shb' ),
                'param_name'    => 'icon',
                'value'         => '',
                'settings'      => array(
                    'emptyIcon'     => true,
                    'iconsPerPage'  => 4000,
                ),
                'description'   => esc_html__( 'Select icon from library.', 'shb' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Pull cart', 'shb' ),
                'param_name' => 'pull_cart',
                'value' => array(
                    esc_html__('Pull right','shb') => 'pull-right',
                    esc_html__('Pull left','shb') => 'pull-left',
                    esc_html__('Pull center','shb') => 'text-center',

                ),
            ),
        )
    )
);
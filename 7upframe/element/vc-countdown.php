<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/10/2017
 * Time: 2:45 CH
 */
if(!function_exists('s7upf_vc_countdown'))
{
    function s7upf_vc_countdown($attr, $content = false)
    {
        $html = $date= $format = $el_class = '';
        extract(shortcode_atts(array(
            'el_class' => '',
            'format' => '',
            'date' => '',
        ),$attr));
        if(empty($format)) $format = 'WDHMS';
         $label = '[&quot;'.esc_html__("Years","shb").'&quot;,&quot;'.esc_html__("Months","shb").'&quot;,&quot;'.esc_html__("Weeks","shb").'&quot;,&quot;'.esc_html__("Days","shb").'&quot;,&quot;'.esc_html__("Hours","shb").'&quot;,&quot;'.esc_html__("Min","shb").'&quot;,&quot;'.esc_html__("Sec","shb").'&quot;]';

        if(!empty($date))
        $html .= '<div class="week-countdown '.$el_class.'" data-until = "'.$date.'" data-format="'.$format.'" data-labels = "'.$label.'"></div>';
        return $html;
    }
}
stp_reg_shortcode('s7upf_countdown','s7upf_vc_countdown');
vc_map(
    array(
        'name'     => esc_html__( 'SV Countdown', 'shb' ),
        'base'     => 's7upf_countdown',
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        'params'   => array(

            array(
                "type" => "textfield",
                "heading" => esc_html__("Date",'shb'),
                'edit_field_class'=>'vc_col-sm-12 vc_column s7up_vc_calendar',
                "param_name" => "date",
                'description' => esc_html__( 'Select date', 'shb' ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Display format ",'shb'),
                "param_name" => "format",
                'description' => esc_html__( 'Default: "WDHMS" (The format for display : "Y" years, "O" months, "W" weeks, "D" days, "H" hours, "M" minutes, "S" seconds. Upper case to always show, lower case to show only if non-zero)', 'shb' ),
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

<?php
/**
 * Created by PhpStorm.
 * User: 7uptheme
 * Date: 08/04/2017
 * Time: 14:52
 */
if(!function_exists('s7upf_vc_instagram'))
{
    function s7upf_vc_instagram($attr,$content = false)
    {
        $html = $photo_number = $width = $image_source= $data_item_image= $title=$position=  $width_two = $height_two = $style = $click_action =$user = $image_size = '' ;
        extract(shortcode_atts(array(
            'photo_number'      => '',
            'user'      => '',
            'title'      => '',
            'image_size'      => '',
            'style'      => 'style1',
            'click_action'      => 'popup',
            'width'      => '80',
            'width_two'      => '150',
            'height_two'      => '150',
            'position'      => 'text-center',
            'image_source'      => 'instagram',
            'add_item_image'      => '',
            'token'      => '',
            'size_index'      => 0,

        ),$attr));
        if(isset($add_item_image))
            $data_item_image = vc_param_group_parse_atts($add_item_image);
        $html .= S7upf_Template::load_view('elements/instagram',false,array(
            'photo_number' => $photo_number,
            'user' => $user,
            'title' => $title,
            'image_size' => $image_size,
            'style' => $style,
            'click_action' => $click_action,
            'width_two' => $width_two,
            'height_two' => $height_two,
            'image_source' => $image_source,
            'data_item_image' => $data_item_image,
            'token' => $token,
            'size_index' => $size_index,
        ));
        return $html;
    }
}
stp_reg_shortcode('s7upf_instagram','s7upf_vc_instagram');

vc_map(
    array(
        "name"      => esc_html__("SV Instagram", 'shb'),
        "base"      => "s7upf_instagram",
        "icon"      => "icon-st",
        "category"  => '7Up-theme',
        "params"    => array(

            array(
                'type' => 'dropdown',
                'admin_label' => true,
                'heading' => esc_html__( 'Image source', 'shb' ),
                'param_name' => 'image_source',
                'value' => array(
                    esc_html__('Instagram','shb')=>'instagram',
                    esc_html__('Media library','shb')=>'library',
                ),
                'description' => esc_html__( 'Select image source.', 'shb' )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'shb'),
                'param_name' => 'title',
                'description' => esc_html__('Enter text', 'shb'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('User name', 'shb'),
                'param_name' => 'user',
                'description' => esc_html__('Enter user name Instagram.', 'shb'),
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('instagram')
                ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__("Token",'shb'),
                "param_name"    => "token",
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('instagram')
                ),
                "description"   => esc_html__("Enter token to view more 12 of photos. Create token your account at: https://outofthesandbox.com/pages/instagram-access-token",'shb'),
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Add image item', 'shb'),
                'param_name' => 'add_item_image',
                'value' =>'',
                'params' => array(
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('image', 'shb'),
                        'param_name' => 'image',
                        'description' => esc_html__('Select image from media library.', 'shb'),
                    ),
                    array(
                        'type' => 'vc_link',
                        'heading' => esc_html__( 'Add link image', 'shb' ),
                        'param_name' => 'link',
                    ),

                ),
                'callbacks' => array(
                    'after_add' => 'vcChartParamAfterAddCallback'
                ),
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('library')
                ),
            ),

            array(
                'type' => 's7up_number',
                'heading' => esc_html__('Photo number', 'shb'),
                'param_name' => 'photo_number',
                'min' => '1',
                'suffix' => esc_html__('Photo','shb'),
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('instagram')
                ),
            ),
            array(
                "type"          => "dropdown",
                "heading"       => esc_html__("Image custom size",'shb'),
                "param_name"    => "size_index",
                "value"         => array(
                    esc_html__("Small",'shb')          => '0',
                    esc_html__("Medium",'shb')         => '1',
                    esc_html__("Large",'shb')          => '2',
                ),
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('instagram')
                ),
                'description'   => esc_html__( 'Select size', 'shb' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('On click action', 'shb'),
                'group' => esc_html__('Design Option','shb'),
                'param_name' => 'click_action',
                'edit_field_class' => 'vc_column vc_col-sm-12',
                'value' => array(
                    esc_html__('Popup image','shb')=>'popup',
                    esc_html__('Link to Instagram','shb')=>'instagram',
                    esc_html__('None','shb')=>'none',
                ),
                'dependency'    =>array(
                    'element'   =>'image_source',
                    'value'     =>array('instagram')
                ),
                'description' => esc_html__('Select action for click action.','shb'),
            ),

        )
    )
);
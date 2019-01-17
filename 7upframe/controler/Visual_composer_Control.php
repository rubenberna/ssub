<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(class_exists('Vc_Manager')){
    if(!class_exists('S7upf_VisualComposerController')) {
        class  S7upf_VisualComposerController
        {

            static function _init()
            {
                add_filter('vc_shortcodes_css_class',array(__CLASS__,'_change_class'), 10, 2);
                self::s7upf_add_custum_shortcode_param('s7up_number', array(__CLASS__,'_s7upf_number_field_shortcode_param'));
                self::s7upf_add_custum_shortcode_param('s7up_image_check', array(__CLASS__,'_s7upf_image_show_shortcode_param'), get_template_directory_uri(). '/assets/js/vc_js.js');
                $list = array(
                    'post',
                    'page',
                    's7upf_header',
                    's7upf_footer',
                    's7upf_mega_item',
                );
                vc_set_default_editor_post_types( $list );
            }
            static function s7upf_add_custum_shortcode_param($name, $form_field_callback, $script_url = null)
            {
                return WpbakeryShortcodeParams::addField($name, $form_field_callback, $script_url);
            }
            static function _change_class($class_string, $tag) {
                if($tag=='vc_row' || $tag=='vc_row_inner') {
                    $class_string = str_replace('vc_row-fluid', '', $class_string);
                }

                if(defined ('WPB_VC_VERSION'))
                {
                    if(version_compare(WPB_VC_VERSION,'4.2.3','>'))
                    {
                        if($tag=='vc_column' || $tag=='vc_column_inner') {
                            $class_string=str_replace('vc_col', 'col', $class_string);
                        }
                    }else
                    {
                        if($tag=='vc_column' || $tag=='vc_column_inner') {
                            $class_string = preg_replace('/vc_span(\d{1,2})/', 'col-lg-$1', $class_string);
                        }
                    }
                }

                return $class_string;
            }

            static function _s7upf_number_field_shortcode_param($settings, $value){
                $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                $type = isset($settings['type']) ? $settings['type'] : '';
                $min = isset($settings['min']) ? $settings['min'] : '';
                $max = isset($settings['max']) ? $settings['max'] : '';
                $step = isset($settings['step']) ? $settings['step'] : '';
                $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
                $class = isset($settings['class']) ? $settings['class'] : '';
                $output_html = '<input type="number" min="'.$min.'" max="'.$max.'" step="'.$step.'" class="wpb_vc_param_value st-vc-type-st-number form-control' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'"/>';
                if(!empty($suffix)){
                    $output_html .= '<span class="suffix">'.$suffix.'</span>';
                }

                return $output_html;
            }

            static function _s7upf_image_show_shortcode_param($settings, $value){
                if(!empty($settings['element'])){
                    $element = $settings['element'];
                    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                    $width = isset($settings['style_width']) ? $settings['style_width'] : '95';
                    $title_view = isset($settings['title_view']) ? $settings['title_view'] : esc_html__('Zoom in demo','shb');
                    $std = isset($settings['std']) ? $settings['std'] : '';
                    $url_image_default = get_template_directory_uri().'/assets/admin/image/s7up-image-check/'.$param_name.'/'.$std.'.jpg';
                    $class_width = S7upf_Assets::build_css('height:40px; width: '.$width.'%!important;');
                    $html = '<div class="s7up_image_check" data-element="'.$element.'" data-param_name="'.$param_name.'" data-img_url="'.get_template_directory_uri().'/assets/admin/image/s7up-image-check/'.'">';
                    $html .= '<img class = "image_icon_mb '.$class_width.'" src="'.esc_url($url_image_default).'" alt="Image">';
                    $html .= '<span class="title-view-demo ">'.$title_view.'</span><i class="fa fa-share" aria-hidden="true"></i></div>';
                    $html .= '<input  type="hidden" class="wpb_vc_param_value ' . $param_name . ' " name="' . $param_name . '" value="'.$value.'"/>';
                    return $html;
                }else{
                    return false;
                }
            } //Show Image

        }

        S7upf_VisualComposerController::_init();
    }
    
}
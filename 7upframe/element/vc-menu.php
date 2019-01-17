<?php
/**
 * Created by Sublime text 2.
 * User: 7uptheme
 * Date: 18/08/15
 * Time: 10:00 AM
 */

if(!function_exists('s7upf_vc_menu'))
{
    function s7upf_vc_menu($attr,$content = false)
    {
        $html =$color_logo=$logo_text_format=$logo_text= $class_hide=$search_order_by_scroll=$el_class=$search_order_by=$image_size=$data_social_scroll= $show_menu_scroll=$show_mini_cart_scroll=$search_live_scroll=$show_search_scroll= $logo_img_scroll=$menu_scroll_fixed_scroll =$menu_scroll_fixed = $logo_img = $search_live  =  $show_mini_cart  = $show_search = $menu_position = $style = $menu = '' ;
        extract(shortcode_atts(array(
            'menu'      => 'primary',
            'style'      => 'style1',
            'menu_position'      => 'text-center',
            'show_search'      => 'on',
            'show_mini_cart'      => 'on',
            'search_live'      => '',
            'logo_img'      => '',
            'menu_scroll_fixed'      => 'off',
            'menu_scroll_fixed_scroll'      => 'off',
            'logo_img_scroll'      => '',
            'show_search_scroll'      => 'on',
            'search_live_scroll'      => 'on',
            'show_mini_cart_scroll'      => 'on',
            'show_menu_scroll'      => 'off',
            'image_size'      => '',
            'add_item_social_scroll'      => '',
            'search_order_by_scroll'      => '',
            'search_order_by'      => '',
            'el_class'      => '',
            'logo_text'      => '',
            'logo_text_format'      => 'h1',
            'color_logo'      => '',

        ),$attr));

        $logo = $scroll_fixed = $class_color = '';
        $image_size = s7upf_get_size_image('full',$image_size);
        if($menu_scroll_fixed == 'on') $scroll_fixed = 'header-ontop';

        if(isset($add_item_social_scroll))
            $data_social_scroll = vc_param_group_parse_atts( $add_item_social_scroll );
        $class_color =  S7upf_Assets::build_css('color:'.$color_logo.';');
        switch ($style){
            case 'style1':
                $html .= '<div class="header-nav '.$menu_position.' element-menu-'.$style.' '.$el_class.'">';
                $html .= '<nav class="main-nav main-nav1">';
                ob_start();
                if('primary'===$menu){
                    wp_nav_menu( array(
                        'theme_location' => $menu,
                        'container'=>false,
                        'menu_class'=>'',
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                    ));
                }else{
                    wp_nav_menu( array(
                        'menu' => $menu,
                        'container'=>false,
                        'menu_class'=>'',
                        'walker'=>new S7upf_Walker_Nav_Menu(),
                    ));
                }
                $html .= @ob_get_clean();
                $html .= '<a href="#" class="toggle-mobile-menu"><span></span></a>';
                $html .= '</nav></div>';

                $class1 = 'col-md-4 col-sm-4';
                $class2 = 'col-md-8 col-sm-8';
                if('on'==$show_menu_scroll){
                    $class1= 'col-md-2 col-sm-2';
                    $class2= 'col-md-3 col-sm-3';
                }

                $class_col_menu = 'col-md-7 col-sm-7 ';
                if('on' == $menu_scroll_fixed_scroll) {
                    $html .= '<div class="menu-ontop bg-white header-ontop">
                                <div class="container">
                                    <div class="row">';
                    if(!empty($logo_img_scroll)){
                        $html .= '<div class="'.$class1.' col-xs-12">
                                    <ul class="list-inline-block">';
                        if(!empty($logo_img_scroll)) $class_hide = 'hide';
                        if(!empty($logo_img_scroll) || !empty($logo_text)){
                            $html .= '          <li>
                                            <div class="logo-ontop">
                                                <a href="'.esc_url(home_url('/')).'">
                                                '.wp_get_attachment_image($logo_img_scroll,$image_size).'
                                                ';
                            if(!empty($logo_text)){
                                $html .='<'.$logo_text_format.' class="'.$class_color.' '.$class_hide.' logo-text-scroll title18 color">'.s7upf_base64decode($logo_text).'</'.$logo_text_format.'>';
                            }
                            $html .='              </a> </div>
                                        </li>';
                        }
                        if(!empty($content))
                            $html .= '          <li>
                                            <div class="list-category-dropdown">
                                                <a href="#" class="link-cat-dropdown"><i class="fa fa-arrow-circle-down"
                                                                                         aria-hidden="true"></i></a>
                                                <div class="category-dropdown">
                                                    '.wpb_js_remove_wpautop($content, true).'
                                                </div>
                                            </div>
                                        </li>';
                        $html .= '      </ul>
                                </div>';
                    } else  $class_col_menu = 'col-md-9 col-sm-9 ';

                    if('on'==$show_menu_scroll) {
                        $html .= '<div class="'.$class_col_menu.' col-xs-12">
                                    <div class="header-nav text-center">
                                        <nav class="main-nav main-nav1">';
                                            ob_start();
                                            if('primary'===$menu){
                                                wp_nav_menu( array(
                                                    'theme_location' => $menu,
                                                    'container'=>false,
                                                    'menu_class'=>'',
                                                    'walker'=>new S7upf_Walker_Nav_Menu(),
                                                ));
                                            }else{
                                                wp_nav_menu( array(
                                                    'menu' => $menu,
                                                    'container'=>false,
                                                    'menu_class'=>'',
                                                    'walker'=>new S7upf_Walker_Nav_Menu(),
                                                ));
                                            }
                                            $html .= @ob_get_clean();
                        $html .= '      </nav>
                                    </div>
                                  </div>';
                    }
                    $html .= '<div class="'.$class2.' col-xs-12">';
                        $html .= S7upf_Template::load_view('elements/menu-wrap-search-cart',false, array(
                            'show_search_scroll' => $show_search_scroll,
                            'search_live_scroll' => $search_live_scroll,
                            'show_mini_cart_scroll' => $show_mini_cart_scroll,
                            'data_social_scroll' => $data_social_scroll,
                            'show_mini_cart_scroll' => $show_mini_cart_scroll,
                            'search_order_by_scroll' => $search_order_by_scroll,
                        ));
                    $html .='</div>';
                    $html .= '</div></div></div>';
                }
                break;
            case 'style2':
                $html .='<div class="bg-color element-menu-'.$style.' '.$scroll_fixed.' '.$el_class.'"><div class="container"><div class="row">';
                    $html .='<div class="col-md-9 col-sm-9 col-xs-12"><nav class="main-nav main-nav3">';
                        ob_start();
                        if('primary'===$menu){
                            wp_nav_menu( array(
                                'theme_location' => $menu,
                                'container'=>false,
                                'menu_class'=>'',
                                'walker'=>new S7upf_Walker_Nav_Menu(),
                            ));
                        }else{
                            wp_nav_menu( array(
                                'menu' => $menu,
                                'container'=>false,
                                'menu_class'=>'',
                                'walker'=>new S7upf_Walker_Nav_Menu(),
                            ));
                        }
                        $html .= @ob_get_clean();
                        $html .='<a href="#" class="toggle-mobile-menu"><span></span></a>';

                    $html .='</nav></div>';
                    $html .='<div class="col-md-3 col-sm-3 col-xs-12">';
                        $html .= S7upf_Template::load_view('elements/search-menu-style2',false, array(
                            'show_search' => $show_search,
                            'search_live' => $search_live,
                            'search_order_by' => $search_order_by,
                        ));
                    $html .='</div>';
                $html .='</div></div></div>';
                break;
            case 'style3':
                $html .='<div class="menu-fixed element-menu-'.$style.' '.$el_class.'">';
                    $html .='<a href="#" class="btn-menu-fixed"><i class="fa fa-bars" aria-hidden="true"></i></a>';
                    $html .='<nav class="main-nav main-nav-fixed">';
                        ob_start();
                        if('primary'===$menu){
                            wp_nav_menu( array(
                                'theme_location' => $menu,
                                'container'=>false,
                                'menu_class'=>'',
                                'walker'=>new S7upf_Walker_Nav_Menu(),
                            ));
                        }else{
                            wp_nav_menu( array(
                                'menu' => $menu,
                                'container'=>false,
                                'menu_class'=>'',
                                'walker'=>new S7upf_Walker_Nav_Menu(),
                            ));
                        }
                        $html .= @ob_get_clean();

                    $html .='</nav>';
                $html .='</div>';
                break;

        }
        return $html;
    }
}

stp_reg_shortcode('s7upf_menu','s7upf_vc_menu');

vc_map( array(
    "name"      => esc_html__("SV Menu", 'shb'),
    "base"      => "s7upf_menu",
    "icon"      => "icon-st",
    "category"  => '7Up-theme',
    "params"    => array(
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Menu name', 'shb' ),
            'param_name' => 'menu',
            'value' => s7upf_list_menu_name(),
            'description' => esc_html__( 'Select Menu name to display', 'shb' )
        ),
        array(
            'type' => 'dropdown',
            'admin_label' => true,
            'heading' => esc_html__( 'Style menu', 'shb' ),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1 (Default)','shb')=>'style1',
                esc_html__('Style 2','shb')=>'style2',
                esc_html__('Style 3','shb')=>'style3',
            ),
            'description' => esc_html__( 'Select style', 'shb' )
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Menu scroll fixed top', 'shb' ),
            'param_name'  => 'menu_scroll_fixed',
            'value' => array(
                esc_html__('Off','shb') => 'off',
                esc_html__('On','shb') => 'on',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),


        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show box search', 'shb' ),
            'param_name'  => 'show_search',
            'admin_label' => true,
            'value' => array(
                esc_html__('On','shb') => 'on',
                esc_html__('Off','shb') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style2')
            ),
        ),
        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Search live', 'shb' ),
            'param_name'  => 'search_live',
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Search order by', 'shb' ),
            'param_name'  => 'search_order_by',
            'admin_label' => true,
            'value' => array(
                esc_html__('All','shb') => '',
                esc_html__('Posts','shb') => 'post',
                esc_html__('Products','shb') => 'product',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search',
                'value' => array('on')
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Menu position', 'shb' ),
            'param_name' => 'menu_position',
            'value'=>array(
                esc_html__('Center','shb')=> 'text-center',
                esc_html__('Left','shb')=> 'text-left',
                esc_html__('Right','shb')=> 'text-right',
            ),
            'dependency' => array(
                'element' => 'style',
                'value' => array('style1')
            ),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name",'shb'),
            "param_name" => "el_class",
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb' ),
        ),

        // Begin menu scroll fixed top style 1
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Menu scroll fixed top', 'shb' ),
            'param_name'  => 'menu_scroll_fixed_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'value' => array(
                esc_html__('Off','shb') => 'off',
                esc_html__('On','shb') => 'on',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style1')
            ),
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Logo image scroll",'shb'),
            "param_name" => "logo_img_scroll",
            'group' => esc_html__('Menu scroll','shb'),
            'description' => esc_html__( 'Select image from library', 'shb' ),
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__("Logo text",'shb'),
            'group' => esc_html__('Menu scroll','shb'),
            'edit_field_class'=>'vc_col-sm-12 vc_column mb-style-itemscustom',
            "param_name" => "logo_text",
            'description' => esc_html__( 'Enter text (Appears when the logo image is not available)', 'shb' ),
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Logo text format",'shb'),
            "param_name" => "logo_text_format",
            'group' => esc_html__('Menu scroll','shb'),
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
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color logo text",'shb'),
            "param_name" => "color_logo",
            'group' => esc_html__('Menu scroll','shb'),
            'description' => esc_html__( 'Select color.', 'shb' ),
            'edit_field_class'=>'vc_col-sm-6 vc_column',
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show box search', 'shb' ),
            'param_name'  => 'show_search_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'admin_label' => true,
            'value' => array(
                esc_html__('On','shb') => 'on',
                esc_html__('Off','shb') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Search order by', 'shb' ),
            'param_name'  => 'search_order_by_scroll',
            'admin_label' => true,
            'value' => array(
                esc_html__('All','shb') => '',
                esc_html__('Posts','shb') => 'post',
                esc_html__('Products','shb') => 'product',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'checkbox',
            'heading'     => esc_html__( 'Search live', 'shb' ),
            'param_name'  => 'search_live_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'show_search_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show mini cart', 'shb' ),
            'param_name'  => 'show_mini_cart_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'value' => array(
                esc_html__('On','shb') => 'on',
                esc_html__('Off','shb') => 'off',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Show menu', 'shb' ),
            'param_name'  => 'show_menu_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'value' => array(

                esc_html__('Off','shb') => 'off',
                esc_html__('On','shb') => 'on',
            ),
            'edit_field_class'=>'vc_col-sm-12 vc_column',
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__( 'Text content', 'shb' ),
            'group' => esc_html__('Menu scroll','shb'),
            'param_name' => 'content',
            'description' => esc_html__( 'Enter text', 'shb' ),
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__('Add social item', 'shb'),
            'param_name' => 'add_item_social_scroll',
            'group' => esc_html__('Menu scroll','shb'),
            'value' =>'',
            'dependency' => array(
                'element' => 'menu_scroll_fixed_scroll',
                'value' => array('on')
            ),
            'params' => array(
                array(
                    'type'          => 'iconpicker',
                    'heading'       => esc_html__( 'Select icon', 'shb' ),
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
                    'heading' => esc_html__( 'Link item', 'shb' ),
                    'param_name' => 'link',
                ),

            ),
            'callbacks' => array(
                'after_add' => 'vcChartParamAfterAddCallback'
            ),

        ),
        // End menu scroll fixed top style 1
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image Size', 'shb'),
            'param_name' => 'image_size',
            'group' => esc_html__('Design Option','shb'),
            'edit_field_class' => 'vc_column vc_col-sm-12',
            'dependency' => array(
                'element' => 'style',
                'value' => array('style1')
            ),
            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'shb'),
        ),
    )
));
add_action( 'wp_ajax_live_search', 's7upf_live_search' );
add_action( 'wp_ajax_nopriv_live_search', 's7upf_live_search' );
if(!function_exists('s7upf_live_search')){
    function s7upf_live_search() {
        $key = $_POST['key'];
        $post_type = $_POST['post_type'];
        $trim_key = trim($key);
        $args = array(
            'post_type' => $post_type,
            's'         => $key,
            'post_status'    => 'publish',
        );
        $img_df='';
        $query = new WP_Query( $args );

        $default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_70x70.png';
        $img_df = '<img src='.$default_thumbnail.'>';
        if('product' ==$post_type ){
            if( $query->have_posts() && !empty($key) && !empty($trim_key)){
                while ( $query->have_posts() ) : $query->the_post();
                    global $product;
                    $post_object = get_post( $product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    echo    '<div class="item-search-pro">
                            <div class="search-ajax-thumb product-thumb">
                                <a href="'.esc_url(get_the_permalink()).'" class="product-thumb-link">';
                    if(has_post_thumbnail()) echo   get_the_post_thumbnail(get_the_ID(),array(70,70)); else echo do_shortcode($img_df);
                    echo'</a>
                                
                            </div>
                            <div class="search-ajax-title product-info">
                                <h3 class="product-title">
                                    <a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a>
                                </h3>
                                <div class="product-price">
                                   '.$product->get_price_html().'
                                </div>
                               '.s7upf_get_rating_html().'
                            </div>
                            
                        </div>';
                endwhile;
            }
            else{
                echo '<p class="text-center">'.esc_html__("No any results with this keyword.",'shb').'</p>';
            }
            wp_reset_postdata();
        }else{
            if( $query->have_posts() && !empty($key) && !empty($trim_key)){
                while ( $query->have_posts() ) : $query->the_post();
                    echo    '<div class="item-search-pro">
                            <div class="search-ajax-thumb product-thumb">
                                <a href="'.esc_url(get_the_permalink()).'" class="product-thumb-link">';
                    if(has_post_thumbnail()) echo   get_the_post_thumbnail(get_the_ID(),array(70,70)); else echo do_shortcode($img_df);
                    echo'</a>
                                
                            </div>
                            <div class="search-ajax-title product-info">
                                <h3 class="product-title">
                                    <a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a>
                                </h3>
                                <span>'.get_the_date(get_option('date_format')).'</span>
                            </div>
                        </div>';
                endwhile;
            }
            else{
                echo '<p class="text-center">'.esc_html__("No any results with this keyword.",'shb').'</p>';
            }
            wp_reset_postdata();
        }

    }
}
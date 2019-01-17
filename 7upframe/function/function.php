<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
 
/******************************************Core Function******************************************/
//Get option
if(!function_exists('s7upf_get_option')){
    function s7upf_get_option($key,$default=NULL)
    {
        if(function_exists('ot_get_option'))
        {
            return ot_get_option($key,$default);
        }

        return $default;
    }
}
//Get list post type
if(!function_exists('s7upf_list_post_type'))
{
    function s7upf_list_post_type($post_type,$type = true)
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        if($type){
            $page_list[] = array(
                'value' => '',
                'label' => esc_html__('-- Choose One --','shb')
            );
        }
        else $page_list[] = esc_html__('-- Choose One --','shb');
      /*  $args= array(
        'post_type' => $post_type,
        'posts_per_page' => -1, 
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
            if($type){
                $page_list[] = array(
                    'value' => $post->ID,
                    'label' => $post->post_title
                );
            }
            else $page_list[$post->ID] = $post->post_title;
            endwhile;
        endif;
        wp_reset_postdata();
        return $page_list;
        */
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => $post_type, 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    if($type){
                        $page_list[] = array(
                            'value' => $page->ID,
                            'label' => $page->post_title,
                        );
                    }else{
                        $page_list[$page->ID] = $page->post_title;
                    }
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}
//Get list header page
if(!function_exists('s7upf_list_header_page'))
{
    function s7upf_list_header_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[] = array(
            'value' => '',
            'label' => esc_html__('-- Choose One --','shb')
        );
       /* $args= array(
        'post_type' => 's7upf_header',
        'posts_per_page' => -1, 
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
                $page_list[] = array(
                    'value' => $post->ID,
                    'label' => $post->post_title
                );
            endwhile;
        endif;
        wp_reset_postdata();
        return $page_list;*/

        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 's7upf_header', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[] = array(
                        'value' => $page->ID,
                        'label' => $page->post_title,
                    );
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list footer page
if(!function_exists('s7upf_list_footer_page'))
{
    function s7upf_list_footer_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[] = array(
            'value' => '',
            'label' => esc_html__('-- Choose One --','shb')
        );
     /*   $args= array(
            'post_type' => 's7upf_footer',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
            $page_list[] = array(
                'value' => $post->ID,
                'label' => $post->post_title
            );
        endwhile;
        endif;
        wp_reset_postdata();
        return $page_list;*/

        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 's7upf_footer', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[] = array(
                        'value' => $page->ID,
                        'label' => $page->post_title,
                    );
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

if(!function_exists('s7upf_get_data_isset')){
    function s7upf_get_data_isset($parent,$key){
        if(is_array($parent) && count($parent) > 0){
            if(isset($parent[$key])){
                return $parent[$key];
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
}
//Get list sidebar
if(!function_exists('s7upf_get_sidebar_ids'))
{
    function s7upf_get_sidebar_ids($for_optiontree=false)
    {
        global $wp_registered_sidebars;
        $r=array();
        $r[]=esc_html__('--Select--','shb');
        if(!empty($wp_registered_sidebars)){
            foreach($wp_registered_sidebars as $key=>$value)
            {

                if($for_optiontree){
                    $r[]=array(
                        'value'=>$value['id'],
                        'label'=>$value['name']
                    );
                }else{
                    $r[$value['id']]=$value['name'];
                }
            }
        }
        return $r;
    }
}
if(!function_exists('s7upf_get_size_image')){
    function s7upf_get_size_image($default, $value = ''){
        $return = $default;
        if(strpos($value,'x')){
            $size_arr = explode('x',$value);
            if(is_array($size_arr) and count($size_arr) == 2){
                $return = $size_arr;
            }
        }else{
            if($value != '' and !empty($value)){
                $return = $value;
            }else if(strpos($default,'x')){
                $size_arr = explode('x',$default);
                if(is_array($size_arr) and count($size_arr) == 2){
                    $return = $size_arr;
                }
            }
        }
        return $return;
    }
}
if(!function_exists('s7upf_get_vc_build_link')){
    function s7upf_get_vc_build_link($link='' , $class='' , $get='html' , $title_text='' , $attr_title = false){
        $text = '';
        if ( ! empty( $link ) and function_exists('vc_build_link')) {
            $link = vc_build_link( $link );
            if(empty($title_text) and !empty($link['title'])) $title_text = $link['title'];
            if(!empty($title_text))
            $text = '<a class="'.$class.'" '.(($link['url']) ? 'href="'.esc_url( $link['url'] ).'"':''). ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( ($link['title'] and $attr_title == true) ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . $title_text . '</a>';

            if('link' === $get and isset($link['url'])){
                $text = esc_url($link['url']);
            }
        }

        return $text;
    }
}

//Get list mega menu page
if(!function_exists('s7upf_list_meage_menu_page'))
{
    function s7upf_list_meage_menu_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[''] = esc_html__('None','shb');
       /* $args= array(
            'post_type' => 's7upf_mega_item',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
            $page_list[$post->ID] = $post->post_title;
        endwhile;
        endif;
        wp_reset_postdata();
        return $page_list;
        */
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 's7upf_mega_item', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[$page->ID] = $page->post_title;
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}
if (!function_exists('s7upf_convert_array')) {

    function s7upf_convert_array($old_array)
    {
        $new_array = array();
        foreach ($old_array as $key => $value) {
            $new_array[$value] = $key;
        }
        return $new_array;
    }
}

if(!function_exists('s7upf_get_order_list_shop')) {
    function s7upf_get_order_list_shop($current = false, $extra = array(), $return = 'array')
    {
        $default = array(
            'none' => esc_html__('None', 'shb'),
            'ID' => esc_html__('Product ID', 'shb'),
            'author' => esc_html__('Author', 'shb'),
            'title' => esc_html__('Product Title', 'shb'),
            'date' => esc_html__('Product Date', 'shb'),
            'modified' => esc_html__('Last Modified Date', 'shb'),
            'parent' => esc_html__('Product Parent', 'shb'),
            'rand' => esc_html__('Random', 'shb'),
            'comment_count' => esc_html__('Comment Count', 'shb'),
            'popularity' => esc_html__('Product popularity - Best Seller','shb'),
            'rating' => esc_html__('Rating','shb'),
            'mostview' => esc_html__('Most View','shb'),
            'price' => esc_html__('Sort by price','shb'),
        );

        if (!empty($extra) and is_array($extra)) {
            $default = array_merge($default, $extra);
        }

        if ($return == "array") {
            return $default;
        } elseif ($return == 'option') {
            $html = '';
            if (!empty($default)) {
                foreach ($default as $key => $value) {
                    $selected = selected($key, $current, false);
                    $html .= "<option {$selected} value='{$key}'>{$value}</option>";
                }
            }
            return $html;
        }
    }
}

// get list attribute
if(!function_exists('s7upf_list_attribute_product'))
{
    function s7upf_list_attribute_product($show_all = true)
    {
        if($show_all) $attribute_array = array('--Select--' => '');
        else $attribute_array = array();
        $attribute_taxonomies = wc_get_attribute_taxonomies();
        if ($attribute_taxonomies) {
            foreach ($attribute_taxonomies as $key=>$tax) {
                if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {
                    $attribute_array[$tax->attribute_label]=$tax->attribute_name;
                }
            }
        }
        return $attribute_array;
    }
}

//Get order list
if(!function_exists('s7upf_get_order_list'))
{
    function s7upf_get_order_list($current=false,$extra=array(),$return='array')
    {
        $default = array(
            esc_html__('None','shb')               => 'none',
            esc_html__('Post ID','shb')            => 'ID',
            esc_html__('Author','shb')             => 'author',
            esc_html__('Post Title','shb')         => 'title',
            esc_html__('Post Name','shb')          => 'name',
            esc_html__('Post Date','shb')          => 'date',
            esc_html__('Last Modified Date','shb') => 'modified',
            esc_html__('Post Parent','shb')        => 'parent',
            esc_html__('Random','shb')             => 'rand',
            esc_html__('Comment Count','shb')      => 'comment_count',
            esc_html__('View Post','shb')          => 'post_views',
            esc_html__('Like Post','shb')          => '_post_like_count',
            esc_html__('Custom Modified Date','shb')=> 'time_update',
        );

        if(!empty($extra) and is_array($extra))
        {
            $default=array_merge($default,$extra);
        }

        if($return=="array")
        {
            return $default;
        }elseif($return=='option')
        {
            $html='';
            if(!empty($default)){
                foreach($default as $key=>$value){
                    $selected=selected($key,$current,false);
                    $html.="<option {$selected} value='{$key}'>{$value}</option>";
                }
            }
            return $html;
        }
    }
}

// Get sidebar
if(!function_exists('s7upf_get_sidebar'))
{
    function s7upf_get_sidebar()
    {
        $default=array(
            'position'=>'right',
            'id'      =>'blog-sidebar'
        );

        return apply_filters('s7upf_get_sidebar',$default);
    }
}

//Favicon
if(!function_exists('s7upf_load_favicon') )
{
    function s7upf_load_favicon()
    {
        $value = s7upf_get_option('favicon');
        $favicon = (isset($value) && !empty($value))?$value:false;
        if($favicon)
            echo '<link rel="Shortcut Icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" />' . "\n";
    }
}
if(!function_exists( 'wp_site_icon' ) ){
    add_action( 'wp_head','s7upf_load_favicon');
    add_action('login_head', 's7upf_load_favicon');
    add_action('admin_head', 's7upf_load_favicon');
}

//Fill css background
if(!function_exists('s7upf_fill_css_background'))
{
    function s7upf_fill_css_background($data)
    {
        $string = '';
        if(!empty($data['background-color'])) $string .= 'background-color:'.$data['background-color'].';'."\n";
        if(!empty($data['background-repeat'])) $string .= 'background-repeat:'.$data['background-repeat'].';'."\n";
        if(!empty($data['background-attachment'])) $string .= 'background-attachment:'.$data['background-attachment'].';'."\n";
        if(!empty($data['background-position'])) $string .= 'background-position:'.$data['background-position'].';'."\n";
        if(!empty($data['background-size'])) $string .= 'background-size:'.$data['background-size'].';'."\n";
        if(!empty($data['background-image'])) $string .= 'background-image:url("'.$data['background-image'].'");'."\n";
        if(!empty($string)) return S7upf_Assets::build_css($string);
        else return false;
    }
}

// Get list menu
if(!function_exists('s7upf_list_menu_name'))
{
    function s7upf_list_menu_name()
    {
        $menu_nav = wp_get_nav_menus();
        $menu_list = array('Default' => '');
        if(is_array($menu_nav) && !empty($menu_nav))
        {
            foreach($menu_nav as $item)
            { 
                if(is_object($item))
                {
                    $menu_list[$item->name] = $item->slug;
                }
            }
        }
        return $menu_list;
    }
}

//Display BreadCrumb
if(!function_exists('s7upf_display_breadcrumb'))
{
    function s7upf_display_breadcrumb()
    {
        $enable_breadcrumb = s7upf_get_option('s7upf_show_breadrumb','on');
        if(is_page()){
            $enable_breadcrumb = get_post_meta(get_the_ID(),'s7upf_show_breadrumb',true);
            if(empty($enable_breadcrumb)) $enable_breadcrumb = 'on';
        }

        if($enable_breadcrumb == 'on'){
            ?>
            <div class="bread-crumb">
                <div class="container">
                <?php if(class_exists('WC_Product') and is_woocommerce()) woocommerce_breadcrumb(); else echo s7upf_breadcrumb();?>
                </div>
            </div>
        <?php }
    }
}

//get type url
if(!function_exists('s7upf_get_key_url')){
    function s7upf_get_key_url($key,$value){
        if(function_exists('s7upf_get_current_url')) $current_url = s7upf_get_current_url();
        else $current_url = get_the_permalink();
        if(isset($_GET[$key])){
            $current_url = str_replace('&'.$key.'='.$_GET[$key], '', $current_url);
            $current_url = str_replace('?'.$key.'='.$_GET[$key], '?', $current_url);
        }
        if(strpos($current_url,'?') > -1 ){
            $current_url .= '&amp;'.$key.'='.$value;
        }
        else {
            $current_url .= '?'.$key.'='.$value;
        }
        return $current_url;
    }
}
//get option both id
if(!function_exists('s7upf_get_option_both_id')){
    function s7upf_get_option_both_id($id_option, $id_metabox, $key_check, $value=NULL){
        $key_check_metabox = get_post_meta(get_the_ID(),$key_check,true);
        $key_check_option = s7upf_get_option($key_check);
        if('on' == $key_check_option){
            $value = s7upf_get_option($id_option,$value);
        }
        if('on'==$key_check_metabox){
            $value = get_post_meta(get_the_ID(),$id_metabox,true);
        }else if('off' == $key_check_metabox){
            return;
        }
        return $value;
    }
}

function s7upf_breadcrumb(){
    /* === OPTIONS === */
    $text['home']     = esc_html__('Home','shb');
    $text['category'] = esc_html__('%s','shb');
    $text['tax']      = esc_html__('Archive for "%s"','shb');
    $text['search']   = esc_html__('Search Results for "%s" Query','shb');
    $text['tag']      = esc_html__('%s','shb');
    $text['author']   = esc_html__('Articles Posted by %s','shb');
    $text['404']      = esc_html__('Error 404','shb');
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = '<span class="delimiter">/</span>';
    $delimiter_cat   = ' , ';
    $before      = '<span class="current">';
    $after       = '</span>';
    /* === END OF OPTIONS === */
    global $post;
    $homeLink = home_url() . '/';
    $linkBefore = '<span class = "mb">';
    $linkAfter = '</span>';

    $link = $linkBefore . '<a href="%1$s">%2$s</a>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
    } else {
        echo '<div id="crumbs" >' . sprintf($link, $homeLink, $text['home']) . $delimiter;

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a', $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo wp_kses_post($cats);
            }
            echo wp_kses_post($before . sprintf($text['category'], single_cat_title('', false)) . $after);
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if (!is_wp_error($thisCat) and $thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' , $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo wp_kses_post($cats);
            }
            echo wp_kses_post($before . sprintf($text['tax'], single_cat_title('', false)) . $after);

        }elseif ( is_search() ) {
            echo wp_kses_post($before . sprintf($text['search'], get_search_query()) . $after);
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo wp_kses_post($before . get_the_time('d') . $after);
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo wp_kses_post($before . get_the_time('F') . $after);
        } elseif ( is_year() ) {
            echo wp_kses_post($before . get_the_time('Y') . $after);
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);
            } else {
                $cat = get_the_category();
                foreach ($cat as $key=>$value){
                    if($key+1 == count($cat)){
                        $cats = get_category_parents($value, TRUE, $delimiter);
                    }else{
                        $cats = get_category_parents($value, TRUE, $delimiter_cat);
                    }
                    if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                    $cats = str_replace('<a', $linkBefore . '<a' , $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    echo wp_kses_post($cats);
                }
                if ($showCurrent == 1) echo wp_kses_post($before . get_the_title() . $after);
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo wp_kses_post($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a', $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo wp_kses_post($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo wp_kses_post($before . get_the_title() . $after);
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wp_kses_post($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1) echo wp_kses_post($delimiter);
            }
            if ($showCurrent == 1) echo wp_kses_post($delimiter . $before . get_the_title() . $after);
        } elseif ( is_tag() ) {
            echo wp_kses_post($before . sprintf($text['tag'], single_tag_title('', false)) . $after);
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo wp_kses_post($before . sprintf($text['author'], $userdata->display_name) . $after);
        } elseif ( is_404() ) {
            echo wp_kses_post($before . $text['404'] . $after);
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page','shb') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</div>';
    }
}

//Get page value by ID
if(!function_exists('s7upf_get_value_by_id'))
{   
    function s7upf_get_value_by_id($key)
    {
        if(!empty($key)){
            $id = get_the_ID();
            if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
            if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
            if(is_archive() || is_search()) $id = 0;
            if (class_exists('woocommerce')) {
                if(is_shop()) $id = (int)get_option('woocommerce_shop_page_id');
                if(is_cart()) $id = (int)get_option('woocommerce_cart_page_id');
                if(is_checkout()) $id = (int)get_option('woocommerce_checkout_page_id');
                if(is_account_page()) $id = (int)get_option('woocommerce_myaccount_page_id');
            }
            $value = get_post_meta($id,$key,true);
            if(empty($value)) $value = s7upf_get_option($key);
            return $value;
        }
        else return 'Missing a variable of this funtion';
    }
}

//Check woocommerce page
if (!function_exists('s7upf_is_woocommerce_page')) {
    function s7upf_is_woocommerce_page() {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
    }
}

//navigation
if(!function_exists('s7upf_paging_nav'))
{
    function s7upf_paging_nav()
    {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }
        $style_blog = s7upf_get_option('s7upf_style_blog');
        $class_style='pagination-blog';
        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => wp_kses_post('<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>', 'shb' ),
            'next_text' => wp_kses_post('<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', 'shb' ),
        ) );

        if ($links) : ?>
        <div class="row">
            <div class="col-md-12">
                <nav class="<?php echo esc_attr($class_style)?> navigation paging-navigation" role="navigation">
                    <div class="pagination loop-pagination">
                        <?php echo wp_kses_post($links); ?>
                    </div><!-- .pagination -->
                </nav><!-- .navigation -->
            </div>
        </div>
        <?php endif;
    }
}

//Set post view
if(!function_exists('s7upf_set_post_view'))
{
    function s7upf_set_post_view($post_id=false)
    {
        if(!$post_id) $post_id=get_the_ID();

        $view=(int)get_post_meta($post_id,'post_views',true);
        $view++;
        update_post_meta($post_id,'post_views',$view);
    }
}

if(!function_exists('s7upf_get_post_view'))
{
    function s7upf_get_post_view($post_id=false)
    {
        if(!$post_id) $post_id=get_the_ID();

        return (int)get_post_meta($post_id,'post_views',true);
    }
}

//remove attr embed
if(!function_exists('s7upf_remove_w3c')){
    function s7upf_remove_w3c($embed_code){
        $embed_code=str_replace('webkitallowfullscreen','',$embed_code);
        $embed_code=str_replace('mozallowfullscreen','',$embed_code);
        $embed_code=str_replace('frameborder="0"','',$embed_code);
        $embed_code=str_replace('frameborder="no"','',$embed_code);
        $embed_code=str_replace('scrolling="no"','',$embed_code);
        $embed_code=str_replace('&','&amp;',$embed_code);
        return $embed_code;
    }
}

// MetaBox
if(!function_exists('s7upf_display_metabox'))
{
    function s7upf_display_metabox($type ='') {
        switch ($type) {
            case 'single-info':?>
                <?php
                $style_info = s7upf_get_option('s7upf_style_single_info');
                if('style2' == $style_info){ ?>
                    <div class="row">
                        <div class="<?php echo (has_excerpt( get_the_ID()))? 'col-md-3 col-sm-4' : 'col-md-12 col-sm-12 not-text-intro'?> col-xs-12">
                            <div class="single-post-info">
                                <?php $cats = get_the_category_list(', ');?>
                                <?php if($cats){ ?>
                                    <p class="desc">
                                        <span><?php esc_html_e('Categories: ','shb'); ?></span>
                                        <?php echo wp_kses_post($cats); ?>
                                    </p>
                                <?php } ?>
                                <p class="desc">
                                    <span><?php esc_html_e('Post by:','shb'); ?></span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
                                </p>
                                <div class="post-comment-date">
                                    <div class="post-date">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span><?php the_date(get_option('date_format')); ?></span>
                                    </div>
                                    <div class="post-comment">
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                        <a href="<?php echo esc_url( get_comments_link() ); ?>" class="df-silver">
                                            <?php
                                            printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'shb' ), number_format_i18n( get_comments_number() ));
                                            ?>
                                        </a>
                                    </div>
                                    <?php if(is_sticky()){?>
                                        <div class="is-post-sticky">
                                            <i class="fa fa-thumb-tack" aria-hidden="true"></i><span><?php echo esc_html__('Sticky','shb'); ?> </span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php if ( has_excerpt( get_the_ID()) ) { ?>
                            <div class="col-md-9 col-sm-8 col-xs-12">
                                <p class="single-text-intro">
                                    <?php
                                    echo get_the_excerpt();
                                    ?>
                                </p>
                            </div>
                        <?php  } ?>
                    </div>
                <?php } else {?>
                    <div class="list-meta-style-defautl">
                        <ul class="list-meta-block">
                            <?php if(is_sticky()){ ?>
                                <li class="is_sticky">
                                    <span><i class="fa fa-thumb-tack" aria-hidden="true"></i><?php echo esc_html__('Sticky','shb'); ?> </span>
                                </li>
                            <?php } ?>
                            <li>
                                <i class="fa fa-user gray" aria-hidden="true"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="df-silver"><?php echo get_the_author(); ?></a>
                            </li>
                            <li>
                                <i class="fa fa-calendar gray"></i>
                                <span><?php echo get_the_date(get_option('date_format')); ?></span>
                            </li>
                            <li>
                                <i aria-hidden="true" class="fa fa-comment gray"></i>
                                <a href="<?php echo esc_url( get_comments_link() ); ?>" class="df-silver">
                                    <?php
                                    printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'shb' ), number_format_i18n( get_comments_number() ));
                                    ?>
                                </a>
                            </li>
                            <?php $cats = get_the_category_list(', ');
                            if($cats) { ?>
                                <li>
                                    <div class="df-category-list">
                                        <i class="fa fa-folder-open gray" aria-hidden="true"></i>
                                        <?php echo do_shortcode($cats); ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php if ( has_excerpt( get_the_ID()) ) { ?>
                        <div class="single-excerpt-default">

                                <?php
                                echo get_the_excerpt();
                                ?>
                        </div>
                    <?php  } ?>

                <?php
                }
                break;

            default:?>
                <ul class="post_meta_links">
                    <li class="date"><?php echo get_the_time('d F Y')?></li>
                    <li class="post_by"><i><?php esc_html_e('by', 'shb');?>:</i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></li>
                    <li class="post_categoty"><i><?php esc_html_e('in', 'shb');?>:</i>
                        <?php $cats = get_the_category_list(', ');?>
                        <?php if($cats) echo wp_kses_post($cats); else esc_html_e("No Category",'shb');?>
                    </li>
                    <li class="post_categoty st_post_tag"><i><?php esc_html_e('tag', 'shb');?>:</i>
                        <?php $cats = get_the_tag_list(' ',', ',' ');?>
                        <?php if($cats) echo wp_kses_post($cats); else esc_html_e("No Tag",'shb');?>
                    </li>
                    <li class="post_comments">
                        <i><?php esc_html_e('note', 'shb');?>:</i>
                        <a href="<?php echo esc_url( get_comments_link() ); ?>">
                            <?php
                            printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'shb' ), number_format_i18n( get_comments_number() ));
                            ?>
                        </a>
                    </li>
                </ul>                
                <?php
                break;
        }
    ?>        
    <?php
    }
}
if(!function_exists('s7upf_get_header_default')){
    function s7upf_get_header_default(){
        ?>
        <div class="header-general mb_header_default">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="logo logo-pages">
                            <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr(get_bloginfo('name', 'display'));?>">
                                <?php echo '<h1>'.get_bloginfo('name', 'display').'</h1>'; ?>
                            </a>
                        </div>
                    </div>
                    <?php if ( has_nav_menu( 'primary' ) ) { ?>
                        <div class="col-md-10 col-sm-12 col-xs-12">
                        <nav class="main-nav main-nav-pages">
                            <?php
                            wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'container'=>false,
                                    'walker'=>new S7upf_Walker_Nav_Menu(),
                                )
                            ); ?>
                            <a href="#" class="toggle-mobile-menu"><span></span></a>
                        </nav>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_footer_default')){
    function s7upf_get_footer_default(){
        ?>
        <div id="footer" class="default-footer">
            <div class="container">
                <p class="copyright"><?php esc_html_e("Copyright &copy; by 7up. All Rights Reserved. Designed by",'shb')?> <a href="<?php echo esc_url(esc_html__('http://7uptheme.com/','shb'))?>"><?php esc_html_e("7uptheme.com",'shb')?></a></p>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_footer_visual')){
    function s7upf_get_footer_visual($page_id){
        ?>
        <div id="footer" class="footer-page">
            <div class="container">
                <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
            </div>
        </div>
        <?php
    }
}

if(!function_exists('s7upf_check_catelog_mode')){
    function s7upf_check_catelog_mode(){
        if ( !class_exists('WC_Product') )  return;
        $catelog_mode = s7upf_get_option('woo_catelog');
        $hide_other_page = s7upf_get_option('hide_other_page');
        $hide_detail = s7upf_get_option('hide_detail');
        $hide_admin = s7upf_get_option('hide_admin');
        $hide_shop = s7upf_get_option('hide_shop');
        $hide_price = s7upf_get_option('hide_price');
        $show_mode = 'off';
        if($catelog_mode == 'on'){
            if($hide_other_page == 'on' && !is_super_admin() && !is_shop() && !is_single()) $show_mode = 'on';
            if($hide_other_page == 'on' && $hide_admin == 'on' && is_super_admin() && !is_shop() && !is_single() ) $show_mode = 'on';
            if($hide_price == 'on' && !is_super_admin()) $show_mode = 'on';
            if($hide_price == 'on' && $hide_admin == 'on' && is_super_admin() ) $show_mode = 'on';
            if(is_shop()) {
                if($hide_shop == 'on' && !is_super_admin()) $show_mode = 'on';
                if($hide_shop == 'on' && $hide_admin == 'on' && is_super_admin()) $show_mode = 'on';
            }
            if(is_single()) {
                if($hide_detail == 'on' && !is_super_admin()) $show_mode = 'on';
                if($hide_detail == 'on' && $hide_admin == 'on' && is_super_admin()) $show_mode = 'on';
            }
        }
        return $show_mode;
    }
}
if(!function_exists('s7upf_get_header_visual')){
    function s7upf_get_header_visual($page_id){
        ?>
        <div id="header" class="header-page header-fix-top-<?php echo get_post_meta($page_id,'s7upf_header_fix_top',true); ?> <?php echo get_post_meta($page_id,'s7upf_header_add_class',true); ?>">
            <div class="container">
                <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_main_class')){
    function s7upf_get_main_class(){
        $sidebar=s7upf_get_sidebar();
        $sidebar_pos=$sidebar['position'];
        $main_class = 'col-md-12';
        if($sidebar_pos != 'no') $main_class = 'col-md-9 col-sm-8 col-xs-12';
        return $main_class;
    }
}
if(!function_exists('s7upf_output_sidebar')){
    function s7upf_output_sidebar($position){
        $sidebar = s7upf_get_sidebar();
        $sidebar_pos = $sidebar['position'];
        if($sidebar_pos == $position) get_sidebar();
    }
}
if(!function_exists('s7upf_fix_import_category')){
    function s7upf_fix_import_category($taxonomy){
        global $s7upf_config;
        $data = $s7upf_config['import_category'];
        if(!empty($data)){
            $data = json_decode($data,true);
            foreach ($data as $cat => $value) {
                $parent_id = 0;
                $term = get_term_by( 'slug',$cat, $taxonomy );
                if(isset($term->term_id)){
                    $term_parent = get_term_by( 'slug', $value['parent'], $taxonomy );
                    if(isset($term_parent->term_id)) $parent_id = $term_parent->term_id;
                    if($parent_id) wp_update_term( $term->term_id, $taxonomy, array('parent'=> $parent_id) );
                    if($value['thumbnail']){
                        if($taxonomy == 'product_cat')  update_metadata( 'woocommerce_term', $term->term_id, 'thumbnail_id', $value['thumbnail']);
                        else{
                            update_term_meta( $term->term_id, 'thumbnail_id', $value['thumbnail']);
                        }
                    }
                    if($value['icon']){
                        if($taxonomy == 'product_cat')  update_metadata( 'woocommerce_term', $term->term_id, 'cat-icon-image', $value['icon']);
                        else{
                            update_term_meta( $term->term_id, 'cat-icon-image', $value['icon']);
                        }
                    }
                }
            }
        }
    }
}

if(!function_exists('s7upf_fix_import_category')){
    function s7upf_fix_import_category($taxonomy){
        global $s7upf_config;
        $data = $s7upf_config['import_category'];
        if(!empty($data)){
            $data = json_decode($data,true);
            foreach ($data as $cat => $value) {
                $parent_id = 0;
                $term = get_term_by( 'slug',$cat, $taxonomy );
                $term_parent = get_term_by( 'slug', $value['parent'], $taxonomy );
                if(isset($term_parent->term_id)) $parent_id = $term_parent->term_id;
                if($parent_id) wp_update_term( $term->term_id, $taxonomy, array('parent'=> $parent_id) );
                if($value['thumbnail']){
                    if($taxonomy == 'product_cat')  update_metadata( 'woocommerce_term', $term->term_id, 'thumbnail_id', $value['thumbnail']);
                    else{
                        update_term_meta( $term->term_id, 'thumbnail_id', $value['thumbnail']);
                    }
                }
                if($value['icon']){
                    if($taxonomy == 'product_cat')  update_metadata( 'woocommerce_term', $term->term_id, 'cat-icon-image', $value['icon']);
                    else{
                        update_term_meta( $term->term_id, 'cat-icon-image', $value['icon']);
                    }
                }
            }
        }
    }
}
if ( ! function_exists( 's7upf_get_google_link' ) ) {
    function s7upf_get_google_link() {
        $protocol = is_ssl() ? 'https' : 'http';
        $fonts_url = '';
        $fonts  = array(
                    'Poppins:300,400,700,500',
                    'Lato:300,400,700',
                );
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), $protocol.'://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}
// get list taxonomy
if(!function_exists('s7upf_list_taxonomy'))
{
    function s7upf_list_taxonomy($taxonomy,$show_all = true)
    {
        if($show_all) $list = array('--Select--' => '');
        else $list = array();
        if(!isset($taxonomy) || empty($taxonomy)) $taxonomy = 'category';
        $tags = get_terms($taxonomy);
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
            }
        }
        return $list;
    }
}

/***************************************END Core Function***************************************/


/***************************************Add Theme Function***************************************/


//get data by key of cat
if(!function_exists('s7upf_get_metabox_shop_cat')){
    function s7upf_get_metabox_shop_cat($cat_id, $option_id, $default = ''){
        $value = $default;
        if(class_exists('woocommerce')) {
            if (is_product_category()) {
                $t_id = get_queried_object()->term_id;
                $value = get_term_meta($t_id, $cat_id, true);

            }
        }
        if(empty($value)){
            $value = s7upf_get_option($option_id);
        }

        return $value;
    }
}

if(!function_exists('s7upf_get_metabox_check_on_off_shop_cat')){
    function s7upf_get_metabox_check_on_off_shop_cat($cat_id, $option_id, $key_check, $default = ''){
        $value = $default;
        if(class_exists('woocommerce')) {
            if (is_product_category()) {
                $t_id = get_queried_object()->term_id;

                $check = get_term_meta($t_id,$key_check,true);
                if($check == ''){
                    $value = s7upf_get_option($option_id);
                }else{

                    $value = get_term_meta($t_id, $cat_id, true);
                }
            }else{
                $value = s7upf_get_option($option_id);
            }
        }

        return $value;
    }
}
//Display Banner
if(!function_exists('s7upf_display_banner'))
{
    function s7upf_display_banner()
    {
        $item_slider_banner='';
        $enable_banner = 'off';
        if(is_single()){
            $enable_banner = s7upf_get_value_by_id('enable_banner_single');
            $item_slider_banner = s7upf_get_option_both_id('list_item_banner_blog_single','list_item_banner_blog_single','enable_banner_single');
            if(class_exists('WC_Product') and is_woocommerce()){
                $enable_banner = s7upf_get_value_by_id('enable_banner_shop_single');
                $item_slider_banner = s7upf_get_option_both_id('list_item_banner_shop_single','list_item_banner_shop_single','enable_banner_shop_single');
            }

        }else if(is_search()){
            $enable_banner = s7upf_get_option('enable_banner_blog_list_search');
            $item_slider_banner = s7upf_get_option('list_item_banner_blog_list_search');
        }else if(is_archive()){
            $enable_banner = s7upf_get_value_by_id('enable_banner_blog_list');
            $item_slider_banner = s7upf_get_option_both_id('list_item_banner_blog_list','list_item_banner_blog_list','enable_banner_blog_list');

            if(class_exists('WC_Product') and is_woocommerce()){
                $enable_banner = s7upf_get_metabox_shop_cat('enable_banner_shop_cat','enable_banner_shop_list');
                $item_slider_banner =  s7upf_get_metabox_check_on_off_shop_cat('banner-product-cat-item','list_item_banner_shop_list','enable_banner_shop_cat');
                if(is_shop()){

                    $item_slider_banner =  s7upf_get_option('list_item_banner_shop_list');
                }else if(is_product_category()){
                    $item_slider_banner =  s7upf_get_metabox_check_on_off_shop_cat('banner-product-cat-item','list_item_banner_shop_list','enable_banner_shop_cat');
                }
            }

        }else if(is_home()){
            $enable_banner = s7upf_get_option('enable_banner_blog_list');
            $item_slider_banner = s7upf_get_option('list_item_banner_blog_list');
        }else if(is_page()){

            $enable_banner = get_post_meta(get_the_ID(),'enable_banner_page',true);
            $item_slider_banner = get_post_meta(get_the_ID(),'list_item_banner_page',true);
        }

        if($enable_banner == 'on'){
            if(!empty($item_slider_banner) and is_array($item_slider_banner)){
                $control = (count($item_slider_banner)>1)?'true' : 'false'; ?>
                <div class="banner-slider banner-shop-slider bg-slider">
                    <div class="wrap-item" data-gation="true" <?php if($control=='true') {?> data-transition="fade" data-navigation="true" data-autoplay="true" <?php } ?>data-itemscustom="[[0,1]]">
                        <?php foreach ($item_slider_banner as $value){ ?>
                            <div class="item-slider ">
                                <div class="banner-thumb">
                                    <?php if(!empty($value['img'])){ ?>
                                        <a href="#"><img src="<?php echo esc_url($value['img'])?>" alt="" /></a>
                                    <?php } ?>
                                </div>
                                <div class="banner-info">
                                    <?php if(!empty($value['info'])) echo do_shortcode($value['info']);?>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php

            }?>
        <?php }
    }
}

if(!function_exists('s7upf_get_style_blog_by_option')){
    function s7upf_get_style_blog_by_option($key_blog='',$key_search=''){
        if(is_search()){
            return s7upf_get_option($key_search);
        } else{
            return s7upf_get_option($key_blog);
        }
    }
}
if(!function_exists('s7upf_get_term_post_count_by_type')) {
    function s7upf_get_term_post_count_by_type($term, $taxonomy, $type = 'post')
    {
        if($term == 'post-format-standard'){
            $post_formats = get_theme_support('post-formats');
            if ($post_formats && is_array($post_formats[0]) && count($post_formats[0])) {
                $terms = array();
                foreach ($post_formats[0] as $format) {
                    $terms[] = 'post-format-'.$format;
                }
                $args = array(
                    'fields' => 'ids',
                    'posts_per_page' => -1, //-1 to get all post
                    'post_type' => $type,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            'terms' => $terms,
                            'operator' => 'NOT IN'
                        )
                    )
                );
            }

        }else{
            $args = array(
                'fields' => 'ids',
                'posts_per_page' => -1, //-1 to get all post
                'post_type' => $type,
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'slug',
                        'terms' => $term
                    )
                )
            );
        }
        if ($posts = get_posts($args))
            return count($posts);

        return 0;
    }
}

// Mini cart
if(!function_exists('s7upf_mini_cart')) {
    function s7upf_mini_cart($echo = false)
    {
        $default_image = get_template_directory_uri().'/assets/images/no-thumb/img_70x70.png';

        if (!WC()->cart->is_empty()) {
            ?>
            <div class="widget_shopping_cart_content">
                <h2 class="mont-font title18 color">(<span class="cart-item-count mb-count-ajax"><?php echo count( WC()->cart->get_cart() );?></span>)<?php echo(count( WC()->cart->get_cart() )>1)? esc_html__(' ITEMS IN MY CART','shb'): esc_html__(' ITEM IN MY CART','shb'); ?> </h2>
                <div class="list-mini-cart-item woocommerce">
                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        $thumb_html = '<img alt="product" src="'.$default_image.'">';
                        if(has_post_thumbnail($product_id)) $thumb_html = $_product->get_image(array(70,70));

                        $post_object = get_post( $_product->get_id() );
                        setup_postdata( $GLOBALS['post'] =& $post_object );
                        ?>
                        <div class="productmini-cat table product mb-style-minicart" data-key="<?php echo esc_attr($cart_item_key); ?>">

                            <div class="product-thumb">
                                <?php echo s7upf_edit_link(); ?>
                                <a class="product-thumb-link" href="<?php echo esc_url( $_product->get_permalink( $cart_item )); ?>">
                                    <?php echo wp_kses_post($thumb_html);?>
                                </a>

                                <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-trash-o" aria-hidden="true"></i></a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'shb' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );?>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="<?php echo esc_url( $_product->get_permalink( $cart_item )); ?>"><?php echo esc_attr($_product->get_title()); ?></a>
                                </h3>
                                <div class="product-price">
                                    <ins>
                                        <span>
                                            <?php
                                            echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                            ?>
                                        </span>
                                    </ins>
                                </div>
                                <div class="mini-cart-qty">
                                    <label><?php echo esc_html__('Qty:','shb')?></label>
                                    <span><?php echo esc_attr($cart_item['quantity']); ?></span>
                                </div>
                                <?php echo s7upf_get_rating_html(); ?>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <div class="mini-cart-total mont-font  clearfix">
                    <strong class="pull-left"><?php echo esc_html__('TOTAL','shb')?></strong>
                    <span class="pull-right color"><?php echo WC()->cart->get_cart_total(); ?></span>
                </div>
                <div class="mini-cart-button clearfix">
                    <a class="mini-cart-view shop-button pull-left" href="<?php echo esc_url(wc_get_cart_url())?>"><?php echo esc_html__('View my cart ','shb')?></a>
                    <a class="mini-cart-checkout shop-button pull-right" href="<?php echo esc_url(wc_get_checkout_url())?>"><?php echo esc_html__('Checkout','shb')?></a>
                </div>
            </div>
            <?php
        }else{
            ?>
            <h5 class="mini-cart-head"><?php echo esc_html__("No Product in your cart.",'shb')?></h5>
            <?php
        }
    }
}

if(!function_exists('s7upf_get_rating_html')){
    function s7upf_get_rating_html($count = false,$style = ''){
        global $product;
        $html = '';
        $star = $product->get_average_rating();
        $review_count = $product->get_review_count();
        $width = $star / 5 * 100;
        $class_width = S7upf_Assets::build_css('width:'.$width.'%');
        $html .=    '<div class="product-rate '.esc_attr($style).'">
                        <div class="product-rating '.$class_width.'"></div>';
        if($count) $html .= '<span>('.$review_count.'s)</span>';
        $html .=    '</div>';
        return $html;
    }
}

if ( ! function_exists( 's7upf_edit_link' ) ) {
    function s7upf_edit_link() {
        $show = s7upf_get_option('s7upf_show_editor');
        if('on'==$show)
        edit_post_link(
            sprintf(
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'shb' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
}
if ( ! function_exists( 's7upf_get_post_format' ) ) {
    function s7upf_get_post_format() {
        $get_post_format = get_post_format(get_the_ID());

        if(empty($get_post_format)) $get_post_format= 'standard';
        $count_post_format= s7upf_get_term_post_count_by_type("post-format-$get_post_format", 'post_format');
        ?>
            <div class="post-format">
                <a href="<?php echo esc_url(get_post_format_link($get_post_format)); ?>">
                    <?php
                    switch ($get_post_format){
                        case 'image':
                            echo esc_html__('Image','shb');
                            break;
                        case 'gallery':
                            echo esc_html__('Gallery','shb');
                            break;
                        case 'video':
                            echo esc_html__('Video','shb');
                            break;
                        case 'audio':
                            echo esc_html__('Audio','shb');
                            break;
                        case 'aside':
                            echo esc_html__('Aside','shb');
                            break;
                        case 'chat':
                            echo esc_html__('Chat','shb');
                            break;
                        case 'link':
                            echo esc_html__('Link','shb');
                            break;
                        case 'quote':
                            echo esc_html__('Quote','shb');
                            break;
                        case 'status':
                            echo esc_html__('Status','shb');
                            break;
                        default:
                            echo esc_html__('Standard','shb');
                            break;
                    }
                    ?>
                </a>
                <span><?php echo esc_attr($count_post_format); ?></span>
            </div>
        <?php
    }
}
if(!function_exists('s7upf_get_image_product_element')) {
    function s7upf_get_image_product_element($image_size = 'full',$animation_img='',$hide_mask_img = 'true'){
        $default_image = get_template_directory_uri().'/assets/images/no-thumb/placeholder.png';
        global $post;
        if($hide_mask_img=='true') $class='df-thumb-link'; else $class='product-thumb-link df-thumb-link';
        $product = new WC_product(get_the_ID());
        $attachment_ids = $product->get_gallery_image_ids();
        if($animation_img == 'zoom-out') echo '<div class="banner-quangcao zoom-out">';
        if($animation_img == 'zoom-rotate') echo '<div class="banner-quangcao zoom-rotate">';
        if($animation_img == 'fade-out-in') echo '<div class="banner-quangcao fade-out-in">';
        ?>
        <a href="<?php the_permalink(); ?>" class="<?php if($animation_img=='zoom-out'|| $animation_img=='zoom-rotate'|| $animation_img=='fade-out-in') echo'adv-thumb-link '.$class; else echo esc_attr($class).' '.$animation_img; ?> ">
            <?php
            if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail( get_the_ID(), $image_size);
            }  else {
                $dimensions = wc_get_image_size( $image_size ); ?>
                <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?>px" height="<?php echo esc_attr( $dimensions['height'] ) ?>px"  alt="<?php esc_html_e('Image Default','shb')?>" title="<?php esc_html_e('product','shb')?>" />
                <?php
            }
            if('zoom-out' === $animation_img){
                if(is_array($attachment_ids) and count($attachment_ids)>0){

                    foreach ($attachment_ids as $key => $value){
                        if($key == 0){
                            echo wp_get_attachment_image($value,$image_size,false);
                        }
                    }
                } else if ( has_post_thumbnail() ) {
                    echo get_the_post_thumbnail( get_the_ID(), $image_size);
                }  else {
                    $dimensions = wc_get_image_size( $image_size ); ?>
                    <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','shb')?>" />
                    <?php
                }
            } ?>

        </a>
        <?php
        if($animation_img == 'zoom-out'|| $animation_img == 'zoom-rotate' || $animation_img == 'fade-out-in') echo '</div>';

    }
}

if(!function_exists('s7upf_show_product_loop_new_badge')){
    function s7upf_show_product_loop_new_badge($day='',$before='',$after=''){

        $html = '';
        if(is_int($day) and !empty($day))
            $day = 10;
        $postdate = get_the_time ( 'Y-m-d' );
        $postdatestamp = strtotime ( $postdate );

        if ((time () - (60 * 60 * 24 * $day)) < $postdatestamp ) {
            $html .= wp_kses_post($before);
            $html .= esc_html__('New','shb');
            $html .= wp_kses_post($after);
        }
        return $html;
    }
}


//Compare URL
if(!function_exists('s7upf_compare_url')){
    function s7upf_compare_url($id = false,$text=''){
        $html = '';
        if(class_exists('YITH_Woocompare')){
            if(!$id) $id = get_the_ID();
            $cp_link = str_replace('&', '&amp;',add_query_arg( array('action' => 'yith-woocompare-add-product','id' => $id )));
            $html .= ' <a href="'.esc_url($cp_link).'" class="mb-compare product-compare compare compare-link" data-product_id="'.get_the_ID().'"><i class="fa fa-stumbleupon" aria-hidden="true"></i>';
            if(!empty($text)) $html .= '<span>'.$text.'</span>';
            $html .= '</a>';
        }
        return $html;
    }
}
if(!function_exists('s7up_wishlist_url')){
    function s7up_wishlist_url($text="", $class=""){
        $html = '';
        if(class_exists('YITH_WCWL_Init')){
            $html .= ' <a href="'.esc_url(str_replace('&', '&amp;',add_query_arg( 'add_to_wishlist', get_the_ID() ))).'"  class="mb-wishlist add_to_wishlist wishlist-link  '.$class.'" rel="nofollow" data-product-id="'.get_the_ID().'" data-product-title="'.esc_attr(get_the_title()).'"><i class="fa fa-heart" aria-hidden="true"></i>';
            if(!empty($text)) $html .= '<span>'.$text.'</span>';
            $html .= ' </a>';
        }
        return $html;
    }
}


if(!function_exists('s7upf_product_loop_discount_sale')){
    function s7upf_product_loop_discount_sale()
    {
        if (!class_exists('WC_Product')) return;
        $sale = $sale_min=$sale_max='';
        global $product;
        if (!$product->is_in_stock()) return;
        $sale_price = get_post_meta($product->get_id(), '_price', true);
        $regular_price = get_post_meta($product->get_id(), '_regular_price', true);
        $array_regular_price = array();
        $array_sale_price = array();

        if ($product->get_type() == 'variable') { //then this is a variable product
            $sale='';
           /* $available_variations = $product->get_available_variations();
            if (!empty($available_variations) and is_array($available_variations)) {
                foreach ($available_variations as $key => $value) {
                    if(!empty($value['display_price']) and !empty($value['display_regular_price']) and $value['display_price']!== $value['display_regular_price']){
                        $array_sale_price[] =(($value['display_regular_price']-$value['display_price'])/$value['display_regular_price'])*100;
                    }
                }
            }
            if(!empty($array_sale_price)){
                $max_sale_price = max($array_sale_price);
                $min_sale_price = min($array_sale_price);
            }
            if(!empty($min_sale_price)) $sale = ceil($min_sale_price).'<sup>%</sup>';
            if(!empty($max_sale_price) and $max_sale_price !== $min_sale_price) $sale .= '-'.ceil($max_sale_price).'<sup>%</sup>';*/
        }else if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price) {
            $sale = ceil((($regular_price - $sale_price) / $regular_price) * 100).'<sup>%</sup>';
        }
        return $sale;
    }
}


if ( ! function_exists( 's7upf_catalog_ordering' ) ) {
    function s7upf_catalog_ordering() {
        if ( !class_exists('WC_Product') ) {
            return;
        }
        $orderby = 'menu_order';
        if (isset($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }
        $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if(!empty($set_orderby)) $orderby = $set_orderby;
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
            'menu_order' => esc_html__( 'Default sorting', 'shb' ),
            'popularity' => esc_html__( 'Sort by popularity', 'shb' ),
            'rating'     => esc_html__( 'Sort by average rating', 'shb' ),
            'date'       => esc_html__( 'Sort by newness', 'shb' ),
            'price'      => esc_html__( 'Sort by price: low to high', 'shb' ),
            'price-desc' => esc_html__( 'Sort by price: high to low', 'shb' ),
        ) );

        if ( ! $show_default_orderby ) {
            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
            unset( $catalog_orderby_options['rating'] );
        }

        wc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby ) );
    }
}

if(!function_exists('s7upf_shop_filter_html')){
    function s7upf_shop_filter_html($type='grid',$title='')
    {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        }
        ?>

        <div class="sort-pagi-bar clearfix">
            <h2 class="title18 mont-font pull-left"><?php echo esc_attr($title); ?></h2>
            <div class="sort-view pull-right">
                <div class="view-type pull-left">
                    <a href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>" class="grid-view <?php if('grid' === $type) echo 'active'?>"><i class="fa fa-th-large"></i></a>
                    <a href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>" class="list-view <?php if('list' === $type) echo 'active'?>"><i class="fa fa-th-list"></i></a>
                </div>
                <div class="sort-bar select-box">
                    <label><?php echo esc_html__('Sort:','shb')?></label>
                    <?php s7upf_catalog_ordering(); ?>
                </div>
            </div>
        </div>

        <?php

    }
}

if(!function_exists('s7upf_get_deals_time')){
    function s7upf_get_deals_time($time = '0:0'){
        $curren_time = getdate();
        $time2 = explode(':', $time);
        $hours = $min = 0;
        if(isset($time2[0])) $hours = (int)$time2[0];
        if(isset($time2[1])) $min = (int)$time2[1];
        $data_h = $hours - $curren_time['hours'];
        $data_m = $min - $curren_time['minutes'];
        $time = $data_h*3600+$data_m*60+60-$curren_time['seconds'];
        return $time;
    }
}


if(!function_exists('s7upf_fill_css_typography')){
    function s7upf_fill_css_typography($data,$important = ''){
        $style = '';
        if(!empty($data['font-color'])) $style .= 'color:'.$data['font-color'].$important.';';
        if(!empty($data['font-family'])) $style .= 'font-family:'.$data['font-family'].$important.';';
        if(!empty($data['font-size'])) $style .= 'font-size:'.$data['font-size'].$important.';';
        if(!empty($data['font-style'])) $style .= 'font-style:'.$data['font-style'].$important.';';
        if(!empty($data['font-variant'])) $style .= 'font-variant:'.$data['font-variant'].$important.';';
        if(!empty($data['font-weight'])) $style .= 'font-weight:'.$data['font-weight'].$important.';';
        if(!empty($data['letter-spacing'])) $style .= 'letter-spacing:'.$data['letter-spacing'].$important.';';
        if(!empty($data['line-height'])) $style .= 'line-height:'.$data['line-height'].$important.';';
        if(!empty($data['text-decoration'])) $style .= 'text-decoration:'.$data['text-decoration'].$important.';';
        if(!empty($data['text-transform'])) $style .= 'text-transform:'.$data['text-transform'].$important.';';
        return $style;
    }
}

/***************************************END Theme Function***************************************/


<?php
class S7upf_Walker_Nav_Menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus

    function start_lvl( &$output, $depth = 0, $args = array() ) {

        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );

        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";

    }

    // add main/sub classes to li's and links
    function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if(!is_object($args)) return;
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if (strcasecmp($item->attr_title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if (strcasecmp($item->title, 'divider') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if (strcasecmp($item->attr_title, 'dropdown-header') == 0 && $depth === 1) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr($item->title);
        } else if (strcasecmp($item->attr_title, 'disabled') == 0) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr($item->title) . '</a>';
        } else {
            $page_mega = get_post_meta($item->ID,'list_page_menu',true);
            $icon_menu = get_post_meta($item->ID,'icon_ios_menu',true);
            $bg_menu = get_post_meta($item->ID,'bg_menu',true);
            $class_names = $icon_menu_html = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            if($depth === 1 && !empty($page_mega)){
                $class_names .= ' s7up_mega_menu ';
            }
            // icon menu check
            if(!empty($icon_menu)){
                if(strpos($icon_menu,'ion')==0)
                    $icon_menu_html = '<i class="icon-menu icon '.$icon_menu.'"></i> ';
                else $icon_menu_html = $icon_menu;
            }
            // check bg_menu
            $class_bg_menu='';
            if(!empty($bg_menu) and $depth === 0){
                $class_bg_menu = S7upf_Assets::build_css('background:'.$bg_menu.'!important;');
            }
            if ( $args->walker->has_children )
                $class_names .= ' dropdown';
            if ( in_array( 'current-menu-item', $classes ) )
                $class_names .= ' active';
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            $output .= $indent . '<li' . $id . $value . $class_names .'>';
            $atts = array();
            $atts['title']  = ! empty( $item->title )	? $item->title	: '';
            $atts['target'] = ! empty( $item->target )	? $item->target	: '';
            $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
            // If item has_children add atts to a.
            if ( $args->walker->has_children && $depth === 0 ) {
                $atts['href']   		= !empty($item->url) ? $item->url : '';
                $atts['class']			= 'dropdown-toggle '.$class_bg_menu;
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
                $atts['class']			= $class_bg_menu;
            }
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if($depth === 1 && !empty($page_mega)){
                $page_html = S7upf_Template::get_vc_pagecontent($page_mega);

                $item_output .= $page_html;
            }else{
                if (!empty($item->attr_title))
                    $item_output .= '<a' . $attributes . ' title="'.esc_attr($item->attr_title).'">';
                else
                    $item_output .= '<a' . $attributes . '>';
                if(0 === $depth){
                    $item_output .= $icon_menu_html;
                }
                $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
                if($args->walker->has_children && 0 === $depth){
                    $item_output .='<i class="fa fa-angle-down menu-down mb-icon-menu" aria-hidden="true"></i></a>';
                }else if($args->walker->has_children){
                    $item_output .='<i class="fa fa-angle-down menu-down mb-icon-menu" aria-hidden="true"></i></a>';
                } else{
                    $item_output .='</a>';
                }

            }


            $item_output .= $args->after;
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $icon 				= get_post_meta($item->ID,'icon_menu'.$depth,true);
        $content 			= get_post_meta($item->ID,'content'.$depth,true);
        $mega_menu = false;
        if(!empty($icon) || !empty($content)) $mega_menu = true;
        if($mega_menu){
            if($depth == 1 && empty($content)) $output .= "</li>\n";
            else $output .= "</li>\n";
        }
        else $output .= "</li>\n";
    }

}

?>
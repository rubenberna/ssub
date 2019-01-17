<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_FooterController'))
{
    class S7upf_FooterController{

        static function _init()
        {
            if(function_exists('stp_reg_post_type'))
            {
                add_action('init',array(__CLASS__,'_add_post_type'));
            }
        }

        static function _add_post_type()
        {
            $labels = array(
                'name'               => esc_html__('Footer Page','shb'),
                'singular_name'      => esc_html__('Footer Page','shb'),
                'menu_name'          => esc_html__('Footer Page','shb'),
                'name_admin_bar'     => esc_html__('Footer Page','shb'),
                'add_new'            => esc_html__('Add New','shb'),
                'add_new_item'       => esc_html__( 'Add New Footer','shb' ),
                'new_item'           => esc_html__( 'New Footer', 'shb' ),
                'edit_item'          => esc_html__( 'Edit Footer', 'shb' ),
                'view_item'          => esc_html__( 'View Footer', 'shb' ),
                'all_items'          => esc_html__( 'All Footer', 'shb' ),
                'search_items'       => esc_html__( 'Search Footer', 'shb' ),
                'parent_item_colon'  => esc_html__( 'Parent Footer:', 'shb' ),
                'not_found'          => esc_html__( 'No Footer found.', 'shb' ),
                'not_found_in_trash' => esc_html__( 'No Footer found in Trash.', 'shb' )
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 's7upf_footer' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,                
                'menu_icon'          => get_template_directory_uri() . "/assets/admin/image/footer-icon.png",
                'supports'           => array( 'title', 'editor' )
            );

            stp_reg_post_type('s7upf_footer',$args);
        }
    }

    S7upf_FooterController::_init();

}
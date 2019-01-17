<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */

add_action('admin_init', 's7upf_custom_meta_boxes');
if(!function_exists('s7upf_custom_meta_boxes')){
    function s7upf_custom_meta_boxes(){
        //Format content
        $format_metabox_post = array(
            'id' => 'block_format_content',
            'title' => esc_html__('Post Settings', 'shb'),
            'desc' => '',
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => esc_html__('Format setting','shb'),
                    'id' => 'mb_format_setting',
                    'type' => 'tab'
                ),
                array(
                    'id' => 'format_gallery',
                    'label' => esc_html__('Add Gallery', 'shb'),
                    'type' => 'Gallery',
                    'desc' => esc_html__('Create gallery image for gallery format','shb')
                ),
                array(
                    'id' => 'format_media',
                    'label' => esc_html__('Link Media', 'shb'),
                    'type' => 'text',
                    'desc' => esc_html__('Get link video(audio) in youtube, vimeo, soundclound, share host,... then input a link media. Note: Share host: there are 3 supported video formats mp4, ogg, webm ','shb')
                ),

                array(
                    'id' => 'mb_banner_setting',
                    'label' => esc_html__('Banner setting','shb'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 'enable_banner_single',
                    'label'       => esc_html__('Enable banner','shb'),
                    'type'        => 'select',
                    'std' => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('-- User in theme option --','shb'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','shb'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','shb'),
                            'value'=>'off'
                        ),
                    ),

                ),
                array(
                    'id' => 'bg_image_banner_blog_single',
                    'label' => esc_html__('Background banner', 'shb'),
                    'desc' => esc_html__('Select image from library.', 'shb'),
                    'type' => 'upload',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'title_banner_blog_single',
                    'label' => esc_html__('Title banner', 'shb'),
                    'desc' => esc_html__('Enter title.', 'shb'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'desc_banner_blog_single',
                    'label' => esc_html__('Description banner', 'shb'),
                    'desc' => esc_html__('Enter description.', 'shb'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'mb_layout_setting',
                    'label' => esc_html__('Layout setting','shb'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'shb' ),
                    'desc'        => esc_html__( 'Include page to Header', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_header_page()
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'shb' ),
                    'desc'        => esc_html__( 'Include page to Footer', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_footer_page()
                ),
                array(
                    'id' => 'hide_media_single',
                    'label' => esc_html__('Hidden media in detail page', 'shb'),
                    'type' => 'select',
                    'desc' => esc_html__('This allow you hidden media, gallery or image in your posts.','shb'),
                    'std' => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('-- User in theme option --','shb'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','shb'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','shb'),
                            'value'=>'off'
                        ),
                    ),

                ),

                array(
                    'id'          => 's7upf_sidebar_position',
                    'label'       => esc_html__('Sidebar position ','shb'),
                    'type'        => 'select',
                    'std' => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Select--','shb'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('No Sidebar','shb'),
                            'value'=>'no'
                        ),
                        array(
                            'label'=>esc_html__('Left sidebar','shb'),
                            'value'=>'left'
                        ),
                        array(
                            'label'=>esc_html__('Right sidebar','shb'),
                            'value'=>'right'
                        ),
                    ),

                ),
                array(
                    'id'        =>'s7upf_select_sidebar',
                    'label'     =>esc_html__('Selects sidebar','shb'),
                    'type'      =>'sidebar-select',
                    'condition' => 's7upf_sidebar_position:not(no),s7upf_sidebar_position:not()',
                ),
            ),
        );
        $format_metabox_page = array(
            'id' => 'block_format_content',
            'title' => esc_html__('Page Settings', 'shb'),
            'desc' => '',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => esc_html__('General setting','shb'),
                    'id' => 'mb_general_setting',
                    'type' => 'tab'
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'shb' ),
                    'desc'        => esc_html__( 'Include page to Header', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_header_page()
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'shb' ),
                    'desc'        => esc_html__( 'Include page to Footer', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_footer_page()
                ),

                array(
                    'id'          => 's7upf_bg_boxed',
                    'label'       => esc_html__('Background boxed','shb'),
                    'type'        => 'upload',
                    'section'     => 'option_general',
                    'condition'   => 's7upf_boxed_width:is(on)',
                ),

                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color (Default in theme option)','shb'),
                    'type'        => 'colorpicker',
                    'desc' => esc_html__('This allow you custom color main of page.', 'shb'),
                ),

                array(
                    'id'          => 'hide_title_page',
                    'label'       => esc_html__('Hide title page','shb'),
                    'type'        => 'on-off',
                    'std' => 'off',
                ),

                array(
                    'id' => 's7upf_show_breadrumb',
                    'label' => esc_html__('Show BreadCrumb', 'shb'),
                    'desc' => esc_html__('This allow you to show or hide BreadCrumb', 'shb'),
                    'type' => 'on-off',
                    'std' => 'off',
                ),
                array(
                    'id' => 'mb_banner_setting',
                    'label' => esc_html__('Banner setting','shb'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 'enable_banner_page',
                    'label'       => esc_html__('Enable banner','shb'),
                    'type'        => 'on-off',
                    'std' => 'off',

                ),
                array(
                    'id' => 'list_item_banner_page',
                    'label' => esc_html__('Add banner slider item', 'shb'),
                    'desc' => esc_html__('Enter info.', 'shb'),
                    'type' => 'list-item',
                    'condition'   => 'enable_banner_page:is(on)',
                    'settings'    => array(
                        array(
                            'id'        => 'img',
                            'label' => esc_html__('Background banner', 'shb'),
                            'desc' => esc_html__('Select image from library.', 'shb'),
                            'std'        => '',
                            'type'        => 'upload',
                        ),
                        array(
                            'id'        => 'info',
                            'label' => esc_html__('Info banner', 'shb'),
                            'desc' => esc_html__('Enter info.', 'shb'),
                            'rows'        => '4',
                            'type'        => 'textarea-simple',
                        ),

                    )
                ),

            ),
        );

        $format_metabox_header = array(
            'id' => 'block_format_content',
            'title' => esc_html__('Header Settings', 'shb'),
            'desc' => '',
            'pages' => array('s7upf_header'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id'          => 's7upf_header_fix_top',
                    'label'       => esc_html__( 'Header fix top', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('Off','shb'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','shb'),
                            'value'=>'on'
                        ),
                    ),
                ),
                array(
                    'id'          => 's7upf_header_add_class',
                    'label'       => esc_html__( 'Add class header', 'shb' ),
                    'type'        => 'text',
                    'section'     => 'option_general',
                    'desc'        => esc_html__('Add a class name and refer to it in custom CSS.', 'shb'),
                ),

            ),
        );
        if (function_exists('ot_register_meta_box')){
            ot_register_meta_box($format_metabox_post);
            ot_register_meta_box($format_metabox_page);
            ot_register_meta_box($format_metabox_header);
        }
    }
}
?>
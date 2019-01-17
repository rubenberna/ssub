<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!function_exists('s7upf_set_theme_config')){
    function s7upf_set_theme_config(){
        global $s7upf_dir,$s7upf_config;
        /**************************************** BEGIN ****************************************/
        $s7upf_dir = get_template_directory_uri() . '/7upframe';
        $s7upf_config = array();
        $s7upf_config['dir'] = $s7upf_dir;
        $s7upf_config['css_url'] = $s7upf_dir . '/assets/css/';
        $s7upf_config['js_url'] = $s7upf_dir . '/assets/js/';
        $s7upf_config['nav_menu'] = array(
            'primary' => esc_html__( 'Primary Navigation', 'shb' ),
        );
        $s7upf_config['mega_menu'] = '1';
        $s7upf_config['sidebars']=array(
            array(
                'name'              => esc_html__( 'Blog Sidebar', 'shb' ),
                'id'                => 'blog-sidebar',
                'description'       => esc_html__( 'Widgets in this area will be shown on all blog page.', 'shb'),
                'before_title'      => '<h2 class="widget-title title14 active">',
                'after_title'       => '</h2>',
                'before_widget'     => '<div id="%1$s" class="sidebar-widget widget %2$s">',
                'after_widget'      => '</div>',
            )
        );
        $s7upf_config['import_config'] = array(
                'homepage_default'          => 'Home 1',
                'blogpage_default'          => 'Blog',
                'menu_locations'            => array("Main menu" => "primary"),
                'set_woocommerce_page'      => 1
            );
        $s7upf_config['import_theme_option'] = 'YTo3NDp7czoxNzoiczd1cGZfaGVhZGVyX3BhZ2UiO3M6MjoiMzAiO3M6MTc6InM3dXBmX2Zvb3Rlcl9wYWdlIjtzOjM6IjE5OCI7czoxNDoiczd1cGZfNDA0X3BhZ2UiO3M6MDoiIjtzOjIwOiJzN3VwZl9zaG93X2JyZWFkcnVtYiI7czoyOiJvbiI7czoxMDoibWFpbl9jb2xvciI7czo3OiIjZmY4ODdiIjtzOjExOiJtYXBfYXBpX2tleSI7czozOToiQUl6YVN5QlgySWlFQmctMGxRS1FRNndrNnNXUkdRbldJN2lvZ2YwIjtzOjEzOiJyaWdodF90b19sZWZ0IjtzOjM6Im9mZiI7czo3OiJmYXZpY29uIjtzOjA6IiI7czoxNzoiczd1cGZfc2hvd19lZGl0b3IiO3M6Mzoib2ZmIjtzOjE2OiJzN3VwZl9tZW51X2ZpeGVkIjtzOjI6Im9uIjtzOjE2OiJzN3VwZl9tZW51X2NvbG9yIjtzOjA6IiI7czoyMjoiczd1cGZfbWVudV9jb2xvcl9ob3ZlciI7czowOiIiO3M6MjM6InM3dXBmX21lbnVfY29sb3JfYWN0aXZlIjtzOjA6IiI7czoxNjoiczd1cGZfc3R5bGVfYmxvZyI7czowOiIiO3M6MTc6InM3dXBmX2NvbHVtbl9ibG9nIjtzOjA6IiI7czoyOToibnVtYmVyX3dvcmRfZXhjZXJwdF9ibG9nX2xpc3QiO3M6MjoiMzAiO3M6Mjc6ImN1c3RvbV9zaXplX2ltYWdlX2Jsb2dfbGlzdCI7czowOiIiO3M6MjM6ImVuYWJsZV9iYW5uZXJfYmxvZ19saXN0IjtzOjI6Im9uIjtzOjI2OiJsaXN0X2l0ZW1fYmFubmVyX2Jsb2dfbGlzdCI7YTozOntpOjA7YTozOntzOjU6InRpdGxlIjtzOjA6IiI7czozOiJpbWciO3M6Nzc6Imh0dHA6Ly83dXB0aGVtZS5jb20vd29yZHByZXNzL3NoYi93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9zaG9wLWJhbm5lcjEuanBnIjtzOjQ6ImluZm8iO3M6Mjk1OiI8ZGl2IGNsYXNzPSJjb250YWluZXIiPg0KCQkJCQkJCTxkaXYgY2xhc3M9ImJhbm5lci1jb250ZW50LXRleHQgd2hpdGUgdGV4dC1jZW50ZXIgYW5pbWF0ZWQgem9vbUluIiBkYXRhLWFuaW1hdGVkPSJ6b29tSW4iPg0KCQkJCQkJCQk8aDIgY2xhc3M9InRpdGxlMzAgbW9udC1mb250Ij5DYXRlZ29yeSB0b3AgYmFubmVyPC9oMj4NCgkJCQkJCQkJPHA+VGhpcyBpcyBhIEJsb2NrIGFuZCBjYW4gYmUgZWRpdGVkIGxpdmUgaW4gd2l0aCB0aGUgUGFnZSBCdWlsZGVyPC9wPg0KCQkJCQkJCTwvZGl2Pg0KCQkJCQkJPC9kaXY+Ijt9aToxO2E6Mzp7czo1OiJ0aXRsZSI7czowOiIiO3M6MzoiaW1nIjtzOjc3OiJodHRwOi8vN3VwdGhlbWUuY29tL3dvcmRwcmVzcy9zaGIvd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvc2hvcC1iYW5uZXIyLmpwZyI7czo0OiJpbmZvIjtzOjI5NToiPGRpdiBjbGFzcz0iY29udGFpbmVyIj4NCgkJCQkJCQk8ZGl2IGNsYXNzPSJiYW5uZXItY29udGVudC10ZXh0IHdoaXRlIHRleHQtY2VudGVyIGFuaW1hdGVkIHpvb21JbiIgZGF0YS1hbmltYXRlZD0iem9vbUluIj4NCgkJCQkJCQkJPGgyIGNsYXNzPSJ0aXRsZTMwIG1vbnQtZm9udCI+Q2F0ZWdvcnkgdG9wIGJhbm5lcjwvaDI+DQoJCQkJCQkJCTxwPlRoaXMgaXMgYSBCbG9jayBhbmQgY2FuIGJlIGVkaXRlZCBsaXZlIGluIHdpdGggdGhlIFBhZ2UgQnVpbGRlcjwvcD4NCgkJCQkJCQk8L2Rpdj4NCgkJCQkJCTwvZGl2PiI7fWk6MjthOjM6e3M6NToidGl0bGUiO3M6MDoiIjtzOjM6ImltZyI7czo3NzoiaHR0cDovLzd1cHRoZW1lLmNvbS93b3JkcHJlc3Mvc2hiL3dwLWNvbnRlbnQvdXBsb2Fkcy8yMDE3LzEwL3Nob3AtYmFubmVyMy5qcGciO3M6NDoiaW5mbyI7czoyOTU6IjxkaXYgY2xhc3M9ImNvbnRhaW5lciI+DQoJCQkJCQkJPGRpdiBjbGFzcz0iYmFubmVyLWNvbnRlbnQtdGV4dCB3aGl0ZSB0ZXh0LWNlbnRlciBhbmltYXRlZCB6b29tSW4iIGRhdGEtYW5pbWF0ZWQ9Inpvb21JbiI+DQoJCQkJCQkJCTxoMiBjbGFzcz0idGl0bGUzMCBtb250LWZvbnQiPkNhdGVnb3J5IHRvcCBiYW5uZXI8L2gyPg0KCQkJCQkJCQk8cD5UaGlzIGlzIGEgQmxvY2sgYW5kIGNhbiBiZSBlZGl0ZWQgbGl2ZSBpbiB3aXRoIHRoZSBQYWdlIEJ1aWxkZXI8L3A+DQoJCQkJCQkJPC9kaXY+DQoJCQkJCQk8L2Rpdj4iO319czoyMzoiczd1cGZfc3R5bGVfYmxvZ19zZWFyY2giO3M6Njoic3R5bGUzIjtzOjI0OiJzN3VwZl9jb2x1bW5fYmxvZ19zZWFyY2giO3M6MToiNiI7czozMDoiZW5hYmxlX2Jhbm5lcl9ibG9nX2xpc3Rfc2VhcmNoIjtzOjI6Im9uIjtzOjMzOiJsaXN0X2l0ZW1fYmFubmVyX2Jsb2dfbGlzdF9zZWFyY2giO2E6MTp7aTowO2E6Mzp7czo1OiJ0aXRsZSI7czowOiIiO3M6MzoiaW1nIjtzOjc3OiJodHRwOi8vN3VwdGhlbWUuY29tL3dvcmRwcmVzcy9zaGIvd3AtY29udGVudC91cGxvYWRzLzIwMTcvMTAvc2hvcC1iYW5uZXIyLmpwZyI7czo0OiJpbmZvIjtzOjI4ODoiPGRpdiBjbGFzcz0iY29udGFpbmVyIj4NCgkJCQkJCQk8ZGl2IGNsYXNzPSJiYW5uZXItY29udGVudC10ZXh0IHdoaXRlIHRleHQtY2VudGVyIGFuaW1hdGVkIiBkYXRhLWFuaW1hdGVkPSJ6b29tSW4iPg0KCQkJCQkJCQk8aDIgY2xhc3M9InRpdGxlMzAgbW9udC1mb250Ij5DYXRlZ29yeSB0b3AgYmFubmVyPC9oMj4NCgkJCQkJCQkJPHA+VGhpcyBpcyBhIEJsb2NrIGFuZCBjYW4gYmUgZWRpdGVkIGxpdmUgaW4gd2l0aCB0aGUgUGFnZSBCdWlsZGVyPC9wPg0KCQkJCQkJCTwvZGl2Pg0KCQkJCQkJPC9kaXY+Ijt9fXM6MjA6ImVuYWJsZV9iYW5uZXJfc2luZ2xlIjtzOjM6Im9mZiI7czoxNzoiaGlkZV9tZWRpYV9zaW5nbGUiO3M6Mzoib2ZmIjtzOjIzOiJzN3VwZl9zdHlsZV9zaW5nbGVfaW5mbyI7czowOiIiO3M6MTk6ImVuYWJsZV9zaGFyZV9zaW5nbGUiO3M6Mjoib24iO3M6MTk6ImVuYWJsZV9wb3N0X2NvbnRyb2wiO3M6Mzoib2ZmIjtzOjE5OiJlbmFibGVfcmVsYXRlZF9wb3N0IjtzOjM6Im9mZiI7czoxODoidGl0bGVfcmVsYXRlZF9wb3N0IjtzOjE1OiJSRUxBVEVEIEFSVElDTEUiO3M6MTk6Im51bWJlcl9yZWxhdGVkX3Bvc3QiO3M6MjoiMTAiO3M6MzA6ImN1c3RvbV9zaXplX2ltYWdlX2Jsb2dfcmVsYXRlZCI7czowOiIiO3M6MTg6ImVuYWJsZV9pbmZvX2F1dGhvciI7czozOiJvZmYiO3M6Mjc6InM3dXBmX3NpZGViYXJfcG9zaXRpb25fYmxvZyI7czo0OiJsZWZ0IjtzOjE4OiJzN3VwZl9zaWRlYmFyX2Jsb2ciO3M6MTI6ImJsb2ctc2lkZWJhciI7czoyNzoiczd1cGZfc2lkZWJhcl9wb3NpdGlvbl9wYWdlIjtzOjI6Im5vIjtzOjE4OiJzN3VwZl9zaWRlYmFyX3BhZ2UiO3M6MDoiIjtzOjM1OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3BhZ2VfYXJjaGl2ZSI7czo0OiJsZWZ0IjtzOjI2OiJzN3VwZl9zaWRlYmFyX3BhZ2VfYXJjaGl2ZSI7czoxMjoiYmxvZy1zaWRlYmFyIjtzOjI3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX3Bvc3QiO3M6Mjoibm8iO3M6MTg6InM3dXBmX3NpZGViYXJfcG9zdCI7czowOiIiO3M6MTc6InM3dXBmX2FkZF9zaWRlYmFyIjthOjI6e2k6MDthOjI6e3M6NToidGl0bGUiO3M6MTc6IlBhZ2Ugc2hvcCBTaWRlYmFyIjtzOjIwOiJ3aWRnZXRfdGl0bGVfaGVhZGluZyI7czoyOiJoMyI7fWk6MTthOjI6e3M6NToidGl0bGUiO3M6MTU6IlByb2R1Y3Qgc2lkZWJhciI7czoyMDoid2lkZ2V0X3RpdGxlX2hlYWRpbmciO3M6MjoiaDIiO319czoxMjoiZ29vZ2xlX2ZvbnRzIjthOjE6e2k6MDthOjE6e3M6NjoiZmFtaWx5IjtzOjA6IiI7fX1zOjI0OiJzdF9wcm9kdWN0X3Bvc3RfcGVyX3BhZ2UiO3M6MjoiMTIiO3M6MjQ6InM3dXBmX2VuYWJsZV9uZXdfcHJvZHVjdCI7czozOiJvZmYiO3M6Mjg6InM3dXBmX251bWJlcl9kYXlfbmV3X3Byb2R1Y3QiO3M6MjoiMTAiO3M6MjY6Indvb19zdHlsZV92aWV3X3dheV9wcm9kdWN0IjtzOjQ6ImdyaWQiO3M6MTU6Indvb19zaG9wX2NvbHVtbiI7czoxOiI0IjtzOjIzOiJlbmFibGVfYmFubmVyX3Nob3BfbGlzdCI7czoyOiJvbiI7czoyNjoibGlzdF9pdGVtX2Jhbm5lcl9zaG9wX2xpc3QiO2E6Mzp7aTowO2E6Mzp7czo1OiJ0aXRsZSI7czoxMzoiQmFubmVyIGl0ZW0gMSI7czozOiJpbWciO3M6Nzc6Imh0dHA6Ly83dXB0aGVtZS5jb20vd29yZHByZXNzL3NoYi93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9zaG9wLWJhbm5lcjEuanBnIjtzOjQ6ImluZm8iO3M6Mjk1OiI8ZGl2IGNsYXNzPSJjb250YWluZXIiPg0KCQkJCQkJCTxkaXYgY2xhc3M9ImJhbm5lci1jb250ZW50LXRleHQgd2hpdGUgdGV4dC1jZW50ZXIgYW5pbWF0ZWQgem9vbUluIiBkYXRhLWFuaW1hdGVkPSJ6b29tSW4iPg0KCQkJCQkJCQk8aDIgY2xhc3M9InRpdGxlMzAgbW9udC1mb250Ij5DYXRlZ29yeSB0b3AgYmFubmVyPC9oMj4NCgkJCQkJCQkJPHA+VGhpcyBpcyBhIEJsb2NrIGFuZCBjYW4gYmUgZWRpdGVkIGxpdmUgaW4gd2l0aCB0aGUgUGFnZSBCdWlsZGVyPC9wPg0KCQkJCQkJCTwvZGl2Pg0KCQkJCQkJPC9kaXY+Ijt9aToxO2E6Mzp7czo1OiJ0aXRsZSI7czoxMzoiQmFubmVyIGl0ZW0gMiI7czozOiJpbWciO3M6Nzc6Imh0dHA6Ly83dXB0aGVtZS5jb20vd29yZHByZXNzL3NoYi93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9zaG9wLWJhbm5lcjIuanBnIjtzOjQ6ImluZm8iO3M6Mjk1OiI8ZGl2IGNsYXNzPSJjb250YWluZXIiPg0KCQkJCQkJCTxkaXYgY2xhc3M9ImJhbm5lci1jb250ZW50LXRleHQgd2hpdGUgdGV4dC1jZW50ZXIgYW5pbWF0ZWQgem9vbUluIiBkYXRhLWFuaW1hdGVkPSJ6b29tSW4iPg0KCQkJCQkJCQk8aDIgY2xhc3M9InRpdGxlMzAgbW9udC1mb250Ij5DYXRlZ29yeSB0b3AgYmFubmVyPC9oMj4NCgkJCQkJCQkJPHA+VGhpcyBpcyBhIEJsb2NrIGFuZCBjYW4gYmUgZWRpdGVkIGxpdmUgaW4gd2l0aCB0aGUgUGFnZSBCdWlsZGVyPC9wPg0KCQkJCQkJCTwvZGl2Pg0KCQkJCQkJPC9kaXY+Ijt9aToyO2E6Mzp7czo1OiJ0aXRsZSI7czoxMzoiQmFubmVyIGl0ZW0gMyI7czozOiJpbWciO3M6Nzc6Imh0dHA6Ly83dXB0aGVtZS5jb20vd29yZHByZXNzL3NoYi93cC1jb250ZW50L3VwbG9hZHMvMjAxNy8xMC9zaG9wLWJhbm5lcjMuanBnIjtzOjQ6ImluZm8iO3M6Mjk1OiI8ZGl2IGNsYXNzPSJjb250YWluZXIiPg0KCQkJCQkJCTxkaXYgY2xhc3M9ImJhbm5lci1jb250ZW50LXRleHQgd2hpdGUgdGV4dC1jZW50ZXIgYW5pbWF0ZWQgem9vbUluIiBkYXRhLWFuaW1hdGVkPSJ6b29tSW4iPg0KCQkJCQkJCQk8aDIgY2xhc3M9InRpdGxlMzAgbW9udC1mb250Ij5DYXRlZ29yeSB0b3AgYmFubmVyPC9oMj4NCgkJCQkJCQkJPHA+VGhpcyBpcyBhIEJsb2NrIGFuZCBjYW4gYmUgZWRpdGVkIGxpdmUgaW4gd2l0aCB0aGUgUGFnZSBCdWlsZGVyPC9wPg0KCQkJCQkJCTwvZGl2Pg0KCQkJCQkJPC9kaXY+Ijt9fXM6MjY6InM3dXBmX3NpZGViYXJfcG9zaXRpb25fd29vIjtzOjQ6ImxlZnQiO3M6MTc6InM3dXBmX3NpZGViYXJfd29vIjtzOjE3OiJwYWdlLXNob3Atc2lkZWJhciI7czoyODoiczd1cGZfY3VzdG9tX3NpemVfaW1hZ2VfbGlzdCI7czowOiIiO3M6MjU6ImVuYWJsZV9iYW5uZXJfc2hvcF9zaW5nbGUiO3M6Mzoib2ZmIjtzOjM3OiJzN3VwZl9zaWRlYmFyX3Bvc2l0aW9uX2RldGFpbF9wcm9kdWN0IjtzOjI6Im5vIjtzOjI4OiJzN3VwZl9zaWRlYmFyX2RldGFpbF9wcm9kdWN0IjtzOjA6IiI7czozMToiczd1cGZfc2hvd19zaGFyZV9wcm9kdWN0X2RldGFpbCI7czoyOiJvbiI7czoyNjoiczd1cGZfc3R5bGVfZ2FsbGVyeV9kZXRhaWwiO3M6Mzoib2ZmIjtzOjIzOiJzN3VwZl9jdXN0b21faW1hZ2Vfc2l6ZSI7czowOiIiO3M6MzM6InM3dXBmX3Nob3dfcmVsYXRlZF9wcm9kdWN0X2RldGFpbCI7czoyOiJvbiI7czoyNzoiczd1cGZfdGl0bGVfcmVsYXRlZF9wcm9kdWN0IjtzOjE1OiJSZWxhdGVkIHByb2R1Y3QiO3M6Mjg6InM3dXBmX251bWJlcl9yZWxhdGVkX3Byb2R1Y3QiO3M6MToiOCI7czozNDoiczd1cGZfc2hvd191cF9zZWxsc19wcm9kdWN0X2RldGFpbCI7czozOiJvZmYiO3M6Mjg6InM3dXBmX3RpdGxlX3VwX3NlbGxzX3Byb2R1Y3QiO3M6MDoiIjtzOjExOiJ3b29fY2F0ZWxvZyI7czozOiJvZmYiO3M6MTE6ImhpZGVfZGV0YWlsIjtzOjM6Im9mZiI7czoxOToic2hvd19idXR0b25fY2F0YWxvZyI7czozOiJvZmYiO3M6MTk6ImJ1dHRvbl90ZXh0X2NhdGFsb2ciO3M6MDoiIjtzOjE3OiJ1cmxfcHJvdG9jb2xfdHlwZSI7czowOiIiO3M6MTY6ImxpbmtfdXJsX2NhdGFsb2ciO3M6MDoiIjtzOjE1OiJoaWRlX290aGVyX3BhZ2UiO3M6Mzoib2ZmIjtzOjEwOiJoaWRlX3ByaWNlIjtzOjM6Im9mZiI7czoxMDoidGV4dF9wcmljZSI7czowOiIiO3M6MTA6ImhpZGVfYWRtaW4iO3M6Mzoib2ZmIjt9';
        $s7upf_config['import_widget'] = '{"blog-sidebar":{"categories-3":{"title":"","count":0,"hierarchical":1,"dropdown":0},"s7upf_bloglistpostswidget-2":{"title":"List Posts","posts_per_page":"4","style":"default","category":"0","order":"desc","order_by":"None","image_size":""},"tag_cloud-2":{"title":"","count":0,"taxonomy":"post_tag"},"text-2":{"title":"Banner","text":"<div class=\"banner-quangcao zoom-image fade-out-in\"><a class=\"adv-thumb-link\" href=\"#\"><img src=\"http:\/\/7uptheme.com\/wordpress\/shb\/wp-content\/uploads\/2017\/11\/banner-adv.jpg\" alt=\"\" \/><\/a><\/div>","filter":true,"visual":true}},"page-shop-sidebar":{"woocommerce_product_categories-2":{"title":"Product categories","orderby":"name","dropdown":0,"count":1,"hierarchical":1,"show_children_only":0,"hide_empty":0,"max_depth":""},"s7upf_product_filter-2":{"title":"Filter by","filter_price":1,"title_attribute":"","s7upf_brands":1,"s7upf_color":1,"s7upf_size":1,"s7upf_style":1,"title_attribute_hide":"","hide_attribute_label":0,"class_css":""}},"product-sidebar":{"woocommerce_product_categories-3":{"title":"Product categories","orderby":"name","dropdown":0,"count":1,"hierarchical":1,"show_children_only":0,"hide_empty":0,"max_depth":""},"woocommerce_product_tag_cloud-2":{"title":"Product tags"},"text-3":{"title":"banner","text":"<div class=\"banner-adv zoom-image fade-out-in\"><a class=\"adv-thumb-link\" href=\"#\"><img src=\"http:\/\/7uptheme.com\/wordpress\/shb\/wp-content\/uploads\/2017\/11\/banner-adv.jpg\" alt=\"\" \/><\/a><\/div>","filter":true,"visual":true}}}';
        $s7upf_config['import_category'] = '{"base-makeup":{"thumbnail":"","parent":"","icon":""},"eye-shadow":{"thumbnail":"","parent":"base-makeup","icon":""},"eye-shadow-point-makeup":{"thumbnail":"","parent":"point-makeup","icon":""},"eye-shadow-skincare":{"thumbnail":"","parent":"skincare","icon":""},"eyeliner":{"thumbnail":"","parent":"base-makeup","icon":""},"eyeliner-point-makeup":{"thumbnail":"","parent":"point-makeup","icon":""},"eyeliner-skincare":{"thumbnail":"","parent":"skincare","icon":""},"lipstick":{"thumbnail":"","parent":"base-makeup","icon":""},"lipstick-point-makeup":{"thumbnail":"","parent":"point-makeup","icon":""},"lipstick-skincare":{"thumbnail":"","parent":"skincare","icon":""},"mascara":{"thumbnail":"","parent":"base-makeup","icon":""},"mascara-point-makeup":{"thumbnail":"","parent":"point-makeup","icon":""},"mascara-skincare":{"thumbnail":"","parent":"skincare","icon":""},"point-makeup":{"thumbnail":"","parent":"","icon":""},"skincare":{"thumbnail":"","parent":"","icon":""}}';

        /**************************************** PLUGINS ****************************************/

        $s7upf_config['require-plugin'] = array(
            array(
                'name'               => esc_html__('Option Tree', 'shb'), // The plugin name.
                'slug'               => 'option-tree', // The plugin slug (typically the folder name).
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'source'    =>get_template_directory().'/plugins/option-tree.zip'
            ),
            array(
                'name'      => esc_html__( 'Contact Form 7', 'shb'),
                'slug'      => 'contact-form-7',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__( 'Visual Composer', 'shb'),
                'slug'      => 'js_composer',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/js_composer.zip',
                 'version'   => '5.6',
            ),
            array(
                'name'      => esc_html__( '7up Core', 'shb'),
                'slug'      => '7up-core',
                'required'  => true,
                'source'    =>get_template_directory().'/plugins/7up-core.zip',
                'version'   => '1.1',
            ),
            array(
                'name'      => esc_html__( 'WooCommerce', 'shb'),
                'slug'      => 'woocommerce',
                'required'  => true,
            ),
            array(
                'name' => esc_html__('Mail Chimp','shb'),
                'slug' => 'mailchimp-for-wp',
                'required' => true
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Compare','shb'),
                'slug'      => 'yith-woocommerce-compare',
                'required'  => true,
            ),
            array(
                'name'      => esc_html__('Yith Woocommerce Wishlist','shb'),
                'slug'      => 'yith-woocommerce-wishlist',
                'required'  => true,
            )
        );

    /**************************************** PLUGINS ****************************************/
        $s7upf_config['theme-option'] = array(
            'sections' => array(
                array(
                    'id' => 'option_general',
                    'title' => '<i class="fa fa-cog"></i>'.esc_html__(' General Settings', 'shb')
                ),
                array(
                    'id' => 'option_menu',
                    'title' => '<i class="fa fa-align-justify"></i>'.esc_html__(' Menu Settings', 'shb')
                ),
                array(
                    'id' => 'option_blog',
                    'title' => '<i class="fa fa-file-text-o"></i> '.esc_html__('Blog Settings', 'shb')
                ),
                array(
                    'id' => 'option_layout',
                    'title' => '<i class="fa fa-columns"></i>'.esc_html__(' Layout Settings', 'shb')
                ),
                array(
                    'id' => 'option_typography',
                    'title' => '<i class="fa fa-font"></i>'.esc_html__(' Typography', 'shb')
                )
            ),
            'settings' => array(
                 /*----------------Begin General --------------------*/
                array(
                    'id' => 'tab_general_theme',
                    'type' => 'tab',
                    'section' => 'option_general',
                    'label' => esc_html__('General theme','shb')
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'shb' ),
                    'desc'        => esc_html__( 'Include Header content. Go to Header in admin menu to edit/create header content. Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific header for it', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_post_type('s7upf_header')
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'shb' ),
                    'desc'        => esc_html__( 'Include Footer content. Go to Footer in admin menu to edit/create footer content.  Note this value default for all pages of your site, If have any page/single page display other content pehaps you are set specific footer for it', 'shb' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_post_type('s7upf_footer')
                ),
                array(
                    'id'          => 's7upf_404_page',
                    'label'       => esc_html__( '404 Page', 'shb' ),
                    'desc'        => esc_html__( 'Include page to 404 page', 'shb' ),
                    'type'        => 'page-select',
                    'section'     => 'option_general'
                ),
                array(
                    'id' => 's7upf_show_breadrumb',
                    'label' => esc_html__('Show BreadCrumb', 'shb'),
                    'desc' => esc_html__('This allow you to show or hide BreadCrumb', 'shb'),
                    'type' => 'on-off',
                    'section' => 'option_general',
                    'std' => 'on'
                ),

                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color','shb'),
                    'type'        => 'colorpicker',
                    'section'     => 'option_general',
                ),                
                array(
                    'id'          => 'map_api_key',
                    'label'       => esc_html__('Map API key','shb'),
                    'type'        => 'text',
                    'section'     => 'option_general',
                    'std'         => '',
                ),

                array(
                    'id' => 'favicon',
                    'label' => esc_html__('Favicon', 'shb'),
                    'desc' => esc_html__('This allow you to change favicon of your website', 'shb'),
                    'type' => 'upload',
                    'section' => 'option_general'
                ),

                array(
                    'id' => 's7upf_show_editor',
                    'label' => esc_html__('Show edit admin', 'shb'),
                    'desc' => esc_html__('This allows you to display edit button in frontend.', 'shb'),
                    'type' => 'on-off',
                    'section' => 'option_general',
                    'std' => 'off'
                ),

                /*----------------End General ----------------------*/


                /*----------------Begin Menu --------------------*/
                array(
                    'id'          => 's7upf_menu_fixed',
                    'label'       => esc_html__('Menu Fixed','shb'),
                    'desc'        => 'Menu change to fixed when scroll',
                    'type'        => 'on-off',
                    'section'     => 'option_menu',
                    'std'         => 'on',
                ),
                array(
                    'id'          => 'sv_menu_color',
                    'label'       => esc_html__('Menu style','shb'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover',
                    'label'       => esc_html__('Hover color','shb'),
                    'desc'        => esc_html__('Choose color','shb'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active',
                    'label'       => esc_html__('Background Hover color','shb'),
                    'desc'        => esc_html__('Choose color','shb'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color2',
                    'label'       => esc_html__('Menu Sub style','shb'),
                    'type'        => 'typography',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_hover2',
                    'label'       => esc_html__('Hover Sub color','shb'),
                    'desc'        => esc_html__('Choose color','shb'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                array(
                    'id'          => 'sv_menu_color_active2',
                    'label'       => esc_html__('Background Sub Hover color','shb'),
                    'desc'        => esc_html__('Choose color','shb'),
                    'type'        => 'colorpicker-opacity',
                    'section'     => 'option_menu',
                ),
                /*----------------End Menu ----------------------*/
                /*----------------Begin Blog --------------------*/
                array(
                    'id' => 'st_tab_blog',
                    'type' => 'tab',
                    'section' => 'option_blog',
                    'label' => esc_html__('Page list post','shb')
                ),

                array(
                    'id' => 's7upf_style_blog',
                    'label' => esc_html__('Style blog', 'shb'),
                    'desc' => esc_html__('Select style', 'shb'),
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Style default','shb'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style classic 1','shb'),
                        ),
                        array(
                            'value'=>'style3',
                            'label'=>esc_html__('Style classic 2','shb'),
                        ),
                    ),
                    'section' => 'option_blog',
                ),
                array(
                    'id' => 's7upf_column_blog',
                    'label' => esc_html__('Custom column blog', 'shb'),
                    'desc' => esc_html__('Select number column', 'shb'),
                    'type'        => 'select',
                    'condition'   => 's7upf_style_blog:not()',
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','shb'),
                        ),
                        array(
                            'value'=>'12',
                            'label'=>esc_html__('1 column','shb'),
                        ),
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('2 columns','shb'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('3 columns','shb'),
                        ),
                    ),
                    'section' => 'option_blog',
                ),
                array(
                    'id' => 'number_word_excerpt_blog_list',
                    'label' => esc_html__('Number word excerpt', 'shb'),
                    'desc' => esc_html__('This allows you to change the number of words in the excerpt (Default: 30 word).', 'shb'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '0,100,1',
                    'section' => 'option_blog',
                    'std'  => 30
                ),
                array(
                    'id'          => 'custom_size_image_blog_list',
                    'label'       => esc_html__('Custom size image','shb'),
                    'type'        => 'text',
                    'section' => 'option_blog',
                    'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','shb'),
                ),

                array(
                    'id' => 'enable_banner_blog_list',
                    'label' => esc_html__('Enable banner', 'shb'),
                    'desc' => esc_html__('This allow you to turn on or off Banner.', 'shb'),
                    'type' => 'on-off',
                    'section' => 'option_blog',
                    'std'  => 'off'
                ),
                array(
                    'id' => 'list_item_banner_blog_list',
                    'label' => esc_html__('Add banner slider item', 'shb'),
                    'desc' => esc_html__('Enter info.', 'shb'),
                    'type' => 'list-item',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_blog_list:is(on)',
                    'settings'    => array(
                        array(
                            'id'        => 'img',
                            'label' => esc_html__('Background banner', 'shb'),
                            'desc' => esc_html__('Select image from library.', 'shb'),
                            'type'        => 'upload',
                        ),
                        array(
                            'id'        => 'info',
                            'label' => esc_html__('Info banner', 'shb'),
                            'desc' => esc_html__('Enter info.', 'shb'),
                            'type'        => 'textarea-simple',
                        ),

                    )
                ),

                array(
                    'id' => 'st_tab_search_template',
                    'type' => 'tab',
                    'section' => 'option_blog',
                    'label' => esc_html__('Search template','shb')
                ),
                array(
                    'id' => 's7upf_style_blog_search',
                    'label' => esc_html__('Template style', 'shb'),
                    'desc' => esc_html__('Select style', 'shb'),
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Style default','shb'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style classic 1','shb'),
                        ),
                        array(
                            'value'=>'style3',
                            'label'=>esc_html__('Style classic 2','shb'),
                        ),
                    ),
                    'std'=>'',
                    'section' => 'option_blog',
                ),
                array(
                    'id' => 's7upf_column_blog_search',
                    'label' => esc_html__('Number column grid', 'shb'),
                    'desc' => esc_html__('Select column', 'shb'),
                    'type'        => 'select',
                    'condition'   => 's7upf_style_blog_search:not()',
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Default','shb'),
                        ),
                        array(
                            'value'=>'12',
                            'label'=>esc_html__('1 column','shb'),
                        ),
                        array(
                            'value'=>'6',
                            'label'=>esc_html__('2 columns','shb'),
                        ),
                        array(
                            'value'=>'4',
                            'label'=>esc_html__('3 columns','shb'),
                        ),
                    ),
                    'section' => 'option_blog',
                ),
                array(
                    'id' => 'enable_banner_blog_list_search',
                    'label' => esc_html__('Enable banner', 'shb'),
                    'desc' => esc_html__('This allow you to turn on or off Banner.', 'shb'),
                    'type' => 'on-off',
                    'section' => 'option_blog',
                    'std'  => 'off'
                ),
                array(
                    'id' => 'list_item_banner_blog_list_search',
                    'label' => esc_html__('Add banner slider item', 'shb'),
                    'desc' => esc_html__('Enter info.', 'shb'),
                    'type' => 'list-item',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_blog_list_search:is(on)',
                    'settings'    => array(
                        array(
                            'id'        => 'img',
                            'label' => esc_html__('Background banner', 'shb'),
                            'desc' => esc_html__('Select image from library.', 'shb'),
                            'type'        => 'upload',
                        ),
                        array(
                            'id'        => 'info',
                            'label' => esc_html__('Info banner', 'shb'),
                            'desc' => esc_html__('Enter info.', 'shb'),
                            'type'        => 'textarea-simple',
                        ),

                    )
                ),

                array(
                    'id' => 'st_tab_blog_detail',
                    'type' => 'tab',
                    'section' => 'option_blog',
                    'label' => esc_html__('Page post detail','shb')
                ),
                array(
                    'id'          => 'enable_banner_single',
                    'label'       => esc_html__('Enable banner','shb'),
                    'desc' => esc_html__('This allow you to turn on or off Banner.', 'shb'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),
                array(
                    'id' => 'list_item_banner_blog_single',
                    'label' => esc_html__('Add banner slider item', 'shb'),
                    'desc' => esc_html__('Enter info.', 'shb'),
                    'type' => 'list-item',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
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
                //End banner
                array(
                    'id' => 'hide_media_single',
                    'label' => esc_html__('Hidden media in detail page', 'shb'),
                    'type' => 'on-off',
                    'desc' => esc_html__('This allow you hidden media, gallery or image in your posts.','shb'),
                    'std' => 'off',
                    'section' => 'option_blog',
                ),
                array(
                    'id' => 's7upf_style_single_info',
                    'label' => esc_html__('Info style', 'shb'),
                    'desc' => esc_html__('Select style', 'shb'),
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'value'=>'',
                            'label'=>esc_html__('Style default','shb'),
                        ),
                        array(
                            'value'=>'style2',
                            'label'=>esc_html__('Style two columns','shb'),
                        ),
                    ),
                    'std'=>'',
                    'section' => 'option_blog',
                ),
                array(
                    'id'          => 'enable_share_single',
                    'label'       => esc_html__('Enable share post','shb'),
                    'desc' => esc_html__('This allow you to show button share.', 'shb'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),
                array(
                    'id'          => 'enable_post_control',
                    'label'       => esc_html__('Enable post control','shb'),
                    'desc' => esc_html__('This allow you to show bar post control.', 'shb'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),
                array(
                    'id'          => 'enable_related_post',
                    'label'       => esc_html__('Enable post related','shb'),
                    'desc' => esc_html__('This allow you to show list post related.', 'shb'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),
                array(
                    'id'          => 'title_related_post',
                    'label'       => esc_html__('Title related','shb'),
                    'desc' => esc_html__('Enter text', 'shb'),
                    'type'        => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_related_post:is(on)',
                ),
                array(
                    'id'          => 'number_related_post',
                    'label'       => esc_html__('Number post related','shb'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '0,100,1',
                    'section' => 'option_blog',
                    'condition'   => 'enable_related_post:is(on)',
                    'std'  => 10
                ),
                array(
                    'id'          => 'custom_size_image_blog_related',
                    'label'       => esc_html__('Custom size image','shb'),
                    'type'        => 'text',
                    'section' => 'option_blog',
                    'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','shb'),
                ),
                array(
                    'id'          => 'enable_info_author',
                    'label'       => esc_html__('Enable info author','shb'),
                    'desc' => esc_html__('This allow you to show box info author.', 'shb'),
                    'type'        => 'on-off',
                    'section' => 'option_blog',
                    'std' => 'off',
                ),

                /*----------------End Blog ----------------------*/

                /*----------------Begin Layout --------------------*/
                array(
                    'id'          => 's7upf_sidebar_position_blog',
                    'label'       => esc_html__('Sidebar Blog','shb'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','shb'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','shb'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','shb'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','shb'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_blog',
                    'label'       => esc_html__('Sidebar select display in blog','shb'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_blog:not(no)',
                ),
                /****end blog****/
                array(
                    'id'          => 's7upf_sidebar_position_page',
                    'label'       => esc_html__('Sidebar Page','shb'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','shb'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','shb'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','shb'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','shb'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page',
                    'label'       => esc_html__('Sidebar select display in page','shb'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page:not(no)',
                ),
                /****end page****/
                array(
                    'id'          => 's7upf_sidebar_position_page_archive',
                    'label'       => esc_html__('Sidebar Position on Page Archives:','shb'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','shb'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','shb'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','shb'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','shb'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_page_archive',
                    'label'       => esc_html__('Sidebar select display in page Archives','shb'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_page_archive:not(no)',
                ),
                // END
                array(
                    'id'          => 's7upf_sidebar_position_post',
                    'label'       => esc_html__('Sidebar Single Post','shb'),
                    'type'        => 'select',
                    'section'     => 'option_layout',
                    'desc'=>esc_html__('Left, or Right, or Center','shb'),
                    'choices'     => array(
                        array(
                            'value'=>'no',
                            'label'=>esc_html__('No Sidebar','shb'),
                        ),
                        array(
                            'value'=>'left',
                            'label'=>esc_html__('Left','shb'),
                        ),
                        array(
                            'value'=>'right',
                            'label'=>esc_html__('Right','shb'),
                        )
                    )
                ),
                array(
                    'id'          => 's7upf_sidebar_post',
                    'label'       => esc_html__('Sidebar select display in single post','shb'),
                    'type'        => 'sidebar-select',
                    'section'     => 'option_layout',
                    'condition'   => 's7upf_sidebar_position_post:not(no)',
                ),
                array(
                    'id'          => 's7upf_add_sidebar',
                    'label'       => esc_html__('Add SideBar','shb'),
                    'type'        => 'list-item',
                    'section'     => 'option_layout',
                    'std'         => '',
                    'settings'    => array( 
                        array(
                            'id'          => 'widget_title_heading',
                            'label'       => esc_html__('Choose heading title widget','shb'),
                            'type'        => 'select',
                            'std'        => 'h3',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','shb'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','shb'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','shb'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','shb'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','shb'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','shb'),
                                ),
                            )
                        ),
                    ),
                ),
                /*----------------End Layout ----------------------*/

                /*----------------Begin Blog ----------------------*/       
                

                /*----------------End BLOG----------------------*/

                /*----------------Begin Typography ----------------------*/
                array(
                    'id'          => 's7upf_custom_typography',
                    'label'       => esc_html__('Add Settings','shb'),
                    'type'        => 'list-item',
                    'section'     => 'option_typography',
                    'std'         => '',
                    'settings'    => array(
                        array(
                            'id'          => 'typo_area',
                            'label'       => esc_html__('Choose Area to style','shb'),
                            'type'        => 'select',
                            'std'        => 'main',
                            'choices'     => array(

                                array(
                                    'value'=>'header',
                                    'label'=>esc_html__('Header','shb'),
                                ),
                                array(
                                    'value'=>'main',
                                    'label'=>esc_html__('Main Content','shb'),
                                ),
                                array(
                                    'value'=>'widget',
                                    'label'=>esc_html__('Widget','shb'),
                                ),
                                array(
                                    'value'=>'footer',
                                    'label'=>esc_html__('Footer','shb'),
                                ),
                                array(
                                    'value'=>'body',
                                    'label'=>esc_html__('Body','shb'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typo_heading',
                            'label'       => esc_html__('Choose heading Area','shb'),
                            'type'        => 'select',
                            'choices'     => array(
                                array(
                                    'value'=>'h1',
                                    'label'=>esc_html__('H1','shb'),
                                ),
                                array(
                                    'value'=>'h2',
                                    'label'=>esc_html__('H2','shb'),
                                ),
                                array(
                                    'value'=>'h3',
                                    'label'=>esc_html__('H3','shb'),
                                ),
                                array(
                                    'value'=>'h4',
                                    'label'=>esc_html__('H4','shb'),
                                ),
                                array(
                                    'value'=>'h5',
                                    'label'=>esc_html__('H5','shb'),
                                ),
                                array(
                                    'value'=>'h6',
                                    'label'=>esc_html__('H6','shb'),
                                ),
                                array(
                                    'value'=>'a',
                                    'label'=>esc_html__('a','shb'),
                                ),
                                array(
                                    'value'=>'p',
                                    'label'=>esc_html__('p','shb'),
                                ),
                                array(
                                    'value'=>'',
                                    'label'=>esc_html__('All','shb'),
                                ),
                            )
                        ),
                        array(
                            'id'          => 'typography_style',
                            'label'       => esc_html__('Add Style','shb'),
                            'type'        => 'typography',
                            'section'     => 'option_typography',
                        ),
                    ),
                ),        
                array(
                    'id'          => 'google_fonts',
                    'label'       => esc_html__('Add Google Fonts','shb'),
                    'type'        => 'google-fonts',
                    'section'     => 'option_typography',
                ),
                /*----------------End Typography ----------------------*/
            )
        );
        if(class_exists( 'WooCommerce' )){
            array_push($s7upf_config['theme-option']['sections'], array(
                'id' => 'option_woo',
                'title' => '<i class="fa fa-shopping-cart"></i>'.esc_html__(' Shop Settings', 'shb')
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id' => 'st_tab_product_general',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('General product','shb')
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id'          => 'st_product_post_per_page',
                    'label'       => esc_html__('Post per page','shb'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,500,1',
                    'section'     => 'option_woo',
                    'desc'        => esc_html__('This allows you to change the number of products in shop page (Default 9 product).','shb'),
                    'std'         => 16
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_enable_new_product',
                'label'       => esc_html__('Enable new product','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'     => 'off',
                'desc'=>esc_html__('This allows you to control sticker display for products which are marked as NEW in wooCommerce.','shb'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id'          => 's7upf_number_day_new_product',
                    'label'       => esc_html__('Number of days for new product','shb'),
                    'type'        => 'numeric-slider',
                    'min_max_step'=> '1,500,1',
                    'section'     => 'option_woo',
                    'condition'   => 's7upf_enable_new_product:is(on)',
                    'desc'        => esc_html__('Specify the No of days before to be disaplay product as New (Default 10 days).','shb'),
                    'std'         => 10
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_style_view_way_product',
                'label'       => esc_html__('Choose view way product','shb'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'std'         => 'grid',
                'choices'     => array(
                    array(
                        'value'=> 'grid',
                        'label'=> esc_html__('Grid view','shb'),
                    ),
                    array(
                        'value'=> 'list',
                        'label'=> esc_html__('List view','shb'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_shop_column',
                'label'       => esc_html__('Choose shop column','shb'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'choices'     => array(
                    array(
                        'value'=> 3,
                        'label'=> 4,
                    ),
                    array(
                        'value'=> 4,
                        'label'=> 3,
                    ),
                    array(
                        'value'=> 6,
                        'label'=> 2,
                    ),
                    array(
                        'value'=> 12,
                        'label'=> 1,
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                    'id' => 'st_tab_product_list',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('List product','shb')
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'enable_banner_shop_list',
                'label'       => esc_html__('Show banner','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'     => 'off',
                'desc'=>esc_html__('This allow you to show or hide Banner in list products','shb'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id' => 'list_item_banner_shop_list',
                'label' => esc_html__('Add banner slider item', 'shb'),
                'desc' => esc_html__('Enter info.', 'shb'),
                'type' => 'list-item',
                'section' => 'option_woo',
                'condition'   => 'enable_banner_shop_list:is(on)',
                'settings'    => array(
                    array(
                        'id'        => 'img',
                        'label' => esc_html__('Background banner', 'shb'),
                        'desc' => esc_html__('Select image from library.', 'shb'),
                        'type'        => 'upload',
                    ),
                    array(
                        'id'        => 'info',
                        'label' => esc_html__('Info banner', 'shb'),
                        'desc' => esc_html__('Enter info.', 'shb'),
                        'type'        => 'textarea-simple',
                    ),

                )
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_position_woo',
                'label'       => esc_html__('Sidebar Position shop page','shb'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Left, or Right, or Center','shb'),
                'choices'     => array(
                    array(
                        'value'=>'no',
                        'label'=>esc_html__('No Sidebar','shb'),
                    ),
                    array(
                        'value'=>'left',
                        'label'=>esc_html__('Left','shb'),
                    ),
                    array(
                        'value'=>'right',
                        'label'=>esc_html__('Right','shb'),
                    )
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_woo',
                'label'       => esc_html__('Sidebar select shop page','shb'),
                'type'        => 'sidebar-select',
                'section'     => 'option_woo',
                'condition'   => 's7upf_sidebar_position_woo:not(no)',
                'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','shb'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_custom_size_image_list',
                'label'       => esc_html__('Custom size image','shb'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','shb'),

            ));

            array_push($s7upf_config['theme-option']['settings'], array(
                    'id' => 'st_tab_product_page',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('Product page','shb')
                )
            );

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'enable_banner_shop_single',
                'label'       => esc_html__('Show banner','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide banner in detail products','shb'),
                'std'=>'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id' => 'list_item_banner_shop_single',
                'label' => esc_html__('Add banner slider item', 'shb'),
                'desc' => esc_html__('Enter info.', 'shb'),
                'type' => 'list-item',
                'section' => 'option_woo',
                'condition'   => 'enable_banner_shop_single:is(on)',
                'settings'    => array(
                    array(
                        'id'        => 'img',
                        'label' => esc_html__('Background banner', 'shb'),
                        'desc' => esc_html__('Select image from library.', 'shb'),
                        'type'        => 'upload',
                    ),
                    array(
                        'id'        => 'info',
                        'label' => esc_html__('Info banner', 'shb'),
                        'desc' => esc_html__('Enter info.', 'shb'),
                        'type'        => 'textarea-simple',
                    ),

                )
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_position_detail_product',
                'label'       => esc_html__('Sidebar position product page','shb'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Left, or Right, or Center','shb'),
                'choices'     => array(
                    array(
                        'value'=>'no',
                        'label'=>esc_html__('No Sidebar','shb'),
                    ),
                    array(
                        'value'=>'left',
                        'label'=>esc_html__('Left','shb'),
                    ),
                    array(
                        'value'=>'right',
                        'label'=>esc_html__('Right','shb'),
                    )
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_sidebar_detail_product',
                'label'       => esc_html__('Sidebar select product page','shb'),
                'type'        => 'sidebar-select',
                'section'     => 'option_woo',
                'condition'   => 's7upf_sidebar_position_detail_product:not(no)',
                'desc'        => esc_html__('Choose one style of sidebar for WooCommerce page','shb'),
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_share_product_detail',
                'label'       => esc_html__('Show share product','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide box share in product detail','shb'),
                'std'=>'on'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_style_gallery_detail',
                'label'       => esc_html__('Gallery image style','shb'),
                'type'        => 'select',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allows you to change the gallery style','shb'),
                'choices'     => array(
                    array(
                        'value'=>'off',
                        'label'=>esc_html__('Vertical','shb'),
                    ),
                    array(
                        'value'=>'on',
                        'label'=>esc_html__('Horizontal','shb'),
                    ),
                ),
                'std'=>'on'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_custom_image_size',
                'label'       => esc_html__('Custom image size product (Default 800x800)','shb'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'=>esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','shb'),
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_related_product_detail',
                'label'       => esc_html__('Show related product','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide related product in product detail','shb'),
                'std'=>'off'
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_title_related_product',
                'label'       => esc_html__('Title related product','shb'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'        => esc_html__('This allows you to change the title related product.','shb'),
                'condition'   => 's7upf_show_related_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_number_related_product',
                'label'       => esc_html__('Number related product','shb'),
                'type'        => 'numeric-slider',
                'min_max_step'=> '1,100,1',
                'section'     => 'option_woo',
                'std'         => 4,
                'desc'        => esc_html__('Number product to show in related products box.','shb'),
                'condition'   => 's7upf_show_related_product_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_show_up_sells_product_detail',
                'label'       => esc_html__('Show Up-sells product','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'desc'=>esc_html__('This allow you to show or hide Up-sells product in product detail','shb'),
                'std'=>'off'
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 's7upf_title_up_sells_product',
                'label'       => esc_html__('Title Up-sells product','shb'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'desc'        => esc_html__('This allows you to change the title Up-sells product.','shb'),
                'condition'   => 's7upf_show_up_sells_product_detail:is(on)',
            ));

            array_push($s7upf_config['theme-option']['settings'], array(
                    'id' => 'st_tab_catalog',
                    'type' => 'tab',
                    'section' => 'option_woo',
                    'label' => esc_html__('Catalog Mode','shb')
                )
            );
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'woo_catelog',
                'label'       => esc_html__('Enable WooCommerce Catalog Mode','shb'),
                'desc'        => esc_html__('This allows you enable Catalog Mode.','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'std'         => 'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_detail',
                'label'       => esc_html__('Hide "Add to cart" button','shb'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Hide in product detail page.','shb'),
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off'
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'show_button_catalog',
                'label'       => esc_html__('Custom button "Add to cart"','shb'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Replace and edit button "Add to cart" in product detail','shb'),
                'section'     => 'option_woo',
                'condition'   => 'hide_detail:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'button_text_catalog',
                'label'       => esc_html__('Button text','shb'),
                'type'        => 'text',
                'desc'        => esc_html__('Show in product details page.','shb'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'url_protocol_type',
                'label'       => esc_html__('URL protocol type','shb'),
                'type'        => 'select',
                'desc'        => esc_html__('Specify the type of the URL.','shb'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
                'choices'     => array(
                    array(
                        'value'=>'',
                        'label'=>esc_html__('Generic URL','shb'),
                    ),
                    array(
                        'value'=>'email',
                        'label'=>esc_html__('E-Mail address','shb'),
                    ),
                    array(
                        'value'=>'phone_number',
                        'label'=>esc_html__('Phone number','shb'),
                    ),
                    array(
                        'value'=>'skype',
                        'label'=>esc_html__('Skype contact','shb'),
                    ),
                )
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'link_url_catalog',
                'label'       => esc_html__('Link URL','shb'),
                'type'        => 'text',
                'desc'        => esc_html__('Specify the type URL.','shb'),
                'section'     => 'option_woo',
                'condition'   => 'show_button_catalog:is(on),hide_detail:is(on)',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_other_page',
                'label'       => esc_html__('Hide "Add to cart" button','shb'),
                'type'        => 'on-off',
                'desc'        => esc_html__('Hide in other shop pages.','shb'),
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_price',
                'label'       => esc_html__('Hide Price','shb'),
                'desc'        => esc_html__('Hide the price of products in your shop and replace it with a text.','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));
            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'text_price',
                'label'       => esc_html__('Alternative text','shb'),
                'desc'        => esc_html__('This text will replace price.','shb'),
                'type'        => 'text',
                'section'     => 'option_woo',
                'condition'   => 'hide_price:is(on)',
            ));

            array_push($s7upf_config['theme-option']['settings'],array(
                'id'          => 'hide_admin',
                'label'       => esc_html__('Admin View','shb'),
                'desc'        => esc_html__('Enable Catalog Mode also for administrators.','shb'),
                'type'        => 'on-off',
                'section'     => 'option_woo',
                'condition'   => 'woo_catelog:is(on)',
                'std'         => 'off',
            ));
        }
    }
}
s7upf_set_theme_config();
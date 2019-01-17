<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 7up-framework
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div  class="wrap">
        <header>
            <?php
            $page_id = s7upf_get_value_by_id('s7upf_header_page');
            if(!empty($page_id)){
                s7upf_get_header_visual($page_id);
            }
            else{
                s7upf_get_header_default();
            }?>
        </header><!--End #header-->
        <div id="content">
            <?php
            s7upf_display_banner();
            s7upf_display_breadcrumb(); ?>
            <div class="container">


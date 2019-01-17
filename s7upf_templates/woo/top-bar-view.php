<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 15/09/2017
 * Time: 10:39 SA
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$type = 'grid';
$type = s7upf_get_option('woo_style_view_way_product');
if(isset($_GET['type'])){
    $type = $_GET['type'];
}
?>
<div class="sort-pagi-bar clearfix">
    <h2 class="title18 mont-font pull-left"><?php woocommerce_page_title(); ?></h2>
    <div class="sort-view pull-right">
        <div class="view-type pull-left">
            <a href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>" class="grid-view <?php if('grid' === $type) echo 'active'?>"><i class="fa fa-th-large"></i></a>
            <a href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>" class="list-view <?php if('list' === $type) echo 'active'?>"><i class="fa fa-th-list"></i></a>
        </div>
        <div class="sort-bar select-box">
            <label><?php echo esc_html__('Sort:','shb')?></label>
            <?php echo woocommerce_catalog_ordering(); ?>
        </div>
    </div>
</div>
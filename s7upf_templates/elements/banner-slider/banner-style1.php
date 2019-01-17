<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 03/04/2017
 * Time: 16:33
 */

$image_size = s7upf_get_size_image('full',$bg_image_size);
if(!empty($data_banner_1) and is_array($data_banner_1)){
?>
<div class="banner-slider banner-slider1 bg-slider <?php echo esc_attr($el_class);?>">
    <div class="wrap-item" data-navigation="<?php echo esc_attr($navigation); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" data-transition="<?php echo esc_attr($transition); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-itemscustom="[[0,1]]">
        <?php foreach($data_banner_1 as $value){ ?>

        <?php } ?>
    </div>
</div>
<?php }
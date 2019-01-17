<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 09/09/2017
 * Time: 3:37 CH
 */
if(empty($itemscustom)) $itemscustom='[0,1]'; else $itemscustom= s7upf_base64decode($itemscustom);
?>
<div class="element-carousel-slider <?php echo esc_attr($css_class)?> <?php echo esc_attr($el_class)?>">
    <div class="wrap-item white-pagi" data-navigation="<?php echo esc_attr($navigation); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" <?php if(!empty($transition)) echo 'data-transition="'.$transition.'"';?> data-autoplay="<?php echo esc_attr($autoplay); ?>"  data-itemscustom="[<?php echo esc_attr($itemscustom); ?>]">
        <?php if(!empty($content)) echo wpb_js_remove_wpautop($content, true); ?>
    </div>
</div>
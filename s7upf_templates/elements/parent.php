<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 09/09/2017
 * Time: 3:37 CH
 */
$css_class = vc_shortcode_custom_css_class( $custom_css );
?>
<div class="element-parent <?php echo esc_attr($el_class)?> <?php echo esc_attr($css_class)?>">
       <?php if(!empty($content)) echo wpb_js_remove_wpautop($content, false); ?>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/03/2017
 * Time: 17:36
 */
$image_size = s7upf_get_size_image('full',$image_size);
$class_color =  S7upf_Assets::build_css('color:'.$color_logo.';');
?>
<div class="logo <?php echo esc_attr($alignment); ?> <?php echo esc_attr($el_class); ?>">
    <a href="<?php echo esc_url(home_url('/'))?>">
        <?php if(!empty($logo_img)) echo wp_get_attachment_image($logo_img,$image_size);?>
        <?php if(!empty($logo_text)){ ?>
            <<?php echo esc_attr($logo_text_format)?> class="<?php if(!empty($logo_img)) echo 'hide'?> logo-text color title24 <?php echo esc_attr($class_color); ?>"><?php echo s7upf_base64decode($logo_text); ?></<?php echo esc_attr($logo_text_format)?>>
        <?php } ?>
    </a>
</div>

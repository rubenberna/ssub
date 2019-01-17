<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 20/10/2017
 * Time: 10:53 SA
 */
$image_size = s7upf_get_size_image('full',$image_size);
if(!empty($image_link)) $data_link= vc_build_link($image_link);
?>
<div class="item-slider js-item-banner <?php echo esc_attr($el_class); ?>">
    <?php if(!empty($bg_image)) { ?>
        <div class="banner-thumb">
            <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" ><?php echo wp_get_attachment_image($bg_image,$image_size); ?></a>
            <?php echo s7upf_base64decode($iframe);?>
        </div>
        <?php
    } if(!empty($content)){ ?>
        <div class="banner-info">
            <?php echo wpb_js_remove_wpautop($content,true); ?>
        </div>
    <?php } ?>
</div>

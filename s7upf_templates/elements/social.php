<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 29/05/2017
 * Time: 16:03
 */

?>
<div class="social-footer <?php echo esc_attr($el_class);?>">
    <?php if(!empty($data_social) and is_array($data_social)) {
        foreach ($data_social as $value){
            if(!empty($value['link']))
            $data_link = vc_build_link($value['link']); ?>
            <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" class="round inline-block"><i class="fa <?php if(!empty($value['icon'])) echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></a>
        <?php }
    } ?>
</div>

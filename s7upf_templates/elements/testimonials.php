<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24/05/2017
 * Time: 17:19
 */
$image_size = s7upf_get_size_image('full',$image_size);
if(!empty($data_testimonial) and is_array($data_testimonial)) { ?>
    <div class="slick-slider client-slider">
        <div class="slick center">
            <?php foreach ($data_testimonial as $value){
                if(!empty($value['image_link']))
                $link_img = vc_build_link($value['image_link']);
                if(!empty($value['link_name']))
                $link_name = vc_build_link($value['link_name']);
                ?>
                <div class="item-client">
                    <?php if(!empty($value['image'])){ ?>
                    <div class="client-thumb">
                        <a href="<?php echo (!empty($link_img['url']))? esc_url($link_img['url']):'#'; ?>" <?php if(empty($link_img['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_img['target']))?'_blank':'_parent'; ?>" <?php if(!empty($link_img['rel'])) echo'rel="' .esc_attr( $link_img['rel'] ) . '"'?>><?php echo wp_get_attachment_image($value['image'],$image_size); ?></a>
                    </div>
                    <?php } if(!empty($value['desc'])){ ?>
                    <p class="desc"><?php echo do_shortcode($value['desc']); ?></p>
                    <?php } if(!empty($link_name['title'])){ ?>
                        <h3 class="title14 client-name"><a href="<?php echo (!empty($link_name['url']))? esc_url($link_name['url']):'#'; ?>" <?php if(empty($link_name['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_name['target']))?'_blank':'_parent'; ?>" <?php if(!empty($link_name['rel'])) echo'rel="' .esc_attr( $link_name['rel'] ) . '"'?>><?php echo esc_attr($link_name['title']); ?></a></h3>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
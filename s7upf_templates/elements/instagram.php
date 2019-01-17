<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 08/04/2017
 * Time: 15:01
 */
$class_width = $media_array = '';
if(function_exists('s7upf_scrape_instagram'))
    $media_array = s7upf_scrape_instagram($user, $photo_number,$token,$size_index);
if(!empty($width))
    $class_width = S7upf_Assets::build_css('width:'.$width.'px!important;');
if($image_source == 'instagram'){
    if ($user != ''){
        if(!empty($media_array)){ ?>
            <div class="mb-list-instagram footer-box instagram-footer">
                <?php if(!empty($title)){ ?>
                    <h2 class="title18 mont-font color"><?php echo esc_attr($title); ?></h2>
                <?php } ?>
                <div class="list-instagram clearfix">
                    <?php
                    foreach ($media_array as $item) {
                        if(isset($item['link']) && isset($item['thumbnail_src'])){
                            if($click_action == 'popup') { ?>
                                    <a href="<?php echo esc_url($item['thumbnail_src']); ?>" class="instagram-fancybox" data-fancybox-group="instagram">
                                        <img  class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                    </a>
                                <?php
                            }else if($click_action == 'instagram'){ ?>
                                    <a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" data-fancybox-group="instagram">
                                        <img class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                    </a>
                                <?php
                            }else{ ?>
                                    <a href="#" onclick="return false;" class="<?php echo esc_attr($class_width)?>" data-fancybox-group="instagram">
                                        <img  class="grow" src="<?php echo esc_url($item['thumbnail_src']); ?>" alt="instagram">
                                    </a>
                                <?php
                            }
                        }
                    } ?>
                </div>
            </div>
            <?php
        }
    }
} else{
    ?>
    <div class="mb-list-instagram  footer-box instagram-footer">
        <?php if(!empty($title)){ ?>
            <h2 class="title18 mont-font color"><?php echo esc_attr($title); ?></h2>
        <?php } ?>
        <?php if( !empty($data_item_image) and is_array($data_item_image)){?>
            <div class="list-instagram clearfix">
                <?php foreach ($data_item_image as $value) {
                    if(!empty($value['link']))
                        $data_link = vc_build_link($value['link']);
                    if (!empty($value['image'])) { ?>
                            <a class="grow" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?>><?php echo wp_get_attachment_image($value['image'], 'full'); ?></a>
                    <?php }
                } ?>
            </div>
        <?php } ?>
    </div>
    <?php
}

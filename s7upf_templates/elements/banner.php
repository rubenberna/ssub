<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23/05/2017
 * Time: 16:24
 */
$image_size = s7upf_get_size_image('full',$image_size);
$data_link= vc_build_link($image_link);
switch ($style){
    case 'style1': ?>
        <div class="element-banner-style1 item-collection text-center wow  <?php echo esc_attr($animation_css); ?> <?php echo esc_attr($el_class); ?>">
            <div class="banner-quangcao <?php echo esc_attr($animation_image); ?> <?php if(!empty($overlay_image)) echo 'overlay-image'; ?>">
                <a class="adv-thumb-link" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
            </div>
            <?php if(!empty($content)){ ?>
                <div class="adv-content">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style2': ?>
        <div class="element-banner-style2 banner-quangcao <?php echo esc_attr($animation_image); ?>  wow <?php echo esc_attr($animation_css); ?> <?php echo esc_attr($el_class); ?>">
            <a class="adv-thumb-link" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
            <?php if(!empty($content)){ ?>
                <div class="banner-info mont-font text-center">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style3': ?>
        <div class="element-banner-style3 item-adv2 wow <?php echo esc_attr($animation_css); ?> <?php echo esc_attr($el_class); ?>">
            <div class="banner-quangcao <?php echo esc_attr($animation_image); ?> <?php if(!empty($overlay_image)) echo 'overlay-image'; ?>">
                <a class="adv-thumb-link" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
                <?php if($show_info=='show'){ ?>
                    <div class="banner-info">
                        <?php if(!empty($icon3)) echo '<i class="fa size-36 color '.$icon3.'" aria-hidden="true"></i>'; ?>
                        <?php if(!empty($info3)) echo s7upf_base64decode($info3); ?>
                    </div>
                <?php } ?>
            </div>
            <?php if(!empty($content)){ ?>
                <div class="adv-content">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style6':
        $class_position = S7upf_Assets::build_css('height:'.$height.'px; top:'.$top.'; left:'.$left.'; right:'.$right.'; bottom:'.$bottom.';',' .banner-info');
        $class_bg = S7upf_Assets::build_css('background: url('.wp_get_attachment_image_url($image,$image_size).'); z-index:-1;');
        $video_format = array('.mp4','.ogg','.webm','.MP4','.Ogg','WebM');
        $check_format = true;
        if(!empty($link_video)) {
            $check_format = false;
            foreach ($video_format as $key => $value) {
                $check_format = strpos($link_video, $value);
                if ($check_format !== false)
                    break;
            }
        }
        ?>
        <div class="element-banner-video <?php if($check_format === false) echo 'vd_player' ?> <?php echo esc_attr($el_class);?>">
            <?php

            if(!empty($link_video)) {
                if($check_format !== false) {
                    ?>
                    <video loop muted autoplay poster="<?php echo esc_url(wp_get_attachment_image_url($image,$image_size))?>" class="video-fullscreen">
                        <source src="<?php echo esc_url($link_video); ?>">
                    </video>
                    <?php
                }else{
                    wp_enqueue_script( 'jquery-mb-YTPlayer', get_template_directory_uri() . '/assets/js/libs/jquery.mb.YTPlayer.js',array('jquery'),null,true);
                    ?>
                    <div class="vd <?php echo esc_attr($class_bg);?>">
                        <div id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_url($link_video); ?>',containment:'.vd_player',autoPlay:true, mute:true, startAt:0, opacity:1,showControls:false}"></div>
                    </div>
                    <?php

                }
            }
            ?>
            <?php if(!empty($content)){ ?>
                <div class="banner-info white text-center">
                        <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style6':
        $class_position = S7upf_Assets::build_css('height:'.$height.'px; top:'.$top.'; left:'.$left.'; right:'.$right.'; bottom:'.$bottom.';',' .banner-info'); ?>
        <div class="element-banner-style4 banner-quangcao banner-adv3 wow <?php echo esc_attr($class_position); ?> <?php echo esc_attr($animation_image); ?> <?php echo esc_attr($animation_css); ?> <?php echo esc_attr($el_class); ?>">
            <a class="adv-thumb-link" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
            <?php if(!empty($content)){ ?>
                <div class="banner-info">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>

        </div>
        <?php
        break;
    default :
        $class_position = S7upf_Assets::build_css('height:'.$height.'px; top:'.$top.'; left:'.$left.'; right:'.$right.'; bottom:'.$bottom.';',' .banner-info');?>
        <div class="banner-quangcao quangcao-background  wow <?php echo esc_attr($class_position); ?> <?php echo esc_attr($animation_image); ?> <?php echo esc_attr($animation_css); ?> <?php echo esc_attr($el_class); ?>">
            <div class="adv-thumb">
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
            </div>
            <?php if(!empty($content)){ ?>
                <div class="banner-info text-center">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
}
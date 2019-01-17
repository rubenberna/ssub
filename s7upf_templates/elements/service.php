<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 22/05/2017
 * Time: 15:49
 */
$image_size = s7upf_get_size_image('full',$image_size);
switch ($style){
    case 'style1':
        if(!empty($icon_link))
        $data_link = vc_build_link($icon_link); ?>
        <div class="element-service1 item-service <?php echo esc_attr($el_class); ?> <?php echo esc_attr($position_corner); ?>">
            <?php if(!empty($iconpicker)){ ?>
            <div class="service-icon">
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?>><i class="fa <?php echo esc_attr($iconpicker); ?>" aria-hidden="true"></i></a>
            </div>
            <?php } if(!empty($content)){ ?>
                <div class="service-info text-center">
                    <?php echo wpb_js_remove_wpautop($content,true);?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style2':
        if(!empty($image_link))
            $data_link = vc_build_link($image_link); ?>
        <div class="element-service2 item-massage-service <?php echo esc_attr($el_class); ?>">
            <div class="row">
                <?php if(!empty($image)){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="service-thumb">
                        <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?>>
                            <?php echo wp_get_attachment_image($image,$image_size,false,array('class'=>'wobble-vertical')); ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($content)){ ?>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="service-info">
                            <?php echo wpb_js_remove_wpautop($content,true);?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style3': ?>
        <div class="element-service3 item-service4 <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($iconpicker)){ ?>
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> class="sevice-icon"><i class="fa <?php echo esc_attr($iconpicker); ?>" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(!empty($content)) echo wpb_js_remove_wpautop($content,true);?>
        </div>
        <?php
        break;
    default:
        $bg_color = S7upf_Assets::build_css('background:'.$bg_color.';'); ?>
        <div class="element-service4 item-about-service text-center white bg-color <?php echo esc_attr($el_class);?>   <?php echo esc_attr($bg_color);?> ">
            <?php if(!empty($iconpicker)){ ?>
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> class="wobble-horizontal">
                    <i class="fa <?php echo esc_attr($iconpicker); ?>"></i>
                </a>
            <?php } if(!empty($content)){
                echo wpb_js_remove_wpautop($content,true);
            } ?>
        </div>
        <?php
        break;
}
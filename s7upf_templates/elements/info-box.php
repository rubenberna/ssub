<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 22/05/2017
 * Time: 11:09
 */
$image_size = s7upf_get_size_image('full',$image_size);
switch ($style){
    case 'style1': ?>
        <div class="element-info-box-style1 <?php echo esc_attr($el_class); ?>">
            <div class="title-box2">
                <?php if(!empty($index_box)){ ?>
                    <strong class="box-index"><?php echo esc_attr($index_box); ?></strong>
                <?php } if(!empty($title)){ ?>
                    <h2 class="vibes-font title60 underline-title"><?php echo esc_attr($title); ?></h2>
                <?php } ?>
            </div>
            <?php if(!empty($content)){ ?>
                <div class="info-box-content">
                    <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style2':
        if(!empty($link))
            $data_link = vc_build_link($link); ?>
        <div class="element-info-box-style2 popcat-item text-center <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($title)){ ?>
            <h3 class="mont-font title18 underline-title">
                <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>">
                    <?php echo esc_attr($title); ?>
                </a>
            </h3>
            <?php }
            if(!empty($image)){ ?>
            <div class="popcat-thumb">
                <a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>">
                    <?php echo wp_get_attachment_image($image,$image_size); ?>
                </a>
            </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style3':
        if(!empty($image_link))
            $data_link = vc_build_link($image_link); ?>
        <div class="element-info-box-style3 item-cat5 item-collection text-center <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($image)){ ?>
                <div class="banner-quangcao  <?php echo esc_attr($animation_image); ?> <?php if(!empty($overlay_image)) echo 'overlay-image'; ?>">
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>" class="adv-thumb-link"><?php echo wp_get_attachment_image($image,$image_size); ?></a>
                </div>
            <?php } ?>
            <?php if(!empty($content)){ ?>
                <div class="content-cart5">
                <?php echo wpb_js_remove_wpautop($content,true); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style4':
        if(!empty($link))
            $data_link = vc_build_link($link);
        if(!empty($button_link))
            $data_button = vc_build_link($button_link); ?>
        <div class="element-info-box-style4 item-price-box  leaf-center  <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($price_label)) { ?>
                <span class="price-label title60 vibes-font"><?php echo esc_attr($price_label);?></span>
            <?php } if(!empty($title)){  ?>
                 <h3 class="mont-font title18 underline-title"><a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>"><?php echo esc_attr($title); ?></a></h3>
            <?php } if(!empty($content)){  ?>
            <div class="table-price <?php if(!empty($data_button['title'])) echo 'button-hover';?>">
                <?php echo wpb_js_remove_wpautop($content,true);?>
                <?php if(!empty($data_button['title'])){ ?>
                    <div class="bach-dashed">
                         <a class="btn-dashed"  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?>> <?php echo esc_attr(esc_attr($data_button['title'])); ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style5':
        $class_image='';
        if(!empty($image)){
            $url_img = wp_get_attachment_image_url($image,$image_size);
            $class_image = S7upf_Assets::build_css('background-image:url("'.$url_img.'")',':before');
        } ?>
        <div class="element-info-box-style5 box-title6 <?php echo esc_attr($class_image); ?> <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($content)) echo wpb_js_remove_wpautop($content,true); ?>
        </div>
        <?php
        break;
    case 'style6': ?>
        <div class="element-info-box-style6 breakpoint-detection <?php echo esc_attr($el_class); ?>">
            <div class="js-orbs-animation" data-module="orbs-animation">
                <canvas id="orbs"></canvas>
            </div>
        </div>
        <?php
        break;
    case 'style7':
        if(!empty($title_7))
        $data_title = vc_build_link($title_7);
        if(!empty($image_link))
            $image_link = vc_build_link($image_link); ?>
        <div class="element-info-box-style7 item-client2 <?php echo esc_attr($el_class); ?>">
            <div class="table">
                <?php if(!empty($image)){ ?>
                    <div class="client-thumb2">
                        <a href="<?php echo (!empty($image_link['url']))? esc_url($image_link['url']):'#'; ?>" <?php if(empty($image_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($image_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($image_link['rel'])) echo'rel="' .esc_attr( $image_link['rel'] ) . '"'?> title="<?php if(!empty($image_link['title'])) echo esc_attr($image_link['title']); ?>" ><?php echo wp_get_attachment_image($image,$image_size); ?></a>
                    </div>
                <?php } ?>
                <div class="client-info2">
                    <?php if(!empty($content)){ ?>
                        <div class="desc"> <?php echo wpb_js_remove_wpautop($content,true); ?></div>
                    <?php }  if(!empty($data_title['title'])){ ?>
                        <h3 class="title14"><a href="<?php echo (!empty($data_title['url']))? esc_url($data_title['url']):'#'; ?>" <?php if(empty($data_title['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_title['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_title['rel'] ) . '"'?>><?php echo esc_attr($data_title['title'])?></a></h3>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style8':
        if(!empty($title_7))
            $data_title = vc_build_link($title_7);
        if(!empty($image_link))
            $image_link = vc_build_link($image_link); ?>
        <div class="element-info-box-style8 item-client <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($image)){ ?>
                <div class="client-thumb">
                    <a href="<?php echo (!empty($image_link['url']))? esc_url($image_link['url']):'#'; ?>" <?php if(empty($image_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($image_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($image_link['rel'])) echo'rel="' .esc_attr( $image_link['rel'] ) . '"'?> title="<?php if(!empty($image_link['title'])) echo esc_attr($image_link['title']); ?>" ><?php echo wp_get_attachment_image($image,$image_size); ?></a>
                </div>
            <?php } ?>
            <?php if(!empty($content)){ ?>
                <div class="desc"> <?php echo wpb_js_remove_wpautop($content,true); ?></div>
            <?php }  if(!empty($data_title['title'])){ ?>
                <h3 class="title14 client-name"><a href="<?php echo (!empty($data_title['url']))? esc_url($data_title['url']):'#'; ?>" <?php if(empty($data_title['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_title['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_title['rel'] ) . '"'?>><?php echo esc_attr($data_title['title'])?></a></h3>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style9':
        if(!empty($image_link))
            $image_link = vc_build_link($image_link); ?>
        <div class="element-info-box-style9 item-about-client <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($image)){ ?>
                <div class="client-thumb">
                    <a href="<?php echo (!empty($image_link['url']))? esc_url($image_link['url']):'#'; ?>" <?php if(empty($image_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($image_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($image_link['rel'])) echo'rel="' .esc_attr( $image_link['rel'] ) . '"'?> title="<?php if(!empty($image_link['title'])) echo esc_attr($image_link['title']); ?>" ><?php echo wp_get_attachment_image($image,$image_size); ?></a>
                </div>
            <?php } ?>
            <?php if(!empty($content)){ ?>
                <div class="client-info"> <?php echo wpb_js_remove_wpautop($content,true); ?></div>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style10': ?>
        <div class="element-info-box-style10 newsletter-form <?php echo esc_attr($el_class); ?>">
            <div class="mb-mailchimp"  data-placeholder = "<?php echo esc_attr($placeholder)?>">
                <?php echo wpb_js_remove_wpautop('[mc4wp_form id="'.$shortcode.'"]'); ?>
            </div>
        </div>
        <?php
        break;
    case 'style11': ?>
        <div class="element-info-box-style11 about-why-choise  <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($title)){ ?>
                <h2 class="title18 rale-font text-uppercase font-bold"><?php echo esc_attr($title); ?></h2>
            <?php }
            if(!empty($data_item_info) and  is_array($data_item_info)){?>
                <div class="about-accordion toggle-tab">
                    <?php foreach ($data_item_info as $value){ ?>
                        <div class="item-toggle-tab active <?php if(empty($value['icon'])) echo 'no-icon';?>">
                            <div class="toggle-tab-title">
                                <?php if(!empty($value['icon'])){ ?>
                                    <span class="bg-color">
                                        <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                    </span>
                                <?php } ?>
                                <?php if(!empty($value['title'])) { ?>
                                    <h2 class="navi"><?php echo esc_attr($value['title']); ?></h2>
                                <?php } ?>
                            </div>
                            <?php if(!empty($value['desc'])){ ?>
                                <p class="desc toggle-tab-content silver"><?php echo esc_attr($value['desc']); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <?php
        break;
    default: ?>
        <div class="element-info-box-style12 contact-box contact-address-box <?php echo esc_attr($el_class); ?>">
            <?php if(!empty($iconpicker)){ ?>
                <span class="color"><i class=" <?php echo esc_attr($iconpicker)?>"></i></span>
            <?php } ?>
            <?php if(!empty($content)) echo wpb_js_remove_wpautop($content, true); ?>
        </div>
    <?php
    break;
}
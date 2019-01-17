<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 26/05/2017
 * Time: 11:18
 */
$class_color='';
if(!empty($main_color)){
    $class_color .=' '.S7upf_Assets::build_css('color:'.$main_color.';',' .title14 a:hover');
    $class_color .=' '.S7upf_Assets::build_css('background:'.$main_color.';',' .team-social-network a:hover');
}
if(!empty($link_team))
    $link_team = vc_build_link($link_team);
$image_size = s7upf_get_size_image('full',$image_size);
switch ($style){
    case 'style1': ?>
        <div class="item-team-circle  mb-team-<?php echo esc_attr($style); ?> <?php echo esc_attr($class_color); ?> <?php echo esc_attr($el_class);?>">
            <div class="team-circle-thumb">
                <?php if(!empty($image)){
                    echo wp_get_attachment_image($image,$image_size,false,array('class'=>'team-cirle-image'));
                } ?>
                <div class="info-circle-thumb">
                    <?php if(!empty($desc)){?>
                        <p class="desc"><?php echo esc_attr($desc); ?></p>
                    <?php } if(!empty($data_social) and is_array($data_social)){ ?>
                        <ul class="team-social-network list-inline-block">
                            <?php foreach ($data_social as $value){
                                $link='';
                                if(!empty($value['link'])) $link = vc_build_link($value['link']);
                                if(!empty($value['icon'])){ ?>
                                    <li>
                                        <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>">
                                            <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                        </a>
                                    </li>
                            <?php }
                            } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="team-circle-info text-center">
                <?php if(!empty($title)){ ?>
                <h3 class="title14">
                    <a href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                        <?php echo do_shortcode($title); ?>
                    </a>
                </h3>
                <?php } if(!empty($position)){ ?>
                    <span class="silver"><?php echo do_shortcode($position);?></span>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style2': ?>
        <div class="item-team-rectang banner-quangcao zoom-image mb-team-<?php echo esc_attr($style); ?> <?php echo esc_attr($class_color); ?> <?php echo esc_attr($el_class);?>">
            <?php  if(!empty($image)){?>
                <a class="adv-thumb-link" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                    <?php echo wp_get_attachment_image($image,$image_size,false); ?>
                </a>
            <?php } ?>
            <div class="team-circle-info">
                <?php if(!empty($title)){ ?>
                    <h3 class="title14">
                        <a href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                            <?php echo do_shortcode($title); ?>
                        </a>
                    </h3>
                <?php } if(!empty($position)){ ?>
                    <span class="silver"><?php echo do_shortcode($position);?></span>
                <?php } if(!empty($data_social) and is_array($data_social)){ ?>
                    <ul class="team-social-network list-inline-block">
                        <?php foreach ($data_social as $value){
                            $link='';
                            if(!empty($value['link'])) $link = vc_build_link($value['link']);
                            if(!empty($value['icon'])){ ?>
                                <li>
                                    <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>">
                                        <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    case 'style3': ?>
        <div class="item-member1 mb-team-<?php echo esc_attr($style); ?> <?php echo esc_attr($class_color); ?> <?php echo esc_attr($el_class);?>">
            <div class="member-thumb banner-quangcao zoom-image">
                <?php  if(!empty($image)){?>
                    <a class="adv-thumb-link" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                        <?php echo wp_get_attachment_image($image,$image_size,false); ?>
                    </a>
                <?php }  if(!empty($data_social) and is_array($data_social)){ ?>
                    <div class="member-social">
                        <?php foreach ($data_social as $value){
                            $link='';
                            if(!empty($value['link'])) $link = vc_build_link($value['link']);
                            if(!empty($value['icon'])){ ?>
                                <a href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>">
                                    <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                </a>
                            <?php }
                        } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="member-info">
                <?php if(!empty($title)){ ?>
                    <h3 class="title14">
                        <a class="black" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                            <?php echo do_shortcode($title); ?>
                        </a>
                    </h3>
                <?php } if(!empty($desc)){ ?>
                        <p class="desc"><?php echo do_shortcode($desc);?></p>
                <?php } ?>
            </div>
        </div>
        <?php
        break;
    default: ?>
        <div class="item-member2">
            <div class="row">
                <?php if($position_image == 'left'){ ?>
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <?php  if(!empty($image)){?>
                         <div class="banner-quangcao fade-in-out zoom-image">
                            <a class="adv-thumb-link" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                                <?php echo wp_get_attachment_image($image,$image_size,false); ?>
                            </a>
                         </div>
                    <?php }  ?>
                </div>
                <?php }  ?>
                <div class="col-md-8 col-sm-7 col-xs-12">
                    <div class="member-info">
                        <?php if(!empty($title)){ ?>
                            <h3 class="title14">
                                <a class="black" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                                    <?php echo do_shortcode($title); ?>
                                </a>
                            </h3>
                        <?php } if(!empty($desc)){ ?>
                            <p class="desc"><?php echo do_shortcode($desc);?></p>
                        <?php } if(!empty($data_social) and is_array($data_social)){ ?>
                            <div class="member-social">
                                <?php foreach ($data_social as $value){
                                    $link='';
                                    if(!empty($value['link'])) $link = vc_build_link($value['link']);
                                    if(!empty($value['icon'])){ ?>
                                        <a class="float-shadow" href="<?php echo (!empty($link['url']))? esc_url($link['url']): '#'; ?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>">
                                            <i class="fa <?php echo esc_attr($value['icon']); ?>"></i>
                                        </a>
                                    <?php }
                                } ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <?php if($position_image == 'right'){ ?>
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <?php  if(!empty($image)){?>
                        <div class="banner-quangcao fade-in-out zoom-image">
                            <a class="adv-thumb-link" href="<?php echo (!empty($link_team['url']))? esc_url($link_team['url']): '#'; ?>" <?php if(empty($link_team['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link_team['target']))?'_blank':'_parent'; ?>">
                                <?php echo wp_get_attachment_image($image,$image_size,false); ?>
                            </a>
                        </div>
                    <?php }  ?>
                </div>
                <?php }  ?>
            </div>
        </div>
        <?php
        break;
}
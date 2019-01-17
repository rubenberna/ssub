<?php
$word_excerpt = s7upf_get_option('number_word_excerpt_blog_list','30');
$style_blog = s7upf_get_style_blog_by_option('s7upf_style_blog','s7upf_style_blog_search');
$sidebar=s7upf_get_sidebar();
$sidebar_pos=$sidebar['position'];
$col_blog = s7upf_get_style_blog_by_option('s7upf_column_blog','s7upf_column_blog_search');
global $post;
switch ($style_blog){
    case 'style2':

        if(empty($col_blog)) $col_blog = '4';
        $size_img_df = '1170x400';
        if($sidebar_pos !== 'no'){
            switch ($col_blog){
                case '12':
                    $size_img_df = '870x400';
                    break;
                case  '6':
                    $size_img_df = '420x270';
                    break;
                default:
                    $size_img_df = '270x180';
                    break;
            }
        } else{
            switch ($col_blog){
                case '12':
                    $size_img_df = '1170x400';
                    break;
                case  '6':
                    $size_img_df = '570x370';
                    break;
                default:
                    $size_img_df = '370x200';
                    break;
            }
        }


        $default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_'.$size_img_df.'.png';
        $image_size = s7upf_get_option('custom_size_image_blog_list');
        $size_image = s7upf_get_size_image($size_img_df,$image_size);
        ?>
        <div class="col-md-<?php echo esc_attr($col_blog) ?> col-sm-6 col-xs-12">
            <div class="item-post-format item-post-style2">
                <?php s7upf_edit_link();?>
                <div class="post-thumb">
                    <a href="<?php the_permalink(); ?>" class="post-thumb-link">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail($size_image);
                        }else if(!empty($default_thumbnail)){ ?>
                            <img src="<?php echo esc_url($default_thumbnail); ?>">
                            <?php
                        }?>
                    </a>
                </div>
                <div class="post-info">
                    <?php echo s7upf_get_post_format(); ?>
                    <h3 class="title14 post-title"><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
                    <div class="post-comment-date clearfix">
                        <div class="post-date pull-left text-center">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span><?php echo get_the_date(get_option('date_format')); ?></span>
                        </div>
                        <div class="post-comment pull-right text-center">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span><?php echo get_comments_number(); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        break;
    case 'style3':
        if(empty($col_blog)) $col_blog = '6';
        $size_img_df = '1170x400';
        if($sidebar_pos !== 'no'){
            switch ($col_blog){
                case '12':
                    $size_img_df = '870x400';
                    break;
                case  '6':
                    $size_img_df = '430x280';
                    break;
                default:
                    $size_img_df = '283x160';
                    break;
            }
        } else{
            switch ($col_blog){
                case '12':
                    $size_img_df = '1170x400';
                    break;
                case  '6':
                    $size_img_df = '580x380';
                    break;
                default:
                    $size_img_df = '383x220';
                    break;
            }
        }



        $default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_'.$size_img_df.'.png';
        $image_size = s7upf_get_option('custom_size_image_blog_list');
        $size_image = s7upf_get_size_image($size_img_df,$image_size);
        ?>
        <div class="col-md-<?php echo esc_attr($col_blog) ?> col-sm-<?php echo esc_attr($col_blog) ?> col-xs-12">
            <div class="item-post-style3 item-post-format item-blog-full <?php echo 'sidebar-position-'.$sidebar_pos?>">
                <?php s7upf_edit_link();?>
                <div class="post-thumb">
                    <a href="<?php echo the_permalink();?>" class="post-thumb-link">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail($size_image);
                        }else if(!empty($default_thumbnail)){ ?>
                            <img src="<?php echo esc_url($default_thumbnail); ?>">
                            <?php
                        }?>
                    </a>
                </div>
                <div class="post-info">
                    <?php echo s7upf_get_post_format(); ?>
                    <h3 class="title14 post-title"><a href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
                    <div class="post-comment-date clearfix">
                        <div class="post-date pull-left text-center">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <span><?php echo get_the_date(get_option('date_format')); ?></span>
                        </div>
                        <div class="post-comment pull-right text-center">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            <span><?php echo get_comments_number(); ?></span>
                        </div>
                    </div>
                    <div class="post-info-hidden">
                    <?php if ( has_excerpt( get_the_ID()) ) { ?>
                        <p class="desc">
                            <?php
                            echo wp_trim_words( get_the_excerpt(), $word_excerpt , '...' );
                            ?>
                        </p>
                    <?php  } ?>
                        <a href="<?php the_permalink(); ?>" class="btn-dashed readmore"><?php echo esc_html__('Read more','shb')?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        break;
    default: ?>

        <div class="df-post-item-style">
            <?php  echo S7upf_Template::load_view('blog-content/media-post');  ?>
            <div class="df-post-info">
                <?php s7upf_edit_link();
                the_title( '<h2 class="df-title-post text-uppercase"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
                if(is_sticky()) { ?>
                    <i class="fa fa-star star-sticky" aria-hidden="true"></i>
                    <?php
                } ?>
                <ul class="list-meta-block">
                    <?php if(is_sticky()){?>
                        <li class="is_sticky">
                            <span><i class="fa fa-thumb-tack" aria-hidden="true"></i><?php echo esc_html__('Sticky','shb'); ?> </span>
                        </li>
                    <?php } ?>
                    <li>
                        <i class="fa fa-user gray" aria-hidden="true"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="df-silver"><?php echo get_the_author(); ?></a>
                    </li>
                    <li>
                        <i class="fa fa-calendar gray"></i>
                        <span><?php echo get_the_date(get_option('date_format')); ?></span>
                    </li>
                    <li>
                        <i aria-hidden="true" class="fa fa-comment gray"></i>
                        <a href="<?php echo esc_url( get_comments_link() ); ?>" class="df-silver">
                            <?php
                            printf( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'shb' ), number_format_i18n( get_comments_number() ));
                            ?>
                        </a>
                    </li>
                    <?php $cats = get_the_category_list(', ');
                    if($cats) { ?>
                        <li>
                            <div class="df-category-list">
                                <i class="fa fa-folder-open gray" aria-hidden="true"></i>
                                <?php echo do_shortcode($cats); ?>
                            </div>
                        </li>
                    <?php } ?>
                    <?php
                    $tags = get_the_tag_list(' ',', ',' ');
                    if($tags) { ?>
                        <li>
                            <div class="df-category-list">
                                <i class="fa fa-tag"></i>
                                <?php echo do_shortcode($tags); ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <?php

                if ( has_excerpt() || !empty($post->post_content)) { ?>
                    <p class="df-desc">
                        <?php
                        echo wp_trim_words( get_the_excerpt(), $word_excerpt , '...' );
                        ?>
                    </p>
                <?php  }
                ?>
                <a class="shop-button read-more-post" href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html__('Read more','shb'); ?></a>
            </div>
        </div>
        <?php
        break;
}
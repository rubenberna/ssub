<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 10:08
 */
$size_img_df = '370x200';
$default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_'.$size_img_df.'.png';
$image_size = s7upf_get_size_image($size_img_df,$image_size);
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
if($query->have_posts()){ ?>
    <?php while ($query->have_posts()) {
        $query->the_post(); ?>
        <div class="col-md-<?php echo esc_attr($col_layout) ?> col-sm-6 col-xs-12">
            <div class="item-post-style3 item-post-format item-blog-full">
                <?php s7upf_edit_link();?>
                <div class="post-thumb">
                    <a href="<?php echo the_permalink();?>" class="post-thumb-link">
                        <?php if(has_post_thumbnail()){
                            the_post_thumbnail($image_size);
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
    }
} ?>

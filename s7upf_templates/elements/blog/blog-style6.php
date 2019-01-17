<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 30/10/2017
 * Time: 4:58 CH
 */
$size_img_df = '370x200';
$default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_'.$size_img_df.'.png';
$image_size = s7upf_get_size_image($size_img_df,$image_size);
$data_date=get_option('date_format');
if(!empty($date_format))
    $data_date= $date_format;
if(empty($itemscustom)) $itemscustom='[0,1],[480,2],[768,3],[980,4]'; else $itemscustom= s7upf_base64decode($itemscustom);
if($query->have_posts()){ ?>

<div class="from-blog3 element-blog-style6 <?php echo esc_attr($extra_class); ?>">
    <?php if(!empty($title)){ ?>
        <h2 class="title30 mont-font title-box3"><?php echo esc_attr($title); ?></h2>
    <?php } ?>
    <div class="related-post-slider">
        <div class="wrap-item" data-pagination="false" data-navigation="<?php echo esc_attr($navigation); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>"  data-itemscustom="[<?php echo esc_attr($itemscustom)?>]">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="item-post-format">
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>" class="post-thumb-link">
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
                    </div>
                </div>

                <?php
            } ?>
        </div>
    </div>
</div>
<?php
}

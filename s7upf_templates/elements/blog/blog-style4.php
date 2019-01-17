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
$i=1;
$counter_post = $query->post_count;
$data_button = vc_build_link($button_view);
if($query->have_posts()){ ?>
    <div class="element-blog-style4 <?php echo esc_attr($extra_class); ?>">
        <div class="row">
            <div class="masonry-list-post">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <?php if($i % 2 == 1) echo '<div class="item-post-masonry col-md-6 col-sm-12 col-xs-12">';?>

                    <?php if($i==1 and !empty($title)) { ?>
                    <p class="latest-news-intro wow fadeInUp"><?php echo esc_attr($title); ?></p>
                    <?php } ?>

                    <?php if($i % 2 == 1) echo '<div class="row">';?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="item-post-format wow fadeInUp">
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
                                </div>
                            </div>
                        </div>
                    <?php if($i % 2 == 0 || $i == $counter_post) echo '</div>'; ?>

                <?php if($i % 2 == 0 || $i == $counter_post) echo '</div>'; ?>
                <?php if($i==$counter_post and !empty($data_button['title'])){ ?>
                    <div class="item-post-masonry col-md-6 col-sm-12 col-xs-12">
                        <div class="text-center wow fadeInLeft viewall">
                            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']):'#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_button['rel'])) echo'rel="' .esc_attr( $data_button['rel'] ) . '"'?> class="viewall-button"><?php echo esc_attr($data_button['title']); ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                <?php } ?>
                <?php
                $i++;
            } ?>
            </div>
        </div>
    </div>
    <?php
}
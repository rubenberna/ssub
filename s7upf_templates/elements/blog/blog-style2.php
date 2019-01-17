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
    <div class="element-blog-style2 content-blog-sidebar <?php echo esc_attr($extra_class); ?>">
        <div class="row">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <div class="col-md-<?php echo esc_attr($col_layout) ?> col-sm-6 col-xs-12">
                    <div class="item-post-format item-post-style2">
                        <?php s7upf_edit_link();?>
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
                </div>
                <?php
            } ?>
        </div>
    </div>
    <?php
} ?>
<?php
if('on' === $pagination){
    ?> <div class="pagination-blog navigation paging-navigation"><div class="pagination loop-pagination"> <?php

            $big = 999999999;
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '&page=%#%',
                'current' => max(1, $paged),
                'total' => $query->max_num_pages,
                'mid_size' => 1,
                'type' => 'plain',
                'prev_text' => '<i class="fa fa-arrow-circle-left"></i>',
                'next_text' => '<i class="fa fa-arrow-circle-right"></i>',
            ));
            ?> </div> </div> <?php
}
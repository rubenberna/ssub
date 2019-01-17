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
$data_button = vc_build_link($button_view);
if($query->have_posts()){ ?>
    <div class="element-blog-style7 list-blog6 text-center <?php echo esc_attr($extra_class); ?>">
        <div class="row">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <div  class="col-md-<?php echo esc_attr($col_layout) ?> col-sm-6 col-xs-12">
                    <div class="item-blog6">
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
                            <h3 class="title14 post-title"><a class="color" href="<?php echo the_permalink();?>"><?php the_title(); ?></a></h3>
                            <?php if ( has_excerpt( get_the_ID()) ) { ?>
                                <p class="desc">
                                    <?php
                                    echo wp_trim_words( get_the_excerpt(), $word_excerpt , '...' );
                                    ?>
                                </p>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
                <?php
            } ?>
        </div>
        <?php if(!empty($data_button['title'])){ ?>
            <a href="<?php echo (!empty($data_button['url']))? esc_url($data_button['url']):'#'; ?>" <?php if(empty($data_button['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_button['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_button['rel'])) echo'rel="' .esc_attr( $data_button['rel'] ) . '"'?> class="viewall-button"><?php echo esc_attr($data_button['title']); ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        <?php } ?>
        </div>
    <?php
}
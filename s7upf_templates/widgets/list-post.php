<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 27/09/2017
 * Time: 11:23 SA
 */
$default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_270x180.png';

if(empty($instance['image_size'])) $image_size = ''; else $image_size = $instance['image_size'];
$image_size = s7upf_get_size_image('80x58',$image_size);

?>
<div class="item-recent-post table">
    <div class="post-thumb">
        <a href="<?php the_permalink(); ?>" class="post-thumb-link">
            <?php
            if(has_post_thumbnail()) the_post_thumbnail($image_size); else { ?><img src="<?php echo esc_url($default_thumbnail);?>"><?php } ?>
        </a>
    </div>
    <div class="post-info">
        <h3 class="product-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
        <span class="post-date-time"><?php echo get_the_date(get_option('date_format'));?></span>
    </div>
</div>
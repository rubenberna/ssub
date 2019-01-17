<?php

$hide_media = s7upf_get_value_by_id('hide_media_single');
?>

<div <?php post_class(); ?>>
    <div class="single-intro">
        <?php the_title('<h2 class="title30">','</h2>')?>
        <?php s7upf_display_metabox('single-info') ?>

    </div>
    <?php if(has_post_thumbnail() and $hide_media !=='on') {?>
    <div class="banner-quangcao fade-out-in">
        <div class="adv-thumb-link">
            <?php echo get_the_post_thumbnail(get_the_ID(),'full');  ?>
        </div>
    </div>
    <?php }?>
    <div class="single-content"><?php the_content(); ?></div>
</div>

<?php

$data = '';
$hide_media = s7upf_get_value_by_id('hide_media_single');
$data_media = get_post_meta(get_the_ID(), 'format_media', true);
$video_format = array('.mp4','.ogg','.webm','.MP4','.Ogg','WebM','.mov');
$check_format = false;
foreach ($video_format as $key => $value) {
    $check_format = strpos($data_media, $value);
    if ($check_format !== false)
        break;
}
if($check_format !== false) {
    $data .= '<div class="post-video banner-quangcao">';
    $data .= '<video class="video_host_media" controls> <source src="'.esc_url($data_media).'"></video>';
    $data .= '</div>';
}else{
    $data .= '<div class="post-video banner-quangcao">';
    $data .= s7upf_remove_w3c(wp_oembed_get($data_media,array( 'width' => 1920)));
    $data .= '</div>';
}
?>
<div <?php post_class(); ?>>
    <div class="single-intro">
        <?php the_title('<h2 class="title30">','</h2>')?>
        <?php s7upf_display_metabox('single-info') ?>
    </div>
    <?php
    if($hide_media !=='on') {
        if(!empty($data)) echo do_shortcode($data);
    } ?>
    <div class="single-content"><?php the_content(); ?></div>
</div>
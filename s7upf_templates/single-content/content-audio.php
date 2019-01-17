<?php
$data = '';
$media_url = get_post_meta(get_the_ID(), 'format_media', true);
$hide_media = s7upf_get_value_by_id('hide_media_single');
if (!empty($media_url)) {
    if(strpos($media_url,'.mp3') !== false){
        $data .='<div class="post-audio banner-quangcao"><audio controls><source src="'.esc_url($media_url).'" type="audio/mpeg"></audio></div>';
    }else{
        $data .= '<div class="post-audio banner-quangcao">' . s7upf_remove_w3c(wp_oembed_get($media_url, array('height' => '176'))) . '</div>';
    }
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

<?php
$data = '';
$gallery = get_post_meta(get_the_ID(), 'format_gallery', true);
$hide_media = s7upf_get_value_by_id('hide_media_single');
if (!empty($gallery)){
    $array = explode(',', $gallery);
    if(is_array($array) && !empty($array)){

        $data .= '<div class="post-gallery banner-quangcao"><div class="wrap-item white-pagi" data-gation="true" data-transition="fade" data-pagination="false"  data-navigation="true"  data-autoplay="true" data-itemscustom="[[0,1]]">';
        foreach ($array as $key => $item) {
            $thumbnail_url = wp_get_attachment_url($item);
            $data .='<div class="image-slider">';
            $data .= '<img src="' . esc_url($thumbnail_url) . '" alt="image-slider">';
            $data .= '</div>';
        }
        $data .='</div></div>';
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

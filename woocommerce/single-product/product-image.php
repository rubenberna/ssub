<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . $placeholder,
    'woocommerce-product-gallery--columns-' . absint( $columns ),
    'images',
) );

$style_gallery='off';
$style_gallery = s7upf_get_value_by_id('s7upf_style_gallery_detail');
$share_product = s7upf_get_option('s7upf_show_share_product_detail');
$image_size = s7upf_get_option('s7upf_custom_image_size');
$attachment_ids = $product->get_gallery_image_ids();
if(!empty($image_size)) $thumbnail_size = s7upf_get_size_image('full',$image_size);
?>
<div class="style_gallery_horizontal_<?php echo esc_attr($style_gallery);?> <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?> " data-columns="<?php echo esc_attr( $columns ); ?>">
    <figure class="woocommerce-product-gallery__wrapper">
        <div class="detail-gallery <?php if(empty($attachment_ids)and count($attachment_ids)<1) echo 'no-gallery-attachment'?>">
            <div class="wrap-detail-gallery">
                <?php
                $attributes = array(
                    'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
                    'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
                    'data-src'                => $full_size_image[0],
                    'data-large_image'        => $full_size_image[0],
                    'data-large_image_width'  => $full_size_image[1],
                    'data-large_image_height' => $full_size_image[2],
                );


                if ( has_post_thumbnail() ) {
                    $html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image mid">';
                    $html .= get_the_post_thumbnail( $post->ID, $thumbnail_size, $attributes );
                    $html .= '</div>';
                } else if(!empty($attachment_ids[0])){
                    $full_size_image = wp_get_attachment_image_src( $attachment_ids[0] , 'full' );
                    $attributes_attachment_before     = array(
                        'title'                   => get_post_field( 'post_title', $attachment_ids[0] ),
                        'data-caption'            => get_post_field( 'post_excerpt', $attachment_ids[0] ),
                        'data-src'                => $full_size_image[0],
                        'data-large_image'        => $full_size_image[0],
                        'data-large_image_width'  => $full_size_image[1],
                        'data-large_image_height' => $full_size_image[2],
                    );
                    $attachment_before_full    = wp_get_attachment_image_src( $attachment_ids[0], $thumbnail_size );

                    $html  = '<div class="woocommerce-product-gallery__image mid">';
                    $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( $attachment_before_full[0] ), $attributes_attachment_before['title'] );
                    $html .= '</div>';
                }else {
                    $html  = '<div class="woocommerce-product-gallery__image--placeholder mid">';
                    $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'shb' ) );
                    $html .= '</div>';
                }

                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

                if(!empty($attachment_ids) and count($attachment_ids)>=1){
                ?>
                <div class="gallery-control">
                    <div class="carousel" data-vertical="<?php if('on' == $style_gallery) {echo 'false';} else {echo'true';} ?>" data-visible="4">
                        <ul class="list-none">
                        <?php
                        if ( has_post_thumbnail() ) {
                            echo '<li data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image active"><a class="active" href="#">';
                            echo get_the_post_thumbnail( $post->ID, $thumbnail_size, $attributes );
                            echo '</a></li>';
                        }
                        do_action( 'woocommerce_product_thumbnails' ); ?>
                        </ul>
                    </div>
                    <div class="control-button-gallery text-center">
                        <a href="#" class="prev"><i class="fa fa-arrow-circle-left"></i></a>
                        <a href="#" class="next"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php if('on'== $share_product){ ?>
            <div class="detail-social">
                <a class="share-face" target="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a class="share-twit " target="popup" href="http://twitter.com/share?url=<?php the_permalink() ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a class="share-google" target="popup"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>

                <a class="no-open share-pint" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="popup"><i class="fa fa-pinterest" aria-hidden="true"></i></a>

            </div>
            <?php } ?>
        </div>
    </figure>
</div>
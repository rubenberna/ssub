<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 21/04/2017
 * Time: 10:28
 */
$image_size  = s7upf_get_size_image('400x400',$image_size);
if(empty($col_layout)) $col_layout = '3';
$type = 'list';
if($pro_query->have_posts()){ ?>
    <div class="woocommerce  mb-element-product-<?php echo esc_attr($style); ?> <?php echo esc_attr($extra_class)?>">
        <?php
        if($order_by_show == 'on'){
            s7upf_shop_filter_html('list',$title);
            if(isset($_GET['type'])){
                $type = $_GET['type'];
            }
        }
        if ('grid' == $type){?>
            <div class="product">
                <div class="row">
                    <?php  while ($pro_query->have_posts()) {
                        $pro_query->the_post(); global $product; global $post; $units_sold = get_post_meta( get_the_ID(), 'total_sales', true ); ?>
                        <div class="col-md-<?php echo esc_attr($col_layout); ?> col-sm-6 col-xs-12">
                            <div class="item-product item-product-grid">
                                <div class="product-thumb box-hover-dir">

                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        echo get_the_post_thumbnail( get_the_ID(), $image_size);
                                    }  else {
                                        $dimensions = wc_get_image_size( $image_size ); ?>
                                        <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','shb')?>" title="<?php esc_html_e('product','shb')?>" />
                                        <?php
                                    }
                                    if('on' == $label_new){
                                        echo s7upf_show_product_loop_new_badge($day_new,'<span class="product-new-label">','</span>');
                                    }

                                    if ( $product->is_on_sale() and 'on'==$label_sale) : ?>

                                        <?php echo apply_filters( 'woocommerce_sale_flash', '<span class="product-sale-label">' . esc_html__( 'Sale!', 'shb' ) . '</span>', $post, $product ); ?>

                                    <?php endif;
                                    ?>
                                    <div class="info-product-hover-dir">
                                        <div class="inner-product-hover-dir">
                                            <div class="content-product-hover-dir">
                                                <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><?php echo esc_html__('Quick view','shb'); ?><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                                                <span class="product-total-sale"><?php printf(_nx('( %s Sale )','( %s Sales )',$units_sold,'Product total sale','shb'), number_format_i18n($units_sold)); ?></span>
                                                <div class="product-extra-link">
                                                    <?php woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart')); ?>
                                                    <?php echo s7up_wishlist_url(esc_html__('Wishlist','shb')); ?>
                                                    <?php echo s7upf_compare_url(false,esc_html__('Compare','shb')); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h3>
                                    <?php echo s7upf_get_rating_html();?>
                                    <div class="product-price">
                                        <?php woocommerce_template_loop_price(); ?>
                                        <?php $discount_sale = s7upf_product_loop_discount_sale();
                                        if(!empty($discount_sale) and $product->is_on_sale()) {?>
                                            <span class="sale-label"><?php echo do_shortcode($discount_sale);?></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        <?php }else{ ?>
            <div class="product">
                <?php  while ($pro_query->have_posts()) {
                    $pro_query->the_post(); global $product; global $post;

                    $thumb_gallery =  array();
                    $thumb_gallery = array(get_post_thumbnail_id( $post->ID ));
                    $thumb_gallery = array_merge($thumb_gallery,$product->get_gallery_image_ids());
                    ?>
                    <div class="item-product-list">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-thumb product-thumb-gallery">
                                    <a href="<?php the_permalink(); ?>" class="product-thumb-link">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                            echo get_the_post_thumbnail( get_the_ID(), $image_size);
                                        }  else {
                                            $dimensions = wc_get_image_size( $image_size ); ?>
                                            <img src="<?php echo esc_url($default_image); ?>" width="<?php echo esc_attr( $dimensions['width'] ) ?> " height="<?php echo esc_attr( $dimensions['height'] ) ?> "  alt="<?php esc_html_e('Image Default','shb')?>" title="<?php esc_html_e('product','shb')?>" />
                                            <?php
                                        } ?>
                                    </a>
                                    <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                                    <?php
                                    $gallery_image = $product->get_gallery_image_ids();
                                    if ( $thumb_gallery && !empty($gallery_image)) { ?>
                                        <div class="thumb-gallery">
                                            <?php
                                            foreach ( $thumb_gallery as $key=>$attachment_id ) {
                                                if($key == 0) $class= 'active'; else $class='';
                                                echo '<a href="#" class="'.$class.'">';
                                                echo wp_get_attachment_image($attachment_id,$image_size);
                                                echo '</a>';
                                            } ?>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-<?php if(has_excerpt( get_the_ID())) echo '4'; else echo '8'; ?> col-sm-6 col-xs-12">
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <?php echo s7upf_get_rating_html();?>
                                    <div class="product-price">
                                        <?php woocommerce_template_loop_price(); ?>
                                        <?php $discount_sale = s7upf_product_loop_discount_sale();
                                        if(!empty($discount_sale) and $product->is_on_sale()) {?>
                                            <span class="sale-label"><?php echo do_shortcode($discount_sale);?></span>
                                        <?php } ?>
                                    </div>
                                    <div class="product-extra-link">
                                        <?php woocommerce_template_loop_add_to_cart(array('style'=>'icon_cart')); ?>
                                        <?php echo s7up_wishlist_url(esc_html__('Wishlist','shb')); ?>
                                        <?php echo s7upf_compare_url(false,esc_html__('Compare','shb')); ?>
                                    </div>
                                </div>
                            </div>
                            <?php  if( has_excerpt( get_the_ID())){ ?>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="product-more-info">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } wp_reset_postdata(); ?>
    </div>
<?php }else{ ?>
    <h2 class="no-products color"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo esc_html__('No products were found matching your selection.','shb'); ?></h2><?php
}

if($pagination == 'on'){ ?>
    <div class="woocommerce-pagination pagination-blog navigation paging-navigation">
        <div class="pagination loop-pagination">
            <?php
            echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
                'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                'format'       => '',
                'add_args'     => false,
                'current'      =>  max(1, $paged),
                'total'        => $pro_query->max_num_pages,
                'prev_text'    => '<i class="fa fa-arrow-circle-left"></i>',
                'next_text'    => '<i class="fa fa-arrow-circle-right"></i>',
                'type' => 'plain',
                'end_size'     => 3,
                'mid_size'     => 3,
            ) ) );
            ?>
        </div>
    </div>
<?php }
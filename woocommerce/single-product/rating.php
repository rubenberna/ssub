<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
    return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>
    <div class="woocommerce-product-rating">
        <ul class="list-inline-block review-rating">
            <li>
                <?php echo wc_get_rating_html( $average, $rating_count ); ?>
            </li>
            <?php if(0 < $rating_count ){ ?>
                <li>
                    <span><?php echo sprintf( _n( '%1$s rating', '%1$s ratings', $average, 'shb' ),  esc_html( $average )); ?></span>
                </li>
            <?php } ?>
            <li>
                <?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link add-review" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'shb' ), esc_html( $review_count )); ?>)</a><?php endif ?>
            </li>
        </ul>
    </div>
<?php endif; ?>
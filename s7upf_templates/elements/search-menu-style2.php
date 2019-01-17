<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 19/10/2017
 * Time: 4:34 CH
 */
?>
<div class="search-form3 live-search-<?php echo esc_attr($search_live);?>">
    <form class="search-form" action = "<?php echo esc_url(home_url('/')); ?>">
        <input  name="s" autocomplete="off" type="text" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search...','shb')?>">
        <?php if(!empty($search_order_by)){ ?>
            <input name="post_type" type="hidden" value="<?php echo esc_attr($search_order_by); ?>">
        <?php } ?>
        <div class="submit-form">
            <input value="" type="submit">
        </div>
        <?php if($search_live == 'true'){ ?>
            <div class="list-product-search">
                <div class="content-product-search">
                    <p class="text-center"><?php echo esc_html__('Please enter key search to display results','shb')?></p>
                </div>
            </div>
        <?php } ?>
    </form>
</div>

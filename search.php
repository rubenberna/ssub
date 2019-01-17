<?php
/**
 * The template for displaying search results pages.
 *
 * @package 7up-framework
 */

get_header();
$style_blog = s7upf_get_option('s7upf_style_blog_search');?>
    <div class="content-pages <?php if(empty($style_blog)) echo 'df-page-search'; else echo'page-search'; ?>">

        <div class="row">
            <?php s7upf_output_sidebar('left')?>
            <div class="<?php echo esc_attr(s7upf_get_main_class()); ?>">
                <?php if(have_posts()):?>
                    <?php if(empty($style_blog)){ ?>
                        <h1 class="page-title"><?php printf( esc_html__( 'Search results for: %s', 'shb' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php }else{ ?>
                        <h2 class="title30 mont-font page-title-search"><?php printf( esc_html__( 'Search results for: %s', 'shb' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    <?php } ?>
                    <div class="<?php if('style3'==$style_blog) echo 'list-blog-full'; else if('style2'== $style_blog) echo 'content-shop content-blog'; else echo 'df-content-blog'?>">
                        <?php if('style2'==$style_blog) echo '<div class="content-blog-sidebar"><div class="row">'; ?>
                        <?php if('style3'==$style_blog) echo '<div class="row">'; ?>
                        <?php while (have_posts()) :the_post();?>
                            <?php get_template_part('s7upf_templates/blog-content/content');?>
                        <?php endwhile;?>
                        <?php wp_reset_postdata();?>
                        <?php if('style3'==$style_blog) echo '</div>'; ?>
                        <?php if('style2'==$style_blog) echo '</div></div>'; ?>
                    </div>
                    <?php s7upf_paging_nav();?>
                <?php else : ?>
                    <?php get_template_part( 's7upf_templates/blog-content/content', 'none' ); ?>
                <?php endif;?>
            </div>
            <?php s7upf_output_sidebar('right')?>
        </div>
    </div>
<?php get_footer();
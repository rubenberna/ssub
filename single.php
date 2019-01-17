<?php
/**
 * The template for displaying all single posts.
 *
 * @package 7up-framework
 */
?>
<?php get_header();?>
    <div class="content-pages single-content s7up-blog-single"><!-- blog-single -->

        <div class="row">
            <?php s7upf_output_sidebar('left')?>
            <div class="<?php echo esc_attr(s7upf_get_main_class()); ?>">
                <div class="content-blog-detail">
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 's7upf_templates/single-content/content',get_post_format() );
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'shb' ),
                            'after'  => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) ); ?>
                        <?php $tags = get_the_tag_list('',',','');
                        if($tags) { ?>
                            <div class="single-tags text-center">
                                <label><?php esc_html_e('Tags: ','shb'); ?> </label>
                                <?php echo do_shortcode($tags);?>
                            </div>
                        <?php }

                        // box share
                        $enable_share = s7upf_get_option('enable_share_single');
                        if('on' ==$enable_share) { ?>
                            <div class="social-single text-center">

                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"
                                   class="inline-block  face" target="popup"><i class="fa fa-facebook"
                                                                                       aria-hidden="true"></i><?php esc_html_e('Share','shb')?></a>
                                <a href="http://twitter.com/share?url=<?php the_permalink() ?>" class="inline-block twitter"
                                   target="popup"><i class="fa fa-twitter" aria-hidden="true"></i><?php esc_html_e('Twitter','shb')?></a>
                                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"
                                   class="inline-block google" target="popup"><i class="fa fa-google-plus"
                                                                                 aria-hidden="true"></i><?php esc_html_e('Google+','shb')?></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=<?php echo get_the_excerpt() ?>"
                                   target="popup" class="inline-block linkedin"><i class="fa fa-linkedin"
                                                                                       aria-hidden="true"></i><?php esc_html_e('Linkedin','shb')?></a>

                                <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"
                                   class="inline-block pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i><?php esc_html_e('Pinterest','shb')?></a>

                            </div>
                            <?php
                        }

                        // Box control
                        $enable_post_control=s7upf_get_option('enable_post_control');
                        if('on' == $enable_post_control) {
                            $previous = get_previous_post();
                            $next = get_next_post();
                            if(get_previous_post() || get_next_post()) { ?>
                                <div class="control-post text-center">
                                    <div class="row">
                                        <?php if(!empty($previous)){ ?>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="<?php echo esc_url(get_preview_post_link($previous->ID))?>" class="prev-post"><?php esc_html_e('Previous Post','shb'); ?></a>
                                                <h3 class="post-title hidden-xs"><a href="<?php echo esc_url(get_preview_post_link($previous->ID))?>"><?php echo get_the_title($previous->ID); ?></a></h3>
                                            </div>
                                        <?php } if(!empty($next)){?>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <a href="<?php echo esc_url(get_preview_post_link($next->ID))?>" class="next-post"><?php esc_html_e('Next Post','shb'); ?></a>
                                                <h3 class="post-title hidden-xs"><a href="<?php echo esc_url(get_preview_post_link($next->ID))?>"><?php echo get_the_title($next->ID); ?></a></h3>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }

                        // Box related post
                        $enable_related_post=s7upf_get_option('enable_related_post');
                        $sidebar=s7upf_get_sidebar();

                        if('on' == $enable_related_post) {
                            $title_related_post=s7upf_get_value_by_id('title_related_post');
                            $number_related_post=s7upf_get_value_by_id('number_related_post');
                            $categories = get_the_category(get_the_ID());
                            $category_ids = array();
                            foreach($categories as $individual_category){
                                $category_ids[] = $individual_category->term_id;
                            }
                            $args = array(
                                    'category__in' =>$category_ids,
                                    'post__not_in' 		=> array(get_the_ID()),
                                    'posts_per_page'	=> (int)$number_related_post,

                            );

                            $related =new WP_Query($args);
                            $default_thumbnail = get_template_directory_uri().'/assets/images/no-thumb/img_270x180.png';
                            $image_size = s7upf_get_option('custom_size_image_blog_related');
                            $size_image = s7upf_get_size_image('270x180',$image_size); ?>
                            <div class="related-post">
                                <?php if(!empty($title_related_post)) { ?>
                                <h2 class="title18"><?php echo esc_attr($title_related_post); ?></h2>
                                <?php }
                                if($related->have_posts()){ ?>
                                    <div class="related-post-slider">
                                        <div class="wrap-item" data-pagination="false" data-autoheight="false" data-navigation="true" data-itemscustom="[[0,1],[480,2],[768,3],[980,<?php if($sidebar['position']!=='no') echo '3'; else echo '4'; ?>]]">
                                            <?php
                                            while ($related->have_posts()) {
                                                $related->the_post();
                                                // $get_post_format = get_post_format(get_the_ID());
                                              //  $count_post_format= s7upf_get_term_post_count_by_type("post-format-$get_post_format", 'post_format');
                                                ?>
                                                <div class="item-post-format">
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>" class="post-thumb-link">
                                                            <?php if(has_post_thumbnail()){
                                                                the_post_thumbnail($size_image);
                                                            }else if(!empty($default_thumbnail)){ ?>
                                                                <img src="<?php echo esc_url($default_thumbnail); ?>">
                                                                <?php
                                                            } ?>
                                                        </a>
                                                    </div>
                                                    <div class="post-info">

                                                        <h3 class="title14 post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                        <div class="post-comment-date clearfix">
                                                            <div class="post-date pull-left text-center">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                                <span><?php echo get_the_date(get_option('date_format')); ?></span>
                                                            </div>
                                                            <div class="post-comment pull-right text-center">
                                                                <i class="fa fa-comment" aria-hidden="true"></i>
                                                                <span><?php echo get_comments_number(); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } wp_reset_postdata();?>
                            </div>
                           <?php
                        }

                        // Box info author
                        $enable_info_author=s7upf_get_option('enable_info_author');
                        if('on' ==$enable_info_author) {
                            $desc_author = get_the_author_meta('description'); ?>
                            <div class="single-info-author table">
                                <div class="author-thumb">
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo get_avatar(get_current_user_id(), 100); ?>
                                    </a>
                                </div>
                                <div class="author-info">
                                    <div class="row">
                                        <div class="<?php echo (!empty($desc_author))?'col-md-3 col-sm-4':'col-md-12 col-sm-12 not-author-desc';?> col-xs-12">
                                            <div class="author-name">
                                                <span class=" silver"><?php echo esc_html__('Written By','shb')?></span>
                                                <h3 class="title18 font-bold text-uppercase"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></h3>
                                                <div href="#" class=" silver"><?php
                                                    $user_meta=get_userdata(get_current_user_id());
                                                    if(!empty($user_meta->roles[0])) echo esc_attr($user_meta->roles[0]);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if(!empty($desc_author)){?>
                                        <div class="col-md-9 col-sm-8 col-xs-12">
                                            <div class="author-desc">
                                                <?php echo esc_attr($desc_author); ?>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        if ( comments_open() || get_comments_number() ) { comments_template(); }
                    endwhile; ?>

                </div>
            </div>
            <?php s7upf_output_sidebar('right')?>
        </div>
    </div>
<?php get_footer();?>
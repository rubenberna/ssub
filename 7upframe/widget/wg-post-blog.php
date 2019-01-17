<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 27/09/2017
 * Time: 11:08 SA
 */
if(!class_exists('S7upf_BlogListPostsWidget'))
{
    class S7upf_BlogListPostsWidget extends WP_Widget {


        protected $default=array();

        static function _init()
        {
            add_action( 'widgets_init', array(__CLASS__,'_add_widget') );
        }

        static function _add_widget()
        {
            register_widget( 'S7upf_BlogListPostsWidget' );
        }

        function __construct() {
            // Instantiate the parent object
            parent::__construct( false, esc_html__('S7up Posts List','shb'),
                array( 'description' => esc_html__( 'Posts list', 'shb' ), ));

            $this->default=array(
                'title'=>esc_html__('List Posts','shb'),
                'posts_per_page'=>6,
                'style'=>'default',
                'category'=>'',
                'order'=>'desc',
                'order_by'=>'ID',
                'image_size'=>'',
            );
        }



        function widget( $args, $instance ) {
            // Widget output
            echo do_shortcode($args['before_widget']);
            if ( ! empty( $instance['title'] ) ) {
                echo do_shortcode($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }

            $instance=wp_parse_args($instance,$this->default);
            extract($instance);
            $args_post = array(
                'post_type'         => 'post',
                'posts_per_page'    => $posts_per_page,
                'orderby'           => $order_by,
                'order'             => $order,
            );
            if(!empty($category)){
                $args_post['tax_query'][]=array(
                    'taxonomy'=>'category',
                    'field'=>'id',
                    'terms'=> $category
                );
            }
            $html = '';
            $post_query = new WP_Query($args_post);
            if($post_query->have_posts()) {
                $html .=    ' <div class="list-recent-post">';
                while($post_query->have_posts()) {
                    $post_query->the_post();
                    $html .=    S7upf_Template::load_view('widgets/list-post',false,array('instance'=>$instance));
                }
                $html .='</div>';
            }

            wp_reset_postdata();
            echo do_shortcode($html);
            echo do_shortcode($args['after_widget']);
        }

        function update( $new_instance, $old_instance ) {

            // Save widget options
            $instance=array();
            $instance=wp_parse_args($instance,$this->default);
            $new_instance=wp_parse_args($new_instance,$instance);

            return $new_instance;
        }

        function form( $instance ) {
            // Output admin widget options form

            $instance=wp_parse_args($instance,$this->default);

            extract($instance);

            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:' ,'shb'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>"><?php esc_html_e( 'Post Number:' ,'shb'); ?></label>
                <input class="" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page' )); ?>" type="text" value="<?php echo esc_attr( $posts_per_page ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php esc_html_e( 'Order By:' ,'shb'); ?></label>

                <select id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>">
                    <?php echo s7upf_get_order_list($order_by,false,'option');?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'order' )); ?>"><?php esc_html_e( 'Order:' ,'shb'); ?></label>

                <select id="<?php echo esc_attr($this->get_field_id( 'order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order' )); ?>">
                    <option <?php selected('asc',$order) ?> value="asc">ASC</option>
                    <option <?php selected('desc',$order) ?> value="desc">DESC</option>

                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_html_e( 'Category:' ,'shb'); ?></label>

                <?php wp_dropdown_categories(array(
                    'selected'=>$category,
                    'show_option_all'=>esc_html__('--- Select ---','shb'),
                    'name'  =>$this->get_field_name( 'category' )
                )); ?>
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>"><?php esc_html_e( 'Custom image size:' ,'shb'); ?></label>
                <input class="" id="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'image_size' )); ?>" type="text" value="<?php echo esc_attr( $image_size ); ?>">
            </p>

            <?php
        }
    }

    S7upf_BlogListPostsWidget::_init();

}
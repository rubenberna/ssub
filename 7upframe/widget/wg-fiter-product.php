<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 18/11/2016
 * Time: 9:18 SA
 */
if ( !class_exists('WC_Product') ) {
    return;
}

if(!class_exists('S7upf_Widget_Product_filter')) {
    class S7upf_Widget_Product_filter extends WC_Widget
    {
        static function _init()
        {
            add_action('widgets_init', array(__CLASS__, '_add_widget'));
        }

        static function _add_widget()
        {
            register_widget('S7upf_Widget_Product_filter');
        }

        /**
         * Constructor.
         */
        public function __construct()
        {
            $this->widget_cssclass = 'woocommerce widget widget-filter mb-filer-selection';
            $this->widget_description = esc_html__('Shows a custom attribute in a widget which lets you narrow down the list of products when viewing product categories.', 'shb');
            $this->widget_id = 's7upf_product_filter';
            $this->widget_name = esc_html__('S7up Filter Products', 'shb');

            parent::__construct();
        }

        /**
         * Updates a particular instance of a widget.
         *
         * @see WP_Widget->update
         *
         * @param array $new_instance
         * @param array $old_instance
         *
         * @return array
         */
        public function update($new_instance, $old_instance)
        {
            $this->init_settings();

            return parent::update($new_instance, $old_instance);
        }

        public function form($instance)
        {
            $this->init_settings();

            parent::form($instance);
        }

        /**
         * Init settings after post types are registered.
         */
        public function init_settings()
        {
            $attribute_array = array();
            $attribute_taxonomies = wc_get_attribute_taxonomies();
            if ($attribute_taxonomies) {
                foreach ($attribute_taxonomies as $key=>$tax) {
                    if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) {
                        $attribute_array['s7upf_'.$tax->attribute_name]=array(
                            'type' => 'checkbox',
                            'std' => $tax->attribute_name,
                            'label' => $tax->attribute_label,
                        );
                    }
                }
            }
            $category_array = array();
            $tags = get_terms('product_cat');
            if(is_array($tags) && !empty($tags)){
                foreach ($tags as $tag) {
                    if(!empty($tag->slug))
                    $category_array['s7upf_cart_'.$tag->slug]=array(
                        'type' => 'checkbox',
                        'std' => $tag->slug,
                        'label' => $tag->name,
                    );
                }
            }
            $this->settings = array_merge(array(
                'title' => array(
                    'type' => 'text',
                    'std' => esc_html__('Filter by', 'shb'),
                    'label' => esc_html__('Title widget', 'shb')
                ),

                'filter_price' => array(
                    'type' => 'checkbox',
                    'std' => 1,
                    'label' => esc_html__('Show filter price', 'shb')
                ),

                'title_attribute' => array(
                    'type' => 's7uplabel',
                    'std' =>'',
                    'label' => esc_html__('Select attribute filter', 'shb')
                ),

            ),$attribute_array,
                array(
                    'title_attribute_hide' => array(
                        'type' => 's7uplabel',
                        'std' =>'',
                        'label' => esc_html__('Hide/show attribute label', 'shb')
                    ),
                    'hide_attribute_label' => array(
                        'type' => 'checkbox',
                        'std' => 0,
                        'label' => esc_html__('Hide attribute label', 'shb')
                    ),
                    'class_css' => array(
                        'type' => 'text',
                        'std' =>'',
                        'label' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'shb')
                    )
                )
            );
        }

        /**
         * Output widget.
         *
         * @see WP_Widget
         *
         * @param array $args
         * @param array $instance
         */
        public function widget($args, $instance)
        { global $post;

            if ( ! is_post_type_archive( 'product' ) && ! is_tax( get_object_taxonomies( 'product' ) ) &&  !strpos($post->post_content, '[s7upf_products')) {
                return;
            }
            echo wp_kses_post($args['before_widget']);

            $attribute_taxonomies = wc_get_attribute_taxonomies();
            extract($instance); ?>
            <div class="widget-content-filter-product <?php if(!empty($class_css)) echo esc_attr($class_css); ?>">
                <?php if($filter_price == 1){
                    global $wp;
                    if ( '' === get_option( 'permalink_structure' ) ) {
                        $form_action = remove_query_arg( array( 'page', 'paged' ), add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) );
                    } else {
                        $form_action = preg_replace( '%\/page/[0-9]+%', '', home_url( trailingslashit( $wp->request ) ) );
                    }
                   ?>

                    <div class="filter-price">
                        <?php
                        if ( ! empty( $instance['title'] ) ) {
                            echo wp_kses_post($args['before_title']) . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
                        }
                        $min_max = s7upf_get_price_arange();
                        if(!empty($_GET['min_price'])) $min = $_GET['min_price']; else $min = $min_max['min'];
                        if(!empty($_GET['max_price'])) $max = $_GET['max_price']; else $max = $min_max['max']; ?>
                        <form method="get" action="<?php echo esc_url($form_action)?>">

                            <div class="range-filter">
                                <div class="slider-range" data-currentmin="<?php echo esc_attr($min)?>" data-currentmax="<?php echo esc_attr($max)?>" data-pricemin="<?php echo esc_attr($min_max['min'])?>" data-pricemax="<?php echo esc_attr($min_max['max'])?>" data-currencysymbol="<?php echo esc_attr(get_woocommerce_currency_symbol()); ?>"></div>
                                <div class="amount"></div>
                                <button type="submit" class="btn-filter-price btn-filter"><?php echo esc_html__('Filter','shb'); ?></button>
                                <div class="input-filter">
                                    <input type="text" class="hide" id="min_price" name="min_price" value="<?php echo esc_attr($min)?>" />
                                    <input type="text" class="hide" id="max_price" name="max_price" value="<?php echo esc_attr($max)?>" />
                                </div>
                                <div>
                                    <?php echo wc_query_string_form_fields( null, array( 'min_price', 'max_price' ), '', true ); ?>
                                </div>
                            </div>
                        </form>
                    </div>

                <?php } ?>
                <div class="mb-filter-attribute">
                    <?php
                    if ($attribute_taxonomies) {
                        foreach ($attribute_taxonomies as $key=>$value) {
                            $taxonomy = isset( $instance['s7upf_'.$value->attribute_name] ) ?  $instance['s7upf_'.$value->attribute_name]  : '';

                            if($taxonomy == 1){ ?>
                                <?php
                                $terms = get_terms("pa_".$value->attribute_name);
                                $term_current = '';
                                if(isset($_GET['filter_'.$value->attribute_name])) $term_current = $_GET['filter_'.$value->attribute_name];

                                if($term_current != '') $term_current = explode(',', $term_current); else $term_current = array();
                                ?>
                                <div class="filter-attribute-content">
                                    <?php if($hide_attribute_label !== 1){?>
                                        <h3 class="widget-title title14 active title-attribute_label"><?php echo esc_attr($value->attribute_label); ?></h3>
                                        <?php
                                    }
                                    switch ($value->attribute_type){
                                        case 'image':?>
                                            <ul class="list-inline-block  style-attribute-type-<?php echo esc_attr($value->attribute_type); ?>">
                                                <?php foreach ($terms as $term){
                                                    $class_color =  $class_white_color = '';
                                                    $st_term_id =  $term->term_id;
                                                    $color_id = get_term_meta( $st_term_id,'', 'term-image', true);

                                                    if(is_object($term) and !empty($term->slug)){
                                                        if(in_array($term->slug, $term_current))
                                                            $active = 'active';
                                                        else $active = '';
                                                        if(!empty($color_id['image'][0])){

                                                            echo '<li><a class="'.esc_attr($class_white_color).' '.esc_attr($active).' '.esc_attr($class_color).'" href="'.esc_url(s7upf_get_key_url('filter_'.$value->attribute_name,$term->slug)).'">
                                                                       <img src="'.$color_id['image'][0].'">
                                                                   </a></li>';

                                                        }

                                                    }
                                                    ?>

                                                <?php } ?>
                                            </ul>
                                            <?php
                                            break;
                                        case 'color': ?>
                                            <ul class="list-inline-block filter-attr list-attr-color style-attribute-type-<?php echo esc_attr($value->attribute_type); ?>">
                                                <?php foreach ($terms as $term){
                                                    $class_color =  $class_white_color = '';
                                                    $st_term_id =  $term->term_id;
                                                    $color_id = get_term_meta( $st_term_id,'', 'term-color', true);

                                                    if(is_object($term) and !empty($term->slug)){
                                                        if(in_array($term->slug, $term_current))
                                                            $active = 'active';
                                                        else $active = '';
                                                        if(!empty($color_id['color'][0])){
                                                            $white_color = array('#fff','#ffffff');

                                                            if(in_array(strtolower($color_id['color'][0]), $white_color)) $class_white_color = 'border';
                                                            $class_color = S7upf_Assets::build_css('background:'.$color_id['color'][0].';');
                                                            echo '<li><a class="'.esc_attr($class_white_color).' '.esc_attr($active).' '.esc_attr($class_color).'" href="'.esc_url(s7upf_get_key_url('filter_'.$value->attribute_name,$term->slug)).'"></a></li>';

                                                        }

                                                    }
                                                    ?>

                                                <?php } ?>
                                            </ul>
                                            <?php
                                            break;
                                        case 'label': ?>
                                            <ul class="list-inline-block style-attribute-type-<?php echo esc_attr($value->attribute_type); ?>">
                                                <?php foreach ($terms as $term){
                                                    $st_term_id =  $term->term_id;
                                                    $term_label = get_term_meta( $st_term_id,'', 'term-label', true);

                                                    if(is_object($term) and !empty($term->slug)){
                                                        if(in_array($term->slug, $term_current))
                                                            $active = 'active';
                                                        else $active = '';
                                                        if(!empty($term_label['label'][0])){

                                                            echo '<li class="'.esc_attr($active).'"><a  href="'.esc_url(s7upf_get_key_url('filter_'.$value->attribute_name,$term->slug)).'">
                                                                       '.$term_label['label'][0].'
                                                                   </a></li>';

                                                        }

                                                    }
                                                    ?>

                                                <?php } ?>
                                            </ul>
                                            <?php
                                            break;
                                        default :  ?>
                                            <ul class="list-none  filter-default style-attribute-type-default">
                                                <?php foreach ($terms as $term){
                                                    if(is_object($term)){
                                                        if(in_array($term->slug, $term_current))
                                                            $active = 'active';
                                                        else $active = '';
                                                        if(!empty($term->name)){

                                                            echo '<li><a class="'.esc_attr($active).'" href="'.esc_url(s7upf_get_key_url('filter_'.$value->attribute_name,$term->slug)).'">
                                                                       '.$term->name.'
                                                                   <span class="silver">('.$term->count.')</span></a></li>';

                                                        }

                                                    }
                                                    ?>

                                                <?php } ?>
                                            </ul>
                                            <?php
                                            break;
                                    }
                                    ?>

                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>

            <?php
            echo wp_kses_post($args['after_widget']);
        }


    }
    S7upf_Widget_Product_filter::_init();
}
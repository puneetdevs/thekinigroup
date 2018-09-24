<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    if( ! function_exists( 'pofo_meta_prefix' ) ) :
        function pofo_meta_prefix() {

            $meta_prefix = '';

            $pofodetails_theme_update_meta = get_option( 'pofodetails_theme_update_meta' );
            if( $pofodetails_theme_update_meta == '1' ) {

                $meta_prefix = '_';
            }

            return $meta_prefix;
        }
    endif;

    if( ! function_exists( 'pofo_option' ) ) :
        function pofo_option( $option, $default_value ) {
            global $post;

            $pofo_option_value = '';
            if( is_404() ){
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }else{
                if( !( is_category() || is_archive() || is_author() || is_tag() || is_search() || is_home() ) ){

                    // Meta Prefix
                    $meta_prefix = pofo_meta_prefix();
                    $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
                    
                    if( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                        $pofo_option_value = $value;
                    } else {
                        $pofo_option_value = get_theme_mod( $option, $default_value );
                    }
                }else{
                    $pofo_option_value = get_theme_mod( $option, $default_value );
                }
            }
            return $pofo_option_value;
        }
    endif;

    /* Check For Category Title */
    if( ! function_exists( 'pofo_category_title_option' ) ) :
        function pofo_category_title_option( $option, $default_value ) {
            
            $pofo_option_value = '';
            if( is_tax('portfolio-category') || is_tax('portfolio-tags') || is_tax('product_cat') || is_tax('product_tag') ){
                $pofo_t_id = get_queried_object()->term_id;
            }else{
                $pofo_t_id = get_query_var('cat');
            }
            $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
            if( strlen( $pofo_term_meta[$option] ) > 0 && ( $pofo_term_meta[$option] != 'default' ) && ( is_category() || is_tax('portfolio-category') || is_tax('product_cat') ) && !( is_author() || is_tag() || is_search() || is_tax('portfolio-tags') || is_tax('product_tag') ) ) {
                $pofo_option_value = $pofo_term_meta[$option];
            } else {
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }
            return $pofo_option_value;
        }
    endif;

    if( ! function_exists( 'pofo_post_meta' ) ) :
        function pofo_post_meta( $option ) {
            global $post;

            // Meta Prefix
            $meta_prefix = pofo_meta_prefix();
            $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
            return $value;
        }
    endif;

    if ( ! function_exists( 'pofo_theme_active_licence' ) ) :
        function pofo_theme_active_licence( $value ='no' ) {
            $pofo_option_name = 'pofo_theme_active' ;
            if ( get_option( $pofo_option_name ) !== false ) {
                update_option( $pofo_option_name, $value );
            } else {
                $deprecated = null;
                $autoload = 'no';
                add_option( $pofo_option_name, $value, $deprecated, $autoload );
            }
        }
    endif;

    /* For Image Alt Text */
    if ( ! function_exists( 'pofo_option_image_alt' ) ) :
        function pofo_option_image_alt( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_alt = get_theme_mod( 'pofo_image_alt', '1' );

            if( $attachment_id && ( $pofo_image_alt == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
                );
                
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Image Title Text */
    if ( ! function_exists( 'pofo_option_image_title' ) ) :
        function pofo_option_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title is on / off */
            $pofo_image_title = get_theme_mod( 'pofo_image_title', '0' );
            
            if( $attachment_id && ( $pofo_image_title == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );
 
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Title */
    if ( ! function_exists( 'pofo_option_lightbox_image_title' ) ) :
        function pofo_option_lightbox_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title for lightbox popup */
            $pofo_image_title_lightbox_popup = get_theme_mod( 'pofo_image_title_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_title_lightbox_popup == 1 ) ){

                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );

                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Caption */
    if ( ! function_exists( 'pofo_option_lightbox_image_caption' ) ) :
        function pofo_option_lightbox_image_caption( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_caption_lightbox_popup = get_theme_mod( 'pofo_image_caption_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_caption_lightbox_popup == 1 ) ){
                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'caption' =>  esc_attr( $attachment->post_excerpt ),
                );
                
                return $pofo_image_meta;
                
            }else{
                return;
            }
        }
    endif;

    if ( ! function_exists( 'pofo_is_theme_licence_active' ) ) :
        function pofo_is_theme_licence_active() {
            $pofo_theme_active = get_option( 'pofo_theme_active' );
            if( $pofo_theme_active == 'yes' ){
                return true;
            } else {
                return false;
            }
        }
    endif;

    /* page title option for individual pages*/
    if ( ! function_exists( 'pofo_breadcrumb_display' ) ) {
        function pofo_breadcrumb_display() {

            if( class_exists( 'WooCommerce' ) && ( is_product() || is_product_category() || is_tax('product_brand') || is_shop() ) ) {// if WooCommerce plugin is activated and WooCommerce category, brand, shop page

                ob_start();
                    do_action('pofo_woocommerce_breadcrumb');
                return ob_get_clean();

            } elseif (class_exists('Pofo_Breadcrumb_Navigation')) {

                $pofo_breadcrumb = new Pofo_Breadcrumb_Navigation;
                $pofo_breadcrumb->opt['static_frontpage'] = false;
                $pofo_breadcrumb->opt['url_blog'] = '';
                $pofo_breadcrumb->opt['title_blog'] = esc_html( 'Home', 'pofo' );
                $pofo_breadcrumb->opt['title_home'] = esc_html( 'Home', 'pofo' );
                $pofo_breadcrumb->opt['separator'] = '';
                $pofo_breadcrumb->opt['tag_page_prefix'] = '';
                $pofo_breadcrumb->opt['singleblogpost_category_display'] = false;

                return $pofo_breadcrumb->display();
            }
        }    
    }

    /* Filter For custom body class */
    if( ! function_exists( 'pofo_multisite_body_classes' ) ) :
        function pofo_multisite_body_classes($classes) {
            $pofo_header_layout = pofo_option( 'pofo_header_type', 'headertype1' );
            if( $pofo_header_layout == 'headertype4' ) {
                $classes[] = 'left-nav-sidebar';
            }
            return $classes;
        }
    endif;
    add_filter('body_class', 'pofo_multisite_body_classes');

    /* Filter For the_post_thumbnail function attributes */
    if( ! function_exists( 'pofo_filter_the_post_thumbnail_atts' ) ) :
        function pofo_filter_the_post_thumbnail_atts( $atts, $attachment ) {

            /* Check image alt is on / off */
            $pofo_image_alt = get_theme_mod( 'pofo_image_alt', '1' );
            $pofo_image_alt_text = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
            /* Check image title is on / off */
            $pofo_image_title = get_theme_mod( 'pofo_image_title', '0' );

            /* For image alt attribute */
            if( $pofo_image_alt == 1 ){
                $atts['alt'] = $pofo_image_alt_text;
            } else {
                $atts['alt'] = '';
            }

            /* For image title attribute */
            if( $pofo_image_title == 1 && $attachment->post_title ){
                $atts['title'] = esc_attr( $attachment->post_title );
            }

            return $atts;
        }
    endif;
    add_filter( 'wp_get_attachment_image_attributes', 'pofo_filter_the_post_thumbnail_atts', 10, 2 );

    if( ! function_exists( 'pofo_post_category' ) ) :
        function pofo_post_category( $id, $textcolor = 'text-dark-gray', $count = '10' ) {

            if( $id == '' ) {
                return;
            }

            $count = 10;
            $textcolor = 'text-dark-gray';
            $post_cat = array();
            $post_category = '';
            if( 'post' === get_post_type() ) {
                $categories = get_the_category($id);
                $category_counter = 0;
                foreach( $categories as $k => $cat ) {
                    if( $count == $category_counter )
                        break;
                    $cat_link = get_category_link( $cat->cat_ID );
                    $post_cat[]='<a rel="category tag" class="'.esc_attr( $textcolor ).'" href="'.esc_url( $cat_link ).'">'.esc_attr( $cat->name ).'</a>';
                    $category_counter++;
                }
                $post_category = implode(", ",$post_cat);
            }
            if( 'portfolio' === get_post_type() ) {
                $categories = get_the_terms( get_the_ID(), 'portfolio-category' );
                $category_counter = 0;
                if( !empty($categories) ){
                    foreach( $categories as $k => $cat ) {
                        if( $count == $category_counter )
                            break;
                        $cat_link = get_term_link( $cat );
                        $post_cat[]='<a rel="category tag" class="'.esc_attr( $textcolor ).'" href="'.esc_url( $cat_link ).'">'.esc_attr( $cat->name ).'</a>';
                        $category_counter++;
                    }
                }
                $post_category = implode(", ",$post_cat);
            }
            return $post_category;
        }
    endif;

    if( ! function_exists( 'pofo_category_option' ) ) :
        function pofo_category_option( $option, $default_value ) {
            
            $pofo_option_value = '';
            $pofo_t_id = get_query_var('cat');
            $pofo_term_meta = get_option( "taxonomy_$pofo_t_id" );
            
            if( strlen( $pofo_term_meta[$option] ) > 0 && ( $pofo_term_meta[$option] != 'default' ) ) {
                $pofo_option_value = $pofo_term_meta[$option];
            } else {
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }
            return $pofo_option_value;
        }
    endif;

    if ( ! function_exists( 'pofo_theme_activate' ) ) :
        function pofo_theme_activate() {
            global $pagenow;

            if( is_admin() && 'themes.php' == $pagenow && isset( $_GET[ 'activated' ] ) ) {
                wp_redirect( admin_url( 'themes.php?page=pofo-licence-activation' ) );
                exit;
            }

        }
    endif;
    add_action( 'after_setup_theme', 'pofo_theme_activate', 11 );

    /* For WordPress4.4 move comment textarea bottom */
    if( ! function_exists( 'pofo_move_comment_field_to_bottom' ) ) :
        function pofo_move_comment_field_to_bottom( $fields ) {
            $comment_field = $fields['comment'];
            unset( $fields['comment'] );
            $fields['comment'] = $comment_field;
            return $fields;
        }
    endif;
    add_filter( 'comment_form_fields', 'pofo_move_comment_field_to_bottom' );

    if( ! function_exists( 'pofo_admin_login_logo' ) ) :
        /* To change admin panel logo. */
        function pofo_admin_login_logo() { 
            $pofo_site_logo = get_theme_mod( 'pofo_logo', '' );
            if( esc_url( $pofo_site_logo ) ):
            ?>
            <style type="text/css">
                .login h1 a { 
                    background-image: url(<?php echo esc_url( $pofo_site_logo );?>  ) !important;
                    background-size: contain !important;
                    height: 31px !important;
                    width: 100% !important;
                }
            </style>
            <?php 
            endif;
        }
    endif;
    add_action( 'login_enqueue_scripts', 'pofo_admin_login_logo' );

    // To Change Admin Panel Logo Url.
    if( ! function_exists( 'pofo_login_logo_url' ) ) :
        function pofo_login_logo_url() {
            return home_url('/');
        }
    endif;
    add_filter( 'login_headerurl', 'pofo_login_logo_url' );

    // To Change Admin Panel Logo Title.
    if( ! function_exists( 'pofo_login_logo_url_title' ) ) :
        function pofo_login_logo_url_title() {
            $pofo_text = get_bloginfo( 'name' ).' | '.get_bloginfo( 'description' );
            return $pofo_text;
        }
    endif;
    add_filter( 'login_headertitle', 'pofo_login_logo_url_title' );

    if ( ! function_exists( 'pofo_random_string' ) ) :
        function pofo_random_string( $length = 20 ) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $len = strlen( $characters );
            $str = '';
            for ( $i = 0; $i < $length; $i ++ ) {
                $str .= $characters[ rand( 0, $len - 1 ) ];
            }

            return $str;
        }
    endif;

    if ( ! function_exists( 'pofo_get_host' ) ) :
        function pofo_get_host() {
            $pofo_api_host = 'http://api.themezaa.com';
            return $pofo_api_host;
        }
    endif;

    if( class_exists('WP_Customize_Control') ) :

        /* For Animation */
        if( !class_exists('Pofo_Customize_Animation_Control') ) {
            class Pofo_Customize_Animation_Control extends WP_Customize_Control {

                public $type = 'pofo_animation_style';

                /* Render the control's content. */
                public function render_content() {

                    // Hackily add in the data link parameter.
                    $animation_style = pofo_animation_style_customizer();

                    if(!empty($animation_style)) {
                        ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $animation_style as $value => $label ){
                                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                                }
                                ?>
                            </select>
                        </label>
                        <?php
                    }
                }
            }
        }

        /* For Image Srcset */
        if( !class_exists('Pofo_Customize_Image_SRCSET_Control') ) {
            class Pofo_Customize_Image_SRCSET_Control extends WP_Customize_Control {

                public $type = 'pofo_image_srcset';

                /* Render the control's content. */
                public function render_content() {

                    // Hackily add in the data link parameter.
                    $pofo_srcset = pofo_get_intermediate_image_sizes();

                    if(!empty($pofo_srcset)) {
                        ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $pofo_srcset as $value => $label ){
                                    echo '<option value="' . esc_attr( $label ) . '"' . selected( $this->value(), $value, false ) . '>';
                                        $pofo_srcset_image_data = pofo_get_image_size( $label );
                                        $width = ( $pofo_srcset_image_data['width'] == 0 ) ? esc_html( 'Auto', 'pofo' ) : $pofo_srcset_image_data['width'].'px';
                                        $height = ( $pofo_srcset_image_data['height'] == 0 ) ? esc_html( 'Auto', 'pofo' ) : $pofo_srcset_image_data['height'].'px';
                                        if( $label == 'full' ) {
                                            echo esc_html__( 'Original Full Size', 'pofo' );
                                        } else {
                                            echo ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                                        }
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </label>
                        <?php
                    }
                }
            }
        }

        if( !class_exists('Pofo_Customize_Preview_Image_Control') ) {
            class Pofo_Customize_Preview_Image_Control extends WP_Customize_Control {
                public $pofo_img  =  array();
                public $pofo_columns  =  '4';
                public $type = 'pofo_preview_image';

                public function render_content() {

                    if ( empty( $this->choices ) )
                        return;

                    
                    $name = '_customize-radio-' . $this->id;

                    if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif;
                    ?>
                    <ul class="pofo-image-select pofo-preview-image-column-<?php echo esc_html( $this->pofo_columns ) ?>">
                        <?php
                            $pofo_img_counter = 0;
                            foreach ( $this->choices as $value => $label ) :
                                $active_class = ( $this->value() == $value ) ? ' active': '';
                        ?>
                                <li class="pofo-preview-image<?php echo esc_attr( $active_class ); ?>">
                                    <label>
                                        <?php if ( ! empty( $this->pofo_img[$pofo_img_counter] ) ) : ?>
                                            <img alt="<?php echo esc_html( $label ); ?>" src="<?php echo esc_url( $this->pofo_img[$pofo_img_counter] ); ?>">
                                        <?php else :
                                            echo esc_html( $label );
                                        endif; ?>

                                        <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                                    </label>
                                </li>
                        <?php
                                $pofo_img_counter++;
                            endforeach;
                        ?>
                    </ul>
                    <?php
                }
            }
        }

        if( !class_exists('Pofo_Customize_switch_Control') ) {
            class Pofo_Customize_switch_Control extends WP_Customize_Control {

                public $type = 'pofo_switch';
             
                public function render_content() {

                    if ( empty( $this->choices ) )
                        return;

                    $name = '_customize-radio-' . $this->id;

                    if ( ! empty( $this->label ) ) : ?>
                        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                    <?php endif;
                    ?>
                    <ul class="pofo-switch-option">
                    <?php
                        $pofo_switch_class = '';
                        foreach ( $this->choices as $value => $label ) :
                            $pofo_switch_class = ( $value == 1 ) ? 'pofo-switch-option switch-option-enable' : 'pofo-switch-option switch-option-disable';
                            $active_class = ( $this->value() == $value ) ? ' active': '';
                    ?>
                            <li class="<?php echo esc_html($pofo_switch_class); ?><?php echo esc_attr( $active_class ); ?>">
                                <label>
                                    <?php echo esc_html( $label ); ?>
                                    <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                                </label>
                            </li>
                    <?php
                        endforeach;
                    ?>
                    </ul>
                    <?php
                }
            }
        }

        if( !class_exists('Pofo_Customize_Separator_Control') ) {
            class Pofo_Customize_Separator_Control extends WP_Customize_Control {

                public $type = 'pofo_separator';
             
                public function render_content() {

                    if ( ! empty( $this->label ) ) :
                    ?>
                    <label><h2><?php echo esc_html( $this->label ); ?></h2></label>
                    <?php
                    endif;
                    if ( ! empty( $this->description ) ) : ?>
                        <div class="description customize-section-description"><?php echo esc_html( $this->description ); ?></div>
                    <?php endif;
                }
            }
        }

        // Customize Control For Menu List

        if( !class_exists( 'Pofo_Customize_Menu_Control' ) ) {
            class Pofo_Customize_Menu_Control extends WP_Customize_Control {
                
                public $type = 'pofo_menu';

                private $menus = false;
                public function __construct($manager, $id, $args = array(), $options = array()) {
                    $this->menus = wp_get_nav_menus($options);
                    parent::__construct( $manager, $id, $args );
                }
                /**
                 * Render the content on the theme customizer page
                */
                public function render_content() {
                    if ( empty( $this->choices ) )
                        return;

                    if( !empty( $this->menus ) ) {
                        ?>
                        <label>
                            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                            <select <?php $this->link(); ?>>
                            <?php
                                foreach ( $this->choices as $value => $label )
                                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
                                ?>
                            <?php foreach ( $this->menus as $menu ) { ?>
                                <option value="<?php echo esc_attr( $menu->slug ); ?>" <?php echo selected($this->value(), $menu->slug, false); ?>><?php echo esc_html( $menu->name ); ?></option>
                            <?php } ?>
                            </select>
                        </label>
                        <?php
                    }
                }

            }

        }

    endif;

        
    if( ! function_exists( 'pofo_posts_link_attributes' ) ) :
        function pofo_posts_link_attributes() {
            return 'class="alt-font text-small"';
        }
    endif;
    add_filter('next_posts_link_attributes', 'pofo_posts_link_attributes');
    add_filter('previous_posts_link_attributes', 'pofo_posts_link_attributes');

    if( ! function_exists( 'pofo_categories_postcount_filter' ) ) :
        function pofo_categories_postcount_filter ($variable) {
           $variable = str_replace('(', '<span>', $variable);
           $variable = str_replace(')', '</span>', $variable);
           $variable = str_replace('cat-item ', 'cat-item category-list ', $variable); 
           return $variable;
        }
    endif;
    add_filter('wp_list_categories','pofo_categories_postcount_filter');

    add_filter('get_archives_link', 'pofo_archive_count_no_brackets');
    if ( ! function_exists( 'pofo_archive_count_no_brackets' ) ) {
        function pofo_archive_count_no_brackets($links) {
            $links = str_replace('(', '<span> ', $links);
            $links = str_replace(')', '</span>', $links);
            return $links;
        }
    }

    // Get the Post Tags
    if( ! function_exists( 'pofo_single_post_meta_tag' ) ) :
        function pofo_single_post_meta_tag() {
        if( 'post' == get_post_type() ) {
                $tags_list = get_the_tag_list( '', _x( '', 'Used between list items, there is a space after the comma.', 'pofo' ) );
                if( $tags_list ) {
                    printf( '<div class="col-md-6 col-sm-12 col-xs-12 sm-text-center tag-cloud margin-20px-bottom">%1$s %2$s</div>',
                        '',
                        $tags_list
                    );
                }
            }
        }
    endif;

    if ( ! function_exists( 'pofo_generate_theme_licence_activation_url' ) ) :
        function pofo_generate_theme_licence_activation_url() {
                
            $pofo_licence_api = pofo_get_host();

            $pofo_token = sha1( current_time( 'timestamp' ) . '|' . pofo_random_string(20) );
            $pofo_home_url = esc_url( home_url( '/' ) );

            $pofo_redirect = admin_url( 'themes.php?page=pofo-licence-activation' );
                        
            if ( false === ( $pofo_token == get_transient( 'pofo_licence_token' ) ) ) {
                set_transient( 'pofo_licence_token', $pofo_token, HOUR_IN_SECONDS );
            }
            $pofo_get_transient = get_transient( 'pofo_licence_token' );

            return sprintf( '%s?token=%s&url=%s&redirect=%s&itemid=%s', $pofo_licence_api.'/activate-license/', $pofo_get_transient, $pofo_home_url, $pofo_redirect, '21023319' );
        }
    endif;

    /* Custom comment callback */
    if( ! function_exists( 'pofo_comment_callback' ) ) :
        function pofo_comment_callback( $comment, $args, $depth ) {
            if( 'div' === $args['style'] ) {
                $tag       = 'div';
                $add_below = 'comment';
            } else {
                $tag       = 'li';
                $add_below = 'div-comment';
            }
            ?>
            <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? 'post-comment' : 'parent post-comment' ) ?> id="comment-<?php comment_ID() ?>">
            <?php if( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="display-table width-100">
            <?php endif; ?>
            <?php if( get_avatar( $comment, $args['avatar_size'] ) ){?>
            <div class="display-table-cell width-100px xs-width-50px text-center vertical-align-top xs-display-block xs-margin-10px-bottom">
                <?php if( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            </div>
            <?php } ?>
            <div class="padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <a href="<?php echo get_comment_author_url( $comment ) ?>" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 text-small"><?php echo get_comment_author() ?></a>
                <p class="text-small text-uppercase margin-10px-bottom">
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="text-medium-gray">
                    <?php
                    /* translators: 1: date, 2: time */
                    printf( esc_html__('%1$s, %2$s', 'pofo'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'pofo' ), '  ', '' );
                    ?>
                </p>
                <div class="comment-text">
                <?php if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) { 
                    }else{
                        comment_text(); 
                    }
                ?>
            </div>

            </div>
            
            <?php if( $comment->comment_approved == '0' ) : ?>
                 <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'pofo' ); ?></em>
                  <br />
            <?php endif; ?>
            
            <?php if( 'div' != $args['style'] ) : ?>
            </div>
            <?php endif; ?>
            <?php
        }
    endif;

    // filter to replace class on reply link ( comment_reply_link ) function.
    add_filter('comment_reply_link', 'pofo_replace_reply_link_class');
    if( ! function_exists( 'pofo_replace_reply_link_class' ) ) :
        function pofo_replace_reply_link_class( $class ) {
            $class = str_replace( "class='comment-reply-link", "class='comment-reply-link inner-link btn-reply text-uppercase alt-font text-extra-dark-gray", $class );
            return $class;
        }
    endif;

    if( ! function_exists( 'pofo_remove_wpautop' ) ) :
      function pofo_remove_wpautop( $content, $force_br = true ) {
        if ( $force_br ) {
          $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
        }
        return do_shortcode( shortcode_unautop( $content ) );
      }
    endif;

    /* To get Register Sidebar list in metabox */
    if( ! function_exists( 'pofo_register_sidebar_array' ) ) :
        function pofo_register_sidebar_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array['default'] = esc_html__( 'Default', 'pofo' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    /* To get Register Sidebar list in Customize */
    if( ! function_exists( 'pofo_register_sidebar_customizer_array' ) ) :
        function pofo_register_sidebar_customizer_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array[''] = esc_html__( 'No Sidebar', 'pofo' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    if ( ! function_exists( 'pofo_plugin_install_url' ) ) :
        function pofo_plugin_install_url() {
            $pofo_url = '';
            $pofo_licence_api = pofo_get_host();
            $pofo_theme_detail = wp_get_theme();
            $pofo_version = $pofo_theme_detail->get( 'Version' );
            $pofo_url = esc_url( $pofo_licence_api.'/pofo/plugins/'.$pofo_version );
            return $pofo_url;
        }
    endif;

    /* Generate custom css base on customizer settings */
    if( ! function_exists( 'pofo_generate_custom_css' ) ) :

        function pofo_generate_custom_css() {
            wp_register_style( 'pofo-style', get_stylesheet_uri(), null, POFO_THEME_VERSION );
            wp_register_style( 'pofo-responsive-style', POFO_THEME_CSS_URI . '/responsive.css', null, POFO_THEME_VERSION );

            wp_enqueue_style( 'pofo-style' );
            wp_enqueue_style( 'pofo-responsive-style' );

            $output_css = '';
            ob_start();
                    /* Include navigation css */
                    require_once get_template_directory() . '/lib/customizer/customizer-output/custom-theme-css.php';
                    require_once get_template_directory() . '/lib/customizer/customizer-output/custom-css.php';
                    require_once get_template_directory() . '/lib/customizer/customizer-output/header-style-one-css.php';
                    require_once get_template_directory() . '/lib/customizer/customizer-output/header-style-two-css.php';
                    require_once get_template_directory() . '/lib/customizer/customizer-output/header-style-three-css.php';
                    require_once get_template_directory() . '/lib/customizer/customizer-output/header-style-four-css.php';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            wp_add_inline_style( 'pofo-responsive-style', $output_css );
        }

    endif;
    add_action( 'wp_enqueue_scripts', 'pofo_generate_custom_css', 999 );

    if( ! function_exists( 'pofo_register_main_style' ) ) :
        function pofo_register_main_style() {

            wp_register_style( 'pofo-style', get_stylesheet_uri(), null, POFO_THEME_VERSION );
            wp_register_style( 'pofo-responsive-style', POFO_THEME_CSS_URI . '/responsive.css', null, POFO_THEME_VERSION );

            wp_enqueue_style( 'pofo-style' );
            wp_enqueue_style( 'pofo-responsive-style' );

            /* Check Header Image */
            $header_image = get_header_image();

            if ( ! empty( $header_image ) ) {
                $pofo_header_image_css = ".header-img { background-image: url( ".esc_url( $header_image )." ); background-repeat: no-repeat !important; background-position: 50% 50% !important; -webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important; background-size: cover !important; }";
                wp_add_inline_style( 'pofo-responsive-style', $pofo_header_image_css );
            }
            
        }
    endif;
    add_action( 'wp_enqueue_scripts', 'pofo_register_main_style', 100 );

    /* Set max value for excerpt so our custom function */
    if( ! function_exists( 'pofo_excerpt_length' ) ) :
        function pofo_excerpt_length( $length ) {
            return 200;
        }
    endif;
    add_filter( 'excerpt_length', 'pofo_excerpt_length' );

    /* Set read more for excerpt so our custom function */
    if( ! function_exists( 'pofo_excerpt_more' ) ) :
        function pofo_excerpt_more( $more ) {
            return '...';
        }
    endif;
    add_filter( 'excerpt_more', 'pofo_excerpt_more' );

    /* Allow to add extra style tags in sanitize functions */
    if( ! function_exists( 'pofo_sanitize_safe_style_css' ) ) :
        function pofo_sanitize_safe_style_css ( $styles ) {
            $styles[] = 'opacity';
            return $styles;
        }
    endif;
    add_filter( 'safe_style_css', 'pofo_sanitize_safe_style_css' );

    /* Custom sanitize function for Validate the multiple checkbox field. */
    if( ! function_exists( 'pofo_sanitize_multiple_checkbox' ) ) :
        function pofo_sanitize_multiple_checkbox( $values ) {
            $pofo_multi_values = ! is_array( $values ) ? explode( ',', $values ) : $values;
            return !empty( $pofo_multi_values ) ? array_map( 'sanitize_text_field', $pofo_multi_values ) : array();
        }
    endif;

    /* Get the attachment ID from the image URL */
    if ( ! function_exists('pofo_get_image_id_by_url') ) :
        function pofo_get_image_id_by_url( $image_url ) {
            global $wpdb;
            $image = '';
            $attachment = false;
            if ( '' == $image_url )
                    return;

            $upload_dir_paths = wp_upload_dir();

            if ( false !== strpos( $image_url, '/demo-images/' ) ) {

                $pofo_theme = wp_get_theme();

                // Remove the upload path base directory from the attachment URL
                $image_url = str_replace( $pofo_theme->get( 'ThemeURI' ).'/demo-images' , $upload_dir_paths['baseurl'], $image_url );

                $attachment = $wpdb->get_var( $wpdb->prepare( "SELECT pofoposts.ID FROM $wpdb->posts pofoposts, $wpdb->postmeta pofopostmeta WHERE pofoposts.ID = pofopostmeta.post_id AND pofopostmeta.meta_key = '_wp_attached_file' AND pofopostmeta.meta_value = '%s' AND pofoposts.post_type = 'attachment'", $image_url ) );
            }
            
            if ( false !== strpos( $image_url, $upload_dir_paths['baseurl'] ) ) {

                // Remove the upload path base directory from the attachment URL
                $image_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $image_url );

                $attachment = $wpdb->get_var( $wpdb->prepare( "SELECT pofoposts.ID FROM $wpdb->posts pofoposts, $wpdb->postmeta pofopostmeta WHERE pofoposts.ID = pofopostmeta.post_id AND pofopostmeta.meta_key = '_wp_attached_file' AND pofopostmeta.meta_value = '%s' AND pofoposts.post_type = 'attachment'", $image_url ) );
            }
            return $attachment;
        }
    endif; 

    if ( ! function_exists( 'pofo_footer_sidebar_style' ) ) :
        function pofo_footer_sidebar_style( $sidebar = '' ) {
            if( empty( $sidebar ) )
                return;

            if( is_active_sidebar( $sidebar ) ) {

                do_action( 'pofo_footer_sidebar_style_before' );
                dynamic_sidebar( $sidebar );
                do_action( 'pofo_footer_sidebar_style_after' );
            }
        }
    endif;

    if ( ! function_exists( 'pofo_page_sidebar_style' ) ) :
        function pofo_page_sidebar_style( $sidebar = '' ){
            if( empty( $sidebar ) )
                return;

            if( is_active_sidebar( $sidebar ) ) {

                do_action( 'pofo_page_sidebar_style_before' );
                dynamic_sidebar( $sidebar );
                do_action( 'pofo_page_sidebar_style_after' );
            }
        }
    endif;

    if ( ! function_exists('pofo_deregister_section') ) :
        function pofo_deregister_section( $wp_customize ) {
            // Remove the section for colors.
            $wp_customize -> remove_section( 'colors' );
            $wp_customize -> remove_control( 'display_header_text' );
            // Change site icon section.
            $wp_customize->get_control( 'site_icon' )->section = 'pofo_add_logo_section';
        }
    endif;
    add_action( 'customize_register', 'pofo_deregister_section', 999 );

    if ( ! function_exists( 'pofo_get_the_excerpt_theme' ) ) {
        function pofo_get_the_excerpt_theme($length)
        {
            return pofo_Excerpt::pofo_get_by_length($length);
        }
    }

    if ( ! function_exists( 'pofo_get_the_post_content' ) ) {
        function pofo_get_the_post_content()
        {
            return apply_filters( 'the_content', get_the_content() );
        }
    }

    // Remove issues with prefetching adding extra views
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

    if( ! function_exists( 'pofo_get_intermediate_image_sizes' ) ) :
        function pofo_get_intermediate_image_sizes() {
            global $wp_version;
            $image_sizes = array('full', 'thumbnail', 'medium', 'medium_large', 'large'); // Standard sizes
            if( $wp_version >= '4.7.0'){
                $_wp_additional_image_sizes = wp_get_additional_image_sizes();
                if ( ! empty( $_wp_additional_image_sizes ) ) {
                    $image_sizes = array_merge( $image_sizes, array_keys( $_wp_additional_image_sizes ) );
                }
                return apply_filters( 'intermediate_image_sizes', $image_sizes );
            }else{
                return $image_sizes;
            }
        }
    endif;

    if( ! function_exists( 'pofo_get_image_sizes' ) ) :
        function pofo_get_image_sizes() {
            global $_wp_additional_image_sizes;

            $sizes = array();

            foreach ( get_intermediate_image_sizes() as $_size ) {
                if ( in_array( $_size, array('full', 'thumbnail', 'medium', 'medium_large', 'large') ) ) {
                    $sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
                    $sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
                    $sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
                } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
                    $sizes[ $_size ] = array(
                        'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
                        'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                        'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
                    );
                }
            }
            return $sizes;
        }
    endif;

    if( ! function_exists( 'pofo_get_image_size' ) ) :
        function pofo_get_image_size( $size ) {
            $sizes = pofo_get_image_sizes();

            if ( isset( $sizes[ $size ] ) ) {
                return $sizes[ $size ];
            }

            return false;
        }
    endif;
    
    if( ! function_exists( 'pofo_check_mini_header_enable' ) ) :
        function pofo_check_mini_header_enable() {
        
            $pofo_disable_mini_header = pofo_option( 'pofo_disable_mini_header', '0' );
            if( $pofo_disable_mini_header != '1' ) {
                return false;
            }
        
            $pofo_disable_mini_header_left_sidebar = pofo_option( 'pofo_disable_mini_header_left_sidebar', '1' );
            $pofo_mini_header_left_sidebar = pofo_option( 'pofo_mini_header_left_sidebar', '' );
            $pofo_disable_mini_header_right_sidebar = pofo_option( 'pofo_disable_mini_header_right_sidebar', '1' );
            $pofo_mini_header_right_sidebar = pofo_option( 'pofo_mini_header_right_sidebar', '' );
            
            if ( $pofo_disable_mini_header_left_sidebar == '1' && is_active_sidebar( $pofo_mini_header_left_sidebar ) ) {
                return true;
            }
            if ( $pofo_disable_mini_header_right_sidebar == '1' && is_active_sidebar( $pofo_mini_header_right_sidebar ) ) {
                return true;
            }
            return false;
        }
    endif;

    if ( ! function_exists( 'pofo_widgets' ) ) {
        function pofo_widgets() {
            $pofo_custom_sidebars = get_theme_mod( 'pofo_custom_sidebars', '' );
            $pofo_custom_sidebars = explode(",", $pofo_custom_sidebars);       
            if (is_array($pofo_custom_sidebars)) {
                foreach ($pofo_custom_sidebars as $sidebar) {

                    if (empty($sidebar)) {
                        continue;
                    }

                    register_sidebar ( array (
                        'name' => $sidebar,
                        'id' => sanitize_title ( $sidebar ),
                        'before_widget' => '<div id="%1$s" class="custom-widget %2$s">',
                        'after_widget' => '</div>',
                        'before_title'  => '<div class="widget-title">',
                        'after_title'   => '</div>',
                    ) );
                }
            }
        }
    }
    add_action( 'widgets_init', 'pofo_widgets' );

    /* Single Post Related Post Block */

    if( ! function_exists( 'pofo_related_posts' ) ) :

        function pofo_related_posts( $post_id ) {
            global $pofo_related_post_srcset;
            $args = '';
                   
            $pofo_related_posts_title = pofo_option( 'pofo_related_posts_title', 'You May Also Like' );
            $pofo_no_of_related_posts = pofo_option( 'pofo_no_of_related_posts', '3' );
            $pofo_related_posts_date_format = pofo_option( 'pofo_related_posts_date_format', '' );
            $pofo_related_posts_hide_post_thumbnail = pofo_option( 'pofo_related_posts_hide_post_thumbnail', '1' );
            $pofo_related_posts_hide_date = pofo_option( 'pofo_related_posts_hide_date', '1' );
            $pofo_related_posts_hide_author = pofo_option( 'pofo_related_posts_hide_author', '1' );
            $pofo_related_posts_separator = pofo_option( 'pofo_related_posts_separator', '1' );
            $pofo_related_post_excerpt = pofo_option( 'pofo_related_post_excerpt', '1' );
            $pofo_related_post_excerpt_length = pofo_option( 'pofo_related_post_excerpt_length', '15' );
            $pofo_related_post_srcset = pofo_option( 'pofo_related_post_feature_image_size', 'full' );
            $pofo_post_layout_style = pofo_option( 'pofo_post_layout_style', 'post-layout-style-1' );
            $pofo_no_of_related_posts_columns = pofo_option( 'pofo_no_of_related_posts_columns', '3' );
            $pofo_related_posts_zoom_effect = ( pofo_option( 'pofo_related_posts_zoom_effect', '1' ) == 0 ) ? ' post-no-transform': '' ;
            
            $pofo_comment_title_class = ( $pofo_post_layout_style == 'post-layout-style-2' || $pofo_post_layout_style == 'post-layout-style-3' ) ? ' margin-80px-bottom sm-margin-50px-bottom xs-margin-30px-bottom' : ' margin-80px-tb sm-margin-50px-tb xs-margin-30px-tb';

            $column_class = '';
            switch ( $pofo_no_of_related_posts_columns ) {
                case '1':
                    $column_class .= 'col-md-12 col-sm-12 col-xs-12 ';
                    break;
                case '2':
                    $column_class .= 'col-md-6 col-sm-6 col-xs-12 ';
                    break;
                case '4':
                    $column_class .= 'col-md-3 col-sm-6 col-xs-12 ';
                    break;
                case '6':
                    $column_class .= 'col-md-2 col-sm-6 col-xs-12 ';
                    break;    
                default:
                    $column_class .= 'col-md-4 col-sm-4 col-xs-12 ';
                    break;
            }

            $args = array(
                'category__in'          => wp_get_post_categories( $post_id ),
                'ignore_sticky_posts'   => 1,
                'post_type'             => 'post',
                'post_status'           => 'publish',
                'posts_per_page'        => $pofo_no_of_related_posts,
                'post__not_in'          => array( $post_id ),
            );

            $recent_post = new WP_Query( $args );
            if( $recent_post->have_posts() ) {
                if( $pofo_related_posts_title ) :
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-lr-auto text-center'.$pofo_comment_title_class.'">';
                        echo '<div class="position-relative overflow-hidden width-100">';
                            echo '<span class="text-small text-outside-line-full alt-font font-weight-600 text-extra-dark-gray related-post-general-title">'.esc_attr( $pofo_related_posts_title ).'</span>';
                        echo '</div>';
                    echo '</div>';
                endif;
                echo '<div class="equalize xs-equalize-auto">';
                    while ( $recent_post->have_posts() ) {
                        $recent_post->the_post();
                        $show_excerpt_grid = !empty( $pofo_related_post_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_related_post_excerpt_length) : pofo_get_the_excerpt_theme(15);
                        /* Get post class and id */
                        $pofo_post_classes = '';
                        ob_start();
                            post_class();
                            $pofo_post_classes .= ob_get_contents();
                        ob_end_clean();
                        echo '<div class="'.$column_class.'last-paragraph-no-margin margin-50px-bottom sm-margin-50px-bottom xs-margin-30px-bottom wow fadeIn">';
                            $author_date_array = array();
                            if( $pofo_related_posts_hide_date == 1 ) {
                                $author_date_array[] = '<span class="published display-inline-block vertical-align-middle">'.get_the_date( $pofo_related_posts_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_related_posts_date_format ).'</time>';
                            }
                            if( $pofo_related_posts_hide_author == 1 ) {
                                $author_date_array[] = '<span class="text-medium-gray text-extra-small display-inline-block vertical-align-middle pofo-related-post-meta">'.esc_html__('BY ','pofo').'<span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                            }
                            echo '<div id="post-'.get_the_ID().'" '.$pofo_post_classes.'>';
                                echo '<div class="pofo-rich-snippet display-none">';
                                    echo '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                echo '</div>';
                                echo '<div class="blog-post-style-related blog-post blog-post-style1 xs-text-center'.$pofo_related_posts_zoom_effect.'">';
                                    echo '<div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">';
                                        if ( !post_password_required() ) {
                                            if( $pofo_related_posts_hide_post_thumbnail == 1 ){
                                                get_template_part( 'loop/related-post/loop', 'image' );
                                            }
                                        }
                                    echo '</div>';
                                    echo '<div class="post-details">';
                                        if( !empty( $author_date_array ) ){
                                            echo '<span class="post-author text-extra-small text-medium-gray display-block margin-5px-bottom pofo-related-post-meta text-uppercase">'.implode( '<span class="blog-separator display-inline-block vertical-align-middle">|</span>', $author_date_array ).'</span>';
                                        }
                                        $page_url = get_permalink();
                                        echo '<a href="'.esc_url( $page_url ).'" class="post-title text-medium text-extra-dark-gray display-block pofo-related-post-title">';
                                            echo get_the_title();
                                        echo '</a>';
                                        if( $pofo_related_posts_separator == 1 ){
                                            echo '<div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb sm-margin-15px-tb pofo-related-post-separator"></div>';
                                        }
                                        if( $pofo_related_post_excerpt == 1 ){
                                            echo '<p class="pofo-related-post-content entry-content">'.$show_excerpt_grid.'</p>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
                wp_reset_postdata();
            }
        }
    endif;

    /* Single Post Related Portfolio Block */

    if( ! function_exists( 'pofo_related_portfolio' ) ) :

        function pofo_related_portfolio( $post_id ) {
            global $pofo_related_portfolio_srcset;
            $args = '';

            // Related Portfolio
            $pofo_related_single_portfolio_title = pofo_option( 'pofo_related_single_portfolio_title', 'Our Recent Works' );
            $pofo_related_single_portfolio_content = pofo_option( 'pofo_related_single_portfolio_content', 'New stunning projects for our amazing clients' );
            $pofo_no_of_related_single_portfolio = pofo_option( 'pofo_no_of_related_single_portfolio', '4' );
            $pofo_related_portfolio_srcset = pofo_option( 'pofo_related_single_portfolio_feature_image_size', 'full' );
            $pofo_no_of_related_single_portfolio_columns = pofo_option( 'pofo_no_of_related_single_portfolio_columns', '4' );
            $pofo_related_single_portfolio_subtitle_text_transform = pofo_option( 'pofo_related_single_portfolio_subtitle_text_transform', 'text-uppercase' );

            $column_class = '';
            $portfolio_columns = !empty( $pofo_no_of_related_single_portfolio_columns ) ? 'work-'.$pofo_no_of_related_single_portfolio_columns.'col' : 'work-4col';

            $portfolio_terms = wp_get_object_terms( $post_id,  'portfolio-category', array( 'fields' => 'ids' ) );
            $portfolio_terms = !is_wp_error( $portfolio_terms ) ? $portfolio_terms : array();

            if( !empty( $portfolio_terms ) ) {

                $args = array(
                    'post_type' => 'portfolio',
                    'post_status'           => 'publish',
                    'ignore_sticky_posts'   => 1,
                    'posts_per_page'        => $pofo_no_of_related_single_portfolio,
                    'post__not_in'          => array( $post_id ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'portfolio-category',
                            'field' => 'term_id',
                            'terms' => $portfolio_terms
                       ),
                    ),
                );
                $recent_portfolio = new WP_Query( $args );

                if( $recent_portfolio->have_posts() ) {
                    echo '<section class="wow fadeIn bg-light-gray pofo-related-single-portfolio">';
                        if( !empty( $pofo_related_single_portfolio_title ) || !empty( $pofo_related_single_portfolio_content ) ) :

                            echo '<div class="container">';
                                echo '<div class="row">';
                                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-col margin-eight-bottom text-center">';
                                        if( !empty( $pofo_related_single_portfolio_title ) ) {
                                            echo '<div class="alt-font text-medium-gray margin-10px-bottom text-small text-uppercase pofo-related-portfolio-title">'.esc_attr( $pofo_related_single_portfolio_title ).'</div>';
                                        }
                                        if( !empty( $pofo_related_single_portfolio_content ) ) {
                                            echo '<h5 class="alt-font text-extra-dark-gray font-weight-600 pofo-related-portfolio-content">' . esc_attr( $pofo_related_single_portfolio_content ) . '</h5>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        endif;

                        echo '<div class="container-fluid padding-five-lr sm-padding-15px-lr">';
                            echo '<div class="row no-margin">';
                                echo '<div class="filter-content overflow-hidden">';
                                    echo '<ul class="portfolio-grid gutter-large hover-option7 '.$portfolio_columns.'">';
                                        echo '<li class="grid-sizer"></li>';
                                        
                                        $i = 0;
                                        while ( $recent_portfolio->have_posts() ) : $recent_portfolio->the_post();

                                            $i++;

                                            $pofo_portfolio_classes = '';
                                            ob_start();
                                                post_class("grid-item wow fadeInUp");
                                                $pofo_portfolio_classes .= ob_get_contents();
                                            ob_end_clean();

                                            /* Image Alt, Title, Caption */
                                            $thumbnail_id = get_post_thumbnail_id();
                                            $img_alt = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                                            $img_title = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                                            $image_alt = !empty( $img_alt['alt'] ) ? $img_alt['alt'] : '' ;
                                            $image_title = !empty( $img_title['title'] ) ? $img_title['title'] : '';

                                            $img_attr = array(
                                                'title' => $image_title,
                                                'alt' => $image_alt,
                                                'class' => '',
                                            );

                                            $thumb      = !empty( $thumbnail_id ) ? wp_get_attachment_image_src( $thumbnail_id, $pofo_related_portfolio_srcset ) : '';
                                            $image_url  = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                            $image_width= !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                            $image_height= !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                            $srcset = $srcset_data = $sizes_data = '';
                                            $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_related_portfolio_srcset ) : '';
                                            if( $sizes ){
                                                $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                            }
                                            $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_related_portfolio_srcset ) : '';
                                            if( $srcset ){
                                                $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                            }

                                            $pofo_subtitle_single = pofo_post_meta( 'pofo_subtitle' );

                                            echo '<li '.$pofo_portfolio_classes.'>';
                                                echo '<div class="pofo-rich-snippet display-none">';
                                                    echo '<span class="entry-title">'.get_the_title().'</span>';
                                                    
                                                    echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                                    echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                                echo '</div>';
                                                $page_url = get_permalink();
                                                echo  '<a href="'.esc_url( $page_url ).'">';
                                                    echo '<figure>';

                                                        if ( has_post_thumbnail() && !post_password_required() ) {
                                                            echo  '<div class="portfolio-img">';
                                                                echo get_the_post_thumbnail( get_the_ID(), $pofo_related_portfolio_srcset, $img_attr );
                                                            echo  '</div>';
                                                        }

                                                        echo '<figcaption>';
                                                            echo '<div class="portfolio-hover-main text-center last-paragraph-no-margin">';
                                                                echo '<div class="portfolio-hover-box vertical-align-middle">';
                                                                    echo '<div class="portfolio-hover-content position-relative">';
                                                                        echo '<span class="text-black line-height-normal alt-font margin-5px-bottom display-block font-weight-600 text-uppercase">'.get_the_title().'</span>';
                                                                        if(!empty( $pofo_subtitle_single )):
                                                                            echo '<p class="text-medium-gray text-extra-small no-margin-bottom ' . esc_attr( $pofo_related_single_portfolio_subtitle_text_transform ) . '">'.esc_attr( $pofo_subtitle_single ).'</p>';
                                                                        endif;
                                                                    echo '</div>';
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</figcaption>';

                                                    echo '</figure>';
                                                echo '</a>';
                                            echo '</li>';
                                        endwhile;
                                        wp_reset_postdata();
                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</section>';
                }
            }
        }
    endif;

    /* Portfolio Navigation */
    if ( ! function_exists( 'pofo_single_portfolio_navigation' ) ) :

        function pofo_single_portfolio_navigation() {

            global $pofo_featured_array;

            $link = $cat_name = $next_image = $prev_image = '';

            // Portfolio Navigation
            $pofo_hide_navigation_border_single_portfolio       = pofo_option( 'pofo_hide_navigation_border_single_portfolio', 1 );
            $pofo_hide_navigation_middle_link_single_portfolio  = pofo_option( 'pofo_hide_navigation_middle_link_single_portfolio', 1 );
            $pofo_middle_link_type_single_portfolio             = pofo_option( 'pofo_middle_link_type_single_portfolio', 'archive_link' );
            $pofo_middle_custom_link_single_portfolio           = pofo_option( 'pofo_middle_custom_link_single_portfolio', '' );
            $pofo_portfolio_navigation_type                     = pofo_option( 'pofo_portfolio_navigation_type', 'latest' );
            $pofo_portfolio_navigation_nextlink_text            = pofo_option( 'pofo_portfolio_navigation_nextlink_text', 'Next Project' );
            $pofo_portfolio_navigation_priviouslink_text        = pofo_option( 'pofo_portfolio_navigation_priviouslink_text', 'Previous Project' );

            $navigation_border_class = $pofo_hide_navigation_border_single_portfolio == 1 ? ' border-top border-width-1 border-color-medium-gray' : '';
            
            if($pofo_portfolio_navigation_type == 'category' || $pofo_portfolio_navigation_type == 'tag'){
                if($pofo_portfolio_navigation_type == 'category'){
                    $terms = get_the_terms( get_the_ID() , 'portfolio-category' );
                    if($terms){
                        $link = get_term_link($terms[0]->slug,'portfolio-category');
                        $taxonomy = 'portfolio-category';
                    }
                    else{
                        return;
                    }
                }
                if($pofo_portfolio_navigation_type == 'tag'){
                    $terms = get_the_terms( get_the_ID() , 'portfolio-tags' );
                    if($terms){
                        $link = get_term_link($terms[0]->slug,'portfolio-tags');
                        $taxonomy = 'portfolio-tags';
                    }
                    else{
                        return;
                    }
                }

                
                if( empty($terms) ) {
                    return;
                }

                $args = array( 
                    'post_type' => 'portfolio',
                    'posts_per_page'   => -1,
                    'tax_query' => array(
                            array(
                            'taxonomy' => $taxonomy,
                            'terms' => array( $terms[0]->term_id ),
                            'field' => 'term_id',
                            'operator' => 'IN',
                        ),
                    ),
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $posts = get_posts( $args );
                
                $ids = array();
                foreach ( $posts as $thepost ) {
                    $ids[] = $thepost->ID;
                }
                
                // get and echo previous and next post in the same category
                $thisindex = array_search( get_the_ID(), $ids );
                if(($thisindex - 1) < 0)
                {
                    $nextid = '';
                }else{
                    $nextid = $ids[ $thisindex - 1 ];

                }
                if( ($thisindex + 1 ) > count($ids)-1)
                {
                    $previd = '';
                }else{
                    $previd = $ids[ $thisindex + 1 ];
                }
            }
            else{
                $previd = '';
                $nextid = '';
                $link   = '';
                if(isset(get_previous_post()->ID)){
                    $previd = get_previous_post()->ID;
                }

                if(isset(get_next_post()->ID)){
                    $nextid = get_next_post()->ID;
                }

                $portfolio_category = get_the_terms( get_the_ID() , 'portfolio-category' );
                if($portfolio_category){
                    $link   = get_term_link($portfolio_category[0]->slug,'portfolio-category');
                }
            }

            echo '<!-- start blog navigation bar section -->';
            echo '<section class="portfolio-navigation-wrapper wow fadeIn no-padding'.$navigation_border_class.'">';
                echo '<div class="container-fluid">';
                    echo '<div class="row">';
                        echo '<div class="display-table width-100 padding-30px-lr sm-padding-15px-lr">';
                            echo '<div class="width-45 text-left display-table-cell vertical-align-middle">';
                                if ( ! empty( $previd ) ) {
                                    echo '<div class="blog-nav-link blog-nav-link-prev text-extra-dark-gray">';
                                        echo '<span class="text-medium-gray text-extra-small display-block text-uppercase xs-display-none portfolio-navigation-text">'.$pofo_portfolio_navigation_priviouslink_text.'</span>';
                                        $page_url = get_permalink( $previd );
                                        echo '<a rel="prev" href="'.esc_url( $page_url ).'"><i class="ti-arrow-left blog-nav-icon"></i>'.get_the_title( $previd ).'</a>';
                                    echo '</div>';
                                }
                            echo '</div>';
                            echo '<div class="width-10 text-center display-table-cell vertical-align-middle">';
                                if( $pofo_middle_link_type_single_portfolio == 'custom_link' && isset( $pofo_middle_custom_link_single_portfolio ) ) {
                                    $link = $pofo_middle_custom_link_single_portfolio;
                                }
                                if( $pofo_hide_navigation_middle_link_single_portfolio == 1 && !empty( $link ) ) {
                                    echo '<a href="'.$link.'" class="blog-nav-link blog-nav-home"><i class="ti-layout-grid2-alt"></i></a>';
                                }
                            echo '</div>';
                            echo '<div class="width-45 text-right display-table-cell vertical-align-middle">';
                                if ( ! empty( $nextid ) ) {
                                    echo '<div class="blog-nav-link blog-nav-link-next text-extra-dark-gray">';
                                        echo '<span class="text-medium-gray text-extra-small display-block text-uppercase xs-display-none portfolio-navigation-text">'.$pofo_portfolio_navigation_nextlink_text.'</span>';
                                        $page_url = get_permalink( $nextid );
                                        echo '<a rel="next" href="'.esc_url( $page_url ).'"><i class="ti-arrow-right blog-nav-icon"></i>'.get_the_title( $nextid ).'</a>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            echo '<!-- end blog navigation bar section -->';

        }
    endif;

    if ( ! function_exists( 'pofo_theme_licence_notice' ) ) :
        function pofo_theme_licence_notice() {
            
            if( !empty( $_COOKIE['pofo_hide_activation_message'] ) || pofo_is_theme_licence_active() ) {
                return;
            }

            if( isset( $_GET['response'] ) ) {
                if( $_GET['response'] == 'true' ) {
                    return;
                }
            }

            $class = 'notice notice-success pofo-license-activation-message is-dismissible';
            $message = esc_html__( 'Please activate your POFO WordPress theme license to unlock POFO premium features.', 'pofo' );

            printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
        }
    endif;
    add_action( 'admin_notices', 'pofo_theme_licence_notice' );

    if ( ! function_exists( 'pofo_post_format_parameter' ) ) :
        function pofo_post_format_parameter( $url ) {
            $url = remove_query_arg( 'post_format', $url );
            return $url;
        }
    endif;
    add_filter( 'preview_post_link', 'pofo_post_format_parameter' );

    if( ! function_exists( 'pofo_get_style_attribute' ) ) :
        function pofo_get_style_attribute( $style_array, $font_size, $line_height ) {
            
            $html = '';
            if( !empty( $style_array ) ) {
                $html .= ' style="' . implode(" ", $style_array) . '"';
                if( !empty( $font_size ) ) {
                    $html .= ' data-fontsize="'.$font_size.'"';
                }
                if( !empty( $line_height ) ) {
                    $html .= ' data-lineheight="'.$line_height.'"';
                }
            }
            return $html;
        }
    endif;

    if ( ! function_exists('pofo_hex2rgb') ) :
        function pofo_hex2rgb( $colour, $opacity = '0.15' ) {
            if( empty( $colour ) )
                return;
            if ( $colour[0] == '#' ) {
                    $colour = substr( $colour, 1 );
            }
            if ( strlen( $colour ) == 6 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
            } elseif ( strlen( $colour ) == 3 ) {
                    list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
            } else {
                    return false;
            }
            $r = hexdec( $r );
            $g = hexdec( $g );
            $b = hexdec( $b );
            return 'rgba('.$r.','.$g.','.$b.','.$opacity.')';
        }
    endif;


    if( !function_exists('pofo_animation_style_customizer')) {
      function pofo_animation_style_customizer() {
        $output = '';
        $output = array('' => __('no style', 'pofo'),
                        'bounce' => __('bounce', 'pofo'),
                        'flash' => __('flash', 'pofo'),
                        'pulse' => __('pulse', 'pofo'),
                        'rubberBand' => __('rubberBand', 'pofo'),
                        'shake' => __('shake', 'pofo'),
                        'swing' => __('swing', 'pofo'),
                        'tada' => __('tada', 'pofo'),
                        'wobble' => __('wobble', 'pofo'),
                        'jello' => __('jello', 'pofo'),
                        'bounceIn' => __('bounceIn', 'pofo'),
                        'bounceInDown' => __('bounceInDown', 'pofo'),
                        'bounceInLeft' => __('bounceInLeft', 'pofo'),
                        'bounceInRight' => __('bounceInRight', 'pofo'),
                        'bounceInUp' => __('bounceInUp', 'pofo'),
                        'bounceOut' => __('bounceOut', 'pofo'),
                        'bounceOutDown' => __('bounceOutDown', 'pofo'),
                        'bounceOutLeft' => __('bounceOutLeft', 'pofo'),
                        'bounceOutRight' => __('bounceOutRight', 'pofo'),
                        'bounceOutUp' => __('bounceOutUp', 'pofo'),
                        'fadeIn' => __('fadeIn', 'pofo'),
                        'fadeInDown' => __('fadeInDown', 'pofo'),
                        'fadeInDownBig' => __('fadeInDownBig', 'pofo'),
                        'fadeInLeft' => __('fadeInLeft', 'pofo'),
                        'fadeInLeftBig' => __('fadeInLeftBig', 'pofo'),
                        'fadeInRight' => __('fadeInRight', 'pofo'),
                        'fadeInRightBig' => __('fadeInRightBig', 'pofo'),
                        'fadeInUp' => __('fadeInUp', 'pofo'),
                        'fadeInUpBig' => __('fadeInUpBig', 'pofo'),
                        'fadeOut' => __('fadeOut', 'pofo'),
                        'fadeOutDown' => __('fadeOutDown', 'pofo'),
                        'fadeOutDownBig' => __('fadeOutDownBig', 'pofo'),
                        'fadeOutLeft' => __('fadeOutLeft', 'pofo'),
                        'fadeOutLeftBig' => __('fadeOutLeftBig', 'pofo'),
                        'fadeOutRight' => __('fadeOutRight', 'pofo'),
                        'fadeOutRightBig' => __('fadeOutRightBig', 'pofo'),
                        'fadeOutUp' => __('fadeOutUp', 'pofo'),
                        'fadeOutUpBig' => __('fadeOutUpBig', 'pofo'),
                        'flipInX' => __('flipInX', 'pofo'),
                        'flipInY' => __('flipInY', 'pofo'),
                        'flipOutX' => __('flipOutX', 'pofo'),
                        'flipOutY' => __('flipOutY', 'pofo'),
                        'lightSpeedIn' => __('lightSpeedIn', 'pofo'),
                        'lightSpeedOut' => __('lightSpeedOut', 'pofo'),
                        'rotateIn' => __('rotateIn', 'pofo'),
                        'rotateInDownLeft' => __('rotateInDownLeft', 'pofo'),
                        'rotateInDownRight' => __('rotateInDownRight', 'pofo'),
                        'rotateInUpLeft' => __('rotateInUpLeft', 'pofo'),
                        'rotateInUpRight' => __('rotateInUpRight', 'pofo'),
                        'rotateOut' => __('rotateOut', 'pofo'),
                        'rotateOutDownLeft' => __('rotateOutDownLeft', 'pofo'),
                        'rotateOutDownRight' => __('rotateOutUpLeft', 'pofo'),
                        'rotateOutUpRight' => __('rotateOutUpRight', 'pofo'),
                        'hinge' => __('hinge', 'pofo'),
                        'rollIn' => __('rollIn', 'pofo'),
                        'rollOut' => __('rollOut', 'pofo'),
                        'zoomIn' => __('zoomIn', 'pofo'),
                        'zoomInDown' => __('zoomInDown', 'pofo'),
                        'zoomInLeft' => __('zoomInLeft', 'pofo'),
                        'zoomInRight' => __('zoomInRight', 'pofo'),
                        'zoomInUp' => __('zoomInUp', 'pofo'),
                        'zoomOut' => __('zoomOut', 'pofo'),
                        'zoomOutDown' => __('zoomOutDown', 'pofo'),
                        'zoomOutLeft' => __('zoomOutLeft', 'pofo'),
                        'zoomOutRight' => __('zoomOutRight', 'pofo'),
                        'zoomOutUp' => __('zoomOutUp', 'pofo'),
                        'slideInDown' => __('slideInDown', 'pofo'),
                        'slideInLeft' => __('slideInLeft', 'pofo'),
                        'slideInRight' => __('slideInRight', 'pofo'),
                        'slideInUp' => __('slideInUp', 'pofo'),
                        'slideOutDown' => __('slideOutDown', 'pofo'),
                        'slideOutLeft' => __('slideOutLeft', 'pofo'),
                        'slideOutRight' => __('slideOutRight', 'pofo'),
                        'slideOutUp' => __('slideOutUp', 'pofo'),
                        );
        return $output;
      }
    }

    /* Pofo category extra custom fields */

    if( !function_exists( 'pofo_category_add_meta_field' ) ) :
        function pofo_category_add_meta_field() {
            // Get All Register Sidebar List.
            $sidebar_array = pofo_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_archive_title_subtitle]" id="pofo_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label>
                <input name="pofo_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
                <input name="term_meta[pofo_archive_title_bg_image]" class="pofo_archive_title_bg_image_thumb" id="pofo_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </div>

            <div class="form-field">
                <label for="term_meta[pofo_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label>
                <input name="term_meta[pofo_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label>
                <select name="term_meta[pofo_archive_title_video_type]" id="pofo_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_archive_title_video_mp4]" id="pofo_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_archive_title_video_ogg]" id="pofo_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_archive_title_video_webm]" id="pofo_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_archive_title_video_youtube]" id="pofo_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>

        <?php
        }
    endif;
    add_action( 'category_add_form_fields', 'pofo_category_add_meta_field', 10, 2 );

    if ( ! function_exists( 'pofo_taxonomy_edit_meta_field' ) ) :
    function pofo_taxonomy_edit_meta_field($term) {
     
        // put the term ID into a variable
        $pofo_t_id = $term->term_id;
     
        // retrieve the existing value(s) for this meta field. This returns an array
        $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" ); ?>
        <?php
        $pofo_archive_title_subtitle = esc_attr( $pofo_term_meta['pofo_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_subtitle'] ) : '';
        $pofo_image_url = $pofo_term_meta['pofo_archive_title_bg_image'];

        $pofo_archive_title_bg_image = esc_attr( $pofo_term_meta['pofo_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_archive_title_bg_image'] ).'"' : '';

        $pofo_archive_title_bg_multiple_image = esc_attr( $pofo_term_meta['pofo_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_bg_multiple_image'] ) : '';
        $pofo_archive_title_video_type = esc_attr( $pofo_term_meta['pofo_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_type'] ) : '';
        $pofo_archive_title_video_mp4 = esc_attr( $pofo_term_meta['pofo_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_mp4'] ) : '';
        $pofo_archive_title_video_ogg = esc_attr( $pofo_term_meta['pofo_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_ogg'] ) : '';
        $pofo_archive_title_video_webm = esc_attr( $pofo_term_meta['pofo_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_webm'] ) : '';
        $pofo_archive_title_video_youtube = esc_attr( $pofo_term_meta['pofo_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_archive_title_video_youtube'] ) : '';
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_subtitle]" id="pofo_archive_title_subtitle" value="<?php echo esc_attr( $pofo_archive_title_subtitle ) ?>" class="category-custom-field-input">
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label></th>
            <td>
                <input name="pofo_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <input name="term_meta[pofo_archive_title_bg_image]" class="pofo_archive_title_bg_image_thumb" id="pofo_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <img class="upload_image_screenshort" <?php echo wp_kses($pofo_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label></th>
            <td>
                <input name="term_meta[pofo_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    <?php
                    $pofo_val = explode(",",$pofo_archive_title_bg_multiple_image);
                    foreach ($pofo_val as $key => $value) {
                        if(!empty($value)):
                            $pofo_image_url = wp_get_attachment_url( $value );
                            echo '<div id='.esc_attr($value).'>';
                                echo '<img class="upload_image_screenshort_multiple" alt="'.esc_html__( 'Image', 'pofo' ).'" src="'.$pofo_image_url.'" style="width:100px;" />';
                                echo '<a href="javascript:void(0)" class="remove">'.esc_html__( 'Remove', 'pofo' ).'</a>';
                            echo '</div>';
                        endif;
                    }
                    ?>
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label></th>
            <td>
                <select name="term_meta[pofo_archive_title_video_type]" id="pofo_archive_title_video_type" class="category-custom-field-select">
                    <option value="default" <?php echo esc_html( $pofo_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self" <?php echo esc_html( $pofo_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external" <?php echo esc_html( $pofo_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_mp4]" id="pofo_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_ogg]" id="pofo_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_webm]" id="pofo_archive_title_video_webm" value="<?php echo esc_attr( $pofo_archive_title_video_webm ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_archive_title_video_youtube]" id="pofo_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
    <?php
    }
    endif;
    add_action( 'category_edit_form_fields', 'pofo_taxonomy_edit_meta_field', 10, 2 );

    if ( ! function_exists( 'pofo_save_taxonomy_custom_meta' ) ) :
        function pofo_save_taxonomy_custom_meta( $pofo_term_id ) {
            if ( isset( $_POST['term_meta'] ) ) {
                $pofo_t_id = $pofo_term_id;
                $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
                $pofo_cat_keys = array_keys( $_POST['term_meta'] );
                foreach ( $pofo_cat_keys as $key ) {
                    if ( isset ( $_POST['term_meta'][$key] ) ) {
                        $pofo_term_meta[$key] = $_POST['term_meta'][$key];
                    }
                }
                // Save the option array.
                update_option( "pofo_taxonomy_$pofo_t_id", $pofo_term_meta );
            }
        }  
    endif;
    add_action( 'edited_category', 'pofo_save_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_category', 'pofo_save_taxonomy_custom_meta', 10, 2 );


    /* Pofo portfolio category extra custom fields */

    if( !function_exists( 'pofo_portfolio_category_add_meta_field' ) ) :
        function pofo_portfolio_category_add_meta_field() {
            // Get All Register Sidebar List.
            $sidebar_array = pofo_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_subtitle]" id="pofo_portfolio_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label>
                <input name="pofo_portfolio_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
                <input name="term_meta[pofo_portfolio_archive_title_bg_image]" class="pofo_portfolio_archive_title_bg_image_thumb" id="pofo_portfolio_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </div>

            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label>
                <input name="term_meta[pofo_portfolio_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label>
                <select name="term_meta[pofo_portfolio_archive_title_video_type]" id="pofo_portfolio_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_mp4]" id="pofo_portfolio_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_ogg]" id="pofo_portfolio_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_webm]" id="pofo_portfolio_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_portfolio_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_youtube]" id="pofo_portfolio_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>

        <?php
        }
    endif;
    add_action( 'portfolio-category_add_form_fields', 'pofo_portfolio_category_add_meta_field', 10, 2 );

    if ( ! function_exists( 'pofo_portfolio_taxonomy_edit_meta_field' ) ) :
    function pofo_portfolio_taxonomy_edit_meta_field($term) {
     
        // put the term ID into a variable
        $pofo_t_id = $term->term_id;
     
        // retrieve the existing value(s) for this meta field. This returns an array
        $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" ); ?>
        <?php
        $pofo_portfolio_archive_title_subtitle = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_subtitle'] ) : '';
        $pofo_image_url = $pofo_term_meta['pofo_portfolio_archive_title_bg_image'];

        $pofo_portfolio_archive_title_bg_image = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_image'] ).'"' : '';

        $pofo_portfolio_archive_title_bg_multiple_image = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_bg_multiple_image'] ) : '';
        
        $pofo_portfolio_archive_title_video_type = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_type'] ) : '';
        $pofo_portfolio_archive_title_video_mp4 = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_mp4'] ) : '';
        $pofo_portfolio_archive_title_video_ogg = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_ogg'] ) : '';
        $pofo_portfolio_archive_title_video_webm = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_webm'] ) : '';
        $pofo_portfolio_archive_title_video_youtube = esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_portfolio_archive_title_video_youtube'] ) : '';
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_subtitle]" id="pofo_portfolio_archive_title_subtitle" value="<?php echo esc_attr( $pofo_portfolio_archive_title_subtitle ) ?>" class="category-custom-field-input">
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label></th>
            <td>
                <input name="pofo_portfolio_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <input name="term_meta[pofo_portfolio_archive_title_bg_image]" class="pofo_portfolio_archive_title_bg_image_thumb" id="pofo_portfolio_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <img class="upload_image_screenshort" <?php echo wp_kses($pofo_portfolio_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label></th>
            <td>
                <input name="term_meta[pofo_portfolio_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    <?php
                    $pofo_val = explode(",",$pofo_portfolio_archive_title_bg_multiple_image);
                    foreach ($pofo_val as $key => $value) {
                        if(!empty($value)):
                            $pofo_image_url = wp_get_attachment_url( $value );
                            echo '<div id='.esc_attr($value).'>';
                                echo '<img class="upload_image_screenshort_multiple" src="'.$pofo_image_url.'" style="width:100px;" />';
                                echo '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'pofo' ).'</a>';
                            echo '</div>';
                        endif;
                    }
                    ?>
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label></th>
            <td>
                <select name="term_meta[pofo_portfolio_archive_title_video_type]" id="pofo_portfolio_archive_title_video_type" class="category-custom-field-select">
                    <option value="default" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external" <?php echo esc_attr( $pofo_portfolio_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_mp4]" id="pofo_portfolio_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                <p class="description">Use only for Page Title Style 8.</p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_ogg]" id="pofo_portfolio_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_webm]" id="pofo_portfolio_archive_title_video_webm" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_webm ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_portfolio_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_portfolio_archive_title_video_youtube]" id="pofo_portfolio_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_portfolio_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
    <?php
    }
    endif;
    add_action( 'portfolio-category_edit_form_fields', 'pofo_portfolio_taxonomy_edit_meta_field', 10, 2 );

    if ( ! function_exists( 'pofo_save_portfolio_taxonomy_custom_meta' ) ) :
        function pofo_save_portfolio_taxonomy_custom_meta( $pofo_term_id ) {
            if ( isset( $_POST['term_meta'] ) ) {
                $pofo_t_id = $pofo_term_id;
                $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" );
                $pofo_cat_keys = array_keys( $_POST['term_meta'] );
                foreach ( $pofo_cat_keys as $key ) {
                    if ( isset ( $_POST['term_meta'][$key] ) ) {
                        $pofo_term_meta[$key] = $_POST['term_meta'][$key];
                    }
                }
                // Save the option array.
                update_option( "pofo_taxonomy_$pofo_t_id", $pofo_term_meta );
            }
        }  
    endif;
    add_action( 'edited_portfolio-category', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_portfolio-category', 'pofo_save_portfolio_taxonomy_custom_meta', 10, 2 );

    /* Remove VC redirection when plugin activated */
    if( class_exists( 'Vc_Manager' ) ) {
        remove_action( 'admin_init', 'vc_page_welcome_redirect' );
    }

    if ( ! function_exists( 'pofo_extract_shortcode_contents' ) ) :
        /**
         * Extract text contents from all shortcodes for usage in excerpts
         *
         * @return string The shortcode contents
         **/
        function pofo_extract_shortcode_contents( $m ) {
            global $shortcode_tags;

            // Setup the array of all registered shortcodes
            $shortcodes = array_keys( $shortcode_tags );
            $no_space_shortcodes = array( 'dropcap' );
            $omitted_shortcodes  = array( 'slide' );

            // Extract contents from all shortcodes recursively
            if ( in_array( $m[2], $shortcodes ) && ! in_array( $m[2], $omitted_shortcodes ) ) {
                $pattern = get_shortcode_regex();
                // Add space the excerpt by shortcode, except for those who should stick together, like dropcap
                $space = ' ' ;
                if ( in_array( $m[2], $no_space_shortcodes ) ) {
                    $space = '' ;
                }
                $content = preg_replace_callback( "/$pattern/s", 'pofo_extract_shortcode_contents', rtrim( $m[5] ) . $space );
                return $content;
            }

            // allow [[foo]] syntax for escaping a tag
            if ( $m[1] == '[' && $m[6] == ']' ) {
                return substr( $m[0], 1, -1 );
            }

           return $m[1] . $m[6];
        }
    endif;
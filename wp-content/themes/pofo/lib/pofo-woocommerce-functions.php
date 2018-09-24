<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

/* if WooCommerce plugin is activated */
if( class_exists( 'WooCommerce' ) ) {

    /* To get Product Attribute list in Customize */
    if( ! function_exists( 'pofo_product_attribute_customizer_array' ) ) :
        function pofo_product_attribute_customizer_array() {
            
            $attribute_array      = array();
            $attribute_taxonomies = wc_get_attribute_taxonomies();

            if ( !empty($attribute_taxonomies) ) {
                foreach ( $attribute_taxonomies as $tax ) {
                    if ( taxonomy_exists( wc_attribute_taxonomy_name( $tax->attribute_name ) ) ) {
                        $attribute_array[ $tax->attribute_name ] = $tax->attribute_name;
                    }
                }
            }
            return $attribute_array;
        }
    endif;

    /* To Remove woocommerce_breadcrumb Action And Add New Action For WooCommerce Breadcrumb */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'pofo_woocommerce_breadcrumb', 'pofo_woocommerce_breadcrumb', 20, 0 );
    if ( ! function_exists( 'pofo_woocommerce_breadcrumb' ) ) {
        function pofo_woocommerce_breadcrumb( $args = array() ) {
            $args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
                'delimiter'   => '',
                'wrap_before' => '',
                'wrap_after'  => '',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'pofo' ),
            ) ) );

            $breadcrumbs = new WC_Breadcrumb();

            if ( ! empty( $args['home'] ) ) {
                $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
            }

            $args['breadcrumb'] = $breadcrumbs->generate();

            /**
             * WooCommerce Breadcrumb hook
             *
             * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
             */
            do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

            wc_get_template( 'global/breadcrumb.php', $args );
        }
    }

    /* WordPress Shop Rich Snippet Code */
    add_action( 'woocommerce_before_shop_loop', 'pofo_override_woocommerce_before_shop_loop' );
    if ( ! function_exists( 'pofo_override_woocommerce_before_shop_loop' ) ) {
        function pofo_override_woocommerce_before_shop_loop() {

            if( is_shop() ) { // Check if product shop page

                $output = '';
                $output .= '<div class="pofo-rich-snippet display-none">';
                    $output .= '<span class="entry-title">'.woocommerce_page_title( false ).'</span>';
                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                $output .= '</div>';
                echo wp_kses_post( $output );
            }
        }
    }

    /* WordPress Product Rich Snippet Code */
    add_action( 'woocommerce_before_single_product_summary', 'pofo_override_woocommerce_after_shop_loop_item' );
    add_action( 'woocommerce_after_shop_loop_item', 'pofo_override_woocommerce_after_shop_loop_item' );
    if ( ! function_exists( 'pofo_override_woocommerce_after_shop_loop_item' ) ) {
        function pofo_override_woocommerce_after_shop_loop_item() {

            $output = '';
            $output .= '<div class="pofo-rich-snippet display-none">';
                $output .= '<span class="entry-title">'.get_the_title().'</span>';
                
                $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
            $output .= '</div>';
            echo wp_kses_post( $output );
        }
    }
    
    /* WordPress Wp Action */
    add_action( 'wp', 'pofo_wp_hook' );
    if ( ! function_exists( 'pofo_wp_hook' ) ) {
        function pofo_wp_hook() {

            if ( ! is_admin() && is_product() ) {

                /* To Remove product title */
                $pofo_single_product_enable_title = get_theme_mod( 'pofo_single_product_enable_title', '1' );
                if( $pofo_single_product_enable_title != 1 ) {
                    remove_action ('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
                }

                /* On / Off setting for related products */
                $pofo_single_product_enable_related = get_theme_mod( 'pofo_single_product_enable_related', '1' );
                if( $pofo_single_product_enable_related != 1 ) {
                    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
                }

                /* On / Off setting for Up Sells products */
                $pofo_single_product_enable_up_sells = get_theme_mod( 'pofo_single_product_enable_up_sells', '1' );
                if( $pofo_single_product_enable_up_sells != 1 ) {
                    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
                }
            }

            if ( ! is_admin() && is_cart() ) {

                /* On / Off setting for Cross Sells products */
                $pofo_single_product_enable_cross_sells = get_theme_mod( 'pofo_single_product_enable_cross_sells', '1' );
                if( $pofo_single_product_enable_cross_sells != 1 ) {
                    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
                }
            }
        }
    }

    /* To Remove product star rating */
    add_filter( 'woocommerce_product_get_rating_html', 'pofo_override_woocommerce_product_get_rating_html', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_product_get_rating_html' ) ) {
        function pofo_override_woocommerce_product_get_rating_html( $star_rating_html ) {
            if ( ! is_admin() ) {

                if( is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) {

                    $pofo_product_archive_enable_star_rating = get_theme_mod( 'pofo_product_archive_enable_star_rating', '1' );
                    if( $pofo_product_archive_enable_star_rating != '1' ) {
                        return false;
                    }
                }
            }
            return $star_rating_html;
        }
    }

    /* To Remove product short description */
    add_filter( 'woocommerce_short_description', 'pofo_override_woocommerce_short_description', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_short_description' ) ) {
        function pofo_override_woocommerce_short_description( $short_description ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_short_description = get_theme_mod( 'pofo_single_product_enable_short_description', '1' );
                if( $pofo_single_product_enable_short_description != '1' ) {
                    return false;
                }
            }
            return $short_description;
        }
    }

    /* To Remove product SKU */
    add_filter( 'wc_product_sku_enabled', 'pofo_override_product_page_skus', 99 );
    if ( ! function_exists( 'pofo_override_product_page_skus' ) ) {
        function pofo_override_product_page_skus( $enabled ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_sku = get_theme_mod( 'pofo_single_product_enable_sku', '1' );
                if( $pofo_single_product_enable_sku != '1' ) {
                    return false;
                }
            }
            return $enabled;
        }
    }

    /* To Remove Tab Content Heading */
    add_filter( 'woocommerce_product_description_heading', 'pofo_override_woocommerce_product_tab_content_heading', 99 );
    add_filter( 'woocommerce_product_additional_information_heading', 'pofo_override_woocommerce_product_tab_content_heading', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_product_tab_content_heading' ) ) {
        function pofo_override_woocommerce_product_tab_content_heading( $heading ) {
            if ( ! is_admin() && is_product() ) {
                $pofo_single_product_enable_tab_content_heading = get_theme_mod( 'pofo_single_product_enable_tab_content_heading', '1' );
                if( $pofo_single_product_enable_tab_content_heading != '1' ) {
                    return false;
                }
            }
            return $heading;
        }
    }

    /* Add social share on product page */
    add_action( 'woocommerce_product_meta_end', 'pofo_override_woocommerce_product_meta_end' );
    if ( ! function_exists( 'pofo_override_woocommerce_product_meta_end' ) ) {
        function pofo_override_woocommerce_product_meta_end() {
            
            $pofo_single_product_enable_social_share = get_theme_mod( 'pofo_single_product_enable_social_share', '1' );
            if( $pofo_single_product_enable_social_share == 1 && function_exists( 'pofo_single_product_share_shortcode' ) ){
                echo do_shortcode("[pofo_single_product_share]");
            }
        }
    }

    /* Add product per page & no. of column for related products */
    add_filter( 'woocommerce_output_related_products_args', 'pofo_override_woocommerce_output_related_products_args', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_output_related_products_args' ) ) {
        function pofo_override_woocommerce_output_related_products_args( $args ) {
            
            $pofo_single_product_no_of_products_related = get_theme_mod( 'pofo_single_product_no_of_products_related', '3' );
            $pofo_single_product_no_of_columns_related = get_theme_mod( 'pofo_single_product_no_of_columns_related', '3' );

            if( !empty( $pofo_single_product_no_of_products_related ) ) {
                $args['posts_per_page'] = esc_attr( $pofo_single_product_no_of_products_related );
            }
            if( !empty( $pofo_single_product_no_of_columns_related ) ) {
                $args['columns'] = esc_attr( $pofo_single_product_no_of_columns_related );
            }

            return $args;
        }
    }

    /* Add product per page & no. of column for Up Sells products */
    add_filter( 'woocommerce_upsell_display_args', 'pofo_override_woocommerce_upsell_display_args', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_upsell_display_args' ) ) {
        function pofo_override_woocommerce_upsell_display_args( $args ) {
            
            $pofo_single_product_no_of_products_up_sells = get_theme_mod( 'pofo_single_product_no_of_products_up_sells', '3' );
            $pofo_single_product_no_of_columns_up_sells = get_theme_mod( 'pofo_single_product_no_of_columns_up_sells', '3' );

            if( !empty( $pofo_single_product_no_of_products_up_sells ) ) {
                $args['posts_per_page'] = esc_attr( $pofo_single_product_no_of_products_up_sells );
            }
            if( !empty( $pofo_single_product_no_of_columns_up_sells ) ) {
                $args['columns'] = esc_attr( $pofo_single_product_no_of_columns_up_sells );
            }

            return $args;
        }
    }

    /* Add product no. of column for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_columns', 'pofo_override_woocommerce_cross_sells_columns', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_cross_sells_columns' ) ) {
        function pofo_override_woocommerce_cross_sells_columns( $no_of_columns ) {
            
            $pofo_single_product_no_of_columns_cross_sells = get_theme_mod( 'pofo_single_product_no_of_columns_cross_sells', '2' );
            if( !empty( $pofo_single_product_no_of_columns_cross_sells ) ) {
                $no_of_columns = esc_attr( $pofo_single_product_no_of_columns_cross_sells );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for Cross Sells products */
    add_filter( 'woocommerce_cross_sells_total', 'pofo_override_woocommerce_cross_sells_total', 99 );
    if ( ! function_exists( 'pofo_override_woocommerce_cross_sells_total' ) ) {
        function pofo_override_woocommerce_cross_sells_total( $per_page ) {
            
            $pofo_single_product_no_of_products_cross_sells = get_theme_mod( 'pofo_single_product_no_of_products_cross_sells', '2' );
            if( !empty( $pofo_single_product_no_of_products_cross_sells ) ) {
                $per_page = esc_attr( $pofo_single_product_no_of_products_cross_sells );
            }

            return $per_page;
        }
    }

    /* Add dynamic class for no. of columns */
    add_filter( 'post_class', 'pofo_override_wc_product_post_class', 99, 3 );
    if ( ! function_exists( 'pofo_override_wc_product_post_class' ) ) {
        function pofo_override_wc_product_post_class( $classes, $class = '', $post_id = '' ) {
            if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ) ) ) {
                return $classes;
            }

            $product = wc_get_product( $post_id );

            if ( $product ) {

                global $woocommerce_loop;

                // Added Custom No. of column dynamic class
                $classes[] = 'pofo-product-'.$woocommerce_loop['columns'].'col';
            }

            return $classes;
        }
    }

    /* Add no. of column for shop or archive page */
    add_filter( 'loop_shop_columns', 'pofo_override_loop_shop_columns', 99 );
    if ( ! function_exists( 'pofo_override_loop_shop_columns' ) ) {
        function pofo_override_loop_shop_columns( $no_of_columns ) {
            
            $pofo_product_archive_page_column = get_theme_mod( 'pofo_product_archive_page_column', '3' );
            if( !empty( $pofo_product_archive_page_column ) ) {
                $no_of_columns = esc_attr( $pofo_product_archive_page_column );
            }

            return $no_of_columns;
        }
    }

    /* Add product per page for shop or archive page */
    add_filter( 'loop_shop_per_page', 'pofo_override_loop_shop_per_page', 99 );
    if ( ! function_exists( 'pofo_override_loop_shop_per_page' ) ) {
        function pofo_override_loop_shop_per_page( $per_page ) {
            
            $pofo_product_archive_page_per_page = get_theme_mod( 'pofo_product_archive_page_per_page', '12' );
            if( !empty( $pofo_product_archive_page_per_page ) ) {
                $per_page = esc_attr( $pofo_product_archive_page_per_page );
            }

            return $per_page;
        }
    }

    
    /* Pofo product category extra custom fields */

    if( !function_exists( 'pofo_product_category_add_meta_field' ) ) :
        function pofo_product_category_add_meta_field() {
            // Get All Register Sidebar List.
            $sidebar_array = pofo_register_sidebar_array();

            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_subtitle]" id="pofo_product_archive_title_subtitle" value="" class="category-custom-field-input">
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label>
                <input name="pofo_product_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="" />
                <input name="term_meta[pofo_product_archive_title_bg_image]" class="pofo_product_archive_title_bg_image_thumb" id="pofo_product_archive_title_bg_image_thumb" type="hidden" value="" />
                <img class="upload_image_screenshort" src="" />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </div>

            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label>
                <input name="term_meta[pofo_product_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    
                </div>
                <input class="pofo_upload_button_multiple_category" id="pofo_upload_button_multiple_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" /><?php echo esc_html__( ' Select Files', 'pofo' ); ?>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 7.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label>
                <select name="term_meta[pofo_product_archive_title_video_type]" id="pofo_product_archive_title_video_type" class="category-custom-field-select">
                    <option value="default"><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self"><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external"><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_mp4]" id="pofo_product_archive_title_video_mp4" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_ogg]" id="pofo_product_archive_title_video_ogg" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_webm]" id="pofo_product_archive_title_video_webm" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>
            <div class="form-field">
                <label for="term_meta[pofo_product_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label>
                <input type="text" name="term_meta[pofo_product_archive_title_video_youtube]" id="pofo_product_archive_title_video_youtube" value="" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </div>

        <?php
        }
    endif;
    add_action( 'product_cat_add_form_fields', 'pofo_product_category_add_meta_field', 99, 2 );

    if ( ! function_exists( 'pofo_product_taxonomy_edit_meta_field' ) ) :
    function pofo_product_taxonomy_edit_meta_field($term) {
     
        // put the term ID into a variable
        $pofo_t_id = $term->term_id;
     
        // retrieve the existing value(s) for this meta field. This returns an array
        $pofo_term_meta = get_option( "pofo_taxonomy_$pofo_t_id" ); ?>
        <?php
        $pofo_product_archive_title_subtitle = esc_attr( $pofo_term_meta['pofo_product_archive_title_subtitle'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_subtitle'] ) : '';
        $pofo_image_url = $pofo_term_meta['pofo_product_archive_title_bg_image'];

        $pofo_product_archive_title_bg_image = esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_image'] ) ? 'src = "'.esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_image'] ).'"' : '';

        $pofo_product_archive_title_bg_multiple_image = esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_multiple_image'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_bg_multiple_image'] ) : '';
        
        $pofo_product_archive_title_video_type = esc_attr( $pofo_term_meta['pofo_product_archive_title_video_type'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_type'] ) : '';
        $pofo_product_archive_title_video_mp4 = esc_attr( $pofo_term_meta['pofo_product_archive_title_video_mp4'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_mp4'] ) : '';
        $pofo_product_archive_title_video_ogg = esc_attr( $pofo_term_meta['pofo_product_archive_title_video_ogg'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_ogg'] ) : '';
        $pofo_product_archive_title_video_webm = esc_attr( $pofo_term_meta['pofo_product_archive_title_video_webm'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_webm'] ) : '';
        $pofo_product_archive_title_video_youtube = esc_attr( $pofo_term_meta['pofo_product_archive_title_video_youtube'] ) ? esc_attr( $pofo_term_meta['pofo_product_archive_title_video_youtube'] ) : '';
        ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_subtitle]"><?php echo esc_html__( 'Subtitle', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_product_archive_title_subtitle]" id="pofo_product_archive_title_subtitle" value="<?php echo esc_attr( $pofo_product_archive_title_subtitle ) ?>" class="category-custom-field-input">
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_bg_image]"><?php echo esc_html__( 'Title background image', 'pofo' ); ?></label></th>
            <td>
                <input name="pofo_product_archive_title_bg_image" class="upload_field" id="pofo_upload" type="text" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <input name="term_meta[pofo_product_archive_title_bg_image]" class="pofo_product_archive_title_bg_image_thumb" id="pofo_product_archive_title_bg_image_thumb" type="hidden" value="<?php echo esc_url( $pofo_image_url ) ?>" />
                <img class="upload_image_screenshort" <?php echo wp_kses($pofo_product_archive_title_bg_image, wp_kses_allowed_html( 'post' )); ?> />
                <input class="pofo_upload_button_category" id="pofo_upload_button_category" type="button" value="<?php echo esc_html__( 'Browse', 'pofo' ); ?>" />
                <span class="pofo_remove_button_category button"><?php echo esc_html__( 'Remove', 'pofo' ); ?></span>
            </td>
        </tr>

        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_bg_multiple_image]"><?php echo esc_html__( 'Slider Images', 'pofo' ); ?></label></th>
            <td>
                <input name="term_meta[pofo_product_archive_title_bg_multiple_image]" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="" />
                <div class="multiple_images">
                    <?php
                    $pofo_val = explode(",",$pofo_product_archive_title_bg_multiple_image);
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
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_type]"><?php echo esc_html__( 'Video Type', 'pofo' ); ?></label></th>
            <td>
                <select name="term_meta[pofo_product_archive_title_video_type]" id="pofo_product_archive_title_video_type" class="category-custom-field-select">
                    <option value="default" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "default" ? 'selected="selected"' : '' ?> ><?php echo esc_html__( 'Default', 'pofo' ); ?></option>
                    <option value="self" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "self" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'Self', 'pofo' ); ?></option>
                    <option value="external" <?php echo esc_attr( $pofo_product_archive_title_video_type ) == "external" ? 'selected="selected"' : '' ?>><?php echo esc_html__( 'External', 'pofo' ); ?></option>
                </select>
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_mp4]"><?php echo esc_html__( 'MP4', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_product_archive_title_video_mp4]" id="pofo_product_archive_title_video_mp4" value="<?php echo esc_attr( $pofo_product_archive_title_video_mp4 ) ?>" class="category-custom-field-input">
                <p class="description">Use only for Page Title Style 8.</p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_ogg]"><?php echo esc_html__( 'OGG', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_product_archive_title_video_ogg]" id="pofo_product_archive_title_video_ogg" value="<?php echo esc_attr( $pofo_product_archive_title_video_ogg ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_webm]"><?php echo esc_html__( 'WEBM', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_product_archive_title_video_webm]" id="pofo_product_archive_title_video_webm" value="<?php echo esc_attr( $pofo_product_archive_title_video_webm ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[pofo_product_archive_title_video_youtube]"><?php echo esc_html__( 'External Video Url', 'pofo' ); ?></label></th>
            <td>
                <input type="text" name="term_meta[pofo_product_archive_title_video_youtube]" id="pofo_product_archive_title_video_youtube" value="<?php echo esc_attr( $pofo_product_archive_title_video_youtube ) ?>" class="category-custom-field-input">
                <p class="description"><?php echo esc_html__( 'Use only for Page Title Style 8.', 'pofo' ); ?></p>
            </td>
        </tr>
    <?php
    }
    endif;
    add_action( 'product_cat_edit_form_fields', 'pofo_product_taxonomy_edit_meta_field', 99, 2 );

    if ( ! function_exists( 'pofo_save_product_taxonomy_custom_meta' ) ) :
        function pofo_save_product_taxonomy_custom_meta( $pofo_term_id ) {
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
    add_action( 'edited_product_cat', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_product_cat', 'pofo_save_product_taxonomy_custom_meta', 10, 2 );

}
<?php
/**
 * Shortcode For Portfolio
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Portfolio */
/*-----------------------------------------------------------------------------------*/

$pofo_portfolio_unique_id = 1;    
if ( ! function_exists( 'pofo_portfolio_shortcode' ) ) {
    function pofo_portfolio_shortcode( $atts, $content = null ) {

        global $pofo_portfolio_filter_unique_id, $pofo_portfolio_filter_common_unique_id, $pofo_portfolio_unique_id, $pofo_slider_script;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_portfolio_style' => '',
            'pofo_portfolio_columns' =>'4',
            'pofo_portfolio_double_grid_position' => '',
            'pofo_post_per_page' => '15',
            'pofo_orderby' => 'date',
            'pofo_order' => 'ASC',
            'pofo_categories_list' => '',
            'pofo_show_portfolio_metro' => '',
            'pofo_show_title' => '1',
            'pofo_title_text_transform' => 'text-uppercase',
            'pofo_show_category' => '1',
            'pofo_show_pagination' => '',
            'pofo_category_text_transform' => 'text-uppercase',
            'pofo_show_separator' => '1',
            'pofo_show_internal_link' => '1',
            'pofo_show_lightbox' => '1',
            'pofo_zoom_on_hover' => '1',
            'pofo_show_plus_icon' => '1',
            'pofo_overlay_opacity' => '',
            'pofo_image_srcset' => 'full',
            'pofo_animation_style' => '',
            'pofo_animation_delay' => '',
            'pofo_pagination_style' => 'number-pagination',

            'pofo_title_font_size' => '',
            'pofo_title_line_height' => '',
            'pofo_title_letter_spacing' => '',
            'pofo_title_font_weight' => '',
            'pofo_title_italic' => '',
            'pofo_title_underline' => '',
            'pofo_title_element_tag' => '',
            'pofo_title_color' => '',
            'pofo_title_enable_responsive_font' => '',
            'pofo_subtitle_font_size' => '',
            'pofo_subtitle_line_height' => '',
            'pofo_subtitle_letter_spacing' => '',
            'pofo_subtitle_font_weight' => '',
            'pofo_subtitle_color' => '',
            'pofo_subtitle_enable_responsive_font' => '',

            'pofo_plus_icon_color' => '',
            'pofo_caption_bg_color' => '',
            'pofo_separator_color' => '',
            'pofo_separator_height' => '',
            'pofo_box_hover_bg_color' => '',
            'pofo_box_hover_title_color' => '',
            'pofo_portfolio_type' => '',
            'pofo_justified_portfolio_gap' => '10',
            'pofo_justified_portfolio_height' => '400',
            
            'alignment_setting' => '1',
            'desktop_alignment' => 'text-center',
            'desktop_mini_alignment' => '',
            'ipad_alignment' => '',
            'mobile_alignment' => '',
            'vertical_alignment_setting' => '1',
            'vertical_desktop_alignment' => 'vertical-align-middle',
            'vertical_desktop_mini_alignment' => '',
            'vertical_ipad_alignment' => '',
            'vertical_mobile_alignment' => '',
        ), $atts ) );

        global $pofo_featured_array; 
        $icon = $output = $container_class = $no_padding = $style_attr = $style = $classes = $separator_style = $portfolio_columns = $filter_style = $portfolio_classes = $alignment_class = $vertical_alignment_class = $pofo_title_style_attr = $pofo_subtitle_style_attr = $pofo_portfolio_classes_infinite_scroll = '';
        $classes = $pofo_title_style_array = $pofo_subtitle_style_array = array();

        // Check if portfolio id and class
        $pofo_portfolio_filter_unique_id        = !empty( $pofo_portfolio_filter_unique_id ) ? $pofo_portfolio_filter_unique_id : 1;
        $pofo_portfolio_filter_common_unique_id = !empty( $pofo_portfolio_filter_common_unique_id ) ? $pofo_portfolio_filter_common_unique_id : 1;
        $pofo_portfolio_unique_id               = !empty( $pofo_portfolio_unique_id ) ? $pofo_portfolio_unique_id : 1;

        if( $pofo_portfolio_filter_unique_id == $pofo_portfolio_filter_common_unique_id ) { // check if portfolio filter is not exist

            $pofo_portfolio_id      = ( $id ) ? $id : 'pofo-portfolio-layout';
            $pofo_portfolio_id      .= '-' . $pofo_portfolio_unique_id;
            $pofo_portfolio_unique_id++;

        } else { // check if portfolio filter is exist
    
            $pofo_portfolio_id      = ( $id ) ? $id : 'pofo-portfolio';
            $pofo_portfolio_id      .= '-' . $pofo_portfolio_filter_common_unique_id;
            $pofo_portfolio_filter_common_unique_id++;
        }

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        $pofo_post_per_page = ($pofo_post_per_page) ? $pofo_post_per_page : '-1';
        $pofo_orderby = ($pofo_orderby) ? $pofo_orderby : '"date"';
        $pofo_order = ($pofo_order) ? $pofo_order : 'ASC';
        $pofo_portfolio_columns = ($pofo_portfolio_columns) ? $pofo_portfolio_columns : '';
        $pofo_show_title = ( $pofo_show_title ) ? $pofo_show_title : '';

        $pofo_image_srcset  = !empty( $pofo_image_srcset ) ? $pofo_image_srcset : 'full';

        // Animation
        $pofo_animation_style = ( $pofo_animation_style ) ? ' wow '.$pofo_animation_style : '';
        $pofo_animation_delay = ( $pofo_animation_delay ) ? $pofo_animation_delay : '0';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';

        $pofo_title_text_transform = !empty( $pofo_title_text_transform ) ? ' ' . $pofo_title_text_transform : '';
        $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        // For Subtitle Style
        !empty( $pofo_subtitle_font_size ) ? $pofo_subtitle_style_array[] = 'font-size: ' . $pofo_subtitle_font_size . ';' : '';
        !empty( $pofo_subtitle_line_height ) ? $pofo_subtitle_style_array[] = 'line-height: ' . $pofo_subtitle_line_height . ';' : '';
        !empty( $pofo_subtitle_letter_spacing ) ? $pofo_subtitle_style_array[] = 'letter-spacing: ' . $pofo_subtitle_letter_spacing . ';' : '';
        !empty( $pofo_subtitle_font_weight ) ? $pofo_subtitle_style_array[] = 'font-weight: ' . $pofo_subtitle_font_weight . ';' : '';
        !empty( $pofo_subtitle_color ) ? $pofo_subtitle_style_array[] = 'color: '.$pofo_subtitle_color.';' : '';

        $pofo_subtitle_dynamic_font_size = $pofo_subtitle_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_subtitle_style_attr   = pofo_get_style_attribute( $pofo_subtitle_style_array, $pofo_subtitle_font_size, $pofo_subtitle_line_height );

        // For Plus Icon Color
        $pofo_plus_icon_color = !empty( $pofo_plus_icon_color ) ? ' style="color: '.$pofo_plus_icon_color.';"' : '';

        // For Caption Background Color
        $pofo_caption_bg_color = !empty( $pofo_caption_bg_color ) ? ' style="background-color: '.$pofo_caption_bg_color.';"' : '';

        // For Category Text Case
        $pofo_category_text_transform = !empty( $pofo_category_text_transform ) ? ' ' . $pofo_category_text_transform : '';

        // For Separator Style
        $pofo_separator_color = ( $pofo_separator_color ) ? 'background-color:'.$pofo_separator_color.'; ': '';
        $pofo_separator_height = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.'; ': '';
        if($pofo_separator_color || $pofo_separator_height){
            $separator_style = ' style="'.$pofo_separator_color.$pofo_separator_height.'"';
        }

        // Metro Portfolio
        ( $pofo_show_portfolio_metro == 1 ) ? $classes[] = 'portfolio-metro-grid' : '';
        $double_grid_position = $pofo_show_portfolio_metro == 1 && !empty( $pofo_portfolio_double_grid_position ) ? explode(',', $pofo_portfolio_double_grid_position) : array();

        // Spacing between columns
        ( $pofo_portfolio_type ) ? $classes[] = $pofo_portfolio_type : '';
        !empty( $pofo_justified_portfolio_gap ) ? $pofo_justified_portfolio_gap : '0';
        !empty( $pofo_justified_portfolio_height ) ? $pofo_justified_portfolio_height : '400';

        //Zoom Effect & Hover Background Color
        $pofo_zoom_on_hover = ( $pofo_zoom_on_hover != 1 ) ? ' portfolio-stop-zoom-on-hover': '';

        // Custom opacity
        if( !empty( $pofo_overlay_opacity ) ) {

            if( $pofo_portfolio_style == 'portfolio-style-1' || $pofo_portfolio_style == 'portfolio-style-2' || $pofo_portfolio_style == 'portfolio-style-3' || $pofo_portfolio_style == 'portfolio-style-4' || $pofo_portfolio_style == 'portfolio-style-5' || $pofo_portfolio_style == 'portfolio-style-6' || $pofo_portfolio_style == 'portfolio-style-10' ) {
                
                $pofo_featured_array[] = '.portfolio-grid .grid-item figure:hover .pofo-portfolio-page-background img { opacity:'.$pofo_overlay_opacity.';}';

            } else if( $pofo_portfolio_style == 'portfolio-style-11' ) {

                $pofo_featured_array[] = '.portfolio-grid .grid-item a:hover .portfolio-img img { opacity:'.$pofo_overlay_opacity.';}';
            }
        }

        // Custom background color
        if( !empty( $pofo_box_hover_bg_color ) ) {

            if( $pofo_portfolio_style == 'portfolio-style-5' ) {
                $pofo_featured_array[] = '.hover-option5 .grid-item:hover .portfolio-hover-box { background-color:'.$pofo_box_hover_bg_color.';}';
            } else if( $pofo_portfolio_style == 'portfolio-style-7' ) {
                $pofo_featured_array[] = '.portfolio-grid .grid-item figure { background-color:'.$pofo_box_hover_bg_color.';}';
            } else if( $pofo_portfolio_style == 'portfolio-style-8' ) {
                $pofo_featured_array[] = '.portfolio-grid .grid-item figure:hover figcaption .portfolio-hover-main { background-color:'.$pofo_box_hover_bg_color.';}';
            } else if( $pofo_portfolio_style == 'portfolio-style-11' ) {
                $pofo_featured_array[] = '.portfolio-grid .grid-item a:hover .portfolio-img { background-color:'.$pofo_box_hover_bg_color.';}';
            } else {
                $pofo_featured_array[] = '.portfolio-grid .grid-item figure:hover .portfolio-img { background-color:'.$pofo_box_hover_bg_color.';}';
            }
        }

        if( $pofo_box_hover_title_color && $pofo_portfolio_style == 'portfolio-style-11' ) {
            $pofo_featured_array[] = ( $pofo_box_hover_title_color ) ? '.portfolio-grid .grid-item a:hover .portfolio-item-title { color:'.$pofo_box_hover_title_color.';}' : '';
        }

        $filter_class = $filter_class_style = '';

        // Hover Box Allignment settings
        $alignment_class .= !empty( $desktop_alignment ) ? $desktop_alignment . ' ' : '';
        $alignment_class .= !empty( $desktop_mini_alignment ) ? $desktop_mini_alignment . ' ' : '';
        $alignment_class .= !empty( $ipad_alignment ) ? $ipad_alignment . ' ' : '';
        $alignment_class .= !empty( $mobile_alignment ) ? $mobile_alignment . ' ' : '';
        
        // Hover Box Vertical Allignment settings
        $vertical_alignment_class .= !empty( $vertical_desktop_alignment ) ? $vertical_desktop_alignment . ' ' : '';
        $vertical_alignment_class .= !empty( $vertical_desktop_mini_alignment ) ? $vertical_desktop_mini_alignment . ' ' : '';
        $vertical_alignment_class .= !empty( $vertical_ipad_alignment ) ? $vertical_ipad_alignment . ' ' : '';
        $vertical_alignment_class .= !empty( $vertical_mobile_alignment ) ? $vertical_mobile_alignment . ' ' : '';

        // Pagination
        if( $pofo_show_pagination == 1 ) {
            switch( $pofo_pagination_style ) {
                case 'infinite-scroll-pagination':
                    $classes[] = ' portfolio-infinite-scroll-pagination';
                    $pofo_portfolio_classes_infinite_scroll = ' portfolio-single-post';
                break;
            }
        }

        //Unique Style Class
        $classes[] = $pofo_portfolio_style;
        $classes[] = $pofo_portfolio_id;

        // Class List
        $class_list = !empty( $classes ) ? implode(" ", $classes) : '';
        
        $categories_to_display_ids = explode(",",$pofo_categories_list);
        if ( is_array( $categories_to_display_ids ) && $categories_to_display_ids[0] == '0' ) {
            unset( $categories_to_display_ids[0] );
            $categories_to_display_ids = array_values( $categories_to_display_ids );
        }
        // If no categories are chosen or "All categories", we need to load all available categories
        if ( ! is_array( $categories_to_display_ids ) || count( $categories_to_display_ids ) == 0 ) {
            $terms = get_terms( 'portfolio-category' );
            
            if ( ! is_array( $categories_to_display_ids ) ) {
                $categories_to_display_ids = array();
            }
            if( !empty( $terms ) && !is_wp_error( $terms ) ) {
                foreach ( $terms as $term ) {
                    $categories_to_display_ids[] = $term->slug;
                }
            }
        }
        
        $portfolio_columns = ( $pofo_portfolio_columns ) ? 'work-'.$pofo_portfolio_columns.'col ' : '';
        if($id):
            $output .='<div '.$id.'">';
        endif;
        
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged'); 
        } else if ( get_query_var('page') ) {
            $paged = get_query_var('page'); 
        } else {
            $paged = 1;
        }

        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => $pofo_post_per_page,
            'orderby' => $pofo_orderby,
            'order' => $pofo_order,
            'paged' => $paged,
        );
        if( !empty( $pofo_categories_list ) ) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'portfolio-category',
                    'field' => 'slug',
                    'terms' => $categories_to_display_ids
               ),
            );
        }
        $portfolio_posts = new WP_Query( $args );

        switch ($pofo_portfolio_style) {
            case 'portfolio-style-1':

                $output .='<ul class="portfolio-grid hover-option1 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_zoom_on_hover.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = !empty( $thumbnail_id ) ? wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset ) : '';
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img bg-deep-pink pofo-portfolio-page-background">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative">';
                                                    if($pofo_show_separator == 1):
                                                        $output .='<div class="bg-black margin-six-bottom separator-line-horrizontal-medium-light2 display-inline-block"'.$separator_style.'></div>';
                                                    endif;
                                                    if($pofo_show_title == 1):
                                                        $output .='<'.$pofo_title_element_tag.' class="text-white line-height-normal alt-font margin-one-half-bottom display-block font-weight-600'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                    endif;
                                                    if($pofo_show_category == 1 && !empty( $cat_name )):
                                                        $output .='<p class="text-white text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';
                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-2':

                $output .='<ul class="portfolio-grid hover-option2 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_zoom_on_hover.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img bg-deep-pink pofo-portfolio-page-background">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative">';
                                                    if($pofo_show_separator == 1):
                                                        $output .='<div class="bg-black margin-20px-bottom separator-line-horrizontal-medium-light2 display-inline-block"'.$separator_style.'></div>';
                                                    endif;
                                                    if($pofo_show_title == 1):
                                                        $output .='<'.$pofo_title_element_tag.' class="text-white line-height-normal alt-font margin-one-half-bottom display-block font-weight-600'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                    endif;
                                                    if($pofo_show_category == 1 && !empty( $cat_name )):
                                                        $output .='<p class="text-white text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-3':

                $class_list .= $pofo_show_lightbox == 1 ? ' lightbox-portfolio' : '';
                $output .='<ul class="portfolio-grid hover-option4 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                        $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                        $pofo_full_url= wp_get_attachment_image_url( $thumbnail_id, 'full' ); // Lightbox image
                        $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                        $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                        $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                        $srcset = $srcset_data = $sizes = $sizes_data = '';
                        $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $image_url = $pofo_show_lightbox == 1 ? $image_url : $pofo_portfolio_external_link;

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .='<a href="'.$pofo_full_url.'"'.$image_lightbox_title.$image_lightbox_caption.' class="gallery-link">';
                                $output .='<figure>';

                                    if($image_url):
                                        $img_class = $pofo_show_lightbox == 1 ? 'project-img-gallery' : '';
                                        $output .= '<div class="portfolio-img bg-extra-dark-gray pofo-portfolio-page-background">';
                                            $output .= '<img class="'.$img_class.'" src="'.esc_url($image_url).'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;
                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative">';
                                                    if($pofo_show_lightbox == 1):
                                                        $output .='<i class="ti-zoom-in text-white fa-2x"></i>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-4':

                $output .='<ul class="portfolio-grid hover-option4 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img bg-extra-dark-gray pofo-portfolio-page-background">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative">';
                                                    if($pofo_show_separator == 1):
                                                        $output .='<div class="bg-deep-pink margin-25px-bottom separator-line-horrizontal-medium-light3 display-inline-block"'.$separator_style.'></div>';
                                                    endif;
                                                    if($pofo_show_title == 1):
                                                        $output .='<'.$pofo_title_element_tag.' class="text-white line-height-normal alt-font margin-5px-bottom display-block font-weight-600'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                    endif;
                                                    if($pofo_show_category == 1 && !empty( $cat_name )):
                                                        $output .='<p class="text-medium-gray text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-5':

                $output .='<ul class="portfolio-grid hover-option5 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item pofo-portfolio-page-opacity '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_zoom_on_hover.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img pofo-portfolio-page-background">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative last-paragraph-no-margin">';
                                                    if($pofo_show_separator == 1):
                                                        $output .='<div class="bg-deep-pink separator-line-horrizontal-medium-light2 display-inline-block position-relative"'.$separator_style.'></div>';
                                                    endif;
                                                    if($pofo_show_title == 1):
                                                        $output .='<'.$pofo_title_element_tag.' class="font-weight-600 alt-font text-white margin-5px-bottom display-block'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                    endif;
                                                    if($pofo_show_category == 1 && !empty( $cat_name )):
                                                        $output .='<p class="text-medium-gray text-extra-small'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-6':

                $class_list .= $pofo_show_lightbox == 1 ? ' lightbox-portfolio' : '';
                $output .='<ul class="portfolio-grid hover-option6 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .='<figure>';

                                $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                $pofo_full_url= wp_get_attachment_image_url( $thumbnail_id, 'full' ); // Lightbox image
                                $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                $srcset = $srcset_data = $sizes = $sizes_data = '';
                                $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $srcset ){
                                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                }

                                $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $sizes ){
                                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                }

                                if($image_url):
                                    $output .= '<div class="portfolio-img bg-deep-pink position-relative text-center overflow-hidden pofo-portfolio-page-background">';
                                        $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        if( $pofo_show_internal_link == 1 || $pofo_show_lightbox == 1 ):
                                            $output .= '<div class="portfolio-icon">';
                                                if($pofo_show_internal_link == 1):
                                                    $output .= '<a class="text-center" href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'><i class="fas fa-link text-extra-dark-gray" aria-hidden="true"></i></a>';
                                                endif;
                                                if($pofo_show_lightbox == 1):
                                                    $output .= '<a class="gallery-link" '.$image_lightbox_title.$image_lightbox_caption.' href="'.$pofo_full_url.'"><i class="fas fa-search text-extra-dark-gray" aria-hidden="true"></i></a>';
                                                endif;
                                            $output .= '</div>';
                                        endif;
                                    $output .= '</div>';

                                endif;

                                $output .='<figcaption>';
                                    $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                        $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                            $output .='<div class="portfolio-hover-content position-relative">';
                                                if($pofo_show_title == 1):
                                                    $output .='<'.$pofo_title_element_tag.' class="display-block"><a class="line-height-normal font-weight-600 text-small alt-font margin-5px-bottom text-extra-dark-gray'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.' href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>'.get_the_title().'</a></'.$pofo_title_element_tag.'>';
                                                endif;
                                                if($pofo_show_category == 1 && !empty( $cat_name )):
                                                    $output .='<p class="text-medium-gray text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                endif;
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</div>';
                                $output .='</figcaption>';

                            $output .='</figure>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-7':

                $output .='<ul class="portfolio-grid hover-option7 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                $output .='<div class="portfolio-hover-content position-relative">';
                                                    if($pofo_show_title == 1):
                                                        $output .='<'.$pofo_title_element_tag.' class="text-black line-height-normal alt-font margin-5px-bottom display-block font-weight-600'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                    endif;
                                                    if($pofo_show_category == 1 && !empty( $cat_name )):
                                                        $output .='<p class="text-medium-gray text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                    endif;
                                                $output .='</div>';
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-8':

                $output .='<ul class="portfolio-grid hover-option8 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_zoom_on_hover.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';
                                $output .='<figure>';

                                    $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                    $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                    $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                    $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                    $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                    $srcset = $srcset_data = $sizes = $sizes_data = '';
                                    $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $srcset ){
                                        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                    }

                                    $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                    if( $sizes ){
                                        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                    }

                                    if($image_url):
                                        $output .= '<div class="portfolio-img pofo-portfolio-page-background">';
                                            $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                        $output .= '</div>';
                                        $output .= '<div class="border-animation"></div>';
                                    endif;

                                    $output .='<figcaption>';
                                        $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                            $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                                if( $pofo_show_plus_icon == 1 ):
                                                    $output .= '<div class="portfolio-icon alt-font font-weight-600 icon-medium"'.$pofo_plus_icon_color.'>+</div>';
                                                endif;
                                                if($pofo_show_title == 1):
                                                    $output .='<'.$pofo_title_element_tag.' class="text-medium alt-font text-extra-dark-gray margin-5px-bottom'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                                endif;
                                                if($pofo_show_category == 1 && !empty( $cat_name )):
                                                    $output .='<p class="no-letter-spacing text-small no-margin-bottom text-medium-gray'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                endif;
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</figcaption>';

                                $output .='</figure>';
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-9':
            
                $class_list .= $pofo_show_lightbox == 1 ? ' lightbox-portfolio' : '';
                $output .='<div class="justified-gallery no-transition '.$class_list.'"'.$style_attr.' data-height="'.$pofo_justified_portfolio_height.'" data-spacing="'.$pofo_justified_portfolio_gap.'" data-uniqueid="'.$pofo_portfolio_id.'">';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) && $pofo_show_title == 1 ? ' data-lightbox-caption="'.get_the_title().'"' : '' ;
                        $image_lightbox_title   = !empty( $img_lightbox_title['title'] ) && $pofo_show_title == 1 ? ' title="'.get_the_title().'"' : '' ;

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                        $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                        $pofo_full_url= wp_get_attachment_image_url( $thumbnail_id, 'full' ); // Lightbox image
                        $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                        $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                        $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                        $srcset = $srcset_data = $sizes = $sizes_data = '';
                        $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $portfolio_classes = array(
                                                    'hentry',
                                                    'gallery-link',
                                                    $cat_slug,
                                                    $pofo_animation_style,
                                                    $pofo_portfolio_classes_infinite_scroll,
                                                );
                        $pofo_portfolio_classes = get_post_class( $portfolio_classes );
                        $pofo_portfolio_classes = !empty( $pofo_portfolio_classes ) ? ' class="' . implode( ' ', $pofo_portfolio_classes ) . '"' : '';

                        $output .='<!-- start gallery item -->';

                            if($image_url):
                                $portfolio_url  = $pofo_show_lightbox == 1 ? $pofo_full_url : $pofo_portfolio_external_link;
                                $image_alt      = $pofo_show_lightbox == 1 && $pofo_show_title == 1 ? ' alt="'.get_the_title().'"' : $image_alt;
                                $output .= '<a href="'.esc_url( $portfolio_url ).'"'.$pofo_portfolio_classes.$image_lightbox_title.$image_lightbox_caption.$pofo_animation_delay_attr.$pofo_portfolio_link_target.'>';
                                    $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' />';
                                    if( $pofo_show_title == 1 || ( $pofo_show_category == 1 && !empty( $cat_name ) ) ):
                                        $output .= '<div class="caption pofo-portfolio-page-background"'.$pofo_caption_bg_color.'>';
                                            if($pofo_show_title == 1):
                                                $output .= '<div class="entry-title'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</div>';
                                            endif;
                                            if($pofo_show_category == 1 && !empty( $cat_name )):
                                                $output .= '<span class="'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.$cat_name.'</span>';
                                            endif;
                                        $output .= '</div>';
                                    endif;
                                $output .= '</a>';
                            endif;

                        $output .='<!-- end gallery item -->';
                
                    endwhile;
                    wp_reset_postdata();
                $output .='</div>';

                ob_start(); ?>
                $(document).ready(function () { $(document).imagesLoaded(function () { if ($('.<?php echo $pofo_portfolio_id; ?>').length > 0) { $('.<?php echo $pofo_portfolio_id; ?>').justifiedGallery({ rowHeight: <?php echo $pofo_justified_portfolio_height ?>, maxRowHeight: false, captions: true, margins: <?php echo $pofo_justified_portfolio_gap ?>, waitThumbnailsLoad: true }); } }); });
                <?php 
                $pofo_slider_script .= ob_get_contents();
                ob_end_clean();

            break;
            case 'portfolio-style-10':

                $class_list .= $pofo_show_lightbox == 1 ? ' lightbox-portfolio' : '';
                $output .='<ul class="portfolio-grid hover-option10 '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_zoom_on_hover.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .='<figure>';

                                $thumbnail_id   = get_post_thumbnail_id( get_the_ID() );
                                $thumb          = wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset );
                                $pofo_full_url= wp_get_attachment_image_url( $thumbnail_id, 'full' ); // Lightbox image
                                $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                $srcset = $srcset_data = $sizes = $sizes_data = '';
                                $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $srcset ){
                                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                }

                                $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $sizes ){
                                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                }

                                if($image_url):
                                    $output .= '<div class="portfolio-img bg-black pofo-portfolio-page-background">';
                                        $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                    $output .= '</div>';
                                endif;

                                $output .='<figcaption>';
                                    $output .='<div class="'.$alignment_class.'portfolio-hover-main">';
                                        $output .='<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                            if( $pofo_show_internal_link == 1 || $pofo_show_lightbox == 1 ):
                                                $output .= '<div class="portfolio-icon">';
                                                    if($pofo_show_internal_link == 1):
                                                        $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'><i class="fas fa-link" aria-hidden="true"></i></a>';
                                                    endif;
                                                    if($pofo_show_lightbox == 1):
                                                        $output .= '<a class="gallery-link"'.$image_lightbox_title.$image_lightbox_caption.' href="'.$pofo_full_url.'"><i class="fas fa-search" aria-hidden="true"></i></a>';
                                                    endif;
                                                $output .= '</div>';
                                            endif;
                                            $output .='<div class="portfolio-hover-content">';
                                                if($pofo_show_title == 1):
                                                    $output .='<span class="font-weight-600 line-height-normal alt-font text-white margin-5px-bottom display-block'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</span>';
                                                endif;
                                                if($pofo_show_category == 1 && !empty( $cat_name )):
                                                    $output .='<p class="text-medium-gray text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                                endif;
                                            $output .='</div>';
                                        $output .='</div>';
                                    $output .='</div>';
                                $output .='</figcaption>';

                            $output .='</figure>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;
            case 'portfolio-style-11':

                $output .='<ul class="portfolio-grid hover-option11 alt-font '.$portfolio_columns.$class_list.'"'.$style_attr.' data-uniqueid="'.$pofo_portfolio_id.'">';
                    $output .='<li class="grid-sizer"></li>';
                    
                    $i = 0;
                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();

                        $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

                        $i++;
                        $double_grid_class = !empty( $double_grid_position ) && in_array( $i, $double_grid_position ) ? 'grid-item-double ' : '';

                        /* Image Alt, Title, Caption */
                        $thumbnail_id   = get_post_thumbnail_id();
                        $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                        $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                        $image_alt      = !empty( $img_alt['alt'] ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = !empty( $img_title['title'] ) ? ' title="'.$img_title['title'].'"' : '';

                        $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
                        $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
                        $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
                        $image_lightbox_title   = ' title="'.get_the_title().'"';

                        $cat_slug = '';
                        $cat = get_the_terms( get_the_ID(), 'portfolio-category' );
                        if( !empty( $cat ) && !is_wp_error( $cat ) ) {
                            foreach ($cat as $key => $c) {
                                $cat_slug .= 'portfolio-filter-'.$c->term_id.'-'.$pofo_portfolio_id." ";
                            }
                        }

                        $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
                        $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
                        $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
                        $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
                        $pofo_portfolio_link_target     = !empty( $pofo_portfolio_link_target ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

                        $cat_name = pofo_post_meta( 'pofo_subtitle' );

                        $pofo_portfolio_classes = '';
                        ob_start();
                            post_class('pofo-rich-snippet display-none');
                            $pofo_portfolio_classes .= ob_get_contents();
                        ob_end_clean();

                        $output .='<li class="grid-item '.$double_grid_class.$cat_slug.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                            $output .= '<div '.$pofo_portfolio_classes.'>';
                                $output .= '<div class="pofo-rich-snippet display-none">';
                                    $output .= '<span class="entry-title">'.get_the_title().'</span>';
                                    
                                    $output .= '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                                    $output .= '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                                $output .= '</div>';
                            $output .= '</div>';
                            $output .= '<a href="'.esc_url( $pofo_portfolio_external_link ).'"'.$pofo_portfolio_link_target.'>';

                                $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
                                $thumb          = !empty( $thumbnail_id ) ? wp_get_attachment_image_src( $thumbnail_id, $pofo_image_srcset ) : '';
                                $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
                                $image_width    = !empty( $thumb['1'] ) ? $thumb['1'] : '';
                                $image_height   = !empty( $thumb['2'] ) ? $thumb['2'] : '';

                                $srcset = $srcset_data = $sizes = $sizes_data = '';
                                $srcset = !empty( $thumbnail_id ) ? wp_get_attachment_image_srcset( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $srcset ){
                                    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                                }

                                $sizes = !empty( $thumbnail_id ) ? wp_get_attachment_image_sizes( $thumbnail_id, $pofo_image_srcset ) : '';
                                if( $sizes ){
                                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                                }

                                if($image_url):
                                    $output .= '<div class="portfolio-img bg-extra-dark-gray">';
                                        $output .= '<img src="'.$image_url.'" width="'.$image_width.'" height="'.$image_height.'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'>';
                                    $output .= '</div>';
                                endif;

                                if($pofo_show_title == 1):
                                    $output .='<'.$pofo_title_element_tag.' class="portfolio-item-title'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                endif;
                            $output .='</a>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                $output .='</ul>';
        
            break;

        }

        // POrtfolio Pagination
        if( $pofo_show_pagination == 1 && $portfolio_posts->max_num_pages > 1 ){

            if( $pofo_pagination_style == 'infinite-scroll-pagination'  ) {
                $output .='<div class="pagination pofo-portfolio-infinite-scroll display-none" data-pagination="'.$portfolio_posts->max_num_pages.'">';
                    ob_start();
                        if( get_next_posts_link( '', $portfolio_posts->max_num_pages ) ) :
                            next_posts_link( '<span class="old-post">'.esc_html__( 'Older Portfolio', 'pofo-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $portfolio_posts->max_num_pages );
                        endif;
                    $output .= ob_get_contents();  
                    ob_end_clean();  
                $output .='</div>';

            } else {
                $portfolio_posts->query_vars['paged'] > 1 ? $current = $portfolio_posts->query_vars['paged'] : $current = 1;
                $output .= '<div class=" text-center margin-70px-top sm-margin-30px-top clear-both float-left width-100">';
                $output .= '<div class="text-small text-uppercase text-extra-dark-gray pagination">';
                    $output .= paginate_links( array(
                        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                        'format'       => '',
                        'add_args'     => '',
                        'current'      => $current,
                        'total'        => $portfolio_posts->max_num_pages,
                        'prev_text'    => '<i class="fas fa-long-arrow-alt-left margin-5px-right"></i> <span class="xs-display-none border-none">'.esc_html( 'Prev','pofo-addons').'</span>',
                        'next_text'    => '<span class="xs-display-none border-none">'.esc_html( 'Next', 'pofo-addons').'</span> <i class="fas fa-long-arrow-alt-right margin-5px-left"></i>',
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 2
                    ) );
                $output .= '</div>';
                $output .= '</div>';
            }
        }
        
        if($id):
            $output .='</div>';
        endif;
                                
        return $output;
    }
}
add_shortcode( 'pofo_portfolio', 'pofo_portfolio_shortcode' );
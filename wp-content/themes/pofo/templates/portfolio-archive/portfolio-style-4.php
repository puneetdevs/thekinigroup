<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    // Define variables
    $pofo_show_separator = get_theme_mod( 'pofo_portfolio_archive_page_show_separator', '1' );
    $pofo_portfolio_archive_page_animation = get_theme_mod( 'pofo_portfolio_archive_page_animation', '' );
    $pofo_portfolio_archive_page_column = get_theme_mod( 'pofo_portfolio_archive_page_column', '2' );
    $pofo_portfolio_archive_page_portfolio_metro = get_theme_mod( 'pofo_portfolio_archive_page_portfolio_metro', '0' );
    $pofo_portfolio_archive_page_spacing_between_columns = get_theme_mod( 'pofo_portfolio_archive_page_spacing_between_columns', '' );
    $pofo_portfolio_archive_page_double_grid_position = get_theme_mod( 'pofo_portfolio_archive_page_double_grid_position', '' );

   	$pofo_portfolio_archive_page_desktop_alignment = get_theme_mod( 'pofo_portfolio_archive_page_desktop_alignment', 'text-left' );
   	$pofo_portfolio_archive_page_desktop_mini_alignment = get_theme_mod( 'pofo_portfolio_archive_page_desktop_mini_alignment', '' );
   	$pofo_portfolio_archive_page_ipad_alignment = get_theme_mod( 'pofo_portfolio_archive_page_ipad_alignment', '' );
   	$pofo_portfolio_archive_page_mobile_alignment = get_theme_mod( 'pofo_portfolio_archive_page_mobile_alignment', '' );
   	$pofo_portfolio_archive_page_desktop_vertical_alignment = get_theme_mod( 'pofo_portfolio_archive_page_desktop_vertical_alignment', 'vertical-align-bottom' );
   	$pofo_portfolio_archive_page_mini_desktop_vertical_alignment = get_theme_mod( 'pofo_portfolio_archive_page_mini_desktop_vertical_alignment', '' );
   	$pofo_portfolio_archive_page_ipad_vertical_alignment = get_theme_mod( 'pofo_portfolio_archive_page_ipad_vertical_alignment', '' );
   	$pofo_portfolio_archive_page_mobile_vertical_alignment = get_theme_mod( 'pofo_portfolio_archive_page_mobile_vertical_alignment', '' );

   	$pofo_portfolio_archive_page_title_font_size = get_theme_mod( 'pofo_portfolio_archive_page_title_font_size', '' );
   	$pofo_portfolio_archive_page_title_line_height = get_theme_mod( 'pofo_portfolio_archive_page_title_line_height', '' );
   	$pofo_portfolio_archive_page_title_letter_spacing = get_theme_mod( 'pofo_portfolio_archive_page_title_letter_spacing', '' );
   	$pofo_portfolio_archive_page_title_font_weight = get_theme_mod( 'pofo_portfolio_archive_page_title_font_weight', '' );
   	$pofo_portfolio_archive_page_title_font_italic = get_theme_mod( 'pofo_portfolio_archive_page_title_font_italic', '0' );
   	$pofo_portfolio_archive_page_title_font_underline = get_theme_mod( 'pofo_portfolio_archive_page_title_font_underline', '0' );
   	$pofo_portfolio_archive_page_title_text_transform = get_theme_mod( 'pofo_portfolio_archive_page_title_text_transform', 'text-uppercase' );
   	$pofo_portfolio_archive_page_title_element_tag = get_theme_mod( 'pofo_portfolio_archive_page_title_element_tag', '' );
   	$pofo_portfolio_archive_page_title_auto_responsive_font_size = get_theme_mod( 'pofo_portfolio_archive_page_title_auto_responsive_font_size', '0' );
   	$pofo_portfolio_archive_page_subtitle_font_size = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_font_size', '' );
   	$pofo_portfolio_archive_page_subtitle_line_height = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_line_height', '' );
   	$pofo_portfolio_archive_page_subtitle_letter_spacing = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_letter_spacing', '' );
   	$pofo_portfolio_archive_page_subtitle_font_weight = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_font_weight', '' );
   	$pofo_portfolio_archive_page_subtitle_auto_responsive_font_size = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_auto_responsive_font_size', '0' );
   	$pofo_portfolio_archive_page_subtitle_text_transform = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_text_transform', 'text-uppercase' );
   	$pofo_show_category = get_theme_mod( 'pofo_portfolio_archive_page_show_subtitle', '1' );
   	$pofo_show_title = get_theme_mod( 'pofo_portfolio_archive_page_show_title', '1' );
   	$pofo_portfolio_archive_page_show_lightbox = get_theme_mod( 'pofo_portfolio_archive_page_show_lightbox', '0' );
    $pofo_image_srcset_portfolio_archive = get_theme_mod( 'pofo_image_srcset_portfolio_archive', 'full' );
    $pofo_show_pagination_archive = get_theme_mod( 'pofo_show_pagination_portfolio_archive', '1' );
    $pofo_portfolio_pagination_style_archive = get_theme_mod( 'pofo_pagination_style_portfolio_archive', '' );
    
    $portfolio_columns = $alignment_class = $vertical_alignment_class = $pofo_title_style_attr = $pofo_subtitle_style_attr = $pofo_portfolio_classes_infinite_scroll = '';
    $classes = $pofo_title_style_array = $pofo_subtitle_style_array = array();

    // Pagination
    if( $pofo_show_pagination_archive == 1 ) {
        switch( $pofo_portfolio_pagination_style_archive ) {
            case 'infinite-scroll-pagination':
                $classes[] = ' portfolio-infinite-scroll-pagination';
                $pofo_portfolio_classes_infinite_scroll = ' portfolio-single-post';
            break;
        }
    }

    // Animation
    $pofo_animation_style = ( $pofo_portfolio_archive_page_animation ) ? ' wow '.$pofo_portfolio_archive_page_animation : '';

    $portfolio_columns = ( $pofo_portfolio_archive_page_column ) ? 'work-'.$pofo_portfolio_archive_page_column.'col ' : '';
    ( $pofo_portfolio_archive_page_portfolio_metro == 1 ) ? $classes[] = 'portfolio-metro-grid' : '';
    ( $pofo_portfolio_archive_page_spacing_between_columns ) ? $classes[] = $pofo_portfolio_archive_page_spacing_between_columns : '';

    $double_grid_position = !empty( $pofo_portfolio_archive_page_double_grid_position ) ? explode(',', $pofo_portfolio_archive_page_double_grid_position) : array();
    
    // Class List
    $class_list = !empty( $classes ) ? implode(" ", $classes) : '';

    
    // Hover Box Allignment settings
    $alignment_class .= !empty( $pofo_portfolio_archive_page_desktop_alignment ) ? $pofo_portfolio_archive_page_desktop_alignment . ' ' : '';
    $alignment_class .= !empty( $pofo_portfolio_archive_page_desktop_mini_alignment ) ? $pofo_portfolio_archive_page_desktop_mini_alignment . ' ' : '';
    $alignment_class .= !empty( $pofo_portfolio_archive_page_ipad_alignment ) ? $pofo_portfolio_archive_page_ipad_alignment . ' ' : '';
    $alignment_class .= !empty( $pofo_portfolio_archive_page_mobile_alignment ) ? $pofo_portfolio_archive_page_mobile_alignment . ' ' : '';

    // Hover Box Vertical Allignment settings
    $vertical_alignment_class .= !empty( $pofo_portfolio_archive_page_desktop_vertical_alignment ) ? $pofo_portfolio_archive_page_desktop_vertical_alignment . ' ' : '';
    $vertical_alignment_class .= !empty( $pofo_portfolio_archive_page_mini_desktop_vertical_alignment ) ? $pofo_portfolio_archive_page_mini_desktop_vertical_alignment . ' ' : '';
    $vertical_alignment_class .= !empty( $pofo_portfolio_archive_page_ipad_vertical_alignment ) ? $pofo_portfolio_archive_page_ipad_vertical_alignment . ' ' : '';
    $vertical_alignment_class .= !empty( $pofo_portfolio_archive_page_mobile_vertical_alignment ) ? $pofo_portfolio_archive_page_mobile_vertical_alignment . ' ' : '';

    // For Title Style
    !empty( $pofo_portfolio_archive_page_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_portfolio_archive_page_title_font_size . ';' : '';
    !empty( $pofo_portfolio_archive_page_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_portfolio_archive_page_title_line_height . ';' : '';
    !empty( $pofo_portfolio_archive_page_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_portfolio_archive_page_title_letter_spacing . ';' : '';
    !empty( $pofo_portfolio_archive_page_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_portfolio_archive_page_title_font_weight . ';' : '';
    ( $pofo_portfolio_archive_page_title_font_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
    ( $pofo_portfolio_archive_page_title_font_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';

    $pofo_title_text_transform = !empty( $pofo_portfolio_archive_page_title_text_transform ) ? ' ' . $pofo_portfolio_archive_page_title_text_transform : '';
    $pofo_title_element_tag = ( $pofo_portfolio_archive_page_title_element_tag ) ? $pofo_portfolio_archive_page_title_element_tag : 'span';
    $pofo_title_dynamic_font_size = $pofo_portfolio_archive_page_title_auto_responsive_font_size == 1 ? ' dynamic-font-size' : '';
    $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_portfolio_archive_page_title_font_size, $pofo_portfolio_archive_page_title_line_height );

    // For Subtitle Style
    !empty( $pofo_portfolio_archive_page_subtitle_font_size ) ? $pofo_subtitle_style_array[] = 'font-size: ' . $pofo_portfolio_archive_page_subtitle_font_size . ';' : '';
    !empty( $pofo_portfolio_archive_page_subtitle_line_height ) ? $pofo_subtitle_style_array[] = 'line-height: ' . $pofo_portfolio_archive_page_subtitle_line_height . ';' : '';
    !empty( $pofo_portfolio_archive_page_subtitle_letter_spacing ) ? $pofo_subtitle_style_array[] = 'letter-spacing: ' . $pofo_portfolio_archive_page_subtitle_letter_spacing . ';' : '';
    !empty( $pofo_portfolio_archive_page_subtitle_font_weight ) ? $pofo_subtitle_style_array[] = 'font-weight: ' . $pofo_portfolio_archive_page_subtitle_font_weight . ';' : '';

    $pofo_subtitle_dynamic_font_size = $pofo_portfolio_archive_page_subtitle_auto_responsive_font_size == 1 ? ' dynamic-font-size' : '';
    $pofo_subtitle_style_attr   = pofo_get_style_attribute( $pofo_subtitle_style_array, $pofo_portfolio_archive_page_subtitle_font_size, $pofo_portfolio_archive_page_subtitle_line_height );

    // For Category
    $pofo_category_text_transform = !empty( $pofo_portfolio_archive_page_subtitle_text_transform ) ? ' ' . $pofo_portfolio_archive_page_subtitle_text_transform : '';
    $class_list .= $pofo_portfolio_archive_page_show_lightbox == 1 ? ' lightbox-portfolio' : '';
    $img_class = $pofo_portfolio_archive_page_show_lightbox == 1 ? 'project-img-gallery' : '';

    echo '<ul class="portfolio-grid hover-option4 '.$portfolio_columns.$class_list.'">';
        echo '<li class="grid-sizer"></li>';
        
        $archive_count = 0;
        while ( have_posts() ) : the_post();

            $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $archive_count > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $archive_count ).'ms"' : '';

            $archive_count++;
            $double_grid_class = !empty( $double_grid_position ) && in_array( $archive_count, $double_grid_position ) ? 'grid-item-double ' : '';

            /* Image Alt, Title, Caption */
            $thumbnail_id   = get_post_thumbnail_id();
            $img_alt        = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
            $img_title      = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
            $image_alt      = !empty( $img_alt['alt'] ) ? $img_alt['alt'] : '' ; 
            $image_title    = !empty( $img_title['title'] ) ? $img_title['title'] : '';

            $img_lightbox_caption   = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_caption( $thumbnail_id ) : array();
            $img_lightbox_title     = !empty( $thumbnail_id ) ? pofo_option_lightbox_image_title( $thumbnail_id ) : array();
            $image_lightbox_caption = !empty( $img_lightbox_caption['caption'] ) ? ' data-lightbox-caption="'.$img_lightbox_caption['caption'].'"' : '' ;
            $image_lightbox_title   = ' title="'.get_the_title().'"';

            $img_attr = array(
	            'title' => $image_title,
	            'alt' => $image_alt,
	            'class' => $img_class,
	        );

            $pofo_portfolio_post_type       = pofo_post_meta( 'pofo_portfolio_post_type' );
            $pofo_portfolio_external_link   = pofo_post_meta( 'pofo_portfolio_external_link' );
            $pofo_portfolio_link_target     = pofo_post_meta( 'pofo_portfolio_link_target' );
            $pofo_portfolio_external_link   = ( !empty( $pofo_portfolio_external_link ) && $pofo_portfolio_post_type == 'link' ) ? $pofo_portfolio_external_link : get_permalink() ;
            $pofo_portfolio_link_target     = ( !empty( $pofo_portfolio_link_target ) && $pofo_portfolio_archive_page_show_lightbox != 1 ) ? ' target="'. $pofo_portfolio_link_target .'"' : ' target="_self"';

            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
            $thumb          = !empty( $thumbnail_id ) ? wp_get_attachment_image_src( $thumbnail_id, 'full' ) : ''; // Lightbox image
            $image_url      = !empty( $thumb['0'] ) ? $thumb['0'] : '';
            

            $portfolio_link = $pofo_portfolio_archive_page_show_lightbox == 1 ? $image_url : $pofo_portfolio_external_link ;

            $cat_name = get_post_meta( get_the_ID(), 'pofo_subtitle_single', true );
            $pofo_portfolio_archive_classes = '';
            ob_start();
                post_class('grid-item '.$double_grid_class.$pofo_animation_style.$pofo_portfolio_classes_infinite_scroll);
                $pofo_portfolio_archive_classes .= ob_get_contents();
            ob_end_clean();

            echo '<li '.$pofo_portfolio_archive_classes.$pofo_animation_delay_attr.'>';
                echo '<div class="pofo-rich-snippet display-none">';
                    echo '<span class="entry-title">'.get_the_title().'</span>';
                    
                    echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                    echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                echo '</div>';
                echo '<a href="'.esc_url( $portfolio_link ).'"'.$pofo_portfolio_link_target.' class="gallery-link">';
                    echo '<figure>';

                        if( has_post_thumbnail() ) {
                            echo '<div class="pofo-portfolio-archive-page-background portfolio-img bg-extra-dark-gray">';
                        		echo get_the_post_thumbnail( get_the_ID(), $pofo_image_srcset_portfolio_archive, $img_attr );
                            echo '</div>';
                        }

                        echo '<figcaption>';
                            echo '<div class="'.$alignment_class.'portfolio-hover-main">';
                                echo '<div class="'.$vertical_alignment_class.'portfolio-hover-box">';
                                    echo '<div class="portfolio-hover-content position-relative">';
                                        if($pofo_show_separator == 1):
                                            echo '<div class="pofo-portfolio-archive-page-separator bg-deep-pink margin-25px-bottom separator-line-horrizontal-medium-light3 display-inline-block"></div>';
                                        endif;
                                        if($pofo_show_title == 1):
                                            echo '<'.$pofo_title_element_tag.' class="pofo-portfolio-archive-page-title text-white line-height-normal alt-font margin-one-half-bottom display-block font-weight-600'.$pofo_title_text_transform.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>'.get_the_title().'</'.$pofo_title_element_tag.'>';
                                        endif;
                                        if($pofo_show_category == 1 && !empty( $cat_name )):
                                            echo '<p class="pofo-portfolio-archive-page-subtitle text-medium-gray text-extra-small no-margin-bottom'.$pofo_category_text_transform.$pofo_subtitle_dynamic_font_size.'"'.$pofo_subtitle_style_attr.'>'.esc_attr( $cat_name ).'</p>';
                                        endif;
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</figcaption>';

                    echo '</figure>';
                echo '</a>';
            echo '</li>';
        endwhile;
    echo '</ul>';
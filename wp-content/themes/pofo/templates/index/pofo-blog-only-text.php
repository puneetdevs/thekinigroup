<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }
    /* Define null variables */    
    $pofo_general_default_type_settings = '';
    $default_count = 0;

    /* Check default type */
    $pofo_blog_type_default = ( get_theme_mod( 'pofo_blog_type_default', '' ) ) ? get_theme_mod( 'pofo_blog_type_default', '' ) : '' ;
    $pofo_general_default_type_gutter = ( $pofo_blog_type_default ) ? $pofo_blog_type_default.' blog-post-gutter' : '' ;
    switch ( $pofo_blog_type_default ) {
        case 'gutter-large':
            $pofo_general_default_type_settings .= ' padding-10px-all';
            break;
        
        case 'gutter-medium':
            $pofo_general_default_type_settings .= ' padding-7px-all';
            break;

        case 'gutter-small':
            $pofo_general_default_type_settings .= ' padding-5px-all';
            break;

        case 'gutter-very-small':
            $pofo_general_default_type_settings .= ' padding-3px-all';
            break;

        default:
            $pofo_general_default_type_settings .= ' margin-30px-bottom xs-margin-15px-bottom';
            break;
    }
    while ( have_posts() ) : the_post();
        if( !is_sticky() ) {
            /* Check SRCSET */
            $pofo_srcset_default = get_theme_mod( 'pofo_image_srcset_default', 'full' );
            /* Check default style */
            $pofo_blog_premade_style_default = get_theme_mod( 'pofo_blog_premade_style_default', 'blog-list' );
            /* Check default column type */
            $pofo_blog_column_default = get_theme_mod( 'pofo_blog_column_default', '2' );
            /* Check if Post Type hide or show */
            $pofo_show_post_format_default = get_theme_mod( 'pofo_show_post_format_default', '1' );
           	/* Check if separator hide or show */
            $pofo_show_separator_default = get_theme_mod( 'pofo_show_separator_default', '1' );
            /* Check if title hide or show */
            $pofo_show_post_title_default = get_theme_mod( 'pofo_show_post_title_default', '1' );
            /* Check if post thumbnail hide or show */
            $pofo_show_post_thumbnail_default = get_theme_mod( 'pofo_show_post_thumbnail_default', '1' );
            /* Check if author hide or show */
            $pofo_show_post_author_default = get_theme_mod( 'pofo_show_post_author_default', '1' );
            /* Check if author image hide or show */
            $pofo_show_post_author_image_default = get_theme_mod( 'pofo_show_post_author_image_default', '0' );
            /* Check if date hide or show */
            $pofo_show_post_date_default = get_theme_mod( 'pofo_show_post_date_default', '1' );
            /* Check date format to show */
            $pofo_date_format_default = get_theme_mod( 'pofo_date_format_default', '' );
            /* Check if post excerpt hide or show */
            $pofo_show_excerpt_default = get_theme_mod( 'pofo_show_excerpt_default', '1' );
            /* Check post excerpt length to show */
            $pofo_excerpt_length_default = get_theme_mod( 'pofo_excerpt_length_default', '15' );
            /* Check if post content like hide or show */
            $pofo_show_content_default = get_theme_mod( 'pofo_show_content_default', '1' );
            /* Check if category like hide or show */
            $pofo_show_category_default = get_theme_mod( 'pofo_show_category_default', '1' );
            /* Check if pagination like hide or show */
            $pofo_show_pagination_default = get_theme_mod( 'pofo_show_pagination_default', '1' );
            /* Check if post like hide or show */
            $pofo_show_like_default = get_theme_mod( 'pofo_show_like_default', '0' );
            /* Check if post comment ike hide or show */
            $pofo_show_comment_default = get_theme_mod( 'pofo_show_comment_default', '0' );
            /* Check if button hide or show */
            $pofo_show_button_default = get_theme_mod( 'pofo_show_button_default', '1' );
            /* Check button text to show */
            $pofo_button_text_default = get_theme_mod( 'pofo_button_text_default', 'continue reading' );
            /* Check text transform for title to show */
            $pofo_blog_post_title_text_transform_default = ' '.get_theme_mod( 'pofo_blog_post_title_text_transform_default', '' );
            /* Check text transform for text to show */
            $pofo_blog_post_meta_text_transform_default = ' '.get_theme_mod( 'pofo_blog_post_meta_text_transform_default', 'text-uppercase' );
            /* Check font size for title */
            $pofo_title_font_size_default = get_theme_mod( 'pofo_title_font_size_default', '' );
            /* Check line height for title */
            $pofo_title_line_height_default = get_theme_mod( 'pofo_title_line_height_default', '' );
            /* Check letter spacing for title */
            $pofo_title_letter_spacing_default = get_theme_mod( 'pofo_title_letter_spacing_default', '' );
            /* Check font weight for title */
            $pofo_title_font_weight_default = get_theme_mod( 'pofo_title_font_weight_default', '' );
            /* Check italic for title */
            $pofo_title_italic_default = get_theme_mod( 'pofo_title_italic_default', '0' );
            /* Check underline for title */
            $pofo_title_underline_default = get_theme_mod( 'pofo_title_underline_default', '0' );
            /* Check if responsive font size for title */
            $pofo_title_enable_responsive_font_default = get_theme_mod( 'pofo_title_enable_responsive_font_default', '0' );
            /* Check animation to show */
            $pofo_animation_default = get_theme_mod( 'pofo_animation_default', '' );
            /* Check separator height to show */
            $pofo_seperator_height_default = get_theme_mod( 'pofo_seperator_height_default', '' );
            /* Check box border to show */
            $pofo_box_enable_border_default = ( get_theme_mod( 'pofo_box_enable_border_default', '' ) == '0' ) ? ' border-none': ' border-all' ;
            /* Check pagination style to show */
            $pofo_blog_pagination_style_default = get_theme_mod( 'pofo_blog_pagination_style_default', 'number-pagination' );

            $pofo_post_classes = $class_column = $author_image = $pofo_post_classes_masonry = $pofo_post_classes_infinite_scroll = '';
            if( $pofo_show_pagination_default == 1 ) {
                if( $pofo_blog_pagination_style_default == 'infinite-scroll-pagination' ) {
                    $pofo_post_classes_infinite_scroll = ' blog-single-post';
                }
            }
            ob_start();
                post_class();
                $pofo_post_classes .= ob_get_contents();
            ob_end_clean();

            $pofo_animation_default = ( $pofo_animation_default ) ? $class_column .= ' wow '.$pofo_animation_default : '';
            $pofo_general_default_type_settings = ( $pofo_general_default_type_settings ) ? $class_column .= $pofo_general_default_type_settings : '';
            switch ($pofo_blog_column_default) {
            	case '2':
            		$class_column .= ' col-md-6 col-sm-6 col-xs-12 ';
            	break;
            	case '3':
            		$class_column .= ' col-md-4 col-sm-6 col-xs-12 ';
            	break;
            	case '4':
            		$class_column .= ' col-md-3 col-sm-6 col-xs-12 ';
            	break;
                case '6':
                    $class_column .= ' col-lg-2 col-md-4 col-sm-6 col-xs-12 ';
                break;
            }
            $pofo_animation_delay_attr = ( $default_count > 0 ) ? ' data-wow-delay="'.$default_count.'ms"' : '';
            $post_format = get_post_format( get_the_ID() );
            $post_cat = $sep_style_attr = array();
            $categories = get_the_category();
            foreach ($categories as $k => $cat) {
                $cat_link = get_category_link($cat->cat_ID);
                $post_cat[]='<a href="'.$cat_link.'" class="text-medium-gray text-extra-small vertical-align-middle display-inline-block pofo-blog-post-meta" rel="category tag">'.$cat->name.'</a>';
            }
            $post_category = !empty( $post_cat ) ? implode(", ",$post_cat) : '';
            $pofo_title_style_array = $pofo_content_style_array = array();
            // For Title Style
            !empty( $pofo_title_font_size_default ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size_default . ';' : '';
            !empty( $pofo_title_line_height_default ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height_default . ';' : '';
            !empty( $pofo_title_letter_spacing_default ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing_default . ';' : '';
            !empty( $pofo_title_font_weight_default ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight_default . ';' : '';
            ( $pofo_title_italic_default == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
            ( $pofo_title_underline_default == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';

            $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font_default == 1 ? ' dynamic-font-size' : '';
            $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size_default, $pofo_title_line_height_default );

            $pofo_separator_height = ( $pofo_seperator_height_default ) ? $sep_style_array[] = 'height:'.$pofo_seperator_height_default.';' : '';

            $sep_style_attr = !empty( $sep_style_array ) ? ' style="'.implode(" ", $sep_style_array).'"' : '';

            /* Image Alt, Title, Caption */
            $img_alt = pofo_option_image_alt(get_post_thumbnail_id());
            $img_title = pofo_option_image_title(get_post_thumbnail_id());
            $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
            $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? $img_title['title'] : '';

            $img_attr = array(
                'title' => $image_title,
                'alt' => $image_alt,
            );

            $cnt = 0;
            $author_box_column = '';
            if( $pofo_show_post_author_default == 1 ) { $cnt++; }
            if( $pofo_show_like_default == 1 && function_exists( 'pofo_get_simple_likes_button' ) ){ $cnt++; }
            if( $pofo_show_comment_default == 1 && (comments_open() || get_comments_number())){ $cnt++; }
            switch ($cnt){
                case '1':
                   $author_box_column .= 'col-md-12 col-sm-12';
                    break;
                case '2':
                    $author_box_column .= 'col-md-6 col-sm-6';
                    break;
                case '3':
                    $author_box_column .= 'col-md-4 col-sm-4';
                    break;
            }

            $pofo_show_date = get_the_date( $pofo_date_format_default, get_the_ID());

            if( $pofo_show_post_author_image_default == 1 ) {
                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url($author_image_url).'" alt="'.get_the_author().'"> ';
            }
            $pofo_show_author   = $author_image.esc_html__('by','pofo').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n">'.get_the_author().'</a></span>';
            $post_cat = array();
            foreach ($categories as $k => $cat) {
                $cat_link = get_category_link($cat->cat_ID);
                $post_cat[]='<a href="'.$cat_link.'" class="pofo-blog-post-meta text-extra-small vertical-align-middle display-inline-block">'.$cat->name.'</a>';
            }
            $post_category = !empty( $post_cat ) ? implode(", ",$post_cat) : '';
            $author_date_array = array();
            if( $pofo_show_post_date_default == 1 ) {
                $author_date_array[] = '<span class="display-inline-block published vertical-align-middle">'.$pofo_show_date.'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format_default ).'</time>';
            }
            if( $pofo_show_category_default == 1 && $post_category ) {
                $author_date_array[] = $post_category;
            }
            
            echo '<div class="blog-post '.$class_column.$pofo_post_classes_infinite_scroll.'"'.$pofo_animation_delay_attr.'>';
                echo '<div '.$pofo_post_classes.'>';
                    if ( !post_password_required() ) {
                        if( $pofo_show_post_thumbnail_default == 1 ){
                            if( $post_format == 'image' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                    echo get_template_part( 'loop/index/loop', 'image' );
                                echo '</div>';
                            }elseif( $post_format == 'gallery' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                    echo get_template_part( 'loop/index/loop', 'gallery' );
                                echo '</div>';
                            }elseif( $post_format == 'video' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                    echo get_template_part( 'loop/index/loop', 'video' );
                                echo '</div>';
                            }elseif( $post_format == 'quote' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                    echo get_template_part( 'loop/index/loop', 'quote' );
                                echo '</div>';
                            }elseif( $post_format == 'audio' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                    echo get_template_part( 'loop/index/loop', 'audio' );
                                echo '</div>';
                            }else{
                                if( has_post_thumbnail() ) {
                                    echo '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                        $page_url = get_permalink();
                                        echo '<a href="'.esc_url( $page_url ).'">';
                                            echo get_the_post_thumbnail( get_the_ID(), $pofo_srcset_default, $img_attr );
                                        echo '</a>';
                                    echo '</div>';
                                }
                            }
                        }
                    }
                    echo '<div class="blog-post blog-post-style7 border-all border-color-light-gray padding-fourteen-all md-padding-ten-all bg-white position-relative pofo-default-post-description xs-no-margin-bottom pofo-default-box-background-color'.$pofo_box_enable_border_default.'">';
                        echo '<div class="post-details">';
                            if( !empty( $author_date_array ) ){
                                echo '<div class="pofo-blog-post-meta author text-extra-small display-block margin-10px-bottom xs-margin-5px-bottom'.$pofo_blog_post_meta_text_transform_default.'">';
                                    echo implode( '<span class="blog-separator display-inline-block vertical-align-middle">|</span>', $author_date_array );
                                echo '</div>';
                            }
                            if( $pofo_show_post_title_default == 1 ){
                                $page_url = get_permalink();
                                echo '<span class="text-large alt-font margin-50px-bottom sm-margin-30px-bottom display-block"><a href="'.esc_url( $page_url ).'" class="entry-title'.$pofo_title_dynamic_font_size.$pofo_blog_post_title_text_transform_default.'"'.$pofo_title_style_attr.'>'.get_the_title().'</a></span>';
                            }
                            if( $pofo_show_excerpt_default == 1 ){
                                $show_excerpt_grid = !empty( $pofo_excerpt_length_default ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length_default) : pofo_get_the_excerpt_theme(15);
                                echo '<div class="margin-ten-bottom display-block sm-margin-five-bottom entry-content">'.$show_excerpt_grid.'</div>';
                            }elseif($pofo_show_content_default == 1){
                                echo '<div class="margin-ten-bottom display-block sm-margin-five-bottom entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                            }
                            if( $pofo_show_separator_default == 1 ){
                                echo '<div class="pofo-post-sepataror separator-line-horrizontal-full bg-medium-light-gray margin-10px-bottom width-40"'.$sep_style_attr.'></div>';
                            }
                            if( $pofo_show_post_author_default == 1 ){
                                echo '<div class="author position-relative'.$pofo_blog_post_meta_text_transform_default.'">';
                                    if( $pofo_show_post_author_image_default == 1 ) {
                                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                        $author_image .= '<img class="border-radius-100 width-30px" src="'.esc_url($author_image_url).'" alt="'.get_the_author().'"> ';
                                    }
                                    echo '<span class="pofo-blog-post-meta text-extra-small">'.$pofo_show_author.'</span>';
                                echo '</div>';
                            }
                            if( $pofo_show_like_default == 1 || $pofo_show_comment_default == 1 ){
                                echo '<div class="pofo-blog-post-meta blog-like-comment margin-15px-top'.$pofo_blog_post_meta_text_transform_default.'">';
                                    if( $pofo_show_like_default == 1 && function_exists( 'pofo_get_simple_likes_button' ) ){
                                        echo pofo_get_simple_likes_button( get_the_ID() );
                                    }
                                    if( $pofo_show_comment_default == 1 && (comments_open() || get_comments_number())){
                                        echo comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo' ), 'comment' );
                                    }
                                echo '</div>';
                            }
                            if( $pofo_show_button_default == 1 ){
                                $page_url = get_permalink();
                                echo '<a href="'.esc_url( $page_url ).'" class="btn-black btn btn-very-small no-margin-bottom margin-15px-top white-space-normal">'.$pofo_button_text_default.'</a>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';  
        }
        $default_count++;
    endwhile;
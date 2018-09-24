<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }
    $default_count = 0;
    while ( have_posts() ) : the_post();
        if( !is_sticky() ) {
            /* Check SRCSET */
            $pofo_srcset_default = get_theme_mod( 'pofo_image_srcset_default', 'full' );
            /* Check default style */
            $pofo_blog_premade_style_default = get_theme_mod( 'pofo_blog_premade_style_default', 'blog-list' );
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
            /* Check pagination style to show */
            $pofo_blog_pagination_style_default = get_theme_mod( 'pofo_blog_pagination_style_default', 'number-pagination' );
            

            $pofo_post_classes = $class_column = $pofo_post_classes_infinite_scroll = '';
            if( $pofo_show_pagination_default == 1 ) {
                if( $pofo_blog_pagination_style_default == 'infinite-scroll-pagination' ) {
                    $pofo_post_classes_infinite_scroll = ' blog-single-post';
                }
            }
            $pofo_post_classes_infinite_scroll .= ' col-sm-12 col-xs-12';
            ob_start();
                post_class($pofo_post_classes_infinite_scroll);
                $pofo_post_classes .= ob_get_contents();
            ob_end_clean();

            $pofo_animation_default = ( $pofo_animation_default ) ? $class_column .= ' wow '.$pofo_animation_default : '';
            
            $pofo_animation_delay_attr = ( $default_count > 0 ) ? ' data-wow-delay="'.$default_count.'ms"' : '';
            $post_format = get_post_format( get_the_ID() );
            $post_cat = array();
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
            $author_box_column = $author_border_settings = $like_border_settings = '';
            if( $pofo_show_post_author_default == 1 ) { $cnt++; }
            if( $pofo_show_like_default == 1 && function_exists( 'pofo_get_simple_likes_button' ) ){ $cnt++; }
            if( $pofo_show_comment_default == 1 && (comments_open() || get_comments_number())){ $cnt++; }
            switch ($cnt){
                case '1':
                    $author_box_column .= 'col-md-12 col-sm-12';
                    $author_border_settings .= ' border-none';
                    $like_border_settings .= ' border-none';
                    break;
                case '2':
                    $author_box_column .= 'col-md-6 col-sm-6';
                    if( $pofo_show_post_author_default == 1 && $pofo_show_like_default == 1 ){
                        $author_border_settings .= ' border-right';
                        $like_border_settings .= ' border-none';
                    }else{
                        $author_border_settings .= ' border-right';
                        $like_border_settings .= ' border-right';
                    }
                    break;
                case '3':
                    $author_box_column .= 'col-md-4 col-sm-4';
                    $author_border_settings .= ' border-right';
                    $like_border_settings .= ' border-right';
                    break;
            }
            echo '<div id="post-'.get_the_ID().'" '.$pofo_post_classes.'>';
                echo '<div class="blog-post blog-post-content margin-60px-bottom xs-margin-30px-bottom xs-text-center'.$class_column.'"'.$pofo_animation_delay_attr.'>';
                	if ( !post_password_required() ) {
        	            if( $pofo_show_post_thumbnail_default == 1 ){
    	                    if( $post_format == 'image' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images">';
                                    echo get_template_part( 'loop/index/loop', 'image' );
                                echo '</div>';
                            } elseif ( $post_format == 'gallery' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images">';
                                    echo get_template_part( 'loop/index/loop', 'gallery' );
                                echo '</div>';
                            } elseif ( $post_format == 'video' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images">';
                                    echo get_template_part( 'loop/index/loop', 'video' );
                                echo '</div>';
                            } elseif ( $post_format == 'quote' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images">';
                                    echo get_template_part( 'loop/index/loop', 'quote' );
                                echo '</div>';
                            } elseif ( $post_format == 'audio' && $pofo_show_post_format_default != 1 ) {
                                echo '<div class="blog-post-images">';
                                    echo get_template_part( 'loop/index/loop', 'audio' );
                                echo '</div>';
                            } else {
                                if( has_post_thumbnail() ) {
                                    echo '<div class="blog-post-images">';
                                        $page_url = get_permalink();
                                        echo '<a href="'.esc_url( $page_url ).'">';
                                                echo get_the_post_thumbnail( get_the_ID(), $pofo_srcset_default, $img_attr );
                                        echo '</a>';
                                    echo '</div>';
                                }
                            }
        	            }
        	        }
                    echo '<div class="blog-text border-all display-inline-block width-100 pofo-default-box-background-color pofo-default-post-description">';
                        echo '<div class="content padding-50px-all xs-padding-20px-all xs-text-center">';
                            echo '<div class="text-medium-gray text-extra-small margin-5px-bottom alt-font pofo-blog-post-meta'.$pofo_blog_post_meta_text_transform_default.'">';
                                if( $pofo_show_post_date_default == 1 ) {
                                    echo '<span class="vertical-align-middle">'.esc_html__('posted on','pofo').' </span><span class="published vertical-align-middle">'.get_the_date( $pofo_date_format_default, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format_default ).'</time>';
                                }
                                
                                if( $pofo_show_post_date_default == 1 && $pofo_show_category_default == 1 ) {
                                    echo '<span class="blog-separator vertical-align-middle">|</span>';
                                }
                                if( $pofo_show_category_default == 1 && $post_category ){
                                        echo wp_kses($post_category, wp_kses_allowed_html( 'post' ));
                                }
                            echo '</div>';
                            if( $pofo_show_post_title_default == 1 ){
                                $page_url = get_permalink();
                                echo '<a class="text-extra-dark-gray alt-font text-large font-weight-600 margin-15px-bottom display-block entry-title'.$pofo_title_dynamic_font_size.$pofo_blog_post_title_text_transform_default.'" href="'.esc_url( $page_url ).'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                            }
                            
                            if( $pofo_show_excerpt_default == 1 ){
                                $show_excerpt_grid = !empty( $pofo_excerpt_length_default ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length_default) : pofo_get_the_excerpt_theme(15);
                                echo '<div class="no-margin entry-content">'.$show_excerpt_grid.'</div>';
                            }elseif($pofo_show_content_default == 1){
                                echo '<div class="no-margin entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                            }
                            if( $pofo_show_button_default == 1 ){
                                $page_url = get_permalink();
                                echo '<a href="'.esc_url( $page_url ).'" class="btn-black btn btn-very-small margin-30px-top xs-margin-20px-top white-space-normal">'.$pofo_button_text_default.'</a>';                                        
                            }
                        echo '</div>';
                        if( $pofo_show_post_author_default == 1 || $pofo_show_like_default == 1 || $pofo_show_comment_default == 1 ) {
                            echo '<div class="equalize xs-equalize-auto author border-top border-color-extra-light-gray display-table width-100">';
                                if( $pofo_show_post_author_default == 1 ) {
                                    echo '<div class="name '.$author_box_column.$author_border_settings.' padding-15px-all border-color-extra-light-gray xs-no-border pofo-layout-meta">';
                                        echo '<div class="display-table text-center width-100 height-100">';
                                            echo '<div class="display-table-cell vertical-align-middle'.$pofo_blog_post_meta_text_transform_default.'">';
                                                if( $pofo_show_post_author_image_default == 1 ) {
                                                    $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                                    echo '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt="'.get_the_author().'">';
                                                }
                                                echo '<span class="text-medium-gray text-extra-small alt-font pofo-blog-post-meta">'.esc_html__('by','pofo').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n pofo-blog-post-meta">'.get_the_author().'</a></span></span>';

                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_show_like_default == 1 && function_exists( 'pofo_get_simple_likes_button' ) ){
                                    echo '<div class="name '.$author_box_column.$like_border_settings.' padding-15px-all border-color-extra-light-gray xs-no-border alt-font pofo-layout-meta">';
                                        echo '<div class="display-table text-center width-100 height-100">';
                                            echo '<div class="display-table-cell vertical-align-middle'.$pofo_blog_post_meta_text_transform_default.'">';
                                                echo pofo_get_simple_likes_button( get_the_ID() );
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_show_comment_default == 1 && (comments_open() || get_comments_number())){
                                    echo '<div class="name '.$author_box_column.' padding-15px-all alt-font pofo-layout-meta">';
                                        echo '<div class="display-table text-center width-100 height-100">';
                                            echo '<div class="display-table-cell vertical-align-middle'.$pofo_blog_post_meta_text_transform_default.'">';
                                                    echo comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo' ), 'comment' );
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>'; 
        }
        $default_count++;
    endwhile;
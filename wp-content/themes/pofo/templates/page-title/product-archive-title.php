<?php
    $pofo_disable_product_archive_title = pofo_option('pofo_disable_product_archive_title', '1');

    if($pofo_disable_product_archive_title != 1 || is_404()) {
        return;
    }

    $pofo_product_archive_title = woocommerce_page_title( false );
    
    $parallax_effect = $pofo_product_archive_title_parallax_effect = $pofo_product_archive_title_parallax = $pofo_product_archive_title_bg_image = '';
    $pofo_product_archive_title_style = pofo_option('pofo_product_archive_title_style', 'page-title-style-9');
    $pofo_product_archive_title_opacity = pofo_option('pofo_product_archive_title_opacity', '0.7');
    $pofo_product_archive_title_opacity_style = ( $pofo_product_archive_title_opacity != '' ) ? ' style="opacity:'.$pofo_product_archive_title_opacity.'"' : '';
    $pofo_product_archive_title_bg_color = pofo_option('pofo_product_archive_title_bg_color', '');

    $pofo_image = pofo_get_image_id_by_url( pofo_category_title_option('pofo_product_archive_title_bg_image',''));
    $pofo_title_image_srcset = pofo_option('pofo_product_archive_title_image_srcset', 'full');
    $srcset = $srcset_data = $srcset_classes = '';
    $srcset = wp_get_attachment_image_srcset( $pofo_image, $pofo_title_image_srcset );
    if( $srcset ){
        $srcset_data = ' data-bg-srcset="'.esc_attr( $srcset ).'"';
        $srcset_classes = ' bg-image-srcset';
    }

    $pofo_product_archive_title_subtitle = pofo_category_title_option('pofo_product_archive_title_subtitle','');
    $pofo_disable_product_archive_title_image = pofo_option('pofo_disable_product_archive_title_image','');
    $pofo_image_url = wp_get_attachment_image_src($pofo_image, $pofo_title_image_srcset);   
        
    $pofo_product_archive_title_bg_image = ( $pofo_image_url[0] ) ? ' style="background-image: url('.esc_url( $pofo_image_url[0] ).'); background-repeat: no-repeat; "': '';

    $parallax_effect = pofo_option('pofo_product_archive_title_parallax_effect', '0.5');
    $pofo_product_archive_title_parallax_effect = ( !empty( $parallax_effect ) && $parallax_effect != 'no-parallax' ) ? ' data-stellar-background-ratio="'.$parallax_effect.'"': '';
    if( $pofo_product_archive_title_style == 'page-title-style-6' ){
        $pofo_product_archive_title_parallax = ( $pofo_product_archive_title_parallax_effect ) ? ' parallax': ' cover-background background-position-top';
    }else{
        $pofo_product_archive_title_parallax = ( $pofo_product_archive_title_parallax_effect ) ? ' parallax': ' cover-background';
    }
    
    $pofo_disable_breadcrumb = pofo_option('pofo_product_archive_disable_breadcrumb', '1');
    $pofo_product_archive_title_bg_image_overlay = ( $pofo_product_archive_title_opacity != '' ) ? '<div class="opacity-medium bg-extra-dark-gray bg-product-archive-opacity-color"'.$pofo_product_archive_title_opacity_style.'></div>' : '';
    $pofo_product_archive_title_bg_multiple_image = pofo_category_title_option('pofo_product_archive_title_bg_multiple_image', '');
    $pofo_product_archive_title_video_type = pofo_category_title_option('pofo_product_archive_title_video_type', 'self');
    $pofo_product_archive_title_video_mp4 = pofo_category_title_option('pofo_product_archive_title_video_mp4', '');
    $pofo_product_archive_title_video_ogg = pofo_category_title_option('pofo_product_archive_title_video_ogg', '');
    $pofo_product_archive_title_video_webm = pofo_category_title_option('pofo_product_archive_title_video_webm', '');
    $pofo_product_archive_loop_video = ( pofo_option('pofo_product_archive_loop_video', '1') == 1 ) ? ' loop': '';
    $pofo_product_archive_mute_video = ( pofo_option('pofo_product_archive_mute_video', '1') == 1 ) ? ' muted': '';
    $pofo_product_archive_title_video_youtube = pofo_category_title_option('pofo_product_archive_title_video_youtube', '');
    $pofo_product_archive_title_callto_section_id = pofo_option('pofo_product_archive_title_callto_section_id', '#about');
    $pofo_product_archive_title_scroll_to_down = pofo_option('pofo_product_archive_title_scroll_to_down', '1');
    $pofo_product_archive_title_text_transform = pofo_option('pofo_product_archive_title_text_transform', '');

    switch ( $pofo_product_archive_title_style ) {
        case 'page-title-style-1':
            echo '<section class="wow fadeIn bg-light-gray padding-50px-tb xs-padding-30px-tb page-title-small pofo-product-archive-title-bg top-space '.$pofo_product_archive_title_style.'">';
                echo '<div class="container">';
                    echo '<div class="row equalize sm-equalize-auto">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left sm-text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="display-block margin-5px-top alt-font pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                        if( $pofo_disable_breadcrumb == 1 ){
                            echo '<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 display-table text-right sm-text-center sm-margin-15px-top">';
                                echo '<div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">';
                                    echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                        echo pofo_breadcrumb_display();
                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        break;
        case 'page-title-style-2':
            echo '<section class="wow fadeIn bg-light-gray padding-50px-tb xs-padding-30px-tb small-page-title pofo-product-archive-title-bg top-space '.$pofo_product_archive_title_style.'">';
                echo '<div class="container">';
                    echo '<div class="row equalize sm-equalize-auto">';
                        if( $pofo_disable_breadcrumb == 1 ){
                            echo '<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 display-table text-left sm-text-center">';
                                echo '<div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font">';
                                    echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                        echo pofo_breadcrumb_display();
                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
                        }
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 display-table sm-margin-15px-top page-title-small pull-right">';
                                echo '<div class="display-table-cell vertical-align-middle text-right sm-text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="display-block margin-5px-top alt-font pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        break;
        case 'page-title-style-3':
            echo '<section class="wow fadeIn bg-light-gray padding-100px-tb sm-padding-60px-tb xs-padding-30px-tb pofo-product-archive-title-bg top-space '.$pofo_product_archive_title_style.'">';
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-medium">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="display-block center-col margin-10px-top alt-font pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        break;
        case 'page-title-style-4':
            echo '<section class="wow fadeIn pofo-product-archive-title-bg '.$pofo_product_archive_title_style.$pofo_product_archive_title_parallax.$srcset_classes.'"'.$pofo_product_archive_title_parallax_effect.$pofo_product_archive_title_bg_image.$srcset_data.'>';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 display-table extra-small-screen page-title-medium center-col">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-white font-weight-600 no-margin letter-spacing-1 pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="display-block margin-10px-top text-extra-small alt-font pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }    
        break;
        case 'page-title-style-5':
            echo '<section class="wow fadeIn bg-extra-dark-gray pofo-product-archive-title-bg '.$pofo_product_archive_title_style.$pofo_product_archive_title_parallax.$srcset_classes.'"'.$pofo_product_archive_title_parallax_effect.$pofo_product_archive_title_bg_image.$srcset_data.'>';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-extra-small">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-white opacity7 margin-10px-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<h2 class="text-white alt-font font-weight-500 width-55 sm-width-65 center-col xs-width-100 letter-spacing-minus-1 line-height-50 sm-line-height-45 xs-line-height-30 pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</h2>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        break;
        case 'page-title-style-6':
            echo '<section class="wow fadeIn pofo-product-archive-title-bg top-space '.$pofo_product_archive_title_style.$pofo_product_archive_title_parallax.$srcset_classes.'"'.$pofo_product_archive_title_parallax_effect.$pofo_product_archive_title_bg_image.$srcset_data.'>';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                    if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                        echo '<div class="col-md-12 col-sm-12 col-xs-12 display-table page-title-large">';
                            echo '<div class="display-table-cell vertical-align-middle text-center padding-30px-tb">';
                                if( $pofo_product_archive_title_subtitle ){
                                    echo '<span class="display-block text-white opacity6 alt-font margin-5px-bottom pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                }
                                if( $pofo_product_archive_title ){
                                    echo '<h1 class="alt-font text-white font-weight-600 no-margin-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        break;
        case 'page-title-style-7':
            $pofo_product_archive_title_bg_image_overlay = ( $pofo_product_archive_title_opacity != '' ) ? '<div class="opacity-medium z-index-1 bg-extra-dark-gray bg-product-archive-opacity-color"'.$pofo_product_archive_title_opacity_style.'></div>' : '';
            echo '<section class="no-padding one-third-screen position-relative wow fadeIn pofo-product-archive-title-bg '.$pofo_product_archive_title_style.'">';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 display-table one-third-screen z-index-2 page-title-large">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="display-block text-white opacity6 margin-10px-bottom alt-font pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-white font-weight-600 width-55 sm-width-80 xs-width-100 center-col no-margin-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                        if( $pofo_product_archive_title_scroll_to_down == 1 ){
                            echo '<div class="down-section text-center"><a href="'.$pofo_product_archive_title_callto_section_id.'" class="section-link"><i class="ti-arrow-down icon-extra-small text-white bg-deep-pink padding-15px-all xs-padding-10px-all border-radius-100"></i></a></div>';
                        }
                    echo '</div>';
                echo '</div>';
                if( $pofo_product_archive_title_bg_multiple_image ){
                    echo '<div class="swiper-auto-fade swiper-container z-index-0 position-absolute top-0 width-100 height-100">';
                        echo '<div class="swiper-wrapper">';
                            $pofo_product_archive_title_bg_multiple_image = explode( ',', $pofo_product_archive_title_bg_multiple_image );
                            foreach ($pofo_product_archive_title_bg_multiple_image as $key => $value) {
                                $pofo_image_url = wp_get_attachment_url( $value );
                                $pofo_bg_url = ( $pofo_image_url ) ? ' style="background-image:url('.esc_url( $pofo_image_url ).');"' : '';
                                echo '<div class="swiper-slide cover-background one-third-screen"'.$pofo_bg_url.'></div>';
                            }
                        echo '</div>';
                    echo '</div>';
                }
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }
        break;
        case 'page-title-style-8':
            $pofo_product_archive_title_bg_image_overlay = ( $pofo_product_archive_title_opacity != '' ) ? '<div class="opacity-medium z-index-2 bg-extra-dark-gray bg-product-archive-opacity-color"'.$pofo_product_archive_title_opacity_style.'></div>' : '';
            
            $pofo_poster_image = ( $pofo_image_url[0] ) ? ' poster="'.esc_url( $pofo_image_url[0] ).'"': '';
        
            echo '<section class="no-padding one-third-screen position-relative wow fadeIn pofo-product-archive-title-bg '.$pofo_product_archive_title_style.$pofo_product_archive_title_parallax.$srcset_classes.'"'.$pofo_product_archive_title_parallax_effect.$pofo_product_archive_title_bg_image.$srcset_data.'>';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != ''){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 z-index-3 display-table one-third-screen page-title-medium">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="margin-5px-bottom display-block alt-font text-medium-gray pofo-product-archive-subtitle">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_disable_breadcrumb == 1 ){
                                        echo '<div class="breadcrumb text-small alt-font no-margin-bottom display-block">';
                                            echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                                echo pofo_breadcrumb_display();
                                            echo '</ul>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
                if( $pofo_product_archive_title_video_type == 'self' && ( $pofo_product_archive_title_video_mp4 || $pofo_product_archive_title_video_ogg || $pofo_product_archive_title_video_webm )){
                    echo '<video autoplay'.$pofo_product_archive_loop_video.$pofo_product_archive_mute_video.' class="html-video z-index-1"'.$pofo_poster_image.'>';
                        if( $pofo_product_archive_title_video_mp4 ){
                            echo '<source type="video/mp4" src="'.$pofo_product_archive_title_video_mp4.'" />';
                        }
                        if( $pofo_product_archive_title_video_ogg ){
                            echo '<source type="video/ogg" src="'.$pofo_product_archive_title_video_ogg.'" />';
                        }
                        if( $pofo_product_archive_title_video_webm ){
                            echo '<source type="video/webm" src="'.$pofo_product_archive_title_video_webm.'" />';
                        }
                    echo '</video>';
                }elseif( $pofo_product_archive_title_video_type == 'external' && ( $pofo_product_archive_title_video_youtube )){
                    echo '<div class="external-fit-videos fit-videos width-100">';
                        echo '<embed width="560" height="315" src="'.$pofo_product_archive_title_video_youtube.'" frameborder="0" allowfullscreen></embed>';
                    echo '</div>';
                }
            echo '</section>';
        break;
        case 'page-title-style-9':
            echo '<section class="wow fadeIn bg-light-gray padding-35px-tb page-title-small pofo-product-archive-title-bg top-space '.$pofo_product_archive_title_style.'">';
                echo '<div class="container">';
                    echo '<div class="row equalize sm-equalize-auto">';
                        if( $pofo_product_archive_title != '' ){
                            echo '<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left sm-text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                        if( $pofo_disable_breadcrumb == 1 ){
                            echo '<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 display-table text-right sm-text-center sm-margin-15px-top">';
                                echo '<div class="display-table-cell vertical-align-middle breadcrumb text-small alt-font sm-text-center">';
                                    echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                        echo pofo_breadcrumb_display();
                                    echo '</ul>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        break;

        case 'page-title-style-10':
            echo '<section class="wow fadeIn pofo-product-archive-title-bg '.$pofo_product_archive_title_style.$pofo_product_archive_title_parallax.$srcset_classes.'"'.$pofo_product_archive_title_parallax_effect.$pofo_product_archive_title_bg_image.$srcset_data.'>';
                echo wp_kses_post( $pofo_product_archive_title_bg_image_overlay );
                echo '<div class="container">';
                    echo '<div class="row">';
                        if( $pofo_product_archive_title != '' || $pofo_product_archive_title_subtitle != '' ){
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">';
                                echo '<div class="display-table-cell vertical-align-middle text-center">';
                                    if( $pofo_product_archive_title ){
                                        echo '<h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom pofo-product-archive-title '.$pofo_product_archive_title_text_transform.'">'.esc_attr( $pofo_product_archive_title ).'</h1>';
                                    }
                                    if( $pofo_product_archive_title_subtitle ){
                                        echo '<span class="text-white alt-font margin-15px-bottom pofo-product-archive-subtitle display-block opacity6">'.esc_attr( $pofo_product_archive_title_subtitle ).'</span>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
            if( $pofo_disable_breadcrumb == 1 ){
                echo '<section class="wow fadeIn padding-20px-tb border-bottom border-color-extra-light-gray pofo-product-archive-breadcrumb">';
                    echo '<div class="container">';
                        echo '<div class="row">';
                            echo '<div class="col-md-12 display-table">';
                                echo '<div class="display-table-cell vertical-align-middle text-left">';
                                    echo '<div class="breadcrumb alt-font text-small no-margin-bottom">';
                                        echo '<ul class="pofo-product-archive-title-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
                                            echo pofo_breadcrumb_display();
                                        echo '</ul>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</section>';
            }    
        break;
    }
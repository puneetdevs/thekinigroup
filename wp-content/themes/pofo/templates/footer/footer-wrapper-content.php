<?php
/**
 * The template for displaying the footer wrapper
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Check if footer social icon show / hide */
	$pofo_footer_wrapper_extra_class = '';
	$pofo_footer_wrapper_text = pofo_option( 'pofo_footer_wrapper_text', '' );
	$pofo_footer_logo_image = pofo_option( 'pofo_footer_logo_image', '' );
    $pofo_footer_retina_logo_image = ( pofo_option( 'pofo_footer_retina_logo_image', '' ) ) ? pofo_option( 'pofo_footer_retina_logo_image', '' ) : '' ;
    $pofo_footer_logo_url = pofo_option( 'pofo_footer_logo_url', home_url('/') );
    $pofo_before_social_icons_text = pofo_option( 'pofo_before_social_icons_text', '' );
    $pofo_disable_before_text = pofo_option( 'pofo_disable_before_text', '' );
    $pofo_footer_wrapper_style = pofo_option( 'pofo_footer_wrapper_style', 'footer-wrapper-style-1' );
    $pofo_disable_footer_wrapper_social = pofo_option( 'pofo_disable_footer_social', '1' );
    $pofo_footer_wrapper_padding_setting = pofo_option( 'pofo_footer_wrapper_padding_setting', 'small-padding' );
    $pofo_footer_wrapper_container_fluid = pofo_option( 'pofo_footer_wrapper_container_fluid', '0' );
    $pofo_container_fluid = ( $pofo_footer_wrapper_container_fluid == 1 ) ? 'container-fluid' : 'container';
    $pofo_footer_social_icons = get_theme_mod( 'pofo_footer_social_icons', '' );
    $pofo_footer_custom_link = get_theme_mod( 'pofo_footer_custom_link', '' );
    $pofo_disable_footer_social_target = ( get_theme_mod( 'pofo_disable_footer_social_target', '0' ) == '1' ) ? ' target="_blank"': ' target="_self"';

    // Replace old Font-Awesome Icons Start
    $new_social_icons =  array('fa fa-facebook' => 'fab fa-facebook-f', 'fa fa-twitter' => 'fab fa-twitter', 'fa fa-google-plus' => 'fab fa-google-plus-g', 'fa fa-dribbble' => 'fab fa-dribbble', 'fa fa-linkedin' => 'fab fa-linkedin-in', 'fa fa-instagram' => 'fab fa-instagram', 'fa fa-tumblr' => 'fab fa-tumblr', 'fa fa-pinterest-p' => 'fab fa-pinterest', 'fa fa-youtube' => 'fab fa-youtube', 'fa fa-vimeo' => 'fab fa-vimeo-v', 'fa fa-heart' => 'fas fa-heart', 'fa fa-soundcloud' => 'fab fa-soundcloud', 'fa fa-flickr' => 'fab fa-flickr', 'fa fa-rss' => 'fas fa-rss', 'fa fa-behance' => 'fab fa-behance', 'fa fa-vine' => 'fab fa-vine', 'fa fa-github' => 'fab fa-github', 'fa fa-xing' => 'fab fa-xing', 'fa fa-vk' => 'fab fa-vk', 'fa fa-reddit' => 'fab fa-reddit', 'fa fa-external-link' => 'fas fa-external-link', 'fa fa-yelp' => 'fab fa-yelp', 'fa fa-discord' => 'fab fa-discord', 'fa fa-envelope' => 'fas fa-envelope');

    for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
    {
        if(array_key_exists($pofo_footer_social_icons[$i+1], $new_social_icons)){
            $pofo_footer_social_icons[$i+1] = $new_social_icons[$pofo_footer_social_icons[$i+1]];
        }
    }
    // Replace old Font-Awesome Icons End

    switch ($pofo_footer_wrapper_padding_setting) {
        case 'medium-padding':
            $pofo_footer_wrapper_extra_class .= ' padding-65px-tb xs-padding-30px-tb';
            break;

        case 'large-padding':
            $pofo_footer_wrapper_extra_class .= ' padding-five-tb xs-padding-30px-tb';
            break;
        
        case 'small-padding':
        default:
            $pofo_footer_wrapper_extra_class .= ' padding-50px-tb xs-padding-30px-tb';
            break;
    }
     
    // add unique style class
    $pofo_footer_wrapper_extra_class .= ' ' . $pofo_footer_wrapper_style;

    switch ( $pofo_footer_wrapper_style ) {
        case 'footer-wrapper-style-1':
            $counter = 0;
            if ( $pofo_footer_wrapper_text ) {
                $counter++;                     
            }
            if ( $pofo_footer_logo_image ) {
                $counter++;
            }
            if ( $pofo_disable_footer_wrapper_social == 1 ) {
                $counter++;
            }

            switch ( $counter ) {
                case '3':
                    echo '<div class="footer-option1 bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-4 col-sm-5 col-xs-12 text-center alt-font display-table xs-text-center xs-margin-15px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-4 col-sm-2 col-xs-12 text-center display-table xs-margin-15px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                        if( $pofo_footer_logo_url ){
                                            echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                        }
                                            echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                            echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                        if( $pofo_footer_logo_url ){
                                            echo '</a>';
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-4 col-sm-5 col-xs-12 col-xs-12 text-center display-table xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="icon-social-medium display-inline-block footer-social-icon">';
                                                    for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                    {
                                                        if( $pofo_footer_social_icons[$i] ){
                                                            echo '<a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a>';
                                                        }
                                                    }
                                                    if( $pofo_footer_custom_link ) {
                                                        echo wp_kses_post( $pofo_footer_custom_link );
                                                    }
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;

                case '2':
                    echo '<div class="footer-option1 bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 footer-wrapper-text-align-col-two alt-font display-table xs-text-center xs-margin-15px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 footer-wrapper-text-align-col-two display-table xs-margin-15px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                        if( $pofo_footer_logo_url ){
                                            echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                        }
                                            echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                            echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                        if( $pofo_footer_logo_url ){
                                            echo '</a>';
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 col-xs-12 footer-wrapper-text-align-col-two display-table xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="icon-social-medium display-inline-block footer-social-icon">';
                                                    for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                    {
                                                        if( $pofo_footer_social_icons[$i] ){
                                                            echo '<a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a>';
                                                        }
                                                    }
                                                    if( $pofo_footer_custom_link ) {
                                                        echo wp_kses_post( $pofo_footer_custom_link );
                                                    }
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;

                case '1':
                    echo '<div class="footer-option1 bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 footer-wrapper-text-align-col-one alt-font display-table xs-text-center xs-margin-15px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 footer-wrapper-text-align-col-one display-table xs-margin-15px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                        if( $pofo_footer_logo_url ){
                                            echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                        }
                                            echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                            echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                        if( $pofo_footer_logo_url ){
                                            echo '</a>';
                                        }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 col-xs-12 footer-wrapper-text-align-col-one display-table xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="icon-social-medium display-inline-block footer-social-icon">';
                                                    for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                    {
                                                        if( $pofo_footer_social_icons[$i] ){
                                                            echo '<a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a>';
                                                        }
                                                    }
                                                    if( $pofo_footer_custom_link ) {
                                                        echo wp_kses_post( $pofo_footer_custom_link );
                                                    }
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;
                
            }
        break;
        case 'footer-wrapper-style-2':
            $counter = 0;
            if ( $pofo_footer_wrapper_text ) {
                $counter++;                     
            }
            if ( $pofo_footer_logo_image ) {
                $counter++;
            }
            if ( $pofo_disable_footer_wrapper_social == 1 ) {
                $counter++;
            }

            switch ( $counter ) {
                case '3':
                    echo '<div class="footer-strip-dark bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-3 col-sm-3 col-xs-12 display-table xs-text-center xs-margin-20px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>'; 
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 text-center alt-font display-table xs-margin-10px-bottom xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }   
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-3 col-sm-3 col-xs-12 display-table text-right xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle footer-social-icon">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].' no-margin-right" aria-hidden="true"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;

                case '2':
                    echo '<div class="footer-strip-dark bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 footer-wrapper-text-align-col-two display-table xs-text-center xs-margin-20px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>'; 
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 footer-wrapper-text-align-col-two alt-font display-table xs-margin-10px-bottom xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }   
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 footer-wrapper-text-align-col-two display-table xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle footer-social-icon">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].' no-margin-right" aria-hidden="true"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;

                case '1':
                    echo '<div class="footer-strip-dark bg-extra-dark-gray pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 footer-wrapper-text-align-col-one display-table xs-text-center xs-margin-20px-bottom">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>'; 
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 footer-wrapper-text-align-col-one alt-font display-table xs-margin-10px-bottom xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }   
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-md-12 col-sm-12 col-xs-12 footer-wrapper-text-align-col-one display-table xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ){
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle footer-social-icon">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].' no-margin-right" aria-hidden="true"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;
                
            }
        break;
        case 'footer-wrapper-style-3':
            $counter = 0;
            if ( $pofo_footer_wrapper_text ) {
                $counter++;                     
            }
            if ( $pofo_footer_logo_image ) {
                $counter++;
            }
            if ( $pofo_disable_footer_wrapper_social == 1 ) {
                $counter++;
            }

            switch ( $counter ) {
                case '3':
                    echo '<div class="footer-center-logo2-dark bg-extra-dark-gray padding-five-tb pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 social-style-3 text-left display-table sm-text-center xs-text-center xs-margin-10px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ) {
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-lg-4 col-md-4 col-sm-2 col-xs-12 text-center sm-text-center xs-margin-20px-bottom display-table">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 text-right alt-font display-table sm-text-center xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;
                
                case '2':
                    echo '<div class="footer-center-logo2-dark bg-extra-dark-gray padding-five-tb pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-lg-6 col-md-4 col-sm-5 col-xs-12 social-style-3 footer-wrapper-text-align-col-two display-table sm-text-center xs-text-center xs-margin-10px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ) {
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-lg-6 col-md-4 col-sm-2 col-xs-12 footer-wrapper-text-align-col-two sm-text-center xs-margin-20px-bottom display-table">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-lg-6 col-md-4 col-sm-5 col-xs-12 footer-wrapper-text-align-col-two alt-font display-table sm-text-center xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;

                case '1':
                    echo '<div class="footer-center-logo2-dark bg-extra-dark-gray padding-five-tb pofo-footer-wrapper'.$pofo_footer_wrapper_extra_class.'">';
                        echo '<div class="'.$pofo_container_fluid.'">';
                            echo '<div class="row equalize xs-equalize-auto">';
                                if( $pofo_disable_footer_wrapper_social == 1 ){
                                    echo '<div class="col-lg-12 col-md-4 col-sm-5 col-xs-12 social-style-3 footer-wrapper-text-align-col-one display-table sm-text-center xs-text-center xs-margin-10px-bottom text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_disable_before_text != 0 || $pofo_disable_before_text == '' ){
                                                echo '<span class="alt-font margin-three-right footer-before-text">'.$pofo_before_social_icons_text.'</span>';
                                            }
                                            if( !empty( $pofo_footer_social_icons ) ) {
                                                echo '<div class="social-icon-style-8 display-inline-block vertical-align-middle">';
                                                    echo '<ul class="small-icon no-margin-bottom">';
                                                        for($i = 0; $i < sizeof($pofo_footer_social_icons); $i+=3)
                                                        {
                                                            if( $pofo_footer_social_icons[$i] ){
                                                                echo '<li><a href="'.$pofo_footer_social_icons[$i].'" class="text-link-white"'.$pofo_disable_footer_social_target.'><i class="'.$pofo_footer_social_icons[$i+1].'"></i></a></li>';
                                                            }
                                                        }
                                                        if( $pofo_footer_custom_link ) {
                                                            echo wp_kses_post( $pofo_footer_custom_link );
                                                        }
                                                    echo '</ul>';
                                                echo '</div>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_logo_image ){
                                    echo '<div class="col-lg-12 col-md-4 col-sm-2 col-xs-12 footer-wrapper-text-align-col-one sm-text-center xs-margin-20px-bottom display-table">';
                                        echo '<div class="display-table-cell vertical-align-middle">';
                                            if( $pofo_footer_logo_url ){
                                                echo '<a href="'.esc_url( $pofo_footer_logo_url ).'">';
                                            }
                                                echo '<img src="'.esc_url( $pofo_footer_logo_image ).'" class="footer-logo logo-footer" alt="'.get_bloginfo("name").'">';
                                                echo '<img src="'.esc_url( $pofo_footer_retina_logo_image ).'" class="footer-logo logo-footer-retina" alt="'.get_bloginfo("name").'">';
                                            if( $pofo_footer_logo_url ){
                                                echo '</a>';
                                            }
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if( $pofo_footer_wrapper_text ){
                                    echo '<div class="col-lg-12 col-md-4 col-sm-5 col-xs-12 footer-wrapper-text-align-col-one alt-font display-table sm-text-center xs-text-center text-small">';
                                        echo '<div class="display-table-cell vertical-align-middle footer-wrapper-text">';
                                            echo wp_kses($pofo_footer_wrapper_text, wp_kses_allowed_html( 'post' ));
                                        echo '</div>';
                                    echo '</div>';
                                }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    break;
            }
        break;
    }
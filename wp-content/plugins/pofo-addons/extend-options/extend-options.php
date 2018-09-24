<?php
/* Force All Page To Under Construction If "enable-under-construction" is enable */
if ( ! function_exists( 'pofo_get_address' ) ) {
    function pofo_get_address() {
        // return the full address
        return pofo_get_protocol().'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    } // end function pofo_get_address
}

if ( ! function_exists( 'pofo_get_protocol' ) ) {
    function pofo_get_protocol() {
        // Set the base protocol to http
        $pofo_protocol = 'http';
        // check for https
        if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
            $pofo_protocol .= "s";
        }
        
        return $pofo_protocol;
    } // end function pofo_get_protocol
}

add_action( 'template_redirect', 'pofo_force_under_construction' );
if ( ! function_exists( 'pofo_force_under_construction' ) ) {
    function pofo_force_under_construction() {

        $pofo_userrequest = str_ireplace(home_url('/'),'',pofo_get_address());
        $pofo_userrequest = rtrim($pofo_userrequest,'');

        $pofo_enable_under_maintenance = get_theme_mod('pofo_enable_under_maintenance', 0 );


        if ( $pofo_enable_under_maintenance == 1 && !current_user_can('level_10') && get_theme_mod('pofo_enable_under_maintenance_pages') != '0' ) { 
            $pofo_do_redirect = '';

            if( strpos($pofo_userrequest, '/contact-form-7/v1') !== false ) {
                return;
            }
            
            // When maintenance page is selected as a front page
            if( empty( $pofo_userrequest ) && get_option( 'page_on_front' ) == get_theme_mod('pofo_enable_under_maintenance_pages') ) {
                return;
            }
            
            if ( strpos($pofo_userrequest, 'wp-login') !== 0 && strpos($pofo_userrequest, 'wp-admin') !== 0 ) {

                if( get_option('permalink_structure') ){
                    
                    $maintenance_page_id = get_theme_mod('pofo_enable_under_maintenance_pages');
                    $maintenance_page_url = get_permalink( $maintenance_page_id );

                    $pofo_get_page = str_ireplace( home_url('/'),'',$maintenance_page_url );
                    $pofo_get_page = rtrim($pofo_get_page,'');

                    $pofo_do_redirect = '/'.$pofo_get_page;
                    // Make sure it gets all the proper decoding and rtrim action
                    $pofo_userrequest = str_replace('*','(.*)',$pofo_userrequest);
                    $pofo_pattern = '/^' . str_replace( '/', '\/', rtrim( $pofo_userrequest, '/' ) ) . '/';
                    $pofo_do_redirect = str_replace('*','$1',$pofo_do_redirect);
                    $output = preg_replace($pofo_pattern, $pofo_do_redirect, $pofo_userrequest);
                    if ($output !== $pofo_userrequest) {
                        // pattern matched, perform redirect
                        $pofo_do_redirect = $output;
                    }
                }else{
                    $pofo_do_redirect = '/?page_id='.get_theme_mod('pofo_enable_under_maintenance_pages');
                }
            } else {
                // simple comparison redirect
                $pofo_do_redirect = $pofo_userrequest;
            }
            
            if ($pofo_do_redirect !== '' && trim($pofo_do_redirect,'/') !== trim($pofo_userrequest,'/')) {
                // check if destination needs the domain prepended

                if (strpos($pofo_do_redirect,'/') === 0){
                    $pofo_do_redirect = home_url().$pofo_do_redirect;
                }

                header ('Location: ' . $pofo_do_redirect);
                exit();
                
            }
        }
    }
}

 /* To Add Under Construction Notice To Adminbar For All Logged User */
if ( ! function_exists( 'pofo_admin_bar_under_construction_notice' ) ) {
    function pofo_admin_bar_under_construction_notice() {
        global $wp_admin_bar;
        $pofo_enable_under_maintenance = get_theme_mod('pofo_enable_under_maintenance', 0 );
        if ( $pofo_enable_under_maintenance == 1 ) {
            $wp_admin_bar->add_menu( array(
                'id' => 'admin-bar-under-construction-notice',
                'parent' => 'top-secondary',
                'href' => esc_url(home_url('/')).'wp-admin/customize.php?autofocus%5Bsection%5D=pofo_add_under_maintenance_section',
                'title' => '<span style="color: #FF0000;">'.esc_html__( 'Under Construction', 'pofo-addons' ).'</span>'
            ) );
        }
    }
}
add_action( 'admin_bar_menu', 'pofo_admin_bar_under_construction_notice' );

/* Generate custom css base on customizer settings */
if( ! function_exists( 'pofo_addons_generate_custom_css' ) ) {
    function pofo_addons_generate_custom_css() {
        global $pofo_featured_array, $pofo_responsive_style;

        $output_css = '';
        if( !empty($pofo_featured_array)) {
            ob_start();
                echo '<style id="pofo-addon-custom-css" type="text/css">';
                    foreach ($pofo_featured_array as $key => $value) {
                        echo $value;
                    }
                echo '</style>';
            $output_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_css = preg_replace( '#/\*.*?\*/#s', '', $output_css );
            $output_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_css );
            $output_css = preg_replace( '/\s\s+(.*)/', '$1', $output_css );

            ?>
                <script type="text/javascript"> (function($) { $('head').append('<?php print $output_css; ?>'); })(jQuery); </script>
            <?php
        }

        if( !empty( $pofo_responsive_style ) ) {
            $output_responsive_css = '';
            ob_start();
                echo '<style id="pofo-addon-custom-responsive-css" type="text/css">';
                    echo $pofo_responsive_style;
                echo '</style>';
            $output_responsive_css = ob_get_contents();
            ob_end_clean();

            // 1. Remove comments.
            // 2. Remove whitespace.
            // 3. Remove starting whitespace.
            $output_responsive_css = preg_replace( '#/\*.*?\*/#s', '', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $output_responsive_css );
            $output_responsive_css = preg_replace( '/\s\s+(.*)/', '$1', $output_responsive_css );

            ?>
                <script type="text/javascript"> (function($) { $('head').append('<?php print $output_responsive_css ?>'); })(jQuery); </script>
            <?php
        }
    }
}
add_action( 'wp_footer', 'pofo_addons_generate_custom_css', 998 );

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

if( ! function_exists( 'pofo_get_thumbnail_image_sizes' ) ) :
    function pofo_get_thumbnail_image_sizes() {

        $thumbnail_image_sizes = array();

        // Hackily add in the data link parameter.
        $pofo_srcset = pofo_get_intermediate_image_sizes();

        if(!empty($pofo_srcset)) {
            foreach ( $pofo_srcset as $value => $label ){
                
                $key = esc_attr( $label );

                $pofo_srcset_image_data = pofo_get_image_size( $label );
                $width = ( $pofo_srcset_image_data['width'] == 0 ) ? esc_html( 'Auto', 'pofo-addons' ) : $pofo_srcset_image_data['width'].'px';
                $height = ( $pofo_srcset_image_data['height'] == 0 ) ? esc_html( 'Auto', 'pofo-addons' ) : $pofo_srcset_image_data['height'].'px';
                if( $label == 'full' ) {
                    $data = esc_html__( 'Original Full Size', 'pofo-addons' );
                } else {
                    $data = ucwords( str_replace( '_', ' ', str_replace( '-', ' ', esc_attr( $label ) ) ) ).' ('.esc_attr( $width ).' X '.esc_attr( $height ).')';
                }

                $thumbnail_image_sizes[$data] = $key;
            }
        }

        return $thumbnail_image_sizes;
    }
endif;
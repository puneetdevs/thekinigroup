<?php
/**
 * Pofo import data.
 *
 * @package Pofo
 */
?>
<?php
    if( !defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    // Add new submenu for demo data install in Admin panel > Appereance

    function pofo_demo_import_callback() {

        global $title;

        $message = '';
        if( isset($_GET['show-message'])){
             $message = 'class="demo-show-message"';
        } else {
            $message = 'class="demo-hide-message"';
        }
        /* Check current user permission */
        if( !current_user_can( 'manage_options' ) ) {
            wp_die( __( 'You do not have sufficient permissions to access this page.', 'pofo-addons' ) );
        }
        /* Gets a WP_Theme object for a theme. */
        $tz_theme = wp_get_theme();

        echo '<div class="wrap">';
            echo '<h1>'.$title.'</h1>';
            echo '<div class="pofo-header">';
                echo '<div class="display_header">';
                    if( $tz_theme->get( 'Name' ) ) :
                        echo '<h2>'.$tz_theme->get( 'Name' ).'</h2>';
                    endif;
                    if( $tz_theme->get( 'Version' ) ) :
                        echo '<span>'.$tz_theme->get( 'Version' ).'</span>';
                    endif;
                echo '</div>';
                echo '<div class="pofo-head-right">';
                    echo '<a target="_blank" href="'.$tz_theme->get( 'ThemeURI' ).'/documentation/">'.__( 'Online Documentation', 'pofo-addons' ).'</a><span class="link_sep">|</span><a target="_blank" href="'.$tz_theme->get( 'AuthorURI' ).'/support.php">'.__( 'Support Center', 'pofo-addons' ).'</a></div>';
                echo '<div class="clear"></div>';
            echo '</div>';
            echo '<div id="run-regenerate-thumbnails" '.$message.'>';
                echo '<div class="pofo-importer-notice">';
                    echo '<p><strong>'.__( 'Demo data successfully imported. Now, please install and run', 'pofo-addons').' <a title="' . __( 'Regenerate Thumbnails', 'pofo-addons' ) . '" class="thickbox" href="'.admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=regenerate-thumbnails&amp;TB_iframe=true&amp;width=830&amp;height=472' ).'">'. __( 'Regenerate Thumbnails', 'pofo-addons' ).'</a> '. __( 'plugin once.', 'pofo-addons' ).'</strong>';
                    echo '</p>';
                echo '</div>';
            echo '</div>';
            echo '<div class="import-content">';

                echo '<h2>'.__( 'Import Demo Content', 'pofo-addons' ).'</h2>';
                echo '<p>'.__( 'Import demo content data including posts, pages, theme customizer, widgets, images, sliders etc... It may take several minutes, so please have some patience.', 'pofo-addons' ).'</p>';
                echo '<h2>'.__( 'Demo Import Requirements', 'pofo-addons' ).'</h2>';
                
                echo '<ul class="import-export-desc">';
                    echo '<li><i class="fas fa-check"></i>'.__( 'Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.', 'pofo-addons' ).'</li>';
                    echo '<li><i class="fas fa-check"></i>'.__( 'Visual Composer and Revolution Slider must be activated for content and sliders to import.', 'pofo-addons' ).'</li>';
                    echo '<li><i class="fas fa-check"></i>'.__( 'WooCommerce must be activated for shop data to import.', 'pofo-addons' ).'</li>';
                    echo '<li><i class="fas fa-check"></i>'.__( 'Contact Form 7 must be activated for form data to import.', 'pofo-addons' ).'</li>';
                    echo '<li><i class="fas fa-check"></i>'.__( 'MailChimp for WordPress must be activated for newsletter form data to import.', 'pofo-addons' ).'</li>';
                echo '</ul>';
            echo '</div>';

            if( pofo_is_theme_licence_active() ) {
            
                if( class_exists( 'Pofo_Addons' ) && class_exists( 'WP_Import' ) ){
                    echo '<div class="import-content import-content-tab-box"><strong class="pofo-active-importer">'.esc_html__( 'Notice: Please deactivate WordPress Importer plugin and then try demo data import to make it run successfully.', 'pofo-addons').'</strong></div>';
                }else{
                    echo '<div class="import-content import-content-tab-box">';
                        echo '<div class="import-content-top">';
                            echo '<a data-demo-import="full" class="button-primary pofo-import-button pofo-demo-import" href="javascript:void(0);">'. __( 'IMPORT ALL DEMO DATA', 'pofo-addons' ) .'</a>';
                            echo '<p class="import-all-notice">'.__( 'Click above button if you would like to import all demo data in one click. But if you are looking to import some specific pages / posts or other individual options then use below options.', 'pofo-addons' ).'</p>';
                        echo '</div>';

                        echo '<hr>';

                        echo '<div class="import-content-top">';
                            echo '<a class="single-layout-panel pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-layout"></i></span>'. __( 'Single Layouts', 'pofo-addons' ) .'</a>';
                            echo '<a data-demo-import="customizer" class="pofo-demo-import single-click-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-settings"></i></span>'. __( 'Theme Options ( Customizer )', 'pofo-addons' ) .'</a>';
                            echo '<a data-demo-import="menu" class="pofo-demo-import single-click-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-menu"></i></span>'. __( 'Navigation Menu', 'pofo-addons' ) .'</a>';
                            echo '<a data-demo-import="widgets" class="pofo-demo-import single-click-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-layout"></i></span>'. __( 'Widgets', 'pofo-addons' ) .'</a>';
                            
                            if( class_exists('UniteFunctionsRev') ) {
                                echo '<a data-demo-import="rev-slider" class="pofo-demo-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-layout"></i></span>'. __( 'Revolution Slider', 'pofo-addons' ) .'</a>';
                            }
                            
                            if( class_exists( 'WPCF7' ) ) {
                                echo '<a data-demo-import="contact-form" class="contact-form-single-click-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-pencil-alt"></i></span>'. __( 'Contact Form', 'pofo-addons' ) .'</a>';
                            }
                            
                            if( class_exists( 'MC4WP_MailChimp' ) ) {
                                echo '<a data-demo-import="mailchimp-form" class="pofo-demo-import single-click-import pofo-import-button button-primary import-tab-link" href="javascript:void(0);"><span class="icon-wrapper"><i class="ti ti-email"></i></span>'. __( 'Mailchimp Form', 'pofo-addons' ) .'</a>';
                            }
                        echo '</div>';

                        require_once dirname( __FILE__ ) . '/parsers.php';
                        $parser = new WXR_Parser();
                        $parsed_xml = $parser->parse( dirname( __FILE__ ) . '/sample-data/pofo.xml' );

                        //die;
                        $post_array = array();
                        $page_array = array();
                        $portfolio_array = array();
                        $contact_form_array = array();
                        $mailchimp_array = array();

                        foreach ($parsed_xml['posts'] as $key => $value) {
                            switch ($value['post_type']) {
                                case 'post':
                                    $id = array( $value[ 'post_id' ] );
                                    $post_array[ $value[ 'post_title' ] ] = array( 'id' => $id );
                                break;
                                case 'page':
                                    $id = array( $value[ 'post_id' ] );
                                    $page_array[ $value[ 'post_title' ] ] = array( 'id' => $id );
                                break;
                                case 'portfolio':
                                    $id = array( $value[ 'post_id' ] );
                                    $portfolio_array[ $value[ 'post_title' ] ] = array( 'id' => $id );
                                break;
                                case 'wpcf7_contact_form':
                                    if( class_exists( 'WPCF7' ) ) {
                                        $id = array( $value[ 'post_id' ] );
                                        $contact_form_array[ $value[ 'post_title' ] ] = array( 'id' => $id );
                                    }
                                break;
                                case 'mc4wp-form':
                                    if( class_exists( 'MC4WP_MailChimp' ) ) {
                                        $mailchimp_array[] = $value['post_id'];
                                    }
                                break;
                            }
                        }
                        
                        echo '<div class="single-layout-wrapper hidden">';

                            echo '<div class="post-main">';
                                echo '<h3>'.__( 'Posts', 'pofo-addons' ).'</h3>';
                                echo '<select name="post[]" multiple>';
                                    
                                    ksort($post_array);
                                    foreach ($post_array as $key => $value) {
                                        echo '<option value="'.esc_attr(implode(',', $value['id'])).'">'.$key.'</option>';
                                    }
                                    
                                echo '</select>';
                            echo '</div>';
                            echo '<div class="page-main">';
                                echo '<h3>'.__( 'Pages', 'pofo-addons' ).'</h3>';
                                echo '<select name="page[]" multiple>';
                                    
                                    ksort($page_array);
                                    foreach ($page_array as $key => $value) {
                                        echo '<option value="'.esc_attr(implode(',', $value['id'])).'">'.$key.'</option>';
                                    }
                                    
                                echo '</select>';
                            echo '</div>';
                            echo '<div class="portfolio-main">';
                                echo '<h3>'.__( 'Portfolio', 'pofo-addons' ).'</h3>';
                                echo '<select name="portfolio[]" multiple>';
                                    
                                    ksort($portfolio_array);
                                    foreach ($portfolio_array as $key => $value) {
                                        echo '<option value="'.esc_attr(implode(',', $value['id'])).'">'.$key.'</option>';
                                    }
                                    
                                echo '</select>';
                            echo '</div>';

                            echo '<div class="import-content-top">';
                                echo '<a data-demo-import="import-single" id="pofo-single-demo-import" class="button-primary pofo-demo-import" href="javascript:void(0);">'. __( 'Import Singles', 'pofo-addons' ) .'</a>';
                            echo '</div>';
                        echo '</div>';

                        if( class_exists( 'WPCF7' ) ) {
                            echo '<div class="contact-form-wrapper hidden">';
                                echo '<div class="contact-form-main">';
                                    echo '<h3>Contact Form</h3>';
                                    echo '<select name="contactform[]" multiple>';
                                        
                                        ksort($contact_form_array);
                                        foreach ($contact_form_array as $key => $value) {
                                            echo '<option value="'.esc_attr(implode(',', $value['id'])).'">'.$key.'</option>';
                                        }
                                        
                                    echo '</select>';
                                echo '</div>';
                                echo '<div class="import-content-top">';
                                    echo '<a data-demo-import="contact-form" id="pofo-single-demo-import" class="button-primary pofo-demo-import" href="javascript:void(0);">'. __( 'Import Contact Form', 'pofo-addons' ) .'</a>';
                                echo '</div>';
                            echo '</div>';
                        }

                        if( class_exists( 'MC4WP_MailChimp' ) ) {
                            echo '<div class="mailchimp-form-wrapper hidden">';
                                echo '<select name="mailchimpform[]" multiple>';
                                    foreach ($mailchimp_array as $key => $value) {
                                        echo '<option selected value="'.$value.'">'.$value.'</option>';
                                    }
                                echo '</select>';
                            echo '</div>';
                        }

                        echo '<hr>';

                        echo '<div class="import-content-top">';
                            echo '<a data-demo-import="delete-demo-media" class="button-primary pofo-import-button pofo-demo-import" href="javascript:void(0);">'. __( 'DELETE DEMO MEDIA', 'pofo-addons' ) .'</a>';
                        echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="import-content demo-licence-not-activated">';
                    echo '<div class="licence-not-activated"><i class="fas fa-info-circle"></i><span>'.__( 'Please activate your POFO theme license copy to enjoy premium feature of demo data import.', 'pofo-addons' ).'</span></div><br>';
                    echo '<a class="pofo-demo-import-licence" href="'.admin_url( 'themes.php?page=pofo-licence-activation' ).'">'.__( 'Activate POFO WordPress Theme License', 'pofo-addons' ).'</a>';
                echo '</div>';
            }
        echo '</div>';
        echo '<div class="import-ajax-message"></div>';
    }

    // Don't resize images for import
    if ( ! function_exists( 'pofo_no_image_resize' ) ) :
        function pofo_no_image_resize( $sizes ) {
            return array();
        }
    endif;

    // Hook For Import Sample Data And Log Messages.
    add_action( 'wp_ajax_pofo_import_sample_data', 'pofo_import_sample_data' );
    add_action( 'wp_ajax_pofo_refresh_import_log', 'pofo_refresh_import_log' );

    if ( ! function_exists( 'pofo_import_sample_data' ) ) :
        function pofo_import_sample_data() {
            global $wpdb;

            if ( current_user_can( 'manage_options' ) && pofo_is_theme_licence_active() ) {

                /* Load WP Importer */
                if ( !defined( 'WP_LOAD_IMPORTERS' ) ) define( 'WP_LOAD_IMPORTERS', true );

                /* Check if main importer class doesn't exist */
                if ( ! class_exists( 'WP_Importer' ) ) {
                    $wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
                    include $wp_importer;
                }

                // if WP importer doesn't exist
                if ( ! class_exists( 'WP_Import' ) ) {
                    $wp_import = POFO_ADDONS_IMPORT . '/wordpress-importer.php';
                    include $wp_import;
                }

                // check for main import class and wp import class.
                if ( class_exists( 'WP_Importer' ) && class_exists( 'WP_Import' ) ) { 

                    pofo_import_log( '', false );

                    if( !empty( $_POST['setup_key'] ) ) {

                        $import_options = $_POST['import_options'];                        
                        $setup_key      = $_POST['setup_key'];

                        add_filter( 'intermediate_image_sizes_advanced', 'pofo_no_image_resize' );
                        
                        // Sample Data Zip.
                        $sample_data_xml = dirname( __FILE__ ) . '/sample-data/pofo.xml';
                        $sample_menu_data_xml = dirname( __FILE__ ) . '/sample-data/nav_menu_item.xml';
                        $pofo_without_woo_data_xml = dirname( __FILE__ ) . '/sample-data/pofo-without-woo.xml';

                        if( $setup_key == 'full' ) {

                            /* Import Woocommerce data if WooCommerce plugin is activated */
                            if( class_exists( 'WooCommerce' ) ) {

                                //Before Import Sample Data Add Woocommerce Attribute
                                $transient_name = 'wc_attribute_taxonomies';
                                $old_attribute_taxonomies = $wpdb->get_results( "SELECT * FROM " . $wpdb->prefix . "woocommerce_attribute_taxonomies" );
                                if(empty($old_attribute_taxonomies)){
                                    pofo_import_log('MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes Start.');
                                    
                                    require_once( dirname( __FILE__ ) . '/pofo-addons-require-file.php' );
                                    $attribute_taxonomies_data = new Pofo_Set_attribute_taxonomies;
                                    $getresultdata = $attribute_taxonomies_data->add_woocommerce_attribute_taxonomies();

                                    pofo_import_log('MESSAGE - WooCommerce Before Import Sample Data Add Woocommerce Attributes End.');
                                }

                                // Import Sample Data XML.
                                $importer = new WP_Import();
                                // Import Posts, Pages, Portfolio Content, Images, Menus
                                $importer->import_menu = true;
                                $importer->fetch_attachments = true;
                                ob_start();
                                pofo_import_log('MESSAGE - Pofo.xml Import Start.');
                                $importer->import($sample_data_xml);
                                ob_end_clean();
                                pofo_import_log('MESSAGE - Pofo.xml Import End');
                                
                                pofo_import_log('MESSAGE - Import WooCommerce Pages Setting Start.');
                                // Set Woocommerce Default Pages.
                                $woopages = array(
                                    'woocommerce_shop_page_id' => 'shop',
                                    'woocommerce_cart_page_id' => 'cart',
                                    'woocommerce_checkout_page_id' => 'checkout',
                                    'woocommerce_myaccount_page_id' => 'my account',
                                    'woocommerce_lost_password_page_id' => 'lost-password',
                                    'woocommerce_edit_address_page_id' => 'edit-address',
                                    'woocommerce_view_order_page_id' => 'view-order',
                                    'woocommerce_change_password_page_id' => 'change-password',
                                    'woocommerce_logout_page_id' => 'logout',   
                                    'woocommerce_pay_page_id' => 'pay',
                                    'woocommerce_thanks_page_id' => 'order-received'
                                );
                                foreach($woopages as $woo_page_name => $woo_page_title) {
                                    $woopage = get_page_by_title( $woo_page_title );
                                    if(isset( $woopage ) && $woopage->ID) {
                                        update_option($woo_page_name, $woopage->ID); // Front Page
                                    }
                                }
                                pofo_import_log('MESSAGE - Import WooCommerce Pages Setting End.');

                                // We no longer need to install pages.
                                delete_option( '_wc_needs_pages' );

                                // Flush rules after install
                                flush_rewrite_rules();

                            } else {
                                
                                $ids = '';
                                // Import Sample Data XML.
                                $importer = new WP_Import();
                                // Import Full with all Posts, Pages, Media, Navigation Menu, Contact Forms, Customizer, Mailchimp Form.
                                $importer->import_menu = true;
                                $importer->fetch_attachments = true;
                                //ob_start();
                                    pofo_import_log( __( 'MESSAGE - Pofo-Without-Woo.xml Import Start.', 'pofo-addons' ) );
                                    $importer->import( $pofo_without_woo_data_xml, $ids );
                                //ob_end_clean();
                                pofo_import_log( __( 'MESSAGE - Pofo-Without-Woo.xml Import End', 'pofo-addons' ) );
                            }
                        } 

                        if( $setup_key == 'import-single' || $setup_key == 'contact-form' || $setup_key == 'mailchimp-form' ) {
                            
                            // Import Sample Data XML.
                            $importer = new WP_Import();
                            
                            if( $setup_key == 'import-single' ) {
                                $importer->fetch_attachments = true;
                            } else {
                                $importer->fetch_attachments = false;
                            }
                            $importer->import_menu = false;
                            ob_start();
                                if( $setup_key == 'import-single' ) {
                                    pofo_import_log( __( 'MESSAGE - Import Single Layout Item Start.', 'pofo-addons' ) );
                                } else if( $setup_key == 'contact-form' ) {
                                    pofo_import_log( __( 'MESSAGE - Import Contact Form Start.', 'pofo-addons' ) );
                                }else {
                                    pofo_import_log( __( 'MESSAGE - Import Mailchimp Form Start.', 'pofo-addons' ) );
                                }
                            
                                $importer->import( $sample_data_xml, $import_options );

                                if( $setup_key == 'import-single' ) {
                                    pofo_import_log( __( 'MESSAGE - Import Single Layout Item End.', 'pofo-addons' ) );
                                } else if( $setup_key == 'contact-form' ) {
                                    pofo_import_log( __( 'MESSAGE - Import Contact Form End.', 'pofo-addons' ) );
                                } else {
                                    pofo_import_log( __( 'MESSAGE - Import Mailchimp Form End.', 'pofo-addons' ) );
                                }
                            ob_end_clean();
                            
                        } 

                        if( $setup_key == 'menu' ){

                            $ids = '';
                            // Import Sample Data XML.
                            $importer = new WP_Import();

                            $importer->import_menu = true;
                            $importer->fetch_attachments = true;
                            ob_start();
                                pofo_import_log( __( 'MESSAGE - Menu Import Start.', 'pofo-addons' ) );
                                $importer->import( $sample_menu_data_xml, $ids );
                            ob_end_clean();
                                pofo_import_log(  __( 'MESSAGE - Menu Import End', 'pofo-addons' ) );

                            // Registered menu locations in theme
                            $locations = get_theme_mod( 'nav_menu_locations' );
                            // registered menus
                            $menus = wp_get_nav_menus();
                            pofo_import_log( __( 'MESSAGE - Import Menu Location Start.', 'pofo-addons' ) );
                            // Assign menus to theme locations
                            if($menus) {
                                foreach($menus as $menu) {
                                    if( $menu->name == 'Main Menu' ) {
                                        $locations['pofomegamenu'] = $menu->term_id;
                                    }
                                }
                            }
                            // set menus to locations
                            set_theme_mod( 'nav_menu_locations', $locations );
                            pofo_import_log( __( 'MESSAGE - Import Menu Location End.', 'pofo-addons' ) );

                        } 

                        if( $setup_key == 'customizer' || $setup_key == 'full' ) {

                             // Import Theme Customize file.
                            /* Import Woocommerce data if WooCommerce plugin is activated */
                            if( class_exists( 'WooCommerce' ) ) {

                                $theme_options_file = dirname( __FILE__ ) . '/sample-data/theme_settings.json';
                                
                            } else {

                                $theme_options_file = dirname( __FILE__ ) . '/sample-data/theme_settings_without_woo.json';
                            }

                            $remove_options = json_decode( get_theme_mods() );
                                
                            pofo_import_log( __( 'MESSAGE - Before Import Customize Clear All Customize Settings Start.', 'pofo-addons' ) );
                            foreach ( $remove_options as $key => $value ) {                                           
                                remove_theme_mod( $key );
                            }
                            pofo_import_log( __( 'MESSAGE - Before Import Customize Clear All Customize Settings End.', 'pofo-addons' ) );
                            /* Save new settings */
                            pofo_import_log( __( 'MESSAGE - Import Customize Setting Start.', 'pofo-addons' ) );
                            $encode_options = file_get_contents( $theme_options_file );
                            $options = json_decode( $encode_options, true );
                            foreach ( $options as $key => $value ) {                                     
                                set_theme_mod( $key, $value );
                            }
                            pofo_import_log( __( 'MESSAGE - Import Customize Setting End.', 'pofo-addons' ) );

                            /* when customizer import, menu id can't change */
                            $locations = get_theme_mod( 'nav_menu_locations' );
                            // registered menus
                            $menus = wp_get_nav_menus();
                            // assign menus to theme locations
                            if($menus) {
                                foreach($menus as $menu) {
                                    if( $menu->name == 'Main Menu' ) {
                                        $locations['pofomegamenu'] = $menu->term_id;
                                    }
                                }
                            }
                            // set menus to locations
                            set_theme_mod( 'nav_menu_locations', $locations );

                            // reading settings
                            $homepage_title = 'Home classic corporate';
                            $homepage = get_page_by_title( $homepage_title );
                            if( isset( $homepage ) && $homepage->ID ) {
                                pofo_import_log( __( 'MESSAGE - Set Static Homepage Start.', 'pofo-addons' ) );
                                update_option('show_on_front', 'page');
                                update_option('page_on_front', $homepage->ID); // Front Page
                                pofo_import_log( __( 'MESSAGE - Set Static Homepage End.', 'pofo-addons' ) );
                            }else{
                                pofo_import_log( __( 'NOTICE - Static Homepage Couldn\'t Be Set.', 'pofo-addons' ) );
                            }

                       } 

                       if( $setup_key == 'widgets' || $setup_key == 'full' ) {

                            // Sidebar Widgets Json File.
                            /* Import Woocommerce data if WooCommerce plugin is activated */
                            if( class_exists( 'WooCommerce' ) ) {

                                $widgets_file = dirname( __FILE__ ) . '/sample-data/widget_data.json';

                            } else {

                                $widgets_file = dirname( __FILE__ ) . '/sample-data/widget_data_without_woo.json';
                            }

                            if( isset( $widgets_file ) && $widgets_file ) {

                                // Add data to widgets
                                pofo_import_log( __( 'MESSAGE - Before Import Widget Clear All Widgetarea Start.', 'pofo-addons' ) );
                                $sidebars = wp_get_sidebars_widgets();

                                unset($sidebars['wp_inactive_widgets']);

                                foreach ( $sidebars as $sidebar => $widgets ) {
                                    $sidebars[$sidebar] = array();
                                }

                                $sidebars['wp_inactive_widgets'] = array();
                                wp_set_sidebars_widgets( $sidebars );
                                pofo_import_log( __( 'MESSAGE - Before Import Widget Clear All Widgetarea End.', 'pofo-addons' ) );

                                $widgets_json = $widgets_file; // widgets data file
                                $widgets_json = file_get_contents( $widgets_json );
                                $widget_data = $widgets_json;
                                pofo_import_log( __( 'MESSAGE - Import Widget Setting Start.', 'pofo-addons' ) );
                                $import_widgets = pofo_import_widget_sample_data( $widget_data );
                            }

                        } 

                        if( $setup_key == 'rev-slider' || $setup_key == 'full' ) {

                            // Import Revslider
                            if( class_exists('UniteFunctionsRev') ) {

                            $rev_directory = dirname( __FILE__ ) . '/sample-data/revsliders/';
                            // if revslider is activated
                            $rev_files = pofo_get_zip_import_files( $rev_directory, 'zip' );

                                $slider = new RevSlider();
                                pofo_import_log( __( 'MESSAGE - Import Revslider Start.', 'pofo-addons' ) );
                                foreach( $rev_files as $rev_file ) { 

                                    // finally import rev slider data files
                                    $filepath = $rev_file;
                                    ob_start();
                                        $slider->importSliderFromPost(true, false, $filepath);
                                    ob_clean();
                                    ob_end_clean();
                                }
                                pofo_import_log( __( 'MESSAGE - Import Revslider End.', 'pofo-addons' ) );
                            }

                        } 

                        if( $setup_key == 'delete-demo-media' ) {

                            global $wpdb;
                            $s_string = $wpdb->esc_like( 'pofo' );
                            $s_string = '%' . $s_string . '%';
                            $sql = "SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s";
                            $sql = $wpdb->prepare( $sql, $s_string );
                            $matching_ids = $wpdb->get_results( $sql,OBJECT );
                            foreach( $matching_ids as $key => $value ) {
                                wp_delete_attachment( $value->ID, true );
                            }
                        }
                        
                        
                    }

                    exit;
                }else{
                    pofo_import_log( __( 'ERROR - Importer can\'t load WP_Importer or WP_Import class not exists', 'pofo-addons' ) );
                    return false;
                }

            }
        }
    endif;

    // For More Info Check Widget Import Plugin ( http://wordpress.org/plugins/widget-settings-importexport/ )
    if( ! ( function_exists( 'pofo_import_widget_sample_data' ) ) ):
        function pofo_import_widget_sample_data( $widget_data ) {
            $json_data = $widget_data;
            $json_data = json_decode( $json_data, true );

            $sidebar_data = $json_data[0];
            $widget_data = $json_data[1];

            foreach ( $widget_data as $widget_title => $widget_value ) {
                foreach ( $widget_value as $widget_key => $widget_value ) {
                    $widgets[$widget_title][$widget_key] = $widget_data[$widget_title][$widget_key];
                }
            }
            
            $sidebar_data = array( array_filter( $sidebar_data ), $widgets );

            pofo_parse_import_widget_sample_data( $sidebar_data );

        }
    endif;

    if( ! ( function_exists( 'pofo_parse_import_widget_sample_data' ) ) ):
        function pofo_parse_import_widget_sample_data( $import_array ) {
            global $wp_registered_sidebars;
            $sidebars_data = $import_array[0];
            $widget_data = $import_array[1];
            $current_sidebars = get_option( 'sidebars_widgets' );
            $new_widgets = array( );

            foreach ( $sidebars_data as $import_sidebar => $import_widgets ) :

                foreach ( $import_widgets as $import_widget ) :
                    //if the sidebar exists
                    if ( isset( $wp_registered_sidebars[$import_sidebar] ) ) :
                        $title = trim( substr( $import_widget, 0, strrpos( $import_widget, '-' ) ) );
                        $index = trim( substr( $import_widget, strrpos( $import_widget, '-' ) + 1 ) );
                        $current_widget_data = get_option( 'widget_' . $title );
                        $new_widget_name = pofo_get_new_widget_name( $title, $index );
                        $new_index = trim( substr( $new_widget_name, strrpos( $new_widget_name, '-' ) + 1 ) );

                        if ( !empty( $new_widgets[ $title ] ) && is_array( $new_widgets[$title] ) ) {
                            while ( array_key_exists( $new_index, $new_widgets[$title] ) ) {
                                $new_index++;
                            }
                        }
                        $current_sidebars[$import_sidebar][] = $title . '-' . $new_index;
                        if ( array_key_exists( $title, $new_widgets ) ) {
                            $new_widgets[$title][$new_index] = $widget_data[$title][$index];
                            $multiwidget = $new_widgets[$title]['_multiwidget'];
                            unset( $new_widgets[$title]['_multiwidget'] );
                            $new_widgets[$title]['_multiwidget'] = $multiwidget;
                        } else {
                            $current_widget_data[$new_index] = $widget_data[$title][$index];
                            $current_multiwidget = isset($current_widget_data['_multiwidget']) ? $current_widget_data['_multiwidget'] : false;
                            $new_multiwidget = isset($widget_data[$title]['_multiwidget']) ? $widget_data[$title]['_multiwidget'] : false;
                            $multiwidget = ($current_multiwidget != $new_multiwidget) ? $current_multiwidget : 1;
                            unset( $current_widget_data['_multiwidget'] );
                            $current_widget_data['_multiwidget'] = $multiwidget;
                            $new_widgets[$title] = $current_widget_data;
                        }

                    endif;
                endforeach;
            endforeach;

            if ( isset( $new_widgets ) && isset( $current_sidebars ) ) {
                update_option( 'sidebars_widgets', $current_sidebars );

                foreach ( $new_widgets as $title => $content ){
                    update_option( 'widget_' . $title, $content );
                }
                pofo_import_log( __( 'MESSAGE - Import Widget Setting End.', 'pofo-addons' ) );
                return true;
            }
            pofo_import_log( __( 'NOTICE - Import Widget Setting Not Completed.', 'pofo-addons' ) );
            return false;
        }
    endif;

    if( ! ( function_exists( 'pofo_get_new_widget_name' ) ) ):
        function pofo_get_new_widget_name( $widget_name, $widget_index ) {
            $current_sidebars = get_option( 'sidebars_widgets' );
            $all_widget_array = array( );
            foreach ( $current_sidebars as $sidebar => $widgets ) {
                if ( !empty( $widgets ) && is_array( $widgets ) && $sidebar != 'wp_inactive_widgets' ) {
                    foreach ( $widgets as $widget ) {
                        $all_widget_array[] = $widget;
                    }
                }
            }
            while ( in_array( $widget_name . '-' . $widget_index, $all_widget_array ) ) {
                $widget_index++;
            }
            $new_widget_name = $widget_name . '-' . $widget_index;
            return $new_widget_name;
        }
    endif;

    if( ! ( function_exists( 'pofo_get_zip_import_files' ) ) ):
        function pofo_get_zip_import_files( $directory, $filetype ) {
            $phpversion = phpversion();
            $files = array();

            // Check if the php version allows for recursive iterators
            if ( version_compare( $phpversion, '5.2.11', '>' ) ) {
                if ( $filetype != '*' )  {
                    $filetype = '/^.*\.' . $filetype . '$/';
                } else {
                    $filetype = '/.+\.[^.]+$/';
                }
                $directory_iterator = new RecursiveDirectoryIterator( $directory );
                $recusive_iterator = new RecursiveIteratorIterator( $directory_iterator );
                $regex_iterator = new RegexIterator( $recusive_iterator, $filetype );

                foreach( $regex_iterator as $file ) {
                    $files[] = $file->getPathname();
                }
            // Fallback to glob() for older php versions
            } else {
                if ( $filetype != '*' )  {
                    $filetype = '*.' . $filetype;
                }

                foreach( glob( $directory . $filetype ) as $filename ) {
                    $filename = basename( $filename );
                    $files[] = $directory . $filename;
                }
            }

            return $files;
        }
    endif;

    // Function To Add pofo Import Log.
    if( ! ( function_exists( 'pofo_import_log' ) ) ):
        function pofo_import_log($message, $append = true) {
            $upload_dir = wp_upload_dir();            
            if (isset($upload_dir['baseurl'])) {
                
                $data = '';
                if (!empty($message)) {
                    $data = "<p>".date("Y-m-d H:i:s").' - '.$message."</p>";
                }
                
                if ($append === true) {
                    file_put_contents($upload_dir['basedir'].'/importer.log', $data, FILE_APPEND);
                    file_put_contents($upload_dir['basedir'].'/importer-full.log', $data, FILE_APPEND);
                } else {
                    file_put_contents($upload_dir['basedir'].'/importer.log', $data);
                    
                }
            }
        }
    endif;

    // Function To Get pofo Import Log.
    if( ! ( function_exists( 'get_pofo_import_log' ) ) ):
        function get_pofo_import_log() {            
            $upload_dir = wp_upload_dir();           
            if (isset($upload_dir['baseurl'])) {
                
                if (file_exists($upload_dir['basedir'].'/importer.log')) {
                    return file_get_contents($upload_dir['basedir'].'/importer.log');
                }
            }
            return '';
        }
    endif;

    // Ajax Function To Check Refresh Import Logs.
    if( ! ( function_exists( 'pofo_refresh_import_log' ) ) ):
        function pofo_refresh_import_log() {
          
            $check_pofo_log = get_pofo_import_log();
            //don't add message if ERROR was found, JS script is going to stop refreshing
            if( strpos( $check_pofo_log, 'ERROR' ) === false ) { 
                pofo_import_log( __( 'MESSAGE - Import in progress...', 'pofo-addons' ) );
            }
            $printlog = get_pofo_import_log();
            echo $printlog;
            die();
        }
    endif;
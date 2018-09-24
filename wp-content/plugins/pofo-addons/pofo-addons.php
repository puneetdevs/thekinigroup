<?php
/*
Plugin Name: Pofo Addons
Plugin URI: http://www.themezaa.com
Description: A part of Pofo theme
Version: 1.1.5
Author: Themezaa Team
Author URI: http://www.themezaa.com
Text Domain: pofo-addons
*/
?>
<?php
/**
 * Defind Class 
 */

defined( 'POFO_ADDONS_ROOT' ) or define( 'POFO_ADDONS_ROOT', dirname(__FILE__) );
defined( 'POFO_ADDONS_IMPORT' ) or define( 'POFO_ADDONS_IMPORT', plugin_dir_path( __FILE__ ) . 'importer' );
defined( 'POFO_ADDONS_CUSTOM_POST_TYPE' ) or define( 'POFO_ADDONS_CUSTOM_POST_TYPE', dirname(__FILE__) . '/custom-post-type' );
defined( 'POFO_ADDONS_ROOT_DIR' ) or define( 'POFO_ADDONS_ROOT_DIR', plugins_url() . '/pofo-addons' );
defined( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA_URI' ) or define( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA_URI', plugins_url() . '/pofo-addons/importer/sample-data' );
defined( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA' ) or define( 'POFO_ADDONS_IMPORTER_SAMPLE_DATA', plugin_dir_path( __FILE__ ) . '/importer/sample-data' );

if( !class_exists('Pofo_Addons') ) {

  class Pofo_Addons {

    // Construct
    public function __construct() {

      add_action( 'plugins_loaded', array($this,'pofo_addons_load_plugin_textdomain') );
      add_action('setup_theme', array($this,'pofo_addons_register_custom_post_type') );

      add_action( 'admin_menu', array( $this, 'pofo_demo_import_page' ) );
      add_action( 'admin_init', array( $this, 'pofo_addons_import' ) );

      /* For auto update notice */
      add_action( 'admin_init', array( $this,'pofo_activate_addons_auto_update_notice' ) );

      /* For Customizer */
      add_action( 'customize_register', array( $this, 'pofo_addons_add_customizer_sections' ), 99 );

      require_once( POFO_ADDONS_ROOT.'/pofo-excerpt.php' );
      require_once( POFO_ADDONS_ROOT.'/pofo-extra-functions.php' );
      require_once( POFO_ADDONS_ROOT.'/pofo-shortcodes/pofo-shortcode-addons.php' );
      /* For meta box */
      require_once( POFO_ADDONS_ROOT.'/meta-box/meta-box.php' );
      /* For Widgets */
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-custom-text.php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-custom-menu-widget.php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-latest-post.php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-instagram.php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-latest-portfolio .php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-about-me.php' );
      require_once( POFO_ADDONS_ROOT.'/widgets/pofo-social-bar.php' );
      /* For Extend Options */
      require_once( POFO_ADDONS_ROOT.'/extend-options/extend-options.php' );

      /* Load slider scripts */
      add_action( 'wp_footer', array( $this, 'pofo_addons_slider_script' ), 9999 );

      /* IE Compatible meta */
      add_action( 'wp_head', array( $this, 'pofo_addons_ie_compatible_meta' ) );

      /* Change meta key with underscrore instead of without underscore */
      add_action( 'wp_dashboard_setup', array( $this, 'pofo_addons_theme_update_meta_details' ) );
    }

    /* 
      Change meta key with underscrore instead of without underscore
      Its only 1 time execute

      For ex. meta key name : 'pofo_xyz_name'
      After change meta key name : '_pofo_xyz_name'

      Because of meta will not displayed in Custom Fields meta box after change meta key.
    */
    public function pofo_addons_theme_update_meta_details() {

        $pofodetails_theme_update_meta = get_option( 'pofodetails_theme_update_meta' );
        if( $pofodetails_theme_update_meta != '1' ) {
          global $wpdb;
          $wpdb->query( "UPDATE {$wpdb->prefix}postmeta set meta_key = Replace(meta_key, 'pofo_', '_pofo_') where meta_key like 'pofo_%'" );
          update_option( 'pofodetails_theme_update_meta', '1' );
        }
    }

    public function pofo_addons_ie_compatible_meta() {

        if( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
            echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />';
        }
    }

    /* Plugin updater. */
    public function pofo_activate_addons_auto_update_notice() {
        if( class_exists('Pofo_Addons') ) {
          require_once( POFO_ADDONS_ROOT . '/updater/pofo-addons-auto-update.php' );
          $pofo_addons_version = get_plugin_data( POFO_ADDONS_ROOT.'/pofo-addons.php', $markup = true, $translate = true );
          $pofo_addons_current_version = $pofo_addons_version['Version'];
          $pofo_addons_remote_path = 'http://api.themezaa.com/pofo/update.php';
          $pofo_addons_slug = plugin_basename( __FILE__ );
          new pofo_addons_plugin_update ( $pofo_addons_current_version, $pofo_addons_remote_path, $pofo_addons_slug );
        }
    }

    /* Load plugin textdomain. */
    public function pofo_addons_load_plugin_textdomain() {
      load_plugin_textdomain( 'pofo-addons', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
    }

    /**
     * Load custom post types
     */
    public function pofo_addons_register_custom_post_type()
    {
      require_once( POFO_ADDONS_CUSTOM_POST_TYPE .'/pofo-theme-portfolio.php'); 
    }

    public function pofo_addons_add_customizer_sections( $wp_customize ) {

      /* Add General layout Section */

        $wp_customize->add_section( 'pofo_add_under_maintenance_section', array(
        'title'    => esc_attr__( 'Under Maintenance Setting', 'pofo-addons' ),
        'capability' => 'manage_options',
        'panel'       => 'pofo_add_general_panel',
      ) );

      require_once( POFO_ADDONS_ROOT.'/customizer/under-maintenance-settings.php' );
    }

    public function pofo_addons_import() {
      global $pagenow;

      wp_register_script( 'pofo-import-script', POFO_ADDONS_ROOT_DIR . '/importer/js/import.js' , array('jquery'), '1.0', true );
      wp_register_style( 'themify-icons', POFO_ADDONS_ROOT_DIR . '/importer/css/themify-icons.css', null );
      wp_register_style( 'pofo-import-style', POFO_ADDONS_ROOT_DIR . '/importer/css/import.css', null );
    
      if ( is_admin() && ( $pagenow == 'themes.php') ){
        if( isset( $_GET['page'] ) ) {
        
          if( $_GET['page'] === 'pofo-demo-import' ) {
            wp_enqueue_script( 'pofo-import-script' );
            wp_enqueue_style( 'themify-icons' );
            wp_enqueue_style( 'pofo-import-style' );

            wp_localize_script( 'pofo-import-script', 'pofo_import_messages', array(
              'no_single_layout' => esc_attr__( 'Please select an option from the list to import', 'pofo-addons' ),
              'single_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
              'customizer_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing theme customizer settings with demo settings.', 'pofo-addons' ),
              'menu_import_conformation' => esc_attr__( 'Are you sure to proceed? It will add new items, no matter if that exist or not.', 'pofo-addons' ),
              'widget_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing matching widgets data with demo widget data.', 'pofo-addons' ),
              'slider_import_conformation' => esc_attr__( 'Are you sure to proceed? It will add new items, no matter if that exist or not.', 'pofo-addons' ),
              'contact_form_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
              'mailchimp_import_conformation' => esc_attr__( 'Are you sure to proceed? It will skip matching items and add new ones.', 'pofo-addons' ),
              'media_import_conformation' => esc_attr__( 'Are you sure to proceed?', 'pofo-addons' ),
              'full_import_conformation' => esc_attr__( 'Are you sure to proceed? It will overwrite existing theme customizer settings and matching widget data and will add all other new data in your WordPress setup.', 'pofo-addons' )
            ) );
          }
        }
      }

      require_once( POFO_ADDONS_IMPORT .'/importer.php');     
    }

    public function pofo_demo_import_page() {
        add_theme_page(
                __( 'Demo Import', 'pofo-addons' ), // page title
                __( 'Demo Import', 'pofo-addons' ), // menu title
                'manage_options',                    // capability
                'pofo-demo-import',                 // menu slug
                'pofo_demo_import_callback'         // callback function
        );
    }

    public function pofo_addons_slider_script() {

        global $pofo_slider_script;

        if( !empty( $pofo_slider_script ) ) {
          ?>
            <script type="text/javascript"> (function($) { "use strict"; <?php echo $pofo_slider_script; ?> })(jQuery); </script>
          <?php 
        }
    }

  } // end of class
  $Pofo_Addons = new Pofo_Addons();
  
} // end of class_exists
<?php
/**
 * TGM Init Class
 *
 * @package Pofo
 */
?>
<?php

require_once POFO_THEME_TGM . '/class-tgm-plugin-activation.php';

if ( ! function_exists( 'pofo_register_required_plugins' ) ) {
    function pofo_register_required_plugins() {

    	$plugin_list = array(	
    		array(
                'name'				 => esc_html__( 'Pofo Addons', 'pofo' ),                              // The plugin name
                'slug'				 => 'pofo-addons',                              // The plugin slug (typically the folder name)
                'source'			 => POFO_THEME_DIR . '/plugins/pofo-addons.zip', // The plugin source
                'required'			 => true,                                          // If false, the plugin is only 'recommended' instead of required
                'version'			 => POFO_ADDONS_VERSION,                        // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'	 => false,                                         // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'		 => '',                                            // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => esc_html__( 'WPBakery Visual Composer', 'pofo' ),                    // The plugin name
                'slug'               => 'js_composer',                                 // The plugin slug (typically the folder name)
                'source'             => POFO_THEME_DIR . '/plugins/js_composer.zip', // The plugin source
                'required'           => true,                                          // If false, the plugin is only 'recommended' instead of required
                'version'            => '5.5.2',                                            // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,                                          // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',                                            // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => esc_html__( 'Revolution Slider', 'pofo' ),                    // The plugin name
                'slug'               => 'revslider',                                 // The plugin slug (typically the folder name)
                'source'             => POFO_THEME_DIR . '/plugins/revslider.zip', // The plugin source
                'required'           => true,                                          // If false, the plugin is only 'recommended' instead of required
                'version'            => '5.4.8',                                            // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'   => false,                                          // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation' => false,                                         // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'       => '',                                            // If set, overrides default API URL and points to an external URL
            ),
            array(
                'name'               => esc_html__( 'WooCommerce', 'pofo' ),                              // The plugin name.
                'slug'               => 'woocommerce',                              // The plugin slug (typically the folder name).
                'required'           => false,                                         // If false, the plugin is only 'recommended' instead of required.
            ),
    		array(
                'name'               => esc_html__( 'Contact Form 7', 'pofo' ),                              // The plugin name.
                'slug'               => 'contact-form-7',                              // The plugin slug (typically the folder name).
                'required'           => false,                                         // If false, the plugin is only 'recommended' instead of required.
            ),
            array(
                'name'               => esc_html__( 'MailChimp for WordPress', 'pofo' ),                     // The plugin name.
                'slug'               => 'mailchimp-for-wp',                          // The plugin slug (typically the folder name).
                'required'           => false,                                         // If false, the plugin is only 'recommended' instead of required.
            ),
    	);

    	$mainconfig = array(
                'id'           => 'pofo_tgmpa',                // Unique ID for hashing notices for multiple instances of TGMPA.
                'default_path' => '',                           // Default absolute path to bundled plugins.
                'menu'         => 'install-required-plugins',   // Menu slug.
                'parent_slug'  => 'themes.php',                 // Parent menu slug.
                'capability'   => 'edit_theme_options',         // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                'has_notices'  => true,                         // Show admin notices or not.
                'dismissable'  => true,                         // If false, a user cannot dismiss the nag message.
                'dismiss_msg'  => '',                           // If 'dismissable' is false, this message will be output at top of nag.
                'is_automatic' => false,                        // Automatically activate plugins after installation or not.
                'message'      => '',                           // Message to output right before the plugins table.
    	);

    	tgmpa( $plugin_list, $mainconfig );

    }
}

add_action( 'tgmpa_register', 'pofo_register_required_plugins' );   
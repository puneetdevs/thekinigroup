<?php
    if( !class_exists( 'Pofo_Require_Files_Class' ) ) {
        class Pofo_Require_Files_Class {
            /*
             * Includes all (require_once) php file(s) inside selected folder using class.
             */
            public function __construct() { }

            public static function Pofo_Theme_Require_Files( $fileName ) {

                if( is_array( $fileName ) ) {
                    foreach( $fileName as $name ) {
                        get_template_part( 'lib/'.$name );
                    }
                } else {
                    throw new Exception( esc_html__( 'File is not found in folder as you given', 'pofo' ) );
                }
                
            }

        }
    }
 
    $Pofo_Require_Files_Class = new Pofo_Require_Files_Class();


    /*
     *  Includes all required files for Pofo Theme.
     */
    Pofo_Require_Files_Class::Pofo_Theme_Require_Files(
        array(
            'pofo-enqueue-scripts-styles',
            'pofo-extra-functions',
            'pofo-licence-activation/pofo-licence-activation',
            'pofo-woocommerce-functions',
            'tgm/tgm-init',
            'customizer/pofo-customizer',
            'mega-menu/mega-menu',
            'hamburger-menu/hamburger-menu',
            'classic-menu/classic-menu',
            'pofo-breadcrumb',
            'pofo-excerpt',
            'pofo-google-font-list',
        )
    );
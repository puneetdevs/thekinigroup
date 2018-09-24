<?php
/**
 * Classic Menu
 *
 * @package Pofo
 */

    if( !class_exists( 'Pofo_Classic_Menu' ) ) {
        class Pofo_Classic_Menu {
            public function __construct() {
                add_action( 'init', array( $this, 'pofo_mega_menu_init' ) );
            }

            public function pofo_mega_menu_init() {
                get_template_part( 'lib/classic-menu/front-classic-menu' );
            }
        } // end of class

        $Pofo_Classic_Menu = new Pofo_Classic_Menu();
     }
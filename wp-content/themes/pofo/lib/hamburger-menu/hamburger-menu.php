<?php
    if( !class_exists( 'Pofo_Hamburger_Menu' ) ) {
        class Pofo_Hamburger_Menu {
            public function __construct() {
                add_action( 'init', array( $this, 'pofo_mega_menu_init' ) );
            }

            public function pofo_mega_menu_init() {
                get_template_part( 'lib/hamburger-menu/front-hamburger-menu' );
            }
        } // end of class

        $Pofo_Hamburger_Menu = new Pofo_Hamburger_Menu();
     }
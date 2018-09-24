<?php
  /**
   * Pofo Mega Menu Class.
   *
   * @package Pofo
   */
?>
<?php
    /**
     * Defind Pofo Mega Menu Class.
     *
     */

  if( !class_exists( 'Pofo_Mega_Menu' ) ) {
    class Pofo_Mega_Menu {
      public function __construct() {
        add_action( 'init', array( $this, 'pofo_mega_menu_init' ) );
      }

    public function pofo_mega_menu_init() {
      get_template_part( 'lib/mega-menu/pofo-font-icon-list' );
      get_template_part( 'lib/mega-menu/admin-mega-menu-addon' );
      get_template_part( 'lib/mega-menu/front-mega-menu-addon' );
    }
  } // end of class

  $Pofo_Mega_Menu = new Pofo_Mega_Menu();
  } // end of class_exists
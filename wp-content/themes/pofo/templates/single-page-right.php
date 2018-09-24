<?php
/**
 * Displaying right sidebar for pages
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_page_layout_setting = pofo_option( 'pofo_page_layout_setting', 'pofo_layout_full_screen_12col' );
	$pofo_page_right_sidebar = pofo_option( 'pofo_page_right_sidebar', '' );
	$pofo_page_left_sidebar = pofo_option( 'pofo_page_left_sidebar', '' );

	switch ($pofo_page_layout_setting) {
		case 'pofo_layout_full_screen_12col':
			echo '</div>';
		break;

		case 'pofo_layout_left_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? '' : ' pofo-page-widget-area';
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-sidebar'.esc_attr( $pofo_page_class ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_page_left_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_right_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? '' : ' pofo-page-widget-area';
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-sidebar'.esc_attr( $pofo_page_class ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_page_right_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_both_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_left_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? ' both-sidebar-left xs-margin-20px-bottom' : ' both-sidebar-left xs-margin-20px-bottom pofo-page-widget-area';
			$pofo_page_right_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? ' both-sidebar-right' : ' both-sidebar-right pofo-page-widget-area';
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar pofo-sidebar'.esc_attr( $pofo_page_left_class ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_page_left_sidebar );
			echo '</div>';
                        echo '<div id="secondary" class="col-md-3 col-sm-6 col-xs-12 sidebar pofo-sidebar'.esc_attr( $pofo_page_right_class ).'" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_page_right_sidebar );
			echo '</div>';
		break;
	}
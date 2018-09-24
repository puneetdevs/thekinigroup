<?php
/**
 * Displaying right sidebar for archive product
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

$pofo_product_archive_layout_setting = get_theme_mod( 'pofo_product_archive_layout_setting', 'pofo_layout_left_sidebar' );
$pofo_product_archive_right_sidebar = get_theme_mod( 'pofo_product_archive_right_sidebar', '' );
$pofo_product_archive_left_sidebar = get_theme_mod( 'pofo_product_archive_left_sidebar', 'pofo-shop-1' );

switch ($pofo_product_archive_layout_setting) {
	case 'pofo_layout_full_screen_12col':
		echo '</div>';
	break;

	case 'pofo_layout_left_sidebar':
		echo '</div>';
		echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-woocommerce-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			pofo_page_sidebar_style( $pofo_product_archive_left_sidebar );
		echo '</div>';
	break;

	case 'pofo_layout_right_sidebar':
		echo '</div>';
		echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-woocommerce-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			pofo_page_sidebar_style( $pofo_product_archive_right_sidebar );
		echo '</div>';
	break;

	case 'pofo_layout_both_sidebar':
		echo '</div>';
		echo '<div id="secondary" class="col-sm-6 col-xs-12 sidebar pofo-woocommerce-sidebar both-sidebar-left xs-margin-20px-bottom" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			pofo_page_sidebar_style( $pofo_product_archive_left_sidebar );
		echo '</div>';
        echo '<div id="secondary" class="col-sm-6 col-xs-12 sidebar pofo-woocommerce-sidebar both-sidebar-right" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
			pofo_page_sidebar_style( $pofo_product_archive_right_sidebar );
		echo '</div>';
	break;
}
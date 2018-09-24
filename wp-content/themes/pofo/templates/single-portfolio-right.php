<?php
/**
 * Displaying right sidebar for single portfolio
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_single_portfolio_layout_setting = pofo_option( 'pofo_single_portfolio_layout_setting', 'pofo_layout_full_screen_12col' );
	$pofo_single_portfolio_right_sidebar = pofo_option( 'pofo_single_portfolio_right_sidebar', '' );
	$pofo_single_portfolio_left_sidebar = pofo_option( 'pofo_single_portfolio_left_sidebar', '' );

	switch ($pofo_single_portfolio_layout_setting) {
		case 'pofo_layout_full_screen_12col':
			echo '</div>';
		break;

		case 'pofo_layout_left_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-sidebar pull-left pofo-page-widget-area" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_portfolio_left_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_right_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-4 col-xs-12 sidebar pofo-sidebar pofo-page-widget-area" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_portfolio_right_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_both_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-sm-6 sidebar pofo-sidebar both-sidebar-left xs-margin-ten-bottom pofo-page-widget-area" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_portfolio_left_sidebar );
			echo '</div>';
	        echo '<div id="secondary" class="col-sm-6 sidebar pofo-sidebar both-sidebar-right pofo-page-widget-area" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_portfolio_right_sidebar );
			echo '</div>';
		break;
	}
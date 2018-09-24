<?php
/**
 * Displaying right sidebar for default post
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_single_post_layout_setting = get_theme_mod( 'pofo_post_layout_setting_default', 'pofo_layout_right_sidebar' );
	$pofo_single_post_right_sidebar = get_theme_mod( 'pofo_post_right_sidebar_default', 'sidebar-1' );
	$pofo_single_post_left_sidebar = get_theme_mod( 'pofo_post_left_sidebar_default', '' );

	switch ($pofo_single_post_layout_setting) {
		case 'pofo_layout_full_screen_12col':
		break;

		case 'pofo_layout_left_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-12 col-xs-12 sidebar pofo-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_post_left_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_right_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-md-3 col-sm-12 col-xs-12 sidebar pofo-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_post_right_sidebar );
			echo '</div>';
		break;

		case 'pofo_layout_both_sidebar':
			echo '</div>';
			echo '<div id="secondary" class="col-sm-6 col-xs-12 sidebar pofo-sidebar both-sidebar-left xs-margin-20px-bottom" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_post_left_sidebar );
			echo '</div>';
	        echo '<div id="secondary" class="col-sm-6 col-xs-12 sidebar pofo-sidebar both-sidebar-right" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">';
				pofo_page_sidebar_style( $pofo_single_post_right_sidebar );
			echo '</div>';
		break;
	}
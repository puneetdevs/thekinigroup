<?php
/**
 * Displaying left template for pages
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_page_layout_setting = pofo_option( 'pofo_page_layout_setting', 'pofo_layout_full_screen_12col' );

	switch( $pofo_page_layout_setting ) {
		case 'pofo_layout_full_screen_12col':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? ' pofo-my-account-full' : '';
			echo '<div class="col-md-12 col-sm-12 col-xs-12'.esc_attr( $pofo_page_class ).'">';
		break;

		case 'pofo_layout_left_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? ' pull-right' : ' padding-45px-left no-padding-right sm-padding-15px-lr sm-margin-60px-bottom xs-margin-40px-bottom pull-right pofo-page-content-area';
			echo '<div class="col-md-9 col-sm-8 col-xs-12'.esc_attr( $pofo_page_class ).'">';
		break;

		case 'pofo_layout_right_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? '' : ' padding-45px-right no-padding-left sm-padding-15px-lr sm-margin-60px-bottom xs-margin-40px-bottom pofo-page-content-area';
			echo '<div class="col-md-9 col-sm-8 col-xs-12'.esc_attr( $pofo_page_class ).'">';
		break;

		case 'pofo_layout_both_sidebar':
			/* if WooCommerce plugin is activated */
			$pofo_page_class = ( class_exists( 'WooCommerce' ) && is_account_page() ) ? ' both-content-center sm-margin-40px-bottom xs-margin-20px-bottom' : ' both-content-center post-center sm-margin-60px-bottom xs-margin-40px-bottom pofo-page-content-area';
	        echo '<div class="col-md-6 col-sm-12 col-xs-12'.esc_attr( $pofo_page_class ).'">';
	    break;
	}
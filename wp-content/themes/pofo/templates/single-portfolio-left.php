<?php
/**
 * Displaying left template for single portfolio
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_single_portfolio_layout_setting = pofo_option( 'pofo_single_portfolio_layout_setting', 'pofo_layout_full_screen_12col' );

	switch( $pofo_single_portfolio_layout_setting ) {
		case 'pofo_layout_full_screen_12col':
			echo '<div class="col-md-12 col-sm-12 col-xs-12">';
		break;

		case 'pofo_layout_left_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-left-35 sm-padding-left-15 sm-margin-six-bottom xs-margin-ten-bottom pull-right pofo-page-content-area">';
		break;

		case 'pofo_layout_right_sidebar':
			echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-right-35 sm-padding-right-15 sm-margin-six-bottom xs-margin-ten-bottom pofo-page-content-area">';
		break;
		case 'pofo_layout_both_sidebar':
	        echo '<div class="col-sm-12 both-content-center sm-margin-seven-top post-center sm-no-padding-lr pofo-page-content-area">';
	    break;
	}
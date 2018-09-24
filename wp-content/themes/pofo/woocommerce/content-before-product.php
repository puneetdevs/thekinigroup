<?php
/**
 * Displaying left template for single product
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

$pofo_single_product_layout_setting = pofo_option( 'pofo_single_product_layout_setting', 'pofo_layout_full_screen_12col' );

switch( $pofo_single_product_layout_setting ) {
	case 'pofo_layout_full_screen_12col':
        echo '<div class="col-sm-12">';
	break;

	case 'pofo_layout_left_sidebar':
		echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-45px-left sm-padding-15px-lr xs-margin-40px-bottom pull-right">';
	break;

	case 'pofo_layout_right_sidebar':
		echo '<div class="col-md-9 col-sm-8 col-xs-12 padding-45px-right sm-padding-15px-lr xs-margin-40px-bottom">';
	break;
	case 'pofo_layout_both_sidebar':
        echo '<div class="col-sm-12 col-xs-12 both-content-center post-center sm-margin-60px-bottom xs-margin-40px-bottom">';
    break;
}
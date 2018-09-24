<?php
/**
 * Displaying left template for archive post
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

	$pofo_single_post_layout_setting = get_theme_mod( 'pofo_post_layout_setting_archive', 'pofo_layout_right_sidebar' );

	switch( $pofo_single_post_layout_setting ) {
		case 'pofo_layout_full_screen_12col':
		break;

		case 'pofo_layout_left_sidebar':
			echo '<div class="col-md-9 col-sm-12 col-xs-12 padding-45px-left no-padding-right sm-no-padding-lr sm-margin-60px-bottom xs-margin-40px-bottom pull-right">';
		break;

		case 'pofo_layout_right_sidebar':
			echo '<div class="col-md-9 col-sm-12 col-xs-12 padding-45px-right no-padding-left sm-no-padding-lr sm-margin-60px-bottom xs-margin-40px-bottom">';
		break;
		case 'pofo_layout_both_sidebar':
	        echo '<div class="col-sm-12 col-xs-12 both-content-center post-center no-padding-lr sm-margin-60px-bottom xs-margin-40px-bottom">';
	    break;
	}
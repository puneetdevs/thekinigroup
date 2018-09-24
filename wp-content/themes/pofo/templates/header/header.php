<?php

    /* Exit if accessed directly. */
    if ( !defined( 'ABSPATH' ) ) { exit; }

    /* Check header enable/disable */
    $pofo_disable_header = pofo_option( 'pofo_disable_header', '1' );

    /* Get header layout type */
    $pofo_header_layout = pofo_option( 'pofo_header_type', 'headertype1' );

    if( $pofo_disable_header != 1 ) {
    	return;
    }

    switch( $pofo_header_layout ) {
        
        case 'headertype1':
            get_template_part( 'templates/header/header-style', 'one' );
        break;

        case 'headertype2':
            get_template_part( 'templates/header/header-style', 'two' );
        break;

        case 'headertype3':
            get_template_part( 'templates/header/header-style', 'three' );
        break;

        case 'headertype4':
            get_template_part( 'templates/header/header-style', 'four' );
        break;

        default:
            echo '';
        break;

    }
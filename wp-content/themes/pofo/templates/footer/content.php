<?php
/**
 * The template for displaying the footer
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Check if footer social icon show / hide */
	$pofo_footer_extra_class = '';
	$pofo_text_center_class = array();
	$pofo_disable_footer = pofo_option( 'pofo_disable_footer', '1' );
	$pofo_footer_style = pofo_option( 'pofo_footer_style', 'footer-style-one' );
	$pofo_footer_sidebar1 = pofo_option( 'pofo_footer_sidebar1', 'footer-sidebar-1' );
	$pofo_footer_sidebar2 = pofo_option( 'pofo_footer_sidebar2', 'footer-sidebar-2' );
	$pofo_footer_sidebar3 = pofo_option( 'pofo_footer_sidebar3', 'footer-sidebar-3' );
	$pofo_footer_sidebar4 = pofo_option( 'pofo_footer_sidebar4', 'footer-sidebar-4' );
	$pofo_disable_footer_sidebar1 = pofo_option( 'pofo_disable_footer_sidebar1', '' );
	$pofo_disable_footer_sidebar2 = pofo_option( 'pofo_disable_footer_sidebar2', '' );
	$pofo_disable_footer_sidebar3 = pofo_option( 'pofo_disable_footer_sidebar3', '' );
	$pofo_disable_footer_sidebar4 = pofo_option( 'pofo_disable_footer_sidebar4', '' );
	$pofo_footer_container_fluid = pofo_option( 'pofo_footer_container_fluid', '0' );
	$pofo_container_fluid = ( $pofo_footer_container_fluid == 1 ) ? 'container-fluid' : 'container';
    $pofo_footer_padding_setting = pofo_option( 'pofo_footer_padding_setting', 'small-padding' );   

    switch ($pofo_footer_padding_setting) {
        case 'medium-padding':
            $pofo_footer_extra_class .= ' padding-65px-tb xs-padding-30px-tb';
            break;

        case 'large-padding':
            $pofo_footer_extra_class .= ' padding-five-tb xs-padding-30px-tb';
            break;
        
        case 'small-padding':
        default:
            $pofo_footer_extra_class .= ' padding-five-top padding-30px-bottom xs-padding-30px-top';
            break;
    }

    // add unique style class
    $pofo_footer_extra_class .= ' ' . $pofo_footer_style;

	switch( $pofo_footer_style ) {
		case 'footer-style-one':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;	        			
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}

    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row">';
	                    switch ($sidebar_counter) {
	                    	case '4':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom sm-clear-both xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;
	                    	
	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-4 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-6 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-6 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-text-center sm-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
		break;
		case 'footer-style-two':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;	        			
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}

    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row equalize sm-equalize-auto">';
	                    switch ($sidebar_counter) {
	                    	case '4':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-3 col-sm-6 col-xs-12 widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-clear-both xs-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-4 col-sm-6 col-xs-12 widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-6 col-sm-12 col-xs-12 widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
	                    	break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-12 col-sm-12 col-xs-12 widget pofo-right-border-style sm-no-border-right sm-margin-30px-bottom xs-text-center">';
		                            	pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-no-border-right sm-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left sm-clear-both sm-no-border-right xs-margin-30px-bottom xs-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                        }if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget pofo-right-border-style padding-45px-left sm-padding-15px-left">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
			                    }
	                    	break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
		break;
		case 'footer-style-three':
			$sidebar_counter = 0;
    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
    			$sidebar_counter++;	        			
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
    			$sidebar_counter++;
    		}
    		if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
    			$sidebar_counter++;
    		}

    		do_action( 'pofo_footer_sidebar_style_three_before' );
    		if( $sidebar_counter != 0 ){
	            echo '<div class="footer-widget-area'.$pofo_footer_extra_class.'">';
	                echo '<div class="'.$pofo_container_fluid.'">';
	                    echo '<div class="row">';
	                    switch ($sidebar_counter) {
	                    	case '4':
		                    	if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-3 col-sm-12 col-xs-12 widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center xs-text-left">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-4 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-4 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-3 col-sm-4 col-xs-12 widget">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;
	                    	
	                    	case '3':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-4 col-sm-12 col-xs-12 widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-4 col-sm-6 col-xs-12 widget">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '2':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-6 col-sm-12 col-xs-12 widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-6 col-sm-12 col-xs-12 widget">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;

	                    	case '1':
	                    		if ( is_active_sidebar( $pofo_footer_sidebar1 ) && $pofo_disable_footer_sidebar1 != '0' ) {
		                    		echo '<div class="col-md-12 col-sm-12 col-xs-12 widget sm-margin-50px-bottom xs-margin-30px-bottom sm-text-center">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar1);
			                        echo '</div>';
			                    }
			                    if ( is_active_sidebar( $pofo_footer_sidebar2 ) && $pofo_disable_footer_sidebar2 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar2);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar3 ) && $pofo_disable_footer_sidebar3 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget xs-margin-30px-bottom">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar3);
			                        echo '</div>';
		                    	}
		                    	if ( is_active_sidebar( $pofo_footer_sidebar4 ) && $pofo_disable_footer_sidebar4 != '0' ) {
			                        echo '<div class="col-md-12 col-sm-12 col-xs-12 widget">';
			                            pofo_footer_sidebar_style($pofo_footer_sidebar4);
			                        echo '</div>';
		                    	}
	                    		break;
	                    }
	                    echo '</div>';
	                echo '</div>';
	            echo '</div>';
	        }
    		do_action( 'pofo_footer_sidebar_style_three_after' );

		break;
	}
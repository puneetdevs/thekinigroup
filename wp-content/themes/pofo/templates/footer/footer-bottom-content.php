<?php
/**
 * The template for displaying the footer bottom
 *
 * @package Pofo
 */
?>
<?php
	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }

	/* Check if footer social icon show / hide */
    $pofo_footer_bottom_extra_class = '';
    $pofo_disable_footer_bottom_right = pofo_option( 'pofo_disable_footer_bottom_right', '' );
	$pofo_footer_bottom_right_text = pofo_option( 'pofo_footer_bottom_right_text', '2018 POFO is Proudly Powered by ThemeZaa' );
    $pofo_disable_footer_bottom_left = pofo_option( 'pofo_disable_footer_bottom_left', '' );
	$pofo_footer_bottom_left_text = pofo_option( 'pofo_footer_bottom_left_text', 'POFO - Portfolio Concept Theme' );
    $pofo_footer_bottom_style = pofo_option( 'pofo_footer_bottom_style', 'footer-bottom-style-1' );
    $pofo_footer_bottom_padding_setting = pofo_option( 'pofo_footer_bottom_padding_setting', 'small-padding' );
    $pofo_footer_bottom_container_fluid = pofo_option( 'pofo_footer_bottom_container_fluid', '0' );
    $pofo_container_fluid = ( $pofo_footer_bottom_container_fluid == 1 ) ? 'container-fluid' : 'container';
    switch ($pofo_footer_bottom_padding_setting) {
        case 'medium-padding':
            $pofo_footer_bottom_extra_class .= ' padding-65px-tb xs-padding-30px-tb';
            break;

        case 'large-padding':
            $pofo_footer_bottom_extra_class .= ' padding-five-tb xs-padding-30px-tb';
            break;
        
        case 'small-padding':
        default:
            $pofo_footer_bottom_extra_class .= ' padding-50px-tb xs-padding-30px-tb';
            break;
    }
    
    // add unique style class
    $pofo_footer_bottom_extra_class .= ' ' . $pofo_footer_bottom_style;

    switch ( $pofo_footer_bottom_style ) {
        case 'footer-bottom-style-1':
            if( $pofo_footer_bottom_left_text || $pofo_footer_bottom_right_text ){
                echo '<div class="pofo-footer-bottom">';
                    echo '<div class="'.$pofo_container_fluid.'">';
                        echo '<div class="footer-bottom border-top border-color-medium-dark-gray'.$pofo_footer_bottom_extra_class.'">';
                            echo '<div class="row">';
                            if( ( $pofo_footer_bottom_left_text && $pofo_footer_bottom_right_text ) && ( ( $pofo_disable_footer_bottom_left != '0' || $pofo_disable_footer_bottom_left == '' ) && ( $pofo_disable_footer_bottom_right != '0' ) ) ){
                                if( $pofo_footer_bottom_left_text && ( $pofo_disable_footer_bottom_left != '0' ) ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center footer-left-text">'.$pofo_footer_bottom_left_text.'</div>';
                                }
                                if( $pofo_footer_bottom_right_text && ( $pofo_disable_footer_bottom_right != '0' ) ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center footer-right-text">'.$pofo_footer_bottom_right_text.'</div>';
                                }
                            }else if( $pofo_footer_bottom_left_text || $pofo_footer_bottom_right_text ){
                                if( $pofo_footer_bottom_left_text && ( $pofo_disable_footer_bottom_left != '0' ) ){
                                    echo '<div class="col-md-12 col-xs-12 text-small text-center footer-left-text">'.$pofo_footer_bottom_left_text.'</div>';
                                }
                                if( $pofo_footer_bottom_right_text && ( $pofo_disable_footer_bottom_right != '0' ) ){
                                    echo '<div class="col-md-12 col-xs-12 text-small text-center footer-right-text">'.$pofo_footer_bottom_right_text.'</div>';
                                }
                            }
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            break;
        
        case 'footer-bottom-style-2':
            if( $pofo_footer_bottom_left_text || $pofo_footer_bottom_right_text ){
                echo '<div class="pofo-footer-bottom footer-bottom text-center'.$pofo_footer_bottom_extra_class.'">';
                    echo '<div class="'.$pofo_container_fluid.'">';
                        echo '<div class="row">';
                            if( ( $pofo_footer_bottom_left_text && $pofo_footer_bottom_right_text ) && ( ( $pofo_disable_footer_bottom_left != '0' || $pofo_disable_footer_bottom_left == '' ) && ( $pofo_disable_footer_bottom_right != '0' ) ) ){
                                if( $pofo_footer_bottom_left_text && ( $pofo_disable_footer_bottom_left != '0' ) ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center footer-left-text">'.$pofo_footer_bottom_left_text.'</div>';
                                }
                                if( $pofo_footer_bottom_right_text && ( $pofo_disable_footer_bottom_right != '0' ) ){
                                    echo '<div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center footer-right-text">'.$pofo_footer_bottom_right_text.'</div>';
                                }
                            }else if( $pofo_footer_bottom_left_text || $pofo_footer_bottom_right_text ){
                                if( $pofo_footer_bottom_left_text && ( $pofo_disable_footer_bottom_left != '0' ) ){
                                    echo '<div class="col-md-12 col-xs-12 text-small text-center footer-left-text">'.$pofo_footer_bottom_left_text.'</div>';
                                }
                                if( $pofo_footer_bottom_right_text && ( $pofo_disable_footer_bottom_right != '0' ) ){
                                    echo '<div class="col-md-12 col-xs-12 text-small text-center footer-right-text">'.$pofo_footer_bottom_right_text.'</div>';
                                }
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';    
            }
        break;
    }
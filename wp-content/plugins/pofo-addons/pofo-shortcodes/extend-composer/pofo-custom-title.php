<?php
/**
 * Pofo Custom Width Class List For VC.
 *
 * @package Pofo
 */
?>
<?php
vc_add_shortcode_param( 'pofo_custom_title', 'pofo_custom_title_callback' );
if ( ! function_exists( 'pofo_custom_title_callback' ) ) :
	function pofo_custom_title_callback( $settings, $value ) {
	   return '<div class="pofo-custom-title"><div style="border-bottom: 1px solid #ddd; margin: 10px 0; padding-bottom: 5px;  font-weight: bold;">'.esc_attr( $value )
	             .'</div><input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .
	             esc_attr( $settings['param_name'] ) . ' ' .
	             esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />' .
	             '</div>'; // This is html markup that will be outputted in content elements edit form
	}
endif;
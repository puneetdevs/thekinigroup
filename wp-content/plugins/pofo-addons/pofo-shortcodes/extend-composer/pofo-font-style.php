<?php
/**
 * Pofo Font Styles For VC Fields.
 *
 * @package Pofo
 */
?>
<?php 
if( !function_exists('pofo_font_weight_style')) {
  function pofo_font_weight_style() {
  	
    $output = array(
	    				esc_html__( 'Select Font Weight', 'pofo-addons') => '',
						esc_html__( 'Font weight 300', 'pofo-addons') => '300',
						esc_html__( 'Font weight 400', 'pofo-addons') => '400',
						esc_html__( 'Font weight 500', 'pofo-addons') => '500',
						esc_html__( 'Font weight 600', 'pofo-addons') => '600',
						esc_html__( 'Font weight 700', 'pofo-addons') => '700',
						esc_html__( 'Font weight 800', 'pofo-addons') => '800',
						esc_html__( 'Font weight 900', 'pofo-addons') => '900',
		           );
    return $output;
  }
}
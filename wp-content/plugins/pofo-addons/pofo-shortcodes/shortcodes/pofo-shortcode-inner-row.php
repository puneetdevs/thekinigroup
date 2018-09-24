<?php
/**
 * Shortcode For Row
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Row */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_inner_row' ) ) {
	function pofo_inner_row($atts, $content = null){

		global $pofo_responsive_style;

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'css' => '',
	    	'pofo_enable_responsive_css' => '',
	    	'responsive_css' => '',

			'equal_height' => '',
			'content_placement' => '',
	        'gap' => '0',
	        'disable_element' => '',

	        'position_relative' => '',
	        'pofo_overflow_type' => '',
	        
	        'pofo_bg_image_type' => '',
	        'desktop_bg_image_position' => '',
	        'desktop_height' => '',

	        'show_overlay' => '',
	        'pofo_overlay_opacity' => '0.7',
	        'pofo_row_overlay_color' => '',
	        'pofo_z_index' => '',

	        'initial_loading_animation' => '',
	    ), $atts ) );
		$output = $padding = $padding_style = $margin = $margin_style = $style_attr = $overlay_style = '';
		$classes = $style_array = $wrapper_attributes = array();

		if ( ! empty( $id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $id ) . '"';
		}

		$classes = array(
			'vc_row',
			'wpb_row',
			//deprecated
			'vc_inner',
			'vc_row-fluid',
			$class,
			vc_shortcode_custom_css_class( $css ),
		);

		if ( 'yes' === $disable_element ) {
			if ( vc_is_page_editable() ) {
				$classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
			} else {
				return '';
			}
		}

		if ( vc_shortcode_custom_css_has_property( $css, array(
			'border',
			'background',
		) ) ) {
			$classes[] = 'vc_row-has-fill';
		}

		if ( ! empty( $atts['gap'] ) ) {
			$classes[] = 'vc_column-gap-' . $atts['gap'];
		}

		if ( ! empty( $equal_height ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-equal-height';
		}

		if ( ! empty( $content_placement ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-content-' . $content_placement;
		}

		if ( ! empty( $flex_row ) ) {
			$classes[] = 'vc_row-flex';
		}

		$position_relative 	= ($position_relative == 1) ? $classes[] = 'position-relative' : '';
		$pofo_overflow_type	= ( !empty( $pofo_overflow_type ) ) ? $classes[] = $pofo_overflow_type : '';
		
		// Background Image
		!empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
		!empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
		!empty( $desktop_height ) ?  $style_array[] = "min-height: ".$desktop_height.";" : '';

		/* For Animation*/
		$initial_loading_animation = ($initial_loading_animation) ? $classes[] = 'wow '.$initial_loading_animation.'' : '';
	         
		// Responsive CSS Box
		if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
			$responsive_id = uniqid('pofo-inner-row-responsive-');
			$responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
			$classes[] = $responsive_id;
		}
  
		// Class List
		$class_list 	= !empty( $classes ) ? implode(" ", $classes) : '';
		if( !empty( $class_list ) ) {
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $class_list ) ) . '"';
		}

		// Style Property List
		$style_property = ( $style_array ) ? implode("", $style_array) : '';
		if( !empty( $style_property ) ) {
			$wrapper_attributes[] = 'style="' . esc_attr( trim( $style_property ) ) . '"';
		}

		// Overlay Style
		$pofo_overlay_opacity = !empty($pofo_overlay_opacity) ? 'opacity:'.$pofo_overlay_opacity.'; ' : 'opacity:0;';
		$pofo_row_overlay_color_att = ($pofo_row_overlay_color) ? 'background-color:'.$pofo_row_overlay_color.'; ' : '';
		$pofo_z_index = ( $pofo_z_index || $pofo_z_index == '0') ? 'z-index:'.$pofo_z_index.'; ' : '';

		if( $pofo_overlay_opacity || $pofo_row_overlay_color_att || $pofo_z_index ){
			$overlay_style = ' style="'.$pofo_overlay_opacity.$pofo_row_overlay_color_att.$pofo_z_index.'"';
		}

		$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
			
			if($show_overlay=='1'){
				$output .= '<div class="bg-extra-dark-gray bg-overlay"'.$overlay_style.'></div>';
			}

	        $output .=  do_shortcode( shortcode_unautop( $content ) );
	        
	    $output .= '</div>';

		if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
			
            $pofo_responsive_style .= $responsive_style;
		}

		return $output;
	}
}
add_shortcode( 'vc_row_inner', 'pofo_inner_row' );
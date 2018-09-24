<?php
/**
 * Shortcode For Column
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Column */
/*-----------------------------------------------------------------------------------*/
function vc_column( $atts, $content = '', $id = '' ) {

	global $pofo_responsive_style;

	extract( shortcode_atts( array(
        'id' => '',
		'class' => '',
	    'css' => '',
    	'pofo_enable_responsive_css' => '',
    	'responsive_css' => '',

	    'fullscreen' => '',
		'position_relative' => '',
		'no_column_padding' => '',
		'pofo_overflow_type' => '',

        'pofo_bg_image_type' => '',
        'desktop_bg_image_position' => '',
        'desktop_height' => '',
        
        'show_overlay' => '',
        'pofo_overlay_opacity' => '0.7',
        'pofo_row_overlay_color' => '',
        'pofo_z_index' => '',

        'desktop_alignment' => '',
        'desktop_mini_alignment' => '',
        'ipad_alignment' => '',
        'mobile_alignment' => '',

        'desktop_display' => '',
        'desktop_mini_display' => '',
        'ipad_display' => '',
        'mobile_display' => '',
        'enable_clear_both' => '',
        'desktop_clear_both' => '',
        'desktop_mini_clear_both' => '',
        'ipad_clear_both' => '',
        'mobile_clear_both' => '',
        'width' => '',
        'offset' => '',
        'pofo_column_animation_style' => '',
        'pofo_column_animation_delay' => '',
	), $atts ) );
	// Define Empty Variables.
	$output = $class_list = $bg_img_class_list = $style_property = $column_border_pos = $style_attr = $min_height_class = $overlay_style = '';
	$classes = $bg_img_classes = $style_array = $clear_both = array();

	$classes = array(
		'wpb_column',
		'vc_column_container'
	);

	if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) ) {
		$classes[] = 'vc_col-has-fill';
	}

	// Column Id and class
	$id = ( $id ) ? ' id="'.$id.'"' : '';
    $class = ( $class ) ? $classes[] = $class : '';

	// Specify Column default class
	$fullscreen 	   	= ( $fullscreen == 1 ) ? $classes[] = 'full-screen' : '';
	$position_relative 	= ( $position_relative == 1 ) ? $classes[] = 'position-relative' : '';
	$no_column_padding  = ( $no_column_padding == 1 ) ? ' no-column-padding' : '';
	$pofo_overflow_type	= ( !empty( $pofo_overflow_type ) ) ? $classes[] = $pofo_overflow_type : '';

	// Background Image
	!empty( $pofo_bg_image_type ) ? $bg_img_classes[] = $pofo_bg_image_type : '';
	!empty( $desktop_bg_image_position ) ? $bg_img_classes[] = $desktop_bg_image_position : '';
	!empty( $desktop_height ) ?  $style_array[] = "min-height: ".$desktop_height.";" : '';

	// Column Offset and sm width
	if($width != ''){
		$width = explode('/', $width);
    	$width = ( $width[0] != '1' ) ? $classes[] = 'vc_col-sm-'.$width[0] * floor(12 / $width[1]) : $classes[] = 'vc_col-sm-'.floor(12 / $width[1]);
	}
	
	if(strchr($offset,'col-xs')){
		$classes[] = $offset;
	}else{
		$classes[] = $offset." col-xs-mobile-fullwidth";
	}

	$desktop_clear_both = !empty( $desktop_clear_both ) ? $classes[] = $desktop_clear_both : '';
	$desktop_mini_clear_both = !empty( $desktop_mini_clear_both ) ? $classes[] = $desktop_mini_clear_both : '';
	$ipad_clear_both = !empty( $ipad_clear_both ) ? $classes[] = $ipad_clear_both : '';
	$mobile_clear_both = !empty( $mobile_clear_both ) ? $classes[] = $mobile_clear_both : '';
	
	// Column Animation
	$pofo_column_animation_style = ( $pofo_column_animation_style ) ? $classes[] ='wow '.$pofo_column_animation_style : '';
	$pofo_column_animation_delay = ( $pofo_column_animation_delay ) ? ' data-wow-delay= '.$pofo_column_animation_delay.'ms' : '';

	// VC front editor
	$pofo_front_column_class = '';
	$desktop_clear_both_vc = !empty( $desktop_clear_both ) ? $clear_both[] = $desktop_clear_both : '';
	$desktop_mini_clear_both_vc = !empty( $desktop_mini_clear_both ) ? $clear_both[] = $desktop_mini_clear_both : '';
	$ipad_clear_both_vc = !empty( $ipad_clear_both ) ? $clear_both[] = $ipad_clear_both : '';
	$mobile_clear_both_vc = !empty( $mobile_clear_both ) ? $clear_both[] = $mobile_clear_both : '';

	$clear_both_classes = !empty( $clear_both ) ? implode(" ", $clear_both) : '';
	if( $clear_both_classes ){
		$pofo_front_column_class = ' data-clear-both="'.$clear_both_classes.'"';
	}

	// Column Allignment settings
	$desktop_alignment = !empty( $desktop_alignment ) ? $classes[] = $desktop_alignment : '';
	$desktop_mini_alignment = !empty( $desktop_mini_alignment ) ? $classes[] = $desktop_mini_alignment : '';
	$ipad_alignment = !empty( $ipad_alignment ) ? $classes[] = $ipad_alignment : '';
	$mobile_alignment = !empty( $mobile_alignment ) ? $classes[] = $mobile_alignment : '';

	// Column Display setting
    $desktop_display = !empty($desktop_display) ? $classes[] = $desktop_display : '';
    $desktop_mini_display = !empty($desktop_mini_display) ? $classes[] = $desktop_mini_display : '';
    $ipad_display 	 = !empty($ipad_display) ? $classes[] = $ipad_display : '';
    $mobile_display  = !empty($mobile_display) ? $classes[] = $mobile_display : '';

	// Responsive CSS Box
	if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
		$responsive_id = uniqid('pofo-column-responsive-');
		$column_selector = $responsive_id . ' > .vc_column-inner';
		$responsive_style = pofo_addons_get_responsive_style( $responsive_css, $column_selector );
		$classes[] = $responsive_id;
	}

	// Class List
	$class_list = !empty( $classes ) ? implode(" ", $classes) : '';
	$column_class = ( $class_list ) ? ' class="'.$class_list.'"' : '';

	// Background Image Class List
	$bg_img_class_list = !empty( $bg_img_classes ) ? implode(" ", $bg_img_classes) . ' ' : '';
	
	// Style Property List
	$style_property_list = implode(" ", $style_array);
	$style_property = ( $style_property_list ) ? ' style="'.$style_property_list.'"' : '';

    // Overlay Style
    $pofo_overlay_opacity = !empty($pofo_overlay_opacity) ? 'opacity:'.$pofo_overlay_opacity.'; ' : 'opacity:0;';
    $pofo_row_overlay_color_att = ($pofo_row_overlay_color) ? 'background-color:'.$pofo_row_overlay_color.'; ' : '';
    $pofo_z_index = ( $pofo_z_index || $pofo_z_index == '0') ? 'z-index:'.$pofo_z_index.'; ' : '';

    if( $pofo_overlay_opacity || $pofo_row_overlay_color_att || $pofo_z_index ){
        $overlay_style = ' style="'.$pofo_overlay_opacity.$pofo_row_overlay_color_att.$pofo_z_index.'"';
    }

	$output .= '<div'.$id.$column_class.$pofo_column_animation_delay.$pofo_front_column_class.'>';
		$output .= '<div class="vc_column-inner ' . $bg_img_class_list . esc_attr( trim( vc_shortcode_custom_css_class( $css ) ) ) . $no_column_padding . '"'.$style_property.'>';
			$output .= '<div class="wpb_wrapper">';
			
				if($show_overlay=='1'){
					$output .= '<div class="bg-extra-dark-gray bg-overlay"'.$overlay_style.'></div>';
				}

				$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
		
        $pofo_responsive_style .= $responsive_style;
	}

	return $output;
}
add_shortcode( 'vc_column', 'vc_column' );
add_shortcode( 'vc_column_inner', 'vc_column' );
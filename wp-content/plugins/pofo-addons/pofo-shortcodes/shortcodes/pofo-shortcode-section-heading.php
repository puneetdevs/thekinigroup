<?php
/**
 * Shortcode For Section Heading
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Section Heading */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_section_heading' ) ) {
	function pofo_section_heading( $atts, $content = null ) {

		global $pofo_responsive_style, $pofo_featured_array, $pofo_heading_title;

		extract( shortcode_atts( array(
				'id' => '',
		        'class' => '',
	            'css' => '',
	            'pofo_enable_responsive_css' => '',
	            'responsive_css' => '',

	            'pofo_heading_type' => '',
	        	'pofo_heading' => '',
	        	'pofo_text_transform' => '',
            	'pofo_enable_underline_on_title' => '1',
            	'pofo_enable_separator_before_after_title' => '1',
            	'pofo_enable_big_separator' => '',
	            'pofo_enable_link' => '',
	            'pofo_link_url' => '',
	            'pofo_link_target' => '',
	            'pofo_link_hover_color' => '',
	            'pofo_enable_alternate_font' => '1',
	            	            	
	            'pofo_title_font_size' => '',
	            'pofo_title_line_height' => '',
	            'pofo_title_letter_spacing' => '',
	            'pofo_title_font_weight' => '',
	            'pofo_title_italic' => '',
	            'pofo_title_underline' => '',
	            'pofo_title_element_tag' => '',
	            'pofo_title_color' => '',
	            'pofo_title_enable_responsive_font' => '',

	            'desktop_display' => 'display-inline-block',

	            'pofo_bg_image_type' => '',
	            'desktop_bg_image_position' => '',
	            'desktop_width' => '',
	        ), $atts ) );

        $classes = $style_array = array();
		$output = $style = $class_list = $style_attr = '';

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

	    // Replace || to <br /> in title
	    $pofo_heading = ( $pofo_heading ) ? str_replace('||', '<br />',$pofo_heading) : '';

        // Background Image
        !empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
        !empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
        !empty( $desktop_width ) ?  $style_array[] = "width: ".$desktop_width.";" : '';

        // Display setting
        if( $pofo_heading_type == 'heading-style2' || $pofo_heading_type == 'heading-style3' || $pofo_heading_type == 'heading-style5' ) {
        	$desktop_display = ($desktop_display) ? $classes[] = $desktop_display : '';
        }

        $pofo_link_url      	= ( $pofo_link_url ) ? $pofo_link_url : '';
        $pofo_link_hover_color 	= ( $pofo_link_hover_color ) ? 'color: '.$pofo_link_hover_color.';' : '';

        $pofo_link_target_attr 	= ( !empty( $pofo_link_target ) && $pofo_link_target != 'one_page' ) ? ' target="'.$pofo_link_target.'"' : '';
		$section_link_class 	= $pofo_link_target == 'one_page' ? ' section-link' : '';

        ( $pofo_enable_alternate_font == 1 ) ? $classes[] = 'alt-font' : '';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $style_array[] = 'text-decoration: underline;' : '';
        $pofo_title_color = !empty( $pofo_title_color ) ? $style_array[] = 'color: '.$pofo_title_color.';' : '';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? $classes[] = 'dynamic-font-size' : '';
        $style_attr   = pofo_get_style_attribute( $style_array, $pofo_title_font_size, $pofo_title_line_height );

		//Extra Classes
		( $pofo_enable_underline_on_title && $pofo_heading_type == 'heading-style1' ) ? $classes[] = 'text-middle-line sm-text-middle-line' : '';
		if( $pofo_heading_type == 'heading-style5' ) {
			if( $pofo_enable_separator_before_after_title == 1 ) {
				$classes[] = $pofo_enable_big_separator == 1 ? 'text-small text-outside-line-full' : 'text-extra-small text-outside-line'; // text-outside-line <=> after-before-separator
			} else {
				$classes[] = 'text-extra-small';
			}
		}

		( $pofo_text_transform ) ? $classes[] = $pofo_text_transform : '';

        //Unique Style Class
        $classes[] = $pofo_heading_type;

        // CSS Box
        $css_class  = vc_shortcode_custom_css_class( $css, ' ' );
        $css_class  = ( $css_class ) ? $classes[] = $css_class : '';
        
        // Responsive CSS Box
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
            $responsive_id = uniqid('pofo-button-responsive-');
            $responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
            $classes[] = $responsive_id;
        }

        $pofo_heading_title = !empty( $pofo_heading_title ) ? $pofo_heading_title : 0;
        $pofo_heading_title = $pofo_heading_title + 1;

        $classes[] = ' heading-'.$pofo_heading_title;

        // Link Color Style
        if( !empty( $pofo_title_color ) ) {
            $pofo_featured_array[] = '.'.$pofo_heading_type.'.heading-'.$pofo_heading_title.' a.heading-title-link { '.$pofo_title_color.' }';
        }
        if( !empty( $pofo_link_hover_color ) ) {
            $pofo_featured_array[] = '.'.$pofo_heading_type.'.heading-'.$pofo_heading_title.' a.heading-title-link:hover { '.$pofo_link_hover_color.' }';
        }

        // Class List
        $class_list     = !empty( $classes ) ? implode(" ", $classes) : '';

		switch ($pofo_heading_type) {
			
			case 'heading-style1':
				$pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
				$output .='<'.$pofo_title_element_tag.$id.' class="text-dark-gray margin-10px-bottom font-weight-300 '.$class_list.'" '.$style_attr.'>';
	                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '<a class="text-dark-gray heading-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
	                }
						$output .= $pofo_heading;
		            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '</a>';
	                }
	            $output .='</'.$pofo_title_element_tag.'>';
			break;

			case 'heading-style2':
				$pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
				$output .='<'.$pofo_title_element_tag.$id.' class="text-extra-dark-gray margin-20px-bottom font-weight-600 '.$class_list.'" '.$style_attr.'>';
					if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '<a class="text-extra-dark-gray heading-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
	                }
						$output .= $pofo_heading;
		            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '</a>';
	                }
	            $output .='</'.$pofo_title_element_tag.'>';
			break;

			case 'heading-style3':
				$pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
				$output .='<'.$pofo_title_element_tag.$id.' class="text-extra-large margin-25px-bottom '.$class_list.'" '.$style_attr.'>';
					if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '<a class="heading-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
	                }
						$output .= $pofo_heading;
		            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '</a>';
	                }
	            $output .='</'.$pofo_title_element_tag.'>';
			break;

			case 'heading-style4':
				$pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'div';
				$output .='<'.$pofo_title_element_tag.$id.' class="text-medium-gray text-small margin-5px-bottom '.$class_list.'" '.$style_attr.'>';
					if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '<a class="text-medium-gray heading-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
	                }
						$output .= $pofo_heading;
		            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
	                    $output .= '</a>';
	                }
	            $output .='</'.$pofo_title_element_tag.'>';
			break;

			case 'heading-style5':
				$pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';
				if( $pofo_enable_big_separator == 1 ) {
					$output .='<div class="position-relative overflow-hidden width-100">';
				}
					$output .='<'.$pofo_title_element_tag.$id.' class="margin-100px-bottom xs-margin-40px-bottom font-weight-600 '.$class_list.'" '.$style_attr.'>';
						if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
		                    $output .= '<a class="heading-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
		                }
							$output .= $pofo_heading;
			            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
		                    $output .= '</a>';
		                }
		            $output .='</'.$pofo_title_element_tag.'>';
		        if( $pofo_enable_big_separator == 1 ) {
					$output .='</div>';
				}
			break;

			default:
				break;
		}

        // Responsive CSS Box Style
        if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {
            
            $pofo_responsive_style .= $responsive_style;
        }

	    return $output;
	}
}
add_shortcode("pofo_section_heading","pofo_section_heading");
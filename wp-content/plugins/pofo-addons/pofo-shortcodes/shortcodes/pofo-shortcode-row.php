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

if ( ! function_exists( 'pofo_row' ) ) {
	function pofo_row($atts, $content = null){
		
		global $pofo_responsive_style;

		extract( shortcode_atts( array(
	        'id' => '',
	        'class' => '',
	        'css' => '',
	    	'pofo_enable_responsive_css' => '',
	    	'responsive_css' => '',
	        'initial_loading_animation' => '',

	        'full_width' => '',
	        'gap' => '0',
	        'full_height' => '',
	        'columns_placement' => 'middle',
	        'equal_height' => '',
	        'content_placement' => '',
	        'parallax' => '',
	        'parallax_ratio_bg' => '0.5',

	        'video_bg' => '',
	        'pofo_video_type' => '',
	        'vimeo_bg_url' => 'https://player.vimeo.com/video/75976293',
	        'youtube_bg_url' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
	        'video_bg_parallax' => '',
	        'parallax_image' => '',
	        'parallax_speed_video' => '1.5',
        
            'pofo_background_video_image' => '',
            'pofo_background_mp4_video' => '',
            'pofo_background_ogg_video' => '',
            'pofo_background_webm_video' => '',
            'pofo_enable_mute' => '',
            'pofo_enable_loop' => '1',

	        'disable_element' => '',
	        'position_relative' => '',
	        'pofo_overflow_type' => '',
            'pofo_enable_menu_top_space' => '',

	        'pofo_bg_image_type' => '',
	        'desktop_bg_image_position' => '',
	        'desktop_height' => '',

	        'show_overlay' => '',
	        'pofo_overlay_opacity' => '0.7',
	        'pofo_row_overlay_color' => '',
	        'pofo_z_index' => '',

	        'show_down_section' => '',
	        'pofo_down_section_style' => 'down-section-style-1',
	        'pofo_down_section_target_id' => '',
	        'pofo_down_section_animation' => '',
	        'pofo_down_section_custom_icon' => '',
	        'pofo_down_section_custom_icon_image' => '',
	        'pofo_down_section_icon_list' => '',
	        'pofo_down_section_icon_size' => '',
	        'pofo_down_section_icon_color' => '',
	        'pofo_down_section_icon_bg_color' => '',
	        'show_change_body_color' => '',
	        'pofo_row_body_color' => '#ff214f',

	    ), $atts ) );

		// Visual Composer Font JS	    
		wp_enqueue_script( 'wpb_composer_front_js' );

		// Wrapper Class Container Setting
		$wrapper_container_style = '';
		if( is_singular( 'post' ) ) {
			$wrapper_container_style = pofo_option('pofo_single_post_container_style', 'container');
		} else if( is_singular( 'portfolio' ) ) {
			$wrapper_container_style = pofo_option('pofo_single_portfolio_container_style', 'container');
		} else if( is_page() ) {
			$wrapper_container_style = pofo_option('pofo_page_container_style', 'container');
		}
    
		$output = $after_output = $overlay_style = $parallax_image_src = '';
		$classes = $pofo_row_classes = $style_array = $wrapper_attributes = array();

		if ( ! empty( $id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $id ) . '"';
		}

		$classes = array(
			'vc_row',
			'wpb_row',
			//deprecated
			'vc_row-fluid',
			$class,
			vc_shortcode_custom_css_class( $css ),
		);

		$position_relative 	= ($position_relative == 1) ? $classes[] = 'position-relative' : '';
		$pofo_overflow_type	= !empty( $pofo_overflow_type ) ? $classes[] = $pofo_overflow_type : '';
                $pofo_enable_menu_top_space = $pofo_enable_menu_top_space == 1 ? $classes[] = 'top-space' : '';

        if ( empty( $parallax ) ) {    // Background Video Parralax

			// Background Image
			!empty( $pofo_bg_image_type ) ? $classes[] = $pofo_bg_image_type : '';
			!empty( $desktop_bg_image_position ) ? $classes[] = $desktop_bg_image_position : '';
		}

			// Height Settings
			!empty( $desktop_height ) ?  $style_array[] = "min-height: ".$desktop_height.";" : '';

		/* For Animation*/
		$initial_loading_animation = ($initial_loading_animation) ? $classes[] = 'wow '.$initial_loading_animation.'' : '';

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
			) ) || $video_bg || $parallax
		) {
			$classes[] = 'vc_row-has-fill';
		}

		if ( ! empty( $atts['gap'] ) ) {
			$classes[] = 'vc_column-gap-' . $atts['gap'];
		}

		if ( ! empty( $full_width ) ) {
			// Wrapper Class is container-fluid
			if( $wrapper_container_style == 'container-fluid' && $full_width == 'container' ) {
				$classes[] = 'vc_row-container-and-fluid';
			} else {
				$wrapper_attributes[] = 'data-vc-full-width="true"';
				$wrapper_attributes[] = 'data-vc-full-width-init="false"';
				$classes[] = 'pofo-stretch-content';/* For Stretch Effect */
				if ( 'stretch_row_content' === $full_width ) {
					$wrapper_attributes[] = 'data-vc-stretch-content="true"';
				} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
					$wrapper_attributes[] = 'data-vc-stretch-content="true"';
					$classes[] = 'vc_row-no-padding';
				} else {
					$classes[] = 'pofo-stretch-row-container'; // Use for portfolio
				}
			}
			$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
		}

		if ( ! empty( $full_height ) ) {
			$classes[] = 'vc_row-o-full-height';
			$pofo_row_classes[] = 'vc_row-o-full-height';
			if ( ! empty( $columns_placement ) ) {
				$flex_row = true;
				$classes[] = 'vc_row-o-columns-' . $columns_placement;
				if ( 'stretch' === $columns_placement ) {
					$classes[] = 'vc_row-o-equal-height';
				}
			}
		}

		if ( ! empty( $equal_height ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-equal-height';
			$pofo_row_classes[] = 'vc_row vc_row-o-equal-height'; // Custom pofo row equal height
		}

		if ( ! empty( $content_placement ) ) {
			$flex_row = true;
			$classes[] = 'vc_row-o-content-' . $content_placement;
			$pofo_row_classes[] = 'vc_row-o-content-' . $content_placement;
		}

		if ( ! empty( $flex_row ) ) {
			$classes[] = 'vc_row-flex';
			$pofo_row_classes[] = 'vc_row-flex';
		}

		if( ! empty( $video_bg ) ) {
			$classes[] = 'pofo-video-wrapper';
		}
		$has_video_bg = ( ! empty( $video_bg ) && ( $pofo_video_type == 'youtube' ) && ! empty( $youtube_bg_url ) && vc_extract_youtube_id( $youtube_bg_url ) );
		
        // YouTube Background Video
		$parallax_speed = $parallax_speed_video;  // parallax_speed_bg
		if ( $has_video_bg ) { // Background Video Parralax

			wp_register_script( 'vc_youtube_iframe_api_js', '//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
			
			$parallax = $video_bg_parallax;
			$parallax_speed = $parallax_speed_video;
			$parallax_image = $youtube_bg_url;
			$classes[] = 'vc_video-bg-container';
			wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		}

		if ( ! empty( $parallax ) && $has_video_bg ) {    // Background Video Parralax
			wp_enqueue_script( 'vc_jquery_skrollr_js' );
			$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
			$classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
			if ( false !== strpos( $parallax, 'fade' ) ) {
				$classes[] = 'js-vc_parallax-o-fade';
				$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
			} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
				$classes[] = 'js-vc_parallax-o-fixed';
			}
		}
		if ( ! empty( $parallax ) && !$has_video_bg ) { // Background Image Parralax
			$classes[] = 'parallax';
			$wrapper_attributes[] = 'data-stellar-background-ratio="' . esc_attr( $parallax_ratio_bg ) . '"';
		}

		if ( ! empty( $parallax_image ) ) { // Background Video Parralax
			if ( $has_video_bg ) {

				$parallax_image_src = $parallax_image;

				$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';

			} else {
				$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
				$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
				if ( ! empty( $parallax_image_src[0] ) ) {
					$parallax_image_src = $parallax_image_src[0];
				}
			}
		}

		if ( ! $parallax && $has_video_bg ) { // Background Video Parralax
			$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $youtube_bg_url ) . '"';
		}
		
		if( $show_change_body_color == 1 ) { // Change Body Background Color on Section wise Scrolling
			$classes[] = 'color-code';
			$wrapper_attributes[] = 'data-color="' . esc_attr( $pofo_row_body_color ) . '"';
		}

		// Responsive CSS Box
		if( $pofo_enable_responsive_css == 1 && !empty( $responsive_css ) ) {
			$responsive_id = uniqid('pofo-row-responsive-');
			$responsive_style = pofo_addons_get_responsive_style( $responsive_css, $responsive_id );
			$classes[] = $responsive_id;
		}

		// Class List
		$class_list 	= !empty( $classes ) ? implode(" ", $classes) : '';
		if( !empty( $class_list ) ) {
			$wrapper_attributes[] = 'class="' . esc_attr( trim( $class_list ) ) . '"';
		}
		$pofo_row_class_list = !empty( $pofo_row_classes ) ? ' ' . implode(" ", $pofo_row_classes) : '';

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

		$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

			if($show_overlay=='1'){
				$output .= '<div class="bg-extra-dark-gray bg-overlay"'.$overlay_style.'></div>';
			}

			// Wrapper Class is container-fluid and Section full width is container or default
			if( $wrapper_container_style == 'container-fluid' && ( $full_width == 'container' ) ) { // || $full_width == ''
				if( $full_width == 'container' ) { // section is container
					$output .= '<div class="'.$full_width.'">';
				}
						$output .= '<div class="row'.$pofo_row_class_list.'">';
			}

		        $output .= do_shortcode( shortcode_unautop( $content ) );

			// Wrapper Class is container-fluid and Section full width is container or default
			if( $wrapper_container_style == 'container-fluid' && ( $full_width == 'container' ) ) { // || $full_width == ''
						$output .= '</div>';
				if( $full_width == 'container' ) { // section is container
					$output .= '</div>';
				}
			}

			// Scroll to down section settings
	        // Image Alt, Title, Caption
	        $icon_img_alt           = !empty( $pofo_down_section_custom_icon_image ) ? pofo_option_image_alt($pofo_down_section_custom_icon_image) : '';
	        $icon_img_title         = !empty( $pofo_down_section_custom_icon_image ) ? pofo_option_image_title($pofo_down_section_custom_icon_image) : '';
	        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
	        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

	        $pofo_down_section_animation = $pofo_down_section_animation == 1 ? ' up-down-ani' : '';
	        $pofo_down_section_icon_color        = ( $pofo_down_section_icon_color ) ? 'color:'.$pofo_down_section_icon_color.'; ' : '';
	        $pofo_down_section_icon_bg_color     = ( $pofo_down_section_icon_bg_color ) ? 'background-color:'.$pofo_down_section_icon_bg_color.'; ' : '';

	        // new font awesome icons

	        $fa_icons_solid = pofo_fontawesome_solid();
	        $fa_icons_reg = pofo_fontawesome_reg();
	        $fa_icons_brand = pofo_fontawesome_brand();
	        $fa_icon_old = pofo_fontawesome_old();
	        $font_awesome_fa_icons = explode(' ',trim($pofo_down_section_icon_list));

	        if($font_awesome_fa_icons[0] == 'fa'){
	            $pofo_down_section_icon_list = substr(strstr($pofo_down_section_icon_list," "), 1);

	            if(array_key_exists($pofo_down_section_icon_list, $fa_icon_old)){
	                $pofo_down_section_icon_list = $fa_icon_old[$pofo_down_section_icon_list];
	            }else if(in_array($pofo_down_section_icon_list, $fa_icons_solid)){
	                $pofo_down_section_icon_list = 'fas '.$pofo_down_section_icon_list;
	            }else if(in_array($pofo_down_section_icon_list, $fa_icons_reg)){
	                $pofo_down_section_icon_list = 'far '.$pofo_down_section_icon_list;
	            }else if(in_array($pofo_down_section_icon_list, $fa_icons_brand)){
	                $pofo_down_section_icon_list = 'fab '.$pofo_down_section_icon_list;
	            }else{
	                $pofo_down_section_icon_list = '';
	            }
	        }

			if($show_down_section=='1'){
				switch ( $pofo_down_section_style ) {
					case 'down-section-style-1':

						$pofo_down_section_icon_list = !empty( $pofo_down_section_icon_list ) ? ' '.$pofo_down_section_icon_list : ' ti-mouse';
	        			$pofo_down_section_icon_size = !empty( $pofo_down_section_icon_size ) ? ' '.$pofo_down_section_icon_size : ' icon-small';

						$output .= '<div class="down-section text-center '.$pofo_down_section_style.'">
			                            <a href="#'.$pofo_down_section_target_id.'" class="down-section-link'.$pofo_down_section_animation.'">';
			                            	if( $pofo_down_section_custom_icon == 1 && !empty( $pofo_down_section_custom_icon_image ) ) {
											    $output .= '<img src="'.wp_get_attachment_url( $pofo_down_section_custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image bounce text-deep-pink" />';
											}elseif($pofo_down_section_icon_list){                
											    $output .= '<i class="bounce text-deep-pink '.$pofo_down_section_icon_list.$pofo_down_section_icon_size.'" style="'.$pofo_down_section_icon_color.'"></i>';
											}
			                $output .= '</a>
			                        </div>';
						break;
					case 'down-section-style-2':

						$pofo_down_section_icon_list = !empty( $pofo_down_section_icon_list ) ? ' '.$pofo_down_section_icon_list : ' ti-arrow-down';
	        			$pofo_down_section_icon_size = !empty( $pofo_down_section_icon_size ) ? ' '.$pofo_down_section_icon_size : ' icon-extra-small';

						$output .= '<div class="down-section text-center '.$pofo_down_section_style.'">
		                                <a href="#'.$pofo_down_section_target_id.'" class="down-section-link'.$pofo_down_section_animation.'">';
			                            	if( $pofo_down_section_custom_icon == 1 && !empty( $pofo_down_section_custom_icon_image ) ) {
											    $output .= '<img src="'.wp_get_attachment_url( $pofo_down_section_custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image text-white bg-deep-pink padding-15px-all xs-padding-10px-all border-radius-100" />';
											}elseif($pofo_down_section_icon_list){                
											    $output .= '<i class="text-white bg-deep-pink padding-15px-all xs-padding-10px-all border-radius-100 '.$pofo_down_section_icon_list.$pofo_down_section_icon_size.'" style="'.$pofo_down_section_icon_color.$pofo_down_section_icon_bg_color.'"></i>';
											}
		                    $output .= '</a>
		                            </div>';
						break;
					default:
						break;
				}
			}

            // HTML5 Background Video
	        if( !empty( $video_bg ) && empty( $pofo_video_type ) && ( $pofo_background_mp4_video || $pofo_background_ogg_video || $pofo_background_webm_video ) ) {

				$image_url = !empty( $pofo_background_video_image ) ? wp_get_attachment_url( $pofo_background_video_image ) : '';

		        $pofo_enable_mute = ( $pofo_enable_mute == 1 ) ? 'muted ' : '';
		        $pofo_enable_loop = ( $pofo_enable_loop == 1 ) ? 'loop ' : '';
		        
                $output .= '<video '.$pofo_enable_mute.$pofo_enable_loop.'autoplay class="html-video" poster="'.$parallax_image_src.'">';
                    if($pofo_background_mp4_video){
                        $output .= '<source type="video/mp4" src="'.esc_attr( $pofo_background_mp4_video ).'">';
                    }
                    if($pofo_background_ogg_video){
                        $output .= '<source type="video/ogg" src="'.esc_attr( $pofo_background_ogg_video ).'">';
                    }
                    if($pofo_background_webm_video){
                        $output .= '<source type="video/webm" src="'.esc_attr( $pofo_background_webm_video ).'">';
                    }
                $output .= '</video>';
            }

            // Vimeo Background Video
	        if( !empty( $video_bg ) && $pofo_video_type == 'vimeo' && !empty( $vimeo_bg_url ) ) {

	        	$vimeo_bg_url = add_query_arg( array( 'transparent' => '0', 'autoplay' => '1' ), $vimeo_bg_url );

	            $output .= '<div class="pofo-vimeo-bg-video fit-videos">';
	    		  	$output .='<iframe class="vimeo-background-video" src="' . esc_attr( $vimeo_bg_url ) . '" allow="autoplay"></iframe>'; // '.$width.$height.'
	            $output .= '</div>';
	        }

	    $output .= '</section>';
		$output .= $after_output;

		// Responsive CSS Box Style
		if( $pofo_enable_responsive_css == 1 && !empty( $responsive_style ) ) {

			$pofo_responsive_style .= $responsive_style;
		}

		return $output;
	}
}
add_shortcode( 'vc_row', 'pofo_row' );
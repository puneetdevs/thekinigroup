<?php
/**
 * Metabox Map
 *
 * @package Pofo
 */
?>
<?php
	function pofo_meta_box_text( $pofo_id, $pofo_label, $pofo_desc = '', $pofo_short_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();

		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $pofo_label;
			if($pofo_desc) {
				$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input type="text" id="' . esc_attr($pofo_id) . '" name="' . esc_attr($pofo_id) . '" value="' . get_post_meta($post->ID, $meta_prefix.$pofo_id, true) . '" />';
			if($pofo_short_desc) {
				$html .= '<span class="short-description">' . esc_attr($pofo_short_desc) . '</span>';
			}
		$html .= '</div>';
		$html .= '</div>';
		echo sprintf("%s",$html);
	}

	function pofo_meta_box_dropdown( $pofo_id, $pofo_label, $pofo_options, $pofo_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$html = $pofo_select_class = $dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
					$html .= $pofo_label;
					if($pofo_desc) {
							$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
					}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($pofo_id) . '" class="'.$pofo_select_class.'" name="' . esc_attr($pofo_id) . '">';
				foreach($pofo_options as $key => $option) {
						if(get_post_meta($post->ID, $meta_prefix.$pofo_id, true) == (string)$key && get_post_meta($post->ID, $meta_prefix.$pofo_id, true) != '') {
								$pofo_selected = 'selected="selected"';
						}else {
										$pofo_selected = '';
						}

						$html .= '<option ' . $pofo_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
		echo sprintf("%s",$html);
	}

	function pofo_meta_box_dropdown_sidebar( $pofo_id, $pofo_label, $pofo_options, $pofo_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$html = $pofo_select_class = $dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$flag = false;
			$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $pofo_label;
					if($pofo_desc) {
						$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<select id="' . esc_attr($pofo_id) . '" class="'.esc_attr($pofo_select_class).'" name="' . esc_attr($pofo_id) . '">';
					foreach($pofo_options as $key => $option) {
						if(get_post_meta($post->ID, $meta_prefix.$pofo_id, true) == $key && get_post_meta($post->ID, $meta_prefix.$pofo_id, true) != '') {
							$pofo_selected = 'selected="selected"';
						}else {
								$pofo_selected = '';
						}

						$html .= '<option ' . $pofo_selected . ' value="' . esc_attr($key) . '">' . esc_attr($option) . '</option>';

					}
					$html .= '</select>';
				$html .='</div>';	
			$html .= '</div>';
		echo sprintf("%s",$html);
	}

	/* menu dropdown */

	function pofo_meta_box_dropdown_menu( $pofo_id, $pofo_label, $pofo_options, $pofo_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$html = $pofo_select_class = $dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$flag = false;

		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $pofo_label;
				if($pofo_desc) {
					$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
				$html .= '<select id="' . esc_attr($pofo_id) . '" class="'.esc_attr($pofo_select_class).'" name="' . esc_attr($pofo_id) . '">';
				$html .= '<option value="">Default</option>';
				$pofo_menus = wp_get_nav_menus();
				$pofo_menu_array = array();
				foreach ($pofo_menus as $key => $value) {
					if(get_post_meta($post->ID, $meta_prefix.$pofo_id, true) == $value->slug && get_post_meta($post->ID, $meta_prefix.$pofo_id, true) != '') {
						$pofo_selected = 'selected="selected"';
					}else {
							$pofo_selected = '';
					}

					$html .= '<option ' . $pofo_selected . ' value="' . esc_attr($value->slug) . '">' . esc_attr($value->name) . '</option>';
				}
				$html .= '</select>';
			$html .='</div>';	
		$html .= '</div>';
		echo sprintf("%s",$html);
	}

	function pofo_meta_box_textarea( $pofo_id, $pofo_label, $pofo_desc = '', $pofo_default = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $pofo_label;
			if($pofo_desc) {
				$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
			}
		$html .='</div>';
		
		if( get_post_meta($post->ID, $meta_prefix.$pofo_id, true)) {
			$pofo_value = get_post_meta($post->ID, $meta_prefix.$pofo_id, true);
		} else {
			$pofo_value = '';
		}
		$html .= '<div class="right-part">';
			$html .= '<textarea cols="120" id="' . esc_attr($pofo_id) . '" name="' . esc_attr($pofo_id) . '">' . $pofo_value . '</textarea>';
		$html .='</div>';
		$html .= '</div>';

		echo sprintf("%s",$html);
	}

	function pofo_meta_box_upload( $pofo_id, $pofo_label, $pofo_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
		$html .= '<div class="left-part">';
			$html .= $pofo_label;
			if($pofo_desc) {
				$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
			}
		$html .='</div>';
		$html .= '<div class="right-part">';
			$html .= '<input name="' . esc_attr($pofo_id) . '" class="upload_field" id="pofo_upload" type="text" value="' . get_post_meta($post->ID, $meta_prefix.$pofo_id, true) . '" />';
			$html .= '<input name="'. $pofo_id.'_thumb" class="'. $pofo_id.'_thumb" id="'. $pofo_id.'_thumb" type="hidden" value="'.get_post_meta($post->ID, $meta_prefix.$pofo_id, true).'" />';
					$html .= '<img class="upload_image_screenshort" src="'.get_post_meta($post->ID, $meta_prefix.$pofo_id, true).'" />';
			$html .= '<input class="pofo_upload_button" id="pofo_upload_button" type="button" value="'.__( 'Browse', 'pofo-addons' ).'" />';
			$html .= '<span class="pofo_remove_button button">'.__( 'Remove', 'pofo-addons' ).'</span>';
					
		$html .='</div>';
		$html .= '</div>';
		echo sprintf("%s",$html);
	}

	function pofo_meta_box_upload_multiple( $pofo_id, $pofo_label, $pofo_desc = '', $pofo_dependency = '' ) {
		global $post;

        // Meta Prefix
        $meta_prefix = pofo_meta_prefix();
        
		$dependency_attr = '';
		$dependency_arr = array();

		if( !empty($pofo_dependency) ){
			$val = array();
			$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
			foreach ($pofo_dependency['value'] as $key => $value) {
				$val[] = $value; 
			}
			$dep_list = implode(",", $val);
			$dependency_arr[] = 'data-value="'.$dep_list.'"';
			$dependency_attr = implode(" ", $dependency_arr);
		}

		$html = '';
		$html .= '<div class="'.esc_attr($pofo_id).'_box description_box"'.$dependency_attr.'>';
			$html .= '<div class="left-part">';
				$html .= $pofo_label;
				if($pofo_desc) {
					$html .= '<span class="description">' . esc_attr($pofo_desc) . '</span>';
				}
			$html .='</div>';
			$html .= '<div class="right-part">';
			
				$html .= '<input name="' . esc_attr($pofo_id) . '" class="upload_field upload_field_multiple" id="pofo_upload" type="hidden" value="'.get_post_meta($post->ID, $meta_prefix.$pofo_id, true).'" />';
				$html .= '<div class="multiple_images">';
				$pofo_val = explode(",",get_post_meta($post->ID, $meta_prefix.$pofo_id, true));
				
				foreach ($pofo_val as $key => $value) {
					if(!empty($value)):
						$pofo_image_url = wp_get_attachment_url( $value );
						$html .='<div id='.esc_attr($value).'>';
							$html .= '<img class="upload_image_screenshort_multiple" src="'.$pofo_image_url.'" style="width:100px;" />';
							$html .= '<a href="javascript:void(0)" class="remove">'.__( 'Remove', 'pofo-addons' ).'</a>';
						$html .= '</div>';
					endif;
				}
				$html .= '</div>';
				$html .= '<input class="pofo_upload_button_multiple" id="pofo_upload_button_multiple" type="button" value="'.__( 'Browse', 'pofo-addons' ).'" />'.__( ' Select Files', 'pofo-addons' );
						
			$html .='</div>';
		$html .= '</div>';
		echo sprintf( "%s", $html );
	}

	if ( ! function_exists( 'pofo_meta_box_colorpicker' ) ) {
		function pofo_meta_box_colorpicker( $id, $label, $desc = '', $pofo_dependency = '' ) {
			global $post;

	        // Meta Prefix
	        $meta_prefix = pofo_meta_prefix();
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( !empty($pofo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
				foreach ($pofo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.$id.'_box description_box"'.$dependency_attr.'>';
				$html .= '<div class="left-part">';
					$html .= $label;
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
				$html .= '<div class="right-part">';
					$html .= '<input type="text" class="pofo-color-picker" id="' . $id . '" name="' . $id . '" value="' . get_post_meta($post->ID, $meta_prefix.$id, true) . '" />';
				$html .='</div>';
			$html .='</div>';
			echo $html;
		}
	}

	if ( ! function_exists( 'pofo_meta_box_separator' ) ) {
		function pofo_meta_box_separator( $id, $label, $desc = '', $short_desc = '', $pofo_dependency = '' ) {
			
	        // Meta Prefix
	        $meta_prefix = pofo_meta_prefix();
	        
			$dependency_attr = '';
			$dependency_arr = array();

			if( !empty($pofo_dependency) ){
				$val = array();
				$dependency_arr[] = 'data-element="'.$pofo_dependency['element'].'"';
				foreach ($pofo_dependency['value'] as $key => $value) {
					$val[] = $value; 
				}
				$dep_list = implode(",", $val);
				$dependency_arr[] = 'data-value="'.$dep_list.'"';
				$dependency_attr = implode(" ", $dependency_arr);
			}

			$html = '';
			$html .= '<div class="'.$id.'_box separator_box"'.$dependency_attr.'>';
				$html .= '<div class="meta-heading-separator">';
					$html .= '<h3>' . $label . '</h3>';
					if($desc) {
						$html .= '<span class="description">' . $desc . '</span>';
					}
				$html .='</div>';
			$html .='</div>';
			echo $html;
		}
	}
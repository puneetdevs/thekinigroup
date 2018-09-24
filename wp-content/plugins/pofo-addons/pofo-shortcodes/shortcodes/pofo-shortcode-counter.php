<?php
/**
 * Shortcode For Counter 
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Pofo Counter  */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_counter_or_skill_shortcode' ) ) {
    function pofo_counter_or_skill_shortcode( $atts, $content = null ) {

        global $pofo_featured_array, $pofo_slider_script, $pofo_counter_style1, $pofo_counter_style2, $pofo_counter_style3, $pofo_counter_style4, $pofo_skill_style1, $pofo_skill_style2;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_counter_style' => '',
            'custom_icon' => '',
            'custom_icon_image' => '',
            'counter_icon' =>'',
            'counter_number' => '',
            'title' => '',
            'pofo_enable_counter_alternate_font' => '',
            'pofo_icon_color' => '',
            'pofo_enable_link' => '',
            'pofo_link_url' => '',
            'pofo_link_target' => '',
            'pofo_link_on' => '',
            'pofo_link_hover_color' => '',
            'pofo_enable_border' => '1',
            'pofo_border_color' => '#ededed',
            'pofo_border_size' => '1px',
            'pofo_border_type' => 'solid',
            'pofo_border_radius' => '5px',
            'pofo_box_background_color' => '',
            'pofo_enable_box_shadow' => '1',
            'pofo_enable_plus_icon' => '1',
            'pofo_box_hover_border_color' => '',
            'pofo_box_hover_border_size' => '',
            'pofo_counter_icon_size' => '',
            'pofo_enable_separator' => '1',
            'pofo_separator_color' => '',
            'pofo_separator_height' => '',
            'pofo_separator_width' => '',
            'pofo_progress_bar_color' => '',
            'pofo_counter_background_color' => '',
            'pofo_track_color' => '',
            'pofo_track_width' => '2',
            'pofo_chart_size' => '',

            'pofo_counter_font_size' => '',
            'pofo_counter_line_height' => '',
            'pofo_counter_letter_spacing' => '',
            'pofo_counter_font_weight' => '',
            'pofo_counter_italic' => '',
            'pofo_counter_underline' => '',
            'pofo_counter_element_tag' => '',
            'pofo_counter_color' => '',
            'pofo_counter_enable_responsive_font' => '',
            'pofo_title_font_size' => '',
            'pofo_title_line_height' => '',
            'pofo_title_letter_spacing' => '',
            'pofo_title_font_weight' => '',
            'pofo_title_italic' => '',
            'pofo_title_underline' => '',
            'pofo_title_element_tag' => '',
            'pofo_title_color' => '',
            'pofo_title_enable_responsive_font' => '',

            'pofo_counter_animation_duration' => '2000',
            'initial_loading_animation' => '',
        ), $atts ) );

        $output = '';   

        $pofo_counter_style_attr = $pofo_title_style_attr = $sep_style = '';
        $classes = $classes_icon = $pofo_counter_style_array = $pofo_title_style_array = array();

        $id = ( $id ) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        // new font awesome icons

        $fa_icons_solid = pofo_fontawesome_solid();
        $fa_icons_reg = pofo_fontawesome_reg();
        $fa_icons_brand = pofo_fontawesome_brand();
        $fa_icon_old = pofo_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($counter_icon));

        if($font_awesome_fa_icons[0] == 'fa'){
            $counter_icon = substr(strstr($counter_icon," "), 1);

            if(array_key_exists($counter_icon, $fa_icon_old)){
                $counter_icon = $fa_icon_old[$counter_icon];
            }else if(in_array($counter_icon, $fa_icons_solid)){
                $counter_icon = 'fas '.$counter_icon;
            }else if(in_array($counter_icon, $fa_icons_reg)){
                $counter_icon = 'far '.$counter_icon;
            }else if(in_array($counter_icon, $fa_icons_brand)){
                $counter_icon = 'fab '.$counter_icon;
            }else{
                $counter_icon = '';
            }
        }
        
        $counter_icon          = ( $counter_icon ) ? $classes_icon[] = $counter_icon : '' ;
        $pofo_counter_icon_size= ( $pofo_counter_icon_size ) ? $classes_icon[] = $pofo_counter_icon_size : $classes_icon[] ='icon-medium';
        $pofo_counter_animation_duration = ( $pofo_counter_animation_duration ) ? $pofo_counter_animation_duration : '2000';
        ( $initial_loading_animation ) ? $classes[] = 'wow '.$initial_loading_animation : '';
        $counter_number        = ( $counter_number ) ? $counter_number : '';
        $pofo_icon_color       = ($pofo_icon_color) ? ' color: '.$pofo_icon_color.';' : '';

        $pofo_link_url         = ( $pofo_link_url ) ? $pofo_link_url : '';
        $pofo_link_on          = ( $pofo_link_on ) ? $pofo_link_on : '';
        $pofo_link_hover_color = ( $pofo_link_hover_color ) ? 'color: '.$pofo_link_hover_color.';' : '';

        $pofo_link_target_attr  = ( !empty( $pofo_link_target ) && $pofo_link_target != 'one_page' ) ? ' target="'.$pofo_link_target.'"' : '';
        $section_link_class     = $pofo_link_target == 'one_page' ? ' section-link' : '';

        if( !empty( $pofo_counter_background_color ) && $pofo_counter_style == 'skill-style2' ) {
            $pofo_counter_style_array[] = 'background-color: '.$pofo_counter_background_color.';';
        }

        // For Counter Style
        !empty( $pofo_counter_font_size ) ? $pofo_counter_style_array[] = 'font-size: ' . $pofo_counter_font_size . ';' : '';
        !empty( $pofo_counter_line_height ) ? $pofo_counter_style_array[] = 'line-height: ' . $pofo_counter_line_height . ';' : '';
        !empty( $pofo_counter_letter_spacing ) ? $pofo_counter_style_array[] = 'letter-spacing: ' . $pofo_counter_letter_spacing . ';' : '';
        !empty( $pofo_counter_font_weight ) ? $pofo_counter_style_array[] = 'font-weight: ' . $pofo_counter_font_weight . ';' : '';
        ( $pofo_counter_italic == 1 ) ? $pofo_counter_style_array[] = 'font-style: italic;' : '';
        ( $pofo_counter_underline == 1 ) ? $pofo_counter_style_array[] = 'text-decoration: underline;' : '';
        $pofo_counter_color = !empty( $pofo_counter_color ) ? $pofo_counter_style_array[] = 'color: '.$pofo_counter_color.';' : '';

        $pofo_counter_dynamic_font_size = $pofo_counter_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_counter_style_attr   = pofo_get_style_attribute( $pofo_counter_style_array, $pofo_counter_font_size, $pofo_counter_line_height );

        ( $pofo_enable_counter_alternate_font == 1 ) ? $pofo_counter_dynamic_font_size .= ' alt-font' : '';

        // Replace || to <br /> in title
        $title = ( $title ) ? str_replace('||', '<br />',$title) : '';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        $pofo_title_color = !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';
        $pofo_title_element_tag = ( $pofo_title_element_tag ) ? $pofo_title_element_tag : 'span';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        // For Separator Style
        $pofo_separator_color  = ( $pofo_separator_color ) ? 'background-color:'.$pofo_separator_color.'; ' : '';
        $pofo_separator_height = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.'; ' : '';
        $pofo_separator_width = ( $pofo_separator_width ) ? 'width:'.$pofo_separator_width.'; ' : '';
        if( $pofo_separator_color || $pofo_separator_height || $pofo_separator_width ){
            $sep_style .= ' style="'.$pofo_separator_color.$pofo_separator_height.$pofo_separator_width.'"';
        }

        // For Counter Box Border
        $pofo_border_color   = ( $pofo_border_color ) ? 'border-color: ' . $pofo_border_color . '; ' : '';
        $pofo_border_size    = ( $pofo_border_size ) ? 'border-width: ' . $pofo_border_size . '; ' : '';
        $pofo_border_type    = ( $pofo_border_type ) ? 'border-style: ' . $pofo_border_type . '; ' : '';
        $pofo_border_style   = ( $pofo_enable_border == 0 ) ? 'border: none; ' : $pofo_border_color.$pofo_border_size.$pofo_border_type;

        $pofo_border_radius  = ($pofo_border_radius) ? ' border-radius: '.$pofo_border_radius.'; -moz-border-radius: '.$pofo_border_radius.'; -webkit-border-radius: '.$pofo_border_radius.'; -ms-border-radius: '.$pofo_border_radius.'; -o-border-radius: '.$pofo_border_radius.'; ' : '';
        $pofo_box_background_color  = ($pofo_box_background_color) ? ' background-color: '.$pofo_box_background_color.'; ' : '';
        $pofo_box_hover_bg_color= ($pofo_box_hover_border_color) ? ' border-color: '.$pofo_box_hover_border_color.' !important; ' : '';
        $pofo_box_hover_border_color= ($pofo_box_hover_border_color) ? ' background-color: '.$pofo_box_hover_border_color.'; ' : '';
        $pofo_box_hover_border_size = ($pofo_box_hover_border_size) ? ' padding: '.$pofo_box_hover_border_size.'; ' : '';

        $class_list3    = !empty( $classes_icon ) ? implode( " ", $classes_icon ) : '';
        $class_icon_attr= ( $class_list3 ) ? ' '.$class_list3 : '';

        // Image Alt, Title, Caption
        $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt($custom_icon_image) : '';
        $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title($custom_icon_image) : '';
        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

        //Unique Style Class
        $classes[] = 'counter-style ' . $pofo_counter_style;

        // Class List
        $class_list     = !empty( $classes ) ? implode(" ", $classes) : '';

        switch ($pofo_counter_style) {
            
            case 'counter-style1':

                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'h6';
                $pofo_counter_style1 = !empty( $pofo_counter_style1 ) ? $pofo_counter_style1 : 0;
                $pofo_counter_style1 = $pofo_counter_style1 + 1;

                if( !empty( $pofo_box_hover_border_color ) ) {
                    $pofo_featured_array[] = '.counter-style1-'.$pofo_counter_style1.':hover { '.$pofo_box_hover_bg_color.$pofo_box_hover_border_color.' }';
                }

                // Link Color Style
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.counter-style1-'.$pofo_counter_style1.' a.counter-icon-link, .counter-style1-'.$pofo_counter_style1.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.counter-style1-'.$pofo_counter_style1.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.counter-style1-'.$pofo_counter_style1.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.counter-style1-'.$pofo_counter_style1.' a.counter-icon-link:hover i.link-icon, .counter-style1-'.$pofo_counter_style1.' a.counter-number-link:hover, .counter-style1-'.$pofo_counter_style1.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $output .= '<div'.$id.' class="'.$class_list.' counter-feature-box-1 border-all display-table width-100 padding-5px-all counter-style1-'.$pofo_counter_style1.'" style="'.$pofo_border_style.$pofo_box_hover_border_size.'">';
                    $output .= '<div class="counter-box display-table-cell vertical-align-middle bg-white" style="'.$pofo_box_background_color.'">';
                        if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="margin-15px-bottom icon-image" />';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }elseif( $counter_icon ){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<i class="margin-15px-bottom text-medium-gray link-icon '.$class_icon_attr.'"></i>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if( $counter_number ){
                            
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="text-extra-dark-gray counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' data-to="'.$counter_number.'" data-speed="'.$pofo_counter_animation_duration.'" class="display-block font-weight-500 text-extra-dark-gray no-margin-bottom timer'.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.'>';
                                    $output .= $counter_number;
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if( $title ){                            
                            $output .= '<'.$pofo_title_element_tag.' class="'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        } 
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'counter-style2':

                $pofo_counter_style2 = !empty( $pofo_counter_style2 ) ? $pofo_counter_style2 : 0;
                $pofo_counter_style2 = $pofo_counter_style2 + 1;

                // Link Color Style
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.counter-style2-'.$pofo_counter_style2.' a.counter-icon-link, .counter-style2-'.$pofo_counter_style2.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.counter-style2-'.$pofo_counter_style2.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.counter-style2-'.$pofo_counter_style2.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.counter-style2-'.$pofo_counter_style2.' a.counter-icon-link:hover i.link-icon, .counter-style2-'.$pofo_counter_style2.' a.counter-number-link:hover, .counter-style2-'.$pofo_counter_style2.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'h5';
                $output .= '<div'.$id.' class="'.$class_list.' feature-box-5 position-relative counter-style2-'.$pofo_counter_style2.'">';
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="counter-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="text-medium-gray icon-extra-medium top-6 icon-image" />';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif( $counter_icon ){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="counter-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i class="text-medium-gray link-icon top-6'.$class_icon_attr.'"></i>';   
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    $output .= '<div class="feature-content">';
                        if( $counter_number ){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="text-extra-dark-gray counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' data-to="'.$counter_number.'" data-speed="'.$pofo_counter_animation_duration.'" class="text-extra-dark-gray font-weight-300 no-margin-bottom timer'.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.'>';
                                    $output .= $counter_number;
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if( $title ){
                            $output .= '<'.$pofo_title_element_tag.' class="text-small display-block text-medium-gray'.$pofo_title_dynamic_font_size.'" '.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="text-medium-gray counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if( $pofo_enable_separator == 1 ){
                            $output .= '<div class="separator-line-horrizontal-medium-light2 width-40px bg-deep-pink display-inline-block"'.$sep_style.'></div>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'counter-style3':

                $pofo_counter_style3 = !empty( $pofo_counter_style3 ) ? $pofo_counter_style3 : 0;
                $pofo_counter_style3 = $pofo_counter_style3 + 1;

                // Link Color Style
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.counter-style3-'.$pofo_counter_style3.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.counter-style3-'.$pofo_counter_style3.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.counter-style3-'.$pofo_counter_style3.' a.counter-number-link:hover, .counter-style3-'.$pofo_counter_style3.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'h5';
                $output .= '<div'.$id.' class="'.$class_list.' counter-style3-'.$pofo_counter_style3.'">';
                        if( $counter_number ){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="text-extra-dark-gray counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' data-to="'.$counter_number.'" data-speed="'.$pofo_counter_animation_duration.'" class="text-extra-dark-gray font-weight-500 no-margin timer'.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.'>';
                                    $output .= $counter_number;
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if( $title ){
                            $output .= '<'.$pofo_title_element_tag.' class="display-block margin-three-bottom'.$pofo_title_dynamic_font_size.'"'.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                        if( $pofo_enable_separator == 1 ){
                            $output .= '<div class="separator-line-verticle-large bg-deep-pink display-inline-block"'.$sep_style.'></div>';
                        }
                $output .= '</div>';
            break;

            case 'counter-style4':
        
                $pofo_counter_style4 = !empty( $pofo_counter_style4 ) ? $pofo_counter_style4 : 0;
                $pofo_counter_style4 = $pofo_counter_style4 + 1;

                // Link Color Style
                if( !empty( $pofo_icon_color ) ) {
                    $pofo_featured_array[] = '.counter-style4-'.$pofo_counter_style4.' a.counter-icon-link, .counter-style4-'.$pofo_counter_style4.' i { '.$pofo_icon_color.' }';
                }
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.counter-style4-'.$pofo_counter_style4.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.counter-style4-'.$pofo_counter_style4.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.counter-style4-'.$pofo_counter_style4.' a.counter-icon-link:hover i.link-icon, .counter-style4-'.$pofo_counter_style4.' a.counter-number-link:hover, .counter-style4-'.$pofo_counter_style4.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'h5';
                $output .= '<div'.$id.' class="'.$class_list.' xs-margin-four-bottom counter-box-4 counter-style4-'.$pofo_counter_style4.'">';
                    if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="counter-image-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="margin-15px-bottom img-circle icon-image" />';
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }elseif( $counter_icon ){
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '<a class="counter-icon-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                        }
                            $output .= '<i class="margin-10px-bottom link-icon'.$class_icon_attr.'"></i>';   
                        if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'icon' || $pofo_link_on == 'all' ) ) {
                            $output .= '</a>';
                        }
                    }
                    $output .= '<div class="feature-content">';
                        if( $counter_number ){
                            $pofo_counter_dynamic_font_size .= $pofo_enable_plus_icon == '1' ? ' plus-separator' : '';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' data-to="'.$counter_number.'" data-speed="'.$pofo_counter_animation_duration.'" class="font-weight-400 no-margin-bottom timer'.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.'>';
                                    $output .= $counter_number;
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                        if( $title ){
                            $output .= '<'.$pofo_title_element_tag.' class="'.$pofo_title_dynamic_font_size.'" '.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        }
                    $output .= '</div>';
                $output .= '</div>';
            break;

            case 'skill-style1':
        
                $class_list .= $pofo_enable_box_shadow == 1 ? ' box-shadow-light bg-black padding-fifteen-all xs-padding-ten-all' : '';

                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'span';
                $pofo_skill_style1 = !empty( $pofo_skill_style1 ) ? $pofo_skill_style1 : 0;
                $pofo_skill_style1 = $pofo_skill_style1 + 1;

                $pofo_progress_bar_color    = !empty( $pofo_progress_bar_color ) ? $pofo_progress_bar_color : '#ff214f';
                $pofo_track_color           = !empty( $pofo_track_color ) ? $pofo_track_color : '#d9d9d9';
                $pofo_track_width           = !empty( $pofo_track_width ) ? $pofo_track_width : 2;
                $pofo_chart_size            = !empty( $pofo_chart_size ) ? $pofo_chart_size : 120;

                if( !empty( $pofo_chart_size ) ) {
                    $pofo_featured_array[] = '.chart-style1-'.$pofo_skill_style1.' .chart1 { width:'.$pofo_chart_size.'px; height:'.$pofo_chart_size.'px; }';
                    $pofo_featured_array[] = '.chart-style1-'.$pofo_skill_style1.' .chart1 .percent { line-height:'.$pofo_chart_size.'px; }';
                }

                // Link Color Style
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.chart-style1-'.$pofo_skill_style1.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.chart-style1-'.$pofo_skill_style1.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.chart-style1-'.$pofo_skill_style1.' a.counter-number-link:hover, .chart-style1-'.$pofo_skill_style1.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $output .= '<div'.$id.' class="chart-style1 '.$class_list.' chart-style1-'.$pofo_skill_style1.'" style="'.$pofo_box_background_color.$pofo_border_radius.'">';
                
                    $output .= '<div class="chart-percent">';
                        if( $counter_number ){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' class="chart1 text-white skill-chart-1-'.$pofo_skill_style1.' '.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.' data-percent="'.$counter_number.'">';
                                    $output .= '<span class="percent text-extra-large font-weight-500"></span> ';
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                    if( $title ){
                        $output .= '<div class="chart-text">';
                            $output .= '<'.$pofo_title_element_tag.' class="text-extra-small alt-font font-weight-600 '.$pofo_title_dynamic_font_size.'" '.$pofo_title_style_attr.'>';
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '<a class="counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                }
                                    $output .= $title;
                                if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                    $output .= '</a>';
                                }
                            $output .= '</'.$pofo_title_element_tag.'>';
                        $output .= '</div>';
                    }
                $output .= '</div>';

                ob_start(); ?>
                $(document).ready(function () { $('.skill-chart-1-<?php echo $pofo_skill_style1 ?>').easyPieChart({ barColor: '<?php echo $pofo_progress_bar_color ?>', trackColor: '<?php echo $pofo_track_color ?>', scaleColor: false, easing: 'easeOutBounce', scaleLength: 1, lineCap: 'round', lineWidth: <?php echo $pofo_track_width ?>, size: <?php echo $pofo_chart_size ?>, animate: { duration: <?php echo $pofo_counter_animation_duration ?>, enabled: true }, onStep: function (from, to, percent) { $(this.el).find('.percent').text(Math.round(percent)); } }); });
                <?php
                $pofo_slider_script .= ob_get_contents();
                ob_end_clean();

            break;

            case 'skill-style2':
        
                $pofo_counter_element_tag = ( $pofo_counter_element_tag ) ? $pofo_counter_element_tag : 'span';
                $pofo_skill_style2 = !empty( $pofo_skill_style2 ) ? $pofo_skill_style2 : 0;
                $pofo_skill_style2 = $pofo_skill_style2 + 1;

                $pofo_progress_bar_color    = !empty( $pofo_progress_bar_color ) ? $pofo_progress_bar_color : '#ff214f';
                $pofo_track_color           = !empty( $pofo_track_color ) ? $pofo_track_color : '#535353';
                $pofo_track_width           = !empty( $pofo_track_width ) ? $pofo_track_width : 2;

                // Link Color Style
                if( !empty( $pofo_counter_color ) ) {
                    $pofo_featured_array[] = '.chart-style2-'.$pofo_skill_style2.' a.counter-number-link { '.$pofo_counter_color.' }';
                }
                if( !empty( $pofo_title_color ) ) {
                    $pofo_featured_array[] = '.chart-style2-'.$pofo_skill_style2.' a.counter-title-link { '.$pofo_title_color.' }';
                }
                if( !empty( $pofo_link_hover_color ) ) {
                    $pofo_featured_array[] = '.chart-style2-'.$pofo_skill_style2.' a.counter-number-link:hover, .chart-style2-'.$pofo_skill_style2.' a.counter-title-link:hover { '.$pofo_link_hover_color.' }';
                }

                $output .= '<div'.$id.' class="chart-style3 '.$class_list.' skill-chart-2-'.$pofo_skill_style2.'">';
                
                    $output .= '<div class="chart-percent">';
                        if( $counter_number ){
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '<a class="counter-number-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                            }
                                $output .= '<'.$pofo_counter_element_tag.' class="chart3" data-percent="'.$counter_number.'">';
                                    $output .= '<span class="percent font-weight-500 text-medium '.$pofo_counter_dynamic_font_size.'" '.$pofo_counter_style_attr.'></span> ';
                                $output .= '</'.$pofo_counter_element_tag.'>';
                            if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'counter' || $pofo_link_on == 'all' ) ) {
                                $output .= '</a>';
                            }
                        }
                    $output .= '</div>';
                    if( $title || $content ){
                        $output .= '<div class="chart-text">';
                            if( $title ){
                                $output .= '<'.$pofo_title_element_tag.' class="alt-font text-dark-gray font-weight-600 margin-5px-bottom margin-20px-top display-block '.$pofo_title_dynamic_font_size.'" '.$pofo_title_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '<a class="text-dark-gray counter-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $title;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) && ( $pofo_link_on == 'title' || $pofo_link_on == 'all' ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_title_element_tag.'>';
                            }
                            if( $content ){
                                $output .= '<div class="center-col width-90 xs-width-100 text-medium-gray">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                        $output .= '</div>';
                    }
                $output .= '</div>';

                ob_start(); ?>
                $(document).ready(function () { $('.skill-chart-2-<?php echo $pofo_skill_style2 ?> .chart3').easyPieChart({ barColor: '<?php echo $pofo_progress_bar_color ?>', trackColor: '<?php echo $pofo_track_color ?>', scaleColor: false, easing: 'easeOutBounce', scaleLength: 1, lineCap: 'round', lineWidth: <?php echo $pofo_track_width ?>, size: 140, animate: { duration: <?php echo $pofo_counter_animation_duration ?>, enabled: true }, onStep: function (from, to, percent) { $(this.el).find('.percent').text(Math.round(percent)); } }); });
                <?php
                $pofo_slider_script .= ob_get_contents();
                ob_end_clean();

            break;

        }
        return $output;        
    }
}
add_shortcode( 'pofo_counter_or_skill', 'pofo_counter_or_skill_shortcode' );
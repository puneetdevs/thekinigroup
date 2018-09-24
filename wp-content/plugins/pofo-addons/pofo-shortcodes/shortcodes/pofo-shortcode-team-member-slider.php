<?php
/**
 * Shortcode For Team Member Slider
 *
 * @package Pofo
 */
?>
<?php 
/*-----------------------------------------------------------------------------------*/
/* Slider */
/*-----------------------------------------------------------------------------------*/

$pofo_slider_unique_id = 1;
function pofo_team_member_slider_shortcode( $atts, $content = null ) {
    
    global $pofo_slider_unique_id, $pofo_slider_script, $pofo_featured_array, $pofo_team_style1, $pofo_team_style2;;

    extract( shortcode_atts( array(
                'pofo_team_member_slider_style' => '',
                'pofo_team_member_slides' => '',
                'pofo_social_sorting' => '',
                'show_pagination' => '1',
                'show_pagination_style' => '',
                'show_pagination_color_style' => '',
                'show_navigation' => '',
                'show_navigation_style' => '',
                'show_cursor_color_style' => '',

                'pofo_box_bg_color' => '',
                'pofo_box_hover_bg_color' => '',
                'pofo_link_hover_color' => '',
                'pofo_icon_size' => '',
                'pofo_icon_color' => '',
                'pofo_enable_separator' => '',
                'pofo_separator_color' => '',
                'pofo_separator_height' => '',

                'slides_per_view_desktop' => '4',
                'slides_per_view_mini_desktop' => '3',
                'slides_per_view_tablet' => '2',
                'slides_per_view_mobile' => '1',
                'autoloop' => '',
                'autoplay' => '',
                'slidedelay' => '',
                'slidespeed' => '',
                'pofo_slider_id' => '',
                'pofo_slider_class' => '',

                'pofo_member_name_font_size' => '',
                'pofo_member_name_line_height' => '',
                'pofo_member_name_letter_spacing' => '',
                'pofo_member_name_font_weight' => '',
                'pofo_member_name_italic' => '',
                'pofo_member_name_underline' => '',
                'pofo_member_name_element_tag' => '',
                'pofo_member_name_color' => '',
                'pofo_member_name_enable_responsive_font' => '',
                'pofo_member_des_font_size' => '',
                'pofo_member_des_line_height' => '',
                'pofo_member_des_letter_spacing' => '',
                'pofo_member_des_font_weight' => '',
                'pofo_member_des_italic' => '',
                'pofo_member_des_underline' => '',
                'pofo_member_des_element_tag' => '',
                'pofo_member_des_color' => '',
                'pofo_member_des_enable_responsive_font' => '',

                'desktop_alignment' => 'text-center',
                'desktop_mini_alignment' => '',
                'ipad_alignment' => '',
                'mobile_alignment' => '',
                'vertical_desktop_alignment' => 'vertical-align-middle',
                'vertical_desktop_mini_alignment' => '',
                'vertical_ipad_alignment' => '',
                'vertical_mobile_alignment' => '',
            ), $atts ) );

    $output = $slider_config = $slider_class = $pofo_member_name_style_attr = $pofo_member_des_style_attr = $alignment_class = $vertical_alignment_class = $stars = $sep_style = '';
    $pofo_member_name_style_array = $pofo_member_des_style_array = $social_data = array();

    if( !empty( $pofo_team_member_slides ) ) {

        $pofo_team_member_slides = json_decode( urldecode( $pofo_team_member_slides ) );
        $show_pagination_color_style= ( $show_pagination_color_style ) ? ' swiper-pagination-white' : ' swiper-pagination-black';
        $show_cursor_color_style= ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' black-move';
        $slides_per_view_desktop= !empty( $slides_per_view_desktop ) ? $slides_per_view_desktop : '4';
        $slides_per_view_mini_desktop= !empty( $slides_per_view_mini_desktop ) ? $slides_per_view_mini_desktop : '3';
        $slides_per_view_tablet = !empty( $slides_per_view_tablet ) ? $slides_per_view_tablet : '2';
        $slides_per_view_mobile = !empty( $slides_per_view_mobile ) ? $slides_per_view_mobile : '1';

        $pofo_box_bg_color          = ( $pofo_box_bg_color ) ? ' style="background-color: '.$pofo_box_bg_color.';" ' : '';
        $pofo_box_hover_bg_color    = ( $pofo_box_hover_bg_color ) ? ' style="background-color: ' . $pofo_box_hover_bg_color . ';"' : '';
        $pofo_link_hover_color      = ( $pofo_link_hover_color ) ? 'color: '.$pofo_link_hover_color.';' : '';
        $pofo_icon_size             = ( $pofo_icon_size ) ? $pofo_icon_size : '';
        $pofo_icon_color            = ( $pofo_icon_color ) ? ' style="color:'.$pofo_icon_color.';"' : '';

        // For Separator Style
        $pofo_separator_color   = ( $pofo_separator_color ) ? 'background-color:'.$pofo_separator_color.'; ' : '';
        $pofo_separator_height  = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.'; ' : '';
        if( $pofo_separator_color || $pofo_separator_height ){
            $sep_style .= ' style="'.$pofo_separator_color.$pofo_separator_height.'"';
        }

        // For Member Name Style
        !empty( $pofo_member_name_font_size ) ? $pofo_member_name_style_array[] = 'font-size: ' . $pofo_member_name_font_size . ';' : '';
        !empty( $pofo_member_name_line_height ) ? $pofo_member_name_style_array[] = 'line-height: ' . $pofo_member_name_line_height . ';' : '';
        !empty( $pofo_member_name_letter_spacing ) ? $pofo_member_name_style_array[] = 'letter-spacing: ' . $pofo_member_name_letter_spacing . ';' : '';
        !empty( $pofo_member_name_font_weight ) ? $pofo_member_name_style_array[] = 'font-weight: ' . $pofo_member_name_font_weight . ';' : '';
        ( $pofo_member_name_italic == 1 ) ? $pofo_member_name_style_array[] = 'font-style: italic;' : '';
        ( $pofo_member_name_underline == 1 ) ? $pofo_member_name_style_array[] = 'text-decoration: underline;' : '';
        $pofo_member_name_color = !empty( $pofo_member_name_color ) ? $pofo_member_name_style_array[] = 'color: '.$pofo_member_name_color.';' : '';

        $pofo_member_name_dynamic_font_size = $pofo_member_name_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_member_name_style_attr   = pofo_get_style_attribute( $pofo_member_name_style_array, $pofo_member_name_font_size, $pofo_member_name_line_height );

        // For Member Designation Style
        !empty( $pofo_member_des_font_size ) ? $pofo_member_des_style_array[] = 'font-size: ' . $pofo_member_des_font_size . ';' : '';
        !empty( $pofo_member_des_line_height ) ? $pofo_member_des_style_array[] = 'line-height: ' . $pofo_member_des_line_height . ';' : '';
        !empty( $pofo_member_des_letter_spacing ) ? $pofo_member_des_style_array[] = 'letter-spacing: ' . $pofo_member_des_letter_spacing . ';' : '';
        !empty( $pofo_member_des_font_weight ) ? $pofo_member_des_style_array[] = 'font-weight: ' . $pofo_member_des_font_weight . ';' : '';
        ( $pofo_member_des_italic == 1 ) ? $pofo_member_des_style_array[] = 'font-style: italic;' : '';
        ( $pofo_member_des_underline == 1 ) ? $pofo_member_des_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_member_des_color ) ? $pofo_member_des_style_array[] = 'color: '.$pofo_member_des_color.';' : '';

        $pofo_member_des_element_tag = ( $pofo_member_des_element_tag ) ? $pofo_member_des_element_tag : 'p';
        $pofo_member_des_dynamic_font_size = $pofo_member_des_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_member_des_style_attr   = pofo_get_style_attribute( $pofo_member_des_style_array, $pofo_member_des_font_size, $pofo_member_des_line_height );

        // Hover Box Icon Allignment settings
        $alignment_class .= ( $desktop_alignment ) ? $desktop_alignment . ' ' : '';
        $alignment_class .= ( $desktop_mini_alignment ) ? $desktop_mini_alignment . ' ' : '';
        $alignment_class .= ( $ipad_alignment ) ? $ipad_alignment . ' ' : '';
        $alignment_class .= ( $mobile_alignment ) ? $mobile_alignment . ' ' : '';

        // Hover Box Icon Vertical Allignment settings
        $vertical_alignment_class .= ( $vertical_desktop_alignment ) ? $vertical_desktop_alignment . ' ' : '';
        $vertical_alignment_class .= ( $vertical_desktop_mini_alignment ) ? $vertical_desktop_mini_alignment . ' ' : '';
        $vertical_alignment_class .= ( $vertical_ipad_alignment ) ? $vertical_ipad_alignment . ' ' : '';
        $vertical_alignment_class .= ( $vertical_mobile_alignment ) ? $vertical_mobile_alignment . ' ' : '';

        // Check if slider id and class
        $pofo_slider_unique_id  = !empty( $pofo_slider_unique_id ) ? $pofo_slider_unique_id : 1;
        $navigation_unique_id   = $pofo_slider_unique_id;
        $pofo_slider_id         = ( $pofo_slider_id ) ? $pofo_slider_id : 'team-member-slider';
        $pofo_slider_id         .= '-' . $pofo_slider_unique_id;
        $pofo_slider_unique_id++;

        $pofo_slider_class      = ( $pofo_slider_class ) ? $pofo_slider_class . ' ' . $pofo_team_member_slider_style : $pofo_team_member_slider_style;

        switch ($pofo_team_member_slider_style) 
        {
            case 'team-style-1':

            $pofo_team_style1 = !empty( $pofo_team_style1 ) ? $pofo_team_style1 : 0;
            $pofo_team_style1 = $pofo_team_style1 + 1;

            // Link Color Style
            if( !empty( $pofo_member_name_color ) ) {
                $pofo_featured_array[] = '.team_style1-'.$pofo_team_style1.' a.team-title-link { '.$pofo_member_name_color.' }';
            }
            if( !empty( $pofo_link_hover_color ) ) {
                $pofo_featured_array[] = '.team_style1-'.$pofo_team_style1.' a.team-title-link:hover, .team_style1-'.$pofo_team_style1.' a.team-title-link:focus { '.$pofo_link_hover_color.' }';
            }

            $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container team-member-slider-style1 team_style1-'.$pofo_team_style1.' '.$pofo_slider_id.' '.$show_cursor_color_style.' '.$pofo_slider_class.$show_pagination_color_style.'">';
                $output .= '<div class="swiper-wrapper">';
                    
                    foreach ($pofo_team_member_slides as $slide) {

                        $social_data = array();

                        /* Image Alt, Title, Caption */
                        $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                        $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                        $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';

                        $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                        $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                        $srcset = $srcset_data = $sizes = $sizes_data = '';
                        $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }

                        $pofo_member_name   = !empty( $slide->pofo_member_name ) ? $slide->pofo_member_name : '';
                        $pofo_member_des    = !empty( $slide->pofo_member_des ) ? $slide->pofo_member_des : '';

                        $pofo_link_url      = !empty( $slide->pofo_link_url ) ? $slide->pofo_link_url : '';

                        $pofo_link_target_attr  = ( !empty( $slide->pofo_link_target ) && $slide->pofo_link_target != 'one_page' ) ? ' target="'.$slide->pofo_link_target.'"' : '';
                        $section_link_class     = !empty( $slide->pofo_link_target ) && $slide->pofo_link_target == 'one_page' ? ' section-link' : '';

                        $pofo_facebook_url  = !empty( $slide->pofo_facebook_url ) ? $social_data['facebook'] = $slide->pofo_facebook_url : '';
                        $pofo_twitter_url   = !empty( $slide->pofo_twitter_url ) ? $social_data['twitter'] = $slide->pofo_twitter_url : '';
                        $pofo_gplus_url     = !empty( $slide->pofo_gplus_url ) ? $social_data['gplus'] = $slide->pofo_gplus_url : '';
                        $pofo_db_url        = !empty( $slide->pofo_db_url ) ? $social_data['dribbble'] = $slide->pofo_db_url : '';
                        $pofo_linkedin_url  = !empty( $slide->pofo_linkedin_url ) ? $social_data['linkedin'] = $slide->pofo_linkedin_url : '';
                        $pofo_instagram_url = !empty( $slide->pofo_instagram_url ) ? $social_data['instagram'] = $slide->pofo_instagram_url : '';
                        $pofo_tb_url        = !empty( $slide->pofo_tb_url ) ? $social_data['tumblr'] = $slide->pofo_tb_url : '';
                        $pofo_pinterest_url = !empty( $slide->pofo_pinterest_url ) ? $social_data['pinterest'] = $slide->pofo_pinterest_url : '';
                        $pofo_yt_url        = !empty( $slide->pofo_yt_url ) ? $social_data['youtube'] = $slide->pofo_yt_url : '';
                        $pofo_vm_url        = !empty( $slide->pofo_vm_url ) ? $social_data['vimeo'] = $slide->pofo_vm_url : '';
                        $pofo_sc_url        = !empty( $slide->pofo_sc_url ) ? $social_data['soundcloud'] = $slide->pofo_sc_url : '';
                        $pofo_fk_url        = !empty( $slide->pofo_fk_url ) ? $social_data['flickr'] = $slide->pofo_fk_url : '';
                        $pofo_rss_url       = !empty( $slide->pofo_rss_url ) ? $social_data['rss'] = $slide->pofo_rss_url : '';
                        $pofo_rd_url        = !empty( $slide->pofo_rd_url ) ? $social_data['reddit'] = $slide->pofo_rd_url : '';
                        $pofo_behance_url   = !empty( $slide->pofo_behance_url ) ? $social_data['behance'] = $slide->pofo_behance_url : '';
                        $pofo_vine_url      = !empty( $slide->pofo_vine_url ) ? $social_data['vine'] = $slide->pofo_vine_url : '';
                        $pofo_gh_url        = !empty( $slide->pofo_gh_url ) ? $social_data['github'] = $slide->pofo_gh_url : '';
                        $pofo_xing_url      = !empty( $slide->pofo_xing_url ) ? $social_data['xing'] = $slide->pofo_xing_url : '';
                        $pofo_vk_url        = !empty( $slide->pofo_vk_url ) ? $social_data['vk'] = $slide->pofo_vk_url : '';
                        $pofo_yelp_url      = !empty( $slide->pofo_yelp_url ) ? $social_data['yelp'] = $slide->pofo_yelp_url : '';
                        $pofo_discord_url   = !empty( $slide->pofo_discord_url ) ? $social_data['discord'] = $slide->pofo_discord_url : '';
                        $pofo_email_url     = !empty( $slide->pofo_email_url ) ? $social_data['email'] = $slide->pofo_email_url : '';

                        if( !empty( $pofo_social_sorting ) ) {

                            // Get sorted social icons            
                            $social_data = pofo_get_sorted_social_data( $pofo_social_sorting, $social_data );
                        }

                        // Get all social icons
                        $social_icons = pofo_get_social_icons();

                        $output .= '<div class="swiper-slide padding-15px-lr team-block text-left team-style-1">';
                            $output .= '<figure>';
                                $output .= '<div class="team-image xs-width-100">';
                                    if( !empty( $thumb[0] ) ){
                                        $output .= '<img src="'.$thumb[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.'/>';
                                    }

                                    $box_hover_class = ( $pofo_enable_separator || !empty( $slide->pofo_content ) ) ? 'padding-twelve-all ' : '';

                                    $output .= '<div class="overlay-content '.$alignment_class.'">';
                                        $output .= '<div class="display-table height-100 width-100">';
                                            $output .= '<div class="display-table-cell icon-social-small '.$box_hover_class.$vertical_alignment_class.'">';
                                              
                                                if( !empty( $slide->pofo_content ) ) {
                                                    $output .= '<span class="text-white text-white-hover text-small no-margin last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop($slide->pofo_content) ) . '</span>';
                                                }
                                                if( $pofo_enable_separator ) {
                                                    $output .= '<div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"'.$sep_style.'></div>';
                                                }

                                                if( !empty( $social_data ) ) {
                                                    foreach( $social_data as $key => $social_url ) {

                                                        $key = !empty( $social_icons[$key] ) ? $social_icons[$key] : '';

                                                        if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt'  ){
                                                            $icon_class = 'fas fa-'.esc_html( $key );
                                                        } else{
                                                            $icon_class = 'fab fa-'.esc_html( $key );
                                                        }
                                                        $output .= '<a class="text-white text-white-hover" href="'.esc_url( $social_url ).'" target="_blank"><i class="'.$icon_class.' '.$pofo_icon_size.'"'.$pofo_icon_color.'></i></a>';
                                                    }
                                                    if( !empty( $slide->pofo_custom_link ) ) :
                                                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $slide->pofo_custom_link ) ) ) );
                                                    endif;
                                                }

                                            $output .= '</div>';
                                        $output .= '</div>';
                                    $output .= '</div>';
                                    $output .= '<div class="team-overlay bg-deep-pink opacity8" '.$pofo_box_hover_bg_color.'></div>';
                                $output .= '</div>';

                                $output .= '<figcaption>';
                                    $output .= '<div class="team-member-position text-center margin-20px-top">';
                                        if( $pofo_member_name ){
                                            $pofo_member_name_dynamic_font_size .= empty( $pofo_member_name_element_tag ) ? ' text-small' : ' no-margin-bottom';
                                            $pofo_member_name_element_tag = !empty( $pofo_member_name_element_tag ) ? $pofo_member_name_element_tag : 'span';
                                            $output .= '<'.$pofo_member_name_element_tag.' class="font-weight-500 text-extra-dark-gray'.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>';
                                                if( !empty( $pofo_link_url ) ) {
                                                    $output .= '<a class="team-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                                }
                                                    $output .= $pofo_member_name;
                                                if( !empty( $pofo_link_url ) ) {
                                                    $output .= '</a>';
                                                }
                                            $output .= '</'.$pofo_member_name_element_tag.'>';
                                        }
                                        if( $pofo_member_des ){
                                            $output .= '<div class="text-extra-small text-medium-gray'.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</div>';
                                        }
                                    $output .= '</div>';
                                $output .= '</figcaption>';

                            $output .= '</figure>';
                        $output .= '</div>';
                    }

                $output .= '</div>';
            $output .= '</div>';

            break;

            case 'team-style-2':

            $pofo_team_style2 = !empty( $pofo_team_style2 ) ? $pofo_team_style2 : 0;
            $pofo_team_style2 = $pofo_team_style2 + 1;

            // Link Color Style
            if( !empty( $pofo_member_name_color ) ) {
                $pofo_featured_array[] = '.team_style2-'.$pofo_team_style2.' a.team-title-link { '.$pofo_member_name_color.' }';
            }
            if( !empty( $pofo_link_hover_color ) ) {
                $pofo_featured_array[] = '.team_style2-'.$pofo_team_style2.' a.team-title-link:hover, .team_style2-'.$pofo_team_style2.' a.team-title-link:focus { '.$pofo_link_hover_color.' }';
            }

            $output .= '<div id="'.$pofo_slider_id.'" class="swiper-container swiper-three1-slides swiper-container-horizontal team-member-style1 team_style2-'.$pofo_team_style2.'  '.$pofo_slider_id.' '.$show_cursor_color_style.' '.$pofo_slider_class.$show_pagination_color_style.'">';
                $output .= '<div class="swiper-wrapper">';
                    
                    foreach ($pofo_team_member_slides as $slide) {

                        /* Image Alt, Title, Caption */
                        $img_alt        = !empty( $slide->pofo_image ) ? pofo_option_image_alt( $slide->pofo_image ) : array();
                        $img_title      = !empty( $slide->pofo_image ) ? pofo_option_image_title( $slide->pofo_image ) : array();
                        $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
                        $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
                        
                        $pofo_image_srcset  = !empty( $slide->pofo_image_srcset ) ? $slide->pofo_image_srcset : 'full';
                        $thumb          = !empty( $slide->pofo_image ) ? wp_get_attachment_image_src( $slide->pofo_image, $pofo_image_srcset ) : array();

                        $srcset = $srcset_data = $sizes = $sizes_data = '';
                        $srcset = !empty( $slide->pofo_image ) ? wp_get_attachment_image_srcset( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $srcset ){
                            $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
                        }

                        $sizes = !empty( $slide->pofo_image ) ? wp_get_attachment_image_sizes( $slide->pofo_image, $pofo_image_srcset ) : '';
                        if( $sizes ){
                            $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                        }

                        $pofo_member_name   = !empty( $slide->pofo_member_name ) ? $slide->pofo_member_name : '';
                        $pofo_member_des    = !empty( $slide->pofo_member_des ) ? $slide->pofo_member_des : '';

                        $pofo_link_url      = !empty( $slide->pofo_link_url ) ? $slide->pofo_link_url : '';

                        $pofo_link_target_attr  = ( !empty( $slide->pofo_link_target ) && $slide->pofo_link_target != 'one_page' ) ? ' target="'.$slide->pofo_link_target.'"' : '';
                        $section_link_class     = !empty( $slide->pofo_link_target ) && $slide->pofo_link_target == 'one_page' ? ' section-link' : '';

                        $output .= '<div class="swiper-slide sm-margin-four-bottom padding-15px-lr">';
                            $output .= '<div class="bg-white box-shadow-light text-center margin-half-all padding-fourteen-all xs-padding-30px-all" '.$pofo_box_bg_color.'>';
                                if( !empty( $thumb[0] ) ){
                                    $output .= '<img src="'.$thumb[0].'"'.$image_alt.$image_title.$srcset_data.$sizes_data.' class="border-radius-100 width-40 margin-25px-bottom sm-margin-15px-bottom"/>';
                                }
                                if( !empty( $slide->pofo_content ) ){
                                    $output .= '<div class="margin-25px-bottom sm-margin-15px-bottom xs-margin-20px-bottom">' . do_shortcode( pofo_remove_wpautop($slide->pofo_content) ) . '</div>';
                                }
                                if( $pofo_member_name ){
                                    $pofo_member_name_dynamic_font_size .= empty( $pofo_member_name_element_tag ) ? ' text-small' : ' no-margin-bottom';
                                    $pofo_member_name_element_tag = !empty( $pofo_member_name_element_tag ) ? $pofo_member_name_element_tag : 'span';
                                    $output .= '<'.$pofo_member_name_element_tag.' class="text-extra-dark-gray display-block line-height-10 alt-font font-weight-600'.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>';
                                        if( !empty( $pofo_link_url ) ) {
                                            $output .= '<a class="team-title-link text-extra-dark-gray'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                        }
                                            $output .= $pofo_member_name;
                                        if( !empty( $pofo_link_url ) ) {
                                            $output .= '</a>';
                                        }
                                    $output .= '</'.$pofo_member_name_element_tag.'>';
                                }
                                if( $pofo_member_des ){
                                    $output .= '<span class="text-light-gray2 text-extra-small text-medium-gray'.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</span>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    }

                $output .= '</div>';
            $output .= '</div>';

            break;
        }

        if( $show_pagination == 1 ) {
            $pagination_style_class = $show_pagination_style == 1 ? ' swiper-pagination-square' : '';
            $class_name = 'swiper-pagination-' . $navigation_unique_id;
            $output .= '<div class="swiper-pagination height-auto swiper-pagination-square-bottom ' . $class_name . $pagination_style_class . '"></div>';

            $slider_config .= "pagination: '." . $class_name . "',";
            $slider_config .= "paginationType: 'bullets',";
        }
        if( $show_navigation == 1 ) {
            
            if( $show_navigation_style == 1 ) {
                $navigation_style_class = ' swiper-button-black-highlight';
            } else if( $show_navigation_style == 2 ) {
                $navigation_style_class = ' swiper-button-white-highlight';
            } else {
                $navigation_style_class = ' slider-long-arrow-white';
            }

            $output .= '<div class="swiper-button-next swiper-next-' . $navigation_unique_id . $navigation_style_class . '"></div>
                        <div class="swiper-button-prev swiper-prev-' . $navigation_unique_id . $navigation_style_class . '"></div>';
                        
            $slider_config .= "nextButton: '.swiper-next-" . $navigation_unique_id . "',";
            $slider_config .= "prevButton: '.swiper-prev-" . $navigation_unique_id . "',";
        }

        /* Add custom script Start*/
        $slidedelay = ( $slidedelay ) ? $slidedelay : '300';
        $slidespeed = ( $slidespeed ) ? $slidespeed : '';

        $slider_config .= "autoplayStopOnLast: true,";
        $slider_config .= "autoplayDisableOnInteraction: false,";
        $slider_config .= "paginationClickable: true,";
        $slider_config .= "keyboardControl: true,";
        $slider_config .= "slidesPerView: ".$slides_per_view_desktop.",";
        $slider_config .= "breakpoints: { 1199: { slidesPerView: ".$slides_per_view_mini_desktop." }, 991: { slidesPerView: ".$slides_per_view_tablet." }, 767: { slidesPerView: ".$slides_per_view_mobile." }, },";
        ( $autoloop == 1 ) ? $slider_config .= 'loop: true,' : '';
        ( $autoplay == 1 ) ? $slider_config .= 'autoplay: '.$slidedelay.',' : $slider_config .= 'autoplay: false,';
        ( $slidespeed ) ? $slider_config .= 'speed:  '.$slidespeed.',' : '';
        
        ob_start();?>
        $(document).ready(function () {  var teamSliderID = "<?php echo str_replace( '-', '_', $pofo_slider_id ); ?>"; setTimeout(function () { teamSliderID = new Swiper('#<?php echo $pofo_slider_id; ?>', { <?php echo $slider_config;?> }); }, 100); var ua = window.navigator.userAgent; var msie = ua.indexOf("MSIE "); /* If Internet Explorer, return version number */ if( msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) { setTimeout(function () { $(document).imagesLoaded(function () { if( $( '#<?php echo $pofo_slider_id; ?>' ).length > 0 ){ teamSliderID.onResize(); } }); }, 300); } $(window).resize(function () { setTimeout(function () { if ($( '#<?php echo $pofo_slider_id; ?>' ).length > 0){ teamSliderID.onResize(); } }, 500); }); });
        <?php 
        $pofo_slider_script .= ob_get_contents();
        ob_end_clean();

        /* Add custom script End*/
    }
    return $output;
}
add_shortcode( 'pofo_team_member_slider', 'pofo_team_member_slider_shortcode' );
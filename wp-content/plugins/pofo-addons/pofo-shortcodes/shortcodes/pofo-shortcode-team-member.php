<?php
/**
 * Shortcode For Team Member
 *
 * @package Pofo
 */
?>
<?php

/*-----------------------------------------------------------------------------------*/
/* Team Member */
/*-----------------------------------------------------------------------------------*/

function pofo_team_member_shortcode( $atts, $content = null ) {
    
    global $pofo_featured_array, $pofo_team1, $pofo_team2;

    extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_team_member_style' => '',
            'pofo_team_member_image' => '',
            'pofo_image_srcset' => 'full',
            'pofo_member_name' => '',
            'pofo_member_des' => '',
            'pofo_title_text_transform' => 'text-uppercase',
            'pofo_des_text_transform' => 'text-uppercase',

            'pofo_enable_link' => '',
            'pofo_link_url' => '',
            'pofo_link_target' => '',
            'pofo_link_hover_color' => '',

            'pofo_social_sorting' => '',
            'pofo_facebook_url' => '',
            'pofo_twitter_url' => '',
            'pofo_gplus_url' => '',
            'pofo_db_url' => '',
            'pofo_linkedin_url' => '',
            'pofo_instagram_url' => '',
            'pofo_tb_url' => '',
            'pofo_pinterest_url' => '',
            'pofo_yt_url' => '',
            'pofo_vm_url' => '',
            'pofo_sc_url' => '',
            'pofo_fk_url' => '',
            'pofo_rss_url' => '',
            'pofo_rd_url' => '',
            'pofo_behance_url' => '',
            'pofo_vine_url' => '',
            'pofo_gh_url' => '',
            'pofo_xing_url' => '',
            'pofo_vk_url' => '',
            'pofo_ws_url' => '',
            'pofo_yelp_url' => '',
            'pofo_discord_url' => '',
            'pofo_email_url' => '',
            'pofo_custom_link' => '',

            'pofo_box_hover_bg_color' => '',
            'pofo_enable_separator' => '1',
            'pofo_enable_content' => '1',
            'pofo_separator_color' => '',
            'pofo_separator_height' => '',
            'pofo_icon_size' => '',
            'pofo_icon_color' => '',
            'pofo_icon_hover_color' => '',

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
    
    $output = $style = $pofo_member_name_style_attr = $pofo_member_des_style_attr = $alignment_class = $vertical_alignment_class = $sep_style = '';
    $classes = $pofo_member_name_style_array = $pofo_member_des_style_array = $social_data = array();

    $id         = ( $id ) ? ' id="'.$id.'"' : '';
    $class      = ( $class ) ? $classes[] = $class : '';
    
    /* Image Alt, Title, Caption */
    $img_alt        = !empty( $pofo_team_member_image ) ? pofo_option_image_alt( $pofo_team_member_image ) : array();
    $img_title      = !empty( $pofo_team_member_image ) ? pofo_option_image_title( $pofo_team_member_image ) : array();
    $image_alt      = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? ' alt="'.$img_alt['alt'].'"' : ' alt=""' ; 
    $image_title    = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';
    
    $pofo_image_srcset  = !empty($pofo_image_srcset) ? $pofo_image_srcset : 'full';
    $thumb              = !empty( $pofo_team_member_image ) ? wp_get_attachment_image_src($pofo_team_member_image, $pofo_image_srcset) : array();

    $srcset = $srcset_data = $sizes_data = '';
    $srcset = !empty( $pofo_team_member_image ) ? wp_get_attachment_image_srcset( $pofo_team_member_image, $pofo_image_srcset ) : '';
    if( $srcset ){
        $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
    }

    $sizes = !empty( $pofo_team_member_image ) ? wp_get_attachment_image_sizes( $pofo_team_member_image, $pofo_image_srcset ) : '';
    if( $sizes ){
        $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
    }

    $pofo_facebook_url = !empty( $pofo_facebook_url ) ? $social_data['facebook'] = $pofo_facebook_url : '';
    $pofo_twitter_url = !empty( $pofo_twitter_url ) ? $social_data['twitter'] = $pofo_twitter_url : '';
    $pofo_gplus_url = !empty( $pofo_gplus_url ) ? $social_data['gplus'] = $pofo_gplus_url : '';
    $pofo_db_url = !empty( $pofo_db_url ) ? $social_data['dribbble'] = $pofo_db_url : '';
    $pofo_linkedin_url = !empty( $pofo_linkedin_url ) ? $social_data['linkedin'] = $pofo_linkedin_url : '';
    $pofo_instagram_url = !empty( $pofo_instagram_url ) ? $social_data['instagram'] = $pofo_instagram_url : '';
    $pofo_tb_url = !empty( $pofo_tb_url ) ? $social_data['tumblr'] = $pofo_tb_url : '';
    $pofo_pinterest_url = !empty( $pofo_pinterest_url ) ? $social_data['pinterest'] = $pofo_pinterest_url : '';
    $pofo_yt_url = !empty( $pofo_yt_url ) ? $social_data['youtube'] = $pofo_yt_url : '';
    $pofo_vm_url = !empty( $pofo_vm_url ) ? $social_data['vimeo'] = $pofo_vm_url : '';
    $pofo_sc_url = !empty( $pofo_sc_url ) ? $social_data['soundcloud'] = $pofo_sc_url : '';
    $pofo_fk_url = !empty( $pofo_fk_url ) ? $social_data['flickr'] = $pofo_fk_url : '';
    $pofo_rss_url = !empty( $pofo_rss_url ) ? $social_data['rss'] = $pofo_rss_url : '';
    $pofo_rd_url = !empty( $pofo_rd_url ) ? $social_data['reddit'] = $pofo_rd_url : '';
    $pofo_behance_url = !empty( $pofo_behance_url ) ? $social_data['behance'] = $pofo_behance_url : '';
    $pofo_vine_url = !empty( $pofo_vine_url ) ? $social_data['vine'] = $pofo_vine_url : '';
    $pofo_gh_url = !empty( $pofo_gh_url ) ? $social_data['github'] = $pofo_gh_url : '';
    $pofo_xing_url = !empty( $pofo_xing_url ) ? $social_data['xing'] = $pofo_xing_url : '';
    $pofo_vk_url = !empty( $pofo_vk_url ) ? $social_data['vk'] = $pofo_vk_url : '';
    $pofo_yelp_url = !empty( $pofo_yelp_url ) ? $social_data['yelp'] = $pofo_yelp_url : '';
    $pofo_discord_url = !empty( $pofo_discord_url ) ? $social_data['discord'] = $pofo_discord_url : '';
    $pofo_email_url = !empty( $pofo_email_url ) ? $social_data['email'] = $pofo_email_url : '';

    if( !empty( $pofo_social_sorting ) ) {

        // Get sorted social icons        
        $social_data = pofo_get_sorted_social_data( $pofo_social_sorting, $social_data );
    }

    // Get all social icons
    $social_icons = pofo_get_social_icons();

    $pofo_member_name       = !empty( $pofo_member_name ) ? $pofo_member_name : '';
    $pofo_member_des        = !empty( $pofo_member_des ) ? $pofo_member_des : '';

    // Title & Designation Text Case
    $pofo_title_text_transform = !empty( $pofo_title_text_transform ) ? ' ' . $pofo_title_text_transform : '';
    $pofo_des_text_transform = !empty( $pofo_des_text_transform ) ? ' ' . $pofo_des_text_transform : '';

    $pofo_box_hover_bg_color= ( $pofo_box_hover_bg_color ) ? ' style="background-color: ' . $pofo_box_hover_bg_color . ';"' : '';
    $pofo_icon_size         = ( $pofo_icon_size ) ? $pofo_icon_size : '';
    $pofo_icon_color        = ( $pofo_icon_color ) ? ' color:'.$pofo_icon_color.';' : '';
    $pofo_icon_hover_color  = ( $pofo_icon_hover_color ) ? ' color:'.$pofo_icon_hover_color.';' : '';

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

    // For Separator Style
    $pofo_separator_color   = ( $pofo_separator_color ) ? 'background-color:'.$pofo_separator_color.'; ' : '';
    $pofo_separator_height  = ( $pofo_separator_height ) ? 'height:'.$pofo_separator_height.'; ' : '';
    if( $pofo_separator_color || $pofo_separator_height ){
        $sep_style .= ' style="'.$pofo_separator_color.$pofo_separator_height.'"';
    }

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

    $pofo_link_url      = ( $pofo_link_url ) ? $pofo_link_url : '';
    $pofo_link_hover_color = ( $pofo_link_hover_color ) ? 'color: '.$pofo_link_hover_color.';' : '';

    $pofo_link_target_attr  = ( !empty( $pofo_link_target ) && $pofo_link_target != 'one_page' ) ? ' target="'.$pofo_link_target.'"' : '';
    $section_link_class     = $pofo_link_target == 'one_page' ? ' section-link' : '';

    //Unique Style Class
    $classes[] = $pofo_team_member_style;

    // Class List
    $class_list = !empty( $classes ) ? implode(" ", $classes) : '';

    switch ($pofo_team_member_style) 
    {
        case 'team-1':

            $pofo_team1 = !empty( $pofo_team1 ) ? $pofo_team1 : 0;

            if( !empty( $pofo_icon_color ) ) {
                $pofo_featured_array[] = '.team1-'.$pofo_team1.' a.team-social-icon { '.$pofo_icon_color.' }';
            }
            if( !empty( $pofo_icon_hover_color ) ) {
                $pofo_featured_array[] = '.team1-'.$pofo_team1.' a.team-social-icon:hover { '.$pofo_icon_hover_color.' }';
            }

            // Link Color Style
            if( !empty( $pofo_member_name_color ) ) {
                $pofo_featured_array[] = '.team1-'.$pofo_team1.' a.team-title-link { '.$pofo_member_name_color.' }';
            }
            if( !empty( $pofo_link_hover_color ) ) {
                $pofo_featured_array[] = '.team1-'.$pofo_team1.' a.team-title-link:hover, .team1-'.$pofo_team1.' a.team-title-link:focus { '.$pofo_link_hover_color.' }';
            }

            $box_hover_class = ( $pofo_enable_separator || ( $pofo_enable_content && $content ) ) ? 'padding-twelve-all ' : '';

            $output .= '<div'.$id.' class="'.$class_list.' team-block team-style-1 team1-'.$pofo_team1.'">';
                $output .= '<figure>';
                    $output .= '<div class="team-image xs-width-100">';
                        if( !empty( $thumb[0] ) ){
                            $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' />';
                        }
                        $output .= '<div class="overlay-content '.$alignment_class.'">';
                            $output .= '<div class="display-table height-100 width-100">';
                                $output .= '<div class="display-table-cell icon-social-small '.$box_hover_class.$vertical_alignment_class.'">';
                                    
                                    if( $pofo_enable_content && $content ) {
                                        $output .= '<div class="text-white text-white-hover text-small no-margin last-paragraph-no-margin">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                                    }
                                    if( $pofo_enable_separator ) {
                                        $output .= '<div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"'.$sep_style.'></div>';
                                    }

                                    if( !empty( $social_data ) ) {
                                        foreach( $social_data as $key => $social_url ) {

                                            $key = !empty( $social_icons[$key] ) ? $social_icons[$key] : '';

                                            if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                                $icon_class = 'fas fa-'.esc_html( $key );
                                            } else{
                                                $icon_class = 'fab fa-'.esc_html( $key );
                                            }
                                            $output .= '<a class="text-white text-white-hover team-social-icon" href="'.esc_url( $social_url ).'" target="_blank"><i class="'.$icon_class.' '.$pofo_icon_size.'"></i></a>';
                                        }
                                        if( !empty( $pofo_custom_link ) ) :
                                            $output .= nl2br( rawurldecode( base64_decode( strip_tags( $pofo_custom_link ) ) ) );
                                        endif;
                                    }

                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="team-overlay bg-deep-pink opacity8" '.$pofo_box_hover_bg_color.'></div>';
                    $output .= '</div>';

                    $output .= '<figcaption>';
                        $output .= '<div class="team-member-position margin-20px-top">';
                            if( $pofo_member_name ){
                                $pofo_member_name_dynamic_font_size .= empty( $pofo_member_name_element_tag ) ? ' text-small' : ' no-margin-bottom';
                                $pofo_member_name_element_tag = !empty( $pofo_member_name_element_tag ) ? $pofo_member_name_element_tag : 'div';
                                $output .= '<'.$pofo_member_name_element_tag.' class="font-weight-500 text-extra-dark-gray'.$pofo_title_text_transform.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
                                        $output .= '<a class="team-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_member_name;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_member_name_element_tag.'>';
                            }
                            if( $pofo_member_des ){
                                $output .= '<div class="text-extra-small text-medium-gray'.$pofo_des_text_transform.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</div>';
                            }
                        $output .= '</div>';
                    $output .= '</figcaption>';

                $output .= '</figure>';
            $output .= '</div>';
        break;

        case 'team-2':

            $pofo_team2 = !empty( $pofo_team2 ) ? $pofo_team2 : 0;
            $pofo_team2 = $pofo_team2 + 1;

            if( !empty( $pofo_icon_color ) ) {
                $pofo_featured_array[] = '.team2-'.$pofo_team2.' a.team-social-icon { '.$pofo_icon_color.' }';
            }
            if( !empty( $pofo_icon_hover_color ) ) {
                $pofo_featured_array[] = '.team2-'.$pofo_team2.' a.team-social-icon:hover { '.$pofo_icon_hover_color.' }';
            }

            // Link Color Style
            if( !empty( $pofo_member_name_color ) ) {
                $pofo_featured_array[] = '.team2-'.$pofo_team2.' a.team-title-link { '.$pofo_member_name_color.' }';
            }
            if( !empty( $pofo_link_hover_color ) ) {
                $pofo_featured_array[] = '.team2-'.$pofo_team2.' a.team-title-link:hover, .team2-'.$pofo_team2.' a.team-title-link:focus { '.$pofo_link_hover_color.' }';
            }

            $output .= '<div'.$id.' class="'.$class_list.' team-block team-style-2 team2-'.$pofo_team2.'">';
                $output .= '<figure>';
                    $output .= '<div class="team-image xs-width-100">';
                        if( !empty( $thumb[0] ) ){
                            $output .='<img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.$srcset_data.$sizes_data.' />';
                        }
                        $output .= '<div class="team-overlay bg-deep-pink" '.$pofo_box_hover_bg_color.'></div>';
                        $output .= '<div class="team-member-position font-weight-500 text-extra-dark-gray margin-20px-top '.$alignment_class.'">';
                            if( $pofo_member_name ){
                                $pofo_member_name_dynamic_font_size .= empty( $pofo_member_name_element_tag ) ? ' text-small' : ' no-margin-bottom';
                                $pofo_member_name_element_tag = !empty( $pofo_member_name_element_tag ) ? $pofo_member_name_element_tag : 'div';
                                $output .= '<'.$pofo_member_name_element_tag.' class="text-extra-dark-gray alt-font font-weight-600'.$pofo_title_text_transform.$pofo_member_name_dynamic_font_size.'"'.$pofo_member_name_style_attr.'>';
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
                                        $output .= '<a class="team-title-link'. $section_link_class .'"'.$pofo_link_target_attr.' href="'.esc_url( $pofo_link_url ).'">';
                                    }
                                        $output .= $pofo_member_name;
                                    if( $pofo_enable_link == 1 && !empty( $pofo_link_url ) ) {
                                        $output .= '</a>';
                                    }
                                $output .= '</'.$pofo_member_name_element_tag.'>';
                            }
                            if( $pofo_member_des ){
                                $output .= '<div class="text-extra-small text-medium-gray'.$pofo_title_text_transform.$pofo_member_des_dynamic_font_size.'"'.$pofo_member_des_style_attr.'>'.$pofo_member_des.'</div>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';

                    $output .= '<figcaption>';
                        $output .= '<div class="overlay-content icon-social-small '.$alignment_class.'">';
                
                            if( $pofo_enable_content && $content ) {
                                $output .= '<div class="text-small display-inline-block no-margin margin-eleven-bottom">' . do_shortcode( pofo_remove_wpautop( $content ) ) . '</div>';
                            }
                            if( $pofo_enable_separator ) {
                                $output .= '<div class="separator-line-horrizontal-full bg-deep-pink margin-25px-bottom xs-margin-20px-bottom"'.$sep_style.'></div>';
                            }

                            if( !empty( $social_data ) ) {
                                foreach( $social_data as $key => $social_url ) {

                                    $key = !empty( $social_icons[$key] ) ? $social_icons[$key] : '';

                                    if( $key == 'rss' || $key == 'envelope' || $key == 'external-link-alt' ){
                                        $icon_class = 'fas fa-'.esc_html( $key );
                                    } else{
                                        $icon_class = 'fab fa-'.esc_html( $key );
                                    }
                                    $output .= '<a class="text-extra-dark-gray team-social-icon" href="'.esc_url( $social_url ).'" target="_blank"><i class="'.$icon_class.' '.$pofo_icon_size.'"></i></a>';
                                }
                                if( !empty( $pofo_custom_link ) ) :
                                    $output .= nl2br( rawurldecode( base64_decode( strip_tags( $pofo_custom_link ) ) ) );
                                endif;
                            }

                        $output .= '</div>';
                    $output .= '</figcaption>';
                $output .= '</figure>';
            $output .= '</div>';
        break;
    }

    return $output;
}
add_shortcode( 'pofo_team_member', 'pofo_team_member_shortcode' );
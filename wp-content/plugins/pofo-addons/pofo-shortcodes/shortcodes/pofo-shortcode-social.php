<?php
/**
 * Shortcode For Social
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Social */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_social_shortcode' ) ) {
    function pofo_social_shortcode( $atts, $content = null ) {
        
        global $pofo_featured_array, $pofo_social_icon;
                
        extract( shortcode_atts( array(
            'class' => '',
            'id' => '',

            'pofo_social_style' =>'',
            'pofo_icon_type' => 'small-icon',
            'pofo_social_sorting' => '',
            'pofo_fb_url' => '',
            'pofo_tw_url' => '',
            'pofo_gp_url' => '',
            'pofo_db_url' => '',
            'pofo_li_url' => '',
            'pofo_ig_url' => '',
            'pofo_tb_url' => '',
            'pofo_pi_url' => '',
            'pofo_yt_url' => '',
            'pofo_vm_url' => '',
            'pofo_sc_url' => '',
            'pofo_fk_url' => '',
            'pofo_rss_url' => '',
            'pofo_rd_url' => '',
            'pofo_bh_url' => '',
            'pofo_vine_url' => '',
            'pofo_gh_url' => '',
            'pofo_xing_url' => '',
            'pofo_vk_url' => '',
            'pofo_email_url' => '',
            'pofo_yelp_url' => '',
            'pofo_discord_url' => '',

            'pofo_custom_link' => '',
            
            'pofo_icon_size' => '',
            'pofo_icon_color' => '',
            'pofo_icon_hover_color' => '',

            'pofo_animation_style' => '',
        ), $atts ) );

        $output = $class_list = $span_tag = '';
        $classes= $social_data = array();

        $id = ($id) ? 'id="'.$id.'"' : '';
        $class = ( $class ) ? $classes[] = $class : '';

        $pofo_fb_url = !empty( $pofo_fb_url ) ? $social_data['facebook'] = $pofo_fb_url : '';
        $pofo_tw_url = !empty( $pofo_tw_url ) ? $social_data['twitter'] = $pofo_tw_url : '';
        $pofo_gp_url = !empty( $pofo_gp_url ) ? $social_data['gplus'] = $pofo_gp_url : '';
        $pofo_db_url = !empty( $pofo_db_url ) ? $social_data['dribbble'] = $pofo_db_url : '';
        $pofo_li_url = !empty( $pofo_li_url ) ? $social_data['linkedin'] = $pofo_li_url : '';
        $pofo_ig_url = !empty( $pofo_ig_url ) ? $social_data['instagram'] = $pofo_ig_url : '';
        $pofo_tb_url = !empty( $pofo_tb_url ) ? $social_data['tumblr'] = $pofo_tb_url : '';
        $pofo_pi_url = !empty( $pofo_pi_url ) ? $social_data['pinterest'] = $pofo_pi_url : '';
        $pofo_yt_url = !empty( $pofo_yt_url ) ? $social_data['youtube'] = $pofo_yt_url : '';
        $pofo_vm_url = !empty( $pofo_vm_url ) ? $social_data['vimeo'] = $pofo_vm_url : '';
        $pofo_sc_url = !empty( $pofo_sc_url ) ? $social_data['soundcloud'] = $pofo_sc_url : '';
        $pofo_fk_url = !empty( $pofo_fk_url ) ? $social_data['flickr'] = $pofo_fk_url : '';
        $pofo_rss_url = !empty( $pofo_rss_url ) ? $social_data['rss'] = $pofo_rss_url : '';
        $pofo_rd_url = !empty( $pofo_rd_url ) ? $social_data['reddit'] = $pofo_rd_url : '';
        $pofo_bh_url = !empty( $pofo_bh_url ) ? $social_data['behance'] = $pofo_bh_url : '';
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
        $pofo_social_icons = pofo_get_social_icons();

        $pofo_animation_style   = ( $pofo_animation_style ) ? $classes[] = ' wow '.$pofo_animation_style : '';
        $pofo_icon_type         = !empty( $pofo_icon_type ) ? $pofo_icon_type : '';
        $pofo_icon_color        = !empty( $pofo_icon_color ) ? ' color: '.$pofo_icon_color.';' : '';
        $pofo_icon_hover_color  = !empty( $pofo_icon_hover_color ) ? ' color: '.$pofo_icon_hover_color.';' : '';

        //Unique Style Class
        $classes[] = $pofo_social_style;

        $pofo_social_icon = !empty( $pofo_social_icon ) ? $pofo_social_icon : 0;
        $pofo_social_icon = $pofo_social_icon + 1;
        $classes[] = 'social-icon-'.$pofo_social_icon;

        // Class List
        $class_list= !empty( $classes ) ? ' ' . implode(" ", $classes) : '';

        if( !empty( $pofo_icon_color ) ) {
            $pofo_featured_array[] = '.social-icon-'.$pofo_social_icon.' li a { '.$pofo_icon_color.' }';
        }
        if( !empty( $pofo_icon_hover_color ) ) {
            $pofo_featured_array[] = '.social-icon-'.$pofo_social_icon.' li a:hover { '.$pofo_icon_hover_color.' }';
        }

        if( $pofo_social_style == 'social-icon-style-4' || $pofo_social_style == 'social-icon-style-10' ) {
            $span_tag = '<span></span>';   
        }        

        if( !empty( $social_data ) ) {
            $output .= '<div '.$id.' class="pofo-social-links'.$class_list.'">';
                $output .= '<ul class="'.$pofo_icon_type.'">';
                    foreach( $social_data as $key => $social_url ) {
                        
                        $key = !empty( $pofo_social_icons[$key] ) ? $pofo_social_icons[$key] : '';

                        if( $key == 'rss' || $key == 'envelope' ){
                            $icon_class = 'fas fa-'.esc_html( $key );
                        } else{
                            $icon_class = 'fab fa-'.esc_html( $key );
                        }
                        $output .= '<li><a class="'.esc_html( $key ).'" target="_blank" href="'.esc_url( $social_url ).'"><i class="'.$icon_class.'"></i>'.$span_tag.'</a></li>';
                    }
                    if( !empty( $pofo_custom_link ) ) :
                        $output .= nl2br( rawurldecode( base64_decode( strip_tags( $pofo_custom_link ) ) ) );
                    endif;
                $output .= '</ul>';
            $output .= '</div>';
        }

        return $output;
    }
}
add_shortcode( 'pofo_social', 'pofo_social_shortcode' );
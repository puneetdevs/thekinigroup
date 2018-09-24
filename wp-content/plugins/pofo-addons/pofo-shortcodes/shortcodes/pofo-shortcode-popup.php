<?php
/**
 * Shortcode For Popup
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Popup */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'pofo_popup_shortcode' ) ) {
    function pofo_popup_shortcode( $atts, $content = null ) {
        global $pofo_featured_array, $pofo_button;
        extract( shortcode_atts( array(
                'id' => '',
                'class' => '',
                'pofo_popup_type' => '',
                'pofo_popup_animation_effect' => '',
                'pofo_enable_icon' => '',
                'custom_icon' => '',
                'custom_icon_image' => '',
                'pofo_icon_list' => '',
                'pofo_popup_button_title' => '',
                'pofo_inside_popup_title' => '',
                'pofo_contact_forms_shortcode' => '',
                'pofo_popup_youtube_url' => '',
                'pofo_popup_vimeo_url' => '',
                'pofo_popup_google_map_url' => '',
                'pofo_icon_color' => '',
                'pofo_button_type' => 'medium',
                'pofo_button_bg_color' => '',
                'pofo_button_text_color' => '',
                'pofo_button_hover_bg_color' => '',
                'pofo_button_hover_text_color' => '',
                'pofo_button_border_color' => '',
                'pofo_icon_size' => '',
                'pofo_popup_form_id' => '',
                'pofo_width' => '',
                'pofo_offset' => '',
            ), $atts ) );

        $output = $pofo_popup_button = '';
        $classes = $classes_icon = array();

        $pofo_button = !empty( $pofo_button ) ? $pofo_button : 0;
        $pofo_button = $pofo_button + 1;

        $pofo_icon_list = ($pofo_icon_list) ? $pofo_icon_list : '';
        $pofo_inside_popup_title = ( $pofo_inside_popup_title ) ? $pofo_inside_popup_title : '';
        $pofo_contact_forms_shortcode = ( $pofo_contact_forms_shortcode ) ? $pofo_contact_forms_shortcode : '';
        $pofo_popup_youtube_url = ($pofo_popup_youtube_url) ? $pofo_popup_youtube_url : '';
        $pofo_popup_vimeo_url = ($pofo_popup_vimeo_url) ? $pofo_popup_vimeo_url : '';
        $pofo_popup_google_map_url = ($pofo_popup_google_map_url) ? $pofo_popup_google_map_url : '';

        // new font awesome icons

        $fa_icons_solid = pofo_fontawesome_solid();
        $fa_icons_reg = pofo_fontawesome_reg();
        $fa_icons_brand = pofo_fontawesome_brand();
        $fa_icon_old = pofo_fontawesome_old();
        $font_awesome_fa_icons = explode(' ',trim($pofo_icon_list));

        if($font_awesome_fa_icons[0] == 'fa'){
            $pofo_icon_list = substr(strstr($pofo_icon_list," "), 1);

            if(array_key_exists($pofo_icon_list, $fa_icon_old)){
                $pofo_icon_list = $fa_icon_old[$pofo_icon_list];
            }else if(in_array($pofo_icon_list, $fa_icons_solid)){
                $pofo_icon_list = 'fas '.$pofo_icon_list;
            }else if(in_array($pofo_icon_list, $fa_icons_reg)){
                $pofo_icon_list = 'far '.$pofo_icon_list;
            }else if(in_array($pofo_icon_list, $fa_icons_brand)){
                $pofo_icon_list = 'fab '.$pofo_icon_list;
            }else{
                $pofo_icon_list = '';
            }
        }

        $pofo_icon_list = ( $pofo_icon_list ) ? $classes_icon[] = $pofo_icon_list : '' ;
        $pofo_icon_color= ( $pofo_icon_color ) ? 'color:'.$pofo_icon_color.' !important;' : '';
        $pofo_icon_size = ( $pofo_icon_size ) ? $classes_icon[] = $pofo_icon_size : $classes_icon[] ='icon-medium';

        if( !empty( $pofo_icon_color ) ){
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.' i { '.$pofo_icon_color.' }';   
        }

        // Image Alt, Title, Caption
        $icon_img_alt           = !empty( $custom_icon_image ) ? pofo_option_image_alt($custom_icon_image) : '';
        $icon_img_title         = !empty( $custom_icon_image ) ? pofo_option_image_title($custom_icon_image) : '';
        $icon_image_alt         = ( isset($icon_img_alt['alt']) && !empty($icon_img_alt['alt']) ) ? ' alt="'.$icon_img_alt['alt'].'"' : ' alt=""' ;
        $icon_image_title       = ( isset($icon_img_title['title']) && !empty($icon_img_title['title']) ) ? ' title="'.$icon_img_title['title'].'"' : '';

        $custom_icon_image      = !empty( $custom_icon_image ) ? wp_get_attachment_url( $custom_icon_image ) : '';

        $class_list3    = !empty( $classes_icon ) ? implode( " ", $classes_icon ) : '';
        $class_icon_attr= ( $class_list3 ) ? ' '.$class_list3 : '';

        $pofo_popup_button = !empty( $pofo_popup_button_title ) ? $pofo_popup_button_title : '';
        if( $pofo_enable_icon == 1 ) {
            if( $custom_icon == 1 && !empty( $custom_icon_image ) ) {
                $pofo_popup_button .= '<img src="'.esc_url( $custom_icon_image ).'"'.$icon_image_alt.$icon_image_title.' class="icon-image" />';
            }elseif( $pofo_icon_list ){
                $pofo_popup_button .= '<i class="'.$class_icon_attr.'"></i>';
            }
        //} else {
          //  $pofo_popup_button = ( $pofo_popup_button_title ) ? $pofo_popup_button_title : '';
        }

        // Column Offset and sm width
        $pofo_offset = ( $pofo_offset ) ? ' '. str_replace( 'vc_', '', $pofo_offset ) : '';
        if(strchr($pofo_offset,'col-xs')):
            $pofo_offset = $pofo_offset;
        else:
            $pofo_offset = $pofo_offset." col-xs-mobile-fullwidth";
        endif;
        
        if($pofo_width != ''){
            $pofo_width = explode('/', $pofo_width);
            $pofo_width = ( $pofo_width[0] != '1' ) ? ' col-sm-'.$pofo_width[0] * floor(12 / $pofo_width[1]) : ' col-sm-'.floor(12 / $pofo_width[1]);
        }

        // Button Color Settings
        $pofo_button_type             = !empty( $pofo_button_type ) ? 'btn-' . $pofo_button_type . ' ' : '';
        $pofo_button_bg_color         = !empty( $pofo_button_bg_color ) ? $style_array[] = 'background-color:'.$pofo_button_bg_color.'; ' : '';
        $pofo_button_text_color       = !empty( $pofo_button_text_color ) ? $style_array[] = 'color:'.$pofo_button_text_color.'; ' : '';
        $pofo_button_border_color     = !empty( $pofo_button_border_color ) ? $style_array[] = 'border-color:'.$pofo_button_border_color.'; ' : '';
        if( !empty( $pofo_button_hover_bg_color ) ){
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover, a.btn.pofo-button-'.$pofo_button.':focus { background-color:'.$pofo_button_hover_bg_color.' !important; }';   
        }
        if( !empty( $pofo_button_hover_text_color ) ){
            $pofo_featured_array[] = 'a.btn.pofo-button-'.$pofo_button.':hover, a.btn.pofo-button-'.$pofo_button.':focus, a.btn.pofo-button-'.$pofo_button.':hover i, a.btn.pofo-button-'.$pofo_button.':focus i { color:'.$pofo_button_hover_text_color.' !important; }';   
        }
        
        !empty( $pofo_popup_animation_effect ) ? $classes[] = $pofo_popup_animation_effect : '';

        $id         = ( $id ) ? ' id="'.$id.'"' : '';
        $class      = ( $class ) ? $classes[] = $class : '';
        $classes[]  = $pofo_popup_type;

        // Class List
        $class_list = !empty( $classes ) ? implode(" ", $classes) . ' ' : '';

        // Style Property List
        $style_attr = !empty( $style_array ) ? implode(" ", $style_array) : '';
        $style = !empty( $style_attr ) ? ' style="'.$style_attr.'"' : '';

// $pofo_enable_icon != 1
        switch ($pofo_popup_type){
            case 'popup-form-1':
                $pofo_btn_class = !empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                $contact_form = do_shortcode('[contact-form-7 id='.$pofo_contact_forms_shortcode.']');
                    if($pofo_popup_button):
                        $output .= '<a'.$id.' class="'.$class_list.$pofo_btn_class.'wow fadeInDown popup-with-form pofo-button-'.$pofo_button.'" href="#popup-form-'.$pofo_popup_form_id.'"'.$style.'>'.$pofo_popup_button.'</a>';
                    endif;
                    $output .= '<div id="popup-form-'.$pofo_popup_form_id.'" class="'.$pofo_offset.$pofo_width.' white-popup-block mfp-hide col-lg-3 col-md-6 center-col bg-white border-radius-6 padding-four-half-all md-padding-seven-all">';
                        $output .= $contact_form;
                    $output .= '</div>';
                break;

            case 'modal-popup':

                $animation_dialog = !empty( $pofo_popup_animation_effect ) ? 'zoom-anim-dialog ' : '';

                $pofo_btn_class = !empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if($pofo_popup_button):
                    $output .= '<a'.$id.' class="'.$class_list.$pofo_btn_class.' pofo-button-'.$pofo_button.'" href="#modal-popup-'.$pofo_popup_form_id.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                $output .= '<div id="modal-popup-'.$pofo_popup_form_id.'" class="'.$animation_dialog.'white-popup-block mfp-hide col-lg-3 col-md-6 col-sm-7 col-xs-11 center-col bg-white text-center modal-popup-main padding-50px-all '.$pofo_offset.$pofo_width.'">';
                    if($pofo_inside_popup_title):
                        $output .= '<h6 class="text-extra-large text-extra-dark-gray alt-font font-weight-600 margin-15px-bottom">'.$pofo_inside_popup_title.'</h6>';
                    endif;
                    if($content):
                        $output .= '<p class="margin-four">'.do_shortcode($content).'</p>';
                    endif;
                    $output .= '<a class="' . $pofo_button_type . 'btn btn-rounded btn-dark-gray popup-modal-dismiss" href="#">'.__( 'Dismiss', 'pofo-addons' ).'</a>';
                $output .= '</div>';
                break;

            case 'youtube-video-1':
                $pofo_btn_class = !empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if($pofo_popup_button):
                    $output .='<a'.$id.' class="'.$class_list.$pofo_btn_class.' popup-youtube pofo-button-'.$pofo_button.'" href="'.$pofo_popup_youtube_url.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;
            case 'vimeo-video-1':
                $pofo_btn_class = !empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if($pofo_popup_button):
                    $output .='<a'.$id.' class="'.$class_list.$pofo_btn_class.' popup-vimeo pofo-button-'.$pofo_button.'" href="'.$pofo_popup_vimeo_url.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;

            case 'google-map-1':
                $pofo_popup_google_map_url = !empty( $pofo_popup_google_map_url ) ? add_query_arg( 'output', 'embed', $pofo_popup_google_map_url ) : '';
                $pofo_btn_class = !empty( $pofo_popup_button_title ) ? $pofo_button_type . 'btn btn-rounded btn-transparent-dark-gray ' : '';
                if($pofo_popup_button):
                    $output .='<a'.$id.' class="'.$class_list.$pofo_btn_class.' popup-youtube pofo-button-'.$pofo_button.'" href="'.$pofo_popup_google_map_url.'"'.$style.'>'.$pofo_popup_button.'</a>';
                endif;
                break;

        }
        return $output;
    }
}
add_shortcode( 'pofo_popup', 'pofo_popup_shortcode' );
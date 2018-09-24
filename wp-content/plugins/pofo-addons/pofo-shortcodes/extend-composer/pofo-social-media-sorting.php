<?php
/**
 * Pofo Custom Social Media Sorting For VC.
 *
 * @package Pofo
 */
?>
<?php 
vc_add_shortcode_param( 'pofo_custom_social_sorting', 'pofo_custom_social_sorting_settings_field', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/custom.js' );
if ( ! function_exists( 'pofo_custom_social_sorting_settings_field' ) ) :
  function pofo_custom_social_sorting_settings_field( $settings, $value ) {

      $output = '';
      if( !empty( $settings['value'] ) ) {

        $multi_values = !empty( $value ) && !is_array( $value ) ? explode( ',', $value ) : $settings['value'];

        // Get all social icons
        $social_icons = pofo_get_social_icons();

        $output .= '<ul class="pofo-social-icon-sorting">';
        foreach ( $multi_values as $key ) {
            if( !empty( $social_icons[$key] ) ) {
                if( $social_icons[$key] == 'rss' || $social_icons[$key] == 'envelope' ) {
                    $icon_class = 'fas fa-'.esc_html( $social_icons[$key] );
                } else {
                    $icon_class = 'fab fa-'.esc_html( $social_icons[$key] );
                }
                $title = !empty( $settings['value'] ) && !empty( $settings['value'][$key] ) ? esc_attr( $settings['value'][$key] ) : '';
                $output .= '<li data-key="'.esc_attr( $key ).'"><span title="'.$title.'"><i class="'.$icon_class.'"></i></span></li>';
            }
        }
        $output .= '</ul>';
        $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pofo-social-icon-sorting-list wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( implode( ',', $multi_values ) ) . '" />';
      }

    return $output;
  }
endif;
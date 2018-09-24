<?php
/**
 * Pofo Custom Icon (font awesome and et line) List For VC.
 *
 * @package Pofo
 */
?>
<?php 
/* icons shortcode settings */
vc_add_shortcode_param('pofo_icon', 'pofo_icon_shortcode', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/custom.js');
if ( ! function_exists( 'pofo_icon_shortcode' ) ) :
  function pofo_icon_shortcode($settings, $value) {
      
      $pofo_icons           = pofo_get_et_line_icons();
      $pofo_ti_icon         = pofo_get_themify_icons();
      $pofo_fa_icon_solid   = pofo_fontawesome_solid();
      $pofo_fa_icon_regular = pofo_fontawesome_reg();
      $pofo_fa_icon_brand   = pofo_fontawesome_brand();
      $pofo_fa_icon_old     = pofo_fontawesome_old();

      $value_without_fontawesome_main_class = substr(strstr($value," "), 1);
      $pofo_fontawesome_icons_main_class =  explode(' ',trim($value));
      $pofo_fontawesome_new_icon_value = '';

      if($pofo_fontawesome_icons_main_class[0] == 'fa'){
        if(array_key_exists($value_without_fontawesome_main_class, $pofo_fa_icon_old)){
          $pofo_fontawesome_new_icon_value = $pofo_fa_icon_old[$value_without_fontawesome_main_class];
        }else{
          if(in_array($value_without_fontawesome_main_class, $pofo_fa_icon_solid)){
              $pofo_fontawesome_new_icon_value = 'fas '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $pofo_fa_icon_regular)){
              $pofo_fontawesome_new_icon_value = 'far '.$value_without_fontawesome_main_class;
          }else if(in_array($value_without_fontawesome_main_class, $pofo_fa_icon_brand)){
              $pofo_fontawesome_new_icon_value = 'fab '.$value_without_fontawesome_main_class;
          }
        }
      }else{
        $pofo_fontawesome_new_icon_value = $value;
      }

      $output = '';

      /* Search icons */
      $output .= '<div class="vc_col-xs-12 pofo-find-icon-wrap">';
          $output .= "<input type='text' class='search_icon_text' placeholder='".esc_html__( 'Search icon', 'pofo-addons' )."'>";
          $output .= "<button type='button' class='button button-primary search_icon_button'>".esc_html__( 'Find', 'pofo-addons' )."</button>";
          $output .= "<button type='button' class='button clear_search_icon_button'>".esc_html__( 'Clear', 'pofo-addons' )."</button>";
      $output .= '</div>';

      $output .= "<div class='pofo_icon_container_main'>";
          foreach ($pofo_icons as $ikey => $ivalue) {
              $selected_icon = "";
              if($ivalue == $value) {
                $selected_icon = " active_icon";
              }
          $output .= '<span class="pofo_icon_preview'.$selected_icon.'"><i class="'.$ivalue.'" data-name="'.$ivalue.'"></i></span>';
          }

          foreach ($pofo_fa_icon_solid as $ikey => $ivalue) {
            $selected_icon = "";
            if('fas '.$ivalue == $pofo_fontawesome_new_icon_value) { 
                $selected_icon = " active_icon";
            }
            $output .= '<span class="pofo_icon_preview'.$selected_icon.'"><i class="fas '.$ivalue.'" data-name="fas '.$ivalue.'"></i></span>';
          }

          foreach ($pofo_fa_icon_regular as $ikey => $ivalue) {
            $selected_icon = "";
            if('far '.$ivalue == $pofo_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="pofo_icon_preview'.$selected_icon.'"><i class="far '.$ivalue.'" data-name="far '.$ivalue.'"></i></span>';
          }

          foreach ($pofo_fa_icon_brand as $ikey => $ivalue) {
            $selected_icon = "";
            if('fab '.$ivalue == $pofo_fontawesome_new_icon_value) { 
              $selected_icon = " active_icon";
            }
            $output .= '<span class="pofo_icon_preview'.$selected_icon.'"><i class="fab '.$ivalue.'" data-name="fab '.$ivalue.'"></i></span>';
          }
          
          foreach ($pofo_ti_icon as $ikey => $ivalue) {
              $selected_icon = "";
              if( $ivalue == $value ) {
                 $selected_icon = " active_icon";
              }
          $output .= '<span class="pofo_icon_preview'.$selected_icon.'"><i class="'.$ivalue.'" data-name="'.$ivalue.'"></i></span>';
          }
    
          $output .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value pofo_icon_field wpb-textinput ' .
               esc_attr( $settings['param_name'] ) . ' ' .
               esc_attr( $settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $value ) . '" />';
      $output .= '</div>'; 

  return $output;
  }
endif;
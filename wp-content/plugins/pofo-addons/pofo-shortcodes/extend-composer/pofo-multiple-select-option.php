<?php
/**
 * Multiple Category For Post Shortcode.
 *
 * @package Pofo
 */
?>
<?php
vc_add_shortcode_param( 'pofo_multiple_select_option', 'pofo_multiple_category');
if ( ! function_exists( 'pofo_multiple_category' ) ) :
  function pofo_multiple_category($settings, $value) {

    if( ! is_array( $value ) ) {
        $value = explode( ',', $value );
    }
    $value1 = $output = '';
    foreach ($value as $k => $v) {
        $value1 .= $v;
    }
    
    $args = array(
  	  'hide_empty' => 0,
  	  'orderby' => 'name',
  	  'order' => 'ASC'
    );
    $categories = get_categories( $args );

    $output  = '<select multiple="multiple" name="'. $settings['param_name'] .'" class="wpb_vc_param_value icon-select wpb-input wpb-rs-select '. $settings['param_name'] .' '. $settings['type'] .'">';

      if(!empty($value1)):
        $selected_all = ( in_array( '0' , $value ) ) ? ' selected="selected"' : '';
        $output .= '<option value="0" '.$selected_all.'>'.esc_html__( 'All Categories', 'pofo-addons' ).'</option>';
      else:
        $output .= '<option value="0" selected="selected">'.esc_html__( 'All Categories', 'pofo-addons' ).'</option>';
      endif;
        
    	foreach ( $categories as $index => $data ) {
      	$selected = ( in_array( $data->slug, $value ) ) ? ' selected="selected"' : '';
      	$output .= '<option value="'. $data->slug .'"'. $selected .'>'.htmlspecialchars( $data->name."- (".$data->slug." - ".$data->term_id.")" ).'</option>';
    	}
    $output .= '</select>' . "\n";
     
    return $output;
  }
endif;
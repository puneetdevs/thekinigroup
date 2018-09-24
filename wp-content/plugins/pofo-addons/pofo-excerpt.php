<?php
/**
 * Excerpt Class.
 *
 * @package Pofo
 */
?>
<?php
// Exerpt length
if( ! class_exists( 'Pofo_Excerpt' ) ){
    class Pofo_Excerpt {

      public static $length = 34;

      public static function pofo_get_by_length( $new_length = 34 ) {
        return Pofo_Excerpt::pofo_get( $new_length );
      }

      public static function pofo_get( $new_length ) {
        global $post;
        $pofo_output_data = '';
        $pofo_content = get_the_content();
        $pattern = get_shortcode_regex();
        if( $post->post_excerpt ){
          $pofo_output_data = $post->post_excerpt;
        }else{
          $pofo_output_data = preg_replace_callback( "/$pattern/s", 'pofo_extract_shortcode_contents', $pofo_content );
        }
        if ( post_password_required() ) {
          $pofo_output_data = $pofo_content;
        }else{
          if( $new_length > 0 ){
            $pofo_output_data = wp_trim_words( $pofo_output_data, $new_length, '...' );
          }else{
            $pofo_output_data = wp_trim_words( $pofo_output_data, $new_length, '' );
          }
        }
        return $pofo_output_data;

      }

    }
}
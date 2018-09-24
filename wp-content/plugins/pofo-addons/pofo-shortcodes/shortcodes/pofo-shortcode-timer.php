<?php
/**
 * Shortcode For Timer
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Timer */
/*-----------------------------------------------------------------------------------*/

$pofo_timer_unique_id = 1;
if ( ! function_exists( 'pofo_timer' ) ) {
    function pofo_timer( $atts, $content = null ) {

        global $pofo_featured_array, $pofo_countdown, $pofo_timer_unique_id, $pofo_slider_script;

        extract( shortcode_atts( array(
            'id' => '',
            'class' => '',
            'pofo_timer_style' => '',
            'pofo_timer_date' => '',
            'pofo_enable_separator' => '1',
            'pofo_day_text' => esc_html__('Days', 'pofo-addons'),
            'pofo_hour_text' => esc_html__('Hours', 'pofo-addons'),
            'pofo_minute_text' => esc_html__('Minutes', 'pofo-addons'),
            'pofo_second_text' => esc_html__('Seconds', 'pofo-addons'),

            'pofo_separator_color' => '',
            'pofo_separator_width' => '',
            'pofo_separator_height' => '',
            'pofo_timer_number_font_size' => '',
            'pofo_timer_number_font_weight' => '',
            'pofo_timer_number_color' => '',
            'pofo_timer_text_font_size' => '',
            'pofo_timer_text_font_weight' => '',
            'pofo_timer_text_color' => '',
        ), $atts ) );
        
        $output = '';

        // Check if slider id and class
        $pofo_timer_unique_id  = !empty( $pofo_timer_unique_id ) ? $pofo_timer_unique_id : 1;
        $pofo_timer_id         = !empty( $id ) ? $id : 'pofo-timer';
        $pofo_timer_id         .= '-' . $pofo_timer_unique_id;
        $pofo_timer_unique_id++;

        $id = !empty( $pofo_timer_id ) ? ' id="'.$pofo_timer_id.'"' : '';
        $class = ( $class ) ? $class : 'counter-event';
        
        $pofo_timer_date = ( $pofo_timer_date ) ? $pofo_timer_date : '';
        
        $pofo_countdown = !empty( $pofo_countdown ) ? $pofo_countdown : 0;
        $pofo_countdown = $pofo_countdown + 1;

        // For Timer Number Style
        if( !empty( $pofo_timer_number_font_size ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box .number { font-size: '.$pofo_timer_number_font_size.' }';
        }
        if( !empty( $pofo_timer_number_font_weight ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box .number { font-weight: '.$pofo_timer_number_font_weight.' }';
        }
        if( !empty( $pofo_timer_number_color ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box .number { color: '.$pofo_timer_number_color.' }';
        }

        // For Timer Text Style
        if( !empty( $pofo_timer_text_font_size ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box span { font-size: '.$pofo_timer_text_font_size.' }';
        }
        if( !empty( $pofo_timer_text_font_weight ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box span { font-weight: '.$pofo_timer_text_font_weight.' }';
        }
        if( !empty( $pofo_timer_text_color ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box span { color: '.$pofo_timer_text_color.' }';
        }

        // For Timer Separator Style
        if( $pofo_enable_separator != '1' ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box:after { width: 0 !important; }';
        }
        if( !empty( $pofo_separator_color ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box:after { background-color: '.$pofo_separator_color.' }';
        }
        if( !empty( $pofo_separator_width ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box:after { width: '.$pofo_separator_width.' }';
        }
        if( !empty( $pofo_separator_height ) ) {
            $pofo_featured_array[] = '.countdown.countdown-'.$pofo_countdown.' .counter-box:after { height: '.$pofo_separator_height.' }';
        }

        // Timer Style
        switch ($pofo_timer_style) {

            case 'timer1':
                $output .='<div'.$id.' data-enddate="'.$pofo_timer_date.'" class="'.$class.' timer1 countdown counter-box-3 countdown-'.$pofo_countdown.'"></div>';
            break;
         
            case 'timer2':
                $output .='<div'.$id.' data-enddate="'.$pofo_timer_date.'" class="'.$class.' timer2 countdown counter-box-5 countdown-'.$pofo_countdown.'"></div>';
            break;
               
            default:
            break;
        }
        ob_start(); ?>
        $(document).ready(function () { jQuery("<?php echo '#'.$pofo_timer_id ?>").countdown(jQuery("<?php echo '#'.$pofo_timer_id ?>").attr("data-enddate")).on('update.countdown', function (event) { var $this = jQuery(this).html(event.strftime('' + '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span><?php echo esc_attr( $pofo_day_text ) ?></span></div>' + '<div class="counter-box"><div class="number">%H</div><span><?php echo esc_attr( $pofo_hour_text ) ?></span></div>' + '<div class="counter-box"><div class="number">%M</div><span><?php echo esc_attr( $pofo_minute_text ) ?></span></div>' + '<div class="counter-box last"><div class="number">%S</div><span><?php echo esc_attr( $pofo_second_text ) ?></span></div></div>')) }); });
        <?php 
        $pofo_slider_script .= ob_get_contents();
        ob_end_clean();
        
        return $output;
    }
}
add_shortcode( 'pofo_timer', 'pofo_timer' );
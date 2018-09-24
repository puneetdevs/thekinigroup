<?php
/**
 * Shortcode For Video & Sound
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Video & Sound */
/*-----------------------------------------------------------------------------------*/
 
if ( ! function_exists( 'pofo_instagram' ) ) {
    function pofo_instagram( $atts, $content = null ) {
        extract( shortcode_atts( array(
        	'pofo_instagram_style' => '',
            'pofo_instagram_access_token' => '',
            'pofo_instagram_id' => '',
            'pofo_instagram_column' => '',
            'pofo_instagram_type' => '',
            'pofo_instagram_feed' => '',
            'pofo_enable_likes' =>'',
            'pofo_enable_comments' => '',
            'pofo_instagram_sortby' => 'none',
            'pofo_time_stamp' => '',
            'pofo_change_background_overlay_color'=>'',
            'pofo_icon_color'=>'',
            'pofo_counter_color'=>'',
            'pofo_counter_background_color'=>'',
            'pofo_animation_style'=> '',
        ), $atts ) );

        wp_register_script( 'instafeed', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/instafeed.min.js', array( 'jquery' ), '1.3.3', false );
        wp_enqueue_script( 'instafeed' );

        global $pofo_featured_array, $pofo_slider_script;
        $column_classes = $output = '';
        $pofo_instagram_style = ( $pofo_instagram_style ) ? $pofo_instagram_style : '';
        $pofo_instagram_access_token = ( $pofo_instagram_access_token ) ? $pofo_instagram_access_token : '';
        $pofo_instagram_id = ( $pofo_instagram_id ) ? $pofo_instagram_id : '';
        $pofo_instagram_column = ( $pofo_instagram_column ) ? $pofo_instagram_column : '';
        $pofo_instagram_type = ( $pofo_instagram_type ) ? ' ' . $pofo_instagram_type : '';
        $pofo_instagram_feed = ( $pofo_instagram_feed ) ? $pofo_instagram_feed : '';
        $pofo_time_stamp = ( $pofo_time_stamp ) ? $pofo_time_stamp : '';
        $pofo_animation_style = !empty( $pofo_animation_style ) ? ' wow '.$pofo_animation_style : '';

        /* Define empty variables */
        $pofo_instagram_feed_script = '';
        /* Define empty array */
        $instagram_feed_nav_page_cursor = array();
        /* Get instagram userId */
        $pofo_instagram_id_value = ( isset( $pofo_instagram_id ) ) ? $pofo_instagram_id : '';
        $pofo_instagram_id = ( isset( $pofo_instagram_id ) ) ? $pofo_instagram_feed_script .= "userId: ".$pofo_instagram_id."," : '';
        /* Get instagram accessToken */
        $pofo_instagram_access_token_value = ( isset( $pofo_instagram_access_token ) ) ? $pofo_instagram_access_token : '';
        $pofo_instagram_access_token = ( isset( $pofo_instagram_access_token ) ) ? $pofo_instagram_feed_script .= "accessToken: '".$pofo_instagram_access_token."'," : '';
        /* Check no of feed to show */
        $pofo_instagram_feed = ( isset( $pofo_instagram_feed ) ) ? $pofo_instagram_feed_script .= "limit: '".$pofo_instagram_feed."'," : '8';
        /* Check sort order */
        $pofo_instagram_sortby = ( isset( $pofo_instagram_sortby ) ) ? $pofo_instagram_feed_script .= "sortBy: '".$pofo_instagram_sortby."'," : 'none';
        /* Enabel/Disable likes Counter */
        $pofo_enable_likes = ( $pofo_enable_likes == '1' ) ? '<span><i class="ti-heart"></i><span class="count-number">{{likes}}</span></span>' : '';
        /* Enabel/Disable Comments Counter */
        $pofo_enable_comments = ( $pofo_enable_comments == '1' ) ? '<span><i class="ti-comment"></i><span class="count-number">{{comments}}</span></span>' : '';
        /* Resolution */
        $pofo_instagram_feed_script .= "resolution: 'low_resolution',";
        /* append data */
        $pofo_instagram_feed_script .= " target: 'pofo-".$pofo_time_stamp."',";
        $pofo_instagram_template = $pofo_slider_config = '';

        if( !empty( $pofo_icon_color ) ){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts i{ color : '.$pofo_icon_color.' }';
        }
        if( !empty( $pofo_counter_color ) ){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts span.count-number{ color : '.$pofo_counter_color.'; }';
        }
        if( !empty( $pofo_counter_background_color )){
            $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' .insta-counts span.count-number{ background : '.$pofo_counter_background_color.'; }';
        }
        
        switch ($pofo_instagram_style) {
            case 'instagram-style1':
                    $output .= '<div id="pofo_insta_'.$pofo_time_stamp.'" class="pofo_insta_style_1">';
                        $output .= '<div>';
                            $output .= '<ul id="pofo-'.$pofo_time_stamp.'" class="pofo-instagram-feed'.esc_attr( $pofo_instagram_type ).'"></ul>';
                        $output .= '</div>';
                if( !empty( $pofo_change_background_overlay_color ) ){
                    $pofo_featured_array[] = '#pofo-'.$pofo_time_stamp.' .'.$pofo_instagram_style.' a{ background : '.$pofo_change_background_overlay_color.'; }';
                }
            break;
            case 'instagram-style2':
                    $output .= '<div id="pofo_insta_'.$pofo_time_stamp.'" class="pofo_insta_style_2">';
                        $output .= '<div class="instagram-follow-api">';
                            $output .= '<ul id="pofo-'.$pofo_time_stamp.'" class="pofo-instagram-feed'.esc_attr( $pofo_instagram_type ).'"></ul>';
                        $output .= '</div>';
                if( !empty( $pofo_change_background_overlay_color ) ){
                    $pofo_featured_array[] = '.instagram-follow-api #pofo-'.$pofo_time_stamp.' li.'.$pofo_instagram_style.' figure a .insta-counts{ background : '.$pofo_change_background_overlay_color.'; }';
                }
            break;
        }

        ob_start();  
                $column_classes = '';
                switch ($pofo_instagram_style) {
                    case 'instagram-style1':
                        switch ($pofo_instagram_column) 
                        {
                            case 'column-1':
                                $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-2':
                                $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-3':
                                $column_classes .= ' class="col-md-4 col-sm-6 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-6':
                                $column_classes .= ' class="col-md-2 col-sm-4 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-4':
                            default:
                                $column_classes .= ' class="col-md-3 col-sm-6 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                        }
                        break;
                    case 'instagram-style2':
                        switch ($pofo_instagram_column) 
                        {
                            case 'column-1':
                                $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-2':
                                $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-3':
                                $column_classes .= ' class="col-md-4 col-sm-4 col-xs-4 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-6':
                                $column_classes .= ' class="col-md-2 col-sm-4 col-xs-12 '.$pofo_instagram_style.'"';
                            break;
                            case 'column-4':
                            default:
                                $column_classes .= ' class="col-md-3 col-sm-4 col-xs-4 '.$pofo_instagram_style.'"';
                            break;
                        }
                        break;
                }
                $pofo_instagram_template = '<li'.$column_classes.'><figure><a href="{{link}}" target="_blank"><img src="{{image}}" /><div class="insta-counts">'.$pofo_enable_likes .$pofo_enable_comments.'</div></a></figure></li>'; 
                ?>
                jQuery(document).ready(function () {
                var <?php echo 'pofo_insta_'.$pofo_time_stamp; ?> = new Instafeed({ get: 'user', <?php echo sprintf( '%s', $pofo_instagram_feed_script ); ?> after: function () { <?php echo sprintf( '%s', $pofo_slider_config );?> var images = jQuery('#<?php echo 'pofo_insta_'.$pofo_time_stamp; ?>').find('a');
                    jQuery.each(images, function (index, image) { var delay = (index * 75) + 'ms'; jQuery(image).css('-webkit-animation-delay', delay); jQuery(image).css('-moz-animation-delay', delay); jQuery(image).css('-ms-animation-delay', delay); jQuery(image).css('-o-animation-delay', delay); jQuery(image).css('animation-delay', delay); jQuery(image).addClass('<?php echo $pofo_animation_style; ?>'); }); }, template: <?php echo "'".sprintf( '%s', $pofo_instagram_template )."'"; ?>});
                    <?php echo 'pofo_insta_'.$pofo_time_stamp; ?>.run();
                });
                <?php 
                $pofo_slider_script .= ob_get_contents();
                ob_end_clean();
        $output .= '</div>';
        return $output;
    }
}
add_shortcode( 'pofo_instagram', 'pofo_instagram' );
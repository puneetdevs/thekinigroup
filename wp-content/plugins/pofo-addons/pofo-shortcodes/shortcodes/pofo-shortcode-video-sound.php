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
 
if ( ! function_exists( 'pofo_video_sound' ) ) {
    function pofo_video_sound( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'pofo_video_type' => '',
            'pofo_vimeo_id' => '',
            'pofo_youtube_url' => '',
            //'pofo_track_id' =>'',
            'mp4_video' => '',
            'ogg_video' => '',
            'webm_video' => '',
            'video_autoplay' => '1',
            'video_muted' => '1',
            'video_loop' => '1',
            'video_controls' => '1',
            'enable_responsive_video' => '1',
            'width' => '',
            'height' => '',
        ), $atts ) );
        $output = $style_attr = '';
        $mp4_video = ( $mp4_video ) ? $mp4_video : '';
        $ogg_video = ( $ogg_video ) ? $ogg_video : '';
        $webm_video = ( $webm_video ) ? $webm_video : '';
        $autoplay = ( $video_autoplay == 1 ) ? ' autoplay' : '';
        $muted = ( $video_muted == 1 ) ? ' muted' : '';
        $loop = ( $video_loop == 1 ) ? ' loop' : '';
        $controls = ( $video_controls == 1 ) ? ' controls' : '';
        $video_class = ( $enable_responsive_video == 1 ) ? ' fit-videos' : ' without-fit-videos';

        switch ($pofo_video_type) {
            case 'vimeo':
                if($pofo_vimeo_id){
                    $width = $enable_responsive_video == 1 ? '640px' : $width; // Its default width from vimeo
                    $height = $enable_responsive_video == 1 ? '360px' : $height; // Its default height from vimeo

                    if( $enable_responsive_video != 1 ) {
                        $style_attr = ( $width ) ? 'width: ' . $width . '; ' : '';
                        $style_attr .= ( $height ) ? 'height: ' . $height . '; ' : '';
                        $style_attr = !empty( $style_attr ) ? ' style="' . $style_attr . '"' : '';
                    }

                    $width = ( $width ) ? ' width="'.$width.'"' : '';
                    $height = ( $height ) ? ' height="'.$height.'"' : '';
                    $output .= '<div class="pofo-vimeo '.$video_class.'">';
                      $output .='<iframe'.$width.$height.' src="'.$pofo_vimeo_id.'" allow="fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }
            break;

            case 'youtube':
                if($pofo_youtube_url){
                    $width = $enable_responsive_video == 1 ? '560px' : $width; // Its default width from youtube
                    $height = $enable_responsive_video == 1 ? '315px' : $height; // Its default height from youtube

                    if( $enable_responsive_video != 1 ) {
                        $style_attr = ( $width ) ? 'width: ' . $width . '; ' : '';
                        $style_attr .= ( $height ) ? 'height: ' . $height . '; ' : '';
                        $style_attr = !empty( $style_attr ) ? ' style="' . $style_attr . '"' : '';
                    }

                    $width = ( $width ) ? ' width="'.$width.'"' : '';
                    $height = ( $height ) ? ' height="'.$height.'"' : '';
                    $output .= '<div class="pofo-youtube '.$video_class.'">';
                      $output .='<iframe'.$width.$height.' src="'.$pofo_youtube_url.'" allow="fullscreen" allowFullScreen'.$style_attr.'></iframe>';
                    $output .= '</div>';
                }
            break;

            // case 'sound-cloud':
         //        if($pofo_track_id){
            //      $output .='<div class="pofo-sound-cloud sound"><iframe'.$width.' src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$pofo_track_id.'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe></div>';
         //        }
            // break;

            case 'html5':
                $output .= '<video'.$autoplay.$muted.$loop.$controls.' class="pofo-html5-video">';
                    if( $mp4_video ){
                        $output .= '<source type="video/mp4" src="'.$mp4_video.'">';
                    }if( $ogg_video ){
                        $output .= '<source type="video/ogg" src="'.$ogg_video.'">';
                    }if( $webm_video ){
                        $output .= '<source type="video/webm" src="'.$webm_video.'">';
                    }
                $output .= '</video>';
            break;
        }
        return $output;
    }
}
add_shortcode( 'pofo_video_sound', 'pofo_video_sound' );
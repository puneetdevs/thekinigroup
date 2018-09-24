<?php
/**
 * displaying video for blog
 *
 * @package Pofo
 */
?>
<?php
$pofo_video_type = pofo_post_meta('pofo_video_type');
$pofo_video = pofo_post_meta('pofo_video');
if($pofo_video_type == 'self'){
    $pofo_video_mp4 = pofo_post_meta('pofo_video_mp4');
    $pofo_video_ogg = pofo_post_meta('pofo_video_ogg');
    $pofo_video_webm = pofo_post_meta('pofo_video_webm');
    $pofo_mute = pofo_post_meta('pofo_enable_mute');
    $pofo_enable_mute = ($pofo_mute == 1) ? 'muted ' : '';
    if($pofo_video_mp4 || $pofo_video_ogg || $pofo_video_webm){
        echo '<div class="blog-image">';
            echo '<video autoplay '.esc_attr($pofo_enable_mute).'loop controls>';
                if(!empty($pofo_video_mp4)){
                    echo '<source src="'.esc_url($pofo_video_mp4).'" type="video/mp4">';
                }
                if(!empty($pofo_video_ogg)){
                    echo '<source src="'.esc_url($pofo_video_ogg).'" type="video/ogg">';
                }
                if(!empty($pofo_video_webm)){
                    echo '<source src="'.esc_url($pofo_video_webm).'" type="video/webm">';
                }
            echo '</video>';
        echo '</div>';
    }
}else{
    $pofo_video_url = pofo_post_meta('pofo_video');
    $fullscreen_class = '';
    if (strpos($pofo_video_url,'player.vimeo.com') == true) {
        $fullscreen_class = 'webkitAllowFullScreen mozallowfullscreen allowFullScreen';
    }else{
        $fullscreen_class = 'allowFullScreen="true"';
    }
    if($pofo_video_url){
        echo '<div class="blog-image fit-videos">';
            echo '<embed src="'.esc_url( $pofo_video_url ).'" width="640" height="360" '.$fullscreen_class.' />';
        echo '</div>';
    }
}
?>
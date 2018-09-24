<?php
/**
 * Map For Video Sound
 *
 * @package Pofo
 */
?>
<?php

/*---------------------------------------------------------------------------*/
/* Video Sound */
/*---------------------------------------------------------------------------*/

vc_map( array(
  'name' => __('Video', 'pofo-addons'), // & Sound
  'description' => esc_html__( 'Add vimeo/youtube', 'pofo-addons' ), //sound cloud
  'icon' => 'fas fa-video pofo-shortcode-icon',
  'base' => 'pofo_video_sound',
  'category' => 'Pofo',
  'params' => array(
    array(
      'type' => 'dropdown',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Type', 'pofo-addons'),
      'param_name' => 'pofo_video_type',
      'value' => array(esc_html__('Select type', 'pofo-addons') => '',
                       esc_html__('Vimeo', 'pofo-addons') => 'vimeo',
                       esc_html__('Youtube', 'pofo-addons') => 'youtube',
                      // esc_html__('Sound cloud', 'pofo-addons') => 'sound-cloud',
                       esc_html__('HTML5', 'pofo-addons') => 'html5',
                      ),
    ),
    array(
      'type' => 'pofo_preview_image',
      'heading' => esc_html__('Select pre-made style', 'pofo-addons'),
      'param_name' => 'pofo_video_preview_image',
      'value' => array(esc_html__('Select type', 'pofo-addons') => '',
                       esc_html__('Vimeo', 'pofo-addons') => 'vimeo',
                       esc_html__('Youtube', 'pofo-addons') => 'youtube',
                      // esc_html__('Sound cloud', 'pofo-addons') => 'sound-cloud',
                       esc_html__('HTML5', 'pofo-addons') => 'html5',
                      ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('Vimeo URL', 'pofo-addons'),
      'description' => sprintf( __( 'Enter Vimeo URL like https://player.vimeo.com/video/xxxxxxxx<br/><a target="_blank" href="%s">Click here</a> for more information on video ID / embed URL and setting parameters.', 'pofo-addons' ), 'http://wpdemos.themezaa.com/pofo/documentation/knowledgebase/miscellaneous/how-to-manage-youtube-and-vimeo-video-parameters/' ),
      'param_name' => 'pofo_vimeo_id',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('vimeo') ),
    ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('YouTube embed URL', 'pofo-addons'),
      'description' => sprintf( __( 'Enter YouTube URL like https://www.youtube.com/embed/xxxxxxxx<br/><a target="_blank" href="%s">Click here</a> for more information on video ID / embed URL and setting parameters.', 'pofo-addons' ), 'http://wpdemos.themezaa.com/pofo/documentation/knowledgebase/miscellaneous/how-to-manage-youtube-and-vimeo-video-parameters/' ),
      'param_name' => 'pofo_youtube_url',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('youtube') ),
    ),
    // array(
    //   'type' => 'textfield',
    //   'heading' => esc_html__('Track ID', 'pofo-addons'),
    //   'description' => esc_html__( 'Add TRACK ID like XXXXXXXX, you will get it from embed code like api.soundcloud.com/tracks/XXXXXXXX','pofo-addons'),                  
    //   'param_name' => 'pofo_track_id',
    //   'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('sound-cloud') ),
    // ),
    array(
      'type' => 'textfield',
      'heading' => esc_html__('MP4 video URL', 'pofo-addons'),
      'param_name' => 'mp4_video',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'textfield',
      'heading' => esc_html__('OGG video URL', 'pofo-addons'),
      'param_name' => 'ogg_video',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'textfield',
      'heading' => esc_html__('WEBM video URL', 'pofo-addons'),
      'param_name' => 'webm_video',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Auto play', 'pofo-addons'),
      'param_name' => 'video_autoplay',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'std' => '1',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Mute', 'pofo-addons'),
      'param_name' => 'video_muted',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'std' => '1',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ),
    array(
      'type' => 'pofo_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Loop', 'pofo-addons'),
      'param_name' => 'video_loop',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'std' => '1',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'pofo_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Controls', 'pofo-addons'),
      'param_name' => 'video_controls',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'std' => '1',
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('html5') ),
    ), 
    array(
      'type' => 'pofo_custom_switch_option',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__('Responsive Video', 'pofo-addons'),
      'param_name' => 'enable_responsive_video',
      'value' => array(esc_html__('Off', 'pofo-addons') => '0', 
                       esc_html__('On', 'pofo-addons') => '1'
                      ),
      'std' => '1',
      'description' => esc_html__( 'Please enter width and height in the same proportion of video size in YouTube or Vimeo to have better result in case if you want fixed size video instead of auto responsive behaviour.', 'pofo-addons' ),
      'dependency'  => array( 'element' => 'pofo_video_type', 'value' => array('vimeo','youtube') ),
      'group'       => esc_html__('Style', 'pofo-addons')
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__('Width', 'pofo-addons' ),            
      'param_name'  => 'width',
      'description' => esc_html__( 'In pixel like 400px', 'pofo-addons' ),
      'dependency'  => array( 'element' => 'enable_responsive_video', 'value' => array('0') ),
      'group'       => esc_html__('Style', 'pofo-addons')
    ),
    array(
      'type'        => 'textfield',
      'heading'     => esc_html__('Height', 'pofo-addons' ),
      'param_name'  => 'height',
      'description' => esc_html__( 'In pixel like 400px', 'pofo-addons' ),
      'dependency'  => array( 'element' => 'enable_responsive_video', 'value' => array('0') ),
      'group'       => esc_html__('Style', 'pofo-addons')
    ),
    $pofo_vc_extra_id,
    $pofo_vc_extra_class,
  )
) );
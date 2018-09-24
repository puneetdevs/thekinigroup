<?php
/**
 * Map For Instagram
 *
 * @package Pofo
 */
?>
<?php

/*---------------------------------------------------------------------------*/
/* Instagram */
/*---------------------------------------------------------------------------*/

$current_date = date('Y-m-d H:i:s'); ## Get current date
$timestamp = strtotime($current_date); ## Get timestamp of current date
$acc_id = $timestamp;

vc_map( array(
  'name' => esc_html__('Instagram Feed', 'pofo-addons'),
  'description' => esc_html__( 'Add instagram feeds', 'pofo-addons' ),
  'icon' => 'fab fa-instagram pofo-shortcode-icon',
  'base' => 'pofo_instagram',
  'category' => 'Pofo',
  'params' => array(
    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Style', 'pofo-addons'),
      'param_name' => 'pofo_instagram_style',
      'value' => array(esc_html__('Select style', 'pofo-addons') => '',
                       esc_html__('style 1', 'pofo-addons') => 'instagram-style1',
                       esc_html__('style 2', 'pofo-addons') => 'instagram-style2',
                      ),
    ),
    array(
      'type' => 'pofo_preview_image',
      'heading' => esc_html__( 'Select pre-made style', 'pofo-addons'),
      'param_name' => 'pofo_instagram_preview_image',
      'admin_label' => true,
      'value' => array(esc_html__('Select style', 'pofo-addons') => '',
                     esc_html__('style 1', 'pofo-addons') => 'instagram-style1',
                     esc_html__('style 2', 'pofo-addons') => 'instagram-style2',
                    ),
    ),
    array(
      'type' => 'hidden',
      'heading' => esc_html__('Timestamp', 'pofo-addons'),
      'param_name' => 'pofo_time_stamp',
      'value'     => $acc_id,
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
    ),

    array(
      'type' => 'textfield',
      'heading' => esc_html__('Access token', 'pofo-addons'),
      'param_name' => 'pofo_instagram_access_token',
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
      'description' => sprintf( __( '<a target="_balnk" href="%s">Click here</a> for more information on getting Instagram access token or ID.', 'pofo-addons' ), 'https://elfsight.com/blog/2016/05/how-to-get-instagram-access-token/' ),
    ),

    array(
      'type' => 'textfield',
      'heading' => esc_html__('Instagram ID', 'pofo-addons'),      
      'param_name' => 'pofo_instagram_id',
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
      'description' => sprintf( __( '<a target="_balnk" href="%s">Click here</a> for more information on getting Instagram access token or ID.', 'pofo-addons' ), 'https://elfsight.com/blog/2016/05/how-to-get-instagram-access-token/' ),
    ),

    array(
      'type' => 'dropdown',
      'heading' => esc_html__('No. of columns', 'pofo-addons'),      
      'param_name' => 'pofo_instagram_column',
      'value' => array(esc_html__('Select column', 'pofo-addons') => '',
                       esc_html__('Column 1', 'pofo-addons') => 'column-1',
                       esc_html__('Column 2', 'pofo-addons') => 'column-2',
                       esc_html__('Column 3', 'pofo-addons') => 'column-3',
                       esc_html__('Column 4', 'pofo-addons') => 'column-4',
                       esc_html__('Column 6', 'pofo-addons') => 'column-6',
                      ),
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
    ),

    array(
      'type' => 'dropdown',
      'holder' => 'div',
      'class' => '',
      'heading' => esc_html__( 'Spacing between columns', 'pofo-addons'),
      'param_name' => 'pofo_instagram_type',
      'value' => array(esc_html__( 'Select spacing between columns', 'pofo-addons') => '',
                       esc_html__( 'Gutter very small', 'pofo-addons') => 'gutter-very-small',
                       esc_html__( 'Gutter small', 'pofo-addons') => 'gutter-small',
                       esc_html__( 'Gutter medium', 'pofo-addons') => 'gutter-medium',
                       esc_html__( 'Gutter large', 'pofo-addons') => 'gutter-large',
                       esc_html__( 'Gutter extra large', 'pofo-addons') => 'gutter-extra-large',
      ),
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
    ),

    array(
      'type' => 'dropdown',
      'heading' => esc_html__('Sort feed data by', 'pofo-addons'),      
      'param_name' => 'pofo_instagram_sortby',
      'value' => array(esc_html__('None', 'pofo-addons') => 'none',
                       esc_html__('Most recent', 'pofo-addons') => 'most-recent',
                       esc_html__('Least recent', 'pofo-addons') => 'least-recent',
                       esc_html__('Most liked', 'pofo-addons') => 'most-liked',
                       esc_html__('Least liked', 'pofo-addons') => 'least-liked',
                       esc_html__('Most commented', 'pofo-addons') => 'most-commented',
                       esc_html__('Least commented', 'pofo-addons') => 'least-commented',
                       esc_html__('Random', 'pofo-addons') => 'random',

                      ),
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
    ),

    array(
      'type' => 'textfield',
      'heading' => esc_html__('No. of items to display', 'pofo-addons'),      
      'param_name' => 'pofo_instagram_feed',
      'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
    ),

    array(
        'type' => 'pofo_custom_switch_option',
        'heading' => esc_html__( 'Likes', 'pofo-addons'),
        'param_name' => 'pofo_enable_likes',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
      ),
    array(
        'type' => 'pofo_custom_switch_option',
        'heading' => esc_html__( 'Comments', 'pofo-addons'),
        'param_name' => 'pofo_enable_comments',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
      ),
    array(
          'type' => 'animation_style',
          'heading' => esc_html__( 'CSS animation', 'pofo-addons' ),
          'param_name' => 'pofo_animation_style',
          'value' => '',
          'settings' => array(
            'type' => array(
              'in',
              'other',
            ),
          ),
          'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
          'description' => __( 'Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'pofo-addons' ),
        ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Hover background color', 'pofo-addons'),
        'param_name' => 'pofo_change_background_overlay_color',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
        'group'       =>  'Style',
      ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Icon color', 'pofo-addons'),
        'param_name' => 'pofo_icon_color',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
        'group'       =>  'Style',
      ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Counter text color', 'pofo-addons'),
        'param_name' => 'pofo_counter_color',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1' , 'instagram-style2') ),
        'group'       =>  'Style',
      ),
    array(
        'type' => 'colorpicker',
        'heading' => esc_html__( 'Counter background color', 'pofo-addons'),
        'param_name' => 'pofo_counter_background_color',
        'value' => array(esc_html__( 'Off', 'pofo-addons') => '0', 
                         esc_html__( 'On', 'pofo-addons') => '1'
                        ),
        'dependency'  => array( 'element' => 'pofo_instagram_style', 'value' => array('instagram-style1') ),
        'group'       =>  'Style',
      ),
    $pofo_vc_extra_id,
    $pofo_vc_extra_class,
  )
) );
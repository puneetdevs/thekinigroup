<?php
// For Responsive CSS Box.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-responsive-css-box.php' );
// For Slider Preview Image.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-preview-image.php' );
// For Switch Option.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-switch-option.php' );
// For Icons List.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-icons-shortcode.php' );
// For Post Featurebox.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-posts-list.php' );
// For Multi-select Option In Post Category.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-multiple-select-option.php' );
// For Multi-select Option In Portfolio Category.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-multiple-portfolio-categories.php' );
// For Font Style.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-font-style.php' );
// For Custom Width.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-width.php' );
// For Custom Background Image Position.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-background-image.php' );
// For Custom title
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-custom-title.php' );
// For Social Media Sorting.
require_once( POFO_SHORTCODE_ADDONS_EXTEND_COMPOSER . '/pofo-social-media-sorting.php' );

/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column Start */
/*-----------------------------------------------------------------------------------*/

$pofo_vc_extra_id = array(
  'type'        => 'textfield',
  'heading'     => esc_html__( 'Element ID', 'pofo-addons'),
  'description' => sprintf( esc_html__( 'Enter element ID (Note: make sure it is unique and valid according to %s).', 'pofo-addons'), '<a target="_blank" href="https://www.w3schools.com/tags/att_global_id.asp">w3c specification</a>'),
  'param_name'  => 'id',
  'group'       => 'Extras'
);

$pofo_vc_extra_class = array(
  'type'        => 'textfield',
  'heading'     => esc_html__( 'Extra class name', 'pofo-addons'),
  'description' => esc_html__( 'Add additional CSS class to this element, you can define multiple CSS class with use of space like "Class1 Class2". You can write css code using this class and add it in customizer or your child theme css file.', 'pofo-addons'),
  'param_name'  => 'class',
  'group'       => 'Extras'
);

$pofo_vc_column =array(
  esc_html__( 'inherit from smaller', 'pofo-addons') => '',
  esc_html__( '1 column - 1/12', 'pofo-addons')      => '1/12',
  esc_html__( '2 columns - 1/6', 'pofo-addons')      => '1/6',
  esc_html__( '3 columns - 1/4', 'pofo-addons')      => '1/4',
  esc_html__( '4 columns - 1/3', 'pofo-addons')      => '1/3',
  esc_html__( '5 columns - 5/12', 'pofo-addons')     => '5/12',
  esc_html__( '6 columns - 1/2', 'pofo-addons')      => '1/2',
  esc_html__( '7 columns - 7/12', 'pofo-addons')     => '7/12',
  esc_html__( '8 columns - 2/3', 'pofo-addons')      => '2/3',
  esc_html__( '9 columns - 3/4', 'pofo-addons')      => '3/4',
  esc_html__( '10 columns - 5/6', 'pofo-addons')     => '5/6',
  esc_html__( '11 columns - 11/12', 'pofo-addons')   => '11/12',
  esc_html__( '12 columns - 1/1', 'pofo-addons')     => '1/1'
);

$cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
  foreach ( $cf7 as $cform ) {
    $contact_forms[ $cform->post_title ] = $cform->ID;
  }
} else {
  $contact_forms[ esc_html__( 'No contact forms found', 'pofo-addons' ) ] = 0;
}
/*-----------------------------------------------------------------------------------*/
/* Map Element Id And Class And Column End */
/*-----------------------------------------------------------------------------------*/

if (class_exists('Vc_Manager')) {

  /*-----------------------------------------------------------------------------------*/
  /* Vc_row change Start */
  /*-----------------------------------------------------------------------------------*/

  $cf7 = get_posts( 'post_type=wpcf7_contact_form&numberposts=-1' );

  $contact_forms = array();
  if ( $cf7 ) {
    foreach ( $cf7 as $cform ) {
      $contact_forms[ $cform->post_title ] = $cform->ID;
    }
  } else {
    $contact_forms[ esc_html__( 'No contact forms found', 'pofo-addons' ) ] = 0;
  }

  // Include all shortcode map files
  $fileName = array( 'row', 'inner-row', 'column', 'inner-column', 'text-block', 'counter', 'feature-box', 'testimonial', 'testimonial-slider', 'team-member', 'team-member-slider', 'progressbar', 'blog', 'post-slider', 'accordian', 'separator', 'portfolio-filter', 'portfolio', 'portfolio-slider', 'text-slider', 'section-heading', 'client-image-slider', 'image-slider', 'button', 'timer', 'alert-message', 'lists', 'pricing-table', 'content-block', 'popup', 'social', 'video-sound', 'image-gallery', 'tab', 'instagram', 'blockquote' );

  foreach($fileName as $name)
  {
      require_once( POFO_SHORTCODE_ADDONS_MAP_URI.'/pofo-shortcode-'.$name.'-map.php' );
  }
}
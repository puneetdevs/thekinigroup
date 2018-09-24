<?php
/**
 * displaying featured image for related posts
 *
 * @package Pofo
 */
?>
<?php
$pofo_related_post_srcset = pofo_option( 'pofo_related_post_feature_image_size', 'full' );
/* Image Alt, Title, Caption */
$pofo_img_alt = pofo_option_image_alt(get_post_thumbnail_id());
$pofo_img_title = pofo_option_image_title(get_post_thumbnail_id());
$pofo_image_alt = ( isset($pofo_img_alt['alt']) && !empty($pofo_img_alt['alt']) ) ? $pofo_img_alt['alt'] : '' ; 
$pofo_image_title = ( isset($pofo_img_title['title']) && !empty($pofo_img_title['title']) ) ? $pofo_img_title['title'] : '';

$pofo_img_attr = array(
    'title' => $pofo_image_title,
    'alt' => $pofo_image_alt,
);
if ( has_post_thumbnail() ) {
	$page_url = get_permalink();
	echo '<a href="'.esc_url( $page_url ).'">';
	        echo get_the_post_thumbnail( get_the_ID(), $pofo_related_post_srcset,$pofo_img_attr );
	echo '</a>';
}
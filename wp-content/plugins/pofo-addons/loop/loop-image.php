<?php
/**
 * displaying featured image for blog
 *
 * @package Pofo
 */
?>
<?php
global $pofo_srcset;
/* Image Alt, Title, Caption */
$pofo_img_alt = pofo_option_image_alt(get_post_thumbnail_id());
$pofo_img_title = pofo_option_image_title(get_post_thumbnail_id());
$pofo_image_alt = ( isset($pofo_img_alt['alt']) && !empty($pofo_img_alt['alt']) ) ? $pofo_img_alt['alt'] : '' ; 
$pofo_image_title = ( isset($pofo_img_title['title']) && !empty($pofo_img_title['title']) ) ? $pofo_img_title['title'] : '';

$pofo_img_attr = array(
    'title' => $pofo_image_title,
    'alt' => $pofo_image_alt,
);
echo '<div class="blog-image"><a href="'.get_permalink().'">';
    if ( has_post_thumbnail() ) {
        echo get_the_post_thumbnail( get_the_ID(), $pofo_srcset,$pofo_img_attr );
    }
echo '</a></div>';

?>
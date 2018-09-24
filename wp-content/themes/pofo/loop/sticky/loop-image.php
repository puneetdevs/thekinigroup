<?php
/**
 * displaying featured image for sticky post
 *
 * @package Pofo
 */
?>
<?php
$pofo_srcset_sticky = get_theme_mod( 'pofo_image_srcset_sticky', 'full' );
$page_url = get_permalink();
echo '<div class="blog-image"><a href="'.esc_url( $page_url ).'">';
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( $pofo_srcset_sticky );
    }
echo '</a></div>';
<?php
/**
 * displaying audio for blog
 *
 * @package Pofo
 */
?>
<?php
$pofo_blog_audio = pofo_post_meta('pofo_audio');
if( $pofo_blog_audio ) {
    echo '<div class="blog-image fit-videos">';
        if ( $pofo_blog_audio  ) {
            echo wp_oembed_get( $pofo_blog_audio );               
        } else {
            printf( $pofo_blog_audio );
        }
    echo '</div>';
}
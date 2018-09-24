<?php
/**
 * displaying audio for single post
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

$pofo_blog_image = pofo_option("pofo_featured_image", '1');

if($pofo_blog_image == 1)
{
	echo '<div class="blog-image bg-transparent margin-40px-top xs-margin-25px-top">';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full' );
        }
	echo '</div>';
}
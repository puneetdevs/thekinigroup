<?php
/**
 * displaying quote for single post
 *
 * @package Pofo
 */
?>
<?php
$pofo_blog_quote = pofo_post_meta('pofo_quote');
echo '<div class="blog-image">';
    if($pofo_blog_quote){
        echo '<blockquote class="bg-extra-dark-gray">';
            echo '<h6 class="text-white font-weight-300 line-height-35 alt-font margin-15px-bottom">'.$pofo_blog_quote.'</h6>';
        echo '</blockquote>';
    }
echo '</div>';	

$pofo_blog_image = pofo_option("pofo_featured_image", '1');
if($pofo_blog_image == 1)
{
	echo '<div class="blog-image bg-transparent margin-40px-top xs-margin-25px-top">';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full' );
        }
	echo '</div>';
}
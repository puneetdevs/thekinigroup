<?php
/**
 * displaying featured image for single post
 *
 * @package Pofo
 */
?>
<?php

$pofo_blog_image = pofo_option("pofo_featured_image", '1');
if($pofo_blog_image == 1){
	$pofo_post_layout_style = pofo_option( 'pofo_post_layout_style', 'post-layout-style-1' );
	    if ( has_post_thumbnail() ) {
	    	if( $pofo_post_layout_style == 'post-layout-style-3' ){
				 echo '<div class="col-md-10 col-sm-12 col-xs-12 center-col">';
			}else{
				echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom">';
			}
				echo '<div class="blog-image">';
	        		the_post_thumbnail( 'full' );
	        	echo '</div>';
			echo '</div>';
	    }
}
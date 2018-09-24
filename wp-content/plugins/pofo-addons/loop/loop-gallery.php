<?php
/**
 * displaying in gallery for blog
 *
 * @package Pofo
 */
?>
<?php
global $pofo_srcset;	
$pofo_blog_lightbox_gallery = pofo_post_meta('pofo_lightbox_image');
$pofo_blog_gallery = pofo_post_meta('pofo_gallery');
$pofo_gallery = explode(",",$pofo_blog_gallery);
$pofo_popup_id = 'blog-'.get_the_ID();
if($pofo_blog_lightbox_gallery == 1){
	echo '<ul class="blog-gallery-grid blog-image lightbox-gallery clearfix margin-ten no-margin-lr no-margin-top hover-option4">';
	if(is_array($pofo_gallery)){
		foreach ($pofo_gallery as $key => $value) {
			/* Image Alt, Title, Caption */
			$pofo_img_alt = pofo_option_image_alt($value);
			$pofo_img_title = pofo_option_image_title($value);
			$pofo_img_lightbox_caption = pofo_option_lightbox_image_caption($value);
			$pofo_img_lightbox_title = pofo_option_lightbox_image_title($value);
			$pofo_image_alt = ( isset($pofo_img_alt['alt']) && !empty($pofo_img_alt['alt']) ) ? 'alt="'.esc_attr($pofo_img_alt['alt']).'"' : 'alt=""' ; 
			$pofo_image_title = ( isset($pofo_img_title['title']) && !empty($pofo_img_title['title']) ) ? ' title="'.esc_attr($pofo_img_title['title']).'"' : '';
			$pofo_image_lightbox_caption = ( isset($pofo_img_lightbox_caption['caption']) && !empty($pofo_img_lightbox_caption['caption']) ) ? ' data-lightbox-caption="'.esc_attr($pofo_img_lightbox_caption['caption']).'"' : '' ;
			$pofo_image_lightbox_title = ( isset($pofo_img_lightbox_title['title']) && !empty($pofo_img_lightbox_title['title']) ) ? ' title="'.esc_attr($pofo_img_lightbox_title['title']).'"' : '' ; 
			$pofo_thumb = wp_get_attachment_image_src( $value, $pofo_srcset );
            $pofo_full_url= wp_get_attachment_image_url( $value, 'full' ); // Lightbox image
			if($pofo_thumb[0]){
				$srcset = $srcset_data = '';
				$srcset = wp_get_attachment_image_srcset( $value, $pofo_srcset );
				if( $srcset ){
				    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
				}
				$sizes = !empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_srcset ) : '';
                if( $sizes ){
                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
                }
                echo '<li class="col-md-4 col-sm-6 col-xs-12 no-padding">';
                	echo '<a class="lightboxgalleryitem" data-group="'.esc_attr($pofo_popup_id).'" '.$pofo_image_lightbox_title.$pofo_image_lightbox_caption.' href="'.$pofo_full_url.'">';
	                	echo '<figure>';
		                    echo '<div class="portfolio-img bg-extra-dark-gray">';
		                    	echo '<img src="'.esc_url($pofo_thumb[0]).'" class="project-img-gallery" width="'.$pofo_thumb[1].'" height="'.$pofo_thumb[2].'" '.$pofo_image_alt.$pofo_image_title.$srcset_data.$sizes_data.'/>';
		                    echo '</div>';
		                    echo '<figcaption>';
		                        echo '<div class="portfolio-hover-main text-center">';
		                            echo '<div class="portfolio-hover-box vertical-align-middle">';
		                                echo '<div class="portfolio-hover-content position-relative">';
		                                    echo '<i class="ti-zoom-in text-white fa-2x"></i>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</figcaption>';
		                echo '</figure>';
		            echo '</a>';
                echo '</li>';

            }
		}
	}
    echo '</ul>';
}else{
	echo '<div class="blog-image">';
        echo '<div class="swiper-full-screen swiper-container white-move">';
        	echo '<div class="swiper-wrapper">';
				if(is_array($pofo_gallery)){
					foreach ($pofo_gallery as $key => $value) {
						$pofo_thumb = wp_get_attachment_image_src( $value, $pofo_srcset );
						/* Image Alt, Title, Caption */
						$pofo_img_alt = pofo_option_image_alt($value);
						$pofo_img_title = pofo_option_image_title($value);

						$pofo_image_alt = ( isset($pofo_img_alt['alt']) && !empty($pofo_img_alt['alt']) ) ? 'alt="'.esc_attr($pofo_img_alt['alt']).'"' : 'alt=""' ; 
						$pofo_image_title = ( isset($img_title['title']) && !empty($pofo_img_title['title']) ) ? ' title="'.esc_attr($pofo_img_title['title']).'"' : '';
						if($pofo_thumb[0]){
							$srcset = $srcset_data = '';
							$srcset = wp_get_attachment_image_srcset( $value, $pofo_srcset );
							if( $srcset ){
							    $srcset_data = ' srcset="'.esc_attr( $srcset ).'"';
							}
							$sizes = !empty( $value ) ? wp_get_attachment_image_sizes( $value, $pofo_srcset ) : '';
			                if( $sizes ){
			                    $sizes_data = ' sizes="'.esc_attr( $sizes ).'"';
			                }
				            echo '<div class="swiper-slide"><img src="'.esc_url($pofo_thumb[0]).'" width="'.$pofo_thumb[1].'" height="'.$pofo_thumb[2].'" '.$pofo_image_alt.$pofo_image_title.$srcset_data.$sizes_data.' /></div>';
						}
					}
				}
			echo '</div>';
			echo '<div class="swiper-pagination swiper-pagination-square swiper-pagination-white"></div>';
		    echo '<div class="swiper-button-next swiper-button-black-highlight"></div>';
		    echo '<div class="swiper-button-prev swiper-button-black-highlight"></div>';
		echo '</div>';
    echo '</div>';    
}
?>
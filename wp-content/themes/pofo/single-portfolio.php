<?php
/**
 * The template for displaying all single portfolio
 *
 * @package Pofo
 */

get_header(); ?>
<?php
// Start of the loop.
while ( have_posts() ) : the_post();
    
    // Single portfolio title
    get_template_part( 'templates/page-title/single-portfolio-title' );
    
    $pofo_single_portfolio_content_container_fluid = '';
    $pofo_single_portfolio_container_fluid = pofo_option( 'pofo_single_portfolio_container_style', 'container' );

    if( isset( $pofo_single_portfolio_container_fluid ) && $pofo_single_portfolio_container_fluid == 'yes' ){
        $pofo_single_portfolio_content_container_fluid .= 'container-fluid';
    } else {
        $pofo_single_portfolio_content_container_fluid .= 'container';
    }

    /* Feature Image */
    $pofo_portfolio_featured_image_single = pofo_option( 'pofo_portfolio_featured_image', '0' );

    /* Portfolio Share */
    $pofo_hide_single_portfolio_share = pofo_option( 'pofo_hide_single_portfolio_share', '1' );

    /* Portfolio Share Heading */
    $pofo_single_portfolio_share_title = pofo_option( 'pofo_single_portfolio_share_title', 'Share Our Work' );

    /* Check if page comment is show / hide */
    $pofo_hide_single_portfolio_comment = pofo_option( 'pofo_hide_single_portfolio_comment', '0' );

    /* Related Portfolio */
    $pofo_hide_related_single_portfolio = pofo_option( 'pofo_hide_related_single_portfolio', '1');

    /* Portfolio Navigation */
    $pofo_hide_navigation_single_portfolio = pofo_option( 'pofo_hide_navigation_single_portfolio', '1' );

    /* Get page class and id */
    $pofo_page_classes = '';
    ob_start();
        post_class();
        $pofo_page_classes .= ob_get_contents();
    ob_end_clean();
    echo '<div id="post-'.get_the_ID().'" '.$pofo_page_classes.'>';
        echo '<div class="'.esc_attr( $pofo_single_portfolio_container_fluid ).'">';
            echo '<div class="row">';

            	/* Get page left part template */
                get_template_part( 'templates/single-portfolio','left' );

                // Include Post Format Data
                if ( !post_password_required() && has_post_thumbnail() && $pofo_portfolio_featured_image_single == 1 ) {

                    /* Image Alt, Title, Caption */
                    $thumbnail_id = get_post_thumbnail_id();
                    $pofo_img_alt = !empty( $thumbnail_id ) ? pofo_option_image_alt( $thumbnail_id ) : array();
                    $pofo_img_title = !empty( $thumbnail_id ) ? pofo_option_image_title( $thumbnail_id ) : array();
                    $pofo_image_alt = ( isset($pofo_img_alt['alt']) && !empty($pofo_img_alt['alt']) ) ? $pofo_img_alt['alt'] : '' ; 
                    $pofo_image_title = ( isset($pofo_img_title['title']) && !empty($pofo_img_title['title']) ) ? $pofo_img_title['title'] : '';

                    $pofo_img_attr = array(
                        'title' => $pofo_image_title,
                        'alt' => $pofo_image_alt,
                    );
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom text-center">';
                        echo '<div class="blog-image">';
                            echo get_the_post_thumbnail( get_the_ID(), 'full', $pofo_img_attr );
                        echo '</div>';
                    echo '</div>';
                }

                echo '<div class="pofo-rich-snippet display-none">';
                    echo '<span class="entry-title">'.get_the_title().'</span>';
                    
                    echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                    echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                echo '</div>';

                // Show Portfolio Content
                echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr portfolio-details-text entry-content">';

                    the_content();

                echo '</div>';

                /* Get page right part template */
                get_template_part( 'templates/single-portfolio','right' );

            echo '</div>';
        echo '</div>';
	echo '</div>';

    // If Is Set Get Social Share
    if( $pofo_hide_single_portfolio_share == 1 && function_exists( 'pofo_single_portfolio_share_shortcode' ) ){

        echo '<section data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid wow fadeIn pofo-portfolio-sharebox">';
            echo '<div class="wpb_column vc_column_container vc_col-sm-12 col-xs-mobile-fullwidth wow zoomIn text-center">';
                echo '<div class="vc_column-inner ">';
                    echo '<div class="wpb_wrapper">';
                        if( !empty( $pofo_single_portfolio_share_title ) ) {
                            echo '<span class="pofo-portfolio-sharebox-title text-medium font-weight-600 text-uppercase display-block alt-font text-extra-dark-gray margin-30px-bottom">'.esc_attr( $pofo_single_portfolio_share_title ).'</span>';
                        }
                        echo do_shortcode("[pofo_single_portfolio_share]");
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
        echo '<div class="vc_row-full-width vc_clearfix"></div>';
    }

    // If Is Set Get Related Portfolio
    if( $pofo_hide_related_single_portfolio == 1 ) :
        pofo_related_portfolio( get_the_ID() );
    endif;

    if( $pofo_hide_single_portfolio_comment == 1 ) {
        if ( comments_open() || get_comments_number() ) {
            echo '<section class="wow fadeIn no-padding-top">';
                 echo '<div class="container">';
                     echo '<div class="row">';
                         echo '<div class="pofo-single-post-meta-style">';
                            // If comments are open or we have at least one comment, load up the comment template.
                            comments_template();
                         echo '</div>';
                     echo '</div>';
                 echo '</div>';
             echo '</section>';
        }
    }

    // If Is Set Get Post Portfolio Navigation.
    if( $pofo_hide_navigation_single_portfolio == 1 ) :
        pofo_single_portfolio_navigation();
    endif;

endwhile; 
// End of the loop.

get_footer();
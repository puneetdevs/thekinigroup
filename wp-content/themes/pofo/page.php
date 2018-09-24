<?php
/**
 * The template for displaying all pages
 *
 */

get_header(); 

// Start of the loop.
while ( have_posts() ) : the_post();

    /* Check if page comment is show / hide */
    $pofo_hide_page_comment = pofo_option( 'pofo_hide_page_comment', '1' );

    /* Get page class and id */
    $pofo_page_classes = $class_main_section = '';

    $pofo_page_container_style = pofo_option( 'pofo_page_container_style', 'container' );

    ob_start();
        post_class();
        $pofo_page_classes .= ob_get_contents();
    ob_end_clean();
    echo '<div id="post-'.get_the_ID().'" '.$pofo_page_classes.'>';
        echo '<div class="'.$pofo_page_container_style.'">';
            echo '<div class="row">';
            	/* Get page left part template */
                get_template_part( 'templates/single-page','left' );

                echo '<div class="pofo-rich-snippet display-none">';
                    echo '<span class="entry-title">'.get_the_title().'</span>';
                    
                    echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
                    echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
                echo '</div>';

                /* Get page content area */
                echo '<div class="entry-content">';
                    the_content();
                echo '</div>';

                /* Displays page-links for paginated pages. */
                wp_link_pages( 
                    array(
                        'before'      => '<div class="page-links"><div class="inner-page-links"><span class="pagination-title">' . esc_html__( 'Pages:', 'pofo' ).'</span>',
                        'after'       => '</div></div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    )
                );

                // If comments are open or we have at least one comment, load up the comment template.
                if( $pofo_hide_page_comment == 1 ) {
                    if ( comments_open() || get_comments_number() ) {
                        echo '<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 no-padding-lr">';
                           comments_template();
                        echo '</div>';
                    }
                }

                /* Get page right part template */
                get_template_part( 'templates/single-page','right' );
            echo '</div>';
        echo '</div>';
	echo '</div>';
endwhile; 
// End of the loop.

get_footer();
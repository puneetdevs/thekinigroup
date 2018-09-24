<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Pofo
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
    
    // Single Post Title
    get_template_part( 'templates/page-title/single-post-title' );

    $pofo_post_layout_style = pofo_option( 'pofo_post_layout_style', 'post-layout-style-1' );

    /* Get post class and id */
    $pofo_post_classes = '';
    ob_start();
        post_class();
        $pofo_post_classes .= ob_get_contents();
    ob_end_clean();

    echo '<div id="post-'.get_the_ID().'" '.$pofo_post_classes.'>';
        echo '<div class="pofo-rich-snippet display-none">';
            echo '<span class="entry-title">'.get_the_title().'</span>';
            
            echo '<span class="author vcard"><a class="url fn n" href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a></span>';
            echo '<span class="published">'.get_the_date().'</span><time class="updated" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date().'</time>';
        echo '</div>';
        
        switch ( $pofo_post_layout_style ) {
            case 'post-layout-style-2':
                get_template_part('templates/single/post-layout-2');
                break;

            case 'post-layout-style-3':
                get_template_part('templates/single/post-layout-3');
                break;   
            
            default:
                get_template_part('templates/single/post-layout-1');
                break;
        }

    echo '</div>';

// End of the loop.
endwhile;

get_footer();
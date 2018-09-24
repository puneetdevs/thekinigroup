<?php

	$pofo_single_post_content_container_fluid = '';
    $pofo_single_post_content_container_fluid = pofo_option( 'pofo_single_post_container_style', 'container' );

    $pofo_post_layout_style = pofo_option( 'pofo_post_layout_style', 'post-layout-style-1' );
    $pofo_hide_tags = pofo_option( 'pofo_hide_tags', '1' );
    $pofo_hide_like = pofo_option( 'pofo_hide_like', '1' );
    $pofo_hide_share = pofo_option( 'pofo_hide_share', '1' );
    $pofo_hide_post_author_box = pofo_option( 'pofo_hide_post_author_box', '1' );
    $pofo_hide_related_posts = pofo_option( 'pofo_hide_related_posts', '1' );
    $pofo_related_posts_title = pofo_option( 'pofo_related_posts_title', 'Related Posts' );
    $pofo_no_of_related_posts = pofo_option( 'pofo_no_of_related_posts', '3' );
    $pofo_related_posts_date_format = pofo_option( 'pofo_related_posts_date_format', '' );
    $pofo_hide_comment = pofo_option( 'pofo_hide_comment', '1' );
    $post_format = get_post_format( get_the_ID() );

    /* For page sidebar and content */
    echo '<section class="single-post-main-section">';
        echo '<div class="'.esc_attr( $pofo_single_post_content_container_fluid ).'">';
            echo '<div class="row">';

                /* Get post left sidebar */
                get_template_part( 'templates/single-post', 'left' );
                
                    // Include Post Format Data
                    if ( !post_password_required() ) {
                        if( $post_format == 'image' ) {
                            echo get_template_part( 'loop/single/loop', 'image' );
                        }elseif( $post_format == 'gallery' ) {
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom">';
                                echo get_template_part( 'loop/single/loop', 'gallery' );
                            echo '</div>';
                        }elseif( $post_format == 'video' ) {
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom">';
                                echo get_template_part( 'loop/single/loop', 'video' );
                            echo '</div>';
                        }elseif( $post_format == 'quote' ) {
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom">';
                                echo get_template_part( 'loop/single/loop', 'quote' );
                            echo '</div>';
                        }elseif( $post_format == 'audio' ) {
                            echo '<div class="col-md-12 col-sm-12 col-xs-12 width-100 margin-45px-bottom xs-margin-25px-bottom">';
                                echo get_template_part( 'loop/single/loop', 'audio' );
                            echo '</div>';
                        }else{
                            echo get_template_part( 'loop/single/loop' );
                        }
                    }

                    // Show Post Content
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 blog-details-text entry-content">';
                            the_content();
                    echo '</div>';

                    /* Displays page-links for paginated posts. */
                    wp_link_pages( 
                        array(
                            'before'      => '<div class="page-links"><div class="inner-page-links"><span class="pagination-title">' . esc_html__( 'Posts:', 'pofo' ).'</span>',
                            'after'       => '</div></div>',
                            'link_before' => '<span class="page-number">',
                            'link_after'  => '</span>',
                        )
                    );

                /* Get post right sidebar */
                get_template_part( 'templates/single-post', 'right' );
                
            echo '</div>';
        echo '</div>';
    echo '</section>';

    /* Check post tags, comment link and like */
    if( $pofo_hide_tags == 1 || $pofo_hide_like == 1 || $pofo_hide_share == 1 || $pofo_hide_post_author_box == 1 ) {
        echo '<section class="wow fadeIn no-padding-top">';
            echo '<div class="container">';
                echo '<div class="row">';
                            
                    echo '<div class="pofo-single-post-meta-style">';
                        if( $pofo_hide_tags == 1 ) {
                            pofo_single_post_meta_tag();
                        }
                        echo '<div class="col-md-6 col-sm-12 col-xs-12 text-right sm-text-center pull-right pofo-post-detail-icon">';
                            echo '<ul class="extra-small-icon">';
                                if( $pofo_hide_like == 1 && function_exists( 'pofo_get_simple_likes_button' ) ){
                                    echo '<li>'.pofo_get_simple_likes_button(get_the_ID()).'</li>';
                                }
                            echo '</ul>';
                            if( $pofo_hide_share == 1 && function_exists( 'pofo_single_post_share_shortcode' ) ){
                                echo do_shortcode("[pofo_single_post_share]");
                            }
                        echo '</div>';

                        /* Check if author box hide / show */
                        if( $pofo_hide_post_author_box == 1 && get_the_author_meta( 'description' ) ) :
                            get_template_part( 'author-bio' );
                        endif;
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
    }
    
    if( $pofo_hide_related_posts == 1 ) :
        echo '<section class="wow fadeIn bg-light-gray pofo-related-posts-background">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 no-padding pofo-related-posts">';
                        /* Check if related post hide or show */
                        pofo_related_posts( get_the_ID() );
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</section>';
    endif;

    if( $pofo_hide_comment == 1 ) {
        if ( comments_open() || get_comments_number() ) {
            echo '<section class="wow fadeIn">';
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
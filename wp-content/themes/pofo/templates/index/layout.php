<?php
/**
 * Template file for default page
 *
 * @package Pofo
 */

get_header(); ?>
<?php
    $pofo_default_content_container_fluid = $pofo_general_default_type_settings = $class_column = $infinite_scroll_main_class = '';
    /* Check if page container style */
    $pofo_post_container_style_default = pofo_option( 'pofo_post_container_style_default', 'container' );

    $pofo_general_default_type = get_theme_mod( 'pofo_blog_premade_style_default', 'blog-list' );  
    /* Check default type */
    $pofo_blog_type_default = ( get_theme_mod( 'pofo_blog_type_default', '' ) ) ? get_theme_mod( 'pofo_blog_type_default', '' ) : '' ;
    $pofo_general_default_type_gutter = ( $pofo_blog_type_default ) ? $pofo_blog_type_default.' blog-post-gutter' : '' ;
    /* Check default column type */
    $pofo_blog_column_default = get_theme_mod( 'pofo_blog_column_default', '2' );
    $pofo_blog_pagination_style_default = get_theme_mod( 'pofo_blog_pagination_style_default', 'number-pagination' );
    $pofo_show_pagination_default = get_theme_mod( 'pofo_show_pagination_default', '1' );
    $pofo_blog_masonry_column_archive = get_theme_mod( 'pofo_blog_masonry_column_archive', '3' );

    echo '<section>';
        echo '<div class="'.esc_attr( $pofo_post_container_style_default ).'">';
            echo '<div class="row">';
                /* Get page left part template */
                get_template_part( 'templates/default','left' );

                if( have_posts() ):

                    switch ($pofo_blog_column_default) {
                        case '2':
                            $class_column .= ' col-md-6 col-sm-6 col-xs-12 ';
                        break;
                        case '3':
                            $class_column .= ' col-md-4 col-sm-6 col-xs-12 ';
                        break;
                        case '4':
                            $class_column .= ' col-md-3 col-sm-6 col-xs-12 ';
                        break;
                        case '6':
                            $class_column .= ' col-lg-2 col-md-4 col-sm-6 col-xs-12 ';
                        break;
                    }

                    if( $pofo_show_pagination_default == 1 ) {

                        switch ($pofo_general_default_type) {
                            case 'blog-full-width':
                            case 'blog-list':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                            break;
                        }

                    }

                    /* For Stckiy Post */
                    if( is_sticky() ) {
                        get_template_part( 'templates/index/pofo-blog', 'sticky' );
                    }

                    echo '<div class="pofo-'.$pofo_general_default_type.$infinite_scroll_main_class.'">';
                        // For default type
                        switch ($pofo_general_default_type) {
                            case 'blog-classic':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="col-'.$pofo_blog_column_default.'-nth-item '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                break;

                            case 'blog-masonry':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<ul class="blog-grid blog-'.$pofo_blog_masonry_column_default.'col '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                echo '<li class="grid-sizer"></li>';
                                break;
                            
                            case 'blog-grid':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="col-'.$pofo_blog_column_default.'-nth-item '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                break;
                            
                            case 'blog-simple':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="col-'.$pofo_blog_column_default.'-nth-item '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                break;
                            
                            case 'blog-clean':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="col-'.$pofo_blog_column_default.'-nth-item '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                break;
                            
                            case 'blog-personal':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="blog-post blog-post-style4">';
                                echo '<ul class="blog-grid col-sm-12 col-xs-12 '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                echo '<li class="grid-sizer'.$class_column.'"></li>';
                                break;
                            
                            case 'blog-only-text':
                                switch( $pofo_blog_pagination_style_default ) {
                                    case 'infinite-scroll-pagination':
                                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                                    break;
                                }
                                echo '<div class="col-'.$pofo_blog_column_default.'-nth-item '.$pofo_general_default_type_gutter.$infinite_scroll_main_class.'">';
                                break;
                        }
                        
                        switch ( $pofo_general_default_type ) {
                            case 'blog-full-width':
                                get_template_part('templates/index/pofo-blog','full-width');
                                break;
                            case 'blog-classic':
                                get_template_part('templates/index/pofo-blog','classic');
                                break;
                            case 'blog-list':
                                get_template_part('templates/index/pofo-blog','list');
                                break;
                            case 'blog-grid':
                                get_template_part('templates/index/pofo-blog','grid');
                                break;
                            case 'blog-masonry':
                                get_template_part('templates/index/pofo-blog','masonry');
                                break;
                            case 'blog-simple':
                                get_template_part('templates/index/pofo-blog','simple');
                                break;
                            case 'blog-clean':
                                get_template_part('templates/index/pofo-blog','clean');
                                break;
                            case 'blog-personal':
                                get_template_part('templates/index/pofo-blog','personal');
                                break;
                            case 'blog-only-text':
                                get_template_part('templates/index/pofo-blog','only-text');
                                break;
                        }
                                
                        switch ($pofo_general_default_type) {
                            case 'blog-classic':
                                echo '</div>';
                                break;

                            case 'blog-masonry':
                                echo '</ul>';
                                break;

                            case 'blog-grid':
                                echo '</div>';
                                break;
                            
                            case 'blog-simple':
                                echo '</div>';
                                break;
                            
                            case 'blog-clean':
                                echo '</div>';
                                break;
                            
                            case 'blog-personal':
                                echo '</ul>';
                                echo '</div>';
                                break;
                            
                            case 'blog-only-text':
                                echo '</div>';
                                break;
                        }

                        if( $pofo_show_pagination_default == 1 && $wp_query->max_num_pages > 1 ){
                            if( $pofo_blog_pagination_style_default == 'infinite-scroll-pagination'  ) {
                                echo '<div class="pagination pofo-infinite-scroll display-none" data-pagination="'.$wp_query->max_num_pages.'">';
                                    if( get_next_posts_link( '', $wp_query->max_num_pages ) ) :
                                        echo next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'pofo' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $wp_query->max_num_pages );
                                    endif;
                                echo '</div>';

                            } else {
                                $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
                                echo '<div class=" text-center margin-70px-top sm-margin-30px-top clear-both float-left width-100">';
                                echo '<div class="text-small text-uppercase text-extra-dark-gray pagination">';
                                    echo paginate_links( array(
                                        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                                        'format'       => '',
                                        'add_args'     => '',
                                        'current'      => $current,
                                        'total'        => $wp_query->max_num_pages,
                                        'prev_text'    => '<i class="fas fa-long-arrow-alt-left margin-5px-right"></i> <span class="xs-display-none border-none">'.esc_html( 'Prev','pofo').'</span>',
                                        'next_text'    => '<span class="xs-display-none border-none">'.esc_html( 'Next', 'pofo').'</span> <i class="fas fa-long-arrow-alt-right margin-5px-left"></i>',
                                        'type'         => 'plain',
                                        'end_size'     => 2,
                                        'mid_size'     => 2
                                    ) );
                                echo '</div>';
                                echo '</div>';
                            }
                        }

                    echo '</div>';
                else :
                    get_template_part( 'templates/content', 'none' );
                // End of the loop.
                endif;

                /* Get page right part template */
                get_template_part( 'templates/default','right' );
            echo '</div>';
        echo '</div>';
    echo '</section>';

get_footer();
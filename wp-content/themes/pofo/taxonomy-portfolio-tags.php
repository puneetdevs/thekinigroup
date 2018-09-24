<?php
/**
 * The template for displaying Portfolio tags
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pofo
 */

get_header(); 
?>
<?php
    /* Check if page container style */
    $pofo_portfolio_archive_page_container_style = get_theme_mod( 'pofo_portfolio_archive_page_container_style', 'container' );
    $pofo_portfolio_archive_page_premade_style = get_theme_mod( 'pofo_portfolio_archive_page_premade_style', 'portfolio-style-1' );

    $pofo_show_pagination_archive = get_theme_mod( 'pofo_show_pagination_portfolio_archive', '1' );
    $pofo_portfolio_pagination_style_archive = get_theme_mod( 'pofo_pagination_style_portfolio_archive', '' );

    echo '<section>';
        echo '<div class="'.esc_attr( $pofo_portfolio_archive_page_container_style ).'">';
            echo '<div class="row">';
                /* Get page left part template */
                get_template_part( 'templates/portfolio-archive','left' );
                if( have_posts() ) {
                    switch ( $pofo_portfolio_archive_page_premade_style ) {
                        case 'portfolio-style-1':
                            get_template_part('templates/portfolio-archive/portfolio-style-1');
                            break;
                        case 'portfolio-style-2':
                            get_template_part('templates/portfolio-archive/portfolio-style-2');
                            break;
                        case 'portfolio-style-3':
                            get_template_part('templates/portfolio-archive/portfolio-style-3');
                            break;
                        case 'portfolio-style-4':
                            get_template_part('templates/portfolio-archive/portfolio-style-4');
                            break;
                        case 'portfolio-style-5':
                            get_template_part('templates/portfolio-archive/portfolio-style-5');
                            break;
                        case 'portfolio-style-6':
                            get_template_part('templates/portfolio-archive/portfolio-style-6');
                            break;
                        case 'portfolio-style-7':
                            get_template_part('templates/portfolio-archive/portfolio-style-7');
                            break;
                        case 'portfolio-style-8':
                            get_template_part('templates/portfolio-archive/portfolio-style-8');
                            break;
                        case 'portfolio-style-9':
                            get_template_part('templates/portfolio-archive/portfolio-style-9');
                            break;
                        case 'portfolio-style-10':
                            get_template_part('templates/portfolio-archive/portfolio-style-10');
                            break;
                        case 'portfolio-style-11':
                            get_template_part('templates/portfolio-archive/portfolio-style-11');
                            break;
                    }

                    if( $pofo_show_pagination_archive == 1 && $wp_query->max_num_pages > 1 ){
                        if( $pofo_portfolio_pagination_style_archive == 'infinite-scroll-pagination'  ) {
                            echo '<div class="pagination pofo-portfolio-infinite-scroll display-none" data-pagination="'.$wp_query->max_num_pages.'">';
                                if( get_next_posts_link( '', $wp_query->max_num_pages ) ) :
                                    echo next_posts_link( '<span class="old-post">'.esc_html__( 'Older Portfolio', 'pofo' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $wp_query->max_num_pages );
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
                } else {
                    get_template_part( 'templates/content', 'none' );
                }
                // End of the loop.
                /* Get page right part template */
                get_template_part( 'templates/portfolio-archive','right' );
            echo '</div>';
        echo '</div>';
    echo '</section>';
    
get_footer();
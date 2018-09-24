<?php
/**
 * The template for displaying Author bios
 *
 * @package Pofo
 */
?>
<?php
    
    $pofo_author_box_button_title = get_theme_mod( 'pofo_author_box_button_title', 'All author posts' );
    /* Start Author Info. */
    echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-30px-top xs-margin-10px-top xs-margin-20px-bottom">';
        echo '<div class="display-table width-100 border-all border-color-extra-light-gray padding-50px-all sm-padding-30px-all xs-padding-20px-all pofo-author-box">';
            echo '<div class="display-table-cell width-130px text-center vertical-align-top xs-margin-15px-bottom xs-width-100 xs-display-block xs-text-center">';
                $pofo_author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                if( $pofo_author_image_url ){
                    echo '<img src="'.esc_url( $pofo_author_image_url ).'" class="img-circle width-100px" alt="'.get_the_author().'" />';
                }
            echo '</div>';
            echo '<div class="padding-40px-left display-table-cell vertical-align-top last-paragraph-no-margin xs-no-padding-left xs-display-block xs-text-center">';
                echo '<div><a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="text-extra-dark-gray text-uppercase alt-font font-weight-600 margin-10px-bottom display-inline-block text-small pofo-author-title">'.get_the_author().'</a></div>';
                echo '<p class="pofo-author-content">'.get_the_author_meta( 'description' ).'</p>';
                echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" class="btn btn-very-small btn-black margin-20px-top">'.esc_attr( $pofo_author_box_button_title ).'</a>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    /* End Author Info. */
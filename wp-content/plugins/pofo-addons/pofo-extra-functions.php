<?php

    // Exit if accessed directly.
    if ( !defined( 'ABSPATH' ) ) { exit; }

    if( ! function_exists( 'pofo_meta_prefix' ) ) :
        function pofo_meta_prefix() {

            $meta_prefix = '';

            $pofodetails_theme_update_meta = get_option( 'pofodetails_theme_update_meta' );
            if( $pofodetails_theme_update_meta == '1' ) {

                $meta_prefix = '_';
            }

            return $meta_prefix;
        }
    endif;

    if( ! function_exists( 'pofo_option' ) ) :
        function pofo_option( $option, $default_value ) {
            global $post;

            $pofo_option_value = '';
            if( is_404() ){
                $pofo_option_value = get_theme_mod( $option, $default_value );
            }else{
                if( !( is_category() || is_archive() || is_author() || is_tag() || is_search() || is_home() ) ){

                    // Meta Prefix
                    $meta_prefix = pofo_meta_prefix();
                    $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
                    
                    if( is_string( $value ) && ( strlen( $value ) > 0 || is_array( $value ) ) && ( $value != 'default' ) ) {
                        $pofo_option_value = $value;
                    } else {
                        $pofo_option_value = get_theme_mod( $option, $default_value );
                    }
                }else{
                    $pofo_option_value = get_theme_mod( $option, $default_value );
                }
            }
            return $pofo_option_value;
        }
    endif;

    if ( ! function_exists( 'pofo_is_theme_licence_active' ) ) :
        function pofo_is_theme_licence_active() {
            $pofo_theme_active = get_option( 'pofo_theme_active' );
            if( $pofo_theme_active == 'yes' ){
                return true;
            } else {
                return false;
            }
        }
    endif;
    
    /* For Image Alt Text */
    if ( ! function_exists( 'pofo_option_image_alt' ) ) :
        function pofo_option_image_alt( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_alt = get_theme_mod( 'pofo_image_alt', '1' );

            if( $attachment_id && ( $pofo_image_alt == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'alt' => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ),
                );
                
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Image Title Text */
    if ( ! function_exists( 'pofo_option_image_title' ) ) :
        function pofo_option_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title is on / off */
            $pofo_image_title = get_theme_mod( 'pofo_image_title', '0' );
            
            if( $attachment_id && ( $pofo_image_title == 1 ) ){
                /* Get attachment metadata by attachment id */
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );
 
                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Title */
    if ( ! function_exists( 'pofo_option_lightbox_image_title' ) ) :
        function pofo_option_lightbox_image_title( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image title for lightbox popup */
            $pofo_image_title_lightbox_popup = get_theme_mod( 'pofo_image_title_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_title_lightbox_popup == 1 ) ){

                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'title' =>  esc_attr( get_the_title( $attachment_id ) ),
                );

                return $pofo_image_meta;
            }else{
                return;
            }
        }
    endif;

    /* For Lightbox Image Caption */
    if ( ! function_exists( 'pofo_option_lightbox_image_caption' ) ) :
        function pofo_option_lightbox_image_caption( $attachment_id ){

            if( wp_attachment_is_image( $attachment_id ) == false ) {
                return;
            }

            /* Check image alt is on / off */
            $pofo_image_caption_lightbox_popup = get_theme_mod( 'pofo_image_caption_lightbox_popup', '0' );

            if( $attachment_id && ( $pofo_image_caption_lightbox_popup == 1 ) ){
                /* Get attachment metadata by attachment id */
                $attachment = get_post( $attachment_id );
                $pofo_image_meta = array(
                    'caption' =>  esc_attr( $attachment->post_excerpt ),
                );
                
                return $pofo_image_meta;
                
            }else{
                return;
            }
        }
    endif;

    if( ! function_exists( 'pofo_post_meta' ) ) :
        function pofo_post_meta( $option ) {
            global $post;

            // Meta Prefix
            $meta_prefix = pofo_meta_prefix();
            $value = get_post_meta( $post->ID, $meta_prefix.$option.'_single', true);
            return $value;
        }
    endif;
    
    /* To get Register Sidebar list in metabox */
    if( ! function_exists( 'pofo_register_sidebar_array' ) ) :
        function pofo_register_sidebar_array() {
            global $wp_registered_sidebars;
            if( ! empty( $wp_registered_sidebars ) && is_array( $wp_registered_sidebars ) ){ 
                $sidebar_array = array();
                $sidebar_array['default'] = esc_html__( 'Default', 'pofo-addons' );
                foreach( $wp_registered_sidebars as $sidebar ){
                    $sidebar_array[$sidebar['id']] = $sidebar['name'];
                }
            }
            return $sidebar_array;
        }
    endif;

    if( ! function_exists( 'pofo_remove_wpautop' ) ) :
      function pofo_remove_wpautop( $content, $force_br = true ) {
        if ( $force_br ) {
          $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
        }
        return do_shortcode( shortcode_unautop( $content ) );
      }
    endif;

    if ( ! function_exists( 'pofo_get_the_excerpt_theme' ) ) {
        function pofo_get_the_excerpt_theme($length)
        {
            return pofo_Excerpt::pofo_get_by_length($length);
        }
    }

    if ( ! function_exists( 'pofo_get_the_post_content' ) ) {
        function pofo_get_the_post_content()
        {
            return apply_filters( 'the_content', get_the_content() );
        }
    }

    if( ! function_exists( 'pofo_get_style_attribute' ) ) :
        function pofo_get_style_attribute( $style_array, $font_size, $line_height ) {
            
            $html = '';
            if( !empty( $style_array ) ) {
                $html .= ' style="' . implode(" ", $style_array) . '"';
                if( !empty( $font_size ) ) {
                    $html .= ' data-fontsize="'.$font_size.'"';
                }
                if( !empty( $line_height ) ) {
                    $html .= ' data-lineheight="'.$line_height.'"';
                }
            }
            return $html;
        }
    endif;

    // [pofo_single_post_share] Shortcode.
    if ( ! function_exists( 'pofo_single_post_share_shortcode' ) ) :
        function pofo_single_post_share_shortcode() {
            global $post;

            if( !$post )
                return false;
            
            $output = $border_bottom = '';
            $pofo_single_post_disable_social_share = pofo_option( 'pofo_single_post_disable_social_share', '1' );
            $pofo_single_post_social_share = pofo_option( 'pofo_single_post_social_sharing', '' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $post_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_post_disable_social_share == 1 && !empty( $pofo_single_post_social_share ) ) { 
                if( is_singular('portfolio') ){
                    ?>
                    <div class="social-icon-style-3 medium-icon">
                    <?php
                }else{
                     ?>
                    <div class="social-icon-style-6 extra-small-icon">
                    <?php
                }
            ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_post_social_share);
                        foreach ($pofo_single_post_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_post_social_share[$i+1] == '1' ){
                                    switch($pofo_single_post_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $post_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $post_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_post_share','pofo_single_post_share_shortcode');

    // [pofo_single_portfolio_share] Shortcode.
    if ( ! function_exists( 'pofo_single_portfolio_share_shortcode' ) ) :
        function pofo_single_portfolio_share_shortcode() {
            global $post;

            if( !$post )
                return false;
            
            $output = $border_bottom = '';
            $pofo_single_portfolio_disable_social_share = pofo_option( 'pofo_single_portfolio_disable_social_share', '1' );
            $pofo_single_portfolio_social_share = pofo_option( 'pofo_single_portfolio_social_sharing', '' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $post_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_portfolio_disable_social_share == 1 && !empty( $pofo_single_portfolio_social_share ) ) { 
                if( is_singular('portfolio') ){
                    ?>
                    <div class="social-icon-style-3 medium-icon">
                    <?php
                }else{
                     ?>
                    <div class="social-icon-style-6 extra-small-icon">
                    <?php
                }
            ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_portfolio_social_share);
                        foreach ($pofo_single_portfolio_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_portfolio_social_share[$i+1] == '1' ){
                                    switch($pofo_single_portfolio_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $post_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $post_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $post_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $post_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($post_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_portfolio_share','pofo_single_portfolio_share_shortcode');

    // [pofo_single_product_share] Shortcode.
    if ( ! function_exists( 'pofo_single_product_share_shortcode' ) ) :
        function pofo_single_product_share_shortcode() {
            global $post;

            if( !$post )
                return false;

            $output = $border_bottom = '';
            $pofo_single_product_enable_social_share = get_theme_mod( 'pofo_single_product_enable_social_share', '1' );
            $pofo_single_product_share_title = get_theme_mod( 'pofo_single_product_share_title', __( 'Share', 'pofo-addons' ) );
            $pofo_single_product_social_share = get_theme_mod( 'pofo_single_product_social_sharing', '' );

            $permalink      = get_permalink( $post->ID );
            $featuredimage  = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $featured_image = $featuredimage['0'];
            $product_title     = rawurlencode( get_the_title( $post->ID ) );

            ob_start();
            ?>
            <?php if( $pofo_single_product_enable_social_share == 1 && !empty( $pofo_single_product_social_share ) && class_exists( 'WooCommerce' ) ) {/* if enable social share & WooCommerce plugin is activated */ ?>
                <div class="social-icon-style-7 extra-small-icon products-social-icon">
                <?php
                    if( !empty( $pofo_single_product_share_title ) ) {
                        echo '<span class="pofo-product-sharebox-title">'.esc_attr( $pofo_single_product_share_title ).':</span>';
                    }
                ?>
                <ul>
                    <?php
                        $i = 0; 
                        $count = count($pofo_single_product_social_share);
                        foreach ($pofo_single_product_social_share as $key => $value) {
                            if( $i < $count ){
                                if($pofo_single_product_social_share[$i+1] == '1' ){
                                    switch($pofo_single_product_social_share[$i]){
                                        case 'facebook':?>
                                            <li><a class="social-sharing-icon facebook-f" href="//www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-facebook-f"></i><span></span></a></li>
                                        <?php break;

                                        case 'twitter':?>
                                            <li><a class="social-sharing-icon twitter" href="//twitter.com/share?url=<?php echo $permalink; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-twitter"></i><span></span></a></li>
                                        <?php break;

                                        case 'google-plus':?>
                                            <li><a class="social-sharing-icon google-plus-g" href="//plus.google.com/share?url=<?php echo $permalink; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $product_title; ?>"><i class="fab fa-google-plus-g"></i><span></span></a></li>
                                        <?php break;

                                        case 'linkedin':?>
                                            <li><a class="social-sharing-icon linkedin-in" href="//linkedin.com/shareArticle?mini=true&amp;url=<?php echo $permalink; ?>&amp;title=<?php echo $product_title; ?>" target="_blank" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" title="<?php echo $product_title; ?>"><i class="fab fa-linkedin-in"></i><span></span></a></li>
                                        <?php break;

                                        case 'pinterest':?>
                                            <li><a class="social-sharing-icon pinterest-p" href="//pinterest.com/pin/create/button/?url=<?php echo $permalink; ?>&amp;media=<?php echo $featured_image; ?>&amp;description=<?php echo $product_title; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;"  rel="nofollow" target="_blank" title="<?php echo $product_title; ?>"><i class="fab fa-pinterest-p"></i><span></span></a></li>
                                        <?php break;

                                        case 'delicious':?>
                                            <li><a class="social-sharing-icon delicious" href="//del.icio.us/post?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-delicious"></i><span></span></a></li>
                                        <?php break;

                                        case 'reddit':?>
                                            <li><a class="social-sharing-icon reddit" href="//reddit.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-reddit"></i><span></span></a></li>
                                        <?php break;

                                        case 'stumbleupon':?>
                                            <li><a class="social-sharing-icon stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-stumbleupon"></i><span></span></a></li>
                                        <?php break;

                                        case 'digg':?>
                                            <li><a class="social-sharing-icon digg" href="//www.digg.com/submit?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-digg"></i><span></span></a></li>
                                        <?php break;

                                        case 'tumblr':?>
                                            <li><a class="social-sharing-icon tumblr" href="//www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($product_title); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-tumblr"></i><span></span></a></li>
                                        <?php break;

                                        case 'vk':?>
                                            <li><a class="social-sharing-icon vk" href="//vk.com/share.php?url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-vk"></i><span></span></a></li>
                                        <?php break;

                                        case 'xing':?>
                                            <li><a class="social-sharing-icon xing" href="//www.xing.com/app/user?op=share&url=<?php echo esc_url($permalink); ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" data-pin-custom="true"><i class="fab fa-xing"></i><span></span></a></li>
                                        <?php break;

                                    }
                                }
                                $i = $i + 3;
                            }
                        }
                    ?>
                </ul>
                </div>
            <?php } ?>
            <?php
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
    endif;
    add_shortcode('pofo_single_product_share','pofo_single_product_share_shortcode');

    // [pofo_login_link] Shortcode.
    if ( ! function_exists( 'pofo_login_link_shortcode' ) ) :
        function pofo_login_link_shortcode() {

            $login_page_url = $logout_page_url = '';

            /* if WooCommerce plugin is activated */
            if( class_exists( 'WooCommerce' ) ) {
                $myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
                $login_page_url = get_permalink( $myaccount_page_id );
                $logout_page_url = wp_logout_url( $login_page_url );
            } else {

                $login_page_url = wp_login_url();
                $logout_page_url = wp_logout_url();
            }

            if ( is_user_logged_in() ) {

                return '<a href="'.esc_url( $logout_page_url ).'" class="pofo-login-logout-link pofo-logout">' . __( 'Logout', 'pofo-addons' ) . '</a>';

            } else {

                return '<a href="'.esc_url( $login_page_url ).'" class="pofo-login-logout-link pofo-login">' . __( 'Login', 'pofo-addons' ) . '</a>';
            }
        }
    endif;
    add_shortcode( 'pofo_login_link', 'pofo_login_link_shortcode' );

    add_shortcode( 'pofo_siteurl', 'pofo_link_replace');
    if( ! function_exists( 'pofo_link_replace' ) ) :
        function pofo_link_replace(){
            $link = home_url('/');
            return $link;
        }
    endif;

    // Get all social icons
    if( ! function_exists( 'pofo_get_social_icons' ) ) {
        function pofo_get_social_icons() {

            $social_icons = array(
                                  'facebook'    => 'facebook-f',
                                  'twitter'     => 'twitter',
                                  'gplus'       => 'google-plus-g',
                                  'dribbble'    => 'dribbble',
                                  'linkedin'    => 'linkedin-in',
                                  'instagram'   => 'instagram',
                                  'tumblr'      => 'tumblr',
                                  'pinterest'   => 'pinterest-p',
                                  'youtube'     => 'youtube',
                                  'vimeo'       => 'vimeo-v',
                                  'soundcloud'  => 'soundcloud',
                                  'flickr'      => 'flickr',
                                  'rss'         => 'rss',
                                  'reddit'      => 'reddit',
                                  'behance'     => 'behance',
                                  'vine'        => 'vine',
                                  'github'      => 'github',
                                  'xing'        => 'xing',
                                  'vk'          => 'vk',
                                  'yelp'        => 'yelp',
                                  'discord'     => 'discord',
                                  'email'       => 'envelope',
                              );
            return $social_icons;
        }
    }

    // Get sorted social icons
    if( ! function_exists( 'pofo_get_sorted_social_data' ) ) {
        function pofo_get_sorted_social_data( $social_sorting, $social_data ) {

            // Get all social icons
            $social_icons = pofo_get_social_icons();

            // Check social sorting value exists
            if( !empty( $social_sorting ) ) {

                $sorted_social_data = array();

                $pofo_social_sorting_data = explode( ',', $social_sorting );
                
                foreach( $pofo_social_sorting_data as $social_key ) {

                    if( !empty( $social_data[$social_key] ) ) {

                        $sorted_social_data[$social_key] = $social_data[$social_key];
                    }
                }
                return $sorted_social_data;
            }
            return $social_data;
        }
    }

    if ( ! function_exists('pofo_footer_sidebar_style_classes') ) {
        function pofo_footer_sidebar_style_classes( $params ) {

            /* Check Footer Style */
            $pofo_footer_style = pofo_option( 'pofo_footer_style', 'footer-style-one' );
            if( $pofo_footer_style == 'footer-style-three' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            if( $pofo_footer_style == 'footer-style-two' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-10px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            if( $pofo_footer_style == 'footer-style-one' ) {

                if( $params[0]['id'] == 'sidebar-1' ) {
                    $params[0]['before_title'] = str_replace( '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );

                    $params[0]['after_title'] = str_replace( '</span></div>', '</div>', $params[0]['after_title'] );
                }
                
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', $params[0]['before_title'] );
            }
            
            return $params;
        }
    }

    if( !function_exists( 'pofo_addon_footer_sidebar_style_before' ) ) {
        function pofo_addon_footer_sidebar_style_before() {

            add_filter( 'dynamic_sidebar_params', 'pofo_footer_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_footer_sidebar_style_before', 'pofo_addon_footer_sidebar_style_before' );
    add_action( 'pofo_footer_sidebar_style_three_before', 'pofo_addon_footer_sidebar_style_before' );

    if( !function_exists( 'pofo_addon_footer_sidebar_style_after' ) ) {
        function pofo_addon_footer_sidebar_style_after() {

            remove_filter( 'dynamic_sidebar_params', 'pofo_footer_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_footer_sidebar_style_after', 'pofo_addon_footer_sidebar_style_after' );
    add_action( 'pofo_footer_sidebar_style_three_after', 'pofo_addon_footer_sidebar_style_after' );

    if ( ! function_exists('pofo_page_sidebar_style_classes') ) {
        function pofo_page_sidebar_style_classes( $params ) {
            
            /* Check if not Main Sidebar or not Shop Sidebar */
            if( !( $params[0]['id'] == 'sidebar-1' || $params[0]['id'] == 'pofo-shop-1' ) ) {
                $params[0]['before_title'] = str_replace( '<div class="widget-title">', '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', $params[0]['before_title'] );

                $params[0]['after_title'] = str_replace( '</div>', '</span></div>', $params[0]['after_title'] );

                $params[0]['before_title'] = str_replace( '<div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">', '<div class="widget-title text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>', $params[0]['before_title'] );

                $params[0]['after_title'] = str_replace( '</div>', '</span></div>', $params[0]['after_title'] );
            }
            
            return $params;
        }
    }

    if( !function_exists( 'pofo_addon_page_sidebar_style_before' ) ) {
        function pofo_addon_page_sidebar_style_before() {

            add_filter( 'dynamic_sidebar_params', 'pofo_page_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_page_sidebar_style_before', 'pofo_addon_page_sidebar_style_before' );

    if( !function_exists( 'pofo_addon_page_sidebar_style_after' ) ) {
        function pofo_addon_page_sidebar_style_after() {

            remove_filter( 'dynamic_sidebar_params', 'pofo_page_sidebar_style_classes' );
        }
    }
    add_action( 'pofo_page_sidebar_style_after', 'pofo_addon_page_sidebar_style_after' );

    if( !function_exists('pofo_get_et_line_icons')) {
      function pofo_get_et_line_icons() {
        $icons = array('icon-mobile','icon-laptop','icon-desktop','icon-tablet','icon-phone','icon-document','icon-documents','icon-search','icon-clipboard','icon-newspaper','icon-notebook','icon-book-open','icon-browser','icon-calendar','icon-presentation','icon-picture','icon-pictures','icon-video','icon-camera','icon-printer','icon-toolbox','icon-briefcase','icon-wallet','icon-gift','icon-bargraph','icon-grid','icon-expand','icon-focus','icon-edit','icon-adjustments','icon-ribbon','icon-hourglass','icon-lock','icon-megaphone','icon-shield','icon-trophy','icon-flag','icon-map','icon-puzzle','icon-basket','icon-envelope','icon-streetsign','icon-telescope','icon-gears','icon-key','icon-paperclip','icon-attachment','icon-pricetags','icon-lightbulb','icon-layers','icon-pencil','icon-tools','icon-tools-2','icon-scissors','icon-paintbrush','icon-magnifying-glass','icon-circle-compass','icon-linegraph','icon-mic','icon-strategy','icon-beaker','icon-caution','icon-recycle','icon-anchor','icon-profile-male','icon-profile-female','icon-bike','icon-wine','icon-hotairballoon','icon-globe','icon-genius','icon-map-pin','icon-dial','icon-chat','icon-heart','icon-cloud','icon-upload','icon-download','icon-target','icon-hazardous','icon-piechart','icon-speedometer','icon-global','icon-compass','icon-lifesaver','icon-clock','icon-aperture','icon-quote','icon-scope','icon-alarmclock','icon-refresh','icon-happy','icon-sad','icon-facebook','icon-twitter','icon-googleplus','icon-rss','icon-tumblr','icon-linkedin','icon-dribbble');
        return $icons;
      }
    }

    if( !function_exists('pofo_get_themify_icons')) {
      function pofo_get_themify_icons() {
        $ti_icons = array("ti-arrow-up", "ti-arrow-right", "ti-arrow-left", "ti-arrow-down", "ti-arrows-vertical", "ti-arrows-horizontal", "ti-angle-up", "ti-angle-right", "ti-angle-left", "ti-angle-down", "ti-angle-double-up", "ti-angle-double-right", "ti-angle-double-left", "ti-angle-double-down", "ti-move", "ti-fullscreen", "ti-arrow-top-right", "ti-arrow-top-left", "ti-arrow-circle-up", "ti-arrow-circle-right", "ti-arrow-circle-left", "ti-arrow-circle-down", "ti-arrows-corner", "ti-split-v", "ti-split-v-alt", "ti-split-h", "ti-hand-point-up", "ti-hand-point-right", "ti-hand-point-left", "ti-hand-point-down", "ti-back-right", "ti-back-left", "ti-exchange-vertical", "ti-wand", "ti-save", "ti-save-alt", "ti-direction", "ti-direction-alt", "ti-user", "ti-link", "ti-unlink", "ti-trash", "ti-target", "ti-tag", "ti-desktop", "ti-tablet", "ti-mobile", "ti-email", "ti-star", "ti-spray", "ti-signal", "ti-shopping-cart", "ti-shopping-cart-full", "ti-settings", "ti-search", "ti-zoom-in", "ti-zoom-out", "ti-cut", "ti-ruler", "ti-ruler-alt-2", "ti-ruler-pencil", "ti-ruler-alt", "ti-bookmark", "ti-bookmark-alt", "ti-reload", "ti-plus", "ti-minus", "ti-close", "ti-pin", "ti-pencil", "ti-pencil-alt", "ti-paint-roller", "ti-paint-bucket", "ti-na", "ti-medall", "ti-medall-alt", "ti-marker", "ti-marker-alt", "ti-lock", "ti-unlock", "ti-location-arrow", "ti-layout", "ti-layers", "ti-layers-alt", "ti-key", "ti-image", "ti-heart", "ti-heart-broken", "ti-hand-stop", "ti-hand-open", "ti-hand-drag", "ti-flag", "ti-flag-alt", "ti-flag-alt-2", "ti-eye", "ti-import", "ti-export", "ti-cup", "ti-crown", "ti-comments", "ti-comment", "ti-comment-alt", "ti-thought", "ti-clip", "ti-check", "ti-check-box", "ti-camera", "ti-announcement", "ti-brush", "ti-brush-alt", "ti-palette", "ti-briefcase", "ti-bolt", "ti-bolt-alt", "ti-blackboard", "ti-bag", "ti-world", "ti-wheelchair", "ti-car", "ti-truck", "ti-timer", "ti-ticket", "ti-thumb-up", "ti-thumb-down", "ti-stats-up", "ti-stats-down", "ti-shine", "ti-shift-right", "ti-shift-left", "ti-shift-right-alt", "ti-shift-left-alt", "ti-shield", "ti-notepad", "ti-server", "ti-pulse", "ti-printer", "ti-power-off", "ti-plug", "ti-pie-chart", "ti-panel", "ti-package", "ti-music", "ti-music-alt", "ti-mouse", "ti-mouse-alt", "ti-money", "ti-microphone", "ti-menu", "ti-menu-alt", "ti-map", "ti-map-alt", "ti-location-pin", "ti-light-bulb", "ti-info", "ti-infinite", "ti-id-badge", "ti-hummer", "ti-home", "ti-help", "ti-headphone", "ti-harddrives", "ti-harddrive", "ti-gift", "ti-game", "ti-filter", "ti-files", "ti-file", "ti-zip", "ti-folder", "ti-envelope", "ti-dashboard", "ti-cloud", "ti-cloud-up", "ti-cloud-down", "ti-clipboard", "ti-calendar", "ti-book", "ti-bell", "ti-basketball", "ti-bar-chart", "ti-bar-chart-alt", "ti-archive", "ti-anchor", "ti-alert", "ti-alarm-clock", "ti-agenda", "ti-write", "ti-wallet", "ti-video-clapper", "ti-video-camera", "ti-vector", "ti-support", "ti-stamp", "ti-slice", "ti-shortcode", "ti-receipt", "ti-pin2", "ti-pin-alt", "ti-pencil-alt2", "ti-eraser", "ti-more", "ti-more-alt", "ti-microphone-alt", "ti-magnet", "ti-line-double", "ti-line-dotted", "ti-line-dashed", "ti-ink-pen", "ti-info-alt", "ti-help-alt", "ti-headphone-alt", "ti-gallery", "ti-face-smile", "ti-face-sad", "ti-credit-card", "ti-comments-smiley", "ti-time", "ti-share", "ti-share-alt", "ti-rocket", "ti-new-window", "ti-rss", "ti-rss-alt", "ti-control-stop", "ti-control-shuffle", "ti-control-play", "ti-control-pause", "ti-control-forward", "ti-control-backward", "ti-volume", "ti-control-skip-forward", "ti-control-skip-backward", "ti-control-record", "ti-control-eject", "ti-paragraph", "ti-uppercase", "ti-underline", "ti-text", "ti-Italic", "ti-smallcap", "ti-list", "ti-list-ol", "ti-align-right", "ti-align-left", "ti-align-justify", "ti-align-center", "ti-quote-right", "ti-quote-left", "ti-layout-width-full", "ti-layout-width-default", "ti-layout-width-default-alt", "ti-layout-tab", "ti-layout-tab-window", "ti-layout-tab-v", "ti-layout-tab-min", "ti-layout-slider", "ti-layout-slider-alt", "ti-layout-sidebar-right", "ti-layout-sidebar-none", "ti-layout-sidebar-left", "ti-layout-placeholder", "ti-layout-menu", "ti-layout-menu-v", "ti-layout-menu-separated", "ti-layout-menu-full", "ti-layout-media-right", "ti-layout-media-right-alt", "ti-layout-media-overlay", "ti-layout-media-overlay-alt", "ti-layout-media-overlay-alt-2", "ti-layout-media-left", "ti-layout-media-left-alt", "ti-layout-media-center", "ti-layout-media-center-alt", "ti-layout-list-thumb", "ti-layout-list-thumb-alt", "ti-layout-list-post", "ti-layout-list-large-image", "ti-layout-line-solid", "ti-layout-grid4", "ti-layout-grid3", "ti-layout-grid2", "ti-layout-grid2-thumb", "ti-layout-cta-right", "ti-layout-cta-left", "ti-layout-cta-center", "ti-layout-cta-btn-right", "ti-layout-cta-btn-left", "ti-layout-column4", "ti-layout-column3", "ti-layout-column2", "ti-layout-accordion-separated", "ti-layout-accordion-merged", "ti-layout-accordion-list", "ti-widgetized", "ti-widget", "ti-widget-alt", "ti-view-list", "ti-view-list-alt", "ti-view-grid", "ti-upload", "ti-download", "ti-loop", "ti-layout-sidebar-2", "ti-layout-grid4-alt", "ti-layout-grid3-alt", "ti-layout-grid2-alt", "ti-layout-column4-alt", "ti-layout-column3-alt", "ti-layout-column2-alt", "ti-flickr", "ti-flickr-alt", "ti-instagram", "ti-google", "ti-github", "ti-facebook", "ti-dropbox", "ti-dropbox-alt", "ti-dribbble", "ti-apple", "ti-android", "ti-yahoo", "ti-trello", "ti-stack-overflow", "ti-soundcloud", "ti-sharethis", "ti-sharethis-alt", "ti-reddit", "ti-microsoft", "ti-microsoft-alt", "ti-linux", "ti-jsfiddle", "ti-joomla", "ti-html5", "ti-css3", "ti-drupal", "ti-wordpress", "ti-tumblr", "ti-tumblr-alt", "ti-skype", "ti-youtube", "ti-vimeo", "ti-vimeo-alt", "ti-twitter", "ti-twitter-alt", "ti-linkedin", "ti-pinterest", "ti-pinterest-alt", "ti-themify-logo", "ti-themify-favicon", "ti-themify-favicon-alt");
        return $ti_icons;
      }
    }

    if ( ! function_exists( 'pofo_fontawesome_solid' ) ) :
        function pofo_fontawesome_solid() {
            $fa_icons_solid = array('fa-address-book', 'fa-address-card', 'fa-adjust', 'fa-air-freshener', 'fa-align-center', 'fa-align-justify', 'fa-align-left', 'fa-align-right', 'fa-allergies', 'fa-ambulance', 'fa-american-sign-language-interpreting', 'fa-anchor', 'fa-angle-double-down', 'fa-angle-double-left', 'fa-angle-double-right', 'fa-angle-double-up', 'fa-angle-down', 'fa-angle-left', 'fa-angle-right', 'fa-angle-up', 'fa-angry', 'fa-apple-alt', 'fa-archive', 'fa-archway', 'fa-arrow-alt-circle-down', 'fa-arrow-alt-circle-left', 'fa-arrow-alt-circle-right', 'fa-arrow-alt-circle-up', 'fa-arrow-circle-down', 'fa-arrow-circle-left', 'fa-arrow-circle-right', 'fa-arrow-circle-up', 'fa-arrow-down', 'fa-arrow-left', 'fa-arrow-right', 'fa-arrow-up', 'fa-arrows-alt', 'fa-arrows-alt-h', 'fa-arrows-alt-v', 'fa-assistive-listening-systems', 'fa-asterisk', 'fa-at', 'fa-atlas', 'fa-atom', 'fa-audio-description', 'fa-award', 'fa-backspace', 'fa-backward', 'fa-balance-scale', 'fa-ban', 'fa-band-aid', 'fa-barcode', 'fa-bars', 'fa-baseball-ball', 'fa-basketball-ball', 'fa-bath', 'fa-battery-empty', 'fa-battery-full', 'fa-battery-half', 'fa-battery-quarter', 'fa-battery-three-quarters', 'fa-bed', 'fa-beer', 'fa-bell', 'fa-bell-slash', 'fa-bezier-curve', 'fa-bicycle', 'fa-binoculars', 'fa-birthday-cake', 'fa-blender', 'fa-blind', 'fa-bold', 'fa-bolt', 'fa-bomb', 'fa-bone', 'fa-bong', 'fa-book', 'fa-book-open', 'fa-book-reader', 'fa-bookmark', 'fa-bowling-ball', 'fa-box', 'fa-box-open', 'fa-boxes', 'fa-braille', 'fa-brain', 'fa-briefcase', 'fa-briefcase-medical', 'fa-broadcast-tower', 'fa-broom', 'fa-brush', 'fa-bug', 'fa-building', 'fa-bullhorn', 'fa-bullseye', 'fa-burn', 'fa-bus', 'fa-bus-alt', 'fa-calculator', 'fa-calendar', 'fa-calendar-alt', 'fa-calendar-check', 'fa-calendar-minus', 'fa-calendar-plus', 'fa-calendar-times', 'fa-camera', 'fa-camera-retro', 'fa-cannabis', 'fa-capsules', 'fa-car', 'fa-car-alt', 'fa-car-battery', 'fa-car-crash', 'fa-car-side', 'fa-caret-down', 'fa-caret-left', 'fa-caret-right', 'fa-caret-square-down', 'fa-caret-square-left', 'fa-caret-square-right', 'fa-caret-square-up', 'fa-caret-up', 'fa-cart-arrow-down', 'fa-cart-plus', 'fa-certificate', 'fa-chalkboard', 'fa-chalkboard-teacher', 'fa-charging-station', 'fa-chart-area', 'fa-chart-bar', 'fa-chart-line', 'fa-chart-pie', 'fa-check', 'fa-check-circle', 'fa-check-double', 'fa-check-square', 'fa-chess', 'fa-chess-bishop', 'fa-chess-board', 'fa-chess-king', 'fa-chess-knight', 'fa-chess-pawn', 'fa-chess-queen', 'fa-chess-rook', 'fa-chevron-circle-down', 'fa-chevron-circle-left', 'fa-chevron-circle-right', 'fa-chevron-circle-up', 'fa-chevron-down', 'fa-chevron-left', 'fa-chevron-right', 'fa-chevron-up', 'fa-child', 'fa-church', 'fa-circle', 'fa-circle-notch', 'fa-clipboard', 'fa-clipboard-check', 'fa-clipboard-list', 'fa-clock', 'fa-clone', 'fa-closed-captioning', 'fa-cloud', 'fa-cloud-download-alt', 'fa-cloud-upload-alt', 'fa-cocktail', 'fa-code', 'fa-code-branch', 'fa-coffee', 'fa-cog', 'fa-cogs', 'fa-coins', 'fa-columns', 'fa-comment', 'fa-comment-alt', 'fa-comment-dots', 'fa-comment-slash', 'fa-comments', 'fa-compact-disc', 'fa-compass', 'fa-compress', 'fa-concierge-bell', 'fa-cookie', 'fa-cookie-bite', 'fa-copy', 'fa-copyright', 'fa-couch', 'fa-credit-card', 'fa-crop', 'fa-crop-alt', 'fa-crosshairs', 'fa-crow', 'fa-crown', 'fa-cube', 'fa-cubes', 'fa-cut', 'fa-database', 'fa-deaf', 'fa-desktop', 'fa-diagnoses', 'fa-dice', 'fa-dice-five', 'fa-dice-four', 'fa-dice-one', 'fa-dice-six', 'fa-dice-three', 'fa-dice-two', 'fa-digital-tachograph', 'fa-directions', 'fa-divide', 'fa-dizzy', 'fa-dna', 'fa-dollar-sign', 'fa-dolly', 'fa-dolly-flatbed', 'fa-donate', 'fa-door-closed', 'fa-door-open', 'fa-dot-circle', 'fa-dove', 'fa-download', 'fa-drafting-compass', 'fa-draw-polygon', 'fa-drum', 'fa-drum-steelpan', 'fa-dumbbell', 'fa-edit', 'fa-eject', 'fa-ellipsis-h', 'fa-ellipsis-v', 'fa-envelope', 'fa-envelope-open', 'fa-envelope-square', 'fa-equals', 'fa-eraser', 'fa-euro-sign', 'fa-exchange-alt', 'fa-exclamation', 'fa-exclamation-circle', 'fa-exclamation-triangle', 'fa-expand', 'fa-expand-arrows-alt', 'fa-external-link-alt', 'fa-external-link-square-alt', 'fa-eye', 'fa-eye-dropper', 'fa-eye-slash', 'fa-fast-backward', 'fa-fast-forward', 'fa-fax', 'fa-feather', 'fa-feather-alt', 'fa-female', 'fa-fighter-jet', 'fa-file', 'fa-file-alt', 'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-contract', 'fa-file-download', 'fa-file-excel', 'fa-file-export', 'fa-file-image', 'fa-file-import', 'fa-file-invoice', 'fa-file-invoice-dollar', 'fa-file-medical', 'fa-file-medical-alt', 'fa-file-pdf', 'fa-file-powerpoint', 'fa-file-prescription', 'fa-file-signature', 'fa-file-upload', 'fa-file-video', 'fa-file-word', 'fa-fill', 'fa-fill-drip', 'fa-film', 'fa-filter', 'fa-fingerprint', 'fa-fire', 'fa-fire-extinguisher', 'fa-first-aid', 'fa-fish', 'fa-flag', 'fa-flag-checkered', 'fa-flask', 'fa-flushed', 'fa-folder', 'fa-folder-open', 'fa-font', 'fa-football-ball', 'fa-forward', 'fa-frog', 'fa-frown', 'fa-frown-open', 'fa-futbol', 'fa-gamepad', 'fa-gas-pump', 'fa-gavel', 'fa-gem', 'fa-genderless', 'fa-gift', 'fa-glass-martini', 'fa-glass-martini-alt', 'fa-glasses', 'fa-globe', 'fa-globe-africa', 'fa-globe-americas', 'fa-globe-asia', 'fa-golf-ball', 'fa-graduation-cap', 'fa-greater-than', 'fa-greater-than-equal', 'fa-grimace', 'fa-grin', 'fa-grin-alt', 'fa-grin-beam', 'fa-grin-beam-sweat', 'fa-grin-hearts', 'fa-grin-squint', 'fa-grin-squint-tears', 'fa-grin-stars', 'fa-grin-tears', 'fa-grin-tongue', 'fa-grin-tongue-squint', 'fa-grin-tongue-wink', 'fa-grin-wink', 'fa-grip-horizontal', 'fa-grip-vertical', 'fa-h-square', 'fa-hand-holding', 'fa-hand-holding-heart', 'fa-hand-holding-usd', 'fa-hand-lizard', 'fa-hand-paper', 'fa-hand-peace', 'fa-hand-point-down', 'fa-hand-point-left', 'fa-hand-point-right', 'fa-hand-point-up', 'fa-hand-pointer', 'fa-hand-rock', 'fa-hand-scissors', 'fa-hand-spock', 'fa-hands', 'fa-hands-helping', 'fa-handshake', 'fa-hashtag', 'fa-hdd', 'fa-heading', 'fa-headphones', 'fa-headphones-alt', 'fa-headset', 'fa-heart', 'fa-heartbeat', 'fa-helicopter', 'fa-highlighter', 'fa-history', 'fa-hockey-puck', 'fa-home', 'fa-hospital', 'fa-hospital-alt', 'fa-hospital-symbol', 'fa-hot-tub', 'fa-hotel', 'fa-hourglass', 'fa-hourglass-end', 'fa-hourglass-half', 'fa-hourglass-start', 'fa-i-cursor', 'fa-id-badge', 'fa-id-card', 'fa-id-card-alt', 'fa-image', 'fa-images', 'fa-inbox', 'fa-indent', 'fa-industry', 'fa-infinity', 'fa-info', 'fa-info-circle', 'fa-italic', 'fa-joint', 'fa-key', 'fa-keyboard', 'fa-kiss', 'fa-kiss-beam', 'fa-kiss-wink-heart', 'fa-kiwi-bird', 'fa-language', 'fa-laptop', 'fa-laptop-code', 'fa-laugh', 'fa-laugh-beam', 'fa-laugh-squint', 'fa-laugh-wink', 'fa-layer-group', 'fa-leaf', 'fa-lemon', 'fa-less-than', 'fa-less-than-equal', 'fa-level-down-alt', 'fa-level-up-alt', 'fa-life-ring', 'fa-lightbulb', 'fa-link', 'fa-lira-sign', 'fa-list', 'fa-list-alt', 'fa-list-ol', 'fa-list-ul', 'fa-location-arrow', 'fa-lock', 'fa-lock-open', 'fa-long-arrow-alt-down', 'fa-long-arrow-alt-left', 'fa-long-arrow-alt-right', 'fa-long-arrow-alt-up', 'fa-low-vision', 'fa-luggage-cart', 'fa-magic', 'fa-magnet', 'fa-male', 'fa-map', 'fa-map-marked', 'fa-map-marked-alt', 'fa-map-marker', 'fa-map-marker-alt', 'fa-map-pin', 'fa-map-signs', 'fa-marker', 'fa-mars', 'fa-mars-double', 'fa-mars-stroke', 'fa-mars-stroke-h', 'fa-mars-stroke-v', 'fa-medal', 'fa-medkit', 'fa-meh', 'fa-meh-blank', 'fa-meh-rolling-eyes', 'fa-memory', 'fa-mercury', 'fa-microchip', 'fa-microphone', 'fa-microphone-alt', 'fa-microphone-alt-slash', 'fa-microphone-slash', 'fa-microscope', 'fa-minus', 'fa-minus-circle', 'fa-minus-square', 'fa-mobile', 'fa-mobile-alt', 'fa-money-bill', 'fa-money-bill-alt', 'fa-money-bill-wave', 'fa-money-bill-wave-alt', 'fa-money-check', 'fa-money-check-alt', 'fa-monument', 'fa-moon', 'fa-mortar-pestle', 'fa-motorcycle', 'fa-mouse-pointer', 'fa-music', 'fa-neuter', 'fa-newspaper', 'fa-not-equal', 'fa-notes-medical', 'fa-object-group', 'fa-object-ungroup', 'fa-oil-can', 'fa-outdent', 'fa-paint-brush', 'fa-paint-roller', 'fa-palette', 'fa-pallet', 'fa-paper-plane', 'fa-paperclip', 'fa-parachute-box', 'fa-paragraph', 'fa-parking', 'fa-passport', 'fa-paste', 'fa-pause', 'fa-pause-circle', 'fa-paw', 'fa-pen', 'fa-pen-alt', 'fa-pen-fancy', 'fa-pen-nib', 'fa-pen-square', 'fa-pencil-alt', 'fa-pencil-ruler', 'fa-people-carry', 'fa-percent', 'fa-percentage', 'fa-phone', 'fa-phone-slash', 'fa-phone-square', 'fa-phone-volume', 'fa-piggy-bank', 'fa-pills', 'fa-plane', 'fa-plane-arrival', 'fa-plane-departure', 'fa-play', 'fa-play-circle', 'fa-plug', 'fa-plus', 'fa-plus-circle', 'fa-plus-square', 'fa-podcast', 'fa-poo', 'fa-poop', 'fa-portrait', 'fa-pound-sign', 'fa-power-off', 'fa-prescription', 'fa-prescription-bottle', 'fa-prescription-bottle-alt', 'fa-print', 'fa-procedures', 'fa-project-diagram', 'fa-puzzle-piece', 'fa-qrcode', 'fa-question', 'fa-question-circle', 'fa-quidditch', 'fa-quote-left', 'fa-quote-right', 'fa-random', 'fa-receipt', 'fa-recycle', 'fa-redo', 'fa-redo-alt', 'fa-registered', 'fa-reply', 'fa-reply-all', 'fa-retweet', 'fa-ribbon', 'fa-road', 'fa-robot', 'fa-rocket', 'fa-route', 'fa-rss', 'fa-rss-square', 'fa-ruble-sign', 'fa-ruler', 'fa-ruler-combined', 'fa-ruler-horizontal', 'fa-ruler-vertical', 'fa-rupee-sign', 'fa-sad-cry', 'fa-sad-tear', 'fa-save', 'fa-school', 'fa-screwdriver', 'fa-search', 'fa-search-minus', 'fa-search-plus', 'fa-seedling', 'fa-server', 'fa-shapes', 'fa-share', 'fa-share-alt', 'fa-share-alt-square', 'fa-share-square', 'fa-shekel-sign', 'fa-shield-alt', 'fa-ship', 'fa-shipping-fast', 'fa-shoe-prints', 'fa-shopping-bag', 'fa-shopping-basket', 'fa-shopping-cart', 'fa-shower', 'fa-shuttle-van', 'fa-sign', 'fa-sign-in-alt', 'fa-sign-language', 'fa-sign-out-alt', 'fa-signal', 'fa-signature', 'fa-sitemap', 'fa-skull', 'fa-sliders-h', 'fa-smile', 'fa-smile-beam', 'fa-smile-wink', 'fa-smoking', 'fa-smoking-ban', 'fa-snowflake', 'fa-solar-panel', 'fa-sort', 'fa-sort-alpha-down', 'fa-sort-alpha-up', 'fa-sort-amount-down', 'fa-sort-amount-up', 'fa-sort-down', 'fa-sort-numeric-down', 'fa-sort-numeric-up', 'fa-sort-up', 'fa-spa', 'fa-space-shuttle', 'fa-spinner', 'fa-splotch', 'fa-spray-can', 'fa-square', 'fa-square-full', 'fa-stamp', 'fa-star', 'fa-star-half', 'fa-star-half-alt', 'fa-star-of-life', 'fa-step-backward', 'fa-step-forward', 'fa-stethoscope', 'fa-sticky-note', 'fa-stop', 'fa-stop-circle', 'fa-stopwatch', 'fa-store', 'fa-store-alt', 'fa-stream', 'fa-street-view', 'fa-strikethrough', 'fa-stroopwafel', 'fa-subscript', 'fa-subway', 'fa-suitcase', 'fa-suitcase-rolling', 'fa-sun', 'fa-superscript', 'fa-surprise', 'fa-swatchbook', 'fa-swimmer', 'fa-swimming-pool', 'fa-sync', 'fa-sync-alt', 'fa-syringe', 'fa-table', 'fa-table-tennis', 'fa-tablet', 'fa-tablet-alt', 'fa-tablets', 'fa-tachometer-alt', 'fa-tag', 'fa-tags', 'fa-tape', 'fa-tasks', 'fa-taxi', 'fa-teeth', 'fa-teeth-open', 'fa-terminal', 'fa-text-height', 'fa-text-width', 'fa-th', 'fa-th-large', 'fa-th-list', 'fa-theater-masks', 'fa-thermometer', 'fa-thermometer-empty', 'fa-thermometer-full', 'fa-thermometer-half', 'fa-thermometer-quarter', 'fa-thermometer-three-quarters', 'fa-thumbs-down', 'fa-thumbs-up', 'fa-thumbtack', 'fa-ticket-alt', 'fa-times', 'fa-times-circle', 'fa-tint', 'fa-tint-slash', 'fa-tired', 'fa-toggle-off', 'fa-toggle-on', 'fa-toolbox', 'fa-tooth', 'fa-trademark', 'fa-traffic-light', 'fa-train', 'fa-transgender', 'fa-transgender-alt', 'fa-trash', 'fa-trash-alt', 'fa-tree', 'fa-trophy', 'fa-truck', 'fa-truck-loading', 'fa-truck-monster', 'fa-truck-moving', 'fa-truck-pickup', 'fa-tshirt', 'fa-tty', 'fa-tv', 'fa-umbrella', 'fa-umbrella-beach', 'fa-underline', 'fa-undo', 'fa-undo-alt', 'fa-universal-access', 'fa-university', 'fa-unlink', 'fa-unlock', 'fa-unlock-alt', 'fa-upload', 'fa-user', 'fa-user-alt', 'fa-user-alt-slash', 'fa-user-astronaut', 'fa-user-check', 'fa-user-circle', 'fa-user-clock', 'fa-user-cog', 'fa-user-edit', 'fa-user-friends', 'fa-user-graduate', 'fa-user-lock', 'fa-user-md', 'fa-user-minus', 'fa-user-ninja', 'fa-user-plus', 'fa-user-secret', 'fa-user-shield', 'fa-user-slash', 'fa-user-tag', 'fa-user-tie', 'fa-user-times', 'fa-users', 'fa-users-cog', 'fa-utensil-spoon', 'fa-utensils', 'fa-vector-square', 'fa-venus', 'fa-venus-double', 'fa-venus-mars', 'fa-vial', 'fa-vials', 'fa-video', 'fa-video-slash', 'fa-volleyball-ball', 'fa-volume-down', 'fa-volume-off', 'fa-volume-up', 'fa-walking', 'fa-wallet', 'fa-warehouse', 'fa-weight', 'fa-weight-hanging', 'fa-wheelchair', 'fa-wifi', 'fa-window-close', 'fa-window-maximize', 'fa-window-minimize', 'fa-window-restore', 'fa-wine-glass', 'fa-wine-glass-alt', 'fa-won-sign', 'fa-wrench', 'fa-x-ray', 'fa-yen-sign');
            return $fa_icons_solid;
        }
    endif;


    if ( ! function_exists( 'pofo_fontawesome_reg' ) ) :
        function pofo_fontawesome_reg() {
            $fa_icons_reg = array('fa-address-book', 'fa-address-card', 'fa-angry', 'fa-arrow-alt-circle-down', 'fa-arrow-alt-circle-left', 'fa-arrow-alt-circle-right', 'fa-arrow-alt-circle-up', 'fa-bell', 'fa-bell-slash', 'fa-bookmark', 'fa-building', 'fa-calendar', 'fa-calendar-alt', 'fa-calendar-check', 'fa-calendar-minus', 'fa-calendar-plus', 'fa-calendar-times', 'fa-caret-square-down', 'fa-caret-square-left', 'fa-caret-square-right', 'fa-caret-square-up', 'fa-chart-bar', 'fa-check-circle', 'fa-check-square', 'fa-circle', 'fa-clipboard', 'fa-clock', 'fa-clone', 'fa-closed-captioning', 'fa-comment', 'fa-comment-alt', 'fa-comment-dots', 'fa-comments', 'fa-compass', 'fa-copy', 'fa-copyright', 'fa-credit-card', 'fa-dizzy', 'fa-dot-circle', 'fa-edit', 'fa-envelope', 'fa-envelope-open', 'fa-eye', 'fa-eye-slash', 'fa-file', 'fa-file-alt', 'fa-file-archive', 'fa-file-audio', 'fa-file-code', 'fa-file-excel', 'fa-file-image', 'fa-file-pdf', 'fa-file-powerpoint', 'fa-file-video', 'fa-file-word', 'fa-flag', 'fa-flushed', 'fa-folder', 'fa-folder-open', 'fa-frown', 'fa-frown-open', 'fa-futbol', 'fa-gem', 'fa-grimace', 'fa-grin', 'fa-grin-alt', 'fa-grin-beam', 'fa-grin-beam-sweat', 'fa-grin-hearts', 'fa-grin-squint', 'fa-grin-squint-tears', 'fa-grin-stars', 'fa-grin-tears', 'fa-grin-tongue', 'fa-grin-tongue-squint', 'fa-grin-tongue-wink', 'fa-grin-wink', 'fa-hand-lizard', 'fa-hand-paper', 'fa-hand-peace', 'fa-hand-point-down', 'fa-hand-point-left', 'fa-hand-point-right', 'fa-hand-point-up', 'fa-hand-pointer', 'fa-hand-rock', 'fa-hand-scissors', 'fa-hand-spock', 'fa-handshake', 'fa-hdd', 'fa-heart', 'fa-hospital', 'fa-hourglass', 'fa-id-badge', 'fa-id-card', 'fa-image', 'fa-images', 'fa-keyboard', 'fa-kiss', 'fa-kiss-beam', 'fa-kiss-wink-heart', 'fa-laugh', 'fa-laugh-beam', 'fa-laugh-squint', 'fa-laugh-wink', 'fa-lemon', 'fa-life-ring', 'fa-lightbulb', 'fa-list-alt', 'fa-map', 'fa-meh', 'fa-meh-blank', 'fa-meh-rolling-eyes', 'fa-minus-square', 'fa-money-bill-alt', 'fa-moon', 'fa-newspaper', 'fa-object-group', 'fa-object-ungroup', 'fa-paper-plane', 'fa-pause-circle', 'fa-play-circle', 'fa-plus-square', 'fa-question-circle', 'fa-registered', 'fa-sad-cry', 'fa-sad-tear', 'fa-save', 'fa-share-square', 'fa-smile', 'fa-smile-beam', 'fa-smile-wink', 'fa-snowflake', 'fa-square', 'fa-star', 'fa-star-half', 'fa-sticky-note', 'fa-stop-circle', 'fa-sun', 'fa-surprise', 'fa-thumbs-down', 'fa-thumbs-up', 'fa-times-circle', 'fa-tired', 'fa-trash-alt', 'fa-user', 'fa-user-circle', 'fa-window-close', 'fa-window-maximize', 'fa-window-minimize', 'fa-window-restore');
            return $fa_icons_reg;
        }
    endif;

    if ( ! function_exists( 'pofo_fontawesome_brand' ) ) :
        function pofo_fontawesome_brand() {
            $fa_icons_brand = array('fa-500px', 'fa-accessible-icon', 'fa-accusoft', 'fa-adn', 'fa-adversal', 'fa-affiliatetheme', 'fa-algolia', 'fa-amazon', 'fa-amazon-pay', 'fa-amilia', 'fa-android', 'fa-angellist', 'fa-angrycreative', 'fa-angular', 'fa-app-store', 'fa-app-store-ios', 'fa-apper', 'fa-apple', 'fa-apple-pay', 'fa-asymmetrik', 'fa-audible', 'fa-autoprefixer', 'fa-avianex', 'fa-aviato', 'fa-aws', 'fa-bandcamp', 'fa-behance', 'fa-behance-square', 'fa-bimobject', 'fa-bitbucket', 'fa-bitcoin', 'fa-bity', 'fa-black-tie', 'fa-blackberry', 'fa-blogger', 'fa-blogger-b', 'fa-bluetooth', 'fa-bluetooth-b', 'fa-btc', 'fa-buromobelexperte', 'fa-buysellads', 'fa-cc-amazon-pay', 'fa-cc-amex', 'fa-cc-apple-pay', 'fa-cc-diners-club', 'fa-cc-discover', 'fa-cc-jcb', 'fa-cc-mastercard', 'fa-cc-paypal', 'fa-cc-stripe', 'fa-cc-visa', 'fa-centercode', 'fa-chrome', 'fa-cloudscale', 'fa-cloudsmith', 'fa-cloudversify', 'fa-codepen', 'fa-codiepie', 'fa-connectdevelop', 'fa-contao', 'fa-cpanel', 'fa-creative-commons', 'fa-creative-commons-by', 'fa-creative-commons-nc', 'fa-creative-commons-nc-eu', 'fa-creative-commons-nc-jp', 'fa-creative-commons-nd', 'fa-creative-commons-pd', 'fa-creative-commons-pd-alt', 'fa-creative-commons-remix', 'fa-creative-commons-sa', 'fa-creative-commons-sampling', 'fa-creative-commons-sampling-plus', 'fa-creative-commons-share', 'fa-css3', 'fa-css3-alt', 'fa-cuttlefish', 'fa-d-and-d', 'fa-dashcube', 'fa-delicious', 'fa-deploydog', 'fa-deskpro', 'fa-deviantart', 'fa-digg', 'fa-digital-ocean', 'fa-discord', 'fa-discourse', 'fa-dochub', 'fa-docker', 'fa-draft2digital', 'fa-dribbble', 'fa-dribbble-square', 'fa-dropbox', 'fa-drupal', 'fa-dyalog', 'fa-earlybirds', 'fa-ebay', 'fa-edge', 'fa-elementor', 'fa-ello', 'fa-ember', 'fa-empire', 'fa-envira', 'fa-erlang', 'fa-ethereum', 'fa-etsy', 'fa-expeditedssl', 'fa-facebook', 'fa-facebook-f', 'fa-facebook-messenger', 'fa-facebook-square', 'fa-firefox', 'fa-first-order', 'fa-first-order-alt', 'fa-firstdraft', 'fa-flickr', 'fa-flipboard', 'fa-fly', 'fa-font-awesome', 'fa-font-awesome-alt', 'fa-font-awesome-flag', 'fa-fonticons', 'fa-fonticons-fi', 'fa-fort-awesome', 'fa-fort-awesome-alt', 'fa-forumbee', 'fa-foursquare', 'fa-free-code-camp', 'fa-freebsd', 'fa-fulcrum', 'fa-galactic-republic', 'fa-galactic-senate', 'fa-get-pocket', 'fa-gg', 'fa-gg-circle', 'fa-git', 'fa-git-square', 'fa-github', 'fa-github-alt', 'fa-github-square', 'fa-gitkraken', 'fa-gitlab', 'fa-gitter', 'fa-glide', 'fa-glide-g', 'fa-gofore', 'fa-goodreads', 'fa-goodreads-g', 'fa-google', 'fa-google-drive', 'fa-google-play', 'fa-google-plus', 'fa-google-plus-g', 'fa-google-plus-square', 'fa-google-wallet', 'fa-gratipay', 'fa-grav', 'fa-gripfire', 'fa-grunt', 'fa-gulp', 'fa-hacker-news', 'fa-hacker-news-square', 'fa-hackerrank', 'fa-hips', 'fa-hire-a-helper', 'fa-hooli', 'fa-hornbill', 'fa-hotjar', 'fa-houzz', 'fa-html5', 'fa-hubspot', 'fa-imdb', 'fa-instagram', 'fa-internet-explorer', 'fa-ioxhost', 'fa-itunes', 'fa-itunes-note', 'fa-java', 'fa-jedi-order', 'fa-jenkins', 'fa-joget', 'fa-joomla', 'fa-js', 'fa-js-square', 'fa-jsfiddle', 'fa-kaggle', 'fa-keybase', 'fa-keycdn', 'fa-kickstarter', 'fa-kickstarter-k', 'fa-korvue', 'fa-laravel', 'fa-lastfm', 'fa-lastfm-square', 'fa-leanpub', 'fa-less', 'fa-line', 'fa-linkedin', 'fa-linkedin-in', 'fa-linode', 'fa-linux', 'fa-lyft', 'fa-magento', 'fa-mailchimp', 'fa-mandalorian', 'fa-markdown', 'fa-mastodon', 'fa-maxcdn', 'fa-medapps', 'fa-medium', 'fa-medium-m', 'fa-medrt', 'fa-meetup', 'fa-megaport', 'fa-microsoft', 'fa-mix', 'fa-mixcloud', 'fa-mizuni', 'fa-modx', 'fa-monero', 'fa-napster', 'fa-neos', 'fa-nimblr', 'fa-nintendo-switch', 'fa-node', 'fa-node-js', 'fa-npm', 'fa-ns8', 'fa-nutritionix', 'fa-odnoklassniki', 'fa-odnoklassniki-square', 'fa-old-republic', 'fa-opencart', 'fa-openid', 'fa-opera', 'fa-optin-monster', 'fa-osi', 'fa-page4', 'fa-pagelines', 'fa-palfed', 'fa-patreon', 'fa-paypal', 'fa-periscope', 'fa-phabricator', 'fa-phoenix-framework', 'fa-phoenix-squadron', 'fa-php', 'fa-pied-piper', 'fa-pied-piper-alt', 'fa-pied-piper-hat', 'fa-pied-piper-pp', 'fa-pinterest', 'fa-pinterest-p', 'fa-pinterest-square', 'fa-playstation', 'fa-product-hunt', 'fa-pushed', 'fa-python', 'fa-qq', 'fa-quinscape', 'fa-quora', 'fa-r-project', 'fa-ravelry', 'fa-react', 'fa-readme', 'fa-rebel', 'fa-red-river', 'fa-reddit', 'fa-reddit-alien', 'fa-reddit-square', 'fa-rendact', 'fa-renren', 'fa-replyd', 'fa-researchgate', 'fa-resolving', 'fa-rev', 'fa-rocketchat', 'fa-rockrms', 'fa-safari', 'fa-sass', 'fa-schlix', 'fa-scribd', 'fa-searchengin', 'fa-sellcast', 'fa-sellsy', 'fa-servicestack', 'fa-shirtsinbulk', 'fa-shopware', 'fa-simplybuilt', 'fa-sistrix', 'fa-sith', 'fa-skyatlas', 'fa-skype', 'fa-slack', 'fa-slack-hash', 'fa-slideshare', 'fa-snapchat', 'fa-snapchat-ghost', 'fa-snapchat-square', 'fa-soundcloud', 'fa-speakap', 'fa-spotify', 'fa-squarespace', 'fa-stack-exchange', 'fa-stack-overflow', 'fa-staylinked', 'fa-steam', 'fa-steam-square', 'fa-steam-symbol', 'fa-sticker-mule', 'fa-strava', 'fa-stripe', 'fa-stripe-s', 'fa-studiovinari', 'fa-stumbleupon', 'fa-stumbleupon-circle', 'fa-superpowers', 'fa-supple', 'fa-teamspeak', 'fa-telegram', 'fa-telegram-plane', 'fa-tencent-weibo', 'fa-themeco', 'fa-themeisle', 'fa-trade-federation', 'fa-trello', 'fa-tripadvisor', 'fa-tumblr', 'fa-tumblr-square', 'fa-twitch', 'fa-twitter', 'fa-twitter-square', 'fa-typo3', 'fa-uber', 'fa-uikit', 'fa-uniregistry', 'fa-untappd', 'fa-usb', 'fa-ussunnah', 'fa-vaadin', 'fa-viacoin', 'fa-viadeo', 'fa-viadeo-square', 'fa-viber', 'fa-vimeo', 'fa-vimeo-square', 'fa-vimeo-v', 'fa-vine', 'fa-vk', 'fa-vnv', 'fa-vuejs', 'fa-weebly', 'fa-weibo', 'fa-weixin', 'fa-whatsapp', 'fa-whatsapp-square', 'fa-whmcs', 'fa-wikipedia-w', 'fa-windows', 'fa-wix', 'fa-wolf-pack-battalion', 'fa-wordpress', 'fa-wordpress-simple', 'fa-wpbeginner', 'fa-wpexplorer', 'fa-wpforms', 'fa-xbox', 'fa-xing', 'fa-xing-square', 'fa-y-combinator', 'fa-yahoo', 'fa-yandex', 'fa-yandex-international', 'fa-yelp', 'fa-yoast', 'fa-youtube', 'fa-youtube-square', 'fa-zhihu');
            return $fa_icons_brand;
        }
    endif;

    if ( ! function_exists( 'pofo_fontawesome_old' ) ) :
        function pofo_fontawesome_old() {
            $fa_icon_old = array('address-book-o' => 'far fa-address-book', 'fa-address-card-o' => 'far fa-address-card', 'fa-area-chart' => 'fas fa-chart-area', 'fa-arrow-circle-o-down' => 'far fa-arrow-alt-circle-down', 'fa-arrow-circle-o-left' => 'far fa-arrow-alt-circle-left', 'fa-arrow-circle-o-right' => 'far fa-arrow-alt-circle-right', 'fa-arrow-circle-o-up' => 'far fa-arrow-alt-circle-up', 'fa-arrows-alt' => 'fas fa-expand-arrows-alt', 'fa-arrows-h' => 'fas fa-arrows-alt-h', 'fa-arrows-v' => 'fas fa-arrows-alt-v', 'fa-arrows' => 'fas fa-arrows-alt', 'fa-asl-interpreting' => 'fas fa-american-sign-language-interpreting', 'fa-automobile' => 'fas fa-car', 'fa-bank' => 'fas fa-university', 'fa-bar-chart-o' => 'far fa-chart-bar', 'fa-bar-chart' => 'far fa-chart-bar', 'fa-bathtub' => 'fas fa-bath', 'fa-battery-0' => 'fas fa-battery-empty', 'fa-battery-1' => 'fas fa-battery-quarter', 'fa-battery-2' => 'fas fa-battery-half', 'fa-battery-3' => 'fas fa-battery-three-quarters', 'fa-battery-4' => 'fas fa-battery-full', 'fa-battery' => 'fas fa-battery-full', 'fa-bell-o' => 'far fa-bell', 'fa-bell-slash-o' => 'far fa-bell-slash', 'fa-bitbucket-square' => 'fab fa-bitbucket', 'fa-bitcoin' => 'fab fa-btc', 'fa-bookmark-o' => 'far fa-bookmark', 'fa-building-o' => 'far fa-building', 'fa-cab' => 'fas fa-taxi', 'fa-calendar-check-o' => 'far fa-calendar-check', 'fa-calendar-minus-o' => 'far fa-calendar-minus', 'fa-calendar-o' => 'far fa-calendar', 'fa-calendar-plus-o' => 'far fa-calendar-plus', 'fa-calendar-times-o' => 'far fa-calendar-times', 'fa-calendar' => 'fas fa-calendar-alt', 'fa-caret-square-o-down' => 'far fa-caret-square-down', 'fa-caret-square-o-left' => 'far fa-caret-square-left', 'fa-caret-square-o-right' => 'far fa-caret-square-right', 'fa-caret-square-o-up' => 'far fa-caret-square-up', 'fa-cc' => 'far fa-closed-captioning', 'fa-chain-broken' => 'fas fa-unlink', 'fa-chain' => 'fas fa-link', 'fa-check-circle-o' => 'far fa-check-circle', 'fa-check-square-o' => 'far fa-check-square', 'fa-circle-o-notch' => 'fas fa-circle-notch', 'fa-circle-o' => 'far fa-circle', 'fa-circle-thin' => 'far fa-circle', 'fa-clock-o' => 'far fa-clock', 'fa-close' => 'fas fa-times', 'fa-cloud-download' => 'fas fa-cloud-download-alt', 'fa-cloud-upload' => 'fas fa-cloud-upload-alt', 'fa-cny' => 'fas fa-yen-sign', 'fa-code-fork' => 'fas fa-code-branch', 'fa-comment-o' => 'far fa-comment', 'fa-commenting-o' => 'far fa-comment-alt', 'fa-commenting' => 'fas fa-comment-alt', 'fa-comments-o' => 'far fa-comments', 'fa-credit-card-alt' => 'fas fa-credit-card', 'fa-cutlery' => 'fas fa-utensils', 'fa-dashboard' => 'fas fa-tachometer-alt', 'fa-deafness' => 'fas fa-deaf', 'fa-dedent' => 'fas fa-outdent', 'fa-diamond' => 'far fa-gem', 'fa-dollar' => 'fas fa-dollar-sign', 'fa-dot-circle-o' => 'far fa-dot-circle', 'fa-drivers-license-o' => 'far fa-id-card', 'fa-drivers-license' => 'fas fa-id-card', 'fa-eercast' => 'fab fa-sellcast', 'fa-envelope-o' => 'far fa-envelope', 'fa-envelope-open-o' => 'far fa-envelope-open', 'fa-eur' => 'fas fa-euro-sign', 'fa-euro' => 'fas fa-euro-sign', 'fa-exchange' => 'fas fa-exchange-alt', 'fa-external-link-square' => 'fas fa-external-link-square-alt', 'fa-external-link' => 'fas fa-external-link-alt', 'fa-eyedropper' => 'fas fa-eye-dropper', 'fa-fa' => 'fab fa-font-awesome', 'fa-facebook-f' => 'fab fa-facebook-f', 'fa-facebook-official' => 'fab fa-facebook', 'fa-facebook' => 'fab fa-facebook-f', 'fa-feed' => 'fas fa-rss', 'fa-file-archive-o' => 'far fa-file-archive', 'fa-file-audio-o' => 'far fa-file-audio', 'fa-file-code-o' => 'far fa-file-code', 'fa-file-excel-o' => 'far fa-file-excel', 'fa-file-image-o' => 'far fa-file-image', 'fa-file-movie-o' => 'far fa-file-video', 'fa-file-o' => 'far fa-file', 'fa-file-pdf-o' => 'far fa-file-pdf', 'fa-file-photo-o' => 'far fa-file-image', 'fa-file-picture-o' => 'far fa-file-image', 'fa-file-powerpoint-o' => 'far fa-file-powerpoint', 'fa-file-sound-o' => 'far fa-file-audio', 'fa-file-text-o' => 'far fa-file-alt', 'fa-file-text' => 'fas fa-file-alt', 'fa-file-video-o' => 'far fa-file-video', 'fa-file-word-o' => 'far fa-file-word', 'fa-file-zip-o' => 'far fa-file-archive', 'fa-files-o' => 'far fa-copy', 'fa-flag-o' => 'far fa-flag', 'fa-flash' => 'fas fa-bolt', 'fa-floppy-o' => 'far fa-save', 'fa-folder-o' => 'far fa-folder', 'fa-folder-open-o' => 'far fa-folder-open', 'fa-frown-o' => 'far fa-frown', 'fa-futbol-o' => 'far fa-futbol', 'fa-gbp' => 'fas fa-pound-sign', 'fa-ge' => 'fab fa-empire', 'fa-gear' => 'fas fa-cog', 'fa-gears' => 'fas fa-cogs', 'fa-gittip' => 'fab fa-gratipay', 'fa-glass' => 'fas fa-glass-martini', 'fa-google-plus-circle' => 'fab fa-google-plus', 'fa-google-plus-official' => 'fab fa-google-plus', 'fa-google-plus' => 'fab fa-google-plus-g', 'fa-group' => 'fas fa-users', 'fa-hand-grab-o' => 'far fa-hand-rock', 'fa-hand-lizard-o' => 'far fa-hand-lizard', 'fa-hand-o-down' => 'far fa-hand-point-down', 'fa-hand-o-left' => 'far fa-hand-point-left', 'fa-hand-o-right' => 'far fa-hand-point-right', 'fa-hand-o-up' => 'far fa-hand-point-up', 'fa-hand-paper-o' => 'far fa-hand-paper', 'fa-hand-peace-o' => 'far fa-hand-peace', 'fa-hand-pointer-o' => 'far fa-hand-pointer', 'fa-hand-rock-o' => 'far fa-hand-rock', 'fa-hand-scissors-o' => 'far fa-hand-scissors', 'fa-hand-spock-o' => 'far fa-hand-spock', 'fa-hand-stop-o' => 'far fa-hand-paper', 'fa-handshake-o' => 'far fa-handshake', 'fa-hard-of-hearing' => 'fas fa-deaf', 'fa-hdd-o' => 'far fa-hdd', 'fa-header' => 'fas fa-heading', 'fa-heart-o' => 'far fa-heart', 'fa-hospital-o' => 'far fa-hospital', 'fa-hotel' => 'fas fa-bed', 'fa-hourglass-1' => 'fas fa-hourglass-start', 'fa-hourglass-2' => 'fas fa-hourglass-half', 'fa-hourglass-3' => 'fas fa-hourglass-end', 'fa-hourglass-o' => 'far fa-hourglass', 'fa-id-card-o' => 'far fa-id-card', 'fa-ils' => 'fas fa-shekel-sign', 'fa-image' => 'far fa-image', 'fa-inr' => 'fas fa-rupee-sign', 'fa-institution' => 'fas fa-university', 'fa-intersex' => 'fas fa-transgender', 'fa-jpy' => 'fas fa-yen-sign', 'fa-keyboard-o' => 'far fa-keyboard', 'fa-krw' => 'fas fa-won-sign', 'fa-legal' => 'fas fa-gavel', 'fa-lemon-o' => 'far fa-lemon', 'fa-level-down' => 'fas fa-level-down-alt', 'fa-level-up' => 'fas fa-level-up-alt', 'fa-life-bouy' => 'far fa-life-ring', 'fa-life-buoy' => 'far fa-life-ring', 'fa-life-saver' => 'far fa-life-ring', 'fa-lightbulb-o' => 'far fa-lightbulb', 'fa-line-chart' => 'fas fa-chart-line', 'fa-linkedin-square' => 'fab fa-linkedin', 'fa-linkedin' => 'fab fa-linkedin-in', 'fa-long-arrow-down' => 'fas fa-long-arrow-alt-down', 'fa-long-arrow-left' => 'fas fa-long-arrow-alt-left', 'fa-long-arrow-right' => 'fas fa-long-arrow-alt-right', 'fa-long-arrow-up' => 'fas fa-long-arrow-alt-up', 'fa-mail-forward' => 'fas fa-share', 'fa-mail-reply-all' => 'fas fa-reply-all', 'fa-mail-reply' => 'fas fa-reply', 'fa-map-marker' => 'fas fa-map-marker-alt', 'fa-map-o' => 'far fa-map', 'fa-meanpath' => 'fab fa-font-awesome', 'fa-meh-o' => 'far fa-meh', 'fa-minus-square-o' => 'far fa-minus-square', 'fa-mobile-phone' => 'fas fa-mobile-alt', 'fa-mobile' => 'fas fa-mobile-alt', 'fa-money' => 'far fa-money-bill-alt', 'fa-moon-o' => 'far fa-moon', 'fa-mortar-board' => 'fas fa-graduation-cap', 'fa-navicon' => 'fas fa-bars', 'fa-newspaper-o' => 'far fa-newspaper', 'fa-paper-plane-o' => 'far fa-paper-plane', 'fa-paste' => 'far fa-clipboard', 'fa-pause-circle-o' => 'far fa-pause-circle', 'fa-pencil-square-o' => 'far fa-edit', 'fa-pencil-square' => 'fas fa-pen-square', 'fa-pencil' => 'fas fa-pencil-alt', 'fa-photo' => 'far fa-image', 'fa-picture-o' => 'far fa-image', 'fa-pie-chart' => 'fas fa-chart-pie', 'fa-play-circle-o' => 'far fa-play-circle', 'fa-plus-square-o' => 'far fa-plus-square', 'fa-question-circle-o' => 'far fa-question-circle', 'fa-ra' => 'fab fa-rebel', 'fa-refresh' => 'fas fa-sync', 'fa-remove' => 'fas fa-times', 'fa-reorder' => 'fas fa-bars', 'fa-repeat' => 'fas fa-redo', 'fa-resistance' => 'fab fa-rebel', 'fa-rmb' => 'fas fa-yen-sign', 'fa-rotate-left' => 'fas fa-undo', 'fa-rotate-right' => 'fas fa-redo', 'fa-rouble' => 'fas fa-ruble-sign', 'fa-rub' => 'fas fa-ruble-sign', 'fa-ruble' => 'fas fa-ruble-sign', 'fa-rupee' => 'fas fa-rupee-sign', 'fa-s15' => 'fas fa-bath', 'fa-scissors' => 'fas fa-cut', 'fa-send-o' => 'far fa-paper-plane', 'fa-send' => 'fas fa-paper-plane', 'fa-share-square-o' => 'far fa-share-square', 'fa-shekel' => 'fas fa-shekel-sign', 'fa-sheqel' => 'fas fa-shekel-sign', 'fa-shield' => 'fas fa-shield-alt', 'fa-sign-in' => 'fas fa-sign-in-alt', 'fa-sign-out' => 'fas fa-sign-out-alt', 'fa-signing' => 'fas fa-sign-language', 'fa-sliders' => 'fas fa-sliders-h', 'fa-smile-o' => 'far fa-smile', 'fa-snowflake-o' => 'far fa-snowflake', 'fa-soccer-ball-o' => 'far fa-futbol', 'fa-sort-alpha-asc' => 'fas fa-sort-alpha-down', 'fa-sort-alpha-desc' => 'fas fa-sort-alpha-up', 'fa-sort-amount-asc' => 'fas fa-sort-amount-down', 'fa-sort-amount-desc' => 'fas fa-sort-amount-up', 'fa-sort-asc' => 'fas fa-sort-up', 'fa-sort-desc' => 'fas fa-sort-down', 'fa-sort-numeric-asc' => 'fas fa-sort-numeric-down', 'fa-sort-numeric-desc' => 'fas fa-sort-numeric-up', 'fa-spoon' => 'fas fa-utensil-spoon', 'fa-square-o' => 'far fa-square', 'fa-star-half-empty' => 'far fa-star-half', 'fa-star-half-full' => 'far fa-star-half', 'fa-star-half-o' => 'far fa-star-half', 'fa-star-o' => 'far fa-star', 'fa-sticky-note-o' => 'far fa-sticky-note', 'fa-stop-circle-o' => 'far fa-stop-circle', 'fa-sun-o' => 'far fa-sun', 'fa-support' => 'far fa-life-ring', 'fa-tablet' => 'fas fa-tablet-alt', 'fa-tachometer' => 'fas fa-tachometer-alt', 'fa-television' => 'fas fa-tv', 'fa-thermometer-0' => 'fas fa-thermometer-empty', 'fa-thermometer-1' => 'fas fa-thermometer-quarter', 'fa-thermometer-2' => 'fas fa-thermometer-half', 'fa-thermometer-3' => 'fas fa-thermometer-three-quarters', 'fa-thermometer-4' => 'fas fa-thermometer-full', 'fa-thermometer' => 'fas fa-thermometer-full', 'fa-thumb-tack' => 'fas fa-thumbtack', 'fa-thumbs-o-down' => 'far fa-thumbs-down', 'fa-thumbs-o-up' => 'far fa-thumbs-up', 'fa-ticket' => 'fas fa-ticket-alt', 'fa-times-circle-o' => 'far fa-times-circle', 'fa-times-rectangle-o' => 'far fa-window-close', 'fa-times-rectangle' => 'fas fa-window-close', 'fa-toggle-down' => 'far fa-caret-square-down', 'fa-toggle-left' => 'far fa-caret-square-left', 'fa-toggle-right' => 'far fa-caret-square-right', 'fa-toggle-up' => 'far fa-caret-square-up', 'fa-trash-o' => 'far fa-trash-alt', 'fa-trash' => 'fas fa-trash-alt', 'fa-try' => 'fas fa-lira-sign', 'fa-turkish-lira' => 'fas fa-lira-sign', 'fa-unsorted' => 'fas fa-sort', 'fa-usd' => 'fas fa-dollar-sign', 'fa-user-circle-o' => 'far fa-user-circle', 'fa-user-o' => 'far fa-user', 'fa-vcard-o' => 'far fa-address-card', 'fa-vcard' => 'fas fa-address-card', 'fa-video-camera' => 'fas fa-video', 'fa-vimeo' => 'fab fa-vimeo-v', 'fa-volume-control-phone' => 'fas fa-phone-volume', 'fa-warning' => 'fas fa-exclamation-triangle', 'fa-wechat' => 'fab fa-weixin', 'fa-wheelchair-alt' => 'fab fa-accessible-icon', 'fa-window-close-o' => 'far fa-window-close', 'fa-won' => 'fas fa-won-sign', 'fa-y-combinator-square' => 'fab fa-hacker-news', 'fa-yc-square' => 'fab fa-hacker-news', 'fa-yc' => 'fab fa-y-combinator', 'fa-yen' => 'fas fa-yen-sign', 'fa-youtube-play' => 'fab fa-youtube', 'fa-youtube-square' => 'fab fa-youtube', /*POFO custom font*/ 'fa-facebook' => 'fab fa-facebook-f', 'fa-google-plus' => 'fab fa-google-plus-g', 'fa-linkedin' => 'fab fa-linkedin-in');
        return $fa_icon_old;
        }
    endif;
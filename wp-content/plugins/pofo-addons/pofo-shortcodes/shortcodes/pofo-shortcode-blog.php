<?php
/**
 * Shortcode For Blog
 *
 * @package Pofo
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Blog */
/*-----------------------------------------------------------------------------------*/
$pofo_srcset = '';
if ( ! function_exists( 'pofo_blog_shortcode' ) ) {
    function pofo_blog_shortcode( $atts, $content = null ) {
    	global $post, $pofo_srcset, $pofo_featured_array, $pofo_blog_style1, $pofo_blog_style2, $pofo_blog_style3, $pofo_blog_style4, $pofo_blog_style5, $pofo_blog_style5, $pofo_blog_style6, $pofo_blog_style7, $pofo_blog_style8, $pofo_blog_style9;

        extract( shortcode_atts( array(
        	'id' => '',
            'class' => '',
            'pofo_blog_premade_style' => '',
            'pofo_blog_column' => '',
            'pofo_blog_masonry_column' => '3',
            'pofo_blog_type' => '',
            'pofo_categories_list' => '',
            'pofo_post_per_page' => '15',
            'pofo_show_post_thumbnail' => '1',
            'pofo_show_post_format' => '1',
            'pofo_image_srcset' => 'full',
            'pofo_show_post_title' => '1',
            'pofo_show_separator' => '1',
            'pofo_separator_height' => '',
            'pofo_show_post_date' => '1',
            'pofo_show_post_author' => '1',
            'pofo_show_post_author_image' => '0',
            'pofo_date_format' => 'd F Y',
            'pofo_show_category' => '',
            'pofo_show_pagination' => '',
            'pofo_show_like' => '',
            'pofo_show_comment' => '',
            'pofo_show_button' => '',
            'pofo_button_text' => '',
            'pofo_show_excerpt' => '1',
            'pofo_show_content' => '1',
            'pofo_excerpt_length' => '15',
            'pofo_box_bg_color' => '',
            'pofo_box_bg_hover_color' => '',
            'pofo_post_meta_color' => '',
            'pofo_post_meta_hover_color' => '',
            'pofo_button_color' => '',
            'pofo_button_hover_color' => '',
            'pofo_button_text_color' => '',
            'pofo_button_hover_text_color' => '',
            'pofo_button_border_color' => '',
            'pofo_separator_color' => '',
            'pofo_separator_hover_color' => '',
            'pofo_blog_post_title_text_transform' => '',
            'pofo_blog_post_meta_text_transform' => 'text-uppercase',
            'pofo_title_font_size' => '',
            'pofo_title_line_height' => '',
            'pofo_title_letter_spacing' => '',
            'pofo_title_font_weight' => '',
            'pofo_title_italic' => '',
            'pofo_title_underline' => '',
            'pofo_title_element_tag' => '',
            'pofo_title_color' => '',
            'pofo_title_hover_color' => '',
            'pofo_title_enable_responsive_font' => '',
            'pofo_box_enable_border' => '1',
            'pofo_box_border_color' => '',
            'pofo_box_border_size' => '',
            'pofo_box_border_type' => '',
            'pofo_orderby' => 'date',
            'pofo_order' => 'DESC',
            'pofo_token_class' => '',
            'pofo_animation_style' => '',
            'pofo_animation_delay' => '',
            'pofo_blog_pagination_style' => 'number-pagination',
            'pofo_hide_icon' => '1',
            'pofo_zoom_effect' => '1',
            'pofo_blog_opacity' => '0.5',
            'pofo_overlay_color' => '',
        ), $atts ) );

        $output = $class_column = $sep_style_attr = $pofo_title_style_attr = $pofo_blog_type_settings = $infinite_scroll_main_class = '';
        $sep_style_array = $pofo_title_style_array = array();

        if( $pofo_show_pagination == 1 ) {
            switch ($pofo_blog_premade_style) {
                case 'blog-full-width':
                case 'blog-list':
                    switch( $pofo_blog_pagination_style ) {
                        case 'infinite-scroll-pagination':
                            $infinite_scroll_main_class = ' infinite-scroll-pagination';
                        break;
                    }
                break;
            }
        }

        $id = ($id) ? ' id="'.$id.'"' : '';
        $class = ( $class ) ? ' class="pofo-'.$pofo_blog_premade_style.' '.$class.'"' : ' class="pofo-'.$pofo_blog_premade_style.''.$infinite_scroll_main_class.'"';
        
        $pofo_blog_column = ( isset($pofo_blog_column) ) ? $pofo_blog_column : '3';
        
        $pofo_blog_type_gutter = ( $pofo_blog_type ) ? $pofo_blog_type.' blog-post-gutter' : '';
        $pofo_categories_list = ($pofo_categories_list) ? $pofo_categories_list : '';
        $pofo_post_per_page = ($pofo_post_per_page) ? $pofo_post_per_page : '';
        $pofo_excerpt_length = ($pofo_excerpt_length) ? $pofo_excerpt_length : '';
        $pofo_show_post_format = ($pofo_show_post_format) ? $pofo_show_post_format : '';
        $pofo_show_post_title = ($pofo_show_post_title) ? $pofo_show_post_title : '';
        $pofo_show_post_thumbnail = ($pofo_show_post_thumbnail) ? $pofo_show_post_thumbnail : '';
        $pofo_date_format = ($pofo_date_format) ? $pofo_date_format : '';
        $pofo_show_category = ($pofo_show_category) ? $pofo_show_category : '';
        $pofo_show_like = ($pofo_show_like) ? $pofo_show_like : '';
        $pofo_blog_masonry_col = ( $pofo_blog_masonry_column ) ? $pofo_blog_masonry_column : '3';

        $pofo_zoom_effect = ( $pofo_zoom_effect == 0 ) ? ' post-no-transform': '' ;

        $pofo_show_comment = ($pofo_show_comment) ? $pofo_show_comment : '';
        $pofo_button_text = !empty( $pofo_button_text ) ? $pofo_button_text : esc_html__( 'Continue Reading', 'pofo-addons' );

        // Animation
        $pofo_animation_style = ( $pofo_animation_style ) ? $pofo_animation_style = ' wow '.$pofo_animation_style : '';
        $pofo_animation_delay = ( $pofo_animation_delay ) ? $pofo_animation_delay : '0';

        // For Box Background Style
        $pofo_box_bg_color_style = ( $pofo_box_bg_color ) ? ' style="background-color:'.$pofo_box_bg_color.';"' : '';

        // For Separator Style
        $pofo_separator_height = ( $pofo_separator_height ) ? $sep_style_array[] = 'height:'.$pofo_separator_height.';' : '';
        $pofo_separator_color_style = ( $pofo_separator_color ) ? $sep_style_array[] = 'background-color:'.$pofo_separator_color.';' : '';
        $pofo_separator_hover_color= ($pofo_separator_hover_color) ? ' background-color: '.$pofo_separator_hover_color.' !important; ' : '';

        $sep_style_attr = !empty( $sep_style_array ) ? ' style="'.implode(" ", $sep_style_array).'"' : '';
        $pofo_post_meta_text_transform = ( $pofo_blog_post_meta_text_transform ) ? ' '.$pofo_blog_post_meta_text_transform : ' text-uppercase';
        $pofo_post_title_text_transform = ( $pofo_blog_post_title_text_transform ) ? ' '.$pofo_blog_post_title_text_transform : '';

        // For Title Style
        !empty( $pofo_title_font_size ) ? $pofo_title_style_array[] = 'font-size: ' . $pofo_title_font_size . ';' : '';
        !empty( $pofo_title_line_height ) ? $pofo_title_style_array[] = 'line-height: ' . $pofo_title_line_height . ';' : '';
        !empty( $pofo_title_letter_spacing ) ? $pofo_title_style_array[] = 'letter-spacing: ' . $pofo_title_letter_spacing . ';' : '';
        !empty( $pofo_title_font_weight ) ? $pofo_title_style_array[] = 'font-weight: ' . $pofo_title_font_weight . ';' : '';
        ( $pofo_title_italic == 1 ) ? $pofo_title_style_array[] = 'font-style: italic;' : '';
        ( $pofo_title_underline == 1 ) ? $pofo_title_style_array[] = 'text-decoration: underline;' : '';
        !empty( $pofo_title_color ) ? $pofo_title_style_array[] = 'color: '.$pofo_title_color.';' : '';
        $pofo_title_hover_color= ($pofo_title_hover_color) ? ' color: '.$pofo_title_hover_color.' !important; ' : '';

        //For Post Meta Style
        $pofo_post_meta_color= ($pofo_post_meta_color) ? ' color: '.$pofo_post_meta_color.' !important; ' : '';
        $pofo_post_meta_bg_hover_color= ($pofo_post_meta_hover_color) ? ' background-color: '.$pofo_post_meta_hover_color.' !important; ' : '';
        $pofo_post_meta_hover_color= ($pofo_post_meta_hover_color) ? ' color: '.$pofo_post_meta_hover_color.' !important; ' : '';

        //For Button Style
        $pofo_button_color= ($pofo_button_color) ? ' background-color: '.$pofo_button_color.' !important; ' : '';
        $pofo_button_hover_color= ($pofo_button_hover_color) ? ' background-color: '.$pofo_button_hover_color.' !important; ' : '';
        $pofo_button_text_color= ($pofo_button_text_color) ? ' color: '.$pofo_button_text_color.' !important; ' : '';
        $pofo_button_hover_text_color= ($pofo_button_hover_text_color) ? ' color: '.$pofo_button_hover_text_color.' !important; ' : '';
        $pofo_button_border_color= ($pofo_button_border_color) ? ' border-color: '.$pofo_button_border_color.' !important; ' : '';

        $pofo_title_dynamic_font_size = $pofo_title_enable_responsive_font == 1 ? ' dynamic-font-size' : '';
        $pofo_title_style_attr   = pofo_get_style_attribute( $pofo_title_style_array, $pofo_title_font_size, $pofo_title_line_height );

        $pofo_image_srcset = ($pofo_image_srcset) ? $pofo_image_srcset : 'full';
        $pofo_srcset = $pofo_image_srcset;

		switch ($pofo_blog_column) {
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
        
        /* WP_query For Blog Categories*/
        if( $id || $class ):
            $output .= '<div'.$id.$class.'>';
        endif;
        
        switch ($pofo_blog_premade_style) {
            case 'blog-classic':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-50px-bottom xs-margin-30px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="col-'.$pofo_blog_column.'-nth-item '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                break;

            case 'blog-masonry':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-30px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<ul class="blog-grid blog-'.$pofo_blog_masonry_col.'col '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                $output .= '<li class="grid-sizer"></li>';
                break;
            
            case 'blog-grid':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-30px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="col-'.$pofo_blog_column.'-nth-item '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                break;
            
            case 'blog-simple':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-80px-bottom sm-margin-35px-bottom xs-margin-15px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="col-'.$pofo_blog_column.'-nth-item '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                break;
            
            case 'blog-clean':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-60px-bottom sm-margin-30px-bottom xs-margin-15px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="col-'.$pofo_blog_column.'-nth-item '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                break;
            
            case 'blog-personal':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-30px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="blog-post blog-post-style4">';
                $output .= '<ul class="blog-grid '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                $output .= '<li class="grid-sizer'.$class_column.'"></li>';
                break;
            
            case 'blog-only-text':
                switch ( $pofo_blog_type ) {
                    case 'gutter-large':
                        $pofo_blog_type_settings = ' padding-10px-all';
                        break;
                    
                    case 'gutter-medium':
                        $pofo_blog_type_settings = ' padding-7px-all';
                        break;

                    case 'gutter-small':
                        $pofo_blog_type_settings = ' padding-5px-all';
                        break;

                    case 'gutter-very-small':
                        $pofo_blog_type_settings = ' padding-3px-all';
                        break;

                    default:
                        $pofo_blog_type_settings = ' margin-30px-bottom xs-margin-15px-bottom';
                        break;
                }
                switch( $pofo_blog_pagination_style ) {
                    case 'infinite-scroll-pagination':
                        $infinite_scroll_main_class = ' infinite-scroll-pagination';
                    break;
                }
                $output .= '<div class="col-'.$pofo_blog_column.'-nth-item '.$pofo_blog_type_gutter.$infinite_scroll_main_class.'">';
                break;
        }
        
        if ( get_query_var('paged') ) {
         	$paged = get_query_var('paged'); 
        } else if ( get_query_var('page') ) {
        	$paged = get_query_var('page'); 
        } else {
        	$paged = 1;
        }

		$args = array('post_type' => 'post',
    		'posts_per_page' => $pofo_post_per_page,
            'category_name' => $pofo_categories_list,
            'orderby' => $pofo_orderby,
            'order' => $pofo_order,
            'paged' => $paged,
	     );
		$query = new WP_Query( $args );

        $i = 0;
		while( $query->have_posts() ) : $query->the_post();

            $pofo_post_classes = $pofo_post_classes_infinite_scroll = '';
            if( $pofo_show_pagination == 1 ) {
                if( $pofo_blog_pagination_style == 'infinite-scroll-pagination' ) {
                    $pofo_post_classes_infinite_scroll = ' blog-single-post';
                }
            }
            ob_start();
                post_class();
                $pofo_post_classes = ob_get_contents();
            ob_end_clean();

			/* Image Alt, Title, Caption */
	        $img_alt = pofo_option_image_alt(get_post_thumbnail_id());
	        $img_title = pofo_option_image_title(get_post_thumbnail_id());
	        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
	        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? $img_title['title'] : '';

	        $img_attr = array(
	            'title' => $image_title,
	            'alt' => $image_alt,
	        );
	        $popup_id = 'blog-'.get_the_ID();

			$post_cat = array();
	        $categories = get_the_category();
	        foreach ($categories as $k => $cat) {
	            $cat_link = get_category_link($cat->cat_ID);
	            $post_cat[]='<a href="'.$cat_link.'" class="text-medium-gray text-extra-small vertical-align-middle display-inline-block pofo-blog-post-meta" rel="category tag">'.$cat->name.'</a>';
	        }
	        $post_category = !empty( $post_cat ) ? implode(", ",$post_cat) : '';
	        $post_format = get_post_format( get_the_ID() );
			
            $pofo_animation_delay_attr = !empty( $pofo_animation_delay ) && ( $i > 0 ) ? ' data-wow-delay="'. ( $pofo_animation_delay * $i ).'ms"' : '';

            switch ($pofo_blog_premade_style) {

                case 'blog-full-width':

                    //Custom css start
                    $pofo_blog_style1 = !empty( $pofo_blog_style1 ) ? $pofo_blog_style1 : 0;
                    $pofo_blog_style1 = $pofo_blog_style1 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' .author .name a,.blog-style1-'.$pofo_blog_style1.' .blog-separator, .blog-style1-'.$pofo_blog_style1.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' .author .name a:hover, .blog-style1-'.$pofo_blog_style1.' a.pofo-blog-post-meta:hover, .blog-style1-'.$pofo_blog_style1.' .pofo-blog-post-meta a:hover, .blog-style1-'.$pofo_blog_style1.' .author .name a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style1-'.$pofo_blog_style1.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    ob_start();
                        post_class($pofo_post_classes_infinite_scroll);
                        $pofo_post_classes = ob_get_contents();
                    ob_end_clean();

                    $cnt = 0;
                    $author_box_column = $author_border_settings = $like_border_settings = '';
                    if( $pofo_show_post_author == 1 ) { $cnt++; }
                    if( $pofo_show_like == 1 ){ $cnt++; }
                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){ $cnt++; }
                    switch ($cnt){
                        case '1':
                           $author_box_column .= 'col-md-12 col-sm-12';
                           $author_border_settings .= ' border-none';
                           $like_border_settings .= ' border-none';
                        break;
                        case '2':
                            $author_box_column .= 'col-md-6 col-sm-6';
                            if( $pofo_show_post_author == 1 && $pofo_show_like == 1 ){
                                $author_border_settings .= ' border-right';
                                $like_border_settings .= ' border-none';
                            }else{
                                $author_border_settings .= ' border-right';
                                $like_border_settings .= ' border-right';
                            }
                            break;
                        case '3':
                            $author_box_column .= 'col-md-4 col-sm-4';
                            $author_border_settings .= ' border-right';
                            $like_border_settings .= ' border-right';
                            break;
                    }
                    $output .= '<div '.$pofo_post_classes.'>';
                        $output .= '<div class="blog-post blog-post-content margin-60px-bottom xs-margin-30px-bottom xs-text-center blog-style1-'.$pofo_blog_style1.$pofo_animation_style.''.$class_column.'"'.$pofo_animation_delay_attr.'>';
                            if ( !post_password_required() ) {
                                if( $pofo_show_post_thumbnail == 1 ){
                                    if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }else{
                                        if( has_post_thumbnail() ) {
                                            $output .= '<div class="blog-post-images">';
                                                $output .=  '<a href="'.get_permalink().'">';
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                $output .=  '</a>';
                                            $output .= '</div>';
                                        }
                                    }
                                }
                            }
                            $output .= '<div class="blog-text border-all display-inline-block width-100"'.$pofo_box_bg_color_style.'>';
                                $output .= '<div class="content padding-50px-all xs-padding-20px-all xs-text-center">';
                                    $output .= '<div class="text-medium-gray text-extra-small margin-5px-bottom alt-font pofo-blog-post-meta'.$pofo_post_meta_text_transform.'">';
                                        if( $pofo_show_post_date == 1 ) {
                                            $output .= '<span class="vertical-align-middle">'.esc_html__('posted on','pofo-addons').' </span><span class="published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                                        }
                                        
                                        if( $pofo_show_post_date == 1 && $pofo_show_category == 1 ) {
                                            $output .= '<span class="blog-separator vertical-align-middle">|</span>';
                                        }
                                        if( $pofo_show_category == 1 && $post_category ){
                                                $output .= $post_category;
                                        }
                                    $output .= '</div>';
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<a class="text-extra-dark-gray alt-font text-large font-weight-600 margin-15px-bottom display-block entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                    }
                                    
                                    if( $pofo_show_excerpt == 1 ){
                                        $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                        $output .= '<p class="no-margin entry-content">'.$show_excerpt_grid.'</p>';
                                    }elseif($pofo_show_content == 1){
                                        $output .='<div class="no-margin entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                                    }
                                    if( $pofo_show_button == 1 ){
                                        $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small margin-30px-top xs-margin-20px-top white-space-normal">'.$pofo_button_text.'</a>';                                        
                                    }
                                $output .= '</div>';
                                $output .= '<div class="equalize xs-equalize-auto author border-top border-color-extra-light-gray display-table width-100">';
                                    if( $pofo_show_post_author == 1 ) {
                                        $output .= '<div class="name '.$author_box_column.$author_border_settings.' padding-15px-all border-color-extra-light-gray xs-no-border pofo-layout-meta">';
                                            $output .= '<div class="display-table text-center width-100 height-100">';
                                                $output .= '<div class="display-table-cell vertical-align-middle'.$pofo_post_meta_text_transform.'">';
                                                    if( $pofo_show_post_author_image == 1 ) {
                                                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                                        $output .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt="">';
                                                    }
                                                    $output .= '<span class="text-medium-gray text-extra-small alt-font pofo-blog-post-meta">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n pofo-blog-post-meta">'.get_the_author().'</a></span></span>';

                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_like == 1 ){
                                        $output .= '<div class="name '.$author_box_column.$like_border_settings.' padding-15px-all border-color-extra-light-gray xs-no-border alt-font pofo-layout-meta">';
                                            $output .= '<div class="display-table text-center width-100 height-100">';
                                                $output .= '<div class="display-table-cell vertical-align-middle'.$pofo_post_meta_text_transform.'">';
                                                    $output .= pofo_get_simple_likes_button( get_the_ID() );
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                        $output .= '<div class="name '.$author_box_column.' padding-15px-all alt-font pofo-layout-meta">';
                                            $output .= '<div class="display-table text-center width-100 height-100">';
                                                $output .= '<div class="display-table-cell vertical-align-middle'.$pofo_post_meta_text_transform.'">';
                                                    ob_start();
                                                        comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            $output .= '</div>';
                                        $output .= '</div>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';    
                break;

                case 'blog-classic':
                
                    //Custom css start
                    $pofo_blog_style2 = !empty( $pofo_blog_style2 ) ? $pofo_blog_style2 : 0;
                    $pofo_blog_style2 = $pofo_blog_style2 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' .pofo-blog-post-meta a, .blog-style2-'.$pofo_blog_style2.' .blog-separator, .blog-style2-'.$pofo_blog_style2.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.pofo-blog-post-meta:hover, .blog-style2-'.$pofo_blog_style2.' .pofo-blog-post-meta a:hover, .blog-style2-'.$pofo_blog_style2.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_blog_opacity ) ){
                        $pofo_featured_array[] = '.blog-post.blog-style2-'.$pofo_blog_style2.':hover .blog-post-images img { opacity:'.$pofo_blog_opacity.' }';   
                    }
                    if( !empty( $pofo_overlay_color ) ){
                        $pofo_featured_array[] = '.blog-post.blog-style2-'.$pofo_blog_style2.' .blog-post-images { background:'.$pofo_overlay_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style2-'.$pofo_blog_style2.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    $author_date_array = array();
                    $author_image = '';
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt=""> ';
                    }
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block vertical-align-middle">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="pofo-blog-post-meta text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    
                    $output .= '<div class="blog-post blog-post-style1 xs-text-center blog-style2-'.$pofo_blog_style2.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_zoom_effect.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            if ( !post_password_required() ) {
                                if( $pofo_show_post_thumbnail == 1 || $pofo_show_category == 1 ){
                                    $output .= '<div class="blog-post-images overflow-hidden margin-25px-bottom sm-margin-20px-bottom">';
                                        if( $pofo_show_post_thumbnail == 1 ){
                                            if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }else{
                                                if( has_post_thumbnail() ) {
                                                    $output .=  '<a href="'.get_permalink().'">';
                                                        $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                    $output .=  '</a>';
                                                }
                                            }
                                        }
                                        if( $pofo_show_category == 1 && $post_category ){
                                            $output .= '<div class="blog-categories bg-white text-extra-small alt-font'.$pofo_post_meta_text_transform.'">' . $post_category . '</div>';
                                        }
                                    $output .= '</div>';
                                }
                            }
                            
                            $output .= '<div class="post-details display-inline-block">';
                                    if( !empty( $author_date_array ) ){
                                        $output .= '<span class="post-author text-extra-small text-medium-gray display-block margin-10px-bottom xs-margin-5px-bottom'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</span>';
                                    }
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<a class="post-title text-medium text-extra-dark-gray display-block width-90 sm-width-100 entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                    }
                            $output .= '</div>';
                            if( $pofo_show_separator == 1 ){
                                $output .='<div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-top sm-margin-15px-top"'.$sep_style_attr.'></div>';
                            }
                            if( $pofo_show_excerpt == 1 ){
                                $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                $output .= '<div class="entry-content margin-20px-top sm-margin-15px-top no-margin-bottom width-90 sm-width-100">'.$show_excerpt_grid.'</div>';
                            }elseif($pofo_show_content == 1){
                                $output .='<div class="entry-content blog-post-full-content margin-20px-top sm-margin-15px-top width-90 sm-width-100">'.pofo_get_the_post_content().'</div>';
                            }
                            if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                $output .= '<div class="blog-like-comment pofo-blog-post-meta margin-20px-top sm-margin-15px-top'.$pofo_post_meta_text_transform.'">';
                                    if( $pofo_show_like == 1 ){
                                        $output .= pofo_get_simple_likes_button( get_the_ID() );
                                    }
                                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                        if( $pofo_show_like == 1 ){
                                            $output .= ' ';
                                        }
                                        ob_start();
                                            comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                            $output .= ob_get_contents();  
                                        ob_end_clean();
                                    }
                                $output .= '</div>';
                            }
                            if( $pofo_show_button == 1 ){
                                    $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin-bottom margin-20px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                break;

                case 'blog-list':

                    //Custom css start
                    $pofo_blog_style3 = !empty( $pofo_blog_style3 ) ? $pofo_blog_style3 : 0;
                    $pofo_blog_style3 = $pofo_blog_style3 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' .pofo-blog-post-meta a, .blog-style3-'.$pofo_blog_style3.' .blog-separator, .blog-style3-'.$pofo_blog_style3.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.pofo-blog-post-meta:hover, .blog-style3-'.$pofo_blog_style3.' .pofo-blog-post-meta a:hover, .blog-style3-'.$pofo_blog_style3.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( $pofo_show_separator == 0 ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' { border-bottom: none; }';   
                    }
                    if( !empty( $pofo_separator_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' { border-color: '.$pofo_separator_color.'; }';   
                    }
                    if( !empty( $pofo_separator_height ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' {  border-bottom-width: '.$pofo_separator_height.'; }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style3-'.$pofo_blog_style3.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    ob_start();
                        post_class($pofo_post_classes_infinite_scroll);
                        $pofo_post_classes = ob_get_contents();
                    ob_end_clean();

                    $author_date_array = array();
                    $author_image = '';
                    $flag = 0;
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt=""> ';
                    }
                    
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block vertical-align-middle">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    
                    if( $pofo_show_category == 1 && $post_category ){
                        $author_date_array[] = $post_category;
                    }
                    $output .= '<div '.$pofo_post_classes.'>';
                        $output .= '<div class="blog-post blog-post-content margin-60px-bottom padding-60px-bottom border-bottom sm-no-border-bottom border-color-extra-light-gray sm-margin-30px-bottom sm-padding-30px-bottom xs-text-center pull-left width-100 blog-style3-'.$pofo_blog_style3.$pofo_animation_style.''.$class_column.'"'.$pofo_animation_delay_attr.'>';
                            if ( !post_password_required() ) {
                                if( $pofo_show_post_thumbnail == 1 ){
                                    if( $post_format == 'image' && $pofo_show_post_format != 1 && has_post_thumbnail() ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                        $flag = 1;
                                        $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }else{
                                        if( has_post_thumbnail() ) {
                                            $flag = 1;
                                            $output .= '<div class="blog-image col-md-5 no-padding sm-margin-30px-bottom xs-margin-20px-bottom margin-30px-right sm-no-margin-right sm-width-100">';
                                                $output .=  '<a href="'.get_permalink().'">';
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                $output .=  '</a>';
                                            $output .= '</div>';
                                        }
                                    }
                                }
                            }

                            if( $pofo_show_excerpt == 1 ){
                                if( $flag == 0 ){
                                    $output .= '<div class="blog-text col-md-12 display-table no-padding sm-width-100">';
                                }else{
                                    $output .= '<div class="blog-text col-md-6 display-table no-padding sm-width-100">';
                                }
                                    $output .= '<div class="display-table-cell vertical-align-middle">';
                                        $output .= '<div class="content sm-no-padding-left ">';
                                            if( $pofo_show_post_title == 1 ){
                                                $output .= '<a class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 display-inline-block entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                            }
                                            if( !empty( $author_date_array ) ) {
                                                $output .= '<div class="text-medium-gray text-extra-small margin-15px-bottom alt-font'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</div>';
                                            }
                                            if( $pofo_show_excerpt == 1 ){
                                                $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                                $output .= '<div class="no-margin entry-content">'.$show_excerpt_grid.'</div>';
                                            }elseif($pofo_show_content == 1){
                                                $output .='<div class="no-margin entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                                            }
                                            if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                                $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-15px-top sm-margin-15px-top alt-font'.$pofo_post_meta_text_transform.'">';
                                                    if( $pofo_show_like == 1 ){
                                                        $output .= pofo_get_simple_likes_button( get_the_ID() );
                                                    }
                                                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                        if( $pofo_show_like == 1 ){
                                                            $output .= ' ';
                                                        }
                                                        ob_start();
                                                            comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                            $output .= ob_get_contents();  
                                                        ob_end_clean();
                                                    }
                                                $output .= '</div>';
                                            }                       
                                            if( $pofo_show_button == 1 ){
                                                $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray margin-15px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }elseif($pofo_show_content == 1){
                                if( $flag == 0 ){
                                    $output .= '<div class="blog-text col-md-12 no-padding sm-width-100 xs-text-left">';
                                }else{
                                    $output .= '<div class="blog-text col-md-6 no-padding sm-width-100 xs-text-left">';
                                }
                                    $output .= '<div class="vertical-align-middle">';
                                        $output .= '<div class="content sm-no-padding-left ">';
                                            if( $pofo_show_post_title == 1 ){
                                                $output .= '<a class="text-extra-dark-gray margin-5px-bottom alt-font text-extra-large font-weight-600 display-inline-block entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                            }
                                            if( !empty( $author_date_array ) ) {
                                                $output .= '<div class="text-medium-gray text-extra-small margin-15px-bottom alt-font'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</div>';
                                            }
                                            if( $pofo_show_excerpt == 1 ){
                                                $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                                $output .= '<div class="no-margin entry-content">'.$show_excerpt_grid.'</div>';
                                            }elseif($pofo_show_content == 1){
                                                $output .='<div class="no-margin entry-content blog-post-full-content display-block">'.pofo_get_the_post_content().'</div>';
                                            }
                                            if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                                $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-15px-top sm-margin-15px-top alt-font'.$pofo_post_meta_text_transform.'">';
                                                    if( $pofo_show_like == 1 ){
                                                        $output .= pofo_get_simple_likes_button( get_the_ID() );
                                                    }
                                                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                        if( $pofo_show_like == 1 ){
                                                            $output .= ' ';
                                                        }
                                                        ob_start();
                                                            comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                            $output .= ob_get_contents();  
                                                        ob_end_clean();
                                                    }
                                                $output .= '</div>';
                                            }                       
                                            if( $pofo_show_button == 1 ){
                                                $output .= '<a href="'.get_permalink().'" class="btn btn-very-small btn-dark-gray margin-15px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</div>';
                            }
                            
                        $output .= '</div>';
                    $output .= '</div>';
                break;

                case 'blog-grid':

                    //Custom css start
                    $pofo_blog_style4 = !empty( $pofo_blog_style4 ) ? $pofo_blog_style4 : 0;
                    $pofo_blog_style4 = $pofo_blog_style4 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' .pofo-blog-post-meta a, .blog-style4-'.$pofo_blog_style4.' .blog-separator, .blog-style4-'.$pofo_blog_style4.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.pofo-blog-post-meta:hover, .blog-style4-'.$pofo_blog_style4.' .pofo-blog-post-meta a:hover, .blog-style4-'.$pofo_blog_style4.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_overlay_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' .grid-item .blog-post .blog-post-images .blog-hover-icon { background:'.$pofo_overlay_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style4-'.$pofo_blog_style4.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    $author_date_array = array();
                    $author_image = '';
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt=""> ';
                    }
                    
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block vertical-align-middle">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    if( $pofo_show_category == 1 && $post_category ){
                        $author_date_array[] = $post_category;
                    }
                    if( $pofo_show_pagination == 1 ) {
                        if( $pofo_blog_pagination_style == 'infinite-scroll-pagination' ) {
                            $pofo_post_classes_infinite_scroll = ' blog-single-post';
                        }
                    }
                    $output .= '<div class="blog-post-style3 blog-style4-'.$pofo_blog_style4.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            $output .= '<div class="grid-item">';
                                $output .= '<div class="blog-post bg-light-gray inner-match-height"'.$pofo_box_bg_color_style.'>';
                                    if ( !post_password_required() ) {
                                        if( $pofo_show_post_thumbnail == 1 ){
                                            if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                                $output .= '</div>';
                                            }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                                $output .= '</div>';
                                            }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }else{
                                                if( has_post_thumbnail() ) {
                                                    $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                                        $output .=  '<a href="'.get_permalink().'">';
                                                                $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                            $output .= '<div class="blog-hover-icon">';
                                                            if( $pofo_hide_icon == 1 ){
                                                                $output .= '<span class="text-extra-large font-weight-300">+</span>';
                                                            }
                                                            $output .= '</div>';
                                                        $output .=  '</a>';
                                                    $output .= '</div>';
                                                }
                                            }
                                        }
                                    }
                                    $output .= '<div class="post-details padding-ten-all sm-padding-20px-all xs-text-center">';
                                        $output .= '<div class="blog-hover-color"></div>';
                                        if( $pofo_show_post_title == 1 ){
                                            $output .= '<a class="alt-font post-title text-medium text-extra-dark-gray display-block entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                        }
                                        if( $pofo_show_excerpt == 1 ){
                                            $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                            $output .= '<div class="entry-content no-margin-bottom margin-15px-top">'.$show_excerpt_grid.'</div>';
                                        }elseif($pofo_show_content == 1){
                                            $output .='<div class="entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                                        }
                                        if( $pofo_show_separator == 1 ){
                                            $output .='<div class="separator-line-horrizontal-full bg-medium-gray margin-20px-top sm-margin-15px-top"'.$sep_style_attr.'></div>';
                                        }
                                        if( !empty( $author_date_array ) ){
                                            $output .= '<div class="author text-extra-small text-medium-gray display-block margin-20px-top sm-margin-15px-top">';
                                                $output .= '<span class="text-medium-gray text-extra-small display-inline-block'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</span>';
                                            $output .= '</div>';
                                        }
                                        
                                        if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                            $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-20px-top sm-margin-15px-top'.$pofo_post_meta_text_transform.'">';
                                                if( $pofo_show_like == 1 ){
                                                    $output .= pofo_get_simple_likes_button( get_the_ID() );
                                                }
                                                if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                    if( $pofo_show_like == 1 ){
                                                        $output .= ' ';
                                                    }
                                                    ob_start();
                                                        comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }
                                            $output .= '</div>';
                                        }
                                        if( $pofo_show_button == 1 ){
                                                $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin-bottom margin-20px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                        }
                                    $output .= '</div>';
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                break;

                case 'blog-masonry':

                    //Custom css start
                    $pofo_blog_style5 = !empty( $pofo_blog_style5 ) ? $pofo_blog_style5 : 0;
                    $pofo_blog_style5 = $pofo_blog_style5 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' .pofo-blog-post-meta a, .blog-style5-'.$pofo_blog_style5.' .blog-separator, .blog-style5-'.$pofo_blog_style5.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.pofo-blog-post-meta:hover, .blog-style5-'.$pofo_blog_style5.' .pofo-blog-post-meta a:hover, .blog-style5-'.$pofo_blog_style5.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style5-'.$pofo_blog_style5.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    $author_date_array = array();
                    $author_image = $pofo_post_classes_masonry = '';

                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url( $author_image_url ).'" alt=""> ';
                    }
                    
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block vertical-align-middle">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    $post_cat = array();
                    $categories = get_the_category();
                    foreach ($categories as $k => $cat) {
                        $cat_link = get_category_link($cat->cat_ID);
                        $post_cat[]='<a href="'.$cat_link.'" class="text-extra-small vertical-align-middle display-inline-block pofo-blog-post-meta" rel="category tag">'.$cat->name.'</a>';
                    }
                    $post_category = !empty( $post_cat ) ? implode(", ",$post_cat) : '';

                    $output .= '<li class="grid-item blog-post-style5 blog-style5-'.$pofo_blog_style5.''.$pofo_blog_type_settings.$pofo_post_classes_infinite_scroll.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            $output .= '<div class="blog-post">';
                                if ( !post_password_required() ) {
                                    if( $pofo_show_post_thumbnail == 1 ){
                                        $output .= '<div class="blog-post-images overflow-hidden position-relative text-center">';
                                            if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();  
                                            }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                                ob_start();
                                                    include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }else{
                                                if( has_post_thumbnail() ) {
                                                    $output .=  '<a href="'.get_permalink().'">';
                                                        $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                    $output .=  '</a>';
                                                }
                                            }
                                            if( $pofo_show_category == 1 && $post_category ){
                                                $output .= '<div class="blog-categories bg-white text-extra-small alt-font'.$pofo_post_meta_text_transform.'"'.$pofo_box_bg_color_style.'>' . $post_category . '</div>';
                                            }
                                        $output .= '</div>';
                                    }
                                }
                                $output .= '<div class="post-details padding-ten-all bg-white sm-padding-20px-all"'.$pofo_box_bg_color_style.'>';
                                    $output .= '<div class="blog-hover-color"></div>';
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<a class="alt-font post-title text-medium text-extra-dark-gray display-block margin-10px-bottom entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'" href="'.get_permalink().'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                    }
                                    if( !empty( $author_date_array ) ){
                                        $output .= '<div class="author text-extra-small text-medium-gray display-block">';
                                            $output .= '<span class="text-medium-gray text-extra-small display-inline-block vertical-align-middle'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array ).'</span>';
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_separator == 1 ){
                                        $output .='<div class="separator-line-horrizontal-full bg-medium-light-gray margin-20px-top sm-margin-15px-top"'.$sep_style_attr.'></div>';
                                    }
                                    if( $pofo_show_excerpt == 1 ){
                                        $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                        $output .= '<div class="entry-content margin-20px-top sm-margin-15px-top no-margin-bottom">'.$show_excerpt_grid.'</div>';
                                    }elseif($pofo_show_content == 1){
                                        $output .='<div class="entry-content blog-post-full-content margin-20px-top sm-margin-15px-top">'.pofo_get_the_post_content().'</div>';
                                    }
                                    if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                        $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-20px-top sm-margin-15px-top'.$pofo_post_meta_text_transform.'">';
                                            if( $pofo_show_like == 1 ){
                                                $output .= pofo_get_simple_likes_button( get_the_ID() );
                                            }
                                            if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                if( $pofo_show_like == 1 ){
                                                    $output .= ' ';
                                                }
                                                ob_start();
                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_button == 1 ){
                                            $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin-bottom margin-20px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</li>';
                        
                break;

                case 'blog-simple':

                    //Custom css start
                    $pofo_blog_style6 = !empty( $pofo_blog_style6 ) ? $pofo_blog_style6 : 0;
                    $pofo_blog_style6 = $pofo_blog_style6 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' .pofo-blog-post-meta a, .blog-style6-'.$pofo_blog_style6.' .blog-separator, .blog-style6-'.$pofo_blog_style6.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.pofo-blog-post-meta:hover, .blog-style6-'.$pofo_blog_style6.' .pofo-blog-post-meta a:hover, .blog-style6-'.$pofo_blog_style6.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style6-'.$pofo_blog_style6.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    
                    $pofo_show_author = esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n text-medium-gray">'.get_the_author().'</a></span>';
                    
                    $author_date_array = array();
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    if( $pofo_show_category == 1 && $post_category ) {
                        $author_date_array[] = $post_category;
                    }
                    
                    $output .= '<div class="blog-style6-'.$pofo_blog_style6.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            $output .= '<div class="blog-post blog-post-style2 xs-text-center">';
                                $output .= '<div class="post-details">';
                                    if ( !post_password_required() ) {
                                        if( $pofo_show_post_thumbnail == 1 ){
                                            if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';  
                                            }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                                $output .= '</div>';
                                            }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                                $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                $output .= '</div>';
                                            }else{
                                                if( has_post_thumbnail() ) {
                                                    $output .= '<div class="blog-post-images overflow-hidden margin-nine-bottom xs-margin-30px-bottom">';
                                                        $output .=  '<a href="'.get_permalink().'">';
                                                            $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                        $output .=  '</a>';
                                                    $output .= '</div>';
                                                }
                                            }
                                        }
                                    }
                                    
                                    if( !empty( $author_date_array ) ){
                                        $output .= '<span class="post-author text-extra-small text-medium-gray display-block margin-10px-bottom sm-margin-5px-bottom'.$pofo_post_meta_text_transform.'">';
                                           $output .= implode( '<span class="blog-separator vertical-align-middle">|</span>', $author_date_array );
                                        $output .= '</span>';
                                    }
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<span class="text-large alt-font margin-15px-bottom display-block"><a href="'.get_the_permalink().'" class="text-extra-dark-gray entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'"'.$pofo_title_style_attr.'>'.get_the_title().'</a></span>';
                                    }
                                    if( $pofo_show_excerpt == 1 ){
                                        $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                        $output .= '<div class="margin-25px-bottom xs-margin-15px-bottom width-90 xs-width-100 entry-content">'.$show_excerpt_grid.'</div>';
                                    }elseif($pofo_show_content == 1){
                                        $output .='<div class="xs-margin-15px-bottom width-90 xs-width-100 entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                                    }
                                    if( $pofo_show_separator == 1 ){
                                        $output .='<div class="separator-line-horrizontal-full bg-medium-light-gray margin-25px-bottom xs-margin-15px-bottom"'.$sep_style_attr.'></div>';
                                    }
                                    $output .= '<div class="author margin-20px-bottom sm-margin-15px-bottom'.$pofo_post_meta_text_transform.'">';
                                        if( $pofo_show_post_author == 1 ){
                                            if( $pofo_show_post_author_image == 1 ) {
                                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                                 $output .= '<img src="'.esc_url( $author_image_url ).'" alt="" class="margin-10px-right border-radius-100" />';
                                            }
                                            $output .= '<span class="pofo-blog-post-meta text-medium-gray text-extra-small">'.$pofo_show_author.'</span>';
                                        }
                                    $output .= '</div>';
                                    if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                        $output .= '<div class="pofo-blog-post-meta blog-like-comment'.$pofo_post_meta_text_transform.'">';
                                            if( $pofo_show_like == 1 ){
                                                $output .= pofo_get_simple_likes_button( get_the_ID() );
                                            }
                                            if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                if( $pofo_show_like == 1 ){
                                                    $output .= ' ';
                                                }
                                                ob_start();
                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_button == 1 ){
                                            $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin-bottom margin-20px-top sm-margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                break;

                case 'blog-clean':

                    //Custom css start
                    $pofo_blog_style7 = !empty( $pofo_blog_style7 ) ? $pofo_blog_style7 : 0;
                    $pofo_blog_style7 = $pofo_blog_style7 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }

                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' .pofo-blog-post-meta a, .blog-style7-'.$pofo_blog_style7.' .blog-separator, .blog-style7-'.$pofo_blog_style7.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }

                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.pofo-blog-post-meta:hover, .blog-style7-'.$pofo_blog_style7.' .pofo-blog-post-meta a:hover, .blog-style7-'.$pofo_blog_style7.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style7-'.$pofo_blog_style7.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    $author_date_array = array();
                    $author_image = '';
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url($author_image_url).'" alt=""> ';
                    }
                    
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    $output .= '<div class="blog-style7-'.$pofo_blog_style7.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            $output .= '<div class="blog-post blog-post-style2 xs-text-center">';
                                if ( !post_password_required() ) {
                                    if( $pofo_show_post_thumbnail == 1 || $pofo_show_category == 1 ){
                                        $output .= '<div class="blog-post-images overflow-hidden margin-25px-bottom xs-margin-15px-bottom">';
                                            if( $pofo_show_post_thumbnail == 1 ){
                                                if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                                }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();  
                                                }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                                    ob_start();
                                                        include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                        $output .= ob_get_contents();  
                                                    ob_end_clean();
                                                }else{
                                                    if( has_post_thumbnail() ) {
                                                        $output .=  '<a href="'.get_permalink().'">';
                                                            $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                        $output .=  '</a>';
                                                    }
                                                }
                                            }
                                            if( $pofo_show_category == 1 && $post_category ){
                                                $output .= '<div class="blog-categories bg-white text-extra-small alt-font'.$pofo_post_meta_text_transform.'">' . $post_category . '</div>';
                                            }
                                        $output .= '</div>';
                                    }
                                }
                                $output .= '<div class="post-details pofo-post-description">';
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<a href="'.get_the_permalink().'" class="post-title text-medium text-extra-dark-gray display-block margin-15px-bottom entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                    }
                                    if( $pofo_show_excerpt == 1 ){
                                        $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                        $output .= '<div class="entry-content margin-15px-bottom">'.$show_excerpt_grid.'</div>';
                                    }elseif($pofo_show_content == 1){
                                        $output .='<div class="entry-content blog-post-full-content">'.pofo_get_the_post_content().'</div>';
                                    }
                                    if( $pofo_show_separator == 1 ){
                                        $output .='<div class="separator-line-horrizontal-full bg-medium-light-gray no-margin-top margin-20px-bottom xs-margin-15px-bottom"'.$sep_style_attr.'></div>';
                                    }
                                    if( !empty( $author_date_array ) ){
                                        $output .= '<div class="author margin-20px-bottom xs-margin-15px-bottom text-extra-small text-medium-gray'.$pofo_post_meta_text_transform.'">';
                                            $output .= implode( '<span class="blog-separator">|</span>', $author_date_array );
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                        $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-20px-bottom sm-margin-15px-bottom'.$pofo_post_meta_text_transform.'">';
                                            if( $pofo_show_like == 1 ){
                                                $output .= pofo_get_simple_likes_button( get_the_ID() );
                                            }
                                            if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                if( $pofo_show_like == 1 ){
                                                    $output .= ' ';
                                                }
                                                ob_start();
                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_button == 1 ){
                                            $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin white-space-normal">'.$pofo_button_text.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                break;

                case 'blog-personal':

                    //Custom css start
                    $pofo_blog_style8 = !empty( $pofo_blog_style8 ) ? $pofo_blog_style8 : 0;
                    $pofo_blog_style8 = $pofo_blog_style8 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' .entry-title:hover { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' .pofo-blog-post-meta a, .blog-style8-'.$pofo_blog_style8.' .blog-separator, .blog-style8-'.$pofo_blog_style8.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.pofo-blog-post-meta:hover, .blog-style8-'.$pofo_blog_style8.' .pofo-blog-post-meta a:hover, .blog-style8-'.$pofo_blog_style8.' .pofo-blog-post-meta a:hover i { '.$pofo_post_meta_hover_color.' }';   
                    }
                    if( !empty( $pofo_blog_opacity ) ){
                        $pofo_featured_array[] = '.blog-post-style4 .blog-grid .blog-style8-'.$pofo_blog_style8.':hover .blog-img img { opacity:'.$pofo_blog_opacity.' }';   
                    }
                    if( !empty( $pofo_overlay_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' .blog-img { background:'.$pofo_overlay_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style8-'.$pofo_blog_style8.' a.btn { '.$pofo_button_border_color.' }';   
                    }
                    //Custom css end

                    $pofo_post_classes_personal = $pofo_post_classes_infinite_scroll = '';
                    if( $pofo_show_pagination == 1 ) {
                        if( $pofo_blog_pagination_style == 'infinite-scroll-pagination' ) {
                            $pofo_post_classes_infinite_scroll = ' blog-single-post';
                        }
                    }
                    $author_date_array = array();
                    $author_image = '';
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url($author_image_url).'" alt=""> ';
                    }
                    
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="pofo-blog-post-meta text-extra-small text-medium-gray display-inline-block published vertical-align-middle">'.get_the_date( $pofo_date_format, get_the_ID()).'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    if( $pofo_show_post_author == 1 ) {
                        $author_date_array[] = $author_image.'<span class="pofo-blog-post-meta text-medium-gray text-extra-small display-inline-block vertical-align-middle">'.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="text-medium-gray url fn n">'.get_the_author().'</a></span></span>';
                    }
                    if( $pofo_show_category == 1 && $post_category ){
                        $author_date_array[] = $post_category;
                    }
                    $output .= '<li class="grid-item blog-style8-'.$pofo_blog_style8.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_zoom_effect.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            $output .= '<figure>';
                                if ( !post_password_required() ) {
                                    if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-img bg-extra-dark-gray">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-img bg-extra-dark-gray">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';  
                                    }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-img bg-extra-dark-gray">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-img bg-extra-dark-gray">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-img bg-extra-dark-gray">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }else{
                                        if( has_post_thumbnail() ) {
                                            $output .= '<div class="blog-img bg-extra-dark-gray">';
                                                $output .=  '<a href="'.get_permalink().'">';
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                $output .=  '</a>';
                                            $output .= '</div>';
                                        }
                                    }
                                }
                                $output .= '<figcaption>';
                                    $output .= '<div class="portfolio-hover-main text-left">';
                                        $output .= '<div class="blog-hover-box vertical-align-bottom">';
                                            if( !empty( $author_date_array ) ){
                                                $output .= '<span class="post-author text-extra-small text-medium-gray display-block margin-5px-bottom xs-margin-5px-bottom'.$pofo_post_meta_text_transform.'">'.implode( '<span class="blog-separator display-inline-block vertical-align-middle">|</span>', $author_date_array ).'</span>';
                                            }
                                            if( $pofo_show_post_title == 1 ){
                                                $output .= '<h6 class="alt-font display-block text-white font-weight-600 no-margin-bottom">';
                                                    $output .= '<a href="'.get_the_permalink().'" class="text-white entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'"'.$pofo_title_style_attr.'>'.get_the_title().'</a>';
                                                $output .= '</h6>';
                                            }
                                            if( $pofo_show_excerpt == 1 ){
                                                $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                                $output .= '<div class="text-medium-gray margin-10px-top blog-hover-text entry-content">'.$show_excerpt_grid.'</div>';
                                            }elseif($pofo_show_content == 1){
                                                $output .='<div class="text-medium-gray margin-10px-top blog-hover-text blog-post-full-content entry-content">'.pofo_get_the_post_content().'</div>';
                                            }
                                            if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                                $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-20px-top sm-margin-15px-top'.$pofo_post_meta_text_transform.'">';
                                                    if( $pofo_show_like == 1 ){
                                                        $output .= pofo_get_simple_likes_button( get_the_ID() );
                                                    }
                                                    if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                        if( $pofo_show_like == 1 ){
                                                            $output .= ' ';
                                                        }
                                                        ob_start();
                                                            comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                            $output .= ob_get_contents();  
                                                        ob_end_clean();
                                                    }
                                                $output .= '</div>';
                                            }
                                            if( $pofo_show_button == 1 ){
                                                $output .= '<a href="'.get_permalink().'" class="btn-white btn btn-very-small no-margin-bottom margin-10px-top white-space-normal">'.$pofo_button_text.'</a>';
                                            }
                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</figcaption>';
                            $output .= '</figure>';
                        $output .= '</div>';
                    $output .= '</li>';
                break;

                case 'blog-only-text':

                    //Custom css start
                    $pofo_blog_style9 = !empty( $pofo_blog_style9 ) ? $pofo_blog_style9 : 0;
                    $pofo_blog_style9 = $pofo_blog_style9 + 1;

                    if( !empty( $pofo_title_hover_color ) ) {
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover .entry-title { '.$pofo_title_hover_color.' }';
                    }
                    if( !empty( $pofo_post_meta_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .pofo-blog-post-meta a, .blog-style9-'.$pofo_blog_style9.' .blog-separator, .blog-style9-'.$pofo_blog_style9.' .pofo-blog-post-meta { '.$pofo_post_meta_color.' }';   
                    }
                    if( !empty( $pofo_post_meta_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover .pofo-blog-post-meta span, .blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover .pofo-blog-post-meta a, .blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover .author span { '.$pofo_post_meta_hover_color.' }';
                    }
                    if( !empty( $pofo_separator_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover .separator-line-horrizontal-full { '.$pofo_separator_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' a.btn { '.$pofo_button_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' a.btn:hover { '.$pofo_button_hover_color.' }';   
                    }
                    if( !empty( $pofo_button_text_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' a.btn { '.$pofo_button_text_color.' }';   
                    }
                    if( !empty( $pofo_button_hover_text_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' a.btn:hover { '.$pofo_button_hover_text_color.' }';   
                    }
                    if( !empty( $pofo_button_border_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' a.btn { '.$pofo_button_border_color.' }';   
                    }

                    $pofo_box_bg_color_only_text = ($pofo_box_bg_color) ? ' background-color: '.$pofo_box_bg_color.' !important; ' : '';
                    $pofo_box_bg_hover_color_only_text = ($pofo_box_bg_hover_color) ? ' background-color: '.$pofo_box_bg_hover_color.' !important; ' : '';

                    if( !empty( $pofo_box_bg_hover_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .blog-post-style7:hover { '.$pofo_box_bg_hover_color_only_text.' }';   
                    }
                    if( !empty( $pofo_box_bg_color ) ){
                        $pofo_featured_array[] = '.blog-style9-'.$pofo_blog_style9.' .blog-post-style7 { '.$pofo_box_bg_color_only_text.' }';   
                    }

                    
                    //Custom css end

                    $border_color   = ( $pofo_box_border_color ) ? 'border-color: ' . $pofo_box_border_color . '; ' : '';
                    $border_size    = ( $pofo_box_border_size ) ? 'border-width: ' . $pofo_box_border_size . '; ' : '';
                    $border_type    = ( $pofo_box_border_type ) ? 'border-style: ' . $pofo_box_border_type . '; ' : '';
                    $border_style   = ( $pofo_box_enable_border == 0 ) ? 'border: none; ' : $border_color.$border_size.$border_type;

                    $pofo_show_date = get_the_date( $pofo_date_format, get_the_ID());

                    $author_image = '';
                    if( $pofo_show_post_author_image == 1 ) {
                        $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                        $author_image .= '<img class="border-radius-100 width-30px margin-10px-right" src="'.esc_url($author_image_url).'" alt=""> ';
                    }
                    $pofo_show_author   = $author_image.esc_html__('by','pofo-addons').' <span class="author vcard"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'" class="url fn n">'.get_the_author().'</a></span>';
                    $post_cat = array();
                    foreach ($categories as $k => $cat) {
                        $cat_link = get_category_link($cat->cat_ID);
                        $post_cat[]='<a href="'.$cat_link.'" class="pofo-blog-post-meta text-extra-small vertical-align-middle display-inline-block" rel="category tag">'.$cat->name.'</a>';
                    }
                    $post_category = !empty( $post_cat ) ? implode(", ",$post_cat) : '';
                    $author_date_array = array();
                    if( $pofo_show_post_date == 1 ) {
                        $author_date_array[] = '<span class="display-inline-block published vertical-align-middle opacity7">'.$pofo_show_date.'</span><time class="updated display-none" datetime="'.get_the_modified_date( 'c' ).'">'.get_the_modified_date( $pofo_date_format ).'</time>';
                    }
                    if( $pofo_show_category == 1 && $post_category ) {
                        $author_date_array[] = $post_category;
                    }
                    
                    $output .= '<div class="blog-post blog-style9-'.$pofo_blog_style9.''.$pofo_blog_type_settings.$class_column.$pofo_post_classes_infinite_scroll.$pofo_animation_style.'"'.$pofo_animation_delay_attr.'>';
                        $output .= '<div '.$pofo_post_classes.'>';
                            if ( !post_password_required() ) {
                                if( $pofo_show_post_thumbnail == 1 ){
                                    if( $post_format == 'image' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-image.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'gallery' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-gallery.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';  
                                    }elseif( $post_format == 'video' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-video.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();  
                                        $output .= '</div>';
                                    }elseif( $post_format == 'quote' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-quote.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }elseif( $post_format == 'audio' && $pofo_show_post_format != 1 ) {
                                        $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                            ob_start();
                                                include POFO_ADDONS_ROOT . '/loop/loop-audio.php';
                                                $output .= ob_get_contents();  
                                            ob_end_clean();
                                        $output .= '</div>';
                                    }else{
                                        if( has_post_thumbnail() ) {
                                            $output .= '<div class="blog-post-images overflow-hidden no-margin-bottom">';
                                                $output .=  '<a href="'.get_permalink().'">';
                                                    $output .= get_the_post_thumbnail( get_the_ID(), $pofo_srcset, $img_attr );
                                                $output .=  '</a>';
                                            $output .= '</div>';
                                        }
                                    }
                                }
                            }
                            $output .= '<div class="blog-post blog-post-style7 border-all border-color-light-gray padding-fourteen-all md-padding-ten-all bg-white xs-no-margin-bottom position-relative" style="'.$border_style.'">';
                                $output .= '<div class="post-details">';
                                    if( !empty( $author_date_array ) ){
                                        $output .= '<div class="pofo-blog-post-meta author text-extra-small display-block margin-10px-bottom xs-margin-5px-bottom'.$pofo_post_meta_text_transform.'">';
                                            $output .= implode( '<span class="blog-separator display-inline-block vertical-align-middle">|</span>', $author_date_array );
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_post_title == 1 ){
                                        $output .= '<span class="text-large alt-font margin-50px-bottom sm-margin-30px-bottom display-block"><a href="'.get_the_permalink().'" class="entry-title'.$pofo_title_dynamic_font_size.$pofo_post_title_text_transform.'"'.$pofo_title_style_attr.'>'.get_the_title().'</a></span>';
                                    }
                                    if( $pofo_show_excerpt == 1 ){
                                        $show_excerpt_grid = !empty( $pofo_excerpt_length ) ? pofo_get_the_excerpt_theme($pofo_excerpt_length) : pofo_get_the_excerpt_theme(15);
                                        $output .= '<div class="margin-ten-bottom display-block sm-margin-five-bottom entry-content">'.$show_excerpt_grid.'</div>';
                                    }elseif($pofo_show_content == 1){
                                        $output .='<div class="margin-ten-bottom display-block sm-margin-five-bottom blog-post-full-content entry-content">'.pofo_get_the_post_content().'</div>';
                                    }
                                    if( $pofo_show_separator == 1 ){
                                        $output .='<div class="separator-line-horrizontal-full bg-medium-light-gray margin-10px-bottom width-40"'.$sep_style_attr.'></div>';
                                    }
                                    if( $pofo_show_post_author == 1 ){
                                        $output .= '<div class="author position-relative'.$pofo_post_meta_text_transform.'">';
                                            $author_image = '';
                                            if( $pofo_show_post_author_image == 1 ) {
                                                $author_image_url = get_avatar_url( get_the_author_meta( 'ID' ) );
                                                $author_image .= '<img class="border-radius-100 width-30px" src="'.esc_url($author_image_url).'" alt=""> ';
                                            }
                                            $output .= '<span class="pofo-blog-post-meta text-extra-small">'.$pofo_show_author.'</span>';
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_like == 1 || $pofo_show_comment == 1 ){
                                        $output .= '<div class="pofo-blog-post-meta blog-like-comment margin-15px-top'.$pofo_post_meta_text_transform.'">';
                                            if( $pofo_show_like == 1 ){
                                                $output .= pofo_get_simple_likes_button( get_the_ID() );
                                            }
                                            if( $pofo_show_comment == 1 && (comments_open() || get_comments_number())){
                                                if( $pofo_show_like == 1 ){
                                                    $output .= ' ';
                                                }
                                                ob_start();
                                                    comments_popup_link( __( '<i class="far fa-comment"></i>Leave a comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>1 Comment', 'pofo-addons' ), __( '<i class="far fa-comment"></i>% Comment(s)', 'pofo-addons' ), 'comment' );
                                                    $output .= ob_get_contents();  
                                                ob_end_clean();
                                            }
                                        $output .= '</div>';
                                    }
                                    if( $pofo_show_button == 1 ){
                                        $output .= '<a href="'.get_permalink().'" class="btn-black btn btn-very-small no-margin-bottom margin-15px-top white-space-normal">'.$pofo_button_text.'</a>';
                                    }
                                $output .= '</div>';
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                break;
	        }
	        $i++;
        endwhile;
        wp_reset_postdata();
        
        switch ($pofo_blog_premade_style) {
            case 'blog-classic':
                $output .= '</div>';
                break;

            case 'blog-masonry':
                $output .= '</ul>';
                break;

            case 'blog-grid':
                $output .= '</div>';
                break;
            
            case 'blog-simple':
                $output .= '</div>';
                break;
            
            case 'blog-clean':
                $output .= '</div>';
                break;
            
            case 'blog-personal':
                $output .= '</ul>';
                $output .= '</div>';
                break;
            
            case 'blog-only-text':
                $output .= '</div>';
                break;
        }

        if( $pofo_show_pagination == 1 && $query->max_num_pages > 1 ){
            if( $pofo_blog_pagination_style == 'infinite-scroll-pagination'  ) {
                $output .='<div class="pagination pofo-infinite-scroll display-none" data-pagination="'.$query->max_num_pages.'">';
                    ob_start();
                        if( get_next_posts_link( '', $query->max_num_pages ) ) :
                            next_posts_link( '<span class="old-post">'.esc_html__( 'Older Post', 'pofo-addons' ).'</span><i class="fas fa-long-arrow-alt-right"></i>', $query->max_num_pages );
                        endif;
                    $output .= ob_get_contents();  
                    ob_end_clean();  
                $output .='</div>';

            } else {
            	$query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;
                $output .= '<div class=" text-center margin-70px-top sm-margin-30px-top clear-both float-left width-100">';
                $output .= '<div class="text-small text-uppercase text-extra-dark-gray pagination">';
                    $output .= paginate_links( array(
                        'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                        'format'       => '',
                        'add_args'     => '',
                        'current'      => $current,
                        'total'        => $query->max_num_pages,
                        'prev_text'    => '<i class="fas fa-long-arrow-alt-left margin-5px-right"></i> <span class="xs-display-none border-none">'.esc_html( 'Prev','pofo-addons').'</span>',
                        'next_text'    => '<span class="xs-display-none border-none">'.esc_html( 'Next', 'pofo-addons').'</span> <i class="fas fa-long-arrow-alt-right margin-5px-left"></i>',
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 2
                    ) );
                $output .= '</div>';
                $output .= '</div>';
            }
        }
        
        if( $id || $class ):
            $output .= '</div>';
        endif;
        return $output;
    }
}
add_shortcode("pofo_blog","pofo_blog_shortcode");
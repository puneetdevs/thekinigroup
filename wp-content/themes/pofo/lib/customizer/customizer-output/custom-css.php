<?php
/**
 * Generate css.
 *
 * @package Pofo
 */
?>
<?php

	if ( !defined( 'ABSPATH' ) ) { exit; }

    $pofo_enable_main_font = get_theme_mod( 'pofo_enable_main_font', '1' );
    $pofo_enable_alt_font  = get_theme_mod( 'pofo_enable_alt_font', '1' );
    $pofo_main_font   = get_theme_mod( 'pofo_main_font', 'Roboto' ); // Roboto
    $pofo_alt_font    = get_theme_mod( 'pofo_alt_font', 'Montserrat' ); // Montserrat

    /* Body Settings */
    $pofo_body_font_size = get_theme_mod( 'pofo_body_font_size', '' );
    $pofo_body_font_line_height = get_theme_mod( 'pofo_body_font_line_height', '' );
    $pofo_body_font_letter_spacing = get_theme_mod( 'pofo_body_font_letter_spacing', '' );
    $pofo_body_background_color = pofo_option( 'pofo_body_background_color', '' );
    $pofo_body_text_color = get_theme_mod( 'pofo_body_text_color', '' );

    /* Mini Header Settings */
    $pofo_mini_header_background_color = pofo_option( 'pofo_mini_header_background_color', '' );
    $pofo_mini_header_text_color = pofo_option( 'pofo_mini_header_text_color', '' );
    $pofo_mini_header_text_hover_color = pofo_option( 'pofo_mini_header_text_hover_color', '' );

    /* Header SVG logo width */
    $pofo_header_svg_width = pofo_option( 'pofo_header_svg_width', '' );
    $pofo_logo = pofo_option( 'pofo_logo', '' );
    $pofo_logo_light = pofo_option( 'pofo_logo_light', '' );

    $pofo_logo_extension = $pofo_logo_light_extension = '';
    if( !empty( $pofo_logo ) ) {
        $data = wp_check_filetype( $pofo_logo );
        $pofo_logo_extension = !empty( $data['ext'] ) ? $data['ext'] : '';
    }
    if( !empty( $pofo_logo_light ) ) {
        $data = wp_check_filetype( $pofo_logo_light );
        $pofo_logo_light_extension = !empty( $data['ext'] ) ? $data['ext'] : '';
    }

    /* Content */
    $pofo_content_font_size = get_theme_mod( 'pofo_content_font_size', '' );
    $pofo_content_font_line_height = get_theme_mod( 'pofo_content_font_line_height', '' );
    $pofo_content_font_letter_spacing = get_theme_mod( 'pofo_content_font_letter_spacing', '' );
    $pofo_content_link_color = get_theme_mod( 'pofo_content_link_color', '' );
    $pofo_content_link_hover_color = get_theme_mod( 'pofo_content_link_hover_color', '' );
    
    /* Footer Settings */
    $pofo_header_copyright_text_color = pofo_option( 'pofo_header_copyright_text_color', '' );
    $pofo_footer_wrapper_bg_color = pofo_option( 'pofo_footer_wrapper_bg_color', '' );
    $pofo_footer_wrapper_text_color = pofo_option( 'pofo_footer_wrapper_text_color', '' );
    $pofo_footer_wrapper_text_font_size = pofo_option( 'pofo_footer_wrapper_text_font_size', '' );
    $pofo_footer_wrapper_text_line_height = pofo_option( 'pofo_footer_wrapper_text_line_height', '' );
    $pofo_footer_wrapper_text_letter_spacing = pofo_option( 'pofo_footer_wrapper_text_letter_spacing', '' );
    $pofo_footer_social_text_font_size = pofo_option( 'pofo_footer_social_text_font_size', '' );
    $pofo_footer_social_text_line_height = pofo_option( 'pofo_footer_social_text_line_height', '' );
    $pofo_footer_social_text_letter_spacing = pofo_option( 'pofo_footer_social_text_letter_spacing', '' );
    $pofo_footer_social_icon_font_size = pofo_option( 'pofo_footer_social_icon_font_size', '' );
    $pofo_footer_social_icon_line_height = pofo_option( 'pofo_footer_social_icon_line_height', '' );
    $pofo_footer_social_icon_letter_spacing = pofo_option( 'pofo_footer_social_icon_letter_spacing', '' );
    $pofo_footer_bg_color = pofo_option( 'pofo_footer_bg_color', '' );
    $pofo_footer_text_color = pofo_option( 'pofo_footer_text_color', '' );
    $pofo_footer_link_color = pofo_option( 'pofo_footer_link_color', '' );
    $pofo_footer_link_hover_color = pofo_option( 'pofo_footer_link_hover_color', '' );
    $pofo_footer_border_color = pofo_option( 'pofo_footer_border_color', '' );
    $pofo_footer_widget_title_font_size = get_theme_mod( 'pofo_footer_widget_title_font_size', '' );
    $pofo_footer_widget_title_line_height = get_theme_mod( 'pofo_footer_widget_title_line_height', '' );
    $pofo_footer_widget_title_letter_spacing = get_theme_mod( 'pofo_footer_widget_title_letter_spacing', '' );
    $pofo_footer_widget_title_color = pofo_option( 'pofo_footer_widget_title_color', '' );
    $pofo_footer_bottom_bg_color = pofo_option( 'pofo_footer_bottom_bg_color', '' );
    $pofo_footer_bottom_text_color = pofo_option( 'pofo_footer_bottom_text_color', '' );
    $pofo_footer_bottom_link_color = pofo_option( 'pofo_footer_bottom_link_color', '' );
    $pofo_footer_bottom_link_hover_color = pofo_option( 'pofo_footer_bottom_link_hover_color', '' );
    $pofo_footer_wrapper_padding_setting = pofo_option( 'pofo_footer_wrapper_padding_setting', 'small-padding' );
    $pofo_footer_padding_setting = pofo_option( 'pofo_footer_padding_setting', 'small-padding' );
    $pofo_footer_bottom_padding_setting = get_theme_mod( 'pofo_footer_bottom_padding_setting', 'small-padding' );
    $pofo_footer_bottom_border_color = pofo_option( 'pofo_footer_bottom_border_color', '' );
    $pofo_footer_before_text_color = pofo_option( 'pofo_footer_before_text_color', '' );
    $pofo_footer_social_icon_color = pofo_option( 'pofo_footer_social_icon_color', '' );
    $pofo_footer_social_icon_hover_color = pofo_option( 'pofo_footer_social_icon_hover_color', '' );
    $pofo_footer_bottom_left_text_font_size = pofo_option( 'pofo_footer_bottom_left_text_font_size', '' );
    $pofo_footer_bottom_left_text_line_height = pofo_option( 'pofo_footer_bottom_left_text_line_height', '' );
    $pofo_footer_bottom_left_text_letter_spacing = pofo_option( 'pofo_footer_bottom_left_text_letter_spacing', '' );
    $pofo_footer_bottom_right_text_font_size = pofo_option( 'pofo_footer_bottom_right_text_font_size', '' );
    $pofo_footer_bottom_right_text_line_height = pofo_option( 'pofo_footer_bottom_right_text_line_height', '' );
    $pofo_footer_bottom_right_text_letter_spacing = pofo_option( 'pofo_footer_bottom_right_text_letter_spacing', '' );
    
    /* Page Title Settings */
    $pofo_page_title_opacity_color = pofo_option( 'pofo_page_title_opacity_color', '' );
    $pofo_page_title_bg_color = pofo_option( 'pofo_page_title_bg_color', '' );
    $pofo_page_title_color = pofo_option( 'pofo_page_title_color', '' );
    $pofo_page_subtitle_color = pofo_option( 'pofo_page_subtitle_color', '' );
    $pofo_page_title_breadcrumb_bg_color = pofo_option( 'pofo_page_title_breadcrumb_bg_color', '' );
    $pofo_page_title_breadcrumb_border_color = pofo_option( 'pofo_page_title_breadcrumb_border_color', '' );
    $pofo_page_title_breadcrumb_color = pofo_option( 'pofo_page_title_breadcrumb_color', '' );
    $pofo_page_title_breadcrumb_text_hover_color = pofo_option( 'pofo_page_title_breadcrumb_text_hover_color', '' );
    $pofo_page_title_font_size = pofo_option( 'pofo_page_title_font_size', '' );
    $pofo_page_title_line_height = pofo_option( 'pofo_page_title_line_height', '' );
    $pofo_page_title_letter_spacing = pofo_option( 'pofo_page_title_letter_spacing', '' );
    $pofo_page_subtitle_font_size = pofo_option( 'pofo_page_subtitle_font_size', '' );
    $pofo_page_subtitle_line_height = pofo_option( 'pofo_page_subtitle_line_height', '' );
    $pofo_page_subtitle_letter_spacing = pofo_option( 'pofo_page_subtitle_letter_spacing', '' );
    $pofo_page_breadcrumb_font_size = pofo_option( 'pofo_page_breadcrumb_font_size', '' );
    $pofo_page_breadcrumb_line_height = pofo_option( 'pofo_page_breadcrumb_line_height', '' );
    $pofo_page_breadcrumb_letter_spacing = pofo_option( 'pofo_page_breadcrumb_letter_spacing', '' );
    $pofo_page_title_icon_bg_color = pofo_option( 'pofo_page_title_icon_bg_color', '' );
    $pofo_page_title_icon_color = pofo_option( 'pofo_page_title_icon_color', '' );

    /* Single Post Title Settings */
    $pofo_single_post_title_opacity_color = pofo_option( 'pofo_single_post_title_opacity_color', '' );
    $pofo_single_post_title_bg_color = pofo_option( 'pofo_single_post_title_bg_color', '' );
    $pofo_single_post_title_color = pofo_option( 'pofo_single_post_title_color', '' );
    $pofo_single_post_subtitle_color = pofo_option( 'pofo_single_post_subtitle_color', '' );
    $pofo_single_post_title_breadcrumb_color = pofo_option( 'pofo_single_post_title_breadcrumb_color', '' );
    $pofo_single_post_title_breadcrumb_text_hover_color = pofo_option( 'pofo_single_post_title_breadcrumb_text_hover_color', '' );
    $pofo_single_post_title_breadcrumb_bg_color = pofo_option( 'pofo_single_post_title_breadcrumb_bg_color', '' );
    $pofo_single_post_title_breadcrumb_border_color = pofo_option( 'pofo_single_post_title_breadcrumb_border_color', '' );
    $pofo_single_post_title_font_size = pofo_option( 'pofo_single_post_title_font_size', '' );
    $pofo_single_post_title_line_height = pofo_option( 'pofo_single_post_title_line_height', '' );
    $pofo_single_post_title_letter_spacing = pofo_option( 'pofo_single_post_title_letter_spacing', '' );
    $pofo_single_post_subtitle_font_size = pofo_option( 'pofo_single_post_subtitle_font_size', '' );
    $pofo_single_post_subtitle_line_height = pofo_option( 'pofo_single_post_subtitle_line_height', '' );
    $pofo_single_post_subtitle_letter_spacing = pofo_option( 'pofo_single_post_subtitle_letter_spacing', '' );
    $pofo_single_post_breadcrumb_font_size = pofo_option( 'pofo_single_post_breadcrumb_font_size', '' );
    $pofo_single_post_breadcrumb_line_height = pofo_option( 'pofo_single_post_breadcrumb_line_height', '' );
    $pofo_single_post_breadcrumb_letter_spacing = pofo_option( 'pofo_single_post_breadcrumb_letter_spacing', '' );
    $pofo_single_post_title_icon_bg_color = pofo_option( 'pofo_single_post_title_icon_bg_color', '' );
    $pofo_single_post_title_icon_color = pofo_option( 'pofo_single_post_title_icon_color', '' );

    /* Single Portfolio Title Settings */
    $pofo_single_portfolio_title_opacity_color = pofo_option( 'pofo_single_portfolio_title_opacity_color', '' );
    $pofo_single_portfolio_title_bg_color = pofo_option( 'pofo_single_portfolio_title_bg_color', '' );
    $pofo_single_portfolio_title_color = pofo_option( 'pofo_single_portfolio_title_color', '' );
    $pofo_single_portfolio_subtitle_color = pofo_option( 'pofo_single_portfolio_subtitle_color', '' );
    $pofo_single_portfolio_title_breadcrumb_color = pofo_option( 'pofo_single_portfolio_title_breadcrumb_color', '' );
    $pofo_single_portfolio_title_breadcrumb_text_hover_color = pofo_option( 'pofo_single_portfolio_title_breadcrumb_text_hover_color', '' );
    $pofo_single_portfolio_title_breadcrumb_bg_color = pofo_option( 'pofo_single_portfolio_title_breadcrumb_bg_color', '' );
    $pofo_single_portfolio_title_breadcrumb_border_color = pofo_option( 'pofo_single_portfolio_title_breadcrumb_border_color', '' );
    $pofo_single_portfolio_title_font_size = pofo_option( 'pofo_single_portfolio_title_font_size', '' );
    $pofo_single_portfolio_title_line_height = pofo_option( 'pofo_single_portfolio_title_line_height', '' );
    $pofo_single_portfolio_title_letter_spacing = pofo_option( 'pofo_single_portfolio_title_letter_spacing', '' );
    $pofo_single_portfolio_subtitle_font_size = pofo_option( 'pofo_single_portfolio_subtitle_font_size', '' );
    $pofo_single_portfolio_subtitle_line_height = pofo_option( 'pofo_single_portfolio_subtitle_line_height', '' );
    $pofo_single_portfolio_subtitle_letter_spacing = pofo_option( 'pofo_single_portfolio_subtitle_letter_spacing', '' );
    $pofo_single_portfolio_breadcrumb_font_size = pofo_option( 'pofo_single_portfolio_breadcrumb_font_size', '' );
    $pofo_single_portfolio_breadcrumb_line_height = pofo_option( 'pofo_single_portfolio_breadcrumb_line_height', '' );
    $pofo_single_portfolio_breadcrumb_letter_spacing = pofo_option( 'pofo_single_portfolio_breadcrumb_letter_spacing', '' );
    $pofo_single_portfolio_title_icon_bg_color = pofo_option( 'pofo_single_portfolio_title_icon_bg_color', '' );
    $pofo_single_portfolio_title_icon_color = pofo_option( 'pofo_single_portfolio_title_icon_color', '' );

    /* Single Product Title Settings */
    $pofo_single_product_title_opacity_color = pofo_option( 'pofo_single_product_title_opacity_color', '' );
    $pofo_single_product_title_bg_color = pofo_option( 'pofo_single_product_title_bg_color', '' );
    $pofo_single_product_title_color = pofo_option( 'pofo_single_product_title_color', '' );
    $pofo_single_product_subtitle_color = pofo_option( 'pofo_single_product_subtitle_color', '' );
    $pofo_single_product_title_breadcrumb_color = pofo_option( 'pofo_single_product_title_breadcrumb_color', '' );
    $pofo_single_product_title_breadcrumb_text_hover_color = pofo_option( 'pofo_single_product_title_breadcrumb_text_hover_color', '' );
    $pofo_single_product_title_breadcrumb_bg_color = pofo_option( 'pofo_single_product_title_breadcrumb_bg_color', '' );
    $pofo_single_product_title_breadcrumb_border_color = pofo_option( 'pofo_single_product_title_breadcrumb_border_color', '' );
    $pofo_single_product_title_font_size = pofo_option( 'pofo_single_product_title_font_size', '' );
    $pofo_single_product_title_line_height = pofo_option( 'pofo_single_product_title_line_height', '' );
    $pofo_single_product_title_letter_spacing = pofo_option( 'pofo_single_product_title_letter_spacing', '' );
    $pofo_single_product_subtitle_font_size = pofo_option( 'pofo_single_product_subtitle_font_size', '' );
    $pofo_single_product_subtitle_line_height = pofo_option( 'pofo_single_product_subtitle_line_height', '' );
    $pofo_single_product_subtitle_letter_spacing = pofo_option( 'pofo_single_product_subtitle_letter_spacing', '' );
    $pofo_single_product_breadcrumb_font_size = pofo_option( 'pofo_single_product_breadcrumb_font_size', '' );
    $pofo_single_product_breadcrumb_line_height = pofo_option( 'pofo_single_product_breadcrumb_line_height', '' );
    $pofo_single_product_breadcrumb_letter_spacing = pofo_option( 'pofo_single_product_breadcrumb_letter_spacing', '' );
    $pofo_single_product_title_icon_bg_color = pofo_option( 'pofo_single_product_title_icon_bg_color', '' );
    $pofo_single_product_title_icon_color = pofo_option( 'pofo_single_product_title_icon_color', '' );

    /* Archive Page Title Settings */
    $pofo_archive_title_opacity_color = pofo_option( 'pofo_archive_title_opacity_color', '' );
    $pofo_archive_title_bg_color = pofo_option( 'pofo_archive_title_bg_color', '' );
    $pofo_archive_title_color = pofo_option( 'pofo_archive_title_color', '' );
    $pofo_archive_subtitle_color = pofo_option( 'pofo_archive_subtitle_color', '' );
    $pofo_archive_title_breadcrumb_color = pofo_option( 'pofo_archive_title_breadcrumb_color', '' );
    $pofo_archive_title_breadcrumb_text_hover_color = pofo_option( 'pofo_archive_title_breadcrumb_text_hover_color', '' );
    $pofo_archive_title_breadcrumb_bg_color = pofo_option( 'pofo_archive_title_breadcrumb_bg_color', '' );
    $pofo_archive_title_breadcrumb_border_color = pofo_option( 'pofo_archive_title_breadcrumb_border_color', '' );
    $pofo_archive_title_font_size = pofo_option( 'pofo_archive_title_font_size', '' );
    $pofo_archive_title_line_height = pofo_option( 'pofo_archive_title_line_height', '' );
    $pofo_archive_title_letter_spacing = pofo_option( 'pofo_archive_title_letter_spacing', '' );
    $pofo_archive_subtitle_font_size = pofo_option( 'pofo_archive_subtitle_font_size', '' );
    $pofo_archive_subtitle_line_height = pofo_option( 'pofo_archive_subtitle_line_height', '' );
    $pofo_archive_subtitle_letter_spacing = pofo_option( 'pofo_archive_subtitle_letter_spacing', '' );
    $pofo_archive_breadcrumb_font_size = pofo_option( 'pofo_archive_breadcrumb_font_size', '' );
    $pofo_archive_breadcrumb_line_height = pofo_option( 'pofo_archive_breadcrumb_line_height', '' );
    $pofo_archive_breadcrumb_letter_spacing = pofo_option( 'pofo_archive_breadcrumb_letter_spacing', '' );
    $pofo_archive_title_icon_bg_color = pofo_option( 'pofo_archive_title_icon_bg_color', '' );
    $pofo_archive_title_icon_color = pofo_option( 'pofo_archive_title_icon_color', '' );

    /* Default Page Title Settings */
    $pofo_default_title_opacity_color = pofo_option( 'pofo_default_title_opacity_color', '' );
    $pofo_default_title_bg_color = pofo_option( 'pofo_default_title_bg_color', '' );
    $pofo_default_title_color = pofo_option( 'pofo_default_title_color', '' );
    $pofo_default_subtitle_color = pofo_option( 'pofo_default_subtitle_color', '' );
    $pofo_default_title_breadcrumb_color = pofo_option( 'pofo_default_title_breadcrumb_color', '' );
    $pofo_default_title_breadcrumb_text_hover_color = pofo_option( 'pofo_default_title_breadcrumb_text_hover_color', '' );
    $pofo_default_title_breadcrumb_bg_color = pofo_option( 'pofo_default_title_breadcrumb_bg_color', '' );
    $pofo_default_title_breadcrumb_border_color = pofo_option( 'pofo_default_title_breadcrumb_border_color', '' );
    $pofo_default_title_font_size = pofo_option( 'pofo_default_title_font_size', '' );
    $pofo_default_title_line_height = pofo_option( 'pofo_default_title_line_height', '' );
    $pofo_default_title_letter_spacing = pofo_option( 'pofo_default_title_letter_spacing', '' );
    $pofo_default_subtitle_font_size = pofo_option( 'pofo_default_subtitle_font_size', '' );
    $pofo_default_subtitle_line_height = pofo_option( 'pofo_default_subtitle_line_height', '' );
    $pofo_default_subtitle_letter_spacing = pofo_option( 'pofo_default_subtitle_letter_spacing', '' );
    $pofo_default_breadcrumb_font_size = pofo_option( 'pofo_default_breadcrumb_font_size', '' );
    $pofo_default_breadcrumb_line_height = pofo_option( 'pofo_default_breadcrumb_line_height', '' );
    $pofo_default_breadcrumb_letter_spacing = pofo_option( 'pofo_default_breadcrumb_letter_spacing', '' );
    $pofo_default_title_icon_bg_color = pofo_option( 'pofo_default_title_icon_bg_color', '' );
    $pofo_default_title_icon_color = pofo_option( 'pofo_default_title_icon_color', '' );

    /* Portfolio Archive Page Title Settings */
    $pofo_portfolio_archive_title_opacity_color = pofo_option( 'pofo_portfolio_archive_title_opacity_color', '' );
    $pofo_portfolio_archive_title_bg_color = pofo_option( 'pofo_portfolio_archive_title_bg_color', '' );
    $pofo_portfolio_archive_title_color = pofo_option( 'pofo_portfolio_archive_title_color', '' );
    $pofo_portfolio_archive_subtitle_color = pofo_option( 'pofo_portfolio_archive_subtitle_color', '' );
    $pofo_portfolio_archive_title_breadcrumb_color = pofo_option( 'pofo_portfolio_archive_title_breadcrumb_color', '' );
    $pofo_portfolio_archive_title_breadcrumb_text_hover_color = pofo_option( 'pofo_portfolio_archive_title_breadcrumb_text_hover_color', '' );
    $pofo_portfolio_archive_title_breadcrumb_bg_color = pofo_option( 'pofo_portfolio_archive_title_breadcrumb_bg_color', '' );
    $pofo_portfolio_archive_title_breadcrumb_border_color = pofo_option( 'pofo_portfolio_archive_title_breadcrumb_border_color', '' );
    $pofo_portfolio_archive_title_font_size = pofo_option( 'pofo_portfolio_archive_title_font_size', '' );
    $pofo_portfolio_archive_title_line_height = pofo_option( 'pofo_portfolio_archive_title_line_height', '' );
    $pofo_portfolio_archive_title_letter_spacing = pofo_option( 'pofo_portfolio_archive_title_letter_spacing', '' );
    $pofo_portfolio_archive_subtitle_font_size = pofo_option( 'pofo_portfolio_archive_subtitle_font_size', '' );
    $pofo_portfolio_archive_subtitle_line_height = pofo_option( 'pofo_portfolio_archive_subtitle_line_height', '' );
    $pofo_portfolio_archive_subtitle_letter_spacing = pofo_option( 'pofo_portfolio_archive_subtitle_letter_spacing', '' );
    $pofo_portfolio_archive_breadcrumb_font_size = pofo_option( 'pofo_portfolio_archive_breadcrumb_font_size', '' );
    $pofo_portfolio_archive_breadcrumb_line_height = pofo_option( 'pofo_portfolio_archive_breadcrumb_line_height', '' );
    $pofo_portfolio_archive_breadcrumb_letter_spacing = pofo_option( 'pofo_portfolio_archive_breadcrumb_letter_spacing', '' );
    $pofo_portfolio_archive_title_icon_bg_color = pofo_option( 'pofo_portfolio_archive_title_icon_bg_color', '' );
    $pofo_portfolio_archive_title_icon_color = pofo_option( 'pofo_portfolio_archive_title_icon_color', '' );

    /* Product Archive Page Title Settings */
    $pofo_product_archive_title_opacity_color = pofo_option( 'pofo_product_archive_title_opacity_color', '' );
    $pofo_product_archive_title_bg_color = pofo_option( 'pofo_product_archive_title_bg_color', '' );
    $pofo_product_archive_title_color = pofo_option( 'pofo_product_archive_title_color', '' );
    $pofo_product_archive_subtitle_color = pofo_option( 'pofo_product_archive_subtitle_color', '' );
    $pofo_product_archive_title_breadcrumb_color = pofo_option( 'pofo_product_archive_title_breadcrumb_color', '' );
    $pofo_product_archive_title_breadcrumb_text_hover_color = pofo_option( 'pofo_product_archive_title_breadcrumb_text_hover_color', '' );
    $pofo_product_archive_title_breadcrumb_bg_color = pofo_option( 'pofo_product_archive_title_breadcrumb_bg_color', '' );
    $pofo_product_archive_title_breadcrumb_border_color = pofo_option( 'pofo_product_archive_title_breadcrumb_border_color', '' );
    $pofo_product_archive_title_font_size = pofo_option( 'pofo_product_archive_title_font_size', '' );
    $pofo_product_archive_title_line_height = pofo_option( 'pofo_product_archive_title_line_height', '' );
    $pofo_product_archive_title_letter_spacing = pofo_option( 'pofo_product_archive_title_letter_spacing', '' );
    $pofo_product_archive_subtitle_font_size = pofo_option( 'pofo_product_archive_subtitle_font_size', '' );
    $pofo_product_archive_subtitle_line_height = pofo_option( 'pofo_product_archive_subtitle_line_height', '' );
    $pofo_product_archive_subtitle_letter_spacing = pofo_option( 'pofo_product_archive_subtitle_letter_spacing', '' );
    $pofo_product_archive_breadcrumb_font_size = pofo_option( 'pofo_product_archive_breadcrumb_font_size', '' );
    $pofo_product_archive_breadcrumb_line_height = pofo_option( 'pofo_product_archive_breadcrumb_line_height', '' );
    $pofo_product_archive_breadcrumb_letter_spacing = pofo_option( 'pofo_product_archive_breadcrumb_letter_spacing', '' );
    $pofo_product_archive_title_icon_bg_color = pofo_option( 'pofo_product_archive_title_icon_bg_color', '' );
    $pofo_product_archive_title_icon_color = pofo_option( 'pofo_product_archive_title_icon_color', '' );

    /* Sticky Post Settings */
    $pofo_box_bg_color_sticky = get_theme_mod( 'pofo_box_bg_color_sticky', '' );
    $pofo_post_meta_color_sticky = get_theme_mod( 'pofo_post_meta_color_sticky', '' );
    $pofo_post_meta_hover_color_sticky = get_theme_mod( 'pofo_post_meta_hover_color_sticky', '' );
    $pofo_button_color_sticky = get_theme_mod( 'pofo_button_color_sticky', '' );
    $pofo_button_hover_color_sticky = get_theme_mod( 'pofo_button_hover_color_sticky', '' );
    $pofo_button_text_color_sticky = get_theme_mod( 'pofo_button_text_color_sticky', '' );
    $pofo_button_hover_text_color_sticky = get_theme_mod( 'pofo_button_hover_text_color_sticky', '' );
    $pofo_button_border_color_sticky = get_theme_mod( 'pofo_button_border_color_sticky', '' );
    $pofo_separator_color_sticky = get_theme_mod( 'pofo_separator_color_sticky', '' );
    $pofo_box_border_color_sticky = get_theme_mod( 'pofo_box_border_color_sticky', '' );
    $pofo_box_border_size_sticky = get_theme_mod( 'pofo_box_border_size_sticky', '' );
    $pofo_box_border_type_sticky = get_theme_mod( 'pofo_box_border_type_sticky', '' );
    $pofo_title_color_sticky = get_theme_mod( 'pofo_title_color_sticky', '' );
    $pofo_title_hover_color_sticky = get_theme_mod( 'pofo_title_hover_color_sticky', '' );
    $pofo_content_color_sticky = get_theme_mod( 'pofo_content_color_sticky', '' );
    $pofo_meta_border_color_sticky = get_theme_mod( 'pofo_meta_border_color_sticky', '' );

    /* Archive Pages Settings */
    $pofo_blog_premade_style_archive = get_theme_mod( 'pofo_blog_premade_style_archive', 'blog-list' );
    $pofo_box_bg_color_archive = get_theme_mod( 'pofo_box_bg_color_archive', '' );
    $pofo_box_bg_hover_color_archive = get_theme_mod( 'pofo_box_bg_hover_color_archive', '' );
    $pofo_post_meta_color_archive = get_theme_mod( 'pofo_post_meta_color_archive', '' );
    $pofo_post_meta_hover_color_archive = get_theme_mod( 'pofo_post_meta_hover_color_archive', '' );
    $pofo_button_color_archive = get_theme_mod( 'pofo_button_color_archive', '' );
    $pofo_button_hover_color_archive = get_theme_mod( 'pofo_button_hover_color_archive', '' );
    $pofo_button_text_color_archive = get_theme_mod( 'pofo_button_text_color_archive', '' );
    $pofo_button_hover_text_color_archive = get_theme_mod( 'pofo_button_hover_text_color_archive', '' );
    $pofo_button_border_color_archive = get_theme_mod( 'pofo_button_border_color_archive', '' );
    $pofo_separator_color_archive = get_theme_mod( 'pofo_separator_color_archive', '' );
    $pofo_box_border_color_archive = get_theme_mod( 'pofo_box_border_color_archive', '' );
    $pofo_box_border_size_archive = get_theme_mod( 'pofo_box_border_size_archive', '' );
    $pofo_box_border_type_archive = get_theme_mod( 'pofo_box_border_type_archive', '' );
    $pofo_title_color_archive = get_theme_mod( 'pofo_title_color_archive', '' );
    $pofo_title_hover_color_archive = get_theme_mod( 'pofo_title_hover_color_archive', '' );
    $pofo_content_color_archive = get_theme_mod( 'pofo_content_color_archive', '' );
    $pofo_show_separator_archive = get_theme_mod( 'pofo_show_separator_archive', 1 );
    $pofo_seperator_height_archive = get_theme_mod( 'pofo_seperator_height_archive', '' );
    $pofo_opacity_archive = get_theme_mod( 'pofo_opacity_archive', '' );
    $pofo_overlay_color_archive = get_theme_mod( 'pofo_overlay_color_archive', '' );

    /* Default Page Settings */
    $pofo_box_bg_color_default = get_theme_mod( 'pofo_box_bg_color_default', '' );
    $pofo_box_bg_hover_color_default = get_theme_mod( 'pofo_box_bg_hover_color_default', '' );
    $pofo_post_meta_color_default = get_theme_mod( 'pofo_post_meta_color_default', '' );
    $pofo_post_meta_hover_color_default = get_theme_mod( 'pofo_post_meta_hover_color_default', '' );
    $pofo_button_color_default = get_theme_mod( 'pofo_button_color_default', '' );
    $pofo_button_hover_color_default = get_theme_mod( 'pofo_button_hover_color_default', '' );
    $pofo_button_text_color_default = get_theme_mod( 'pofo_button_text_color_default', '' );
    $pofo_button_hover_text_color_default = get_theme_mod( 'pofo_button_hover_text_color_default', '' );
    $pofo_button_border_color_default = get_theme_mod( 'pofo_button_border_color_default', '' );
    $pofo_separator_color_default = get_theme_mod( 'pofo_separator_color_default', '' );
    $pofo_box_border_color_default = get_theme_mod( 'pofo_box_border_color_default', '' );
    $pofo_box_border_size_default = get_theme_mod( 'pofo_box_border_size_default', '' );
    $pofo_box_border_type_default = get_theme_mod( 'pofo_box_border_type_default', '' );
    $pofo_title_color_default = get_theme_mod( 'pofo_title_color_default', '' );
    $pofo_title_hover_color_default = get_theme_mod( 'pofo_title_hover_color_default', '' );
    $pofo_content_color_default = get_theme_mod( 'pofo_content_color_default', '' );
    $pofo_show_separator_default = get_theme_mod( 'pofo_show_separator_default', 1 );
    $pofo_seperator_height_default = get_theme_mod( 'pofo_seperator_height_default', '' );
    $pofo_opacity_default = get_theme_mod( 'pofo_opacity_default', '0.5' );
    $pofo_overlay_color_default = get_theme_mod( 'pofo_overlay_color_default', '' );

    /* Post Detail Page Settings */
    $pofo_related_post_title_border = get_theme_mod( 'pofo_related_post_title_border', '1' );
    $pofo_related_post_general_title_color = get_theme_mod( 'pofo_related_post_general_title_color', '' );
    $pofo_related_post_general_title_border_color = get_theme_mod( 'pofo_related_post_general_title_border_color', '' );

    $pofo_related_post_bg_color = pofo_option( 'pofo_related_post_bg_color', '' );
    $pofo_related_post_title_color = pofo_option( 'pofo_related_post_title_color', '' );
    $pofo_related_post_title_hover_color = pofo_option( 'pofo_related_post_title_hover_color', '' );
    $pofo_related_post_meta_color = pofo_option( 'pofo_related_post_meta_color', '' );
    $pofo_related_post_meta_hover_color = pofo_option( 'pofo_related_post_meta_hover_color', '' );
    $pofo_related_post_content_color = pofo_option( 'pofo_related_post_content_color', '' );
    $pofo_related_post_separator_color = pofo_option( 'pofo_related_post_separator_color', '' );
    $pofo_related_posts_opacity = pofo_option( 'pofo_related_posts_opacity', '0.5' );
    $pofo_related_post_overlay_color = pofo_option( 'pofo_related_post_overlay_color', '' );
    $pofo_post_tag_like_color = pofo_option( 'pofo_post_tag_like_color', '' );
    $pofo_post_tag_like_hover_color = pofo_option( 'pofo_post_tag_like_hover_color', '' );
    $pofo_post_author_box_bg_color = pofo_option( 'pofo_post_author_box_bg_color', '' );
    $pofo_post_author_title_text_color = pofo_option( 'pofo_post_author_title_text_color', '' );
    $pofo_post_author_title_text_hover_color = pofo_option( 'pofo_post_author_title_text_hover_color', '' );
    $pofo_post_author_content_color = pofo_option( 'pofo_post_author_content_color', '' );
    $pofo_single_post_meta_text_color = pofo_option( 'pofo_single_post_meta_text_color', '' );
    $pofo_single_post_meta_text_hover_color = pofo_option( 'pofo_single_post_meta_text_hover_color', '' );

    /* Comment Settings */
    $pofo_general_comment_title_border = get_theme_mod( 'pofo_general_comment_title_border', '1' );
    $pofo_comment_title_font_size = get_theme_mod( 'pofo_comment_title_font_size', '' );
    $pofo_comment_title_font_line_height = get_theme_mod( 'pofo_comment_title_font_line_height', '' );
    $pofo_comment_title_font_letter_spacing = get_theme_mod( 'pofo_comment_title_font_letter_spacing', '' );
    $pofo_general_comment_title_color = get_theme_mod( 'pofo_general_comment_title_color', '' );
    $pofo_general_comment_border_color = get_theme_mod( 'pofo_general_comment_border_color', '' );

    /* 404 page Settings */
    $pofo_404_content_bg_color = get_theme_mod( 'pofo_404_content_bg_color', '' );
    $pofo_404_title_color = get_theme_mod( 'pofo_404_title_color', '' );
    $pofo_404_subtitle_color = get_theme_mod( 'pofo_404_subtitle_color', '' );
    $pofo_404_content_color = get_theme_mod( 'pofo_404_content_color', '' );
    $pofo_404_bg_color = get_theme_mod( 'pofo_404_bg_color', '' );
    $pofo_404_page_opacity = get_theme_mod( 'pofo_404_page_opacity', '0.8' );
    $pofo_page_not_found_button_text_transform = get_theme_mod( 'pofo_page_not_found_button_text_transform', '' );

    /* Scroll to Top Button */
    $pofo_hide_scroll_to_top_button_color = get_theme_mod( 'pofo_hide_scroll_to_top_button_color' , '' );
    $pofo_hide_scroll_to_top_button_hover_color = get_theme_mod( 'pofo_hide_scroll_to_top_button_hover_color' , '' );
    $pofo_hide_scroll_to_top_button_bg_color = get_theme_mod( 'pofo_hide_scroll_to_top_button_bg_color', '' );
    $pofo_hide_scroll_to_top_button_hover_bg_color = get_theme_mod( 'pofo_hide_scroll_to_top_button_hover_bg_color', '' );

    /* Heading Settings */
    $pofo_h1_font_size = pofo_option( 'pofo_h1_font_size', '' );
    $pofo_h1_font_line_height = pofo_option( 'pofo_h1_font_line_height', '' );
    $pofo_h1_font_letter_spacing = pofo_option( 'pofo_h1_font_letter_spacing', '' );
    $pofo_heading_h1_color = pofo_option( 'pofo_heading_h1_color', '' );
    $pofo_h2_font_size = pofo_option( 'pofo_h2_font_size', '' );
    $pofo_h2_font_line_height = pofo_option( 'pofo_h2_font_line_height', '' );
    $pofo_h2_font_letter_spacing = pofo_option( 'pofo_h2_font_letter_spacing', '' );
    $pofo_heading_h2_color = pofo_option( 'pofo_heading_h2_color', '' );
    $pofo_h3_font_size = pofo_option( 'pofo_h3_font_size', '' );
    $pofo_h3_font_line_height = pofo_option( 'pofo_h3_font_line_height', '' );
    $pofo_h3_font_letter_spacing = pofo_option( 'pofo_h3_font_letter_spacing', '' );
    $pofo_heading_h3_color = pofo_option( 'pofo_heading_h3_color', '' );
    $pofo_h4_font_size = pofo_option( 'pofo_h4_font_size', '' );
    $pofo_h4_font_line_height = pofo_option( 'pofo_h4_font_line_height', '' );
    $pofo_h4_font_letter_spacing = pofo_option( 'pofo_h4_font_letter_spacing', '' );
    $pofo_heading_h4_color = pofo_option( 'pofo_heading_h4_color', '' );
    $pofo_h5_font_size = pofo_option( 'pofo_h5_font_size', '' );
    $pofo_h5_font_line_height = pofo_option( 'pofo_h5_font_line_height', '' );
    $pofo_h5_font_letter_spacing = pofo_option( 'pofo_h5_font_letter_spacing', '' );
    $pofo_heading_h5_color = pofo_option( 'pofo_heading_h5_color', '' );
    $pofo_h6_font_size = pofo_option( 'pofo_h6_font_size', '' );
    $pofo_h6_font_line_height = pofo_option( 'pofo_h6_font_line_height', '' );
    $pofo_h6_font_letter_spacing = pofo_option( 'pofo_h6_font_letter_spacing', '' );
    $pofo_heading_h6_color = pofo_option( 'pofo_heading_h6_color', '' );

    /* Portfolio Single Color */
    $pofo_single_portfolio_share_box_bg_color = pofo_option( 'pofo_single_portfolio_share_box_bg_color', '' );
    $pofo_single_portfolio_share_box_title_color = pofo_option( 'pofo_single_portfolio_share_box_title_color', '' );
    $pofo_related_single_portfolio_box_bg_color = pofo_option( 'pofo_related_single_portfolio_box_bg_color', '' );
    $pofo_related_single_portfolio_title_text_color = pofo_option( 'pofo_related_single_portfolio_title_text_color', '' );
    $pofo_related_single_portfolio_content_color = pofo_option( 'pofo_related_single_portfolio_content_color', '' );
    $pofo_navigation_single_portfolio_bg_color = pofo_option( 'pofo_navigation_single_portfolio_bg_color', '' );
    $pofo_navigation_single_portfolio_text_color = pofo_option( 'pofo_navigation_single_portfolio_text_color', '' );
    $pofo_navigation_single_portfolio_link_color = pofo_option( 'pofo_navigation_single_portfolio_link_color', '' );
    $pofo_hide_navigation_single_portfolio_link_hover_color = pofo_option( 'pofo_hide_navigation_single_portfolio_link_hover_color', '' );
    $pofo_single_portfolio_meta_text_color = pofo_option( 'pofo_single_portfolio_meta_text_color', '' );
    $pofo_single_portfolio_meta_text_hover_color = pofo_option( 'pofo_single_portfolio_meta_text_hover_color', '' );

    /* Portfolio Archive */
    $pofo_portfolio_archive_page_title_color = get_theme_mod( 'pofo_portfolio_archive_page_title_color', '' );
    $pofo_portfolio_archive_page_title_hover_color = get_theme_mod( 'pofo_portfolio_archive_page_title_hover_color', '' );
    $pofo_portfolio_archive_page_subtitle_color = get_theme_mod( 'pofo_portfolio_archive_page_subtitle_color', '' );
    $pofo_portfolio_archive_page_separator_color = get_theme_mod( 'pofo_portfolio_archive_page_separator_color', '' );
    $pofo_portfolio_archive_page_separator_thickness = get_theme_mod( 'pofo_portfolio_archive_page_separator_thickness', '' );
    $pofo_portfolio_archive_page_box_hover_background_color = get_theme_mod( 'pofo_portfolio_archive_page_box_hover_background_color', '' );
    $pofo_portfolio_archive_page_icon_color = get_theme_mod( 'pofo_portfolio_archive_page_icon_color', '' );
    $pofo_portfolio_archive_page_opacity = get_theme_mod( 'pofo_portfolio_archive_page_opacity', '' );

    /* if WooCommerce plugin is activated */
    if ( class_exists( 'WooCommerce' ) ) {

        /* Product Archive or Shop Product Sale */
        $pofo_product_archive_product_sale_font_size = get_theme_mod( 'pofo_product_archive_product_sale_font_size', '' );
        $pofo_product_archive_product_sale_line_height = get_theme_mod( 'pofo_product_archive_product_sale_line_height', '' );
        $pofo_product_archive_product_sale_font_weight = get_theme_mod( 'pofo_product_archive_product_sale_font_weight', '' );
        $pofo_product_archive_product_sale_color = get_theme_mod( 'pofo_product_archive_product_sale_color', '' );
        $pofo_product_archive_product_sale_bg_color = get_theme_mod( 'pofo_product_archive_product_sale_bg_color', '' );
        $pofo_product_archive_product_sale_enable_border = get_theme_mod( 'pofo_product_archive_product_sale_enable_border', '1' );
        $pofo_product_archive_product_sale_border_size = get_theme_mod( 'pofo_product_archive_product_sale_border_size', '' );
        $pofo_product_archive_product_sale_border_type = get_theme_mod( 'pofo_product_archive_product_sale_border_type', '' );
        $pofo_product_archive_product_sale_border_color = get_theme_mod( 'pofo_product_archive_product_sale_border_color', '' );
        $pofo_product_archive_product_sale_border_radius = get_theme_mod( 'pofo_product_archive_product_sale_border_radius', '' );

        /* Product Archive or Shop Product Title */
        $pofo_product_archive_product_title_font_size = get_theme_mod( 'pofo_product_archive_product_title_font_size', '' );
        $pofo_product_archive_product_title_line_height = get_theme_mod( 'pofo_product_archive_product_title_line_height', '' );
        $pofo_product_archive_product_title_letter_spacing = get_theme_mod( 'pofo_product_archive_product_title_letter_spacing', '' );
        $pofo_product_archive_product_title_font_weight = get_theme_mod( 'pofo_product_archive_product_title_font_weight', '' );
        $pofo_product_archive_product_title_font_italic = get_theme_mod( 'pofo_product_archive_product_title_font_italic', '0' );
        $pofo_product_archive_product_title_font_underline = get_theme_mod( 'pofo_product_archive_product_title_font_underline', '0' );
        $pofo_product_archive_product_title_color = get_theme_mod( 'pofo_product_archive_product_title_color', '' );
        $pofo_product_archive_product_title_hover_color = get_theme_mod( 'pofo_product_archive_product_title_hover_color', '' );

        /* Product Archive or Shop Product Rating Star Color */
        $pofo_product_archive_product_rating_star_color = get_theme_mod( 'pofo_product_archive_product_rating_star_color', '' );

        /* Product Archive or Shop Product Price */
        $pofo_product_archive_product_price_font_size = get_theme_mod( 'pofo_product_archive_product_price_font_size', '' );
        $pofo_product_archive_product_price_line_height = get_theme_mod( 'pofo_product_archive_product_price_line_height', '' );
        $pofo_product_archive_product_price_font_weight = get_theme_mod( 'pofo_product_archive_product_price_font_weight', '' );
        $pofo_product_archive_product_price_color = get_theme_mod( 'pofo_product_archive_product_price_color', '' );
        $pofo_product_archive_product_regular_price_color = get_theme_mod( 'pofo_product_archive_product_regular_price_color', '' );

        /* Product Archive or Shop Product Button */
        $pofo_product_archive_product_button_color = get_theme_mod( 'pofo_product_archive_product_button_color', '' );
        $pofo_product_archive_product_button_bg_color = get_theme_mod( 'pofo_product_archive_product_button_bg_color', '' );
        $pofo_product_archive_product_button_border_color = get_theme_mod( 'pofo_product_archive_product_button_border_color', '' );
        $pofo_product_archive_product_button_hover_color = get_theme_mod( 'pofo_product_archive_product_button_hover_color', '' );
        $pofo_product_archive_product_button_hover_bg_color = get_theme_mod( 'pofo_product_archive_product_button_hover_bg_color', '' );

        /* Single Product Sale */
        $pofo_single_product_sale_font_size = get_theme_mod( 'pofo_single_product_sale_font_size', '' );
        $pofo_single_product_sale_line_height = get_theme_mod( 'pofo_single_product_sale_line_height', '' );
        $pofo_single_product_sale_font_weight = get_theme_mod( 'pofo_single_product_sale_font_weight', '' );
        $pofo_single_product_sale_color = get_theme_mod( 'pofo_single_product_sale_color', '' );
        $pofo_single_product_sale_bg_color = get_theme_mod( 'pofo_single_product_sale_bg_color', '' );
        $pofo_single_product_sale_enable_border = get_theme_mod( 'pofo_single_product_sale_enable_border', '1' );
        $pofo_single_product_sale_border_size = get_theme_mod( 'pofo_single_product_sale_border_size', '' );
        $pofo_single_product_sale_border_type = get_theme_mod( 'pofo_single_product_sale_border_type', '' );
        $pofo_single_product_sale_border_color = get_theme_mod( 'pofo_single_product_sale_border_color', '' );
        $pofo_single_product_sale_border_radius = get_theme_mod( 'pofo_single_product_sale_border_radius', '' );

        /* Single Product Title */
        $pofo_single_product_page_title_font_size = get_theme_mod( 'pofo_single_product_page_title_font_size', '' );
        $pofo_single_product_page_title_line_height = get_theme_mod( 'pofo_single_product_page_title_line_height', '' );
        $pofo_single_product_page_title_letter_spacing = get_theme_mod( 'pofo_single_product_page_title_letter_spacing', '' );
        $pofo_single_product_page_title_font_weight = get_theme_mod( 'pofo_single_product_page_title_font_weight', '' );
        $pofo_single_product_page_title_font_italic = get_theme_mod( 'pofo_single_product_page_title_font_italic', '0' );
        $pofo_single_product_page_title_font_underline = get_theme_mod( 'pofo_single_product_page_title_font_underline', '0' );
        $pofo_single_product_page_title_color = get_theme_mod( 'pofo_single_product_page_title_color', '' );

        /* Single Product Rating Star Color */
        $pofo_single_product_rating_star_color = get_theme_mod( 'pofo_single_product_rating_star_color', '' );

        /* Single Product Price */
        $pofo_single_product_price_font_size = get_theme_mod( 'pofo_single_product_price_font_size', '' );
        $pofo_single_product_price_line_height = get_theme_mod( 'pofo_single_product_price_line_height', '' );
        $pofo_single_product_price_font_weight = get_theme_mod( 'pofo_single_product_price_font_weight', '' );
        $pofo_single_product_price_color = get_theme_mod( 'pofo_single_product_price_color', '' );
        $pofo_single_product_regular_price_color = get_theme_mod( 'pofo_single_product_regular_price_color', '' );

        /* Single Product Short Description */
        $pofo_single_product_short_description_font_size = get_theme_mod( 'pofo_single_product_short_description_font_size', '' );
        $pofo_single_product_short_description_line_height = get_theme_mod( 'pofo_single_product_short_description_line_height', '' );
        $pofo_single_product_short_description_letter_spacing = get_theme_mod( 'pofo_single_product_short_description_letter_spacing', '' );
        $pofo_single_product_short_description_font_weight = get_theme_mod( 'pofo_single_product_short_description_font_weight', '' );
        $pofo_single_product_short_description_color = get_theme_mod( 'pofo_single_product_short_description_color', '' );

        /* Single Product Stock */
        $pofo_single_product_stock_font_size = get_theme_mod( 'pofo_single_product_stock_font_size', '' );
        $pofo_single_product_stock_line_height = get_theme_mod( 'pofo_single_product_stock_line_height', '' );
        $pofo_single_product_stock_font_weight = get_theme_mod( 'pofo_single_product_stock_font_weight', '' );
        $pofo_single_product_stock_letter_spacing = get_theme_mod( 'pofo_single_product_stock_letter_spacing', '' );
        $pofo_single_product_stock_color = get_theme_mod( 'pofo_single_product_stock_color', '' );
        $pofo_single_product_out_of_stock_color = get_theme_mod( 'pofo_single_product_out_of_stock_color', '' );
        $pofo_single_product_stock_bg_color = get_theme_mod( 'pofo_single_product_stock_bg_color', '' );
        $pofo_single_product_stock_enable_border = get_theme_mod( 'pofo_single_product_stock_enable_border', '1' );
        $pofo_single_product_stock_border_size = get_theme_mod( 'pofo_single_product_stock_border_size', '' );
        $pofo_single_product_stock_border_type = get_theme_mod( 'pofo_single_product_stock_border_type', '' );
        $pofo_single_product_stock_border_color = get_theme_mod( 'pofo_single_product_stock_border_color', '' );
        $pofo_single_product_out_of_stock_border_color = get_theme_mod( 'pofo_single_product_out_of_stock_border_color', '' );

        /* Single Product Button */
        $pofo_single_product_button_color = get_theme_mod( 'pofo_single_product_button_color', '' );
        $pofo_single_product_button_bg_color = get_theme_mod( 'pofo_single_product_button_bg_color', '' );
        $pofo_single_product_button_border_color = get_theme_mod( 'pofo_single_product_button_border_color', '' );
        $pofo_single_product_button_hover_color = get_theme_mod( 'pofo_single_product_button_hover_color', '' );
        $pofo_single_product_button_hover_bg_color = get_theme_mod( 'pofo_single_product_button_hover_bg_color', '' );

        /* Single Product Meta */
        $pofo_single_product_page_meta_font_size = get_theme_mod( 'pofo_single_product_page_meta_font_size', '' );
        $pofo_single_product_page_meta_line_height = get_theme_mod( 'pofo_single_product_page_meta_line_height', '' );
        $pofo_single_product_page_meta_letter_spacing = get_theme_mod( 'pofo_single_product_page_meta_letter_spacing', '' );
        $pofo_single_product_page_meta_font_weight = get_theme_mod( 'pofo_single_product_page_meta_font_weight', '' );
        $pofo_single_product_page_meta_color = get_theme_mod( 'pofo_single_product_page_meta_color', '' );
        $pofo_single_product_page_meta_link_hover_color = get_theme_mod( 'pofo_single_product_page_meta_link_hover_color', '' );
        $pofo_single_product_page_meta_heading_color = get_theme_mod( 'pofo_single_product_page_meta_heading_color', '' );
        $pofo_single_product_page_meta_social_icon_color = get_theme_mod( 'pofo_single_product_page_meta_social_icon_color', '' );

        /* Single Product Tab */
        $pofo_single_product_page_tab_font_size = get_theme_mod( 'pofo_single_product_page_tab_font_size', '' );
        $pofo_single_product_page_tab_line_height = get_theme_mod( 'pofo_single_product_page_tab_line_height', '' );
        $pofo_single_product_page_tab_letter_spacing = get_theme_mod( 'pofo_single_product_page_tab_letter_spacing', '' );
        $pofo_single_product_page_tab_font_weight = get_theme_mod( 'pofo_single_product_page_tab_font_weight', '' );
        $pofo_single_product_page_tab_color = get_theme_mod( 'pofo_single_product_page_tab_color', '' );
        $pofo_single_product_page_tab_active_color = get_theme_mod( 'pofo_single_product_page_tab_active_color', '' );

        /* Related Product Heading */
        $pofo_single_product_related_product_heading_font_size = get_theme_mod( 'pofo_single_product_related_product_heading_font_size', '' );
        $pofo_single_product_related_product_heading_line_height = get_theme_mod( 'pofo_single_product_related_product_heading_line_height', '' );
        $pofo_single_product_related_product_heading_letter_spacing = get_theme_mod( 'pofo_single_product_related_product_heading_letter_spacing', '' );
        $pofo_single_product_related_product_heading_font_weight = get_theme_mod( 'pofo_single_product_related_product_heading_font_weight', '' );
        $pofo_single_product_related_product_heading_font_italic = get_theme_mod( 'pofo_single_product_related_product_heading_font_italic', '0' );
        $pofo_single_product_related_product_heading_font_underline = get_theme_mod( 'pofo_single_product_related_product_heading_font_underline', '0' );
        $pofo_single_product_related_product_heading_color = get_theme_mod( 'pofo_single_product_related_product_heading_color', '' );

        /* Up Sells Product Heading */
        $pofo_single_product_up_sells_product_heading_font_size = get_theme_mod( 'pofo_single_product_up_sells_product_heading_font_size', '' );
        $pofo_single_product_up_sells_product_heading_line_height = get_theme_mod( 'pofo_single_product_up_sells_product_heading_line_height', '' );
        $pofo_single_product_up_sells_product_heading_letter_spacing = get_theme_mod( 'pofo_single_product_up_sells_product_heading_letter_spacing', '' );
        $pofo_single_product_up_sells_product_heading_font_weight = get_theme_mod( 'pofo_single_product_up_sells_product_heading_font_weight', '' );
        $pofo_single_product_up_sells_product_heading_font_italic = get_theme_mod( 'pofo_single_product_up_sells_product_heading_font_italic', '0' );
        $pofo_single_product_up_sells_product_heading_font_underline = get_theme_mod( 'pofo_single_product_up_sells_product_heading_font_underline', '0' );
        $pofo_single_product_up_sells_product_heading_color = get_theme_mod( 'pofo_single_product_up_sells_product_heading_color', '' );

        /* Cross Sells Product Heading */
        $pofo_single_product_cross_sells_product_heading_font_size = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_font_size', '' );
        $pofo_single_product_cross_sells_product_heading_line_height = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_line_height', '' );
        $pofo_single_product_cross_sells_product_heading_letter_spacing = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_letter_spacing', '' );
        $pofo_single_product_cross_sells_product_heading_font_weight = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_font_weight', '' );
        $pofo_single_product_cross_sells_product_heading_font_italic = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_font_italic', '0' );
        $pofo_single_product_cross_sells_product_heading_font_underline = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_font_underline', '0' );
        $pofo_single_product_cross_sells_product_heading_color = get_theme_mod( 'pofo_single_product_cross_sells_product_heading_color', '' );
    }

    /* Single post content top and bottom section space */
    if( is_single() ) {

        $pofo_main_top_section_space    = get_theme_mod( 'pofo_main_top_section_space', '' );
        $pofo_main_bottom_section_space = get_theme_mod( 'pofo_main_bottom_section_space', '' );
    }

    if( class_exists( 'WooCommerce' ) && (is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ){// if WooCommerce plugin is activated and WooCommerce category, brand, shop page

        $pofo_product_archive_title_top_section_space    = get_theme_mod( 'pofo_product_archive_title_top_section_space', '' );
        $pofo_product_archive_title_bottom_section_space = get_theme_mod( 'pofo_product_archive_title_bottom_section_space', '' );

    } elseif( class_exists( 'WooCommerce' ) && is_product() ) {// if WooCommerce plugin is activated and WooCommerce product page
        
        $pofo_single_product_title_top_section_space    = get_theme_mod( 'pofo_single_product_title_top_section_space', '' );
        $pofo_single_product_title_bottom_section_space = get_theme_mod( 'pofo_single_product_title_bottom_section_space', '' );

    } elseif( is_tax('portfolio-category') || is_tax('portfolio-tags') || is_post_type_archive('portfolio') ){// if Portfolio category, tag, archive page
        
        $pofo_portfolio_archive_title_top_section_space    = get_theme_mod( 'pofo_portfolio_archive_title_top_section_space', '' );
        $pofo_portfolio_archive_title_bottom_section_space = get_theme_mod( 'pofo_portfolio_archive_title_bottom_section_space', '' );

    } elseif( is_search() || is_category() || is_archive() ){// if Post category, tag, archive page
        
        $pofo_archive_title_top_section_space    = get_theme_mod( 'pofo_archive_title_top_section_space', '' );
        $pofo_archive_title_bottom_section_space = get_theme_mod( 'pofo_archive_title_bottom_section_space', '' );

    } elseif( is_home() ){// if Home page
        
        $pofo_default_title_top_section_space    = get_theme_mod( 'pofo_default_title_top_section_space', '' );
        $pofo_default_title_bottom_section_space = get_theme_mod( 'pofo_default_title_bottom_section_space', '' );
    
    } elseif( is_singular( 'portfolio' ) ) {// if portfolio single page

        $pofo_single_portfolio_title_top_section_space    = get_theme_mod( 'pofo_single_portfolio_title_top_section_space', '' );
        $pofo_single_portfolio_title_bottom_section_space = get_theme_mod( 'pofo_single_portfolio_title_bottom_section_space', '' );
    
    } elseif( is_singular( 'post' ) ) {// if single post page

        $pofo_single_post_title_top_section_space    = get_theme_mod( 'pofo_single_post_title_top_section_space', '' );
        $pofo_single_post_title_bottom_section_space = get_theme_mod( 'pofo_single_post_title_bottom_section_space', '' );
    
    } else {
        
        $pofo_page_title_top_section_space    = get_theme_mod( 'pofo_page_title_top_section_space', '' );
        $pofo_page_title_bottom_section_space = get_theme_mod( 'pofo_page_title_bottom_section_space', '' );
    }
?>

<?php if( $pofo_enable_main_font && $pofo_main_font ) : ?>
/* Body Font Family */
body { font-family: <?php echo esc_html( $pofo_main_font ); ?>; }
<?php endif; ?>

<?php if( $pofo_enable_alt_font && $pofo_alt_font ) : ?>
/* Alternate Font Family */
.alt-font { font-family: <?php echo esc_html( $pofo_alt_font ); ?>; }
<?php endif; ?>

<?php if( $pofo_body_font_size ) : ?>
/* Body Font Size */
body { font-size: <?php echo esc_html( $pofo_body_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_body_font_line_height ) : ?>
/* Body Font Line Height */
body { line-height: <?php echo esc_html( $pofo_body_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_body_font_letter_spacing ) : ?>
/* Body Font Letter Spacing */
body { letter-spacing: <?php echo esc_html( $pofo_body_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_body_background_color ) : ?>
/* Body Background Color */
body { background-color: <?php echo esc_html( $pofo_body_background_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_body_text_color ) : ?>
/* Body Color */
body { color: <?php echo esc_html( $pofo_body_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_mini_header_background_color ) : ?>
/* Mini Header Background Color */
header .top-header-area { background-color: <?php echo esc_html( $pofo_mini_header_background_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_mini_header_text_color ) : ?>
/* Mini Header Text Color */
header .top-header-area, header .top-header-area a, header .top-header-area a i { color: <?php echo esc_html( $pofo_mini_header_text_color ); ?>; }
/* Mini Header Separator Color */
header .top-header-area .separator-line-verticle-extra-small { background-color: <?php echo esc_html( $pofo_mini_header_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_mini_header_text_hover_color ) : ?>
/* Mini Header Text Hover Color */
header .top-header-area a:hover, header .top-header-area a:hover i { color: <?php echo esc_html( $pofo_mini_header_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( !empty( $pofo_header_svg_width ) ) : ?>
/* Header SVG logo width */
    <?php if( !empty( $pofo_logo_extension ) && $pofo_logo_extension == 'svg' ) : ?>
        /* Header SVG logo width */
        header a.logo-light img {width: <?php echo esc_html( $pofo_header_svg_width ); ?>;}
    <?php endif; ?>
    <?php if( !empty( $pofo_logo_extension ) && $pofo_logo_extension == 'svg' ) : ?>
        /* Header SVG logo light width */
        header a.logo-dark img {width: <?php echo esc_html( $pofo_header_svg_width ); ?>;}
    <?php endif; ?>
<?php endif; ?>

<?php if( $pofo_content_font_size ) : ?>
/* Content Font Size */
.entry-content, .entry-content p { font-size: <?php echo esc_html( $pofo_content_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_font_line_height ) : ?>
/* Content Font Line Height */
.entry-content, .entry-content p { line-height: <?php echo esc_html( $pofo_content_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_font_letter_spacing ) : ?>
/* Content Font Letter Spancing */
.entry-content, .entry-content p { letter-spacing: <?php echo esc_html( $pofo_content_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_link_color ) : ?>
/* Content Text Color */
a { color: <?php echo esc_html( $pofo_content_link_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_link_hover_color ) : ?>
/* Content Text Hover Color */
a:hover { color: <?php echo esc_html( $pofo_content_link_hover_color ); ?>; }
<?php endif; ?>
<?php /* Page Title Settings */ ?>
<?php if( $pofo_page_title_opacity_color ) : ?>
/* Page Title Opacity Color */
.bg-opacity-color { background-color: <?php echo esc_html( $pofo_page_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_bg_color ) : ?>
/* Page Title Background Color */
.pofo-page-title-bg { background-color: <?php echo esc_html( $pofo_page_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_color ) : ?>
/* Page Title Color */
.pofo-page-title { color: <?php echo esc_html( $pofo_page_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_subtitle_color ) : ?>
/* Page Subtitle Color */
.pofo-page-subtitle { color: <?php echo esc_html( $pofo_page_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_breadcrumb_bg_color ) : ?>
/* Page Title Breadcrumb BG Color */
.pofo-page-breadcrumb { background: <?php echo esc_html( $pofo_page_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_breadcrumb_border_color ) : ?>
/* Page Title Breadcrumb Border Color */
.pofo-page-breadcrumb { border-color: <?php echo esc_html( $pofo_page_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_breadcrumb_color ) : ?>
/* Page Title Breadcrumb Color */
.pofo-page-title-breadcrumb a, .pofo-page-title-breadcrumb li { color: <?php echo esc_html( $pofo_page_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_breadcrumb_text_hover_color ) : ?>
/* Page Title Breadcrumb Hover Color */
.pofo-page-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_page_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_font_size ) : ?>
/* Page Title Font Size */
.pofo-page-title { font-size: <?php echo esc_html( $pofo_page_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_title_line_height ) : ?>
/* Page Title Line Height */
.pofo-page-title { line-height: <?php echo esc_html( $pofo_page_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_title_letter_spacing ) : ?>
/* Page Title Letter Spacing */
.pofo-page-title { letter-spacing: <?php echo esc_html( $pofo_page_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_subtitle_font_size ) : ?>
/* Page Subtitle Font Size */
.pofo-page-subtitle { font-size: <?php echo esc_html( $pofo_page_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_subtitle_line_height ) : ?>
/* Page Subtitle Line Height */
.pofo-page-subtitle { line-height: <?php echo esc_html( $pofo_page_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_subtitle_letter_spacing ) : ?>
/* Page Subtitle Letter Spacing */
.pofo-page-subtitle { letter-spacing: <?php echo esc_html( $pofo_page_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_breadcrumb_font_size ) : ?>
/* Page Title Breadcrumb Font Size */
.pofo-page-title-breadcrumb a, .pofo-page-title-breadcrumb li, .breadcrumb ul.pofo-page-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_page_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_breadcrumb_line_height ) : ?>
/* Page Title Breadcrumb Line Height */
.pofo-page-title-breadcrumb a, .pofo-page-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_page_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_breadcrumb_letter_spacing ) : ?>
/* Page Title Breadcrumb Letter Spacing */
.pofo-page-title-breadcrumb a, .pofo-page-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_page_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_page_title_icon_bg_color ) : ?>
/* Page Title Icon BG Color */
.pofo-page-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_page_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_title_icon_color ) : ?>
/* Page Title Icon BG Color */
.pofo-page-title-bg .down-section i { color: <?php echo esc_html( $pofo_page_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Single Post Title Settings */ ?>
<?php if( $pofo_related_post_title_border != 1 ) : ?>
/* Related Post Border Show */
.related-post-general-title:before, .related-post-general-title:after { border-bottom: none; }
<?php endif; ?>

<?php if( $pofo_related_post_general_title_color ) : ?>
/* Related Post Title Color */
.related-post-general-title { color: <?php echo esc_html( $pofo_related_post_general_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_general_title_border_color ) : ?>
/* Related Post Border Color */
.related-post-general-title:before, .related-post-general-title:after { border-color: <?php echo esc_html( $pofo_related_post_general_title_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_bg_color ) : ?>
/* Related Posts Background Color */
.pofo-related-posts-background { background-color: <?php echo esc_html( $pofo_related_post_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_title_color ) : ?>
/* Related Posts Title Color */
.pofo-related-post-title { color: <?php echo esc_html( $pofo_related_post_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_title_hover_color ) : ?>
/* Related Posts Title Hover Color */
.pofo-related-post-title:hover { color: <?php echo esc_html( $pofo_related_post_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_meta_color ) : ?>
/* Related Posts Meta Color */
.pofo-related-post-meta, .pofo-related-post-meta a { color: <?php echo esc_html( $pofo_related_post_meta_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_meta_hover_color ) : ?>
/* Related Posts Meta Color */
.pofo-related-post-meta a:hover { color: <?php echo esc_html( $pofo_related_post_meta_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_content_color ) : ?>
/* Related Posts Content Color */
.pofo-related-post-content { color: <?php echo esc_html( $pofo_related_post_content_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_separator_color ) : ?>
/* Related Posts Separator Color */
.pofo-related-post-separator { background-color: <?php echo esc_html( $pofo_related_post_separator_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_posts_opacity ) : ?>
/* Related Posts Opacity */
.blog-post.blog-post-style-related:hover .blog-post-images img { opacity: <?php echo esc_html( $pofo_related_posts_opacity ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_post_overlay_color ) : ?>
/* Related Posts Overlay Color */
.blog-post.blog-post-style-related .blog-post-images { background: <?php echo esc_html( $pofo_related_post_overlay_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_opacity_color ) : ?>
/* Single Post Title Opacity Color */
.bg-single-post-opacity-color { background-color: <?php echo esc_html( $pofo_single_post_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_bg_color ) : ?>
/* Single Post Title Background Color */
.pofo-single-post-title-bg { background-color: <?php echo esc_html( $pofo_single_post_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_color ) : ?>
/* Single Post Title Color */
.pofo-single-post-title { color: <?php echo esc_html( $pofo_single_post_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_subtitle_color ) : ?>
/* Single Post Subtitle Color */
.pofo-single-post-subtitle { color: <?php echo esc_html( $pofo_single_post_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_breadcrumb_color ) : ?>
/* Single Post Title Breadcrumb Color */
.pofo-single-post-title-breadcrumb a, .pofo-single-post-title-breadcrumb li { color: <?php echo esc_html( $pofo_single_post_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_breadcrumb_text_hover_color ) : ?>
/* Single Post Title Breadcrumb Hover Color */
.pofo-single-post-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_single_post_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_breadcrumb_bg_color ) : ?>
/* Single Post Title Breadcrumb BG Color */
.pofo-single-post-breadcrumb { background: <?php echo esc_html( $pofo_single_post_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_breadcrumb_border_color ) : ?>
/* Single Post Title Breadcrumb Border Color */
.pofo-single-post-breadcrumb { border-color: <?php echo esc_html( $pofo_single_post_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_font_size ) : ?>
/* Single Post Title Font Size */
.pofo-single-post-title { font-size: <?php echo esc_html( $pofo_single_post_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_title_line_height ) : ?>
/* Single Post Title Line Height */
.pofo-single-post-title { line-height: <?php echo esc_html( $pofo_single_post_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_title_letter_spacing ) : ?>
/* Single Post Title Letter Spacing */
.pofo-single-post-title { letter-spacing: <?php echo esc_html( $pofo_single_post_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_subtitle_font_size ) : ?>
/* Single Post Subtitle Font Size */
.pofo-single-post-subtitle { font-size: <?php echo esc_html( $pofo_single_post_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_subtitle_line_height ) : ?>
/* Single Post Subtitle Line Height */
.pofo-single-post-subtitle { line-height: <?php echo esc_html( $pofo_single_post_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_subtitle_letter_spacing ) : ?>
/* Single Post Subtitle Letter Spacing */
.pofo-single-post-subtitle { letter-spacing: <?php echo esc_html( $pofo_single_post_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_breadcrumb_font_size ) : ?>
/* Single Post Title Breadcrumb Font Size */
.pofo-single-post-title-breadcrumb a, .pofo-single-post-title-breadcrumb li, .breadcrumb ul.pofo-single-post-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_single_post_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_breadcrumb_line_height ) : ?>
/* Single Post Title Breadcrumb Line Height */
.pofo-single-post-title-breadcrumb a, .pofo-single-post-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_single_post_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_breadcrumb_letter_spacing ) : ?>
/* Single Post Title Breadcrumb Letter Spacing */
.pofo-single-post-title-breadcrumb a, .pofo-single-post-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_single_post_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_post_title_icon_bg_color ) : ?>
/* Single posT Title Icon BG Color */
.pofo-single-post-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_single_post_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_title_icon_color ) : ?>
/* Single posT Title Icon BG Color */
.pofo-single-post-title-bg .down-section i { color: <?php echo esc_html( $pofo_single_post_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Single Portfolio Title Settings */ ?>
<?php if( $pofo_single_portfolio_title_opacity_color ) : ?>
/* Single Portfolio Title Opacity Color */
.bg-single-portfolio-opacity-color { background-color: <?php echo esc_html( $pofo_single_portfolio_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_bg_color ) : ?>
/* Single Portfolio Title Background Color */
.pofo-single-portfolio-title-bg { background-color: <?php echo esc_html( $pofo_single_portfolio_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_color ) : ?>
/* Single Portfolio Title Color */
.pofo-single-portfolio-title { color: <?php echo esc_html( $pofo_single_portfolio_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_subtitle_color ) : ?>
/* Single Portfolio Subtitle Color */
.pofo-single-portfolio-subtitle { color: <?php echo esc_html( $pofo_single_portfolio_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_breadcrumb_color ) : ?>
/* Single Portfolio Title Breadcrumb Color */
.pofo-single-portfolio-title-breadcrumb a, .pofo-single-portfolio-title-breadcrumb li { color: <?php echo esc_html( $pofo_single_portfolio_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_breadcrumb_text_hover_color ) : ?>
/* Single Portfolio Title Breadcrumb Hover Color */
.pofo-single-portfolio-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_single_portfolio_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_breadcrumb_bg_color ) : ?>
/* Single Portfolio Title Breadcrumb BG Color */
.pofo-single-portfolio-breadcrumb { background: <?php echo esc_html( $pofo_single_portfolio_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_breadcrumb_border_color ) : ?>
/* Single Portfolio Title Breadcrumb Border Color */
.pofo-single-portfolio-breadcrumb { border-color: <?php echo esc_html( $pofo_single_portfolio_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_font_size ) : ?>
/* Single Portfolio Title Font Size */
.pofo-single-portfolio-title { font-size: <?php echo esc_html( $pofo_single_portfolio_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_line_height ) : ?>
/* Single Portfolio Title Line Height */
.pofo-single-portfolio-title { line-height: <?php echo esc_html( $pofo_single_portfolio_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_letter_spacing ) : ?>
/* Single Portfolio Title Letter Spacing */
.pofo-single-portfolio-title { letter-spacing: <?php echo esc_html( $pofo_single_portfolio_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_subtitle_font_size ) : ?>
/* Single Portfolio Subtitle Font Size */
.pofo-single-portfolio-subtitle { font-size: <?php echo esc_html( $pofo_single_portfolio_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_subtitle_line_height ) : ?>
/* Single Portfolio Subtitle Line Height */
.pofo-single-portfolio-subtitle { line-height: <?php echo esc_html( $pofo_single_portfolio_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_subtitle_letter_spacing ) : ?>
/* Single Portfolio Subtitle Letter Spacing */
.pofo-single-portfolio-subtitle { letter-spacing: <?php echo esc_html( $pofo_single_portfolio_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_breadcrumb_font_size ) : ?>
/* Single Portfolio Title Breadcrumb Font Size */
.pofo-single-portfolio-title-breadcrumb a, .pofo-single-portfolio-title-breadcrumb li, .breadcrumb ul.pofo-single-portfolio-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_single_portfolio_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_breadcrumb_line_height ) : ?>
/* Single Portfolio Title Breadcrumb Line Height */
.pofo-single-portfolio-title-breadcrumb a, .pofo-single-portfolio-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_single_portfolio_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_breadcrumb_letter_spacing ) : ?>
/* Single Portfolio Title Breadcrumb Letter Spacing */
.pofo-single-portfolio-title-breadcrumb a, .pofo-single-portfolio-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_single_portfolio_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_icon_bg_color ) : ?>
/* Single porTfolio Title Icon BG Color */
.pofo-single-portfolio-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_single_portfolio_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_title_icon_color ) : ?>
/* Single porTfolio Title Icon BG Color */
.pofo-single-portfolio-title-bg .down-section i { color: <?php echo esc_html( $pofo_single_portfolio_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Single Product Title Settings */ ?>
<?php if( $pofo_single_product_title_opacity_color ) : ?>
/* Single Product Title Opacity Color */
.bg-single-product-opacity-color { background-color: <?php echo esc_html( $pofo_single_product_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_bg_color ) : ?>
/* Single Product Title Background Color */
.pofo-single-product-title-bg { background-color: <?php echo esc_html( $pofo_single_product_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_color ) : ?>
/* Single Product Title Color */
.pofo-single-product-title { color: <?php echo esc_html( $pofo_single_product_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_subtitle_color ) : ?>
/* Single Product Subtitle Color */
.pofo-single-product-subtitle { color: <?php echo esc_html( $pofo_single_product_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_breadcrumb_color ) : ?>
/* Single Product Title Breadcrumb Color */
.pofo-single-product-title-breadcrumb a, .pofo-single-product-title-breadcrumb li { color: <?php echo esc_html( $pofo_single_product_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_breadcrumb_text_hover_color ) : ?>
/* Single Product Title Breadcrumb Hover Color */
.pofo-single-product-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_single_product_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_breadcrumb_bg_color ) : ?>
/* Single Product Title Breadcrumb BG Color */
.pofo-single-product-breadcrumb { background: <?php echo esc_html( $pofo_single_product_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_breadcrumb_border_color ) : ?>
/* Single Product Title Breadcrumb Border Color */
.pofo-single-product-breadcrumb { border-color: <?php echo esc_html( $pofo_single_product_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_font_size ) : ?>
/* Single Product Title Font Size */
.pofo-single-product-title { font-size: <?php echo esc_html( $pofo_single_product_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_title_line_height ) : ?>
/* Single Product Title Line Height */
.pofo-single-product-title { line-height: <?php echo esc_html( $pofo_single_product_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_title_letter_spacing ) : ?>
/* Single Product Title Letter Spacing */
.pofo-single-product-title { letter-spacing: <?php echo esc_html( $pofo_single_product_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_subtitle_font_size ) : ?>
/* Single Product Subtitle Font Size */
.pofo-single-product-subtitle { font-size: <?php echo esc_html( $pofo_single_product_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_subtitle_line_height ) : ?>
/* Single Product Subtitle Line Height */
.pofo-single-product-subtitle { line-height: <?php echo esc_html( $pofo_single_product_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_subtitle_letter_spacing ) : ?>
/* Single Product Subtitle Letter Spacing */
.pofo-single-product-subtitle { letter-spacing: <?php echo esc_html( $pofo_single_product_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_breadcrumb_font_size ) : ?>
/* Single Product Title Breadcrumb Font Size */
.pofo-single-product-title-breadcrumb a, .pofo-single-product-title-breadcrumb li, .breadcrumb ul.pofo-single-product-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_single_product_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_breadcrumb_line_height ) : ?>
/* Single Product Title Breadcrumb Line Height */
.pofo-single-product-title-breadcrumb a, .pofo-single-product-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_single_product_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_breadcrumb_letter_spacing ) : ?>
/* Single Product Title Breadcrumb Letter Spacing */
.pofo-single-product-title-breadcrumb a, .pofo-single-product-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_single_product_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_single_product_title_icon_bg_color ) : ?>
/* Single Product Title Icon BG Color */
.pofo-single-product-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_single_product_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_product_title_icon_color ) : ?>
/* Single Product Title Icon BG Color */
.pofo-single-product-title-bg .down-section i { color: <?php echo esc_html( $pofo_single_product_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Post Archive Title Settings */ ?>
<?php if( $pofo_archive_title_opacity_color ) : ?>
/* Archive Post Title Opacity Color */
.bg-archive-opacity-color { background-color: <?php echo esc_html( $pofo_archive_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_bg_color ) : ?>
/* Archive Page Title Background Color */
.pofo-archive-title-bg { background-color: <?php echo esc_html( $pofo_archive_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_color ) : ?>
/* Archive Page Title Color */
.pofo-archive-title { color: <?php echo esc_html( $pofo_archive_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_subtitle_color ) : ?>
/* Archive Page Subtitle Color */
.pofo-archive-subtitle { color: <?php echo esc_html( $pofo_archive_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_breadcrumb_color ) : ?>
/* Archive Page Title Breadcrumb Color */
.pofo-archive-title-breadcrumb a, .pofo-archive-title-breadcrumb li { color: <?php echo esc_html( $pofo_archive_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_breadcrumb_text_hover_color ) : ?>
/* Archive Page Title Breadcrumb Hover Color */
.pofo-archive-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_archive_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_breadcrumb_bg_color ) : ?>
/* Archive Title Breadcrumb BG Color */
.pofo-archive-breadcrumb { background: <?php echo esc_html( $pofo_archive_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_breadcrumb_border_color ) : ?>
/* Archive Title Breadcrumb Border Color */
.pofo-archive-breadcrumb { border-color: <?php echo esc_html( $pofo_archive_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_font_size ) : ?>
/* Archive Title Font Size */
.pofo-archive-title { font-size: <?php echo esc_html( $pofo_archive_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_title_line_height ) : ?>
/* Archive Title Line Height */
.pofo-archive-title { line-height: <?php echo esc_html( $pofo_archive_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_title_letter_spacing ) : ?>
/* Archive Title Letter Spacing */
.pofo-archive-title { letter-spacing: <?php echo esc_html( $pofo_archive_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_subtitle_font_size ) : ?>
/* Archive Subtitle Font Size */
.pofo-archive-subtitle { font-size: <?php echo esc_html( $pofo_archive_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_subtitle_line_height ) : ?>
/* Archive Subtitle Line Height */
.pofo-archive-subtitle { line-height: <?php echo esc_html( $pofo_archive_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_subtitle_letter_spacing ) : ?>
/* Archive Subtitle Letter Spacing */
.pofo-archive-subtitle { letter-spacing: <?php echo esc_html( $pofo_archive_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_breadcrumb_font_size ) : ?>
/* Archive Title Breadcrumb Font Size */
.pofo-archive-title-breadcrumb a, .pofo-archive-title-breadcrumb li, .breadcrumb ul.pofo-archive-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_archive_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_breadcrumb_line_height ) : ?>
/* Archive Title Breadcrumb Line Height */
.pofo-archive-title-breadcrumb a, .pofo-archive-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_archive_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_breadcrumb_letter_spacing ) : ?>
/* Archive Title Breadcrumb Letter Spacing */
.pofo-archive-title-breadcrumb a, .pofo-archive-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_archive_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_archive_title_icon_bg_color ) : ?>
/* Archive Title Icon BG Color */
.pofo-archive-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_archive_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_archive_title_icon_color ) : ?>
/* Archive Title Icon BG Color */
.pofo-archive-title-bg .down-section i { color: <?php echo esc_html( $pofo_archive_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Default Title Settings */ ?>
<?php if( $pofo_default_title_opacity_color ) : ?>
/* Default Post Title Opacity Color */
.bg-default-opacity-color { background-color: <?php echo esc_html( $pofo_default_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_bg_color ) : ?>
/* Default Page Title Background Color */
.pofo-default-title-bg { background-color: <?php echo esc_html( $pofo_default_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_color ) : ?>
/* Default Page Title Color */
.pofo-default-title { color: <?php echo esc_html( $pofo_default_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_subtitle_color ) : ?>
/* Default Page Subtitle Color */
.pofo-default-subtitle { color: <?php echo esc_html( $pofo_default_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_breadcrumb_color ) : ?>
/* Default Page Title Breadcrumb Color */
.pofo-default-title-breadcrumb a, .pofo-default-title-breadcrumb li { color: <?php echo esc_html( $pofo_default_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_breadcrumb_text_hover_color ) : ?>
/* Default Page Title Breadcrumb Hover Color */
.pofo-default-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_default_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_breadcrumb_bg_color ) : ?>
/* Default Title Breadcrumb BG Color */
.pofo-default-breadcrumb { background: <?php echo esc_html( $pofo_default_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_breadcrumb_border_color ) : ?>
/* Default Title Breadcrumb Border Color */
.pofo-default-breadcrumb { border-color: <?php echo esc_html( $pofo_default_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_font_size ) : ?>
/* Default Title Font Size */
.pofo-default-title { font-size: <?php echo esc_html( $pofo_default_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_title_line_height ) : ?>
/* Default Title Line Height */
.pofo-default-title { line-height: <?php echo esc_html( $pofo_default_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_title_letter_spacing ) : ?>
/* Default Title Letter Spacing */
.pofo-default-title { letter-spacing: <?php echo esc_html( $pofo_default_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_subtitle_font_size ) : ?>
/* Default Subtitle Font Size */
.pofo-default-subtitle { font-size: <?php echo esc_html( $pofo_default_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_subtitle_line_height ) : ?>
/* Default Subtitle Line Height */
.pofo-default-subtitle { line-height: <?php echo esc_html( $pofo_default_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_subtitle_letter_spacing ) : ?>
/* Default Subtitle Letter Spacing */
.pofo-default-subtitle { letter-spacing: <?php echo esc_html( $pofo_default_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_breadcrumb_font_size ) : ?>
/* Default Title Breadcrumb Font Size */
.pofo-default-title-breadcrumb a, .pofo-default-title-breadcrumb li, .breadcrumb ul.pofo-default-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_default_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_breadcrumb_line_height ) : ?>
/* Default Title Breadcrumb Line Height */
.pofo-default-title-breadcrumb a, .pofo-default-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_default_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_breadcrumb_letter_spacing ) : ?>
/* Default Title Breadcrumb Letter Spacing */
.pofo-default-title-breadcrumb a, .pofo-default-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_default_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_default_title_icon_bg_color ) : ?>
/* Default Title Icon BG Color */
.pofo-default-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_default_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_default_title_icon_color ) : ?>
/* Default Title Icon BG Color */
.pofo-default-title-bg .down-section i { color: <?php echo esc_html( $pofo_default_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Portfolio Archive Title Settings */ ?>
<?php if( $pofo_portfolio_archive_title_opacity_color ) : ?>
/* Archive Portfolio Page Title Opacity Color */
.bg-portfolio-archive-opacity-color { background-color: <?php echo esc_html( $pofo_portfolio_archive_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_bg_color ) : ?>
/* Archive Page Title Background Color */
.pofo-portfolio-archive-title-bg { background-color: <?php echo esc_html( $pofo_portfolio_archive_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_color ) : ?>
/* Archive Page Title Color */
.pofo-portfolio-archive-title { color: <?php echo esc_html( $pofo_portfolio_archive_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_subtitle_color ) : ?>
/* Archive Page Subtitle Color */
.pofo-portfolio-archive-subtitle { color: <?php echo esc_html( $pofo_portfolio_archive_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_breadcrumb_color ) : ?>
/* Archive Page Title Breadcrumb Color */
.pofo-portfolio-archive-title-breadcrumb a, .pofo-portfolio-archive-title-breadcrumb li { color: <?php echo esc_html( $pofo_portfolio_archive_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_breadcrumb_text_hover_color ) : ?>
/* Archive Page Title Breadcrumb Hover Color */
.pofo-portfolio-archive-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_portfolio_archive_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_breadcrumb_bg_color ) : ?>
/* Portfolio archive Title Breadcrumb BG Color */
.pofo-portfolio-archive-breadcrumb { background: <?php echo esc_html( $pofo_portfolio_archive_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_breadcrumb_border_color ) : ?>
/* Portfolio archive Title Breadcrumb Border Color */
.pofo-portfolio-archive-breadcrumb { border-color: <?php echo esc_html( $pofo_portfolio_archive_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_font_size ) : ?>
/* Portfolio archive Title Font Size */
.pofo-portfolio-archive-title { font-size: <?php echo esc_html( $pofo_portfolio_archive_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_line_height ) : ?>
/* Portfolio archive Title Line Height */
.pofo-portfolio-archive-title { line-height: <?php echo esc_html( $pofo_portfolio_archive_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_letter_spacing ) : ?>
/* Portfolio archive Title Letter Spacing */
.pofo-portfolio-archive-title { letter-spacing: <?php echo esc_html( $pofo_portfolio_archive_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_subtitle_font_size ) : ?>
/* Portfolio archive Subtitle Font Size */
.pofo-portfolio-archive-subtitle { font-size: <?php echo esc_html( $pofo_portfolio_archive_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_subtitle_line_height ) : ?>
/* Portfolio archive Subtitle Line Height */
.pofo-portfolio-archive-subtitle { line-height: <?php echo esc_html( $pofo_portfolio_archive_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_subtitle_letter_spacing ) : ?>
/* Portfolio archive Subtitle Letter Spacing */
.pofo-portfolio-archive-subtitle { letter-spacing: <?php echo esc_html( $pofo_portfolio_archive_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_breadcrumb_font_size ) : ?>
/* Portfolio archive Title Breadcrumb Font Size */
.pofo-portfolio-archive-title-breadcrumb a, .pofo-portfolio-archive-title-breadcrumb li, .breadcrumb ul.pofo-portfolio-archive-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_portfolio_archive_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_breadcrumb_line_height ) : ?>
/* Portfolio archive Title Breadcrumb Line Height */
.pofo-portfolio-archive-title-breadcrumb a, .pofo-portfolio-archive-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_portfolio_archive_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_breadcrumb_letter_spacing ) : ?>
/* Portfolio archive Title Breadcrumb Letter Spacing */
.pofo-portfolio-archive-title-breadcrumb a, .pofo-portfolio-archive-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_portfolio_archive_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_icon_bg_color ) : ?>
/* Portfolio Archive Title Icon BG Color */
.pofo-portfolio_archive-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_portfolio_archive_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_title_icon_color ) : ?>
/* Portfolio Archive Title Icon BG Color */
.pofo-portfolio_archive-title-bg .down-section i { color: <?php echo esc_html( $pofo_portfolio_archive_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Product Archive Title Settings */ ?>
<?php if( $pofo_product_archive_title_opacity_color ) : ?>
/* Archive Product Title Opacity Color */
.bg-product-archive-opacity-color { background-color: <?php echo esc_html( $pofo_product_archive_title_opacity_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_bg_color ) : ?>
/* Archive Product Title Background Color */
.pofo-product-archive-title-bg { background-color: <?php echo esc_html( $pofo_product_archive_title_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_color ) : ?>
/* Archive Product Title Color */
.pofo-product-archive-title { color: <?php echo esc_html( $pofo_product_archive_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_subtitle_color ) : ?>
/* Archive Product Subtitle Color */
.pofo-product-archive-subtitle { color: <?php echo esc_html( $pofo_product_archive_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_breadcrumb_color ) : ?>
/* Archive Product Title Breadcrumb Color */
.pofo-product-archive-title-breadcrumb a, .pofo-product-archive-title-breadcrumb li { color: <?php echo esc_html( $pofo_product_archive_title_breadcrumb_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_breadcrumb_text_hover_color ) : ?>
/* Archive Product Title Breadcrumb Hover Color */
.pofo-product-archive-title-breadcrumb a:hover { color: <?php echo esc_html( $pofo_product_archive_title_breadcrumb_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_breadcrumb_bg_color ) : ?>
/* Archive Product Title Breadcrumb BG Color */
.pofo-product-archive-breadcrumb { background: <?php echo esc_html( $pofo_product_archive_title_breadcrumb_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_breadcrumb_border_color ) : ?>
/* Archive Product Title Breadcrumb Border Color */
.pofo-product-archive-breadcrumb { border-color: <?php echo esc_html( $pofo_product_archive_title_breadcrumb_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_font_size ) : ?>
/* Archive Product Title Font Size */
.pofo-product-archive-title { font-size: <?php echo esc_html( $pofo_product_archive_title_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_line_height ) : ?>
/* Archive Product Title Line Height */
.pofo-product-archive-title { line-height: <?php echo esc_html( $pofo_product_archive_title_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_letter_spacing ) : ?>
/* Archive Product Title Letter Spacing */
.pofo-product-archive-title { letter-spacing: <?php echo esc_html( $pofo_product_archive_title_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_subtitle_font_size ) : ?>
/* Archive Product Subtitle Font Size */
.pofo-product-archive-subtitle { font-size: <?php echo esc_html( $pofo_product_archive_subtitle_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_subtitle_line_height ) : ?>
/* Archive Product Product Subtitle Line Height */
.pofo-product-archive-subtitle { line-height: <?php echo esc_html( $pofo_product_archive_subtitle_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_subtitle_letter_spacing ) : ?>
/* Archive Product Subtitle Letter Spacing */
.pofo-product-archive-subtitle { letter-spacing: <?php echo esc_html( $pofo_product_archive_subtitle_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_breadcrumb_font_size ) : ?>
/* Archive Product Title Breadcrumb Font Size */
.pofo-product-archive-title-breadcrumb a, .pofo-product-archive-title-breadcrumb li, .breadcrumb ul.pofo-product-archive-title-breadcrumb > li:after { font-size: <?php echo esc_html( $pofo_product_archive_breadcrumb_font_size ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_breadcrumb_line_height ) : ?>
/* Archive Product Title Breadcrumb Line Height */
.pofo-product-archive-title-breadcrumb a, .pofo-product-archive-title-breadcrumb li { line-height: <?php echo esc_html( $pofo_product_archive_breadcrumb_line_height ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_breadcrumb_letter_spacing ) : ?>
/* Archive Product Title Breadcrumb Letter Spacing */
.pofo-product-archive-title-breadcrumb a, .pofo-product-archive-title-breadcrumb li { letter-spacing: <?php echo esc_html( $pofo_product_archive_breadcrumb_letter_spacing ); ?> !important; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_icon_bg_color ) : ?>
/* Archive Product Title Icon BG Color */
.pofo-product-archive-title-bg .down-section i { background-color: <?php echo esc_html( $pofo_product_archive_title_icon_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_product_archive_title_icon_color ) : ?>
/* Archive Product Title Icon BG Color */
.pofo-product-archive-title-bg .down-section i { color: <?php echo esc_html( $pofo_product_archive_title_icon_color ); ?>; }
<?php endif; ?>
<?php /* Footer Settings */ ?>
<?php if( $pofo_header_copyright_text_color ) : ?>
/* Footer Copyright Text Color */
.pofo-copyright-text { color: <?php echo esc_html( $pofo_header_copyright_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_wrapper_bg_color ) : ?>
/* Footer Wrapper Background Color */
.pofo-footer-wrapper { background-color: <?php echo esc_html( $pofo_footer_wrapper_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_wrapper_text_color ) : ?>
/* Footer Wrapper Text Color */
.footer-wrapper-text { color: <?php echo esc_html( $pofo_footer_wrapper_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_wrapper_text_font_size ) : ?>
/* Footer Wrapper Text Fon Size */
.footer-wrapper-text { font-size: <?php echo esc_html( $pofo_footer_wrapper_text_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_wrapper_text_line_height ) : ?>
/* Footer Wrapper Text Line Height */
.footer-wrapper-text { line-height: <?php echo esc_html( $pofo_footer_wrapper_text_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_wrapper_text_letter_spacing ) : ?>
/* Footer Wrapper Text Letter Spacing */
.footer-wrapper-text { letter-spacing: <?php echo esc_html( $pofo_footer_wrapper_text_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_text_font_size ) : ?>
/* Footer Social Text Font Size */
.footer-before-text { font-size: <?php echo esc_html( $pofo_footer_social_text_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_text_line_height ) : ?>
/* Footer Social Text Line Height */
.footer-before-text { line-height: <?php echo esc_html( $pofo_footer_social_text_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_text_letter_spacing ) : ?>
/* Footer Social Text Letter Spacing */
.footer-before-text { letter-spacing: <?php echo esc_html( $pofo_footer_social_text_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_icon_font_size ) : ?>
/* Footer Social Icon Font Size */
.footer-social-icon a.text-link-white i { font-size: <?php echo esc_html( $pofo_footer_social_icon_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_icon_line_height ) : ?>
/* Footer Social Icon Line Height */
.footer-social-icon a.text-link-white i { line-height: <?php echo esc_html( $pofo_footer_social_icon_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_icon_letter_spacing ) : ?>
/* Footer Social Icon Letter Spacing */
.footer-social-icon a.text-link-white i { letter-spacing: <?php echo esc_html( $pofo_footer_social_icon_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bg_color ) : ?>
/* Footer Background Color */
.footer-widget-area { background-color: <?php echo esc_html( $pofo_footer_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_text_color ) : ?>
/* Footer Text Color */
.footer-widget-area { color: <?php echo esc_html( $pofo_footer_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_link_color ) : ?>
/* Footer Background Color */
.footer-widget-area a { color: <?php echo esc_html( $pofo_footer_link_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_link_hover_color ) : ?>
/* Footer Background Color */
.footer-widget-area a:hover { color: <?php echo esc_html( $pofo_footer_link_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_border_color ) : ?>
/* Footer Border Color */
.footer-widget-area .pofo-right-border-style { border-color: <?php echo esc_html( $pofo_footer_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_widget_title_font_size ) : ?>
/* Footer Widget Title Font Size */
footer .widget-title { font-size: <?php echo esc_html( $pofo_footer_widget_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_widget_title_line_height ) : ?>
/* Footer Widget Title Line Height */
footer .widget-title { line-height: <?php echo esc_html( $pofo_footer_widget_title_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_widget_title_letter_spacing ) : ?>
/* Footer Widget Title Letter Spacing */
footer .widget-title { letter-spacing: <?php echo esc_html( $pofo_footer_widget_title_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_widget_title_color ) : ?>
/* Footer Widget Title Color */
footer .widget-title { color: <?php echo esc_html( $pofo_footer_widget_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_bg_color ) : ?>
/* Footer Bottom Background Color */
.pofo-footer-bottom { background-color: <?php echo esc_html( $pofo_footer_bottom_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_text_color ) : ?>
/* Footer Bottom Text Color */
.pofo-footer-bottom { color: <?php echo esc_html( $pofo_footer_bottom_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_link_color ) : ?>
/* Footer Bottom Link Color */
.pofo-footer-bottom a { color: <?php echo esc_html( $pofo_footer_bottom_link_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_link_hover_color ) : ?>
/* Footer Bottom Link Hover Color */
.pofo-footer-bottom a:hover { color: <?php echo esc_html( $pofo_footer_bottom_link_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_border_color ) : ?>
/* Footer Bottom Border Color */
.pofo-footer-bottom .footer-bottom { border-color: <?php echo esc_html( $pofo_footer_bottom_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_before_text_color ) : ?>
/* Footer Before Text Color */
.footer-before-text { color: <?php echo esc_html( $pofo_footer_before_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_icon_color ) : ?>
/* Footer Social Icon Color */
.social-icon-style-8 a.text-link-white i, .footer-social-icon a.text-link-white i { color: <?php echo esc_html( $pofo_footer_social_icon_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_social_icon_hover_color ) : ?>
/* Footer Social Icon Hover Color */
.social-icon-style-8 a.text-link-white:hover i, .footer-social-icon a.text-link-white:hover i { color: <?php echo esc_html( $pofo_footer_social_icon_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_left_text_font_size ) : ?>
/* Footer Bottom Left Text Font Size */
.footer-left-text { font-size: <?php echo esc_html( $pofo_footer_bottom_left_text_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_left_text_line_height ) : ?>
/* Footer Bottom Left Text Line Height */
.footer-left-text { line-height: <?php echo esc_html( $pofo_footer_bottom_left_text_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_left_text_letter_spacing ) : ?>
/* Footer Bottom Left Text Letter Spacing */
.footer-left-text { letter-spacing: <?php echo esc_html( $pofo_footer_bottom_left_text_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_right_text_font_size ) : ?>
/* Footer Bottom Right Text Font Size */
.footer-right-text { font-size: <?php echo esc_html( $pofo_footer_bottom_right_text_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_right_text_line_height ) : ?>
/* Footer Bottom Right Text Line Height */
.footer-right-text { line-height: <?php echo esc_html( $pofo_footer_bottom_right_text_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_footer_bottom_right_text_letter_spacing ) : ?>
/* Footer Bottom Right Text Letter Spacing */
.footer-right-text { letter-spacing: <?php echo esc_html( $pofo_footer_bottom_right_text_letter_spacing ); ?>; }
<?php endif; ?>
<?php /* Archive Settings */ ?>
<?php if( $pofo_box_bg_color_archive ) : ?>
/* Archive Post Box color */
.pofo-box-background-color { background-color: <?php echo esc_html( $pofo_box_bg_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_bg_hover_color_archive ) : ?>
/* Archive Post Box Hover color */
.pofo-box-background-color:hover { background-color: <?php echo esc_html( $pofo_box_bg_hover_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_color_archive ) : ?>
/* Archive Post Meta color */
.pofo-post-description  .author .name a, .pofo-post-description  .blog-separator, .pofo-post-description .pofo-blog-post-meta, .pofo-post-description .pofo-blog-post-meta a,.pofo-post-description:hover .blog-like-comment a { color: <?php echo esc_html( $pofo_post_meta_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_hover_color_archive ) : ?>
/* Archive Post Meta Hover color */
.pofo-post-description .author .name a:hover, .pofo-post-description a.pofo-blog-post-meta:hover, .pofo-post-description .pofo-blog-post-meta a:hover, .pofo-post-description .author .name a:hover .fa, .pofo-post-description .blog-like-comment a:hover .fa, a.pofo-blog-post-meta:hover { color: <?php echo esc_html( $pofo_post_meta_hover_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_color_archive ) : ?>
/* Archive Button color */
.pofo-post-description a.btn, .pofo-post-description:hover .btn { background-color: <?php echo esc_html( $pofo_button_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_color_archive ) : ?>
/* Archive Button Hover color */
.pofo-post-description a.btn:hover { background-color: <?php echo esc_html( $pofo_button_hover_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_text_color_archive ) : ?>
/* Archive Button Text color */
.pofo-post-description a.btn, .pofo-post-description:hover .btn { color: <?php echo esc_html( $pofo_button_text_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_text_color_archive ) : ?>
/* Archive Button Text Hover color */
.pofo-post-description a.btn:hover { color: <?php echo esc_html( $pofo_button_hover_text_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_border_color_archive ) : ?>
/* Archive Button Border color */
.pofo-post-description a.btn, .pofo-post-description:hover .btn { border-color: <?php echo esc_html( $pofo_button_border_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_color_archive ) : ?>
/* Archive Title color */
.pofo-post-description .entry-title, .pofo-post-description:hover a.entry-title { color: <?php echo esc_html( $pofo_title_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_hover_color_archive ) : ?>
/* Archive Title Hover color */
.pofo-post-description .entry-title:hover, .pofo-post-description:hover a.entry-title:hover { color: <?php echo esc_html( $pofo_title_hover_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_color_archive ) : ?>
/* Archive Content color */
.pofo-post-description .entry-content { color: <?php echo esc_html( $pofo_content_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_show_separator_archive == 0 ) : ?>
/* Archive Separator */
.pofo-list-border-archive { border-bottom: none; }
<?php endif; ?>

<?php if( $pofo_seperator_height_archive ) : ?>
/* Archive Separator */
.pofo-list-border-archive { border-bottom-width: <?php echo esc_html( $pofo_seperator_height_archive ); ?>;; }
<?php endif; ?>

<?php if( $pofo_separator_color_archive && $pofo_blog_premade_style_archive == 'blog-list' ) : ?>
/* Archive Separator color */
.pofo-list-border-archive { border-color: <?php echo esc_html( $pofo_separator_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_separator_color_archive && $pofo_blog_premade_style_archive != 'blog-list' ) : ?>
/* Archive Separator color */
.pofo-post-description .pofo-post-sepataror { background-color: <?php echo esc_html( $pofo_separator_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_color_archive ) : ?>
/* Archive Border color */
.pofo-post-description { border-color: <?php echo esc_html( $pofo_box_border_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_type_archive ) : ?>
/* Archive Border Type */
.pofo-post-description { border-style: <?php echo esc_html( $pofo_box_border_type_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_size_archive ) : ?>
/* Archive Border Size */
.pofo-post-description { border-width: <?php echo esc_html( $pofo_box_border_size_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_opacity_archive ) : ?>
/* Archive Opacity */
.blog-post.blog-post-style-archive:hover .blog-post-images img, .grid-item.blog-post-style-archive:hover .blog-img img { opacity: <?php echo esc_html( $pofo_opacity_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_overlay_color_archive ) : ?>
/* Archive Overlay Color */
.blog-post.blog-post-style-archive .blog-post-images, .grid-item.blog-post-style-archive .blog-img, .blog-post-style-archive .grid-item .blog-post .blog-post-images .blog-hover-icon { background: <?php echo esc_html( $pofo_overlay_color_archive ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_tag_like_color ) : ?>
/* Tag, Like Color */
.pofo-post-detail-icon a, .tag-cloud a { color: <?php echo esc_html( $pofo_post_tag_like_color ); ?>; border-color: <?php echo esc_html( $pofo_post_tag_like_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_tag_like_hover_color ) : ?>
/* Tag, Like Hover Color */
.pofo-post-detail-icon a:hover, .tag-cloud a:hover { color: <?php echo esc_html( $pofo_post_tag_like_hover_color ); ?>; border-color: <?php echo esc_html( $pofo_post_tag_like_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_author_box_bg_color ) : ?>
/* Author Box Background Color */
.pofo-author-box { background: <?php echo esc_html( $pofo_post_author_box_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_author_title_text_color ) : ?>
/* Author Title Color */
a.pofo-author-title { color: <?php echo esc_html( $pofo_post_author_title_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_author_title_text_hover_color ) : ?>
/* Author Title Color */
a.pofo-author-title:hover { color: <?php echo esc_html( $pofo_post_author_title_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_author_content_color ) : ?>
/* Author Content Color */
.pofo-author-content { color: <?php echo esc_html( $pofo_post_author_content_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_meta_text_color ) : ?>
/* Single Post Meta Color */
.pofo-single-post-title-breadcrumb-single li, .pofo-single-post-title-breadcrumb-single span, .pofo-single-post-title-breadcrumb-single li span, .pofo-single-post-title-breadcrumb-single li a { color: <?php echo esc_html( $pofo_single_post_meta_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_post_meta_text_hover_color ) : ?>
/* Single Post Meta Hover Color */
.pofo-single-post-title-breadcrumb-single li a:hover { color: <?php echo esc_html( $pofo_single_post_meta_text_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_bg_color_default ) : ?>
/* Default Post Box color */
.pofo-default-box-background-color { background-color: <?php echo esc_html( $pofo_box_bg_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_bg_hover_color_default ) : ?>
/* Default Post Box Hover color */
.pofo-default-box-background-color:hover { background-color: <?php echo esc_html( $pofo_box_bg_hover_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_color_default ) : ?>
/* Default Post Meta color */
.pofo-default-post-description  .author .name a, .pofo-default-post-description  .blog-separator, .pofo-default-post-description .pofo-blog-post-meta, .pofo-default-post-description .pofo-blog-post-meta a,.pofo-default-post-description:hover .blog-like-comment a { color: <?php echo esc_html( $pofo_post_meta_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_hover_color_default ) : ?>
/* Default Post Meta Hover color */
.pofo-default-post-description .author .name a:hover, .pofo-default-post-description a.pofo-blog-post-meta:hover, .pofo-default-post-description .pofo-blog-post-meta a:hover, .pofo-default-post-description .author .name a:hover .fa, .pofo-default-post-description .blog-like-comment a:hover .fa, .pofo-default-post-description a.pofo-blog-post-meta:hover { color: <?php echo esc_html( $pofo_post_meta_hover_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_color_default ) : ?>
/* Default Button color */
.pofo-default-post-description a.btn, .pofo-default-post-description:hover .btn { background-color: <?php echo esc_html( $pofo_button_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_color_default ) : ?>
/* Default Button Hover color */
.pofo-default-post-description a.btn:hover { background-color: <?php echo esc_html( $pofo_button_hover_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_text_color_default ) : ?>
/* Default Button Text color */
.pofo-default-post-description a.btn, .pofo-default-post-description:hover .btn { color: <?php echo esc_html( $pofo_button_text_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_text_color_default ) : ?>
/* Default Button Text Hover color */
.pofo-default-post-description a.btn:hover { color: <?php echo esc_html( $pofo_button_hover_text_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_border_color_default ) : ?>
/* Default Button Border color */
.pofo-default-post-description a.btn, .pofo-default-post-description:hover .btn { border-color: <?php echo esc_html( $pofo_button_border_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_color_default ) : ?>
/* Default Title color */
.pofo-default-post-description .entry-title, .pofo-default-post-description:hover a.entry-title { color: <?php echo esc_html( $pofo_title_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_hover_color_default ) : ?>
/* Default Title Hover color */
.pofo-default-post-description .entry-title:hover, .pofo-default-post-description:hover a.entry-title:hover { color: <?php echo esc_html( $pofo_title_hover_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_color_default ) : ?>
/* Default Content color */
.pofo-default-post-description .entry-content { color: <?php echo esc_html( $pofo_content_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_show_separator_default == 0 ) : ?>
/* Default Separator */
.pofo-list-border-default { border-bottom: none; }
<?php endif; ?>

<?php if( $pofo_seperator_height_default ) : ?>
/* Default Separator */
.pofo-list-border-default { border-bottom-width: <?php echo esc_html( $pofo_seperator_height_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_separator_color_default && $pofo_blog_premade_style_default == 'blog-list' ) : ?>
/* Default Separator color */
.pofo-list-border-default { border-color: <?php echo esc_html( $pofo_separator_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_separator_color_default && $pofo_blog_premade_style_default != 'blog-list' ) : ?>
/* Default Separator color */
.pofo-post-description .pofo-post-sepataror { background-color: <?php echo esc_html( $pofo_separator_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_opacity_default ) : ?>
/* Default Opacity */
.blog-post.blog-post-style-default:hover .blog-post-images img, .blog-post-style4 .blog-grid .blog-post-style-default:hover .blog-img img { opacity: <?php echo esc_html( $pofo_opacity_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_overlay_color_default ) : ?>
/* Archive Overlay Color */
.blog-post.blog-post-style-default .blog-post-images, .grid-item.blog-post-style-default .blog-img, .blog-post-style-default .grid-item .blog-post .blog-post-images .blog-hover-icon { background: <?php echo esc_html( $pofo_overlay_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_separator_color_default ) : ?>
/* Default Separator color */
.pofo-default-post-description .pofo-post-sepataror { background-color: <?php echo esc_html( $pofo_separator_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_color_default ) : ?>
/* Default Border color */
.pofo-default-post-description { border-color: <?php echo esc_html( $pofo_box_border_color_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_type_default ) : ?>
/* Default Border Type */
.pofo-default-post-description { border-style: <?php echo esc_html( $pofo_box_border_type_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_size_default ) : ?>
/* Default Border Size */
.pofo-default-post-description { border-width: <?php echo esc_html( $pofo_box_border_size_default ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_bg_color_sticky ) : ?>
/* Sticky Post Box color */
.pofo-sticky-box-background-color { background-color: <?php echo esc_html( $pofo_box_bg_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_color_sticky ) : ?>
/* Sticky Post Meta color */
.pofo-sticky-post-description  .author .name a, .pofo-sticky-post-description  .blog-separator, .pofo-sticky-post-description .pofo-blog-post-meta, .pofo-sticky-post-description .pofo-blog-post-meta a,.pofo-sticky-post-description:hover .blog-like-comment a { color: <?php echo esc_html( $pofo_post_meta_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_post_meta_hover_color_sticky ) : ?>
/* Sticky Post Meta Hover color */
.pofo-sticky-post-description .author .name a:hover, .pofo-sticky-post-description a.pofo-blog-post-meta:hover, .pofo-sticky-post-description .pofo-blog-post-meta a:hover, .pofo-sticky-post-description .author .name a:hover .fa, .pofo-sticky-post-description .blog-like-comment a:hover .fa, .pofo-sticky-post-description a.pofo-blog-post-meta:hover { color: <?php echo esc_html( $pofo_post_meta_hover_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_color_sticky ) : ?>
/* Sticky Button color */
.pofo-sticky-post-description a.btn, .pofo-sticky-post-description:hover .btn { background-color: <?php echo esc_html( $pofo_button_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_color_sticky ) : ?>
/* Sticky Button Hover color */
.pofo-sticky-post-description a.btn:hover { background-color: <?php echo esc_html( $pofo_button_hover_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_text_color_sticky ) : ?>
/* Sticky Button Text color */
.pofo-sticky-post-description a.btn, .pofo-sticky-post-description:hover .btn { color: <?php echo esc_html( $pofo_button_text_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_hover_text_color_sticky ) : ?>
/* Sticky Button Text Hover color */
.pofo-sticky-post-description a.btn:hover { color: <?php echo esc_html( $pofo_button_hover_text_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_button_border_color_sticky ) : ?>
/* Sticky Button Border color */
.pofo-sticky-post-description a.btn, .pofo-sticky-post-description:hover .btn { border-color: <?php echo esc_html( $pofo_button_border_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_color_sticky ) : ?>
/* Sticky Title color */
.pofo-sticky-post-description .entry-title, .pofo-sticky-post-description:hover a.entry-title { color: <?php echo esc_html( $pofo_title_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_title_hover_color_sticky ) : ?>
/* Sticky Title Hover color */
.pofo-sticky-post-description .entry-title:hover, .pofo-sticky-post-description:hover a.entry-title:hover { color: <?php echo esc_html( $pofo_title_hover_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_content_color_sticky ) : ?>
/* Sticky Content color */
.pofo-sticky-post-description .entry-content { color: <?php echo esc_html( $pofo_content_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_color_sticky ) : ?>
/* Sticky Border color */
.pofo-sticky-post-description { border-color: <?php echo esc_html( $pofo_box_border_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_type_sticky ) : ?>
/* Sticky Border Type */
.pofo-sticky-post-description { border-style: <?php echo esc_html( $pofo_box_border_type_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_box_border_size_sticky ) : ?>
/* Sticky Border Size */
.pofo-sticky-post-description { border-width: <?php echo esc_html( $pofo_box_border_size_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_meta_border_color_sticky ) : ?>
/* Sticky Meta Border color */
.pofo-sticky-post-description .border-color-medium-gray { border-color: <?php echo esc_html( $pofo_meta_border_color_sticky ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_content_bg_color ) : ?>
/* 404 Content Background Color */
.pofo-404-content-bg { background-color: <?php echo esc_html( $pofo_404_content_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_title_color ) : ?>
/* 404 Title Color */
.pofo-404-title { color: <?php echo esc_html( $pofo_404_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_subtitle_color ) : ?>
/* 404 Subtitle Color */
.pofo-404-subtitle { color: <?php echo esc_html( $pofo_404_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_content_color ) : ?>
/* 404 Content Color */
.pofo-404-content { color: <?php echo esc_html( $pofo_404_content_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_bg_color ) : ?>
/* 404 Background Color */
.pofo-404-bg-color { background-color: <?php echo esc_html( $pofo_404_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_404_page_opacity ) : ?>
/* 404 Opacity */
.pofo-404-bg-color { opacity: <?php echo esc_html( $pofo_404_page_opacity ); ?>; }
<?php endif; ?>

<?php if( $pofo_page_not_found_button_text_transform ) : ?>
/* 404 Text Transform */
.error404 .pofo-404-content-bg .btn { text-transform: <?php echo esc_html( $pofo_page_not_found_button_text_transform ); ?>; }
<?php endif; ?>

<?php if( $pofo_hide_scroll_to_top_button_color ) : ?>
/* Scroll to Top Button Color */
.scroll-top-arrow { color: <?php echo esc_html( $pofo_hide_scroll_to_top_button_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_hide_scroll_to_top_button_hover_color ) : ?>
/* Scroll to Top Button Hover Color */
.scroll-top-arrow:hover { color: <?php echo esc_html( $pofo_hide_scroll_to_top_button_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_hide_scroll_to_top_button_bg_color ) : ?>
/* Scroll to Top Button Color */
.scroll-top-arrow { background-color: <?php echo esc_html( $pofo_hide_scroll_to_top_button_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_hide_scroll_to_top_button_hover_bg_color ) : ?>
/* Scroll to Top Button Hover Color */
.scroll-top-arrow:hover { background-color: <?php echo esc_html( $pofo_hide_scroll_to_top_button_hover_bg_color ); ?>; }
<?php endif; ?>  

<?php if( $pofo_general_comment_title_border != 1 ) : ?>
/* Page Border Show */
.comment-title:before, .comment-title:after { border-bottom: none; }
<?php endif; ?>

<?php if( $pofo_comment_title_font_size ) : ?>
/* Comment Title Font Line Height */
.comment-title { font-size: <?php echo esc_html( $pofo_comment_title_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_comment_title_font_line_height ) : ?>
/* Comment Title Line Height */
.comment-title { line-height: <?php echo esc_html( $pofo_comment_title_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_comment_title_font_letter_spacing ) : ?>
/* Comment Title Letter Spacing */
.comment-title { letter-spacing: <?php echo esc_html( $pofo_comment_title_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_general_comment_title_color ) : ?>
/* Comment Title Color */
.comment-title { color: <?php echo esc_html( $pofo_general_comment_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_general_comment_border_color ) : ?>
/* Comment Border Color */
.comment-title:before, .comment-title:after { border-color: <?php echo esc_html( $pofo_general_comment_border_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h1_font_size ) : ?>
/* H1 Font Size */
h1 { font-size: <?php echo esc_html( $pofo_h1_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h1_font_line_height ) : ?>
/* H1 Font Line Height */
h1 { line-height: <?php echo esc_html( $pofo_h1_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h1_font_letter_spacing ) : ?>
/* H1 Font Letter Spacing */
h1 { letter-spacing: <?php echo esc_html( $pofo_h1_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h1_color ) : ?>
/* H1 Color */
h1 { color: <?php echo esc_html( $pofo_heading_h1_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h2_font_size ) : ?>
/* H2 Font Size */
h2 { font-size: <?php echo esc_html( $pofo_h2_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h2_font_line_height ) : ?>
/* H2 Font Line Height */
h2 { line-height: <?php echo esc_html( $pofo_h2_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h2_font_letter_spacing ) : ?>
/* H2 Font Letter Spacing */
h2 { letter-spacing: <?php echo esc_html( $pofo_h2_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h2_color ) : ?>
/* H2 Color */
h2 { color: <?php echo esc_html( $pofo_heading_h2_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h3_font_size ) : ?>
/* H3 Font Size */
h3 { font-size: <?php echo esc_html( $pofo_h3_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h3_font_line_height ) : ?>
/* H3 Font Line Height */
h3 { line-height: <?php echo esc_html( $pofo_h3_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h3_font_letter_spacing ) : ?>
/* H3 Font Letter Spacing */
h3 { letter-spacing: <?php echo esc_html( $pofo_h3_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h3_color ) : ?>
/* H3 Color */
h3 { color: <?php echo esc_html( $pofo_heading_h3_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h4_font_size ) : ?>
/* H4 Font Size */
h4 { font-size: <?php echo esc_html( $pofo_h4_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h4_font_line_height ) : ?>
/* H4 Font Line Height */
h4 { line-height: <?php echo esc_html( $pofo_h4_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h4_font_letter_spacing ) : ?>
/* H4 Font Letter Spacing */
h4 { letter-spacing: <?php echo esc_html( $pofo_h4_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h4_color ) : ?>
/* H4 Color */
h4 { color: <?php echo esc_html( $pofo_heading_h4_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h5_font_size ) : ?>
/* H5 Font Size */
h5 { font-size: <?php echo esc_html( $pofo_h5_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h5_font_line_height ) : ?>
/* H5 Font Line Height */
h5 { line-height: <?php echo esc_html( $pofo_h5_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h5_font_letter_spacing ) : ?>
/* H5 Font Letter Spacing */
h5 { letter-spacing: <?php echo esc_html( $pofo_h5_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h5_color ) : ?>
/* H5 Color */
h5 { color: <?php echo esc_html( $pofo_heading_h5_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_h6_font_size ) : ?>
/* H6 Font Size */
h6 { font-size: <?php echo esc_html( $pofo_h6_font_size ); ?>; }
<?php endif; ?>

<?php if( $pofo_h6_font_line_height ) : ?>
/* H6 Font Line Height */
h6 { line-height: <?php echo esc_html( $pofo_h6_font_line_height ); ?>; }
<?php endif; ?>

<?php if( $pofo_h6_font_letter_spacing ) : ?>
/* H6 Font Letter Spacing */
h6 { letter-spacing: <?php echo esc_html( $pofo_h6_font_letter_spacing ); ?>; }
<?php endif; ?>

<?php if( $pofo_heading_h6_color ) : ?>
/* H6 Color */
h6 { color: <?php echo esc_html( $pofo_heading_h6_color ); ?>; }
<?php endif; ?>
<?php /* Single Portfolio Settings */ ?>
<?php if( $pofo_single_portfolio_share_box_bg_color ) : ?>
/* Share Box BG Color */
.pofo-portfolio-sharebox { background-color: <?php echo esc_html( $pofo_single_portfolio_share_box_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_share_box_title_color ) : ?>
/* Share Box BG Color */
.pofo-portfolio-sharebox-title { color: <?php echo esc_html( $pofo_single_portfolio_share_box_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_single_portfolio_box_bg_color ) : ?>
/* Related BG Color */
.pofo-related-single-portfolio { background-color: <?php echo esc_html( $pofo_related_single_portfolio_box_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_single_portfolio_title_text_color ) : ?>
/* Related Title Color */
.pofo-related-portfolio-title { color: <?php echo esc_html( $pofo_related_single_portfolio_title_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_related_single_portfolio_content_color ) : ?>
/* Related Content Color */
.pofo-related-portfolio-content { color: <?php echo esc_html( $pofo_related_single_portfolio_content_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_navigation_single_portfolio_bg_color ) : ?>
/* Navigation BG Color */
.portfolio-navigation-wrapper { background-color: <?php echo esc_html( $pofo_navigation_single_portfolio_bg_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_navigation_single_portfolio_text_color ) : ?>
/* Navigation Text Color */
.portfolio-navigation-text { color: <?php echo esc_html( $pofo_navigation_single_portfolio_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_navigation_single_portfolio_link_color ) : ?>
/* Navigation Link Color */
.portfolio-navigation-wrapper a { color: <?php echo esc_html( $pofo_navigation_single_portfolio_link_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_hide_navigation_single_portfolio_link_hover_color ) : ?>
/* Navigation Link Hover Color */
.portfolio-navigation-wrapper a:hover { color: <?php echo esc_html( $pofo_hide_navigation_single_portfolio_link_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_meta_text_color ) : ?>
/* Single Portfolio Meta Color */
.pofo-single-portfolio-title-breadcrumb-single li, .pofo-single-portfolio-title-breadcrumb-single span, .pofo-single-portfolio-title-breadcrumb-single li span, .pofo-single-portfolio-title-breadcrumb-single li a { color: <?php echo esc_html( $pofo_single_portfolio_meta_text_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_single_portfolio_meta_text_hover_color ) : ?>
/* Single Portfolio Meta Hover Color */
.pofo-single-portfolio-title-breadcrumb-single li a:hover { color: <?php echo esc_html( $pofo_single_portfolio_meta_text_hover_color ); ?>; }
<?php endif; ?>
<?php /* POrtfolio Archive Settings */ ?>
<?php if( $pofo_portfolio_archive_page_title_color ) : ?>
/* Portfolio Archive Title Color */
.pofo-portfolio-archive-page-title { color: <?php echo esc_html( $pofo_portfolio_archive_page_title_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_title_hover_color ) : ?>
/* Portfolio Archive Title Hover Color */
.hover-option11 .grid-item > a:hover .pofo-portfolio-archive-page-title { color: <?php echo esc_html( $pofo_portfolio_archive_page_title_hover_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_subtitle_color ) : ?>
/* Portfolio Archive Subtitle Color */
.pofo-portfolio-archive-page-subtitle { color: <?php echo esc_html( $pofo_portfolio_archive_page_subtitle_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_separator_color ) : ?>
/* Portfolio Archive Separator Color */
.pofo-portfolio-archive-page-separator { background-color: <?php echo esc_html( $pofo_portfolio_archive_page_separator_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_separator_thickness ) : ?>
/* Portfolio Archive Separator Thickness Color */
.pofo-portfolio-archive-page-separator { height: <?php echo esc_html( $pofo_portfolio_archive_page_separator_thickness ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_box_hover_background_color ) : ?>
/* Portfolio Archive Box Background Color */
.pofo-portfolio-archive-page-background, .hover-option5 .grid-item:hover .pofo-portfolio-archive-page-background, .hover-option8 .grid-item figure:hover figcaption .pofo-portfolio-archive-page-background, .hover-option11 .grid-item:hover .pofo-portfolio-archive-page-background img { background-color: <?php echo esc_html( $pofo_portfolio_archive_page_box_hover_background_color ); ?>; }

<?php if( $pofo_portfolio_archive_page_opacity ){ ?>
.hover-option5 .pofo-portfolio-archive-page-opacity:hover .portfolio-hover-box{ background: <?php echo pofo_hex2rgb( $pofo_portfolio_archive_page_box_hover_background_color , $pofo_portfolio_archive_page_opacity ); ?> !important; }
<?php } endif; ?>

<?php if( $pofo_portfolio_archive_page_icon_color ) : ?>
/* Portfolio Archive Icon Color */
.pofo-portfolio-archive-page-icon { color: <?php echo esc_html( $pofo_portfolio_archive_page_icon_color ); ?>; }
<?php endif; ?>

<?php if( $pofo_portfolio_archive_page_opacity ) : ?>
/* Portfolio Archive Opacity */
.portfolio-grid .grid-item figure:hover .pofo-portfolio-archive-page-background img, .hover-option11 .grid-item:hover .pofo-portfolio-archive-page-background img { opacity: <?php echo esc_html( $pofo_portfolio_archive_page_opacity ); ?>; }
<?php if( $pofo_portfolio_archive_page_box_hover_background_color ){ ?>
.hover-option5 .pofo-portfolio-archive-page-opacity:hover .portfolio-hover-box{ background: <?php echo pofo_hex2rgb( $pofo_portfolio_archive_page_box_hover_background_color , $pofo_portfolio_archive_page_opacity ); ?> !important; }
<?php } endif; ?>

<?php if ( class_exists( 'WooCommerce' ) ) {/* if WooCommerce plugin is activated */ ?>

    <?php if( $pofo_product_archive_product_sale_font_size ) : ?>
    /* Archive Product Sale Font Size */
    .woocommerce ul.products li.product .onsale { font-size: <?php echo esc_html( $pofo_product_archive_product_sale_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_line_height ) : ?>
    /* Archive Product Sale Line Height */
    .woocommerce ul.products li.product .onsale { line-height: <?php echo esc_html( $pofo_product_archive_product_sale_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_font_weight ) : ?>
    /* Archive Product Sale Font Weight */
    .woocommerce ul.products li.product .onsale { font-weight: <?php echo esc_html( $pofo_product_archive_product_sale_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_color ) : ?>
    /* Archive Product Sale Color */
    .woocommerce ul.products li.product .onsale { color: <?php echo esc_html( $pofo_product_archive_product_sale_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_bg_color ) : ?>
    /* Archive Product Sale Background Color */
    .woocommerce ul.products li.product .onsale { background-color: <?php echo esc_html( $pofo_product_archive_product_sale_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_enable_border != '1' ) : ?>
    /* Archive Product Sale Border None */
    .woocommerce ul.products li.product .onsale { border: none !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_enable_border == '1' && $pofo_product_archive_product_sale_border_size ) : ?>
    /* Archive Product Sale Border Size */
    .woocommerce ul.products li.product .onsale { border-width: <?php echo esc_html( $pofo_product_archive_product_sale_border_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_enable_border == '1' && $pofo_product_archive_product_sale_border_type ) : ?>
    /* Archive Product Sale Border Style */
    .woocommerce ul.products li.product .onsale { border-style: <?php echo esc_html( $pofo_product_archive_product_sale_border_type ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_enable_border == '1' && $pofo_product_archive_product_sale_border_color ) : ?>
    /* Archive Product Sale Border Color */
    .woocommerce ul.products li.product .onsale { border-color: <?php echo esc_html( $pofo_product_archive_product_sale_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_sale_border_radius ) : ?>
    /* Archive Product Sale Border Size */
    .woocommerce ul.products li.product .onsale { border-radius: <?php echo esc_html( $pofo_product_archive_product_sale_border_radius ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_font_size ) : ?>
    /* Archive Product Title Font Size */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { font-size: <?php echo esc_html( $pofo_product_archive_product_title_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_line_height ) : ?>
    /* Archive Product Title Line Height */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { line-height: <?php echo esc_html( $pofo_product_archive_product_title_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_letter_spacing ) : ?>
    /* Archive Product Title Letter Spacing */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { letter-spacing: <?php echo esc_html( $pofo_product_archive_product_title_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_font_weight ) : ?>
    /* Archive Product Title Font Weight */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { font-weight: <?php echo esc_html( $pofo_product_archive_product_title_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_font_italic == '1' ) : ?>
    /* Archive Product Title Font Italic */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { font-style: italic !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_font_underline == '1' ) : ?>
    /* Archive Product Title Font Underline */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { text-decoration: underline !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_color ) : ?>
    /* Archive Product Title Color */
    .woocommerce ul.products li.product .woocommerce-loop-product__title { color: <?php echo esc_html( $pofo_product_archive_product_title_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_title_hover_color ) : ?>
    /* Archive Product Title Hover Color */
    .woocommerce ul.products li.product a:hover .woocommerce-loop-product__title { color: <?php echo esc_html( $pofo_product_archive_product_title_hover_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_rating_star_color ) : ?>
    /* Archive Product Rating Star Color */
    .woocommerce ul.products li.product .star-rating span { color: <?php echo esc_html( $pofo_product_archive_product_rating_star_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_price_font_size ) : ?>
    /* Archive Product Price Font Size */
    .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins { font-size: <?php echo esc_html( $pofo_product_archive_product_price_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_price_line_height ) : ?>
    /* Archive Product Price Line Height */
    .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins { line-height: <?php echo esc_html( $pofo_product_archive_product_price_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_price_font_weight ) : ?>
    /* Archive Product Price Font Weight */
    .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins { font-weight: <?php echo esc_html( $pofo_product_archive_product_price_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_price_color ) : ?>
    /* Archive Product Price Color */
    .woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins { color: <?php echo esc_html( $pofo_product_archive_product_price_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_regular_price_color ) : ?>
    /* Archive Product Regular Price Color */
    .woocommerce ul.products li.product .price del { color: <?php echo esc_html( $pofo_product_archive_product_regular_price_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_button_color ) : ?>
    /* Archive Product Button Color */
    .woocommerce ul.products li.product a.button { color: <?php echo esc_html( $pofo_product_archive_product_button_color ); ?> !important; }
    .woocommerce a.added_to_cart:hover { color: <?php echo esc_html( $pofo_product_archive_product_button_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_button_bg_color ) : ?>
    /* Archive Product Button Background Color */
    .woocommerce ul.products li.product a.button { background-color: <?php echo esc_html( $pofo_product_archive_product_button_bg_color ); ?> !important; }
    .woocommerce a.added_to_cart:hover { background-color: <?php echo esc_html( $pofo_product_archive_product_button_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_button_border_color ) : ?>
    /* Archive Product Button Border Color */
    .woocommerce ul.products li.product a.button { border-color: <?php echo esc_html( $pofo_product_archive_product_button_border_color ); ?> !important; }
    .woocommerce a.added_to_cart { border-color: <?php echo esc_html( $pofo_product_archive_product_button_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_button_hover_color ) : ?>
    /* Archive Product Button Hover Color */
    .woocommerce ul.products li.product a.button:hover { color: <?php echo esc_html( $pofo_product_archive_product_button_hover_color ); ?> !important; }
    .woocommerce a.added_to_cart { color: <?php echo esc_html( $pofo_product_archive_product_button_hover_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_product_archive_product_button_hover_bg_color ) : ?>
    /* Archive Product Button Hover Background Color */
    .woocommerce ul.products li.product a.button:hover { background-color: <?php echo esc_html( $pofo_product_archive_product_button_hover_bg_color ); ?> 
        !important; }
    .woocommerce a.added_to_cart { background-color: <?php echo esc_html( $pofo_product_archive_product_button_hover_bg_color ); ?> 
        !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_font_size ) : ?>
    /* Product Sale Font Size */
    .single-product .product > .onsale { font-size: <?php echo esc_html( $pofo_single_product_sale_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_line_height ) : ?>
    /* Product Sale Line Height */
    .single-product .product > .onsale { line-height: <?php echo esc_html( $pofo_single_product_sale_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_font_weight ) : ?>
    /* Product Sale Font Weight */
    .single-product .product > .onsale { font-weight: <?php echo esc_html( $pofo_single_product_sale_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_color ) : ?>
    /* Product Sale Color */
    .single-product .product > .onsale { color: <?php echo esc_html( $pofo_single_product_sale_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_bg_color ) : ?>
    /* Product Sale Background Color */
    .single-product .product > .onsale { background-color: <?php echo esc_html( $pofo_single_product_sale_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_enable_border != '1' ) : ?>
    /* Product Sale Border None */
    .single-product .product > .onsale { border: none !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_enable_border == '1' && $pofo_single_product_sale_border_size ) : ?>
    /* Product Sale Border Size */
    .single-product .product > .onsale { border-width: <?php echo esc_html( $pofo_single_product_sale_border_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_enable_border == '1' && $pofo_single_product_sale_border_type ) : ?>
    /* Product Sale Border Style */
    .single-product .product > .onsale { border-style: <?php echo esc_html( $pofo_single_product_sale_border_type ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_enable_border == '1' && $pofo_single_product_sale_border_color ) : ?>
    /* Product Sale Border Color */
    .single-product .product > .onsale { border-color: <?php echo esc_html( $pofo_single_product_sale_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_sale_border_radius ) : ?>
    /* Product Sale Border Size */
    .single-product .product > .onsale { border-radius: <?php echo esc_html( $pofo_single_product_sale_border_radius ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_font_size ) : ?>
    /* Product Title Font Size */
    .single-product .product .summary .product_title { font-size: <?php echo esc_html( $pofo_single_product_page_title_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_line_height ) : ?>
    /* Product Title Line Height */
    .single-product .product .summary .product_title { line-height: <?php echo esc_html( $pofo_single_product_page_title_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_letter_spacing ) : ?>
    /* Product Title Letter Spacing */
    .single-product .product .summary .product_title { letter-spacing: <?php echo esc_html( $pofo_single_product_page_title_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_font_weight ) : ?>
    /* Product Title Font Weight */
    .single-product .product .summary .product_title { font-weight: <?php echo esc_html( $pofo_single_product_page_title_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_font_italic == '1' ) : ?>
    /* Product Title Font Italic */
    .single-product .product .summary .product_title { font-style: italic !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_font_underline == '1' ) : ?>
    /* Product Title Font Underline */
    .single-product .product .summary .product_title { text-decoration: underline !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_title_color ) : ?>
    /* Product Title Color */
    .single-product .product .summary .product_title { color: <?php echo esc_html( $pofo_single_product_page_title_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_rating_star_color ) : ?>
    /* Product Rating Star Color */
    .single-product .product .summary .star-rating span { color: <?php echo esc_html( $pofo_single_product_rating_star_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_price_font_size ) : ?>
    /* Product Price Font Size */
    .single-product .product .summary .price, .single-product .product .summary .price ins { font-size: <?php echo esc_html( $pofo_single_product_price_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_price_line_height ) : ?>
    /* Product Price Line Height */
    .single-product .product .summary .price, .single-product .product .summary .price ins { line-height: <?php echo esc_html( $pofo_single_product_price_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_price_font_weight ) : ?>
    /* Product Price Font Weight */
    .single-product .product .summary .price, .single-product .product .summary .price ins { font-weight: <?php echo esc_html( $pofo_single_product_price_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_price_color ) : ?>
    /* Product Price Color */
    .single-product .product .summary .price, .single-product .product .summary .price ins { color: <?php echo esc_html( $pofo_single_product_price_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_regular_price_color ) : ?>
    /* Product Regular Price Color */
    .single-product .product .summary .price del { color: <?php echo esc_html( $pofo_single_product_regular_price_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_short_description_font_size ) : ?>
    /* Product Short Description Font Size */
    .single-product .product .summary .woocommerce-product-details__short-description { font-size: <?php echo esc_html( $pofo_single_product_short_description_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_short_description_line_height ) : ?>
    /* Product Short Description Line Height */
    .single-product .product .summary .woocommerce-product-details__short-description { line-height: <?php echo esc_html( $pofo_single_product_short_description_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_short_description_letter_spacing ) : ?>
    /* Product Short Description Letter Spacing */
    .single-product .product .summary .woocommerce-product-details__short-description { letter-spacing: <?php echo esc_html( $pofo_single_product_short_description_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_short_description_font_weight ) : ?>
    /* Product Short Description Font Weight */
    .single-product .product .summary .woocommerce-product-details__short-description { font-weight: <?php echo esc_html( $pofo_single_product_short_description_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_short_description_color ) : ?>
    /* Product Short Description Color */
    .single-product .product .summary .woocommerce-product-details__short-description { color: <?php echo esc_html( $pofo_single_product_short_description_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_font_size ) : ?>
    /* Product Stock Font Size */
    .single-product .product .summary .stock { font-size: <?php echo esc_html( $pofo_single_product_stock_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_line_height ) : ?>
    /* Product Stock Line Height */
    .single-product .product .summary .stock { line-height: <?php echo esc_html( $pofo_single_product_stock_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_font_weight ) : ?>
    /* Product Stock Font Weight */
    .single-product .product .summary .stock { font-weight: <?php echo esc_html( $pofo_single_product_stock_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_letter_spacing ) : ?>
    /* Product Stock Letter Spacing */
    .single-product .product .summary .stock { letter-spacing: <?php echo esc_html( $pofo_single_product_stock_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_color ) : ?>
    /* Product Stock Color */
    .single-product .product .summary .stock.in-stock { color: <?php echo esc_html( $pofo_single_product_stock_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_out_of_stock_color ) : ?>
    /* Product Out Of Stock Color */
    .single-product .product .summary .stock.out-of-stock { color: <?php echo esc_html( $pofo_single_product_out_of_stock_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_bg_color ) : ?>
    /* Product Stock Background Color */
    .single-product .product .summary p.stock { background-color: <?php echo esc_html( $pofo_single_product_stock_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_enable_border != '1' ) : ?>
    /* Product Stock Border None */
    .single-product .product .summary .stock { border: none !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_enable_border == '1' && $pofo_single_product_stock_border_size ) : ?>
    /* Product Stock Border Size */
    .single-product .product .summary .stock { border-width: <?php echo esc_html( $pofo_single_product_stock_border_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_enable_border == '1' && $pofo_single_product_stock_border_type ) : ?>
    /* Product Stock Border Style */
    .single-product .product .summary .stock { border-style: <?php echo esc_html( $pofo_single_product_stock_border_type ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_enable_border == '1' && $pofo_single_product_stock_border_color ) : ?>
    /* Product Stock Border Color */
    .single-product .product .summary .stock.in-stock { border-color: <?php echo esc_html( $pofo_single_product_stock_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_stock_enable_border == '1' && $pofo_single_product_out_of_stock_border_color ) : ?>
    /* Product Out Of Stock Border Color */
    .single-product .product .summary .stock.out-of-stock { border-color: <?php echo esc_html( $pofo_single_product_out_of_stock_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_button_color ) : ?>
    /* Product Button Color */
    .single-product .product .summary .button { color: <?php echo esc_html( $pofo_single_product_button_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_button_bg_color ) : ?>
    /* Product Button Background Color */
    .single-product .product .summary .button { background-color: <?php echo esc_html( $pofo_single_product_button_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_button_border_color ) : ?>
    /* Product Button Border Color */
    .single-product .product .summary .button { border-color: <?php echo esc_html( $pofo_single_product_button_border_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_button_hover_color ) : ?>
    /* Product Button Hover Color */
    .single-product .product .summary .button:hover { color: <?php echo esc_html( $pofo_single_product_button_hover_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_button_hover_bg_color ) : ?>
    /* Product Button Hover Background Color */
    .single-product .product .summary .button:hover { background-color: <?php echo esc_html( $pofo_single_product_button_hover_bg_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_font_size ) : ?>
    /* Product Meta Font Size */
    .single-product .product .summary .product_meta { font-size: <?php echo esc_html( $pofo_single_product_page_meta_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_line_height ) : ?>
    /* Product Meta Line Height */
    .single-product .product .summary .product_meta { line-height: <?php echo esc_html( $pofo_single_product_page_meta_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_letter_spacing ) : ?>
    /* Product Meta Letter Spacing */
    .single-product .product .summary .product_meta { letter-spacing: <?php echo esc_html( $pofo_single_product_page_meta_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_font_weight ) : ?>
    /* Product Meta Font Weight */
    .single-product .product .summary .product_meta, .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku { font-weight: <?php echo esc_html( $pofo_single_product_page_meta_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_heading_color ) : ?>
    /* Product Meta Heading Color */
    .single-product .product .summary .product_meta { color: <?php echo esc_html( $pofo_single_product_page_meta_heading_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_social_icon_color ) : ?>
    /* Product Meta Social Icon Color */
    .single-product .product .summary .product_meta .products-social-icon a { color: <?php echo esc_html( $pofo_single_product_page_meta_social_icon_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_color ) : ?>
    /* Product Meta Color */
    .woocommerce div.product .product_meta a, .single-product .product .summary .product_meta .sku, .woocommerce div.product form.cart .variations label, .woocommerce div.product form.cart .reset_variations { color: <?php echo esc_html( $pofo_single_product_page_meta_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_meta_link_hover_color ) : ?>
    /* Product Meta Link Hover Color */
    .woocommerce div.product .product_meta a:hover { color: <?php echo esc_html( $pofo_single_product_page_meta_link_hover_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_font_size ) : ?>
    /* Product Tab Font Size */
    .single-product .product .woocommerce-tabs ul.tabs li a { font-size: <?php echo esc_html( $pofo_single_product_page_tab_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_line_height ) : ?>
    /* Product Tab Line Height */
    .single-product .product .woocommerce-tabs ul.tabs li a { line-height: <?php echo esc_html( $pofo_single_product_page_tab_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_letter_spacing ) : ?>
    /* Product Tab Letter Spacing */
    .single-product .product .woocommerce-tabs ul.tabs li a { letter-spacing: <?php echo esc_html( $pofo_single_product_page_tab_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_font_weight ) : ?>
    /* Product Tab Font Weight */
    .single-product .product .woocommerce-tabs ul.tabs li a { font-weight: <?php echo esc_html( $pofo_single_product_page_tab_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_color ) : ?>
    /* Product Tab Color */
    .single-product .product .woocommerce-tabs ul.tabs li a { color: <?php echo esc_html( $pofo_single_product_page_tab_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_page_tab_active_color ) : ?>
    /* Product Active Tab Color */
    .single-product .product .woocommerce-tabs ul.tabs li.active a { color: <?php echo esc_html( $pofo_single_product_page_tab_active_color ); ?> !important; }
    .single-product .product .woocommerce-tabs ul.tabs li.active { border-top-color: <?php echo esc_html( $pofo_single_product_page_tab_active_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_font_size ) : ?>
    /* Related Product Heading Font Size */
    .woocommerce .related > h2 { font-size: <?php echo esc_html( $pofo_single_product_related_product_heading_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_line_height ) : ?>
    /* Related Product Heading Line Height */
    .woocommerce .related > h2 { line-height: <?php echo esc_html( $pofo_single_product_related_product_heading_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_letter_spacing ) : ?>
    /* Related Product Heading Letter Spacing */
    .woocommerce .related > h2 { letter-spacing: <?php echo esc_html( $pofo_single_product_related_product_heading_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_font_weight ) : ?>
    /* Related Product Heading Font Weight */
    .woocommerce .related > h2 { font-weight: <?php echo esc_html( $pofo_single_product_related_product_heading_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_font_italic == '1' ) : ?>
    /* Related Product Heading Font Italic */
    .woocommerce .related > h2 { font-style: italic !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_font_underline == '1' ) : ?>
    /* Related Product Heading Font Underline */
    .woocommerce .related > h2 { text-decoration: underline !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_related_product_heading_color ) : ?>
    /* Related Product Heading Color */
    .woocommerce .related > h2 { color: <?php echo esc_html( $pofo_single_product_related_product_heading_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_font_size ) : ?>
    /* Up Sells Product Heading Font Size */
    .woocommerce .up-sells > h2 { font-size: <?php echo esc_html( $pofo_single_product_up_sells_product_heading_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_line_height ) : ?>
    /* Up Sells Product Heading Line Height */
    .woocommerce .up-sells > h2 { line-height: <?php echo esc_html( $pofo_single_product_up_sells_product_heading_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_letter_spacing ) : ?>
    /* Up Sells Product Heading Letter Spacing */
    .woocommerce .up-sells > h2 { letter-spacing: <?php echo esc_html( $pofo_single_product_up_sells_product_heading_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_font_weight ) : ?>
    /* Up Sells Product Heading Font Weight */
    .woocommerce .up-sells > h2 { font-weight: <?php echo esc_html( $pofo_single_product_up_sells_product_heading_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_font_italic == '1' ) : ?>
    /* Up Sells Product Heading Font Italic */
    .woocommerce .up-sells > h2 { font-style: italic !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_font_underline == '1' ) : ?>
    /* Up Sells Product Heading Font Underline */
    .woocommerce .up-sells > h2 { text-decoration: underline !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_up_sells_product_heading_color ) : ?>
    /* Up Sells Product Heading Color */
    .woocommerce .up-sells > h2 { color: <?php echo esc_html( $pofo_single_product_up_sells_product_heading_color ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_font_size ) : ?>
    /* Cross Sells Product Heading Font Size */
    .woocommerce .cross-sells > h2 { font-size: <?php echo esc_html( $pofo_single_product_cross_sells_product_heading_font_size ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_line_height ) : ?>
    /* Cross Sells Product Heading Line Height */
    .woocommerce .cross-sells > h2 { line-height: <?php echo esc_html( $pofo_single_product_cross_sells_product_heading_line_height ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_letter_spacing ) : ?>
    /* Cross Sells Product Heading Letter Spacing */
    .woocommerce .cross-sells > h2 { letter-spacing: <?php echo esc_html( $pofo_single_product_cross_sells_product_heading_letter_spacing ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_font_weight ) : ?>
    /* Cross Sells Product Heading Font Weight */
    .woocommerce .cross-sells > h2 { font-weight: <?php echo esc_html( $pofo_single_product_cross_sells_product_heading_font_weight ); ?> !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_font_italic == '1' ) : ?>
    /* Cross Sells Product Heading Font Italic */
    .woocommerce .cross-sells > h2 { font-style: italic !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_font_underline == '1' ) : ?>
    /* Cross Sells Product Heading Font Underline */
    .woocommerce .cross-sells > h2 { text-decoration: underline !important; }
    <?php endif; ?>

    <?php if( $pofo_single_product_cross_sells_product_heading_color ) : ?>
    /* Cross Sells Product Heading Color */
    .woocommerce .cross-sells > h2 { color: <?php echo esc_html( $pofo_single_product_cross_sells_product_heading_color ); ?> !important; }
    <?php endif; ?>

<?php }/* if WooCommerce plugin is activated */ ?>

<?php if( is_single() ) { ?>
    <?php if( $pofo_main_top_section_space ) { ?>
        .single-post-main-section { padding-top: <?php echo esc_html( $pofo_main_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_main_bottom_section_space ) { ?>
        .single-post-main-section { padding-bottom: <?php echo esc_html( $pofo_main_bottom_section_space ) ?>; }
    <?php } ?>
<?php }/* Single post content top and bottom section space */ ?>

<?php /* Title top and bottom space style start */
    if( class_exists( 'WooCommerce' ) && (is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ) { ?>

    <?php if( $pofo_product_archive_title_top_section_space ) { ?>
        .pofo-product-archive-title-bg { padding-top: <?php echo esc_html( $pofo_product_archive_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_product_archive_title_bottom_section_space ) { ?>
        .pofo-product-archive-title-bg { padding-bottom: <?php echo esc_html( $pofo_product_archive_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( class_exists( 'WooCommerce' ) && is_product() ) { ?>

    <?php if( $pofo_single_product_title_top_section_space ) { ?>
        .pofo-single-product-title-bg { padding-top: <?php echo esc_html( $pofo_single_product_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_single_product_title_bottom_section_space ) { ?>
        .pofo-single-product-title-bg { padding-bottom: <?php echo esc_html( $pofo_single_product_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( is_tax('portfolio-category') || is_tax('portfolio-tags') || is_post_type_archive('portfolio') ) { ?>

    <?php if( $pofo_portfolio_archive_title_top_section_space ) { ?>
        .pofo-portfolio-archive-title-bg { padding-top: <?php echo esc_html( $pofo_portfolio_archive_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_portfolio_archive_title_bottom_section_space ) { ?>
        .pofo-portfolio-archive-title-bg { padding-bottom: <?php echo esc_html( $pofo_portfolio_archive_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( is_search() || is_category() || is_archive() ) { ?>

    <?php if( $pofo_archive_title_top_section_space ) { ?>
        .pofo-archive-title-bg { padding-top: <?php echo esc_html( $pofo_archive_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_archive_title_bottom_section_space ) { ?>
        .pofo-archive-title-bg { padding-bottom: <?php echo esc_html( $pofo_archive_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( is_home() ) { ?>

    <?php if( $pofo_default_title_top_section_space ) { ?>
        .pofo-default-title-bg { padding-top: <?php echo esc_html( $pofo_default_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_default_title_bottom_section_space ) { ?>
        .pofo-default-title-bg { padding-bottom: <?php echo esc_html( $pofo_default_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( is_singular( 'portfolio' ) ) { ?>

    <?php if( $pofo_single_portfolio_title_top_section_space ) { ?>
        .pofo-single-portfolio-title-bg { padding-top: <?php echo esc_html( $pofo_single_portfolio_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_single_portfolio_title_bottom_section_space ) { ?>
        .pofo-single-portfolio-title-bg { padding-bottom: <?php echo esc_html( $pofo_single_portfolio_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } elseif( is_singular( 'post' ) ) { ?>

    <?php if( $pofo_single_post_title_top_section_space ) { ?>
        .pofo-single-post-title-bg { padding-top: <?php echo esc_html( $pofo_single_post_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_single_post_title_bottom_section_space ) { ?>
        .pofo-single-post-title-bg { padding-bottom: <?php echo esc_html( $pofo_single_post_title_bottom_section_space ) ?>; }
    <?php } ?>
    
<?php } else { ?>

    <?php if( $pofo_page_title_top_section_space ) { ?>
        .pofo-page-title-bg { padding-top: <?php echo esc_html( $pofo_page_title_top_section_space ) ?>; }
    <?php } ?>
    <?php if( $pofo_page_title_bottom_section_space ) { ?>
        .pofo-page-title-bg { padding-bottom: <?php echo esc_html( $pofo_page_title_bottom_section_space ) ?>; }
    <?php } ?>

<?php }/* Title top and bottom space style end */ ?>
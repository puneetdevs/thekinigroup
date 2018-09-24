<?php
/**
 * The template for displaying the footer
 *
 * @package Pofo
 */
?>
<?php

	// Exit if accessed directly.
	if ( !defined( 'ABSPATH' ) ) { exit; }
	
	$pofo_box_layout = pofo_option( 'pofo_enable_box_layout', '' );
	if( $pofo_box_layout == '1' ) {
		echo '</div><!-- .box-layout -->';
	}

	// Enable / Disable Footer Wrapper
	$pofo_disable_footer_wrapper = pofo_option( 'pofo_disable_footer_wrapper', '0' );
	// Enable / Disable Footer
	$pofo_disable_footer = pofo_option( 'pofo_disable_footer', '1' );
	// Enable / Disable Footer Bottom
	$pofo_disable_footer_bottom = pofo_option( 'pofo_disable_footer_bottom', '1' );

	if( $pofo_disable_footer_wrapper == 1 || $pofo_disable_footer == 1 || $pofo_disable_footer_bottom == 1 ){
		echo '<footer id="colophon" class="pofo-footer bg-extra-dark-gray site-footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">';
			if( $pofo_disable_footer_wrapper == 1 ):
				get_template_part( 'templates/footer/footer-wrapper-content' );
			endif;
			if( $pofo_disable_footer == 1 ):
				get_template_part( 'templates/footer/content' );
			endif;
			if( $pofo_disable_footer_bottom == 1 ):
				get_template_part( 'templates/footer/footer-bottom-content' );
			endif;
		echo '</footer>';
	}

	$pofo_header_layout = pofo_option( 'pofo_header_type', 'headertype1' );
	if( $pofo_header_layout == 'headertype3' ) {
		echo '</div>';
	}

	$pofo_hide_scroll_to_top = get_theme_mod( 'pofo_hide_scroll_to_top', '1' );
	if( $pofo_hide_scroll_to_top == 1 ){
		echo '<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>';
	}

	wp_footer();
?>
</body>
</html>
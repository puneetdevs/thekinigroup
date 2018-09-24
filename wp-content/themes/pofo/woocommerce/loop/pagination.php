<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.1
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<div class=" text-center clear-both float-left width-100">
	<div class="woocommerce-pagination text-small text-uppercase text-extra-dark-gray pagination">
		<?php
			echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
				'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
				'format'       => '',
				'add_args'     => false,
				'current'      => max( 1, get_query_var( 'paged' ) ),
				'total'        => $wp_query->max_num_pages,
                'prev_text'    => '<i class="fas fa-long-arrow-alt-left margin-5px-right"></i> <span class="xs-display-none border-none">'.esc_html( 'Prev','pofo').'</span>',
                'next_text'    => '<span class="xs-display-none border-none">'.esc_html( 'Next', 'pofo').'</span> <i class="fas fa-long-arrow-alt-right margin-5px-left"></i>',
                'type'         => 'plain',
				'end_size'     => 2,
				'mid_size'     => 2,
			) ) );
		?>
	</div>
</div>
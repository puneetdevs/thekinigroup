<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

get_header( 'shop' ); ?>

<?php

    $pofo_single_product_content_container_fluid = pofo_option( 'pofo_single_product_container_style', 'container' );

    /* For page sidebar and content */
    echo '<section>';
        echo '<div class="'.esc_attr( $pofo_single_product_content_container_fluid ).'">';
            echo '<div class="row">';

                /* Start sidebar Div */
                wc_get_template_part( 'content', 'before-product' );
?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php

                /* End sidebar Div*/
				wc_get_template_part( 'content', 'after-product' );
                
            echo '</div>';
        echo '</div>';
    echo '</section>';
?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

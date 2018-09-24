<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "header" tag.
 *
 * @package Pofo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!-- keywords -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">	
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <!-- viewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php
    
    	$pofo_box_layout = pofo_option( 'pofo_enable_box_layout', '' );
		if( $pofo_box_layout == '1' ) {
			echo '<div class="box-layout">';
		}
    
		$pofo_header_layout = pofo_option( 'pofo_header_type', 'headertype1' );
		get_template_part( 'templates/header/header' );

		if( $pofo_header_layout == 'headertype3' ) {
			echo '<div class="sidebar-wrapper mobile-height">';
		}

		if( class_exists( 'WooCommerce' ) && (is_product_category() || is_product_tag() || is_tax( 'product_brand' ) || is_shop() ) ){// if WooCommerce plugin is activated and WooCommerce category, brand, shop page
	        get_template_part('templates/page-title/product-archive-title');
	    } elseif( class_exists( 'WooCommerce' ) && is_product() ) {// if WooCommerce plugin is activated and WooCommerce product page
	    	get_template_part('templates/page-title/product-title');
	    } elseif( is_tax('portfolio-category') || is_tax('portfolio-tags') || is_post_type_archive('portfolio') ){// if Portfolio category, tag, archive page
			get_template_part( 'templates/page-title/portfolio-taxonomy-title' );
		} elseif( is_search() || is_category() || is_archive() ){// if Post category, tag, archive page
			get_template_part( 'templates/page-title/archive-title' );
		} elseif( is_home() ){// if Home page
			get_template_part( 'templates/page-title/default-title' );
		} else{
			get_template_part( 'templates/page-title/title' );
		}
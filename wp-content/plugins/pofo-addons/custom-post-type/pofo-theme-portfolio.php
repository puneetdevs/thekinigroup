<?php
/**
 * Register Custom Post Type Portfolio.
 *
 * @package Pofo
 */
?>
<?php
/**
 * Portfolio custom post type
 */
$pofo_options = get_option( 'pofo_theme_setting' );

$labels = array(
	'name'               => _x( 'Portfolio', 'Projects','pofo-addons' ),
	'singular_name'      => _x( 'Portfolio', 'Project','pofo-addons' ),
	'add_new'            => _x( 'Add New', 'Project','pofo-addons' ),
	'add_new_item'       => __( 'Add New Project','pofo-addons' ),
	'edit_item'          => __( 'Edit Project','pofo-addons' ),
	'new_item'           => __( 'New Project','pofo-addons' ),
	'all_items'          => __( 'All Projects','pofo-addons' ),
	'view_item'          => __( 'View Project','pofo-addons' ),
	'search_items'       => __( 'Search Projects','pofo-addons' ),
	'not_found'          => __( 'No Projects found','pofo-addons' ),
	'not_found_in_trash' => __( 'No Projects found in the Trash','pofo-addons' ),
	'parent_item_colon'  => '',
	'menu_name'          => __('Portfolio', 'pofo-addons' )
);
$args = array(
	'labels'        => $labels,
	'description'   => __('Holds our products and product specific data', 'pofo-addons' ),
	'public'        => true,
	'menu_icon'     => 'dashicons-portfolio',
	'menu_position' => 21,
	'supports'      => array( 'title', 'thumbnail', 'editor', 'excerpt', 'post-formats', 'comments', 'revisions', 'page-attributes' ),
	'has_archive'   => true,
	'hierarchical' => true,
);

$pofo_portfolio_url_slug = get_theme_mod( 'pofo_portfolio_url_slug', '' );

if( !empty( $pofo_portfolio_url_slug ) ) {
	$args[ 'rewrite' ] = array( 'slug' => trim( $pofo_portfolio_url_slug ) );
}
register_post_type( 'portfolio', $args );

/**
 * Portflio Category
 */
$labels = array(
	'name'              => _x( 'Categories', 'taxonomy general name', 'pofo-addons' ),
	'singular_name'     => _x( 'Category', 'taxonomy singular name', 'pofo-addons' ),
	'search_items'      => __( 'Search categories', 'pofo-addons' ),
	'all_items'         => __( 'All Categories', 'pofo-addons' ),
	'parent_item'       => __( 'Parent Category', 'pofo-addons' ),
	'parent_item_colon' => __( 'Parent Category:', 'pofo-addons' ),
	'edit_item'         => __( 'Edit Category', 'pofo-addons' ),
	'update_item'       => __( 'Update Category', 'pofo-addons' ),
	'add_new_item'      => __( 'Add New Category', 'pofo-addons' ),
	'new_item_name'     => __( 'New Category Name', 'pofo-addons' ),
	'menu_name'         => __( 'Categories' ),
);
$args = array( 'labels' => $labels, 'hierarchical' => true, 'show_admin_column' => true );

$pofo_portfolio_cat_url_slug = get_theme_mod( 'pofo_portfolio_cat_url_slug', '' );
if( !empty( $pofo_portfolio_cat_url_slug ) ) {
	$args[ 'rewrite' ] = array( 'slug' => trim( $pofo_portfolio_cat_url_slug ) );
}
register_taxonomy( 'portfolio-category', 'portfolio', $args );

/**
 * Portflio Tag
 */

$args = array('hierarchical' => false, 'label' => 'Tags', 'query_var' => true, 'rewrite' => true);

$pofo_portfolio_tags_url_slug = get_theme_mod( 'pofo_portfolio_tags_url_slug', '' );
if( !empty( $pofo_portfolio_tags_url_slug ) ) {
	$args[ 'rewrite' ] = array( 'slug' => trim( $pofo_portfolio_tags_url_slug ) );
}
register_taxonomy( 'portfolio-tags', 'portfolio', $args );
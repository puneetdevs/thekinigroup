<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Pofo
 */

get_header();

	// Include the page content template.
	get_template_part( 'templates/page-not-found/content' );

// End the loop.
get_footer();
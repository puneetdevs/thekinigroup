<?php
/**
 * Template for displaying search forms
 *
 * @package Pofo
 */

?>

<?php
	$pofo_unique_id = esc_attr( uniqid( 'search-form-' ) );
	$pofo_search_placeholder_text = get_theme_mod( 'pofo_search_placeholder_text', 'Enter your keywords...' );
?>

<form role="search" method="get" class="navbar-form no-padding search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group add-on">
        <input class="form-control" id="<?php echo esc_attr( $pofo_unique_id );?>" placeholder="<?php echo esc_html( $pofo_search_placeholder_text ); ?>" name="s" value="<?php echo get_search_query(); ?>" type="text" autocomplete="off">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
    </div>
</form>
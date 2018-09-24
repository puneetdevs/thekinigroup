<?php
/**
 * Customizer Control: Custom Sidebars
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

if( class_exists('WP_Customize_Control') ) {

	if( !class_exists( 'Pofo_Customize_Custom_Sidebars' ) ) {

		class Pofo_Customize_Custom_Sidebars extends WP_Customize_Control {

		    /**
		     * The type of customize control being rendered.
		     *
		     * @since  1.0.0
		     * @access public
		     * @var    string
		    */
		    public $type = 'pofo_custom_sidebar';
			public function render_content()
			{
			    ?>
			    <?php if ( !empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>

		        <?php if ( !empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <?php endif; ?>

			    <div id="pofo_field_add_sidebar">			   
				    <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>">
			    </div>
			    <ul id="add_li" class="add-custom-text-box"></ul>
			    <input type="button" class="button button-primary add_more_sidebar" name="add_more_sidebar" value="<?php echo esc_html( 'Add More', 'pofo' ); ?>">
			    <?php
			}
		}
	}
}
<?php
/**
 * Customizer Control: Multiple Checkbox
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

if( class_exists('WP_Customize_Control') ) {

	if( !class_exists( 'Pofo_Customize_Checkbox_Multiple' ) ) {

		class Pofo_Customize_Checkbox_Multiple extends WP_Customize_Control {

		    public $type = 'pofo_checkbox_multiple';

		   
		    public function render_content() {

		        if ( empty( $this->choices ) ) {
		            return;
		        }
		        ?>

		        <?php if ( !empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>

		        <?php if ( !empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo wp_kses($this->description, wp_kses_allowed_html( 'post' )); ?></span>
		        <?php endif; ?>

		        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		        <ul>
		            <?php foreach ( $this->choices as $value => $label ) : ?>

		                <li>
		                    <label>
		                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
		                        <?php echo esc_html( $label ); ?>
		                    </label>
		                </li>

		            <?php endforeach; ?>
		        </ul>

		        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
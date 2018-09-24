<?php
/**
 * Customizer Control: Social Icons
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

if( class_exists( 'WP_Customize_Control' ) ) {

	if( !class_exists( 'Pofo_Customize_Social_Icons' ) ) {

		class Pofo_Customize_Social_Icons extends WP_Customize_Control {

		    public $type = 'pofo_social_icons';

		    public function render_content() {

		        if ( empty( $this->choices ) )
		            return; ?>

		        <?php if ( !empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>

		        <?php if ( !empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <?php endif; ?>

		        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		        <ul class="pofo-social-icon-list">
		        	
		            <?php $i = $j = 0; 
		            	foreach ( $this->choices as $value => $label ) : 
		            ?>
			                <li>
			                    <label>
			                    	<?php 
			                    	if(in_array( $value, $multi_values )){
			                    		$data_val = $multi_values[$j+1];
			                    		$data_label = $multi_values[$j+2];
			                    		$val = $multi_values[$j];
			                    	}else{
			                    		$data_val = $value;
			                    		$data_label = $label;
			                    		$val = '';
			                    	}
			                    	?>
			                    	<span><?php echo esc_html( $data_label ); ?></span>
			                        <input type="text" id="social-icons-<?php echo esc_html($i) ?>" class="customize-control-textbox" data-value="<?php echo esc_html($data_val) ?>" data-label="<?php echo esc_html($data_label) ?>" value="<?php echo esc_html($val) ?>"/>
			                        <img src="<?php echo POFO_THEME_IMAGES_URI ?>/move-icon.png" class="icon-move" alt="<?php echo esc_attr__( 'Move', 'pofo' ) ?>"> 
			                    </label>
			                </li>
		            <?php 	$i++; 
			            	if(in_array( $value, $multi_values )){
			            		$j = $j+3;
			            	}
		            	endforeach;
		            ?>
		        </ul>
		        <input type="hidden" class="pofo-footer-social-icon-list" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
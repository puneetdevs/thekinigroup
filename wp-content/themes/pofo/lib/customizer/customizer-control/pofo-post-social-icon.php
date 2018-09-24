<?php
/**
 * Customizer Control: Social Icons
 *
 * @package Pofo
 */

// Exit if accessed directly.
if ( !defined( 'ABSPATH' ) ) { exit; }

if( class_exists('WP_Customize_Control') ) {

	if( !class_exists( 'Pofo_Post_Customize_Social_Icons' ) ) {

		class Pofo_Post_Customize_Social_Icons extends WP_Customize_Control {

		    public $type = 'pofo_post_social_icons';

		    public function render_content() {

		    	$arr = array();
		        if ( empty( $this->choices ) ) {
		            return;
		        }
		        ?>

		        <?php if ( !empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>

		        <?php if ( !empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		        <?php endif; ?>

		        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		        <ul class="pofo-post-social-icon-list">
		        	
		            <?php $i = $j = 0;
		            	foreach ( $this->choices as $value => $label ) : 
		            ?>
			                <li>
			                    <label>
			                    	<?php 
			                    	if(in_array( $value, $multi_values )){
			                    		$val = $multi_values[$j];
			                    		$val_checked = $multi_values[$j+1];
			                    		$checked = ($val_checked == '1') ? 'checked' : '';
			                    		$data_label = $multi_values[$j+2];
			                    	}else{
			                    		$val = $value;
			                    		$val_checked = '0';
			                    		$checked = '';
			                    		$data_label = $label;
			                    	}
			                    	?>
			                    	<input type="checkbox" <?php echo esc_html( $checked ); ?> id="post-social-icons-status-<?php echo esc_html($i) ?>" class="customize-control-checkbox-social" value="<?php echo esc_html($val_checked); ?>">
			                        <input type="text" id="post-social-icons-<?php echo esc_html($i) ?>" class="customize-control-textbox-social <?php echo esc_html($val) ?>" value="<?php echo esc_html($data_label) ?>" data-value="<?php echo esc_html($val) ?>" data-label="<?php echo esc_html($data_label) ?>" readonly />
			                        <img src="<?php echo POFO_THEME_IMAGES_URI ?>/move-icon.png" class="icon-move" alt="<?php echo esc_attr__( 'Move', 'pofo' ) ?>"> 
			                    </label>
			                </li>
			            <?php 
			            	$i++;
			            	if(in_array( $value, $multi_values )){
			            		$j = $j+3;
			            	}            
			            endforeach;
			            ?>
		        </ul>
		        <input type="hidden" class="pofo-post-social-icon-list" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		    <?php }
		}
	}
}
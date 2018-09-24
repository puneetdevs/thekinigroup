<?php
/**
 * @package Pofo
 */
?>
<?php

/*******************************************************************************/
/* Start About Me Widget */
/*******************************************************************************/

if (!class_exists('pofo_about_widget')) {

	class pofo_about_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'pofo_about_widget',
			esc_html__('Pofo - About Me', 'pofo-addons'),
			array( 'description' => esc_html__( 'Your site Author.', 'pofo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) 
		{
			
			$pofo_title = apply_filters( 'widget_title', $instance['title'] );

			// Before widget			
	        echo $args['before_widget'];

	        	// Display the widget title if one was input (before and after defined by themes).
	        	echo $args['before_title'] . esc_attr($pofo_title) . $args['after_title'];
	            $pofo_img_url = (isset($instance['author_image_link'])) ? $instance['author_image_link'] : '';
	            $pofo_discription = (isset($instance['short_description'])) ? $instance['short_description'] : '';
	            $pofo_about_author_button = (isset($instance['about_author_button'])) ? $instance['about_author_button'] : '';
	            $pofo_button_text = ($instance['button_text'] != "") ? $instance['button_text'] : 'About Author';

		    	// Content
		    	
		        echo '<div class="margin-25px-bottom xs-margin-15px-bottom">';
		        if( $pofo_about_author_button ){
			        echo '<a href="'.$pofo_about_author_button.'">';
			    }
			        echo '<img src="' . esc_url( $pofo_img_url ) . '" alt=""/>';
			    if( $pofo_about_author_button ){
			        echo '</a>';
			    }
			    echo '</div>';
	            echo '<p class="margin-20px-bottom text-small">'.esc_html($pofo_discription).'</p>';
	            if( $pofo_button_text || $pofo_about_author_button ){
	            	echo '<a class="btn btn-very-small btn-dark-gray text-uppercase" href="'.$pofo_about_author_button.'">'.$pofo_button_text.'</a>';
	        	}
	        // After widget
	        echo $args['after_widget'];

		}
			
		// Widget Backend 
		public function form( $instance ) 
		{ 
	           $defaults = array(
	          	'title'   				=> esc_html__( 'About Me', 'pofo-addons' ),
	          	'author_image_link' 	=> '',
	          	'short_description' 	=> '',
	          	'about_author_button'	=> '',
	          	'button_text' 			=> '',
	          	);
	        $instance = wp_parse_args( (array) $instance, $defaults );
	        
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'author_image_link' ); ?>"><?php esc_html_e( 'Author Image Url:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'author_image_link' ); ?>" name="<?php echo $this->get_field_name( 'author_image_link' ); ?>" type="url" value="<?php echo esc_attr( $instance['author_image_link']); ?>" />
			</p>			
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>"><?php esc_html_e( 'Short Description:', 'pofo-addons' ); ?></label>
	            <textarea name="<?php echo esc_attr( $this->get_field_name( 'short_description' ) ); ?>"  class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'short_description' ) ); ?>" ><?php echo esc_attr($instance['short_description']); ?></textarea>
	        </p>

	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'about_author_button' ) ); ?>"><?php esc_html_e( 'Button URL:', 'pofo-addons' ); ?></label>
	            <br>
	            <input class="widefat" type="url" id="<?php echo $this->get_field_id( 'about_author_button' ); ?>" name="<?php echo $this->get_field_name( 'about_author_button' ); ?>" value="<?php echo esc_attr( $instance['about_author_button']); ?>">
	        </p>

	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php esc_html_e( 'Button Text:', 'pofo-addons' ); ?></label>
	            <br>
	            <input type="text" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" value="<?php echo esc_attr( $instance['button_text']); ?>">
	        </p>
	   <?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['author_image_link'] = ( ! empty( $new_instance['author_image_link'] ) ) ? strip_tags( $new_instance['author_image_link'] ) : '';
			$instance['short_description'] = ( ! empty( $new_instance['short_description'] ) ) ? $new_instance['short_description'] : '';
			$instance['about_author_button'] = ( ! empty( $new_instance['about_author_button'] ) ) ? $new_instance['about_author_button'] : '';
			$instance['button_text'] = ( ! empty( $new_instance['button_text'] ) ) ? $new_instance['button_text'] : '';
		    return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'pofo_load_about_widget' ) ) :
	function pofo_load_about_widget() {
		
		register_widget( 'pofo_about_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_load_about_widget' );

/*******************************************************************************/
/* End About Me Widget */
/*******************************************************************************/
?>
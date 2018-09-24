<?php
/**
 * @package Pofo
 */
?>
<?php
/*******************************************************************************/
/* Start Custom Text Widget */
/*******************************************************************************/
if (!class_exists('pofo_custom_text_widget')) {
	class pofo_custom_text_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'pofo_custom_text_widget',
			esc_html__('Pofo - Custom Text', 'pofo-addons'),
			array( 'description' => esc_html__( 'Add a custom text to your sidebar.', 'pofo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';

			$text = apply_filters( 'widget_text', $widget_text, $instance, $this );

			echo $args['before_widget'];
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
				<div class="textwidget"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
			<?php
			echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) {
			
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
			$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
			$title = sanitize_text_field( $instance['title'] );
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html__('Title:', 'pofo-addons'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php esc_html__( 'Content:', 'pofo-addons' ); ?></label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

			<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php echo esc_html__('Automatically add paragraphs', 'pofo-addons'); ?></label></p>
			<?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['text'] = $new_instance['text'];
			} else {
				$instance['text'] = wp_kses_post( $new_instance['text'] );
			}
			$instance['filter'] = ! empty( $new_instance['filter'] );
			return $instance;
		}
	}
}
// Register and load the widget
if ( ! function_exists( 'pofo_load_widget_custom_text' ) ) :
	function pofo_load_widget_custom_text() {
		register_widget( 'pofo_custom_text_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_load_widget_custom_text' );

/*******************************************************************************/
/* End Custom Text Widget */
/*******************************************************************************/
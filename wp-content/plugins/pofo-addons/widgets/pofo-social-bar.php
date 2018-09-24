<?php
/**
 * @package Pofo
 */
?>
<?php

/*******************************************************************************/
/* Start Social Bar Widget */
/*******************************************************************************/

if (!class_exists('pofo_social_widget')) {

	class pofo_social_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'pofo_social_widget',
			esc_html__('Pofo - Social Icons', 'pofo-addons'),
			array( 'description' => esc_html__( 'Social Icons', 'pofo-addons' ), ) // args
			);
		}

		public function widget( $args, $instance ) 
		{
			
			$output = '';
			$social_data = array();

			$pofo_title = !empty( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
			$social_style= !empty( $instance['social_style'] ) ? $instance['social_style'] : '';

			$pofo_fb_url 	  = !empty( $instance['fb_url'] ) ? $social_data['facebook-f'] = 'fb_url' : '';
	        $pofo_tw_url 	  = !empty( $instance['tw_url'] ) ? $social_data['twitter'] = 'tw_url' : '';
	        $pofo_gp_url 	  = !empty( $instance['gp_url'] ) ? $social_data['google-plus-g'] = 'gp_url' : '';
	        $pofo_db_url 	  = !empty( $instance['db_url'] ) ? $social_data['dribbble'] = 'db_url' : '';
	        $pofo_li_url 	  = !empty( $instance['li_url'] ) ? $social_data['linkedin-in'] = 'li_url' : '';
			$pofo_ig_url 	  = !empty( $instance['ig_url'] ) ? $social_data['instagram'] = 'ig_url' : '';
			$pofo_tb_url 	  = !empty( $instance['tb_url'] ) ? $social_data['tumblr'] = 'tb_url' : '';
			$pofo_pi_url 	  = !empty( $instance['pi_url'] ) ? $social_data['pinterest-p'] = 'pi_url' : '';
			$pofo_yt_url 	  = !empty( $instance['yt_url'] ) ? $social_data['youtube'] = 'yt_url' : '';
			$pofo_vm_url 	  = !empty( $instance['vm_url'] ) ? $social_data['vimeo-v'] = 'vm_url' : '';
			$pofo_sc_url 	  = !empty( $instance['sc_url'] ) ? $social_data['soundcloud'] = 'sc_url' : '';
			$pofo_fk_url 	  = !empty( $instance['fk_url'] ) ? $social_data['flickr'] = 'fk_url' : '';
			$pofo_rss_url 	  = !empty( $instance['rss_url'] ) ? $social_data['rss'] = 'rss_url' : '';
			$pofo_rd_url 	  = !empty( $instance['rd_url'] ) ? $social_data['reddit'] = 'rd_url' : '';
			$pofo_bh_url 	  = !empty( $instance['bh_url'] ) ? $social_data['behance'] = 'bh_url' : '';
			$pofo_vine_url 	  = !empty( $instance['vine_url'] ) ? $social_data['vine'] = 'vine_url' : '';
			$pofo_gh_url 	  = !empty( $instance['gh_url'] ) ? $social_data['github'] = 'gh_url' : '';
			$pofo_xing_url 	  = !empty( $instance['xing_url'] ) ? $social_data['xing'] = 'xing_url' : '';
			$pofo_vk_url 	  = !empty( $instance['vk_url'] ) ? $social_data['vk'] = 'vk_url' : '';
			$pofo_yelp_url    = !empty( $instance['yelp_url'] ) ? $social_data['yelp'] = 'yelp_url' : '';
			$pofo_discord_url = !empty( $instance['discord_url'] ) ? $social_data['discord'] = 'discord_url' : '';
			$pofo_email_url   = !empty( $instance['email_url'] ) ? $social_data['envelope'] = 'email_url' : '';
			$pofo_sorted_data   = !empty( $instance['hidden_val'] ) ? explode( ',', $instance['hidden_val'] ) : '';

			// Before widget			
	        $output .= $args['before_widget'];

	        	// Display the widget title if one was input (before and after defined by themes).
	        	$output .= $args['before_title'] . esc_attr( $pofo_title ) . $args['after_title'];

		        if( !empty( $social_data ) ) {
		            $text_center = $social_style == 'social-icon-style-1' ? ' text-center' : '';
	            	$output .= '<div class="'.esc_attr( $social_style ).esc_attr( $text_center ).'">';
	                	$output .= '<ul class="extra-small-icon">';

	                		if( !empty( $pofo_sorted_data ) ){
		                		foreach ($pofo_sorted_data as $social_sorted) {
		                			if( !empty( $instance[$social_sorted] ) ){
			                			$key = array_search ($social_sorted, $social_data);
			                			if( $social_sorted == 'rss_url' || $social_sorted == 'email_url' ) {
		                                     $icon_class = 'fas fa-'.esc_html( $key );
		                                } else{
		                                    $icon_class = 'fab fa-'.esc_html( $key );
		                                }
		                                $output .= '<li><a class="'.esc_html( $key ).'" target="_blank" href="'.esc_url( $instance[$social_sorted] ).'"><i class="'.$icon_class.'"></i></a></li>';
		                            }
		                		}
		                	}else{
		                		foreach( $social_data as $key => $social_url ) {
	                    			if( $social_url == 'rss_url' || $social_url == 'email_url' ) {
	                                    $icon_class = 'fas fa-'.esc_html( $key );
	                                } else{
	                                    $icon_class = 'fab fa-'.esc_html( $key );
	                                }                       			
	                    			$output .= '<li><a class="'.esc_html( $key ).'" target="_blank" href="'.esc_url( $instance[$social_url] ).'"><i class="'.$icon_class.'"></i></a></li>';
                				}
		                	}

                			if( !empty( $pofo_custom_link ) ) :
                    			$output .= nl2br( rawurldecode( base64_decode( strip_tags( $pofo_custom_link ) ) ) );
                			endif;
            			$output .= '</ul>';
        			$output .= '</div>';
        		}

	        // After widget
	        $output .= $args['after_widget'];

	        echo $output;
		}
			
		// Widget Backend 
		public function form( $instance ) 
		{ 
	           	$defaults = array( 'title' => esc_html__( 'Follow US', 'pofo-addons' ), 'social_style' => 'social-icon-style-1', 'hidden_val' => '', 'fb_url' => '', 'tw_url' => '', 'gp_url' => '', 'db_url' => '', 'li_url' => '', 'ig_url' => '', 'tb_url' => '', 'pi_url' => '', 'yt_url' => '', 'vm_url' => '', 'sc_url' => '', 'fk_url' => '', 'rss_url' => '', 'rd_url' => '', 'bh_url' => '', 'vine_url' => '', 'gh_url' => '', 'xing_url' => '', 'vk_url' => '', 'email_url' => '', 'yelp_url' => '', 'discord_url' => '' );

	           	$social_array = array('fb_url' => 'Facebook URL', 'tw_url' => 'Twitter URL', 'gp_url' => 'Google+ URL', 'db_url' => 'Dribbble URL', 'li_url' => 'Linkedin URL', 'ig_url' => 'Instagram URL', 'tb_url' => 'Tumblr URL', 'pi_url' => 'Pinterest URL', 'yt_url' => 'YouTube URL', 'vm_url' => 'Vimeo URL', 'sc_url' => 'Soundcloud URL', 'fk_url' => 'Flickr URL', 'rss_url' => 'RSS URL', 'rd_url' => 'Reddit URL', 'bh_url' => 'Behance URL', 'vine_url' => 'Vine URL', 'gh_url' => 'GitHub URL', 'xing_url' => 'Xing URL', 'vk_url' => 'VK URL', 'yelp_url' => 'Yelp URL', 'discord_url' => 'Discord URL', 'email_url' => 'Email address');

	        	$instance = wp_parse_args( (array) $instance, $defaults );
	        	$social_style = !empty( $instance['social_style'] ) ? $instance['social_style'] : '';
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($instance['title'] ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'social_style' ); ?>">
					<?php esc_html_e( 'Style:', 'pofo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'social_style' ); ?>" class="widefat">
	                <option value="social-icon-style-1" <?php selected( 'social-icon-style-1', $social_style ) ?>><?php echo esc_html__( 'Blog style', 'pofo-addons' ); ?></option>
	                <option value="social-icon-style-8" <?php selected( 'social-icon-style-8', $social_style ) ?>><?php echo esc_html__( 'Header style', 'pofo-addons' ); ?></option>
				</select>
	        </p>
			<p>
				<input class="widefat social-bar-hidden-val" id="<?php echo $this->get_field_id( 'hidden_val' ); ?>" name="<?php echo $this->get_field_name( 'hidden_val' ); ?>" type="hidden" value="<?php echo esc_attr($instance['hidden_val'] ); ?>" />
			</p>
			<div class="social-widget-sortable">
				<?php
				if( !empty( $instance['hidden_val'] ) ) {
					$hidden_values =  explode( ',', $instance['hidden_val'] );
					foreach ($hidden_values as $h_val) {
					?>
						<p>
							<label for="<?php echo $this->get_field_id( $h_val ); ?>"><?php esc_html_e( $social_array[$h_val], 'pofo-addons' ); ?></label> 
							<input class="widefat" id="<?php echo $this->get_field_id( $h_val ); ?>" data-type ="<?php echo $h_val; ?>"  name="<?php echo $this->get_field_name( $h_val ); ?>" type="text" value="<?php echo esc_attr($instance[$h_val] ); ?>" />
							<img src="<?php echo POFO_THEME_IMAGES_URI; ?>/move-icon.png" class="icon-move widget-move" alt="">
						</p>
					<?php
					}
				
					foreach ($social_array as $s_key => $s_value) {
						if(!in_array($s_key, $hidden_values) ){
						?>
							<p>
								<label for="<?php echo $this->get_field_id( $s_key ); ?>"><?php esc_html_e( $s_value, 'pofo-addons' ); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( $s_key ); ?>" data-type ="<?php echo $s_key; ?>" name="<?php echo $this->get_field_name( $s_key ); ?>" type="text" value="<?php echo esc_attr($instance[$s_key] ); ?>" />
								<img src="<?php echo POFO_THEME_IMAGES_URI; ?>/move-icon.png" class="icon-move widget-move" alt="">
							</p>
						<?php
						}
					}
				} else {
					foreach ($social_array as $s_key => $s_value) {
						?>
							<p>
								<label for="<?php echo $this->get_field_id( $s_key ); ?>"><?php esc_html_e( $s_value, 'pofo-addons' ); ?></label> 
								<input class="widefat" id="<?php echo $this->get_field_id( $s_key ); ?>" data-type ="<?php echo $s_key; ?>" name="<?php echo $this->get_field_name( $s_key ); ?>" type="text" value="<?php echo esc_attr($instance[$s_key] ); ?>" />
								<img src="<?php echo POFO_THEME_IMAGES_URI; ?>/move-icon.png" class="icon-move widget-move" alt="">
							</p>
						<?php
					}
				}

			?>
			</div>
			
	   <?php
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] 		= ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['social_style'] = ( ! empty( $new_instance['social_style'] ) ) ? strip_tags( $new_instance['social_style'] ) : '';
			$instance['fb_url'] 	= ( ! empty( $new_instance['fb_url'] ) ) ? strip_tags( $new_instance['fb_url'] ) : '';
			$instance['tw_url'] 	= ( ! empty( $new_instance['tw_url'] ) ) ? strip_tags( $new_instance['tw_url'] ) : '';
			$instance['gp_url'] 	= ( ! empty( $new_instance['gp_url'] ) ) ? strip_tags( $new_instance['gp_url'] ) : '';
			$instance['db_url'] 	= ( ! empty( $new_instance['db_url'] ) ) ? strip_tags( $new_instance['db_url'] ) : '';
			$instance['li_url'] 	= ( ! empty( $new_instance['li_url'] ) ) ? strip_tags( $new_instance['li_url'] ) : '';
			$instance['ig_url'] 	= ( ! empty( $new_instance['ig_url'] ) ) ? strip_tags( $new_instance['ig_url'] ) : '';
			$instance['tb_url'] 	= ( ! empty( $new_instance['tb_url'] ) ) ? strip_tags( $new_instance['tb_url'] ) : '';
			$instance['pi_url'] 	= ( ! empty( $new_instance['pi_url'] ) ) ? strip_tags( $new_instance['pi_url'] ) : '';
			$instance['yt_url'] 	= ( ! empty( $new_instance['yt_url'] ) ) ? strip_tags( $new_instance['yt_url'] ) : '';
			$instance['vm_url'] 	= ( ! empty( $new_instance['vm_url'] ) ) ? strip_tags( $new_instance['vm_url'] ) : '';
			$instance['sc_url'] 	= ( ! empty( $new_instance['sc_url'] ) ) ? strip_tags( $new_instance['sc_url'] ) : '';
			$instance['fk_url'] 	= ( ! empty( $new_instance['fk_url'] ) ) ? strip_tags( $new_instance['fk_url'] ) : '';
			$instance['rss_url'] 	= ( ! empty( $new_instance['rss_url'] ) ) ? strip_tags( $new_instance['rss_url'] ) : '';
			$instance['rd_url'] 	= ( ! empty( $new_instance['rd_url'] ) ) ? strip_tags( $new_instance['rd_url'] ) : '';
			$instance['bh_url'] 	= ( ! empty( $new_instance['bh_url'] ) ) ? strip_tags( $new_instance['bh_url'] ) : '';
			$instance['vine_url'] 	= ( ! empty( $new_instance['vine_url'] ) ) ? strip_tags( $new_instance['vine_url'] ) : '';
			$instance['gh_url'] 	= ( ! empty( $new_instance['gh_url'] ) ) ? strip_tags( $new_instance['gh_url'] ) : '';
			$instance['xing_url'] 	= ( ! empty( $new_instance['xing_url'] ) ) ? strip_tags( $new_instance['xing_url'] ) : '';
			$instance['vk_url'] 	= ( ! empty( $new_instance['vk_url'] ) ) ? strip_tags( $new_instance['vk_url'] ) : '';
			$instance['yelp_url'] 	= ( ! empty( $new_instance['yelp_url'] ) ) ? strip_tags( $new_instance['yelp_url'] ) : '';
			$instance['discord_url'] = ( ! empty( $new_instance['discord_url'] ) ) ? strip_tags( $new_instance['discord_url'] ) : '';
			$instance['email_url'] 	= ( ! empty( $new_instance['email_url'] ) ) ? strip_tags( $new_instance['email_url'] ) : '';
			$instance['hidden_val'] = ( ! empty( $new_instance['hidden_val'] ) ) ? strip_tags( $new_instance['hidden_val'] ) : '';
		    return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'pofo_social_bar_widget' ) ) :
	function pofo_social_bar_widget() {
		
		register_widget( 'pofo_social_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_social_bar_widget' );

/*******************************************************************************/
/* End social Bar Widget */
/*******************************************************************************/
?>
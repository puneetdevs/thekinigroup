<?php
/**
 * @package Pofo
 */
?>
<?php

/*******************************************************************************/
/* Start Popular Portfolio Widget */
/*******************************************************************************/

if (!class_exists('pofo_latest_portfolio_widget')) {
	class pofo_latest_portfolio_widget extends WP_Widget {

		function __construct() {
			parent::__construct(
			'pofo_latest_portfolio_widget',
			esc_html__('Pofo - Latest Portfolio', 'pofo-addons'),
			array( 'description' => esc_html__( 'Your site most Latest Portfolio.', 'pofo-addons' ), ) // Args
			);
		}

		public function widget( $args, $instance ) 
		{
		    
	        $pofo_postperpage =  $instance['postperpage'] ;
			$pofo_title = apply_filters( 'widget_title', $instance['title'] );
			$pofo_latest_portfolio_style = (isset($instance[ 'pofo_latest_portfolio_style' ])) ? $instance[ 'pofo_latest_portfolio_style' ] : '';
			$pofo_portfolio_date_format = ( isset( $instance['pofo_portfolio_date_format'] ) ) ? $instance['pofo_portfolio_date_format']  : 'F j, Y |';
			$pofo_portfolio_orderby = ( isset( $instance['pofo_portfolio_orderby'] ) ) ? $instance['pofo_portfolio_orderby'] : 'date';
			$pofo_portfolio_border_color = ( isset( $instance['pofo_portfolio_border_color'] ) && !empty( $instance['pofo_portfolio_border_color'] ) ) ? ' style="border-color:'.$instance['pofo_portfolio_border_color'].'"' : '  style="border-color:#363636"';
			$pofo_portfolio_sortby = ( isset( $instance['pofo_portfolio_sortby'] ) ) ? $instance['pofo_portfolio_sortby'] : 'DESC';
			$pofo_portfolio_thumbnail = ( isset( $instance['pofo_portfolio_thumbnail'] ) ) ? $instance['pofo_portfolio_thumbnail'] : '';
            
            
			echo $args['before_widget'];
			if ( ! empty( $pofo_title ) )
				echo $args['before_title'] . esc_attr($pofo_title) . $args['after_title'];
			
			$pofo_recent_post = array(
				'post_type' => 'portfolio', 
				'posts_per_page' => $pofo_postperpage ,
				'orderby' => $pofo_portfolio_orderby,
				'order' => $pofo_portfolio_sortby
				);
			$pofo_query = new WP_Query( $pofo_recent_post );
			$pofo_img_url = '';
			switch ( $pofo_latest_portfolio_style ) {
				case 'latest-post-style-2':
					echo '<ul class="latest-post position-relative">';
						if ( $pofo_query->have_posts() ) 
						{
							while ( $pofo_query->have_posts() ) 
							{
								$pofo_query->the_post();
		                        echo '<li>';
								if( $pofo_portfolio_thumbnail == 'on' && has_post_thumbnail() ){
								   echo '<figure>';
		                                echo '<a href="'.get_permalink().'">';
								            the_post_thumbnail( 'pofo-popular-posts-thumb' );
								        echo '</a>';
		                           echo '</figure>';
		                        }   
		                        echo '<div class="display-table-cell vertical-align-top text-small">';
			                        echo '<a href="'.get_permalink().'" class="text-extra-dark-gray"><span class="display-inline-block margin-5px-bottom">'.wp_trim_words( get_the_title(), 10).'</span></a>'; 
				                        if( $pofo_portfolio_date_format ){
				                        	echo '<span class="clearfix text-medium-gray text-small">'.get_the_date( $pofo_portfolio_date_format ).'</span>';
				                        }
		                        echo '</div>';
									
								echo '</li>';
							}
							wp_reset_postdata();
						}
					echo '</ul>';
				break;
				
				default:
					echo '<ul class="latest-post position-relative top-3 xs-text-left">';
						if ( $pofo_query->have_posts() ) 
						{
							while ( $pofo_query->have_posts() ) 
							{
								$pofo_query->the_post();
		                        echo '<li class="border-bottom"'.$pofo_portfolio_border_color.'>';
								if( $pofo_portfolio_thumbnail == 'on' && has_post_thumbnail() ){
								   echo '<figure>';
		                                echo '<a href="'.get_permalink().'">';
								            the_post_thumbnail( 'pofo-popular-posts-thumb' );
								        echo '</a>';
		                           echo '</figure>';
		                        }   
		                        echo '<div class="text-small">';
			                        echo '<a href="'.get_permalink().'">'.wp_trim_words( get_the_title(), 5).'</a>'; 
				                        echo '<span class="clearfix"></span>';
				                        if( $pofo_portfolio_date_format ){
				                        	echo get_the_date( $pofo_portfolio_date_format ).' | ';
				                        }
				                        
			                            echo ''.esc_html_e( ' by', 'pofo-addons' ).' <a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">'.get_the_author().'</a>';
		                        echo '</div>';
									
								echo '</li>';
							}
							wp_reset_postdata();
						}
					echo '</ul>';
				break;
			}
			
	        echo $args['after_widget'];
		}
			
		// Widget Backend 
		public function form( $instance ) 
		{
			$pofo_title = (isset($instance[ 'title' ])) ? $instance[ 'title' ] : esc_html__('Latest Portfolio','pofo-addons');
			$pofo_latest_portfolio_style = (isset($instance[ 'pofo_latest_portfolio_style' ])) ? $instance[ 'pofo_latest_portfolio_style' ] : '';
			$pofo_postperpage = (isset($instance[ 'postperpage' ])) ? $instance[ 'postperpage' ] : '';
			$pofo_portfolio_date_format    = ( isset( $instance['pofo_portfolio_date_format'] ) ) ? $instance['pofo_portfolio_date_format'] : 'F j, Y';
			$pofo_portfolio_orderby  		= ( isset( $instance['pofo_portfolio_orderby'] ) ) ? $instance['pofo_portfolio_orderby'] : 'date';
			$pofo_portfolio_border_color  		= ( isset( $instance['pofo_portfolio_border_color'] ) ) ? $instance['pofo_portfolio_border_color'] : 'border-color-medium-dark-gray';
			$pofo_portfolio_sortby  		= ( isset( $instance['pofo_portfolio_sortby'] ) ) ? $instance['pofo_portfolio_sortby'] : 'DESC';
			$pofo_portfolio_thumbnail = ( isset( $instance['pofo_portfolio_thumbnail'] ) && $instance['pofo_portfolio_thumbnail'] == 'on' ) ? 'checked="checked"' : '';
			

			// Widget admin form
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $pofo_title ); ?>" />
			</p>

	        <p>
	        	<label for="<?php echo $this->get_field_id( 'pofo_latest_portfolio_style' ); ?>">
					<?php esc_html_e( 'Style:', 'pofo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'pofo_latest_portfolio_style' ); ?>" id="tz-border-color" class="widefat">
	                <option value="latest-post-style-1"<?php echo esc_attr( $pofo_latest_portfolio_style == 'latest-post-style-1' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Style 1', 'pofo-addons' ); ?></option>
	                <option value="latest-post-style-2"<?php echo esc_attr( $pofo_latest_portfolio_style == 'latest-post-style-2' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Style 2', 'pofo-addons' ); ?></option>
				</select>
	        </p>
			<p>
				<label for="<?php echo $this->get_field_id( 'postperpage' ); ?>"><?php esc_html_e( 'Number of posts to show :', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'postperpage' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'postperpage' ); ?>" type="text" value="<?php echo esc_attr( $pofo_postperpage ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'pofo_portfolio_date_format' ); ?>">
					<?php esc_html_e( 'Date Format:', 'pofo-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'pofo_portfolio_date_format' ); ?>" name="<?php echo $this->get_field_name( 'pofo_portfolio_date_format' ); ?>" type="text" value="<?php echo esc_attr( $pofo_portfolio_date_format ); ?>" />
			</p>
			<p>
	        	<label for="<?php echo $this->get_field_id( 'pofo_portfolio_orderby' ); ?>">
					<?php esc_html_e( 'Order by:', 'pofo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'pofo_portfolio_orderby' ); ?>" id="pofo-popular-post" class="widefat">
	                <option value="date"<?php echo esc_attr( $pofo_portfolio_orderby == 'date' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Date', 'pofo-addons' ); ?></option>
	                <option value="ID"<?php echo esc_attr( $pofo_portfolio_orderby == 'ID' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'ID', 'pofo-addons' ); ?></option>
	                <option value="author"<?php echo esc_attr( $pofo_portfolio_orderby == 'author' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Author', 'pofo-addons' ); ?></option>
	                <option value="title"<?php echo esc_attr( $pofo_portfolio_orderby == 'title' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Title', 'pofo-addons' ); ?></option>
	                <option value="modified"<?php echo esc_attr( $pofo_portfolio_orderby == 'modified' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Modified Date', 'pofo-addons' ); ?></option>
	                <option value="rand"<?php echo esc_attr( $pofo_portfolio_orderby == 'rand' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Random', 'pofo-addons' ); ?></option>
	                <option value="comment_count"<?php echo esc_attr( $pofo_portfolio_orderby == 'comment_count' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Comment count', 'pofo-addons' ); ?></option>
	                <option value="menu_order"<?php echo esc_attr( $pofo_portfolio_orderby == 'menu_order' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Menu order', 'pofo-addons' ); ?></option>
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'pofo_portfolio_sortby' ); ?>">
					<?php esc_html_e( 'Sort order:', 'pofo-addons' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'pofo_portfolio_sortby' ); ?>" id="tz-recent-category" class="widefat">
	                <option value="DESC"<?php echo esc_attr( $pofo_portfolio_sortby == 'DESC' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Descending', 'pofo-addons' ); ?></option>
	                <option value="ASC"<?php echo esc_attr( $pofo_portfolio_sortby == 'ASC' ) ? ' selected="selected"' : ''; ?>><?php echo esc_html__( 'Ascending', 'pofo-addons' ); ?></option>
				</select>
	        </p>
	        <p>
	        	<label for="<?php echo $this->get_field_id( 'pofo_portfolio_border_color' ); ?>">
					<?php esc_html_e( 'Border Color:', 'pofo-addons' ); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'pofo_portfolio_border_color' ); ?>" name="<?php echo $this->get_field_name( 'pofo_portfolio_border_color' ); ?>" type="text" value="<?php echo esc_attr( $pofo_portfolio_border_color ); ?>" />
				<span> <b>Note: Use only for Style 1.</b> </span>
	        </p>
	        
			<p>
				<input class="widefat" id="<?php echo $this->get_field_id( 'pofo_portfolio_thumbnail' ); ?>" size="3"  name="<?php echo $this->get_field_name( 'pofo_portfolio_thumbnail' ); ?>" type="checkbox" <?php echo $pofo_portfolio_thumbnail; ?> />
				<label for="<?php echo $this->get_field_id( 'pofo_portfolio_thumbnail' ); ?>">
					<?php esc_html_e( 'Display Thumbnail?', 'pofo-addons' ); ?>
				</label>
			</p>
		<?php 
		}
		
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) 
		{
		  $instance = array();
		  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		  $instance['postperpage'] = ( ! empty( $new_instance['postperpage'] ) ) ? strip_tags( $new_instance['postperpage'] ) : '';
		  $instance['pofo_portfolio_date_format'] = ( ! empty( $new_instance['pofo_portfolio_date_format'] ) ) ? strip_tags( $new_instance['pofo_portfolio_date_format'] ) : '';
		  $instance['pofo_portfolio_orderby'] = ( ! empty( $new_instance['pofo_portfolio_orderby'] ) ) ? strip_tags( $new_instance['pofo_portfolio_orderby'] ) : '';
		  $instance['pofo_portfolio_border_color'] = ( ! empty( $new_instance['pofo_portfolio_border_color'] ) ) ? strip_tags( $new_instance['pofo_portfolio_border_color'] ) : '';
		  $instance['pofo_latest_portfolio_style'] = ( ! empty( $new_instance['pofo_latest_portfolio_style'] ) ) ? strip_tags( $new_instance['pofo_latest_portfolio_style'] ) : '';
		  $instance['pofo_portfolio_sortby'] = ( ! empty( $new_instance['pofo_portfolio_sortby'] ) ) ? strip_tags( $new_instance['pofo_portfolio_sortby'] ) : '';
		  $instance['pofo_portfolio_thumbnail'] = ( ! empty( $new_instance['pofo_portfolio_thumbnail'] ) ) ? strip_tags( $new_instance['pofo_portfolio_thumbnail'] ) : '';

		   return $instance;
		}
	}
}

// Register and load Pofo custom widget
if ( ! function_exists( 'pofo_load_latest_portfolio_widget' ) ) :
	function pofo_load_latest_portfolio_widget() {
		register_widget( 'pofo_latest_portfolio_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_load_latest_portfolio_widget' );

/*******************************************************************************/
/* End Popular Post Widget */
/*******************************************************************************/
?>
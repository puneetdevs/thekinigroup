<?php
/**
 * @package Pofo
 */
?>
<?php

/*******************************************************************************/
/* Start Instagram Widget */
/*******************************************************************************/

if (!class_exists('pofo_instagram_widget')) {

	class pofo_instagram_widget extends WP_Widget {

		public $pofo_no_of_columns_instagram_feed;
		public $pofo_instagram_feed_script;
		public $pofo_instagram_id;
		public $pofo_instagram_feed_userid;
		public $pofo_instagram_feed_accesstoken;
		public $pofo_instagram_feed_userid_value;
		public $pofo_instagram_feed_accesstoken_value;

		function __construct() {
			parent::__construct(
				'pofo_instagram_widget',
				esc_html__('Pofo - Instagram', 'pofo-addons'),
				array( 'description' => esc_html__( 'Add a custom instagram widget.', 'pofo-addons' ), )
			);
			add_action( 'wp_enqueue_scripts', array( $this, 'pofo_instafeed_script' ), 10 );
		}
		
		public function pofo_instafeed_script() {
						
			/*
			 * Load Pofo theme main and other required jquery files.
			 */

			wp_register_script( 'instafeed', POFO_ADDONS_ROOT_DIR . '/pofo-shortcodes/js/instafeed.min.js', array( 'jquery' ), '1.3.3', false );
		    wp_enqueue_script( 'instafeed' );
		}

		public function widget( $args, $instance ) {
			
			
			extract( $args );
			
			// Before widget.
	        echo $before_widget;

	        /* Define empty variables */
	        $this->pofo_instagram_feed_script = '';
	        /* Define empty array */
	        $instagram_feed_nav_page_cursor = array();
	        /* Get current widget id */
	        $this->pofo_instagram_id = $this->id;
			/* Get instagram userId */
			$this->pofo_instagram_feed_userid = ( isset( $instance['instagram_id'] ) ) ? $this->pofo_instagram_feed_script .= "userId: ".$instance['instagram_id']."," : '';
			/* Get instagram userID value */
			$this->pofo_instagram_feed_userid_value  = ( isset( $instance['instagram_id'] ) ) ? $instance['instagram_id'] : '';
			/* Get instagram accessToken value */
			$this->pofo_instagram_feed_accesstoken_value = ( isset( $instance['instagram_access_token'] ) ) ? $instance['instagram_access_token'] : '';
			/* Get instagram accessToken */
			$this->pofo_instagram_feed_accesstoken = ( isset( $instance['instagram_access_token'] ) ) ? $this->pofo_instagram_feed_script .= "accessToken: '".$instance['instagram_access_token']."'," : '';
	        /* Check no of column in grid type  */
			$this->pofo_no_of_columns_instagram_feed = ( isset( $instance['no_of_columns_instagram_feed'] ) ) ? $instance['no_of_columns_instagram_feed'] : '4';
			/* Check no of feed to show */
			$pofo_no_of_instagram_feed = ( isset( $instance['no_instagram_feed'] ) ) ? $this->pofo_instagram_feed_script .= "limit: '".$instance['no_instagram_feed']."'," : '8';
			/* Check sort order */
			$pofo_sort_instagram_feed = ( isset( $instance['sort_instagram_feed'] ) ) ? $this->pofo_instagram_feed_script .= "sortBy: '".$instance['sort_instagram_feed']."'," : 'none';
			/* Check if like disable or not */
			if( isset( $instance['sort_instagram_feed'] ) ) {
				$this->pofo_disable_instagram_like = ( $instance['disable_instagram_like'] ) ?  '' : '<span class="insta-counts"><i class="fas fa-heart"></i> {{likes}}</span>';
			}else{
				$this->pofo_disable_instagram_like = '';
			}
			/* Check image resolution */
			$this->pofo_instagram_feed_script .= "resolution: 'low_resolution',";
		  	/* Set widget id for append data */
		  	$this->pofo_instagram_feed_script .= " target: 'pofo-".$this->id."',";

    		$pofo_class_list = implode( " ", sanitize_html_class( $instagram_feed_nav_page_cursor ) );
            $pofo_instagram_feed_class = ( $pofo_class_list ) ? ' '.$pofo_class_list : '';
          
            $title = ( isset( $instance['title'] ) ) ? apply_filters( 'widget_title', $instance['title'] ) : esc_html__( 'Follow Us @ Instagram', 'pofo-addons' );

            if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
				echo '<div class="instagram-follow-api">';
			        echo '<ul id="pofo-'.$this->id.'" class="pofo-instagram-feed'.$pofo_instagram_feed_class.'"></ul>';
			    echo '</div>';
	    		$this->pofo_instagram_feed_settings();

    		// After widget
	     	echo $after_widget;  
    	}

    	public function pofo_instagram_feed_settings(){
	
			$output = $pofo_instagram_template = $pofo_slider_config = '';

			ob_start();
	    	
            $column_classes = '';

            switch( $this->pofo_no_of_columns_instagram_feed ) {
                case '3':
                    $column_classes .= ' class="col-md-4 col-sm-4 col-xs-4"';
                break;
                case '2':
                    $column_classes .= ' class="col-md-6 col-sm-6 col-xs-12"';
                break;
                case '1':
                    $column_classes .= ' class="col-md-12 col-sm-12 col-xs-12"';
                break;
                case '4':
                default:
                    $column_classes .= ' class="col-md-3 col-sm-4 col-xs-4"';
                break;
            }
            $pofo_instagram_template = '<li'.$column_classes.'><figure><a href="{{link}}" target="_blank"><img src="{{image}}" />'.$this->pofo_disable_instagram_like.'</a></figure></li>';
	            
	       	?>
<script>
( function( $ ) {
$(window).load(function () {
var <?php echo str_ireplace( '-', '_', $this->pofo_instagram_id ); ?> = new Instafeed({ get: 'user', <?php echo sprintf( '%s', $this->pofo_instagram_feed_script ); ?> after: function () { var images = $('#<?php echo sprintf( '%s', $this->pofo_instagram_id ); ?>').find('a');
	$.each(images, function (index, image) { var delay = (index * 75) + 'ms'; $(image).css('-webkit-animation-delay', delay); $(image).css('-moz-animation-delay', delay); $(image).css('-ms-animation-delay', delay); $(image).css('-o-animation-delay', delay); $(image).css('animation-delay', delay); $(image).addClass('wow fadeInUp'); }); }, template: <?php echo "'".sprintf( '%s', $pofo_instagram_template )."'"; ?>});
<?php echo str_ireplace( '-', '_', $this->pofo_instagram_id ); ?>.run();
});
})( jQuery );
</script>
	        <?php
	        $output = ob_get_contents();
	        ob_end_clean();

	        if( $this->pofo_instagram_feed_userid_value != '' && $this->pofo_instagram_feed_accesstoken_value != '' ):
	            echo $output;
	        endif;
		}
		
		// Widget Backend 
		public function form( $instance ) {
			
			/* Set up some default widget settings. */
	        $defaults = array(
	            'title' => esc_html__( 'Follow Us @ Instagram', 'pofo-addons' ),
	            'instagram_access_token' => '',
	            'instagram_id' => '',
	            'no_of_columns_instagram_feed' => '4',
	            'sort_instagram_feed' => 'none',
	            'no_instagram_feed' => 10,
	            'disable_instagram_like' => false,
	        );

	        $instance = wp_parse_args( (array) $instance, $defaults );
	       
			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'instagram_id' ); ?>"><?php esc_html_e( 'Instagram ID:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_id' ); ?>" name="<?php echo $this->get_field_name( 'instagram_id' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_id'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( '
					' ); ?>"><?php esc_html_e( 'Access Token:', 'pofo-addons' ); ?></label> 
				<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_access_token' ); ?>" name="<?php echo $this->get_field_name( 'instagram_access_token' ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_access_token'] ); ?>" />
			</p>
	        <p class="instagram-sort-instagram-feed">
	            <label for="<?php echo esc_attr( $this->get_field_id( 'sort_instagram_feed' ) ); ?>"><?php esc_html_e( 'Sort feed data by', 'pofo-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'sort_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'sort_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
	                       			'none'   => esc_html__('None','pofo-addons'),
                                    'most-recent' => esc_html__('Most Recent','pofo-addons'),
                                    'least-recent' => esc_html__('Least Recent','pofo-addons'),
                                    'most-liked' => esc_html__('Most Liked','pofo-addons'),
                                    'least-liked' => esc_html__('Least Liked','pofo-addons'),
                                    'most-commented' => esc_html__('Most Commented','pofo-addons'),
                                    'least-commented' => esc_html__('Least Commented','pofo-addons'),
                                    'random' => esc_html__('Random','pofo-addons')
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['sort_instagram_feed'] == $option ? selected( $instance['sort_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of column', 'pofo-addons' ); ?></label>
	            <select id="<?php echo esc_attr( $this->get_field_id( 'no_of_columns_instagram_feed' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'no_of_columns_instagram_feed' ) ); ?>">
	                <?php $options = array(	                        
							'1' => '1',
				    		'2' => '2',
				    		'3' => '3',
				    		'4' => '4',
	                      ); ?>
	                <?php foreach ( $options as $option => $key ) : ?>
	                    <option value="<?php echo esc_attr( $option ); ?>"<?php $instance['no_of_columns_instagram_feed'] == $option ? selected( $instance['no_of_columns_instagram_feed'], $option ) : ''; ?>><?php echo esc_html( $key ); ?></option>
	                <?php endforeach; ?>
				</select>
	        </p>
	        <p>
	            <label for="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>"><?php esc_html_e( 'No. of instagram feed', 'pofo-addons' ); ?></label>
	            <input type="number" min="1" max="20" name="<?php echo esc_attr( $this->get_field_name( 'no_instagram_feed' ) ); ?>" value="<?php echo esc_attr( $instance['no_instagram_feed'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'no_instagram_feed' ) ); ?>" />
	        </p>

	        <p>
    		  <input class="checkbox" type="checkbox" <?php checked( $instance[ 'disable_instagram_like' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'disable_instagram_like' ); ?>" name="<?php echo $this->get_field_name( 'disable_instagram_like' ); ?>" />   
    		  <label for="<?php echo esc_attr( $this->get_field_id( 'disable_instagram_like' ) ); ?>"><?php esc_html_e( 'Disable Like', 'pofo-addons' ); ?></label>          
			</p>

		<?php
		}
		
		// Updating widget replacing old instances with new

		public function update( $new_instance, $old_instance ) 
		{
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['instagram_access_token'] = ( ! empty( $new_instance['instagram_access_token'] ) ) ? $new_instance['instagram_access_token'] : '';
			$instance['instagram_id'] = ( ! empty( $new_instance['instagram_id'] ) ) ? $new_instance['instagram_id'] : '';
			$instance['no_of_columns_instagram_feed'] = ( ! empty( $new_instance['no_of_columns_instagram_feed'] ) ) ? $new_instance['no_of_columns_instagram_feed'] : '';
			$instance['sort_instagram_feed'] = ( ! empty( $new_instance['sort_instagram_feed'] ) ) ? $new_instance['sort_instagram_feed'] : '';		
			$instance['no_instagram_feed'] = ( ! empty( $new_instance['no_instagram_feed'] ) ) ? $new_instance['no_instagram_feed'] : '';
			$instance['disable_instagram_like'] = ( ! empty( $new_instance['disable_instagram_like'] ) ) ? $new_instance['disable_instagram_like'] : '';
			return $instance;
		}
	}
}

// Register and load the widget
if ( ! function_exists( 'pofo_load_instagram_widget' ) ) :
	function pofo_load_instagram_widget() {
		register_widget( 'pofo_instagram_widget' );
	}
endif;
add_action( 'widgets_init', 'pofo_load_instagram_widget' );

/*******************************************************************************/
/* End Instagram Widget */
/*******************************************************************************/
<?php
/**
 * Metabox Class Fill.
 *
 * @package Pofo
 */
?>
<?php
/**
 * Calls the class on the post edit screen.
 */
function Pofo_Meta_Boxes() {
    new pofoMetaboxes();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'Pofo_Meta_Boxes' );
    add_action( 'load-post-new.php', 'Pofo_Meta_Boxes' );
}


/** 
 * The pofoMetaboxes Class.
 */
if( !class_exists( 'pofoMetaboxes' ) ) {
	class pofoMetaboxes {

		/**
		 * Hook into the appropriate actions when the class is constructed.
		 */
		public function __construct() {

			$this->pofo_metabox_addons();
			add_action( 'add_meta_boxes', array( $this, 'pofo_add_meta_boxs' ) );
			add_action( 'save_post', array( $this, 'pofo_save_meta_box' ) );
			add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));

			/* Portfolio */
			add_action( 'add_meta_boxes', array( $this, 'pofo_add_meta_boxs_portfolios' ) );
		}

		/**
		 * Adds the meta box functions container.
		 */
		public function pofo_metabox_addons(){
			require_once( POFO_ADDONS_ROOT .'/meta-box/meta-box-maps.php' );
		}

		/**
		 * Adds the meta box container.
		 */
		public function pofo_add_meta_boxs( $pofo_post_type ) {

			$pofo_post_types = array( 'post', 'page', 'portfolio' );     //limit meta box to certain post types
			/* if WooCommerce plugin is activated */
			if( class_exists( 'WooCommerce' ) ) {
				$pofo_post_types[] = 'product';
			}
			$flag = false;
	        if ( in_array( $pofo_post_type, $pofo_post_types ) ) {
	           	$flag = true;
	        }
	        if( $flag == true ) {
	        	switch( $pofo_post_type ) {
	        		case 'post':
	        			$this->pofo_add_meta_box( 'pofo_admin_options', __( 'Pofo Post Settings', 'pofo-addons' ), $pofo_post_type );
	        		break;
	        		case 'portfolio':
	        			$this->pofo_add_meta_box( 'pofo_admin_options', __( 'Pofo Portfolio Settings', 'pofo-addons' ), $pofo_post_type );
	        		break;
	        		case 'product':
			        	/* if WooCommerce plugin is activated */
						if( class_exists( 'WooCommerce' ) ) {
							$this->pofo_add_meta_box( 'pofo_admin_options', __( 'Pofo Product Settings', 'pofo-addons' ), $pofo_post_type );
						}
	        		break;
	        		case 'page':
	        			$this->pofo_add_meta_box( 'pofo_admin_options', __( 'Pofo Page Settings', 'pofo-addons' ), $pofo_post_type );
	        		break;
	        	}
		    }
		}

		public function pofo_add_meta_box( $pofo_id, $pofo_label_name, $pofo_post_type ) {
			add_meta_box(
				$pofo_id
				,$pofo_label_name
				,array( $this, $pofo_id )
				,$pofo_post_type
			);
		}

		public function pofo_admin_options() {
			global $post;
			$layout_settings_tab = $post->post_type.'_layout_settings';
			if( class_exists( 'WooCommerce' ) && $post->post_type == 'product'){/* if WooCommerce plugin is activated */

				$pofo_tabs_title = array(); // 'Page Title'
				$pofo_tabs_sub_title = array('');
				$pofo_page_tabs = array('Page Title');
				$pofo_page_tab_content = array('title_wrapper');

			} else if( $post->post_type == 'post' || $post->post_type == 'portfolio' ){
				$pofo_tabs_title = array('Layout Settings', 'Header', 'Page Title', 'Comments Settings', 'Footer Wrapper', 'Footer Middle', 'Footer Bottom','Footer Social Icon','Single '.ucfirst( $post->post_type ).' Settings');
				$pofo_tabs_sub_title = array('', 'Header section configuration settings', '', 'Enable&#47;Disable comments in '.$post->post_type, 'Footer wrapper section configuration settings','Footer middle section configuration settings','Footer bottom section configuration settings', 'Footer social icon section configuration settings', '');
				$pofo_page_tabs = array('Layout Settings', 'Header', 'Page Title', 'Comments Settings', 'Footer Wrapper', 'Footer Middle', 'Footer Bottom', 'Footer Social Icon', 'Single '.ucfirst( $post->post_type ).' Layout');
				$pofo_page_tab_content = array($layout_settings_tab, 'header', 'title_wrapper', 'content', 'footer_wrapper','footer_middle','footer_bottom','footer_social_icon', 'single_post_layout');
			}else{
				$pofo_tabs_title = array(
										0 => __( 'Layout Settings', 'pofo-addons' ),
										1 => __( 'Header', 'pofo-addons' ),
										2 => __( 'Page Title', 'pofo-addons' ),
										3 => __( 'Comments Settings', 'pofo-addons' ),
										4 => __( 'Footer Wrapper', 'pofo-addons' ),
										5 => __( 'Footer Middle', 'pofo-addons' ),
										6 => __( 'Footer Bottom', 'pofo-addons' ),
										7 => __( 'Footer Social Icon', 'pofo-addons' ),
									);
				$pofo_tabs_sub_title = array(
										0 => '',
										1 => __( 'Header section configuration settings', 'pofo-addons' ),
										2 => '',
										3 => __( 'Enable&#47;Disable comments in page', 'pofo-addons' ),
										4 => __( 'Footer wrapper section configuration settings', 'pofo-addons' ),
										5 => __( 'Footer middle section configuration settings', 'pofo-addons' ),
										6 => __( 'Footer bottom section configuration settings', 'pofo-addons' ),
										7 => __( 'Footer social icon section configuration settings', 'pofo-addons' ),
									);
				$pofo_page_tabs = array(
										0 => __( 'Layout Settings', 'pofo-addons' ),
										1 => __( 'Header', 'pofo-addons' ),
										2 => __( 'Page Title', 'pofo-addons' ),
										3 => __( 'Comments Settings', 'pofo-addons' ),
										4 => __( 'Footer Wrapper', 'pofo-addons' ),
										5 => __( 'Footer Middle', 'pofo-addons' ),
										6 => __( 'Footer Bottom', 'pofo-addons' ),
										7 => __( 'Footer Social Icon', 'pofo-addons' ),
									);
				$pofo_page_tab_content = array( $layout_settings_tab , 'header', 'title_wrapper', 'content', 'footer_wrapper', 'footer_middle', 'footer_bottom','footer_social_icon' );
			}

			if( class_exists( 'WooCommerce' ) && $post->post_type == 'product'){/* if WooCommerce plugin is activated */
				$pofo_icon_class = array( 'ti-layout-accordion-separated');
			} else {
				$pofo_icon_class = array( 'icon-gears','fas fa-heading', 'ti-layout-accordion-separated', 'fas fa-align-left', 'fas fa-server','ti-layout-accordion-separated','ti-layout-media-overlay-alt','ti-layout-menu-separated', 'ti-layout-accordion-separated');
			}

			if( !empty( $pofo_tabs_title ) ) {
				echo '<ul class="pofo_meta_box_tabs">';
				$pofo_icon = 0;
				$pofo_showicon = '';
					foreach( $pofo_tabs_title as $tab_key => $tab_name ) {
						if($pofo_icon_class){
							$pofo_showicon = '<i class="'.esc_attr($pofo_icon_class[$pofo_icon]).'"></i>';
						}
						echo '<li class="pofo_tab_'.$pofo_page_tab_content[$tab_key].'"><a href="'.esc_url($tab_name).'">'.$pofo_showicon.'<span class="group_title">'.esc_attr($tab_name).'</span></a></li>';
						$pofo_icon++;
					}
				echo '</ul>';
			}

			echo '<div class="pofo_meta_box_tab_content">';
			foreach( $pofo_page_tab_content as $tab_content_key => $tab_content_name ) {
				echo '<div class="pofo_meta_box_tab" id="pofo_tab_'.esc_attr($tab_content_name).'">';
					echo "<div class='main_tab_title'>";
						echo "<h3>";
							echo $pofo_page_tabs[$tab_content_key];
							if( $tab_content_key == 0 || $tab_content_key == 3 ) {

								$reset_key = $pofo_page_tabs[$tab_content_key];

							} else {

								$reset_key = $pofo_page_tabs[$tab_content_key] . ' ' . __( 'Settings', 'pofo-addons' );
							}
							$clear_button_value = __( 'Clear', 'pofo-addons' ) . ' ' . $reset_key;
							echo '<a href="javascript:void(0);" reset_key="'.esc_attr( $reset_key ).'" class="button button-primary pofo_tab_reset_settings">'.$clear_button_value.'</a>';
						echo "</h3>";
						echo "<span class='description'>".$pofo_tabs_sub_title[$tab_content_key]."</span>";
					echo "</div>";
					require_once( POFO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_'.$tab_content_name.'.php' );
				echo '</div>';
			}
			echo '</div>';
			echo '<div class="clear"></div>';
		}

		/**
		 * Adds the meta box for Portfolio.
		 */
		public function pofo_add_meta_boxs_portfolios( $pofo_post_type ) 
		{
			$pofo_post_types = array('portfolio','post');     //limit meta box to certain post types
			$flag = false;
	        if ( in_array( $pofo_post_type, $pofo_post_types )){
	           	$flag = true;
	        }
	        if($flag == true){
		        $this->pofo_add_meta_box('pofo_admin_options_single', 'Pofo '.ucfirst($pofo_post_type).' Format Settings', $pofo_post_type);
		    }

		}

		public function pofo_add_meta_boxs_portfolio($pofo_id, $pofo_label_name, $pofo_post_type)
		{
			add_meta_box(
				$pofo_id
				,$pofo_label_name
				,array( $this, $pofo_id )
				,$pofo_post_type
				,'advanced'
				,'high'
			);
		}

		public function pofo_admin_options_single()
		{
	        global $post;
			echo '<div class="pofo_meta_box_tab_content_single">';
				if( $post->post_type == 'portfolio' ){
					echo '<input name="pofo_portfolio_post_type_single" id="pofo_portfolio_post_type_single" type="hidden" value="" />';
				}
				echo '<div class="pofo_meta_box_tab" id="pofo_tab_single"></div>';
	            if( $post->post_type == 'post' ) {
	            	require_once( POFO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_post_setting.php' );
	            } else {
	            	require_once( POFO_ADDONS_ROOT .'/meta-box/metabox-tabs/metabox_portfolio_setting.php' );
	            }
			echo '</div>';
			echo '<div class="clear"></div>';
		}
		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public function pofo_save_meta_box( $pofo_post_id ) {
		
			// If this is an autosave, our form has not been submitted,
	        // so we don't want to do anything.
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
				return $pofo_post_id;

			/* OK, its safe for us to save the data now. */
			$pofo_data = array();
			foreach ( $_POST as $key => $value ) {
				if ( strstr( $key, 'pofo_') ) {
					// Sanitize the user input.
					$pofo_data = $_POST[$key];
					// Update the meta field.
					
                    // Meta Prefix
                    $meta_prefix = pofo_meta_prefix();
					update_post_meta( $pofo_post_id, $meta_prefix.$key, $pofo_data );
				}
			}
		}

		function admin_script_loader() {
			
			global $pagenow;
			if( is_admin() && ( $pagenow=='post-new.php' || $pagenow=='post.php' ) ) {
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
		   		wp_enqueue_style('thickbox');
		   		wp_enqueue_style( 'wp-color-picker' );
    			wp_enqueue_script( 'wp-color-picker');

		        // jQuery Sortable
		        wp_enqueue_script( 'jquery-ui-sortable' );

		   		wp_register_script('alpha-color-picker', POFO_ADDONS_ROOT_DIR.'/meta-box/js/alpha-color-picker.js', array('jquery', 'wp-color-picker'), '1.0' );
		   		wp_enqueue_script('alpha-color-picker');
		   		wp_register_style('alpha-color-picker', POFO_ADDONS_ROOT_DIR.'/meta-box/css/alpha-color-picker.css', array('wp-color-picker'), '1.0' );
		   		wp_enqueue_style('alpha-color-picker');
		   		wp_register_script('pofo-admin-metabox-cookie-js', POFO_ADDONS_ROOT_DIR.'/meta-box/js/metabox-cookie.js', array('jquery'), '1.0' );
		   		wp_enqueue_script('pofo-admin-metabox-cookie-js');
		   		wp_register_script('pofo-admin-metabox-js', POFO_ADDONS_ROOT_DIR.'/meta-box/js/meta-box.js', array('jquery','jquery-ui-sortable'), '1.0' );
				wp_enqueue_script('pofo-admin-metabox-js');
		   		wp_localize_script( 'pofo-admin-metabox-js', 'pofo_admin_meta', array(
					'reset_message' => esc_attr__( 'This will remove / clear all ### for this page and then it will use settings from WordPress customize panel. Are you sure to clear ###?', 'pofo-addons' )
				) );
		   		wp_register_style('pofo-admin-metabox-css', POFO_ADDONS_ROOT_DIR.'/meta-box/css/meta-box.css',null, '1.0' );
		   		wp_enqueue_style('pofo-admin-metabox-css');
			}
		}
	}
}
<?php
/**
 * Defind Class 
 */

    
if( !class_exists( 'Pofo_Licence_Activation' ) ) {

  	class Pofo_Licence_Activation {

		// Construct
		public function __construct() {
		  	add_action( 'admin_menu', array( $this, 'pofo_licence_activation_page' ), 5 );
		  	add_action( 'wp_ajax_pofo_active_theme_licence', array( $this, 'pofo_active_theme_licence' ) );
		}

		public function pofo_licence_activation_page() {
		    add_theme_page(
		        esc_html__( 'Theme Licence', 'pofo' ), // page title
		        esc_html__( 'Theme Licence', 'pofo' ), // menu title
		        'manage_options',                   // capability
		        'pofo-licence-activation',          // menu slug
		        array( $this, 'pofo_licence_activation_callback' )  // callback function
		    );
		}

		// Add new submenu for demo data install in Admin panel > Appereance
		public function pofo_licence_activation_callback() {
			
		    global $title;

		    /* Check current user permission */
		    if( !current_user_can( 'manage_options' ) ) {
		        wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'pofo' ) );
		    }
		    /* Gets a WP_Theme object for a theme. */
		    $pofo_theme = wp_get_theme();

		    echo '<div class="wrap">';
		        echo '<h1>'.esc_attr( $title ).'</h1>';
		        echo '<div class="pofo-header-licence">';
		            echo '<div class="display_header">';
		                if( $pofo_theme->get( 'Name' ) ) :
		                    echo '<h2>'.$pofo_theme->get( 'Name' ).'</h2>';
		                endif;
		                if( $pofo_theme->get( 'Version' ) ) :
		                    echo '<span>'.$pofo_theme->get( 'Version' ).'</span>';
		                endif;
		            echo '</div>';
		            echo '<div class="pofo-head-right">';
		                echo '<a target="_blank" href="'.$pofo_theme->get( 'ThemeURI' ).'/documentation/">'.esc_html__( 'Online Documentation', 'pofo' ).'</a><span class="link_sep">|</span><a target="_blank" href="'.$pofo_theme->get( 'AuthorURI' ).'/support.php">'.esc_html__( 'Support Center', 'pofo' ).'</a></div>';
		            echo '<div class="clear"></div>';
		        echo '</div>';
		        echo '<div class="licence-content">';
			        echo '<div class="licence-content-top">';
                        echo '<div class="header-licence-top">';
                            echo '<div class="header-licence-top-left">';
                                echo '<a target="_blank" href="'.$pofo_theme->get( 'ThemeURI' ).'"><img src="'.POFO_THEME_IMAGES_URI.'/licence-logo.png" alt="Pofo logo" ></a>';
                            echo '</div>';
                            echo '<div class="header-licence-top-right">';
                                echo '<h4>'.esc_html__( 'Welcome to POFO - Creative, Portfolio & Blog WordPress Theme ', 'pofo' ).'</h4>';
                            echo '</div>';
                        echo '</div>';
                        $class = '';
                        echo '<div class="licence-content-bottom">';    
                            echo '<div class="licence-thankyou-message 	licence-added-success">';
                                echo esc_html__( 'Welcome to POFO WordPress theme. Please activate your POFO theme license copy and enjoy premium features.','pofo' );
                            echo '</div>';
                            $pofo_is_theme_licence_active = pofo_is_theme_licence_active();	

                            if( $pofo_is_theme_licence_active ) {
                                echo '<div class="licence-activated-success"><i class="fas fa-check-circle"></i><span>'.esc_html__( 'Awesome! Your Pofo WordPress theme license is activated already. Enjoy premium features of Pofo.', 'pofo' ).'</span></div>';
                                $class = ' hide-licence-button"';
                            } else {
                                if( isset( $_GET['token'] ) && isset( $_GET['response'] ) ) {
                                    $pofo_get_transient = get_transient( 'pofo_licence_token' );
                                   	if( $_GET['token'] == $pofo_get_transient ) {
                                        if( $_GET['response'] == 'true' && isset( $_GET['msg']) ) {
                                           	echo '<div class="licence-activated-success"><i class="fas fa-check-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                                $class = ' hide-licence-button"';
                                                pofo_theme_active_licence( 'yes' );
                                        }
                                        if( $_GET['response'] == 'false' && isset( $_GET['msg']) ) {
                                          	echo '<div class="licence-activated-failed"><i class="fas fa-times-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                        }
                                        if( $_GET['response'] == 'access_denied' && isset( $_GET['msg']) ) {
                                          	echo '<div class="licence-activated-access-denied"><i class="fas fa-info-circle"></i><span>'.esc_attr( $_GET['msg'] ).'</span></div>';
                                        }
                                    }
                                }
                            }

                            echo '<a class="pofo-licence'.$class.'" href="javascript:void(0);">'.esc_html__( 'Activate POFO WordPress Theme License', 'pofo' ).'</a>';
                            echo '<img src="'.POFO_THEME_IMAGES_URI.'/spin.gif" class="pofo-licence-spinner" alt="spinner" width="25" height="25">';
                            echo '<div class="licence-description">'.esc_html__( 'Activate your POFO theme license using above button to unlock POFO premium features like demo data import. Please note that you will need to login to your ThemeForest account from which you have purchased POFO theme and allow the access to verify your theme purchase. ', 'pofo' );
                                echo '<a target="_blank" href="'.$pofo_theme->get( 'ThemeURI' ).'/documentation/knowledgebase/start/how-to-activate-pofo-theme-license/">'.esc_html__( 'For more details please check this article.', 'pofo' ).'</a>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="licence-support-content-bottom">';
                        	echo '<div class="license-documentation">';
                        		echo '<a href="'.$pofo_theme->get( 'ThemeURI' ).'/documentation/" target="_blank"><img src="'.POFO_THEME_IMAGES_URI.'/online-documentation.png" /><span>'.esc_html__( 'Online Documentation','pofo').'</span></a>';
                        	echo '</div>';
                        	echo '<div class="license-support">';
                        		echo '<a href="'.$pofo_theme->get( 'AuthorURI' ).'/support.php" target="_blank"><img src="'.POFO_THEME_IMAGES_URI.'/support-center.png" /><span>'.esc_html__( 'Support Center','pofo').'</span></a>';
                        	echo '</div>';
                        	echo '<div class="license-video">';
                        		echo '<a href="'.$pofo_theme->get( 'ThemeURI' ).'/documentation/video-tutorials/" target="_blank"><img src="'.POFO_THEME_IMAGES_URI.'/video-tutorials.png" /><span>'.esc_html__( 'Video Tutorials','pofo').'</span></a>';
                        	echo '</div>';
                        echo '</div>';    
			        echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
		    
		public function pofo_active_theme_licence() {
		    $PofoResponse = array(
		        'status' => true,
		        'url' => pofo_generate_theme_licence_activation_url(),
		    );
		    die( json_encode( $PofoResponse ) );
		}

	} // end of class
	$Pofo_Licence_Activation = new Pofo_Licence_Activation();
  
} // end of class_exists
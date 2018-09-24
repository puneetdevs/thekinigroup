<?php

if( !class_exists( 'pofo_addons_plugin_update' ) ) {

	class pofo_addons_plugin_update {
		private $pofo_current_version;
		private $pofo_update_path;
		private $pofo_plugin_slug;
		private $pofo_slug;

		public function __construct( $pofo_current_version, $pofo_update_path, $pofo_plugin_slug ) {
			// Set the class public variables
			$this->pofo_current_version = $pofo_current_version;
			$this->pofo_update_path = $pofo_update_path;

			// Set the Plugin Slug	
			$this->pofo_plugin_slug = $pofo_plugin_slug;
			list ($t1, $t2) = explode( '/', $pofo_plugin_slug );
			$this->pofo_slug = str_replace( '.php', '', $t2 );

			// define the alternative API for updating checking
			add_filter( 'pre_set_site_transient_update_plugins', array( $this, 'pofo_addons_check_update' ) );

			// Define the alternative response for information checking
			add_filter( 'plugins_api', array( $this, 'pofo_addons_check_info' ), 10, 3 );
		}

		public function pofo_addons_check_update( $transient ) {
			if ( empty( $transient->checked ) ) {
				return $transient;
			}

			// Get the latest version from remote file
			$pofo_addons_remote_version = $this->pofo_addons_getRemote_version();

			// If a newer version is available, add the update
			if ( version_compare( $this->pofo_current_version, $pofo_addons_remote_version->new_version, '<' ) ) {
				$obj = new stdClass();
				$obj->slug = $this->pofo_slug;
				$obj->new_version = $pofo_addons_remote_version->new_version;

				$transient->response[$this->pofo_plugin_slug] = $obj;
			}
			return $transient;
		}

		public function pofo_addons_check_info( $obj, $action, $arg ) {
			if (isset($arg->slug) && $arg->slug === $this->pofo_slug) {
				$pofo_addons_information = $this->pofo_addons_getRemote_information();
				$pofo_addons_information->sections = (array) $pofo_addons_information->sections;
				return $pofo_addons_information;
			}
			return $obj;
		}

		public function pofo_addons_getRemote_information() {
			$pofo_addons_info_request = wp_remote_get( 'http://api.themezaa.com/pofo/data.json' );
			if ( ! is_wp_error( $pofo_addons_info_request ) || wp_remote_retrieve_response_code( $pofo_addons_info_request ) === 200 ) {
				return json_decode( $pofo_addons_info_request['body'] );
			}
			return false;
		}

		public function pofo_addons_getRemote_version() {
			$params = array( 'body' => array( 'action' => 'version' ) );
			// Make the POST request
			$pofo_addons_version_request = wp_remote_post($this->pofo_update_path, $params );
			// Check if response is valid
			if ( !is_wp_error( $pofo_addons_version_request ) || wp_remote_retrieve_response_code( $pofo_addons_version_request ) === 200 ) {
				return @unserialize( $pofo_addons_version_request['body'] );
			}
			return false;
		}
	}
}
<?php

if ( ! class_exists('CCB_Settings') ) {

	/**
	 * Handles plugin settings and user profile meta fields
	 */
	class CCB_Settings extends CCB_Module {
		protected $settings;
		protected static $default_settings;
		protected static $readable_properties	= array( 'settings' );
		protected static $writeable_properties	= array( 'settings' );
		//TODO: Populate this from apiUtils.js
		protected static $default_sets			= array(
			'sizes'			=> array( 'tiny', 'small', 'medium', 'large' ),
			'presets'		=> array( 'web', 'mobile', 'windows', 'animation' ),
			'formats'		=> array( 'mp4', 'flv', 'webm', 'asf', 'gif' ),
			'resolutions'	=> array( 'keep', '240p', '360p', '480p', '720p', '1080p', '320w', '640w' ),
			'compressions'	=> array( 'min', 'low', 'medium', 'high', 'max' ),
			'inputs'		=> array( 'file', 'camera' ),
			'outputs'		=> array( 'blob', 'azure', 's3', 'youtube', 'gdrive' )
		);

		const REQUIRED_CAPABILITY = 'administrator';


		/*
		 * General methods
		 */

		/**
		 * Constructor
		 *
		 * @mvc Controller
		 */
		protected function __construct() {
			$this->register_hook_callbacks();
		}

		/**
		 * Public setter for protected variables
		 *
		 * Updates settings outside of the Settings API or other subsystems
		 *
		 * @mvc Controller
		 *
		 * @param string $variable
		 * @param array  $value This will be merged with WPPS_Settings->settings, so it should mimic the structure of the WPPS_Settings::$default_settings. It only needs the contain the values that will change, though. See WordPress_Plugin_Skeleton->upgrade() for an example.
		 */
		public function __set( $variable, $value ) {
			// Note: WPPS_Module::__set() is automatically called before this

			if ( $variable != 'settings' ) {
				return;
			}

			$this->settings = self::validate_settings( $value );
			update_option( 'ccb_settings', $this->settings );
		}

		/**
		 * Register callbacks for actions and filters
		 *
		 * @mvc Controller
		 */
		public function register_hook_callbacks() {
			add_action( 'admin_menu',               __CLASS__ . '::register_settings_pages' );

			add_action( 'init',                     array( $this, 'init' ) );
			add_action( 'admin_init',               array( $this, 'register_settings' ) );

			add_filter(
				'plugin_action_links_' . plugin_basename( dirname( __DIR__ ) ) . '/bootstrap.php',
				__CLASS__ . '::add_plugin_action_links'
			);
		}

		/**
		 * Prepares site to use the plugin during activation
		 *
		 * @mvc Controller
		 *
		 * @param bool $network_wide
		 */
		public function activate( $network_wide ) {
		}

		/**
		 * Rolls back activation procedures when de-activating the plugin
		 *
		 * @mvc Controller
		 */
		public function deactivate() {
		}

		/**
		 * Initializes variables
		 *
		 * @mvc Controller
		 */
		public function init() {
			self::$default_settings = self::get_default_settings();
			$this->settings         = self::get_settings();
		}

		/**
		 * Executes the logic of upgrading from specific older versions of the plugin to the current version
		 *
		 * @mvc Model
		 *
		 * @param string $db_version
		 */
		public function upgrade( $db_version = 0 ) {
			/*
			if( version_compare( $db_version, 'x.y.z', '<' ) )
			{
				// Do stuff
			}
			*/
		}

		/**
		 * Checks that the object is in a correct state
		 *
		 * @mvc Model
		 *
		 * @param string $property An individual property to check, or 'all' to check all of them
		 * @return bool
		 */
		protected function is_valid( $property = 'all' ) {
			// Note: __set() calls validate_settings(), so settings are never invalid

			return true;
		}


		/*
		 * Plugin Settings
		 */

		/**
		 * Establishes initial values for all settings
		 *
		 * @mvc Model
		 *
		 * @return array
		 */
		protected static function get_default_settings() {
			$general = array(
				'field-apiKey' 				=> null
			);

			$appearance = array(
				'field-label'				=> 'Upload with Clipchamp!',
				'field-size'				=> self::$default_sets['sizes'][0],
				'field-title'				=> 'Ye\' olde video-upload shoppe',
				'field-logo'				=> 'https://api.clipchamp.com/static/button/images/logo.svg',
				'field-color'				=> '#4c3770'
			);

			$video = array(
				'field-preset'				=> self::$default_sets['presets'][0],
				'field-format'				=> self::$default_sets['formats'][0],
				'field-resolution'			=> self::$default_sets['resolutions'][0],
				'field-compression'			=> self::$default_sets['compressions'][2],
				'field-input'				=> self::$default_sets['inputs'],
				'field-output'				=> array( self::$default_sets['outputs'][0] )
			);

			$s3 = array(
				'field-s3-bucket'			=> '',
				'field-s3-folder'			=> ''
			);

			$azure = array(
				'field-azure-container'		=> '',
				'field-azure-folder'		=> ''
			);

			$gdrive = array(
				'field-gdrive-folder'		=> ''
			);

			$youtube = array(
				'field-youtube-title'		=> '',
				'field-youtube-description'	=> ''
			);

			return array(
				'db-version' 	=> '0',
				'general'      	=> $general,
				'appearance'	=> $appearance,
				'video'   		=> $video,
				's3'			=> $s3,
				'azure'			=> $azure,
				'gdrive'		=> $gdrive,
				'youtube'		=> $youtube
			);
		}

		/**
		 * Retrieves all of the settings from the database
		 *
		 * @mvc Model
		 *
		 * @return array
		 */
		protected static function get_settings() {
			$settings = shortcode_atts(
				self::$default_settings,
				get_option( 'ccb_settings', array() )
			);

			return $settings;
		}

		/**
		 * Adds links to the plugin's action link section on the Plugins page
		 *
		 * @mvc Model
		 *
		 * @param array $links The links currently mapped to the plugin
		 * @return array
		 */
		public static function add_plugin_action_links( $links ) {
			array_unshift( $links, '<a href="http://wordpress.org/extend/plugins/wordpress-plugin-skeleton/faq/">Help</a>' );
			array_unshift( $links, '<a href="options-general.php?page=' . 'ccb_settings">Settings</a>' );

			return $links;
		}

		/**
		 * Adds pages to the Admin Panel menu
		 *
		 * @mvc Controller
		 */
		public static function register_settings_pages() {
			add_submenu_page(
				'options-general.php',
				CCB_NAME . ' Settings',
				CCB_NAME,
				self::REQUIRED_CAPABILITY,
				'ccb_settings',
				__CLASS__ . '::markup_settings_page'
			);
		}

		/**
		 * Creates the markup for the Settings page
		 *
		 * @mvc Controller
		 */
		public static function markup_settings_page() {
			if ( current_user_can( self::REQUIRED_CAPABILITY ) ) {
				echo self::render_template( 'ccb-settings/page-settings.php' );
			} else {
				wp_die( 'Access denied.' );
			}
		}

		/**
		 * Registers settings sections, fields and settings
		 *
		 * @mvc Controller
		 */
		public function register_settings() {
			/*
			 * General Section
			 */
			add_settings_section(
				'ccb_section-general',
				'General Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-apiKey',
				'API key',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-general',
				array( 'label_for' => 'ccb_field-apiKey' )
			);

			/*
			 * Button Appearance Section
			 */
			add_settings_section(
				'ccb_section-appearance',
				'Button Appearance Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-label',
				'Label',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-appearance',
				array( 'label_for' => 'ccb_field-label' )
			);

			add_settings_field(
				'ccb_field-size',
				'Size',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-appearance',
				array( 'label_for' => 'ccb_field-size' )
			);

			add_settings_field(
				'ccb_field-title',
				'Title',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-appearance',
				array( 'label_for' => 'ccb_field-title' )
			);

			add_settings_field(
				'ccb_field-logo',
				'Logo',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-appearance',
				array( 'label_for' => 'ccb_field-logo' )
			);

			add_settings_field(
				'ccb_field-color',
				'Color',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-appearance',
				array( 'label_for' => 'ccb_field-color' )
			);

			/*
			 * Video Section
			 */
			add_settings_section(
				'ccb_section-video',
				'Video Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-preset',
				'Preset',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-preset' )
			);

			add_settings_field(
				'ccb_field-format',
				'Format',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-format' )
			);

			add_settings_field(
				'ccb_field-resolution',
				'Resolution',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-resolution' )
			);

			add_settings_field(
				'ccb_field-compression',
				'Compression',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-compression' )
			);

			add_settings_field(
				'ccb_field-inputs',
				'Inputs',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-inputs' )
			);

			add_settings_field(
				'ccb_field-output',
				'Output',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-video',
				array( 'label_for' => 'ccb_field-output' )
			);

			/*
			 * S3 Section
			 */
			add_settings_section(
				'ccb_section-s3',
				'S3 Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-s3-bucket',
				'S3 Bucket',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-s3',
				array( 'label_for' => 'ccb_field-s3-bucket' )
			);

			add_settings_field(
				'ccb_field-s3-folder',
				'S3 Folder',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-s3',
				array( 'label_for' => 'ccb_field-s3-folder' )
			);

			/*
			 * Azure Section
			 */
			add_settings_section(
				'ccb_section-azure',
				'Azure Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-azure-container',
				'Azure Container',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-azure',
				array( 'label_for' => 'ccb_field-azure-container' )
			);

			add_settings_field(
				'ccb_field-azure-folder',
				'Azure Folder',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-azure',
				array( 'label_for' => 'ccb_field-azure-folder' )
			);

			/*
			 * Google Drive Section
			 */
			add_settings_section(
				'ccb_section-gdrive',
				'Google Drive Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-gdrive-folder',
				'Google Drive Folder',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-gdrive',
				array( 'label_for' => 'ccb_field-gdrive-folder' )
			);

			/*
			 * Youtube Section
			 */
			add_settings_section(
				'ccb_section-youtube',
				'Youtube Settings',
				__CLASS__ . '::markup_section_headers',
				'ccb_settings'
			);

			add_settings_field(
				'ccb_field-youtube-title',
				'Youtube Title',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-youtube',
				array( 'label_for' => 'ccb_field-youtube-title' )
			);

			add_settings_field(
				'ccb_field-youtube-description',
				'Youtube Description',
				array( $this, 'markup_fields' ),
				'ccb_settings',
				'ccb_section-youtube',
				array( 'label_for' => 'ccb_field-youtube-description' )
			);


			// The settings container
			register_setting(
				'ccb_settings',
				'ccb_settings',
				array( $this, 'validate_settings' )
			);
		}

		/**
		 * Adds the section introduction text to the Settings page
		 *
		 * @mvc Controller
		 *
		 * @param array $section
		 */
		public static function markup_section_headers( $section ) {
			echo self::render_template( 'ccb-settings/page-settings-section-headers.php', array( 'section' => $section ), 'always' );
		}

		/**
		 * Delivers the markup for settings fields
		 *
		 * @mvc Controller
		 *
		 * @param array $field
		 */
		public function markup_fields( $field ) {
			switch ( $field['label_for'] ) {
				case 'ccb_field-apiKey':
					// Do any extra processing here
					break;
			}

			echo self::render_template( 'ccb-settings/page-settings-fields.php', array( 'settings' => $this->settings, 'field' => $field, 'default_sets' => self::$default_sets ), 'always' );
		}

		/**
		 * Validates submitted setting values before they get saved to the database. Invalid data will be overwritten with defaults.
		 *
		 * @mvc Model
		 *
		 * @param array $new_settings
		 * @return array
		 */
		public function validate_settings( $new_settings ) {
			$new_settings = shortcode_atts( $this->settings, $new_settings );

			if ( ! is_string( $new_settings['db-version'] ) ) {
				$new_settings['db-version'] = Clipchamp_Button::VERSION;
			}

			/*
			 * General Settings
			 */
			if ( empty( $new_settings['general']['field-apiKey'] ) ) {
				add_notice( 'API key cannot be empty', 'error' );
				$new_settings['general']['field-apiKey'] = empty( $this->settings['general']['field-apiKey'] ) ? self::$default_settings['general']['field-apiKey'] : $this->settings['general']['field-apiKey'];
			}

			/*
			 * Button Appearance Settings
			 */
			if ( empty( $new_settings['appearance']['field-label'] ) ) {
				add_notice( 'Label cannot be empty', 'error' );
				$new_settings['appearance']['field-label'] = empty( $this->settings['appearance']['field-label'] ) ? self::$default_settings['general']['field-label'] : $this->settings['appearance']['field-label'];
			}

			if ( !in_array( $new_settings['appearance']['field-size'], self::$default_sets['sizes'] ) ) {
				add_notice( 'Invalid value for size', 'error' );
				$new_settings['appearance']['field-size'] = empty( $this->settings['appearance']['field-size'] ) ? self::$default_settings['appearance']['field-size'] : $this->settings['appearance']['field-size'];
			}

			if ( empty( $new_settings['appearance']['field-title'] ) ) {
				add_notice( 'Title cannot be empty', 'error' );
				$new_settings['appearance']['field-title'] = empty( $this->settings['appearance']['field-title'] ) ? self::$default_settings['general']['field-title'] : $this->settings['appearance']['field-title'];
			}

			//TODO: Check for URL
			if ( empty( $new_settings['appearance']['field-logo'] ) ) {
				add_notice( 'Logo cannot be empty', 'error' );
				$new_settings['appearance']['field-logo'] = empty( $this->settings['appearance']['field-logo'] ) ? self::$default_settings['general']['field-logo'] : $this->settings['appearance']['field-logo'];
			}

			//TODO: Check for color
			if ( empty( $new_settings['appearance']['field-color'] ) ) {
				add_notice( 'Color cannot be empty', 'error' );
				$new_settings['appearance']['field-color'] = empty( $this->settings['appearance']['field-color'] ) ? self::$default_settings['general']['field-color'] : $this->settings['appearance']['field-color'];
			}

			/*
			 * Video Settings
			 */
			if ( !in_array( $new_settings['video']['field-preset'], self::$default_sets['presets'] ) ) {
				add_notice( 'Invalid value for preset', 'error' );
				$new_settings['video']['field-preset'] = empty( $this->settings['video']['field-preset'] ) ? self::$default_settings['video']['field-preset'] : $this->settings['video']['field-preset'];
			}

			if ( !in_array( $new_settings['video']['field-format'], self::$default_sets['formats'] ) ) {
				add_notice( 'Invalid value for format', 'error' );
				$new_settings['video']['field-format'] = empty( $this->settings['video']['field-format'] ) ? self::$default_settings['video']['field-format'] : $this->settings['video']['field-format'];
			}

			if ( !in_array( $new_settings['video']['field-resolution'], self::$default_sets['resolutions'] ) ) {
				add_notice( 'Invalid value for resolution', 'error' );
				$new_settings['video']['field-resolution'] = empty( $this->settings['video']['field-resolution'] ) ? self::$default_settings['video']['field-resolution'] : $this->settings['video']['field-resolution'];
			}

			if ( !in_array( $new_settings['video']['field-compression'], self::$default_sets['compressions'] ) ) {
				add_notice( 'Invalid value for compression', 'error' );
				$new_settings['video']['field-compression'] = empty( $this->settings['video']['field-compression'] ) ? self::$default_settings['video']['field-compression'] : $this->settings['video']['field-compression'];
			}

			if ( empty( array_intersect( $new_settings['video']['field-inputs'], self::$default_sets['inputs'] ) ) ) {
				add_notice( 'Invalid value for inputs', 'error' );
				$new_settings['video']['field-inputs'] = empty( $this->settings['video']['field-inputs'] ) ? self::$default_settings['video']['field-inputs'] : $this->settings['video']['field-inputs'];
			}

			if ( !in_array( $new_settings['video']['field-output'], self::$default_sets['outputs'] ) ) {
				add_notice( 'Invalid value for output', 'error' );
				$new_settings['video']['field-output'] = empty( $this->settings['video']['field-output'] ) ? self::$default_settings['video']['field-output'] : $this->settings['video']['field-output'];
			}

			/*
			 * S3 Settings
			 */
			if ( strcmp( $new_settings['video']['field-output'], 's3' ) == 0 && empty( $new_settings['s3']['field-s3-bucket'] ) ) {
				add_notice( 'S3 bucket cannot be empty', 'error' );
				$new_settings['s3']['field-s3-bucket'] = empty( $this->settings['s3']['field-s3-bucket'] ) ? self::$default_settings['s3']['field-s3-bucket'] : $this->settings['s3']['field-s3-bucket'];
				$new_settings['video']['field-output'] = empty( $this->settings['video']['field-output'] ) ? self::$default_settings['video']['field-output'] : $this->settings['video']['field-output'];
			}

			/*
			 * Azure Settings
			 */
			if ( strcmp( $new_settings['video']['field-output'], 'azure' ) == 0 && empty( $new_settings['s3']['field-azure-container'] ) ) {
				add_notice( 'Azure container cannot be empty', 'error' );
				$new_settings['azure']['field-azure-container'] = empty( $this->settings['azure']['field-azure-container'] ) ? self::$default_settings['azure']['field-azure-container'] : $this->settings['azure']['field-azure-container'];
				$new_settings['video']['field-output'] = empty( $this->settings['video']['field-output'] ) ? self::$default_settings['video']['field-output'] : $this->settings['video']['field-output'];
			}

			return $new_settings;
		}

	} // end CCB_Settings
}

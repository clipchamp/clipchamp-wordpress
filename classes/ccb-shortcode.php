<?php

if ( ! class_exists('CCB_Shortcode') ) {

    class CCB_Shortcode extends CCB_Module {

        protected static $id                    = 1;
        protected static $settings;
        protected static $readable_properties	= array( 'id', 'settings' );
        protected static $writeable_properties	= array( 'id' );

        const SHORTCODE_TAG     = 'clipchamp';
        const SCRIPT_HANDLE     = 'clipchamp-button';
        const SCRIPT_BASE_URL   = 'http://localhost:8080/';
        const SCRIPT_FILE_NAME  = 'button.js';

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

        /*
         * Static methods
         */

        protected static function create_button_options( $local ) {
            $options = 'var options' . self::$id . ' = {';
            foreach ( self::$settings as $section ) {
                if ( !is_array( $section ) ) {
                    continue;
                }
                foreach ( $section as $key => $value ) {
                    // strip field from $key
                    $key = substr( $key, 6 );
                    $key = str_replace( '-', '.', $key );
                    if ( strcmp( $key, 'apiKey' ) != 0 ) {
                        $options .= !empty( $local[$key] ) ? '"' . $key . '":' . json_encode( $local[$key] ) . ',' : '"' . $key . '":' . json_encode( $value ) . ',';
                    }
                }
            }
            if ( strcmp( self::$settings['video']['field-output'], 'blob' ) == 0 && ( empty( $local['output'] ) || strcmp( $local['output'], 'blob' ) == 0 ) ) {
                $options .= 'onVideoCreated: function() { console.log("TEST TEST TEST"); },';
            }
            $options = substr( $options, 0, -1 );
            $options .= '};';
            return $options;
        }

        /**
         * Defines the shortcode
         *
         * @mvc Controller
         *
         * @param array $attributes
         * @return string
         */
        public static function render_shortcode( $attributes ) {
            wp_enqueue_script( self::SCRIPT_HANDLE );

            $attributes = apply_filters( 'ccb_shortcode-attributes', $attributes );

            $jsScript = self::create_button_options( $attributes );
            $jsScript .= 'var element' . self::$id . ' = document.getElementById("clipchamp-button-' . self::$id . '");';
            $jsScript .= 'clipchamp(element' . self::$id . ', options' . self::$id . ');';
            wp_add_inline_script( self::SCRIPT_HANDLE, $jsScript );

            return '<div id="clipchamp-button-' . self::$id++ . '" class="clipchamp-button"></div>';
        }

        public static function register_scripts() {
            $api_key = self::$settings['general']['field-apiKey'];
            wp_register_script( self::SCRIPT_HANDLE, self::SCRIPT_BASE_URL . $api_key . '/' . self::SCRIPT_FILE_NAME, array(), Clipchamp_Button::VERSION );
        }

        /*
		 * Instance methods
		 */

        /**
         * Register callbacks for actions and filters
         *
         * @mvc Controller
         */
        public function register_hook_callbacks() {
            add_action( 'init',                 array( $this, 'init' ) );
            add_action( 'wp_enqueue_scripts',   __CLASS__ . '::register_scripts' );
            add_shortcode( self::SHORTCODE_TAG, __CLASS__ . '::render_shortcode' );
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
            //TODO: Use CCB_Settings
            self::$settings = get_option( 'ccb_settings' );
        }

        /**
         * Executes the logic of upgrading from specific older versions of the plugin to the current version
         *
         * @mvc Model
         *
         * @param string $db_version
         */
        public function upgrade( $db_version = 0 ) {
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
            return true;
        }

    }

}
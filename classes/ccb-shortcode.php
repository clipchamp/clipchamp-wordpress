<?php

if ( ! class_exists('CCB_Shortcode') ) {

    class CCB_Shortcode extends CCB_Module {

        protected static $id                    = 1;
        protected static $ajax_init             = false;
        protected static $settings;
        protected static $readable_properties	= array( 'id', 'settings' );
        protected static $writeable_properties	= array( 'id' );

        const SHORTCODE_TAG         = 'clipchamp';
        const SCRIPT_HANDLE         = 'clipchamp-button';
        const PLUGIN_SCRIPT_HANDLE  = 'clipchamp-plugin';
        const SCRIPT_BASE_URL       = 'https://api.clipchamp.com/';
        const SCRIPT_FILE_NAME      = 'button.js';
        const ON_METADATA_AVAILABLE = 'ccbMetadataAvailable';
        const ON_PREVIEW_AVAILABLE  = 'ccbPreviewAvailable';
        const ON_VIDEO_CREATED      = 'ccbUploadVideo';
        const ON_UPLOAD_COMPLETE    = 'ccbUploadComplete';

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

        /**
         * Creates options for the Clipchamp API
         *
         * @mvc Controller
         *
         * @param array $local
         * @return string
         */
        protected static function create_button_options( $local ) {
            //TODO:Improve
            $not_show = array( 'general', 'posts' );
            $do_wrap = array( 's3', 'youtube', 'gdrive', 'azure', 'camera' );
            $options = 'var options' . self::$id . ' = {';
            foreach ( self::$settings as $s_key => $section ) {
                if ( !is_array( $section ) || in_array( $s_key, $not_show ) ) {
                    continue;
                }
                if ( in_array( $s_key, $do_wrap ) ) {
                    $options .= '"' . $s_key . '": {';
                }
                foreach ( $section as $key => $value ) {
                    // strip field from $key
                    $key = substr( $key, 6 );
                    if ( in_array( $s_key, $do_wrap ) ) {
                        $key = explode( '-', $key );
                        $key = $key[1];
                    }
                    if ( !empty( $local[$key] ) && strpos( $local[$key], ',' ) ) {
                        $local[$key] = explode( ',', $local[$key] );
                    }
                    if ( $local && $local[$key] && ! empty( $local[$key] ) ) {
                        $value = $local[$key];
                    }
                    if ( ( ! is_array( $value ) && ! empty( $value ) ) || ( is_array( $value ) && ! empty( $value[0] ) ) ) {
                        $options .= '"' . $key . '":' . json_encode( $value ) . ',';
                    }
                }
                if ( in_array( $s_key, $do_wrap ) ) {
                    if ( substr( $options, -1 ) === ',' ) {
                        $options = substr( $options, 0, -1 );
                    }
                    $options .= '},';
                }
            }
            if ( strcmp( self::$settings['video']['field-output'], 'blob' ) == 0 || ( $local && strcmp( $local['output'], 'blob' ) == 0 ) ) {
                $options .= 'onVideoCreated: ' . self::ON_VIDEO_CREATED . ',';
            }
            $options .= 'onMetadataAvailable: ' . self::ON_METADATA_AVAILABLE . ',';
            $options .= 'onPreviewAvailable: ' . self::ON_PREVIEW_AVAILABLE . ',';
            $options .= 'onUploadComplete: ' . self::ON_UPLOAD_COMPLETE . ',';
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
            if ( empty( self::$settings['general']['field-apiKey'] ) ) {
                return 'You need to enter your API key to use Clipchamp';
            }

            wp_enqueue_script( self::PLUGIN_SCRIPT_HANDLE );
            wp_enqueue_script( self::SCRIPT_HANDLE );
            if ( !self::$ajax_init ) {
                wp_localize_script(
                    self::SCRIPT_HANDLE,
                    'ccb_ajax',
                    array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
                );
                self::$ajax_init = true;
            }

            //TODO:Validate attributes
            $attributes = apply_filters( 'ccb_shortcode-attributes', $attributes );

            $jsScript = self::create_button_options( $attributes );
            $jsScript .= 'var element' . self::$id . ' = document.getElementById("clipchamp-button-' . self::$id . '");';
            $jsScript .= 'clipchamp(element' . self::$id . ', options' . self::$id . ');';

            if ( self::$id === 1 ) {
                // before upload
                if ( isset( self::$settings['posts'], self::$settings['posts']['field-before-create-hook'] ) || has_filter( 'ccb_before-create-hook' ) ) {
                    $jsScript .= 'ccbBeforeCreateHook = function(data) { ';
                    $jsScript .= apply_filters( 'ccb_before-create-hook', self::$settings['posts']['field-before-create-hook'] );
                    $jsScript .= '};';
                }
                // after upload
                if ( isset( self::$settings['posts'], self::$settings['posts']['field-after-create-hook'] ) || has_filter( 'ccb_after-create-hook' ) ) {
                    $jsScript .= 'ccbAfterCreateHook = function(postId, videoData, image) {';
                    $jsScript .= apply_filters( 'ccb_after-create-hook', self::$settings['posts']['field-after-create-hook'] );
                    $jsScript .= '};';
                }
            }

            if ( function_exists( 'wp_add_inline_script' ) ) {
                wp_add_inline_script( self::SCRIPT_HANDLE, $jsScript );
            } else {
                self::add_inline_script( self::SCRIPT_HANDLE, $jsScript );
            }

            return '<div id="clipchamp-button-' . self::$id++ . '" class="clipchamp-button"></div><p></p>';
        }

        /**
         * Add inline script to initialize Clipchamp button.
         * Method for WordPress version prior 4.5.0.
         *
         * @mvc Controller
         *
         * @param string $handle Script handle
         * @param string $data Inline script to be added
         */
        public static function add_inline_script( $handle, $data ) {
            $handle = $handle . '-inline';

            $cb = function()use( $handle, $data ){
                if( wp_script_is( $handle, 'done' ) )
                    return;
                echo "<script type=\"text/javascript\" id=\"js-$handle\">\n$data\n</script>\n";
                global $wp_scripts;
                $wp_scripts->done[] = $handle;
            };

            add_action( 'wp_print_footer_scripts', $cb );
        }

        /**
         * Registers script for the shortcode.
         *
         * @mvc Controller
         */
        public static function register_scripts() {
            $api_key = self::$settings['general']['field-apiKey'];

            wp_register_script(
                self::SCRIPT_HANDLE,
                self::SCRIPT_BASE_URL . $api_key . '/' . self::SCRIPT_FILE_NAME,
                array(),
                Clipchamp::VERSION,
                true
            );

            wp_register_script(
                self::PLUGIN_SCRIPT_HANDLE,
                plugins_url( 'javascript/button.js', dirname( __FILE__ ) ),
                array( 'jquery' ),
                Clipchamp::VERSION,
                true
            );
        }

        /**
         * Returns json object containing the localization strings.
         * This request is cached.
         *
         * @param string $locale
         * @return string
         */
        public static function get_localization( $locale ) {
            $localization = wp_cache_get( 'ccb_localization_' . $locale );
            if ( false == $localization ) {
                $file_name = $locale . '.json';
                $localization = file_get_contents( $file_name );
                if ( $localization ) {
                    $localization = json_decode( $localization );
                    wp_cache_set( 'ccb_localization_' . $locale, $localization );
                    return $localization;
                }
            }
            return false;
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
            add_action( 'init',                     array( $this, 'init' ) );
            add_action( 'wp_enqueue_scripts',       __CLASS__ . '::register_scripts' );
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
         * @param integer $db_version
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
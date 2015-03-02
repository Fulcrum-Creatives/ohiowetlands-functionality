<?php
/**
 * @package     OHW
 * @link      	https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Fulcrum Creatives <info@fulcrumcreatives.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Ohio Wetlands Custom Functionality
 * Plugin URI:        https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * Description:       Custom functinality for http://ohiowetlands.org
 * Version:           0.0.1
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ohw
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * GitHub Branch:     development
 */ 

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'OHW' ) ) {
	class OHW {
		
		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of OHW class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 1.0.0
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof OHW ) ) {
				self::$instance = new OHW;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				//self::$instance->init = new OHW_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  1.0.0
		 * @access private
		 * @return voide
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'OHW_VERSION' ) ) {
				define( 'OHW_VERSION', '0.0.1' );
			}
			// Prefix
			if ( ! defined( 'OHW_PREFIX' ) ) {
				define( 'OHW_PREFIX', 'ohw_' );
			}
			// Textdomain
			if ( ! defined( 'OHW_TEXTDOMAIN' ) ) {
				define( 'OHW_TEXTDOMAIN', 'ohw' );
			}
			// Plugin Options
			if ( ! defined( 'OHW_OPTIONS' ) ) {
				define( 'OHW_OPTIONS', 'ohw-options' );
			}
			// Plugin Directory
			if ( ! defined( 'OHW_PLUGIN_DIR' ) ) {
				define( 'OHW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'OHW_PLUGIN_URL' ) ) {
				define( 'OHW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'OHW_PLUGIN_FILE' ) ) {
				define( 'OHW_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';
			//require_once OHW_PLUGIN_DIR . 'includes/class-ohw-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function load_textdomain() {
			$ohw_lang_dir = dirname( plugin_basename( OHW_PLUGIN_FILE ) ) . '/languages/';
			$ohw_lang_dir = apply_filters( 'OHW_lang_dir', $ohw_lang_dir );

			$locale = apply_filters( 'plugin_locale',  get_locale(), OHW_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', OHW_TEXTDOMAIN, $locale );

			$mofile_local  = $ohw_lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd/' . $mofile;

			if ( file_exists( $mofile_local ) ) {
				load_textdomain( OHW_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( OHW_TEXTDOMAIN, false, $ohw_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', OHW_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', OHW_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function OHW_Run() {
	return OHW::instance();
}
OHW_Run();
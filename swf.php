<?php
/**
 * @package     SWF
 * @link      	https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       0.0.1
 * @author      Fulcrum Creatives <info@fulcrumcreatives.com>
 *
 * @wordpress-plugin
 * Plugin Name:       Stream & Wetlands Foundation Custom Functionality
 * Plugin URI:        https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * Description:       Custom functinality for http://ohiowetlands.org
 * Version:           0.0.1
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swf
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/ohiowetlands-functionality
 * GitHub Branch:     development
 */ 

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'SWF' ) ) {
	class SWF {
		
		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of SWF class
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
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof SWF ) ) {
				self::$instance = new SWF;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				self::$instance->admin_init = new SWF_Admin_Init();
				self::$instance->init = new SWF_Init();
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
			if ( ! defined( 'SWF_VERSION' ) ) {
				define( 'SWF_VERSION', '0.0.1' );
			}
			// Prefix
			if ( ! defined( 'SWF_PREFIX' ) ) {
				define( 'SWF_PREFIX', 'SWF_' );
			}
			// Textdomain
			if ( ! defined( 'SWF_TEXTDOMAIN' ) ) {
				define( 'SWF_TEXTDOMAIN', 'swf' );
			}
			// Plugin Options
			if ( ! defined( 'SWF_OPTIONS' ) ) {
				define( 'SWF_OPTIONS', 'swf-options' );
			}
			// Plugin Directory
			if ( ! defined( 'SWF_PLUGIN_DIR' ) ) {
				define( 'SWF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'SWF_PLUGIN_URL' ) ) {
				define( 'SWF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'SWF_PLUGIN_FILE' ) ) {
				define( 'SWF_PLUGIN_FILE', __FILE__ );
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

			require_once SWF_PLUGIN_DIR . 'public/class-swf-register-post-type.php';
			require_once SWF_PLUGIN_DIR . 'public/class-swf-register-taxonomies.php';
			require_once SWF_PLUGIN_DIR . 'public/class-swf-init.php';

			require_once SWF_PLUGIN_DIR . 'admin/class-swf-add-menu-items.php';
			require_once SWF_PLUGIN_DIR . 'admin/class-swf-rename-post-menu-item.php';
			require_once SWF_PLUGIN_DIR . 'admin/class-swf-admin-init.php';

			//require_once SWF_PLUGIN_DIR . 'includes/class-swf-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function load_textdomain() {
			$swf_lang_dir = dirname( plugin_basename( SWF_PLUGIN_FILE ) ) . '/languages/';
			$swf_lang_dir = apply_filters( 'swf_lang_dir', $swf_lang_dir );

			$locale = apply_filters( 'plugin_locale',  get_locale(), SWF_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', SWF_TEXTDOMAIN, $locale );

			$mofile_local  = $swf_lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd/' . $mofile;

			if ( file_exists( $mofile_local ) ) {
				load_textdomain( SWF_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( SWF_TEXTDOMAIN, false, $swf_lang_dir );
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
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', SWF_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', SWF_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance 
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function SWF_Run() {
	return SWF::instance();
}
SWF_Run();
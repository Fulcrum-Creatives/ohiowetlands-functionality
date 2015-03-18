<?php
/**
 * Admin Init
 *
 * @package     SWF
 * @subpackage  SWF/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class SWF_Admin_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$add_menu_items = new SWF_Add_Menu_Items();
		$rename_post_menu_item = new SWF_Rename_Post_Menu_Item();
		$this->admin_styles();
	}

	public function admin_styles() {
		if( is_admin() ) {
			wp_enqueue_style( SWF_TEXTDOMAIN , plugin_dir_url( __FILE__ ) . 'css/admin-styles.css', array(), SWF_VERSION, 'all' );
		}
	}

}
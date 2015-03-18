<?php

/**
 * Add Custom Menu Items to the Admin
 *
 * @link       http://fulcrumcreatives.com/
 * @since      1.0.0
 *
 * @package    SWF
 * @subpackage SWF/admin
 */

/**
 * Add Custom Menu Items to the Admin
 *
 * @package    SWF
 * @subpackage SWF/admin
 * @author     Fulcrum Creatives <info@fulcrumcreatives.com>
 */
class SWF_Add_Menu_Items {

	public function __construct() { 
		$this->register_my_custom_menu_page();
	}

	public function register_my_custom_menu_page(){
	    if( function_exists( 'acf_add_options_page') ) {
			acf_add_options_page( array( 'page_title'  => 'Theme Settings' ) );
		}
	}

}
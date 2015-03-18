<?php
/**
 * Init
 *
 * @package     SWF
 * @subpackage  SWF/public
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class SWF_Init {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$featured_project_post_type = new SWF_Register_Post_Type( 'Featured Project', 'Featured Projects', array(), array( 'supports' => array( 'title', 'editor', 'thumbnail' ) ) );
		$partners_post_type = new SWF_Register_Post_Type( 'Partners' );
		$register_partner_type_taxonomy = new SWF_Register_Taxonomies( 'partners', 'Partner Type' );
	}
}
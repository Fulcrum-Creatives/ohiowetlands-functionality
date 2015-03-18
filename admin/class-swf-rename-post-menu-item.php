<?php
/**
 * Rename the post menue item to "News"
 *
 * @package     Package_Name
 * @subpackage  Package_Name/includes
 * @copyright   Copyright (c) 2014, Jason Witt
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Jason Witt <contact@jawittdesigns.com>
 */

class SWF_Rename_Post_Menu_Item {

	/**
	 * Initialize the class
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'post_label' ) );
		add_action( 'init', array( $this, 'post_object' ) );
	}

	public function post_label() {
	    global $menu;
	    global $submenu;
	    $menu[5][0] = 'News';
	    $submenu['edit.php'][5][0] = 'News';
	    $submenu['edit.php'][10][0] = 'Add News';
	    $submenu['edit.php'][16][0] = 'News Tags';
	    echo '';
	}
	public function post_object() {
	    global $wp_post_types;
	    $labels = &$wp_post_types['post']->labels;
	    $labels->name = 'News';
	    $labels->singular_name = 'News';
	    $labels->add_new = 'Add News';
	    $labels->add_new_item = 'Add News';
	    $labels->edit_item = 'Edit News';
	    $labels->new_item = 'News';
	    $labels->view_item = 'View News';
	    $labels->search_items = 'Search News';
	    $labels->not_found = 'No News found';
	    $labels->not_found_in_trash = 'No News found in Trash';
	    $labels->all_items = 'All News';
	    $labels->menu_name = 'News';
	    $labels->name_admin_bar = 'News';
	}
}
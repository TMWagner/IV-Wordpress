<?php
/**
 * Navigation Menu template functions
 *
 * @uses WordPress
 * @uses Nav_Menus
 * @since 3.0.0
 */

/**
 * Filter an HTML list of nav menu items.
 *
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class EMOD_Nav_Walker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 * 
	 * This function just checks $item against a set array of menu item elements
	 * that should only be shown to logged in users, and hidden from the public
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{
	
		$members_only_menus = array("download", "documentation", "forum", "news"); //this is case sensitive
		if (in_array($item->attr_title, $members_only_menus)) {
			if (is_user_logged_in() ) {
				parent::start_el(&$output, $item, $depth, $args, $id);
			} //else don't show since user is not logged in
		} else { 
				parent::start_el(&$output, $item, $depth, $args, $id);
		}
			
	}
}

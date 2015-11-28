<?php
/**
 * WPDC List Table Interface.
 *
 * Based on WP_List_Table:
 * @see https://core.trac.wordpress.org/browser/trunk/src/wp-admin/includes/class-wp-list-table.php
 *
 * @package   wpdc-sync
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   GPL-2.0+
 * @link      http://wpdevelopersclub.com/
 * @copyright 2015 WP Developers Club
 */

namespace WPDC;

/**
 * Base class for displaying a list of items in an ajaxified HTML table.
 *
 * @access private
 *
 * @package wpdc-sync
 * @subpackage List_Table
 */
interface ListTableInterface {
	/**
	 * Checks the current user's permissions
	 *
	 * @access public
	 * @abstract
	 */
	public function ajax_user_can();

	/**
	 * Prepares the list of items for displaying.
	 * @uses WP_List_Table::set_pagination_args()
	 *
	 * @access public
	 * @abstract
	 */
	public function prepare_items();

	/**
	 * Access the pagination args.
	 *
	 * @access public
	 *
	 * @param string $key Pagination argument to retrieve. Common values include 'total_items',
	 *                    'total_pages', 'per_page', or 'infinite_scroll'.
	 *
	 * @return int Number of items that correspond to the given pagination argument.
	 */
	public function get_pagination_arg( $key );

	/**
	 * Whether the table has items to display or not
	 *
	 * @access public
	 *
	 * @return bool
	 */
	public function has_items();

	/**
	 * Message to be displayed when there are no items
	 *
	 * @access public
	 */
	public function no_items();

	/**
	 * Display the search box.
	 *
	 * @access public
	 *
	 * @param string $text The search button text
	 * @param string $input_id The search input id
	 */
	public function search_box( $text, $input_id );

	/**
	 * Display the list of views available on this table.
	 *
	 * @access public
	 */
	public function views();

	/**
	 * Get the current action selected from the bulk actions dropdown.
	 *
	 * @access public
	 *
	 * @return string|false The action name or False if no action was selected
	 */
	public function current_action();

	/**
	 * Get the current page number
	 *
	 * @access public
	 *
	 * @return int
	 */
	public function get_pagenum();

	/**
	 * Get a list of columns. The format is:
	 * 'internal-name' => 'Title'
	 *
	 * @access public
	 * @abstract
	 *
	 * @return array
	 */
	public function get_columns();

	/**
	 * Return number of visible columns
	 *
	 * @access public
	 *
	 * @return int
	 */
	public function get_column_count();

	/**
	 * Print column headers, accounting for hidden and sortable columns.
	 *
	 * @access public
	 *
	 * @staticvar int $cb_counter
	 *
	 * @param bool $with_id Whether to set the id attribute or not
	 */
	public function print_column_headers( $with_id = true );

	/**
	 * Display the table
	 *
	 * @access public
	 */
	public function display();

	/**
	 * Generate the tbody element for the list table.
	 *
	 * @access public
	 */
	public function display_rows_or_placeholder();

	/**
	 * Generate the table rows
	 *
	 * @access public
	 */
	public function display_rows();

	/**
	 * Generates content for a single row of the table
	 *
	 * @access public
	 *
	 * @param object $item The current item
	 */
	public function single_row( $item );

	/**
	 * Handle an incoming ajax request (called from admin-ajax.php)
	 *
	 * @access public
	 */
	public function ajax_response();

	/**
	 * Send required variables to JavaScript land
	 *
	 * @access public
	 */
	public function _js_vars();
}
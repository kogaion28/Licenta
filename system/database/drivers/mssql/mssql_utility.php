<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * C 
 * @since	Version 1.3.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MS SQL Utility Class
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/database/
 */
class CI_DB_mssql_utility extends CI_DB_utility {

	/**
	 * List databases statement
	 *
	 * @var	string
	 */
	protected $_list_databases	= 'EXEC sp_helpdb'; // Can also be: EXEC sp_databases

	/**
	 * OPTIMIZE TABLE statement
	 *
	 * @var	string
	 */
	protected $_optimize_table	= 'ALTER INDEX all ON %s REORGANIZE';

	/**
	 * Export
	 *
	 * @param	array	$params	Preferences
	 * @return	bool
	 */
	protected function _backup($params = array())
	{
		// Currently unsupported
		return $this->db->display_error('db_unsupported_feature');
	}

}
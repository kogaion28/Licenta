<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This 
 * @link	https://codeigniter.com
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * SQLite3 Utility Class
 *
 * @category	Database
 * @author	Andrey Andreev
 * @link	https://codeigniter.com/user_guide/database/
 */
class CI_DB_sqlite3_utility extends CI_DB_utility {

	/**
	 * Export
	 *
	 * @param	array	$params	Preferences
	 * @return	mixed
	 */
	protected function _backup($params = array())
	{
		// Not supported
		return $this->db->display_error('db_unsupported_feature');
	}

}

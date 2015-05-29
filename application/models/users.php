<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	function __construct()
	{
		parent::__construct();
		
	}

	function login($table,$field1,$field2,$select='*')
	{
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($field1);
		$this->db->where($field2);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	function loggedin($table,$field,$selector='*')
	{
		$this->db->select($selector);
		$this->db->from($table);
		$this->db->where($field);
		$query = $this->db->get();
		if ($query->num_rows == 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}
}
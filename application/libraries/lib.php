<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib
{
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function destroy_all()
	{
		$this->ci->session->sess_destroy();
		$this->ci->session->sess_create();
	}

	function login()
	{
		return $this->ci->session->userdata('username');
	}

	function logout()
	{
		$array = array(
			'username' => ''
			);
		$this->ci->session->unset_userdata($array);
	}

	function record()
	{
		return $this->ci->users->loggedin('users', array('username' => $this->login()));
	}
}
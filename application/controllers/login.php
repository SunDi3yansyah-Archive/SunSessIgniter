<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if (!empty($this->lib->login())) {
			redirect('login/loggedin');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			$this->form_validation->set_error_delimiters('<p>', '</p>');
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->encrypt->sha1(md5(sha1($this->input->post('password'))));
				$check = $this->users->login('users', array('username' => $username), array('password' => $password));
				if ($check == TRUE) {
					foreach ($check as $user) {
						$this->session->set_userdata(array(
							'username' => $user->username
							));
						redirect('login/loggedin');
					}
				} else {
					$data = array(
						'error' => 'Gagal login, silakan ulang kembali'
						);
					$this->load->view('login', $data);
				}
			} else {
				$this->load->view('login');
			}
		}
	}

	function loggedin()
	{
		if (!empty($this->lib->login())) {
			$data['me'] = $this->lib->record();
			$this->load->view('loggedin', $data);
		} else {
			redirect();
		}
		
	}

	function logout()
	{
		if (!empty($this->lib->login())) {
			$this->lib->logout();
			redirect();
		} else {
			redirect();
		}
	}
}
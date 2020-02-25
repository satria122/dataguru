<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
	}
	public function index() {
		$session = $this->session->userdata('status');
		if ($session !== 'admin') {
			$this->load->view('login');
		} 
		elseif($session == 'admin') {
			redirect('Home');
		}
	}
	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);
			$level = $_POST['level'];
			$ci_url = base_url();
			if ($level=='3'){
			$tbl = 'admin';
			$data = $this->M_auth->login("admin" , $username, $password);
			if ($data == false) {
			$this->pesan_salah();
			} else {
				$session = [
					'userdata' => $data,
					'status' => "admin",
					'ci_url'=>$ci_url
				];
				$this->session->set_userdata($session);
				redirect('Home');
			}
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
	private function pesan_salah(){
	$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
	redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
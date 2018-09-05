<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('owner/m_login');
	}

	function index(){
		$this->load->view('owner/v_login_owner');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		echo $cek = $this->m_login->cek_login($username,$password);
		if($cek == "success"){
			redirect(base_url()."owner/dashboard");
		}else{
			redirect(base_url()."owner/login");
		}
		
	}

	function logout(){
		session_destroy();
		redirect(base_url('owner/login'));
	}
}
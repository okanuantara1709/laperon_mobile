<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		echo $cek = $this->m_login->cek_login($username,$password);
		if($cek == "success"){
			$_SESSION['username'] = $username;
			redirect(base_url()."karyawan/data_karyawan");
		}else{
			redirect(base_url()."login?error=1");
		}
		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
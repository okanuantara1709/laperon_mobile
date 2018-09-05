<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('pegawai/m_login');
	}

	function index(){
		$this->load->view('pegawai/v_login_karyawan');
	}

	function aksi_login(){
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');
		// $password = md5($password);
		echo $cek = $this->m_login->cek_login($nik,$password);
		if($cek == "success"){	
				
			redirect(base_url()."pegawai/dashboard/index");
		}else{
			redirect(base_url()."pegawai/login");
		}		
	}

	function logout(){
		session_destroy();
		redirect(base_url('pegawai/login'));
	}
}
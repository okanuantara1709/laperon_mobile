<?php 


class gaji_karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('pegawai/m_gaji_karyawan');	
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['nik'])){
			redirect(base_url().'pegawai/login');
		}
	}

	function index(){
		$this->load->view('gaji/data_gaji_karyawan');		
	}

	function data_gaji_karyawan(){		
		$data = array('gaji' => $this->m_gaji_karyawan->tampil_data_karyawan($_SESSION['nik']));
		$this->load->view('pegawai/data_gaji_karyawan',$data);
	}	

	function slip_gaji($id_gaji){
		$data = array('gaji' => $this->m_gaji_karyawan->slip_gaji($id_gaji));
		$this->load->view('pegawai/slip_gaji',$data);
	}
}
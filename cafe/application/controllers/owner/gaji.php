<?php 


class gaji extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_gaji');
		$this->load->model('m_transaksi');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}
	}

	function index(){
		$this->load->view('owner/gaji/data_gaji');		
	}		

	function data_gaji(){
		$data = array('karyawan' => $this->m_gaji->tampil_data_karyawan());
		$this->load->view('owner/gaji/data_gaji',$data);
	}	

	function data_gaji_karyawan(){
		$data = array('karyawan' => $this->m_gaji->tampil_data_karyawan());
		$this->load->view('owner/gaji/data_gaji_karyawan',$data);
	}	

	function bayar_gaji($id){
		$data = array('karyawan' => $this->m_gaji->detail_karyawan($id),
					 'list_bayar' => $this->m_gaji->list_bayar($id)
						);
		$this->load->view('owner/gaji/input_gaji',$data);
	}
}
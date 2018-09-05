<?php 
class karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('owner/m_karyawan');
		$this->load->helper('url');
	}

	function data_karyawan(){
		$data = array('karyawan' => $this->m_karyawan->tampil_data_karyawan());
		$this->load->view('owner/karyawan/data_karyawan',$data);
	}

	function detail_karyawan($id){
		$data = array('karyawan' => $this->m_karyawan->lihat_detail_karyawan($id));
		$this->load->view('owner/karyawan/detail_karyawan',$data);
	}	

	function gaji_karyawan($id){
		$data = array('karyawan' => $this->m_karyawan->lihat_detail_karyawan($id),
					  'gaji' => $this->m_karyawan->lihat_gaji_karyawan($id));
		$this->load->view('owner/karyawan/gaji_karyawan',$data);
	}	
}


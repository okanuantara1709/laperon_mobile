<?php 

class M_karyawan extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}

	function tampil_data_karyawan(){
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}		

	function lihat_detail_karyawan($id_karyawan){
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}	

	function lihat_gaji_karyawan($id_karyawan){
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get('gaji');
		return $query->result_array();
	}	
}
<?php 

class M_karyawan extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}	

	function lihat_detail_karyawan($nik){
		$this->db->where('nik',$nik);
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}

	function tampil_detail_karyawan($nik){
		$this->db->where('nik',$nik);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}

	function update_data($id_karyawan,$data){
		$this->db->where('id_karyawan',$id_karyawan);
		$this->db->update('karyawan',$data);
	}	
}
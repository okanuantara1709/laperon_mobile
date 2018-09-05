<?php 

class M_gaji_karyawan extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}

	function tampil_data_karyawan($nik){
		$this->db->where('nik',$nik);
		$karyawan = $this->db->get('karyawan');
		$karyawan = $karyawan->row_array();
		$id_karyawan = $karyawan['id_karyawan'];		
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get('gaji');
		return $query->result_array();
	}	

	function slip_gaji($id_gaji){	
		$this->db->join('karyawan','karyawan.id_karyawan = gaji.id_karyawan');
		$this->db->where('id_gaji',$id_gaji);
		$query = $this->db->get('gaji');
		return $query->row_array();
	}
}
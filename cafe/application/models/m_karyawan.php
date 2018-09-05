<?php 

class M_karyawan extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}
	
	function input_data_karyawan($data){
		$this->db->insert('karyawan',$data);
	}

	function tampil_data_karyawan(){
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}

	function tampil_detail_karyawan($id_karyawan){
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}		

	function lihat_detail_karyawan($id_karyawan){
		$this->db->where('id_karyawan',$id_karyawan);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function update_data($id_karyawan,$data){
		$this->db->where('id_karyawan',$id_karyawan);
		$this->db->update('karyawan',$data);
	}
		
}
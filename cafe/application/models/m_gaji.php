<?php 

class M_gaji extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}

	function get_id_transaksi(){
		$this->db->select_max('id_transaksi');
		$this->db->limit(1);
		$query = $this->db->get("transaksi");
		if($query->num_rows() < 1){
			$id = 0;
		}else{
			$data = $query->row_array();
			$id = $data['id_transaksi']+1;
		}
		return $id;
	}
		
	function tampil_data_gaji(){		
		$query = $this->db->get('gaji');
		return $query->result_array();
	}

	function input_data_gaji($data){
		$this->db->insert('gaji',$data);
	}

	function list_bayar($id){
		$this->db->where('id_karyawan',$id);
		$this->db->order_by('id_gaji','desc');
		$query = $this->db->get('gaji');
		return $query->result_array();
	}

	function detail_karyawan($id){
		$this->db->where('id_karyawan',$id);
		$query = $this->db->get('karyawan');
		return $query->row_array();
	}

	function tampil_data_karyawan(){
		$query = $this->db->get('karyawan');
		return $query->result_array();
	}
	
}
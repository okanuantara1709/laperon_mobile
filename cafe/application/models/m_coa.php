<?php 

class M_coa extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}	

	function tampil_data_coa(){
		$query = $this->db->get('coa');
		return $query->result_array();
	}	

	function tampil_aset(){
		$this->db->where('code_coa',1);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function tampil_utang(){
		$this->db->where('code_coa',2);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function tampil_ekuitas(){
		$this->db->where('code_coa',3);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function tampil_pendapatan(){
		$this->db->where('code_coa',4);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function tampil_beban(){
		$this->db->where('code_coa',5);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function tampil_prive(){
		$this->db->where('code_coa',6);
		$query = $this->db->get('coa');
		return $query->result_array();
	}

	function input_data_coa($data){
		$code_akun = $data['code_akun'];
		$this->db->where('code_akun',$code_akun);
		$query = $this->db->get('coa');
		if($query->num_rows() > 0){
			return "gagal";
		}else{
			$this->db->insert('coa',$data);
			return "sukses";
		}
		
	}	

	function tampil_detail_coa($id_coa){
		$this->db->where('id_coa',$id_coa);
		$query = $this->db->get('coa');
		return $query->row_array();
	}

	function update_data($id_coa,$data){
		$this->db->where('id_coa',$id_coa);
		$this->db->update('coa',$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
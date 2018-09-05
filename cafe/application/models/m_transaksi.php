<?php 

class M_transaksi extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}
		
	function tampil_data_transaksi($bulan,$tahun){
		$this->db->order_by('id_transaksi','desc');
		$this->db->where('MONTH(tgl)',$bulan);
		$this->db->where('YEAR(tgl)',$tahun);
		$query = $this->db->get('transaksi');
		return $query->result_array();
	}

	function lihat_transaksi($id){
		$this->db->where('id_transaksi',$id);
		$query = $this->db->get('transaksi');
		return $query->row_array();
	}

	function input_transaksi($data){
		$this->db->insert('transaksi',$data);
		return $this->db->insert_id();
	}

	function update_transaksi($data){
		$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->update('transaksi',$data);
		return $this->db->insert_id();
	}

	function input_detail_transaksi($data){
		$this->db->insert_batch('dtl_transaksi',$data);
	}

	function update_detail_transaksi($data,$id_transaksi){

		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->delete('dtl_transaksi');

		$this->db->insert_batch('dtl_transaksi',$data);
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

	

	function tampil_data_coa(){
		$this->db->order_by('code_akun','asc');
		$query = $this->db->get("coa");
		return $query->result_array();
	}

	function tampil_detail_transaksi($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get('dtl_transaksi');
		return $query->row_array();
	}
	
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
		$this->db->where($where);
		$this->db->delete('dtl_transaksi');
	}

	function lihat_detail_transaksi($id_transaksi){
		$this->db->where('id_transaksi',$id_transaksi);
		$query = $this->db->get('dtl_transaksi');
		return $query->result_array();
	}
	
}
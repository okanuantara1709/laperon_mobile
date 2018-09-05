<?php 

class m_laporan extends CI_Model{
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}	

	function jurnal_umum($bulan,$tahun){
		$query = $this->db->query("SELECT * FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) = $bulan ORDER BY transaksi.tgl ASC");
		return $query->result_array();
	}	

	function coa_pendapatan(){
		$this->db->where('code_coa',"4");
		$this->db->order_by('code_akun','asc');
		$query = $this->db->get("coa");
		return $query->result_array();
	}

	function coa_beban(){
		$this->db->where('code_coa',"5");
		$this->db->order_by('code_akun','asc');
		$query = $this->db->get("coa");
		return $query->result_array();
	}

	function coa_hutang(){
		$this->db->where('code_coa',"2");
		$this->db->order_by('code_akun','asc');
		$query = $this->db->get("coa");
		return $query->result_array();
	} 

	function tampil_data_coa(){
		$this->db->order_by('code_akun','asc');
		$query = $this->db->get("coa");
		return $query->result_array();
	}
	function nama_coa($coa){
		$this->db->where('code_akun',$coa);
		$query = $this->db->get("coa");
		$data = $query->row_array();
		return $data['nama_akun'];
	}

	function saldo_laba_rugi($coa,$bulan,$tahun){
		$query = $this->db->query("SELECT SUM(dtl_transaksi.debit) AS debit, SUM(dtl_transaksi.kredit) AS kredit FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND dtl_transaksi.code_akun = $coa ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		return $query->row_array();

	}

	function laba_bersih($bulan,$tahun){
		$q_p = $this->db->query("SELECT SUM(dtl_transaksi.kredit) AS total  FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND coa.code_coa = 4 ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		$pen = $q_p->row_array();
		$pendapatan= $pen['total'];

		$q_u = $this->db->query("SELECT SUM(dtl_transaksi.kredit) AS total  FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND coa.code_coa = 2 ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		$utang = $q_u->row_array();
		$utang= $utang['total'];

		$q_b = $this->db->query("SELECT SUM(dtl_transaksi.debit) AS total  FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND coa.code_coa = 5 ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		$beban = $q_b->row_array();
		$beban= $beban['total'];

		return ($pendapatan-$utang)-$beban;


	}

	function penambahan_modal($bulan,$tahun){
		$q = $this->db->query("SELECT SUM(dtl_transaksi.kredit) AS total  FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND coa.code_coa = 3 ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		$modal = $q->row_array();
		return $modal['total'];
	}

	function prive($bulan,$tahun){
		$q = $this->db->query("SELECT SUM(dtl_transaksi.debit) AS total  FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) <= $bulan AND coa.code_coa = 6 ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		$modal = $q->row_array();
		return $modal['total'];
	}

	function saldo_awal($coa,$bulan_sebelumnya,$tahun_sebelumnya){
		$query = $this->db->query("SELECT SUM(dtl_transaksi.debit) AS debit, SUM(dtl_transaksi.kredit) AS kredit FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) <= $tahun_sebelumnya AND MONTH(tgl) <= $bulan_sebelumnya AND dtl_transaksi.code_akun = $coa ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		return $query->row_array();

	}

	function buku_besar($coa,$bulan,$tahun){
		$query = $this->db->query("SELECT * FROM transaksi 
						  INNER JOIN dtl_transaksi ON transaksi.id_transaksi = dtl_transaksi.id_transaksi
						  INNER JOIN coa ON coa.code_akun = dtl_transaksi.code_akun
			              WHERE YEAR(tgl) = $tahun AND MONTH(tgl) = $bulan AND dtl_transaksi.code_akun = $coa ORDER BY dtl_transaksi.id_dtl_transaksi ASC");
		return $query->result_array();
	}

	
}
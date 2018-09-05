<?php 


class transaksi extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_transaksi');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}
	}

	function index(){
		$this->load->view('transaksi/data_transaksi');		
	}		

	function data_transaksi(){
		if(empty($_GET['bulan']) && empty($_GET['tahun'])){
			$bulan = date('m');
			$tahun = date('Y');
		}else{
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
		}
		$data = array('transaksi' => $this->m_transaksi->tampil_data_transaksi($bulan,$tahun),
					  'bulan' => $bulan,
					  'tahun' => $tahun);
		$this->load->view('transaksi/data_transaksi',$data);
	}	

	function tambah(){
		$id_transaksi = $this->m_transaksi->get_id_transaksi();
		$data = array("coa_list" => $this->m_transaksi->tampil_data_coa(),
					  "id" => $id_transaksi	
					 );
		$this->load->view('transaksi/input_transaksi',$data);
	}

	function tambah_transaksi(){
		$tgl = $_POST['tgl'];
		$tgl = $date = str_replace('/', '-', $tgl);
		$tgl = date("Y-m-d",strtotime($tgl));
		$id_transaksi = $_POST['id_transaksi'];

		$total = 0;
		foreach ($_POST['code_akun'] as $key => $value) {
			$arr['id_transaksi'] = $id_transaksi;
			$arr['code_akun'] = $_POST['code_akun'][$key];			
			$arr['debit'] = $_POST['debit'][$key];
			$total += $_POST['debit'][$key];			
			$arr['kredit'] = $_POST['kredit'][$key];
			$detail[] = $arr;
		}
		$this->m_transaksi->input_detail_transaksi($detail);

		$data = array(
					'tgl' => $tgl,
					'id_transaksi' => $id_transaksi,
					'keterangan' => $_POST['keterangan'],
					'total' => $total
					);	
		$this->m_transaksi->input_transaksi($data);		
		redirect(base_url().'transaksi/data_transaksi');
	}

	function rubah_transaksi(){
		$tgl = $_POST['tgl'];
		$tgl = $date = str_replace('/', '-', $tgl);
		$tgl = date("Y-m-d",strtotime($tgl));
		$id_transaksi = $_POST['id_transaksi'];

		$total = 0;
		
		foreach ($_POST['code_akun'] as $key => $value) {
			$arr['id_transaksi'] = $id_transaksi;
			$arr['code_akun'] = $_POST['code_akun'][$key];			
			$arr['debit'] = $_POST['debit'][$key];
			$total += $_POST['debit'][$key];			
			$arr['kredit'] = $_POST['kredit'][$key];
			$detail[] = $arr;
		}
		$this->m_transaksi->update_detail_transaksi($detail,$id_transaksi);

		$data = array(
					'tgl' => $tgl,
					'id_transaksi' => $id_transaksi,
					'keterangan' => $_POST['keterangan'],
					'total' => $total					
					);	
		$this->m_transaksi->update_transaksi($data);	
		redirect(base_url().'transaksi/data_transaksi');
	}

	function rubah($id){
		$data = array(
					"coa_list" => $this->m_transaksi->tampil_data_coa(),
					'transaksi' => $this->m_transaksi->lihat_transaksi($id),
					'dtl_transaksi' => $this->m_transaksi->lihat_detail_transaksi($id)
			);
		$this->load->view('transaksi/rubah_transaksi',$data);
	}

	function hapus($id){
		$where = array('id_transaksi' => $id);
		$this->m_transaksi->hapus_data($where,'transaksi');
		redirect('transaksi/data_transaksi');
	}

	function detail_transaksi($id){
		$data = array(

					'transaksi' => $this->m_transaksi->lihat_transaksi($id),
					'dtl_transaksi' => $this->m_transaksi->lihat_detail_transaksi($id)
			);
		$this->load->view('transaksi/detail_transaksi',$data);
	}
}
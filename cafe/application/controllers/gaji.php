<?php 


class gaji extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_gaji');
		$this->load->model('m_transaksi');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}
	}

	function index(){
		$this->load->view('gaji/data_gaji');		
	}		

	function data_gaji(){
		$data = array('karyawan' => $this->m_gaji->tampil_data_karyawan());
		$this->load->view('gaji/data_gaji',$data);
	}	

	function data_gaji_karyawan(){
		$data = array('karyawan' => $this->m_gaji->tampil_data_karyawan());
		$this->load->view('gaji/data_gaji_karyawan',$data);
	}

	function bayar_gaji($id){
		$data = array('karyawan' => $this->m_gaji->detail_karyawan($id),
					 'list_bayar' => $this->m_gaji->list_bayar($id)
						);
		$this->load->view('gaji/input_gaji',$data);
	}

	function tambah_gaji(){
		$nik = $this->input->post('nik');
		$id_karyawan = $this->input->post('id_karyawan');
		$nama = $this->input->post('nama_karyawan');
		$bln = $this->input->post('bln');
		$tgl_bayar = $this->input->post('tgl_bayar');
		$tgl_bayar = $date = str_replace('/', '-', $tgl_bayar);
		$tgl_bayar = date("Y-m-d",strtotime($tgl_bayar));
		$total_gaji = $this->input->post('total_gaji');	

		$data = array(
			'id_karyawan' => $id_karyawan,
			'gaji_bulan' => $bln,			
			'tanggal_bayar' => $tgl_bayar,
			'total_gaji' => $total_gaji
		);

		$this->m_gaji->input_data_gaji($data);

		// input ke table transaksi
		$id_transaksi = $this->m_transaksi->get_id_transaksi();
		$detail_transaksi[0] = [
								'code_akun' => '5.1',
								'id_transaksi' => $id_transaksi,
								'debit' => $total_gaji,
								'kredit' => 0
								];
		$detail_transaksi[1] = [
								'code_akun' => '1.1',
								'id_transaksi' => $id_transaksi,
								'debit' => 0,
								'kredit' => $total_gaji
								];

		$this->m_transaksi->input_detail_transaksi($detail_transaksi);
		$gaji = array(
					'tgl' => $tgl_bayar,
					'id_transaksi' => $id_transaksi,
					'keterangan' => "pembayaran gaji $nama",
					'total' => $total_gaji
					);

		$this->m_transaksi->input_transaksi($gaji);

		redirect('gaji/data_gaji');
	}	
}
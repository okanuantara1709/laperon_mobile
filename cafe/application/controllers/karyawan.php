<?php 


class karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_karyawan');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}
	}

	function tambah(){
		
		$this->load->view('karyawan/input_karyawan');
	}	

	function rubah($id){
		$data = array('karyawan' => $this->m_karyawan->tampil_detail_karyawan($id),
						'id' => $id);
		$this->load->view('karyawan/rubah_karyawan',$data);
	}	

	function data_karyawan(){
		$data = array('karyawan' => $this->m_karyawan->tampil_data_karyawan());
		$this->load->view('karyawan/data_karyawan',$data);
	}	

	function detail_karyawan($id){
		$data = array('karyawan' => $this->m_karyawan->lihat_detail_karyawan($id));
		$this->load->view('karyawan/detail_karyawan',$data);
	}	

	function tambah_karyawan(){
		$nik = $this->input->post('nik');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat = $this->input->post('alamat');
		$tgl = $this->input->post('tgl');
		$no_tlp = $this->input->post('no_tlp');
		$jabatan = $this->input->post('jabatan');
		$status = $this->input->post('status');
		$password = $this->input->post('password');

		$data = array(
			'nik' => $nik,
			'nama_karyawan' => $nama_karyawan,
			'alamat' => $alamat,
			'tgl' => $tgl,
			'no_tlp' => $no_tlp,
			'jabatan' => $jabatan,
			'status' => $status,
			'password' => $password
			);
		$this->m_karyawan->input_data_karyawan($data);
		redirect('karyawan/data_karyawan');
	}

	function hapus($id){
		$where = array('id_karyawan' => $id);
		$this->m_karyawan->hapus_data($where,'karyawan');
		redirect('karyawan/data_karyawan');
	}

	function update_karyawan(){
		$id_karyawan = $this->input->post('id_karyawan');		
		$nik = $this->input->post('nik');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat = $this->input->post('alamat');
		$tgl = $this->input->post('tgl');
		$no_tlp = $this->input->post('no_tlp');
		$jabatan = $this->input->post('jabatan');
		$status = $this->input->post('status');
		$password = $this->input->post('password');

		$data = array(
			'nik' => $nik,
			'nama_karyawan' => $nama_karyawan,
			'alamat' => $alamat,
			'tgl' => $tgl,
			'no_tlp' => $no_tlp,
			'jabatan' => $jabatan,
			'status' => $status,
			'password' => $password
			);		

		$this->m_karyawan->update_data($id_karyawan,$data);		
		redirect('karyawan/data_karyawan');
	}	

}
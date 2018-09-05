<?php

class karyawan extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('pegawai/m_karyawan');	
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['nik'])){
			redirect(base_url().'pegawai/login');
		}
	}

	function detail_karyawan(){
		$data = array('karyawan' => $this->m_karyawan->lihat_detail_karyawan($_SESSION['nik']));
		$this->load->view('pegawai/karyawan/detail_karyawan',$data);
	}

	function rubah(){
		$data = array('karyawan' => $this->m_karyawan->tampil_detail_karyawan($_SESSION['nik']));
		$this->load->view('pegawai/karyawan/rubah_karyawan',$data);
	}	

	function update_karyawan(){
		$id_karyawan = $this->input->post('id_karyawan');		
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat = $this->input->post('alamat');
		$tgl = $this->input->post('tgl');
		$no_tlp = $this->input->post('no_tlp');
		$jabatan = $this->input->post('jabatan');
		$status = $this->input->post('status');

		$data = array(
			'nama_karyawan' => $nama_karyawan,
			'alamat' => $alamat,
			'tgl' => $tgl,
			'no_tlp' => $no_tlp,
			'jabatan' => $jabatan,
			'status' => $status
			);		

		$this->m_karyawan->update_data($id_karyawan,$data);		
		redirect('pegawai/karyawan/detail_karyawan');
	}
}
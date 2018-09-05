<?php 


class coa extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_coa');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}	}

	function index(){
		$this->load->view('coa/data_coa');		
	}	

	function data_coa(){
		$data = array('coa' => $this->m_coa->tampil_data_coa(),
						'aset' => $this->m_coa->tampil_aset(),
						'utang' => $this->m_coa->tampil_utang(),
						'ekuitas' => $this->m_coa->tampil_ekuitas(),
						'pendapatan' => $this->m_coa->tampil_pendapatan(),
						'beban' => $this->m_coa->tampil_beban(),
						'prive' => $this->m_coa->tampil_prive()
						);
		$this->load->view('setting/data_coa',$data);
	}	

	function tambah(){
		$this->load->view('setting/tambah_coa');
	}

	function tambah_coa(){
		$code_akun = $this->input->post('code_akun');
		$nama_akun = $this->input->post('nama_akun');
		$code_coa = $this->input->post('code_coa');				
		$data = array(	
			'code_akun' => $code_coa.".".$code_akun,	
			'nama_akun' => $nama_akun,	
			'code_coa' => $code_coa					
			);
		$coa = $this->m_coa->input_data_coa($data);
		if($coa == "sukses"){
			redirect('coa/data_coa');
		}else{
			redirect('coa/tambah?status=error');
		}
	}

	function rubah($id){
		$data = array('coa' => $this->m_coa->tampil_detail_coa($id),
						'id' => $id);
		$this->load->view('setting/rubah_coa',$data);
	}

	function update_coa(){
		$id_coa = $this->input->post('id_coa');
		$code_akun = $this->input->post('code_akun');
		$nama_akun = $this->input->post('nama_akun');
		$code_coa = $this->input->post('code_coa');

		$data = array(
			'code_akun' => $code_akun,	
			'nama_akun' => $nama_akun,	
			'code_coa' => $code_coa
			);		

		$this->m_coa->update_data($id_coa,$data);		
		redirect('coa/data_coa');
	}

	function hapus($id){
		$where = array('id_coa' => $id);
		$this->m_coa->hapus_data($where,'coa');
		redirect('coa/data_coa');
	}
}
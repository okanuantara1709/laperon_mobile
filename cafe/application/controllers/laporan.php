<?php 
class laporan extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('m_laporan');
		$this->load->helper('url');
		$this->load->library('session');
		if(empty($_SESSION['username'])){
			redirect(base_url().'/login');
		}
		
	}


	function data_jurnal_umum(){
		// echo $_SESSION['username'];
		$bulan = date('m');
		$tahun = date('Y');
		if(!empty($_GET['bulan']) && !empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
		}



		$data = array(
						'jurnal_umum' => $this->m_laporan->jurnal_umum($bulan,$tahun)
					  );

		$this->load->view('laporan/data_jurnal_umum',$data);
	}

	function data_buku_besar(){
		$bulan = date('m');
		$tahun = date('Y');
		$coa = "1.1";
		if(!empty($_GET['bulan']) && !empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$coa = $_GET['coa'];
		}
		if($bulan == "01"){
			$bulan_sebelumnya = "12";
			$tahun_sebelumnya = date('Y',strtotime(' -1 year',strtotime("15-$bulan-$tahun")));
		}else{
			$bulan_sebelumnya = date('m',strtotime(' -1 month',strtotime("15-$bulan-$tahun")));
			$tahun_sebelumnya = $tahun;
		}
		
		$data = array(
					"coa_list" => $this->m_laporan->tampil_data_coa(),
					'saldo_awal' => $this->m_laporan->saldo_awal($coa,$bulan_sebelumnya,$tahun_sebelumnya),
					'buku_besar' => $this->m_laporan->buku_besar($coa,$bulan,$tahun),
					'nama_coa' =>  $this->m_laporan->nama_coa($coa),
					'coa' => $coa
					);
		$this->load->view('laporan/data_buku_besar',$data);
	}

	function data_neraca_saldo(){
		$bulan = date('m');
		$tahun = date('Y');
		if(!empty($_GET['bulan']) && !empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
		}

		$coa_list = $this->m_laporan->tampil_data_coa();
		foreach ($coa_list as $key => $value) {
			$saldo= $this->m_laporan->saldo_awal($value['code_akun'],$bulan,$tahun);
			$arr['code_akun'] = $value['code_akun'];
			$arr['nama_akun'] = $value['nama_akun'];
			$arr['debit'] = $saldo['debit'];
			$arr['kredit'] = $saldo['kredit'];
			$neraca[] = $arr;
		}
		$data = array('neraca_saldo' => $neraca);
		$this->load->view('laporan/data_neraca_saldo',$data);
	}

	function data_laba_rugi(){
		$bulan = date('m');
		$tahun = date('Y');
		if(!empty($_GET['bulan']) && !empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
		}

		$pendapatan = $this->m_laporan->coa_pendapatan();
		// echo print_r($pendapatan);
		foreach ($pendapatan as $key => $value) {
			$saldo= $this->m_laporan->saldo_laba_rugi($value['code_akun'],$bulan,$tahun);
			$arr['code_akun'] = $value['code_akun'];
			$arr['nama_akun'] = $value['nama_akun'];
			$arr['debit'] = $saldo['debit'];
			$arr['kredit'] = $saldo['kredit'];
			$pendapatan_list[] = $arr;
		}

		$hutang = $this->m_laporan->coa_hutang();

		foreach ($hutang as $key => $value) {
			$saldo= $this->m_laporan->saldo_laba_rugi($value['code_akun'],$bulan,$tahun);
			$arr['code_akun'] = $value['code_akun'];
			$arr['nama_akun'] = $value['nama_akun'];
			$arr['debit'] = $saldo['debit'];
			$arr['kredit'] = $saldo['kredit'];
			$hutang_list[] = $arr;
		}
		// echo print_r($hutang_list);

		$beban = $this->m_laporan->coa_beban();
		// echo print_r($beban);
		foreach ($beban as $key => $value) {
			$saldo= $this->m_laporan->saldo_laba_rugi($value['code_akun'],$bulan,$tahun);
			$arr['code_akun'] = $value['code_akun'];
			$arr['nama_akun'] = $value['nama_akun'];
			$arr['debit'] = $saldo['debit'];
			$arr['kredit'] = $saldo['kredit'];
			$beban_list[] = $arr;
		}

		$data = array(
						'pendapatan' => $pendapatan_list,
						'beban' => $beban_list,
						'hutang' => $hutang_list
					);
		$this->load->view('laporan/data_laba_rugi',$data);
	}

	function modal_awal($bulan,$tahun){
		$prive =  $this->m_laporan->prive($bulan,$tahun);
		$laba_bersih = $this->m_laporan->laba_bersih($bulan,$tahun);
		$penambahan_modal = $this->m_laporan->penambahan_modal($bulan,$tahun);
		$total = ($laba_bersih+$penambahan_modal)-$prive;
		return $total;
	}

	function data_perubahan_modal(){
		$bulan = date('m');
		$tahun = date('Y');
		if(!empty($_GET['bulan']) && !empty($_GET['tahun'])){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
		}
		
		$bulan_sebelumnya = "12";
		$tahun_sebelumnya = date('Y',strtotime(' -1 year',strtotime("15-$bulan-$tahun")));

		$modal_awal = $this->modal_awal($bulan_sebelumnya,$tahun_sebelumnya);
		$laba_bersih = $this->m_laporan->laba_bersih($bulan,$tahun);
		$prive =  $this->m_laporan->prive($bulan,$tahun);
		// $penambahan_modal = $this->m_laporan->penambahan_modal($bulan,$tahun);

		$data = array(
			'laba_bersih' => $laba_bersih,
			// 'penambahan_modal' => $penambahan_modal,
			'prive' => $prive,
			'modal_awal' => $modal_awal
		);
		$this->load->view('laporan/data_perubahan_modal',$data);
	}
}

 ?>
<?php 

class M_login extends CI_Model{	
	function __construct(){
		parent::__construct();				
		$this->load->library('session');
		$this->load->database();
	}
	function cek_login($username,$pass){	
		$this->db->where('username',$username);
		$this->db->where('password',$pass);
		$query = $this->db->get('owner');
		if($query->num_rows() > 0){
			$status = "success";
			$owner = $query->row_array();
			$_SESSION['owner'] = $admin['username'];
		}else{
			$status = "error";
		}
		return $status;
	}	
}
<?php
class ValidationModel extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function createNewUser($key){

		$data = array(
		'nRusername' => $this->input->post('username'),
		'nRemail' => $this->input->post('email'),
		'nRkey' => $key
		);

		$query = $this->db->insert('nRuser', $data);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
}
<?php
class NewRootsModel extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getPassword($password){
		
		//$this->db->select('nRpassword', 'nRuserId');//passes variables into database
		
		$query =$this->db->get_where('nRuser', array('nRpassword' => $password));//querys database
		$row = $query->result_array();
		print_r($row);
		if ($row >0){
			return $row[0]['nRuserId'];
		}else{
			return false;
		}
	}/*
	public function getEmail($email){
		$this->db->select('nRemail');//passes variables into database
		$query =$this->db->get_where('nRuser', array('nRemail' => $email));//querys database

		$row = $query->result();
		if($row > 0){
			return true;
		}else{
			return false;
		}
	}*/
	public function updatePassword($npass, $id){
		$data = array(
			'nRpassword' => $npass  // get new password 
			);
		$this->db->where('nRuserId', $id); // check id
		$this->db->update('nRuser', $data);// change password

		$data['page_title'] = 'New Roots - Update';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['homepage'] = site_url('newRoots/homePage');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('pass_success', $data);
		$this->load->view('footer');

	}
	public function updateMail(){

	}
	public function getUsernamePass($username, $password){

		$this->db->select('nRusername, nRemail');//passes variables into database
		$query =$this->db->get_where('nRuser', array('nRusername' => $username, 'nRpassword' => $password));//querys database

		foreach ($query->result() as $row)//if result is empty will not return an object
		{	//place new data in session data
			$newdata = array(
				'nRusername' => $username,
				'logged_in' => TRUE
				);
			$this->session->set_userdata($newdata);
			
			//redirect to the home page
			redirect('/newRoots/homePage/');// redirects to the home page
		}
	}// end public function
	public function logout(){
		// remove data from session
		$newdata = array(
				'nRusername' => "",
				'nRemail' => "",
				'logged_in' => FALSE
				);
			$this->session->unset_userdata($newdata);
	}// end public function
	public function getData($url){

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	ob_start();
	//execute post
	curl_exec($ch);

	$result = ob_get_contents();
	ob_end_clean();
	//close connection
	curl_close($ch);
	
	return $result;
	}
	
}
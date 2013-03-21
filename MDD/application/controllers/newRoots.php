<?php
class NewRoots extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newRootsModel');
	}//end constructor
	public function index()
	{
		$data['page_title'] = 'New Roots';//sets page title
		
		$username = $this->input->post('nRusername');
		$email = $this->input->post('nRemail');
		//$username=empty($_POST['nRusername']) ? '' : trim($_POST['nRusername']);
		//$email=empty($_POST['nRemail']) ? '' : trim($_POST['nRemail']);
		
		if(!empty($username) && !empty($email)){
			$this->newRootsModel->getUsernameEmail($username, $email);
		}


		//$ZID='X1-ZWz1dff33xsnwr_1vfab';
		//$search=$_POST['Search'];
		//$data['sid'] = $ZID.'&amp;'.$address.'&amp;'.$zip;


		//$this->newRootsModel->getData();
		//}
		//$data['user'] $this->mentor_model->getLatestNames();
		//$address=empty($_POST['address']) ? '' : trim($_POST['address']);
		//$zip=empty($_POST['zip']) ? '' : trim($_POST['zip']);
		//$ZID='X1-ZWz1dff33xsnwr_1vfab';
		//$search = $ZID.'&amp;'.$address.'&amp;'.$zip;

		//if(!empty($address) && !empty($zip)){
		//	$search = $this->newRootsModel->getData();
		//}
		//$this->newRootsModel->getRate();
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
		
	}// end public function
	public function getSearch(){
		
		/*$address=empty($_POST['address']) ? '' : trim($_POST['address']);
		$zip=empty($_POST['zip']) ? '' : trim($_POST['zip']);
		$ZID='X1-ZWz1dff33xsnwr_1vfab';
		$search=$_POST['Search'];
		$sid = $ZID.'&amp;'.$address.'&amp;'.$zip;*/
		

		$this->load->view('header', $data);
		$this->load->view('test');
		$this->load->view('footer');

	}
	public function homePage(){
		$data['page_title'] = 'New Roots - Homepage';

		$this->load->view('header', $data);
		$this->load->view('test');
		$this->load->view('footer');
	}
}
?>
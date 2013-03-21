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
		
		$username = $this->input->post('nRusername');//creates post for username
		$email = $this->input->post('nRemail');// creates post for email
		
		$newdata = array(
				'logged_in' => FALSE
				);
		$session_id = $this->session->set_userdata($newdata);//adds data of logged in in the session data
		//$session_id = $this->session->all_userdata();
		//print_r($session_id);
		if(!empty($username) && !empty($email)){
			$this->newRootsModel->getUsernameEmail($username, $email);//calls function to check username and password
		}
		// loads views
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
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page
		
		//$session_id = $this->session->all_userdata();
		//print_r($session_id);

		$this->load->view('header', $data);
		$this->load->view('homepage');
		$this->load->view('footer');
	}
	public function logout(){
		$data['page_title'] = 'New Roots - Logout';
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots');

		$this->load->view('header', $data);
		$this->load->view('logout');
		$this->load->view('footer');

	}
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
?>
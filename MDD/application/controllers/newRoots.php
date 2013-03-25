<?php
class NewRoots extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newRootsModel');
		$this->load->model('validationModel');
	}//end constructor
	public function index()
	{
		$data['page_title'] = 'New Roots';//sets page title
		// ------ LOGIN 
		$username = $this->input->post('nRusername');//creates post for username
		$email = $this->input->post('nRemail');// creates post for email
		
		$newdata = array(
				'logged_in' => FALSE
				);

		$session_id = $this->session->set_userdata($newdata);//adds data of logged in in the session data

		//$session_id = $this->session->all_userdata();
		//print_r($sUusername);
		
		// --------------------------- LOGIN Direct
		if(!empty($username) && !empty($email)){
			$this->newRootsModel->getUsernameEmail($username, $email);//calls function to check username and password	
		}
	
		
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}//end public function
	public function signup(){

		$data['page_title'] = 'New Roots - Sign Up';//sets page title
		
		$this->load->view('header', $data);
		$this->load->view('signup');
		$this->load->view('footer');
	}
	public function signupValidation(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[12]|is_unique[nRuser.nRusername]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[nRuser.nRemail]');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'trim|required|matches[email]');
		
		$this->form_validation->set_message('is_unique', "That name is already in use");
		
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->load->view('signup');

		}
		else
		{
			$key = md5(uniqid());
			$newdata = array(
				'nRusername' => $this->input->post('username'),
				'nRemail' => $this->input->post('email'),
				'logged_in' => TRUE
				);
			$this->session->set_userdata($newdata);

			//print_r($this->session->all_userdata());

			$this->validationModel->createNewUser($key);

			$this->load->view('homepage');
			/*$this->load->library('email', array('mailtype'=>'html'));

			$this->email->from('jbdeveloper@hotmail.com', "Jon");
			$this->email->to($this->input->post('email'));
			$this->email->subject("Confirm your New Roots Account");

			$message = "<p>Thanks for signing up with New Roots!</p>";
			$message .= "<p><a href='".base_url()."newRoots/register/$key'>Click Here</a> to confirm your account</p>";
			
			$this->email->message($message);

			if ($this->email->send()){
				echo 'Email sent';
			}else{
				echo "email Failed!";
				
			//$this->load->view('signupSuccess');	*/
		}
		
		

		
	}// end public function
	public function register($key){

	}
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
		
		$this->load->view('header', $data);
		$this->load->view('homepage');
		$this->load->view('footer');
	}
	public function logout(){
		$data['page_title'] = 'New Roots - Logout';//set title of homepage
		$data['signin'] = site_url('newRoots');

		if($this->session->userdata('logged_in') == TRUE){
		$this->newRootsModel->logout();
		}
		$this->session->sess_destroy();

		$this->load->view('header', $data);
		$this->load->view('logout', $data);
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
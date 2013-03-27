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
	
		// -------------------------Load Views
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}//end public function
	public function signup(){

		$data['page_title'] = 'New Roots - Sign Up';//sets page title
		
		// -------------------------Load Views
		$this->load->view('header', $data);
		$this->load->view('signup');
		$this->load->view('footer');
	}
	public function signupValidation(){
		$this->load->library('form_validation');
		
		// validats form input
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]|max_length[12]|is_unique[nRuser.nRusername]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[nRuser.nRemail]');
		$this->form_validation->set_rules('emailconf', 'Email Confirmation', 'trim|required|matches[email]');
		
		// message if username or email already exists
		$this->form_validation->set_message('is_unique', "That name is already in use");
		
		if ($this->form_validation->run())
		{
			// if true create new session
			$key = md5(uniqid());
			$newdata = array(
				'nRusername' => $this->input->post('username'),
				'nRemail' => $this->input->post('email'),
				'logged_in' => TRUE
				);
			$this->session->set_userdata($newdata);

			//print_r($this->session->all_userdata());
			
			// create new user
			$this->validationModel->createNewUser($key);

			$data['page_title'] = 'New Roots - Signupp Success';//set title of page
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['homepage'] = site_url('newRoots/homePage');//links to home page
			//load home page
			$this->load->view('header', $data);
			$this->load->view('signupSuccess');
			$this->load->view('footer');

			//redirect('/newRoots/homePage/');
		}
		else
		{	
			// reload form if false
			$data['page_title'] = 'New Roots - Sign Up';//sets page title
			// -------------------------Load Views
			$this->load->view('header', $data);
			$this->load->view('signup');
			$this->load->view('footer');

		}
	}// end public function
	
	public function homePage(){
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$data['home'] = site_url('searchInfo');
		$data['school'] = site_url('searchInfo/schoolSearch');
		$data['mortgage'] = site_url('searchInfo/mortgageCalc');
		
		// -------------------------Load Views
		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('homepage');
		$this->load->view('footer');
	}//end of public function
	public function logout(){
		$data['page_title'] = 'New Roots - Logout';//set title of homepage
		$data['signin'] = site_url('newRoots');

		if($this->session->userdata('logged_in') == TRUE){
		$this->newRootsModel->logout();//logout user
		}
		$this->session->sess_destroy();//destroy session

		// -------------------------Load Views
		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('logout', $data);
		$this->load->view('footer');

	}//end of public function
	
}

?>
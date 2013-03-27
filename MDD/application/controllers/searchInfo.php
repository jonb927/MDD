<?php
class SearchInfo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newRootsModel');
		$this->load->model('validationModel');
	}//end constructor
	public function index()
	{
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page
			
		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('home_info');
		$this->load->view('footer');
	}
	public function getHomeSearch(){
		$this->load->library('form_validation');
		
		// validats form input
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('citystatezip', 'CityStateZip', 'trim|required|alpha_numeric');
		
		// message if username or email already exists
		if ($this->form_validation->run())
		{
			// get result and change to xml format
			$result = $this->newRootsModel->getData();
			$xml = simplexml_load_string($result);
			
			setlocale(LC_MONETARY, 'en_US');
			//money_format('%.0n', );


			$data['address'] = $this->input->post('address');
			$data['csz'] = $this->input->post('citystatezip');
			$data['amount'] = $xml->response->results->result[0]->zestimate->amount;
			$data['market'] = $xml->response->results->result[0]->zestimate->attributes->deprecated;

			if($xml->response->results->result[0]->zestimate->attributes->deprecated == TRUE){
				$data['market'] = 'home values in this are have depreciated';
			}else{
				$data['market'] = 'home values in this area have not depreciated';
			}


			$data['page_title'] = 'New Roots - Homepage';//set title of homepage
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['default'] = site_url('newRoots/logout');//links to default page
				
			$this->load->view('header', $data);
			$this->load->view('nav', $data);
			$this->load->view('home_info');
			$this->load->view('result', $data);
			$this->load->view('footer');
			
			//var_dump($address);
			//redirect('/newRoots/homePage/');
		}
		else
		{	
			echo 'error';
		

		}

	}
		public function schoolSearch(){
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('school_info');
		$this->load->view('footer');
	}//end of public function
	public function mortgageCalc(){
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('mortgage_info');
		$this->load->view('footer');
	}//end of public function
	public function profile(){
		$data['page_title'] = 'New Roots - Homepage';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('profile');
		$this->load->view('footer');
	}//end of public function
}
?>
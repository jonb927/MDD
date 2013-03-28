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
		if ($this->form_validation->run() == FALSE)
		{	
			echo 'error';
		}else{
			$data['address'] = $this->input->post('address');//get post data
			$data['csz'] = $this->input->post('citystatezip');//get post data		
			$ZID = 'X1-ZWz1dff33xsnwr_1vfab';
			//create URL
			$url = 'http://www.zillow.com/webservice/GetSearchResults.htm?zws-id='.$ZID.'&citystatezip='.$data['csz'].'&address='.rawurlencode($data['address']);		

			// get result and change to xml format
			$result = $this->newRootsModel->getData($url);
			$xml = simplexml_load_string($result);
			
			// set money format
			setlocale(LC_MONETARY, 'en_US');
			
			if($xml->message->code > 0){

			$data['page_title'] = 'New Roots - Homepage';//set title of homepage
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['default'] = site_url('newRoots/logout');//links to default page

			$this->load->view('header', $data);
			$this->load->view('nav', $data);
			$this->load->view('home_info');
			$this->load->view('error');
			$this->load->view('footer');
			}else{

			//traverse xml data
			$data['amount'] = $xml->response->results->result[0]->zestimate->amount;
			$data['lamount'] = $xml->response->results->result[0]->zestimate->valuationRange->low;
			$data['hamount'] = $xml->response->results->result[0]->zestimate->valuationRange->high;

			if($xml->response->results->result[0]->zestimate->attributes->deprecated == 0){
				$data['market'] = 'Home values in this area have depreciated.';
			}else{
				$data['market'] = 'Home values in this area have not depreciated.';
			}

			//load response page
			$data['page_title'] = 'New Roots - Homepage';//set title of homepage
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['default'] = site_url('newRoots/logout');//links to default page
				
			$this->load->view('header', $data);
			$this->load->view('nav', $data);
			$this->load->view('home_info');
			$this->load->view('result', $data);
			$this->load->view('footer');
			}
			//var_dump($address);
			//redirect('/newRoots/homePage/');
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
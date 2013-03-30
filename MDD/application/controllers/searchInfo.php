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
			$this->load->view('home_result', $data);
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
	public function getSchoolSearch(){
		$this->load->library('form_validation');
		// validats form input
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		


		if ($this->form_validation->run())
		{	
			$data['address'] = $this->input->post('address');//get post data
			$data['city'] = $this->input->post('city');//get post data
			$data['state'] = $this->input->post('state');//get post data				
			$gsid = '2ytcxzypycsu5zatgvtvmwxx';
			
			$url = 'http://api.greatschools.org/schools/nearby?key='.$gsid.'&amp;address='.urlencode($data['address']).'&city='.$data['city'].'&state='.$data['state'].'&radius=10&limit=8';
			//print_r($url);
			$result = $this->newRootsModel->getData($url);
			$xml = simplexml_load_string($result);

			$data['page_title'] = 'New Roots - Homepage';//set title of homepage
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['default'] = site_url('newRoots/logout');//links to default page

			$this->load->view('header', $data);
			$this->load->view('nav');
			$this->load->view('school_info');
			
			foreach($xml->school as $key){
				$data['school'] = $key->name;
				$data['stype'] = $key->type;
				$data['grades'] = $key->gradeRange;
				$data['saddress'] = $key->address;
				$data['rating'] = $key->gsRating;

				$data['olink'] = $key->overviewLink;
				$data['ratlink'] = $key->ratingslink;
				$data['revlink'] = $key->reviewsLink;
			
				$this->load->view('school_result', $data);
				
			}
			$this->load->view('footer');
		}else{
			echo 'error';
		}
		
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
	public function getMortgageCalc(){
		$this->load->library('form_validation');
		
		// validats form input
		$this->form_validation->set_rules('price', 'Sale Price', 'trim|required');
		$this->form_validation->set_rules('downpay', 'Money Down', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required|alpha_numeric');
		
		// message if username or email already exists
		if ($this->form_validation->run() == FALSE)
		{	
			echo 'error';
		}else{
			$data['price'] = $this->input->post('price');//get post data
			$data['zip'] = $this->input->post('zip');//get post data
			$data['downpay'] = $this->input->post('downpay');//get post data		
			$ZID = 'X1-ZWz1dff33xsnwr_1vfab';
			//create URL
			$url = 'http://www.zillow.com/webservice/GetMonthlyPayments.htm?zws-id='.$ZID.'&price='.$data['price'].'&zip='.$data['zip'].'&dollarsdown='.$data['downpay'].'&output=json';		

			// get result and change to xml format
			$result = $this->newRootsModel->getData($url);
			$mort = json_decode($result);
			
			// set money format
			setlocale(LC_MONETARY, 'en_US');

			$data['rate30'] = $mort->response->thirtyYearFixed->rate;
			$data['pay30'] = $mort->response->thirtyYearFixed->monthlyPrincipalAndInterest;
			$data['pmi30'] = $mort->response->thirtyYearFixed->monthlyMortgageInsurance;
			$data['rate15'] = $mort->response->fifteenYearFixed->rate;
			$data['pay15'] = $mort->response->fifteenYearFixed->monthlyPrincipalAndInterest;
			$data['pmi15'] = $mort->response->fifteenYearFixed->monthlyMortgageInsurance;

			//load response page
			$data['page_title'] = 'New Roots - Mortgage Calc';//set title of homepage
			$data['user'] = $this->session->userdata('nRusername');//sets username
			$data['default'] = site_url('newRoots/logout');//links to default page
				
			$this->load->view('header', $data);
			$this->load->view('nav', $data);
			$this->load->view('mortgage_info');
			$this->load->view('mortgage_result', $data);
			$this->load->view('footer');
			}
	}
	public function profile(){
		$data['page_title'] = 'New Roots - Profile';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['email'] = $this->session->userdata('nRemail');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav');
		$this->load->view('profile');
		$this->load->view('footer');
	}//end of public function
	public function changePass(){
		$data['page_title'] = 'New Roots - Update';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('update_pass', $data);
		$this->load->view('footer');
	}
	public function updatePass(){
		//validate form
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$this->form_validation->set_rules('npassword', 'New Password', 'trim|required|min_length[5]|max_length[12]|is_unique[nRuser.nRpassword]|md5');
		$this->form_validation->set_rules('cnpassword', 'New Password', 'trim|required|matches[npassword]');
		
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		$password = $this->input->post('password');//creates post for password
		$npassword = $this->input->post('npassword');//creates post for new password
		$cnpassword = $this->input->post('cnpassword');//creates post for confirmed password
		$pass = md5($password);
		$npass = md5($npassword);
		//var_dump($pass);
		$id = $this->newRootsModel->getPassword($pass);//calls function to check password	
		var_dump($id);
		$this->newRootsModel->updatePassword($npass, $id);
		
		}// end of public function
	public function passSuccess(){
		$data['page_title'] = 'New Roots - Update';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('pass_success');
		$this->load->view('footer');
	}	
	public function changeEmail(){
		$data['page_title'] = 'New Roots - Update';//set title of homepage
		$data['user'] = $this->session->userdata('nRusername');//sets username
		//$data['email'] = $this->session->userdata('nRemail');//sets username
		$data['default'] = site_url('newRoots/logout');//links to default page

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		$this->load->view('update_email', $data);
		$this->load->view('footer');
	}// end of public function*/
}
?>
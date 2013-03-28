<?php
class NewRootsModel extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function getUsernameEmail($username, $email){

		$this->db->select('nRusername, nRemail');//passes variables into database
		$query =$this->db->get_where('nRuser', array('nRusername' => $username, 'nRemail' => $email));//querys database

		foreach ($query->result() as $row)//if result is empty will not return an object
		{	//place new data in session data
			$newdata = array(
				'nRusername' => $username,
				'nRemail' => $email,
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
		//$address  = $this->input->post('address');
		
		//$csz = $this->input->post('citystatezip');
		
		//$ZID = 'X1-ZWz1dff33xsnwr_1vfab';
		//$url = 'http://www.zillow.com/webservice/GetSearchResults.htm?zws-id='.$ZID.'&citystatezip='.$csz.'&address='.rawurlencode($address);
			
		//set POST variables
		//$url ='http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&citystatezip=DE&address=226 Camerton Lane';
	 	//$url =http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab
		//$url ='http://www.zillow.com/webservice/GetDemographics.htm?zws-id='.$ZID.'&state='.$csz.'&city='.rawurlencode($address);
		
		////// GREAT SCHOOLS API
		// KEY 2ytcxzypycsu5zatgvtvmwxx
	//$url = 'http://api.greatschools.org/schools/nearby?key=2ytcxzypycsu5zatgvtvmwxx&state=DE&zip=19734&schoolType=private&limit=8';


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
	

	$xml = simplexml_load_string($result);

	//$address = $xml->response->results->result[0]->zestimate->amount;
	
	//echo "<pre>"; var_dump($xml); echo "</pre>";
	//return $chart = new simplexml_load_string($result);
	//return $response->results->result[0]->zpid;
	return $result;
	}
	
}
<?php
class NewRootsModel extends CI_Model {

	public function __construct(){
	
		$this->load->database();
	}
	public function getData(){

	//set POST variables
	$url ='http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&citystatezip=19734&address=226 Camerton Lane';
 
	//'http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id='.$search
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

	//return $chart = new simplexml_load_string($result);
	//return $response->results->result[0]->zpid;

	}
	
}
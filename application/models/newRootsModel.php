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

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);

	return $result->result_array();

	}
}
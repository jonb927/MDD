<?php
class NewRoots extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newRootsModel');
	}//end constructor
	public function index()
	{
		$data['page_title'] = 'New Roots';
		
		$address=empty($_POST['address']) ? '' : trim($_POST['address']);
		$zip=empty($_POST['zip']) ? '' : trim($_POST['zip']);
		$ZID='X1-ZWz1dff33xsnwr_1vfab';
		//$search=$_POST['Search'];
		$data['sid'] = $ZID.'&amp;'.$address.'&amp;'.$zip;


		//if($_POST['Search'] !== 'Search'){
		//	$data['check']='empty';}
		//	$this->load->helper('url');
		$this->newRootsModel->getData();
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
}
?>
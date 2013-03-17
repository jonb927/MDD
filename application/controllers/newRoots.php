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
		//$data['user'] $this->mentor_model->getLatestNames();
		//$address=empty($_POST['address']) ? '' : trim($_POST['address']);
		//$zip=empty($_POST['zip']) ? '' : trim($_POST['zip']);
		//$ZID='X1-ZWz1dff33xsnwr_1vfab';
		//$search = $ZID.'&amp;'.$address.'&amp;'.$zip;

		//if(!empty($address) && !empty($zip)){
		//	$search = $this->newRootsModel->getData();
		//}
		//$this->newRootsModel->getData();
		$this->load->view('header', $data);
		$this->load->view('test');
		$this->load->view('footer');
		
	}// end public function
}
?>
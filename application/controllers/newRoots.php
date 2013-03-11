<?php
class NewRoots extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('newRootsModel');
	}
	public function index()
	{
		//$data['users'] = $this->mentor_model->getLatestNames();
		
		$this->load->view('header');
		$this->load->view('test');
		$this->load->view('footer');
	}
}
?>
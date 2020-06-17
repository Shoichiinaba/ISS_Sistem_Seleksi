<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_bantuan extends AUTH_Controller {
	private $filename = "import_data";
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_array');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['content'] 		= 'admin/bantuan';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	
}

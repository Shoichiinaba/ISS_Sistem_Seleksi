<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_form extends AUTH_Controller {
	private $filename = "import_data";
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_bantuan');
		$this->load->model('M_array');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['content'] 		= 'admin/form_bantuan';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function simpan_predform()
	{
		
	}
	
}

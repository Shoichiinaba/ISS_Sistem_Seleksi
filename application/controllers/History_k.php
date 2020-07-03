<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_k extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['list']				=$this->M_HAdmin->history();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['content'] 			= 'admin/History';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	
}

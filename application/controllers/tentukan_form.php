<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_form extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('');
		$this->load->model('M_array');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['content'] 		= 'admin/form_bantuan';
		$data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	
}

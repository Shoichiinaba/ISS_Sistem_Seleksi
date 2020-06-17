<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] 		= 'admin/home';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	function dapat_bantuan()
	{
		$data['data']			=$this->M_admin->get_dapat();
		$data['blm_approve'] 	= $this->M_admin->blm_approve();
		$data['content'] 		= 'admin/dapat_bantuan';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tdapat_bantuan()
	{
		$data['data']			=$this->M_admin->get_tdapat();
		$data['blm_approve'] 	= $this->M_admin->blm_approve();
		$data['content'] 		= 'admin/tdapat_bantuan';
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

}

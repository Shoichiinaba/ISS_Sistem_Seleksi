<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_admin');
		// $this->load->model('M_HR');

		
		
	}
	function index()
	{
		$data['list']=$this->M_admin->get_data_admin();
		$data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['content'] = 'admin/list_admin';
		$data['userdata'] 	= $this->userdata;
		$this->load->view($this->template, $data);	    
	}

	function HRD()
	{
		$data['list']			=$this->M_admin->get_data_hrd();
		$data['content'] 		= 'HRD/list_HRD';
		$data['notif']			=$this->M_HR->get_notif();
		$data['userdata'] 		= $this->userdata;
		$this->load->view($this->template, $data);	    
	}

}

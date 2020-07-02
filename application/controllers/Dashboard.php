<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_HR');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		$data['content'] 		= 'admin/home';
		$data['notif']			=$this->M_HR->get_notif();
		$data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['Tperpanjang']	=$this->M_HAdmin->Tperpanjang();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

}

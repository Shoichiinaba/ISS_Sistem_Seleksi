<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_seleksi extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['list']				=$this->M_HAdmin->hasil_pred();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['has_sel']			=$this->M_HAdmin->hasil_seleksi();
		$data['has_per']			=$this->M_HAdmin->hasil_perpanjang();
		$data['has_en']				=$this->M_HAdmin->hasil_tidakP();
		$data['content'] 			= 'admin/Hasil_seleksi';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}
}

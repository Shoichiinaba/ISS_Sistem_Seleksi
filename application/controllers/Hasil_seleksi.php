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
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang']			=$this->M_HAdmin->Hasil_perpan();
		$data['tidak']			=$this->M_HAdmin->Hasil_tidak();
		$data['content'] 			= 'admin/Hasil_seleksi';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function perpanjang()
	{
		$data['list']				=$this->M_HAdmin->Listperpanjang();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['tidak']				=$this->M_HAdmin->Hasil_tidak();
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang']			=$this->M_HAdmin->Hasil_perpan();
		$data['content'] 			= 'admin/Perpanjang';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	function tidak()
	{
		$data['list']				=$this->M_HAdmin->Tperpanjang();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang']			=$this->M_HAdmin->Hasil_perpan();
		$data['tidak']				=$this->M_HAdmin->Hasil_tidak();
		$data['content'] 			= 'admin/Tidak_p';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	
}

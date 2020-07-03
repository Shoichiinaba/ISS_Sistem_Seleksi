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
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang_list']	=$this->M_HAdmin->Hasil_perpan();
		$data['tidak']				=$this->M_HAdmin->Hasil_tidak();
		$data['content'] 			= 'admin/History';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	function perpanjang()
	{
		$data['list']				=$this->M_HAdmin->Listperpanjang();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['tidak']				=$this->M_HAdmin->Hasil_tidak();
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang_list']	=$this->M_HAdmin->Hasil_perpan();
		$data['content'] 			= 'admin/Perpanjang';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);
	}
	function tidak()
	{
		$data['list']				=$this->M_HAdmin->Tperpanjang();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['selekdat']			=$this->M_HAdmin->hasil_hit();
		$data['perpanjang_list']	=$this->M_HAdmin->Hasil_perpan();
		$data['tidak']				=$this->M_HAdmin->Hasil_tidak();
		$data['content'] 			= 'admin/Tidak_p';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}
	function delete($params = '') {
        $this->M_HAdmin->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('History_k');
    }
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KirimHR extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_HR');
		$this->load->helper('url');

		
		
	}
	function index()
	{	
        $data['list']				=$this->M_HR->get_hasilkrm();
        $data['notif']				=$this->M_HR->get_notif();
		$data['content'] 			='HRD/list_hr';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function verifiedHR()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('KirimHR');
		}else{
			$NIP 					= $this->input->post('NIP');
			$kirim         			= 2;
        $troop_ = array(
         'NIP' 					    =>  $NIP,
         'kirim' 					=>  $kirim,
      );
        $this->M_HR->verify($NIP,$troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Edit");
		redirect('KirimHR');
		}
	}

	function verifiedHR1()
	{
		$chk = $_post['check'];
		if(!isset($chk)){
			$this->session->set_flashdata('Warning',"tidak ada data yg dipilih");
		}else{
			$data['list']				=$this->M_HR->get_hasilkrm();
			$data['notif']				=$this->M_HR->get_notif();
			$data['content'] 			='HRD/list_hr';
			$data['userdata'] 			= $this->userdata;
			$this->load->view($this->template, $data);
		}

	}
	

}

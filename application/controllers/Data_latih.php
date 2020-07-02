<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_latih extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_latih');
		$this->load->helper('url');

		
		
	}
	function index()
	{	
		$data['list']				=$this->M_latih->get_latih();
		$data['perpanjang']			=$this->M_HAdmin->hitperpanjang();
		$data['jml_latih'] 			= $this->M_latih->get_jml_latih();
		$data['Tperpanjang']		=$this->M_HAdmin->Tperpanjang();
		$data['jml_perpanjang'] 	= $this->M_latih->get_perpanjang();
		$data['jml_tperpanjang'] 	= $this->M_latih->get_tperpanjang();
		$data['content'] 			='admin/data_latih';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function tambah_data()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Simpan");
			redirect('Data_latih');
		}else{
				$nama_karyawan=$this->input->post('nama_karyawan');
				$penampilan=$this->input->post('penampilan');
				$kelengkapan=$this->input->post('kelengkapan');
				$kehadiran=$this->input->post('kehadiran');
				$accident=$this->input->post('accident');
				$knowlage=$this->input->post('knowlage');
				$tanggung_jawab=$this->input->post('tanggung_jawab');
				$teamwork=$this->input->post('teamwork');
				$best_employee=$this->input->post('best_employee');
				$hasil=$this->input->post('hasil');
			
			}
		$this->M_latih->tambah($nama_karyawan,$penampilan,$kelengkapan,$kehadiran,$accident,$knowlage,$tanggung_jawab,$teamwork,$best_employee,$hasil);
		$this->session->set_flashdata('sukses'," Berhasil Diinput");
		redirect('Data_latih');	
	}

    function delete($params = '') {
        $this->M_latih->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('Data_latih');
    }


	function edit_latih()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Gagal Di Edit");
			redirect('Data_latih');
		}else{
			$id 					= $this->input->post('id');
			$nama_karyawan          = $this->input->post('nama_karyawan');
        	$penampilan 			= $this->input->post('penampilan');
        	$kelengkapan 			= $this->input->post('kelengkapan');
			$kehadiran				= $this->input->post('kehadiran');
			$accident 				= $this->input->post('accident');
			$knowlage 				= $this->input->post('knowlage');
			$tanggung_jawab 		= $this->input->post('tanggung_jawab');
			$teamwork 				= $this->input->post('teamwork');
			$best_employee 			= $this->input->post('best_employee');
			$hasil 					= $this->input->post('hasil');

        $troop_ = array(
         'id' 					    =>  $id,
         'nama_karyawan' 			=>  $nama_karyawan,
         'penampilan'  				=>  $penampilan,
         'kelengkapan'				=>	$kelengkapan,
		 'kehadiran'				=>	$kehadiran,
		 'accident'					=>	$accident,
		 'knowlage'					=>	$knowlage,
		 'tanggung_jawab'			=>	$tanggung_jawab,
		 'teamwork'					=>	$teamwork,
		 'best_employee'			=>	$best_employee,
		 'hasil'					=>	$hasil,

      );
        $this->M_latih->edit($id, $troop_);
		$this->session->set_flashdata('sukses',"Berhasil Di Edit");
		redirect('Data_latih');
	}
	}

}

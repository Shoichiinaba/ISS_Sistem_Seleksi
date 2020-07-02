<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_kontrak extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
        $this->load->model('M_HR');
        $this->load->model("M_HR","get_db");
		$this->load->helper('url');

		
		
	}
	function index()
	{	
        $data['list']				=$this->M_HR->get_new();
        $data['notif']				=$this->M_HR->get_notif();
		$data['content'] 			='HRD/sdh_kontrak';
		$data['userdata'] 			= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function sunting_hapus()
        {
            $post = $this->input->post();
            $check = $post['check'];

            if(isset($check))
            {
                if(isset($post['hapus']))
                {
                    $this->get_db->post_delete($post);

                    $this->session->set_flashdata('sukses',"Berhasil Dihapus");
                    redirect('New_kontrak');
                }
            }
            else
            {
                $this->session->set_flashdata('error',"Tidak Ada Data Yang Dipilih");
                redirect('New_kontrak');
            }
        }

        function sunting_proses()
        {
            $post = $this->input->post();
            $result = array();
            $total_post = count($post['NIP']);

            foreach($post['NIP'] AS $key => $val)
            {
                $result[] = array(
                    "NIP"  => $post['NIP'][$key],
                    "nama"  => 1,
                    // "umur"  => $post['umur'][$key],
                    // "kelas"  => $post['kelas'][$key]
                );
            }
            $this->get_db->post_edit($result);
            
            $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di sunting!</p>');
            redirect('New_kontrak');
        }

}

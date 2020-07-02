<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HR extends CI_Model {
	
	function get_notif($hasil = 'Perpanjang',$kirim= 1 )
	{
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$this->db->where('kirim', $kirim);
		$query = $this->db->get('data_seleksi');
		return $query->num_rows();
	}

	function get_hasilkrm($hasil = 'Perpanjang',$kirim= 1)
    {
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$this->db->where('kirim', $kirim);
		$query = $this->db->get('data_seleksi');
		return $query->result();
	}
	
	function get_new($hasil = 'Perpanjang',$kirim= 2)
	{
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$this->db->where('kirim', $kirim);
		$query = $this->db->get('data_seleksi');
		return $query->result();
	}

	function verify($NIP,$troop_) 
	{
		$this->db->where('NIP', $NIP);
		$this->db->update('data_seleksi', $troop_);
	}

	function insert_multiple($data)
	{
		return $this->db->insert_batch('data_seleksi', $data);
	}

	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	function post_delete($post = array())
        {
            $total_array = count($post);

            if($total_array != 0)
            {
                $this->db->where_in('NIP', $post['check']);
                $this->db->delete('data_seleksi');
            }
		}


	public function get_kontrak($NIP)
    {
		$this->db->select('data_seleksi.*');
		$this->db->where('NIP',$NIP);
		$sql = $this->db->get('data_seleksi');
		return ($sql->num_rows() < 1)?'NO_DATA_QUERY':$sql->result_array();
	}

	function cetakHR($hasil = 'Perpanjang',$kirim= 2)
	{
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$this->db->where('kirim', $kirim);
		$query = $this->db->get('data_seleksi');
		return $query->result();
	}
}

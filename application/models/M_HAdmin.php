<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_HAdmin extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

	function Tperpanjang($hasil = 'Tidak diperpanjang')
		{
			$this->db->select('data_seleksi.*');
			$this->db->where('hasil', $hasil);
			$query = $this->db->get('data_seleksi');
			return $query->result();
		}
	function hitperpanjang($hasil = 'Perpanjang')
		{
			$this->db->select('data_seleksi.*');
			$this->db->where('hasil', $hasil);
			$query = $this->db->get('data_seleksi');
			return $query->num_rows();
		}
	function history($hasil = 'Perpanjang')
		{
			$this->db->select('data_seleksi.*');
			$this->db->where('hasil', $hasil);
			$query = $this->db->get('data_seleksi');
			return $query->result();
		}
	function hasil_pred()
		{
			$this->db->select('data_seleksi.*');
			$query = $this->db->get('data_seleksi');
			return $query->result();
		}
	function hasil_hit()
		{
			$this->db->select('data_seleksi.*');
			$query = $this->db->get('data_seleksi');
			return $query->num_rows();
		}
	function Hasil_perpan($hasil = 'Perpanjang')
	{
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$query = $this->db->get('data_seleksi');
		return $query->num_rows();
	}
	function Hasil_tidak($hasil = 'Tidak diperpanjang')
	{
		$this->db->select('data_seleksi.*');
		$this->db->where('hasil', $hasil);
		$query = $this->db->get('data_seleksi');
		return $query->num_rows();
	}
	function Listperpanjang($hasil = 'Perpanjang')
		{
			$this->db->select('data_seleksi.*');
			$this->db->where('hasil', $hasil);
			$query = $this->db->get('data_seleksi');
			return $query->result();
		}

}
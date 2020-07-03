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

	function simpan_hasil_perhitungan($data_form, $hasil, $nama, $NIP){
			$f = $data_form;
			$query = "INSERT INTO data_seleksi (NIP,nama_karyawan,penampilan,kelengkapan,kehadiran,accident,knowlage,tanggung_jawab,teamwork,best_employee,hasil) VALUES (
			'{$NIP}'
			'{$nama}',
			'{$f[0]}', 
			'{$f[1]}',
			'{$f[2]}',
			'{$f[3]}',
			'{$f[4]}',
			'{$f[5]}',
			'{$f[6]}',
			'{$f[7]}',
			'{$hasil}'
			)";
			$sql = $this->db->query($query);
			return $sql;
		}

	function delete($params ='')
    {
        $sql = "DELETE  FROM data_seleksi WHERE NIP = ? ";
        return $this->db->query($sql, $params);	
    }

}
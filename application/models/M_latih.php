<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_latih extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }

    function get_latih()
    {
	  return $this->db->get('data_latih')->result();
    }
    

	function tambah($nama_karyawan,$penampilan,$kelengkapan,$kehadiran,$accident,$knowlage,$tanggung_jawab,$teamwork,$best_employee,$hasil)
	{
        $hasil=$this->db->query("INSERT INTO data_latih(nama_karyawan,penampilan,kelengkapan,kehadiran,accident,knowlage,tanggung_jawab,teamwork,best_employee,hasil) VALUES ('$nama_karyawan','$penampilan','$kelengkapan','$kehadiran','$accident','$knowlage','$tanggung_jawab','$teamwork','$best_employee','$hasil')");
        return $hasil;
    }

    function delete($params ='')
    {
        $sql = "DELETE  FROM data_latih WHERE id = ? ";
        return $this->db->query($sql, $params);	
    }

	function edit($id,$troop_) 
    {
        $this->db->where('id', $id);
        $this->db->update('data_latih', $troop_);
    }	

    public function get_jml_latih()
	{
       $data = $this->db->get('data_latih');
       return $data->num_rows();
  	}
  	function get_perpanjang($hasil = 'Perpanjang')
  	{
        $data = $this->db->query("SELECT * FROM data_latih WHERE hasil = '$hasil'");
        return $data->num_rows();
    }
    function get_tperpanjang($hasil = 'Tidak diperpanjang')
    {
        $data = $this->db->query("SELECT * FROM data_latih WHERE hasil = '$hasil'");
        return $data->num_rows();
    }
	  
	

}
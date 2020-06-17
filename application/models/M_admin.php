<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}
    // Update Profil
    public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

    function hapus($params =''){
        $sql = "DELETE  FROM admin WHERE id = ? ";
        return $this->db->query($sql, $params); 
		}

	function get_data_admin($role = 'Admin')
		{
			$this->db->select('admin.*');
			$this->db->where('role', $role);
			$query = $this->db->get('admin');
			return $query->result();
		}

	function get_data_hrd($role = 'HRD')
		{
			$this->db->select('admin.*');
			$this->db->where('role', $role);
			$query = $this->db->get('admin');
			return $query->result();
		}

}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
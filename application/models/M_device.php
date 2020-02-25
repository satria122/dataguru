<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_device extends CI_Model {
	public function select_all() {
		$sql = "select * from device";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function select_by_sn($sn) {
		$sql = "select * from device where sn ='{$sn}'";
		$data = $this->db->query($sql);
		return $data->row();
	}
	public function update($where, $table, $data) {
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete($sn) {
		$sql = "DELETE FROM device WHERE sn='" .$sn ."'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}

	public function insert($data, $table) {
		return $this->db->insert($table, $data);
	}

	public function insert_batch($data) {
		$this->db->insert_batch('device', $data);
		return $this->db->affected_rows();
	}

	public function check_nama($name) {
		$this->db->where('device_name', $name);
		$data = $this->db->get('device');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('device');
		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
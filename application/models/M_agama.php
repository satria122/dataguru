<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_agama extends CI_Model {
	public function select_all() {
		$this->db->select('*');
		$this->db->from('agama');
		$data = $this->db->get();
		return $data->result();
	}

	public function select_by_id($where = array()) {
		$this->db->select('*');
		$this->db->from('agama');
		$this->db->where($where);
		return $this->db->get()->row();
	}

	public function select_by_pegawai($nmagama) {
		$sql = "select * from pegawai where agama = '{$nmagama}'";
		//$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_kota={$id}";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO agama VALUES('','" .$data['agama'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('agama', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE agama SET nama='" .$data['agama'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM agama WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('agama');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('agama');

		return $data->num_rows();
	}
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */
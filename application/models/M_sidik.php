<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sidik extends CI_Model {
	public function select_all($tbl) {
		$sql = "select * from {$tbl}";
		//$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, jabatan.nama AS jabatan FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_kota = kota.id";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function select_where($tbl,$where){
		$this->db->from($tbl);
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function select_by_id($id) {
		$sql = "select * from pegawai where id='{$id}'";
		//$sql = "SELECT pegawai.id AS id_pegawai, pegawai.nama AS nama_pegawai, pegawai.id_kota, pegawai.id_kelamin, pegawai.id_jabatan, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, jabatan.nama AS jabatan FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kota = kota.id AND pegawai.id_kelamin = kelamin.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($where, $table, $data) {
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function delete($id) {
		$sql = "DELETE FROM pegawai WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data, $table) {
		return $this->db->insert($table, $data);
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');
		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');
		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */
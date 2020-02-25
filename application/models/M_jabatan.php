<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {
	public function select_all(){
		$this->db->select('*');
		$this->db->from('jabatan');
		$data = $this->db->get();
		return $data->result();
	}
	public function select_by_id($id) {
		$sql = "SELECT * FROM jabatan WHERE id = '{$id}'";
		$data = $this->db->query($sql);
		return $data->row();
	}
	public function select_by_nama($nmpeg) {
		$sql = "SELECT * FROM jabatan WHERE nama = '{$nmpeg}'";
		$data = $this->db->query($sql);
		return $data->row();
	}

	public function select_by_pegawai($nmpeg) {
		$this->db->select('*');
		$this->db->from('pegawai');
		$this->db->where('jabatan',$nmpeg);
		return $this->db->get()->result();
		//$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, jabatan.nama AS jabatan FROM pegawai, kota, kelamin, jabatan WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_jabatan = jabatan.id AND pegawai.id_kota = kota.id AND pegawai.id_jabatan={$id}";

		//$data = $this->db->query($sql);

		//return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO jabatan VALUES('','" .$data['jabatan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('jabatan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE jabatan SET nama='" .$data['jabatan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM jabatan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('jabatan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('jabatan');

		return $data->num_rows();
	}
}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */
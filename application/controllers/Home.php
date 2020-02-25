<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_jabatan');
		$this->load->model('M_kota');
	}

	public function index() {
		$data['jml_pegawai'] 	= $this->M_pegawai->total_rows();
		$data['jml_jabatan'] 	= $this->M_jabatan->total_rows();
		$data['jml_kota'] 		= $this->M_kota->total_rows();
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		$jabatan = $this->M_jabatan->select_all();
		$index = 0;
		foreach ($jabatan as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			$pegawai_by_jabatan = $this->M_pegawai->select_by_jabatan($value->nama);//kondisi berdasarkan  value yang terdapat pada $jabatan

			$data_jabatan[$index]['value'] = $pegawai_by_jabatan->jml;
			$data_jabatan[$index]['color'] = $color;
			$data_jabatan[$index]['highlight'] = $color;
			$data_jabatan[$index]['label'] = $value->nama;
			
			$index++;
		}

		$kota 				= $this->M_kota->select_all();
		$index = 0;
		foreach ($kota as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$pegawai_by_kota = $this->M_pegawai->select_by_kota($value->nama);

			$data_kota[$index]['value'] = $pegawai_by_kota->jml;
			$data_kota[$index]['color'] = $color;
			$data_kota[$index]['highlight'] = $color;
			$data_kota[$index]['label'] = $value->nama;
			
			$index++;
		}

		$data['data_jabatan'] = json_encode($data_jabatan);
		$data['data_kota'] = json_encode($data_kota);

		$data['page'] 			= "beranda";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Beranda Admin Absensi";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
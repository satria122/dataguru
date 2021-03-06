<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_jabatan');
		$this->load->model('M_kota');
		$this->load->model('M_agama');
		$this->load->model('M_golongan');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPegawai'] = $this->M_pegawai->select_all_pegawai();
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['dataAgama'] = $this->M_agama->select_all();
		$data['dataGolongan'] = $this->M_golongan->select_all();

		$data['page'] = "pegawai";
		$data['judul'] = "Data Guru";
		$data['deskripsi'] = "Manage Data Guru";

		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);
		$data['modal_tambah_pegawai'] = show_my_modal('modals/modal_tambah_pegawai', 'tambah-pegawai', $data);

		$this->template->views('pegawai/home', $data);
	}

	public function tampil() {
		$data['dataPegawai'] = $this->M_pegawai->select_all();
		$this->load->view('pegawai/list_data', $data);
	}

	public function prosesTambah() {
		// $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|is_unique[pegawai.nip]', array(
  //               'required'      => 'Anda belum mengisi %s.',
  //               'is_unique'     => '%s tidak boleh kembar.'));
				//validasi form dengan cek eksistensi di database
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('golongan', 'Golongan', 'trim|required');
		// $this->form_validation->set_rules('ttl', 'TTL', 'trim|required');
		$nip = $this->input->post('nip');
		if($nip!=''){
		
		}else{
			$nip = NULL;
		}
		$nama = $this->input->post('nama');
		$kota=$this->input->post('kota');
		$jk= $this->input->post('jk');
		$telp= $this->input->post('telp');
		$jabatan= $this->input->post('jabatan');
		$alamat= $this->input->post('alamat');
		$sekolah= $this->input->post('sekolah');
		$agama= $this->input->post('agama');
		$golongan= $this->input->post('golongan');
		$ttl1 = $this->input->post('ttl1',true);
		$ttl2 = $this->input->post('ttl2',true);
		$tgl_pensiun= $this->input->post('tgl_pensiun');
		if($tgl_pensiun!=''){
			$tgl_menjenlang_pensiun = date('Y-m-d',strtotime($tgl_pensiun."-3 months"));
		
		}else{
			$tgl_pensiun = NULL;
			$tgl_menjenlang_pensiun =NULL;
		}
		$data = array(
		'nip'=>$nip,
		'nama'=>$nama,
		'telp'=>$telp,
		'kota'=>$kota,
		'kelamin'=>$jk,
		'jabatan'=>$jabatan,
		'alamat'=>$alamat,
		'sekolah'=>$sekolah,
		'agama'=>$agama,
		'golongan'=>$golongan,
		'ttl'=>$ttl1.' '.$ttl2,
		'tgl_pensiun'=>$tgl_pensiun,
		'tgl_menjelang_pensiun'=>$tgl_menjenlang_pensiun,
		);
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->insert($data, 'pegawai');

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Guru Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Guru Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);
		$data['dataPegawai'] = $this->M_pegawai->select_by_id($id);
		$data['dataJabatan'] = $this->M_jabatan->select_all();
		$data['dataKota'] = $this->M_kota->select_all();
		$data['dataAgama'] = $this->M_agama->select_all();
		$data['userdata'] = $this->userdata;
		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('golongan', 'Golongan', 'trim|required');
		// $this->form_validation->set_rules('ttl', 'TTL', 'trim|required');
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kota=$this->input->post('kota');
		$jk= $this->input->post('jk');
		$telp= $this->input->post('telp');
		$jabatan= $this->input->post('jabatan');
		$alamat= $this->input->post('alamat');
		$sekolah= $this->input->post('sekolah');
		$agama= $this->input->post('agama');
		$golongan= $this->input->post('golongan');
		$ttl1 = $this->input->post('ttl1',true);
		$ttl2 = $this->input->post('ttl2',true);
		$tgl_pensiun= $this->input->post('tgl_pensiun');
		if($tgl_pensiun!=''){
			$tgl_menjenlang_pensiun = date('Y-m-d',strtotime($tgl_pensiun."-3 months"));
		
		}else{
			$tgl_pensiun = NULL;
			$tgl_menjenlang_pensiun =NULL;
		}
		$data = array(
		'nip'=>$nip,
		'nama'=>$nama,
		'telp'=>$telp,
		'kota'=>$kota,
		'kelamin'=>$jk,
		'jabatan'=>$jabatan,
		'alamat'=>$alamat,
		'sekolah'=>$sekolah,
		'agama'=>$agama,
		'golongan'=>$golongan,
		'ttl'=>$ttl1.' '.$ttl2,
		'tgl_pensiun'=>$tgl_pensiun,
		'tgl_menjelang_pensiun'=>$tgl_menjenlang_pensiun,
		);
		$where = array('id' => $id);
		$table = 'pegawai';
		//$data = $this->input->post(); //skrip ini bisa digunakan untuk pemanggilan masing-masing form pada bagian models
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->update($where, $table, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Guru Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Guru Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pegawai->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Guru Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Guru Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_pegawai->select_all_pegawai();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "NIP");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Nama");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "TTL");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Jabatan");
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, "Golongan");
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, "Status");
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, "Kelamin");
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, "Agama");
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, "No Telepon");
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, "Alamat");
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, "Asal Sekolah");
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, "Tgl Pensiun");
		
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->nip); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->ttl); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->golongan); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->jabatan);
		    $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->kota); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->kelamin); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->agama);
		    $objPHPExcel->getActiveSheet()->setCellValueExplicit('I'.$rowCount, $value->telp, PHPExcel_Cell_DataType::TYPE_STRING);
		    $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->alamat);
		    $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->sekolah);
		    $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->tgl_pensiun);
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Guru.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Guru.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						//$id = md5(DATE('ymdhms').rand());
						$check = $this->M_pegawai->check_nama($value['A']);

						if ($check != 1) {
							//$resultData[$index]['id'] = $id;
							$resultData[$index]['nip'] = ucwords($value['A']);
							$resultData[$index]['nama'] = ucwords($value['B']);
							$resultData[$index]['ttl'] = $value['C'];
							$resultData[$index]['golongan'] = $value['D'];
							$resultData[$index]['jabatan'] = $value['E'];
							$resultData[$index]['kota'] = $value['F'];
							$resultData[$index]['kelamin'] = $value['G'];
							$resultData[$index]['agama'] = $value['H'];
							$resultData[$index]['telp'] = $value['I'];
							$resultData[$index]['alamat'] = $value['J'];
							$resultData[$index]['sekolah'] = $value['K'];
							$resultData[$index]['tgl_pensiun'] = $value['L'];
							if($value['L']!=''){
								$resultData[$index]['tgl_menjelang_pensiun'] = date('Y-m-d',strtotime($value['L']."-3 months"));
							}else{
								$resultData[$index]['tgl_menjelang_pensiun'] ='';
							}
							
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_pegawai->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Guru Berhasil diimport ke database'));
						redirect('Pegawai');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Guru Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Pegawai');
				}

			}
		}
	}

	public function pensiun(){
		$data['page'] = "pegawai";
		$data['judul'] = "Data Guru Pensiun";
		$data['deskripsi'] = "Manage Data Guru Pensiun";
		$data['userdata'] = $this->userdata;
		$this->template->views('pegawai/pensiun',$data);
	}

	public function tampilpensiun(){
		$today = date('Y-m-d');
		$data['dataPegawai'] = $this->db->query("select * from pegawai where tgl_pensiun < '$today' and kota='PNS' order by id desc")->result();
		$this->load->view('pegawai/list_pensiun', $data);
	}

	public function hampirpensiun(){
		$data['page'] = "pegawai";
		$data['judul'] = "Data Guru Menjelang Pensiun";
		$data['deskripsi'] = "Manage Data Guru Menjelang Pensiun";
		$data['userdata'] = $this->userdata;
		$this->template->views('pegawai/hampirpensiun',$data);
	}

	public function tampilhampirpensiun(){
		$today = date('Y-m-d');
		$data['dataPegawai'] = $this->db->query("select * from pegawai where tgl_pensiun > '$today' and tgl_menjelang_pensiun < '$today' and kota='PNS' order by id desc")->result();
		$this->load->view('pegawai/list_hampirpensiun', $data);
	}

	public function verivikasi() {
		$id = $_POST['id'];
		$result = $this->db->query("update pegawai set pengurusan_pensiun='Sudah' where id='$id'");

		if ($result > 0) {
			echo show_succ_msg('Data Guru Berhasil diperbarui', '20px');
		} else {
			echo show_err_msg('Data Guru Gagal diperbarui', '20px');
		}
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_agama');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataAgama'] 	= $this->M_agama->select_all();
		$data['page'] 		= "agama";
		$data['judul'] 		= "Data Agama";
		$data['deskripsi'] 	= "Manage Data Agama";
		$data['modal_tambah_agama'] = show_my_modal('modals/modal_tambah_agama', 'tambah-agama', $data);
		$this->template->views('agama/home', $data);
	}

	public function tampil() {
		$data['dataAgama'] = $this->M_agama->select_all();
		$this->load->view('agama/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required|is_unique[agama.nama]', array('is_unique'=>'%s tersebut sudah ada!'));

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_agama->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Agama Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Agama Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id 				= trim($_POST['id']);
		$data['dataAgama'] 	= $this->M_agama->select_by_id(array('id'=>$id));
		echo show_my_modal('modals/modal_update_agama', 'update-agama', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_agama->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Agama Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Agama Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_agama->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Agama Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Agama Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;
		$nmagama 				= trim($_POST['id']);
		$data['agama'] = $this->M_agama->select_by_id(array('nama'=>$nmagama));
		$data['jumlahAgama'] = $this->M_agama->total_rows();
		$data['dataAgama'] = $this->M_agama->select_by_pegawai($nmagama);
		echo show_my_modal('modals/modal_detail_agama', 'detail-agama', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_agama->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Agama");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Agama.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Agama.xlsx', NULL);
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
						$check = $this->M_agama->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_agama->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Agama Berhasil diimport ke database'));
						redirect('Agama');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Agama Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Agama');
				}

			}
		}
	}
}

/* End of file Kota.php */
/* Location: ./application/controllers/Kota.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_device');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataDevice'] = $this->M_device->select_all();
		$data['page'] = "device";
		$data['judul'] = "Data Device";
		$data['deskripsi'] = "Manage Data Device";
		$data['modal_tambah_device'] = show_my_modal('modals/modal_tambah_device', 'tambah-device', $data);
		$this->template->views('device/home', $data);
	}

	public function tampil() {
		$data['dataDevice'] = $this->M_device->select_all();
		$this->load->view('device/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('name', 'Nama Device', 'trim|required|is_unique[device.device_name]', array(
                'required'      => 'Anda belum mengisi %s.',
                'is_unique'     => '%s tidak boleh kembar.'));
				//validasi form dengan cek eksistensi di database
		$this->form_validation->set_rules('sn', 'Serial Number', 'trim|required|is_unique[device.sn]', array(
                'required'      => 'Anda belum mengisi %s.',
                'is_unique'     => '%s tidak boleh kembar.'));
		$this->form_validation->set_rules('vc', 'Verification Code (VC)', 'trim|required');
		$this->form_validation->set_rules('ac', 'Activation Code (AC)', 'trim|required');
		$this->form_validation->set_rules('vkey', 'Validation Key', 'trim|required');
		$name = $this->input->post('name');
		$sn = $this->input->post('sn');
		$vc = $this->input->post('vc');
		$ac=$this->input->post('ac');
		$vkey= $this->input->post('vkey');
		$data = array(
		'device_name'=>$name,
		'vc'=>$vc,
		'ac'=>$ac,
		'vkey'=>$vkey
		);
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_device->insert($data, 'device');
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Device Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Device Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$sn = trim($_POST['sn']);
		$data['dataDevice'] = $this->M_device->select_by_sn($sn);
		$data['userdata'] = $this->userdata;
		echo show_my_modal('modals/modal_update_device', 'update-device', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('name', 'Nama Device', 'trim|required', 
		array('required'      => 'Anda belum mengisi %s.'));
		$this->form_validation->set_rules('vc', 'Verification Code', 'trim|required',
		array('required'      => 'Anda belum mengisi %s.'));
		$this->form_validation->set_rules('ac', 'Activation code', 'trim|required',
		array('required'      => 'Anda belum mengisi %s.'));
		$this->form_validation->set_rules('vkey', 'Validation key', 'trim|required', 
		array('required'      => 'Anda belum mengisi %s.'));
		$name = $this->input->post('name');
		$sn = $this->input->post('sn');
		$vc = $this->input->post('vc');
		$ac = $this->input->post('ac');
		$vkey= $this->input->post('vkey');
		$data = array(
		'device_name'=>$name,
		'sn'=>$sn,
		'vc'=>$vc,
		'ac'=>$ac,
		'vkey'=>$vkey
		);
		$where = array('sn' => $sn);
		$table = "device"; 
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_device->update($where, $table, $data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Device Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Device Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function delete() {
		$sn = $_POST['sn'];
		$result = $this->M_device->delete($sn);
		if ($result > 0) {
			echo show_succ_msg('Data Device Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Device Gagal dihapus', '20px');
		}
	}
}
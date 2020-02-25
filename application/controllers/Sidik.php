<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sidik extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_sidik');
		$this->load->helper('flexcode');
	}
	public function index() {
		$data['userdata'] = $this->userdata;
		$data['page'] = "sidik_jari";
		$data['judul'] = "Data Sidik Jari";
		$data['deskripsi'] = "Manage Data Sidik Jari";
		$data['dtSdkInput'] = $this->M_sidik->select_where('pegawai',array ('sidik_jari is null'=>null));
		$data['modal_tambah_sidik'] = show_my_modal('modals/modal_tambah_sidik', 'tambah-sidik', $data);
		$this->template->views('sidik/home', $data);
	}
	public function tampil() {
		$data['dataSidik5'] = $this->M_sidik->select_where('pegawai',array ('sidik_jari is not null'=>null));
		$this->load->view('sidik/list_data', $data);
	}
	public function tampilInputSidik() {
		$data['dtSdkInput'] = $this->M_sidik->select_where('pegawai',array ('sidik_jari is null'=>null));
		$this->load->view('sidik/list_data_input', $data);
	}
	public function cek_reg() {
		$sql1		= "SELECT count(sidik_jari) as ct FROM pegawai WHERE nip=".$_GET['nip'];
		$result1	= mysql_query($sql1);
		$data1 		= mysql_fetch_array($result1);
		
		if (intval($data1['ct']) > intval($_GET['current'])) {
			$res['result'] = true;			
			$res['current'] = intval($data1['ct']);			
		}
		else
		{
			$res['result'] = false;
		}
		return json_encode($res);
	}
public function register(){
	/*$nip	= $_GET['nip'];
	echo 'tes';
	echo $nip;
	*/
	if (isset($_GET['nip']) && !empty($_GET['nip'])) {	
	$time_limit_reg = "15";
	$nip 	= $_GET['nip']; //sudah bisa menangkap data
	echo "$nip;SecurityKey;".$time_limit_reg.";".base_url('sidik/proses_register/').';'.base_url('sidik/getac/');
	
}
}
public function getac(){
	if (isset($_GET['vc']) && !empty($_GET['vc'])) {
	$data = getDeviceAcSn($_GET['vc']);
	echo $data[0]['ac'].$data[0]['sn'];
	
}
}
public function proses_register(){
if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {
		
    	//include 'include/global.php';
    	//include 'include/function.php';
		
		$data 		= explode(";",$_POST['RegTemp']);
		$vStamp 	= $data[0];
		$sn 		= $data[1];
		$nip	= $data[2];
		$regTemp 	= $data[3];
		
		$device = getDeviceBySn($sn);
		
		$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$nip);
		
		if (strtoupper($vStamp) == strtoupper($salt)) {
			
			$sql1 		= "SELECT MAX(finger_id) as fid FROM pegawai WHERE nip=".$nip;
			$result1 	= mysql_query($sql1);
			$data 		= mysql_fetch_array($result1);
			$fid 		= $data['fid'];
			
			if ($fid == 0) {
				$sq2 		= "update pegawai SET sidik_jari='".$regTemp."' where nip='".$nip."'";
				$result2	= mysql_query($sq2);
				if ($result1 && $result2) {
					$res['result'] = true;				
				} else {
					$res['server'] = "Error insert registration data!";
				}
			} else {
				$res['result'] = false;
				$res['user_finger_'.$user_id] = "Template already exist.";
			}
			
			echo "empty";
			
		} else {
			
			$msg = "Parameter invalid..";
			
			echo $base_path."messages.php?msg=$msg";
			
		}

		
}
	}
	public function tambah_sidik() {
		$data['dataSidik'] = $this->M_sidik->select_all('sidik');
		$data['userdata'] = $this->userdata;
		echo show_my_modal('modals/modal_tambah_sidik', 'tambah-sidik', $data);
	}
	public function prosesTambah() {
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|is_unique[pegawai.nip]', array(
                'required'      => 'Anda belum mengisi %s.',
                'is_unique'     => '%s tidak boleh kembar.'));
				//validasi form dengan cek eksistensi di database
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telepon', 'trim|required|numeric');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kota=$this->input->post('kota');
		$jk= $this->input->post('jk');
		$telp= $this->input->post('telp');
		$jabatan= $this->input->post('jabatan');
		$data = array(
		'nip'=>$nip,
		'nama'=>$nama,
		'telp'=>$telp,
		'kota'=>$kota,
		'kelamin'=>$jk,
		'jabatan'=>$jabatan
		);
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->insert($data, 'pegawai');

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Pegawai Gagal ditambahkan', '20px');
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
		$data['userdata'] = $this->userdata;
		echo show_my_modal('modals/modal_update_pegawai', 'update-pegawai', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('kota', 'Kota', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kota=$this->input->post('kota');
		$jk= $this->input->post('jk');
		$telp= $this->input->post('telp');
		$jabatan= $this->input->post('jabatan');
		$data = array(
		'nip'=>$nip,
		'nama'=>$nama,
		'telp'=>$telp,
		'kota'=>$kota,
		'kelamin'=>$jk,
		'jabatan'=>$jabatan
		);
		$where = array('id' => $id);
		$table = 'pegawai';
		//$data = $this->input->post(); //skrip ini bisa digunakan untuk pemanggilan masing-masing form pada bagian models
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pegawai->update($where, $table, $data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Pegawai Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_sidik->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Pegawai Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pegawai Gagal dihapus', '20px');
	}
	}
}

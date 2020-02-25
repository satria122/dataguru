<?php

	function getDevice() {

		$sql 	= 'SELECT * FROM device ORDER BY device_name ASC';
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceAcSn($vc) {

		$sql 	= "SELECT * FROM device WHERE vc ='".$vc."'";
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceBySn($sn) {

		$sql 	= "SELECT * FROM device WHERE sn ='".$sn."'";
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}

	function getUser() {

		$sql 	= 'SELECT * FROM pegawai ORDER BY nama ASC';
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'nip'	=> $row['nip'],
				'nama'	=> $row['nama']
			);

			$i++;

		}

		return $arr;

	}

	function deviceCheckSn($sn) {

		$sql 	= "SELECT count(sn) as ct FROM device WHERE sn = '".$sn."'";
		$result	= mysql_query($sql);
		$data 	= mysql_fetch_array($result);

		if ($data['ct'] != '0' && $data['ct'] != '') {
			return "sn already exist!";
		} else {
			return 1;
		}

	}

	function checkUserName($nama) {

		$sql	= "SELECT nama FROM pegawai WHERE nama = '".$nama."'";
		$result	= mysql_query($sql);
		$row	= mysql_num_rows($result);

		if ($row>0) {
			return "Username exist!";
		} else {
			return "1";
		}

	}

	function getUserFinger($nip) {

		$sql 	= "SELECT * FROM data_sidik WHERE nip= '".$nip."' ";
		$result = mysql_query($sql);
		$arr 	= array();
		$i	= 0;

		while($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				"nip"	=>$row['nip'],
				"id_sidik"	=>$row['id_sidik'],
				"dt_sidik"	=>$row['dt_sidik']
				);
			$i++;

		}

		return $arr;

	}
	
	function getLog() {

		$sql 	= 'SELECT * FROM demo_log ORDER BY log_time DESC';
		$result	= mysql_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysql_fetch_array($result)) {

			$arr[$i] = array(
				'log_time'		=> $row['log_time'],
				'nama'		=> $row['nama'],
				'data'			=> $row['data']
			);

			$i++;

		}

		return $arr;

	}
	
	function createLog($nama, $time, $sn) {
		
		$sq1 		= "INSERT INTO demo_log SET nama='".$nama."', data='".date('Y-m-d H:i:s', strtotime($time))." (PC Time) | ".$sn." (SN)"."' ";
		$result1	= mysql_query($sq1);
		if ($result1) {
			return 1;				
		} else {
			return "Error insert log data!";
		}
		
	}
	function inputAbsen($nip, $time, $sn, $ket) {
		$sq1 		= "INSERT INTO data_absensi SET nip='".$nip."', data='".date('Y-m-d H:i:s', strtotime($time))." (PC Time) | ".$sn." (SN)"."',keterangan='".$ket."' ";
		$result1	= mysql_query($sq1);
		if ($result1) {
			return true;				
		} else {
			return "Error insert data absen!";
		}
		
	}

?>
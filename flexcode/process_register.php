<?php

if (isset($_POST['RegTemp']) && !empty($_POST['RegTemp'])) {
		
    	include 'include/global.php';
    	include 'include/function.php';
		
		$data 		= explode(";",$_POST['RegTemp']);
		$vStamp 	= $data[0];
		$sn 		= $data[1];
		$nip	= $data[2];
		$regTemp 	= $data[3];
		
		$device = getDeviceBySn($sn);
		
		$salt = md5($device[0]['ac'].$device[0]['vkey'].$regTemp.$sn.$nip);
		
		if (strtoupper($vStamp) == strtoupper($salt)) {
			
			$sql1 		= "SELECT MAX(id_sidik) as fid FROM data_sidik WHERE nip=".$nip;
			$result1 	= mysql_query($sql1);
			$data 		= mysql_fetch_array($result1);
			$fid 		= $data['fid'];
			
			if ($fid == 0) {
				$sq2 		= "INSERT INTO data_sidik SET nip='".$nip."', id_sidik=".($fid+1).", dt_sidik='".$regTemp."' ";
				$result2	= mysql_query($sq2);
				if ($result1 && $result2) {
					$res['result'] = true;				
				} else {
					$res['server'] = "Error insert registration data!";
				}
			} else {
				$res['result'] = false;
				$res['user_finger_'.$nip] = "Template already exist.";
			}
			
			echo "empty";
			
		} else {
			
			$msg = "Parameter invalid..";
			
			echo $base_path."messages.php?msg=$msg";
			
		}

		
}

?>
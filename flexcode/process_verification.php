<?php

if (isset($_POST['VerPas']) && !empty($_POST['VerPas'])) {
		
	include 'include/global.php';
	include 'include/function.php';
	
	$data 		= explode(";",$_POST['VerPas']);
	$nip		= $data[0];
	$vStamp 	= $data[1];
	$time 		= $data[2];
	$sn 		= $data[3];
	
	$fingerData = getUserFinger($nip);
	$device 	= getDeviceBySn($sn);
	$sql1 		= "SELECT * FROM pegawai WHERE nip='".$nip."'";
	$result1 	= mysql_query($sql1);
	$data 		= mysql_fetch_array($result1);
	$nama	= $data['nama'];
	$ket = 'tes';
		
	$salt = md5($sn.$fingerData[0]['dt_sidik'].$device[0]['vc'].$time.$nip.$device[0]['vkey']);
	
	if (strtoupper($vStamp) == strtoupper($salt)) {
		
		$absen = inputAbsen($nip, $time, $sn, $ket);
		
		if ($absen = true) { ?>
		<script>
		alert(" Proses coba absen atas nama:'"+nama+"', berhasil!");
		</script>
		 <?php } 
		else { ?>
		<script>
		alert(" Proses coba absen atas nama:'"+nama+"', gagal!");
		</script>
		<?php
		}
	
	} 
	else {
		
		$msg = "Parameter tidak benar..";
		
		echo $base_path."user.php?msg=$msg";
		
	}
}

?>
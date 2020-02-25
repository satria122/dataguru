<?php

if (isset($_GET['nip']) && !empty($_GET['nip'])) {
	
	include 'include/global.php';
	include 'include/function.php';

	$nip 	= $_GET['nip'];
	$sidik		= getUserFinger($nip);

	echo "$nip;".$sidik[0]['dt_sidik'].";SecurityKey;".$time_limit_ver.";".$base_path."process_verification.php;".$base_path."getac.php".";extraParams";

}

?>
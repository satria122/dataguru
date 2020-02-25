<?php
	
if (isset($_GET['nip']) && !empty($_GET['nip'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$nip 	= $_GET['nip'];

	echo "$nip;SecurityKey;".$time_limit_reg.";".$base_path."process_register.php;".$base_path."getac.php";

}

?>
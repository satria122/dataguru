<?php
	
if (isset($_GET['msg']) && !empty($_GET['msg'])) {
	echo $_GET['msg'];
	} 
elseif (isset($_GET['nama']) && !empty($_GET['nama']) && isset($_GET['time']) && !empty($_GET['time'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$nama	= $_GET['nama'];
	$time		= date('Y-m-d H:i:s', strtotime($_GET['time']));
	
	echo $nama." login success on ".date('Y-m-d H:i:s', strtotime($time));
} 
else {
		
	$msg = "Parameter invalid..(halaman pesan)";
	
	echo "$msg";
	
}

	
?>
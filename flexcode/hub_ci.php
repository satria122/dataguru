<?php
session_start();
include 'include/global.php'; 


if(!empty($_POST['cisub'])){ //dari 'name' tombol submit
 $status = $_POST['status'];
 //echo base64_decode($status).'<br>';//ok for decoding
 $_SESSION['status'] = $status;
 //session time
 session_cache_limiter('status');
 $cache_limiter = session_cache_limiter();
 session_cache_expire(1);//waktu 30 menit
 
	$idletime = 1 * 60; 
	if(isset($_SESSION["timestamp"])) {
	if (time()-$_SESSION["timestamp"]>$idletime){
		session_destroy();
		session_unset();
	}}
 header('location:index_register.php');
}
if(!empty($_GET['kd'])&&$_GET['kd']==1){
	unset($_SESSION['status']);
	unset($_SESSION['ci_url']);
	header('location:'.$back_pegawai);
}
?>
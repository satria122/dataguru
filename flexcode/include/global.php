<?php
/*ini_set("display_errors", 0);
error_reporting(0);*/
	$base_path		= "http://localhost/proj/absen_pegawai_dosen/flexcode/";
	//kode diatas berhasil berjalan dengan baik, untuk jaga-jaga jika error saat di upload ke server web.	
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= dirname($_SERVER['SCRIPT_NAME']);
	$base_path		= $root.'/';//kode ini berhasil
	
	$ci_url = rtrim($base_path,'flexcode/');
	$back_pegawai = $ci_url.'/pegawai/';

	$db_name		= "proj_absen_pegawai_dosen"; //diganti ketika upload
    $db_user		= "root";
    $db_pass		= "";
    $db_host		= "127.0.0.1:3306";
    $time_limit_reg = "15";
    $time_limit_ver = "10";

    $conn = mysql_connect($db_host, $db_user, $db_pass);
    if (!$conn) die("Connection for user $db_user refused!");
    mysql_select_db($db_name, $conn) or die("Can not connect to database!");
?>
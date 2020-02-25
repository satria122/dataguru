<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
<?php 
	session_start();
	include 'include/global.php'; 
    include 'include/head.php'; 
	if($_SESSION['status']!=base64_encode('admin')){
	  header("location:".$ci_url);
	  }
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
	?>
	<!-- include js ajax -->
	<?php //include 'assets/js/ajaxFlexcode.php'; ?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" 
             role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                    data-toggle="collapse" data-target="#navbar" 
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                    Input Sidik Jari Pegawai</a>
                </div>
            </div>
        </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="content">
                        </div>
                    </div>
                </div>
            </div>
 <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) {
 ?>
  <div class="alert alert-success">
  <?php echo $msg;?>
  </div>
 <?php } ?>
<?php 
echo 'penanda halaman jajal'
	."<br>"
	.'$base_path: '.$base_path
	.'<br>'
	.'$back_pegawai :'.$back_pegawai
	.'<br>'
	;
	?>
    <script>
        jQuery(document).ready(function() {
            console.log('ready to use...');
            load('<?php echo $base_path?>user.php?action=index');
        });
    </script>
    </body>
</html>
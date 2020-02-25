<?php
include 'include/global.php';
include 'include/function.php';
if (isset($_GET['action']) && $_GET['action'] == 'index') {
?>

<script type="text/javascript">
$('title').html('Halaman Input Sidik');
//start user verification
function user_verification(nip,nama){
$('body').ajaxMask();
    verStats = 0;
    verCt = -1;
        try
        {
                timer_verifikasi.stop();
        }
        catch(err)	
        {
                console.log('Veryfication timer has been init');
        }
    var limit = 4;
    var count = 1;
    var timeout = 3500;
    timer_verifikasi = $.timer(timeout, function() 
        {					
            console.log("'"+nama+"' Pengecekan verifikasi...");
            user_checkverifikasi(nip,$("#user_finger_"+nip).
            html());//menjalankan fungsi js lain
            if (count>=limit || verStats==1) 
            {
            timer_verifikasi.stop();
            console.log("'"+nama+"' verification checking end");
            if (count>=limit || verStats==0)
            {
                alert(" Coba absen atas nama:'"+nama+"', gagal!");
                $('body').ajaxMask({ stop: true });
				load('user.php?action=index');
            }						
            if (verStats==1)
            {
                alert(" Coba basen '"+nama+"' berhasil!");
                $('body').ajaxMask({ stop: true });
                load('user.php?action=index');
            }
            }
        //count++;
        });
}
function user_checkverifikasi(nip, current) {
        $.ajax({
        url	: "user.php?action=checkver&nip="+nip+
                "&current="+current,
        type : "GET",
        success : function(data)
        {
        try
            {
            var res = jQuery.parseJSON(data);	
            if (res.result)
            {
            verStats = 1;
            $.each(res, function(key, value){
			 if (key=='current')
             {verC = value;}
             });
             }
            }//end try
        catch(err)
            {
                    alert(err.message);
            }
        }
        });//end ajax
    }//end function user_checkverifikasi
//blok delete dan bersih
function user_delete(nip, nama) {
        var r = confirm("Delete data sidik: "+nama+" ?");
        if (r == true) {
        var d = push('user.php?action=delete&nip='+nip);
		if (d== true){
			alert(" Hapus '"+nama+"' berhasil!");
		}
        }
    }
function bersihTes(ket) {
    var r = confirm("Bersihkan data tes ?");
        if (r == true) {
        var d = push('user.php?action=bersihtes&ket='+ket);
        }
		if (d== true){
			alert(" Hapus '"+nama+"' berhasil!");
		}
    }
//end blok delete dan bersih
function user_register(nip, nama) {
    $('body').ajaxMask();
    regStats = 0;
    regCt = -1;
        try
        {
                timer_register.stop();
        }
        catch(err)	
        {
                console.log('Registration timer has been init');
        }
    var limit = 4;
    var ct = 1;
    var timeout = 5000;
    timer_register = $.timer(timeout, function() 
        {					
            console.log("'"+nama+"' Pengecekan registrasi...");
            user_checkregister(nip,$("#user_finger_"+nip).
            html());//menjalankan fungsi js lain
            if (ct>=limit || regStats==1) 
            {
            timer_register.stop();
            console.log("'"+nama+"' registration checking end");
            if (ct>=limit && regStats==0)
            {
                alert(" Registrasi sidik atas nama:'"+nama+"', gagal!");
                $('body').ajaxMask({ stop: true });
            }						
            if (regStats==1)
            {
                $("#user_finger_"+nip).html(regCt);
                alert(" registration '"+nama+"' success!");
                $('body').ajaxMask({ stop: true });
                load('user.php?action=index');
            }
            }
        ct++;
        });
}//end function user register
    function user_checkregister(nip, current) {
        $.ajax({
        url	: "user.php?action=checkreg&nip="+nip+
                "&current="+current,
        type : "GET",
        success : function(data)
        {
        try
            {
            var res = jQuery.parseJSON(data);	
            if (res.result)
            {
            regStats = 1;
            $.each(res, function(key, value){                                 
                if (key=='current')
            {regC = value;}
            });
            }
            }//end try
        catch(err)
            {
                    alert(err.message);
            }
        }
        });//end ajax
    }//end function user_checkregister
</script>

<div class="row">
	<div class="col-md-12">
		<a href='<?php echo 'hub_ci.php?kd=1'?>' class="btn btn-success"> 
		Selesai Input Sidik</a>
    </div>
	<div class="col-md-12" align="right">
	<button type='button btn-success' class='btn btn-md btn-warning' onclick="bersihTes('tes')">Bersihkan Data Tes</button>
	</div>
</div>
<br>
<?php
    $user = getUser();
    if (count($user) > 0) {
    echo "<div class='row'>"
	 ."<div class='col-md-12'>"
	  ."<table id='list-data' class='table table-bordered table-hover'>"
	   ."<thead>"
	    ."<tr>"
             ."<th class='col-md-2'>NIP</th>"
             ."<th class='col-md-4'>NAMA</th>"
             ."<th class='col-md-1'>STATUS SIDIK</th>"
             ."<th class='col-md-2'>AKSI</th>"
            ."</tr>"
           ."</thead>"
           ."<tbody id='tabel-sidik'>";
            foreach ($user as $row) {
            $finger = getUserFinger($row['nip']);
            $register	= '';
            $verification = '';
            $url_register = base64_encode($base_path.
             "register.php?nip=".$row['nip']);
            $url_verification	= base64_encode($base_path.
             "verification.php?nip=".$row['nip']);
            if (count($finger) == 0) {
                    //declare variabel tombol register
             $register = "<a href='finspot:FingerspotReg;$url_register' "
                . "class='btn btn-xs btn-primary' "
                . "onclick=\"user_register('".$row['nip']."','".
                $row['nama']."')\">Register</a>"; 
                //event onclick hanya berfungsi untuk auto redirect 
                //ketika input sidik jari telah selesai
            } else {
                //declare variabel tombol verifikasi
                $verification = "<a href='finspot:FingerspotVer;"
                ."$url_verification' class='btn btn-xs btn-success'"
				."onclick=\"user_verification('".$row['nip']."','".
                $row['nama']."')\" >"
                . "Coba Absen</a>";
            }
            echo 
            "<tr>"
                ."<td>".$row['nip']."</td>"
                ."<td>".$row['nama']."</td>"
                ."<td><code id='user_finger_".$row['nip'].
                    "'>".count($finger)."</code></td>"
                ."<td>"
                    ."<button type='button' class='btn btn-xs btn-danger' "
                    . "onclick=\"user_delete('".$row['nip']."','"
                    .$row['nama']."')\">Delete Sidik</button>"
                        ."&nbsp"
                        ."$register"
                        ."$verification" 
                        // cetak tombol register dan verifikasi
                ."</td>"
            ."</tr>";
            }//end foreach
            echo
            "</tbody>"
        ."</table>"
       ."</div>"//end class col-md
    ."</div>";//end class row
} else {
    echo 'User Empty';
        }
	} 
elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
		$sql2 		= "DELETE FROM data_sidik WHERE nip = '".$_GET['nip']."' ";
		$result2 	= mysql_query($sql2);
		
		if ($result2) {

			$res['result'] 	= true;
			$res['reload'] 	= "user.php?action=index";

		} else {

			$res['server'] 	= "Error delete data!#".$sql2;

		}

		echo json_encode($res);

	} 
elseif (isset($_GET['action']) && $_GET['action'] == 'bersihtes') {
		$sql2 		= "DELETE FROM data_absensi WHERE keterangan = '".$_GET['ket']."' ";
		$result2 	= mysql_query($sql2);
		
		if ($result2) {
			$res['result'] 	= true;
			$res['reload'] 	= "user.php?action=index";
		} else {
			$res['server'] 	= "Error delete data!#".$sql2;
		}

		echo json_encode($res);

	}
elseif (isset ($_GET['action']) && $_GET['action'] == 'checkreg') {
		
		$sql1		= "SELECT count(id_sidik) as ct FROM data_sidik WHERE nip=".$_GET['nip'];
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
		echo json_encode($res);
		
	} 
elseif (isset ($_GET['action']) && $_GET['action'] == 'checkver') {
		$sql1		= "SELECT count(nip) as ct FROM data_absensi WHERE nip=".$_GET['nip'];
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
		echo json_encode($res);
	} 
else {

		echo "Aksi tidak dapat dikenali...";

	}
?>
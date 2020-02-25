
<?php
            foreach ($dtSdkInput as $sidik) {
			$this->load->helper('url64');
			
              ?>
              <tr>
				<td><?php echo $sidik->nip; ?></td>
                <td style="min-width:100px;"><?php echo $sidik->nama; ?></td>
                <td><?php echo $sidik->jabatan; ?></td>
                <td class="text-center" style="min-width:200px;"><!-- style for lebar kolom -->
					<button class="btn btn-warning btn-sm" onclick="user_register(<?php echo $sidik->nip.",". $sidik->nama;?>)"><i class="glyphicon glyphicon-repeat"'></i> Proses Input</button>
					<a href='finspot:FingerspotReg;
					<?php 
					$url = base_url('Sidik/register/').'?nip='.$sidik->nip;
					$str= base64_encode("base_url('Sidik/register/').'?nip='.$sidik->nip");
					$url_register= urlencode($str);
					echo $str;
					?>' class='btn btn-md btn-primary'>Register</a>
					<?php 
					echo  base64_encode(base_url('Sidik/register/').'?nip='.$sidik->nip);
					//$register = "<a href='finspot:FingerspotReg;$url_register' class='btn btn-xs btn-primary' onclick=\"user_register('".$row['user_id']."','".$row['user_name']."')\">Register</a>";
					?>
				</td>
              </tr>
              <?php
            }
 ?>
 <script>
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
	timer_register = $.timer(timeout, function() {					
	 console.log("'"+nama+"' registration checking...");
	 user_checkregister(nip,$("#user_finger_"+nip).html());
	  if (ct>=limit || regStats==1) 
	  {
	  timer_register.stop();
	  console.log("'"+nama+"' registration checking end");
	   if (ct>=limit && regStats==0)
	   {
	   alert("'"+nama+"' registration fail!");
	   $('body').ajaxMask({ stop: true });
	   }						
	    if (regStats==1)
		{
		$("#user_finger_"+nip).html(regCt);
		alert("'"+nama+"' registration success!");
		$('body').ajaxMask({ stop: true });
		load('Sidik/index');
		}
	  }
		ct++;
	});
}
</script>
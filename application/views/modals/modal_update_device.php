<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Device</h3>
      <form method="POST" id="form-update-device">
	  <input type="hidden" name="sn" value="<?php echo $dataDevice->sn; ?>">
	  <div><label for="name">Device name</label></div>
		<div class="input-group form-group">
		  <span class="input-group-addon" id="sizing-addon2">
			<i class="glyphicon glyphicon-tag"></i>
		  </span>
		  <input type="text" class="form-control" placeholder="Nama device" name="name" id="name" aria-describedby="sizing-addon2" value="<?php echo $dataDevice->device_name ?>">
		</div>
		<div><label for="sn_view">Serial Number (SN)</label></div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" disabled=true class="form-control" name="sn_view" id="sn_view" aria-describedby="sizing-addon2" value="<?php echo $dataDevice->sn.' **(tidak bisa diedit)'; ?>">
        </div>
		<div><label for="vc">Verificaton Code (VC)</label></div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Verificaton code" name="vc" id="vc" aria-describedby="sizing-addon2" value="<?php echo $dataDevice->vc; ?>">
        </div>
		<div><label for="ac">Activaton Code (AC)</label></div>
		<div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Activation Code" name="ac" id="ac" aria-describedby="sizing-addon2" value="<?php echo $dataDevice->ac; ?>">
        </div>
		<div><label for="vkey">Validation Key (VKey)</label></div>
		<div class="input-group form-group">
		 <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Validation Code" name="vkey" id="vkey" aria-describedby="sizing-addon2" value="<?php echo $dataDevice->vkey; ?>">
        </div>
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>
<script type="text/javascript">
$(function () {
    $(".select2").select2();
});
</script>
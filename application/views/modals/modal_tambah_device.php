<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Device</h3>

  <form id="form-tambah-device" method="POST">
	<div class="input-group form-group">
	  <label for="name">Nama Device</label>
      <input type="text" class="form-control" placeholder="Nama Device" name="name" id="name" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
	<label for="sn">Serial Number (SN)</label>
      <input type="text" class="form-control" placeholder="Serial Number" name="sn" id="sn" aria-describedby="sizing-addon2">
    </div>
	<div class="input-group form-group">
      <label>Verification Code (VC)</label>
      <input type="text" class="form-control" placeholder="Validation Code" name="vc" aria-describedby="sizing-addon2">
    </div>
	<div class="input-group form-group">
      <label>Activaton Code (AC)</label>
      <input type="text" class="form-control" placeholder="Activaton Code" name="ac" aria-describedby="sizing-addon2">
    </div>
	<div class="input-group form-group">
      <label>Validation Key (Vkey)</label>
      <input type="text" class="form-control" placeholder="Vkey" name="vkey" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>
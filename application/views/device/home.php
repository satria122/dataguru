<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-device"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Device</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <div style="overflow-x:auto;"> <!-- scroll hozontal-->
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
		  <th>Nama device</th>
          <th>Serial Number (SN)</th>
          <th>Validation Code (VC)</th>
          <th>Activation Code (AC)</th>
          <th>Validation Key (VK)</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-device">  
      </tbody>
	  </div>
    </table>
  </div>
</div>
<?php echo $modal_tambah_device; ?>
<div id="tempat-modal"></div>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataDevice', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

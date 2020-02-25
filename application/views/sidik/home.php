<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal"
		data-target="#tambah-sidik"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Sidik</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <table>
  <div id="halaman-sidik">
  </div>
  </table>
  <?php /* 
  <div style="overflow-x:auto;"> <!-- scroll hozontal-->
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
		  <th>NIP</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-sidik"> 
      </tbody>
	  </div>
    </table> */?>
  </div>
</div>
<?php echo $modal_tambah_sidik; ?>
<div id="tempat-modal"></div>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSidik', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

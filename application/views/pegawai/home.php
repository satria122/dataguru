<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-3" style="padding: 1;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pegawai"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Guru</button>
    </div>
	<div class="col-md-3" style="padding: 1;">
	<form action="<?= base_url().'flexcode/hub_ci.php';?>" method='post' name='from_ci' >
	<?php 
	$status = base64_encode($this->session->userdata('status'));
	?>
	<input type="hidden" name="status" value="<?php echo $status; ?>">
	<!-- <input type="submit" name="cisub" value="Input Sidik Jari" class="form-control btn btn-primary"> -->
	</form><!--form ini untuk menghubungkan dengan kode flexcode-->
	</div>
    <div class="col-md-3" style="padding: 0;">
        <a href="<?php echo base_url('Pegawai/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-pegawai"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <div style="overflow-x:auto;"> <!-- scroll hozontal-->
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
		      <th>NIP</th>
          <th>Nama</th>
          <th>TTL</th>
          <th>Jabatan</th>
          <th>Golongan</th>
          
          <th>Status</th>
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>No Telp</th>
          <th>Alamat</th>
          <th>Asal Sekolah</th>
          <th>Tgl Pensiun</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-pegawai">  
      </tbody>
	  </div>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pegawai;
?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>
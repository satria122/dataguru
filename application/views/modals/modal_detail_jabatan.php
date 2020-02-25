<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Guru (Jabatan: <b><?php echo $jabatan->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
			<th>NIP</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Status</th>
            <th>Jenis Kelamin</th>
          </tr>
        </thead>
        <tbody id="data-pegawai">
          <?php
            foreach ($dataJabatan as $pegawai) {
              ?>
              <tr>
				<td><?php echo $pegawai->nip; ?></td>
                <td style="min-width:100px;"><?php echo $pegawai->nama; ?></td>
                <td><?php echo $pegawai->telp; ?></td>
                <td><?php echo $pegawai->kota; ?></td>
                <td><?php echo $pegawai->kelamin; ?></td>
              </tr>
              <?php
            }
			
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>
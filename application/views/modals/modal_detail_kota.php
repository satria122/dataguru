<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List Status (Dari Kota: <b><?php echo $kota->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
			<th>Nip</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Jenis Kelamin</th>
            <th>Golongan</th>
          </tr>
        </thead>
        <tbody id="data-pegawai">
          <?php
            foreach ($dataKota as $pegawai) {
              ?>
              <tr>
				<td><?php echo $pegawai->nip; ?></td>
                <td style="min-width:100px;"><?php echo $pegawai->nama; ?></td>
                <td><?php echo $pegawai->telp; ?></td>
                <td><?php echo $pegawai->kelamin; ?></td>
                <td><?php echo $pegawai->jabatan; ?></td>
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
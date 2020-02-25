<?php $nomor = 1; ?>
<?php
  foreach ($dataPegawai as $pegawai) {
    ?>
    
    <tr>
      <td><?= $nomor;?> </td>
      <?php $nomor++;?>
      <td><?php echo $pegawai->nip; ?></td>
      <td style="min-width:50px;"><?php echo $pegawai->nama; ?></td>
      <td><?php echo $pegawai->ttl; ?></td>
      <td><?php echo $pegawai->golongan; ?></td>
      <td><?php echo $pegawai->jabatan; ?></td>
      <td><?php echo $pegawai->kota; ?></td>
      <td><?php echo $pegawai->kelamin; ?></td>
      <td><?php echo $pegawai->agama; ?></td>
      <td><?php echo $pegawai->telp; ?></td>
      <td><?php echo $pegawai->alamat; ?></td>
      <td><?php echo $pegawai->sekolah; ?></td>
      <td class="text-center" style="min-width:300px;"><!-- style for lebar kolom -->
        <button class="btn btn-warning btn-sm update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <!-- <button class="btn btn-sm btn-primary detail-dataKota" ><i class="glyphicon glyphicon-info-sign"></i> Pensiunkan</button> -->
      </td>
      </td>
    </tr>
    <?php
  }
?>
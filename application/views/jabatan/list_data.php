<?php
  $no = 1;
  foreach ($dataJabatan as $jabatan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $jabatan->nama; ?></td>
      <td class="text-center" style="min-width:300px;">
        <button class="btn btn-sm btn-warning update-dataJabatan" data-id="<?php echo $jabatan->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-sm btn-danger konfirmasiHapus-jabatan" data-id="<?php echo $jabatan->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <button class="btn btn-sm btn-info detail-dataJabatan" data-id="<?php echo $jabatan->nama; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
<?php
  $no = 1;
  foreach ($dataGolongan as $golongan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $golongan->nama; ?></td>
      <td class="text-center" style="min-width:300px;">
        <button class="btn btn-sm btn-warning update-dataGolongan" data-id="<?php echo $golongan->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-sm btn-danger konfirmasiHapus-golongan" data-id="<?php echo $golongan->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <button class="btn btn-sm btn-info detail-dataGolongan" data-id="<?php echo $golongan->nama; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
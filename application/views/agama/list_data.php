<?php
  $no = 1;
  foreach ($dataAgama as $agama) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $agama->nama; ?></td>
      <td class="text-center" style="min-width:300px;">
          <button class="btn btn-sm btn-warning update-dataAgama" data-id="<?php echo $agama->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-sm btn-danger konfirmasiHapus-agama" data-id="<?php echo $agama->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-sm btn-info detail-dataAgama" data-id="<?php echo $agama->nama; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>
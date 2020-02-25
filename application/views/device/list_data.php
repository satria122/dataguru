<?php
  foreach ($dataDevice as $device) {
    ?>
    <tr>
      <td style="min-width:100px;"><b><?php echo $device->device_name; ?></b></td>
      <td><?php echo $device->sn; ?></td>
      <td><?php echo $device->vc; ?></td>
      <td><?php echo $device->ac; ?></td>
      <td><?php echo $device->vkey; ?></td>
      <td class="text-center" style="min-width:200px;"><!-- style for lebar kolom -->
        <button class="btn btn-warning btn-sm update-dataDevice" data-sn="<?php echo $device->sn; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger btn-sm konfirmasiHapus-device" data-sn="<?php echo $device->sn; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>

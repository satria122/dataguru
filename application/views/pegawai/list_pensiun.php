<?php $nomor = 1; ?>
<?php
  foreach ($dataPegawai as $pegawai) {
    $date_now = date('Y-m-d');
    $tgl_pensiun = $pegawai->tgl_pensiun;
    $tgl_menjenlang_pensiun = date('Y-m-d',strtotime($tgl_pensiun."-3 months"));
    
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
    <td class="text-center">
        <?php
        if($pegawai->tgl_pensiun!=''){
          if(strtotime($date_now)<strtotime($tgl_pensiun)){
            if(strtotime($date_now)<strtotime($tgl_menjenlang_pensiun)){
              echo '<span class="label label-warning">Aktiv</span>';
            }else{
              echo '<span class="label label-success">Aktiv</span>';
            }
          }else{
            echo '<span class="label label-danger">Pensiun</span>';
          }
        }else{
          echo '-';
        }
        ?>
    </td>
    <td class="text-center">
        <?php
        if($pegawai->tgl_pensiun!=''){
          echo $pegawai->tgl_pensiun;
        }else{
          echo '-';
        }
        ?>
    </td>
    <td><?php echo $pegawai->kelamin; ?></td>
    <td><?php echo $pegawai->agama; ?></td>
    <td><?php echo $pegawai->telp; ?></td>
    <td><?php echo $pegawai->alamat; ?></td>
    <td><?php echo $pegawai->sekolah; ?></td>
    <!-- <td class="text-center" style="min-width:300px;">
        <button class="btn btn-warning btn-sm update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i
                class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>"
            data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i>
            Delete</button> -->
    <!-- <button class="btn btn-sm btn-primary detail-dataKota" ><i class="glyphicon glyphicon-info-sign"></i> Pensiunkan</button> -->
    <!-- </td> -->
    </td>
</tr>
<?php
  }
?>
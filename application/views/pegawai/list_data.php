<?php $nomor = 1; ?>
<?php
  foreach ($dataPegawai as $pegawai) {
    $date_now = date('Y-m-d'); ?>

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
          if(strtotime($date_now)<strtotime($pegawai->tgl_pensiun)){
            if(strtotime($date_now)>strtotime($pegawai->tgl_menjelang_pensiun)){
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
    <td class="text-center">
    <?php if($pegawai->pengurusan_pensiun=='Belum'){ ?>
          <span class="label label-danger pull-right">Belum Verivikasi</span>
    <?php }else{ ?>
          <span class="label label-success pull-right">Terverivikasi</span>
    <?php } ?>
    </td>
    <td><?php echo $pegawai->kelamin; ?></td>
    <td><?php echo $pegawai->agama; ?></td>
    <td><?php echo $pegawai->telp; ?></td>
    <td><?php echo $pegawai->alamat; ?></td>
    <td><?php echo $pegawai->sekolah; ?></td>
    <td class="text-center" style="min-width:300px;">
        <!-- style for lebar kolom -->
        <button class="btn btn-warning btn-sm update-dataPegawai" data-id="<?php echo $pegawai->id; ?>"><i
                class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="<?php echo $pegawai->id; ?>"
            data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i>
            Delete</button>
        <!-- <button class="btn btn-sm btn-primary detail-dataKota" ><i class="glyphicon glyphicon-info-sign"></i> Pensiunkan</button> -->
    </td>
    </td>
</tr>
<?php
  }
?>
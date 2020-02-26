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
    <td class="text-center">
    <?php if($pegawai->pengurusan_pensiun=='Belum'){ ?>
      <button class="btn btn-success btn-sm tombol-verivikasi" data-id="<?php echo $pegawai->id; ?>" data-nama="<?php echo $pegawai->nama; ?>"  data-nip="<?php echo $pegawai->nip; ?>" data-golongan="<?php echo $pegawai->golongan; ?>" data-jabatan="<?php echo $pegawai->jabatan; ?>" data-tglpensiun="<?php echo $pegawai->tgl_pensiun; ?>"><i
                class="fa fa-check"></i> Verivikasi</button>
    <?php }else{ echo "-"; } ?>
        
    </td>
    </td>
</tr>
<?php
  }
?>
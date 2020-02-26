<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data guru</h3>
  <form method="POST" id="form-update-pegawai">
    <input type="hidden" name="id" value="<?php echo $dataPegawai->id; ?>">
		<input type="hidden" name="nip" value="<?php echo $dataPegawai->nip; ?>">
    
    <div class="input-group form-group">
		  <span class="input-group-addon" id="sizing-addon2">
			 <i class="glyphicon glyphicon-tag"></i>
		  </span>
		  <input type="text" disabled="true" class="form-control" placeholder="Nomor Induk Pegawai" name="nip_view" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->nip ?>">
		</div>
        
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->nama; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
        <input type="text" name="ttl" id="example-email" class="form-control" placeholder="TTL" value="<?php echo $dataPegawai->ttl; ?>">
      <!-- <span class="input-group-addon">
      </span>
        <input type="date" name="ttl2" id="ddtt" class="form-control" placeholder="Tgl Lahir" > -->
    </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Golongan" name="golongan" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->golongan; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <select name="jabatan" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
      <?php
      foreach ($dataJabatan as $jabatan) {
      ?>
      <option value="<?php echo $jabatan->nama; ?>" <?php if($jabatan->nama == $dataPegawai->jabatan){echo "selected='selected'";} ?>><?php echo $jabatan->nama; ?></option>
        <?php
      }
      ?>
      </select>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <select name="kota" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
        <?php
        foreach ($dataKota as $kota) {
        ?>
        <option value="<?php echo $kota->nama; ?>" <?php if($kota->nama == $dataPegawai->kota){echo "selected='selected'";} ?>><?php echo $kota->nama; ?></option>
        <?php
        }
        ?>
      </select>
    </div>
        
    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
        <input type="radio" name="jk" value="Laki-laki" id="laki" class="minimal" <?php if($dataPegawai->kelamin == 'Laki-laki'){echo "checked='checked'";} ?>>
        <label for="laki">Laki-laki</label>
      </span>
      <span class="input-group-addon">
        <input type="radio" name="jk" value="Perempuan" id="perempuan" class="minimal" <?php if($dataPegawai->kelamin == 'Perempuan'){echo "checked='checked'";} ?>> 
        <label for="perempuan">Perempuan</label>
      </span>
    </div>
        


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-bookmark"></i>
      </span>
      <!-- <select name="agama" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <?php
        foreach ($dataAgama as $agama) {
          ?>
          <option value="<?php echo $agama->nama; ?>">
            <?php echo $agama->nama; ?>
          </option>
          <?php
        }
        ?>
      </select> -->

      <select name="agama"  class="form-control"  aria-describedby="sizing-addon2" style="width: 100%">
        <option><?php echo $dataPegawai->agama; ?></option>
        <option>Islam</option>
        <option>Kristen</option>
        <option>Katolik</option>
        <option>Hindu</option>
        <option>Buddha</option>
        <option>Khonghucu</option>
      </select>

    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-education"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->telp; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <textarea name="alamat" class="form-control" rows="3"><?= $dataPegawai->alamat;?></textarea>

      
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Sekolah" name="sekolah" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->sekolah; ?>">
    </div>
    <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-calendar"></i>
            </span>
            <input type="date" class="form-control" name="tgl_pensiun" aria-describedby="sizing-addon2" value="<?php echo $dataPegawai->tgl_pensiun; ?>">
        </div>
    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>
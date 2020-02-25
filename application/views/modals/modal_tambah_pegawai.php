<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Guru</h3>

  <form id="form-tambah-pegawai" method="POST">
	<div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tag"></i>
    </span>
    <input type="text" class="form-control" placeholder="Nomor Induk Pegawai" name="nip" aria-describedby="sizing-addon2">
  </div>

	<div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-user"></i>
    </span>
    <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
  </div>

  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-briefcase"></i>
    </span>
    <input type="text" class="form-control" placeholder="Jabatan" name="golongan" aria-describedby="sizing-addon2">
  </div>

  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-map-marker"></i>
    </span>
      <input type="text" name="ttl1" id="example-email" class="form-control" placeholder="Tempat" >
    <span class="input-group-addon">
    </span>
      <input type="date" name="ttl2" id="ddtt" class="form-control" placeholder="Tgl Lahir" >
  </div>

 <!--  <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
          <input type="text" name="ttl1" id="example-email" placeholder="Tempat" class="minimal">

      </span>
      <span class="input-group-addon">
          <input type="text" name="ttl2" id="ddtt"  placeholder="Tgl Lahir" class="minimal"> 

      </span>
    </div> -->

  <!-- <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-briefcase"></i>
    </span>
    <select name="golongan" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
      <?php
      foreach ($dataGolongan as $golongan) {
        ?>
        <option value="<?php echo $jabatan->nama; ?>">
          <?php echo $golongan->nama; ?>
        </option>
        <?php
      }
      ?>
    </select>
  </div> -->

  <div class="input-group form-group">
    <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-briefcase"></i>
    </span>
    <select name="jabatan" class="form-control select2"  aria-describedby="sizing-addon2" style="width: 100%">
      <?php
      foreach ($dataJabatan as $jabatan) {
        ?>
        <option value="<?php echo $jabatan->nama; ?>">
          <?php echo $jabatan->nama; ?>
        </option>
        <?php
      }
      ?>
    </select>
  </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <select name="kota" class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <?php
        foreach ($dataKota as $kota) {
          ?>
          <option value="<?php echo $kota->nama; ?>">
            <?php echo $kota->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="">
      <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="jk" value="Laki-laki" id="laki" class="minimal">
      <label for="laki">Laki-laki</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="jk" value="Perempuan" id="perempuan" class="minimal"> 
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

      <select name="agama" class="form-control" required>
        <option value="">Pilih Agama</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katolik">Katolik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Khonghucu">Khonghucu</option>
      </select>

    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Telepon" name="telp" aria-describedby="sizing-addon2">
    </div>

     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <textarea name="alamat" placeholder="Alamat" class="form-control" rows="3"></textarea>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-education"></i>
      </span>
      <input type="text" class="form-control" placeholder="Asal Sekolah" name="sekolah" aria-describedby="sizing-addon2">
    </div>


    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
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
<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
    <div class="box-body">
        <div style="overflow-x:auto;">
            <table id="list-data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>TTL</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Status</th>
                        <th>Status Pensiun</th>
                        <th>Tgl pensiun</th>
                        <th>Verivikasi Pensiun</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Asal Sekolah</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="data-pensiun">
                </tbody>
        </div>
        </table>
    </div>
</div>
<div class="modal fade" id="modal-verivikasi" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Verivikasi Administrasi Pensiun</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin guru dibawah ini telah mengisi/atau melengkapi administrasi sebelum masa pensiun ?</p>
                <b>Nama : </b><span id="tampil_nama"></span><br>
               <b>NIP : </b><span id="tampil_nip"></span><br>
               <b>Status : </b><span id="tampil_status"></span>(<span id="tampil_golongan"></span>)<br>
               <b>Tgl Pensiun : </b><span id="tampil_tglpensiun"></span><br>
               <input type="hidden" id="kode_pegawai">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="tombol-verivikasipensiundua">Iya, yakin</button>
            </div>
        </div>
    </div>
</div>
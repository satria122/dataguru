<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
    <div class="box-body">
        <div style="overflow-x:auto;">
            <!-- scroll hozontal-->
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
                        <th>Tgl Pensiun</th>
                        <th>Verivikasi Pensiun</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Asal Sekolah</th>
                        <!-- <th style="text-align: center;">Aksi</th> -->
                    </tr>
                </thead>
                <tbody id="data-hampirpensiun">
                </tbody>
        </div>
        </table>
    </div>
</div>
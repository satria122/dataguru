<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_pegawai; ?></h3>

        <p>Jumlah Guru</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('Pegawai') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $jml_jabatan; ?></h3>

        <p>Jumlah Golongan</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-briefcase-outline"></i>
      </div>
      <a href="<?php echo base_url('Jabatan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $jml_kota; ?></h3>

        <p>Jumlah Status</p>
      </div>
      <div class="icon">
        <i class="ion ion-location"></i>
      </div>
      <a href="<?php echo base_url('Kota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  
  <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Golongan</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-jabatan" style="height:250px"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Status</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="data-kota" style="height:250px"></canvas>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xs-12">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Guru Menjelang Pensiun(<?php foreach($jumlah_hampirpensiun as $row ){ echo $row['total'];}?> orang)</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php foreach($list_hampirpensiun as $row){ ?>
                <li class="item">
                    <a href="javascript:void(0)" class="product-title"><?php echo $row['nama'];?>
                    <?php if($row['pengurusan_pensiun']=='Belum'){ ?>
                      <span class="label label-danger pull-right">Belum Verivikasi</span>
                      <?php }else{ ?>
                        <span class="label label-success pull-right">Terverivikasi</span>
                    <?php } ?>
                    </a>
                    <span class="product-description">
                          Nip : <?php echo $row['nip'];?> <br>
                          Golongan : <?php echo $row['golongan'];?> (<?php echo $row['jabatan'];?>) <br>
                          Tgl Pensiun : <?php echo $row['tgl_pensiun'];?>
                        </span>
                </li>
              <?php } ?>
               </ul>
            </div>
            <div class="box-footer text-center">
              <a href="<?php echo base_url('Pegawai/hampirpensiun')?>" class="uppercase">Lihat Semua Data</a>
            </div>
          </div>
  </div>
  <div class="col-lg-6 col-xs-12">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Guru Pensiun(<?php foreach($jumlah_pensiun as $row ){ echo $row['total'];}?> orang)</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              <?php foreach($list_pensiun as $row){ ?>
                <li class="item">
                    <a href="javascript:void(0)" class="product-title"><?php echo $row['nama'];?>
                    <?php if($row['pengurusan_pensiun']=='Belum'){ ?>
                      <span class="label label-danger pull-right">Belum Verivikasi</span>
                      <?php }else{ ?>
                        <span class="label label-success pull-right">Terverivikasi</span>
                    <?php } ?>
                    </a>
                    <span class="product-description">
                          Nip : <?php echo $row['nip'];?> <br>
                          Golongan : <?php echo $row['golongan'];?> (<?php echo $row['jabatan'];?>) <br>
                          Tgl Pensiun : <?php echo $row['tgl_pensiun'];?>
                        </span>
                </li>
              <?php } ?>
               </ul>
            </div>
            <div class="box-footer text-center">
              <a href="<?php echo base_url('Pegawai/pensiun')?>" class="uppercase">Lihat Semua Data</a>
            </div>
          </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
<script>
  //data jabatan
  var pieChartCanvas = $("#data-jabatan").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_jabatan; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);

  //data kota
  var pieChartCanvas = $("#data-kota").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = <?php echo $data_kota; ?>;

  var pieOptions = {
    segmentShowStroke: true,
    segmentStrokeColor: "#fff",
    segmentStrokeWidth: 2,
    percentageInnerCutout: 50,
    animationSteps: 100,
    animationEasing: "easeOutBounce",
    animateRotate: true,
    animateScale: false,
    responsive: true,
    maintainAspectRatio: true,
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
  };

  pieChart.Doughnut(PieData, pieOptions);
</script>
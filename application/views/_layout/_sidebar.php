<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $userdata->nama; ?></p>
                <!-- Status -->
                <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">LIST MENU</li>
            <!-- Optionally, you can add icons to the links -->

            <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
                <a href="<?php echo base_url('Home'); ?>">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Data Guru</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Pegawai'); ?>"><i class="fa fa-circle-o"></i> Data Semua Guru</a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Pegawai/hampirpensiun')?>"><i class="fa fa-circle-o"></i> Data Guru Menjelang Pensiun</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Pegawai/pensiun')?>"><i class="fa fa-circle-o"></i> Data Guru Pensiun</a></li>
                </ul>

            </li>
            <!-- <li class="treeview" id="link-sidik">
                    <a href="<?php 
                //echo base_url().'flexcode/index_register.php';
                //echo base_url('sidik');
                ?>">
                      <i class="fa fa-folder"></i> <span>Sidik Jari</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
              </li> -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('kota')?>"><i class="fa fa-circle-o"></i> Data Status</a></li>
                </ul>


                <!-- <ul class="treeview-menu">
                  <li><a href="<?php //echo base_url('Agama')?>"><i class="fa fa-circle-o"></i> Data Agama</a></li>
                </ul> -->

                <!-- <ul class="treeview-menu">
                  <li><a href="<?php //echo base_url('Golongan')?>"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
                </ul> -->

                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('Jabatan')?>"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
                </ul>

                <!-- <ul class="treeview-menu">
                  <li><a href="<?php //echo base_url('Device')?>"><i class="fa fa-briefcase"></i> Data Device</a></li>
                </ul> -->

            </li> <!-- /list treeview -->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
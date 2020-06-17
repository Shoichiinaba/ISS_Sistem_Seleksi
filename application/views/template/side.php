<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $userdata->nama; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="header">
        </li>
<!-- Menu Admin         -->
<?php if ($userdata->role=='Admin') { ?>
    <li class="treeview active">
          <li <?= $this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
          	<a href="<?php echo site_url('Dashboard'); ?>">
            <i style= 'color: purple' class=" fa fa-user-secret"></i> <span>Beranda</span>
          </a></li >
        </li>

        <li class="treeview active">
          <li <?=$this->uri->segment(1) =='Data_latih' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('Data_latih'); ?>">
            <i style= 'color: purple' class=" fa fa-clipboard"></i> <span>Data Latih</span>
          </a></li>

          <li class="treeview <?=$this->uri->segment(1) == 'tentukan_form' || $this->uri->segment(1) == 'tentukan_bantuan' ? 'active' : ''?>">
          <a href="#">
            <i style= 'color: purple' class="fa fa-strikethrough"></i> <span>Tentukan Penerima Bantuan</span>
            <span class="pull-right-container">
              <i style= 'color: purple' class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'tentukan_form' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('tentukan_form'); ?>"><i style= 'color: yellow' class="fa fa-language"></i> Dengan Form</a></li>
            <li <?= $this->uri->segment(1) == 'tentukan_bantuan' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('tentukan_bantuan'); ?>"><i style= 'color: yellow' class="fa fa-file-excel-o"></i> Dengan File excel</a></li>
          </ul>
          </li>

          <li <?=$this->uri->segment(1) =='' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url(''); ?>">
            <i style= 'color: purple' class=" fa fa-newspaper-o"></i> <span>Hasil Uji Data</span>
          </a></li>

          <li <?=$this->uri->segment(1) =='' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url(''); ?>">
            <i style= 'color: purple' class=" fa  fa-share-alt"></i> <span>History pengiriman Ke HRD</span>
          </a></li>

</li> 

<li class="treeview <?=$this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'User' ? 'active' : ''?>">
          <a href="#">
            <i style= 'color: purple' class="fa fa-users"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i style= 'color: purple' class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'admin' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('admin'); ?>"><i style= 'color: blue' class="fa fa-user-plus"></i> Tambah Admin</a></li>
            <li <?= $this->uri->segment(1) == 'User' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('User'); ?>"><i style= 'color: blue' class="fa  fa-list-alt"></i> List Data Admin</a></li>
          </ul>
</li>
<!-- Menu HRD -->
<?php } elseif ($userdata->role=='HRD' ) { ?>
    <li class="treeview active">
          <li <?= $this->uri->segment(1) == 'Dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
          	<a href="<?php echo site_url('Dashboard'); ?>">
            <i style= 'color: red' class=" fa fa-user-secret"></i> <span>Beranda</span>
          </a></li >
          </li>

          <li <?=$this->uri->segment(1) =='' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url(''); ?>">
            <i style= 'color: red' class=" fa  fa-share-alt"></i> <span>Hasil Perpanjangan</span>
          </a></li>
    </li> 

    <li class="treeview <?=$this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'User' ? 'active' : ''?>">
          <a href="#">
            <i style= 'color: red' class="fa fa-users"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i style= 'color: red' class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'admin' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('admin'); ?>"><i style= 'color: green' class="fa fa-user-plus"></i> Tambah Admin</a></li>
            <li <?= $this->uri->segment(1) == 'User' ? 'class="active"' : ''?>>
            <a href="<?php echo site_url('User/HRD'); ?>"><i style= 'color: green' class="fa  fa-list-alt"></i> List Data HRD</a></li>
          </ul>
    </li>
              <?php } else { ?>

              <?php } ?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>HOME<small><b style= 'color: blue'><?php echo $userdata->role; ?> </b></small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>
      <section class="content">
      <?php if ($userdata->role=='Admin') { ?>
                    <div class="callout callout-info">
                    <div class="callout callout-info" style="margin-bottom: 0!important;">
                    <center><h4><i class="fa fa-strikethrough"></i> Selamat Datang <b>" <i><?php echo $userdata->nama ; ?> "   </i> </b>   Anda Sudah Login Di ISS System Selection  <i class="fa fa-strikethrough"></i></h4></center>
                    <center><p>.Halaman Admin ini Berfungsi Untuk Penyeleksian Kontrak Karyawan .</p></center>
                  </div>
                </div>
                  <!-- Dasboard Dinsos -->
              <?php } elseif ($userdata->role=='HRD' ) { ?>
                    <div class="callout callout-warning">
                    <div class="callout callout-warning" style="margin-bottom: 0!important;">
                    <center><h4><i class="fa fa-tty"></i> Selamat Datang <b>" <i><?php echo $userdata->nama ; ?> "   </i> </b>   Anda Sudah Login Di ISS System Selection  <i class="fa fa-tty"></i></h4></center>
                    <center><p>.Halaman HRD ini Berfungsi Untuk Kontrak Karyawan, Yang sebelumnya sudah di seleksi oleh admin .</p></center>

                    </div>
                  </div>
              <?php } else { ?>

              <?php } ?>
      </section> 
  </div>
</div>




<div class="content-wrapper">
        <section class="content-header">
        <h1>
        Hasil Seleksi
          <small>Tidak Perpanjang </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Hasil Seleksi</a></li>
        </ol>
      </section>
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                        
                <div class="box-body">
                     <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" >
                            <thead class="bg-yellow-gradient">
                                <tr>
                                    <th width = '3%'>No</th>
                                    <th width ='8%'>NIP</th>
                                    <th width ='12%'>Nama</th>
                                    <th width ='8%'>Nilai Perpanjang</th>
                                    <th width ='8%'>Nilai Tidak</th>
                                    <th width ='7%'>Hasil</th>
                                    <th width ='7%'>Status HRD</th>
                                    <th width ='8%'>Tgl Dikontrak</th>
                                    <th width ='6%'>Action</th>

                                </tr>
                            </thead>
                                <tbody>
                                        <?php $no= 0; foreach ($list as $g ): $no++;?>
                                    <tr>
                                      <td><?php echo $no; ?>
                                      <td><?php echo $g->NIP; ?></td>
                                      <td><?php echo $g->nama_karyawan; ?></td>
                                      <td><?php echo $g->nilai_perpanjang; ?></td>
                                      <td><?php echo $g->nilai_tidak; ?> <input type="hidden" value="<?=$g->kirim;?>" name="kirim"> </td> 
                                      <td><?php echo "<span class='label label-success'>$g->hasil</span>"; ?></td>
                                      <td>
                                      <?php if($g->kirim==1){
                                                      echo "<span class='label label-warning'> Blm Verified</span>";
                                                      //$teks="Nonaktifkan Data";
                                                      $icon="switch";
                                                      $class="danger";
                                              }elseif($g->kirim==2){
                                                      echo "<span class='label label-primary'> Verified HRD</span>";
                                                      //$teks="Aktifkan Data";
                                                      $icon="switch";
                                                      $class="info";
                                              }elseif($g->kirim==3){
                                                      echo "<span class='label label-danger'> Tinjau ADMIN</span>";
                                                      //$teks="Aktifkan Data";
                                                      $icon="switch";
                                                      $class="info";
                                              }else{
                                              }?>
                                      </td>               
                                      <td><?php echo $g->tgl_kontrak; ?></td>
                                      <td>
                                              <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                    </tr>
                                        <?php endforeach;?>
                                </tbody>
                        </table>
                            <div class="row">
                                <div class="col-xs-12">
                                 <!-- Menu dan info-->
                                  <div class="box box-solid bg-blue-gradient">
                                    <div class="box-header">
                                      <i class="fa fa-child"></i>

                                      <a class="box-title" ><b style= 'color:white'>Informasi </h3></b> </a>
                                        <!-- tools box -->
                                        <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                        <!-- /. tools -->
                                        </div>
                                    <!-- /.box-header -->
                                        <div class="box-body no-padding">
                                        <!--The calendar -->
                                        <div id="calendar" style="width: 100%"></div>
                                        </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer text-black">
                                      
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box bg-aqua">
                                            <a href="<?php echo base_url('History_k') ?>" style= 'color: white'; class="info-box-icon"><i  class="glyphicon glyphicon-list-alt"></i></a>
                                                <div class="info-box-content">
                                                <span class="info-box-text">Jumlah Data Terseleksi</span>
                                                <span class="info-box-number"><?= $selekdat; ?> Karyawan</span>

                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 100%"></div>
                                                </div>
                                                    <span class="progress-description">
                                                    <?= $selekdat; ?> Karyawan Diseleksi
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box bg-green">
                                            <a href="<?php echo base_url('History_k/perpanjang') ?>" style= 'color: white'; class="info-box-icon"><i  class="glyphicon glyphicon-edit"></i></a>
                                                <div class="info-box-content">
                                                <span class="info-box-text">Diperpanjang</span>
                                                <span class="info-box-number"><?= $perpanjang_list; ?> Karyawan</span>

                                                <div class="progress">
                                                    <div class="progress-bar" style="width: <?= $perpanjang; ?>0%"></div>
                                                </div>
                                                    <span class="progress-description">
                                                    <?= $perpanjang;?> % Karyawan
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box bg-yellow">
                                            <a href="<?php echo base_url('History_k/tidak') ?>" style= 'color: white'; class="info-box-icon"><i  class="glyphicon glyphicon-floppy-remove"></i></a>
                                                <div class="info-box-content">
                                                <span class="info-box-text">Tidak Perpanjang</span>
                                                <span class="info-box-number"><?= $tidak; ?> Karyawan</span>

                                                <div class="progress">
                                                <div class="progress-bar" style="width: <?= $tidak; ?>0%"></div>
                                                </div>
                                                    <span class="progress-description">
                                                    <?= $tidak; 0?> % Karyawan
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        <!-- /.info-box -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <div class="info-box bg-red">
                                            <a href="<?php echo base_url('Laporan_ADM/laporantdk/')?>" target="_blank" style= 'color: white'; class="info-box-icon"><i  class="glyphicon glyphicon-print"></i></a>
                                                <div class="info-box-content">
                                                <span class="info-box-text">Cetak Laporan</span>
                                                
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                            <!-- /.info-box -->
                                            </div>
                                            <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    </div>
                                      <!-- /.row -->
                                </div>
                            </div>
                                  <!-- /.box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div> 
<!-- informasi modal -->
<?php $no=  0; foreach($list as $g  ): $no++;?>
  <div class="modal modal-danger fade" id="modal-info<?=$g->NIP;?>">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Informasi Seleksi Karyawan</h4>
                </div>
                <div class="modal-body">
                <table class="table table-bordered tabel-barang-ket">
                <thead><tr>
                  <th style="width: 40%;">#</th>
                  <th>Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>NIP</strong></td>
                  <td><?=$g->NIP; ?></td>
                </tr>
                <tr>
                  <td ><strong>Nama Karyawan</strong></td>
                  <td><?=$g->nama_karyawan; ?></td>
                </tr>
                <tr>
                  <td><strong>Penilaian Perpanjang</strong></td>
                  <td><?=$g->nilai_perpanjang; ?> Point</td>
                </tr>
				<tr>
                  <td><strong>Penilaian Tidak Perpanjang</strong></td>
                  <td><?=$g->nilai_tidak; ?> Point</td>
                </tr>
                <tr>
                  <td><strong>Hasil Penilaian</strong></td>
                  <td><?=$g->hasil; ?></td>
                </tr>
              </tbody>
            </table>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
              </div>
            </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
 </div>
<?php endforeach;?>

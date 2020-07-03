<div class="content-wrapper">
        <section class="content-header">
        <h1>
          DATA
          <small>Hasil Seleksi </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Hasil Seleksi</a></li>
        </ol>
      </section>
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Hasil Seleksi!!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')):?>
          <script>
            swal({
              title: 'Oops!!',
              text: "<?php echo $this->session->flashdata('error');?>",
              type: 'error'
            });
          </script>
        <?php endif; ?>


    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                        
                <div class="box-body">
                     <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" >
                            <thead class="bg-purple-gradient">
                                <tr>
                                    <th>No</th>
                                    <th width ='15%'>Nama</th>
                                    <th width ='18%'>Penampilan</th>
                                    <th width ='14%'>Kelengkapan</th>
                                    <th>Kehadiran</th>
                                    <th>Accident</th>
                                    <th width ='14%'>Knowlage</th>
                                    <th width ='12%'>Tanggung Jawab</th>
                                    <th width ='12%'>Team Work</th>
                                    <th width ='10%'>Best Employee</th>
                                    <th width ='10%'>Hasil</th>
                                    <th width ='8%'>Action</th>

                                </tr>
                            </thead>
                                <tbody>
                                        <?php $no= 0; foreach ($list as $g ): $no++;?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $g->nama_karyawan; ?></td>
                                        <td><?php echo $g->penampilan; ?></td>
                                        <td><?php echo $g->kelengkapan; ?></td>
                                        <td><?php echo $g->kehadiran; ?></td>
                                        <td><?php echo $g->accident	; ?></td>
                                        <td><?php echo $g->knowlage; ?></td>
                                        <td><?php echo $g->tanggung_jawab; ?></td>
                                        <td><?php echo $g->teamwork; ?></td>
                                        <td><?php echo $g->best_employee; ?></td>
                                        <td>
                                        <?php if($g->hasil=='Tidak diperpanjang'){
                                                            echo "<span class='label label-warning'> Tidak diperpanjang</span>";
                                                            // $button="Nonaktifkan Data";
                                                            $icon="switch";
                                                            $class="danger";
                                                    }elseif($g->hasil=='Perpanjang'){
                                                            echo "<span class='label label-success'> Perpanjang</span>";
                                                            // $button="Aktifkan Data";
                                                            $icon="switch";
                                                            $class="info";
                                                    }?>
                                            </td>
                                        </td>
                                        <td>
                                            <a type="button" data-toggle="modal" data-target="#modal-info<?=$g->NIP;?>" class="btn btn-primary btn-xs"  data-placement="top"  title="info"><i class="fa fa-exclamation"></i> Info</a>
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
              
                                        <div class="box-footer no-border">
                                          <div class="row">
                                              <div class="progress-group">
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                    <span class="progress-text">Data Hasil Seleksi</span>
                                                    <span class="progress-number"><b><?= $has_sel; ?></b>/<?= $has_sel; ?></span>
                                                    
                                                    <div class="progress sm">
                                                      <div class="progress-bar progress-bar-aqua" style="width: <?= $has_sel; ?>00%"></div>
                                                    </div>
                                                </div>
                                              </div>    
                                                  <!-- /.progress-group -->
                                              <div class="progress-group">
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                  <span class="progress-text">Seleksi Diperpanjang</span>
                                                  <span class="progress-number"><b><?=$has_per?></b>/ <?=$has_sel?></span>

                                                  <div class="progress sm">
                                                    <div class="progress-bar progress-bar-green" style="width: <?= $has_per ?>%"></div>
                                                  </div>
                                                </div>
                                              </div>
                                                  <!-- /.progress-group -->
                                              <div class="progress-group">
                                                <div class="col-md-4 col-sm-6 col-xs-12">
                                                  <span class="progress-text">Seleksi Tidak DiPerpanjang</span>
                                                  <span class="progress-number"><b><?= $has_en?></b>/ <?= $has_sel?></span>

                                                  <div class="progress sm">
                                                    <div class="progress-bar progress-bar-yellow" style="width: <?= $has_en?>%"></div>
                                                  </div>
                                                </div>
                                              </div>
                                                <!-- /.progress-group -->
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
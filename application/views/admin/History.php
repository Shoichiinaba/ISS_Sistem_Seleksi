<?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'DATA KARYAWAN!!',
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

<div class="content-wrapper">

    <section class="content-header">
        <h1>
        History
        <small>Kirim Ke HRD </small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > History</a></li>
        </ol>
    </section>
             <!-- Main content -->      
        <section class="content">
            <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                            <div class="box-body">
                                <form id="fm_verify">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped" >
                                            <thead class="bg-purple-gradient">
                                                <tr>
                                                    <th width = '3%'>No</th>
                                                    <th width ='8%'>NIP</th>
                                                    <th width ='12%'>Nama</th>
                                                    <th width ='8%'>Nilai Perpanjang</th>
                                                    <th width ='8%'>Nilai Tidak</th>
                                                    <th width ='7%'>Hasil</th>
                                                    <th width ='7%'>Status HRD</th>
                                                    <th width ='8%'>Tgl Dikontrak</th>
                                                    <th width ='12%'>Action</th>
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
                                            <td>
                                            <?php if($g->hasil=='Perpanjang'){
                                                            echo "<span class='label label-success'>$g->hasil</span>";
                                                            //$teks="Nonaktifkan Data";
                                                            $icon="switch";
                                                            $class="danger";
                                                    }elseif($g->hasil=='Tidak diperpanjang'){
                                                            echo "<span class='label label-danger'>$g->hasil</span>";
                                                            //$teks="Aktifkan Data";
                                                            $icon="switch";
                                                            $class="info";
                                                    }else{
                                                    }?>
                                            <td>
                                            <?php if($g->kirim==1){
                                                            echo "<span class='label label-warning'> Blm Verified</span>";
                                                            //$teks="Nonaktifkan Data";
                                                            $icon="switch";
                                                            $class="danger";
                                                    }elseif($g->kirim==3){
                                                            echo "<span class='label label-primary'> Verified HRD</span>";
                                                            //$teks="Aktifkan Data";
                                                            $icon="switch";
                                                            $class="info";
                                                    }elseif($g->kirim==2){
                                                            echo "<span class='label bg-maroon'> Tinjau ADMIN</span>";
                                                            //$teks="Aktifkan Data";
                                                            $icon="switch";
                                                            $class="info";
                                                    }else{
                                                    }?>
                                            </td>               
                                            <td><?php echo $g->tgl_kontrak; ?></td>
                                            <td>
                                            <?php if ($g->kirim=='1') { ?>
                                                <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                                <a type="button" data-toggle="modal" data-target="#modal-danger<?=$g->NIP;?>" class="btn bg-red btn-xs"  data-placement="top"  title="Tarik Data"><i class="fa fa-exchange"></i> Tarik Pengiriman</a>
                                            <?php } elseif ($g->kirim=='3' ) { ?>
                                                <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                            <?php } elseif ($g->kirim=='2' ) { ?>
                                                <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                                <a type="button" data-toggle="modal" data-target="#modal-ulang<?=$g->NIP;?>" class="btn bg-yellow btn-xs"  data-placement="top"  title="Kirim Ulang"><i class="fa fa-refresh"></i> Kirim Ulang</a>
                                                <a href="<?php echo site_url('History_k/delete/'.$g->NIP); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-danger btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                          <?php } else { ?>
                                                          <?php } ?>
                                        </tr>
                                            <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    <!-- menu informasi         -->
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
                                                          <span class="info-box-text">Jumlah Data Trtkirim ke HRD</span>
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
                                                      <a href="<?php echo base_url('Laporan_ADM/laporanall/')?>" target="_blank" style= 'color: white'; class="info-box-icon"><i  class="glyphicon glyphicon-print"></i></a>
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
                                            <!-- /.box akhir menu informasi -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
  </div>           
</div> 
<!-- Modal Detail -->
<?php $no=  0; foreach($list as $g  ): $no++;?>
  <div class="modal modal-info fade" id="modal-success<?=$g->NIP;?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nama Karyawan    : <?=$g->nama_karyawan; ?></h4>
              </div>
              <div class="modal-body">
                
              <ul class="timeline">

                <!-- Conten isi -->
                <li class="time-label">
                    <span class="bg-navy">
                        Kriteria Penilaian
                    </span>
                </li>
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-child bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><b style='color:navy'><?=$g->penampilan;?></b></span>
                            <h3 class="timeline-header"><a>Penampilan</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->kelengkapan;?></b></span>
                            <h3 class="timeline-header"><a>Kelengkapan</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->kehadiran;?></b></span>
                            <h3 class="timeline-header"><a>Kehadiran</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->accident;?></b></span>
                            <h3 class="timeline-header"><a>Accident</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->knowlage;?></b></span>
                            <h3 class="timeline-header"><a>Knowladge</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->tanggung_jawab;?></b></span>
                            <h3 class="timeline-header"><a>Tanggung jawab</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->teamwork;?></b></span>
                            <h3 class="timeline-header"><a>Teamwork</a></h3>
                            <span class="time"><b style='color:navy'><?=$g->best_employee;?></b></span>
                            <h3 class="timeline-header"><a>Best Employee</a></h3>
                        </div>
                    </li>
                    <li class="time-label">
                    <span class="bg-orange">
                        Hasil
                    </span>
                </li>
                    <li>
                        <!-- timeline icon -->
                        <i class="fa fa-user-md bg-red"></i>
                        <div class="timeline-item">
                            <span class="time"><b style='color:olive'><?=$g->nilai_perpanjang;?></b></span>
                            <h3 class="timeline-header"><a>Penilaian Perpanjang</a></h3>
                            <span class="time"><b style='color:orange'><?=$g->nilai_tidak;?></b></span>
                            <h3 class="timeline-header"><a>Penilaian Tidak</a></h3>
                            <span class="time"><b style='color:blue'><?=$g->hasil;?></b></span>
                            <h3 class="timeline-header"><a>Hasil</a></h3>
                            <span class="time"><b style='color:blue'>
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
                                                    }else{
                                                            echo "<label class='label label-primary> Lainnya</label>";
                                                            //$teks="Aktifkan Data";
                                                            $icon="switch";
                                                            $class="default";
                                                    }?>
                                            </td>
                            </b></span>
                            <h3 class="timeline-header"><a>status</a></h3>
                        </div>
                    </li>
                </ul>
                <!-- END conten-->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?php endforeach;?>


<!-- Kirim Ulang -->
<?php $no=  0; foreach($list as $g  ): $no++;?>
  <div class="modal modal-warning fade" id="modal-ulang<?=$g->NIP;?>">
    <div class="modal-dialog">
      <form action="<?php echo site_url('KirimHR/kirim_ulang'); ?>" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <div class='col-md-8'><input type="hidden" value="<?=$g->NIP;?>" name="NIP"></div>
            <h5>KARYAWAN BERHASIL DI KIRIM ULANG KE HRD</h5>
            <div class='col-md-8'><input type="hidden" value="<?=$g->kirim;?>" name="kirim"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-outline">Kirim Ulang</button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach;?>

<!-- Tarik Pengiriman ke HRD -->
<?php $no=  0; foreach($list as $g  ): $no++;?>
<div class="modal modal-danger fade" id="modal-danger<?=$g->NIP;?>">
  <div class="modal-dialog">
  <form action="<?php echo site_url('KirimHR/Tarik_dariHR'); ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Peringatan</h4>
      </div>
        <div class="modal-body">
        <h5>KARYAWAN AKAN DI TARIK DARI SISTEM HRD </h5>
        <h6>Nama karyawan yang di tarik ulang akan hilang dari sistem HRD </h6>
        <div class='col-md-8'><input type="hidden" value="<?=$g->NIP;?>" name="NIP"></div>
        <div class='col-md-8'><input type="hidden" value="<?=$g->kirim;?>" name="kirim"></div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-outline">Tarik Data</button>
      </div>
    </div>
    <!-- /.modal-content -->
    </form>
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach;?>
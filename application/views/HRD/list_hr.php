<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>


<div class="content-wrapper">
        <section class="content-header">
        <h1>
          Data Kiriman Admin
          <small>Siap Dikontrak </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Data Latih</a></li>
        </ol>
        </section>
    <section class="content">
      <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-body">
                        <form id="fm_verify">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead class="bg-teal">
                                        <tr>
                                            <th width = '3%'>No</th>
                                            <th width ='12%'>Nama</th>
                                            <th width ='8%'>Nilai Perpanjang</th>
                                            <th width ='8%'>Nilai Tidak</th>
                                            <th width ='7%'>Hasil</th>
                                            <th width ='7%'>Status</th>
                                            <th width ='8%'>Tgl Dikontrak</th>
                                            <th width ='18%'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php $no= 0; foreach ($list as $g ): $no++;?>
                                  <tr>
                                    <td><?php echo $no; ?>
                                    <td><?php echo $g->nama_karyawan; ?></td>
                                    <td><?php echo $g->nilai_perpanjang; ?></td>
                                    <td><?php echo $g->nilai_tidak; ?> 
                                    <td>
                                    <?php if($g->hasil=='Perpanjang'){
                                                    echo "<span class='label label-success'>$g->hasil</span>";
                                                    //$teks="Nonaktifkan Data";
                                                    $icon="switch";
                                                    $class="danger";
                                            }elseif($g->hasil=='Tidak diperpanjang'){
                                                    echo "<span class='label label-warning'>$g->hasil</span>";
                                                    //$teks="Aktifkan Data";
                                                    $icon="switch";
                                                    $class="info";
                                            }else{
                                            }?>
                                    </td>
                                    <td>
                                    <?php if($g->kirim==3){
                                                    echo "<span class='label label-warning'> Tinjau ADMIN</span>";
                                                    //$teks="Nonaktifkan Data";
                                                    $icon="switch";
                                                    $class="danger";
                                            }elseif($g->kirim==1){
                                                    echo "<span class='label label-primary'> Verified Admin</span>";
                                                    //$teks="Aktifkan Data";
                                                    $icon="switch";
                                                    $class="info";
                                            }else{
                                            }?>
                                    </td>        
                                    <td><?php echo $g->tgl_kontrak; ?></td>
                                    <td>
                                    <?php if ($g->hasil=='Perpanjang') { ?>
                                        <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                        <a type="button" href="<?= base_url('Kontrak_lap/kontrak/'.$g->NIP);?>" target="_blank" class="btn bg-blue btn-xs" data-placement="top"  title="Kontrak"><i class="fa fa-pencil-square-o"></i> Kontrak</a>
                                        <a type="button" data-toggle="modal" data-target="#modal-info<?=$g->NIP;?>" class="btn bg-olive btn-xs"  data-placement="top"  title="Verifikasi Kontrak"><i class="fa fa-paint-brush"></i> Verifikasi</a>
                                    <?php } elseif ($g->hasil=='Tidak diperpanjang' ) { ?>
                                        <a type="button" data-toggle="modal" data-target="#modal-success<?=$g->NIP;?>" class="btn bg-purple btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-newspaper-o"></i> Detail</a>
                                        <a type="button" href="<?= base_url('Kontrak_lap/end_kontrak/'.$g->NIP);?>" target="_blank" class="btn bg-red-gradient btn-xs" data-placement="top"  title="end Kontrak"><i class="fa fa-arrows-alt"></i> End Kontrak</a>
                                        <a type="button" data-toggle="modal" data-target="#modal-info<?=$g->NIP;?>" class="btn bg-olive btn-xs"  data-placement="top"  title="Verifikasi Kontrak"><i class="fa fa-paint-brush"></i> Verifikasi</a>
                                                <?php } else { ?>
                                                <?php } ?>
                                  </tr>

                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                          </form>
                        </div>
                    </div>
                 </div>
      </div>
    </section>
  </div>  

  <!-- Modal Detail -->
  <?php $no=  0; foreach($list as $g  ): $no++;?>
  <div class="modal modal-success fade" id="modal-success<?=$g->NIP;?>">
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
                    <span class="bg-purple">
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
                    <span class="bg-maroon">
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


          <!-- verifikasi -->
        <?php $no=  0; foreach($list as $g  ): $no++;?>
  <div class="modal modal-success fade" id="modal-info<?=$g->NIP;?>">
          <div class="modal-dialog">
          <form action="<?php echo site_url('KirimHR/verifiedHR'); ?>" method="post">
            <div class="modal-content">
              <div class="modal-header">
              <div class='col-md-8'><input type="hidden" value="<?=$g->NIP;?>" name="NIP"></div>
              <h5>KARYAWAN BERHASIL DI VERIVIKASI KONTRAK HRD</h5>
              <div class='col-md-8'><input type="hidden" value="<?=$g->kirim;?>" name="kirim"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" name="sunting" class="btn btn-outline">Verifikasi</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <?php endforeach;?>


        
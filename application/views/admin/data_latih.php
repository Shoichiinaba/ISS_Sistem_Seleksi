<div class="content-wrapper">
        <section class="content-header">
        <h1>
          Data Master
          <small>Data Latih </small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Data Latih</a></li>
        </ol>
      </section>
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Latih!!',
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
                    <div class="box box-success">
                        
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead class="bg-purple">
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
                                            <th width ='6%'>Action</th>

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
                                    <td><?php echo $g->hasil; ?></td>
                                    <td>

                                     <a type="button" data-toggle="modal" data-target="#modal-edit<?=$g->id;?>" class="btn btn-primary btn-xs"  data-placement="top"  title="Edit"><i class="fa fa-recycle"></i></a>

                                     <a href="<?php echo site_url('Data_latih/delete/'.$g->id); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn btn-danger btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash-o"></i></a>
                                </tr>

                                <?php endforeach;?>
                                </tbody>
                             </table>
                             <div class="row">
                                <div class="col-xs-12">
                                  
                                 <!-- Menu dan info-->
                                  <div class="box box-solid bg-green-gradient">
                                    <div class="box-header">
                                      <i style = 'color : navy' class="fa fa-puzzle-piece"></i>

                                      <a class="box-title" data-toggle="modal" data-target="#modal-tambah" ><b style= 'color: navy'>Tambah Data</h3></b> </a>
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
                                        <div class="col-sm-6">
                                          <!-- Progress bars -->
                                          <div class="clearfix">
                                            <span class="pull-left">Jumlah Data Latih</span>
                                            <b class="pull-right"> <i class="text-green"> <?php echo $jml_latih; ?> Data</i></b>
                                          </div>
                                          <div class="progress progress-sm active">
                                            <div class="progress-bar progress-bar-green progress-bar-striped" style="width: 100%;"></div>
                                          </div>

                                          <div class="clearfix">
                                            <span class="pull-left">Di Perpanjang</span>
                                            <b class="pull-right"> <b class="text-teal"> <?php echo $jml_perpanjang; ?> Data </b></b>
                                          </div>
                                          <div class="progress progress-sm active">
                                            <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php echo $jml_perpanjang; ?>%;"></div>
                                          </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                          <div class="clearfix">
                                            <span class="pull-left">Tidak Di Perpanjang</span>
                                            <b class="pull-right"> <b class="text-orange"> <?php echo $jml_tperpanjang; ?> Data </b></b>
                                          </div>
                                          <div class="progress progress-sm active">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $jml_tperpanjang; ?>%;"></div>
                                          </div>

                                        </div>
                                        <!-- /.col -->
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
<!-- modal tambah Data -->

<div id="modal-tambah" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Data_latih/tambah_data'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-purple">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Isikan Data & Kriteria</h4>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label class='col-md-4'>Nama Karyawan</label>
            <div class='col-md-8'><input type="text" name="nama_karyawan" autocomplete="off" placeholder="Nama Karyawan" class="form-control"
              required="" ></div>
          </div>
          <br><br>
          <div class="form-group">
              <label class="control-label col-md-4">Penampilan</label>
              <div class="col-md-8">
              <select name="penampilan" class="form-control">
                    <option value="">Pilih Penampilan</option>
                    <option value="Rapi">Rapi</option>
                    <option value="Tidak rapi">Tidak Rapi</option>
              </select>
              </div>
              </div>
              <br>
            <div class="form-group">
              <label class="control-label col-md-4">Kelengkapan</label>
              <div class="col-md-8">
              <select name="kelengkapan" class="form-control">
                    <option value="">Pilih kelengkapan</option>
                    <option value="Lengkap">Lengkap</option>
                    <option value="Tidak lengkap">Tidak Lengkap</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kehadiran</label>
              <div class="col-md-8">
              <select name="kehadiran" class="form-control">
                    <option value="">Pilih Kehadiran</option>
                    <option value="Bagus">Bagus</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Kurang">Kurang</option>
              </select>
              </div>
              </div>
                <br>
              <div class="form-group">
              <label class="control-label col-md-4">Accident</label>
              <div class="col-md-8">
              <select name="accident" class="form-control">
                    <option value="">Pilih Accident</option>
                    <option value="Disiplin">Disiplin</option>
                    <option value="Kurang Disiplin">Kurang Disiplin</option>
              </select>
              </div>
              </div>
              <br>
               <div class="form-group">
                          <label class="control-label col-md-4">Knowlage</label>
                          <div class="col-md-8">
                          <select name="knowlage" class="form-control">
                              <option value="">Pilih Knowlage</option>
                              <option value="Bagus">Bagus</option>
                              <option value="Cukup">Cukup</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
          <br>
          <div class="form-group">
                          <label class="control-label col-md-4">Tanggung Jawab</label>
                          <div class="col-md-8">
                          <select name="tanggung_jawab" class="form-control">
                              <option value="">Pilih Tanggung Jawab</option>
                              <option value="Bagus">Bagus</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
                          <label class="control-label col-md-4">Team Work</label>
                          <div class="col-md-8">
                          <select name="teamwork" class="form-control">
                              <option value="">Pilih TeamWork</option>
                              <option value="Bagus">Bagus</option>
                              <option value="Cukup">Cukup</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
                          <label class="control-label col-md-4">Best Employee</label>
                          <div class="col-md-8">
                          <select name="best_employee" class="form-control">
                              <option value="">Pilih Best Employee</option>
                              <option value="Pernah">Pernah</option>
                              <option value="Tidak Pernah">Tidak Pernah</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Hasil</label>
              <div class="col-md-8">
              <select name="hasil" class="form-control">
                    <option value="">Pilih Hasil</option>
                    <option value="Perpanjang">Diperpanjang</option>
                    <option value="Tidak diperpanjang">Tidak Diperpanjang</option>   
              </select>
              </div>
              </div>
      </br>
          <div class="modal-footer">
            <button type="button" class="btn bg-orange pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Simpan</button>
          </div>
        </form>
    </div>
  </div>
</div>    
</div>
</div>
</div>


<?php $no=  0; foreach($list as $g  ): $no++;?>
<div id="modal-edit<?=$g->id;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Data_latih/edit_latih'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-purple">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Isikan Data & Kriteria</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label class='col-md-4'>ID</label>
            <div class='col-md-8'><input type="text" value="<?=$g->id;?>" name="id" autocomplete="off" class="form-control" readonly=""
              required="" ></div>
          </div>
          <div class="form-group">
            <label class='col-md-4'>Nama Karyawan</label>
            <div class='col-md-8'><input type="text" name="nama_karyawan" value="<?=$g->nama_karyawan;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br><br></br></br>
          <div class="form-group">
              <label class="control-label col-md-4">Penampilan</label>
              <div class="col-md-8">
              <select name="penampilan" class="form-control">
              <option value="<?=$g->penampilan;?>"><?=$g->penampilan;?></option>
                    <option value="Rapi">Rapi</option>
                    <option value="Tidak rapi">Tidak Rapi</option>
              </select>
              </div>
              </div>
              <br>
            <div class="form-group">
              <label class="control-label col-md-4">Kelengkapan</label>
              <div class="col-md-8">
              <select name="kelengkapan" class="form-control">
              <option value="<?=$g->kelengkapan;?>"><?=$g->kelengkapan;?></option>
                    <option value="Lengkap">Lengkap</option>
                    <option value="Tidak lengkap">Tidak Lengkap</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Kehadiran</label>
              <div class="col-md-8">
              <select name="kehadiran" class="form-control">
              <option value="<?=$g->kehadiran;?>"><?=$g->kehadiran;?></option>
                    <option value="Bagus">Bagus</option>
                    <option value="Cukup">Cukup</option>
                    <option value="Kurang">Kurang</option>
              </select>
              </div>
              </div>
                <br>
              <div class="form-group">
              <label class="control-label col-md-4">Accident</label>
              <div class="col-md-8">
              <select name="accident" class="form-control">
              <option value="<?=$g->accident;?>"><?=$g->accident;?></option>
                    <option value="Disiplin">Disiplin</option>
                    <option value="Kurang Disiplin">Kurang Disiplin</option>
              </select>
              </div>
              </div>
              <br>
               <div class="form-group">
                          <label class="control-label col-md-4">Knowlage</label>
                          <div class="col-md-8">
                          <select name="knowlage" class="form-control">
                          <option value="<?=$g->knowlage;?>"><?=$g->knowlage;?></option>
                              <option value="Bagus">Bagus</option>
                              <option value="Cukup">Cukup</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
          <br>
          <div class="form-group">
                          <label class="control-label col-md-4">Tanggung Jawab</label>
                          <div class="col-md-8">
                          <select name="tanggung_jawab" class="form-control">
                          <option value="<?=$g->tanggung_jawab;?>"><?=$g->tanggung_jawab;?></option>
                              <option value="Bagus">Bagus</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
                          <label class="control-label col-md-4">Team Work</label>
                          <div class="col-md-8">
                          <select name="teamwork" class="form-control">
                          <option value="<?=$g->teamwork;?>"><?=$g->teamwork;?></option>
                              <option value="Bagus">Bagus</option>
                              <option value="Cukup">Cukup</option>
                              <option value="Kurang">Kurang</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
                          <label class="control-label col-md-4">Best Employee</label>
                          <div class="col-md-8">
                          <select name="best_employee" class="form-control">
                          <option value="<?=$g->best_employee;?>"><?=$g->best_employee;?></option>
                              <option value="Pernah">Pernah</option>
                              <option value="Tidak Pernah">Tidak Pernah</option>
                          </select>
                          </div>
                      </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-4">Hasil</label>
              <div class="col-md-8">
              <select name="hasil" class="form-control">
              <option value="<?=$g->hasil;?>"><?=$g->hasil;?></option>
                    <option value="Perpanjang">Diperpanjang</option>
                    <option value="Tidak diperpanjang">Tidak Diperpanjang</option>   
              </select>
              </div>
              </div>
      </br>
          <div class="modal-footer">
          <button type="button" class="btn bg-orange pull-left" data-dismiss="modal"><i class="fa fa-times-circle"></i> Batal</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-send-o"></i> Ubah</button>
          </div>
        </form>
    </div>
  </div>
</div>    
</div>
</div>
</div>
<?php endforeach;?>
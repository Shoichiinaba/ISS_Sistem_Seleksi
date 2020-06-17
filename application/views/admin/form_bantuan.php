<!-- Alert Sweet -->
<?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Prediksi!!',
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
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Form Selection<small><?php echo $userdata->role; ?> </small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Form Seleksi</a></li>
        </ol>
      </section>
      <section class="content">
      <div class="row">
          <div class="col-md-6">

                <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Identitas Pemohon</h3>
                        </div>
                         <form name="form_" action="<?= base_url('tentukan_bantuan/simpan_predform')?>" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class='col-md-4'>NIK</label>
                                    <div class='col-md-7'>
                                    <input type="text" id="NIK" name="no_kk" placeholder="Masukan No. KK" class="form-control" required="" ></div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class='col-md-4'>Nama Karyawan</label>
                                    <div class='col-md-7'><input type="text" name="nama" autocomplete="off" placeholder="Nama Penduduk" class="form-control"
                                        required="" ></div>
                                </div>
                            </div>

                <div class="box box-success">
                        <div class="box box-solid bg-green-gradient">
                            <div class="box-header">
                                    <i style = 'color : navy' class="fa fa-sort-numeric-asc"></i>

                                    <a class="box-title" data-toggle="modal" data-target="#modal-tambah" ><b style= 'color: navy'>Data Kategori</h3></b> </a>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-black">
                                    <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Penampilan</label>
                                        <div class="col-md-7">
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
                                        <div class="col-md-7">
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
                                        <div class="col-md-7">
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
                                        <div class="col-md-7">
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
                                                    <div class="col-md-7">
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
                                                    <div class="col-md-7">
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
                                                    <div class="col-md-7">
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
                                                    <div class="col-md-7">
                                                    <select name="best_employee" class="form-control">
                                                        <option value="">Pilih Best Employee</option>
                                                        <option value="Pernah">Pernah</option>
                                                        <option value="Tidak Pernah">Tidak Pernah</option>
                                                    </select>
                                                    </div>
                                        </div>
                                    </div>
                                <!-- /.row -->
                                </div>
                            </div>
                      <!-- /.box-body -->
                </div>
                    <!-- /.box -->
                    <div class="box-footer">
                    <button style="float:left;" class="btn btn bg-navy"><i class="fa fa-subscript"> Prediksi</i></button>
                    </div>
            </div>
          </div>

          <div class="col-md-6">
          <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Informasi Hasil Prediksi</h3>
                </div>
                <!-- form start -->
                
                <div class="box-body"> 
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-copy"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Penilaian Perpanjang</span>
                                <span class="info-box-number">0,5200</span>
                            </div>
                            <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-thumbs-down"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Penilaian Tidak Diperpanjang</span>
                                <span class="info-box-number">0,3050</span>
                            </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box bg-teal">
                        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Hasil Akhir</span>
                                <span class="info-box-number">Perpanjang</span>
                            </div>
                        <!-- /.info-box-content -->
                    </div>

                </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <td><a href="<?php echo base_url("tentukan_bantuan/form_bantuan"); ?>">
                    <button type="button" class="btn bg-orange"><i class="fa fa-houzz">  Reset</i></button>
                    </td></a>

                    <button type="submit" class="btn bg-maroon pull-right"><i class="fa fa-save"> Simpan</i></button>
                  </div>
                  <!-- /.box-footer --> 
                </form>
              </div>
          </div>
        </div>          

      </section> 
  </div>
</div>
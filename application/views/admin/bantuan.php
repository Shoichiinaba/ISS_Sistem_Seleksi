 <script>
$(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
  

  <div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Tentukan<small>Prediksi Penerima Bantuan </small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Prediksi Penerima</a></li>
        </ol>
      </section>
            <section class="content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box-header with-border">
                        <i ><h3 class="box-title">Masukkan File Excel</h3><i>
                            <div class="bg-olive" class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa fa-times"></i></button>
                            </div>

                                  <div class="box-body" >
                                <!-- START LOCK SCREEN ITEM -->
                                <div class="lockscreen-item" >
                                  <!-- lockscreen image -->
                                  <div class="lockscreen-image">
                                    <img src="<?php echo base_url().'assets/img/excel.jpg'; ?>" alt="User Image">
                                  </div>
                                  <!-- /.lockscreen-image -->

                                  <!-- lockscreen credentials (contains the form) -->
                                  <form class="lockscreen-credentials">
                                    <div class="input-group has-error">
                                      <input type="botton" id="inputSuccess" class="form-control" placeholder="Tekan Pilih File ">

                                      <div class="input-group-btn">
                                        <button type="button" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.lockscreen-item -->
                                
                            <form method="post" action="<?php echo base_url("tentukan_bantuan/form"); ?>" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-xs-5"></div>
                                <div class="col-xs-2">
                                                <input type="file" name="file">
                                </div>
                                </div>
                                <br>
                                <div class="text-center">
                                <div class="col-xs-12">
                                              <button class="btn btn-primary btn-lrg ajax" type="submit"  name="preview"><i class="fa fa-mail-reply-all"></i> Prediksi </button>
                                            </div>
                                </div>
                                    <br/>
                            </form>
                    </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <spam class="text-green"> Menentuakan siapa yang mendapatkan Bantuan dengan banyak data </spam> 
                          </div>
                  <!-- /.widget-user -->
                  </div>
                </div>
            </section>

                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                       <div class="box box-primary">
                          <div class="box-header with-border">
                          <h3 class="box-title">Tabel Preview</h3> 
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                              <!-- isi Prediksi -->
                            
                            <div id="insert_item_data"></div>
                            </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>
</div>
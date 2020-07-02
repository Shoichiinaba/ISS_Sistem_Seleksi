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
        <h1>Tentukan<small>Seleksi Karyawan </small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Halaman Seleksi</a></li>
        </ol>
      </section>
            <section class="content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box-header with-border">
                        <i ><h3 class="box-title">Masukkan File Excel</h3><i>
                            <div class="bg-purple-gradient" class="box-tools pull-right">
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
                                    <img src="<?php echo base_url().'assets/img/excel1.jpg'; ?>" alt="User Image">
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
                                              <button class="btn bg-purple-gradient btn-lrg ajax" type="submit"  name="preview"><i class="fa fa-recycle"></i> Seleksi Karyawan </button>
                                            </div>
                                </div>
                                    <br/>
                            </form>
                    </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <spam class="text-purple"> Halaman Untuk Seleksi Yang Memerlukan Data Banyak </spam> 
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
                          <h3 class="box-title">Data Hasil Seleksi</h3> 
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
                              <?php
                                if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                                  if(isset($upload_error)){ // Jika proses upload gagal
                                    echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                    die; // stop skrip
                                  }
                                  
                                  // Buat sebuah div untuk alert validasi kosong
                                  echo "<div style='color: red;' id='kosong'>
                                  Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                                  </div>";
                                  // Buat sebuah tag form untuk proses import data ke database
                                  echo "<form id='form-save' method='post' action=''";
                                  
                                  
                                  echo "<table border='1' cellpadding='8'>
                                  <tr>
                                   <div class='box-body'>
                                    <div class='table-responsive'>
                                    <table class='table table-bordered table-striped' id='example2'>
                                  <th colspan='17'>Tampil Data Prediksi</th>
                                  </tr>
                                  <tr class='bg-purple'>
                                      <th>NIP</th>
                                      <th>Nama Karyawan</th>
                                      <th>Penampilan</th>
                                      <th>Kelengkapan</th>
                                      <th>Kehadiran</th>
                                      <th>Accident</th>
                                      <th>Knowlage </th>
                                      <th>Tanggung Jawab</th>
                                      <th>Teamwork</th>
                                      <th>Best Employee</th>
                                      <th style= 'color: yellow';>N. Perpanjang</th>
                                      <th style= 'color: yellow';>N.T.Perpanjang</th>
                                      <th style='color: orange;'>Hasil </th>
                                  </tr>";
                                  
                                  $numrow = 1;
                                  $kosong = 0;
                                  
                                  // Lakukan perulangan dari data yang ada di excel
                                  // $sheet adalah variabel yang dikirim dari controller
                                  foreach($sheet as $row){ 
                                    // Ambil data pada excel sesuai Kolom
                                    $NIP = $row['A']; 
                                    $nama_karyawan = $row['B']; 
                                    $penampilan = $row['C']; 
                                    $kelengkapan = $row['D']; 
                                    $kehadiran = $row['E'];
                                    $accident = $row['F'];
                                    $knowlage = $row['G'];
                                    $tanggung_jawab = $row['H'];
                                    $teamwork = $row['I'];
                                    $best_employee = $row['J'];

                                    $naive->data_set(
                                      $penampilan,
                                      $kelengkapan,
                                      $kehadiran,
                                      $accident,
                                      $knowlage,
                                      $tanggung_jawab,
                                      $teamwork,
                                      $best_employee);

                                    $perhitungan = $naive->mining();
                                    // Cek jika semua data tidak diisi
                                    if(empty($NIP) && empty($nama_karyawan) && empty($penampilan) && empty($kelengkapan) && empty($kehadiran) && empty($accident) && empty($knowlage) && empty($tanggung_jawab) && empty($teamwork) && empty($best_employee))
                                      continue; // Tambah 1 variabel $kosong
                                    
                                  
                                    if($numrow > 1)
                                    {
                                      // Validasi apakah semua data telah diisi
                                      $NIP_td = ( ! empty($NIP))? "" : " style='background: #E07171;'"; 
                                      $nama_karyawan_td = ( ! empty($nama_karyawan))? "" : " style='background: #E07171;'";
                                      $penampilan_td = ( ! empty($penampilan))? "" : " style='background: #E07171;'"; 
                                      $kelengkapan_td = ( ! empty($kelengkapan))? "" : " style='background: #E07171;'"; 
                                      $kehadiran_td = ( ! empty($kehadiran))? "" : " style='background: #E07171;'"; // 
                                      $accident_td = ( ! empty($accident))? "" : " style='background: #E07171;'"; 
                                      $knowlage_td = ( ! empty($knowlage))? "" : " style='background: #E07171;'"; 
                                      $tanggung_jawab_td = ( ! empty($tanggung_jawab))? "" : " style='background: #E07171;'"; 
                                      $teamwork_td = ( ! empty($teamwork))? "" : " style='background: #E07171;'";
                                      $best_employee_td = ( ! empty($best_employee))? "" : " style='background: #E07171;'";  
                                      
                                      // Jika salah satu data ada yang kosong
                                          if(empty($NIP) or empty($nama_karyawan) or empty($penampilan) or empty($kelengkapan) or empty($kehadiran) or empty($accident) or empty($knowlage) or empty($tanggung_jawab) or empty($teamwork) or empty($best_employee)){
                                              $kosong++;
                                    }
                                      echo "<tr>";
                                      echo "<td".$NIP_td.">".$NIP."<input type='hidden' name='NIP[]' value='$NIP'/> </td>";
                                      echo "<td".$nama_karyawan_td.">".$nama_karyawan."<input type='hidden' name='nama_karyawan[]' value='$nama_karyawan'/></td>";
                                      echo "<td".$penampilan_td.">".$penampilan."<input type='hidden' name='penampilan[]' value='$penampilan'/></td>";
                                      echo "<td".$kelengkapan_td.">".$kelengkapan."<input type='hidden' name='kelengkapan[]' value='$kelengkapan'/></td>";
                                      echo "<td".$kehadiran_td.">".$kehadiran."<input type='hidden' name='kehadiran[]' value='$kehadiran'/></td>";
                                      echo "<td".$accident_td.">".$accident."<input type='hidden' name='accident[]' value='$accident'/></td>";
                                      echo "<td".$knowlage_td.">".$knowlage."<input type='hidden' name='knowlage[]' value='$knowlage'/></td>";
                                      echo "<td".$tanggung_jawab_td.">".$tanggung_jawab."<input type='hidden' name='tanggung_jawab[]' value='$tanggung_jawab'/></td>";
                                      echo "<td".$teamwork_td.">".$teamwork."<input type='hidden' name='teamwork[]' value='$teamwork'/></td>";
                                      echo "<td".$best_employee_td.">".$best_employee."<input type='hidden' name='best_employee[]' value='$best_employee'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Perpanjang'], 5)."<input type='hidden' name='nilai_perpanjang[]' value='".round($perhitungan['nilai']['Perpanjang'], 5)."'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Tidak diperpanjang'], 5)."<input type='hidden' name='nilai_tidak[]' value='".round($perhitungan['nilai']['Tidak diperpanjang'], 5)."'/></td>";
                                      echo "<td style= 'color: blue';>".$perhitungan['Status']."<input type='hidden' name='hasil[]' value='".$perhitungan['Status']."'/></td>";
                                      echo "</tr>";
                                    }
                                    $numrow++;
                                  }
                                  
                                  echo "</table>";
                                  
                                  // Cek apakah variabel kosong lebih dari 0
                                  // Jika lebih dari 0, berarti ada data yang masih kosong
                                  if($kosong > 0){
                                  ?>  
                                    <script>
                                    $(document).ready(function(){
                                      // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                      $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                      
                                      $("#kosong").show(); // Munculkan alert validasi kosong
                                    });
                                    </script>
                                  </div>
                                  </div>
                                  <?php
                                  }else{ // Jika semua data sudah diisi
                                    echo "<hr>";
                                    
                                    // Buat sebuah tombol untuk mengimport data ke database
                                    echo "<button type='submit' class='btn bg-olive'> <i class='fa fa-rocket'>  Kirim Ke HRD</i></button>";
                                    echo " ";
                                    echo "<a href='".base_url("tentukan_bantuan")."'class='btn bg-orange'> <i class='fa fa-times-circle'> Cancel </i></a>";
                                    echo " <br>";
                                    echo " <br>";
                                    // echo "<button type='button' name='save' id='save' class='btn btn-info'>Simpan</button>";
                                  }
                                  echo "</form>";
                                }
                                ?>
                              <!-- Akhir isi Prediksi -->
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
<!-- Kirim HRD -->
<script>
  $(document).ready(function(){
    
    $('.bg-olive').click(function(e){
      e.preventDefault();
      $.ajax({
        url:"<?php echo base_url().'tentukan_bantuan/kirimHRD/'; ?>",
        data:$('#form-save').serialize(),
        method:'POST',
        success:function(data){
          console.log(data);
          swal("sukses","Data Berhasil Di Kirim Ke HRD", "success");
        },
        error:function(data){
          swal("Oops....", "Data Gagal Di Kirim (NIP Sudah Diseleksi) :(", "error");
        }

      }).fail(function(t, j){
      
      });
    });
      
  });

</script>
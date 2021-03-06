<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tentukan_bantuan extends AUTH_Controller {
	private $filename = "import_data";
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('M_array');
		$this->load->model('M_HR');
		$this->load->helper('url');
	}
	
	function index()
	{
		$data['content'] 		= 'admin/bantuan';
		$data['Tperpanjang']	=$this->M_HAdmin->Tperpanjang();
		$data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['userdata'] 		= $this->userdata;
        $this->load->view($this->template, $data);	
	}

	function kirimHRD(){
    	$NIP =$_POST['NIP'];
    	$nama_karyawan =$_POST['nama_karyawan'];
    	$penampilan =$_POST['penampilan'];
    	$kelengkapan =$_POST['kelengkapan'];
    	$kehadiran =$_POST['kehadiran'];
    	$accident =$_POST['accident'];
    	$knowlage =$_POST['knowlage'];
		$tanggung_jawab =$_POST['tanggung_jawab'];
		$teamwork =$_POST['teamwork'];
		$best_employee =$_POST['best_employee'];
    	$nilai_perpanjang =$_POST['nilai_perpanjang'];
    	$nilai_tidak =$_POST['nilai_tidak'];
		$hasil =$_POST['hasil'];
		$kirim ='1';
		$tgl_kontrak =date('d/m/Y');

    	$data = array();
    	for($i = 0; $i<count($NIP); $i++){
    		array_push($data, array(
    			'NIP'=>$NIP[$i],
				'nama_karyawan'=>$nama_karyawan[$i],
				'penampilan'=>$penampilan[$i],
				'kelengkapan'=>$kelengkapan[$i],
				'kehadiran'=>$kehadiran[$i],
				'accident'=>$accident[$i],
				'knowlage'=>$knowlage[$i],
				'tanggung_jawab'=>$tanggung_jawab[$i],
				'teamwork'=>$teamwork[$i],
				'best_employee'=>$best_employee[$i],
				'nilai_perpanjang'=>$nilai_perpanjang[$i],
				'nilai_tidak'=>$nilai_tidak[$i],
				'hasil'=>$hasil[$i],
				'kirim'=>$kirim,
				'tgl_kontrak'=>$tgl_kontrak,
    		));
    	}
    	$this->M_HR->insert_multiple($data);
		redirect('tentukan_bantuan');
	
	}

	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			
			$upload = $this->M_HR->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}

		$this->load->model('M_array');
		$latih = $this->M_array;
		$latih->parameter('penampilan',
		'kelengkapan',
		'kehadiran',
		'accident',
		'knowlage',
		'tanggung_jawab',
		'teamwork',
		'best_employee',
		'hasil');
		$latih->Get();

		$this->load->library('naive_bayes');
		$bayes = $this->naive_bayes;
		$bayes->data = $latih->tampil_data();
		$bayes->data_kategori = $latih->tampil_data_kategori();
		$bayes->set_class('hasil');
		
		
		$data['userdata'] 		= $this->userdata;
		$data['content']  		= 'admin/bantuan';
		$data['perpanjang']		=$this->M_HAdmin->hitperpanjang();
		$data['naive'] 			= $bayes;
		$this->load->view($this->template, $data);
	}

	function hitung_data(){
    	$this->load->model('M_naive');
    	$this->load->library('naive_bayes');

    	$data_training = $this->M_naive;

    	$data_training->parameter('penampilan', 'kelengkapan', 'kehadiran', 'accident', 'knowlage', 'tanggung_jawab', 'teamwork', 'best_employee', 'hasil');
		$data_training->Get();

		$algoritma = $this->naive_bayes;
		$algoritma->data = $data_training->tampil_data();
		$algoritma->data_kategori = $data_training->tampil_data_kategori();
		$algoritma->set_class('hasil');
		
		$nip = $this->input->get('nip');
		$nama = $this->input->get('nama');
		$p1 = $this->input->get('penampilan');
		$p2 = $this->input->get('kelengkapan');
		$p3 = $this->input->get('kehadiran');
		$p4 = $this->input->get('accident');
		$p5 = $this->input->get('knowlage');
		$p6 = $this->input->get('tanggung_jawab');
		$p7 = $this->input->get('teamwork');
		$p8 = $this->input->get('best_employee');

		$import[0]=array($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8);

		for($i=0; $i<count($import); $i++){
			$d = $import[$i];
			$algoritma->data_set($d[0], $d[1], $d[2], $d[3], $d[4], $d[5], $d[6], $d[7]);
			$perhitungan = $algoritma->mining();
			$data_out = array(
				'nip'=>$nip,
				'nama'=>$nama,
				'input'=>$d,
				'hasil'=>$perhitungan
			);
			echo json_encode($data_out);
		}
    }
    function simpan_perhitungan(){
    	$this->load->model('M_HAdmin');
    	$nip = $_GET['nip'];
    	$nama = $_GET['nama'];
    	$data_form = $_GET['data_form'];
    	$hasil = $_GET['hasil'];
    	$perpanjang = $_GET['perpanjang'];
    	$tidak_diperpanjang = $_GET['tidak_diperpanjang'];
    	$kirim = $_GET['kirim'];
		$tgl_kontrak = date('d/m/Y');
		
    	$r = $this->M_HAdmin->simpan_hasil_perhitungan($data_form, $hasil, $nama, $nip, $kirim, $perpanjang, $tidak_diperpanjang, $tgl_kontrak);
    	echo json_encode(array( 
    		'respon' => $r,
    		'status' => ($r) ? 200 : 404
    	 ));
    }
	
}

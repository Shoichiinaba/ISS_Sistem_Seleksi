<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_lap extends CI_Controller {
		function __construct() {
		parent::__construct();
		$this->load->model('M_HR');
		}
		function index()
	{
    
	}		
    // Surat Perjanjian Kontrak
    function kontrak($NIP)
    {
     

        $data = $this->M_HR->get_kontrak($NIP);
        
        if($data != 'NO_DATA_QUERY'){
            $NIP = $data[0]['NIP'];
            $nama_karyawan = $data[0]['nama_karyawan'];
            $nilai_perpanjang = $data[0]['nilai_perpanjang'];
            $nilai_tidak = $data[0]['nilai_tidak'];
            $hasil = $data[0]['hasil'];
            $tgl_kontrak = $data[0]['tgl_kontrak'];

            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/kon.png",13,1,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PERJANJIAN KERJA ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'UNTUK JANGKA WAKTU TERTENTU ',0,0,'C');
        $pdf->Ln(3);
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(90,12,'Alamat: Jl.',0,0,'C');
        $pdf->Cell(26,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(70,12,'Code Pos: ',0,0,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(4);

        // konten lampiran
        $pdf->SetFont('Arial','',11);
        $pdf->Ln(18);
        $pdf->Cell(35, 4, 'Perjanjian kerja ini dibuat dan ditandatangani di Semarang, untuk, oleh, dan antara pihak dibawah ini:', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4, '1. Nama Lengkap', 0, 0, 'L'); 
        $pdf->Cell(85, 4,'         :      --', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, '    Jabatan', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : Manager Personalia', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'         :', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4, 'Dalam hal ini bertindak untuk dan atas nama PT. ISS Indonesia, yang berdomisili di jl.Soekarno Hatta', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'No 12, disebut dengan : PIHAK PERTAMA.', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4, '2. NIP', 0, 0, 'L'); 
        $pdf->Cell(85, 4,'         : '.$NIP, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, '    Nama Karyawan', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : '.$nama_karyawan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    Penilaian Perpanjang', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : '.$nilai_perpanjang, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    Penilaian Tidak', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : '.$nilai_tidak, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    Mulai Perpanjang', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : '.$tgl_kontrak, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    Status', 0, 0, 'L');
        $pdf->Cell(85, 4,'         : '.$hasil, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4,'Dalam hal ini bertindak atas nama sendiri, untuk selanjutnya disebut PIHAK KEDUA.', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4,'Pihak pertama dan pihak kedua sepakat untuk mengikat satu sama lain dalam perjanjian kerja untuk', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'waktu tertentu (PKWT), dengan ketentuan sebagai nama dituangkan dalam pasal-pasal dibawah ini.', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 1', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' MASA KERJA, TUGAS DAN TANGGUNG JAWAB', 0, 0, 'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Ln(10);
        $pdf->Cell(35, 4,'a. Masa perjanjian kerja selama 2 Tahun terhitung sejak tanggal ', 0, 0, 'L');
        $pdf->Cell(98, 4,''.$tgl_kontrak, 0, 0, 'R');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'b. Perjanjian kerja ini dapat berakhir sebelum habis masa berlakunya atas kesepakatan kedua belah pihak', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'c. Pihak kedua sebagai karyawan bertanggung jawab dan bertugas menjaga kebersihan.', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 2', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' WAKTU KERJA', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35, 4,'Waktu kerja disesuaikan dengan keperluan pekerjaan atau mengikuti ketentuan yang berlaku pada Pihak Pertama', 0, 0, 'L');
        $pdf->Ln(25);
      
       
        $pdf->Cell(190, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(37, 4, 'Pihak Pertama,', 0, 0, 'C');
        $pdf->Cell(132, 4, 'Pihak Kedua,', 0, 0, 'R');
        $pdf->Ln(20);
        $pdf->Cell(47, 4,'JOKO PRIYANTO, SH, MS.i', 0, 0, 'L');
        $pdf->Cell(125, 4,''.$nama_karyawan, 0, 0, 'R');
        $pdf->setlinewidth(0.3);
        $pdf->Line(11,272,60,272);
        $pdf->Line(199,272,150,272);
        $pdf->Ln(6);
        $pdf->Cell(9, 4,'NIP', 0, 0, 'R');
        $pdf->Cell(20, 4,':19690225', 0, 0, 'R');
        $pdf->Cell(118, 4, 'NIP', 0, 0, 'R');
        $pdf->Cell(50, 4,': '.$NIP, 0, 0, 'L');
        
        $pdf->Image(base_url(). "assets/img/par.png",14,250,'L');

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 3', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' UPAH (GAJI)', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35, 4,'a. Pihak Kedua mendapat gaji sebesar Rp 74.000/ hari dan uang makan 10.000/ hari.', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'b. Pembayaran upah(gaji) dilakukan oleh Pihak Pertama kepada Pihak Kedua setiap bulan dari absensi kehadiran.', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 4', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' PERATURAN TATA TERTIB KERJA', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35, 4,'a. Pihak Kedua wajib mematuhi tata tertib yang berlaku pada Pihak Pertama.', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'b. Pelanggaran terhadap ketentuan tata tertib oleh Pihak Kedua dapat mengakibatkan diakhirinya ', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    perjanjian kerja oleh Pihak Pertama secara sepihak. ', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 5', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' PENYELESAIAN PERSELISIHAN', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35, 4,'a. Apabila dalam pelaksanaan perjanjian kerja ini terdapat perselisihan, maka Pihak Pertama dan ', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'    pihak Kedua sepakat untuk menyelesaikannya secara musyawarah. ', 0, 0, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(5);
        $pdf->Cell(0, 0,'PASAL 6', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 0,' LAIN - LAIN', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(35, 4,'Perjanjian kerja ini dibuat rangkap 2 (dua), masing-masing bermatrai cukup dan mempunyai', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'kekuaan hukum yang sama.', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->Cell(35, 4,'Demikian Perjanjian Kerja ini dibuat oleh Pihak Pertama dan Pihak Kedua dalam keadaan sehat dan sadar,', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4,'tanpa pengaruh paksaan dari pihak manapun.', 0, 0, 'L');
        $pdf->Ln(65);

        $pdf->Cell(190, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(5);
        $pdf->Cell(37, 4, 'Pihak Pertama,', 0, 0, 'C');
        $pdf->Cell(132, 4, 'Pihak Kedua,', 0, 0, 'R');
        $pdf->Ln(20);
        $pdf->Cell(47, 4,'JOKO PRIYANTO, SH, MS.i', 0, 0, 'L');
        $pdf->Cell(125, 4,''.$nama_karyawan, 0, 0, 'R');
        $pdf->setlinewidth(0.3);
        $pdf->Line(11,270,60,270);
        $pdf->Line(199,270,150,270);
        $pdf->Ln(5);
        $pdf->Cell(9, 4,'NIP', 0, 0, 'R');
        $pdf->Cell(20, 4,':19690225', 0, 0, 'R');
        $pdf->Cell(118, 4, 'NIP', 0, 0, 'R');
        $pdf->Cell(50, 4,': '.$NIP, 0, 0, 'L');
        
        $pdf->Image(base_url(). "assets/img/par.png",14,248,'L');

        $pdf->Output();
        
        }
    }

    // Laporan HRD
    function laporanHR()
        {
        if ($this->session->userdata('Auth') == false){
            
            $this->load->library('pdf');
            $pdf = new FPDF('L','mm','legal');
            $pdf->AddPage();

            // konten lampiran
            $pdf->SetFont('Arial','B',13);
            $pdf->Ln();
            $pdf->Ln(5);
            $pdf->Cell(0, 0, 'Laporan Data HRD Karyawan Di Kontrak ', 0, 0, 'C'); 
            $pdf->Cell(85, 4,'', 0, 0, 'C');
            $pdf->Ln(4);
            // Tabel Konten
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->SetFillColor(38,42,114);
            $pdf->Image(base_url(). "assets/img/logolog.png",85,50,'L');
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(8,8,8);
            $header = array('NIP','Nama Karyawan','Penampilan','Kelengkapan','Kehadiran','Accident','Knowlage','Tanggung Jawab','Teamwork','Best employee','Penilaian','Hasil','Tanggal Kontrak');
            // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(22,40,27,27,27,22,22,34,22,27,22,22,27);
            for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $pdf->Ln();
            // Data
            $fill = true;
            $pdf->SetFont('Arial','',8);
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->SetFont('');
            foreach ($this->M_HR->cetakHR() as $row):
               
                $pdf->Cell($w[6],6,$row->NIP,'LR',0,'L',$fill);
                $pdf->Cell($w[1],6,$row->nama_karyawan,'LR',0,'L',$fill);
                $pdf->Cell($w[3],6,$row->penampilan,'LR',0,'L',$fill);
                $pdf->Cell($w[3],6,$row->kelengkapan,'LR',0,'C',$fill); 
                $pdf->Cell($w[3],6,$row->kehadiran,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->accident,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->knowlage,'LR',0,'C',$fill);
                $pdf->Cell($w[7],6,$row->tanggung_jawab,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->teamwork,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->best_employee,'LR',0,'C',$fill);
                $pdf->Cell($w[10],6,$row->nilai_perpanjang,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->hasil,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->tgl_kontrak,'LR',0,'C',$fill);
            

                $pdf->Ln();
                $fill = !$fill;
                endforeach;
                $pdf->Cell(array_sum($w),0,'','T');

                $pdf->Output();
            
            
            }
        }



}


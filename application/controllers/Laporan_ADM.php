<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_ADM extends CI_Controller {
		function __construct() {
		parent::__construct();
		}
		function index()
	{
    
	}		
    // Laporan All
    function laporanall()
        {
        if ($this->session->userdata('Auth') == false){
            
            $this->load->library('pdf');
            $pdf = new FPDF('L','mm','legal');
            $pdf->AddPage();

            // konten lampiran
            $pdf->SetFont('Arial','B',13);
            $pdf->Ln();
            $pdf->Ln(5);
            $pdf->Cell(0, 0, 'Laporan Data Laporan Hasil Seleksi Karyawan ', 0, 0, 'C'); 
            $pdf->Cell(85, 4,'', 0, 0, 'C');
            $pdf->Ln(4);
            // Tabel Konten
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->SetFillColor(159,83,224);
            $pdf->Image(base_url(). "assets/img/logolog.png",85,50,'L');
            $pdf->SetTextColor(255);
            $pdf->SetDrawColor(8,8,8);
            $header = array('NIP','Nama Karyawan','Penampilan','Kelengkapan','Kehadiran','Accident','Knowlage','Tanggung Jawab','Teamwork','Best employee','Penilaian','Hasil','Tanggal Kontrak');
            // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(22,40,22,27,27,22,22,29,22,27,22,27,27);
            for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $pdf->Ln();
            // Data
            $fill = true;
            $pdf->SetFont('Arial','',8);
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->SetFont('');
            foreach ($this->M_HAdmin->hasil_pred() as $row):
               
                $pdf->Cell($w[6],6,$row->NIP,'LR',0,'L',$fill);
                $pdf->Cell($w[1],6,$row->nama_karyawan,'LR',0,'L',$fill);
                $pdf->Cell($w[6],6,$row->penampilan,'LR',0,'L',$fill);
                $pdf->Cell($w[3],6,$row->kelengkapan,'LR',0,'C',$fill); 
                $pdf->Cell($w[3],6,$row->kehadiran,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->accident,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->knowlage,'LR',0,'C',$fill);
                $pdf->Cell($w[7],6,$row->tanggung_jawab,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->teamwork,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->best_employee,'LR',0,'C',$fill);
                $pdf->Cell($w[10],6,$row->nilai_perpanjang,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->hasil,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->tgl_kontrak,'LR',0,'C',$fill);
            

                $pdf->Ln();
                $fill = !$fill;
                endforeach;
                $pdf->Cell(array_sum($w),0,'','T');

                $pdf->Output();
            
            
            }
        }
        // Laporan Perpanjang
        function laporanper()
        {
        if ($this->session->userdata('Auth') == false){
            
            $this->load->library('pdf');
            $pdf = new FPDF('L','mm','legal');
            $pdf->AddPage();

            // konten lampiran
            $pdf->SetFont('Arial','B',13);
            $pdf->Ln();
            $pdf->Ln(5);
            $pdf->Cell(0, 0, 'Laporan Hasil Seleksi Karyawan  ', 0, 0, 'C'); 
            $pdf->Cell(85, 4,'', 0, 0, 'C');
            $pdf->Ln(4);
            // Tabel Konten
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->SetFillColor(12,130,20);
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
            foreach ($this->M_HAdmin->Listperpanjang() as $row):
               
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

        // Laporan didak Perpanjang
        function laporantdk()
        {
        if ($this->session->userdata('Auth') == false){
            
            $this->load->library('pdf');
            $pdf = new FPDF('L','mm','legal');
            $pdf->AddPage();

            // konten lampiran
            $pdf->SetFont('Arial','B',13);
            $pdf->Ln();
            $pdf->Ln(5);
            $pdf->Cell(0, 0, 'Laporan Laporan Hasil Seleksi Karyawan ', 0, 0, 'C'); 
            $pdf->Cell(85, 4,'', 0, 0, 'C');
            $pdf->Ln(4);
            // Tabel Konten
            $pdf->Ln(6);
            $pdf->SetFont('Arial','',9);
            $pdf->SetFillColor(207,228,29);
            $pdf->Image(base_url(). "assets/img/logolog.png",85,50,'L');
            $pdf->SetTextColor(0);
            $pdf->SetDrawColor(8,8,8);
            $header = array('NIP','Nama Karyawan','Penampilan','Kelengkapan','Kehadiran','Accident','Knowlage','Tanggung Jawab','Teamwork','Best employee','Penilaian','Hasil','Tanggal Kontrak');
            // Lebar Header Sesuaikan Jumlahnya dengan Jumlah Field Tabel Database
        $w = array(22,40,22,27,27,22,22,29,22,27,22,27,27);
            for($i=0;$i<count($header);$i++)
            $pdf->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $pdf->Ln();
            // Data
            $fill = true;
            $pdf->SetFont('Arial','',8);
            $pdf->SetFillColor(224,235,255);
            $pdf->SetTextColor(0);
            $pdf->SetFont('');
            foreach ($this->M_HAdmin->Tperpanjang() as $row):
               
                $pdf->Cell($w[6],6,$row->NIP,'LR',0,'L',$fill);
                $pdf->Cell($w[1],6,$row->nama_karyawan,'LR',0,'L',$fill);
                $pdf->Cell($w[6],6,$row->penampilan,'LR',0,'L',$fill);
                $pdf->Cell($w[3],6,$row->kelengkapan,'LR',0,'C',$fill); 
                $pdf->Cell($w[3],6,$row->kehadiran,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->accident,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->knowlage,'LR',0,'C',$fill);
                $pdf->Cell($w[7],6,$row->tanggung_jawab,'LR',0,'C',$fill);
                $pdf->Cell($w[6],6,$row->teamwork,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->best_employee,'LR',0,'C',$fill);
                $pdf->Cell($w[10],6,$row->nilai_perpanjang,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->hasil,'LR',0,'C',$fill);
                $pdf->Cell($w[3],6,$row->tgl_kontrak,'LR',0,'C',$fill);
            

                $pdf->Ln();
                $fill = !$fill;
                endforeach;
                $pdf->Cell(array_sum($w),0,'','T');

                $pdf->Output();
            
            
            }
        }



}


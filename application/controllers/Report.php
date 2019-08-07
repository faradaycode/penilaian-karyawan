<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('LibReport');
        $this->load->model('ModKaryawan');
    }

    function CetakSemua()
    {
        // Setting halaman PDF
        $pdf = new FPDF('L', 'mm', array(225, 210)); //L For Landscape / P For Portrait
        // Menambah halaman baru
        $pdf->AddPage();
        // Setting jenis font
        $pdf->SetFont('Arial', 'B', 16);

        // Membuat Header
        // $pdf->Image(base_url("assets/imgs/logo.png"), 10, 10, -300);
        $pdf->Cell(210, 7, 'Laporan Penilaian Karyawan ' . (date("Y") - 1) . '-' . date("Y"), 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(210, 7, 'Universitas Bhayangkara Jakarta Raya', 0, 1, 'C');
        // Setting spasi kebawah supaya tidak rapat
        $pdf->Cell(10, 7, '', 0, 1);

        //Fields Name position
        $Y_Fields_Name_position = 30;

        //First create each Field Name
        //Gray color filling each Field Name box
        $pdf->SetFillColor(255, 201, 102);
        //Bold Font for Field Name
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetY($Y_Fields_Name_position);

        $pdf->SetX(5);
        $pdf->Cell(10, 15, 'No', 1, 0, 'C', 1);

        $pdf->SetX(15);
        $pdf->Cell(20, 15, 'NIP', 1, 0, 'C', 1);

        $pdf->SetX(35);
        $pdf->Cell(50, 15, 'Nama', 1, 0, 'C', 1);

        $pdf->SetX(85);
        $pdf->Cell(25, 15, 'Jabatan', 1, 0, 'C', 1);

        $pdf->SetX(110);
        $pdf->MultiCell(25, 7.5, "Aspek\nTeknis", 1, 'C', TRUE);

        $pdf->SetXY(135, $Y_Fields_Name_position);
        $pdf->MultiCell(25, 7.5, "Aspek\nNonteknis", 1, 'C', TRUE);

        $pdf->SetXY(160, $Y_Fields_Name_position);
        $pdf->MultiCell(25, 7.5, "Aspek\nKepribadian", 1, 'C', TRUE);

        $pdf->SetXY(185, $Y_Fields_Name_position);
        $pdf->Cell(35, 15, 'Keterangan', 1, 0, 'C', 1);

        $pdf->Ln();

        //Table position, under Fields Name
        $Y_Table_Position = 45;
        $Y_after = 0;

        //Now show the columns
        $pdf->SetFont('Arial', '', 10);

        $i = 1;
        $nilais = $this->ModKaryawan->getAllNilai();
        $ket = "";

        foreach ($nilais as $rows) {
            $totals = ($rows->n_teknis + $rows->n_nonteknis + $rows->n_pribadi) / 3;

            if ($totals >= 76) {
                $ket = "Sangat Baik";
            }

            if ($totals >= 51 && $totals < 76) {
                $ket = "Baik";
            }

            if ($totals >= 26 && $totals < 51) {
                $ket = "Cukup";
            }

            if ($totals >= 0 && $totals < 26) {
                $ket = "SANGAT BAIK";
            }

            $border = "LRB";

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(5);
            $pdf->MultiCell(10, 6, $i, $border, 'C');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(15);
            $pdf->MultiCell(20, 6, $rows->nip_k, $border, 'L');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(35);
            $pdf->MultiCell(50, 6, $rows->nama_k, $border, 'L');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(85);
            $pdf->MultiCell(25, 6, $rows->nama_j, $border, 'L');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(110);
            $pdf->MultiCell(25, 6, $rows->n_teknis, $border, 'C');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(135);
            $pdf->MultiCell(25, 6, $this->formatter($rows->n_nonteknis), $border, 'C');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(160);
            $pdf->MultiCell(25, 6, $this->formatter($rows->n_pribadi), $border, 'C');

            $pdf->SetY($Y_Table_Position + $Y_after);
            $pdf->SetX(185);
            $pdf->MultiCell(35, 6, $ket, $border, 'C');

            $i++;
            $Y_after += 6;
        }

        $pdf->Output();
    }

    private function formatter($number)
    {
        return rtrim(rtrim(number_format($number, 1, ".", ""), '0'), '.');
    }
}

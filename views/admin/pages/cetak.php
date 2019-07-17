<?php
// Koneksi library FPDF
require('../../../utilities/fpdf/fpdf.php');
require('../../../utilities/config.php');

// Setting halaman PDF
$pdf = new FPDF('L', 'mm', array(445, 210)); //L For Landscape / P For Portrait
// Menambah halaman baru
$pdf->AddPage();
// Setting jenis font
$pdf->SetFont('Arial', 'B', 16);
// Membuat string
$pdf->Cell(410, 7, 'Laporan Penilaian Karyawan '. date("Y"), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(410, 7, 'Universitas Bhayangkara Jakarta Raya', 0, 1, 'C');
// Setting spasi kebawah supaya tidak rapat
$pdf->Cell(10, 7, '', 0, 1);

//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110, 180, 230);
//Bold Font for Field Name
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(12, 8, 'No', 1, 0, 'C', 1);
$pdf->SetX(17);
$pdf->Cell(20, 8, 'NIP', 1, 0, 'C', 1);
$pdf->SetX(37);
$pdf->Cell(25, 8, 'Nama', 1, 0, 'C', 1);
$pdf->SetX(62);
$pdf->Cell(25, 8, 'Jabatan', 1, 0, 'C', 1);
$pdf->SetX(87);
$pdf->Cell(25, 8, 'Kualitas', 1, 0, 'C', 1);
$pdf->SetX(112);
$pdf->Cell(25, 8, 'Kuantitas', 1, 0, 'C', 1);
$pdf->SetX(137);
$pdf->Cell(25, 8, 'Penguasaan', 1, 0, 'C', 1);
$pdf->SetX(162);
$pdf->Cell(28, 8, 'Kepemimpinan', 1, 0, 'C', 1);
$pdf->SetX(190);
$pdf->Cell(25, 8, 'Kerja sama', 1, 0, 'C', 1);
$pdf->SetX(215);
$pdf->Cell(30, 8, 'Tanggung jawab', 1, 0, 'C', 1);
$pdf->SetX(245);
$pdf->Cell(25, 8, 'Integritas', 1, 0, 'C', 1);
$pdf->SetX(270);
$pdf->Cell(25, 8, 'Semangat', 1, 0, 'C', 1);
$pdf->SetX(295);
$pdf->Cell(25, 8, 'Disiplin', 1, 0, 'C', 1);
$pdf->SetX(320);
$pdf->Cell(30, 8, 'Gain Teknis', 1, 0, 'C', 1);
$pdf->SetX(350);
$pdf->Cell(30, 8, 'Gain Nonteknis', 1, 0, 'C', 1);
$pdf->SetX(380);
$pdf->Cell(35, 8, 'Gain Kepribadian', 1, 0, 'C', 1);
$pdf->SetX(415);
$pdf->Cell(25, 8, 'Keterangan', 1, 0, 'C', 1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial', '', 10);

$koneksi = openConnection();
$sql = "SELECT a.id_k, a.nip_k, a.nama_k, a.id_j, 
(SELECT b.nama_j FROM jabatans b WHERE b.id_j=a.id_j) AS nama_jabatan,
(SELECT c.n_kualitas FROM nilais c WHERE c.id_k=a.id_k) AS kualitas,
(SELECT c.n_kuantitas FROM nilais c WHERE c.id_k=a.id_k) AS kuantitas,
(SELECT c.n_penguasaan FROM nilais c WHERE c.id_k=a.id_k) AS kuasa,
(SELECT c.n_kepemimpinan FROM nilais c WHERE c.id_k=a.id_k) AS pimpin,
(SELECT c.n_kerjasama FROM nilais c WHERE c.id_k=a.id_k) AS kjsama,
(SELECT c.n_tgjawab FROM nilais c WHERE c.id_k=a.id_k) AS tgjwb,
(SELECT c.n_integritas FROM nilais c WHERE c.id_k=a.id_k) AS integritas,
(SELECT c.n_semangat FROM nilais c WHERE c.id_k=a.id_k) AS semangat,
(SELECT c.n_disiplin FROM nilais c WHERE c.id_k=a.id_k) AS disiplin,
(SELECT c.gain_teknis FROM nilais c WHERE c.id_k=a.id_k) AS gain_tkn,
(SELECT c.gain_nonteknis FROM nilais c WHERE c.id_k=a.id_k) AS gain_ntkn,
(SELECT c.gain_pribadi FROM nilais c WHERE c.id_k=a.id_k) AS gain_prb
FROM karyawans a";

$exec = $koneksi->query($sql);

$i = 0;
while ($rows = $exec->fetch_assoc()) {

    $i++;
    $totals = $rows['kualitas'] + $rows['disiplin'] + $rows['kuantitas'] + $rows['kuasa']
    + $rows['pimpin'] + $rows['kjsama'] + $rows['tgjwb'] + $rows['integritas'] + $rows['semangat'];

    if ($totals >= 0 && $totals < 225) {
        $ket = "KURANG";
    }

    if ($totals >= 234 && $totals < 459) {
        $ket = "CUKUP";
    }

    if ($totals >= 459 && $totals < 684) {
        $ket = "BAIK";
    }

    if ($totals >= 684) {
        $ket = "SANGAT BAIK";
    }

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(5);
    $pdf->MultiCell(12, 6, $i, 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(17);
    $pdf->MultiCell(20, 6, $rows['nip_k'], 1, 'L');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(37);
    $pdf->MultiCell(25, 6, $rows['nama_k'], 1, 'L');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(62);
    $pdf->MultiCell(25, 6, $rows['nama_jabatan'], 1, 'L');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(87);
    $pdf->MultiCell(25, 6, $rows['kualitas'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(112);
    $pdf->MultiCell(25, 6, $rows['kuantitas'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(137);
    $pdf->MultiCell(25, 6, $rows['kuasa'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(162);
    $pdf->MultiCell(28, 6, $rows['pimpin'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(190);
    $pdf->MultiCell(25, 6, $rows['kjsama'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(215);
    $pdf->MultiCell(30, 6, $rows['tgjwb'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(245);
    $pdf->MultiCell(25, 6, $rows['integritas'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(270);
    $pdf->MultiCell(25, 6, $rows['semangat'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(295);
    $pdf->MultiCell(25, 6, $rows['disiplin'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(320);
    $pdf->MultiCell(30, 6, $rows['gain_tkn'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(350);
    $pdf->MultiCell(30, 6, $rows['gain_ntkn'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(380);
    $pdf->MultiCell(35, 6, $rows['gain_tkn'], 1, 'C');

    $pdf->SetY($Y_Table_Position);
    $pdf->SetX(415);
    $pdf->MultiCell(25, 6, $ket, 1, 'L');
}

$pdf->Output();
?>
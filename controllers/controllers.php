<?php

if (isset($_FILES['filekaryawan'])) { 
    doUploadExcel();
}

function doNilai()
{
    // untuk penilaian, disini
    $n_kualitas = $_POST['kualitas'];
    $n_kuantitas = $_POST['kuantitas'];
    $n_penguasaan = $_POST['penguasaan'];
    $n_kepemimpinan = $_POST['kepemimpinan'];
    $n_kerjasama = $_POST['kerjasama'];
    $n_tanggungjwb = $_POST['tanggungjawab'];
    $n_disiplin = $_POST['disiplin'];
    $n_integritas = $_POST['integritas'];
    $n_semangat = $_POST['semangat'];

    $arr_formu = array();
    array_push(
        $arr_formu,
        $n_disiplin,
        $n_integritas,
        $n_kepemimpinan,
        $n_kerjasama,
        $n_kualitas,
        $n_kuantitas,
        $n_penguasaan,
        $n_semangat,
        $n_tanggungjwb
    );

    echo json_encode($arr_formu);
}

function doUploadExcel()
{
    include_once "excel_reader2.php";

    $file_target = basename($_FILES['filekaryawan']['name']);
    move_uploaded_file($_FILES['filekaryawan']['tmp_name'], $file_target);

    chmod($_FILES['filekaryawan']['name'], 0777);

    $datas = new Spreadsheet_Excel_Reader($_FILES['filekaryawan']['name'], false);
    $rows = $datas->rowcount($sheet_index = 0);

    $succed = 0;
    for ($i = 2; $i <= $rows; $i++) {
        $nip = $rows->val($i, 1);
        $nama = $rows->val($i, 2);
        $jabatan = $rows->val($i, 3);

        if ($nama != "" && $nip != "" && $jabatan != "") {
            echo "sukses";
            echo $nama . " " . $nip . " " . $jabatan;
        }
    }

    unlink($_FILES['filekaryawan']['name']);

    echo $file_target;
}

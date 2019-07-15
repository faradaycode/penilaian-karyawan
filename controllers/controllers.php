<?php

include "../utilities/excel_reader2.php";
include "../utilities/global_string.php";
include "../models/sipeka_model.php";

// identifikasi perintah
if (isset($_POST['prefix'])) {
    switch ($_POST['prefix']) {
        case "login":
            doLogin();
            break;
        case "nilai":
            doNilai();
            break;
        case "uploadkyw":
            doUploadExcel();
            break;
    }
}

function doLogin()
{
    $usrid = $_POST['userid'];
    $pwd = md5($_POST['password']);

    $login = login($usrid, $pwd);

    // echo $login;

    if ($login->num_rows > 0) {
        session_start();
       
        while ($row = $login->fetch_assoc()) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['logedin'] = 1;
        }
       
        echo 1;
    } else {
        echo 0;
    }
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

    $file_target = basename($_FILES['filekaryawan']['name']);
    move_uploaded_file($_FILES['filekaryawan']['tmp_name'], $file_target);

    chmod($_FILES['filekaryawan']['name'], 0755);

    $datas = new Spreadsheet_Excel_Reader($_FILES['filekaryawan']['name'], false);
    $rows = $datas->rowcount($sheet_index = 0);

    $succed = 0;
    for ($i = 2; $i <= $rows; $i++) {
        $nip = $datas->val($i, 1);
        $nama = $datas->val($i, 2);
        $jabatan = $datas->val($i, 3);

        if ($nama != "" && $nip != "" && $jabatan != "") {
            echo $nama . "\n" . $nip . "\n" . $jabatan;
        }
    }

    unlink($_FILES['filekaryawan']['name']);

    // header("location:index.php?page=dashboard");

}

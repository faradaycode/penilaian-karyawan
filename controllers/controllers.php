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
    
    if ($n_kualitas >= 78) {
        $log_kua = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_kua = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_kuantitas >= 85) {
        $log_kuw = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_kuw = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_penguasaan >= 86) {
        $log_pgs = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_pgs = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_kepemimpinan >= 80) {
        $log_kpp = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_kpp = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_kerjasama >= 75) {
        $log_kjs = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_kjs = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_tanggungjwb >= 80) {
        $log_tgj = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_tgj = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_integritas >= 85) {
        $log_itg = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_itg = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_semangat >= 80) {
        $log_smg = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_smg = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    if ($n_disiplin >= 75) {
        $log_dsp = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
    } else {
        $log_dsp = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
    }
    
    $arr_formu = array(
        "en_kualitas" => $log_kua,
        "en_kuantitas" => $log_kuw,
        "en_penguasaan" => $log_pgs,
        "en_kepemimpinan" => $log_kpp,
        "en_kerjasama" => $log_kjs,
        "en_tgjwb" => $log_tgj,
        "en_integritas" => $log_itg,
        "en_semangat" => $log_smg,
        "en_disiplin" => $log_dsp
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

    for ($i = 2; $i <= $rows; $i++) {
        $nip = $datas->val($i, 1);
        $nama = $datas->val($i, 2);
        $jabatan = $datas->val($i, 3);
        $mulaikj = $datas->val($i, 4);

        if ($nama != "" && $nip != "" && $jabatan != "" && $mulaikj != null) {
            $arraydata = array(
                "nip" => $nip,
                "nama" => $nama,
                "jbt" => getJabatan($jabatan),
                "hari" => $mulaikj
            );
            
            if (importxls($arraydata)) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    unlink($_FILES['filekaryawan']['name']);

    // header("location:index.php?page=dashboard");

}

function log2($value) {
    return 0.3 * $value;
}
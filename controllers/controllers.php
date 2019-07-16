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
        case "import":
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

    $ya = 0;
    $tidak = 0;
    
    if ($n_kualitas >= 26) {
        $log_kua = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_kua = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_kuantitas >= 26) {
        $log_kuw = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_kuw = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_penguasaan >= 26) {
        $log_pgs = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_pgs = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_kepemimpinan >= 26) {
        $log_kpp = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_kpp = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_kerjasama >= 26) {
        $log_kjs = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_kjs = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_tanggungjwb >= 26) {
        $log_tgj = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_tgj = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_integritas >= 26) {
        $log_itg = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_itg = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_semangat >= 26) {
        $log_smg = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_smg = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }
    
    if ($n_disiplin >= 26) {
        $log_dsp = abs(0/1*log2(0/1)) + abs(-1/1*log2(1/1));
        $ya += 1;
    } else {
        $log_dsp = abs(-1/1*log2(1/1)) + abs(0/1*log2(0/1));
        $tidak += 1;
    }

    $total = $ya + $tidak;
    $en_total =  (-$tidak/$total*log2($tidak/$total)) + (-$ya/$total*log2($ya/$total));

    $gain_teknis = $en_total - ((1/$total * $log_kua) + (1/$total * $log_kuw) + (1/$total * $log_pgs));
    $gain_nonteknis = $en_total - ((1/$total * $log_kpp) + (1/$total * $log_kjs) + (1/$total * $log_tgj));
    $gain_pribadi = $en_total - ((1/$total * $log_itg) + (1/$total * $log_smg) + (1/$total * $log_dsp));

    $arr_formu = array(
        "en_kualitas" => $log_kua,
        "en_kuantitas" => $log_kuw,
        "en_penguasaan" => $log_pgs,
        "en_kepemimpinan" => $log_kpp,
        "en_kerjasama" => $log_kjs,
        "en_tgjwb" => $log_tgj,
        "en_integritas" => $log_itg,
        "en_semangat" => $log_smg,
        "en_disiplin" => $log_dsp,
        "gain_teknis" => $gain_teknis,
        "gain_nonteknis" => $gain_nonteknis,
        "gain_pribadi" => $gain_pribadi,
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

            // echo json_encode($arraydata);
            
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
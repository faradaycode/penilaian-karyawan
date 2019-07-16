<?php

// login
function login($userid, $password) {

    include_once "../utilities/config.php"; 

    $result = array();
    
    $sql = "select * from tb_user where userid = '$userid' and password = '$password'";
    
    $status = $koneksi->query($sql);
    $koneksi->close();
    
    return $status;
}

//nilai
function nilai($array) {
    
}

function importxls($arraydata)
{
    include_once "../utilities/config.php"; 
    $sql = "INSERT INTO karyawans (id_k, nip_k, nama_k, id_j) VALUES (null, ".$arraydata['nip'].", ".$arraydata['nama'].", ".$arraydata['jbt'].", ".$arraydata['hari'].")";
    
    $status = $koneksi->query($sql);
    $koneksi->close();
    
    return $status;
}

function getJabatan($value)
{
    include_once "../utilities/config.php";
    $sql = "SELECT id_j FROM jabatans WHERE nama_j = '$value'";
    $ID = "";
    $slc = $koneksi->query($sql);
    
    if ($slc->num_rows > 0) {
        while ($ids = $slc->fetch_assoc()) {
            $ID = $ids['id_j'];
        }
    }
    
    return $ID;
}
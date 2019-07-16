<?php

include "../utilities/config.php";

// login
function login($userid, $password) 
{
    $koneksi = openConnection();
    $sql = "select * from tb_user where userid = '$userid' and password = '$password'";
    
    $status = $koneksi->query($sql);
    closeConnection($koneksi);
    
    return $status;
}

//nilai
function nilai($array) {
    
}

function importxls($arraydata)
{
    $koneksi = openConnection();
    $sql = "INSERT INTO karyawans (id_k, nip_k, nama_k, id_j) VALUES (null, ".$arraydata['nip'].", ".$arraydata['nama'].", ".$arraydata['jbt'].", ".$arraydata['hari'].")";
    
    $status = $koneksi->query($sql);
    closeConnection($koneksi);
    
    return $status;
}

function getJabatan($value)
{
    $koneksi = openConnection();
    $sql = "SELECT id_j FROM jabatans WHERE nama_j='$value'";
    $slc = $koneksi->query($sql) or die ($koneksi->error);
    $ids = $slc->fetch_assoc();

    closeConnection($koneksi);

    return $ids;
}
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

function importxls($arraydata)
{
    $koneksi = openConnection();
    $sql = "INSERT INTO karyawans (id_k, nip_k, nama_k, id_j) VALUES (null, ".$arraydata['nip'].", ".$arraydata['nama'].", ".$arraydata['jbt'].", ".$arraydata['hari'].")";
    
    $status = $koneksi->query($sql);
    closeConnection($koneksi);
    
    return $status;
}

function getKaryawan() {
    $koneksi = openConnection();
    $sql = "SELECT * FROM karyawans";

    $exec = $koneksi->query($sql);
    closeConnection($koneksi);

    return $exec;
}

function postNilai($array)
{
    $sql = "INSERT INTO nilais (id_n, id_k, n_kualitas, n_kuantitas, n_penguasaan, n_kepemimpinan, 
    n_kerjasama, n_tgjawab, n_integritas, n_semangat, n_disiplin, en_total, gain_teknis, gain_nonteknis, gain_pribadi) 
    VALUES (null, ".$array['id_karyawan'].", ".$array['en_kualitas'].", ".$array['en_kuantitas'].
    ", ".$array['en_penguasaan'].", ".$array['en_kepemimpinan'].", ".$array['en_kerjasama'].
    ", ".$array['en_tgjwb'].", ".$array['en_integritas'].", ".$array['en_semangat'].", ".$array['en_disiplin'].
    ", ".$array['en_total'].", ".$array['gain_teknis'].", ".$array['gain_nonteknis'].", ".$array['gain_pribadi'].")";

    $koneksi = openConnection();
    $exec = $koneksi->query($sql) or die ($koneksi->error);

    closeConnection($koneksi);

    return $exec;
}

function getJabatan($value)
{
    $koneksi = openConnection();
    $sql = "SELECT id_j FROM jabatans WHERE nama_j='$value'";
    $slc = $koneksi->query($sql) or die ($koneksi->error);
    $id = "";
    while ($ids = $slc->fetch_assoc())
    {
        $id = $ids['id_j'];
    }

    closeConnection($koneksi);

    return $id;
}
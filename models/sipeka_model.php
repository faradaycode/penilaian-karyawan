<?php

// login
function login($userid, $password) {

    include_once "../utilities/config.php"; 

    $result = array();
    
    $sql = "select * from tb_user where userid = '$userid' and password = '$password'";
    
    return $koneksi->query($sql);
}
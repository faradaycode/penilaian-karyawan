<?php

$koneksi = new mysqli("localhost","root","","sipekadb");
 
// Check connection
if ($koneksi->connect_error){
	die ("Koneksi database gagal : " . mysqli_connect_error());
}

$koneksi->set_charset('UTF-8');

?>
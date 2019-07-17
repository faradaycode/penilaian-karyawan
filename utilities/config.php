<?php

function openConnection()
{
	$koneksi = new mysqli("127.0.0.1:3307","root","","sipekadb") or die ("Koneksi database gagal : " . mysqli_connect_error());;
	$koneksi->set_charset('UTF-8');

	return $koneksi;
}

function closeConnection($koneksi)
{
	$koneksi->close();
}

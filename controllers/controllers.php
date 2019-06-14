<?php

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
array_push($arr_formu, $n_disiplin, $n_integritas, 
$n_kepemimpinan, $n_kerjasama, $n_kualitas, $n_kuantitas,
$n_penguasaan, $n_semangat, $n_tanggungjwb);

echo json_encode($arr_formu);

?>

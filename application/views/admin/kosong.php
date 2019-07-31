<?php
// echo $dtpty;

foreach (json_decode($dtpty) as $keys) {
    foreach($keys->isi as $values) {
        echo $values->pertanyaan;
    }
}
?>
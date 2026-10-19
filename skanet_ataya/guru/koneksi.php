<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "skanet_Ataya"
);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
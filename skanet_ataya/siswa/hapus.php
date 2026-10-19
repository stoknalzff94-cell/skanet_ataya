<?php
include "koneksi.php";

$nis = mysqli_real_escape_string($koneksi, $_GET['nis']);

$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nis='$nis'");

header("Location: index.php");
exit;
?>
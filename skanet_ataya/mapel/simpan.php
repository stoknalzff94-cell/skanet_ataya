<?php
include "../koneksi.php";

$nama_mapel = $_POST['nama_mapel'];
$guru = $_POST['guru'];

$query = "INSERT INTO mapel (nama_mapel, guru)
          VALUES ('$nama_mapel', '$guru')";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
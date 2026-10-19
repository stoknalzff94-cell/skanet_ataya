<?php
include "koneksi.php";

$id_nilai = $_GET['id_nilai'];

$query = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");

if ($query) {
    header('Location: index.php');
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
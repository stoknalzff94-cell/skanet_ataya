<?php
include "koneksi.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$query = mysqli_query($koneksi,
"INSERT INTO siswa(nis,nama,alamat)
VALUES('$nis','$nama','$alamat')");

if($query){
    echo "Data berhasil disimpan";
}else{
    echo "Error : ".mysqli_error($koneksi);
}
?>
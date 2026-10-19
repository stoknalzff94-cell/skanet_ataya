<?php

include "koneksi.php";

$nip = $_POST['nip'];
$nama = $_POST['nama'];

$query = "INSERT INTO guru (nip, nama)
          VALUES ('$nip', '$nama')";

if (mysqli_query($koneksi, $query)) {

    echo "<script>
        alert('Data guru berhasil disimpan!');
        window.location='index.php';
    </script>";

} else {

    echo "Gagal menyimpan data!<br>";
    echo "Error MySQL: " . mysqli_error($koneksi);

}

?>
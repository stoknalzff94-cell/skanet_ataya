<?php

include "../koneksi.php";

$nis      = $_POST['nis'];
$nip      = $_POST['nip'];
$id_mapel = $_POST['id_mapel'];
$nilai    = $_POST['nilai'];

$query = "INSERT INTO nilai (nis, nip, id_mapel, nilai)
          VALUES ('$nis', '$nip', '$id_mapel', '$nilai')";

if(mysqli_query($koneksi, $query)){

    echo "<script>
        alert('Data nilai berhasil disimpan!');
        window.location='index.php';
    </script>";

}else{

    echo "Gagal menyimpan data!<br>";
    echo "Error MySQL: " . mysqli_error($koneksi);

}

?>
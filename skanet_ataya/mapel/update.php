<?php

include "../koneksi.php";

if (isset($_POST['update'])) {

    $id_mapel_lama = $_POST['id_mapel_lama'];
    $id_mapel       = $_POST['id_mapel'];
    $nama_mapel     = $_POST['nama_mapel'];
    $guru           = $_POST['guru'];

    $query = mysqli_query(
        $koneksi,
        "UPDATE mapel SET
            id_mapel='$id_mapel',
            nama_mapel='$nama_mapel',
            guru='$guru'
         WHERE id_mapel='$id_mapel_lama'"
    );

    if ($query) {

        echo "
        <script>
            alert('Data mapel berhasil diubah!');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Data mapel gagal diubah!');
            window.history.back();
        </script>
        ";

        echo "<br>Error: " . mysqli_error($koneksi);
    }

} else {

    echo "Akses tidak valid.";

}

?>
<?php

include "../koneksi.php";

if (isset($_POST['update'])) {

    $id_nilai = $_POST['id_nilai'];
    $id_mapel = $_POST['id_mapel'];
    $nis      = $_POST['nis'];
    $nip      = $_POST['nip'];
    $nilai    = $_POST['nilai'];

    $query = mysqli_query(
        $koneksi,
        "UPDATE nilai SET
            id_mapel='$id_mapel',
            nis='$nis',
            nip='$nip',
            nilai='$nilai'
         WHERE id_nilai='$id_nilai'"
    );

    if ($query) {

        echo "
        <script>
            alert('Nilai berhasil diubah!');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Nilai gagal diubah!');
            window.history.back();
        </script>
        ";

        echo "<br>Error: " . mysqli_error($koneksi);
    }

} else {

    echo "Akses tidak valid.";

}

?>
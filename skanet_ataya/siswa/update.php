<?php

include "../koneksi.php";

if (isset($_POST['update'])) {

    $nis_lama = $_POST['nis_lama'];
    $nis       = $_POST['nis'];
    $nama      = $_POST['nama'];
    $alamat    = $_POST['alamat'];

    $query = mysqli_query(
        $koneksi,
        "UPDATE siswa SET
            nis='$nis',
            nama='$nama',
            alamat='$alamat'
         WHERE nis='$nis_lama'"
    );

    if ($query) {

        echo "
        <script>
            alert('Data siswa berhasil diubah!');
            window.location='index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Data siswa gagal diubah!');
            window.history.back();
        </script>
        ";

        echo "<br>Error: " . mysqli_error($koneksi);
    }

} else {

    echo "Akses tidak valid.";

}

?>
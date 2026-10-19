<?php

include "../koneksi.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_nilai.xls");
header("Pragma: no-cache");
header("Expires: 0");

$query = mysqli_query($koneksi, "
    SELECT
        nilai.id_nilai,
        siswa.nis,
        siswa.nama AS nama_siswa,
        guru.nip,
        guru.nama AS nama_guru,
        mapel.nama_mapel,
        nilai.nilai
    FROM nilai
    JOIN siswa ON nilai.nis = siswa.nis
    JOIN guru ON nilai.nip = guru.nip
    JOIN mapel ON nilai.id_mapel = mapel.id_mapel
    ORDER BY nilai.id_nilai ASC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Nilai</title>
</head>

<body>

<h2>DATA NILAI SISWA</h2>

<table border="1">

    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>NIP</th>
        <th>Guru</th>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
    </tr>

    <?php

    $no = 1;

    while ($data = mysqli_fetch_assoc($query)) {

    ?>

    <tr>

        <td><?= $no++; ?></td>

        <td><?= $data['nis']; ?></td>

        <td><?= $data['nama_siswa']; ?></td>

        <td><?= $data['nip']; ?></td>

        <td><?= $data['nama_guru']; ?></td>

        <td><?= $data['nama_mapel']; ?></td>

        <td><?= $data['nilai']; ?></td>

    </tr>

    <?php } ?>

</table>

</body>
</html>
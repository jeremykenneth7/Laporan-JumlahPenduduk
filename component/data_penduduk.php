<?php
include 'koneksi/connection.php';

$data_per_halaman = 10;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

if (isset($_POST['search_data'])) {
    $search_query = $_POST['search_query'];
    $sql = "SELECT * FROM penduduk WHERE nama LIKE '%$search_query%' OR nik LIKE '%$search_query%'";
} elseif (isset($_GET['filter_provinsi'])) {
    $provinsi_id = $_GET['provinsi_id'];
    $sql = "SELECT * FROM penduduk WHERE id_provinsi = '$provinsi_id'";
} elseif (isset($_GET['filter_kabupaten'])) {
    $kabupaten_id = $_GET['kabupaten_id'];
    $sql = "SELECT * FROM penduduk WHERE id_kabupaten = '$kabupaten_id'";
} else {
    $sql = "SELECT * FROM penduduk";
}

$total_data = $conn->query($sql)->num_rows;
$total_halaman = ceil($total_data / $data_per_halaman);
$offset = ($halaman - 1) * $data_per_halaman;
$sql .= " LIMIT $offset, $data_per_halaman";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $no = $offset + 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>
                <a href='action/edit.php?id=" . $row['id_penduduk'] . "' class='btn btn-primary btn-sm '>Edit</a> 
                <a href='action/delete.php?id=" . $row['id_penduduk'] . "' class='btn btn-danger btn-sm ' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
            </td>";
        echo "<td>" . $row['nama'] . "</td>";
        echo "<td>" . $row['nik'] . "</td>";
        echo "<td>" . $row['tanggal_lahir'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['jenis_kelamin'] . "</td>";
        echo "<td>" . $row['timestamp'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak ada data penduduk</td></tr>";
}
$conn->close();

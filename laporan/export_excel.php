<?php
include '../koneksi/connection.php';

$sql_kabupaten = "SELECT kabupaten.id_kabupaten, kabupaten.nama_kabupaten, COUNT(penduduk.id_penduduk) AS jumlah_penduduk FROM kabupaten LEFT JOIN penduduk ON kabupaten.id_kabupaten = penduduk.id_kabupaten";
if (isset($_POST['provinsi_id']) && !empty($_POST['provinsi_id'])) {
    $provinsi_id = $_POST['provinsi_id'];
    $sql_kabupaten .= " WHERE kabupaten.id_provinsi = $provinsi_id";
}
$sql_kabupaten .= " GROUP BY kabupaten.id_kabupaten, kabupaten.nama_kabupaten";

$result_kabupaten = $conn->query($sql_kabupaten);

$data = [];
while ($row_kabupaten = $result_kabupaten->fetch_assoc()) {
    $data[] = $row_kabupaten;
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="daftar_penduduk.xls"');
header('Cache-Control: max-age=0');

echo '<table>';
echo '<tr><th>Kabupaten</th><th>Jumlah Penduduk</th></tr>';
foreach ($data as $row) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['nama_kabupaten']) . '</td>';
    echo '<td>' . htmlspecialchars($row['jumlah_penduduk']) . '</td>';
    echo '</tr>';
}
echo '</table>';

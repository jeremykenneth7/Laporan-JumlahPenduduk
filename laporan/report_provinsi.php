<?php
include '../koneksi/connection.php';

$sql = "SELECT provinsi.id_provinsi, provinsi.nama_provinsi, COUNT(penduduk.id_penduduk) AS jumlah_penduduk 
        FROM provinsi 
        LEFT JOIN kabupaten ON provinsi.id_provinsi = kabupaten.id_provinsi 
        LEFT JOIN penduduk ON kabupaten.id_kabupaten = penduduk.id_kabupaten 
        GROUP BY provinsi.id_provinsi, provinsi.nama_provinsi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Jumlah Penduduk per Provinsi</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Provinsi</th><th>Jumlah Penduduk</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['nama_provinsi'] . "</td><td>" . $row['jumlah_penduduk'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data penduduk per provinsi.</p>";
}
$conn->close();

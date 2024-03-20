<?php
include 'koneksi/connection.php';

$sql_total = "SELECT COUNT(*) AS total FROM provinsi";
$result_total = $conn->query($sql_total);
$total_data = $result_total->fetch_assoc()['total'];
$jumlah_data_per_halaman = 10;
$total_halaman = ceil($total_data / $jumlah_data_per_halaman);

$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$mulai = ($halaman - 1) * $jumlah_data_per_halaman;
$sql = "SELECT * FROM provinsi LIMIT $mulai, $jumlah_data_per_halaman";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = $mulai + 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>
        <a href='provinsi/edit.php?id=" . $row['id_provinsi'] . "' class='btn btn-primary btn-sm'>Edit</a> 
        <a href='provinsi/delete.php?id=" . $row['id_provinsi'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
        echo "<td>" . $row['nama_provinsi'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data Provinsi yang tersedia</td></tr>";
}
$conn->close();

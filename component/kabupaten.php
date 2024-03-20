<?php
include 'koneksi/connection.php';

$sql_provinsi = "SELECT * FROM provinsi";
$result_provinsi = $conn->query($sql_provinsi);

$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';
$selected_provinsi = isset($_POST['provinsi_id']) ? $_POST['provinsi_id'] : '';

if (!empty($search_query) && !empty($selected_provinsi)) {
    $sql = "SELECT * FROM kabupaten WHERE nama_kabupaten LIKE '%$search_query%' AND id_provinsi = $selected_provinsi LIMIT $mulai, $jumlah_data_per_halaman";
} elseif (!empty($selected_provinsi)) {
    $sql = "SELECT * FROM kabupaten WHERE id_provinsi = $selected_provinsi LIMIT $mulai, $jumlah_data_per_halaman";
} elseif (!empty($search_query)) {
    $sql = "SELECT * FROM kabupaten WHERE nama_kabupaten LIKE '%$search_query%' LIMIT $mulai, $jumlah_data_per_halaman";
} else {
    $sql = "SELECT * FROM kabupaten LIMIT $mulai, $jumlah_data_per_halaman";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $no = $mulai + 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>
        <a href='kabupaten/edit.php?id=" . $row['id_kabupaten'] . "' class='btn btn-primary btn-sm'>Edit</a> 
        <a href='kabupaten/delete.php?id=" . $row['id_kabupaten'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a></td>";
        echo "<td>" . $row['nama_kabupaten'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data kabupaten yang tersedia</td></tr>";
}
$conn->close();

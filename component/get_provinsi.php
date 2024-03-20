<?php
include '../koneksi/connection.php';

$sql = "SELECT * FROM provinsi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['id_provinsi'] . "'>" . $row['nama_provinsi'] . "</option>";
    }
} else {
    echo "<option value=''>Tidak ada provinsi</option>";
}
$conn->close();

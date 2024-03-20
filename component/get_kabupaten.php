<?php
include '../koneksi/connection.php';

if (isset($_POST['provinsi_id'])) {
    $provinsi_id = $_POST['provinsi_id'];

    $sql = "SELECT * FROM kabupaten WHERE id_provinsi = $provinsi_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_kabupaten'] . "'>" . $row['nama_kabupaten'] . "</option>";
        }
    } else {
        echo "<option value=''>Tidak ada kabupaten</option>";
    }
} 
$conn->close();

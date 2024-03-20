<?php
if (isset($_GET['id'])) {
    include '../koneksi/connection.php';

    $id_provinsi = $_GET['id'];
    $sql = "DELETE FROM kabupaten WHERE id_kabupaten = '$id_kabupaten'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "Data kabupaten tidak ditemukan.";
}

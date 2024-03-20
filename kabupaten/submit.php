<?php
include '../koneksi/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kabupaten = $_POST["nama_kabupaten"];
    $provinsi_id = $_POST["provinsi_id"];

    $sql = "INSERT INTO kabupaten (nama_kabupaten, id_provinsi) VALUES ('$nama_kabupaten', '$provinsi_id')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

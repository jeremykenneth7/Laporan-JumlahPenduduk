<?php
include '../koneksi/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_provinsi = $_POST["nama_provinsi"];

    $sql = "INSERT INTO provinsi (nama_provinsi) VALUES ('$nama_provinsi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../koneksi/connection.php';

    $id_provinsi = $_POST['id'];
    $nama_provinsi = $_POST['nama_provinsi'];

    $sql = "UPDATE provinsi SET nama_provinsi='$nama_provinsi' WHERE id_provinsi='$id_provinsi'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();


} else {
    echo "Metode yang digunakan tidak valid.";
}

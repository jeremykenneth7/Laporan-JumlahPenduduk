<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../koneksi/connection.php';

    $id_kabupaten = $_POST['id'];
    $nama_kabupaten = $_POST['nama_kabupaten'];

    $sql = "UPDATE kabupaten SET nama_kabupaten='$nama_kabupaten' WHERE id_kabupaten='$id_kabupaten'";

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

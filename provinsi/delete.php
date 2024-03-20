<?php
if (isset($_GET['id'])) {
    include '../koneksi/connection.php';

    $id_provinsi = $_GET['id'];
    $sql = "DELETE FROM provinsi WHERE id_provinsi = '$id_provinsi'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "Data provinsi tidak ditemukan.";
}

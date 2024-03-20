<?php
if (isset($_GET['id'])) {
    include '../koneksi/connection.php';

    $id_penduduk = $_GET['id'];
    $sql = "DELETE FROM penduduk WHERE id_penduduk = '$id_penduduk'";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} 
else {
    echo "ID Penduduk tidak ditemukan.";
}

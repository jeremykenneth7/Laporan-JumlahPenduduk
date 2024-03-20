<?php
include '../koneksi/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];

    $sql_provinsi = "SELECT nama_provinsi FROM provinsi WHERE id_provinsi = '$provinsi'";
    $result_provinsi = $conn->query($sql_provinsi);
    $row_provinsi = $result_provinsi->fetch_assoc();
    $nama_provinsi = $row_provinsi['nama_provinsi'];

    $sql_kabupaten = "SELECT nama_kabupaten FROM kabupaten WHERE id_kabupaten = '$kabupaten'";
    $result_kabupaten = $conn->query($sql_kabupaten);
    $row_kabupaten = $result_kabupaten->fetch_assoc();
    $nama_kabupaten = $row_kabupaten['nama_kabupaten'];

    $alamat_lengkap = $_POST['alamat'] . ', ' . $nama_kabupaten . ', ' . $nama_provinsi;

    $sql = "INSERT INTO penduduk (nama, nik, jenis_kelamin, tanggal_lahir, alamat, id_kabupaten, id_provinsi) 
            VALUES ('$nama', '$nik', '$jenis_kelamin', '$tanggal_lahir', '$alamat_lengkap', '$kabupaten', '$provinsi')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

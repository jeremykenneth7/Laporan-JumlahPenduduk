<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../koneksi/connection.php';

    $id_penduduk = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
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

    $sql = "UPDATE penduduk SET nama='$nama', nik='$nik', tanggal_lahir='$tanggal_lahir', alamat='$alamat_lengkap', jenis_kelamin='$jenis_kelamin' WHERE id_penduduk='$id_penduduk'";

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

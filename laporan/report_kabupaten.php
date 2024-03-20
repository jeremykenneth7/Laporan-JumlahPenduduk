<?php
include '../koneksi/connection.php';

$sql_provinsi = "SELECT * FROM provinsi";
$result_provinsi = $conn->query($sql_provinsi);
?>

<h2>Jumlah Penduduk per Kabupaten</h2>

<form action="" method="GET">
    <label for="provinsi_id">Pilih Provinsi:</label>
    <select id="provinsi_id" name="provinsi_id">
        <option value="">Semua Provinsi</option>
        <?php
        if ($result_provinsi->num_rows > 0) {
            while ($row_provinsi = $result_provinsi->fetch_assoc()) {
                echo "<option value='" . $row_provinsi['id_provinsi'] . "'>" . $row_provinsi['nama_provinsi'] . "</option>";
            }
        }
        ?>
    </select>
    <button type="submit">Filter</button>
</form>

<?php
$filter = isset($_GET['provinsi_id']) ? "WHERE provinsi.id_provinsi = " . $_GET['provinsi_id'] : "";

$sql = "SELECT kabupaten.nama_kabupaten, COUNT(penduduk.id_penduduk) AS jumlah_penduduk 
        FROM kabupaten 
        LEFT JOIN penduduk ON kabupaten.id_kabupaten = penduduk.id_kabupaten 
        LEFT JOIN provinsi ON kabupaten.id_provinsi = provinsi.id_provinsi 
        $filter
        GROUP BY kabupaten.id_kabupaten";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Kabupaten</th><th>Jumlah Penduduk</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['nama_kabupaten'] . "</td><td>" . $row['jumlah_penduduk'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Tidak ada data penduduk per kabupaten.</p>";
}
$conn->close();
?>
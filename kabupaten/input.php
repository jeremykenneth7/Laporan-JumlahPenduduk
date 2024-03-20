<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Kabupaten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Input Data Kabupaten</h3>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="nama_kabupaten">Nama Kabupaten:</label>
                <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten">
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <select class="form-control" id="provinsi" name="provinsi_id">
                    <option value="">Pilih Provinsi</option>
                    <?php
                    include '../koneksi/connection.php';
                    $sql_provinsi = "SELECT * FROM provinsi";
                    $result_provinsi = $conn->query($sql_provinsi);
                    if ($result_provinsi->num_rows > 0) {
                        while ($row_provinsi = $result_provinsi->fetch_assoc()) {
                            echo "<option value='" . $row_provinsi['id_provinsi'] . "'>" . $row_provinsi['nama_provinsi'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Provinsi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Data Provinsi</h3>
        <?php
        include '../koneksi/connection.php';

        if (isset($_GET['id'])) {
            $id_provinsi = $_GET['id'];
            $sql = "SELECT * FROM provinsi WHERE id_provinsi='$id_provinsi'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id_provinsi']; ?>">
                    <div class="form-group">
                        <label for="nama_provinsi">Nama Provinsi:</label>
                        <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?php echo $row['nama_provinsi']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
        <?php
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "Parameter ID tidak ditemukan.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
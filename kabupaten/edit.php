<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data kabupaten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Data kabupaten</h3>
        <?php
        include '../koneksi/connection.php';

        if (isset($_GET['id'])) {
            $id_kabupaten = $_GET['id'];
            $sql = "SELECT * FROM kabupaten WHERE id_kabupaten='$id_kabupaten'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id_kabupaten']; ?>">
                    <div class="form-group">
                        <label for="nama_kabupaten">Nama kabupaten:</label>
                        <input type="text" class="form-control" id="nama_kabupaten" name="nama_kabupaten" value="<?php echo $row['nama_kabupaten']; ?>">
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
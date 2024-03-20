<?php

if (isset($_GET['id'])) {
    include '../koneksi/connection.php';

    $id_penduduk = $_GET['id'];
    $sql = "SELECT * FROM penduduk WHERE id_penduduk = '$id_penduduk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nik = $row['nik'];
        $tanggal_lahir = $row['tanggal_lahir'];
        $alamat = $row['alamat'];
        $jenis_kelamin = $row['jenis_kelamin'];
    } else {
        echo "Data tidak ditemukan.";
    }

    $conn->close();
} else {
    echo "ID Penduduk tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penduduk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Edit Data Penduduk</h3>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id_penduduk; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $nik; ?>">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="Laki-laki" <?php if ($jenis_kelamin == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($jenis_kelamin == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi : </label>
                <select class="form-control" id="provinsi" name="provinsi" required>
                    <?php include '../component/get_provinsi.php'; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten : </label>
                <select class="form-control" id="kabupaten" name="kabupaten" required>
                    <?php include '../component/get_kabupaten.php'; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#provinsi').change(function() {
                var provinsi_id = $(this).val();

                $.ajax({
                    url: '../component/get_kabupaten.php',
                    method: 'post',
                    data: {
                        provinsi_id: provinsi_id
                    },
                    success: function(response) {
                        $('#kabupaten').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>
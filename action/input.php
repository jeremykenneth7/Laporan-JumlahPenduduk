<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - Laporan Data Penduduk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Form Tambah Data Penduduk</h2>
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="nama">Nama : </label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK : </label>
                <input type="text" class="form-control" id="nik" name="nik" maxlength="18" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" required>
                    <label class="form-check-label" for="laki-laki">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat : </label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
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
            <button type="submit" class="btn btn-primary">Submit</button>
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
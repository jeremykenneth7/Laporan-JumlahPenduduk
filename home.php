<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Laporan Data Penduduk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h3>Data Nama Provinsi di Indonesia</h3>
        <a href="provinsi/input.php" class="btn btn-info mb-3">Input Data Provinsi</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Provinsi</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'component/provinsi.php'; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination mb-5">
                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?php if ($i == $halaman) echo 'active'; ?>"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

        <h3>Data Kabupaten di Indonesia</h3>
        <div class="row mb-3">
            <div class="col">
                <a href="kabupaten/input.php" class="btn btn-info mb-3">Input Data Kabupaten</a>
            </div>

            <form action="" method="POST">
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" id="provinsi_id" name="provinsi_id">
                            <option value="">Pilih Provinsi</option>
                            <?php
                            include 'koneksi/connection.php';
                            $sql_provinsi = "SELECT * FROM provinsi";
                            $result_provinsi = $conn->query($sql_provinsi);
                            if ($result_provinsi->num_rows > 0) {
                                while ($row_provinsi = $result_provinsi->fetch_assoc()) {
                                    $selected = ($selected_provinsi == $row_provinsi['id_provinsi']) ? 'selected' : '';
                                    echo "<option value='" . $row_provinsi['id_provinsi'] . "' $selected>" . $row_provinsi['nama_provinsi'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col md-4">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info" name="selected_provinsi">Filter Provinsi</button>
                    </div>
                </div>
            </form>

            <div class="col">
                <form action="" method="POST">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Cari Data Kabupaten">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-info" name="search_submit">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Kabupaten</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'component/kabupaten.php'; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination mb-5">
                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?php if ($i == $halaman) echo 'active'; ?>"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

        <h3 class="mt-5">Data Penduduk</h3>
        <div class="col-md-2">
            <a href="action/input.php" class="btn btn-info mb-3">Tambah Data</a>
        </div>
        <div class="col-md-8">
            <form action="" method="GET">
                <div class="row-md-4">
                    <div class="input-group">
                        <select class="form-control" id="provinsi" name="provinsi_id">
                            <option value="">Pilih Provinsi</option>
                            <?php
                            include 'koneksi/connection.php';
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
                    <br>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success btn-block" name="filter_provinsi">Filter Provinsi</button>
                    </div>
                </div>
                <br>
                <div class="row-md-4">
                    <div class="input-group">
                        <select class="form-control" id="kabupaten" name="kabupaten_id">
                            <option value="">Pilih Kabupaten</option>
                            <?php
                            $sql_kabupaten = "SELECT * FROM kabupaten";
                            $result_kabupaten = $conn->query($sql_kabupaten);
                            if ($result_kabupaten->num_rows > 0) {
                                while ($row_kabupaten = $result_kabupaten->fetch_assoc()) {
                                    echo "<option value='" . $row_kabupaten['id_kabupaten'] . "'>" . $row_kabupaten['nama_kabupaten'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-warning btn-block" name="filter_kabupaten">Filter Kabupaten</button>
                    </div>
                </div>
            </form>
        </div>
        <br>

        <div class="row-md-4">
            <div class="col-md-4">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_query" name="search_query" placeholder="Cari Data Kabupaten">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-info" name="search_data">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>


        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'component/data_penduduk.php'; ?>
            </tbody>
        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?php if ($i == $halaman) echo 'active'; ?>"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>

        <h3 class="mt-5">Laporan Data Penduduk</h3>
        <a href="laporan/report_provinsi.php" class="btn btn-primary mb-5">Print Out Jumlah Penduduk Per Provinsi</a>
        <a href="laporan/report_kabupaten.php" class="btn btn-secondary mb-5">Print Out Jumlah Penduduk Per Kabupaten</a>
        <a href="laporan/export_excel.php" class="btn btn-success mb-5">Export to Excel</a>

        <br>
    </div>
</body>

</html>
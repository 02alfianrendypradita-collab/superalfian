<?php
session_start();
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Barang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>📦 Kelola Barang</h3>
            <a href="admin.php" class="btn btn-secondary">← Kembali</a>
        </div>

        <a href="tambah_barang.php" class="btn btn-primary mb-3">
            ➕ Tambah Barang
        </a>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $no = 1;
                while ($row = mysqli_fetch_array($data)) { 
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td>Rp <?= number_format($row['harga']); ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
    <?php
    // Coba kedua kemungkinan nama kolom
    $id = isset($row['id']) ? $row['id'] : $row['id'];
    ?>
    <a href="hapus_barang.php?id=<?php echo $id; ?>" 
       class="btn btn-danger btn-sm"
       onclick="return confirm('Yakin mau hapus?')">
       🗑️ Hapus
    </a>
</td>
                </tr>
                <?php } ?>

            </tbody>
        </table>

    </div>

</div>

</body>
</html>
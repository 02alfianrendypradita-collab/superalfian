<?php
include "koneksi.php";
if (isset($_POST['nama_barang'])) {
    mysqli_query($conn, "INSERT INTO barang VALUES ('', '$_POST[nama_barang]', '$_POST[harga]', '$_POST[stok]')");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow p-4" style="border-radius:15px">
                <h3 class="text-center mb-4">➕ Tambah Barang</h3>

                <!-- ✅ action sudah diperbaiki -->
               <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="Masukkan stok" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="admin.php">← Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
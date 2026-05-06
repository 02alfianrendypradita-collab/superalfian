<?php
include "koneksi.php";

if (isset($_POST['nama_barang'])) {
    $nama      = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $harga     = (int) $_POST['harga'];
    $jumlah    = (int) $_POST['jumlah'];
    $diskon    = (int) $_POST['diskon'];
    $bayar     = (int) $_POST['bayar'];
    $total     = $harga * $jumlah - ($harga * $jumlah * $diskon / 100);
    $kembalian = $bayar - $total;

    // ✅ Cek stok cukup
    $cek = mysqli_fetch_assoc(mysqli_query($conn,
        "SELECT stok FROM barang WHERE nama_barang='$nama'"));

    if (!$cek || $cek['stok'] < $jumlah) {
        echo "<script>alert('Stok tidak cukup!'); history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO transaksi (nama_barang, harga, jumlah, total, bayar, kembalian, tanggal)
            VALUES ('$nama', '$harga', '$jumlah', '$total', '$bayar', '$kembalian', NOW())";

    if (mysqli_query($conn, $sql)) {

        // ✅ Kurangi stok — INI yang kurang di file kamu
        mysqli_query($conn, "UPDATE barang SET stok = stok - '$jumlah' WHERE nama_barang='$nama'");

        header("Location: penjualan.php");
        exit();
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .card { border-radius: 15px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="col-md-5 mx-auto">
        <div class="card shadow p-4">
            <h3 class="text-center mb-4">💳 Pembayaran</h3>

            <!-- ✅ Tambah method dan action -->
            <form method="POST" action="">

                <div class="mb-3">
                    <label>Nama Barang</label>
                    <!-- ✅ Semua input ditambah name= -->
                    <input type="text" id="nama_barang" name="nama_barang"
                           class="form-control" placeholder="Masukkan nama barang" required>
                </div>

                <div class="mb-3">
                    <label>Harga Satuan</label>
                    <input type="number" id="harga" name="harga"
                           class="form-control" placeholder="Masukkan harga" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah"
                           class="form-control" value="1" min="1" required>
                </div>

                <div class="mb-3">
                    <label>Diskon (%)</label>
                    <input type="number" id="diskon" name="diskon"
                           class="form-control" value="0" min="0" max="100">
                </div>

                <div class="mb-3">
                    <label>Bayar</label>
                    <input type="number" id="bayar" name="bayar"
                           class="form-control" placeholder="Jumlah uang" required>
                </div>

                <div class="mb-3 fw-bold text-primary">
                    Total: Rp <span id="total">0</span>
                </div>
                <div class="mb-3 fw-bold text-success">
                    Kembalian: Rp <span id="kembali">0</span>
                </div>

                <!-- ✅ Pisah tombol hitung dan simpan -->
                <button type="button" onclick="hitung()"
                        class="btn btn-secondary w-100 mb-2">🔢 Hitung</button>
                <button type="submit"
                        class="btn btn-primary w-100">💾 Simpan Transaksi</button>

            </form>
        </div>
    </div>
</div>

<script>
function hitung() {
    let harga  = parseInt(document.getElementById('harga').value)  || 0;
    let jumlah = parseInt(document.getElementById('jumlah').value) || 1;
    let diskon = parseInt(document.getElementById('diskon').value) || 0;
    let bayar  = parseInt(document.getElementById('bayar').value)  || 0;

    let total   = (harga * jumlah) - (harga * jumlah * diskon / 100);
    let kembali = bayar - total;

    document.getElementById('total').innerText   = total.toLocaleString('id-ID');
    document.getElementById('kembali').innerText = kembali >= 0
        ? kembali.toLocaleString('id-ID')
        : '⚠️ Uang kurang!';
}
</script>
</body>
</html>
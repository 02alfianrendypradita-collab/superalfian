<?php
$conn = mysqli_connect("localhost", "root", "", "kasir_mini");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ambil data transaksi terakhir
$query = "SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
        }
        .struk {
            width: 300px;
            background: #fff;
            padding: 20px;
            margin: 50px auto;
            border: 1px solid #ccc;
        }
        h2 {
            text-align: center;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="struk">
    <h2>KASIR MINI</h2>
    <p>Tanggal: <?= $data['tanggal']; ?></p>

    <div class="line"></div>

    <p>Nama Barang : <?= $data['nama_barang']; ?></p>
    <p>Harga       : Rp <?= number_format($data['harga']); ?></p>
    <p>Jumlah      : <?= $data['jumlah']; ?></p>

    <div class="line"></div>

    <p><b>Total Bayar : Rp <?= number_format($data['total']); ?></b></p>
    <p>Bayar         : Rp <?= number_format($data['bayar']); ?></p>
    <p>Kembalian     : Rp <?= number_format($data['kembalian']); ?></p>

    <div class="line"></div>

    <p style="text-align:center;">Terima Kasih 😊</p>

    <div class="text-center mt-3">
        <a href="admin.php" class="btn btn-primary">← Kembali</a>
    </div>
</div>

</body>
</html>
<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<a class="btn btn-primary ms-4 mt-4" href="admin.php">KEMBALI</a>

<div class="container py-5">

    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="text-center mb-4">📊 Data Transaksi</h3>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
    <tr>
        <th>No</th>
        <th>Barang</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembalian</th>
        <th>Waktu</th>
    </tr>
</thead>

<tbody>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");

while ($d = mysqli_fetch_array($data)) {
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $d['nama_barang']; ?></td>
    <td>Rp <?= number_format($d['total']); ?></td>
    <td>Rp <?= number_format($d['bayar']); ?></td>
    <td>Rp <?= number_format($d['kembalian']); ?></td>
    <td><?= date('d-m-Y H:i', strtotime($d['tanggal'])); ?></td>
</tr>

<?php } ?>

</tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
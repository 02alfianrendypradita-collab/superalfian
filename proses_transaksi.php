<?php
include "koneksi.php";

if (isset($_POST['harga'])) {
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $bayar = $_POST['bayar'];

    $total = hitungDiskon($harga, $diskon);
    $kembalian = hitungKembalian($bayar, $total);

    mysqli_query($conn, "INSERT INTO transaksi VALUES ('', NOW(), '$total', '$bayar', '$kembalian', '1')");

    echo "Total: Rp $total <br>";
    echo "Kembalian: Rp $kembalian";
}
?>

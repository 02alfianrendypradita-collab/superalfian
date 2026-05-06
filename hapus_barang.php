<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // cast ke int untuk keamanan

    $result = mysqli_query($conn, "DELETE FROM barang WHERE id='$id'");

    if ($result) {
        header("Location: tampil_barang.php?pesan=hapus_sukses");
    } else {
        echo "Gagal hapus: " . mysqli_error($conn);
    }
    exit();
} else {
    header("Location: tampil_barang.php");
    exit();
}
?>
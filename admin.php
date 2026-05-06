<?php
session_start();

// cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6f9;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c3e50;
            position: fixed;
            color: white;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            border-bottom: 1px solid #34495e;
        }

        .sidebar a:hover {
            background: #3498db;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
            font-size: 18px;
        }

        .barang { background: #3498db; }
        .transaksi { background: #27ae60; }
        .penjualan { background: #e67e22; }
        .kelola { background: #9b59b6; }

        .logout {
            background: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin</h2>

    <a href="barang.php">📦 Barang</a>
    <a href="transaksi.php">💳 Transaksi</a>
    <a href="laporan.php">📊 Penjualan</a>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<div class="content">
    <div class="header">
        <h2>Dashboard Admin</h2>
        <p>Selamat datang, <?= $_SESSION['username']; ?></p>
    </div>

    <div class="cards">
        <div class="card barang">
            <h3>Tambah Barang</h3>
            <p><a href="barang.php" style="color:white;">Masuk</a></p>
        </div>

        <div class="card transaksi">
            <h3>Transaksi</h3>
            <p><a href="transaksi.php" style="color:white;">Masuk</a></p>
        </div>

        <div class="card kelola">
            <h3>Kelola Barang</h3>
            <p><a href="tampil_barang.php" style="color:white;">Masuk</a></p>
        </div>

        <div class="card penjualan">
            <h3>Data Penjualan</h3>
            <p><a href="laporan.php" style="color:white;">Masuk</a></p>
        </div>
    </div>
</div>

</body>
</html>
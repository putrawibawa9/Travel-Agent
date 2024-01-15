<?php
session_start();
require_once "../functions.php";


$pesanan = query("SELECT *
FROM pesanan
JOIN jasa_wisata ON pesanan.id_wisata = jasa_wisata.id_wisata
JOIN pembeli ON pesanan.id_pembeli = pembeli.id_pembeli;
");

// var_dump($pesanan);
// exit;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, .form {
            color: white;
        }

        a {
            text-decoration: none;
        
            margin-right: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4F6F52;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        footer {
            background-color: #4F6F52;
            color: #fff;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        header {
            background-color: #4F6F52;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
    <h1>Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
        <h1 style="color: white;">DAFTAR PESANAN</h1>
    </header>

    <table border="1" cellpadding = '10' cellspacing = '0'>
        <tr>
            <th> No </th>
            <th> Id Pesanan</th>
            <th> Nama Pelanggan</th>
            <th> Nama Produk </th>
            <th> Harga Wisata</th>
            <th> Actions</th>
        </tr>
        
        <?php $i =1;?>
        <!-- create the loop -->
        <?php foreach($pesanan as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['id_pesanan']; ?></td>
            <td><?= $row['nama_pembeli']; ?></td>
            <td><?= $row['nama_wisata']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td>
               <a href="konfirmasiPesanan.php?id_pesanan=<?=$row['id_pesanan'];?>" onclick="return confirm('yakin?');">Konfirmasi Pemesanan</a>
            </td>
            <?php $i++?>
        </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: (123) 456-7890</p>
    </footer>

      
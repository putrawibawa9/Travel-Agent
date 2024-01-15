<?php
session_start();
require_once "../functions.php";


$wisata = query("SELECT * FROM jasa_wisata");





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
            background-color: white;
            margin: 0;
            padding: 0;
        }

        h1, .form {
            color: #4F6F52;
        }

        a {
            color: blue;
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
        header {
            background-color: #4F6F52;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        footer {
            background-color: #4F6F52;
            color: #fff;
            text-align: center;
            padding: 1em;
            bottom: 0;
            width: 100%;
        
        }
        .container {
            text-align: center;

        }

        .container a {
            display: block;
            margin: 10px;
            color: blue   ;
        }
    </style>
</head>
<body>
 
    <header>
        <h1 style="color: white;">Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
        <h1 style="color: white;">DAFTAR PRODUK</h1>
    </header>

  

  

 <!-- <form action="" method="get" class="form">
    <input type="text" name="keyword" autofocus placeholder="cari id/nama " autocomplete="off" 
    value="<?= $keyword;  ?>" >
    <button type="submit" name="cari">Cari</button>
</form>
     <form action="" method="post" class="form"> 
            <input type="text" name="keywordNama" autofocus placeholder="cari nama" autocomplete="off" >
            <button type="submit" name="cariNama">Cari</button>
        </form> -->
    <!-- create the header -->
    <table border="1" cellpadding = '10' cellspacing = '0'>
        <tr>
            <th> No </th>
            <th> Id Tempat Wisata</th>
            <th> Nama Tempat Wisata</th>
            <th> Gambar Wisata </th>
            <th> Lokasi Wisata </th>
            <th> Deskripsi Wisata</th>
            <th> Harga Produk</th>
            <th> Actions</th>
        </tr>
        
        <?php $i =1;?>
        <!-- create the loop -->
        <?php foreach($wisata as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['id_wisata']; ?></td>
            <td><?= $row['nama_wisata']; ?></td>
            <td><img src="../img/<?= $row['gambar']; ?>" width="100px" height="100px"></td>
            <td><?= $row['lokasi_wisata']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td>
               <a href="ubahWisata.php?id_wisata=<?=$row['id_wisata'];?>">Ubah</a>
               <a href="hapusWisata.php?id_wisata=<?=$row['id_wisata'];?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
            <?php $i++?>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="container">
                <a href="order.php" >Lihat Semua Pesanan</a>    
                <a href="tambahWisata.php">Tambah Wisata</a>
    </div>

    <footer>
        <a href="../logout.php">Logout</a>
        <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: (123) 456-7890</p>
    </footer>
      
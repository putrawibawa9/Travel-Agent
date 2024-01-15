<?php
session_start();
require_once "../functions.php";

$id_pesanan = $_GET['id_pesanan'];
$order = query("SELECT * FROM pesanan JOIN jasa_wisata ON (jasa_wisata.id_wisata = pesanan.id_wisata) WHERE id_pesanan = $id_pesanan")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faktur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #4F6F52;
    }

    #invoice {
      max-width: 800px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
      background: #f8f8f8;
  
    }

    #invoice h1 {
      text-align: center;
      color: #333;
    }

    .invoice-details {
      margin-bottom: 20px;
    }

    .invoice-details div {
      display: inline-block;
      width: 49%;
    }

    #customer {
      margin-top: 20px;
    }

    #customer th, #customer td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    #items {
      margin-top: 20px;
      width: 100%;
      border-collapse: collapse;
    }

    #items th, #items td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    #total {
      margin-top: 20px;
      text-align: right;
    }

    #thanks {
      margin-top: 20px;
      text-align: center;
      color: #333;
    }
  </style>
</head>
<body>

  <div id="invoice">
    <h1>Faktur</h1>

    <div class="invoice-details">
      <div>
        <strong>Nomor Faktur:</strong> INV- <?= $order['id_pesanan'] ?>
      </div>
      <div>
        <strong>Tanggal:</strong><?= $order['tgl_pesanan'] ?>
      </div>
    </div>

    <div id="customer">
      <h2>Detail Pelanggan</h2>
      <table>
        <tr>
          <th>Nama</th>
          <td><?=$_SESSION['nama_pembeli']?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?=$_SESSION['alamat_pembeli']?></td>
        </tr>
      </table>
    </div>

    <div id="items">
      <h2>Produk</h2>
      <table>
        <tr>
          <th>Nama Wisata</th>
          <th>Harga Wisata</th>
          <th>Metode Pembayaran</th>
        </tr>
        <tr>
            <td><?= $order['nama_wisata']; ?></td>
            <td><?= $order['harga']; ?></td>
            <td><?= $_GET['bank']; ?></td>
        </tr>
      </table>
    </div>

    <div id="thanks">
      <p>Terimakasih!</p>
    </div>

    
  </div>
  <div id="logout-container" style="text-align: center;">
  <a href="../logout.php" style="color: white;">Logout</a>
</div>

</body>
</html>

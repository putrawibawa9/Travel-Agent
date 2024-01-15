<?php
session_start();
require_once "../functions.php";


$wisata = query("SELECT * FROM jasa_wisata");


if(isset($_POST['submit'])){

    //check the progress
    $hasil_query = tambahPesanan($_POST);
    if ($hasil_query>0){
        echo "
            <script>
            alert('Pesanan berhasil ditambahkan');
            document.location.href = 'order.php?id_pesanan=$hasil_query';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'katalog.php';
        </script>
    ";

    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agent</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1, .form {
            color: white;
        }

        a {
            color: white;
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
        body, header, table {
    margin: 0;
}
footer {
            background-color: #4F6F52;
            color: #fff;
            text-align: center;
            padding: 1em;
            bottom: 0;
            width: 100%;
        }

        td:nth-child(5) {
    max-width: 200px; /* Adjust the value according to your design */
    word-wrap: break-word;
    text-overflow: ellipsis;
}

.card {
    width: 300px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 10px; /* Add margin for spacing between cards */
    display: inline-block;
}

    .card-header {
      background-color: #4F6F52;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    .card-body {
      padding: 20px;
    }

    .product-image {
      width: 100%;
      height: auto;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    .form-container {
      padding: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 8px;
    }

    input {
      padding: 8px;
      margin-bottom: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #4F6F52;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    #card-container {
    display: flex;
    flex-wrap: wrap; /* Allow the cards to wrap to the next row */
    justify-content: center; /* Center the cards horizontally */
    margin: 20px auto; /* Add margin for spacing around the container */
}

    </style>
</head>
<body>
   
    <header>
    <h1>Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
    </header>
 
<div id="card-container">
<?php foreach($wisata as $row): ?>
        <div class="card">
  <div class="card-header">
    <h2><?= $row['nama_wisata']; ?></h2>
  </div>
  <div class="card-body">
    <img class="product-image" src="../img/<?= $row['gambar']; ?>" alt="Product Image">
    <p><strong>Lokasi:</strong> <?= $row['lokasi_wisata']; ?></p>
    <p><strong>Harga:</strong> Rp. <?= $row['harga']; ?></p>
  </div>
  <div class="form-container">
    <form action=""method="post">
        <input type="hidden" value="<?=$_SESSION['id_pembeli'];?>" name="id_pembeli">
        <input type="hidden" value="<?= $row['id_wisata'];?>" name="id_wisata">
        <input type="hidden" value="<?= $row['harga'];?>" name="harga">
        <input type="hidden" value="<?= date('Y-m-d');?>" name="tgl_pesanan">
        <button name="submit">Pesan</button>
    </form>
  </div>
</div>
<?php endforeach; ?>
</div>
        
        <footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: (123) 456-7890</p>
    </footer>

     </body>
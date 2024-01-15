<?php
// session_start();
// if (!isset($_SESSION['login'])){
//     header("Location: login.php");
//     exit;
// }
require_once "../functions.php";

//get that $_GET
$id_wisata = $_GET['id_wisata'];

$pdk = query("SELECT * FROM jasa_wisata WHERE id_wisata= $id_wisata")[0];





//check whether the button has been click or not
if(isset($_POST['submit'])){


    
    //check the progress
    if (ubahWisata($_POST)>0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'home.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'home.php';
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
    <title>Ubah data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h1>Ubah Data Wisata</h1>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_wisata" value="<?= $pdk['id_wisata']?>">
<input type="hidden" name="gambarLama" value="<?= $pdk['gambar']?>">
<ul>
    <li>
        <label for="nama_wisata">Nama Wisata :</label>
        <input type="text" name="nama_wisata" id="nama_wisata" required value="<?= $pdk['nama_wisata']; ?>">
    </li>
    <li>
        <label for="gambar">Foto Wisata :</label>
        <input type="file" name="gambar" id="nama">
        <img src="../img/<?= $pdk['gambar'] ?>" width="100px" height="100px">
    </li>

    <li>
        <label for="lokasi_wisata">Lokasi Wisata :</label>
        <input type="text" name="lokasi_wisata" id="lokasi_wisata" required value="<?= $pdk['lokasi_wisata']; ?>">
    </li>

    <li>
        <label for="deskripsi">Deskripsi Wisata :</label>
        <input type="text" name="deskripsi" id="deskripsi" required value="<?= $pdk['deskripsi']; ?>" >
    </li>
    <li>
        <label for="harga">Harga Wisata :</label>
        <input type="text" name="harga" id="harga" required value="<?= $pdk['harga']; ?>" >
    </li>
    <button type="submit" name="submit">Ubah</button>
</ul>

<a href="../index.php">back</a>
</form>


</body>
</html>
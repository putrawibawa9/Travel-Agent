<?php

include_once "functions.php";

if(isset($_POST['register'])){

    if (regristrasiPembeli($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href = 'index.php';
              </script>";
           
    } else {
        echo "<script>
                alert('user gagal ditambahkan');
              </script>";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #4F6F52;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Registration Page</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_pembeli">Nama Pembeli :</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli" required>
            </li>
            <li>
                <label for="alamat_pembeli">Alamat :</label>
                <input type="text" name="alamat_pembeli" id="alamat_pembeli" required>
            </li>
            <li>
                <label for="no_telp_pembeli">Nomor Kontak :</label>
                <input type="text" name="no_telp_pembeli" id="no_telp_pembeli" required>
            </li>
            <li>
                <label for="email_pembeli">Email :</label>
                <input type="text" name="email_pembeli" id="email_pembeli" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Confirm Password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
        <div>
            <p>Sudah punya akun?</p>
            <a href="index.php">Login </a>
        </div>
    </form>

</body>
</html>

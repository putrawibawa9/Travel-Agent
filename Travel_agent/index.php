<?php

session_start();

// cek cookie
// if(isset($_COOKIE['login'])){
//     if($_COOKIE['login']=='true'){
//         $_SESSION['login']= true;
//     }
// }

if (isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
include_once "functions.php";

if(isset($_POST['login'])){

    $nama_pembeli = $_POST['nama_pembeli'];
    $password = $_POST['password'];

   $result = mysqli_query($conn,"SELECT * FROM pembeli WHERE nama_pembeli = '$nama_pembeli';");

   //cek username
   if(mysqli_num_rows($result)===1){

    //cek password
    $row = mysqli_fetch_assoc($result);
   if($password == $row['password']){


    $_SESSION['is_auth'] = true;
    $_SESSION['nama_pembeli'] = $row['nama_pembeli'];
    $_SESSION['id_pembeli'] = $row['id_pembeli'];
    $_SESSION['alamat_pembeli'] = $row['alamat_pembeli'];
    header("Location: ClientSide/index.php");
    exit;
   }
   }


   $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
            text-align: center;
        }

        h1 {
            color: white;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login Pembeli</h1>

    <?php if(isset($error)): ?>
        <p style="color : red">Username / Password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_pembeli">Nama Pembeli :</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <li>
                <a href="registrasi.php">Klik untuk buat akun</a>
            </li>
            <li>
                <a href="AdminSide/login.php">Login untuk penjual</a>
            </li>
        </ul>
    </form>
</div>

</body>
</html>

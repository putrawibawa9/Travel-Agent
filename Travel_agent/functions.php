<?php


$conn =mysqli_connect("localhost","root","","travelagent");


function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    $rows = [];
    //loop the $result

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambahProduk__($data) {
    global $conn;
  
    $Nama_produk = $data['Nama_produk'];
    $Foto_produk = $data['Foto_produk'];
    $Stok_produk = $data['Stok_produk'];
    $Deskripsi_produk = $data['Deskripsi_produk'];
    $Harga_produk = $data['Harga_produk'];
  

//make the insert syntax
$query = "INSERT INTO produk VALUES 
            ('','$Nama_produk','$Foto_produk','$Stok_produk','$Deskripsi_produk','$Harga_produk')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function tambahWisata($data) {
  global $conn;
  $nama_wisata = $data['nama_wisata'];
  $lokasi_wisata = $data['lokasi_wisata'];
  $deskripsi = $data['deskripsi'];
  $harga = $data['harga'];

  //upload gambar
  $gambar = upload();
  if(!$gambar){
    return false;
  }

//make the insert syntax
$query = "INSERT INTO jasa_wisata VALUES 
          ('','$nama_wisata','$lokasi_wisata','$gambar','$harga',' $deskripsi')";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile =  $_FILES['gambar']['size'];
  $error =  $_FILES['gambar']['error'];  
  $tmp =  $_FILES['gambar']['tmp_name'];  

  //cek apakah user sudah menambah gambar

  if($error ===4){
    echo "<script>
        alert ('pilih gambar dulu');
          </script>";
          return false;
  }

  //cek apakah yang diupload adalah gambar
  $ekstensiGambarValid =['jpg','jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile); 
  $ekstensiGambar = strtolower(end($ekstensiGambar)); 
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
        alert ('format gambar salah!');
          </script>";
          return false;
  }

  //cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000){
    echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
  }

  //generate nama file random
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;


  //lolos semua hasil cek, lalu dijalankan
  move_uploaded_file($tmp, '../img/'.$namaFileBaru);

  return $namaFileBaru;
}

function hapusWisata($id_wisata){
  global $conn;
  mysqli_query($conn,"DELETE FROM jasa_wisata WHERE id_wisata = $id_wisata");
  return mysqli_affected_rows($conn);
}




function ubahProduk__($data){
  global $conn;
  $Id_produk = $data['Id_produk'];
  $Nama_produk = $data['Nama_produk'];
  $Foto_produk = $data['Foto_produk'];
  $Stok_produk = $data['Stok_produk'];
  $Deskripsi_produk = $data['Deskripsi_produk'];
  $Harga_produk = $data['Harga_produk'];

//make the insert syntax
$query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = $Stok_produk,
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE Id_produk =$Id_produk
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function ubahWisata($data){
  global $conn;
  $id_wisata = $data['id_wisata'];
  $nama_wisata = $data['nama_wisata'];
  $lokasi_wisata = $data['lokasi_wisata'];
  $deskripsi = $data['deskripsi'];
  $harga = $data['harga'];
  $gambarLama = $data['gambarLama'];


  //check whether user pick a new image or not
  if($_FILES['gambar']['error']===4){
    $gambar = $gambarLama;
  }else{
    $gambar = upload();
  }


//make the insert syntax
$query = "UPDATE jasa_wisata SET
        nama_wisata = '$nama_wisata',
        lokasi_wisata = '$lokasi_wisata',
        gambar = '$gambar',
        harga = $harga,
        deskripsi = '$deskripsi'
        WHERE  id_wisata = $id_wisata
        ";

mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}








function regristrasiPembeli($data){
  global $conn;
  $nama_pembeli = strtolower(stripslashes($data['nama_pembeli'])); 
  $alamat_pembeli = $data['alamat_pembeli']; 
  $no_telp_pembeli = $data['no_telp_pembeli']; 
  $email_pembeli = $data['email_pembeli']; 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT nama_pembeli FROM pembeli WHERE nama_pembeli = '$nama_pembeli';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }


  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO pembeli VALUES('','$nama_pembeli','$alamat_pembeli','$no_telp_pembeli', '$email_pembeli','$password')");
  return mysqli_affected_rows($conn);
}

function regristrasiPenjual($data){
  global $conn;
  $username = strtolower(stripslashes($data['username'])); 
  $password = $data['password']; 
  $password2 = $data['password2']; 

  //cek username udah ada atau belum
  $result =mysqli_query($conn,"SELECT username FROM penjual WHERE username = '$username';");
  if(mysqli_fetch_assoc($result)){
  echo "<script>
  alert('user sudah ada');
  </script>";
  return false;
}

  //cek  konfirmasi password
  if($password != $password2){
    echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
          return false;
  }

  //enkripsi passrod
  // $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database
  mysqli_query($conn,"INSERT INTO penjual VALUES('','$username','$password')");
  return mysqli_affected_rows($conn);
}


function tambahPesanan($data) {
  global $conn;
  $id_pembeli = $data['id_pembeli'];
  $id_wisata = $data['id_wisata'];
  $harga = $data['harga'];
  $tgl_pesanan = $data['tgl_pesanan'];

  global $conn;
  $result = mysqli_query($conn, 
      "SELECT AUTO_INCREMENT
      FROM information_schema.TABLES
      WHERE TABLE_SCHEMA = 'travelagent' AND TABLE_NAME = 'pesanan';"
  );
  $row = mysqli_fetch_assoc($result);
  $id = $row["AUTO_INCREMENT"];
  $query = "INSERT INTO pesanan VALUES 
            ('$id','$tgl_pesanan','$id_pembeli','$id_wisata',' $harga')";
  
  mysqli_query($conn,$query);
  if (mysqli_affected_rows($conn)) {
    return $id;
  } else {
    return 0;
  }
  }

function tambahPesanan_($data) {
  global $conn;
  $Id_pelanggan = $data['Id_pelanggan'];
  $Id_produk = $data['Id_produk'];
  $Alamat_pesanan = $data['Alamat_pesanan'];
  $Total_pesanan = $data['Total_pesanan'];
  $Tgl_pesanan = $data['Tgl_pesanan'];

  //upload gambar
  // $Foto_produk = upload();
  // if(!$Foto_produk){
  //   return false;
  // }

//make the insert syntax
global $conn;
$result = mysqli_query($conn, 
    "SELECT AUTO_INCREMENT
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = 'jejaitan_upacara' AND TABLE_NAME = 'pesanan';"
);
$row = mysqli_fetch_assoc($result);
$id = $row["AUTO_INCREMENT"];
$query = "INSERT INTO pesanan VALUES 
          ('$id','$Id_pelanggan','$Id_produk','$Alamat_pesanan',' $Total_pesanan','$Tgl_pesanan')";

mysqli_query($conn,$query);
if (mysqli_affected_rows($conn)) {
  return $id;
} else {
  return 0;
}
}




function detail_query($query){
  global $conn;
  $result =mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);

  return $data;
}


function konfirmasiPesanan($id_pesanan){
  global $conn;
  mysqli_query($conn,"DELETE FROM pesanan WHERE id_pesanan = $id_pesanan");
  return mysqli_affected_rows($conn);
}
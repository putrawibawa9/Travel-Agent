<?php

require_once "../functions.php";
$id_wisata = $_GET['id_wisata'];

if (hapusWisata($id_wisata)>0){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'home.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'home.php';
            </script>";
}


?>
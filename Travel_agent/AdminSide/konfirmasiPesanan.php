<?php

require_once "../functions.php";
$id_pesanan = $_GET['id_pesanan'];

if (konfirmasiPesanan($id_pesanan)>0){
    echo "<script>
            alert('Pesanan telah dikirim ');
            document.location.href = 'order.php';
      </script>";
}else{
  echo "  <script>
            alert('Pesanan gagal dikirim');
            document.location.href = 'order.php';
            </script>";
}


?>
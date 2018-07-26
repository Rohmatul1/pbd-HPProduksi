<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_produk	= $_POST['kd_produk'];
 $nm_produk	= $_POST['nm_produk'];

$sql = "insert into produk values('$kd_produk','$nm_produk')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:produk_t.php");
} 
?>
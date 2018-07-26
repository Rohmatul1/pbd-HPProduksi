<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_pro2					= $_POST['kd_pro2'];
 $kd_pro1					= $_POST['kd_pro1'];
 $totalBP					= $_POST['totalBP'];
 $saldoawalPDP				= $_POST['saldoawalPDP'];
 $saldoakhirPDP				= $_POST['saldoakhirPDP'];
 $totalHPProduksi			= $totalBP + $saldoawalPDP - $saldoakhirPDP;
 	echo "$totalHPProduksi";

$sql = "insert into produksi2 values('$kd_pro2','$kd_pro1','$totalBP','$saldoawalPDP','$saldoakhirPDP', '$totalHPProduksi')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:produksi2_t.php");
} 
?>
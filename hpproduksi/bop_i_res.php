<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_bop			= $_POST['kd_bop'];
 $taksiran_bop		= $_POST['taksiran_bop'];
 $taksiran_jtkl		= $_POST['taksiran_jtkl'];
 $tarif_bop_jtkl	= $taksiran_bop / $taksiran_jtkl;
	echo "$tarif_bop_jtkl";

$sql = "insert into bop values('$kd_bop','$taksiran_bop', '$taksiran_jtkl', '$tarif_bop_jtkl')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:bop_t.php");
} 
?>
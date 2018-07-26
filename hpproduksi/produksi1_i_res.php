<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_pro1					= $_POST['kd_pro1'];
 $kd_bb						= $_POST['kd_bb'];
 $jml						= $_POST['jml'];
 $kd_tkl					= $_POST['kd_tkl'];
 $jmlkerja					= $_POST['jmlkerja'];
 $kd_bop					= $_POST['kd_bop'];
 $tarif_bop_jtkl			= $_POST['tarif_bop_jtkl'];
 $totalBP					= $jml + $jmlkerja + $tarif_bop_jtkl;
 	echo "$totalBP";

$sql = "insert into produksi1 values('$kd_pro1','$kd_bb','$jml','$kd_tkl', '$jmlkerja', '$kd_bop','$tarif_bop_jtkl', '$totalBP')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:produksi1_t.php");
} 
?>
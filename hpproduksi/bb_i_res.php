<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_bb			= $_POST['kd_bb'];
 $nm_bb			= $_POST['nm_bb'];
 $satuan		= $_POST['satuan'];
 $hrg_satuan	= $_POST['hrg_satuan'];
 $qty			= $_POST['qty'];
 $jml			= $hrg_satuan * $qty;
	echo "$jml";

$sql = "insert into bb values('$kd_bb','$nm_bb', '$satuan', '$hrg_satuan', '$qty', '$jml')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:bb_t.php");
} 
?>
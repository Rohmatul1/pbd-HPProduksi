<?php
 include "koneksi.php";
 echo("<pre>");
 print_r($_POST);

 $kd_tkl			= $_POST['kd_tkl'];
 $nm_tkl			= $_POST['nm_tkl'];
 $jamkerja			= $_POST['jamkerja'];
 $upahperjam		= $_POST['upahperjam'];
	$jmlkerja			= $jamkerja * $upahperjam;
	echo "$jmlkerja";

$sql = "insert into  tkl values('$kd_tkl', '$nm_tkl', '$jamkerja','$upahperjam', '$jmlkerja')";   
$hasil = $koneksidb->query($sql);
if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysqli_error($koneksidb);
    echo "<input type='button' value='Kembali'
    onClick='self.history.back()'>";
    exit;
} else {
    header("location:tkl_t.php");
} 
?>
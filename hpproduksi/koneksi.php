<?php
# Konek ke Web Server Lokal
$host	= "localhost";
$user	= "root";
$pass	= "";
$dbName	= "dbhpproduksi"; // nama database, disesuaikan dengan database di MySQL

# Konek ke Web Server Lokal
$koneksidb	= mysqli_connect($host, $user, $pass, $dbName);
if (! $koneksidb) {
  echo "Failed Connection !";
}

# Memilih database pd MySQL Server
//mysqli_select_db($dbName) or die ("Database not Found !");
?>
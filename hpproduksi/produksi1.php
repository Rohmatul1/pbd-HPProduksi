<!DOCTYPE html>
<html lang="en">
<?php
	include "koneksi.php";
?>
	<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
			<title>HPProduksi</title>

			<!-- Bootstrap -->
			<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
			<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<div class="container">
		<div id="header">
			<h1>Harga Pokok Produksi</h1>
		</div>
	</div>
	<div class="container">
				<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
							  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
							  </button>
						  <a class="navbar-brand" href="#">Ummah</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="home_page.php">Home <span class="sr-only">(current)</span></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inputan <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="bb_i.php">Input Bahan Baku</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daftar <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="bb_t.php">Daftar Bahan Baku</a></li>
									<li><a href="tkl_t.php">Daftar Tenaga Kerja Langsung</a></li>
									<li><a href="bop_t.php">Daftar Biaya Overhead Pabrik</a></li>
									<li><a href="produk_t.php">Daftar Produk</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="produksi1_t.php">Laporan Biaya Produksi</a></li>
									<li><a href="produksi2_t.php">Laporan Harga Pokok Produksi</a></li>
								</ul>
							</li>
						</ul>
					<form class="navbar-form navbar-left">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class="container">
				<div id="main-content" class="col-sm-8">
					<center><h3>Proses Biaya Produksi</h3></center>
					<form  action="produksi1_i_res.php" method="post">
						<div class="col-md-6">
							<div class="form-group label-floating">
								<label class="control-label">Kode Biaya Produksi</label> 
								<input type="text" class="form-control" name="kd_pro1" >
								<br/>
								<label class="control-label">Kode BB &nbsp &nbsp &nbsp&nbsp  &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <select name="kd_bb" ></label>
												<?php
													include "koneksi.php";
													$sql = "select * from bb";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['kd_bb']}'>{$r['kd_bb']}</option>";
													}
												?>
										</select>
									</br>
									</br>
										<label class="control-label">Jumlah BB &nbsp&nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <select name="jml"></label>
												<?php
													include "koneksi.php";
													$sql = "select * from bb";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['jml']}'>{$r['jml']}</option>";
													}
												?>
										</select>
									</br>
									</br>
									<label class="control-label">Kode TKL &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
										&nbsp  &nbsp &nbsp : <select name="kd_tkl" ></label>
												<?php
													include "koneksi.php";
													$sql = "select * from tkl";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['kd_tkl']}'>{$r['kd_tkl']}</option>";
													}
												?>
										</select>
									</br>
									</br>
										<label class="control-label">Jumlah TKL &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
											&nbsp  &nbsp: <select name="jmlkerja"></label>
												<?php
													include "koneksi.php";
													$sql = "select * from tkl";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['jmlkerja']}'>{$r['jmlkerja']}</option>";
													}
												?>
										</select>
									</br>
									</br>
									<label class="control-label">Kode BOP &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <select name="kd_bop" ></label>
												<?php
													include "koneksi.php";
													$sql = "select * from bop";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['kd_bop']}'>{$r['kd_bop']}</option>";
													}
												?>
										</select>
									</br>
									</br>
										<label class="control-label">Jumlah Biaya Produksi &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp: <select name="tarif_bop_jtkl"></label>
												<?php
													include "koneksi.php";
													$sql = "select * from bop";
													$res = mysqli_query($koneksidb, $sql) or die("Gagal Query");
													while($r = mysqli_fetch_assoc($res)){
													echo "<option value='{$r['tarif_bop_jtkl']}'>{$r['tarif_bop_jtkl']}</option>";
													}
												?>
										</select>
									</br>
									</br>
									</br>
							<button type="submit" class="btn btn-primary pull-right">NEXT</button>
							<button type="reset" class="btn btn-primary pull-right">RESET</button>
						<div class="clearfix"></div>
						</div>
					</div>
					</form>
					</div>
				</div>
			</div>
			<div class="container">
				<div id="footer">
					<h4>2018 &copy; Sistem Perhitungan Harga Pokok Produksi</h4>
				</div>
			</div>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="jquery.min.js.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
session_start();

if( !isset($_SESSION["login"]) ) {

	header('location:login.php');

	exit;
}

require 'function.php';
 $lihat = query ("SELECT * FROM mahasiswa");
 // tombol cari di tekan
 if(isset($_POST["cari"])){
 	$lihat = cari($_POST["keyword"]);

 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.loader{
			width: 70px;
			position: absolute;
			top: 120px;
			left: 320px;
			z-index: -1;
			display: none ;

		}
	</style>
	<script src="js/jquery-3.7.1.min.js"></script>
	<script src="js/halo.js"></script>
	<title></title>
</head>
<body>
	<button class="btn btn-succes"><a href="logout.php">Logout</a></button> | <a href="printer.php" target="_blank">Cetak</a>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan data" 
		autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="cari">CARI </button>
		<img src="img/muser.gif" class="loader">
		
	</form>
   <div id="container">
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>NO</th>
		<th>Aksi</th>
		<th>Gambar</th>
		<th>Nrp</th>
		<th>Nama</th>
		<th>email</th>
		<th>Jurusan</th>
	</tr>
	<?php $i=1; ?>
	<?php foreach ($lihat as $setuju) : ?>
	<tr>
		<td>
			<?= $i; ?>
		</td>
		<td><a href="ubah.php?id= <?= $setuju["id"]; ?>">ubah</a>  |  <a href="hapus.php?id= <?= $setuju ["id"]; ?>">hapus</a></td>
		<td><img src="img/<?php echo $setuju["gambar"]; ?>" width="50px"></td>
		<td><?= $setuju["nrp"];?></td>
		<td><?= $setuju["nama"]; ?></td>
		<td><?= $setuju["email"]; ?></td>
		<td><?= $setuju["jurusan"]; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>
	</div>


</body>
</html>
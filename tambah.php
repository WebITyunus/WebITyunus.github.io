<?php 

session_start();

if( !isset($_SESSION["login"]) ) {

	header('location:login.php');

	exit;
}

require 'function.php'; 
// cek tombol submit di tekan atau belum
if (isset($_POST["submit"])){


	// cek apakah data berhasil ditambahkan atau tidak

	if(tambah($_POST) > 0) {
		echo "<script>

		alert('Data berhasil Ditambahkan');
		document.location.href = 'index2.php';

		</script>";
	}else{
		echo "<script>

		alert('Data Gagal Ditambahkan');
		document.location.href = 'index2.php';

		</script>";
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">NAMA :</label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required>
			</li>
			<li>
				<label for="email">EMAIL :</label>
				<input type="text" name="email" id="email"required>
			</li>
			<li>
				<label for="jurusan">JURUSAN :</label>
				<input type="text" name="jurusan" id="jurusan" required>
			</li>
			<li>
				<label for="gambar">GAMBAR :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>

</body>
</html>
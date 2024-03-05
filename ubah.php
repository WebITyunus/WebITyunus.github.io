<?php 
session_start();

if( !isset($_SESSION["login"]) ) {

	header('location:login.php');

	exit;
}

require 'function.php'; 

// ambil data dari url
$id= $_GET["id"];

// query data mahasiswa berdasarkan id nya
$mhs= query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek tombol submit di tekan atau belum
if (isset($_POST["submit"])){

	// cek apakah data berhasil ditambahkan atau tidak

	if(ubah($_POST) > 0) {
		echo "<script>

		alert('Data berhasil Diubah');
		document.location.href = 'index2.php';

		</script>";
	}else{
		echo "<script>

		alert('Data Gagal Diubah');
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
	<title>Edit Data Mahasiswa</title>
</head>
<body>
	<h1>Edit Data Mahasiswa</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
		<ul>

			<li>
				<label for="nama">NAMA :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="nrp">NRP :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="email">EMAIL :</label>
				<input type="text" name="email" id="email"required value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="jurusan">JURUSAN :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<li>
				<label for="gambar">GAMBAR :</label><br>
                <img src="img/<?= $mhs["gambar"]; ?>" width= "50px"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data</button>
			</li>
			<li>
				<a href="index2.php">kembali</a>
			</li>
		</ul>
	</form>

</body>
</html>
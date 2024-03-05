<?php 
require 'function.php';

if(isset($_POST["register"])){

	if(register($_POST) > 0 ) {
		echo"<script>
            alert('register anda berhasil');

		    </script>";
	}else{
		echo mysqli_error($koneksi);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<style >
		label{
			display: block;
		}
	</style>
</head>
<body>
	<h1>Regristasi</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="username">Masukan user name</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Masukkan password</label>
				<input type="password" name="password" id="password">
			</li>
			<li>
				<label for="password2">Konfirmasi Password</label>
				<input type="password" name="password2" id="password2">
			</li>
			<li>
				<button type="submit" name="register">Regristasi</button>
			</li>
		</ul>
		<button><a href="login.php">Kembali ke login</a></button>
	</form>

</body>
</html>
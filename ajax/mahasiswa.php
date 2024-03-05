<?php 
// sleep(1);
require'../function.php';
$keyword= $_GET ['keyword'];
$query =  "SELECT * FROM mahasiswa 
             WHERE 
             nama LIKE '%$keyword%' OR 
             nrp LIKE '%$keyword%' OR 
             email LIKE '%$keyword%' OR 
             jurusan LIKE '%$keyword%' 
              ";
    $lihat = query($query);
?>

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



